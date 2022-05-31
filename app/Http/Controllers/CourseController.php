<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;

use Illuminate\Http\Request;

class CourseController extends Controller
{
    

     public function index()
    {
        $this->data['courses'] = \App\Models\Course::all();
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
            'venue_name' => 'string'
        ]);

        $uuid = Str::uuid()->toString();
        $array_data = array_merge(['uuid'=>$uuid,'created_at'=> now()],$data);
       // \App\Models\Course::create($array_data);
        //  dd($array_data);
          \DB::table('courses')->insert($array_data);

        return redirect('/courses')->with('Created successfully');
    }
   
}
