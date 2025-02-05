@extends('layouts.custom_page_layout')
@section('content')

    <div class="error" style="text-align: center; max-width: 100%; width: fit-content; margin: 0 auto; position: relative; display: block">
        <h1>Error 404! We could not find what you were looking for!</h1>
        <h2><a href="{{ App::getLocale() != 'en' ? '/' . App::getLocale() : '/' }}">Back to home page</a></h2>
    </div>

@endsection
