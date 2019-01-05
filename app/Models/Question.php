<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'questions';
    protected $guarded = ['id'];
    protected $fillable = ['subject_id', 'content_question'];

    public function subjects()
    {
        return $this->belongsTo('App\Models\Subject');
    }

    public function exams()
    {
        return $this->belongsToMany('App\Models\Exam', 'exam_question', 'question_id', 'exam_id')->withPivot('id');
    }

    public function answers()
    {
        return $this->hasMany('App\Models\Answer', 'question_id');
    }
}
