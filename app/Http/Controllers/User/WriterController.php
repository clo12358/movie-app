<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Writer;

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

        return view('user.writers.show')->with('writer', $writer);
    }
}
