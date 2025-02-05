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

    #{{ $booking->id }} Νέα καταχώριση Πιστωτικής Κάρτας. <a href="https://cretan-villa.com/admin/booking/{{ $booking->id }}"> Κατευθύνσου </a> <br>

</body>
</html>
