<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Genre;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $genres = Genre::paginate(10);
        return view('user.genres.index')->with('genres', $genres);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $genre = Genre::findOrFail($id);
        $movies = Movie::FindOrFail($id);

        return view('user.genres.show', [
            'genre' => $genre,
            'movies' =>$movies
        ]);
    }
}
