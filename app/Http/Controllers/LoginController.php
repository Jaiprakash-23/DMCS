<?php

namespace App\Http\Controllers;
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
                    "email"=>"required|exists:users,email",
                    "password"=>"required",
        ]);
        dd($data);
        $user=User::where("email",$data['email'])->first();
        if($user && Hash::check($data['password'],$user->password)){
                  Auth::login($user);
                  $role=Auth::user()->role->name;
                  switch($role){
                    case "admin":return redirect()->route("admin.dashboard")->with("success","Login Successful");
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
