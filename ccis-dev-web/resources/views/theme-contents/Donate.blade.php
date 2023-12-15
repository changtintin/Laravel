
@php
  use \App\Models\Donate;
  include "../app/CustomSetting/conf.php";
  $donates = Donate::all();
@endphp
<div class='row h3-title-container m-5 justify-content-between mt-3'>
  @forelse ($donates as $donate)
    <div class='col-xs-11 col-sm-11 col-md-5 col-lg-5 col-xl-5 col-xxl-5 m-2 py-3 text-center opacity-75 map1'>
      <div class='p-2'>
        <div class='ratio ratio-4x3'> 
          <img src='/img/donate/{{ $donate -> img }}' allowfullscreen>
        </div>
      </div>
      <h5 class='pt-3'>
        {{ $donate -> title }}
      </h5> 
      <a href='{{ $donate -> link }}' target='_blank'> 
        <button class='circle-btn m-4'> 
          {{ $tableCols['link'] }}
        </button> 
      </a>
    </div>
  @empty
    {{ $message['no_content'] }}
  @endforelse
</div>



