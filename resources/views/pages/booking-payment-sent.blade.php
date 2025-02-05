@extends('layouts.main_blade_views')
@section('content')

<div class="success-message-form">
    <div class="locations-container">
        <h1 style="border-bottom: 1px solid black; font-family: Geometria-Light; color: #9D968D;" >Confirmed</h1>

        <h3>Thank you. Your credit card details have been securely received.</h3>
        <p style="">
            @if($booking != null)
                <b>Your booking number is: {{ $booking->id }}</b>
            @endif
        </p>
        <p>
            <a href="/booking/check-cancel" style="color: #9D968D;">You can check your request status by adding booking number to this page</a>
        </p>
        <p>
            In case you want to contact us about your booking request please provide us this number.
        </p>
    </div>
</div>



@endsection

