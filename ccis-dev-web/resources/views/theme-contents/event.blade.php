@php
  $limit = ($limit)?? 0;
@endphp
<x-event-table :limit="$limit" />