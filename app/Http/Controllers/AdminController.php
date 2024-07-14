<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        $data['fetchedRecord'] = User::getAdminRec();
        $data['headerTitle'] = 'Admin List';
        return view('admin.admin.list', $data);
        
    }
    public function create()
    {
        $data['headerTitle'] = 'Add New Admin';
        return view('admin.admin.add', $data);
    }

    public function store(Request $request){
        $request->validate([
            'role' => 'required',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'birth_date' => 'required|date',
            'gender' => 'required|string',
            'joined_date' => 'required|date',
            'nic' => 'required|string',
            'mobile_number' => 'required|string',
            'address' => 'nullable|string',
            'email' => 'required|email|unique:users',
            'prof_pic' => 'nullable|mimes:png,jpg,jpeg,webp',
            'status' => 'required|string',
            'password' => 'required|string',

        ]);
        $fileName = 'logging_page.png';

        if ($request->has('prof_pic')) {
            
            $file = $request->file('prof_pic');
            $extension = $file->getClientOriginalExtension();

            $fileName = $request->emp_id . '_' . date("Ymd").time() . '.' . $extension;

            $file->move('uploads/profile_img/', $fileName);
        }

        $user = new User();

        $user->role = trim($request->role);
        $user->first_name = trim($request->first_name);
        $user->last_name = trim($request->last_name);
        $user->birth_date = $request->birth_date;
        $user->gender = $request->gender;
        $user->joined_date = $request->joined_date;
        $user->nic = trim($request->nic);
        $user->mobile_number = trim($request->mobile_number);
        $user->address = $request->address;
        $user->email = trim($request->email);

        $user->prof_pic = $fileName;

        $user->role = 'Admin';
        $user->status = $request->status;
        $user->password = Hash::make($request->password);

        $user->save();

        return redirect('admin/admin/list')->with('success', 'Admin User Created Succesfully');
    }   
}
