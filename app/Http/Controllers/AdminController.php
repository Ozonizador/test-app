<?php

namespace App\Http\Controllers;

use App\Models\Exam_History;
use App\Models\Question;
use App\Models\Answer;
use App\Models\Exam;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function adminDashboard()
    {
        return view("admin");
    }
}
