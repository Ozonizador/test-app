<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $table = "users";

    protected $fillable = ['user_id', 'username', 'email', 'password', 'created_at', 'updated_at'];

    protected $hidden = ['created_at', 'updated_at'];
}