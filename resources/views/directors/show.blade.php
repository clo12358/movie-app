@extends('layouts.myApp')

@section('content')
<h1>{{$director->first_name}} {{$director->last_name}}</h1>

<div>
    <a href="{{ route('directors.edit', $director->id) }}">Edit</a>

    <form action="{{ route('directors.destroy', $director->id) }}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>

    <a href="{{ route('directors.index', $director->id) }}">Back</a>

</div>

@endsection