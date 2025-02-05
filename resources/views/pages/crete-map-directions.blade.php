@extends('layouts.main_blade_views')
@section('content')
    <div>
        <livewire:carousel-homepage />
        <livewire:inquiry-information />
        <livewire:main-four-field-form/>
        <livewire:booking-options-client />
        <div class="locations-container">

            <div class="textBox">
                <h2 style="font-family: Geometria-Light; color:#9D968D;" class="h1-rooms-main text-left">Crete map and directions to Cretan Villa Hotel</h2>
                <p><iframe frameborder="0" height="321" scrolling="no" src="https://maps.google.com/maps/ms?msid=206319896271750541096.0004c029cf1ab6de92ef4&amp;msa=0&amp;ie=UTF8&amp;t=m&amp;ll=35.250105,24.938965&amp;spn=1.614912,4.086914&amp;z=8&amp;output=embed" width="660"></iframe><br />


                    <small><a href="https://maps.google.com/maps/ms?msid=206319896271750541096.0004c029cf1ab6de92ef4&amp;msa=0&amp;ie=UTF8&amp;t=m&amp;ll=35.250105,24.938965&amp;spn=1.614912,4.086914&amp;z=8&amp;source=embed" style="color:#0000FF;text-align:left; font-size: 18px;">View Cretan Villa Hotel in Ierapetra Directions large map. <img src="https://www.cretan-villa.com/images/print.png" /></a> </small></p>    </div>

            <div class="clear"></div>


        </div>
    </div>
@endsection
