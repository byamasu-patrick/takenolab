<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiscussionForum extends Model
{
    use HasFactory;
    protected $fillable = [
        'course_id',
        'topic_id',
        'teacher_id',
        'discussion_description'
    ];

}
