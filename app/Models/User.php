<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    protected $table = "users";

    protected $fillable = ['id', 'name', 'email', 'role_id', 'password', 'created_at', 'updated_at'];

    protected $hidden = ['created_at', 'updated_at'];

    public function exam_history()
    {
        return $this->hasMany(Exam_History::class);
    }
}