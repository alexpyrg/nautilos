@extends('layouts.main_blade_views')
@section('content')
    <div class="container">
        <h1>{{ $res['check_your_reservation'] }}</h1>
        <p>
            @if($booking->status == 'pending')
                {{ $res['booking_pending'] ?? 'Your booking is pending. We will contact you shortly!' }}
            @elseif($booking->status == 'completed')

                {{ $res['your_credit_card_details'] ?? 'Booking completed. Your reservation is.. ...' }}
            @elseif($booking->status == 'prepayment')
                {{ $res['your_credit_card_details'] ?? 'Payment is pending' }}
{{--                {{ \Illuminate\Support\Facades\Redirect::to('/booking/'. $booking->id . '') }}--}}
            @endif
        </p>
    </div>
@endsection
