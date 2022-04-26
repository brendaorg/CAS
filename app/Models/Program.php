<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    protected $table = 'programs';
    
    protected $fillable = ['id','program_name','program_code','program_time','program_type'];


    public function users()
    {
        return $this->hasMany(\App\Models\User::class);
    }
}
