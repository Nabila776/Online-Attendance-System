<?php

use App\Http\Controllers\FacultyController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentReportController;
use App\Http\Controllers\UpdatePasswordController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[LoginController::class,'index'])->name('login.page');
Route::post('/login',[LoginController::class,'checkUser'])->name('login');
//Route::get('/loginInfo/{users}',[UpdatePasswordController::class,'index'])->name('updatePassword.index');
//Route::patch('/loginInfoUpdate/{users}',[UpdatePasswordController::class,'updates'])->name('updates.Password.index');
Route::middleware(['user.auth'])->group(function () {
    Route::get('/loginInfo/{users}',[UpdatePasswordController::class,'index'])->name('updatePassword.index');
    Route::patch('/loginInfoUpdate/{users}',[UpdatePasswordController::class,'updates'])->name('updates.Password.index');
    Route::middleware(['role.users:faculty'])->group(function () {
        Route::get('/facultyIndex',[FacultyController::class,'index'])->name('faculty.index');
        Route::get('/studentList/{course}',[FacultyController::class,'ShowStudentList'])->name('student.list');
        Route::get('/studentReport/{student}',[FacultyController::class,'ShowStudentReport'])->name('student.Report');
        Route::get('/convertPdf/{student}',[PdfController::class,'convertIntoPdf'])->name('convertPdf');
    });
    Route::middleware(['role.users:student'])->group(function () {
        Route::get('/studentIndex',[StudentController::class,'index'])->name('student.index');
        Route::get('/attendancePage/{course}',[StudentController::class,'gotoAttendancePage'])->name('attendance.page');
        Route::patch('/attendancePages/{course}',[StudentController::class,'AttendanceCreate'])->name('attendance.create');
        Route::get('/studentReport',[StudentReportController::class,'index'])->name('student.report');
        Route::get('/studentAttendanceInfo/{course}',[StudentReportController::class,'ShowAttendanceInfo'])->name('attendance.info');
    });

});

/*Route::middleware(['role.users:faculty'])->group(function () {
    Route::get('/facultyIndex',[FacultyController::class,'Index'])->name('faculty.index');
});
Route::middleware(['role.users:student'])->group(function () {
    Route::get('/home',[HomeController::class,'gotoHomePage'])->name('home');
});

Route::get('/',[LoginController::class,'index'])->name('login.page');
Route::post('/login',[LoginController::class,'checkUser'])->name('login');
//Route::get('/home',[HomeController::class,'gotoHomePage'])->name('home');
//Route::get('/facultyIndex',[FacultyController::class,'Index'])->name('faculty.index');
*/
