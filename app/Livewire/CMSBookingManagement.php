<?php

namespace App\Livewire;

use App\Mail\BookingAcceptedMail;
use App\Models\Booking;
use App\Models\BookingPaymentLink;
use App\Models\Country;
use App\Models\EmailTemplate;
use App\Models\GreenTax;
use App\Models\Locale;
use App\Models\Page;
use App\Models\PageContent;
use App\Models\PaymentDetails;
use App\Models\PersonTitle;
use App\Models\roomType;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use mysql_xdevapi\Exception;
use function Webmozart\Assert\Tests\StaticAnalysis\resource;

class CMSBookingManagement extends Component
{
    public $booking_id = '';
    public $booking = '';
    public $selected_email = '';
    public $password;
    public $card;
    public $showPasswordPrompt;
    public $receiptNumber = '';




    public function mount($booking_id){
        $this->booking_id = $booking_id;
        $this->booking = Booking::find($booking_id);
        $check_in_date = \Carbon\Carbon::createFromFormat('Y-m-d',$this->booking->check_in_date);
        $check_out_date = \Carbon\Carbon::createFromFormat('Y-m-d',$this->booking->check_out_date);
        $check_in_date = $check_in_date->format('d-m-Y');
        $check_out_date = $check_out_date->format('d-m-Y');
        $reservation_date = \Nette\Utils\DateTime::createFromFormat('Y-m-d H:i:s', $this->booking->reservation_date)->format('d-m-Y H:i:s');
        $rt =  roomType::find($this->booking->room_type_id);

        if($this->booking->total_gov_tax == 0 || $this->booking->total_gov_tax == null){
            $this->booking->total_gov_tax = date_diff(Carbon::createFromFormat('Y-m-d',$this->booking->check_in_date), Carbon::createFromFormat('Y-m-d',$this->booking->check_out_date))->days * 1.5;
            try{
                $this->booking->save();
            }catch(\Exception $ex){
                session()->flash($ex->getMessage());
            }
        }

        //Not at 100% -> should be checking for every month included in the booking_check_in - check_out interval and calculate the gov tax accordingly but it's only for a last chance to save a booking. so does not matter.

        if($this->booking->total_cost == 0 || $this->booking->total_cost == null){
            $this->booking->total_cost = $this->booking->final_rate + $this->booking->total_gov_tax;
            try{
                $this->booking->save();
            }catch(\Exception $ex){
                session()->flash($ex->getMessage());
            }
        }
        $this->reservation_number_mf = $this->booking->id;
        $this->booking_date_mf =  $reservation_date;
        $this->payment_in_advance_mf = number_format($this->booking->prepayment,2);
        $this->total_cost_mf = number_format($this->booking->final_rate,2);
        $this->nr_rooms_mf = $this->booking->nr_rooms;
        $this->no_of_guests_mf = 0;
        $this->departure_date_mf = $check_out_date;
        $this->arrival_date_mf = $check_in_date;
        $this->room_type_mf = $rt->name;
        $locale = 'en';
        $booking = Booking::find($this->booking_id);
        if($booking->locale_id){
            $locale = Locale::where('id', $booking->locale_id)->first();
            $locale = $locale->code;
        }
        $res = null;
        if(File::exists(resource_path('translations/reservation_'. strtolower($locale) .'.json'))){
            $res = File::get(resource_path('translations/reservation_'. strtolower($locale) .'.json'));
        }else{
            $res = File::get(resource_path('translations/reservation_en.json'));
        }//if else
            $res = json_decode($res,true);
        $title = $this->booking->person_title_id == '1' ? $res['mr'] ?? 'Mr' : $res['ms'] ?? 'Ms';
        $this->guest_name_mf = $title . ' ' . $this->booking->name . ' ' . $this->booking->surname;

    }
    //mount
    public function deleteCVV(){
        try{
            $this->card->cvv = '';
            $this->card->save();
        }catch(\Exception $ex){
            Session::flash('error', $ex->getMessage());
        }
    }//deleteCVV

    public function deleteExpDate(){
        try{
            $this->card->card_exp_month = '';
            $this->card->card_exp_year = '';
            $this->card->save();
        }catch(\Exception $ex){
            Session::flash('error', $ex->getMessage());
        }
    }

    public $guest_name_mf;
    public $arrival_date_mf;
    public $departure_date_mf;
    public $no_of_guests_mf;
    public $nr_rooms_mf;
    public $room_type_mf;
    public $total_cost_mf;
    public $payment_in_advance_mf;
    public $reservation_number_mf;
    public $hotel_receipt_number_mf = '';
    public $booking_date_mf;
    public $check_in_time_mf = '15:00 - 19:00';
    public $check_out_time_mf = '8:00 - 12:00';


//    public function createVoucher(){
//        $booking = Booking::find($this->booking_id);
//        $room_type = \App\Models\roomType::find($booking->room_type_id);
//        $check_in_date = \Carbon\Carbon::createFromFormat('Y-m-d',$booking->check_in_date);
//        $check_out_date = \Carbon\Carbon::createFromFormat('Y-m-d',$booking->check_out_date);
//        $green_tax_month_costs = GreenTax::all()->keyBy('month')->toArray();
//        $title = $booking->person_title_id == '1' ? 'Mr' : 'Ms';
//        $month = explode('-', $booking->check_in_date);
//        $reservation_date = \Nette\Utils\DateTime::createFromFormat('Y-m-d H:i:s', $booking->reservation_date)->format('d-m-Y H:i:s');
//        $totalGovTax = $green_tax_month_costs[intval($month[1])]['cost'] * intval(date_diff($check_in_date,$check_out_date)->days);
//        $check_in_date = $check_in_date->format('d-m-Y');
//        $check_out_date = $check_out_date->format('d-m-Y');
//        $locale = 'en';
//        if($booking->locale_id){
//           $locale = Locale::where('id', $booking->locale_id)->first();
//           $locale = $locale->code;
//        }
//
////        $check_out_date = '';
////        $room_type = '';
//        $data = [
//            'booking' => $booking,
//            'receipt_number' => $this->hotel_receipt_number_mf,
//            'check_in_date' => $this->arrival_date_mf,
//            'check_out_date' => $this->departure_date_mf,
//            'room_type' => $this->room_type_mf,
//            'totalGovTax' => $totalGovTax,
//            'reservation_date' => $this->booking_date_mf,
//            'check_in_time' => $this->check_in_time_mf,
//            'check_out_time' => $this->check_out_time_mf,
//            'payment_in_advance' => $this->payment_in_advance_mf,
//            'total_cost' => doubleval($this->total_cost_mf),
//            'reservation_number' => $this->reservation_number_mf,
//            'guest_name' => $this->guest_name_mf,
//            'no_of_guests' => $this->no_of_guests_mf,
//            'nr_rooms' => $this->nr_rooms_mf,
//            'locale' => strtolower($locale)
//
//        ];
//
//
////        $data = mb_convert_encoding($data, 'UTF-8', 'auto');
//        try{
////            foreach ($data as &$value) {
////                if (is_string($value)) {
////                    $value = mb_convert_encoding($value, 'UTF-8', 'auto');
////                }
////            }
//
//
//
//            $pdf = Pdf::loadView('pdf.Voucher', $data);
////
//
////        return $pdf->download( $title.'_'.strval($booking->surname). '_'.strval($booking->name).'_voucher.pdf');
//            return response()->streamDownload(function () use($pdf){
//               echo $pdf->stream();
//
//            }, $title.'_'.strval($booking->surname). '_'.strval($booking->name).'_voucher.pdf');
//        }catch(Exception $e){
//            dd($e->getMessage());
//        }
//    }
//

    public function createVoucher(){
        $booking = Booking::find($this->booking_id);
        $room_type = \App\Models\roomType::find($booking->room_type_id);
        $check_in_date = \Carbon\Carbon::createFromFormat('Y-m-d', $booking->check_in_date);
        $check_out_date = \Carbon\Carbon::createFromFormat('Y-m-d', $booking->check_out_date);

        // Fetch GreenTax and sort by rate to get the highest rate per month
        $green_tax_month_costs = GreenTax::all()->sortByDesc('cost');

        $title = $booking->person_title_id == '1' ? 'Mr' : 'Ms';
        $month = explode('-', $booking->check_in_date);
        $reservation_date = \Nette\Utils\DateTime::createFromFormat('Y-m-d H:i:s', $booking->reservation_date)->format('d-m-Y H:i:s');

        // Get the green tax cost for the check-in month
        $totalGovTax = $green_tax_month_costs[intval($month[1])]['cost'] * intval(date_diff($check_in_date, $check_out_date)->days);

        $check_in_date = $check_in_date->format('d-m-Y');
        $check_out_date = $check_out_date->format('d-m-Y');
        $locale = 'en';
        $loc = null;
        if($booking->locale_id){
            $locale = Locale::where('id', $booking->locale_id)->first();
            $loc = $locale;
            $locale = $locale->code;
        }
        $welcome = Page::where('id', '133')->first();
        $welcome = PageContent::where('page_id', $welcome->id)->where('locale_id', $loc->id)->first();

        $policy = Page::where('id', '135')->first();
        $policy = PageContent::where('page_id', $policy->id)->where('locale_id', $loc->id)->first();
//            dd($green_tax_month_costs->first()->cost, $green_tax_month_costs);
        $data = [
            'booking' => $booking,
            'receipt_number' => $this->hotel_receipt_number_mf,
            'check_in_date' => $this->arrival_date_mf,
            'check_out_date' => $this->departure_date_mf,
            'room_type' => $this->room_type_mf,
            'totalGovTax' => $totalGovTax,
            'reservation_date' => $this->booking_date_mf,
            'check_in_time' => $this->check_in_time_mf,
            'check_out_time' => $this->check_out_time_mf,
            'payment_in_advance' => $this->payment_in_advance_mf,
            'total_cost' => doubleval($this->total_cost_mf),
            'reservation_number' => $this->reservation_number_mf,
            'guest_name' => $this->guest_name_mf,
            'no_of_guests' => $this->no_of_guests_mf,
            'nr_rooms' => $this->nr_rooms_mf,
            'locale' => strtolower($locale),
            'gtmc' => $green_tax_month_costs,
            'welcome' => $welcome,
            'policy' => $policy
        ];

        try {
            $pdf = Pdf::loadView('pdf.Voucher', $data);

            return response()->streamDownload(function () use ($pdf) {
                echo $pdf->stream();
            }, $title.'_'.strval($booking->surname).'_'.strval($booking->name).'_voucher.pdf');
        } catch(Exception $e) {
            dd($e->getMessage());
        }
    }//createVoucher



    public function nightCalc(){
        $start = $this->booking->check_in_date;
        $end = $this->booking->check_out_date;
        $diff = strtotime($start) - strtotime($end);

        return intval(abs($diff/86400));
    }//nightCalc

//    public function acceptCurrentBooking(){
//        $this->booking->status = 'prepayment';
//        try{
//        $this->booking->save();
//
//            $token = $this->generateRandomString();
//            BookingPaymentLink::create([
//                'token' => $token,
//                'booking_id' => $this->booking_id,
//                'expires_on' => Carbon::now()->addDay()
//            ]);
////        dd(Carbon::now()->subDays(2));
//            $booking_link = 'https://cretan-villa-ierapetra.com/booking/pre-payment/' . $token;
//        Mail::to($this->booking->email)->send(new BookingAcceptedMail(Booking::find($this->booking_id),$booking_link));
//            $this->booking->last_sent_email = Carbon::now();
//            $this->booking->save();
//
//            session()->flash('success', 'Αποδεχτήκατε τη κράτηση!');
//        }catch(\Exception $ex){
//            session()->flash('error', $ex);
//        }
//    }//acceptCurrentBooking

    public function acceptCurrentBooking(){
        // Ensure the booking exists and has an email

        if (!$this->booking || !$this->booking->email) {
            session()->flash('error', 'Booking or email not found.');
            return;
        }

        try {
            // Update the booking status to 'prepayment'
            $this->booking->status = 'prepayment';
            $this->booking->save();

            // Generate a random token for the payment link
            $token = $this->generateRandomString();

            // Create a booking payment link
            BookingPaymentLink::create([
                'token' => $token,
                'booking_id' => strval($this->booking_id),
                'expires_on' => Carbon::now()->addDay(),
                'expired' => false,
            ]);

            // Generate the booking link URL
            $booking_link = 'https://cretan-villa.com/booking/pre-payment/' . $token;

            // Fetch the email template from the database (you can adjust the email_id if necessary)
            $emailTemplate = EmailTemplate::where('email_id', 1)->where('locale_id', $this->booking->locale_id)->first(); // Adjust the email_id as needed
            if(!$emailTemplate){
                $emailTemplate = EmailTemplate::where('email_id', 1)->where('locale_id', '1')->first();
                dd('email sent with default loc');
            }
            if (!$emailTemplate) {
                session()->flash('error', 'Email template not found.');
                return;
            }

            // Replace placeholders in the email template with booking data and the booking link
            $processedContent = $this->replacePlaceholders($emailTemplate->body, $this->booking, $booking_link);

            // Send the email to the booking's email
            Mail::to($this->booking->email)->send(
                new BookingAcceptedMail($emailTemplate->subject, $processedContent, $this->booking)
            );

            // Update the last_sent_email field
            $this->booking->last_sent_email = Carbon::now();
            $this->booking->save();

            // Flash a success message
//            dd('egine apodoxi');
            session()->flash('success', 'Αποδεχτήκατε τη κράτηση και αποστείλατε το email!');
        } catch (\Exception $ex) {
//            dd($ex->getMessage(), $this->booking);
            // Handle any exception that occurs and flash an error message
            session()->flash('error', 'Error while accepting the booking: ' . $ex->getMessage());
        }

    }//acceptCurrentBooking



    public function cancelCurrentBooking(){
        $this->booking->status = 'cancelled';
        try{
            $this->booking->save();

            session()->flash('success', 'Ακυρώσατε τη κράτηση!');
        }catch(\Exception $ex){
            session()->flash('error', $ex);
        }
    }//cancelCurrentBooking || Means

    function generateRandomString($length = 20)
    {
        $uppercaseLetters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $lowercaseLetters = 'abcdefghijklmnopqrstuvwxyz';
        $digits = '0123456789';

        $allChars = $uppercaseLetters . $lowercaseLetters . $digits;
        $randomChars = [];

        for ($i = 0; $i < $length; $i++) {
            $randomChars[] = $allChars[random_int(0, strlen($allChars) - 1)];
        }

        shuffle($randomChars); // Additional shuffling for better randomness
        return implode('', $randomChars);
    }

    public function replacePlaceholders($content, $booking, $booking_link)
    {
        $checkInMonth = Carbon::createFromFormat('Y-m-d', $booking->check_in_date)->month;

        // Fetch the GreenTax cost for that month
        $greenTax = GreenTax::where('month', $checkInMonth)->first();

        // Default environment fee if not found
        $environment_fee = $greenTax ? $greenTax->cost : 0;
        $loc = Locale::where('id', $booking->locale_id)->first();
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
        ];

        // Replace the placeholders in the content
        foreach ($replacements as $placeholder => $value) {
            $content = str_replace($placeholder, $value, $content);
        }
        return $content;
    }

    public function sendEmail()
    {
        $validatedData = $this->validate([
            'selected_email' => 'required|email',
        ]);

        $token = $this->generateRandomString();
        $booking = Booking::find($this->booking_id);

        // Generate the booking link
        BookingPaymentLink::create([
            'token' => $token,
            'booking_id' => strval($this->booking_id),
            'expires_on' => Carbon::now()->addDay(),
            'expired' => false,
        ]);
        $booking_link = 'https://cretan-villa.com/booking/pre-payment/' . $token;

        // Fetch the email template from the database
        $emailTemplate = EmailTemplate::where('email_id', 1)->where('locale_id', $booking->locale_id)->first(); // Adjust the email_id as needed
if(!$emailTemplate){
    $emailTemplate = EmailTemplate::where('email_id', 1)->where('locale_id', '1')->first();
}
        // Replace placeholders in the email body
        $processedContent = $this->replacePlaceholders($emailTemplate->body, $booking, $booking_link);

//        dd($processedContent);
        // Send the email
        try {
            Mail::to($validatedData['selected_email'])->send(
                new BookingAcceptedMail($emailTemplate->subject, $processedContent, $booking)
            );
            $this->booking->last_sent_email = Carbon::now();
            $this->booking->save();
        } catch (\Exception $ex) {
            dd($ex->getMessage());
            session()->flash('error', $ex->getMessage());
        }

        session()->flash('success', 'Email sent successfully!');
    }


    public function canCancel(){
        if(strtotime($this->booking->check_out_date) <= strtotime(date('Y-m-d'))){
            return ' Today > Checkin date';
        }
    }//IF USER WANTS TO
    public function showCardDetails(){
        if($this->password === '112233'){
//            dd('true');
            $this->card = PaymentDetails::where('booking_id', $this->booking_id)->first();
//        dd($this->card);
        }else{
//            dd($this->password);
        }
    }

    public function createAndSendPDF(){
        //sdghkr

    }

    public function render()
    {

        return view('livewire.c-m-s-booking-management')->with([
            'total_nights' => $this->nightCalc(),
            'has_payment_details' => PaymentDetails::where('booking_id', $this->booking_id)->first(),
            'room_type' => roomType::where('id', $this->booking->room_type_id)->get()[0]->name,
            'last_night' => date('Y-m-d',strtotime($this->booking->check_out_date) - (24*60*60)),
            'selected_locale' => Locale::where('id', $this->booking->locale_id)->first(),
            'country' => Country::where('id', $this->booking->country)->first(),

        ]);
    }//render
}
