<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class staticExamQuestions extends Model
{
    //
    protected $table = "static_exam_questions";
    protected $fillable = [
        'static_exam_id',
        'question_id',
        'created_userid',
        'updated_userid',
    ];
    public function staticExam()
    {
        return $this->belongsTo(staticExam::class);
    }
    public function question()
    {
        return $this->belongsTo(question::class);
    }
}
