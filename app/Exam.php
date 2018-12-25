<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $table = 'exams';

    protected $guarded = ['id'];

    protected $fillable = ['user_id', 'subject_id', 'spent_time', 'duration', 'status', 'score'];

    public function subject()
    {
        return $this->belongsTo('App\Subject');
    }

    public function questions()
    {
        return $this->belongsToMany('App\Question', 'exam_question', 'exam_id', 'question_id')->withPivot('id');
    }
}
