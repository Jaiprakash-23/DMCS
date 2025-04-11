<?php

namespace App\Http\Controllers;
use App\Models\AllEmployeeEmp;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Exists;

class LoginController extends Controller
{
    public function ShowLog()
    {
        // dd("hello");
        return view('login');
    }

    public function LoginMatch(Request $request){

       $data= $request->validate([
                    "email"=>"required|email",
                    "password"=>"required",
        ]);

        $user=AllEmployeeEmp::where("email",$data['email'])->first();

        // if($user && Hash::check($data['password'],$user->password)){
        if($user->email==$data['email'] && $user->phone==$data['password']){
                //   Auth::login();
                  $role=$user->designation;
                //   dd($role);
                  switch($role){
                    case "7":return redirect()->route("admin.dashboard")->with("success","Login Successful");
                    case "super_admin":return redirect()->route("super_admin.dashboard")->with("success","Login Successful");
                    case "user":return redirect()->route("user.dashboard")->with("success","Login Successful");
                    case "vendor":return redirect()->route("vendor.dashboard")->with("success","Login Successful");
                    default :return redirect()->route("login")->with("error","Unauthorized Access");
                  }
        }else{
              return redirect()->back()->with("error","Wrong Credentials");
        }

    }

    public function logout(){
        if(Auth::check()){
            Auth::logout();
            return redirect()->route('login')->with("success","Logout Successful");

        }
      return redirect('/');
    }
}
