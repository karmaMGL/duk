<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class question extends Model
{
    use SoftDeletes;
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
    protected $casts = [
        'is_active' => 'boolean',
    ];
    public function section()
    {
        return $this->belongsTo(section::class);
    }
    public function answer()
    {
        return $this->belongsTo(questionOption::class, 'answer_id', 'id');
    }
    public function options()
    {
        return $this->hasMany(questionOption::class, 'question_id', 'id');
    }
}
