@extends('layout.basic')

@section('style')

    

@endsection

@section('header')

    @if(session() -> has('successMsg'))

        <p class="create-success-msg">{{ session('successMsg') }}</p>

    @endif

    @isset($makeupItem)

        <h2>{{ $makeupItem -> name }} </h2>

    @endisset

    <nav class="mt-4">

        <a href="/index" class="link"> 

            <b>

                ← Back to Homepage

            </b>

        </a>        

    </nav>

@endsection

@section('content')

    <div class="text-slate-700">

        <div class="mt-4">

            <span class="underline decoration-blue-400"> 
            
                Type: 

            </span>

            {{ $makeupItem -> type }}
        
        </div>

        <div class="mt-4">

            <span class="underline decoration-blue-400">

                Description:
             
            </span>
            
            <br>  

            <p class="indent-8">{{ $makeupItem -> description }}</p> 

            @empty($makeupItem -> description)

                <p class="text-slate-500">None</p>

            @endempty
        
        </div>

        <div class="mt-4">

            <span class="underline decoration-blue-400">
            
                Price:  

            </span>

            TWD${{ $makeupItem -> price }}
        
        </div>

        <div class="mt-4">

            <span class="underline decoration-blue-400"> 

                Status:

            </span>

            @if($makeupItem -> bought == 1)

                <span class="font-medium text-green-400">

                    Bought 

                </span>
                

            @else

                <span class="font-medium text-red-400">

                    Unbought

                </span>

            @endif

        </div>

        <div class="my-4 text-sm text-slate-500">
            
            <p>Created {{ $makeupItem -> created_at -> diffForHumans()  }} •  Updated {{ $makeupItem -> updated_at -> diffForHumans() }}</p>
            
        </div>       

        <div class="flex gap-2">

            <form method="POST" action="{{ route('tasks.toggle-bought', ['makeupItem' => $makeupItem] ) }}">

                @csrf

                @method('PUT')

                <button type="submit" class="btn">

                    Mark as {{ $makeupItem -> bought ?  'unbought' : 'bought' }}

                </button>

            </form>

            <a href="/index/{{ $makeupItem -> id }}/edit" class="btn"> 

                Edit this Item    

            </a>
     
            <form action="{{ route('makeup.destory', ['makeupItem' => $makeupItem -> id]) }}" method="POST">

                @csrf
                
                @method('DELETE')

                <button type="submit" class="btn">Delete</button>

            </form>

        </div>

    </div>
   
@endsection
