@extends('layout.app')
@section('content')
<x-bread-crumb :title="$title" />
<x-h1-title :title="$title" />
<x-h3-title :title="$develop -> title" />
<div class='p-4 m-4'>
  @php
    include "../app/CustomSetting/conf.php";      
    
    $developContents = $develop -> content;
    $developContents = json_decode($developContents);
    $idx = 1;
  @endphp
  <h4 class="pb-2">
    <i class='bi-calendar me-3' style='font-size: 2rem;'></i>
    {{ $develop -> year }}
  </h4>
  @forelse ($developContents as $developContent)
    <p class='py-2'>
      {{ $idx . ". " . $developContent }}
    </p>
    @php
      $idx ++;
    @endphp
  @empty
    <p class="m-4 p-4">{{ $errorMsg['no_content'] }}</p> 
  @endforelse
  <x-social-sharing-btns />
</div>
@endsection