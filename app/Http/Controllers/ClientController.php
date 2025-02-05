<?php

namespace App\Http\Controllers;

use App\Mail\BookingAcceptedMail;
use App\Mail\BookingCancellation;
use App\Mail\UserCreditCardDetailsNotificationMail;
use App\Models\Booking;
use App\Models\BookingPaymentLink;
use App\Models\Carousel;
use App\Models\CarouselImage;
use App\Models\EmailTemplate;
use App\Models\GreenTax;
use App\Models\Locale;
use App\Models\MonthlyRate;
use App\Models\Page;
use App\Models\PageContent;
use App\Models\PageImage;
use App\Models\PaymentDetails;
use App\Models\roomImage;
use App\Models\RoomTranslations;
use App\Models\roomType;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use PhpParser\ErrorHandler\Collecting;
use function PHPUnit\Framework\directoryExists;

class ClientController extends Controller
{


    public function IerapetraMap(){
        $filePath = public_path('downloads/ierapetra-map.pdf');

        if (!file_exists($filePath)) {
//            dd('not');
            abort(404, 'File not found.');
        }

        return response()->stream(function () use ($filePath) {
            readfile($filePath);
        }, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="ierapetra-map.pdf"',
        ]);
    }//IerapetraMap
    public function checkReservation(Request $request)
    {
        App::setLocale($request->locale);
        $reservation_form = null;
        $appLocale = app()->getLocale();
        $translations_file = resource_path("translations/reservation_" . strtolower($appLocale) . ".json");
        $fallback_file = resource_path("translations/reservation_en.json");

//        $booking = Booking::where('id', $request->id)->first();
//        if($booking->status == 'prepayment'){
//
//        }
        if (file_exists($translations_file)) {
            $reservation_form = json_decode(File::get($translations_file), true);
//            $reservation_form = load
        } elseif (file_exists($fallback_file)) {
            $reservation_form = json_decode($fallback_file, true);
        }//if //elseif


        return view('checkReservationAuth')->with([
            'reservation_form' => $reservation_form,
            'res' => $reservation_form,
            'hasCarousel' => false,
            'hasCarouselImages' => false,
            'description' => false,
            'booking_id' => $request->booking_id ?? ''
        ]);

    }//checkReservation

    public function checkReservationAuthenticated(Request $request)
    {
        App::setLocale($request->locale);
        $reservation_form = null;
        $appLocale = app()->getLocale();
        $translations_file = resource_path("translations/reservation_" . $appLocale . ".json");
        $fallback_file = resource_path("translations/reservation_en.json");

        $validated = $request->validate([
            'email' => 'required|email',
            'booking_id' => 'required',
        ]);

        $booking = Booking::where('id', $request->booking_id)->where('email', $request->email)->first();
        if ($booking->status == 'prepayment') {

        }
        if (file_exists($translations_file)) {
            $reservation_form = json_decode(File::get($translations_file), true);
//            $reservation_form = load
        } elseif (file_exists($fallback_file)) {
            $reservation_form = json_decode($fallback_file, true);
        }//if //elseif


        return view('checkReservation')->with([
            'res' => $reservation_form,
            'hasCarousel' => false,
            'hasCarouselImages' => false,
            'description' => false,
            'booking' => $booking
        ]);

    }//checkReservation

    public function storeRoomTranslations(Request $request, $roomId)
    {
        // Loop through locales and save translations
        try {
            foreach ($request->locales as $localeId => $data) {
                RoomTranslations::updateOrCreate(
                    ['room_type_id' => $roomId, 'locale_id' => $localeId],
                    ['name' => $data['name'], 'description' => ' ']
                );
            }

        } catch (\Exception $ex) {
//            dd($ex->getMessage());
            return redirect()->back()->with('error', $ex->getMessage());
        }

        return redirect()->back()->with('success', 'Room translations saved successfully.');
    }

    public function loadRoomTranslationsList()
    {


        return view('backend.components.roomNamesTranslationsList')->with([
            'rooms' => roomType::all(),

        ]);
    }//loadRoomTranslationsList

    public function loadRoomTranslationsEdit(Request $request)
    {
        $roomId = $request->id;

//        dd(RoomTranslations::where('room_type_id', $roomId)->get());
        return view('backend.components.roomNamesTranslations')->with([
            'room' => roomType::where('id', $request->id)->first(),
            'locales' => Locale::all(),
            'translations' => RoomTranslations::where('room_type_id', $roomId)->get(),
        ]);
    }//loadRoomTranslationsEdit

    public function cancellationPolicy(Request $request)
    {
        $locale = $request->locale;
        $locale = Locale::where('code', $locale)->first();
        if (!$locale) {
            $locale = Locale::where('code', 'en')->first();
        }//if
        app()->setLocale(strtolower($locale->code));
        $page = Page::where('id', '130')->first();
        $pageContent = PageContent::where('page_id', '130')->where('locale_id', $locale->id)->first();
        return view('layouts.custom_page_layout')->with([
            'locale' => $locale,
            'pageContent' => $pageContent,
            'page' => $page,
            'hasRoomImages' => false,
            'hasCarousel' => false,
            'hasCarouselImages' => false,
        ]);
    }//CancellationPolicy

    public function checkDatediffForCancellation(Booking $booking)
    {
        // Fetch the reservation from the database
        // $booking = Booking... using a request that would be usefull.. now just going for it.

        // Check if the reservation exists
        if (!$booking) {
            return 'Reservation not found.';
        }

        // Get the current date
        $currentDate = Carbon::now();
        $res = null;
        if (File::exists(resource_path('translations/reservation_' . \app()->getLocale() . '.json'))) {
            $res = json_decode(File::get(resource_path('translations/reservation_' . \app()->getLocale() . '.json')), true);
        } else {
            $res = json_decode(File::get(resource_path('translations/reservation_en.json')), true);
        }

        // Get the reservation start date and end date
        $startDate = Carbon::parse($booking->check_in_date);
        $endDate = Carbon::parse($booking->check_out_date);

        // Calculate the difference in days between the current date and the reservation start date
        $daysBeforeStart = $currentDate->diffInDays($startDate, false);

        // Check if the current date is during the stay
        $isMidStay = $currentDate->between($startDate, $endDate);

        // Determine the appropriate message based on the difference
        if ($daysBeforeStart >= 21) {
            return $res['reservation_cancel_no_charge'];
        } elseif ($isMidStay) {
            return $res['reservation_no_cancel'];
        } else {
            return $res['reservation_cancel_50_charge'];
        }
    }
    public function checkDatediffForCancellationFORMAIL(Booking $booking)
    {
        // Fetch the reservation from the database
        // $booking = Booking... using a request that would be usefull.. now just going for it.

        // Check if the reservation exists
        if (!$booking) {
            return 'Reservation not found.';
        }

        // Get the current date
        $currentDate = Carbon::now();
        $res = null;
        if (File::exists(resource_path('translations/reservation_' . \app()->getLocale() . '.json'))) {
            $res = json_decode(File::get(resource_path('translations/reservation_' . \app()->getLocale() . '.json')), true);
        } else {
            $res = json_decode(File::get(resource_path('translations/reservation_en.json')), true);
        }

        // Get the reservation start date and end date
        $startDate = Carbon::parse($booking->check_in_date);
        $endDate = Carbon::parse($booking->check_out_date);

        // Calculate the difference in days between the current date and the reservation start date
        $daysBeforeStart = $currentDate->diffInDays($startDate, false);

        // Check if the current date is during the stay
        $isMidStay = $currentDate->between($startDate, $endDate);

        // Determine the appropriate message based on the difference
        if ($daysBeforeStart >= 21) {
            return $res['reservation_cancel_no_charge_mail'];
        } elseif ($isMidStay) {
            return $res['reservation_no_cancel_mail'];
        } else {
            return $res['reservation_cancel_50_charge_mail'];
        }
    }
    public function checkDaysForCancellation(Booking $booking)
    {
        // Fetch the reservation from the database
        // $booking = Booking... using a request that would be usefull.. now just going for it.

        // Check if the reservation exists
        if (!$booking) {
            return 'Reservation not found.';
        }

        // Get the current date
        $currentDate = Carbon::now();
        $res = null;
        if (File::exists(resource_path('translations/reservation_' . \app()->getLocale() . '.json'))) {
            $res = json_decode(File::get(resource_path('translations/reservation_' . \app()->getLocale() . '.json')), true);
        } else {
            $res = json_decode(File::get(resource_path('translations/reservation_en.json')), true);
        }

        // Get the reservation start date and end date
        $startDate = Carbon::parse($booking->check_in_date);
        $endDate = Carbon::parse($booking->check_out_date);

        // Calculate the difference in days between the current date and the reservation start date
        $daysBeforeStart = $currentDate->diffInDays($startDate, false);

        // Check if the current date is during the stay
        $isMidStay = $currentDate->between($startDate, $endDate);

        if(!$isMidStay) {
            return true;
        }else{
            return false;
        }
    }//check if the booking can be cancelled

    public function cancelBooking(Request $request){
        if(!$request->booking_id){
            return redirect()->back()->with('error', 'Booking ID was not found!');
        }
        if(!$request->booking_email){
            return redirect()->back()->with('error', 'Booking email was not found!');
        }
        if(!$request->booking_name){
            return redirect()->back()->with('error', 'Booking Name was not found!');
        }

        if(!Booking::where('id', $request->booking_id)->where('name', $request->booking_name)->where('email', $request->booking_email)->exists()){
            return redirect()->back()->with('error', 'Booking was not found!');
        }//check if booking exists
        $booking = Booking::where('id', $request->booking_id)->where('name', $request->booking_name)->where('email', $request->booking_email)->first();
        if(!$this->checkDaysForCancellation($booking)){
            return redirect()->back()->with('error', 'Booking can\'t be cancelled!');
        }//check if booking can be cancelled
            try{
            $loc = Locale::where('id', $booking->locale_id)->first();
            if(!$loc){
                $loc = Locale::where('code', 'en')->first();
            }
                $canCancel = Carbon::createFromFormat('Y-m-d', $booking->check_in_date) > Carbon::now()->toDate();
                $daysdiff =  date_diff(Carbon::createFromFormat('Y-m-d', $booking->check_in_date), Carbon::now()->toDate())->days;
           $emailTemplate = null;
           $emailBody = "Error interpreting emails. Please contact an administrator";
           if($canCancel){
                    if(intval( $daysdiff) < 21 ){
                        $emailTemplate = EmailTemplate::where('email_id', 3)->where('locale_id', $loc->id)->first();
                       $emailBody = "Ακύρωση κράτησης -> <a href=\"https://www.cretan-villa.com/admin/booking/{$booking->id}\">https://www.cretan-villa.com/admin/booking/".$booking->id. " Χρέωση 50% </a>";
                        if(!$emailTemplate) {
                            $emailTemplate = EmailTemplate::where('email_id', 3)->first();
                        }
                    }elseif(intval($daysdiff) > 20 ){
                        $emailBody = "Ακύρωση κράτησης -> <a href=\"https://www.cretan-villa.com/admin/booking/{$booking->id}\">https://www.cretan-villa.com/admin/booking/".$booking->id. " Χωρίς χρέωση! </a>";
                        $emailTemplate = EmailTemplate::where('email_id', 2)->where('locale_id', $loc->id)->first();
                        if(!$emailTemplate){
                            $emailTemplate = EmailTemplate::where('email_id', 2)->first();
                        }else{

                        }

                    }
           }

            $processedContent = $this->replaceEmailContent($emailTemplate->body, $booking, '-');

                if($booking){
                    $booking->status = 'cancelled';
                    $booking->payment_status = 'cancelled';
                    $booking->save();
                }//if

                $bookingId = 123; // Replace with the actual booking ID you want to include dynamically.



                Mail::to('info@cretan-villa.com')->send(new class($emailBody) extends \Illuminate\Mail\Mailable {
                    public $emailBody;

                    public function __construct($emailBody)
                    {
                        $this->emailBody = $emailBody;
                    }

                    public function build()
                    {
                        return $this
                            ->subject('Booking Cancelled Notification')
                            ->html($this->emailBody);
                    }
                });


                        Mail::to($request->booking_email)->send(
                            new BookingCancellation($emailTemplate->subject, $processedContent, $booking)
                        );

                return redirect('/booking/cancelled/success')->with([
                    'booking_id' => $booking->id,
                    'locale' => app()->getLocale(),
                ]);
            }catch(\Exception $e){
//            dd($e);
                return redirect()->back()->with('error', 'Error: '.$e->getMessage());
            }//try-catch


        return redirect()->back()->with('error', 'Could no validate cancellation!');
    }//cancelBooking


    public function replaceEmailContent($content, $booking, $booking_link)
    {
        $checkInMonth = Carbon::createFromFormat('Y-m-d', $booking->check_in_date)->month;
        // Fetch the GreenTax cost for that month
        $greenTax = GreenTax::where('month', $checkInMonth)->first();

        // Default environment fee if not found
        $environment_fee = $greenTax ? $greenTax->cost : 0;
        $loc = Locale::where('id', $booking->locale_id)->first();
        if(!$loc){
            $loc = Locale::where('code', 'en')->first();
        }
        // Define the placeholders and their corresponding values
        $resfile = null;
        if(File::exists(resource_path('translations/reservation_'. strtolower($loc->code) .'.json'))){
            $resfile = File::get(resource_path('translations/reservation_' . strtolower($loc->code) . '.json'));

        }else{
            $resfile = File::get(resource_path('translations/reservation_en.json'));
        }
        $resfile = json_decode($resfile, true);

        $replacements = [
            '%__name__%' => $booking->name,
            '%__surname__%' => $booking->surname,
            '%__title__%' => $booking->person_title_id == '1' ? $resfile['mr'] : $resfile['ms'],
            '%__booking_id__%' => $booking->id,
            '%__check_in_date__%' => Carbon::createFromFormat('Y-m-d', $booking->check_in_date)->format('d-m-Y'),
            '%__check_out_date__%' => Carbon::createFromFormat('Y-m-d', $booking->check_out_date)->format('d-m-Y'),
            '%__final_rate__%' => number_format($booking->final_rate, 2),
            '%__environment_fee__%' =>  number_format($booking->total_gov_tax, 2),
            '%__environment_fee_per_night__%' =>number_format($environment_fee, 2),
            '%__prepayment__%' => number_format($booking->prepayment, 2),
            '%__booking_link__%' => $booking_link,
            '%__booking_accept_date__%' => Carbon::now()->format('d-m-Y'),
            '%__cancel_date__%' => Carbon::now()->format('d-m-Y')
        ];

        // Replace the placeholders in the content
        foreach ($replacements as $placeholder => $value) {
            $content = str_replace($placeholder, $value, $content);
        }
        return $content;
    }
    public function sendCancellationEmail($selectedMail)
    {
        $validatedData = $this->validate([
            'selected_email' => 'required|email',
        ]);

        $token = $this->generateRandomString();
        $booking = Booking::find($this->booking_id);

        // Fetch the email template from the database
        $emailTemplate = EmailTemplate::where('email_id', 2)->where('locale_id', $booking->locale_id)->first(); // Adjust the email_id as needed
        if(!$emailTemplate){
            $emailTemplate = EmailTemplate::where('email_id', 2)->where('locale_id', '1')->first();
        }
        if(!$emailTemplate){
            return redirect()->back()->with('error', 'Email template was not found!');
        }
        // Replace placeholders in the email body
        $processedContent = $this->replaceEmailContent($emailTemplate->body, $booking);

        // Send the email
        try {
            Mail::to($selectedMail)->send(
                new BookingCancellation($emailTemplate->subject, $processedContent, $booking)
            );
            Mail::raw('Booking with id x', function ($message) {
                $message->to('cretan-villa@cretan-villa.com')
                    ->subject('Booking Cancellation');
            });
            $this->booking->last_sent_email = Carbon::now();
            $this->booking->save();
            Log::debug('DEBUG: --- MAIL SENT VIRTUALLY');
        } catch (\Exception $ex) {
//            dd($ex->getMessage());
            Log::error($ex->getMessage());
          return redirect()->back()->with('error', 'Error: '.$ex->getMessage());
        }

        return redirect()->back();
    }//sendCancellationEmail

    public function checkModifyCancelSubmit(Request $request)
    {
        try{
        App::setLocale($request->locale);
//        dd($request);
        $booking = Booking::find($request->booking_id);
        $canCancel = true;
        if ($booking != null && $booking->email == $request->email && $booking->status != 'cancelled') {
            $booking = Booking::find($request->booking_id);
            $message = $this->checkDatediffForCancellation($booking);
            $canCancel = Carbon::createFromFormat('Y-m-d', $booking->check_in_date) > Carbon::now()->toDate();
            $reservation_form = null;
            $appLocale = app()->getLocale();
            $translations_file = resource_path("translations/reservation_" . strtolower($appLocale) . ".json");
            $fallback_file = resource_path("translations/reservation_en.json");


            if (file_exists($translations_file)) {
                $reservation_form = json_decode(File::get($translations_file), true);
            } elseif (file_exists($fallback_file)) {
                $reservation_form = json_decode($fallback_file, true);
            } else {
                return redirect()->back()->withErrors('error', 'Please provide a valid email!');
            }

            return view('pages.check-modify-reservation')->with(
                [
                    'booking' => $booking,
                    'beMessage' => $message,
                    'canCancel' => $canCancel,
                    'res' => $reservation_form,
                ]);

            }
        }catch (\Exception $ex){
            return dd($ex);
        }

            return redirect()->back()->with('error', 'Error: Booking has already been cancelled!');
        }//request

        public function loadModifyCancelReservationAuth(Request $request)
        {
            App::setLocale($request->locale);
            $reservation_form = null;
            $appLocale = app()->getLocale();
            $translations_file = resource_path("translations/reservation_" . $appLocale . ".json");
            $fallback_file = resource_path("translations/reservation_en.json");


            if (file_exists($translations_file)) {
                $reservation_form = json_decode(File::get($translations_file), true);
//            $reservation_form = load
            } elseif (file_exists($fallback_file)) {
                $reservation_form = json_decode($fallback_file, true);
            }//if //elseif


            return view('pages.auth-check-modify-reservation')->with([
                'reservation_form' => $reservation_form,
                'hasCarousel' => false,
                'hasCarouselImages' => false,
            ]);
        }//loadModifyCancelReservationAuth

    public function loadBestPriceGuarantee()
    {
        return view('pages.BestPriceGuarantee');
    }

    public function loadHikingSoutheastCrete()
    {
        return view('pages.hikingSoutheastCrete');
    }

    public function loadCyclingSoutheastCrete()
    {
        return view('pages.cyclingSoutheastCrete');
    }

    public function loadIerapetraMapDirections()
    {
        return view('pages.ierapetra-map-directions');
    }//ierapetra-map-directions

    public function loadMapDirections()
    {
        return view('pages.crete-map-directions');
    }//map-directions

    public function loadTaxiTransfer()
    {
        return view('pages.taxi-transfer');
    }//ierapetra-map-directions

    public function loadPlacesToSee()
    {
        return view('pages.places-to-see');
    }

    public function loadBeaches()
    {
        return view('pages.beaches');
    }

    public function loadThingsToDo()
    {
        return view('pages.ThingsToDo');
    }

    public function loadChrissi()
    {
        return view('pages.chrissi');
    }

    public function loadRates()
    {
        return view('pages.rates')->with([
            'rooms' => roomType::all(),
            'MonthlyRate' => MonthlyRate::all()
        ]);
    }

    public function savePrepaymentDetails(Request $request)
    {
        $rules = [
            'name' => 'required',
            'card_number' => 'required',
            'exp_date' => 'required',
            'security_code' => 'required',
            'locale1' => 'nullable'
        ];
//         dd($request->validate($rules));
        $exp = explode('/', $request->exp_date);

        if ($request->validate($rules)) {
            try {
               PaymentDetails::updateOrCreate(
                    ['booking_id' => $request->booking_id],
                    [
                        'card_number' => $request->card_number,
                        'card_holder_name' => $request->name,
                        'card_exp_month' => $exp[0],
                        'card_exp_year' => $exp[1],
                        'card_cvv' => $request->security_code,
                        'view_times' => 0,
                        'card_type' => 'nn_unknown_str'
                    ]);

                $booking = Booking::where('id', $request->booking_id)->first();
                $booking->payment_status = 'completed';
                $booking->status = 'completed';
                $booking->save();
                Mail::to(['info@cretan-villa.com', 'sonamderm@gmail.com'])->send(
                    new UserCreditCardDetailsNotificationMail($booking)
                );
                $this->sendBookingSMS(true, $request->booking_id);
                return redirect('/booking-prepayment-sent')->with([
                    'booking' => Booking::find($request->booking_id),
                    'locale1' => $request->locale1,
                ]);


            } catch (\Exception $ex) {
//                dd($ex);
                return redirect()->back()->withErrors('Could not process the card details, please try again!');
            }
        } else {
//            dd('error');
            return redirect()->back()->withErrors('Could not process request');
        }
//            return redirect('/booking-prepayment-sent')->with([
//                'booking' => Booking::find($request->booking_id),
//            ]);
    }//savePrepaymentDetails

    public function sendBookingSMS($status, $booking_id){
        if(!$status)
        {
            return false;
        }
        if($booking_id){
            $booking = Booking::where('id', $booking_id)->first();

            try{
                $apiKey = config('services.modulus.api_key'); // Access the API key from services.php
                $url = 'http://messaging.modulus.gr/ott-api/message/'; // Replace with the actual API endpoint

                $headers = [
                    'Authorization' => 'Bearer ' . $apiKey,
                    'Content-Type' => 'application/json',
                ];

                $body = [
                    'recipients' => [
                        [
                            'msisdn' => '306973037671',
                            //                       'msisdn' => '306943994064',
                        ],
                    ],
                    'sms' => [
                        'sender' => 'CretanVilla',
                        'text' => 'Credit Card details added for reservation ' . $booking_id . ' - ' . $booking->surname . ' ' . $booking->name,
                    ],
                    'externalTags' => [
                        'booking',
                    ],
                ];

                $response = Http::withHeaders($headers)
                    ->post($url, $body);

                // Handle the response
                if ($response->successful()) {
                    return $response->json(); // Return JSON response
                } else {
                    return response()->json([
                        'error' => $response->status(),
                        'message' => $response->body(),
                    ], $response->status());
                }

            }catch(\Exception $ex){
//                session()->flash('error','Error: '.$ex->getMessage());
                Log::debug('FAILED_TO_SEND_SMS', $ex->getMessage());
            }//try-catch
        }//if
    }//sendBookingSMS

    public function loadPaymentForm(Request $request)
    {
        $reservation_form = null;
        $loc = 'en';
        $token = $request->token;
        $bl = BookingPaymentLink::where('token', $token)->first();
        $bl = Booking::where('id', $bl->booking_id)->first();
        if ($bl) {
            $loc = Locale::where('id', $bl->locale_id)->first();
        }
        if (!$loc) {
            $loc = Locale::where('code', 'en')->first();
        }
        App::setLocale(strtolower($loc->code));
        $appLocale = app()->getLocale();
        $translations_file = resource_path("translations/reservation_" . $appLocale . ".json");
        $fallback_file = resource_path("translations/reservation_en.json");


        if (file_exists($translations_file)) {
            $reservation_form = json_decode(File::get($translations_file), true);
//            $reservation_form = load
        } elseif (file_exists($fallback_file)) {
            $reservation_form = json_decode($fallback_file, true);
//            dd('asdasdasd');
        }//if //elseif
//        dd($reservation_form );


        if (!empty($request->token)) {
            $token = $request->token;
            $result = BookingPaymentLink::where('token', $token)->first();
            if (!empty($result)) {
                return view('bookingAuthToPayment')->with([
                    'reservation_form' => $reservation_form,
                    'booking_id' => $result->booking_id,
                ]);
            }//if

        } else {
            return redirect('/');
        }
    }//loadPaymentForm

    public function loadPrepaymentDetailsForm(Request $request)
    {
        $booking_id = $request->booking_id;
        $booking = Booking::where('id', $request->booking_id)->where('email', $request->email)->first();
        $loc = Locale::where('id', $booking->locale_id)->first();
        App::setLocale(strtolower($loc->code));
        $reservation_form = null;
        $appLocale = app()->getLocale();
        $translations_file = resource_path("translations/reservation_" . strtolower($appLocale) . ".json");
        $fallback_file = resource_path("translations/reservation_en.json");

        if (file_exists($translations_file)) {
            $reservation_form = json_decode(File::get($translations_file), true);
        } elseif (file_exists($fallback_file)) {
            $reservation_form = json_decode($fallback_file, true);
        }//if //elseif


        $email = $request->email;
        Session::forget('booking_id');
        Session::forget('email');
        session()->push('booking_id', $booking_id);
        session()->push('email', $email);

        if (empty($booking)) {
//            dd('not found!');
            return redirect()->back()->withErrors('Url not found!');
        }
//      $session
        return view('paymentInformationDetailsView')->with([
            'booking_id' => $booking_id,
            'email' => $email,
            'booking' => Booking::find($booking_id),
            'reservation_form' => $reservation_form,


        ]); //shows the form for the user to input their payment details
    }//loadPrepaymentDetailsForm


//    public function loadClientAuthPageView(Request $request){
//        return view('');
//    }
    public function fetchPaymentDetails(Request $request)
    {
        $booking_id = $request->booking_id;
        $email = $request->email;

        $chosen_booking = Booking::where('id', $booking_id)->where('email', $email)->get();

        if (!empty($chosen_booking)) {
//            dd('got in'. ' ' . $chosen_booking);
            session()->push('authed_id', $chosen_booking[0]->id);
            session()->push('authed_email', $chosen_booking[0]->email);
            return redirect('/booking/prepayment-details-form#card_place')->with([
                'id' => $booking_id,
                'email' => $email
            ]);
        }

    }//fetchPaymentDetails

//    public function locateAndLoadHomePage(Request $request){
//        App::setLocale($request->locale_id);
//        $locale = Locale::where('code', $request->locale_id)->first();
//        $page = Page::where('is_home', '1')->first();
////        dd($page, $locale);
//        $hasCarousel = false;
//        $hasCarouselImages = null;
//        $carouselImages = null;
//
//
//        if(empty($request->locale)){
//            $locale = Locale::where('code', 'en')->first();
//        }
//        $carousel = null;
//        $pageContent = PageContent::where('locale_id',$locale->id)->where('page_id', $page->id)->first();
//        if(Carousel::where('page_id', $pageContent->page_id)->first()){
//            $carousel = Carousel::where('page_id', $pageContent->page_id)->first();
//            $hasCarousel = true;
//        }
//
//
//        if($hasCarousel && CarouselImage::where('carousel_id', $carousel->id)->first()){
//            $hasCarouselImages = true;
//            $carouselImages = CarouselImage::where('carousel_id', $carousel->id)->get();
//        }
//
//        return view('layouts.custom_page_layout')->with([
//            'pages' => Page::all(),
//            'pageContent' => $pageContent,
//            'pageLocale' => $locale,
//            'rooms' => roomType::all(),
//            'page' => $page,
//            'hasCarousel' => $hasCarousel,
//            'hasCarouselImages' => $hasCarouselImages,
//            'carousel' => $carousel,
//            'carouselImages' => $carouselImages,
//        ])->layoutData([
//            'hasCarousel' => $hasCarousel,
//        ]);
//    }//locateAndLoadHomePAge

    public function locateAndLoadHomePage(Request $request)
    {
        App::setLocale($request->locale_id);
        $popout_content = null;
//        dd($request->locale_id);

        if(Page::where('id', '134')->first()){
            $temp = Page::where('id', '134')->first();
            $temp_loc = null;

            if(Locale::where('code', $request->locale_id)->first()){
                $temp_loc = Locale::where('code', $request->locale_id)->first();
            }else{
                $temp_loc = Locale::where('code', 'en')->first();
            }

            if(PageContent::where('page_id', $temp->id)->where('locale_id',$temp_loc->id )->first()){
                $popout_content = PageContent::where('page_id', $temp->id)->where('locale_id',$temp_loc->id )->first();
            }
            $popout_content = $popout_content->content;
        }else{
            $popout_content = 'n/a';
        }//if


        //locale_id wrong represented!!!!!!
        // Set application locale based on request or fallback to 'en'
        App::setLocale($request->locale_id);
        $localeCode = $request->locale_id ?? 'en';
        $locale = Locale::where('code', $localeCode)->first();
        if(!$locale){
        $locale = Locale::where('code', 'en')->first();
        }

        // Retrieve the homepage and its content based on locale, with a fallback to 'en'
        $page = Page::where('is_home', '1')->firstOrFail();
        $pageContent = PageContent::where('locale_id', $locale->id)->where('page_id', $page->id)->first()
            ?? PageContent::where('locale_id', Locale::where('code', 'en')->first()->id)
                ->where('page_id', $page->id)
                ->first();  // Fallback to English content
        $roomImages = PageImage::where('page_id', $pageContent->page_id)->orderBy('order')->get();
        // Retrieve carousel and images if available
        $carousel = Carousel::where('page_id', $page->id)->first();
        $hasCarousel = !empty($carousel);
        $carouselImages = $hasCarousel ? CarouselImage::where('carousel_id', $carousel->id)->get() : collect();
        $hasCarouselImages = $carouselImages->isNotEmpty();
        // Return the view with relevant data

        if(!$locale){
            return redirect('/');
        }
        if(!$page){
            return redirect('/' . $localeCode);
        }
        if(!$pageContent){
            return redirect('/' . $localeCode);
        }

        return view('layouts.custom_page_layout')->with([
            'pages'              => Page::all(),
            'pageContent'        => $pageContent,
            'pageLocale'         => $locale,
            'rooms'              => RoomType::all(),
            'page'               => $page,
            'hasCarousel'        => $hasCarousel,
            'hasCarouselImages'  => $hasCarouselImages,
            'hasRoomImages'     => !$roomImages->isEmpty(),
            'roomImages'        => $roomImages,
            'carousel'           => $carousel,
            'carouselImages'     => $carouselImages,
            'popout_content' => $popout_content,
            'locale'            => $locale,
        ])->layoutData([
            'hasCarousel' => $hasCarousel,
            'locale'            => $locale,
        ]);
    }
//    public function locateAndLoadHomePage(Request $request)
//    {
//        try {
//            App::setLocale($request->locale_id ?? 'en');
//            $localeCode = $request->locale_id ?? 'en';
//            $popout_content = 'n/a';
//
//            // Retrieve the default locale if the requested one is missing
//            $locale = Locale::where('code', $localeCode)->first() ?? Locale::where('code', 'en')->first();
//            if (!$locale) {
//                return redirect('/');
//            }
//
//            // Check if home page exists
//            $page = Page::where('is_home', '1')->first();
//            if (!$page) {
//                return redirect('/' . $localeCode);
//            }
//
//            // Get content for the homepage, fallback to English if locale content is missing
//            $pageContent = PageContent::where('locale_id', $locale->id)
//                ->where('page_id', $page->id)
//                ->first() ?? PageContent::where('locale_id', Locale::where('code', 'en')->first()->id)
//                ->where('page_id', $page->id)
//                ->first();
//
//            if (!$pageContent) {
//                return redirect('/' . $localeCode);
//            }
//
//            // Retrieve images and carousel data
//            $roomImages = PageImage::where('page_id', $pageContent->page_id)->orderBy('order')->get();
//            $carousel = Carousel::where('page_id', $page->id)->first();
//            $carouselImages = $carousel ? CarouselImage::where('carousel_id', $carousel->id)->get() : collect();
//
//            return view('layouts.custom_page_layout')->with([
//                'pages' => Page::all(),
//                'pageContent' => $pageContent,
//                'pageLocale' => $locale,
//                'rooms' => RoomType::all(),
//                'page' => $page,
//                'hasCarousel' => !empty($carousel),
//                'hasCarouselImages' => $carouselImages->isNotEmpty(),
//                'hasRoomImages' => !$roomImages->isEmpty(),
//                'roomImages' => $roomImages,
//                'carousel' => $carousel,
//                'carouselImages' => $carouselImages,
//                'popout_content' => $popout_content,
//                'locale' => $locale,
//            ])->layoutData([
//                'hasCarousel' => !empty($carousel),
//                'locale' => $locale,
//            ]);
//
//        } catch (\Exception $e) {
//            Log::error('Error loading homepage: ' . $e->getMessage());
////            return response()->view('errors.500', [], 500
//            return redirect('/');
//        }
//    }

    public function locateAndLoadPage(Request $request)
    {
        try {
            // Get page content based on URL slug and locale, with a fallback to English if needed
            $localeCode = $request->locale ?? 'en';
            Session::put('locale', $localeCode);
            App::setLocale(strtolower($localeCode));
//        dd($request->getLocale());
            $locale = Locale::where('code', $localeCode)->first();
            $pageContent = PageContent::where('url', $request->slug)
                ->where('locale_id', $locale->id)
                ->first()
                ?? PageContent::where('url', $request->slug)
                    ->where('locale_id', Locale::where('code', 'en')->first()->id)
                    ->firstOrFail();  // Fallback to English content

            $page = Page::find($pageContent->page_id);
            if (!$locale) {
                return redirect('/');
            }
            if (!$page) {
                return redirect('/' . $localeCode);
            }
            if (!$pageContent) {
                return redirect('/' . $localeCode);
            }
//        $layout = $pageContent->page_layout_type == 1 ? 'layouts.custom_page_layout' : 'layouts.custom_page_room_layout';
            $layout = 'layouts.custom_page_layout';
            if ($page->page_layout_type == 1) {
                $layout = 'layouts.custom_page_layout';
            } else if ($page->page_layout_type == 2) {
                $layout = 'layouts.custom_page_room_layout';
            } elseif ($page->page_layout_type == 3) {
                $layout = 'layouts.custom_page_gallery_layout';
            } elseif ($page->page_layout_type == 4) {
                $layout = 'layouts.contact_us_layout';
            }

            // Retrieve carousel and room images
            $carousel = Carousel::where('page_id', $pageContent->page_id)->first();
            $hasCarousel = !empty($carousel);
            $carouselImages = $hasCarousel ? CarouselImage::where('carousel_id', $carousel->id)->with('captions')->get()->sortBy('order') : collect();
            $hasCarouselImages = $carouselImages->isNotEmpty();
            $roomImages = PageImage::where('page_id', $pageContent->page_id)->orderBy('order')->get();

            $pageContent->content = $this->replacePlaceholders($pageContent->content);


            return view($layout)->with([
                'pages' => Page::all(),
                'pageContent' => $pageContent,
                'pageLocale' => $locale,
                'rooms' => RoomType::all(),
                'hasCarousel' => $hasCarousel,
                'hasRoomImages' => !$roomImages->isEmpty(),
                'roomImages' => $roomImages,
                'carousel' => $carousel,
                'carouselImages' => $carouselImages,
                'hasCarouselImages' => $hasCarouselImages,
                'page' => $page,
                'locale' => $locale
            ])->layoutData([
                'hasCarousel' => $hasCarousel,
            ]);
        } catch (\Exception $ex) {

            Log::error('Error locating page: ' . $ex->getMessage());
            return redirect('/');
        }
    }


//    public function loadHomePage(Request $request){
////        $this->translations= json_decode('../resources/translations/reservation_en.json', true, 512, JSON_THROW_ON_ERROR);
//        $homepage = Page::where('is_home', '1')->firstOrFail();
//        $hasCarousel = false;
//        $hasCarouselImages = false;
//        $carouselImage = null;
//        $carousel = null;
//        $pageContent = null;
//        if($request->locale != null){
//            $locale = Locale::where('code', app()->getLocale())->firstOrFail();
//            $pageContent = PageContent::where('page_id',$homepage->id)->where('locale_id', $locale->id )->first();
//        }else{
//            $locale = Locale::where('code', 'en')->firstOrFail();
//            $pageContent = PageContent::where('page_id',$homepage->id)->where('locale_id', $locale->id)->first();
////            dd($pageContent , '1');
//        }
//        if(Carousel::where('page_id', $pageContent->page_id)->first()){
//            $hasCarousel = true;
//            $carousel = Carousel::where('page_id', $pageContent->page_id)->first();
//
//        }
//        if($hasCarousel && CarouselImage::where('carousel_id', $carousel->id)->first()){
//            $hasCarouselImages = true;
//            $carouselImages = CarouselImage::where('carousel_id', $carousel->id)->get();
//        }
////        $carouselImages = $carouselImages->
////        dd($pageContent , '3');
////        dd($homepage, $pageContent);
//        return view ('layouts.custom_page_layout')->with(
//            [
//                'page' => $homepage,
//                'pages' => Page::all(),
//                'locales' => Locale::all(),
//                'pageContent' => $pageContent,
//                'hasCarousel' => $hasCarousel,
//                'hasCarouselImages' => $hasCarouselImages,
//                'carousel' => $carousel,
//                'carouselImages' => $carouselImages,
//            ]
//        );
//    }
    private function replacePlaceholders($content)
    {
        // Detect and replace the [[rates]] placeholder with a dynamically generated table
        if (strpos($content, '[[rates]]') !== false) {
            $ratesTable = $this->generateRatesTable();  // Method to generate the table content
            $content = str_replace('[[rates]]', $ratesTable, $content);
        }

        return $content;
    }

    private function generateRatesTable()
    {
        // Fetch room types and rates from the MonthlyRate model
        $roomTypes = roomType::all();  // Assuming there's a RoomType model related to room_type_id
        $monthlyRates = MonthlyRate::all()->groupBy('room_type_id');  // Group rates by room_type_id
        $rt = RoomTranslations::all();
        // Start building the table
        $table = '<table class="simple-table">';
        $locale = Locale::where('code', app()->getLocale())->first();
        if(!$locale){
            $locale = Locale::where('code', 'en')->first();
        }
        // Add the header row with date ranges (Assumed date ranges as you provided)
        $table .= '
        <tr>
            <th NOWRAP style="background-color: #9D968D; color:white;">Room Type</th>
            <th NOWRAP style="background-color: #9D968D; color:white;">1/1 - 31/1</th>
            <th NOWRAP style="background-color: #9D968D; color:white;">1/2 - 29/2</th>
            <th NOWRAP style="background-color: #9D968D; color:white;">1/3 - 31/3</th>
            <th NOWRAP style="background-color: #9D968D; color:white;">1/4 - 30/4</th>
            <th NOWRAP style="background-color: #9D968D; color:white;">1/5 - 31/5</th>
            <th NOWRAP style="background-color: #9D968D; color:white;">1/6 - 30/6</th>
            <th NOWRAP style="background-color: #9D968D; color:white;">1/7 - 31/7</th>
            <th NOWRAP style="background-color: #9D968D; color:white;">1/8 - 31/8</th>
            <th NOWRAP style="background-color: #9D968D; color:white;">1/9 - 30/9</th>
            <th NOWRAP style="background-color: #9D968D; color:white;">1/10 - 31/10</th>
            <th NOWRAP style="background-color: #9D968D; color:white;">1/11 - 30/11</th>
            <th NOWRAP style="background-color: #9D968D; color:white;">1/12 - 31/12</th>
        </tr>';

        // Loop through each room type and add rows with rates for each month
        foreach ($roomTypes as $roomType) {
            $table .= '<tr>';
            $table .= '<td NOWRAP>' . $rt->where('room_type_id', $roomType->id)->where('locale_id', $locale->id)->first()->name . '</td>';  // Display the room type

            // Get rates for the current room type (assuming rates are stored for each month)
            $rates = isset($monthlyRates[$roomType->id]) ? $monthlyRates[$roomType->id] : [];

            // Create a map of rates by month number (1-12)
            $rateMap = [];
            foreach ($rates as $rate) {
                $rateMap[$rate->number] = $rate->rate;
            }

            // Loop through the months (1-12) and add the rates in the correct order
            for ($month = 1; $month <= 12; $month++) {
                $table .= '<td NOWRAP>' . (isset($rateMap[$month]) ? '€' . number_format($rateMap[$month], 2) : '-') . '</td>';
            }

            $table .= '</tr>';
        }

        $table .= '</table>';

        return $table;
    }


    public function loadHomePage(Request $request)
    {
        $popout_content = null;
        if(Page::where('id', '134')->first()){
            $temp = Page::where('id', '134')->first();
            $temp_loc = null;
            if(Locale::where('code', \app()->getLocale())->first()){
                $temp_loc = Locale::where('code', \app()->getLocale())->first();
            }else{
                $temp_loc = Locale::where('code', 'en')->first();
            }

            if(PageContent::where('page_id', $temp->id)->where('locale_id',$temp_loc->id )->first()){
                $popout_content = PageContent::where('page_id', $temp->id)->where('locale_id',$temp_loc->id )->first();
            }


            $popout_content = $popout_content->content;
        }else{
            $popout_content = 'n/a';
        }

        // Get the homepage and set the default locale
        $homepage = Page::where('is_home', '1')->firstOrFail();
        $localeCode = $request->locale ?? 'en';
        $locale = Locale::where('code', $localeCode)->firstOrFail();

        // Fetch the page content for the homepage based on locale, with a fallback to English
        $pageContent = PageContent::where('page_id', $homepage->id)
            ->where('locale_id', $locale->id)
            ->first()
            ?? PageContent::where('page_id', $homepage->id)
                ->where('locale_id', Locale::where('code', 'en')->first()->id)
                ->firstOrFail();  // Fallback to English content

        // Get the carousel if available
        $carousel = Carousel::where('page_id', $homepage->id)->first();
        $hasCarousel = !empty($carousel);
        $carouselImages = $hasCarousel ? CarouselImage::where('carousel_id', $carousel->id)->get() : collect();
        $hasCarouselImages = $carouselImages->isNotEmpty();
//        return('test');
        $roomImages = PageImage::where('page_id', $pageContent->page_id)->orderBy('order')->get();
        // Render the view with relevant data
        return view('layouts.custom_page_layout')->with([
            'page'              => $homepage,
            'pages'             => Page::all(),
            'locales'           => Locale::all(),
            'pageContent'       => $pageContent,
            'hasCarousel'       => $hasCarousel,
            'hasCarouselImages' => $hasCarouselImages,
            'hasRoomImages'     => !$roomImages->isEmpty(),
            'roomImages'        => $roomImages,
            'carousel'          => $carousel,
            'popout_content' => $popout_content,
            'carouselImages'    => $carouselImages,
            'locale'            => $locale
        ]);
    }

    //***************************************************
    //*                                                  *
    //*              CAROUSEL STUFF BELOW                *
    //*                                                  *
    //****************************************************


    public function storeCarousel(Request $request)
    {
        $carousel = Carousel::create([
            'page_id' => $request->page_id,
            'is_enabled' => true,
            'type' => $request->type,
        ]);

        // Store carousel images
        foreach ($request->file('images') as $index => $image) {
            $path = $image->store('carousel_images', 'public');

            $carouselImage = $carousel->images()->create([
                'image_path' => $path,
                'order' => $index + 1,
            ]);

            // Store captions for each locale
            foreach ($request->captions as $localeId => $caption) {
                $carouselImage->captions()->create([
                    'locale_id' => $localeId,
                    'caption' => $caption,
                ]);
            }
        }

        return redirect()->back()->with('success', 'Carousel created successfully.');
    }


    public function show($pageId)
    {
        // Fetch the carousel for a given page
        $carousel = Carousel::with(['images.captions.locale'])
            ->where('page_id', $pageId)
            ->where('is_enabled', true)
            ->first();

        return view('carousel', compact('carousel'));
    }


    // ****************************************************
    // *                                                  *
    // *             DEBUGGING STUFF BELOW                *
    // *                                                  *
    // ****************************************************



    public function loadRoomPage(){

        return view('layouts.rooms')->with([
            'rooms' => roomType::all(),
            'pages' => Page::all(),
            'locales' => Locale::all(),]
        );
    }
    public function loadTripleRoom(){
        return view('layouts.triple_room')->with([
                'rooms' => roomType::all(),
                'pages' => Page::all(),
                'locales' => Locale::all(),]
        );
    }
    public function loadSingleRoom(){
        return view('hardCodedPages.single_room')->with([
                'rooms' => roomType::all(),
                'pages' => Page::all(),
                'locales' => Locale::all(),]
        );
    }
    public function loadApartment(){
        return view('layouts.apartments')->with([
                'rooms' => roomType::all(),
                'pages' => Page::all(),
                'locales' => Locale::all(),]
        );
    }
}
