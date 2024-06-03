<?php

namespace App\Http\Controllers;

use App\Models\Exam_History;
use App\Models\Question;
use App\Models\Answer;
use App\Models\Exam;
use Illuminate\Support\Facades\Auth;

class ExamController extends Controller
{
    public function chooseExam()
    {
        $exams = Exam::get();
        return view('home', ['exams' => $exams]);
    }

    public function exam()
    {
        // Get personal info
        $participant = request()->get('name', '');

        // Get questions from the selected exam
        $exam_id = request()->get('exam', null);
        $exam = Exam::where('exam_id', $exam_id)->first();
        $questions = Question::where('exam_id', $exam_id)->get();
        $answers = Answer::whereIn('question_id', $questions->pluck('question_id'))->get();

        return view('exam', ['exam' => $exam, 'questions' => $questions, 'answers' => $answers, 'participant' => $participant]);
    }

    public function getResults()
    {
        // Get answers given
        $answersGiven = request()->all();
        $participant = request()->get('participant', '');
        $exam_id = request()->get('exam_id', null);
        $exam = Exam::where('exam_id', $exam_id)->first();

        $totalScore = 0;

        foreach ($answersGiven as $answer) {

            // Get question by id
            $parts = explode('-', $answer);
            $answerId = isset($parts[1]) ? $parts[1] : '';
            $fullAnswer = Answer::where('answer_id', $answerId)->first();

            // If question is correct add to total score
            if ($fullAnswer != null && $fullAnswer->is_correct) {
                $question = Question::where('question_id', $fullAnswer->question_id)->first();
                $totalScore += $question->score;
            }
        }
        // Create the exam and add necessary info
        $history = new Exam_History();

        if (Auth::check()) {
            $history->user_id = Auth::id();
            $history->name = null;
        } else {
            $history->user_id = null;
            $history->name = $participant;
        }

        $history->total_score = $totalScore;
        $history->exam_id = $exam_id;
        $history->save();

        return view('exam-result', ['total_score' => $totalScore, 'participant' => $participant, 'exam' => $exam]);
    }
}
