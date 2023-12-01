@php
  include "../app/CustomSetting/conf.php";
  use App\Models\Theme;
  $curThemeData = Theme::where('title', $title) -> get();
  $curData = $curThemeData[0];
  $themeStack = [];
  $themeStack = new \Ds\Stack();
  
  while ($curData){
    $themeStack -> push($curData -> title);
    if($curData -> parent_id == null){
      break;
    }
    $parentRow = Theme::where('id', $curData -> parent_id) -> get();
    $curData = $parentRow[0];
  }    
@endphp
<div class="row p-4">
  <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="{{ route('index') }}">
          {{ $navs["Home"] }}
        </a>
    </li>
      @forelse ($themeStack as $theme)        
        <li class="breadcrumb-item active" aria-current="page">          
          @if ($theme == $title)
            {{ $navs[$theme] }}
          @elseif(Theme::where('title', $theme) -> value('parent_id'))
            @php
                $id = Theme::where('title', $theme) -> value('id');
                $result = Theme::find($id) -> parent;
                $parentTheme = $result -> title;
            @endphp
            <a href="{{ route('theme', ['title' => $parentTheme, 'subtitle' => $theme]) }}">
              {{ $navs[$theme] }}
            </a>
          @else
            <a href="{{ route('theme', ['title' => $theme]) }}">
              {{ $navs[$theme] }}
            </a>
          @endif
        </li>
      @empty
        {{  }}
      @endforelse        
    </ol>
  </nav>
</div>