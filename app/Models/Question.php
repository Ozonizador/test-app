<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $table = "questions";

    protected $fillable = ['question_id', 'exam_id', 'name', 'score', 'created_at', 'updated_at'];

    protected $hidden = ['created_at', 'updated_at'];
}