@extends('layouts.myApp')

@section('content')

<div class="bg-white dark:bg-gray-900 w-full z-20 top-0 left-0 border-b border-gray-200 dark:border-gray-600">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Genre Information
        </h2>
    </div>

    <!-- Table -->
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
                    Rating
                </th>
                <th scope="col" class="px-6 py-3">
                    Run Time
                </th>
                <th scope="col" class="px-6 py-3">
                    Director
                </th>
                <th scope="col" class="px-6 py-3">
                    Genre
                </th>
                <th scope="col" class="px-6 py-3">
                    Writer
                </th>
                <th scope="col" class="px-6 py-3">
                    Producer
                </th>
                <th scope="col" class="px-6 py-3">
                    Release Date
                </th>
                <th scope="col" class="px-6 py-3">
                    Created at
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>

        <tbody>
    <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
            {{ $movies->name }}
        </th>
        <td class="px-6 py-4">
            {{ $movies->description }}
        </td>
        <td class="px-6 py-4">
            {{ $movies->rating }}
        </td>
        <td class="px-6 py-4">
            {{ $movies->run_time }}
        </td>
        <td class="px-6 py-4">
            {{ $movies->director_id }}
        </td>
        <td class="px-6 py-4">
            {{ $movies->movies_id }}
        </td>
        <td class="px-6 py-4">
            {{ $movies->writer_id }}
        </td>
        <td class="px-6 py-4">
            {{ $movies->producer }}
        </td>
        <td class="px-6 py-4">
            {{ $movies->release_date }}
        </td>
        <td class="px-6 py-4">
            {{ $movies->create_at }}
        </td>
        <td class="px-6 py-4">
            <div class="md:order-2">
                <a href="{{ route('movies.edit', $movies->id) }}" class="relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-teal-300 to-lime-300 group-hover:from-teal-300 group-hover:to-lime-300 dark:text-white dark:hover:text-gray-900 focus:ring-4 focus:outline-none focus:ring-lime-200 dark:focus:ring-lime-800">
                <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                Edit
                </span>
                </a>
            </div>
            <form action="{{ route('movies.destroy', $movies->id) }}" method="post" >
                @csrf
                @method('DELETE')
                <button type="submit" class="relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-purple-500 to-pink-500 group-hover:from-purple-500 group-hover:to-pink-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-purple-200 dark:focus:ring-purple-800">
                <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                Delete
                </span>
            </button>
    </form>
        </td>
    </tr>
    </tbody>
    </table>

</div>

<!-- Buttons -->
<div class="flex pt-2.5 px-5">
    <div class="md:order-2">
        <a href="{{ route('movies.index', $movies->id) }}" class="relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-green-400 to-blue-600 group-hover:from-green-400 group-hover:to-blue-600 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800">
            <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
            Back
            </span>
        </a>
    </div>
</div>

@endsection