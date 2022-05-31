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
    ->get(['cas_id','first_name','last_name']);
        return json_encode($students);
    }


     public function attendances()
     {
         $cas_id = request('finger_print_id');

     }
}
