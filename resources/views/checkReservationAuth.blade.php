@extends('layouts.main_blade_views')
@section('content')
    @if(session()->hasAny('error'))
        {{ $message }}
        {{ $errors }}
    @endif
    <div class="form-container">
        <div class="steps">
            <div class="step active">
                {{ $reservation_form['check_your_reservation'] ??'1. Check your reservation' }}
            </div>

        </div>

        <form action="/{{ App::getLocale() }}/check-reservation" class="authentication-form" method="post">
           @csrf
            <input type="hidden" name="locale" value="{{ App::getLocale() }}">
            @if(strtolower(App::getLocale()) == 'gr')
                <h1 style="   font-family: 'Times New Roman'; text-decoration: none;border-bottom: 1px solid #9D968D; color:#9D968D; width: 100%;  text-align: center;">

                    @else
                        <h1 style="font-family: Geometria-Light; text-decoration: none;border-bottom: 1px solid #9D968D; color:#9D968D; width: 100%;  text-align: center;">


                        @endif
                    {{ $reservation_form['booking_details'] ?? 'Add your booking details' }}</h1>
            <div class="auth-form-input-group" id="card_place">
                <label for="booking_id" style="font-size: 20px;"> {{ $reservation_form['booking_id'] }} </label>
                <input type="text" name="booking_id" style="padding-inline: 20px; min-width: 240px; font-size: 17px; border:2px solid black; border-radius: 5px;" placeholder="Booking id" value="{{ $booking_id }}">
            </div>
            <div class="auth-form-input-group">
                <label for="email" style="font-size: 20px;" > {{ $reservation_form['email_given'] }} </label>
                <input type="text" style="font-size: 17px; border:2px solid black; min-width: 240px; border-radius: 5px; padding-inline: 20px;" name="email" placeholder="i.e. example@example.com">
            </div>
            <br>
            <button type="submit" style="font-size: 18px; padding-inline: 2.8rem; border:2px solid #6e6259;"> {{ $reservation_form['submit_search_booking'] }} </button>
        </form>
    </div>

@endsection
