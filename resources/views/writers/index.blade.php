@extends('layouts.Myapp')

@section('header')
<h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
    Writers
</h2>
@endsection

@section('content')
<!-- <a href="{{ route('writers.create') }}">Create</a> -->
<a href="{{ route('writers.create') }}" class="text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:ring-green-100 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-400 dark:hover:bg-green-500 focus:outline-none dark:focus:ring-green-600">Create</a>
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Created At
                </th>
            </tr>
        </thead>
    </table>

    <tbody>
            @forelse($writers as $writer)
            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $writer->name }}
                </th>
                <td class="px-6 py-4">
                    {{ $writer->created_at }}
                </td>
                <td class="px-6 py-4">
                    <a href="{{ route('writers.show', $writer->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Read More</a>
                </td>
            </tr>
        
        @empty
            <h4>No Writers found!</h4>
        @endforelse
            
        </tbody>
</div>
@endsection