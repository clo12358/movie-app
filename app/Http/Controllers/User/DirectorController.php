<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Director;
use App\Models\Movie;

class DirectorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $directors = Director::paginate(10);
        return view('user.directors.index')->with('directors', $directors);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $director = Director::findOrFail($id);
        $movies = Movie::FindOrFail($id);

        return view('user.directors.show', [
            'director' => $director,
            'movies' =>$movies
        ]);
    }

}
