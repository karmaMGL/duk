<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class feedback extends Model
{
    //
    protected $table = "feedback";
    protected $fillable = [
        'title',
        'content',
        'category_id',
        'user_id',
        'type',
    ];
    public function category()
    {
        return $this->belongsTo(feedbackCategory::class);
    }
    public function user()
    {
        return $this->belongsTo(user::class);
    }
}
