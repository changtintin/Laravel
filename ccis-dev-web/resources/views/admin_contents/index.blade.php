@extends('layout.app')
@section('content')
    {{-- @if(isset($message))
        <div class="m-4 alert alert-success alert-dismissible fade show" role="alert"> 
            <strong> 
                {{$message}}
            </strong> 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"> 
            </button> 
        </div>
    @endif --}}
    @php
        $id = Auth::id();
        echo $id."<br>";

        $user = Auth::user();
        print_r($user);
    @endphp
@endsection