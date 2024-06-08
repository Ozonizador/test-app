<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\AdminController;

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

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Routes for exams
Route::get('/', [ExamController::class, 'chooseExam'])->name('exam.choose.get');
Route::get('/results', [ExamController::class, 'SeePastResults'])->name('exam.past-results');
Route::post('/exam', [ExamController::class, 'exam'])->name('exam.choose');
Route::post('/exam-result', [ExamController::class, 'getResults'])->name('exam.result');


// Routes for admin
Route::get('/admin', [AdminController::class, 'adminDashboard'])->name('admin.dashboard');
Route::get('/admin/results', [AdminController::class, 'examResults'])->name('admin.results');
Route::get('/admin/edit-exams', [AdminController::class, 'editExams'])->name('admin.edit-exams');

Route::post('/admin/edit-exam/{id}', [AdminController::class, 'editExamById'])->name('admin.edit-exam.id');

require __DIR__ . '/auth.php';
