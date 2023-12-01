@extends('layout.app')
@php
  include "../app/CustomSetting/conf.php";
@endphp
@section('content')    
  @if(isset($subtitle))        
    <x-bread-crumb :title="$subtitle"/>
    <x-h1-title :title="$navs[$title]"/>
    <x-h3-title :title="$navs[$subtitle]"/>    
    @includeIf('theme-contents.' . $subtitle)
  @else
    <x-bread-crumb :title="$title"/>
    <x-h1-title :title="$navs[$title]"/>   
     @includeIf('theme-contents.' . $title)
  @endif
@endsection

   

