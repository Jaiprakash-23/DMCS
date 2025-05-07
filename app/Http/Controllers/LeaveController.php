<?php

namespace App\Http\Controllers;

use App\Models\Leaves;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LeaveController extends Controller
{
    public function ApplyLeave()
    {
        return view('apply_leave');
    }

    public function ApplyLeaveSave(Request $request)
    {
        // dd($request->post());
        $request->validate([
            "description" => "required",
            "subject" => "required",
            'from' => 'required',
            'to' => 'required',
        ]);
        $data = Auth::user();
        $emp_id = $data->emp_id;

        if ($emp_id) {
            Leaves::create([
                "emp_id" => $emp_id,
                "subject" => $request->subject,
                "description" => $request->description,
                "from" => $request->from,
                "to" => $request->to,
                "site" => $data->site,
                'designation' => $data->designation,
            ]);
        }
        return redirect()->route('apply_leave')->with('success', 'Leave apply successfully');
    }

    public function AllLeave(Request $request)
    {
        $data = Auth::user();
        // dd(Auth::user()->department);
        // dd($data->designation, $data->site,$data->reports_to,$data);
        if(Auth::user()->department == 1){
            $query = DB::table('leaves')
                ->leftJoin('emp', 'leaves.emp_id', '=', 'emp.emp_id')
                ->select('leaves.*', 'emp.fullname as employee_name');

        }else if(Auth::user()->department == 2){
            $query = DB::table('leaves')
                ->leftJoin('emp', 'leaves.emp_id', '=', 'emp.emp_id')
                ->where('emp.site', $data->site)
                ->where('emp.department', ['3'])
                ->select('leaves.*', 'emp.fullname as employee_name');
        }else if(Auth::user()->department == 3){
            $query = DB::table('leaves')
                ->leftJoin('emp', 'leaves.emp_id', '=', 'emp.emp_id')
                ->where('emp.site', $data->site)
                ->where('emp.department', ['4'])
                ->select('leaves.*', 'emp.fullname as employee_name');
        }else if(Auth::user()->department == 4){
            $query = DB::table('leaves')
                ->leftJoin('emp', 'leaves.emp_id', '=', 'emp.emp_id')
                ->where('emp.site', $data->site)
                ->where('emp.department', '5')
                ->select('leaves.*', 'emp.fullname as employee_name');
        }else{
            $query = DB::table('leaves')
                ->leftJoin('emp', 'leaves.emp_id', '=', 'emp.emp_id')
                ->where('emp.site', $data->site)
                ->where('emp.department', $data->department)
                ->where('emp.reports_to', $data->reports_to)
                ->select('leaves.*', 'emp.fullname as employee_name');
        }

        // Add search functionality if search term exists
        if ($request->filled('search')) {
            $searchTerm = $request->search;
            $query->where(function ($q) use ($searchTerm) {
                $q->where('emp.fullname', 'like', "%{$searchTerm}%")
                    ->orWhere('leaves.emp_id', 'like', "%{$searchTerm}%")
                    ->orWhere('leaves.status', 'like', "%{$searchTerm}%");
            });
        }

        $leave = $query->get();

        return view('all_leave', compact('leave'));
    }

    public function LeaveApprove($id)
    {
        // dd($id);
        $leave = Leaves::where('id', $id)->first();
        ;
        //    dd($leave);
        $leave->status = 'Approved';
        $leave->save();
        return back()->with('message', 'leave Approved successfully');
    }
    public function LeaveReject($id)
    {
        // dd($id);
        $leave = Leaves::where('id', $id)->first();
        ;
        //    dd($leave);
        $leave->status = 'Rejected';
        $leave->save();
        return back()->with('message', 'leave Approved successfully');
    }

    public function ToDayLeave()
    {
        $userDept = Auth::user()->department;
        $userSite = Auth::user()->site;
        $data = Auth::user();
        $today = Carbon::today()->format('Y-m-d');
        // dd($today);
        // $leave = DB::table('leaves')
        //     ->leftJoin('emp', 'leaves.emp_id', '=', 'emp.emp_id')
        //     ->select('leaves.*', 'emp.fullname as employee_name')
        //     ->get();
        $leave = DB::table('leaves')
            ->leftJoin('emp', 'leaves.emp_id', '=', 'emp.emp_id')
            ->whereDate('leaves.created_at', $today)
            ->select('leaves.*', 'emp.fullname as employee_name')
            ->where(function($query) use ($userDept) {
                // Admin sees all departments >1
                if ($userDept == 1) {
                    $query->where('emp.department', '>', 1);
                }
                // Manager sees departments >=2
                elseif ($userDept == 2) {
                    $query->where('emp.department', '>=', 2);
                }
                // Officer sees departments >=3
                elseif ($userDept == 3) {
                    $query->where('emp.department', '>=', 3);
                }
                // Supervisor sees departments >=4
                elseif ($userDept == 4) {
                    $query->where('emp.department', '>=', 4);
                }
                // Others see only their department (if >1)
                else {
                    $query->where('emp.department', $userDept);
                }
            })
            ->get();
        // dd($leave);
        return view('today_leave', compact('leave'));
    }


    public function EmpLeave()
    {
        $today = Carbon::today()->format('Y-m-d');
        $emp = Auth::user();
        // dd($emp->emp_id);
        $leave = DB::table('leaves')
            ->leftJoin('emp', 'leaves.emp_id', '=', 'emp.emp_id')
            ->where('leaves.emp_id', '=', $emp->emp_id)
            ->select('leaves.*', 'emp.fullname as employee_name')
            ->get();

        // $emp = Auth::user();
        // dd($emp->emp_id);
        // $leave = DB::table('leaves')
        //     ->leftJoin('emp', 'leaves.emp_id', '=', $emp->emp_id)
        //     ->select('leaves', 'emp.fullname as employee_name')
        //     ->get();
        return view('my_leave', compact('leave'));
    }
}
