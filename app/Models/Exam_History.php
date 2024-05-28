<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam_History extends Model
{
    use HasFactory;

    protected $table = "exam_history";

    protected $fillable = ['history_id', 'participant', 'exam_id', 'total_score', 'created_at', 'updated_at'];

    protected $hidden = ['created_at', 'updated_at'];
}