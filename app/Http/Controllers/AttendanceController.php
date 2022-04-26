<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    
    public function attendances(){
        //'user_id' = request('user_id');
    }


    public function reports(){
        return view('layouts/reports');
    }
}
