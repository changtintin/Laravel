@extends('layouts.app')

@section('title', 'The Task List')

@section('content')

    {{-- @if(count($tasks)) --}}

    @forelse($tasks as $task)

        <a href="{{ route('tasks.show', ['task' => $task -> id]) }}">{{ $task -> title }}</a>
        <br>

    @empty

    <h2>There are no tasks!</h2>    
    
    @endforelse

    {{-- @endif --}}

@endsection