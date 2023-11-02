@extends('layouts.myApp')

@section('content')
<h1>{{$writer->name}}</h1>

<div>
    <a href="{{ route('writers.edit', $writer->id) }}">Edit</a>

    <form action="{{ route('writers.destroy', $writer->id) }}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>

    <a href="{{ route('writers.index', $writer->id) }}">Back</a>

</div>

@endsection