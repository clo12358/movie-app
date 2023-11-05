@extends('layouts.myApp')

@section('content')
<div>
  <div class="px-4 sm:px-0">
    <h3 class="text-base font-semibold leading-7 text-gray-900">Genre Information</h3>
  </div>
    <dl class="divide-y divide-gray-100">
      <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
        <dt class="text-sm font-medium leading-6 text-gray-900">Name</dt>
        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{$genre->name}}</dd>
      </div>
      <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
        <dt class="text-sm font-medium leading-6 text-gray-900">Description</dt>
        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{$genre->description}}</dd>
      </div>
    </dl>
</div>

<div>

    <a href="{{ route('genre.edit', $genre->id) }}" class="text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:ring-green-100 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-400 dark:hover:bg-green-500 focus:outline-none dark:focus:ring-green-600">Edit</a>


    <form action="{{ route('genres.destroy', $genre->id) }}" method="post" >
        @csrf
        @method('DELETE')
        <button type="submit" class="text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:ring-red-100 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-400 dark:hover:bg-red-500 focus:outline-none dark:focus:ring-red-600">Delete</button>
    </form>

    <a href="{{ route('genres.index', $genre->id) }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Back</a>

</div>

@endsection