<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Writer;

class WriterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $writers = Writer::all();
        //only display 8 at a time
        // orderBy('created_at', 'desc')->paginate(10)

        return view('writers.index', [
            'writers' => $writers,
        ]);
        // return view('writers.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('writers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->title);

        //validation rules
        $rules = [
            'name' => 'required|string|min:5|max:150', 
        ];
        ////////
        
        // $messages = [
        //     'title.unique' => 'Name title should be unique'
        // ];

        $request->validate($rules);

        $writer = new Writer;
        $writer->name = $request->name;
        $writer->save();

        return redirect()
                ->route('writers.index')
                ->with('status', 'Created a new Writer!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $writer = Writer::FindOrFail($id);
        
        return view('writers.show', [
            'writer' => $writer
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $writer = Writer::FindOrFail($id);

        return view('writers.edit', [
            'writer' => $writer
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
        ];
        ////////
        
        $messages = [
            'title.unique' => 'Writer title should be unique'
        ];

        $request->validate($rules, $messages);

        $writer = Writer::FindOrFail($id);
        $writer->name = $request->name;
        $writer->save();

        return redirect()
                ->route('writers.index')
                ->with('status', 'Updated Writer!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $writer = Writer::findOrFail($id);
        $writer->delete();

        return redirect()->route('writers.index')->with('status', 'Writer deleted successfully');
    }
}
