@extends('layout.app')

@section('content')

    <div class="mb-4">
        
        <h1 class="mb-2 text-2xl">

            {{ $restaurant-> name }}

        </h1>

        <div class="restaurant-info">

            <div class="restaurant-author mb-4 text-lg font-semibold">

                at {{ $restaurant -> location  }}

            </div>

            <div class="restaurant-rating flex items-center justify-between">

                <div class="mr-2 text-sm font-medium text-slate-700">

                    {{ number_format($restaurant -> reviews_avg_rating, 1) }}

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

    <div>

        <h2 class="mb-4 text-xl font-semibold">

            Reviews
            
        </h2>

        <ul>
            {{-- @php
                $restaurant -> reviews = $restaurant -> reviews() -> orderBy('rating','desc') -> get();
            @endphp --}}

            @forelse ($restaurant->reviews as $review)

                <li class="restaurant-item mb-4">

                    <div>

                        <div class="mb-2 flex items-center justify-between">

                            <div class="font-semibold">{{ $review->rating }}</div>

                            <div class="restaurant-review-count">

                            {{ $review -> created_at -> format('M j, Y') }}</div>

                        </div>

                        <p class="text-gray-700">{{ $review -> review }}</p>
                    
                    </div>

                </li>

            @empty

                <li class="mb-4">

                    <div class="empty-restaurant-item">

                        <p class="empty-text text-lg font-semibold">No reviews yet</p>

                    </div>

                </li>

            @endforelse

        </ul>

    </div>

@endsection