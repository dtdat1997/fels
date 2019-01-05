<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $table = 'subjects';

    protected $guarded = ['id'];
    
    protected $fillable = ['name_subject', 'question_number', 'duration', 'description'];

    public function exams()
    {
        return $this->hasMany('App\Models\Exam', 'subject_id');
    }

    public function questions()
    {
        return $this->hasMany('App\Models\Question', 'subject_id');
    }

    public function suggestQues()
    {
        return $this->hasMany('App\Models\SuggestQuestion', 'subject_id');
    }
}
