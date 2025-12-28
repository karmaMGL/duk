<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class questionOption extends Model
{
    use SoftDeletes;
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
