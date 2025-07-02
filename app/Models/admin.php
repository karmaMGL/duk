<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class admin extends Model
{
    //
    protected $table = "admin";
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'address',
        'profile_image',
        'status',
    ];
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $attributes = [
        'status' => 1,
    ];
    protected $dates = [
        'created_at',
        'updated_at',
    ];
}
