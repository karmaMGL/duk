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
        'is_correct',
        'created_userid',
        'updated_userid',
    ];
    protected $casts = [
        'is_correct' => 'boolean',
    ];
    public function question()
    {
        return $this->belongsTo(question::class);
    }
}
