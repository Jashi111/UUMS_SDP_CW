<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ManagementStaffController extends Controller
{
    public function index()
    {
        $data['fetchedRecord'] = User::getStaffRec();
        $data['headerTitle'] = 'Management Staff List';
        return view('admin.managementStaff.list', $data);
        
    }

    public function create()
    {
        $data['headerTitle'] = 'Add New Staff';
        return view('admin.managementStaff.add', $data);
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
        $fileName = '123223.jpg';

        if ($request->has('prof_pic')) {
            
            $file = $request->file('prof_pic');
            $extension = $file->getClientOriginalExtension();

            $fileName = $request->email . '_' . date("Ymd").time() . '.' . $extension;

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

        $user->role = 'Staff';
        $user->status = $request->status;
        $user->password = Hash::make($request->password);

        $user->save();

        return redirect('admin/managementStaff/list')->with('success', 'Staff User Created Succesfully');
    } 

    public function show(string $id)
    {
        $data['fetchedRecord'] = User::getRecByID($id);

        if (!empty($data['fetchedRecord'])) {
            
            $data['headerTitle'] = 'Management Staff Info.';
            return view('admin.managementStaff.view', $data);

        } else {
            
            abort(404);
        }
        
    } 

    public function edit(string $id)
    {
        $data['fetchedRecord'] = User::getRecByID($id);

        if (!empty($data['fetchedRecord'])) {
            
            $data['headerTitle'] = 'Edit Staff Info.';
            return view('admin.managementStaff.edit', $data);

        } else {
            
            abort(404);
        }
    }

    public function update(Request $request, string $id)
    {

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
            'email' => 'required|email|unique:users,email,'.$id,
            'prof_pic' => 'nullable|mimes:png,jpg,jpeg,webp',
            'status' => 'required|string',
        ]);


        $user = User::getRecByID($id);

        // $user->emp_id = trim($request->emp_id); This Should not be updated.
        $user->first_name = trim($request->first_name);
        $user->last_name = trim($request->last_name);
        $user->birth_date = $request->birth_date;
        $user->gender = $request->gender;
        $user->joined_date = $request->joined_date;
        $user->nic = trim($request->nic);
        $user->mobile_number = trim($request->mobile_number);
        $user->address = $request->address;
        $user->email = trim($request->email);
        $user->status = $request->status;

        if (!empty($request->file('prof_pic'))) {
            
            $file = $request->file('prof_pic');
            $extension = $file->getClientOriginalExtension();

            $fileName = $request->email . '_' . date("Ymd").time() . '.' . $extension;

            $file->move('uploads/profile_img/', $fileName);

            $user->prof_pic = $fileName;

        }
    

        if (!empty($request->password)) {
            $user->password = Hash::make($request->password);
        }
        
        $user->save();

        return redirect('admin/managementStaff/list')->with('success', 'Staff Info Updated Succesfully');
    }

    public function destroy(string $id)
    {
        $user = User::getRecByID($id);
        $user->delete();

        return redirect('admin/managementStaff/list')->with('success', 'Staff User Deleted Succesfully');
    }
}
