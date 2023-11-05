@extends('layouts.myApp')

@section('content')

<h3>Create Genre</h3>

{{-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}

<form action="{{ route('genres.store') }}" method="POST">
    @csrf
    <div>
        <label>Name</label>
        <input type="text" name="name" id="name" value="{{ old('name') }}">
        {{-- adds error message beside the text box --}}
        @if($errors->has('title'))
        <span> {{ $errors->first('title') }} </span>
        @endif
    </div>
    <div>
        <label>Description</label>
        <input type="text" name="desctription" id="desctription" value="{{ old('description') }}">
        @if($errors->has('title'))
        <span> {{ $errors->first('title') }} </span>
        @endif
    </div>
    <button name="submit" id="submit" type="submit">Create</button>
</form>

@endsection