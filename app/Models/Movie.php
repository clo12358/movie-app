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
        'writer_id',
        'producer',
        'release_date',
        'movie_image'
    ];

    public function genres(){
        return $this->belongsToMany(Genre::class);
    }

    public function writer(){
        return $this->belongsTo(Writer::class);
    }

    public function director(){
        return $this->belongsTo(Director::class);
    }
}
