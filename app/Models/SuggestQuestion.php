<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuggestQuestion extends Model
{
    protected $table = 'suggest_questions';

    protected $guarded = ['id'];
    
    protected $fillable = ['subject_id', 'user_id', 'content_question'];

    public function suggestAns()
    {
        return $this->hasMany('App\Models\SuggestAns', 'suggest_question_id');
    }

    public function subject()
    {
        return $this->belongsTo('App\Models\Subject', 'subject_id');
    }
}
