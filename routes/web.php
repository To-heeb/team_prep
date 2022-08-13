<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;

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
    return view('landing.index');
});

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
});

Route::get('states', [HomeController::class, 'states']);

Route::get('hospitals', [HomeController::class, 'search']);

Route::get('admin/dashboard', [UserController::class, 'index'])->middleware('auth');

Route::get('admin/logout', [UserController::class, 'logout'])->middleware('auth');

Route::get('admin/facilities', [UserController::class, 'facilities'])->middleware('auth');

Route::get('admin/prepapplicant',  [UserController::class, 'prepapplicant'])->middleware('auth');

Route::get('admin/prepapplication',  [UserController::class, 'prepform'])->middleware('auth');

Route::post('/admin/prepformsubmission',  [UserController::class, 'prepformsubmission'])->middleware('auth');

Route::post('admin/getlgas',  [UserController::class, 'getlgas'])->middleware('auth');

Route::get('/facility', [UserController::class, 'search'])->middleware('auth');

// Create New User
Route::post('/newuser', [UserController::class, 'store']);

// Login User
Route::post('admin/authenticate', [UserController::class, 'authenticate']);
