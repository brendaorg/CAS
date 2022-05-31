<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    
    public function users(){
        $users = \App\Models\User::all();
        return json_encode($users);
    }
}
