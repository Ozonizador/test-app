<?php

use App\Models\Exam;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExamController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get(
    "/",
    function () {
        return view("welcome");
    }
);

Route::get('/home', [ExamController::class, 'chooseExam']);

Route::post('/exam', [ExamController::class, 'exam'])->name('exam.choose');

Route::post('/exam-result', [ExamController::class, 'getResults'])->name('exam.submit');
