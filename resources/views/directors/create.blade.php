@extends('layouts.myApp')

@section('content')

<h3>Create Director</h3>

{{-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}

<form action="{{ route('directors.store') }}" method="post">
    @csrf
    <div>
        <label>First Name</label>
        <input type="text" name="first_name" id="first_name" value="{{ old('first_name') }}">
        {{-- adds error message beside the text box --}}
        @if($errors->has('title'))
        <span> {{ $errors->first('title') }} </span>
        @endif
    </div>
    <div>
        <label>Last Name</label>
        <input type="text" name="last_name" id="last_name" value="{{ old('last_name') }}">
        @if($errors->has('title'))
        <span> {{ $errors->first('title') }} </span>
        @endif
    </div>
    <button type="submit">Create</button>
</form>

@endsection