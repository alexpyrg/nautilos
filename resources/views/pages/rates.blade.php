@extends('layouts.main_blade_views')
@section('content')
    <livewire:carousel-homepage />
    <livewire:inquiry-information />
    <livewire:main-four-field-form/>
    <livewire:booking-options-client/>
    <div class="locations-container">

        <h1 class="animated-title" style="padding-left: 0; font-family: Geometria-Light; font-size: 36px;">Official online booking for Cretan Villa Hotel & apartments in Ierapetra Crete</h1>
        <h3 style="text-align: center;">Cretan Villa Hotel Offers and Deals | Book Today & Save
            <br>
            Cretan Villa Hotel, Akrolithos Apartments & Ikia apartment: Todays Best Rates
        </h3>
        <p>
            <b> Book directly </b> on our site and get exclusive rates and <b>special customer care</b>. By making your booking on our official websites: <a href="https://www.cretan-villa.com/{{ App::getLocale() }}"> www.cretan-villa.com </a>, <a href="https://www.ierapetra-hotels.com/{{ App::getLocale() }}">www.ierapetra-hotels.com</a> ,   <a href="https://www.ierapetra-apartments.net/{{ App::getLocale() }}">www.ierapetra-apartments.net</a> we can guarantee the <b>best online price</b> for your accommodation at Cretan Villa Hotel , Akrolithos apartments and Ikia apartment in Ierapetra.
        </p>

        <table class="simple-table">
            <tr>
                <th class="" NOWRAP style="background-color: #9D968D; color:white;">Room Type</th>
                <th class="" NOWRAP style="background-color: #9D968D; color:white;">1/1 - 31/1</th>
                <th class="" NOWRAP style="background-color: #9D968D; color:white;">1/2 - 29/2</th>
                <th class="" NOWRAP style="background-color: #9D968D; color:white;">1/3 - 31/3</th>
                <th class="" NOWRAP style="background-color: #9D968D; color:white;">1/4 - 30/4</th>
                <th class="" NOWRAP style="background-color: #9D968D; color:white;">1/5 - 31/5</th>
                <th class="" NOWRAP style="background-color: #9D968D; color:white;">1/6 - 30/6</th>
                <th class="" NOWRAP style="background-color: #9D968D; color:white;">1/7 - 31/7</th>
                <th class="" NOWRAP style="background-color: #9D968D; color:white;">1/8 - 31/8</th>
                <th class="" NOWRAP style="background-color: #9D968D; color:white;">1/9 - 30/9</th>
                <th class="" NOWRAP style="background-color: #9D968D; color:white;">1/10 - 31/10</th>
                <th class="" NOWRAP style="background-color: #9D968D; color:white;">1/11 - 30/11</th>
                <th class="" NOWRAP style="background-color: #9D968D; color:white;">1/12 - 31/12</th>
            </tr>

            @foreach($rooms as $room)
                <tr>
                    <td class="" style="background-color: #9D968D; color:white;"> <b>{{ $room->name }}</b></td>
                    @foreach($MonthlyRate as $roomrate)
                        @if($roomrate->room_type_id == $room->id)
                        <td> {{ $roomrate->rate }}€</td>
                        @endif
                    @endforeach
                </tr>
            @endforeach
        </table>
        <h1>Taxes and service charges</h1>
        <p>
            13.00 % VAT is included. 0.50 % city tax is included.
            <br>
            Excluded Charges: Environment fee: 1.50 € per night, paid in cash.
            <br>
            A service charge is not applicable.
        </p>
        <br>
        <p> <b>Free!</b> WiFi is available in all areas and is free of charge.</p>
        <br>
        <p> <b>Free!</b> Free public parking is possible at a location nearby (reservation is not needed). The lodging is located in a pedestrian area and it does not have parking. However, the parking is allowed at the surrounding vertical streets.</p>
        <br>
        <p>There is no capacity for extra beds/baby cot in the apartments.</p>

        <h2 style="text-align: center">ON REQUEST SERVICES:</h2>

        <table class="simple-table">
            <tr>
                <th>On Request Services:</th>
                <th> &nbsp; </th>
            </tr>
            <tr>
                <td>
                    Breakfast:
                </td>
                <td>
                    You can enjoy your breakfast in Casablanca All Day Cafe garden, 20 meters away from 8.00 a.m.
                </td>
            </tr>
            <tr>
                <td>
                    Extra bed/ranch:
                </td>
                <td>
                    15 € / night.
                </td>
            </tr>
            <tr>
                <td>
                    Safe box:
                </td>
                <td>
                    2 € / night.
                </td>
            </tr>
            <tr>
                <td>
                    Printing:
                </td>
                <td>
                    1 € / page
                </td>
            </tr>
            <tr>
                <td>
                    Fax:
                </td>
                <td>
                    1 € / page
                </td>
            </tr>
            <tr>
                <td>
                    Car rental:
                </td>
                <td>
                    If you would like to rent a car, let us know and we will help you.
                </td>
            </tr>
            <tr>
                <td>
                    Transfer from/to Heraklio
<br>
                    air port / port:
                </td>
                <td>
                    120 € up to 4 people for direct only bookings.
                </td>
            </tr>
            <tr>
                <td>
                    Hike leader:
                </td>
                <td>
                    If you wish to go walking or hiking with the help of a hike leader please ask us and we will help you.
                </td>
            </tr>
        </table>

        <p>Please, check the prices, the availability and book online by filling in the fields on the booking form.</p>
        <p>Please note that these rates are valid  for direct and confirmed bookings by  our booking system.</p>
        <p>

            Check in time: 15.00 - 20.00<br>
            Check out time: 08.00 - 11.00
        </p>
        <p>
           <u> In case of arrival later or earlier than the front desk hrs (8:00 - 20:00 daily), please be so kind to let us know.</u>
        </p>
        <h2>Secure transaction</h2>

        <p>
            This site uses a secure server for credit card booking confirmations in compliance with the 2048 bit Secure Socket Layer (SSL) encryption world standard.
        </p>
        <h2>By bank transfer</h2>
        <p>
            If you do not wish to make a reservation electronically, you can  guarantee your reservation by depositing the 50% from the final amount  in the Hotel's Bank Account by bank transfer. Upon making the booking payment, the client must take on the cost of the transfer, in the case that these were applicable. If the advance is not paid within the agreed time, (2 working days) the reservation is considered invalid and the rooms will be available to rent. Once made the bank transfer, you will need to send us the payment receipt by e-mail, and when the operation has been validated we will send you the final booking confirmation.
        </p>

        <h2>ALPHA BANK</h2>

        <p>
            Account No.: 66 200 23 100 19 445 <br>
            Holder name: Dermitzakis Emmanouel <br>
            Branch No.: 662 <br>
            IBAN : GR61 0140 6620 6620 0210 1126 041<br>
            SWIFT / BIC CODE: CRBAGRAA <br>
        </p>
    </div>
@endsection
