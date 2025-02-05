<!doctype html>
<html>
<head>
    <style>
        body{
            max-width: 900px;
            overflow: hidden;
            font-size: 17px;
            margin:0 auto;
            overflow-y: scroll;
        }
        .mail-body{
            max-width: 900px;
            overflow: hidden;
            margin:0 auto;
        }
        .header{
            width: 100%;
            background-color: #9D968D;
            color: white;
            padding: .5rem;
            max-width: 100%;
            overflow: hidden;
            box-sizing: border-box;
        }
        .divider{
            display: block;
            position: relative;
            width: 100%;
            height: .8rem;
            background-color: #6E6259;
            max-width: 100%;
            overflow: hidden;

            /*margin-top: 1rem;*/
        }
        .mail-foot{
            background-color: #9D968D;
            color: white;
            line-height: 50px;
            width: 100%;

        }
        p{
            font-family: "Times New Roman", Times, serif, Tahoma, Arial;
            font-size: 17px;
            padding-bottom: 0;
            margin-bottom: 0;
        }
        .small-text{
            font-size: 14px;
            padding-bottom: 0;
            margin-bottom: 0;
        }
        .button{
            display: block;
            position: relative;
            padding: 1rem;
            background-color: #9D968D;
            color: #ffffff;
            text-decoration: none;
            margin: 0 auto;
            max-width: fit-content;
            font-size: 30px;
            border:2px solid #6e6259;
        }
        pre{
            text-wrap: auto;
        }
    </style>
</head>
<body>
<div class="mail-body">




    {!! html_entity_decode($emailContent) !!}

{{--    <div class="header">--}}
{{--    <img style="display: inline" width="300" height="70" src="{{ asset('images/logo.png') }}" />--}}
{{--        <p style="display: inline; line-height: 40px; margin-bottom: 0.7rem;margin-right: 1rem; float: right;">Your booking request with Cretan-Villa hotel</p>--}}
{{--    </div>--}}
{{--    <div class="divider"></div>--}}
{{--    <p style="font-family: Tahoma, Arial, Geneva, sans-serif;">--}}
{{--        Dear {{ $title }} {{ $booking->surname }} {{ $booking->name }},<br>--}}
{{--        Our availability for your request: <b>{{ $booking->id }}</b> from {{ $check_in_date }} till {{ $check_out_date }}--}}
{{--        <br>for the total amount of € {{ number_format($booking->final_rate,2) }} has been confirmed.--}}
{{--        <br><br>--}}
{{--        <b>Excluded Charges:</b> Environment fee: € {{ number_format($environment_fee,2) }},  (€ {{ number_format($environment_fee,2) }} / Per Night) - Paid at the hotel in cash.--}}
{{--        <br><br>--}}
{{--        The amount of € {{ number_format($booking->prepayment,2) }} should be paid in advance in order to guarantee your reservation.--}}
{{--        <br><br>--}}
{{--        You can use the following link to confirm your booking.<br>--}}
{{--        We only accept Visa and Mastercard. We do not accept pre-paid cards.--}}
{{--        <br><br>--}}
{{--        <br><br>--}}
{{--        <a class="button" style="color: #fff;" href="{{ $booking_link }}"> {{ 'ONLINE PAYMENT' }} </a>--}}
{{--        <p class="small-text">--}}
{{--        <br><br>--}}
{{--            The booking was accepted on: {{ $booking_accept_date }}<br>--}}
{{--            This email has been sent to you upon interaction with our website. If this has reached you by mistake, please disregard it or contact us.--}}
{{--</p>--}}
{{--    </p>--}}
{{--    <div class="divider"></div>--}}
{{--    <div class="mail-foot">--}}
{{--        <p style="display: inline; line-height: 25px;">&nbsp; Copyright <a href="https://cretan-villa.com/"> cretan-villa.com </a> All rights reserved.</p>--}}
{{--        <a style="display: inline; float: right; margin-top: .3rem;" href="https://www.instagram.com/cretan_villa_hotel/"><img src="{{ asset('images/instagram-logo.svg') }}" width="40px" height="40px"></a>--}}
{{--        <a style="display: inline; float: right; margin-top: .3rem;" href="https://www.facebook.com/Cretan.Villa.Hotel.Ierapetra"><img src="{{ asset('images/facebook-logo.svg') }}" width="40px" height="40px"></a>--}}
{{--    </div>--}}
</div>
</body>
</html>
