<!-- Let all your things have their places; let each part of your business have its time. - Benjamin Franklin -->
<span class="text-xs">
    
    @if ($rating)

        @for ($i = 0; $i < 5; $i++)

            @if ($i < $rating)

                <i class="fa-solid fa-star"></i>

            @else

                <i class="fa-regular fa-star"></i>

            @endif

        @endfor

    @else

        No rating yet

    @endif 

</span>


   
