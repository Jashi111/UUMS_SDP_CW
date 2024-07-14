<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class LecturerController extends Controller
{
    public function index()
    {
        $data['fetchedRecord'] = User::getLecturerRec();
        $data['headerTitle'] = 'Lecturer List';
        return view('admin.lecturers.list', $data);
        
    }
}
