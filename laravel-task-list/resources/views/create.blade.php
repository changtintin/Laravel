@extends('layouts.app')

@section('title', 'Add Task')

@section('styles')

    <style>
        
        .error-msg{

            color: red;
            
            font: 0.8rem bold;
        }
        
    </style>   
     
@endsection


@section('content')

    <form action="{{ route('tasks.store') }}" method="POST">

        @csrf

        <div>

            <label for="title"> Title </label>

            <input type="text" id="title" name="title" value="{{ old('title') }}">

            @error("title")

                <p class="error-msg">{{ $message }}</p>

            @enderror

        </div>

        <div>

            <label for="description">Description</label>

            
            {{-- 
                MY NOTE    
                =====================================================================
                _ old(''):
                    * Only be used for POST method
                    * get the old data
                    * shouldn't be used on any sensitive infomation
            
            --}}

            <textarea name="description" id="description" rows="5">{{ old('description') }}</textarea>

            @error("description")

                <p class="error-msg">{{ $message }}</p>
                
            @enderror

        </div>

        <div>

            <label for="long_description">Long Description</label>
            
            <textarea name="long_description" id="long_description" rows="10">{{ old('long_description') }}</textarea>

            @error("long_description")

                <p class="error-msg">{{ $message }}</p>
                
            @enderror
            
        </div>

        <div>

            <button type="submit">Add Task</button>

        </div>
                
    </form>

@endsection