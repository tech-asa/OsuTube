<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'url',
        'genre',
        'streaming_method',
        'gender',
        'voice',
        'distributor',
        'comment'
    ];
}
