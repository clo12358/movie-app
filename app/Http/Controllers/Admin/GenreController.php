<?php

namespace App\Http\Controllers\Admin;

use Auth;
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
        if(!Auth::user()->hasRole('admin'))
        {
            return to_route('user.genres.index');
        }
        $genres = Genre::all();
        //only display 8 at a time
        // orderBy('created_at', 'desc')->paginate(10)

        return view('admin.genres.index', [
            'genres' => $genres,
        ]);
        // return view('genres.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.genres.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);

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
                ->route('admin.genres.index')
                ->with('status', 'Created a new Genre!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $genre = Genre::FindOrFail($id);
        
        return view('admin.genres.show', [
            'genre' => $genre
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $genre = Genre::FindOrFail($id);

        return view('admin.genres.edit', [
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
                ->route('admin.genres.index')
                ->with('status', 'Updated Genre!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $genre = Genre::findOrFail($id);
        $genre->delete();

        return redirect()->route('admin.genres.index')->with('status', 'Genre deleted successfully');
    }
}
