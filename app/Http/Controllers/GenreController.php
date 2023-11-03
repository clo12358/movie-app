<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $genres = Genre::all();
        //only display 8 at a time
        // orderBy('created_at', 'desc')->paginate(10)

        return view('genres.index', [
            'genres' => $genres,
        ]);
        // return view('genres.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('genres.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->title);

        //validation rules
        $rules = [
            'name' => 'required|string|unique:genres,name|min:2|max:150', //Makes sure the name is unique
            'description' => 'required|string|min:5|max:2000',

        ];
        ////////
        
        $messages = [
            'name.unique' => 'Genre name should be unique'
        ];

        $request->validate($rules, $messages);

        $genre = new Genre;
        $genre->name = $request->name;
        $genre->description = $request->description;
        $genre->save();

        return redirect()
                ->route('genres.index')
                ->with('status', 'Created a new Genre!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $genre = Genre::FindOrFail($id);
        
        return view('genres.show', [
            'genre' => $genre
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $genre = Genre::FindOrFail($id);

        return view('genres.edit', [
            'genre' => $genre
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
            'name' => 'required|string|unique:genres,name|min:2|max:150', //Makes sure the name is unique
            'description' => 'required|string|min:5|max:2000',
        ];
        ////////
        
        $messages = [
            'title.unique' => 'Genre title should be unique'
        ];

        $request->validate($rules, $messages);

        $genre = Genre::FindOrFail($id);
        $genre->name = $request->name;
        $genre->save();

        return redirect()
                ->route('genres.index')
                ->with('status', 'Updated Genre!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $genre = Genre::findOrFail($id);
        $genre->delete();

        return redirect()->route('genres.index')->with('status', 'Genre deleted successfully');
    }
}
