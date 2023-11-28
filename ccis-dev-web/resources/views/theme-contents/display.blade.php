@php
  $limit = (isset($limit))? 5 : 0;
@endphp

<x-table-content :title="$subtitle" :limit="$limit" />