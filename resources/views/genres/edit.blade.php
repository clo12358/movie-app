@extends('layouts.myApp')

@section('content')

<h3>Edit Genre</h3>

{{-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}

<form action="{{ route('genres.update', $genres->id) }}" method="post">
    @csrf
    @method('PUT')
    <div>
        <label>Name</label>
        <input type="text" name="name" id="name" value="{{ old('name') ? : $genre->title }}">
        {{-- adds error message beside the text box --}}
        @if($errors->has('title'))
        <span> {{ $errors->first('title') }} </span>
        @endif
    </div>
    <div>
        <label>Description/label>
        <input type="text" name="description" id="description" value="{{ old('description') ? : $director->body }}">
        @if($errors->has('body'))
        <span> {{ $errors->first('body') }} </span>
        @endif
    </div>
    <button type="submit">Update</button>
</form>

@endsection