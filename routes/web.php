<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\InvoiceController;

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
    Route::get('/admin/program/{program:slug}', [AdminController::class, 'adminDetailProgram'])
    ->name('admindetailprogram');
    Route::get('/admin/programs/{program:slug}/lessons/{lesson}',
        [AdminController::class, 'adminlessondetail']
    )->name('adminlessondetail');

    Route::post('/admin/programs', [AdminController::class, 'storeprogram'])
    ->name('admin.programs.store');
    Route::delete('/admin/programs/{program}', [AdminController::class, 'programdestroy'])
    ->name('admin.programs.destroy');
    Route::put('/admin/programs/{program}', [AdminController::class, 'programupdate'])
    ->name('admin.programs.update');

    Route::post('/admin/lessons', [AdminController::class, 'adminlessonstore'])
    ->name('adminlesson.store');

    Route::put('/admin/lessons/{lesson}', [AdminController::class, 'adminlessonupdate'])
        ->name('adminlesson.update');

    Route::delete('/admin/lessons/{lesson}', [AdminController::class, 'adminlessondestroy'])
        ->name('adminlesson.destroy');

        Route::post('/admin/materials', [AdminController::class, 'adminmaterialstore'])
    ->name('adminmaterial.store');

    Route::put('/admin/materials/{material}', [AdminController::class, 'adminmaterialupdate'])
    ->name('adminmaterial.update');

    Route::delete('/admin/materials/{material}', [AdminController::class, 'adminmaterialdestroy'])
    ->name('adminmaterial.destroy');

    Route::get('/admin-invoice', [AdminController::class, 'admininvoice'])->name('admininvoice');

    Route::post('/admin/invoices', [AdminController::class, 'storeinvoice'])
        ->name('admininvoices.store');

    Route::get('/admin/invoices/{invoice}', [AdminController::class, 'showinvoice'])
        ->name('admininvoices.show');

    Route::get('/admin/invoices/{invoice}/edit', [AdminController::class, 'editinvoice'])
        ->name('admininvoices.edit');

    Route::put('/admin/invoices/{invoice}', [AdminController::class, 'updateinvoice'])
        ->name('admininvoices.update');

    Route::delete('/admin/invoices/{invoice}', [AdminController::class, 'destroyinvoice'])
        ->name('admininvoices.destroy');

    Route::get(
        '/admin/invoices/{invoice}/generate',
        [AdminController::class, 'generateinvoice']
    )->name('admininvoices.generate');

        // Receipt 
    Route::post('/admin/receipts', [AdminController::class, 'storereceipt'])
        ->name('adminreceipts.store');

    Route::get('/admin/receipts/{receipt}', [AdminController::class, 'showreceipt'])
        ->name('adminreceipts.show');

    Route::get('/admin/receipts/{receipt}/edit', [AdminController::class, 'editreceipt'])
        ->name('adminreceipts.edit');

    Route::put('/admin/receipts/{receipt}', [AdminController::class, 'updatereceipt'])
        ->name('adminreceipts.update');

    Route::delete('/admin/receipts/{receipt}', [AdminController::class, 'destroyreceipt'])
        ->name('adminreceipts.destroy');

    Route::get(
        '/admin/receipts/{receipt}/generate',
        [AdminController::class, 'generatereceipt']
    )->name('adminreceipt.generate');


    Route::get('/admin-enrollment', [AdminController::class, 'adminenrollment'])->name('adminenrollment');
    Route::get('/admin-user', [AdminController::class, 'adminuser'])->name('adminuser');




    Route::get('/admin-report', [AdminController::class, 'adminreport'])->name('adminreport');
    Route::get('/admiin/reports/{report}', [AdminController::class, 'adminreportshow'])->name('admin.reports.show');

    Route::post('/admin/reports', [AdminController::class, 'storereports'])
        ->name('reports.store');
    Route::post('/admin/certificates', [AdminController::class, 'certificatestore'])
    ->name('certificates.store');

    Route::get('/admin-registration', [AdminController::class, 'adminregistration'])->name('adminregistration');
    
        Route::post('/users/store', [AdminController::class, 'userstore'])->name('users.store');
        Route::get('/users/{user}', [AdminController::class, 'usershow'])->name('users.show');
        Route::put('/users/{user}/update', [AdminController::class, 'userupdate'])->name('users.update');
        Route::delete('/users/{user}', [AdminController::class, 'userdestroy'])
            ->name('users.destroy');

    


});

Route::middleware(['auth', 'role:staff'])->group(function () {
    Route::get('/staff-dashboard', [StaffController::class, 'staffdashboard'])->name('staffdashboard');
    Route::get('/staff-program', [StaffController::class, 'staffprogram'])->name('staffprogram');
    Route::get('/staff-detail-program', [StaffController::class, 'staffdetailprogram'])->name('staffdetailprogram');
    Route::get('/staff-invoice', [StaffController::class, 'staffinvoice'])->name('staffinvoice');


    Route::get('/staff-program', [StaffController::class, 'staffprogram'])->name('staffprogram');
    Route::get('/staff/program/{program:slug}', [StaffController::class, 'staffDetailProgram'])
    ->name('staffdetailprogram');
    Route::get('/staff/programs/{program:slug}/lessons/{lesson}',
        [StaffController::class, 'stafflessondetail']
    )->name('stafflessondetail');

    Route::post('/staff/programs', [StaffController::class, 'storeprogram'])
    ->name('staff.programs.store');
    Route::delete('/staff/programs/{program}', [StaffController::class, 'programdestroy'])
    ->name('staff.programs.destroy');
    Route::put('/staff/programs/{program}', [StaffController::class, 'programupdate'])
    ->name('staff.programs.update');

    Route::post('/staff/lessons', [StaffController::class, 'stafflessonstore'])
    ->name('stafflesson.store');
    Route::put('/staff/lessons/{lesson}', [StaffController::class, 'stafflessonupdate'])
        ->name('stafflesson.update');

    Route::delete('/staff/lessons/{lesson}', [StaffController::class, 'stafflessondestroy'])
        ->name('stafflesson.destroy');

    Route::post('/staff/materials', [StaffController::class, 'staffmaterialstore'])
  ->name('staffmaterial.store');

    Route::put('/staff/materials/{material}', [StaffController::class, 'staffmaterialupdate'])
    ->name('staffmaterial.update');

    Route::delete('/staff/materials/{material}', [StaffController::class, 'staffmaterialdestroy'])
    ->name('staffmaterial.destroy');

    Route::get('/staff-invoice', [StaffController::class, 'staffinvoice'])->name('staffinvoice');

    Route::post('/staff/invoices', [StaffController::class, 'storeinvoice'])
        ->name('invoices.store');

    Route::get('/staff/invoices/{invoice}', [StaffController::class, 'showinvoice'])
        ->name('invoices.show');

    Route::get('/staff/invoices/{invoice}/edit', [StaffController::class, 'editinvoice'])
        ->name('invoices.edit');

    Route::put('/staff/invoices/{invoice}', [StaffController::class, 'updateinvoice'])
        ->name('invoices.update');

    Route::delete('/staff/invoices/{invoice}', [StaffController::class, 'destroyinvoice'])
        ->name('invoices.destroy');

    Route::get(
        '/staff/invoices/{invoice}/generate',
        [StaffController::class, 'generateinvoice']
    )->name('staffinvoices.generate');

    // Receipt 
    Route::post('/staff/receipts', [StaffController::class, 'storereceipt'])
        ->name('receipts.store');

    Route::get('/staff/receipts/{receipt}', [StaffController::class, 'showreceipt'])
        ->name('receipts.show');

    Route::get('/staff/receipts/{receipt}/edit', [StaffController::class, 'editreceipt'])
        ->name('receipts.edit');

    Route::put('/staff/receipts/{receipt}', [StaffController::class, 'updatereceipt'])
        ->name('receipts.update');

    Route::delete('/staff/receipts/{receipt}', [StaffController::class, 'destroyreceipt'])
        ->name('receipts.destroy');

    Route::get(
        '/staff/receipts/{receipt}/generate',
        [StaffController::class, 'generatereceipt']
    )->name('staffreceipt.generate');


    Route::get('/staff-enrollment', [StaffController::class, 'staffenrollment'])->name('staffenrollment');

    Route::get('/staff-report', [StaffController::class, 'staffreport'])->name('staffreport');
    Route::post('/staff/reports', [StaffController::class, 'storereports'])
        ->name('reports.store');
    Route::post('/staff/certificates', [StaffController::class, 'storecertificates'])
        ->name('certificates.store');

    Route::get('/staff-registration', [StaffController::class, 'staffregistration'])->name('staffregistration');
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

    Route::get('/student-report', [StudentController::class, 'studentreport'])->name('studentreport');
    Route::get('/student/reports/{report}', [StudentController::class, 'studentreportshow'])->name('student.reports.show');

});
