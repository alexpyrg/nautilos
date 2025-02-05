<!doctype html>
<html lang="{{ App::getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=5.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="sitemap" type="application/xml" title="Sitemap" href="/sitemap.xml">
    <link rel="preload" href="{{ asset('css/cooltipz.min.css') }}" as="style">
    <link rel="stylesheet" href="{{ asset('css/new_styles.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" >

    {{--    <link rel="stylesheet" href="{{ asset('css/new_styles.min.css') }}" />--}}
    <link rel="stylesheet" href="{{ asset('css/credit-card-css.css') }}" >



    {{--    <link rel="preload" href="{{ asset('js/splide.min.js') }}" as="script" />--}}
    {{--    <link rel="preload" href="{{ asset('js/flatpickr.js') }}" as="script" />--}}




    @livewireStyles
    <style>
    </style>
    <title>Welcome to Cretan Villa</title>
</head>
<body>
<livewire:top-bar />
<livewire:menu-bar />
<div class="divider"> </div>

@yield('content')

<div class="divider"> </div>
<livewire:footer />
@livewireScripts
<script src="{{ asset('js/credit-card-from.js') }}"></script>
<script src="{{ asset('js/imask.min.js') }}"></script>
</body>
</html>
