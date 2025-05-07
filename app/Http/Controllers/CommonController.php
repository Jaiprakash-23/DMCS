<?php

namespace App\Http\Controllers;

use App\Models\Designation;
use App\Models\Department;
use App\Models\Attendance;
use App\Models\AllEmployeeEmp;
use App\Models\Generate_salary;
use App\Models\SalaryDistribution;
use Carbon\Carbon;
use DateInterval;
use DateTime;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommonController extends Controller
{
  public function GetDesignation(Request $request)
  {
    $responce = array();
    $data = Designation::where("dept_id", $request->department_id)->get();
    $department = Department::where("id", $request->department_id)->first();
    $report_data = Department::where("id", $department->report_id)->first();
    $responce['designation'] = $data;
    $responce['report_data'] = $report_data;
    return response()->json($responce);
  }
  public function UpdateTime(Request $request)
  {
    $input = $request->input('time');
    $user = Auth::user();
    $date = Carbon::now()->format('Y-m-d');
    // dd($user->id);
    // dd($user);
    $attendence = Attendance::where('emp_id', $user->id)
      ->where('date', $date)
      ->first();
    $attendence->on_duty_time = $input;
    $attendence->save();
    return response()->json(['input' => $input]);
  }
  // public function PresentAbsent(Request $request)
  // {
  //   $responce = array();
  //   $emp_id = $request->emp_id;
  //   $date = $request->date;
  //   $status_id = $request->status_id;
  //   $emp = AllEmployeeEmp::where("id", $emp_id)->first();
  //   $check_attendance = Attendance::where("emp_id", $emp_id)->where("date", date("Y-m-d", strtotime($date)))->first();
  //   if (empty($check_attendance)) {
  //     $insert_check = Attendance::create([
  //       "emp_id" => $emp_id,
  //       "site_id" => $emp->site,
  //       "designation_id" => $emp->designation,
  //       "attendance_status" => $status_id,
  //       "date" => date("Y-m-d", strtotime($date)),
  //       "created_at" => $date,
  //     ]);
  //     if ($insert_check) {
  //       $responce['status'] = "1";
  //       $responce['status_id'] = $status_id;
  //       $responce['msg'] = "Date Insert Successfully";
  //     } else {
  //       $responce['status'] = "0";
  //       $responce['status_id'] = $status_id;
  //       $responce['msg'] = "some error";
  //     }
  //   } else {
  //     $responce['status'] = "0";
  //     $responce['status_id'] = $status_id;
  //     $responce['msg'] = "Today Already Attendance Approved";
  //   }
  //   return response()->json($responce);
  // }


  public function punch_out(Request $request)
  {
    $responce = array();
    $emp_id = $request->emp_id;
    $date = $request->date;
    $status_id = $request->status_id;
    $emp = AllEmployeeEmp::where("id", $emp_id)->first();
    $check_attendance = Attendance::where("emp_id", $emp_id)->where("date", date("Y-m-d", strtotime($date)))->first();
    $check_attendance->attendance_status = $status_id;
    $check_attendance->punch_out = $date;
    $datetime1 = new DateTime($check_attendance->punch_in);
    $datetime2 = new DateTime(now()->format('H:i:s'));
    $interval = $datetime1->diff($datetime2);
    $check_attendance->working = $interval->format('%H:%I:%S');
    $diff = $datetime1->diff($datetime2);
    $totalHours = $diff->h + ($diff->i / 60) + ($diff->s / 3600);
    $site_name = DB::table('location_site')->where('id', $emp->site)->first();

    $standardHours = $site_name->duty;
    if ($totalHours > $standardHours) {
      $overtimeHours = $totalHours - $standardHours;
      $overtimeInterval = new DateInterval('PT' . (int) $overtimeHours . 'H');

      // If you want to store it as an interval string
      $check_attendance->overtime = $overtimeInterval->format('P%yY%mM%dDT%hH%iM%sS');

      // OR if you want to calculate an overtime end time based on a start time
      $overtimeEnd = (new DateTime())->add($overtimeInterval);
      $check_attendance->overtime = $overtimeEnd->format('Y-m-d H:i:s');
      $overtome = $totalHours - $standardHours;
      $salary_tbl = SalaryDistribution::where("site_name", $emp->site)->where("designation", $emp->designation)->first();
      
      $isGenerate = Generate_salary::where("emp_id", $emp->id)
        ->whereYear("created", date('Y'))
        ->whereMonth("created", date('m'))
        ->first();
      if ($isGenerate) {
        $one_daye_salary = $salary_tbl->salary_amount / 30;
        $hour_per_day = $one_daye_salary / 8;
        $overtime_salary = $hour_per_day * $overtome;
        $isGenerate->net_pay = $isGenerate->net_pay + $overtime_salary;
        $isGenerate->save();
      }
    }
    $check_attendance->save();
    $responce['status'] = "2";
    return response()->json($responce);
  }

  public function PresentAbsent(Request $request)
  {
    
    $responce = array();
    $emp_id = $request->emp_id;
    $date = $request->date;
    $status_id = $request->status_id;
    $emp = AllEmployeeEmp::where("id", $emp_id)->first();
    $check_attendance = Attendance::where("emp_id", $emp_id)->where("date", date("Y-m-d", strtotime($date)))->first();
    if (empty($check_attendance)) {
      if ($status_id == 1) {
        $insert_check = Attendance::create([
          "emp_id" => $emp_id,
          "site_id" => $emp->site,
          "punch_in" => $date,
          "designation_id" => $emp->designation,
          "attendance_status" => $status_id,
          "date" => date("Y-m-d", strtotime($date)),
          "created_at" => $date,
        ]);
        $month = date("m", strtotime($date));
        $year = date("Y", strtotime($date));
        $firstDate = date('Y-m-01', strtotime("$year-$month-01"));
        $lastDate = date('Y-m-t', strtotime("$year-$month-01"));
        $total_days = date("d", strtotime($lastDate));
        $emp = AllEmployeeEmp::where('id', $emp_id)->first();
        $department_emp = Department::where('id', $emp->department)->first();
        $designation_emp = Designation::where('id', $emp->designation)->first();
        $attendance = Attendance::where("emp_id", $emp->id)->where('date', '>=', $firstDate)->where('date', '<=', $lastDate)->get();
        $today = Carbon::today()->toDateString();
        $todaysAttendance = Attendance::where('emp_id', $emp->id)
          ->whereDate('created_at', $today)
          ->first();

        if ($todaysAttendance->attendance_status == 1) {
          $salary_tbl = SalaryDistribution::where("site_name", $emp->site)->where("designation", $emp->designation)->first();

          $one_daye_salary = $salary_tbl->salary_amount / $total_days;
          
          $isGenerate = Generate_salary::where("emp_id", $emp->id)
            ->whereYear("created", date('Y'))
            ->whereMonth("created", date('m'))
            ->first();

          if ($isGenerate) {
            $isGenerate->net_pay = $isGenerate->net_pay + $one_daye_salary;
            $isGenerate->save();
          } else {
           
            Generate_salary::create([
              "emp_id" => $emp->id,
              "salary_month" => $salary_tbl->salary_amount,
              "net_pay" => $one_daye_salary,
            ]);
          }


        }
        if ($insert_check) {
          $responce['status'] = "1";
          $responce['status_id'] = $status_id;
          $responce['msg'] = "Date Insert Successfully";
        } else {
          $responce['status'] = "0";
          $responce['status_id'] = $status_id;
          $responce['msg'] = "some error";
        }
      } else {
        $insert_check = Attendance::create([
          "emp_id" => $emp_id,
          "site_id" => $emp->site,
          "punch_in" => $date,
          "designation_id" => $emp->designation,
          "attendance_status" => $status_id,
          "date" => date("Y-m-d", strtotime($date)),
          "created_at" => $date,
        ]);
        if ($insert_check) {
          $responce['status'] = "1";
          $responce['status_id'] = $status_id;
          $responce['msg'] = "Date Insert Successfully";
        } else {
          $responce['status'] = "0";
          $responce['status_id'] = $status_id;
          $responce['msg'] = "some error";
        }
      }


    } else {
      $responce['status'] = "0";
      $responce['status_id'] = $status_id;
      $responce['msg'] = "Today Already Attendance Approved";
    }
    return response()->json($responce);
  }




  public function getSalary($id, $date)
  {
    $month = date("m", strtotime($date));
    $year = date("Y", strtotime($date));
    $firstDate = date('Y-m-01', strtotime("$year-$month-01"));
    $lastDate = date('Y-m-t', strtotime("$year-$month-01"));
    $total_days = date("d", strtotime($lastDate));
    $emp = AllEmployeeEmp::where('id', $id)->first();
    $attendance = Attendance::where("emp_id", $emp->id)->where('date', '>=', $firstDate)->where('date', '<=', $lastDate)->get();
    $total_salary = 0;
    foreach ($attendance as $at) {
      $salary_tbl = SalaryDistribution::where("site_name", Auth::user()->site)->where("designation", $at->designation_id)->first();
      // dd($salary_tbl);
      if ($at->attendance_status == 1) {
        $one_daye_salary = $salary_tbl->salary_amount / $total_days;
        $total_salary += $one_daye_salary;
      }
    }
    return $total_salary;
  }
}






// public function punch_out(Request $request)
//   {
//     $responce = array();
//     $emp_id = $request->emp_id;
//     $date = $request->date;
//     $status_id = $request->status_id;
//     $emp = AllEmployeeEmp::where("id", $emp_id)->first();
//     $check_attendance = Attendance::where("emp_id", $emp_id)->where("date", date("Y-m-d", strtotime($date)))->first();
//     $check_attendance->attendance_status = $status_id;
//     $check_attendance->punch_out = $date;
//     $datetime1 = new DateTime($check_attendance->punch_in);
//     $datetime2 = new DateTime(now()->format('H:i:s'));
//     $interval = $datetime1->diff($datetime2);

//     $check_attendance->working = $interval->format('%H:%I:%S');
//     $diff = $datetime1->diff($datetime2);
//     $totalHours = $diff->h + ($diff->i / 60) + ($diff->s / 3600);
//     $standardHours = 1;
//     if ($totalHours > $standardHours) {
//       // $overtime = $totalHours - $standardHours;
//       // $check_attendance->overtime = $overtime;
//       $overtimeHours = $totalHours - $standardHours;

//       // Create a DateInterval representing the overtime
//       $overtimeInterval = new DateInterval('PT' . (int) $overtimeHours . 'H');

//       // If you want to store it as an interval string
//       $check_attendance->overtime = $overtimeInterval->format('P%yY%mM%dDT%hH%iM%sS');

//       // OR if you want to calculate an overtime end time based on a start time
//       $overtimeEnd = (new DateTime())->add($overtimeInterval);
//       $check_attendance->overtime = $overtimeEnd->format('Y-m-d H:i:s');
//     }



//     $check_attendance->save();
//     $responce['status'] = "2";
//     return response()->json($responce);
//   }


//   public function PresentAbsent(Request $request)
//   {

//     $responce = array();
//     $emp_id = $request->emp_id;
//     $date = $request->date;
//     $status_id = $request->status_id;
//     $emp = AllEmployeeEmp::where("id", $emp_id)->first();
//     $check_attendance = Attendance::where("emp_id", $emp_id)->where("date", date("Y-m-d", strtotime($date)))->first();
//     if (empty($check_attendance)) {
//       $insert_check = Attendance::create([
//         "emp_id" => $emp_id,
//         "site_id" => $emp->site,
//         "punch_in" => $date,
//         "designation_id" => $emp->designation,
//         "attendance_status" => $status_id,
//         "date" => date("Y-m-d", strtotime($date)),
//         "created_at" => $date,
//       ]);




//         $month = date("m", strtotime($date));
//         $year = date("Y", strtotime($date));
//         $firstDate = date('Y-m-01', strtotime("$year-$month-01"));
//         $lastDate = date('Y-m-t', strtotime("$year-$month-01"));
//         $total_days = date("d", strtotime($lastDate));
//         $emp = AllEmployeeEmp::where('id', $emp_id)->first();
//         $department_emp = Department::where('id', $emp->department)->first();
//         $designation_emp = Designation::where('id', $emp->designation)->first();
//         $attendance = Attendance::where("emp_id", $emp->id)->where('date', '>=', $firstDate)->where('date', '<=', $lastDate)->get();
//         $today = Carbon::today()->toDateString();
//         $todaysAttendance = Attendance::where('emp_id', $emp->id)
//             ->whereDate('created_at', $today)
//             ->first();

//         if ($todaysAttendance->attendance_status == 1) {
//             $salary_tbl = SalaryDistribution::where("site_name", $emp->site)->where("designation", $emp->designation)->first();

//             $one_daye_salary = $salary_tbl->salary_amount / $total_days;
//             $isGenerate = Generate_salary::where("emp_id", $emp->id)
//                 ->whereYear("created", date('Y'))
//                 ->whereMonth("created", date('m'))
//                 ->first();

//             if ($isGenerate) {
//                 $isGenerate->net_pay = $isGenerate->net_pay + $one_daye_salary;
//                 $isGenerate->save();
//             } else {
//                 Generate_salary::create([
//                     "emp_id" => $emp->id,
//                     "salary_month" => $salary_tbl->salary_amount,
//                     "net_pay" => $one_daye_salary,
//                 ]);
//             }




















//       if ($insert_check) {
//         $responce['status'] = "1";
//         $responce['status_id'] = $status_id;
//         $responce['msg'] = "Date Insert Successfully";
//       } else {
//         $responce['status'] = "0";
//         $responce['status_id'] = $status_id;
//         $responce['msg'] = "some error";
//       }
//     } else {
//       $responce['status'] = "0";
//       $responce['status_id'] = $status_id;
//       $responce['msg'] = "Today Already Attendance Approved";
//     }
//     return response()->json($responce);
//   }

//   public function getSalary($id, $date)
//   {
//     $month = date("m", strtotime($date));
//     $year = date("Y", strtotime($date));
//     $firstDate = date('Y-m-01', strtotime("$year-$month-01"));
//     $lastDate = date('Y-m-t', strtotime("$year-$month-01"));
//     $total_days = date("d", strtotime($lastDate));
//     $emp = AllEmployeeEmp::where('id', $id)->first();
//     $attendance = Attendance::where("emp_id", $emp->id)->where('date', '>=', $firstDate)->where('date', '<=', $lastDate)->get();
//     $total_salary = 0;
//     foreach ($attendance as $at) {
//       $salary_tbl = SalaryDistribution::where("site_name", $at->site_id)->where("designation", $at->designation_id)->first();
//       if ($at->attendance_status == 1) {
//         $one_daye_salary = $salary_tbl->salary_amount / $total_days;
//         $total_salary += $one_daye_salary;
//       }
//     }
//     return $total_salary;
//   }
// }
