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



Route::get('/reports',[AttendanceController::class,'reports']);
Route::get('/users/staffs',[UserController::class,'users']);
Route::get('/users/students',[UserController::class,'students']);
Route::get('/programs',[ProgramController::class,'index']);
Route::get('/createprograms',[ProgramController::class,'createprograms']);
Route::post('/createPrograms',[ProgramController::class,'storePrograms']);
Route::get('/program/edit/{program_id}',[ProgramController::class,'editprograms']);
Route::post('/updateProgram',[ProgramController::class,'updateProgram']);

// Route::get('/',[UserController::class,'loginform']);
Route::get('/', ['as' => 'login', 'uses' => 'App\Http\Controllers\UserController@loginform']);




Route::post('/login',[UserController::class,'login']);

Route::group(['middleware' => ['auth']], function() {
   Route::get('/logout',[UserController::class,'logout'])->name('logout');
   Route::post('/createStaff',[UserController::class,'registerStaff']);

   
Route::get('/dashboard/home',[DashboadController::class,'index']); 
Route::get('/dashboard/reports',[DashboadController::class,'studentReports']); 
Route::get('/dashboard/student',[DashboadController::class,'studentHome']);

Route::get('/reports',[AttendanceController::class,'reports']);
Route::get('/users/staffs',[UserController::class,'users']);
Route::get('/users/students',[UserController::class,'students']);
Route::get('/programs',[ProgramController::class,'index']);
Route::get('/createprograms',[ProgramController::class,'createprograms']);
Route::post('/createPrograms',[ProgramController::class,'storePrograms']);
Route::get('/program/edit/{program_id}',[ProgramController::class,'editprograms']);
Route::post('/updateProgram',[ProgramController::class,'updateProgram']);

Route::get('/courses',[CourseController::class,'index']);
Route::get('/createcourses',[CourseController::class,'createcourses']);
Route::get('/course/edit/{course_id}',[CourseController::class,'editcourses']);
Route::get('/course/show/{course_id}',[CourseController::class,'showcourses']);
Route::post('/addcourse',[CourseController::class,'storeCourse']);
Route::post('/edit_courses',[CourseController::class,'editCourse']); 

Route::get('/register',[UserController::class,'registerStudent']);
Route::post('/createstudent',[UserController::class,'createStudent']);


Route::get('/courses',[CourseController::class,'index']);
Route::get('/createcourses',[CourseController::class,'createcourses']);
Route::get('/course/edit/{course_id}',[CourseController::class,'editcourses']);
Route::get('/course/show/{course_id}',[CourseController::class,'showcourses']);
Route::post('/addcourse',[CourseController::class,'storeCourse']);
Route::post('/edit_courses',[CourseController::class,'editCourse']); 

Route::post('/searchattendance',[CourseController::class,'searchAttendance']); 

Route::get('/set_table',[CourseController::class,'setCourseTimetable']); 
Route::get('/createTimetable',[CourseController::class,'createCourseTimetable']); 
Route::post('/createcoursesTimetable',[CourseController::class,'storeTimetable']); 


Route::get('/timetable/edit/{course_id}',[CourseController::class,'editTimetable']); 
Route::get('/timetable/show/{course_id}',[CourseController::class,'showTimetable']); 
Route::post('/editcoursesTimetable',[CourseController::class,'editcoursesTimetable']); 

Route::get('/student',[DashboadController::class,'studentHome']);  
// Route::post('/storeStudentCourses',[UserController::class,'studentCourses']); 
 
Route::post('/searchcourses',[AttendanceController::class,'searchReports']);   
Route::post('/pickcourse',[UserController::class,'studentCourses']);    
Route::post('/searchCourse',[DashboadController::class,'studentSearchCourse']);    
});













