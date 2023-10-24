@extends('layouts.myApp')

@section('content')

<h3>Add Directors</h3>

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
        <input type="text" name="First Name" id="First Name" value="{{ old('title') }}">
        <!-- adds error message beside the text box -->
        @if($errors->has('First Name'))
        <span> {{ $errors->first('First Name') }} </span>
        @endif
    </div>
    <div>
        <label>Last Name</label>
        <input type="text" name="Last Name" id="Last Name" value="{{ old('body') }}">
        @if($errors->has('Last Mame'))
        <span> {{ $errors->first('Last Name') }} </span>
        @endif
    </div>
    <button type="submit">Create</button>
</form>

@endsection