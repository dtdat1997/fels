<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{
    protected $table = 'questions';
    protected $guarded = ['id'];
    protected $fillable = ['subject_id', 'content_question'];

    public function subjects()
    {
        return $this->belongsTo('App\Subjects');
    }

    public function answers()
    {
        return $this->hasMany('App\Answers', 'question_id');
    }
}
