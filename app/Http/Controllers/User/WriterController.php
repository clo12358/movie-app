<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Writer;
use App\Models\Movie;

class WriterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $writers = Writer::paginate(10);
        return view('user.writers.index')->with('writers', $writers);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $writer = Writer::findOrFail($id);
        $movies = Movie::FindOrFail($id);

        return view('user.writers.show', [
            'writer' => $writer,
            'movies' =>$movies
        ]);
    }
}
