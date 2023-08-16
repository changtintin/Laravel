@extends('layouts.app')

@section('title', 'Edit Task')

@section('styles')

    <style>
        
        .error-msg{

            color: red;
            
            font: 0.8rem bold;
        }
    
    </style>   
     
@endsection


@section('content')

    <form action="{{ route('tasks.update',['task' => $task -> id ]) }}" method="POST">

        @csrf

        {{--
             MY NOTE    
            =====================================================================
            _ @method: underscore method 
                * Also called method spoofing
        --}}

        @method('PUT')

        <div>

            <label for="title"> Title </label>

            <input type="text" id="title" name="title" value="{{ $task -> title }}">

            @error("title")

                <p class="error-msg">{{ $message }}</p>

            @enderror

        </div>

        <div>

            <label for="description">Description</label>

            <textarea name="description" id="description" rows="5"> {{ $task -> description }} </textarea>

            @error("description")

                <p class="error-msg">{{ $message }}</p>
                
            @enderror

        </div>

        <div>

            <label for="long_description">Long Description</label>
            
            <textarea name="long_description" id="long_description" rows="10"> {{ $task -> long_description }} </textarea>

            @error("long_description")

                <p class="error-msg">{{ $message }}</p>
                
            @enderror
            
        </div>

        <div>

            <button type="submit">Edit Task</button>

        </div>
                
    </form>

@endsection