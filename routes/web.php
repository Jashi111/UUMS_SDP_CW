<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ManagementStaffController;
use App\Http\Controllers\LecturerController;
use App\Http\Controllers\StudentsController;

// Route::get('admin/dashboard', function () {
//     return view('welcome');
// });

Route::get('/', [AuthController::class, 'login']);
Route::post('login', [AuthController::class, 'authLogin']);
Route::get('logout', [AuthController::class, 'authLogout']);

//admin
Route::get('admin/dashboard', function () {
    return view('admin.dashboard');
});

Route::get('admin/admin/list', [AdminController::class, 'index']);
Route::get('admin/admin/add', [AdminController::class, 'create']);
Route::post('admin/admin/add', [AdminController::class, 'store']);

//management staff
Route::get('managementStaff/dashboard', function () {
    return view('managementStaff.dashboard');
});

Route::get('admin/managementStaff/list', [ManagementStaffController::class, 'index']);
Route::get('admin/managementStaff/add', [ManagementStaffController::class, 'create']);
Route::post('admin/managementStaff/add', [ManagementStaffController::class, 'store']);

//Lecturer
Route::get('lecturers/dashboard', function () {
    return view('lecturers.dashboard');
});

Route::get('admin/lecturers/list', [LecturerController::class, 'index']);

//Students
Route::get('students/dashboard', function () {
    return view('students.dashboard');
});

Route::get('admin/students/list', [StudentsController::class, 'index']);
