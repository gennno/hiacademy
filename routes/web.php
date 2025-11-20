<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/preschool', [HomeController::class, 'preschoolindex'])->name('preschoolindex');
Route::get('/english', [HomeController::class, 'englishindex'])->name('englishindex');
Route::get('/math', [HomeController::class, 'mathindex'])->name('mathindex');
Route::get('/childdev', [HomeController::class, 'childdevindex'])->name('childdevindex');
Route::get('/aboutpreschool', [HomeController::class, 'preschoolabout'])->name('preschoolabout');
Route::get('/admissionpreschool', [HomeController::class, 'preschooladmission'])->name('preschooladmission');
Route::get('/ipc', [HomeController::class, 'ipc'])->name('ipc');
Route::get('/login', [HomeController::class, 'loginindex'])->name('loginindex');
Route::get('/preschool-login', [HomeController::class, 'loginpreschool'])->name('loginpreschool');
Route::get('/book-trial', [HomeController::class, 'booktrial'])->name('booktrial');
Route::get('/register', [HomeController::class, 'register'])->name('register');
Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');