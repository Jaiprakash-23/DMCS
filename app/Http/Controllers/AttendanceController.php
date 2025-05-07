<?php

namespace App\Http\Controllers;

use App\Models\AllEmpAttendance;
use App\Models\Attendance;
use App\Models\AttendanceGuard;
use App\Models\Department;
use App\Models\AllEmployeeEmp;
use App\Models\EmpTransfer;
use App\Models\Leaves;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
class AttendanceController extends Controller
{

    public function process(Request $request)
    {
        $input = $request->input('user_input');
        $user = AllEmployeeEmp::where('emp_id', $input)->first();

        return response()->json(['user' => $user]);
    }

    public function EmpTransfer(Request $request)
    {
        // dd($request->post());
        $request->validate([
            'emp_id' => 'required',
            'emp_name' => 'required',
            'site_from' => 'required',
            'site_to' => 'required',
            'report_to' => 'required'
        ]);
        EmpTransfer::create([
            'emp_id' => $request->emp_id,
            'emp_name' => $request->emp_name,
            'site_from' => $request->site_from,
            'site_to' => $request->site_to,
            'report_to' => $request->report_to
        ]);
        $auth = Auth::user();
        // dd($request->report_to);
        $user = AllEmployeeEmp::where('emp_id', $request->emp_id)->first();
        $user->site = $request->site_to;
        $user->designation = $request->report_to;
        $user->save();
        return back()->with('message', 'Transfer');
    }

    public function qrt_attendance()
    {
        return view('attendance_qrt');
    }
    public function gaurd_attendance()
    {
        $all_guard = AttendanceGuard::all();

        return view('attendance_guard', compact('all_guard'));
    }
    public function management_attendance()
    {
        return view('attendance_management');
    }
    public function officer_attendance()
    {
        return view('attendance_officer');
    }
    public function transfer()
    {
        $site_name = DB::table('location_site')->get();
        $report = DB::table('designation')->get();

        return view('Emp_Transfer', compact('site_name', 'report'));
    }
    public function all_attendance()
    {
        $all_employee_attendance = AllEmpAttendance::with(['guards', 'officer', 'qrt', 'management'])->get();

        return view('all_employ-attendance', compact('all_employee_attendance'));
    }


    public function AttendanceList(Request $request, $id=null)
    {
        
        $site_name = DB::table('location_site')->get();
        $designation = DB::table('designation')->get();
        $dateToCheck = Carbon::today()->format('Y-m-d');

        $department_name = $id ? Department::where("id", $id)->value('department') : null;

        $user = Auth::user()->site;
        // Base query
        $query = AllEmployeeEmp::where('site', $user)->getQuery();
        // Filter by department if ID exists
        if ($id) {
            $query->where("department", $id);
            
        }
         
        // Search functionality
        if ($request->filled('search')) {
            
            $searchTerm = $request->search;
           
           
            $query->where(function ($q) use ($searchTerm) {
                $q->where('emp.fullname', 'like', "%{$searchTerm}%")
                  ->orWhere('emp.site', 'like', "%{$searchTerm}%")
                  ->orWhere('emp.emp_id', 'like', "%{$searchTerm}%")
                  ->orWhereExists(function ($query) use ($searchTerm) {
                      $query->select(DB::raw(1))
                            ->from('department')
                            ->whereColumn('department.id', 'emp.department')
                            ->where('department.department', 'like', "%{$searchTerm}%");
                  });
            });
        }

        $employee = $query->get();
     
        // leave check
        foreach ($employee as $employe) {

            $isOnLeave = Leaves::where('emp_id', $employe->emp_id)
                ->where(function ($query) use ($dateToCheck) {
                    $query->whereDate('from', '<=', $dateToCheck)
                        ->whereDate('to', '>=', $dateToCheck);
                })
                ->exists();
            if ($isOnLeave) {
                Attendance::updateOrCreate(
                    [
                        'emp_id' => $employe->id,
                        'date' => $dateToCheck
                    ],
                    [
                        'site_id' => $employe->site,
                        'punch_in' => '',
                        'punch_out' => '',
                        'designation_id' => $employe->designation,
                        'attendance_status' => 0,
                        'overtime' => '0000-00-00 00:00:00'
                    ]
                );
            }
            return view('attendance_list', compact('department_name', 'site_name', 'designation', 'employee'));
        }
        return view('attendance_list', compact('department_name', 'site_name', 'designation', 'employee'));

        

    }
    public function AttendanceSearch(Request $request, $id = null)
    {
        // Get static data
        $site_name = DB::table('location_site')->get();
        $designation = DB::table('designation')->get();

        // Initialize variables
        $department_name = null;
        $employee = collect(); // Empty collection as default


        if ($request->filled('empid')) {
            $employee = AllEmployeeEmp::where("emp_id", $request->empid)
                ->get();
        }
        // Search by Site
        elseif ($request->filled('site_name')) {
            $employee = AllEmployeeEmp::where("site", $request->site_name)
                ->get();
        }
        // Search by Designation
        elseif ($request->filled('designation')) {
            $employee = AllEmployeeEmp::where("designation", $request->designation)
                ->get();
        }

        // Get unique department names if employees found
        if ($employee->isNotEmpty()) {
            $department_name = $employee->first()->departmentRelation->department ?? null;
        }

        return view('attendance_list', compact(
            'department_name',
            'site_name',
            'designation',
            'employee'
        ));
    }

    public function MyAttendance()
    {
        $date = Carbon::now()->format('Y-m-d');
        $user = Auth::user();
        $site_name = DB::table('location_site')->where('id', $user->site)->first();
        // dd($site_name);
        // dd($user->emp_id);
        $employee = AllEmployeeEmp::where("id", $user->id)->get();
        $department_name = Department::where("id", $user->department)->first()->department;
        $leave = Leaves::where('emp_id', $user->emp_id)->count();
        // dd($employee);
        // $attendence = Attendance::where('emp_id', $user->id)->get();
        $attendence = DB::table('attendance')
            ->leftJoin('emp', 'emp.id', '=', 'attendance.emp_id')
            ->leftJoin('location_site', 'emp.site', '=', 'location_site.id')
            ->where('attendance.emp_id', $user->id)
            ->select(
                'attendance.*',
                'location_site.*',
                'location_site.site_name as site_name'  // Using alias for clarity
            )
            ->orderBy('attendance.id', 'desc')  // Sorting by attendance ID in descending order
            ->get();
        // dd($attendence);

        $todayAttendance = Attendance::where('attendance.emp_id', $user->id)
            ->leftJoin('emp', 'attendance.emp_id', '=', 'emp.id')
            ->leftJoin('location_site', 'emp.site', '=', 'location_site.id')
            ->whereDate('attendance.date', $date)
            ->select('attendance.*', 'emp.site', 'emp.site', 'location_site.site_name')
            ->first();

        $today = Carbon::now();
        $formattedDate = $today->format('D, jS M Y');
        $userId = auth()->id(); // or get from request if admin view
        $report = Attendance::getTimeAnalysis($userId);
        // $report = Attendance::getCurrentMonthWorkingHours($userId);
        // dd($report);
        $today = $report['today'];
        $week = $report['week'];
        $month = $report['month'];
        return view('my-attendance', compact('department_name', 'employee', 'attendence', 'leave', 'todayAttendance', 'formattedDate', 'today', 'month', 'week','site_name'));
    }
}
