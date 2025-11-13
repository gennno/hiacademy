<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/preschool', [HomeController::class, 'preschoolindex'])->name('preschoolindex');
Route::get('/aboutpreschool', [HomeController::class, 'preschoolabout'])->name('preschoolabout');
Route::get('/admissionpreschool', [HomeController::class, 'preschooladmission'])->name('preschooladmission');
Route::get('/ipc', [HomeController::class, 'ipc'])->name('ipc');
Route::get('/login', [HomeController::class, 'loginindex'])->name('loginindex');
Route::get('/preschool-login', [HomeController::class, 'loginpreschool'])->name('loginpreschool');
Route::get('/book-trial', [HomeController::class, 'booktrial'])->name('booktrial');
Route::get('/register', [HomeController::class, 'register'])->name('register');