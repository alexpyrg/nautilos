@extends('layouts.main_blade_views')
@section('content')
    @if(session()->hasAny('error'))
        {{ $message ?? ' ' }}
        {{ $error ?? ' e' }}
    @endif
    @error('error')
        <h2 style="color: darkred; background-color: lightcoral; border-left: 4px solid darkred;">
            Error: {!! html_entity_decode($message,ENT_HTML5) !!}
        </h2>
    @enderror
    <div class="locations-container">
        <h1 style="   @if(strtolower(App::getLocale()) == 'gr') font-family: 'Times New Roman';  @else font-family: Geometria-Light; @endif color: #9D968D;">
            {{ $res['modify_cancel'] }} | {{ $booking->id }}
        </h1>
            <p style="font-size: 18px;">
                {!! $beMessage !!}
            </p>
        <br><br>
{{--        {{ dd($canCancel) }}--}}
       @if($canCancel)
           <form  action="booking/cancel" method="post">
               @csrf
               <input type="hidden" name="booking_id" value="{{ $booking->id }}">
               <input type="hidden" name="booking_email" value="{{ $booking->email }}">
               <input type="hidden" name="booking_name" value="{{ $booking->name }}">
               <button type="submit" style="padding: .8rem; background-color: red; color: white; font-weight: bold; font-size: 24px">
                   {{ $res['cancel_reservation'] ?? 'Cancel Reservation' }}
               </button>
           </form>
       @endif
        <br><br>
        <p style="text-wrap: auto; font-size: 18px;">
            {!! html_entity_decode($res['cancellation_policy']) !!}
            {!!  html_entity_decode($res['if_cancelled_up_to']) !!}
{{--            Cancellation Policy--}}
{{--            If cancelled up to 21 days before date of arrival, no fee will be charged and the deposit will be refund back to the customer credit card. If cancelled or modified later, 50 % of total price of the reservation will be charged. In case of no-show, the total price of the reservation will be charged. In case of cancellation during the stay, a 50% compensation of the remaining days originally agreed is due and payable to the hotel by the customer.--}}
        </p>
    </div>

@endsection
