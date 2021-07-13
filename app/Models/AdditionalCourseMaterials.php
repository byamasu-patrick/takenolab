<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdditionalCourseMaterials extends Model
{
    use HasFactory;
    protected $fillable = [
        'course_id',
        'topic_id',
        'week_description',
        'course_lecture',
        'powerpoint_presentation',
        'reference_link_one',
        'reference_link_two',
        'reference_link_three',
        'reference_link_four',
        'other_reference'
    ];
}
