<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    public $timestamps = false; 
    
    protected $table = 'attendances';

    protected $fillable = ['id', 'user_id','course_id','date','timein','status'];

    public function user(){
        return $this->belongsTo(\App\Models\User::class, 'user_id', 'id')->withDefault(['name' => 'Unknown']);
    }

    public function course(){
        return $this->belongsTo(\App\Models\Course::class, 'course_id', 'id')->withDefault(['name' => 'Unknown']);
    }

}
