<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssessmentBook extends Model
{
    use HasFactory;
    protected $fillable = [
        'course_id',
        'topic_id',
        'teacher_id',
        'question',
        'first_answer',
        'second_answer',
        'third_answer',
        'fourth_answer',
        'correct_answer',
        'approved_state',
        'published_state'
    ];
}
