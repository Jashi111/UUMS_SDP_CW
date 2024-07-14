<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\TempStudentModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

    public function storeNewStudent(Request $request){
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
            'academic_year' => 'required|string',
            'school' => 'required|string',
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

        $tempUser = TempStudentModel::getTempStudentRec($request->email);

        $user = new User();

        $user->role = trim($request->role);
        $user->first_name = trim($request->first_name);
        $user->last_name = trim($request->last_name);
        $user->birth_date = $request->birth_date;
        $user->gender = $request->gender;
        $user->joined_date = $request->joined_date;
        $user->academic_year = trim($request->academic_year);
        $user->school = trim($request->school);
        $user->nic = trim($request->nic);
        $user->mobile_number = trim($request->mobile_number);
        $user->address = $request->address;
        $user->email = trim($request->email);

        $user->prof_pic = $fileName;

        $user->role = 'Student';
        $user->status = $request->status;
        $user->password = Hash::make($request->password);

        $user->save();


        $tempUser->delete();

        return redirect('/')->with('success', 'Student Created Succesfully.Please Login');
    }
}
