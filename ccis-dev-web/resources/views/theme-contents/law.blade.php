@php
    use App\Models\Law;
    include "../app/CustomSetting/conf.php";

    $laws = Law::where('status', 'published') -> get();
@endphp
<div class='row py-5 m-5'>
    <div class='list-group'> 
        @forelse ($laws as $law)
            <a href='/img/law/{{ $law -> appendix }}' class='list-group-item list-group-item-action' target='_blank'> 
                {{ $law -> title }}
            </a> 
        @empty
            <p class="m-4 p-4">{{ $errorMsg['no_content'] }}</p>
        @endforelse
    </div>
</div>