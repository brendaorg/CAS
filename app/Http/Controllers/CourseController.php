<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;

use Illuminate\Http\Request;

class CourseController extends Controller
{
    
     public function index()
    {
        $this->data['courses'] = \App\Models\Course::simplePaginate(10);
        return view('layouts/courses',$this->data);
    }


   public function createcourses()
   {
        return view('layouts/createcourses');
   }


    public function storeCourse()
    {
        $data = request()->validate([
            'course_name' => 'required|string',
            'course_code'=>'required|string',
            'periodic_time' => 'required',
        ]);

        $uuid = Str::uuid()->toString();
        $array_data = array_merge(['uuid'=>$uuid,'created_at'=> now()],$data);
        \DB::table('courses')->insert($array_data);
        return redirect('/courses')->with('success','Created successfully');
    }

    public function  editcourses($course_id){
         $data['course'] = \DB::table('courses')->find($course_id);
         return view('layouts/editcourse',$data);
    }

    public  function  editCourse()
    {
        $data = request()->validate([
            'course_name' => 'required|string',
            'course_code'=>'required|string',
            'periodic_time' => 'required',
        ]);
        $course_id = request('course_id');
        \DB::table('courses')->where('id',$course_id)->update($data);
        return redirect('/courses')->with('success', 'Successfully Edited');
    }


    public  function showcourses($course_id)
    {   
         $data['course_id'] = $course_id;
         $data['course'] =  \DB::table('courses')->where('id',$course_id)->first();
         return view('layouts/showcourse',$data);
    }


    public function searchAttendance(){
         request()->validate([
            'search_date' => 'required|date',
        ]);

        $search_date = date('Y-m-d', strtotime(request('search_date')));
        $data['course_id'] = $course_id  = request('course_id');

        $data['attendances'] = \App\Models\User::join('attendances', 'users.id', '=', 'attendances.user_id')->join('programs', 'programs.id', '=', 'users.program_id')->join('programs', 'programs.id', '=', 'users.program_id')->where('attendances.date','=',$search_date)->where('attendances.course_id','=',(int)$course_id)->where('users.status','=','1')->where('users.usertype','=','Student')->get(['users.*', 'attendances.*','programs.program_name']);

         return view('layouts/showcourse',$data);
    }


    public function setCourseTimetable()
    {  
        $course_ids = \DB::table('course_timetable')->get();

        $ids = [];
        foreach ($course_ids as $values) {
            array_push($ids, $values->course_id);
        }

      $data['courses'] = \DB::table('courses')->whereIn('id',$ids)->get();
      return view('layouts/set_timetable',$data);
    }



    public function createCourseTimetable()
    {
         $data['courses'] = \DB::table('courses')->get();
         return view('layouts/create_timetable',$data);
    }


    public function storeTimetable(){

        $data = request()->validate([
            'course_id' => 'required',
            'multi_dates'=>'required',
        ]);

        $dates = explode(",", $data['multi_dates']);

        foreach($dates as $index => $value){
            $array_data = array('date'=>date('Y-m-d',strtotime($value)),'course_id'=>$data['course_id']);
           \DB::table('course_timetable')->insert($array_data);
        }
        return redirect('/set_table')->with('success', 'Successfully Created');
    }



    public  function  editTimetable($course_id)
    {
        $courses =  \DB::table('course_timetable')->join('courses','courses.id','=','course_timetable.course_id')->where('course_timetable.course_id','=',$course_id)->get(['course_timetable.date','courses.id as course_id','courses.course_name','courses.course_code']);

        $data['allcourses'] =  \DB::table('courses')->get();          
         $dates = [];
         $course_id;
         foreach ($courses as $values) {
               array_push($dates,date('d-m-Y',strtotime($values->date)));
               $course_id =  $values->course_id;
             }
        $dates = implode(", ", $dates);
        $data['course_id'] = $course_id;
        $data['dates'] = $dates;
        return view('layouts/edit_timetable',$data);
    }


    public  function editcoursesTimetable(){
         $data = request()->validate([
            'course_id' => 'required',
            'multi_dates'=>'required',
        ]);
        
        \DB::table('course_timetable')->where('course_id',(int)$data['course_id'])->delete();

        $dates = explode(",", $data['multi_dates']);

        foreach($dates as $index => $value){
            $array_data = array('date'=>date('Y-m-d',strtotime($value)),'course_id'=>(int)$data['course_id']);
           \DB::table('course_timetable')->insert($array_data);
        }
        return redirect('/set_table')->with('success', 'Successfully Edited');

    }


    public  function showTimetable($course_id){
         $data['courses'] =  \DB::table('course_timetable')->join('courses','courses.id','=','course_timetable.course_id')->where('course_timetable.course_id','=',$course_id)->get(['course_timetable.date','courses.id as course_id','courses.course_name','courses.course_code']);

          return view('layouts/show_timetable',$data);

    }
   
}
