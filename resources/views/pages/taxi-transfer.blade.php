@extends('layouts.main_blade_views')
@section('content')
<div>
    <livewire:carousel-homepage />
    <livewire:inquiry-information />
    <livewire:main-four-field-form/>
    <livewire:booking-options-client />
    <div class="locations-container">
        <h1 class="animated-title" style="padding-left: 0; font-family: Geometria-Light; font-size: 36px;">Taxi transfer from Heraklion to Ierapetra</h1>
        <div class="flex-inline">
        <p style="padding-top: 0;margin-top: 0;">
        If you like to book a taxi to collect you from Heraklion airport or port, we can send one (100 km 120,00 euro).
            <br><u>This offer is valid only for direct reservations from our official web sites.</u>
        <br>Your driver will be waiting for you at the arrivals with a sign stating your name.
            <br>You will be escorted to your vehicle and transferred directly to our door.
            </br>
            <br>Model of taxi car: Mercedes E 220 CDI Avantgarde
        <br>Aircondition, climate control.
        <br>
        <br>
        Taxi driver: Stelios Stathorakis
        <br>
        Mail: <a style=" color:#9D968D;" href="mailto:cretan-villa@cretan-villa.com">cretan-villa@cretan-villa.com</a>
        </p>
            <img src="{{ asset('images/cretan-villa-47.png') }}" alt="taxi transfer ierapetra">
        </div>

    </div>
</div>
@endsection
