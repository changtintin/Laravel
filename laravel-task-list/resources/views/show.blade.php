{{-- 

    MY NOTE    
    =====================================================================
    _ Avoid create head and body in every template

    _ extends use "." as directory seperater

    _ To know where we render this content in the template
        * @section: specify the name of area
        * @yield: specify destination to rendor
     
--}}

@extends('layouts.app')

@section('content')

@section('title', $task -> title)

@isset($task -> description)

    <p> {{ $task -> description }} </p>

@endisset

@isset($task -> long_description)
    
    <p> {{ $task -> long_description }} </p>

@endisset    

    <p> {{ $task -> created_at }} </p>

    <p> {{ $task -> updated_at }} </p

@endsection
    
