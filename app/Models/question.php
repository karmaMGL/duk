<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class question extends Model
{
    //
    protected $table = 'questions';
    protected $fillable = [
        'name',
        'img_url',
        'section_id',
        'is_active',
        'answer_id',
        'why_correct',
        'created_userid',
        'updated_userid',
        'created_at',
        'updated_at',
    ];
    public function section()
    {
        return $this->belongsTo(section::class);
    }
    public function answer()
    {
        return $this->belongsTo(questionOption::class, 'answer_id','id');
    }
}
