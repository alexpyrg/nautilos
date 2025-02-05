<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Booking | {{ $booking->id }}</title>
    <style>
        body{
            font-family: Arial;

        }

        .black-divider{
            height: 2px;
            width: 100%;
            background-color: black;
            display: block;
            position: relative;
        }

        .gray-divider-xl{
            height: 15px;
            width: 100%;
            display: block;
            position: relative;
        }
        .main-div{
            width: 800px;
            max-width: 800px;
            height: fit-content;
            margin: 0 auto;
        }
        table{
            font-size: 18px;
            border-collapse: collapse;
            text-align: left;
            border-top: 1px solid black;
            border-bottom: 1px solid black;
        }
        tr:nth-child(odd){
           background-color: #d9d9d9;
        }
        table th{
            font-size: 16px;
            padding-block: .5rem;
            font-weight: 600;

        }
    </style>
</head>
<body>
{{--@if(!Auth::user()->check())--}}
{{--    @php--}}
{{--    @endphp--}}
{{--@endif--}}
        <div class="main-div">
            <h1 style="width: 100%; padding-block: .5rem; text-align: center; background-color: #9D968D;">
                Reservation
            </h1>
            <div class="black-divider"></div>

            <div class="gray-divider-xl"></div>
            <table style="width:100%">
                <tr>
                    <th>Κωδικός Κράτησης </th>
                    <td>{{ $booking->id }}</td>
                </tr>
                <tr>
                    <th>Όνομα </th>
                    <td>{{ $booking->person_title_id == 2 ? 'Ms' : 'Mr' }} {{ $booking->name }} {{ $booking->surname ?? 'n/a' }}</td>
                </tr>
                <tr>
                    <th> Email </th>
                    <td>{{ $booking->email }}</td>
                </tr>
                <tr>
                    <th>Τηλέφωνο </th>
                    <td> + {{ $country->phone_prefix ?? 'n/a' }} {{ $booking->telephone }}</td>
                </tr>
                <tr>
                    <th>Χώρα</th>
                    <td>{{ $country->name }}</td>
                </tr>
                <tr>
                    <th>Τύπος δωματίου </th>
                    <td>{{ $room_type->name }}</td>
                </tr>
                <tr>
                    <th>Αρ. Δωματίων</th>
                    <td>{{ $booking->nr_rooms }}</td>
                </tr>
                <tr>
                    <th>Check-in</th>
                    <td>{{ $check_in_date }}</td>
                </tr>
                <tr>
                    <th>Check-out</th>
                    <td>{{ $check_out_date }}</td>
                </tr>
                <tr>
                    <th>Est. arrival time:</th>
                    <td>{{ $booking->estimated_arrival_time }}</td>
                </tr>
                <tr>
                    <th>Συνολικές διανυκτερεύσεις</th>
                    <td>{{ $total_nights }}</td>
                </tr>
                <tr>
                    <th>Σχόλια πελάτη</th>
                    <td>{{ $booking->special_request }}</td>
                </tr>
                <tr>
                    <th>Κόστος </th>
                    <td>{{ number_format($booking->final_rate,2) }} €</td>
                </tr>
                <tr>
                    <th>Προκαταβολή(30%)</th>
                    <td>{{ number_format($booking->prepayment,2) }} €</td>
                </tr>
                <tr>
                    <th>Κρατικός Φόρος</th>
                    <td>{{ number_format($booking->total_gov_tax,2) }} €</td>
                </tr>
                <tr>
                    <th>Συνολικό κόστος</th>
                    <td>{{ number_format($booking->total_cost,2) }} € </td>
                </tr>
                @if( $card != null)
                <tr>
                    <th>Όνομα Κάρτας</th>
                    <td>{{ $card->card_holder_name  }}</td>
                </tr>
                <tr>
                    <th>Αριθμός Κάρτας</th>
                    <td>{{ $card->card_number }}</td>
                </tr>
                <tr>
                    <th>Λήξη</th>
                    <td>{{ $card->card_exp_month }}/{{ $card->card_exp_year }}</td>
                </tr>
                <tr>
                    <th>CCV/CVV</th>
                    <td>{{ $card->card_cvv }}</td>
                </tr>
                @endif
            </table>
        </div>
<script>window. print();</script>
</body>
</html>
