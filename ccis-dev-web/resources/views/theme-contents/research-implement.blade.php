@php
    use App\Models\Theme;
    include "../app/CustomSetting/conf.php";

    $parent = Theme::where('title', $title) -> first();    
    $children = Theme::find($parent -> id) -> children;
    $plan = "研究計畫";
@endphp

<x-h3-title :title="$plan" />
@forelse ($researchPlan as $paragraph)
    <div class='row content-container m-5'>
        <h5 class='text-secondary fw-bolder'>
            {{ $paragraph['title'] }}
        </h5>
        @forelse ($paragraph['content'] as $content)
            <p class='ms-auto lh-lg mt'>
                
                {{ $content }}
                
            </p>
        @empty
            <p class="m-4 p-4">{{ $errorMsg['no_content'] }}</p>
        @endforelse
       
    </div>
@empty
    <p class="m-4 p-4">{{ $errorMsg['no_content'] }}</p>
@endforelse

@forelse ($children as $child)
    <x-h3-title :title="$child -> title" />
    @php        
        $childVar = $navs[$child -> title];
    @endphp
    @includeIf('theme-contents.' . $childVar, ['limit' => 1])   
    <div class='text-start p-1 m-4'> 
        <div class='ms-4'>  
            <a href="{{ route('theme', ["title" => $title, "subtitle" => $child -> title])}}">
                前往 {{ $child -> title }}
                <i class='bi-arrow-up-right' style='font-size: 1rem;'></i>                
            </a>
        </div> 
    </div> 
@empty
    <p class="m-4 p-4">{{ $errorMsg['no_content'] }}</p>
@endforelse

