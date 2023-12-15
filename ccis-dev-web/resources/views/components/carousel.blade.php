<div class="row mb-5" >  
  @php
    use App\Models\Carousel;
    $carousels = Carousel::all();
  @endphp
  <div id="carouselAutoplaying" class="carousel slide p-0" data-bs-ride="carousel">
    <div class="carousel-indicators">
      @isset($carousels)
        @foreach ($carousels as $carousel)          
          <button type="button" data-bs-target="#carouselAutoplaying" data-bs-slide-to="{{ ($carousel -> id) -1 }}" 
            aria-label="Slide {{ $carousel -> id }}"
            class="{{ ($carousel == $carousels -> first())?'active':'' }}"
            aria-current="{{ ($carousel == $carousels -> first())?'true':'' }}">
          </button>          
        @endforeach
      @endisset                               
    </div>
    <div class="carousel-inner">
      @isset($carousels)
        @foreach ($carousels as $carousel)          
          <div class="carousel-item {{ ($carousel == $carousels -> first())?'active':'' }}">                        
            <img src="../img/carousel/{{ $carousel -> img }}" class="d-block w-100" loading="lazy">            
          </div>                 
        @endforeach
      @endisset        
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselAutoplaying" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselAutoplaying" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>  
</div>