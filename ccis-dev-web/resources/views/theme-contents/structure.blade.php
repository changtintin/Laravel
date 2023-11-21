<!-- Organization Structure Img -->
@php
    $showWholeImg = (isset($limit))? false : true;
@endphp
<div class="row m-5">
    <div class="col">
        <div class="tab">
            <img alt="" @class([
                'w-100' => $showWholeImg,
                'w-50' => ! $showWholeImg,
            ]) src="/img/structure.png">
        </div>
    </div>
</div>
<!-- ./ Organization Structure Img -->        