@extends('layouts.Myapp')

@section('header')
<h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
    Writers
</h2>
@endsection

@section('content')
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    First Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Last Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Created At
                </th>
            </tr>
        </thead>
    </table>

    <tbody>
@forelse($writers as $director)
    <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
            {{ $writer->first_name }}
        </th>
        <td class="px-6 py-4">
            {{ $writer->last_name }}
        </td>
    </tr>
    @empty
        <h4>No Directors found!</h4>
    @endforelse
    </tbody>
</div>
@endsection