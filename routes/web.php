<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboadController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\CourseController;

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
Route::get('/users/staffs',[UserController::class,'users']);
Route::get('/users/students',[UserController::class,'students']);
Route::get('/programs',[ProgramController::class,'index']);
Route::get('/createprograms',[ProgramController::class,'createprograms']);
Route::post('/createPrograms',[ProgramController::class,'storePrograms']);
Route::get('/program/edit/{program_id}',[ProgramController::class,'editprograms']);
Route::post('/updateProgram',[ProgramController::class,'updateProgram']);

Route::get('/',[UserController::class,'loginform']);
Route::get('/register',[UserController::class,'registerStudent']);
Route::post('/createstudent',[UserController::class,'createStudent']);


Route::get('/courses',[CourseController::class,'index']);
Route::get('/createcourses',[CourseController::class,'createcourses']);
Route::post('/addcourse',[CourseController::class,'storeCourse']);



Route::post('/login',[UserController::class,'login']);

Route::group(['middleware' => ['auth']], function() {
   Route::get('/logout',[UserController::class,'logout'])->name('logout');
   Route::post('/createStaff',[UserController::class,'registerStaff']);
});













