<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Answer;
use App\Models\Exam;

class ExamController extends Controller
{
    public function chooseExam()
    {
        $exams = Exam::get();
        return view('home', ['exams' => $exams]);
    }

    public function exam()
    {
        // Get questions from the selected exam
        $exam_id = request()->get('exam', null);
        $exam = Exam::find($exam_id);
        $questions = Question::where('exam_id', $exam_id)->get();
        $answers = Answer::whereIn('question_id', $questions->pluck('question_id'))->get();

        return view('', ['exam' => $exam, 'questions' => $questions]);
    }
}
