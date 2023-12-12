@extends('layouts.Myapp')

<!-- @section('header')
<h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
    Writers
</h2>
@endsection -->

@section('content')
<div class="bg-white dark:bg-gray-900 w-full z-20 top-0 left-0 border-b border-gray-200 dark:border-gray-600">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Writers
        </h2>
    </div>
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Read More
                </th>
            </tr>
        </thead>
    <tbody>
            @forelse($writers as $writer)
            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $writer->name }}
                </th>
                <td class="px-6 py-4">
                    <a href="{{ route('user.writers.show', $writer->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Read More</a>
                </td>
            </tr>
        
        @empty
            <h4>No Writers found!</h4>
        @endforelse
        </tbody>
    </table>
    {{ $writers->links() }}
</div>
@endsection