<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'questions';
    protected $guarded = ['id'];
    protected $fillable = ['subject_id', 'content_question'];

    public function subjects()
    {
        return $this->belongsTo('App\Subject');
    }

    public function exams()
    {
        return $this->belongsToMany('App\Exam', 'exam_question', 'question_id', 'exam_id')->withPivot('id');
    }

    public function answers()
    {
        return $this->hasMany('App\Answer', 'question_id');
    }
}
