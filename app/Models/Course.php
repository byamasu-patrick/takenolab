<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    // Course model for manipulating courses
    use HasFactory;
    
    protected $fillable = [
        'course_name',
        'course_image',
        'course_heading',
        'account_type',
        'course_overview',
        'title_catching_area_one',
        'course_catching_area_one',
        'title_catching_area_two',
        'course_catching_area_two',
        'title_catching_area_three',
        'course_catching_area_three'
    ];
}
