@extends('layouts.Myapp')

@section('header')
<h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
    Genres
</h2>
@endsection

@section('content')
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Description
                </th>
                <th scope="col" class="px-6 py-3">
                    Created At
                </th>
                <th scope="col" class="px-6 py-3">
                    Read More
                </th>
            </tr>
        </thead>
    <tbody>
@forelse($genres as $genre)
    <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
            {{ $genre->name }}
        </th>
        <td class="px-6 py-4">
            {{ $genre->description }}
        </td>
        <td class="px-6 py-4">
            {{ $genre->created_at }}
        </td>
        <td class="px-6 py-4">
        <a href="{{ route('genres.show', $genre->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Read More</a>
        </td>
    </tr>
    @empty
        <h4>No Genres found!</h4>
    @endforelse
    </tbody>
    </table>
</div>
<br>
<div>
    <a href="{{ route('genres.create') }}" class="relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-teal-300 to-lime-300 group-hover:from-teal-300 group-hover:to-lime-300 dark:text-white dark:hover:text-gray-900 focus:ring-4 focus:outline-none focus:ring-lime-200 dark:focus:ring-lime-800">
        <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
      Create
  </span>
</a>
</div>
@endsection