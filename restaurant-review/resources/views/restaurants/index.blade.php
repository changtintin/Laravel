@extends('layout.app')

@section('content')

    <h1 class="my-7 text-2xl font-medium">Restaurant</h1>

    {{-- 
        MY NOTE    
        ===================================================================== 
        _ request(): returns the current request instance or obtains an input field's value from the current request
        _ $a === $b
            * Array operator
            * If $a, $b have the same key and value pairs

        - ...
            * Spread Operator
            * An array pair prefixed by ... will be added to a new array (every element)
    --}}

    {{-- Search Bar --}}

    <form method="GET" action="{{ route('restaurants.index') }}" class="search-container">

        <input type="text" name="name" id="name" class="input h-10" placeholder="Search by restaurant's name" value="{{ request('name') }}">

        <button type="submit" class="btn h-8">Search</button>

        <a href="{{ route('restaurants.index') }}" class="btn h-8">Clear</a>

        <input type="hidden" name="filter" value="{{ request('filter') }}" />

    </form>

    {{-- Filter --}}

    <div class="filter-container mb-4 flex">

        @php
            
            $filters = [
                '' => 'Latest',
                'popular_last_month' => 'Popular Last Month',
                'popular_last_6month' => 'Popular Last 6 Month',
                'highest_rated_last_month' => 'Highest Rated Last Month',  
                'highest_rated_last_6month' => 'Highest Rated Last 6 Month',
            ];

        @endphp

        @foreach ($filters as $key => $label)

            @php
                
                $filterAry = ['filter' => $key];

            @endphp
                
            <a href="{{ route('restaurants.index', array_merge(request() -> query(), $filterAry)) }}" 

                class="{{ request('filter') === $key || (request('filter') === null && $key === '')  ? 'filter-item-active' : 'filter-item'}}">
 
                {{ $label }}

            </a>


        @endforeach    
        

    </div>

    {{-- Date Period --}}

    <div class="filter-date-msg">

        @isset($dateMsg)

            {{$dateMsg}}

        @endisset

    </div>

    {{-- Restaurant List --}}

    <ul>

        @forelse ($restaurants as $restaurant)

            <li class="mb-4">

                <div class="restaurant-item">
                    
                    <div class="flex flex-wrap items-center justify-between">
                        
                        <div class="w-full flex-grow sm:w-auto">

                            <a href="{{route('restaurants.show',['restaurant' => $restaurant])}}" class="restaurant-title">
                            
                                {{ $restaurant -> name }}

                            </a>

                            <span class="restaurant-author">at {{ $restaurant -> location }}</span>

                        </div>

                        <div>
                                           
                            {{-- 
                                MY NOTE    
                                =====================================================================
                                _ number_format(): round the decimal number half up 
                            --}}

                            <div class="restaurant-rating">
                               
                                
                                {{ number_format($restaurant -> reviews_avg_rating, 1)}} / 5

                            </div>

                            <div class="restaurant-review-count">

                                out of {{ $restaurant -> reviews_count }}  {{ Str::plural('review', $restaurant -> reviews_count) }}

                            </div>

                        </div>

                    </div>

                </div>

            </li>

        @empty

            <li class="mb-4">

                <div class="empty-restaurant-item">

                    <p class="empty-text">No restaurants found</p>

                    <a href="{{ route('restaurants.index') }}" class="reset-link">Reset criteria</a>

                </div>

            </li>
            
        @endforelse

    </ul>

@endsection