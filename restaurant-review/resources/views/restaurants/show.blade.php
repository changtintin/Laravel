@extends('layout.app')

@section('content')

    <div class="mb-4">

        <div class="fixed bottom-0 right-0 m-4">

            <button class="box-border m-4  p-2 border-2 border-gray-100	rounded-md text-center shadow-sm shadow-gray-100 hover:bg-gray-100 ">

                <a href="{{route('restaurants.index')}}" class="text-gray-400 text-md font-md">Back to Home page</a>

            </button>

        </div>
        
        <h1 class="mb-2 text-2xl">

            {{ $restaurant-> name }}

        </h1>

        <div class="restaurant-info">

            <div class="restaurant-author mb-4 text-lg font-semibold">

                at {{ $restaurant -> location  }}
                
            </div>

            <div class="restaurant-rating flex items-center justify-between">

                <div class="mr-6 text-sm font-medium text-slate-700">

                    <span class="mr-1"> 

                        {{ number_format($restaurant -> reviews_avg_rating, 1) }}  

                    </span>

                    <x-star-rating :rating="$restaurant->reviews_avg_rating" />                 

                </div>

                <span class="restaurant-review-count text-sm text-gray-500 flex-1">

                    {{ $restaurant -> reviews_count }} {{ Str::plural('review', $restaurant->reviews_count) }}

                </span>
               
                <span class="restaurant-review-count text-sm text-gray-500 right-0">

                    <span class="font-light">Sorted by </span>

                    {{$sorted}}

                </span>
 
            </div>

        </div>

    </div>

    <div class="mt-7">

        <h2 class="mb-4 text-xl font-semibold">

            Reviews
            
        </h2>

        <ul>

            @forelse ($restaurant->reviews as $review)

                <li class="restaurant-item mb-4">

                    <div class="mb-2 flex items-center justify-between">

                        <div class="font-semibold">
                            
                            <x-star-rating :rating="$review->rating" />

                        </div>
                        
                        <div class="restaurant-review-count">

                            {{ $review -> created_at -> format('M j, Y') }}
                        
                        </div>

                    </div>

                    <p class="text-gray-700">{{ $review -> review }}</p>

                </li>

            @empty

                <li class="mb-4">

                    <div class="empty-restaurant-item">

                        <p class="empty-text text-lg font-semibold">

                            No reviews yet

                        </p>

                    </div>

                </li>

            @endforelse

        </ul>

    </div>

@endsection