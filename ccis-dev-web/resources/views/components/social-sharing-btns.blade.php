@php
  include "../app/CustomSetting/conf.php";
@endphp
<div class='d-flex justify-start-center mt-3'>
  <div class='p-1 align-self-center' data-href='{{ $curURLGetter -> getCurUrl() }}'>
    <a target='_blank'
      href='{{ $fb_sharer }}'
      id='fb-share-btn' class='text-decoration-none fs-3'> 
      <i class='bi-facebook'></i> 
    </a>
  </div>
  <div class='p-1 align-self-center'> 
    <a target='_blank'
      href='{{ $line_sharer }}'
      id='line-share-btn' class='text-decoration-none fs-3'> 
      <i class='bi-line'></i> 
    </a> 
  </div>
  <div class='p-1 align-items-center'> 
    <button href='' id='page-printer-btn' class='fs-3 border-0 align-middle bg-transparent'> 
      <i class='bi-printer-fill'> </i> 
    </button> 
  </div>
</div>