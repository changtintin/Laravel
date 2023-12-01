@php
  include "../app/CustomSetting/conf.php";   
@endphp
<div class="row h1-title-container m-3 pt-4">
  <div class="col-1" id="h1-title-decor"></div>
  <div class="col-10">
    @isset($title)
      <h1>{{ $title }}</h1>
    @endisset
  </div>
</div>