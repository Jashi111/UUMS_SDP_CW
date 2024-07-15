<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function index(){

        if(Auth::user()->role == 'Admin'){

        $data['headerTitle'] = 'Dashboard';
        $data['adminCount'] = User::getUserRec('Admin');
        $data['staffCount'] = User::getUserRec('Staff');
        $data['lecturerCount'] = User::getUserRec('Lecturer');
        $data['studentCount'] = User::getUserRec('Student');

        return view('admin.dashboard', $data);
        }

        elseif(Auth::user()->role == 'Staff'){

            $data['headerTitle'] = 'Dashboard';
            $data['lecturerCount'] = User::getUserRec('Lecturer');
            $data['studentCount'] = User::getUserRec('Student');
    
            return view('managementStaff.dashboard', $data);

        }

        elseif(Auth::user()->role == 'Lecturer'){

            $data['headerTitle'] = 'Dashboard';
            $data['studentCount'] = User::getUserRec('Student');
            return view('lecturer.dashboard', $data);
            
        }

        elseif(Auth::user()->role == 'Student'){
    
            return view('student.dashboard');
            
        }

    }
}
