@extends('layout.app')
@php
  include "../app/CustomSetting/conf.php";
@endphp
@section('content')    
  @if(isset($subtitle))        
    <x-bread-crumb :title="$subtitle"/>
    <x-h1-title :title="$title"/>
    <x-h3-title :title="$subtitle"/>
    @php
        $themeVar = $navs[$subtitle];
    @endphp
    @includeIf('theme-contents.' . $themeVar)
  @else
    <x-bread-crumb :title="$title"/>
    <x-h1-title :title="$title"/>
    @php
        $themeVar = $navs[$title];
    @endphp
     @includeIf('theme-contents.' . $themeVar)
  @endif
@endsection

   

