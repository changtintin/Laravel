@php
  use Illuminate\Support\Facades\DB;
  use Illuminate\Support\Str;
  use Illuminate\Support\Facades\Schema;
  use Carbon\Carbon;
  use App\Models\Theme;
  include "../app/CustomSetting/conf.php";   
  $nameGetter -> setTableName($title);
  $tableName = $nameGetter -> getTableName();     
@endphp
@if (Schema::hasTable($tableName))
  @php
    $cols = Schema::getColumnListing($tableName);
    // NOTE: Only show some of the columns as list
    $visibleCols = array(
      'title', 
      'date', 
      'type_id', 
      'depart', 
      'host', 
      'link', 
      'author', 
      'publisher',
      'plan',
      'publish_year'
    );
    $cols = array_intersect($cols, $visibleCols);   
    $nameGetter -> setModelName($title);
                            
    $model = "App\\Models\\" . $nameGetter -> getModelName();                             
    $table = (Schema::hasColumn($tableName, 'date'))? $model::where('status','published') -> orderBy('date', 'desc') : $model::where('status','published');
    $table = ($limit != 0)? $table -> limit($limit) -> get() : $table -> get();  
  @endphp
  @if (!empty($cols))
    <div class='row m-4 p-4'>
      <div class='table-scrollable mt-3 p-3'>
        <table class='table table-hover'>
          <thead>
            <tr>                
              @forelse ($cols as $col)               
                <th scope='col'> 
                  <b class='text-secondary'>
                    {{ $tableCols[$col] }} 
                  </b>
                </th>
              @empty
                <b> - </b>
              @endforelse
            </tr>
          </thead>
          <tbody>
            @forelse ($table as $val)                    
              <tr>
                @forelse ($cols as $col)
                  @php
                    $content = ($col == "type_id")? $val -> type -> title : $val -> $col;                                      
                  @endphp
                  @if ($col == "title")
                    <th scope='row'>
                      @if (Schema::hasColumn($tableName, 'content'))
                        <a href='/{{ $title }}/post/{{ $val -> id }}' class='link-secondary'>
                          {{ $content }}
                        </a>                      
                      @else
                        {{ $content }}
                      @endif                    
                    </th>
                  @elseif($col == "link" && !empty($content))
                    <td>
                      <a href='{{ $content }}' class='link-secondary'>                        
                        {{ $links['click_here'] }}
                      </a>      
                    </td>
                  @elseif($col == "publish_year")
                    @php
                      $dt = Carbon::parse($content);
                      $content = $dt -> year;
                    @endphp
                    <td> {{ $content }} </td>
                  @else
                    <td> {{ $content }} </td>
                  @endif                                    
                @empty
                  <b> - </b>
                @endforelse
              </tr>                  
            @endforeach
          </tbody>
        </table> 
      </div>
    </div>
  @else
    <div class='row m-4 p-4'>
      {{ $message['no_content'] }}
    </div>  
  @endif
@else
  <div class='row m-4 p-4'>
    {{ $message['no_content'] }}
  </div>
@endif

@if ($limit != 0)
  @php
    $parentTitle = $themeTree -> search($themeTree -> root, $title);
    $curThemeData = Theme::where('title', $title) -> get();
    $curData = $curThemeData[0];
    $parentRow = Theme::where('id', $curData -> parent_id) -> first() ;
  @endphp
  <div class='text-end p-4 me-4'> 
    <button class='circle-btn p-3' id='{{ $title }}'>  
        <a href="{{ route('theme', ["title" => $parentRow -> title, "subtitle" => $title])}}">
            ...... {{ $btns['click_to_see_more'] }} 
        </a>
    </button> 
  </div> 
@endif

