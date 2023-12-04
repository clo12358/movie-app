<?php

namespace App\Http\Controllers\Admin;

use Auth;
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
        // Auth::user()->authorizeRoles('admin'); 
        if(!Auth::user()->hasRole('admin'))
        {
            return to_route('user.movies.index');
        }
        $movies = Movie::all();
        $genres = Genre::all();
        //only display 8 at a time
        // orderBy('created_at', 'desc')->paginate(10)

        return view('admin.movies.index', [
            'movies' => $movies,
            'genres' => $genres,
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

        return view('admin.movies.create')
            ->with('directors', $directors)
            ->with('genres', $genres)
            ->with('writers', $writers);
        // return view('movies.create', [
        //     'directors' => $directors,
        //     'genres' => $genres,
        //     'writers' => $writers
        // ]);
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
            'release_date' => 'required',
            'movie_image' => 'file|image'
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

        $movie_image = $request->file('movie_image');
        $extension = $movie_image->getClientOriginalExtension();
        $filename = date('Y-m-d-His') . '_' . $request->title . '.' . $extension;

        $movie_image->storeAs('public/images', $filename); // store the image

        $movie->save();

        return to_route('admin.movies.index')
                ->with('status', 'Created a new Movie');
        // return redirect()
        //         ->route('movies.index')
        //         ->with('status', 'Created a new Movie!');
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
        
        return view('admin.movies.show', [
            'movies' => $movies,
            'directors' => $directors,
            'genres' => $genres,
            'writers' => $writers
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $movie = Movie::findOrFail($id);
        $directors = Director::all();
        $genres = Genre::all();
        $writers = Writer::all();

        return view('admin.movies.edit', [
            'movie' => $movie,
            'directors' => $directors,
            'genres' => $genres,
            'writers' => $writers
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        // dd($request->title);

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

        $messages = [
            'title.unique' => 'Director title should be unique'
        ];

        $request->validate($rules, $messages);

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

        $movie = Movie::FindOrFail($id);
        $movie->name = $request->name;
        $movie->save();

        return redirect()
                ->route('admin.movies.index')
                ->with('status', 'Updated Movie!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $movie = Movie::findOrFail($id);
        $movie->delete();

        return redirect()->route('admin.movies.index')->with('status', 'Movie deleted successfully');
    }
}
