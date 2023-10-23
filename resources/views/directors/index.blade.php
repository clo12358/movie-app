@extends('layouts.Myapp')

@section('content')
    <h2 class="text-center">All Directors</h2>
    <ul class="list-group py-3 mb-3">
        @forelse($directors as $director)
            <li class="list-group-item my-2">
                <h5>{{ $director->title }}</h5>
                <p>{{ Str::limit($director->body,10) }}</p>
                <small class="float-right">{{ $director->created_at->diffForHumans() }}</small>
                <a href="{{route('director$directors.show',$director->id)}}">Read More</a>
            </li>
        @empty
            <h4 class="text-center">No Directors Found!</h4>
        @endforelse
    </ul>
    <div class="d-flex justify-content-center">
        {{ $directors->links() }}
    </div>
    
@endsection