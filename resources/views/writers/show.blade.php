@extends('layouts.myApp')

@section('content')
<h1>Todo #{{$writer->id}}</h1>

<p>{{ $writer->title }}</p>
<p>{{ $writer->body }}</p>

<div>
    <a href="{{ route('writers.edit', $writer->id) }}">Edit</a>

    <form action="{{ route('writers.destroy', $writer->id) }}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>

</div>

@endsection