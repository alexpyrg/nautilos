<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <style>
        body{
            color: black;
            max-width: 1500px;
            font-family: 'DejaVu Sans', sans-serif;
        }
        .sub-top{
            display: block;
            border-bottom: 1px solid black;
            font-weight: bold;
            font-family: 'DejaVu Sans', sans-serif;
            margin-bottom: 0;
            font-size: 16px;
        }

        p{
            font-size: 16px;
        }
        table{
            border: 1px solid black;
            width: 100%;
            font-family: Tahoma, Arial, Geneva, sans-serif;
        }
        table th{
            text-align: left;
        }
        table td{
            max-width: 50%;
        }
        table tr{
            padding-block: .2rem;
        }

        .logo-n-h1{
            padding-top: 1rem;
            padding-bottom: .5rem;
            display: block;
            position: relative;

        }
    </style>
</head>
<body>
    {{--  {{ $voucher_translation->title }} --}}
{{--    <div class="document-title"> CRETAN VILLA & AKROLITHOS VOUCHER | www.Cretan-Villa.com - info@cretan-villa.com </div>--}}

    <div class="">
        <div class="sub-top" style="margin-bottom: .5rem;">
            CRETAN VILLA & AKROLITHOS VOUCHER
        </div>
        <div class="logo-n-h1">
            <img width="60" height="60" style="display: inline-block; position: relative;" src="{{ public_path('images/0.jpg') }}">
            <h1 style="display: inline-block; position: relative; font-size: 26px;margin-left: 3rem;">Cretan Villa Hotel & Akrolithos Apts </h1>
        </div>
    <p style="text-align: left;margin-top: 0;">
        {{ $guest_name  }}
        <br>
        <br>

    </p>
        {!! html_entity_decode($welcome->content) !!}
        <table>
            <tr>
                <td> Reservation number : </td>
                <th> {{ $booking->id }} </th>
            </tr>
            <tr>
                <td> Guest Name : </td>
                <th>  {{ $guest_name }} </th>
            </tr>
            <tr>
                <td> Arrival Date : </td>
                <th> {{ $check_in_date }} </th>
            </tr>
            <tr>
                <td> Departure Date : </td>
                <th> {{ $check_out_date }} </th>
            </tr>
            <tr>
                <td> Number of Guests : </td>
                <th> {{ $no_of_guests }} </th>
            </tr>
            <tr>
                <td> Number of Rooms : </td>
                <th> {{ $nr_rooms }} </th>
            </tr>
            <tr>
                <td> Room Type : </td>
                <th> {{ $room_type }} </th>
            </tr>
            <tr>
                <td> Rate : </td>
                <th> {{ number_format($booking->final_rate,2) }} € </th>
            </tr>
            <tr>
                <td> Payment in advance : </td>
                <th> {{ number_format($payment_in_advance,2) }} € </th>
            </tr>
            <tr>
                <td style="text-wrap: auto;"> Environmental Fee : {{ number_format( $gtmc->first()->cost ,2) }} € per room per night -<br> paid at the hotel in cash </td>{{-- FIX LATER --}}
                <th> {{ number_format($booking->total_gov_tax ,2) }} € </th> {{-- FIX LATER --}}
            </tr>
            <tr>
                <td> Total Price : </td>
                <th> {{ number_format($booking->total_cost,2) }} € </th>
            </tr>
            <tr>
                <td> Hotel Receipt Number : </td>
                <th> {{ $receipt_number != 'null' ? $receipt_number : '-'  }} </th>
            </tr>
            <tr>
                <td> Booking date : </td>
                <th> {{ $reservation_date }} </th>
            </tr>
            <tr>
                <td> Check-in time : </td>
                <th> {{ $check_in_time }} </th>
            </tr>
            <tr>
                <td> Check-out time : </td>
                <th> {{ $check_out_time }} </th>
            </tr>
        </table>

      {!! html_entity_decode($policy->content) !!}
    </div>
{{--    @if($locale == 'en')--}}
{{--    @elseif($locale == 'gr')--}}
{{--        <div class="">--}}
{{--            <div class="sub-top" style="margin-bottom: .5rem;">--}}
{{--                CRETAN VILLA & AKROLITHOS VOUCHER--}}
{{--            </div>--}}
{{--            <div class="logo-n-h1">--}}
{{--                <img width="60" height="60" style="display: inline-block; position: relative;" src="{{ public_path('images/0.jpg') }}">--}}
{{--                <h1 style="display: inline-block; position: relative; font-size: 26px;margin-left: 3rem;">Cretan Villa Hotel & Akrolithos Apts</h1>--}}
{{--            </div>--}}
{{--            <p style="text-align: left;margin-top: 0;">--}}
{{--                {{ $guest_name  }}--}}
{{--                <br>--}}
{{--                <br>--}}
{{--                Ευχαρισούμε για την επιβεβαίωση της κράτηση σας. Παρακαλούμε διαβάστε προσεκτικά τις--}}
{{--                πληροφορίες καi επικοινωνήσετε με το τμήμα κρατήσεων άμεσα για τυχόν αλλαγές.--}}
{{--                <br>--}}
{{--                <br>--}}
{{--                Παρακαλούμε φροντίστε να εκτυπώσετε ένα αντίγραφο του Voucher. Κατά την άφιξή σας στο--}}
{{--                ξενοδοχείο θα σας ζητηθεί να το προσκομίσετε στο προσωπικό της ρεσεψιόν μας.--}}
{{--            </p>--}}
{{--            <table>--}}
{{--                <tr>--}}
{{--                    <td> Reservation number : </td>--}}
{{--                    <th> {{ $booking->id }} </th>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td> Guest Name : </td>--}}
{{--                    <th style="font-family: 'DejaVu Sans', sans-serif">  {{ $guest_name }} </th>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td> Arrival Date : </td>--}}
{{--                    <th> {{ $check_in_date }} </th>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td> Departure Date : </td>--}}
{{--                    <th> {{ $check_out_date }} </th>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td> Number of Guests : </td>--}}
{{--                    <th> {{ $no_of_guests }} </th>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td> Number of Rooms : </td>--}}
{{--                    <th> {{ $nr_rooms }} </th>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td> Room Type : </td>--}}
{{--                    <th> {{ $room_type }} </th>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td> Rate : </td>--}}
{{--                    <th> {{ number_format($booking->final_rate,2) }} € </th>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td> Payment in advance : </td>--}}
{{--                    <th> {{ number_format($payment_in_advance,2) }} € </th>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td style="text-wrap: auto;"> Environmental Fee : {{ number_format( $gtmc->first()->cost ,2) }} € per room per night -<br> paid at the hotel in cash </td>--}}{{-- FIX LATER --}}
{{--                    <th> {{ number_format($booking->total_gov_tax ,2) }} € </th> --}}{{-- FIX LATER --}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td> Total Price : </td>--}}
{{--                    <th> {{ number_format($booking->total_cost,2) }} € </th>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td> Hotel Receipt Number : </td>--}}
{{--                    <th> {{ $receipt_number != 'null' ? $receipt_number : '-'  }} </th>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td> Booking date : </td>--}}
{{--                    <th> {{ $reservation_date }} </th>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td> Check-in time : </td>--}}
{{--                    <th> {{ $check_in_time }} </th>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td> Check-out time : </td>--}}
{{--                    <th> {{ $check_out_time }} </th>--}}
{{--                </tr>--}}
{{--            </table>--}}

{{--            <h2>Πολιτική Ακυρώσεων</h2>--}}
{{--            <p>--}}
{{--                Για ακυρώσεις τουλάχιστον 21 ημέρες πριν την άφιξη, δεν θα υπάρξει χρέωση, και γίνεται επιστροφή της προκαταβολής πίσω στην πιστωτική κάρτα.--}}
{{--               <br> Για ακυρώσεις ή αλλαγές αργότερα, θα χρεωθείτε με 50% από συνολική τιμή της κράτησης.--}}
{{--                <br>--}}
{{--                Σε περίπτωση μη εμφάνισης, θα χρεωθείτε με το συνολικό ποσό της κράτησης.--}}
{{--                <br>--}}
{{--                Σε περίπτωση ακύρωσης κατά την διάρκεια της διαμονής ο πελάτης υποχρεούται να καταβάλει στην επιχείρησ--}}
{{--                το 50% της αξίας του υπολοίπου των ημερών της συμφωνηθείσας περιόδου.--}}
{{--                <br>--}}
{{--                Το ξενοδοχείο έχει το δικαίωμα κατά τη λήψη μιας κράτησης να προ εγκρίνει μέχρι το πλήρες--}}
{{--                ποσό της κράτησης την πιστωτική σας κάρτα 14 ημέρες πριν την άφιξή σας.--}}
{{--                <br>--}}
{{--                Οι μη έγκυρες πιστωτικές κάρτες θα έχουν ως αποτέλεσμα την αυτόματη ακύρωση της κράτησης.--}}
{{--                <br><br>--}}
{{--                Άρθρο 8 του ν. 1652/30-10-1986 (ΦEK 167 A') ΕΟΤ.--}}
{{--                <br><br>--}}
{{--                <b>Ώρα άφιξης: 15:00-20:00.</b> <u>Σε περίπτωση άφιξής σας αργότερα ή νωρίτερα από τις ώρες--}}
{{--                υποδοχής (08:00 - 20:00 καθημερινά),παρακαλούμε πολύ να μας κρατάτε ενήμερους.</u>--}}

{{--                <br>--}}
{{--                <br>--}}
{{--                <b>Πολιτικές για παιδιά</b><br>--}}
{{--                Επιτρέπονται παιδιά ηλικίας 4 χρονών και άνω.<br>--}}
{{--                Δεν υπάρχει δυνατότητα προσθήκης βρεφικής κούνιας.--}}

{{--                <br>--}}
{{--                <br>--}}
{{--                <b>Περιορισμός ηλικίας </b><br>--}}
{{--                Οι επισκέπτες πρέπει να είναι τουλάχιστον 18 ετών για να κάνουν check-in.--}}
{{--                <br>--}}
{{--                <br>--}}
{{--                <b>Κατοικίδια</b><br>--}}
{{--                Παρά τη μεγάλη συμπάθειά μας σε αυτά, προς το παρόν,<br>--}}
{{--                δεν μπορούμε να τους προσφέρουμε ανάλογη με τους ανθρώπους διαμονή--}}
{{--                <br><br>--}}
{{--                Αν έχετε οποιεσδήποτε απορίες, παρακαλούμε επικοινωνήστε μαζί μας: 2842028522 ή 2842020366 (08:00 - 20:00 καθημερινά).--}}
{{--                <br>--}}
{{--                Ανυπομονούμε να χαρούμε να σας έχουμε ως καλεσμένους μας στo Cretan Villa.--}}

{{--            </p>--}}
{{--            <div class="sub-top">--}}
{{--                CRETAN VILLA & AKROLITHOS VOUCHER www.cretan-villa.com <br>Email: info@cretan-villa.com--}}

{{--            </div>--}}
{{--            <p style="margin-top: 0;">--}}
{{--                Εκ της Διευθύνσεως<br>--}}
{{--            </p>--}}
{{--        </div>--}}
{{--        @elseif($locale == 'de')--}}
{{--        <div class="">--}}
{{--            <div class="sub-top" style="margin-bottom: .5rem;">--}}
{{--                CRETAN VILLA & AKROLITHOS VOUCHER--}}
{{--            </div>--}}
{{--            <div class="logo-n-h1">--}}
{{--                <img width="60" height="60" style="display: inline-block; position: relative;" src="{{ public_path('images/0.jpg') }}">--}}
{{--                <h1 style="display: inline-block; position: relative; font-size: 26px;margin-left: 3rem;">Cretan Villa Hotel & Akrolithos Apts</h1>--}}
{{--            </div>--}}
{{--            <p style="text-align: left;margin-top: 0;">--}}
{{--                {{ $guest_name  }}--}}
{{--                <br>--}}
{{--                <br>--}}
{{--                Wir freuen uns, die Reservierung für Ihre Unterkunft zu bestätigen, und freuen uns auf--}}
{{--                Ihren--}}
{{--                Besuch. Bitte lesen Sie aufmerksam die Informationen und kontaktieren Sie bei--}}
{{--                Änderungen--}}
{{--                unverzüglich unsere Reservierungsabteilung.--}}
{{--                <br>--}}
{{--                <br>--}}
{{--                Bitte drucken Sie diesen Voucher aus. Bei der Ankunft im Hotel, werden Sie von--}}
{{--                unserem Personal--}}
{{--                an der Rezeption aufgefordert, diesen Reisevoucher vorzuzeigen. Im Falle einer--}}
{{--                Stornierung--}}
{{--                während des Aufenthaltes, werden 50% der Kosten für die restliche Zeit des Aufenthaltes berechnet.--}}
{{--            </p>--}}
{{--            <table>--}}
{{--                <tr>--}}
{{--                    <td> Reservation number : </td>--}}
{{--                    <th> {{ $booking->id }} </th>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td> Guest Name : </td>--}}
{{--                    <th>  {{ $guest_name }} </th>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td> Arrival Date : </td>--}}
{{--                    <th> {{ $check_in_date }} </th>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td> Departure Date : </td>--}}
{{--                    <th> {{ $check_out_date }} </th>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td> Number of Guests : </td>--}}
{{--                    <th> {{ $no_of_guests }} </th>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td> Number of Rooms : </td>--}}
{{--                    <th> {{ $nr_rooms }} </th>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td> Room Type : </td>--}}
{{--                    <th> {{ $room_type }} </th>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td> Rate : </td>--}}
{{--                    <th> {{ number_format($booking->final_rate,2) }} € </th>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td> Payment in advance : </td>--}}
{{--                    <th> {{ number_format($payment_in_advance,2) }} € </th>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td style="text-wrap: auto;"> Environmental Fee : {{ number_format($gtmc->first()->cost,2) }} € per room per night -<br> paid at the hotel in cash </td>--}}{{-- FIX LATER --}}
{{--                    <th> {{ number_format($booking->total_gov_tax ,2) }} € </th> --}}{{-- FIX LATER --}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td> Total Price : </td>--}}
{{--                    <th> {{ number_format($booking->total_cost,2) }} € </th>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td> Hotel Receipt Number : </td>--}}
{{--                    <th> {{ $receipt_number != 'null' ? $receipt_number : '-'  }} </th>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td> Booking date : </td>--}}
{{--                    <th> {{ $reservation_date }} </th>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td> Check-in time : </td>--}}
{{--                    <th> {{ $check_in_time }} </th>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td> Check-out time : </td>--}}
{{--                    <th> {{ $check_out_time }} </th>--}}
{{--                </tr>--}}
{{--            </table>--}}

{{--            <h2>Stornierungen</h2>--}}
{{--            <p>--}}
{{--                Stornierungen, die bis zu 21 Tage vor Anreisedatum erfolgen, sind kostenfrei.--}}
{{--                <br>Stornierungen und Änderungen,die nach diesem Datum eintreffen werden mit 50% des Gesamtpreises der Reservierung berechnet.--}}
{{--                <br>Im Falle von No-Show, wird der Gesamtpreis der Reservierung berechnet.<br>--}}
{{--                Im Falle einer Stornierung während des Aufenthaltes, sollten Kunden kompensieren ammount der 50% der Kosten für die restliche Zeit seines Aufenthaltes.<br>--}}
{{--                Das Hotel hat das Recht, nach Eingang einer Reservierung 14 Tage vor Ihrer Ankunft eine Vorautorisierung Ihrer Kreditkarte bis zur Höhe des gesamten Reservierungsbetrags vorzunehmen.<br>--}}
{{--                Ungültige Kreditkarten führen zur automatischen Stornierung der Reservierung--}}
{{--                <br><br>--}}
{{--                Paragraf 8 des Gesetzes 1652/30-10-86 (Griechisches Gesetzblatt F 167 A') (H.Q.) (GNTO) Griechische Na-tionale Tourismusorganisation.--}}
{{--                <br><br>--}}
{{--                Anreise: 15.00 - 20.00 Uhr. Falls Sie früher oder später anreisen möchten, kontaktieren Sie uns bitte (Die Rezeption ist täglich von 8.00 -20.00 Uhr besetzt.).--}}

{{--                <br>--}}
{{--                <br>--}}
{{--                <b>Richtlinien für Kinder</b><br>--}}
{{--                Kinder ab einem Alter von 4 Jahren und darüber sind willkommen.<br>--}}
{{--                In dieser Unterkunft sind keine Babybetten verfügbar.--}}
{{--                <br>--}}
{{--                There is no capacity for cots at this property.--}}
{{--                <br>--}}
{{--                <br>--}}
{{--                <b>Altersbeschränkung</b><br>--}}
{{--                Das Mindestalter für den Check-in beträgt 18 Jahre.--}}
{{--                <br>--}}
{{--                <br>--}}
{{--                <b>Haustiere</b><br>--}}
{{--                Trotz der Tatsache, dass wir Haustiere mögen, können wir zur Zeit  leider  keine geeignete Unterbringung für sie anbieten.--}}
{{--                <br><br>--}}
{{--                Bei Fragen können Sie uns gerne kontaktieren: +30 2842028522 oder + 30 6984428811 (8:00 ---}}
{{--                20:00 täglich).--}}
{{--                <br>--}}
{{--                Eine Gebühr wird nicht erhoben.--}}
{{--                <br>--}}
{{--                Bei Fragen können Sie uns gerne kontaktieren: +30 2842028522 (8:00 -20:00 täglich).--}}
{{--                <br>--}}

{{--            </p>--}}
{{--            <div class="sub-top">--}}
{{--                CRETAN VILLA & AKROLITHOS VOUCHER www.cretan-villa.com <br> <a href="mailto:info@cretan-villa.com">info@cretan-villa.com</a>--}}
{{--            </div>--}}
{{--            <p style="margin-top: 0;">--}}
{{--                Wir freuen uns, Sie als Gast im Cretan Villa begrüßen zu dürfen<br>--}}
{{--                Mit freundlichen Grüßen<br>--}}
{{--                Cretan Villa Hotel--}}
{{--            </p>--}}
{{--        </div>--}}
{{--        @elseif($locale == 'fr')--}}
{{--        <div class="">--}}
{{--            <div class="sub-top" style="margin-bottom: .5rem;">--}}
{{--                CRETAN VILLA & AKROLITHOS VOUCHER - www.cretan-villa.com - info@cretan-villa.com--}}
{{--            </div>--}}
{{--            <div class="logo-n-h1">--}}
{{--                <img width="60" height="60" style="display: inline-block; position: relative;" src="{{ public_path('images/0.jpg') }}">--}}
{{--                <h1 style="display: inline-block; position: relative; font-size: 26px;margin-left: 3rem;">Cretan Villa Hotel & Akrolithos Apts</h1>--}}
{{--            </div>--}}
{{--            <p style="text-align: left;margin-top: 0;">--}}
{{--                {{ $guest_name  }}--}}
{{--                <br>--}}
{{--                <br>--}}
{{--                Nous sommes heureux de confirmer votre réservation d'hébergement et nous nous réjouissons de votre visite. Veuillez examiner--}}
{{--                les informations avec soin et contactez immédiatement notre service de réservation en cas de changement.--}}
{{--                <br><br>--}}
{{--                Veuillez vous assurer d'imprimer une copie de ce bon. À votre arrivée à l'hôtel, il vous sera demandé--}}
{{--                de présenter votre BON D'HÉBERGEMENT à notre personnel d'accueil.--}}
{{--            </p>--}}
{{--            <table>--}}
{{--                <tr>--}}
{{--                    <td> Reservation number : </td>--}}
{{--                    <th> {{ $booking->id }} </th>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td> Guest Name : </td>--}}
{{--                    <th>  {{ $guest_name }} </th>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td> Arrival Date : </td>--}}
{{--                    <th> {{ $check_in_date }} </th>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td> Departure Date : </td>--}}
{{--                    <th> {{ $check_out_date }} </th>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td> Number of Guests : </td>--}}
{{--                    <th> {{ $no_of_guests }} </th>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td> Number of Rooms : </td>--}}
{{--                    <th> {{ $nr_rooms }} </th>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td> Room Type : </td>--}}
{{--                    <th> {{ $room_type }} </th>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td> Rate : </td>--}}
{{--                    <th> {{ number_format($booking->final_rate,2) }} € </th>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td> Payment in advance : </td>--}}
{{--                    <th> {{ number_format($payment_in_advance,2) }} € </th>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td style="text-wrap: auto;"> Environmental Fee : {{ number_format($gtmc->first()->cost ,2) }} € per room per night -<br> paid at the hotel in cash </td>--}}{{-- FIX LATER --}}
{{--                    <th> {{ number_format($booking->total_gov_tax ,2) }} € </th> --}}{{-- FIX LATER --}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td> Total Price : </td>--}}
{{--                    <th> {{ number_format($booking->total_cost,2) }} € </th>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td> Hotel Receipt Number : </td>--}}
{{--                    <th> {{ $receipt_number != 'null' ? $receipt_number : '-'  }} </th>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td> Booking date : </td>--}}
{{--                    <th> {{ $reservation_date }} </th>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td> Check-in time : </td>--}}
{{--                    <th> {{ $check_in_time }} </th>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td> Check-out time : </td>--}}
{{--                    <th> {{ $check_out_time }} </th>--}}
{{--                </tr>--}}
{{--            </table>--}}

{{--            <h2>Conditions d'annulation</h2>--}}
{{--            <p>--}}
{{--                En cas d'annulation effectuée jusqu'à 21 jours avant la date d'arrivée, aucun frais ne sera<br>--}}
{{--                demandé. En revanche, si une annulation survient après ce délai, 50% du prix total de la<br>--}}
{{--                réservation sera exigé. Il en va de même pour toute modification (diminution du nombre de<br>--}}
{{--                nuitées, départ anticipé) : 50% du prix de la réservation initiale sera exigé. En cas de "no-show"<br>--}}
{{--                (annulation non-annoncée), le prix total de la réservation est dû. En cas d'annulation au milieu de<br>--}}
{{--                votre séjour chez nous, il faut que vous nous dédommagiez avec 50% du coût de la période<br>--}}
{{--                restante de votre séjour programmé.--}}
{{--                <br><br>--}}
{{--                Article 8 of the Law 1652/30-10-86 (Govern. Gazette F 167 A')--}}
{{--                <br><br>--}}
{{--                Check in time: 15.00 - 20.00. In case of arrival later or earlier than the front desk hrs (8:00 ---}}
{{--                20:00 daily), please be so kind to let us know.--}}

{{--                <br>--}}
{{--                <br>--}}
{{--                <b>Child policies</b><br>--}}
{{--                Children ages 4 and older are allowed.<br>--}}
{{--                There is no capacity for cots at this property.--}}
{{--                <br>--}}
{{--                <br>--}}
{{--                <b>Age restriction</b><br>--}}
{{--                The minimum age for check-in is 18.--}}
{{--                <br>--}}
{{--                <br>--}}
{{--                <b>Pets</b><br>--}}
{{--                Despite the fact that we like them, for the present time we can not offer them the appropriate accommodation.--}}
{{--                <br><br>--}}
{{--                If you have any questions, please call us : +30 2842028522 or +30 6984428811 (8:00 ---}}
{{--                20:00 daily).<br>--}}
{{--                We look forward to the pleasure of having you as our guest at the Cretan Villa--}}
{{--            </p>--}}
{{--            <div class="sub-top">--}}
{{--                CRETAN VILLA & AKROLITHOS VOUCHER - www.cretan-villa.com - info@cretan-villa.com--}}

{{--            </div>--}}
{{--            <p style="margin-top: 0;">--}}
{{--                Sincerely,<br>--}}
{{--                Cretan Villa Hotel manager--}}
{{--            </p>--}}
{{--        </div>--}}
{{--        @elseif($locale == 'sv')--}}
{{--        <div class="">--}}
{{--            <div class="sub-top" style="margin-bottom: .5rem;">--}}
{{--                CRETAN VILLA & AKROLITHOS VOUCHER - www.cretan-villa.com - info@cretan-villa.com--}}
{{--            </div>--}}
{{--            <div class="logo-n-h1">--}}
{{--                <img width="60" height="60" style="display: inline-block; position: relative;" src="{{ public_path('images/0.jpg') }}">--}}
{{--                <h1 style="display: inline-block; position: relative; font-size: 26px;margin-left: 3rem;">Cretan Villa Hotel & Akrolithos Apts</h1>--}}
{{--            </div>--}}
{{--            <p style="text-align: left;margin-top: 0;">--}}
{{--                {{ $guest_name  }}--}}
{{--                <br>--}}
{{--                <br>--}}
{{--                Vi är glada att kunna bekräfta din bokning och ser fram emot ditt besök. Vänligen kontrollera<br>--}}
{{--                informationen noga och kontakta vår bokningsavdelning omedelbart vid eventuella ändringar.--}}
{{--                <br>--}}
{{--                <br>--}}
{{--                Skriver ut en kopia av denna voucher.--}}
{{--                När du anländer till hotellet måste du visa den för vår receptionspersonal.--}}
{{--            </p>--}}
{{--            <table>--}}
{{--                <tr>--}}
{{--                    <td> Reservation number : </td>--}}
{{--                    <th> {{ $booking->id }} </th>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td> Guest Name : </td>--}}
{{--                    <th>  {{ $guest_name }} </th>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td> Arrival Date : </td>--}}
{{--                    <th> {{ $check_in_date }} </th>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td> Departure Date : </td>--}}
{{--                    <th> {{ $check_out_date }} </th>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td> Number of Guests : </td>--}}
{{--                    <th> {{ $no_of_guests }} </th>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td> Number of Rooms : </td>--}}
{{--                    <th> {{ $nr_rooms }} </th>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td> Room Type : </td>--}}
{{--                    <th> {{ $room_type }} </th>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td> Rate : </td>--}}
{{--                    <th> {{ number_format($booking->final_rate,2) }} € </th>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td> Payment in advance : </td>--}}
{{--                    <th> {{ number_format($payment_in_advance,2) }} € </th>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td style="text-wrap: auto;"> Environmental Fee : {{ number_format($gtmc->first()->cost ,2) }} € per room per night -<br> paid at the hotel in cash </td>--}}{{-- FIX LATER --}}
{{--                    <th> {{ number_format($booking->total_gov_tax ,2) }} € </th> --}}{{-- FIX LATER --}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td> Total Price : </td>--}}
{{--                    <th> {{ number_format($booking->total_cost,2) }} € </th>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td> Hotel Receipt Number : </td>--}}
{{--                    <th> {{ $receipt_number != 'null' ? $receipt_number : '-'  }} </th>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td> Booking date : </td>--}}
{{--                    <th> {{ $reservation_date }} </th>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td> Check-in time : </td>--}}
{{--                    <th> {{ $check_in_time }} </th>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td> Check-out time : </td>--}}
{{--                    <th> {{ $check_out_time }} </th>--}}
{{--                </tr>--}}
{{--            </table>--}}

{{--            <h2>Cancellation Policy</h2>--}}
{{--            <p>--}}
{{--                If cancelled up to 21 days before date of arrival, no fee will be charged.--}}
{{--                <br>If cancelled or modified--}}
{{--                later, 50 % of total price of the reservation will be charged.--}}
{{--                <br> In case of no-show, the total price of--}}
{{--                the reservation will be charged.--}}
{{--                <br>In case of cancellation during the stay, a 50% compensation of--}}
{{--                the remaining days originally agreed is due and payable to the hotel by the customer.--}}
{{--                <br><br>--}}
{{--                Article 8 of the Law 1652/30-10-86 (Govern. Gazette F 167 A')--}}
{{--                <br><br>--}}
{{--                Check in time: 15.00 - 20.00. In case of arrival later or earlier than the front desk hrs (8:00 ---}}
{{--                20:00 daily), please be so kind to let us know.--}}

{{--                <br>--}}
{{--                <br>--}}
{{--                <b>Child policies</b><br>--}}
{{--                Children ages 4 and older are allowed.<br>--}}
{{--                There is no capacity for cots at this property.--}}
{{--                <br>--}}
{{--                <br>--}}
{{--                <b>Age restriction</b><br>--}}
{{--                The minimum age for check-in is 18.--}}
{{--                <br>--}}
{{--                <br>--}}
{{--                <b>Pets</b><br>--}}
{{--                Despite the fact that we like them, for the present time we can not offer them the appropriate accommodation.--}}
{{--                <br><br>--}}
{{--                If you have any questions, please call us : +30 2842028522 (or 0030 2842020366 (8:00 ---}}
{{--                20:00 daily).<br>--}}
{{--                We look forward to the pleasure of having you as our guest at the Cretan Villa--}}
{{--            </p>--}}
{{--            <div class="sub-top">--}}
{{--                CRETAN VILLA & AKROLITHOS VOUCHER - www.cretan-villa.com - info@cretan-villa.com--}}

{{--            </div>--}}
{{--            <p style="margin-top: 0;">--}}
{{--                Sincerely,<br>--}}
{{--                Cretan Villa Hotel manager--}}
{{--            </p>--}}
{{--        </div>--}}
{{--        @elseif($locale == 'ru')--}}
{{--        <div class="">--}}
{{--            <div class="sub-top" style="margin-bottom: .5rem;">--}}
{{--                CRETAN VILLA & AKROLITHOS VOUCHER - www.cretan-villa.com - info@cretan-villa.com--}}
{{--            </div>--}}
{{--            <div class="logo-n-h1">--}}
{{--                <img width="60" height="60" style="display: inline-block; position: relative;" src="{{ public_path('images/0.jpg') }}">--}}
{{--                <h1 style="display: inline-block; position: relative; font-size: 26px;margin-left: 3rem;">Cretan Villa Hotel & Akrolithos Apts</h1>--}}
{{--            </div>--}}
{{--            <p style="text-align: left;margin-top: 0;">--}}
{{--                {{ $guest_name  }}--}}
{{--                <br>--}}
{{--                <br>--}}
{{--                We are pleased to confirm your lodging reservation and look forward to your visit. Please review--}}
{{--                the information carefully and contact our reservation department immediately of any changes.--}}
{{--                <br>--}}
{{--                <br>--}}
{{--                Please ensure you print a copy of this voucher. When you arrive at the Hotel you will be required--}}
{{--                to present your ACCOMMODATION VOUCHER to our reception staff.--}}
{{--            </p>--}}
{{--            <table>--}}
{{--                <tr>--}}
{{--                    <td> Reservation number : </td>--}}
{{--                    <th> {{ $booking->id }} </th>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td> Guest Name : </td>--}}
{{--                    <th>  {{ $guest_name }} </th>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td> Arrival Date : </td>--}}
{{--                    <th> {{ $check_in_date }} </th>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td> Departure Date : </td>--}}
{{--                    <th> {{ $check_out_date }} </th>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td> Number of Guests : </td>--}}
{{--                    <th> {{ $no_of_guests }} </th>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td> Number of Rooms : </td>--}}
{{--                    <th> {{ $nr_rooms }} </th>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td> Room Type : </td>--}}
{{--                    <th> {{ $room_type }} </th>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td> Rate : </td>--}}
{{--                    <th> {{ number_format($booking->final_rate,2) }} € </th>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td> Payment in advance : </td>--}}
{{--                    <th> {{ number_format($payment_in_advance,2) }} € </th>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td style="text-wrap: auto;"> Environmental Fee : {{ number_format( $gtmc->first()->cost ,2) }} € per room per night -<br> paid at the hotel in cash </td>--}}{{-- FIX LATER --}}
{{--                    <th> {{ number_format($booking->total_gov_tax ,2) }}€ </th> --}}{{-- FIX LATER --}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td> Total Price : </td>--}}
{{--                    <th> {{ number_format($booking->total_cost,2) }} € </th>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td> Hotel Receipt Number : </td>--}}
{{--                    <th> {{ $receipt_number != 'null' ? $receipt_number : '-'  }} </th>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td> Booking date : </td>--}}
{{--                    <th> {{ $reservation_date }} </th>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td> Check-in time : </td>--}}
{{--                    <th> {{ $check_in_time }} </th>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td> Check-out time : </td>--}}
{{--                    <th> {{ $check_out_time }} </th>--}}
{{--                </tr>--}}
{{--            </table>--}}

{{--            <h2>Cancellation Policy</h2>--}}
{{--            <p>--}}
{{--                If cancelled up to 21 days before date of arrival, no fee will be charged.--}}
{{--                <br>If cancelled or modified--}}
{{--                later, 50 % of total price of the reservation will be charged.--}}
{{--                <br> In case of no-show, the total price of--}}
{{--                the reservation will be charged.--}}
{{--                <br>In case of cancellation during the stay, a 50% compensation of--}}
{{--                the remaining days originally agreed is due and payable to the hotel by the customer.--}}
{{--                <br><br>--}}
{{--                Article 8 of the Law 1652/30-10-86 (Govern. Gazette F 167 A')--}}
{{--                <br><br>--}}
{{--                Check in time: 15.00 - 20.00. In case of arrival later or earlier than the front desk hrs (8:00 ---}}
{{--                20:00 daily), please be so kind to let us know.--}}

{{--                <br>--}}
{{--                <br>--}}
{{--                <b>Child policies</b><br>--}}
{{--                Children ages 4 and older are allowed.<br>--}}
{{--                There is no capacity for cots at this property.--}}
{{--                <br>--}}
{{--                <br>--}}
{{--                <b>Age restriction</b><br>--}}
{{--                The minimum age for check-in is 18.--}}
{{--                <br>--}}
{{--                <br>--}}
{{--                <b>Pets</b><br>--}}
{{--                Despite the fact that we like them, for the present time we can not offer them the appropriate accommodation.--}}
{{--                <br><br>--}}
{{--                If you have any questions, please call us : +30 2842028522 (or + 30 6984428811 (8:00 ---}}
{{--                20:00 daily).<br>--}}
{{--                We look forward to the pleasure of having you as our guest at the Cretan Villa--}}
{{--            </p>--}}
{{--            <div class="sub-top">--}}
{{--                CRETAN VILLA & AKROLITHOS VOUCHER - www.cretan-villa.com - info@cretan-villa.com--}}

{{--            </div>--}}
{{--            <p style="margin-top: 0;">--}}
{{--                Sincerely,<br>--}}
{{--                Cretan Villa Hotel manager--}}
{{--            </p>--}}
{{--        </div>--}}


{{--        @elseif($locale == 'it')--}}

{{--        <div class="">--}}
{{--            <div class="sub-top" style="margin-bottom: .5rem;">--}}
{{--                CRETAN VILLA & AKROLITHOS VOUCHER - www.cretan-villa.com - info@cretan-villa.com--}}
{{--            </div>--}}
{{--            <div class="logo-n-h1">--}}
{{--                <img width="60" height="60" style="display: inline-block; position: relative;" src="{{ public_path('images/0.jpg') }}">--}}
{{--                <h1 style="display: inline-block; position: relative; font-size: 26px;margin-left: 3rem;">Cretan Villa Hotel & Akrolithos Apts</h1>--}}
{{--            </div>--}}
{{--            <p style="text-align: left;margin-top: 0;">--}}
{{--                {{ $guest_name  }}--}}
{{--                <br>--}}
{{--                <br>--}}
{{--                Grazie per la conferma della sua prenotazione. La preghiamo di leggere attentamente le--}}
{{--                informazioni e contattare imediatamente l΄ufficia prenotazioni per eventuali campiamenti.--}}
{{--                <br>--}}
{{--                <br>--}}
{{--                La preghiamo di stampare una copia del vaucher. Nel arrivone albergo le sarà chiesto di esibila al--}}
{{--                personale della reception.--}}
{{--            </p>--}}
{{--            <table>--}}
{{--                <tr>--}}
{{--                    <td> Reservation number : </td>--}}
{{--                    <th> {{ $booking->id }} </th>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td> Guest Name : </td>--}}
{{--                    <th>  {{ $guest_name }} </th>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td> Arrival Date : </td>--}}
{{--                    <th> {{ $check_in_date }} </th>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td> Departure Date : </td>--}}
{{--                    <th> {{ $check_out_date }} </th>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td> Number of Guests : </td>--}}
{{--                    <th> {{ $no_of_guests }} </th>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td> Number of Rooms : </td>--}}
{{--                    <th> {{ $nr_rooms }} </th>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td> Room Type : </td>--}}
{{--                    <th> {{ $room_type }} </th>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td> Rate : </td>--}}
{{--                    <th> {{ number_format($booking->final_rate,2) }} € </th>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td> Payment in advance : </td>--}}
{{--                    <th> {{ number_format($payment_in_advance,2) }} € </th>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td style="text-wrap: auto;"> Environmental Fee : {{ number_format( $gtmc->first()->cost ,2) }} € per room per night -<br> paid at the hotel in cash </td>--}}{{-- FIX LATER --}}
{{--                    <th> {{ number_format($booking->total_gov_tax ,2) }} € </th> --}}{{-- FIX LATER --}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td> Total Price : </td>--}}
{{--                    <th> {{ number_format($booking->total_cost,2) }} € </th>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td> Hotel Receipt Number : </td>--}}
{{--                    <th> {{ $receipt_number != 'null' ? $receipt_number : '-'  }} </th>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td> Booking date : </td>--}}
{{--                    <th> {{ $reservation_date }} </th>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td> Check-in time : </td>--}}
{{--                    <th> {{ $check_in_time }} </th>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td> Check-out time : </td>--}}
{{--                    <th> {{ $check_out_time }} </th>--}}
{{--                </tr>--}}
{{--            </table>--}}

{{--            <h2>Cancellazione</h2>--}}
{{--            <p>--}}
{{--                Le cancellazioni effettuate fino a 21 giorni prima della data prevista di arrivo non comportano alcun costo.--}}
{{--                Il pagamento anticipato verrà rimborsato sulla carta di credito fornita per la conferma della prenotazione al 30%.--}}
{{--                <br>--}}
{{--                In caso di cancellazione o modifica successiva (21 giorni prima del giono di arrivo) verrà addebitato il 50% del prezzo totale della prenotazione.--}}
{{--                <br>--}}
{{--                Le mancate presentazioni comportano l'addebito dell'intero importo. In caso di cancellazione durante il soggiorno il cliente deve pagare il 50% del prezzo per il resto del periodo concordato.--}}
{{--                <br>--}}
{{--                L'hotel ha il diritto, al ricevimento della prenotazione, di pre-autorizzare l'intero importo della prenotazione sulla vostra carta di credito 14 giorni prima dell'arrivo.--}}
{{--                Carte di credito non valide comporteranno la cancellazione automatica della prenotazione.--}}

{{--                <br><br>--}}
{{--                Artikel 8 i lagen 1652/30-10-86 (Govern. Gazette F 167 A ') (H.Q.) (GNTO) Greek National Tourism Organization--}}
{{--                <br><br>--}}
{{--                Ora di arrivo tra le 15:00 e le 20:00. In caso di arrivo prima o dopo l’orario di apertura della--}}
{{--                reception (tutti i giorni dalle 08:00 alle 20:00), vi preghiamo di farcelo sapere.--}}

{{--                <br>--}}
{{--                <br>--}}
{{--                <b>Condizioni per i bambini</b><br>--}}
{{--                Sono ammessi bambini di almeno 4 anni.<br>--}}
{{--                There is no capacity for cots at this property.--}}
{{--                <br>--}}
{{--                <br>--}}
{{--                <b>Age restriction</b><br>--}}
{{--                The minimum age for check-in is 18.--}}
{{--                <br>--}}
{{--                <br>--}}
{{--                <b>Animali domestici</b><br>--}}
{{--                Nonostante il nostro amore per loro, il presente periodo non e’ possibile ospitarli.--}}
{{--                <br><br>--}}
{{--                Se avete domande, chiamateci: +30 2842028522 o +30 2842020366 (8:00--}}
{{--                - 20:00 tutti i giorni).--}}
{{--                <br>--}}
{{--                Non vediamo l'ora di darti il benvenuto come ospite a Cretan Villa--}}
{{--            </p>--}}
{{--            <div class="sub-top">--}}
{{--                CRETAN VILLA & AKROLITHOS VOUCHER - www.cretan-villa.com - info@cretan-villa.com--}}

{{--            </div>--}}
{{--            <p style="margin-top: 0;">--}}
{{--                Cordialmente,<br>--}}
{{--                Direttore dell'hotel Cretan Villa--}}
{{--            </p>--}}
{{--        </div>--}}

{{--        --}}{{-- END OF ITALIAN --}}

{{--        @elseif($locale == 'nl')--}}
{{--        <div class="">--}}
{{--            <div class="sub-top" style="margin-bottom: .5rem;">--}}
{{--                CRETAN VILLA & AKROLITHOS VOUCHER - www.cretan-villa.com - info@cretan-villa.com--}}
{{--            </div>--}}
{{--            <div class="logo-n-h1">--}}
{{--                <img width="60" height="60" style="display: inline-block; position: relative;" src="{{ public_path('images/0.jpg') }}">--}}
{{--                <h1 style="display: inline-block; position: relative; font-size: 26px;margin-left: 3rem;">Cretan Villa Hotel & Akrolithos Apts</h1>--}}
{{--            </div>--}}
{{--            <p style="text-align: left;margin-top: 0;">--}}
{{--                {{ $guest_name  }}--}}
{{--                <br>--}}
{{--                <br>--}}
{{--                We are pleased to confirm your lodging reservation and look forward to your visit. Please review--}}
{{--                the information carefully and contact our reservation department immediately of any changes.--}}
{{--                <br>--}}
{{--                <br>--}}
{{--                Please ensure you print a copy of this voucher. When you arrive at the Hotel you will be required--}}
{{--                to present your ACCOMMODATION VOUCHER to our reception staff.--}}
{{--            </p>--}}
{{--            <table>--}}
{{--                <tr>--}}
{{--                    <td> Reservation number : </td>--}}
{{--                    <th> {{ $booking->id }} </th>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td> Guest Name : </td>--}}
{{--                    <th>  {{ $guest_name }} </th>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td> Arrival Date : </td>--}}
{{--                    <th> {{ $check_in_date }} </th>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td> Departure Date : </td>--}}
{{--                    <th> {{ $check_out_date }} </th>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td> Number of Guests : </td>--}}
{{--                    <th> {{ $no_of_guests }} </th>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td> Number of Rooms : </td>--}}
{{--                    <th> {{ $nr_rooms }} </th>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td> Room Type : </td>--}}
{{--                    <th> {{ $room_type }} </th>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td> Rate : </td>--}}
{{--                    <th> {{ number_format($booking->final_rate,2) }} € </th>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td> Payment in advance : </td>--}}
{{--                    <th> {{ number_format($payment_in_advance,2) }} € </th>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td style="text-wrap: auto;"> Environmental Fee : {{ number_format( $gtmc->first()->cost ,2) }} € per room per night -<br> paid at the hotel in cash </td>--}}{{-- FIX LATER --}}
{{--                    <th> {{ number_format($booking->total_gov_tax ,2) }} € </th> --}}{{-- FIX LATER --}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td> Total Price : </td>--}}
{{--                    <th> {{ number_format($booking->total_cost,2) }} € </th>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td> Hotel Receipt Number : </td>--}}
{{--                    <th> {{ $receipt_number != 'null' ? $receipt_number : '-'  }} </th>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td> Booking date : </td>--}}
{{--                    <th> {{ $reservation_date }} </th>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td> Check-in time : </td>--}}
{{--                    <th> {{ $check_in_time }} </th>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td> Check-out time : </td>--}}
{{--                    <th> {{ $check_out_time }} </th>--}}
{{--                </tr>--}}
{{--            </table>--}}

{{--            <h2>Annuleringsvoorwaarden</h2>--}}
{{--            <p>--}}
{{--                Annuleren of aanpassen van uw boeking kan kostenloos tot 21 dagen voor aankomst. Na dit<br>--}}
{{--                tijdstip zal 50% van de totale reserveringswaarde in rekening worden gebracht. In het geval van<br>--}}
{{--                no-show zal 100% van de reserveringswaarde in rekening worden gebracht.<br>--}}
{{--                <br>--}}
{{--                Article 8 of the Law 1652/30-10-86 (Govern. Gazette F 167 A')--}}
{{--                <br><br>--}}
{{--                Check in time: 15.00 - 20.00. In case of arrival later or earlier than the front desk hrs (8:00 ---}}
{{--                20:00 daily), please be so kind to let us know.--}}

{{--                <br>--}}
{{--                <br>--}}
{{--                <b>Child policies</b><br>--}}
{{--                Children ages 4 and older are allowed.<br>--}}
{{--                There is no capacity for cots at this property.--}}
{{--                <br>--}}
{{--                <br>--}}
{{--                <b>Age restriction</b><br>--}}
{{--                The minimum age for check-in is 18.--}}
{{--                <br>--}}
{{--                <br>--}}
{{--                <b>Pets</b><br>--}}
{{--                Despite the fact that we like them, for the present time we can not offer them the appropriate accommodation.--}}
{{--                <br><br>--}}
{{--                If you have any questions, please call us : +30 2842028522 (or 0030 2842020366 (8:00 ---}}
{{--                20:00 daily).<br>--}}
{{--                We look forward to the pleasure of having you as our guest at the Cretan Villa--}}
{{--            </p>--}}
{{--            <div class="sub-top">--}}
{{--                CRETAN VILLA & AKROLITHOS VOUCHER - www.cretan-villa.com - info@cretan-villa.com--}}

{{--            </div>--}}
{{--            <p style="margin-top: 0;">--}}
{{--                Sincerely,<br>--}}
{{--                Cretan Villa Hotel manager--}}
{{--            </p>--}}
{{--        </div>--}}



{{--    @else--}}
{{--        <div class="">--}}
{{--            <div class="sub-top" style="margin-bottom: .5rem;">--}}
{{--                CRETAN VILLA & AKROLITHOS VOUCHER - www.cretan-villa.com - info@cretan-villa.com--}}
{{--            </div>--}}
{{--            <div class="logo-n-h1">--}}
{{--                <img width="60" height="60" style="display: inline-block; position: relative;" src="{{ public_path('images/0.jpg') }}">--}}
{{--                <h1 style="display: inline-block; position: relative; font-size: 26px;margin-left: 3rem;">Cretan Villa Hotel & Akrolithos Apts</h1>--}}
{{--            </div>--}}
{{--            <p style="text-align: left;margin-top: 0;">--}}
{{--                {{ $guest_name  }}--}}
{{--                <br>--}}
{{--                <br>--}}
{{--                We are pleased to confirm your lodging reservation and look forward to your visit. Please review--}}
{{--                the information carefully and contact our reservation department immediately of any changes.--}}
{{--                <br>--}}
{{--                <br>--}}
{{--                Please ensure you print a copy of this voucher. When you arrive at the Hotel you will be required--}}
{{--                to present your ACCOMMODATION VOUCHER to our reception staff.--}}
{{--            </p>--}}
{{--            <table>--}}
{{--                <tr>--}}
{{--                    <td> Reservation number : </td>--}}
{{--                    <th> {{ $booking->id }} </th>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td> Guest Name : </td>--}}
{{--                    <th>  {{ $guest_name }} </th>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td> Arrival Date : </td>--}}
{{--                    <th> {{ $check_in_date }} </th>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td> Departure Date : </td>--}}
{{--                    <th> {{ $check_out_date }} </th>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td> Number of Guests : </td>--}}
{{--                    <th> {{ $no_of_guests }} </th>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td> Number of Rooms : </td>--}}
{{--                    <th> {{ $nr_rooms }} </th>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td> Room Type : </td>--}}
{{--                    <th> {{ $room_type }} </th>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td> Rate : </td>--}}
{{--                    <th> {{ number_format($booking->final_rate,2) }} € </th>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td> Payment in advance : </td>--}}
{{--                    <th> {{ number_format($payment_in_advance,2) }} € </th>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td style="text-wrap: auto;"> Environmental Fee : {{ number_format( $gtmc->first()->cost ,2) }} € per room per night -<br> paid at the hotel in cash </td>--}}{{-- FIX LATER --}}
{{--                    <th> {{ number_format($booking->total_gov_tax ,2) }} € </th> --}}{{-- FIX LATER --}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td> Total Price : </td>--}}
{{--                    <th> {{ number_format($booking->total_cost,2) }} € </th>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td> Hotel Receipt Number : </td>--}}
{{--                    <th> {{ $receipt_number != 'null' ? $receipt_number : '-'  }} </th>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td> Booking date : </td>--}}
{{--                    <th> {{ $reservation_date }} </th>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td> Check-in time : </td>--}}
{{--                    <th> {{ $check_in_time }} </th>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td> Check-out time : </td>--}}
{{--                    <th> {{ $check_out_time }} </th>--}}
{{--                </tr>--}}
{{--            </table>--}}

{{--            <h2>Cancellation Policy</h2>--}}
{{--            <p>--}}
{{--                If cancelled up to 21 days before date of arrival, no fee will be charged.--}}
{{--                <br>If cancelled or modified--}}
{{--                later, 50 % of total price of the reservation will be charged.--}}
{{--                <br> In case of no-show, the total price of--}}
{{--                the reservation will be charged.--}}
{{--                <br>In case of cancellation during the stay, a 50% compensation of--}}
{{--                the remaining days originally agreed is due and payable to the hotel by the customer.--}}
{{--                <br><br>--}}
{{--                Article 8 of the Law 1652/30-10-86 (Govern. Gazette F 167 A')--}}
{{--                <br><br>--}}
{{--                Check in time: 15.00 - 20.00. In case of arrival later or earlier than the front desk hrs (8:00 ---}}
{{--                20:00 daily), please be so kind to let us know.--}}

{{--                <br>--}}
{{--                <br>--}}
{{--                <b>Child policies</b><br>--}}
{{--                Children ages 4 and older are allowed.<br>--}}
{{--                There is no capacity for cots at this property.--}}
{{--                <br>--}}
{{--                <br>--}}
{{--                <b>Age restriction</b><br>--}}
{{--                The minimum age for check-in is 18.--}}
{{--                <br>--}}
{{--                <br>--}}
{{--                <b>Pets</b><br>--}}
{{--                Despite the fact that we like them, for the present time we can not offer them the appropriate accommodation.--}}
{{--                <br><br>--}}
{{--                If you have any questions, please call us : +30 2842028522 (or 0030 2842020366 (8:00 ---}}
{{--                20:00 daily).<br>--}}
{{--                We look forward to the pleasure of having you as our guest at the Cretan Villa--}}
{{--            </p>--}}
{{--            <div class="sub-top">--}}
{{--                CRETAN VILLA & AKROLITHOS VOUCHER - www.cretan-villa.com - info@cretan-villa.com--}}

{{--            </div>--}}
{{--            <p style="margin-top: 0;">--}}
{{--                Sincerely,<br>--}}
{{--                Cretan Villa Hotel manager--}}
{{--            </p>--}}
{{--        </div>--}}
{{--@endif--}}
</body>
</html>
