<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Director;
use App\Models\Genre;
use App\Models\Writer;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movies = Movie::paginate(10);
        $genres = Genre::all();
        
        // return view('user.movies.index')->with('movies', $movies);
        return view('user.movies.index', [
            'movies' => $movies,
            'genres' => $genres,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $movies = Movie::FindOrFail($id);
        $directors = Director::all();
        $genres = Genre::all();
        $writers = Writer::all();
        
        return view('user.movies.show', [
            'movies' => $movies,
            'directors' => $directors,
            'genres' => $genres,
            'writers' => $writers
        ]);
    }
}
