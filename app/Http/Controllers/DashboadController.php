<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboadController extends Controller
{
    public function __construct() {
       // $this->middleware('auth');
    }

    public function index(){
        $this->data['totalusers'] = \App\Models\User::where('status',1)->count();
        $this->data['students'] = \App\Models\User::whereIn('usertype',array('Student'))->where('status',1)->count();
        $this->data['programs'] = \App\Models\Program::count();
         return view('layouts/dashboard',$this->data);
    }



    public function studentHome(){
         $data['allcourses'] = \App\Models\Course::get();

         $data['courses'] = \DB::table('courses')->join('student_courses','student_courses.course_id','=','courses.id')->where('student_courses.student_id','=',\Auth::user()->id)->simplePaginate(10);


         $data['student_id'] = $user_id= \Auth::user()->id;
         $data['student'] = \App\Models\User::whereIn('usertype',array('Student'))->where('status',1)->where('id',$user_id)->first();
         return view('layouts/student_dashboard',$data);
    }


    public function studentReports(){
           $data['courses'] = \DB::table('courses')->join('student_courses','student_courses.course_id','=','courses.id')->select('courses.*')->where('student_courses.student_id','=',\Auth::user()->id)->get();

          $data['course_id'] = $course_id = request('course');
          $data['details'] = \App\Models\Course::where('id',$course_id)->first();


            $data['users'] = \App\Models\User::join('programs', 'programs.id', '=', 'users.program_id')->join('student_courses', 'student_courses.student_id', '=', 'users.id')->join('courses', 'courses.id', '=', 'student_courses.course_id')->where('users.status','=','1')->where('users.usertype','=','Student')->where('student_courses.course_id',$course_id)
                ->where('users.id','=',\Auth::user()->id)->where('student_courses.student_id','=',\Auth::user()->id)->paginate(10);
            
            return view('layouts/student_report',$data);
    }


    public function student_Reports()
    {
           $data['courses'] = \DB::table('courses')->join('student_courses','student_courses.course_id','=','courses.id')->select('courses.*')->where('student_courses.student_id','=',\Auth::user()->id)->get();

          $data['course_id'] = $course_id = request('course');
          $data['details'] = \App\Models\Course::where('id',$course_id)->first();


            $data['users'] = \App\Models\User::join('programs', 'programs.id', '=', 'users.program_id')->join('student_courses', 'student_courses.student_id', '=', 'users.id')->join('courses', 'courses.id', '=', 'student_courses.course_id')->where('users.status','=','1')->where('users.usertype','=','Student')->where('student_courses.course_id',$course_id)
                ->where('users.id','=',\Auth::user()->id)->where('student_courses.student_id','=',\Auth::user()->id)->paginate(10);
            return view('layouts/student_report',$data); 
    }


    public  function studentSearchCourse()
    {
        $data['courses'] = \DB::table('courses')->join('student_courses','student_courses.course_id','=','courses.id')->where('student_courses.student_id','=',\Auth::user()->id);
        return view('layouts/student_report',$data);
         
    }
}
