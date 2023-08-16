@extends('layout.basic')

@section('header')

    <h1 class="text-3xl font-bold my-5">

        My Makeup Item List

        <span class="inline text-sm font-light">By Tatiana Chang</span>

    </h1>

    <nav class="mb-3 inline">

        <a href="/index" class="link"> 

            ← Go to Homepage 

        </a>

        <a href="/index/add" class="font-medium text-blue-400 mx-2"> 

            Add New Item to List

        </a>

    </nav>

    {{-- Flash Message --}}
    @if(session() -> has('delMsg'))

        <div x-data="{ flash: true }">

            <div x-show = "flash" 
            
                class="mb-8 mt-3 rounded border border-green-400 bg-green-100 py-3 px-4 text-green-600 relative" 
                
                role="alert" >
                
                <strong class="font-bold">Success!</strong> <br>

                <p>{{ session('delMsg') }}</p>

                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">

                    {{-- 

                        MY NOTE    
                        ===================================================================== 
                        _ Alpine.js: Lightweight framwork to acheive the things 
                          instead of large one like Vue or Node.js
                          
                        _ @click: onclick in js
                        _ x-data: set variable
                        _ x-show: show and hide DOM elements

                    --}}

                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"

                        stroke-width="1.5" @click = "flash = false"

                        stroke="currentColor" class="h-6 w-6 cursor-pointer">
                        
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />

                    </svg>

                </span>
                
            </div>

        </div>

    @endif
    {{-- Flash Message --}}


@endsection

@section('content')

    <ul class="mt-5 list-disc list-inside">

        @forelse ($makeupItems as $makeupItem)

            <li class="my-4">

                <a href="/index/{{ $makeupItem -> id }}" 

                    @class([
                        'underline' => $makeupItem -> bought, 
                        'decoration-wavy' => $makeupItem -> bought, 
                        'decoration-blue-400' => $makeupItem -> bought
                    ])

                >

                    {{ $makeupItem -> name }}
                    
                </a>

            </li>
               
        @empty
            
            <div>There are no items</div>
            
        @endforelse

    </ul>

    @if($makeupItems -> count())

        <nav class="mt-5">

            {{ $makeupItems -> links() }}

        </nav>

    @endif    

    

@endsection
