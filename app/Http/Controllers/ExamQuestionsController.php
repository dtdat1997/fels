<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exam;

class ExamQuestionsController extends Controller
{
    public function index($id)
    {
        $exams = Exam::with('subject')->where('id', $id)->firstOrFail();

        $userQs = Exam::with('questions.answers')->where('id', $id)->get();
        // dd(userQs);
            
        return view('exam', compact('userQs', 'exams'));
    }
}
