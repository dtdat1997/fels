<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $table = 'answers';
    protected $guarded = ['id'];
    protected $fillable = ['question_id', 'content_answer', 'correct'];

    public function questions()
    {
        return $this->belongsTo('App\Questions');
    }
}
