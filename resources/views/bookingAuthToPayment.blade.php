@extends('layouts.main_blade_views')
@section('content')
    @if(session()->hasAny('error'))
        {{ $message }}
        {{ $errors }}
    @endif
    <div class="form-container">
        <div class="steps">
            <div class="step active">
                {{ $reservation_form['check_your_reservation'] }}
            </div>

        </div>

        <form action="/booking/prepayment-details-form#card_place" class="authentication-form" method="get">

           @if(strtolower(App::getLocale()) == 'gr')
            <h1 style="text-decoration: none;border-bottom: 1px solid #9D968D; font-family: 'Times New Roman';color:#9D968D; width: 100%;  text-align: center;">
                {{ $reservation_form['online_payment'] }}</h1>
            @else
                <h1 style="text-decoration: none;border-bottom: 1px solid #9D968D; font-family: Geometria-Light;color:#9D968D; width: 100%;  text-align: center;">
                    {{ $reservation_form['online_payment'] }}</h1>
               @endif
            <div class="auth-form-input-group" id="card_place">
                <label for="booking_id" style="font-size: 20px;"> {{ $reservation_form['booking_id'] }} </label>
                <input type="text" name="booking_id" style="padding-inline: 20px; min-width: 240px; font-size: 17px; border:2px solid black; border-radius: 5px;" placeholder="" value="{{ $booking_id }}">
            </div>
            <div class="auth-form-input-group">
                <label for="email" style="font-size: 20px;" > {{ $reservation_form['email_given'] }} </label>
                <input type="text" style="font-size: 17px; border:2px solid black; min-width: 240px; border-radius: 5px; padding-inline: 20px;" name="email" placeholder="">
            </div>
            <br>
            <button type="submit" style="font-size: 18px; padding-inline: 2.8rem; border:2px solid #6e6259;"> {{ $reservation_form['submit_search_booking'] }} </button>
        </form>
    </div>

@endsection
