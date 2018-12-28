<?php

namespace App\Http\Controllers;

use App\User;
use App\Subject;
use DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function index()
    {
        // $user = User::where('name','Kid328')->first();
        // Auth::login($user);
        $subjects = Subject::all();
        $exams = DB::table('exams')
                ->leftJoin('subjects', 'exams.subject_id', '=', 'subjects.id')
                ->select('subjects.name_subject', 'subjects.question_number', 'subjects.duration', 'exams.*')
                ->get();
        //$exams = Exams::all();
        
        //return view('home', compact('exams'));
        //($exams);
        //dd($exams);
        return view('home', compact('subjects', 'exams'));
    }

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
}
