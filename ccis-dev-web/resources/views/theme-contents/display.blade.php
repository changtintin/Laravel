@php
  $limit = ($limit)?? 0;
@endphp
<x-display-table :limit="$limit" />