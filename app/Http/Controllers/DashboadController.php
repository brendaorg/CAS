<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboadController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index(){
        $this->data['totalusers'] = \App\Models\User::where('status',1)->count();
        $this->data['students'] = \App\Models\User::whereIn('usertype',array('Student'))->where('status',1)->count();
        $this->data['programs'] = \App\Models\Program::count();
         return view('layouts/dashboard',$this->data);
    }
}
