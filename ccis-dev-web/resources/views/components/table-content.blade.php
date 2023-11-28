<div class='row m-4 p-4'>
    <div class='table-scrollable mt-3 p-3'>
      <table class='table table-hover'>
        <thead>
          <tr>
            @php
                use Illuminate\Support\Facades\DB;
                use Illuminate\Support\Str;
                use Illuminate\Support\Facades\Schema;
                include "../app/CustomSetting/conf.php";   
                
                $pattern = '~(.)([A-Z]+)~';
                $replacement = '$1_$2';
                $tbName =  preg_replace($pattern, $replacement, $title);
                $tbName = Str::plural($tbName);
                $tbName = strtolower($tbName);                
               
                $cols = Schema::getColumnListing($tbName);
                $cols = array_intersect($cols, array('title', 'date', 'type_id'));
                
                $model = "App\\Models\\" . $title;                 
                $table = $model:: where('status','published') -> orderBy('date', 'desc');   
                $table = ($limit > 0)? $table -> limit($limit) -> get() : $table -> get();              
            @endphp            
            @forelse ($cols as $col)               
                <th scope='col'> {{ $tableCols[$col] }} </th>
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
                  $content = $val -> $col; 
                  if ($col == "type_id"){
                    $content = $val -> type -> title;
                  }                
                @endphp                  
                  <td > {{ $content }} </td>
              @empty
                  <b> - </b>
              @endforelse
            </tr>                  
          @endforeach
        </tbody>
      </table>
    </div>
  </div>