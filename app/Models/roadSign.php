<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class roadSign extends Model
{
    //
    protected $table = "road_signs";
    protected $fillable = [
        'name',
        'img_url',
        'description',
        'type',
        'is_active',
        'created_userid',
        'updated_userid',
    ];
}
