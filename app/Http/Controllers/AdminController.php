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
        $exams = Exam::orderBy("created_at", "desc")->get();

        return view("admin/admin-edit-exams", ["exams" => $exams]);
    }

    public function editExamById(int $id)
    {
        $exam = Exam::find($id);
        $questions = Question::where("exam_id", $id)->get();
        $answers = [];

        foreach ($questions as $question) {
            $questionAnswer = Answer::where("question_id", $question->id)->get();
            $answers[$question->id] = $questionAnswer;
        }

        dd($questions, $answers);
    }
}
