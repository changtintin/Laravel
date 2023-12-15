@php
    use App\Models\Theme;
    include "../app/CustomSetting/conf.php";     
     
    $parent = Theme::where('title', $title) -> first();    
    $children = Theme::find($parent -> id) -> children;
@endphp
@forelse ($children as $child)
    <x-h3-title :title="$navs[$child -> title]" />
    @php        
        $subtitle =  $child -> title;  
    @endphp
    @includeIf('theme-contents.' . $subtitle, ['limit' => 1])       
    
@empty
    <p class="m-4 p-4">
        {{ $message['no_content'] }}
    </p> 
@endforelse