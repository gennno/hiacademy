<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\RegistrationController;

use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/preschool', [HomeController::class, 'preschoolindex'])->name('preschoolindex');
Route::get('/english', [HomeController::class, 'englishindex'])->name('englishindex');
Route::get('/math', [HomeController::class, 'mathindex'])->name('mathindex');
Route::get('/childdev', [HomeController::class, 'childdevindex'])->name('childdevindex');
Route::get('/mandarin', [HomeController::class, 'mandarinindex'])->name('mandarinindex');
Route::get('/skilllab', [HomeController::class, 'skilllabindex'])->name('skilllabindex');
Route::get('/stem', [HomeController::class, 'stemindex'])->name('stemindex');
Route::get('/creative', [HomeController::class, 'creativeindex'])->name('creativeindex');
Route::get('/architecture', [HomeController::class, 'architectureindex'])->name('architectureindex');

Route::get('/aboutpreschool', [HomeController::class, 'preschoolabout'])->name('preschoolabout');
Route::get('/admissionpreschool', [HomeController::class, 'preschooladmission'])->name('preschooladmission');
Route::get('/ipc', [HomeController::class, 'ipc'])->name('ipc');

Route::get('/login', [LoginController::class, 'loginindex'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.perform');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/preschool-login', [HomeController::class, 'loginpreschool'])->name('loginpreschool');
Route::get('/book-trial', [HomeController::class, 'booktrial'])->name('booktrial');


Route::get('/register', [HomeController::class, 'register'])->name('register');
Route::post('/registrations', [RegistrationController::class, 'store'])
    ->name('registrations.store');


Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin-dashboard', [AdminController::class, 'admindashboard'])->name('admindashboard');
    Route::get('/admin-program', [AdminController::class, 'adminprogram'])->name('adminprogram');
    Route::get('/admin-detail-program', [AdminController::class, 'admindetailprogram'])->name('admindetailprogram');

    Route::post('/admin/programs', [AdminController::class, 'storeprogram'])
    ->name('admin.programs.store');
    Route::delete('/admin/programs/{program}', [AdminController::class, 'programdestroy'])
    ->name('admin.programs.destroy');
    Route::put('/admin/programs/{program}', [AdminController::class, 'programupdate'])
    ->name('admin.programs.update');

    Route::get('/admin-invoice', [AdminController::class, 'admininvoice'])->name('admininvoice');





    Route::get('/admin-enrollment', [AdminController::class, 'adminenrollment'])->name('adminenrollment');

    Route::get('/admin-report', [AdminController::class, 'adminreport'])->name('adminreport');


    Route::get('/admin-registration', [AdminController::class, 'adminregistration'])->name('adminregistration');
    

});

Route::middleware(['auth', 'role:staff'])->group(function () {
    Route::get('/staff-dashboard', [StaffController::class, 'staffdashboard'])->name('staffdashboard');
    Route::get('/staff-program', [StaffController::class, 'staffprogram'])->name('staffprogram');
    Route::get('/staff-detail-program', [StaffController::class, 'staffdetailprogram'])->name('staffdetailprogram');
    Route::get('/staff-invoice', [StaffController::class, 'staffinvoice'])->name('staffinvoice');

});

Route::middleware(['auth', 'role:teacher'])->group(function () {
    Route::get('/teacher-dashboard', [TeacherController::class, 'teacherdashboard'])->name('teacherdashboard');
    Route::get('/teacher-my-program', [TeacherController::class, 'teachermyprogram'])->name('teachermyprogram');
    Route::get('/teacher-detail-program', [TeacherController::class, 'teacherdetailprogram'])->name('teacherdetailprogram');

});

Route::middleware(['auth', 'role:student'])->group(function () {
    Route::get('/student-dashboard', [StudentController::class, 'studentdashboard'])->name('studentdashboard');
    Route::get('/student-my-program', [StudentController::class, 'studentmyprogram'])->name('studentmyprogram');
    Route::get('/lms/my-program/{program:slug}', [StudentController::class, 'studentDetailProgram'])
    ->name('studentdetailprogram');
    Route::get(
        '/student/programs/{program:slug}/lessons/{lesson}',
        [StudentController::class, 'studentlessondetail']
    )->name('studentlessondetail');
});