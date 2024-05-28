<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;

    protected $table = "exams";

    protected $fillable = ['exam_id', 'name', 'required_score', 'created_at', 'updated_at'];

    protected $hidden = ['created_at', 'updated_at'];

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function history()
    {
        return $this->hasMany(Exam_History::class);
    }
}