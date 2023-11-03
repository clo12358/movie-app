@extends('layouts.myApp')

@section('content')
<div>
  <div class="px-4 sm:px-0">
    <h3 class="text-base font-semibold leading-7 text-gray-900">Writer Information</h3>
  </div>
    <dl class="divide-y divide-gray-100">
      <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
        <dt class="text-sm font-medium leading-6 text-gray-900">Full name</dt>
        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{$writer->name}}</dd>
      </div>
    </dl>
</div>

<div>
    <a href="{{ route('writers.edit', $writer->id) }}">Edit</a>
    <form action="{{ route('writers.destroy', $writer->id) }}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
    <a href="{{ route('writers.index', $writer->id) }}">Back</a>

</div>

@endsection