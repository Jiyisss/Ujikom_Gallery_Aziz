<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class like extends Model
{

    protected $table = 'like';  
    protected $fillable = [
        'user_id',
        'post_id',
    ];
}
