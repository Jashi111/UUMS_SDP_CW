<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\TempStudentModel;
use Illuminate\Support\Facades\Auth;

class StudentsController extends Controller
{
    public function index()
    {
        $data['fetchedRecord'] = User::getStudentsRec();
        $data['headerTitle'] = 'Student List';
        return view('admin.students.list', $data);
        
    }

    public function create()
    {
        $data['headerTitle'] = 'Add New Student';
        return view('admin.students.add', $data);
    }

    public function store(Request $request){
        $request->validate([
            'email' => 'required|unique:users',
            'email' => 'required|unique:temp_students',

        ]);

        $user = new TempStudentModel();

        $user->email = trim($request->email) . '@eureka.com';
        $user->addedby = Auth::user()->email;
        $user->addeddate = now();


        $user->save();

        return redirect('admin/students/list')->with('success', 'Student Created Succesfully');
    } 
}
