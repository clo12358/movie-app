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
    <button name="submit" id="submit" type="submit" class="text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:ring-green-100 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-400 dark:hover:bg-green-500 focus:outline-none dark:focus:ring-green-600">Create</button>
</form>

@endsection