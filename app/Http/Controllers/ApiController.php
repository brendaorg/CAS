<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    
    public function users(){
        $users = \App\Models\User::all();
        return json_encode($users);
    }


     public function students(){
    $students = \App\Models\User::where(['usertype'=>'Student'])->whereNotNull('cas_id')
    ->get(['cas_id as attendance_id','first_name','last_name']);

         return [
            'students' => \App\Http\Resources\UserResource::collection($students)
        ];
    }


     public function postAttendances(){
          $user_id = request('user_id'); 
          $date = date('Y-m-d'); 
          $course_id = 0; 
          $status = 1; 
          $timein = !is_null(request('timein')) ? request('timein')  : date('Y-m-d H:i:s'); 
   
         $user = \DB::table('users')->where('id',$user_id)->where('usertype','=','Student')->first();
         if($user){
                $response = \App\Models\Attendance::create(array('user_id'=>$user_id,'date'=>$date,'timein'=>$timein,'course_id'=>$course_id,'status'=>$status));
                 if($response){
                     return json_encode(array('status'=>'1','message'=>'Successfully'));
                 } else{
                     return json_encode(array('status'=>'0','message'=>'failed'));
             }
         } else{
             return json_encode(array('status'=>'0','message'=>'User not registered in the system'));
         }
     }
}
