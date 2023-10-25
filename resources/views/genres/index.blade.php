@extends('layouts.Myapp')

@section('header')
<h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
    Genres
</h2>
@endsection

@section('content')
<a href="{{ route('genres.create') }}">Create</a>
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
            </tr>
        </thead>
    </table>

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
    </tr>
    @empty
        <h4>No Genres found!</h4>
    @endforelse
    </tbody>
</div>
@endsection