<?php

namespace App\Http\Controllers;

use App\Exam;
use App\Question;
use App\ExamQuestion;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ExamsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exams = Exam::all();
        return view('exam', compact('exams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $exam = new Exam([
                'subject_id' => $request->exam_subject,
                'user_id' => Auth::user()->id,
            ]);
        $exam->save();
        $questions = Question::with('answers')
                    ->where('subject_id', $exam->subject_id)
                    ->inRandomOrder()
                    ->limit(20)->get();
        foreach ($questions as $question) {
            $userQs = new ExamQuestion([
                'question_id' => $question->id,
                'exam_id' => $exam->id,
            ]);
            $userQs->save();
        }
        
        return redirect('/')->with('status', 'Exam was created successfully!!');
    }

    public function save($id)
    {
        //if()
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $exam = new Exam([
                'subject_id' => $request->exam_subject,
            ]);
        $exam->save();
        return redirect('/')->with('status', 'Exam was created successfully!!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
