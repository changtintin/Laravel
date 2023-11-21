@php
    use App\Models\Location;
    include "../app/CustomSetting/conf.php";
    
    $locations = Location::where('status', 'published') -> get();
@endphp
<div class='row h3-title-container m-5 justify-content-between mt-2'>
    @forelse ($locations as $location)
        {{-- Preview address--}}
        @if($limit)
            <h6 class='pt-3'>
                <i class='bi-geo-alt-fill' style='font-size: 1.5rem; color: rgb(179,77,77);'> </i>
                {{ $location -> title }}: 
                <small class='text-muted'> 
                    {{ $location -> addr }}
                </small>
            </h6> 
        @else
        {{-- Normal map--}}
            <div class='col-xs-11 col-sm-11 col-md-5 col-lg-5 col-xl-5 col-xxl-5 m-2 my-4 p-3 text-center opacity-75 map3'> 
                <i class='bi-geo-alt-fill' style='font-size: 3rem; color: rgb(179,77,77);  '> </i>
                <h5 class='pb-3'>
                    {{ $location -> title }}
                </h5> 
                <small class='text-muted'> 
                    {{ $location -> addr }}
                </small>
                <div class='p-1'>
                    <div class='ratio ratio-4x3'>
                        @php
                            $map = base64_decode($location -> map);
                            echo $map;
                        @endphp
                    </div>
                </div>
            </div>
        @endif
    @empty
        <p class="m-4 p-4">{{ $errorMsg['no_content'] }}</p>
    @endforelse    
</div>