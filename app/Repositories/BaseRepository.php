<?php
namespace App\Repositories;

use App\Models\User;
use App\Models\Subject;
use App\Models\Question;
use App\Models\Answer;
use App\Models\Exam;
use App\Models\ExamQuestion;
use App\Models\ExamAnswer;
use App\Models\SuggestQuestion;

class BaseRepository
{

    public function showSub()
    {
        $subjects = Subject::all();
        return $subjects;
    }
}
