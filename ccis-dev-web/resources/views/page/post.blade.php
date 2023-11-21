@extends('layout.app')
@section('content')
  @php    
    include "../app/CustomSetting/conf.php";  
    $postStatus = $model -> status;
    $postTitle = $model -> title;
    $postContent = $model -> content;
    $postContent = base64_decode($postContent);
    $postAppendix = $model -> appendix;
    $postAppendixes = json_decode($postAppendix);
    $postDate = $model -> date;

    if($model -> type){
      $postType = $model -> type -> title;      
    }    
  @endphp
  <x-bread-crumb :title="$title"/>
  <x-h1-title :title="$title" />
  @if ($postStatus == "published")
    <x-h3-title :title="$postTitle" />
    <div class='p-4 m-4'>      
      <h6 class='text-secondary'> 
        <b>{{ $themeContents['post']['date'] }}: </b>
        {{ $postDate }}
      </h6>   
      <h6 class='text-secondary'>
        @if(isset($postType))
          <b>{{ $themeContents['post']['type'] }}: </b>
          {{ $postType }}
        @endif
      </h6>  
      <h6 class='text-secondary'> 
        <b>{{ $themeContents['post']['appendix'] }}: </b>
        {{ $postAppendixes? $postAppendix : "無" }}
      </h6>
      <hr>
      @php
        echo $postContent;        
      @endphp
      <x-social-sharing-btns />
    </div>
  @else
    <p class="m-4 p-4">{{ $errorMsg['no_content'] }}</p>
  @endif
@endsection