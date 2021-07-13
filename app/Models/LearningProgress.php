<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LearningProgress extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id',
        'course_id',
        'week_id',
        'video_played',
        'week_progress'
    ];
}
