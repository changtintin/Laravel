<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>政治大學 創新與創造力研究中心</title>

    {{-- Summernote CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">

    {{-- Not sure what this is --}}
    {{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" /> --}}

    {{-- Twitter Sharer --}}
    {{-- <script src="https://platform.twitter.com/widgets.js" charset="utf-8" defer></script> --}}

    {{-- Customize css --}}
    <link rel="stylesheet" href="{{ asset('css/customize/blob.css') }}">
    <link rel="stylesheet" href="{{ asset('css/customize/class.css') }}">
    <link rel="stylesheet" href="{{ asset('css/customize/id.css') }}">
    <link rel="stylesheet" href="{{ asset('css/customize/scroll-title.css') }}">
    <link rel="stylesheet" href="{{ asset('css/customize/share-it.css') }}">
    <link rel="stylesheet" href="{{ asset('css/customize/small-device.css') }}">
    <link rel="stylesheet" href="{{ asset('css/customize/tag.css') }}">
    <link rel="stylesheet" href="{{ asset('css/customize/theme-box.css') }}">
    <link rel="stylesheet" href="{{ asset('css/customize/window-loader.css') }}">


    {{-- $npm i bootstrap@5.3.1 --}}
    <link rel="stylesheet" href="{{ asset('css/bootstrap/main.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap/bootstrap-icons.min.css') }}">
</head>
<body class="container-fluid p-0"> 
    <div id="fb-root"></div>      
    <x-top-btn/>     
    <x-navbar/>  
    <div class = "bg-wrap">
        <div class="window-loader"></div>
        <div style="display:none;" id="main-content" class="animate-bottom">                           
            @yield('content')            
        </div>
        <!-- background img -->
        <img src="../../img/web_bg.png" class = "bg-img" loading="lazy">
        <!-- ./ background img -->      
    </div>
    <x-footer/> 

    {{-- jQuery CDN --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" defer></script>
    {{-- sharethis API --}}
    <script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=652a3e7605f82e0013986ebe&product=sticky-share-buttons&source=platform" async="async"></script>
    {{-- FB Sharer --}}
    <script crossorigin="anonymous" src="https://connect.facebook.net/zh_TW/sdk.js#xfbml=1&version=v18.0&appId=255707960180137" nonce="UYB7NRON" async></script>
    {{-- Summernote JS --}}
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js" async></script>
</body>


