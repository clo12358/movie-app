@extends('layouts.myApp')

@section('content')

<div class="bg-white dark:bg-gray-900 w-full z-20 top-0 left-0 border-b border-gray-200 dark:border-gray-600">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Add Genre
        </h2>
    </div>

{{-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}

<div class="px-10">
<form action="{{ route('genres.store') }}" method="POST">
    @csrf
    <div>
        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
        <input type="text" name="name" id="name" value="{{ old('name') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        {{-- adds error message beside the text box --}}
        @if($errors->has('title'))
        <span> {{ $errors->first('title') }} </span>
        @endif
    </div>
    <div>
        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
        <input type="text" name="description" id="desctription" value="{{ old('description') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        @if($errors->has('description'))
        <span> {{ $errors->first('description') }} </span>
        @endif
    </div>
    <div class="px-4 sm:px-0">
    <button name="submit" id="submit" type="submit" class="text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:ring-green-100 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-400 dark:hover:bg-green-500 focus:outline-none dark:focus:ring-green-600">Create</button>
    <a href="{{ route('genres.index') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Back</a>
    </div>
</form>
</div>

@endsection