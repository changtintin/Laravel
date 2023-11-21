@php
  use App\Models\Event;  
  include "../app/CustomSetting/conf.php";
    
  $events =  Event:: where('status','published') -> orderBy('date', 'desc') -> with('type'); 
  $events = ($limit)? $events -> limit(5) -> get() : $events -> get();               
@endphp  
<div class='row m-4 p-4'>
  <div class='table-scrollable mt-3 p-3'>
    <table class='table table-hover'>
      <thead>
        <tr>
          <th scope='col'> {{ $postCols['title'] }} </th>
          <th scope='col'> {{ $postCols['date'] }} </th>
          <th scope='col'> {{ $postCols['type'] }} </th>
        </tr>
      </thead>
      <tbody>              
        @forelse ($events as $event)          
          <tr>
            <th scope='row'>
              <a href='/消息流通/post/{{ $event -> id }}' class='link-secondary'>
                {{ $event -> title }}
              </a>
            </th>
            <td>
              {{ $event -> date }}
            </td>
            <td>
              {{ $event -> type -> title }}
            </td>
          </tr>  
        @empty 
          <p class="m-4 p-4">{{ $errorMsg['no_content'] }}</p>              
        @endforelse
      </tbody>
    </table>
  </div>
</div>