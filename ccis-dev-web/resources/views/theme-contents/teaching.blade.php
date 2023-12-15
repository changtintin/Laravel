@php
  use \App\Models\Teaching;
  include "../app/CustomSetting/conf.php";
  $teachings = Teaching::all();
@endphp
<div class="row h3-title-container m-5 justify-content-between mt-3">
  @forelse ($teachings as $teaching)
    <div class="col-xs-11 col-sm-11 col-md-5 col-lg-5 col-xl-5 col-xxl-5 m-2 py-3 text-center opacity-75 map1">
      <div class="p-1">
        <div class="ratio ratio-4x3">
          <img allowfullscreen src="/img/teaching/{{ $teaching -> img }}">
        </div>
      </div>
      <h5 class="pt-3">
        {{ $teaching -> title }}
      </h5>
      @if ($teaching -> web_link)        
        <a href="{{ $teaching -> web }}" target="_blank">
          <button class="btn btn-outline-primary btn-lg mt-3">              
              {{$btns['web'] }}              
          </button>
        </a>        
      @endif
      @if ($teaching -> fans_page_link)       
        <a href="{{ $teaching -> fans_page_link }}" target="_blank">
          <button class="btn btn-outline-primary btn-lg mt-3">              
            {{$btns['fans_page'] }}              
          </button>
        </a>        
      @endif            
    </div>
  @empty
    <p class="m-4 p-4">{{ $message['no_content'] }}</p>
  @endforelse
</div>