<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    
    public function attendances(){
        //'user_id' = request('user_id');
    }


    public function reports(){
          $data['course_id']  =0;

          $data['courses'] = \App\Models\Course::get();
         $data['users'] = \DB::table('users')->join('programs', 'programs.id', '=', 'users.program_id')->leftJoin('student_courses', 'student_courses.student_id', '=', 'users.id')->leftJoin('courses', 'courses.id', '=', 'student_courses.course_id')->where('users.status','=','1')->where('users.usertype','=','Student')->paginate(10);
        return view('layouts/reports',$data);
    }



     public function searchReports(){
          $data['courses'] = \App\Models\Course::get();
          $data['course_id'] = $course_id = request('course');
          $data['details'] = \App\Models\Course::where('id',$course_id)->first();

          if($course_id > 0){
            $data['users'] = \App\Models\User::join('programs', 'programs.id', '=', 'users.program_id')->join('student_courses', 'student_courses.student_id', '=', 'users.id')->leftJoin('courses', 'courses.id', '=', 'student_courses.course_id')->where('users.status','=','1')->where('users.usertype','=','Student')->where('student_courses.course_id',$course_id)->paginate(10);
          } else{
            $data['users'] = \DB::table('users')->join('programs', 'programs.id', '=', 'users.program_id')->leftJoin('student_courses', 'student_courses.student_id', '=', 'users.id')->leftJoin('courses', 'courses.id', '=', 'student_courses.course_id')->where('users.status','=','1')->where('users.usertype','=','Student')->paginate(10);
          }
        return view('layouts/reports',$data);
    }
}
