@php
    use App\Models\ProjectLink;
    include "../app/CustomSetting/conf.php";

    $projectLinks = ProjectLink::where('status', 'published') -> get();
@endphp
<div class='row py-5 m-5'>
    <div class='list-group'> 
        @forelse ($projectLinks as $projectLink)
            <a href='{{ $projectLink -> link }}' class='list-group-item list-group-item-action' target='_blank'> 
                {{ $projectLink -> title }}
            </a> 
        @empty
            <p class="m-4 p-4">{{ $message['no_content'] }}</p>
        @endforelse
    </div>
</div>