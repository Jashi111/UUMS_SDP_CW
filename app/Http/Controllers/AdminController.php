<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        $data['fetchedRecord'] = User::getAdminRec();
        $data['headerTitle'] = 'Admin List';
        return view('admin.admin.list', $data);
        
    }
}
