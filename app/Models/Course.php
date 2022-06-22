<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    
    protected $table = 'courses';

    protected $fillable = ['id','uuid','course_name','course_code','periodic_time','venue_name','created_at','user_id'];

    public function attendees()
    {
        return $this->hasMany(\App\Models\User::class);
    }
}
