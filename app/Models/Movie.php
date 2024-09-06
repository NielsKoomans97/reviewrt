<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    public function actors()
    {
        return $this->hasMany(Actor::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
