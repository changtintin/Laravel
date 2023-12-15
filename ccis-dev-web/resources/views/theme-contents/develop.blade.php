@php
    use App\Models\Develop;
    $develops = (isset($limit))? Develop::limit(3) -> get() : Develop::all();
    $counts = Develop::count();   
@endphp
<div class='timeline-container'>
    <ul>
        @forelse ($develops as $develop)        
            @php
                $isRecent = ($counts - ($develop -> id) < 3)? true : false;
            @endphp   
            <li @class([
                'timeline-title-bg-recent' => $isRecent,
                'timeline-title-bg-past' => ! $isRecent
            ])>
                <div class='date'>
                    {{ $develop -> title }}
                </div>
                <div class='title'> 
                    <i class='bi-calendar' style='font-size: 1rem;'> </i> 
                    {{ $develop -> year }}
                </div>
                @php
                    $developContents = $develop -> content;
                    $developContents = json_decode($developContents, true);
                    $developContents = array_slice($developContents, 0, 5);
                    $idx = 1;
                @endphp
                <div class='descr'>
                    @forelse ($developContents as $developContent)
                        <p class='py-2'>
                            {{ $idx . ". " . $developContent }}
                        </p>
                        @php
                            $idx ++;
                        @endphp
                    @empty
                        <p class="m-4 p-4">{{ $message['no_content'] }}</p> 
                    @endforelse
                    <a href='{{ route('dev-post', ['id' => $develop -> id, 'title' => $title]) }}'> 
                        ... 查看更多
                    </a>
                </div>                
            </li>
        @empty
            <p class="m-4 p-4">{{ $message['no_content'] }}</p> 
        @endforelse
    </ul>
</div>