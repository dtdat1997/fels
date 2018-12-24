<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exam;
use App\Question;
use App\Answer;
use App\ExamQuestion;
use DB;

class ExamQuestionsController extends Controller
{
    public function index($id)
    {
        $exams = Exam::with('subject')->where('id', $id)->firstOrFail();

        $userQs = Exam::with('questions.answers')->where('id', $id)->get();
            
        return view('exam', compact('userQs', 'exams'));
    }
}
