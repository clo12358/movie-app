@extends('layouts.myApp')

@section('content')
<div class="bg-gray-100 dark:bg-gray-800 py-8">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row -mx-4">
            <div class="md:flex-1 px-4">
                <div class=" mb-4">
                    <div class="mr-4">
                        <p class="text-6xl text-gray-900 dark:text-white font-bold">{{ $writer->name }}</p>
                    </div>
                    <br>
                    <div class="mr-4">
                        <p class="text-2xl text-gray-900 dark:text-white font-bold">Movies that has this genre</p>
                        @forelse($writer->movies as $movie)
                        <a href="{{ route('user.movies.show', $movie->id) }}" class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $movie->name}}</h5>
                        <p class="font-normal text-gray-700 dark:text-gray-400">{{ $movie->description}}</p>
                        </a>
                        <br>
                        @empty
                        <h4>No Movies found!</h4>
                        @endforelse
                    </div>
                </div>
                <div class="flex">
                    <div class="md:order-2">
                        <a href="{{ url()->previous() }}" class="relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-green-400 to-blue-600 group-hover:from-green-400 group-hover:to-blue-600 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800">
                            <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                            Back
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection