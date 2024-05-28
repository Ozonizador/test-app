<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    protected $table = "answers";

    protected $fillable = ['answer_id', 'question_id', 'answer', 'is_correct', 'created_at', 'updated_at'];

    protected $casts = [
        'is_correct' => 'boolean'
    ];

    protected $hidden = ['created_at', 'updated_at'];

}