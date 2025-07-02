<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class feedbackCategory extends Model
{
    //
    protected $table = "feedback_categories";
    protected $fillable = [
        'name',
        'created_userid',
        'updated_userid',
    ];
    public function feedback()
    {
        return $this->hasMany(feedback::class);
    }
}
