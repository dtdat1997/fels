<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExamAnswer extends Model
{
    protected $table = 'exam_answer';

    protected $guarded = ['id'];
    
    protected $fillable = ['answer_id', 'exam_question_id'];

    public function exam_question()
    {
        return $this->belongsTo('App\ExamQuestion');
    }

    public function answer()
    {
        return $this->belongsTo('App\Answer');
    }
}
