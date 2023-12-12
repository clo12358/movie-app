@extends('layouts.myApp')

@section('content')

<div class="bg-white dark:bg-gray-900 w-full z-20 top-0 left-0 border-b border-gray-200 dark:border-gray-600">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Movie Information
        </h2>
    </div>

<div class="bg-gray-100 dark:bg-gray-800 py-8">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row -mx-4">
            <div class="md:flex-1 px-4">
                <div class="mb-4">
                    <img width="300px" src="{{ asset("storage/images/" . $movies->movie_image) }}" />
                </div>
                <div class="flex -mx-2 mb-4">
                    <div class="md:order-2">
                        <a href="{{ url()->previous() }}" class="relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-green-400 to-blue-600 group-hover:from-green-400 group-hover:to-blue-600 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800">
                            <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                            Back
                            </span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="md:flex-1 px-4">
                <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-2">{{ $movies->name }}</h2>
                <p class="text-gray-600 dark:text-gray-300 text-sm mb-4">{{ $movies->description }}</p>
                <div class="flex mb-4">
                    <div class="mr-4">
                        <span class="font-bold text-gray-700 dark:text-gray-300">Rating:</span>
                        <span class="text-gray-600 dark:text-gray-300">{{ $movies->rating }}</span>
                    </div>
                    <div class="mr-4">
                        <span class="font-bold text-gray-700 dark:text-gray-300">Run Time:</span>
                        <span class="text-gray-600 dark:text-gray-300">{{ $movies->run_time }}</span>
                    </div>
                    <div class="mr-4">
                        <span class="font-bold text-gray-700 dark:text-gray-300">Release Date:</span>
                        <span class="text-gray-600 dark:text-gray-300">{{ $movies->release_date }}</span>
                    </div>
                </div>
                <div class="flex mb-4">
                    <div class="mr-4">
                        <span class="font-bold text-gray-700 dark:text-gray-300">Director:</span>
                        <span class="text-gray-600 dark:text-gray-300"><a href="{{ route('user.directors.show', $movies->director_id) }}">
                            @foreach($directors as $director)
                                @if($director->id == $movies->director_id)
                                {{$director->first_name}} {{$director->last_name}}
                                @continue
                            @endif
                            @endforeach
                        </a></span>
                    </div>
                    <div>
                        <span class="font-bold text-gray-700 dark:text-gray-300">Genre:</span>
                        <span class="text-gray-600 dark:text-gray-300">@foreach($movies->genres as $g)
                            <a href="{{route('user.genres.show', $g->id)}}">{{$g->name}}</a>
                            @endforeach</span>
                    </div>
                </div>
                <div class="flex mb-4">
                    <div class="mr-4">
                        <span class="font-bold text-gray-700 dark:text-gray-300">Writer:</span>
                        <span class="text-gray-600 dark:text-gray-300"><a href="{{ route('user.writers.show', $movies->writer_id) }}">
                            @foreach($writers as $writer)
                                @if($writer->id == $movies->writer_id)
                                {{$writer->name}}
                                @continue
                            @endif
                            @endforeach
                        </a></span>
                    </div>
                    <div>
                        <span class="font-bold text-gray-700 dark:text-gray-300">Producer:</span>
                        <span class="text-gray-600 dark:text-gray-300">{{ $movies->producer }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection