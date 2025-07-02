<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class examRecord extends Model
{
    //
    protected $table = "exam_records";
    protected $fillable = [
        'user_id',
        'static_exam_id',
        'is_passed',
        'is_dynamic_exam',
    ];
    public function user()
    {
        return $this->belongsTo(user::class);
    }
    public function staticExam()
    {
        return $this->belongsTo(staticExam::class);
    }
}
