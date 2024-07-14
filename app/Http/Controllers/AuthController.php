<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(){

        if (!empty(Auth::check())) {
            
            if(Auth::user()->role == 'Admin'){

                return redirect('admin/dashboard');
            }
            elseif(Auth::user()->role == 'Staff'){

                return redirect('managementStaff/dashboard');
            }
            elseif(Auth::user()->role == 'Lecturer'){

                return redirect('lecturer/dashboard');
            }
            elseif(Auth::user()->role == 'Student'){

                return redirect('student/dashboard');
            }

        }
        return view('auth.login');
    }

    public function authLogin(Request $request){
        $remember = !empty($request->remember) ? true : false;
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember)){
            if(Auth::user()->role == 'Admin' && Auth::user()->status == "Active"){

                return redirect('admin/dashboard');
            }
            elseif(Auth::user()->role == 'Staff' && Auth::user()->status == "Active"){

                return redirect('managementStaff/dashboard');
            }
            elseif(Auth::user()->role == 'Lecturer' && Auth::user()->status == "Active"){

                return redirect('lecturer/dashboard');
            }
            elseif(Auth::user()->role == 'Student' && Auth::user()->status == "Active"){

                return redirect('student/dashboard');
            }
            else {
                Auth::logout();
                return redirect()->back()->with('error', 'Your User Credentials has been Revoked');
            }

        }
        else{
            return redirect()->back()->with('error', 'Please Enter Correct User Name and Password');
        }
    }
    public function authLogout(){

        Auth::logout();
        return redirect(url(''));

    }
    
}
