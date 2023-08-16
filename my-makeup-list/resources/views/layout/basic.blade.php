<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <script src="https://cdn.tailwindcss.com"></script>

    <script src="//unpkg.com/alpinejs" defer></script>


    {{-- blade-formatter-disable --}}
    <style type="text/tailwindcss">

        .btn{
            @apply rounded-md px-2 py-1 text-center text-slate-700 font-medium shadow ring-1 ring-slate-700/10 hover:bg-slate-100
        }

        .link{
            @apply font-medium text-gray-400 hover:text-yellow-300
        }        

        label{
            @apply block uppercase text-slate-700 mb-2 mt-6
        }

        h2{
            @apply text-2xl font-bold my-5
        }

        .form-input, .text-input{
            @apply  rounded-md shadow appearance-none border border-slate-200 w-full py-3 px-3 text-slate-700 leading-tight focus:outline-none 
        }

        .form-input-error{
            @apply  rounded-md shadow appearance-none border border-red-500 w-full py-3 px-3 text-slate-700 leading-tight focus:outline-none 
        }

        .error-msg{
            @apply italic font-medium text-xs text-red-400  my-2 
        }
    
    </style>
    {{-- blade-formatter-enable --}}

    <title>Ting's Makeup List</title>

</head>

@yield('style')

<body class="container mx-auto my-10 max-w-lg">

    @yield('header')

    @yield('content')

</body>

</html>