<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class questionOption extends Model
{
    //
    protected $table = "question_options";
    protected $fillable = [
        'question_id',
        'option_name',
        'created_userid',
        'updated_userid',
    ];
    public function question()
    {
        return $this->belongsTo(question::class);
    }
}
