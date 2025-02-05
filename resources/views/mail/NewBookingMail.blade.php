<!doctype html>
<html lang="en">
<head>
    <style>
        .info-table{
            /*background-color: #b9b9b9;*/
            max-width: 600px;
            font-family: Tahoma, Arial, Geneva, sans-serif;

        }
        .info-row{
            width: 100%;
            margin:0;
            padding:0;
            font-size: 16px;
            padding-block: .2rem;
        }
        .info-title{
            min-width: 140px;
            display: inline-block;
            font-size: 18px;
            padding-left: .4rem;

        }
        .info-value{
            font-size: 18px;
        }
        .title{
            text-align: center;
            background-color: #92afd0;
            font-size: 36px;
        }
        .divider-title{
            background-color: #b0b0b0;
            padding: .2rem;
            font-size: 24px;
            text-align: center;
        }
        .sub-title{
            background-color: #b0b0b0;
            text-align: center;
            font-size: 26px;
        }
    </style>
</head>
<body>
    <h1> Νέα Κράτηση με αριθμό: {{ $booking->id }}</h1>

    <h3> Πατήστε το σύνδεσμο <a href="https://cretan-villa.com/admin/booking/{{ $booking->id }}">https://cretan-villa.com/admin/booking/{{ $booking->id }}</a> για να  τη δείτε!</h3>

    <div class="info-table">
        <div class="title">Cretan Villa Hotel</div>
        <div class="sub-title"><b>{{ $booking->id }}</b> - New Reservation</div>

        <div class="divider-title">Contact Details</div>
        <div class="info-row">
            <span class="info-title">Title</span>
            <span class="info-value">{{ $booking->person_title_id }}</span>
        </div>
        <div class="info-row">
            <span class="info-title">Name</span>
            <span class="info-value">{{ $booking->name }}</span>
        </div>
        <div class="info-row">
            <span class="info-title">Surname</span>
            <span class="info-value">{{ $booking->surname }}</span>
        </div>
        <div class="info-row">
            <span class="info-title">Email</span>
            <span class="info-value"><a href="mailto:{{ $booking->email }}">{{ $booking->email }}</a></span>
        </div>
        <div class="info-row">
            <span class="info-title">Telephone</span>
            <span class="info-value">{{ $booking->telephone }}</span>
        </div>
        <div class="info-row">
            <span class="info-title">Address</span>
            <span class="info-value">{{ $booking->address }}</span>
        </div>
{{--        <div class="info-row">--}}
{{--            <span class="info-title">City</span>--}}
{{--            <span class="info-value">{{ $booking->city }}</span>--}}
{{--        </div>--}}
        <div class="info-row">
            <span class="info-title">Country</span>
            <span class="info-value">{{ $booking->country }}</span>
        </div>

        <div class="divider-title">Reservation details</div>
        <div class="info-row">
            <span class="info-title">Room</span>
            <span class="info-value">{{ $booking->room_type_id }}</span>
        </div>
        <div class="info-row">
            <span class="info-title">No. of Rooms</span>
            <span class="info-value">{{ $booking->nr_rooms }}</span>
        </div>
        <div class="info-row">
            <span class="info-title">Arrival</span>
            <span class="info-value">{{ $booking->check_in_date }}</span>
        </div>
        <div class="info-row">
            <span class="info-title">Departure</span>
            <span class="info-value">{{ $booking->check_out_date }}</span>
        </div>

        <div class="info-row">
            <span class="info-title">Nights</span>
            <span class="info-value">{{ $nights }}</span>
        </div>
        <div class="info-row">
            <span class="info-title">Est. Arrival</span>
            <span class="info-value">{{ $booking->estimated_arrival_time }}</span>
        </div>
        <div class="info-row">
            <span class="info-title">Total</span>
            <span class="info-value">{{ $booking->final_rate }}</span>
        </div>
        <div class="info-row">
            <span class="info-title">Prepayment</span>
            <span class="info-value">{{ $booking->prepayment }}</span>
        </div>
        <div class="info-row">
            <span class="info-title">Comments</span>
            <span class="info-value">{{ $booking->special_request }}</span>
        </div>

        <div class="divider-title"></div>
    </div>

</body>
</html>
