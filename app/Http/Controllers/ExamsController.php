<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Question;
use App\Models\Answer;
use App\Models\ExamQuestion;
use App\Models\ExamAnswer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Repositories\Contracts\BaseRepository;

class ExamsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $base;
    protected $request;

    public function __construct(BaseRepository $repo, Request $request)
    {
        $this->base = $repo;
        $this->request = $request;
    }

    public function show($id)
    {
        $val = $this->base->showExam($id);
        $exams = $val['exam'];
        $userQs = $val['userQs'];
        $ans = $val['ans'];
        return view('exams.exam', compact('exams', 'userQs', 'ans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create(Request $request)
    {
        $this->base->createExam($request);
        return redirect('/')->with('status', 'Exam was created successfully!!');
    }

    public function saveExam($id)
    {
        $this->base->saveExam($id, $this->request);
        return json_encode(true);
    }

    public function mark($id)
    {
        $this->saveExam($id);
        $this->base->mark($id);
    }

    /**
     * Display the specified resource.
     *
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
