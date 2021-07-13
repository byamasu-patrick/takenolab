<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnrolledCourses extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'course_id',
        'course_progress',
        'enrolled_date',
        'expected_finished_date'
    ];
}
