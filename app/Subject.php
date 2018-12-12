<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $table = 'subjects';

    protected $guarded = ['id'];
    
    protected $fillable = ['name_subject', 'question_number', 'description'];

    public function getName()
    {
        return $this->name_subject;
    }

    public function exams()
    {
        return $this->hasMany('App\Exams', 'subject_id');
    }

    public function questions()
    {
        return $this->hasMany('App\Questions', 'subject_id');
    }
}
