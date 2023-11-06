<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

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
        return view('movies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->title);

        //validation rules
        // $rules = [
        //     'name' => 'required|string|min:5|max:150', 
        // ];
        ////////
        
        // $messages = [
        //     'title.unique' => 'Name title should be unique'
        // ];

        $request->validate($rules);

        $movie = new Movie;
        $movie->name = $request->name;
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
