<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class section extends Model
{
    //
    protected $table = 'sections';
    protected $fillable = [
        'name',
        'section_number',
        'is_active',
        'created_userid',
        'updated_userid',
        'created_at',
        'updated_at',
    ];
    public function questions()
    {
        return $this->hasMany(question::class);
    }
}
