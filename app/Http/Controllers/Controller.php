<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;



    public function test(){

      // $course_id = 12;
      // $user_id= 3;
      
      // $data = $this->test2($course_id,$user_id);
      $data = $this->test2($course_id=12,$user_id=3);
      $total = \DB::table('course_timetable')->where('course_id',$course_id)->count();
    
      // dd($user_attendance);
      dd($data);

   }



   public  function test2($course_id,$id){
     $timetables = \DB::table('course_timetable')->where('course_id',$course_id)->get();
     $dates = array();
     foreach($timetables as $key => $value){
          $dates[] = $value->date;
       }
      $attendances = \App\Models\User::leftJoin('attendances', 'users.id', '=', 'attendances.user_id')
      ->join('programs', 'programs.id', '=', 'users.program_id')->whereIn('attendances.date',$dates)->where('users.status','=','1')->where('users.usertype','=','Student')->where('users.id','=',$id)->get(['attendances.*']);
       return count($attendances);
   }


}

