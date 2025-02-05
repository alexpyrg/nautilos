@extends('layouts.main_layout')
@section('content')
    {{--MENU_START_HERE--}}

   @if($showTopBar)
    <livewire:topbar />
    @endif

        @if($showmenu)
            <livewire:menu-bar />
        @endif
    {{--MENU_END_HERE--}}

    {{--CAROUSEL_START_HERE--}}
        @if($showcarousel)
            <livewire:carousel-moving-left />
        @endif
    {{--CAROUSEL_END_HERE--}}

    {{--CONTENT_START_HERE--}}
        @if($showcontent)
            {!! $content !!}
        @endif
    {{--CONTENT_END_HERE--}}

    {{--FOOTER_START_HERE--}}
        @if($showfooter)
            <livewire:footer />
        @endif
    {{--FOOTER_END_HERE--}}
@endsection



{{--
  -- THIS IS A TEMPLATE AND SHOULD NEVER BE TOUCHED UNLESS CHANGES MUST BE DONE
 --}}
