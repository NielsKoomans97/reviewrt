<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    use HasFactory;

    public function movies()
    {
        return $this->hasMany(Movie::class);
    }

    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }
}
