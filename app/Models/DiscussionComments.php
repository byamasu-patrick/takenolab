<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiscussionComments extends Model
{
    use HasFactory;
    protected $fillable = [
        'course_id',
        'topic_id',
        'user_id',
        'discussion_id',
        'comment_text'
    ];
}

