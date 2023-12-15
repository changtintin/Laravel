
@php
  use \App\Models\RelatedLink;
 
  include "../app/CustomSetting/conf.php";
  $relatedLinks = RelatedLink::all();
@endphp
<div class='row h3-title-container m-5 justify-content-between mt-3'>
  @forelse ($relatedLinks as $relatedLink)
    <div class='col-xs-11 col-sm-11 col-md-5 col-lg-5 col-xl-5 col-xxl-5 m-2 py-3 text-center opacity-75 map1'>
      <div class='p-2'>
        <div class='ratio ratio-4x3'> 
          <img src='/img/related_link/{{ $relatedLink -> img }}' allowfullscreen>
        </div>
      </div>
      <h5 class='pt-3'>
        {{ $relatedLink -> title }}
      </h5> 
      @if (!empty($relatedLink -> web_link))
        <a href='{{ $relatedLink -> web_link }}' target='_blank'> 
            <button class='circle-btn m-4'> 
            {{ $btns['web'] }}
            </button> 
        </a>
      @endif
      @if (!empty($relatedLink -> fans_page_link))
        <a href='{{ $relatedLink -> fans_page_link }}' target='_blank'> 
            <button class='circle-btn m-4'> 
            {{ $btns['fans_page'] }}
            </button> 
        </a>
      @endif
    </div>
  @empty
    {{ $message['no_content'] }}
  @endforelse
  
</div>



