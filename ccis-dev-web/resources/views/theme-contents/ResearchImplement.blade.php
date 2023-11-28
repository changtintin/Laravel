@php
    use App\Models\Theme;
    use App\Models\Research;
    use App\Http\Controllers\ResearchController;
    use Illuminate\Support\Facades\Schema;

    include "../app/CustomSetting/conf.php";

    $parent = Theme::where('title', $title) -> first();    
    $children = Theme::find($parent -> id) -> children;
@endphp
@foreach ($children as $child)
    <x-h3-title :title="$child -> title" />
    @if ($child -> title == "研究")
        <x-table-content :title="$navs[$child -> title]" :limit="5"/>
    @endif
@endforeach




