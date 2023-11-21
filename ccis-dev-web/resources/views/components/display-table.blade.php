<div class='row m-4 p-4'>
  <div class='table-scrollable mt-3 p-3'>
    <table class='table table-hover'>
      <thead>
        <tr>
          <th scope='col'> 標題 </th>
          <th scope='col'> 張貼日期 </th>
        </tr>
      </thead>
      <tbody>
        @php
          use App\Models\Display; 
          $displays =  Display:: where('status','published') -> orderBy('date', 'desc'); 
          $displays = ($limit)? $displays -> limit(5) -> get() : $displays -> get();                  
        @endphp
        @forelse ($displays as $display)                    
          <tr>
            <th scope='row'>
              <a href='/涓滴匯流/post/{{ $display -> id }}' class='link-secondary'>
                {{ $display -> title }}
              </a>
            </th>
            <td>
              {{ $display -> date }}
            </td>
          </tr>                  
        @endforeach
      </tbody>
    </table>
  </div>
</div>