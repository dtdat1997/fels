<?php
namespace App\Repositories\Contracts;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Subject;
use App\Models\Question;
use App\Models\Answer;
use App\Models\Exam;
use App\Models\ExamQuestion;
use App\Models\ExamAnswer;
use App\Models\SuggestQuestion;
use App\Models\SuggestAnswer;

class BaseRepository
{

    //Home
    public function showSub()
    {
        $subjects = Subject::all();
        return $subjects;
    }

    public function showAllExam()
    {
        $exams = Exam::with('subject')->get();
        return $exams;
    }

    //Exam
    public function showExam($id)
    {
        $exams = Exam::with('subject')->where('id', $id)->firstOrFail();
        $exams->status = 'testing';
        $exams->save();
        $userQs = Exam::with('questions.answers')->where('id', $id)->get();
        $ans = new ExamAnswer();
        return ['exam' => $exams,
                'userQs' => $userQs,
                'ans' => $ans,
            ];
    }

    public function createExam($request)
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
    }

    public function saveExam($id, $request)
    {
        $ansSave = $request->post()['data'];
        foreach ($ansSave as $ans) {
            if (isset($ans['answer'])) {
                $exist = ExamAnswer::where('exam_question_id', $ans['id'])->first();
                if ($exist == null) {
                    $userAns = new ExamAnswer([
                        'exam_question_id' => $ans['id'],
                        'answer_id' => $ans['answer'],
                    ]);
                    $userAns ->save();
                } else {
                    $exist->answer_id = $ans['answer'];
                    $exist->save();
                }
            }
        }
    }

    public function markExam($id)
    {
        $count = ExamAnswer::whereHas('answer.', function ($query) {
            return $query->where('correct', 1);
        })
        ->whereHas('examQuestion', function ($query) {
            return $query->where('exam_id', $id);
        })
        ->count();
        // $exam = Exam::where('id',$id)->first();
        dd($count);
        // $exam->status = 'unchecked';
        // $exam->score = $count;
        // $exam->save();
        // dd($count);
        // return json_encode(true);
    }

    //Suggest
    public function showAllSug()
    {
        $suggests = SuggestQuestion::with('subject')->get();
        return $suggests;
    }

    public function createSug($request)
    {     
        $qs = $request->post()['data'];
        $sug = new SuggestQuestion([
            'subject_id' => $qs[0]['id'],
            'user_id' => Auth::user()->id,
            'content_question' => $qs[0]['qs_content'],
        ]);
        $sug->save();
        
        foreach ($qs as $q) {
            $ans = new SuggestAnswer([
                'suggest_question_id' => $sug->id,
                'content_answer' => $q['content'],
                'correct' => $q['correct'],
            ]);
            $ans->save();
        }
    }

    public function editSug($id)
    {

    }

    public function deleteSug($id)
    {
        $suggest = SuggestQuestion::where('id', $id);
        $suggest->delete();
    }
}
