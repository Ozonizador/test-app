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
        $exams = Exam_History::orderBy("created_at", "desc")->get();
        return view("admin/admin", ["exams" => $exams]);
    }

    public function examResults()
    {
        $exams = Exam_History::orderBy("created_at", "desc")->get();

        return view("admin/admin-exam-results", ["exams" => $exams]);
    }

    public function editExams()
    {
        $exams = Exam_History::orderBy("created_at", "desc")->get();
    }
}
