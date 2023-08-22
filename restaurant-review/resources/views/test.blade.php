@php
    

    use Carbon\Carbon;
    
    $start = new Carbon('first day of last month');
    $end = new Carbon('last day of last month');
    echo $start."\n";
    echo $end."\n";
@endphp
<br>
@php
    

    
    $start = now()->subMonths(6)->startOfMonth();
    $end =  now()->startOfMonth();
    echo $start."\n";
    echo $end;
    

@endphp