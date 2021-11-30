<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LoginController;


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

Route::get('/contact-us', [ContactController::class, 'index']);

// Route::get('/login', [LoginController::class, 'index']);

// Route::get('/login/create', [LoginController::class, 'create']);

// Route::post('/login/create', [LoginController::class, 'store']);

route::resource('/login', LoginController::class);

//route::resource('/register', LoginController::class);



