<?php

namespace App\Http\Controllers\Admin;

use Auth;
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
        if(!Auth::user()->hasRole('admin'))
        {
            return to_route('user.directors.index');
        }
        $directors = Director::all();
        //only display 8 at a time
        // orderBy('created_at', 'desc')->paginate(10);

        return view('admin.directors.index', [
            'directors' => $directors,
        ]);
        // return view('directors.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.directors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->title);

        //validation rules
        $rules = [
            'first_name' => 'required|string|min:5|max:150', 
            'last_name' => 'required|string|min:2|max:150',

        ];
        ////////

        $request->validate($rules);

        $director = new Director;
        $director->first_name = $request->first_name;
        $director->last_name = $request->last_name;
        $director->save();

        return redirect()
                ->route('admin.directors.index')
                ->with('status', 'Created a new Director!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $director = Director::FindOrFail($id);
        $movies = Movie::FindOrFail($id);
        
        return view('admin.directors.show', [
            'director' => $director,
            'movies' =>$movies
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $director = Director::FindOrFail($id);

        return view('admin.directors.edit', [
            'director' => $director
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
            'first_name' => 'required|string|min:5|max:150', 
        ];
        ////////
        
        $messages = [
            'title.unique' => 'Director title should be unique'
        ];

        $request->validate($rules, $messages);

        $director = Director::FindOrFail($id);
        $director->first_name = $request->first_name;
        $director->last_name = $request->last_name;
        $director->save();

        return redirect()
                ->route('admin.directors.index')
                ->with('status', 'Updated Director!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $director = Director::findOrFail($id);
        $director->delete();

        return redirect()->route('admin.directors.index')->with('status', 'Director deleted successfully');
    }
}
