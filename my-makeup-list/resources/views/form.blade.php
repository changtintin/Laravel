{{--    
    MY NOTE    
    =====================================================================
    _ used for edit and create data
    
    _ difference between edit 
--}}

@extends('layout.basic')

@section('header')

    <h2>

        {{ isset($makeupItem) ? 'Edit' : 'Add' }}
        
        Makeup Item
    
    </h2>

@endsection

@section('content')

    <form method="POST" action="{{ isset($makeupItem) ? route('makeup.update',['makeupItem' => $makeupItem -> id]) : route('makeup.store') }}">

        @csrf

        @isset($makeupItem)

            @method('PUT')

        @endisset

        <div>

            <label for="name">Product Name</label>

            <input type="text" id="name" name="name" class=" @error('name') form-input-error @else form-input @enderror" 
                value="{{ $makeupItem -> name ?? old('name') }}"
            >

            {{-- 
                MY NOTE    
                =====================================================================
                _ @error: 
                    * Used to quickly check if validation error messages exist for a given attribute. 
                    * echo the $message variable to display the error message 
                    * Above info are From https://laravel.com/docs/10.x/blade

                _ old():
                    * Only for POST Method (PUT, GET -> X)

                _ (expr1) ?? (expr2):
                    * Evaluate to expr2 if expr1 is null, and expr1 otherwise
                    * Similar to isset
            --}}

            @error('name')
            
                <p class="error-msg">{{ $message }}</p>

            @enderror

        </div>

        <div>

            <label for="price">Price (TWD)</label>

            <input type="number" id="price" name="price" min="0" max="9999" class="@error('price') form-input-error @else form-input @enderror" value="{{ $makeupItem -> price ?? old('price') }}">

            @error('price')
            
                <p  class="error-msg">{{ $message }}</p>
                
            @enderror

        </div>

        <div>

            <label for="type">Type</label>

            <input type="text" id="type" name="type" class="@error('type') form-input-error @else form-input @enderror" value="{{ $makeupItem -> type ?? old('type') }}">

            @error('type')
            
                <p  class="error-msg">{{ $message }}</p>
                
            @enderror

        </div>

        <div>

            <label for="description">Description</label>

            <textarea id="description" name="description" rows="10" cols="40" class="@error('description') form-input-error @else text-input @enderror">{{ $makeupItem -> description ??  old('description') }}</textarea>

            @error('description')
            
                <p  class="error-msg">{{ $message }}</p>
                
            @enderror            

        </div>

        <div class="mb-4">    

            <div class="flex mb-4 items-center">

                <input type="radio" id="bought" name="bought" value="1" class="h-4 w-4"
                    
                    @if(isset($makeupItem) &&  $makeupItem -> bought == 1)

                        {{ "checked='checked'" }}   
                    
                    @elseif (old('bought') == '1')

                        {{ "checked='checked'" }} 

                    @endif
                >

                <label class="text-gray-900 ml-2 block" for="bought">bought</label>

            </div>

            <div class="flex mb-4 items-center">
                            
                <input type="radio" id="unbought" name="bought" class="h-4 w-4" value="0" 

                    @if(isset($makeupItem) &&  $makeupItem -> bought == 0)

                        {{ "checked='checked'" }}   
                    
                    @elseif (old('bought') == '0')

                        {{ "checked='checked'" }} 

                    @endif
                >

                <label class="text-gray-900 ml-2 block" for="unbought">unbought</label>

            </div>

            @error('boughgt')
            
                <p  class="error-msg">{{ $message }}</p>
                
            @enderror

        </div>

        <div class="flex gap-2 items-center">
                
            <button type="submit" class="btn">{{ isset($makeupItem) ? 'Edit' : 'Add' }} Item</button>

            <a href="{{ route('makeup.index') }}" class="link">Cancel</a>
        
        </div>

    </form>

@endsection
