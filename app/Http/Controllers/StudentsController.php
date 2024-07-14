<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class StudentsController extends Controller
{
    public function index()
    {
        $data['fetchedRecord'] = User::getStudentsRec();
        $data['headerTitle'] = 'Student List';
        return view('admin.students.list', $data);
        
    }
}
