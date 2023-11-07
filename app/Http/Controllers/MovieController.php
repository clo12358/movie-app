<?php

namespace App\Http\Controllers;

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
        $movies = Movie::all();
        //only display 8 at a time
        // orderBy('created_at', 'desc')->paginate(10)

        return view('movies.index', [
            'movies' => $movies,
        ]);
        // return view('movies.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $directors = Director::all();
        $genres = Genre::all();
        $writers = Writer::all();

        return view('movies.create', [
            'directors' => $directors,
            'genres' => $genres,
            'writers' => $writers
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);

        //validation rules
        $rules = [
            'name' => 'required|string|min:5|max:150', 
            'description' => 'required|string|min:5|max:1000',
            'rating' => 'required|in:1 star,2 stars,3 stars,4 stars,5 stars',
            'run_time' => 'required|string',
            'director_id' => 'required|exists:directors,id',
            'genre_id' => 'required|exists:genres,id',
            'writer_id' => 'required|exists:writers,id',
            'producer' => 'required|string|min:5|max:150',
            'release_date' => 'required'
        ];
        ////////

        $request->validate($rules);

        $movie = new Movie;
        $movie->name = $request->name;
        $movie->description = $request->description;
        $movie->rating = $request->rating;
        $movie->run_time = $request->run_time;
        $movie->director_id = $request->director_id;
        $movie->genre_id = $request->genre_id;
        $movie->writer_id = $request->writer_id;
        $movie->producer = $request->producer;
        $movie->release_date = $request->release_date;

        $movie->save();

        return redirect()
                ->route('movies.index')
                ->with('status', 'Created a new Movie!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $movie = Movie::FindOrFail($id);
        
        return view('movies.show', [
            'movie' => $movie
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $movie = Movie::FindOrFail($id);

        return view('movies.edit', [
            'movie' => $movie
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        // dd($request->title);

        //validation rules
        // $rules = [
        //     'name' => 'required|string|min:5|max:150', 
        //     'description' => 'required|string|min:5|max:1000',
        //     'rating' => 'required|enum',
        //     'run_time' => 'required|string',
        //     'run_time' => 'required|string',
        //     'director_id' => 'required',
        //     'genre_id' => 'required',
        //     'writer_id' => 'required',
        //     'producer' => 'required|string|min:5|max:150',
        //     'date' => 'required'
        // ];
        ////////
        
        // $messages = [
        //     'title.unique' => 'Movie title should be unique'
        // ];

        $request->validate($rules, $messages);

        $movie = Movie::FindOrFail($id);
        $movie->name = $request->name;
        $movie->save();

        return redirect()
                ->route('movies.index')
                ->with('status', 'Updated Movie!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $movie = Movie::findOrFail($id);
        $movie->delete();

        return redirect()->route('movies.index')->with('status', 'Movie deleted successfully');
    }
}
