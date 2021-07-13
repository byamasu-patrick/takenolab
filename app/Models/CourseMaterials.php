<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseMaterials extends Model
{
    use HasFactory;
    protected $fillable =  [
        'course_id',
        'topic_id',
        'subtopic_id',
        'lesson_name',
        'lesson_description',
        'lecture_video',
        'visibility_state'
    ];
    
}
