@extends('layouts.myApp')

@section('content')

<h3>Edit Writer</h3>

{{-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}

<form action="{{ route('writers.update', $writer->id) }}" method="post">
    @csrf
    @method('PUT')
    <div>
        <label>Name</label>
        <input type="text" name="name" id="name" value="{{ old('name') ? : $writer->name }}">
        <!-- adds error message beside the text box -->
        @if($errors->has('title'))
        <span> {{ $errors->first('title') }} </span>
        @endif
    </div>
    <button type="submit">Update</button>
</form>

@endsection