@extends('layouts.main_blade_views')
@section('content')
    @if(session()->has('message') || session()->has('error'))
        {{ $message ?? ' ' }}
        {{ $error ?? ' ' }}
        {{ $errors->first() ?? ''}}
    @endif
    <div class="form-container">
        <div class="steps">
            <div class="step active">
                {{ $reservation_form['check_your_reservation'] ?? '1. Check your reservation' }}
            </div>

        </div>

        <form action="/en/modify-cancel-reservation/submit" class="authentication-form" method="post">
            @csrf
            <input type="hidden" name="locale" value="{{ App::getLocale() }}">
            <h1 style="text-decoration: none;border-bottom: 1px solid #9D968D; font-family: Geometria-Light;color:#9D968D; width: 100%;  text-align: center;">
                {{$reservation_form['modify_cancel'] ?? 'Modify/Cancel your '}} {{ $reservation_form['reservation'] ?? 'Reservation' }}  </h1>
            <div class="auth-form-input-group">
                <label for="booking_id" style="font-size: 20px;"> {{ $reservation_form['booking_id'] ?? 'Reservation No.:' }} </label>
                <input type="text" name="booking_id" style="padding-inline: 20px; min-width: 240px; font-size: 17px; border:2px solid black; border-radius: 5px;" placeholder="R-000000000-00000" value="">
            </div>
            <div class="auth-form-input-group">
                <label for="email" style="font-size: 20px;" > {{ $reservation_form['email_given'] ?? 'Email:' }} </label>
                <input type="text" style="font-size: 17px; border:2px solid black; min-width: 240px; border-radius: 5px; padding-inline: 20px;" name="email" placeholder="i.e. example@example.com">
            </div>
            <br>
            <button type="submit" style="font-size: 18px; padding-inline: 2.8rem; border:2px solid #6e6259;"> {{ $reservation_form['submit_search_booking'] }} </button>
        </form>
    </div>

@endsection
