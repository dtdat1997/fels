<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Subject;
use App\Exams;
use DB;

class QuestionsController extends Controller
{
    public function index($id)
    {
        $exams = Exam::with('subject')
                ->where('id', $id)->get();

        return view('exam', compact('exams'));
    }
}
