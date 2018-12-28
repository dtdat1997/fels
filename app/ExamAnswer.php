<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExamAnswer extends Model
{
    protected $table = 'exam_answer';

    protected $guarded = ['id'];
    
    protected $fillable = ['exam_question_id', 'answer_id'];

    public function examQuestion()
    {
        return $this->belongsTo('App\ExamQuestion');
    }

    public function answer()
    {
        return $this->belongsTo('App\Answer');
    }
}
