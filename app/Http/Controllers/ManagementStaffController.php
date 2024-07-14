<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ManagementStaffController extends Controller
{
    public function index()
    {
        $data['fetchedRecord'] = User::getStaffRec();
        $data['headerTitle'] = 'Admin List';
        return view('admin.managementStaff.list', $data);
        
    }
}
