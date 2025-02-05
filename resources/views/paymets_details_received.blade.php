@extends('layouts.main_blade_views')
@section('content')

    <div class="success-message-form">
        <div class="locations-container" style="text-align: center;" >

           @if(App::getLocale() == 'gr')
            <h1 style="border-bottom: 1px solid black; text-align: left; font-family: 'Times New Roman'; color: #9D968D;" >{{ $res['confirmed'] ?? 'Confirmed' }}</h1>
            @else
                <h1 style="border-bottom: 1px solid black; text-align: left; font-family: Geometria-Light; color: #9D968D;" >{{ $res['confirmed'] ?? 'Confirmed' }}</h1>
            @endif
            <h3>{{ $res['thank_you_credit'] ?? 'Thank you. your credit card details have been secirely received!'  }}</h3>
            <p style="font-size: 28px;">
                @if($booking != null)
                    <b>{{ $res['your_booking_number_is'] ?? '-could not load from file please contact an administrator' }} {{ $booking->id }}</b>
                @endif
            </p>
            <p style="font-size: 28px;">
                <a href="/{{ App::getLocale() }}/check-reservation" style="color: #9D968D;">{{ $res['you_can_check'] ?? '-could not load from file please contact an administrator' }}</a>
            </p>
            <p style="font-size: 28px;">
                {{ $res['in_case'] ?? '-could not load from file please contact an administrator' }}
            </p>
        </div>
    </div>



@endsection

