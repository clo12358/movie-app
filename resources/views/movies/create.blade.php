@extends('layouts.myApp')

@section('content')

<div class="bg-white dark:bg-gray-900 w-full z-20 top-0 left-0 border-b border-gray-200 dark:border-gray-600">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Add Movie
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
    <form action="{{ route('movies.store') }}" method="POST">
        @csrf
        <!-- Movie Name -->
        <div>
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Movie Name</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            {{-- adds error message beside the text box --}}
            @if($errors->has('title'))
            <span> {{ $errors->first('title') }} </span>
            @endif
        </div>

        <!-- Movie Description -->
        <div>
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Movie Description</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <!-- adds error message beside the text box -->
            @if($errors->has('title'))
            <span> {{ $errors->first('title') }} </span>
            @endif
        </div>

        <!-- Select Rating -->
        <div>
            <label for="rating" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rating</label>
            <select id="rating" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option>1 Star</option>
                <option>2 Stars</option>
                <option>3 Stars</option>
                <option>4 Stars</option>
                <option>5 Stars</option>
            </select>
            <!-- adds error message beside the text box -->
            @if($errors->has('title'))
            <span> {{ $errors->first('title') }} </span>
            @endif
        </div>

        <!-- Movie Run Time -->
        <div>
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Run TIme</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <!-- adds error message beside the text box -->
            @if($errors->has('title'))
            <span> {{ $errors->first('title') }} </span>
            @endif
        </div>

        <!-- Select Director -->
        <div>
            <label for="director_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select Director</label>
            <select id="directors" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <!-- <option>United States</option>
                <option>Canada</option>
                <option>France</option>
                <option>Germany</option> -->
            </select>
            <!-- adds error message beside the text box -->
            @if($errors->has('title'))
            <span> {{ $errors->first('title') }} </span>
            @endif
        </div>

        <!-- Select Genre -->
        <div>
            <label for="genre_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select Genre</label>
            <select id="genres" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <!-- <option>United States</option>
                <option>Canada</option>
                <option>France</option>
                <option>Germany</option> -->
            </select>
            <!-- adds error message beside the text box -->
            @if($errors->has('title'))
            <span> {{ $errors->first('title') }} </span>
            @endif
        </div>

        <!-- Select Writer -->
        <div>
            <label for="writer_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select Writer</label>
            <select id="writers" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <!-- <option>United States</option>
                <option>Canada</option>
                <option>France</option>
                <option>Germany</option> -->
            </select>
            <!-- adds error message beside the text box -->
            @if($errors->has('title'))
            <span> {{ $errors->first('title') }} </span>
            @endif
        </div>

        <!-- Movie Producer -->
        <div>
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Producer</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <!-- adds error message beside the text box -->
            @if($errors->has('title'))
            <span> {{ $errors->first('title') }} </span>
            @endif
        </div>

        <!-- Release Date -->
        <div>
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Release Date</label>
            <input type="date" name="name" id="name" value="{{ old('name') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <!-- adds error message beside the text box -->
            @if($errors->has('title'))
            <span> {{ $errors->first('title') }} </span>
            @endif
        </div>

        <div class="px-4 sm:px-0">
            <button name="submit" id="submit" type="submit" class="text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:ring-green-100 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-400 dark:hover:bg-green-500 focus:outline-none dark:focus:ring-green-600">Create</button>
            <a href="{{ route('movies.index') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Back</a>
        </div>
    </form>
</div>

@endsection