<?php

namespace App\Livewire;

use App\Mail\NewBookingNotification;
use App\Models\Booking;
use App\Models\BusinessInfo;
use App\Models\CardWidget;
use App\Models\Country;
use App\Models\Fee;
use App\Models\GreenTax;
use App\Models\Locale;
use App\Models\MonthlyRate;
use App\Models\Page;
use App\Models\PageContent;
use App\Models\RoomTranslations;
use App\Models\roomType;
use App\Models\titleTranslations;
use App\Models\VAT;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\On;
use Livewire\Component;
use Mockery\Exception;
use function Laravel\Prompts\error;

class ReservationFormNew extends Component
{
    public $currentStep = 1;
    public $totalSteps = 3;

    protected $rules = [
        'name' => 'required|min:1',
        'surname' => 'required|min:1',
        'email' => 'required|email',
        'email_confirmation'=> 'required|same:email',
        'telephone' => 'required|min:0|max:15',
        'check_in_date' => 'required|date',
        'check_out_date' => 'required|date',
        'title' => 'required|not_in:0',
        'room_type' => 'required|not_in:0',
        'nr_rooms' => 'required|not_in:0',
        'address' => 'required|min:2',
        'city' => 'required|min:2',
        'country' => 'required|not_in:0',
        'postal_code' => 'required|min:2',
        'estimated_arrival_time' => 'required',
        'special_request' => 'nullable',
        'accept_tos' => 'nullable'
    ];

    public $check_in_date = '';

    public $check_out_date = '';

    public $room_type= 0;

    public $nr_rooms = '';
    public $title;
    public $name;
    public $surname;
    public $telephone;
    public $email;
    public $email_confirmation;
    public $address;
    public $city;
    public $country;
    public $postal_code;
    public $estimated_arrival_time;
    public $special_request;

    public $translations;

    public $green_tax;
    public $vat;
    public $city_tax;
    public $rate;
    public $rate_without_exlusions;
    public $final_rate;
    public $prepayment;
    public $rate_no_vat;
    public $calculated_vat;
    public $fees;
    public $booking_id;
    public $countries ;
    public $countryCode;
    public $selectedTime;

    public $total_cost;
    public $total_gov_tax;
    public $captcha;

    public $newBooking;
    public $accept_tos;
    public $receiptNumber = '-';

    public $room_type_front;
    public $session_locale;
    public $tnights;

//    public $g-recaptcha-response;

//    function generateUniqueBookingId()
//    {
//        $prefix = 'CV-1000-';
//        $randomPartLength = 5;
//        $uniqueId = '';
//        do {
//            $randomPart = Str::random($randomPartLength, '1234567890');
//            $uniqueId = $prefix . $randomPart;
//        } while (Booking::where('id', $uniqueId)->exists());
//
//        return $uniqueId;
//    }



    public function createBooking()
    {

        $this->estimated_arrival_time = $this->selectedTime;
        $this->postal_code = 00000;
        $cind = new \DateTime($this->check_in_date);
        $coutd = new \DateTime($this->check_out_date);
        $this->check_in_date = Carbon::createFromFormat('d-m-Y', $this->check_in_date);
        $this->check_out_date = Carbon::createFromFormat('d-m-Y', $this->check_out_date);
        $this->check_in_date = $this->check_in_date->format('Y-m-d');
        $this->check_out_date = $this->check_out_date->format('Y-m-d');
//        dd('other error');
        if (date_diff($cind, $coutd)->days > 30) {
//           dd('over30');
            return redirect()->back()->withErrors('error', "{$this->translations->max_30_days_error}");
        }
        do{
            //Code looks like R-1000XXXXX-XXXXX
            $this->booking_id = "R-1000";
            $characters = '0123456789';
            for($i = 0; $i < 5; $i++){
                $this->booking_id .= $characters[rand(0,strlen($characters) -1)];
            }
            $this->booking_id .= '-';
            for($i = 0; $i < 5; $i++){
                $this->booking_id .= $characters[rand(0,strlen($characters) -1)];
            }
//            dd($this->booking_id);
        }while(Booking::where('id', $this->booking_id)->exists());
//        $this->country= 2;
        $this->status = 'pending';

        //        dd('gotin');
        //        $this

//        dd($this->total_cost);
        try {
//            dd($this->green_tax, $this->calculateDays());
           $this->newBooking = Booking::create([
                'id' => $this->booking_id,
                'check_in_date' => $this->check_in_date,
                'check_out_date' => $this->check_out_date,
                'name' => $this->name,
                'surname' => $this->surname,
                'email' => $this->email,
                'telephone' => $this->telephone,
                'person_title_id' => $this->title,
                'nr_rooms' => $this->nr_rooms,
                'room_type_id' => $this->room_type,
                'locale_id' => $this->session_locale->id,
                'address' => $this->address,
                'city' => $this->city,
                'country' => $this->country,
//                'postal_code' => $this->postal_code,
                'estimated_arrival_time' => $this->estimated_arrival_time,
                'special_request' => $this->special_request,
                'prepayment' => doubleval($this->prepayment),
                'final_rate' => doubleval($this->final_rate),
                'status' => $this->status,
                'countryCode' => $this->countryCode,
                'payment_status' => 'pending',
               'total_cost' => $this->total_cost,
               'total_gov_tax' => $this->total_gov_tax,
            ]);


        }catch (\Exception $ex){

//            dd($ex->getMessage(), $this->total_gov_tax);
//            dd($ex);
            return redirect()->back()->with('error', 'Could not save the form.' . ucfirst($ex->getMessage()));
        }


        $this->currentStep++;

        session()->remove('reservationData');
        // return redirect('/')->with('success', $this->translations->title);
    }//createBooking
    public function mount(){
        try{


            $session_data = session()->get('reservationData');
            $this->check_in_date = $session_data['check_in_date'];
            $this->check_out_date = $session_data['check_out_date'];
            $this->room_type = $session_data['room_type'];
            $this->nr_rooms = $session_data['nr_rooms'];
            $this->session_locale = $session_data['locale'];
            $this->session_locale = Locale::where('code', $this->session_locale)->first();

            $this->translations= json_decode(file_get_contents(resource_path('/translations/reservation_'. strtolower($this->session_locale->code) .'.json', true, 512, JSON_THROW_ON_ERROR)));

            $this->fees = Fee::where('id', 1)->get()->toArray();
        } catch(\Exception $ex){

            return redirect('/')->with('error', 'Please make sure you choose dates and rooms before proceeding!');
        }



//       dd($check_in_date,$check_out_date,$room_type,$nr_rooms);
    }//mount



    //IN MOUNT WE INITIALIZE THE DATA GIVEN TO USE BY THE OTHER COMPONENT!
//    public $captcha = 0;

    public function updatedCaptcha($token)
    {
//        dd('UPDATED CAPTCHA');
        $response = Http::post('https://www.google.com/recaptcha/api/siteverify?secret=' . config('services.recaptcha.secret_key') . '&response=' . $token);
        $this->captcha = $response->json()['score'];

        if (!$this->captcha > .3) {
            $this->createBooking();
        } else {
            return session()->flash('success', 'Google thinks you are a bot, please refresh and try again');
        }
    }


    public function nextStep(){


        if($this->currentStep >= 3 && $this->accept_tos === true){
//            dd('true' , $this->accept_tos);
            $this->validate([
                'accept_tos' => 'required',
            ]);
            $this->currentStep ++;
//            dd($this->accept_tos);
        }else if($this->currentStep < $this->totalSteps && $this->currentStep != 3){
//            dd('lathos meros' , $this->accept_tos);
            $this->validated = $this->formValidate();
            $this->currentStep ++;

        }else{
            $this->addError('error','no-step');
        }
        $this->dispatch('contentChanged');
    }//nextStep
    public function formValidate(){
        if($this->currentStep === 1)
        {
//            if(!$this->validate([
//            'check_in_date' => 'required',
//                'title' => 'required|not_in:0',
//                'check_out_date' => 'required',
//                'nr_rooms' => 'required',
//                'room_type' => 'required',
//                'name' => 'required',
//                'surname' => 'required',
//                'email' => 'required|confirmed',
//                'telephone' => 'required|max_digits:10',
//                'city' => 'required',
//                'country' => 'required|not_in:0',
//                'address' => 'required'
//            ])){
//            session()->flash('error', 'Please complete all fields!');
//        }
            $this->validate([
                'check_in_date' => 'required',
                'title' => 'required|not_in:0',
                'check_out_date' => 'required',
                'nr_rooms' => 'required',
                'room_type' => 'required',
                'name' => 'required',
                'surname' => 'required',
                'email' => 'required|confirmed',
                'telephone' => 'required|max_digits:10',
                'city' => 'required',
                'country' => 'required|not_in:0',
                'address' => 'required',
                'countryCode' => 'required',
            ]);


        }


        $this->dispatch('contentChanged');

    }//formValidate
    public function previousStep(){
        if($this->currentStep > 1){
            $this->currentStep --;
        }

        $this->dispatch('contentChanged');
    }//nextStep
    public function hydrate(){
        $this->dispatch('select2');
    }
    public function sendPaymentDetails(){

    }//sendPaymentDetails

//    public function calculateDays(){
//
//        if($this->check_in_date === null || $this->check_out_date === null || $this->nr_rooms === null || $this->room_type === null || $this->room_type === 0){
//            return redirect('/')->with('error', 'Please make sure you choose dates and rooms before proceeding!');
//        }
//        $this->tnights = 0;
//        $this->final_rate = 0;
//        $this->total_cost = 0;
//        $this->green_tax = 0;
//        $this->rate_without_exlusions = 0;
//        $check_in = explode('-', $this->check_in_date);
//        $check_out = explode('-', $this->check_out_date);
//        $green_tax_month_costs = GreenTax::all()->keyBy('month')->toArray();
////        $monthly_rates = MonthlyRate::where('room_type_id', $this->room_type)->pluck('number','rate')->toArray(); //change to month!!!!!!!!!!!!!!!!!!!!!!!!!!
//        $fetched_rates = MonthlyRate::where('room_type_id', $this->room_type)->get();
////        $monthly_rates = MonthlyRate::all()->get();
////        dd($monthly_rates , ' Room type ' . $this->room_type);
////        $rates = MonthlyRate::all();
//        $busInfo = BusinessInfo::find(1);
//        $calculatedRate = 0;
//        $rate_calculation_method = 'monthly';
//        $monthly_rates = [0=> null];
//        $monthly_rates = array_merge($monthly_rates, $fetched_rates->keyBy('number')->pluck('rate')->toArray());
////        dd($monthly_rates, $this->room_type);
////        $rate = $this->nr_rooms; // CHANGE THAT -> SET TO GET RATES FROM RATES->ROOM_TYPE AND MONTHS AND MULTIPLY BY nr_rooms!!!!!!!!
////        dd($rate);
//        $calculatedDays = 0;
//        $cinDay = $check_in[0];
//        $cinMonth = $check_in[1];
//        $cinYear = $check_in[2];
//
//        $coutDay = $check_out[0];
//        $coutMonth = $check_out[1];
//        $coutYear = $check_out[2];
//        $this->green_tax = 0;
//        $this->total_cost = 0;
//        $this->total_gov_tax = 0;
//
//
//
//        if(strtotime($this->check_in_date) >= strtotime($this->check_out_date)){
//            return redirect()->back()->withErrors('general_errors', 'Check in date must be earlier than the check out date!');
//        }
//        if($cinMonth === $coutMonth && $coutDay > $cinDay){
//            $calculatedDays = $coutDay - $cinDay;
//
//            $this->rate_without_exlusions = ($monthly_rates[intval($coutMonth)] * $this->nr_rooms) * $calculatedDays;
//
//            $this->green_tax = $green_tax_month_costs[intval($cinMonth)]['cost'] * $calculatedDays;
//            $this->final_rate = ceil(((($monthly_rates[intval($coutMonth)] *$this->nr_rooms )* $calculatedDays) + ($this->green_tax * $this->nr_rooms)) * 100 )/ 100;
//            $this->total_cost = $this->final_rate;
//
//            $this->final_rate = $this->final_rate - ($this->green_tax * $this->nr_rooms);
//
//            if($monthly_rates[intval($coutMonth)] == 0){
//                dd(
//                    [
//                        'mrates_current_month' => $monthly_rates[intval($coutMonth)],
//                        'mrates_array' => $monthly_rates,
//                        'nr_rooms' => $this->nr_rooms,
//                        'check_in_date' => $this->check_in_date,
//                        'check_out_date' => $this->check_out_date,
//                        'room_type' => $this->room_type,
//                ]);
//                return redirect('/'. strtolower(app()->getLocale()))->with('error', 'The hotel is closed for the asking period.');
//            }
//
//        }elseif($cinYear == $coutYear){
//            $calculatedDays = 0;
//            $months = $coutMonth - $cinMonth;
//            for($i = $cinMonth; $i<=$coutMonth; $i++){
//                if($i != $coutMonth && $i!= $cinMonth){
//                    $calculatedDays += cal_days_in_month(CAL_GREGORIAN,$i,$cinYear);
//                    $this->green_tax += ($green_tax_month_costs[intval($i)]['cost']) * cal_days_in_month(CAL_GREGORIAN, $i,$cinYear);
//                    $this->final_rate = ceil(((($monthly_rates[intval($i)] * $this->nr_rooms) * cal_days_in_month(CAL_GREGORIAN, $i,$cinYear)) +  ($this->green_tax * $this->nr_rooms))* 100) / 100;
//                    $this->total_cost = $this->final_rate;
//
//                    $this->final_rate = $this->final_rate - ($this->green_tax * $this->nr_rooms);
//                    $this->rate_without_exlusions = (($monthly_rates[intval($i)]* $this->nr_rooms) * cal_days_in_month(CAL_GREGORIAN,$i,$cinYear)) * 100 / 100;
//
//                    if($monthly_rates[intval($i)] == 0){
//                        dd(
//                            [
//                                'mrates_current_month' => $monthly_rates[intval($i)],
//                                'mrates_array' => $monthly_rates,
//                                'nr_rooms' => $this->nr_rooms,
//                                'check_in_date' => $this->check_in_date,
//                                'check_out_date' => $this->check_out_date,
//                                'room_type' => $this->room_type,
//                            ]);
//                        return redirect('/'. strtolower(app()->getLocale()))->with('error', 'The hotel is closed for the asking period.');
//                    }
//                }else{
//                    if($i == $cinMonth){
//                        $calculatedDays += cal_days_in_month(CAL_GREGORIAN,$i,$cinYear) - ($cinDay-1);
//                        $this->green_tax += $green_tax_month_costs[intval($i)]['cost'] * (cal_days_in_month(CAL_GREGORIAN, $i,$cinYear) - ($cinDay-1));
//                        $this->final_rate += ceil(((($monthly_rates[intval($i)] * $this->nr_rooms) * (cal_days_in_month(CAL_GREGORIAN, $i,$cinYear) -($cinDay-1))) +  ($this->green_tax * $this->nr_rooms)) * 100) /100 ;
//
//                        $this->total_cost = $this->final_rate;
//
//                        $this->final_rate = $this->final_rate - ($this->green_tax * $this->nr_rooms);
//                        $this->rate_without_exlusions += (($monthly_rates[intval($i)] * $this->nr_rooms) * (cal_days_in_month(CAL_GREGORIAN,$i,$cinYear) -($cinDay -1)) * 100 / 100);
//
//                        if($monthly_rates[intval($i)] == 0){
//                            dd(
//                                [
//                                    'mrates_current_month' => $monthly_rates[intval($i)],
//                                    'mrates_array' => $monthly_rates,
//                                    'nr_rooms' => $this->nr_rooms,
//                                    'check_in_date' => $this->check_in_date,
//                                    'check_out_date' => $this->check_out_date,
//                                    'room_type' => $this->room_type,
//                                ]);
//                            return redirect('/'. strtolower(app()->getLocale()))->with('error', 'The hotel is closed for the asking period.');
//                        }
//                    }
//                    if($i == $coutMonth){
//
//                        $this->green_tax += $green_tax_month_costs[intval($i)]['cost'] * ($coutDay-1);
//                        $this->final_rate += ceil((($monthly_rates[intval($i)] * $this->nr_rooms) * ($coutDay - 1) +  ($this->green_tax * $this->nr_rooms)) * 100) / 100;
//                        $this->total_cost = $this->final_rate;
//
//                        $this->final_rate = $this->final_rate - ($this->green_tax * $this->nr_rooms);
//                        $this->rate_without_exlusions += ($monthly_rates[intval($i)] * $this->nr_rooms) * ($coutDay-1);
//
//                        if($monthly_rates[intval($i)] == 0){
//                            dd(
//                                [
//                                    'mrates_current_month' => $monthly_rates[intval($i)],
//                                    'mrates_array' => $monthly_rates,
//                                    'nr_rooms' => $this->nr_rooms,
//                                    'check_in_date' => $this->check_in_date,
//                                    'check_out_date' => $this->check_out_date,
//                                    'room_type' => $this->room_type,
//                                ]);
//                            return redirect('/'. strtolower(app()->getLocale()))->with('error', 'The hotel is closed for the asking period.');
//                        }
//                    }
//                }
//            }
//
////            $this->green_tax += $green_tax_month_costs[intval($cinMonth)]['cost'] ;
//            $calculatedDays += $coutDay-1;
//
//        }elseif($cinYear < $coutYear){
//            $calculatedDays =0;
//            for($i = $cinYear; $i <= $coutYear; $i++){
//
//                if($i == $cinYear){
//                    for($j= $cinMonth; $j <= 12; $j++){
//                        if($j != intval($cinMonth) && $j != intval($coutMonth)){
//
//                            $calculatedDays +=  (cal_days_in_month(CAL_GREGORIAN,$j,$i)) ;
//                            $calculatedRate += (cal_days_in_month(CAL_GREGORIAN,$j,$i) -$cinDay) * ($monthly_rates[$j] * $this->nr_rooms);
//                            $this->green_tax += ($green_tax_month_costs[intval($j)]['cost'])  *  (cal_days_in_month(CAL_GREGORIAN,$j,$i) -($cinDay-1)) ;
//                            $this->rate_without_exlusions += ($monthly_rates[intval($j)] *$this->nr_rooms )*  (cal_days_in_month(CAL_GREGORIAN,$j,$i) -$cinDay);
//                            $this->final_rate +=  ceil( (($monthly_rates[intval($j)] *$this->nr_rooms )*  ((cal_days_in_month(CAL_GREGORIAN,$j,$i) -$cinDay) ) +  ($this->green_tax * $this->nr_rooms)) * 100) / 100;
//
//                            $this->total_cost = $this->final_rate;
//
//                            $this->final_rate = $this->final_rate - ($this->green_tax * $this->nr_rooms);
//
//                            if($monthly_rates[intval($j)] == 0){
//                                dd(
//                                    [
//                                        'mrates_current_month' => $monthly_rates[intval($j)],
//                                        'mrates_array' => $monthly_rates,
//                                        'nr_rooms' => $this->nr_rooms,
//                                        'check_in_date' => $this->check_in_date,
//                                        'check_out_date' => $this->check_out_date,
//                                        'room_type' => $this->room_type,
//                                    ]);
//                                return redirect('/'. strtolower(app()->getLocale()))->with('error', 'The hotel is closed for the asking period.');
//                            }
//                        }
//                        else{
//
//                            $calculatedDays +=  (cal_days_in_month(CAL_GREGORIAN,$j,$i) -($cinDay -1)) ;
//                        }
//                    }
//                }elseif($i == $coutYear){
//                    for($j= 1; $j <= $coutMonth ; $j++){ //CHANGED FROM j=0 to j=1
//                        if($j != $coutMonth && $j!=$cinMonth) {
//                            $calculatedDays += cal_days_in_month(CAL_GREGORIAN, $j, $i);
//                            $this->green_tax += $green_tax_month_costs[intval($j)]['cost'] * cal_days_in_month(CAL_GREGORIAN, $j, $i);
//                            $this->rate_without_exlusions += ($monthly_rates[intval($j)] * $this->nr_rooms) * cal_days_in_month(CAL_GREGORIAN, $j, $i);
//                            $this->final_rate += ceil(((($monthly_rates[intval($j)] * $this->nr_rooms) * cal_days_in_month(CAL_GREGORIAN, $j, $i)) +   ($this->green_tax * $this->nr_rooms)) * 100 )/ 100;
//                            $this->total_cost = $this->final_rate;
//
//                            $this->final_rate = $this->final_rate - ($this->green_tax * $this->nr_rooms);
//
//                            if($monthly_rates[intval($j)] == 0){
//                                dd(
//                                    [
//                                        'mrates_current_month' => $monthly_rates[intval($j)],
//                                        'mrates_array' => $monthly_rates,
//                                        'nr_rooms' => $this->nr_rooms,
//                                        'check_in_date' => $this->check_in_date,
//                                        'check_out_date' => $this->check_out_date,
//                                        'room_type' => $this->room_type,
//                                    ]);
//                                return redirect('/'. strtolower(app()->getLocale()))->with('error', 'The hotel is closed for the asking period.');
//                            }
//                            //$this->total_cost = $this->final_rate;
////
////                    $this->final_rate = $this->final_rate - ($this->green_tax * $this->nr_rooms);
////                        }
////                        elseif($j==$cinMonth){
////
////                            $calculatedDays +=  cal_days_in_month(CAL_GREGORIAN,$j,$i) - ($cinDay -1) ;
////                            $calculatedRate += (cal_days_in_month(CAL_GREGORIAN,$j,$i) -$cinDay) * $rate;
////                            $this->green_tax += $this->fees[0]['green_tax'] *  (cal_days_in_month(CAL_GREGORIAN,$j,$i) -$cinDay) ;
////                            $this->rate_without_exlusions += $rate *  (cal_days_in_month(CAL_GREGORIAN,$j,$i) -$cinDay);
////                            $this->final_rate += ($rate *  (cal_days_in_month(CAL_GREGORIAN,$j,$i) -$cinDay) ) + $this->green_tax;
//                        }else{
//                            $calculatedDays += $coutDay-1;
//                            $this->green_tax += $green_tax_month_costs[intval($j)]['cost'] * $coutDay;
//                            $this->rate_without_exlusions += ($monthly_rates[intval($j)] * $this->nr_rooms) * $coutDay;
//                            $this->final_rate += ceil(((($monthly_rates[intval($j)] * $this->nr_rooms) * $coutDay) + ($this->green_tax * $this->nr_rooms)) * 100) / 100;
//                            $this->total_cost = $this->final_rate;
//
//                            $this->final_rate = $this->final_rate - ($this->green_tax * $this->nr_rooms);
//
//                            if($monthly_rates[intval($j)] == 0){
//                                dd(
//                                    [
//                                        'mrates_current_month' => $monthly_rates[intval($j)],
//                                        'mrates_array' => $monthly_rates,
//                                        'nr_rooms' => $this->nr_rooms,
//                                        'check_in_date' => $this->check_in_date,
//                                        'check_out_date' => $this->check_out_date,
//                                        'room_type' => $this->room_type,
//                                    ]);
//                                return redirect('/'. strtolower(app()->getLocale()))->with('error', 'The hotel is closed for the asking period.');
//                            }
//                        }
//                    }
//                }else{
//
//                    for($j = 1; $j<12; $j++){
//
//                        $calculatedDays += cal_days_in_month(CAL_GREGORIAN,$j,$i);
//                        $this->rate_without_exlusions += ($monthly_rates[intval($j)] * $this->nr_rooms )* cal_days_in_month(CAL_GREGORIAN,$j,$i);
//
//                        $this->green_tax +=  $green_tax_month_costs[intval($j)]['cost']  * cal_days_in_month(CAL_GREGORIAN, $j,$i);
//                        $this->final_rate += ceil(((($monthly_rates[intval($j)] * $this->nr_rooms)* cal_days_in_month(CAL_GREGORIAN, $j,$i)) +  ($this->green_tax * $this->nr_rooms))* 100) / 100;
//                        $this->total_cost = $this->final_rate;
//
//                        $this->final_rate = $this->final_rate - ($this->green_tax * $this->nr_rooms);
//                        if($monthly_rates[intval($j)] == 0){
//                            dd(
//                                [
//                                    'mrates_current_month' => $monthly_rates[intval($j)],
//                                    'mrates_array' => $monthly_rates,
//                                    'nr_rooms' => $this->nr_rooms,
//                                    'check_in_date' => $this->check_in_date,
//                                    'check_out_date' => $this->check_out_date,
//                                    'room_type' => $this->room_type,
//                                ]);
//                            return redirect('/'. strtolower(app()->getLocale()))->with('error', 'The hotel is closed for the asking period.');
//                        }
//                    }//for
//                }
//            }
//        }else{
////            dd('Error: Days do not seem to match');
//            return redirect('/'. strtolower(app()->getLocale()))->with('error',"Error with code RF-A5640 05-24");
//        }
//
//        //$this->green_tax = number_format($this->green_tax * $this->nr_rooms, 2);
//        $this->prepayment = number_format(($this->rate_without_exlusions / 100) *  $this->fees[0]['prepayment'], 2);
//        $this->vat = number_format($this->rate_without_exlusions -($this->rate_without_exlusions / (1 +($this->fees[0]['vat'] / 100))), 2);
//        $this->city_tax = number_format(($this->rate_without_exlusions / 1.13) - ($this->rate_without_exlusions /1.13 / 1.005) , 2);
//        $this->total_gov_tax = $this->green_tax * $this->nr_rooms;
//        if(!$calculatedDays){ $calculatedDays = 0; }
//        if(!$calculatedRate){ $calculatedRate = 0; }
//        //The above is doing: 100 / 1.13 and then we have to divide again by 0.5% which means we have to do 100/1.13/1.005 and we need to know what
//        // is left after 100/1.13 and what the 0.5% of what's left.
//        Log::info("Calculated Days:", ['days' => $calculatedDays, 'rate' => $calculatedRate]);
//        $this->tnights = $calculatedDays;
//        return [$calculatedDays, $calculatedRate];
//    }//calculateDays

    public function calculateDays(){
        if(empty($this->check_in_date) || empty($this->check_out_date) || empty($this->nr_rooms) || empty($this->room_type) || $this->room_type == 0){
            return redirect('/')->with('error', 'Please make sure you choose dates and rooms before proceeding!');
        }

        // Initialize variables
        $this->tnights = 0;
        $this->final_rate = 0;
        $this->total_cost = 0;
        $this->green_tax = 0;
        $this->rate_without_exlusions = 0;
        $this->total_gov_tax = 0;
        $checkInDate = null;
        $checkOutDate = null;
        // Parse dates using Carbon with the correct format
        try {

                if($this->currentStep >= 6){
                $this->check_in_date = Carbon::parse('Y-m-d', $this->check_in_date)->format('d-m-Y');
                $this->check_out_date = Carbon::parse('Y-m-d', $this->check_out_date)->format('d-m-Y');
                }

                $checkInDate = Carbon::createFromFormat('d-m-Y', $this->check_in_date);
                $checkOutDate = Carbon::createFromFormat('d-m-Y', $this->check_out_date);

        } catch (\Exception $e) {
            $checkInDate = Carbon::createFromFormat('Y-m-d', $this->check_in_date);
            $checkOutDate = Carbon::createFromFormat('Y-m-d', $this->check_out_date);
//            return redirect()->back()->with('error', 'Invalid date format. Please use DD-MM-YYYY. ' . $this->check_in_date . '-' . $this->check_out_date . '- '. $this->currentStep .' - debug ' . $e->getMessage());
//            $this->dispatch('formError', 'Dates are invalid.');
        }

        if(strtotime($this->check_in_date) >= strtotime($this->check_out_date)){
            return redirect()->back()->withErrors('general_errors', 'Check in date must be earlier than the check out date!');
        }

//        // Ensure check-in date is before check-out date
//        if($checkInDate->gte($checkOutDate)){
//            return redirect()->back()->with('error', 'Check-in date must be earlier than the check-out date!');
//        }

        // Calculate total nights
        $calculatedDays = $checkInDate->diffInDays($checkOutDate);
        $this->tnights = $calculatedDays;

        // Fetch green tax costs per month
        $green_tax_costs = GreenTax::pluck('cost', 'month')->toArray();

        // Fetch monthly rates for the room type
        $monthly_rates = MonthlyRate::where('room_type_id', $this->room_type)->pluck('rate', 'number')->toArray();

        // Initialize current date for iteration
        $currentDate = $checkInDate->copy();

        // Loop through each day between check-in and check-out dates
        while($currentDate < $checkOutDate){
            $month = (int)$currentDate->format('n'); // Month number (1-12)
            $year = $currentDate->format('Y');

            // Get the rate and green tax for the current month
            $monthly_rate = $monthly_rates[$month] ?? 0;
            $green_tax = $green_tax_costs[$month] ?? 0;

            // Check if the hotel is closed during this period
            if($monthly_rate == 0){
                return redirect('/'. strtolower(app()->getLocale()))->with('error', 'The hotel is closed for the selected period.');
            }

            // Add daily costs
            $this->rate_without_exlusions += $monthly_rate * $this->nr_rooms;
            $this->green_tax += $green_tax * $this->nr_rooms;

            // Move to the next day
            $currentDate->addDay();
        }

        // Calculate total government tax and final rates
        $this->total_gov_tax = $this->green_tax;
        $this->final_rate = ceil(($this->rate_without_exlusions + $this->total_gov_tax) * 100) / 100;
        $this->total_cost = $this->final_rate;

        $vat = VAT::where('id', '1')->first()->rate;
        $vat = doubleval($vat);
        $vat = doubleval(($vat / 100) + 1);
//        dd($vat);
        // Calculate prepayment, VAT, and city tax
        $this->prepayment = number_format(($this->rate_without_exlusions / 100) * $this->fees[0]['prepayment'], 2);
        $this->vat = number_format($this->rate_without_exlusions - ($this->rate_without_exlusions / $vat), 2);
        $this->city_tax = number_format(($this->rate_without_exlusions / $vat) - ($this->rate_without_exlusions / $vat / 1.005), 2);

        return [$this->tnights, $this->rate_without_exlusions];
    }
//calculateDays

    #[On('formSubmitted')]
    public function submit($token): void
    {
       $this->currentStep = 5;


//        sleep(1);
//        dd($this->validate());
        $this->validateRecaptcha($token);

        try{
        if($this->accept_tos == 'on' || $this->accept_tos == true){
            $this->createBooking();
            //SENDSMS FUNCTION HERE
        foreach(['sonamderm@gmail.com','info@cretan-villa.com'] as $rec){
        Mail::to($rec)->send(new NewBookingNotification(Booking::where('id',$this->booking_id)->first()));
        $this->currentStep = 6;
        $this->sendBookingSMS(true);
        }
        }else{
            $this->addError('error','Must accept hotel policies!');
            $this->currentStep = 2;
        }
        }catch(\Exception $ex){
            dd($ex);
            session()->flash('error','Error: Form could not be submitted! Please contact an administrator if this error persists!');
            redirect()->back()->withErrors('error'. 'Form could not be submitted! Please contact an administrator if this error persists!' );
        }
    }

    protected function validateRecaptcha(string $token): void
    {
        // validate Google reCaptcha.
        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => config('services.recaptcha.secret_key'),
            'response' => $token,
            'remoteip' => request()->ip(),
        ]);

        $throw = fn ($message) => throw ValidationException::withMessages(['recaptcha' => $message]);

        if (! $response->successful() || ! $response->json('success')) {
            session()->flash('An error occured.');
            $throw($response->json(['error-codes'])[0] ?? 'An error occurred.');
        }

        // if response was score based (the higher the score, the more trustworthy the request)
        if ($response->json('score') < 0.6) {
            session()->flash('We were unable to verify that you\'re not a robot. Please try again.');
           // $throw('We were unable to verify that you\'re not a robot. Please try again.');
        }

    }//validateRecaptcha

    public function sendBookingSMS($status){
        if(!$status)
        {
            return false;
        }
        if($this->booking_id){
            $booking = Booking::where('id', $this->booking_id)->first();

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
                        'text' => 'Νέα κράτηση από ' . $booking->surname . ' ' . $booking->name . ' για ' . Carbon::parse($booking->check_in_date)->format('d-m-Y') . ' εως ' .  Carbon::parse($booking->check_out_date)->format('d-m-Y'),
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
    }

//    public function lastSteps(){
//        $this->currentStep++;
//    }
    public function render()
    {
        Log::debug('Current Step: '.$this->currentStep);
        Log::debug('Check-in Date: '.$this->check_in_date);

//        if($this->currentStep > 5){
//            dd($this->translations);
//        }
        $lang = session()->get('reservationData.locale');
        app()->setLocale($lang);

            if(File::exists(resource_path('/translations/reservation_'.strtolower($this->session_locale->code).'.json'))){
                $this->translations= json_decode(file_get_contents(resource_path('/translations/reservation_'. strtolower($this->session_locale->code) .'.json', true, 512, JSON_THROW_ON_ERROR)));

            }else{
//                dd('Error',$lang);
                $this->translations= json_decode(file_get_contents(resource_path('/translations/reservation_en.json', true, 512, JSON_THROW_ON_ERROR)));

            }


//if($this->currentStep > 4 ){
//        dd($this->calculateDays());
//}
$calculatedDays = $this->calculateDays();
        $calculatedDays = $this->tnights;

        if ($calculatedDays && is_array($calculatedDays) && isset($calculatedDays[1])) {
            $rate = $calculatedDays[1];
        } else {
            // Handle error or default value
            $rate = 0;
            // Optionally, log an error or display a message
        }

//        $rate = $calculatedDays[1];
        $rates_array = [];
        $calculated_final_rate = 0;
        $nights_cost = 0;
        $calculated_nights = $this->tnights;
        $rate_no_vat = 0;
        $feeList = Fee::find(1);
        $calculated_final_rate = $nights_cost ;
        $calculated_city_taxes = $feeList->city_tax;
        $prepayment = $calculated_final_rate / $feeList->prepayment;
        $appLocale = strtolower(app()->getLocale());

        $translations_file = resource_path("translations/reservation_" . strtolower($this->session_locale->code) .".json");
//        dd($this->session_locale->code);
        $fallback_file = resource_path("translations/reservation_en.json");
//        dd(RoomTranslations::all());
        $getLoc = Locale::where('code', App::getLocale())->first();
        if(!$getLoc){
            $getLoc = Locale::where('code', 'en')->first();
        }//if
        $this->room_type_front = RoomTranslations::where('room_type_id', $this->room_type)->where('locale_id', $getLoc->id)->first();

        if(!$this->room_type_front){
            $getLoc = Locale::where('code', 'en')->first();
            $this->room_type_front = RoomTranslations::where('room_type_id', $this->room_type)->where('locale_id', $getLoc->id)->first();

        }
        //        dd($this->room_type_front);
        $reservation_form = null;
        if(file_exists($translations_file)){
            $reservation_form = $this->translations;
        }elseif(file_exists($fallback_file)){
            $reservation_form = json_decode($fallback_file, true);
        }//if //elseif
        else {
//
        }//if elseif else
//

//        dd($this->translations);
        if($this->check_in_date === null || $this->check_out_date === null  ){
            return redirect()->back()->withErrors('general_errors', 'Error: Check in date and check out dates must not be null and must be Dates!');

        }
        if($this->currentStep === 2){
//            dd('calculating daysss RETURNED');
        }
        $countries = Country::all();

        $respolpage = Page::where('id','130')->first() ?? Page::where('id', '2')->first();
        $sel_loc = Locale::where('code',app()->getLocale())->first() ?? Locale::where('code', 'en')->first();
        $respol = PageContent::where('page_id', $respolpage->id)->where('locale_id', $sel_loc->id)->first();

        if($this->currentStep === 6){

        }//if


//        dd($this->check_in_date, $this->check_out_date);

//        $checkInDate = Carbon::createFromFormat('d-m-Y', $this->check_in_date);
//        $checkOutDate = Carbon::createFromFormat('d-m-Y', $this->check_out_date);
//        $dateDiff = date_diff($checkInDate ,$checkOutDate)->days;
//
//        if ($this->room_type == 7 && $dateDiff < 2) {
//            return redirect()->back()->with('error', 'Akrolithos Apartments requires a minimum stay of 2 days.');
//        }

        $cards = CardWidget::all();
        $roomImage = $cards->where('roomType_id', $this->room_type)->first()->image_path;

        return view('livewire.reservation-form-new')->with([
            'reservation_form' => $this->translations,
            'titles' => titleTranslations::where('locale', $sel_loc->id),
            'calculated_nights' => $calculated_nights,
            'rate_no_vat' => $rate_no_vat,
            'calculated_rates' => $this->rate_without_exlusions,
            'roomImage' => $roomImage,
            'all_countries' => Country::all(),
            'room_type_front' => $this->room_type_front,
            'respol' => $respol,
        ])->layout('layouts.reservation', [
            'reservation_form' => $this->translations
        ]);

    }


    public function updatedCountry(){



//        dd($this->country);
//        dd($this->countryCode = '+' . $selected->phone_prefix);
        if($this->country != null){
            $selected = Country::where('id',$this->country)->get();

        $this->countryCode = $this->country;
        }
        return true;
    }
}
