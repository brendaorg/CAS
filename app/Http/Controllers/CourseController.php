<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;

use Illuminate\Http\Request;

class CourseController extends Controller
{
    
     public function index()
    {
        $this->data['courses'] = \App\Models\Course::where('user_id',\Auth::user()->id)->simplePaginate(10);
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
        $array_data = array_merge(['uuid'=>$uuid,'created_at'=> now(),'user_id'=>\Auth::user()->id],$data);
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


      $date = \DB::table('course_timetable')->where('course_id',$course_id)->where('date',date('Y-m-d',strtotime($search_date)))->first();

      if(!empty($date)){ 
         $timein = $date->timein;
         if(!is_null($timein)){
            $data['attendances'] = \App\Models\User::join('attendances', 'users.id', '=', 'attendances.user_id')->join('programs', 'programs.id', '=', 'users.program_id')->where('attendances.date','=',$search_date)->where('attendances.timein','>=',$timein)->where('attendances.date','<=',$timein)->where('users.status','=','1')->where('users.usertype','=','Student')->get(['users.*', 'attendances.*','programs.program_name']);
         }
      } else{
        $data['attendances'] = [];
      }
        return view('layouts/showcourse',$data);
    }


    public function setCourseTimetable()
    {  
        $course_ids = \DB::table('course_timetable')->get();

        $ids = [];
        foreach ($course_ids as $values) {
            array_push($ids, $values->course_id);
        }

     // $data['courses'] = \DB::table('courses')->whereIn('id',$ids)->get();

      $data['courses'] = \App\Models\Course::simplePaginate(10);

    //   return view('layouts/set_timetable',$data);
       return view('layouts/set_course_timetable',$data);
    }


    public  function setCourses($course_id){
          $data['course_id'] = $course_id;
          $data['course_name'] = \DB::table('courses')->where('id',$course_id)->first();
          $data['courses_timetables'] = \DB::table('course_timetable')->join('courses','course_timetable.course_id','=','courses.id')
          ->where('courses.id',$course_id)->whereNotNull('course_timetable.timein')->select('course_timetable.*')->orderBy('timein','DESC')->get();
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
            'timein'=>'required',
        ]);

      $date = date("Y-m-d h:i:s", strtotime($data['timein']));

      $exists =  \DB::table('course_timetable')->where('timein','>=',$date)->where('timein','<=',$date)->first();
      if($exists){
        return redirect()->back()->with('error', 'Another session is scheduled in this time');
      }
      $array_data = array('date'=>date('Y-m-d',strtotime($date)),'course_id'=>$data['course_id'],'timein'=>$date);

      \DB::table('course_timetable')->insert($array_data);
        return redirect()->back()->with('success', 'Successfully Created');
    }



    public  function  editTimetable($timetable_id)
    {
        // $courses =  \DB::table('course_timetable')->join('courses','courses.id','=','course_timetable.course_id')->where('course_timetable.course_id','=',$course_id)->get(['course_timetable.date','courses.id as course_id','courses.course_name','courses.course_code']);
        $data['courses'] = $courses =  \DB::table('course_timetable')->where('id',$timetable_id)->first();
        $data['timein'] = date('Y-m-d h:i:s', strtotime($courses->timein));
       
        $data['course_id'] = $courses->course_id; 
        $data['timetable_id'] = $timetable_id; 
        return view('layouts/edit_timetable',$data);
    }


    public  function editcoursesTimetable(){
         $data = request()->validate([
            'timetable_id' => 'required', 
            'timein' => 'required', 
        ]);
        

        $date_data =\DB::table('course_timetable')->where('id',(int)$data['timetable_id'])->first();

        $date = date("Y-m-d h:i:s", strtotime(request('timein')));

        $array_data = array('date'=>date('Y-m-d',strtotime($date)),'course_id'=>$date_data->course_id,'timein'=>$date);

        \DB::table('course_timetable')->where('id',(int)request('timetable_id'))->update($array_data);

        $course_id = $date_data->course_id;
        return redirect('/course/set/'.$course_id)->with('success', 'Successfully Edited');

    }


    public  function showTimetable($course_id){
         $data['courses'] = $courses = \DB::table('course_timetable')->join('courses','courses.id','=','course_timetable.course_id')->where('course_timetable.course_id','=',$course_id)->get();
         
          foreach($courses as $course){
              $name = $course->course_name;
          }
          $data['name'] = $name;
         return view('layouts/show_timetable',$data);
    }
   
}
