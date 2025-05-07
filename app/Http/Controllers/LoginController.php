<?php

namespace App\Http\Controllers;
use App\Models\AllEmployeeEmp;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class LoginController extends Controller
{
  public function ShowLog()
  {
    // dd("hello");
    return view('login');
  }

  public function LoginMatch(Request $request)
{
    $data = $request->validate([
        "email" => "required|email",
        "password" => "required",
    ]);

    $user = AllEmployeeEmp::where("email", $data['email'])->first();
    // dd(Hash::check($data['password'], $user->password));
    if (!$user || !Hash::check($data['password'], $user->password)) {
        return redirect()->back()->with("error", "Wrong Credentials");
    }

    Auth::guard('web')->login($user);
    return redirect()->route("admin.dashboard")->with("success", "Login Successful");
    // switch ($user->designation) {
    //     case "7":
    //         return redirect()->route("admin.dashboard")->with("success", "Login Successful");
    //     case "super_admin":
    //         return redirect()->route("super_admin.dashboard")->with("success", "Login Successful");
    //     case "user":
    //         return redirect()->route("user.dashboard")->with("success", "Login Successful");
    //     case "vendor":
    //         return redirect()->route("vendor.dashboard")->with("success", "Login Successful");
    //     default:
    //         Auth::guard('web')->logout();
    //         return redirect()->route("login")->with("error", "Unauthorized Access");
    // }
}

  public function logout()
  { 
    // dd('hello');
    if (Auth::check()) {
      Auth::logout();
      return redirect()->route('login')->with("success", "Logout Successful");

    }
    return redirect('/');
  }
}
