<?php

namespace App\Http\Controllers;

use DB;
use App\Exams;
use App\Subject;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $subjects = Subject::all();
        $exams = DB::table('exams')
                ->leftJoin('subjects', 'exams.subject_id', '=', 'subjects.id')
                ->select('subjects.name_subject', 'subjects.question_number', 'subjects.duration', 'exams.*')
                ->get();
        //$exams = Exams::all();
        
        //return view('home', compact('exams'));
        //($exams);

        //dd($exams);
        return view('home', [ 'subjects' => $subjects, 'exams' => $exams ]);
    }
}
