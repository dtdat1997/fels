<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExamQuestion extends Model
{
    protected $table = 'exam_question';

    protected $guarded = ['id'];
    
    protected $fillable = ['question_id', 'exam_id'];

    public function exams()
    {
        return $this->belongsTo('App\Exam');
    }

    // public function answers()
    // {
    //     return $this->hasMany('App\Answers');
    // }

    public function questions()
    {
        return $this->belongsTo('App\Question');
    }
}
