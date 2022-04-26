<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboadController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\ProgramController;

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

// Route::get('/', function () {
//     return view('layouts/base');
// });



Route::get('/dashboard/home',[DashboadController::class,'index']);
Route::get('/reports',[AttendanceController::class,'reports']);
Route::get('/users',[UserController::class,'users']);
Route::get('/students',[UserController::class,'students']);
Route::get('/programs',[ProgramController::class,'index']);

Route::get('/',[UserController::class,'loginform']);
Route::get('/register',[UserController::class,'registerStudent']);










