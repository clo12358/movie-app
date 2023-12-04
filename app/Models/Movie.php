<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'rating',
        'run_time',
        'director_id',
        'genre_id',
        'writer_id',
        'producer',
        'release_date',
        'movie_image'
    ];
}
