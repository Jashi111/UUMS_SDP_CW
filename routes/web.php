<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ManagementStaffController;
use App\Http\Controllers\LecturerController;

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

//management staff
Route::get('managementStaff/dashboard', function () {
    return view('managementStaff.dashboard');
});

Route::get('admin/managementStaff/list', [ManagementStaffController::class, 'index']);

//Lecturer
Route::get('lecturers/dashboard', function () {
    return view('lecturers.dashboard');
});

Route::get('admin/lecturers/list', [LecturerController::class, 'index']);
