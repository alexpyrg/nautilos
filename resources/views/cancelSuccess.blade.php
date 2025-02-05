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

    </div>
    <div style="margin: 0 auto; max-width: 1300px; min-height: 500px;">
        <h1 style="color: #9D968D;">{{ $reservation_form['cancel_title'] ??'We confirm the cancellation of your reservation at Cretan-Villa Hotel & apts.!'}}</h1>
        <h2 style="">{!! $reservation_form['cancel_body'] ??  '
Ιf you ever need our services in the future, we will be more than happy to assist.
<br>
If you have any questions, please contact us at: <a href="mailto:info@cretan-villa.com">info@cretan-villa.com</a>. <br>
Best regards, Cretan-Villa hotel customer care.'!!} </h2>
    </div>

@endsection
