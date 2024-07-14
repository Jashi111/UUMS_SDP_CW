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
Route::get('admin/admin/{id}/view', [AdminController::class, 'show']);
Route::get('admin/admin/{id}/edit', [AdminController::class, 'edit']);
Route::post('admin/admin/{id}/edit', [AdminController::class, 'update']);

//management staff
Route::get('managementStaff/dashboard', function () {
    return view('managementStaff.dashboard');
});

Route::get('admin/managementStaff/list', [ManagementStaffController::class, 'index']);
Route::get('admin/managementStaff/add', [ManagementStaffController::class, 'create']);
Route::post('admin/managementStaff/add', [ManagementStaffController::class, 'store']);
Route::get('admin/managementStaff/{id}/view', [ManagementStaffController::class, 'show']);
Route::get('admin/managementStaff/{id}/edit', [ManagementStaffController::class, 'edit']);
Route::post('admin/managementStaff/{id}/edit', [ManagementStaffController::class, 'update']);

//Lecturer
Route::get('lecturers/dashboard', function () {
    return view('lecturers.dashboard');
});

Route::get('admin/lecturers/list', [LecturerController::class, 'index']);
Route::get('admin/lecturers/add', [LecturerController::class, 'create']);
Route::post('admin/lecturers/add', [LecturerController::class, 'store']);
Route::get('admin/lecturers/{id}/view', [LecturerController::class, 'show']);
Route::get('admin/lecturers/{id}/edit', [LecturerController::class, 'edit']);
Route::post('admin/lecturers/{id}/edit', [LecturerController::class, 'update']);

//Students
Route::get('students/dashboard', function () {
    return view('students.dashboard');
});

Route::get('admin/students/list', [StudentsController::class, 'index']);

//Management Staff Login
Route::get('managementStaff/lecturers/list', [LecturerController::class, 'index']);
Route::get('managementStaff/lecturers/add', [LecturerController::class, 'create']);
Route::post('managementStaff/lecturers/add', [LecturerController::class, 'store']);
Route::get('managementStaff/lecturers/{id}/view', [LecturerController::class, 'show']);
Route::get('managementStaff/lecturers/{id}/edit', [LecturerController::class, 'edit']);
Route::post('managementStaff/lecturers/{id}/edit', [LecturerController::class, 'update']);