<?php

namespace App\Http\Controllers;

use App\Exam;
use App\Question;
use App\ExamQuestion;
use App\ExamAnswer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ExamsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $request;
    function __construct(Request $request)
    {
        $this->request = $request;
    }
    public function index($id)
    {
        $exams = Exam::with('subject')->where('id', $id)->firstOrFail();
        $exams->status = 'Testing';
        $exams->save();

        $userQs = Exam::with('questions.answers')->where('id', $id)->get();
         //dd($userQs);
        return view('exam', compact('userQs', 'exams'));
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
        $ansSave = $this->request->post()['data'];
        
        foreach ($ansSave as $ans) {
            if(isset($ans['answer'])){
                $userAns = ExamAnswer::updateOrCreate([
                        'answer_id' => $ans['answer'],
                        'exam_question_id' => $ans['id'],
                    ]);
                $userAns->save();
            }      
        }
        return json_encode(true);
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
