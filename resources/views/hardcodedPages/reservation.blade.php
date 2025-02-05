<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{--    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />--}}
    {{--    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>--}}
{{--    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">--}}
    <link rel="stylesheet" href="{{ asset('css/fa-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/RES-form-new-styles.css') }}" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" >
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <script src="{{ asset('js/jquery-1.11.3.min.js') }}"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
        crossorigin="anonymous"></script>
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet" />

{{--    <script src="{{ asset('js/wickedpicker.min.js') }}"></script>--}}
    @stack('head-scripts')

{{--    @vite(['resources/css/wickedpicker.scss']);--}}

    {{--  ADD OG AND SCHEMASSS  --}}
{{--    @vite(['resources/css/wickedpicker.scss']);--}}
    @livewireStyles
    <title> {{ $reservation_form->title }} </title>
</head>

<body>
<livewire:top-bar />
<livewire:menu-bar />
@if(session()->has("error"))
    <div class="alert-error" x-data="{show: true}" x-effect="setTimeout(() => show = false, 3000)" x-show="show">
        <p>
            {{session("error")}}
        </p>
    </div>
@endif

@if(session()->has("success"))
    <div class="alert-success" x-data="{show: true}" x-effect="setTimeout(() => show = false, 3000)" x-show="show">
        <p>
            {{session("success")}}
        </p>
    </div>
@endif
 {{ $slot }}



</body>
@stack('bottom-scripts')
@livewireScripts


{{--<script src="{{ asset('js/searchbox.js') }}"></script>--}}
</html>
