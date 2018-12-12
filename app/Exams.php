<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exams extends Model
{
    protected $table = 'exams';

    protected $guarded = ['id'];

    protected $fillable = ['user_id', 'subject_id', 'spent_time', 'duration', 'status', 'score'];

    public function subjects()
    {
        return $this->belongsTo('App\Subjects');
    }
}
