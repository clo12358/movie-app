@extends('layouts.myApp')


@section('content')
<!-- 
// try {
//     // This finds all directors, genres and writers in the database so you can choose them when creating a new movie.
//     $directors = Director::findAll();
//     $genres = Genre::findAll();
//     $writers = Writer::findAll();

//     if (session_status() === PHP_SESSION_NONE){
//         session_start();
//     }
//     if (array_key_exists("form-data", $_SESSION)){
//         print_r($_SESSION["form-data"]);
//     }
//     if (array_key_exists("form-errors", $_SESSION)){
//         print_r($_SESSION["form-errors"]);
//     }
// }
// catch (Exception $e) {
//     die($e->getMessage());
// }
?> -->
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
            @if($errors->has('name'))
            <span class="text-red-400"> {{ $errors->first('name') }} </span>
            @endif
        </div>

        <!-- Movie Description -->
        <div>
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Movie Description</label>
            <input type="text" name="description" id="description" value="{{ old('description') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <!-- adds error message beside the text box -->
            @if($errors->has('description'))
            <span class="text-red-400"> {{ $errors->first('description') }} </span>
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
            @if($errors->has('rating'))
            <span class="text-red-400"> {{ $errors->first('rating') }} </span>
            @endif
        </div>

        <!-- Movie Run Time -->
        <div>
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Run TIme</label>
            <input type="text" name="run_time" id="run_time" value="{{ old('run_time') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <!-- adds error message beside the text box -->
            @if($errors->has('run_time'))
            <span class="text-red-400"> {{ $errors->first('run_time') }} </span>
            @endif
        </div>

        <!-- Select Director -->
        <div>
            <label for="director_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select Director</label>
            <select id="directors" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">


            @forelse($directors as $d)

            <option value="{{ $d->id }}">{{ $d->first_name }} {{ $d->last_name }}</option>

            @empty
            <h4>No Directors found!</h4>
            @endforelse
                
            </select>
            <!-- adds error message beside the text box -->
            @if($errors->has('director_id'))
            <span class="text-red-400"> {{ $errors->first('director_id') }} </span>
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
            @if($errors->has('genre_id'))
            <span class="text-red-400"> {{ $errors->first('genre_id') }} </span>
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
            @if($errors->has('writer_id'))
            <span class="text-red-400"> {{ $errors->first('writer_id') }} </span>
            @endif
        </div>

        <!-- Movie Producer -->
        <div>
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Producer</label>
            <input type="text" name="name" id="producer" value="{{ old('producer') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <!-- adds error message beside the text box -->
            @if($errors->has('producer'))
            <span class="text-red-400"> {{ $errors->first('producer') }} </span>
            @endif
        </div>

        <!-- Release Date -->
        <div>
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Release Date</label>
            <input type="date" name="release_date" id="release_date" value="{{ old('release_date') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <!-- adds error message beside the text box -->
            @if($errors->has('release_date'))
            <span class="text-red-400"> {{ $errors->first('release_date') }} </span>
            @endif
        </div>

            <!-- Buttons -->
    <div class="px-4 sm:px-0 flex py-5">
    <div>
    <form action="{{ route('movies.create') }}" method="POST" >

                <button type="submit" class="relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-teal-300 to-lime-300 group-hover:from-teal-300 group-hover:to-lime-300 dark:text-white dark:hover:text-gray-900 focus:ring-4 focus:outline-none focus:ring-lime-200 dark:focus:ring-lime-800">
                <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                    Create
                    </span>
                </button>
            </form>
    </div>
    <div class="flex md:order-2">
        <a href="{{ route('movies.index') }}" class="relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-green-400 to-blue-600 group-hover:from-green-400 group-hover:to-blue-600 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800">
            <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
            Back
            </span>
        </a>
    </div>
    </div>
    </form>
</div>

@endsection