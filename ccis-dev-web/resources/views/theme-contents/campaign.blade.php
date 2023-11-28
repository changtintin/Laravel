@php
    use App\Models\Theme;
    include "../app/CustomSetting/conf.php";     
     
    $parent = Theme::where('title', $title) -> first();    
    $children = Theme::find($parent -> id) -> children;
@endphp
@forelse ($children as $child)
    <x-h3-title :title="$child -> title" />
    @php
        include "../app/CustomSetting/conf.php";        
        $childVar = $navs[$child -> title];
    @endphp
    <x-table-content :title="$childVar" :limit="5"/>
    
    <div class='text-end p-4 me-4'> 
        <button class='circle-btn p-3' id='{{ $childVar }}'>  
            <a href="{{ route('theme', ["title" => $title, "subtitle" => $child -> title])}}">
                ......點我看更多內容 
            </a>
        </button> 
    </div> 
@empty
    <p class="m-4 p-4">{{ $errorMsg['no_content'] }}</p> 
@endforelse