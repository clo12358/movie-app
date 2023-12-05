@extends('layouts.myApp')


@section('content')

<div class="bg-white dark:bg-gray-900 w-full z-20 top-0 left-0 border-b border-gray-200 dark:border-gray-600">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Add Movie
        </h2>
    </div>

<div class="px-10">
    {{-- <form action="{{ route('movies.store') }}" method="POST"> --}}
    <form enctype="multipart/form-data" action="{{ route('admin.movies.store') }}" method="post">
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
            <select name="rating" id="rating" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option disabled selected value></option>
                <option value="1 star">1 Star</option>
                <option value="2 stars">2 Stars</option>
                <option value="3 stars">3 Stars</option>
                <option value="4 stars">4 Stars</option>
                <option value="5 stars">5 Stars</option>
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
            <select name="director_id" id="directors" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option disabled selected value></option>

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
            {{-- <select name="genre_id" id="genres" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"> --}}
            {{-- <option disabled selected value></option>

            @forelse($genres as $g)

            <option value="{{ $g->id }}">{{ $g->name }}</option>

            @empty
            <h4>No Genres found!</h4>
            @endforelse --}}

            @forelse($genres as $g)

            <input id="{{$g->id}}" type="checkbox" value="{{$g->id}}" name="genres[]">
            <label for="{{$g->id}}">{{$g->name}}</label>

            @empty
            <h4>No Genres found!</h4>

            @endforelse
                
            </select>
            <!-- adds error message beside the text box -->
            @if($errors->has('genres'))
            <span class="text-red-400"> {{ $errors->first('genre_id') }} </span>
            @endif
        </div>

        <!-- Select Writer -->
        <div>
            <label for="writer_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select Writer</label>
            <select name="writer_id" id="writers" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option disabled selected value></option>

            @forelse($writers as $w)

            <option value="{{ $w->id }}">{{ $w->name }}</option>

            @empty
            <h4>No Genres found!</h4>
            @endforelse
                
            </select>
            <!-- adds error message beside the text box -->
            @if($errors->has('writer_id'))
            <span class="text-red-400"> {{ $errors->first('writer_id') }} </span>
            @endif
        </div>

        <!-- Movie Producer -->
        <div>
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Producer</label>
            <input type="text" name="producer" id="producer" value="{{ old('producer') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
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

        {{-- Upload Image --}}
        <input
            type="file"
            name="movie_image"
            placeholder="Movie image"
            class="w-full mt-6"
            field="movie_image"
            />

            <!-- Buttons -->
    <div class="px-4 sm:px-0 flex py-5">
    <div>
    <form action="{{ route('admin.movies.create') }}" method="POST" >

                <button type="submit" class="relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-teal-300 to-lime-300 group-hover:from-teal-300 group-hover:to-lime-300 dark:text-white dark:hover:text-gray-900 focus:ring-4 focus:outline-none focus:ring-lime-200 dark:focus:ring-lime-800">
                <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                    Create
                    </span>
                </button>
            </form>
    </div>
    <div class="flex md:order-2">
        <a href="{{ route('admin.movies.index') }}" class="relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-green-400 to-blue-600 group-hover:from-green-400 group-hover:to-blue-600 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800">
            <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
            Back
            </span>
        </a>
    </div>
    </div>
    </form>
</div>

@endsection