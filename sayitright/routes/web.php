<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\AdvisorController;
use App\Http\Controllers\AdminController;



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

Route::get('/', function () {
    return view('home');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/services', function () {
    return view('services');
});

Route::get('/chat', function () {
    return view('chat');
});


Route::resource('/login', LoginController::class);

Route::resource('/register', RegisterController::class);

Route::resource('/contact-us', ContactController::class);

Route::resource('/student', StudentsController::class);

Route::resource('/professor', ProfessorController::class);

Route::resource('/advisor', AdvisorController::class);

Route::resource('/admin', AdminController::class);
