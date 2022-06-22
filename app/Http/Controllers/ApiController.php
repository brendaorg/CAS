<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    
     public function index()
    {
        $method = request('method');
       
        if (method_exists($this, "$method")) {
            return $this->$method();
        } else {
            return json_encode(['status' => 404, 'message' => 'Method not exists']);
        }
    }

    public function users(){
        $users = \App\Models\User::all();
        return json_encode($users);
    }


  //    public function student($user_id){
  //      $students = \App\Models\User::where(['usertype'=>'Student','id'=>$user_id])->whereNotNull('cas_id')
  //    ->get(['id as attendance_id','first_name','last_name']);
  //        return [
  //           'student' => \App\Http\Resources\UserResource::collection($students)
  //       ];
		// return view('layouts/students',$data);
  //   }


     public function postAttendances(){
          $user_id = request('user_id'); 
          $date = date('Y-m-d'); 
          
          $timein =  date('Y-m-d H:i:s'); 
   
         $user = \DB::table('users')->where('id',$user_id)->where('usertype','=','Student')->first();
         if($user){
            $response = \App\Models\Attendance::create(array('user_id'=>$user_id,'date'=>$date,'timein'=>$timein));
                 if($response){
                     return json_encode(array('status'=>'1','message'=>'Successfully'));
                 } else{
                     return json_encode(array('status'=>'0','message'=>'failed'));
             }
         } else{
             return json_encode(array('status'=>'0','message'=>'User not registered in the system'));
         }
     }



      public function curlPrivate($user_id) 
      {
        // Open connection
        $parameter_id = ['user_id'  => $user_id];
        $url = 'http://192.168.248.187/addfinger/'. '?' . http_build_query($parameter_id);
       // $url = "https://ors.brela.go.tz/um/load/load_nida/19940514412170000228";
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'application/x-www-form-urlencoded'
        ));

        curl_setopt($ch, CURLOPT_POST, TRUE);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $result = curl_exec($ch);
        curl_close($ch);
        return $result;

    }

    public function student($user_id)
    {
        $data = $this->curlPrivate($user_id);
       // return $data;
        return redirect('users/students')->with('success','success'); 

    }
}
