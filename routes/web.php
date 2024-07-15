<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ManagementStaffController;
use App\Http\Controllers\LecturerController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;

// Route::get('admin/dashboard', function () {
//     return view('welcome');
// });

Route::get('/', [AuthController::class, 'login']);
Route::post('login', [AuthController::class, 'authLogin']);
Route::get('logout', [AuthController::class, 'authLogout']);


Route::get('students/prereg', [AuthController::class, 'preReg']);
Route::post('students/prereg', [AuthController::class, 'veriEmail']);
Route::post('students/prereg/verify', [AuthController::class, 'validateEmail']);

//admin
Route::get('admin/dashboard', [DashboardController::class, 'index']);

Route::get('admin/admin/list', [AdminController::class, 'index']);
Route::get('admin/admin/add', [AdminController::class, 'create']);
Route::post('admin/admin/add', [AdminController::class, 'store']);
Route::get('admin/admin/{id}/view', [AdminController::class, 'show']);
Route::get('admin/admin/{id}/edit', [AdminController::class, 'edit']);
Route::post('admin/admin/{id}/edit', [AdminController::class, 'update']);
Route::get('admin/admin/{id}/delete', [AdminController::class, 'destroy']);

//management staff
Route::get('managementStaff/dashboard', [DashboardController::class, 'index']);

Route::get('admin/managementStaff/list', [ManagementStaffController::class, 'index']);
Route::get('admin/managementStaff/add', [ManagementStaffController::class, 'create']);
Route::post('admin/managementStaff/add', [ManagementStaffController::class, 'store']);
Route::get('admin/managementStaff/{id}/view', [ManagementStaffController::class, 'show']);
Route::get('admin/managementStaff/{id}/edit', [ManagementStaffController::class, 'edit']);
Route::post('admin/managementStaff/{id}/edit', [ManagementStaffController::class, 'update']);
Route::get('admin/managementStaff/{id}/delete', [ManagementStaffController::class, 'destroy']);

//Lecturer
Route::get('lecturer/dashboard', [DashboardController::class, 'index']);

Route::get('admin/lecturers/list', [LecturerController::class, 'index']);
Route::get('admin/lecturers/add', [LecturerController::class, 'create']);
Route::post('admin/lecturers/add', [LecturerController::class, 'store']);
Route::get('admin/lecturers/{id}/view', [LecturerController::class, 'show']);
Route::get('admin/lecturers/{id}/edit', [LecturerController::class, 'edit']);
Route::post('admin/lecturers/{id}/edit', [LecturerController::class, 'update']);
Route::get('admin/lecturers/{id}/delete', [LecturerController::class, 'destroy']);

//Students
Route::get('student/dashboard', [DashboardController::class, 'index']);

Route::get('admin/students/list', [StudentsController::class, 'index']);
Route::get('admin/students/add', [StudentsController::class, 'create']);
Route::post('admin/students/add', [StudentsController::class, 'store']);

//Management Staff Login
Route::get('managementStaff/lecturers/list', [LecturerController::class, 'index']);
Route::get('managementStaff/lecturers/add', [LecturerController::class, 'create']);
Route::post('managementStaff/lecturers/add', [LecturerController::class, 'store']);
Route::get('managementStaff/lecturers/{id}/view', [LecturerController::class, 'show']);
Route::get('managementStaff/lecturers/{id}/edit', [LecturerController::class, 'edit']);
Route::post('managementStaff/lecturers/{id}/edit', [LecturerController::class, 'update']);

Route::get('managementStaff/students/list', [StudentsController::class, 'index']);
Route::get('managementStaff/students/add', [StudentsController::class, 'create']);
Route::post('managementStaff/students/add', [StudentsController::class, 'store']);

//Student Login
Route::get('student/add', [StudentsController::class, 'createNewStudent']);
Route::post('students/prereg/save', [StudentsController::class, 'storeNewStudent']);


Route::get('profile', [UserController::class, 'showProfile']);
Route::get('change_password', [UserController::class, 'show_change_password']);
Route::post('change_password', [UserController::class, 'update_change_password']);
Route::get('change_prof_pic', [UserController::class, 'show_change_prof_pic']);
Route::post('change_prof_pic', [UserController::class, 'update_change_prof_pic']);