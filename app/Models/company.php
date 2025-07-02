<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class company extends Model
{
    //
    protected $table = "company";
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'address',
        'profile_image',
        'status',
    ];

}
