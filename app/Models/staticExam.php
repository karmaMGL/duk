<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class staticExam extends Model
{
    //
    protected $table = "static_exams";
    protected $fillable = [
        'order_number',
        'title',
        'description',
        'is_active',
        'created_userid',
        'updated_userid',
    ];
    public function records()
    {
        return $this->hasMany(records::class);
    }
}
