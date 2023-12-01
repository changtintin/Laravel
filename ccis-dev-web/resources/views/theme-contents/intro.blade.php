@php
    use App\Models\Theme;
    include "../app/CustomSetting/conf.php";

    $parent = Theme::where('title', $title) -> first();    
    $children = Theme::find($parent -> id) -> children;
@endphp
@forelse ($children as $child)
    <x-h3-title :title="$navs[$child -> title]" />    
    @includeIf('theme-contents.' . $child -> title, ['limit' => 1])   
    <div class='text-start p-1 m-4'> 
        <div class='ms-4'>  
            <a href="{{ route('theme', ["title" => $title, "subtitle" => $child -> title])}}">
                前往 {{ $navs[$child -> title] }}
                <i class='bi-arrow-up-right' style='font-size: 1rem;'></i>                
            </a>
        </div> 
    </div> 
@empty
    <p class="m-4 p-4">{{ $errorMsg['no_content'] }}</p>
@endforelse