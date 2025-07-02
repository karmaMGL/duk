<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class records extends Model
{
    //
    protected $fillable = [
    'question_id',
    'question_option_id',
    'user_id',
    'section_id',
    'is_correct',
    'is_recovered',
    'exam_id',
    'exam_record_id',
    'created_at',
    'updated_at'];
    public function question()
    {
        return $this->belongsTo(question::class);
    }
    public function questionOption()
    {
        return $this->belongsTo(questionOption::class);
    }
    public function user()
    {
        return $this->belongsTo(user::class);
    }
    public function section()
    {
        return $this->belongsTo(section::class);
    }
    public function exam()
    {
        return $this->belongsTo(staticExam::class);
    }
    public function examRecord()
    {
        return $this->belongsTo(examRecord::class);
    }
}
