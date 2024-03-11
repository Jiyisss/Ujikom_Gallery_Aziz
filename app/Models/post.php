<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    protected $table = 'posts';
    protected $fillable = ['title', 'image','author'];

    public function imagePath()
    {
        return 'img/' . $this->image;
    }
}
