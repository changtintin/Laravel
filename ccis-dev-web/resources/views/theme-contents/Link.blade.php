@php
    // TODO: Create link page content
    use App\Models\Theme;
    use App\Models\Research;
    use Illuminate\Support\Facades\Schema;

    include "../app/CustomSetting/conf.php";
    $parent = Theme::where('title', $title) -> first();    
    $children = Theme::find($parent -> id) -> children;    
@endphp
@foreach ($children as $child)    
    @php
        $subtitle = $child -> title;       
    @endphp
    <x-h3-title :title="$navs[$subtitle]" />    
    @includeIf('theme-contents.' . $subtitle, ['limit' => 1])       
@endforeach
