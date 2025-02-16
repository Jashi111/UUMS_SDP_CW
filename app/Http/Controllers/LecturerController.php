<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\LecturerMaterialModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LecturerController extends Controller
{
    public function index()
    {
        $data['fetchedRecord'] = User::getLecturerRec();
        $data['headerTitle'] = 'Lecturer List';
        return view('admin.lecturers.list', $data);
        
    }

    public function create()
    {
        $data['headerTitle'] = 'Add New Lecturer';
        return view('admin.lecturers.add', $data);
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

        $user->role = 'Lecturer';
        $user->status = $request->status;
        $user->password = Hash::make($request->password);

        $user->save();

        return redirect('admin/lecturers/list')->with('success', 'Lecturer Created Succesfully');
    } 

    public function show(string $id)
    {
        $data['fetchedRecord'] = User::getRecByID($id);

        if (!empty($data['fetchedRecord'])) {
            
            $data['headerTitle'] = 'Lecturer Info.';
            return view('admin.lecturers.view', $data);

        } else {
            
            abort(404);
        }
        
    } 

    public function edit(string $id)
    {
        $data['fetchedRecord'] = User::getRecByID($id);

        if (!empty($data['fetchedRecord'])) {
            
            $data['headerTitle'] = 'Edit Lecturer Info.';
            return view('admin.lecturers.edit', $data);

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

        return redirect('admin/lecturers/list')->with('success', 'Lecturer Info Updated Succesfully');
    }

    public function destroy(string $id)
    {
        $user = User::getRecByID($id);
        $user->delete();

        return redirect('admin/lecturers/list')->with('success', 'Lecturer info Deleted Succesfully');
    }

    public function indexLM()
    {
        $data['fetchedRecord'] = LecturerMaterialModel::getLMRec();
        $data['headerTitle'] = 'Lecture Material List';
        return view('lecturer.list', $data);
        
    }

    public function createLM()
    {
        $data['headerTitle'] = 'Add New Lecture Material';
        return view('lecturer.add', $data);
    }

    public function storeLM(Request $request){
        $request->validate([
            'subject' => 'required|string',
            'document_name' => 'required|string',
            'file' => 'required|mimes:png,jpg,jpeg,webp,pdf,docx',

        ]);

        if ($request->has('file')) {
            
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();

            $fileName = $request->subject . '_' . date("Ymd").time() . '.' . $extension;

            $file->move('uploads/lMaterials/', $fileName);
        }

        $mat = new LecturerMaterialModel();

        $mat->subject = trim($request->subject);
        $mat->document_name = trim($request->document_name);

        $mat->file = $fileName;

        $mat->lecturer = Auth::user()->email;
        $mat->addeddate = now();


        $mat->save();

        return redirect('studyMaterials')->with('success', 'Materials Added Succesfully');
    } 

    
}
