<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResultBook extends Model
{
    use HasFactory;
    protected $fillable = [
        'course_id',
        'topic_id',
        'student_id',
        'question_id',
        'marks',
        'selected_answer'
    ];
}
