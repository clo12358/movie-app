@extends('layouts.myApp')

@section('content')

<h3>Edit Director</h3>

{{-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}

<form action="{{ route('directors.update', $director->id) }}" method="post">
    @csrf
    @method('PUT')
    <div>
        <label>First Name</label>
        <input type="text" name="first_name" id="first_name" value="{{ old('first_name') ? : $director->title }}">
        {{-- adds error message beside the text box --}}
        @if($errors->has('title'))
        <span> {{ $errors->first('title') }} </span>
        @endif
    </div>
    <div>
        <label>Last Name</label>
        <input type="text" name="last_name" id="last_name" value="{{ old('last_name') ? : $director->body }}">
        @if($errors->has('body'))
        <span> {{ $errors->first('body') }} </span>
        @endif
    </div>
    <button type="submit">Update</button>
</form>

@endsection