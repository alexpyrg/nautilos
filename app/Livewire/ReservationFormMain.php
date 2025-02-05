<?php

namespace App\Livewire;

use App\Models\Booking;
use App\Models\BusinessInfo;
use App\Models\Country;
use App\Models\Fee;
use App\Models\GreenTax;
use App\Models\MonthlyRate;
use App\Models\Page;
use App\Models\titleTranslations;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Url;
use Livewire\Component;
use Ramsey\Uuid\Type\Integer;

class ReservationFormMain extends Component
{
    public $currentStep = 1;
    public $totalSteps = 5;

    protected $rules = [
        'name' => 'required|min:1',
        'surname' => 'required|min:1',
        'email' => 'required|email',
        'email_confirmation'=> 'required|same:email',
        'telephone' => 'required|min:10|max:10',
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

    public function createBooking()
    {
        $this->estimated_arrival_time = '12:12:12';
        $this->special_request = ' ';
        $this->postal_code = 00000;
        $cind = new \DateTime($this->check_in_date);
        $coutd = new \DateTime($this->check_out_date);
        $this->check_in_date = Carbon::createFromFormat('d-m-Y', $this->check_in_date);
        $this->check_out_date = Carbon::createFromFormat('d-m-Y', $this->check_out_date);
        $this->check_in_date = $this->check_in_date->format('Y-m-d');
        $this->check_out_date = $this->check_out_date->format('Y-m-d');

        if (date_diff($cind, $coutd)->days > 30) {
//           dd('over30');
            return $this->redirect()->back()->withErrors('error', "{$this->translations->max_30_days_error}");
        }
        do{
        $this->booking_id = "PB-";
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        for($i = 0; $i < 12; $i++){
            $this->booking_id .= $characters[rand(0,strlen($characters) -1)];
        }
        }while(Booking::where('id', $this->booking_id)->exists());
        $this->country= 2;
        $this->status = 'pending';
//        $this
        try {
           dd( Booking::create([
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

                'address' => $this->address,
                'city' => $this->city,
                'country' => $this->country,
                'postal_code' => $this->postal_code,
                'estimated_arrival_time' => $this->estimated_arrival_time,
                'special_request' => $this->special_request,
                'prepayment' => $this->prepayment,
                'final_rate' => $this->final_rate,
                'status' => $this->status,
                'payment_status' => 'pending',
            ]));
        }catch (\Exception $ex){
            session()->flash('error', 'Could not save the form.' . ucfirst($ex->getMessage()));
        }
        session()->remove('reservationData');
    return redirect('/')->with('success', $this->translations->title);
    }//createBooking
    public function mount(){
        try{
        $session_data = session()->get('reservationData');
        $this->check_in_date = $session_data['check_in_date'];
        $this->check_out_date = $session_data['check_out_date'];
        $this->room_type = $session_data['room_type'];
        $this->nr_rooms = $session_data['nr_rooms'];
        $this->translations= json_decode(file_get_contents(resource_path('/translations/reservation_en.json', true, 512, JSON_THROW_ON_ERROR)));
        $this->fees = Fee::where('id', 1)->get()->toArray();
        } catch(\Exception $ex){
            return redirect('/')->with('error', 'Please make sure you choose dates and rooms before proceeding!');
        }
//       dd($check_in_date,$check_out_date,$room_type,$nr_rooms);
    }//mount



    //IN MOUNT WE INITIALIZE THE DATA GIVEN TO USE BY THE OTHER COMPONENT!



    public function nextStep(){
        if($this->currentStep < $this->totalSteps){
            $this->validated = $this->formValidate();
            $this->currentStep ++;
        }
    }//nextStep
    public function formValidate(){
        if($this->currentStep === 1)
        {
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
                'address' => 'required'
            ]);


        }
    }//formValidate
    public function previousStep(){
        if($this->currentStep > 1){
            $this->currentStep --;
        }
    }//nextStep

    public function sendPaymentDetails(){

    }//sendPaymentDetails

    public function calculateDays(){

        if($this->check_in_date === null || $this->check_out_date === null || $this->nr_rooms === null || $this->room_type === null || $this->room_type === 0){
            return redirect('/')->with('error', 'Please make sure you choose dates and rooms before proceeding!');
        }

        $check_in = explode('-', $this->check_in_date);
        $check_out = explode('-', $this->check_out_date);
        $green_tax_month_costs = GreenTax::all()->keyBy('month')->toArray();
//        $monthly_rates = MonthlyRate::where('room_type_id', $this->room_type)->pluck('number','rate')->toArray(); //change to month!!!!!!!!!!!!!!!!!!!!!!!!!!
        $fetched_rates = MonthlyRate::where('room_type_id', $this->room_type)->get();
//        $monthly_rates = MonthlyRate::all()->get();
//        dd($monthly_rates , ' Room type ' . $this->room_type);
//        $rates = MonthlyRate::all();
        $busInfo = BusinessInfo::find(1);
        $calculatedRate = 0;
        $rate_calculation_method = 'monthly';
        $monthly_rates = [0=> null];
        $monthly_rates = array_merge($monthly_rates, $fetched_rates->keyBy('number')->pluck('rate')->toArray());
//        dd($monthly_rates, $this->room_type);
//        $rate = $this->nr_rooms; // CHANGE THAT -> SET TO GET RATES FROM RATES->ROOM_TYPE AND MONTHS AND MULTIPLY BY nr_rooms!!!!!!!!
//        dd($rate);
        $calculatedDays = 0;
        $cinDay = $check_in[0];
        $cinMonth = $check_in[1];
        $cinYear = $check_in[2];

        $coutDay = $check_out[0];
        $coutMonth = $check_out[1];
        $coutYear = $check_out[2];
        $this->green_tax = 0;
        if(strtotime($this->check_in_date) >= strtotime($this->check_out_date)){
            return redirect()->back()->withErrors('general_errors', 'Check in date must be earlier than the check out date!');
        }
        if($cinMonth === $coutMonth && $coutDay > $cinDay){
            $calculatedDays = $coutDay - $cinDay;

            $this->rate_without_exlusions = ($monthly_rates[intval($coutMonth)] * $this->nr_rooms) * $calculatedDays;

            $this->green_tax = $green_tax_month_costs[intval($cinMonth)]['cost'] * $calculatedDays;
            $this->final_rate = ceil(((($monthly_rates[intval($coutMonth)] *$this->nr_rooms )* $calculatedDays) +$this->green_tax) * 100 )/ 100;



        }elseif($cinYear == $coutYear){
            $calculatedDays = 0;
            $months = $coutMonth - $cinMonth;
            for($i = $cinMonth; $i<=$coutMonth; $i++){
                if($i != $coutMonth && $i!= $cinMonth){
                $calculatedDays += cal_days_in_month(CAL_GREGORIAN,$i,$cinYear);
                $this->green_tax += ($green_tax_month_costs[intval($i)]['cost']) * cal_days_in_month(CAL_GREGORIAN, $i,$cinYear);
                $this->final_rate = ceil(((($monthly_rates[$i] * $this->nr_rooms) * cal_days_in_month(CAL_GREGORIAN, $i,$cinYear)) + $this->green_tax)* 100) / 100;
                $this->rate_without_exlusions = (($monthly_rates[$i]* $this->nr_rooms) * cal_days_in_month(CAL_GREGORIAN,$i,$cinYear)) * 100 / 100;
                }else{
                    if($i == $cinMonth){
                        $calculatedDays += cal_days_in_month(CAL_GREGORIAN,$i,$cinYear) - ($cinDay-1);
                        $this->green_tax += $green_tax_month_costs[intval($i)]['cost'] * (cal_days_in_month(CAL_GREGORIAN, $i,$cinYear) - ($cinDay-1));
                        $this->final_rate += ceil(((($monthly_rates[$i] * $this->nr_rooms) (cal_days_in_month(CAL_GREGORIAN, $i,$cinYear) -($cinDay-1))) + $this->green_tax) * 100) /100 ;
                        $this->rate_without_exlusions += (($monthly_rates[$i] * $this->nr_rooms) (cal_days_in_month(CAL_GREGORIAN,$i,$cinYear) -($cinDay -1)) * 100 / 100);
                    }
                    if($i == $coutMonth){

                        $this->green_tax += $green_tax_month_costs[intval($i)]['cost'] * ($coutDay-1);
                        $this->final_rate += ceil((($monthly_rates[$i] * $this->nr_rooms) * ($coutDay - 1) + $this->green_tax) * 100) / 100;
                        $this->rate_without_exlusions += ($monthly_rates[$i] * $this->nr_rooms) * ($coutDay-1);
                    }
                }
            }

//            $this->green_tax += $green_tax_month_costs[intval($cinMonth)]['cost'] ;
            $calculatedDays += $coutDay-1;

        }elseif($cinYear < $coutYear){
            $calculatedDays =0;
            for($i = $cinYear; $i <= $coutYear; $i++){

                if($i == $cinYear){
                    for($j= $cinMonth; $j <= 12; $j++){
                        if($j != intval($cinMonth) && $j != intval($coutMonth)){

                            $calculatedDays +=  (cal_days_in_month(CAL_GREGORIAN,$j,$i)) ;
                            $calculatedRate += (cal_days_in_month(CAL_GREGORIAN,$j,$i) -$cinDay) * ($monthly_rates[$j] * $this->nr_rooms);
                            $this->green_tax += ($green_tax_month_costs[intval($j)]['cost'])  *  (cal_days_in_month(CAL_GREGORIAN,$j,$i) -($cinDay-1)) ;
                            $this->rate_without_exlusions += ($monthly_rates[$j] *$this->nr_rooms )*  (cal_days_in_month(CAL_GREGORIAN,$j,$i) -$cinDay);
                         $this->final_rate +=  ceil( (($monthly_rates[$j] *$this->nr_rooms )*  ((cal_days_in_month(CAL_GREGORIAN,$j,$i) -$cinDay) ) + $this->green_tax) * 100) / 100;
                        }
                        else{

                            $calculatedDays +=  (cal_days_in_month(CAL_GREGORIAN,$j,$i) -($cinDay -1)) ;
                        }
                    }
                }elseif($i == $coutYear){
                    for($j= 1; $j <= $coutMonth ; $j++){ //CHANGED FROM j=0 to j=1
                        if($j != $coutMonth && $j!=$cinMonth) {
                            $calculatedDays += cal_days_in_month(CAL_GREGORIAN, $j, $i);
                            $this->green_tax += $green_tax_month_costs[intval($j)]['cost'] * cal_days_in_month(CAL_GREGORIAN, $i, $cinYear);
                            $this->rate_without_exlusions += ($monthly_rates[$j] * $this->nr_rooms) * cal_days_in_month(CAL_GREGORIAN, $j, $i);
                            $this->final_rate += ceil(((($monthly_rates[$j] * $this->nr_rooms) * cal_days_in_month(CAL_GREGORIAN, $i, $cinYear)) +  $this->green_tax) * 100 )/ 100;
//                        }
//                        elseif($j==$cinMonth){
//
//                            $calculatedDays +=  cal_days_in_month(CAL_GREGORIAN,$j,$i) - ($cinDay -1) ;
//                            $calculatedRate += (cal_days_in_month(CAL_GREGORIAN,$j,$i) -$cinDay) * $rate;
//                            $this->green_tax += $this->fees[0]['green_tax'] *  (cal_days_in_month(CAL_GREGORIAN,$j,$i) -$cinDay) ;
//                            $this->rate_without_exlusions += $rate *  (cal_days_in_month(CAL_GREGORIAN,$j,$i) -$cinDay);
//                            $this->final_rate += ($rate *  (cal_days_in_month(CAL_GREGORIAN,$j,$i) -$cinDay) ) + $this->green_tax;
                        }else{
                            $calculatedDays += $coutDay-1;
                            $this->green_tax += $green_tax_month_costs[$j]['cost'] * $coutDay;
                            $this->rate_without_exlusions += ($monthly_rates[$j] * $this->nr_rooms) * $coutDay;
                            $this->final_rate += ceil(((($monthly_rates[$j] * $this->nr_rooms) * $coutDay) + $this->green_tax) * 100) / 100;
                        }
                    }
                }else{

                    for($j = 1; $j<12; $j++){

                        $calculatedDays += cal_days_in_month(CAL_GREGORIAN,$j,$i);
                        $this->rate_without_exlusions += ($monthly_rates[$j] * $this->nr_rooms )* cal_days_in_month(CAL_GREGORIAN,$j,$i);

                        $this->green_tax +=  $green_tax_month_costs[$j]['cost']  * cal_days_in_month(CAL_GREGORIAN, $j,$i);
                       $this->final_rate += ceil(((($monthly_rates[$j] * $this->nr_rooms)* cal_days_in_month(CAL_GREGORIAN, $j,$i)) + $this->green_tax)* 100) / 100;
                    }//for
                }
            }
        }else{
//            dd('Error: Days do not seem to match');
            //return session()->flash('error',"Error with code RF-A5640 05-24");
        }
        $this->green_tax = $this->green_tax * $this->nr_rooms;
        $this->prepayment = ($this->rate_without_exlusions / 100) *  $this->fees[0]['prepayment'];
        $this->vat = number_format($this->rate_without_exlusions -($this->rate_without_exlusions / (1 +($this->fees[0]['vat'] / 100))), 2);
        $this->city_tax = number_format(($this->rate_without_exlusions / 1.13) - ($this->rate_without_exlusions /1.13 / 1.005) , 2);
         //The above is doing: 100 / 1.13 and then we have to divide again by 0.5% which means we have to do 100/1.13/1.005 and we need to know what
        // is left after 100/1.13 and what the 0.5% of what's left.
        return [$calculatedDays, $calculatedRate];
    }//calculateDays


    public function render()
    {
        $this->translations= json_decode(file_get_contents(resource_path('/translations/reservation_en.json', true, 512, JSON_THROW_ON_ERROR)));
        $calculatedDays = $this->calculateDays();
        $rate = $calculatedDays[1];
        $rates_array = [];
        $calculated_final_rate = 0;
        $nights_cost = 0;
        $calculated_nights = $calculatedDays[0];
        $rate_no_vat = 0;
        $feeList = Fee::find(1);
        $calculated_final_rate = $nights_cost ;
        $calculated_city_taxes = $feeList->city_tax;
        $prepayment = $calculated_final_rate / $feeList->prepayment;
        $appLocale = app()->getLocale();
        $translations_file = resource_path("translations/reservation_" . $appLocale .".json");
        $fallback_file = resource_path("translations/reservation_en.json");

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
        if($this->check_in_date === null || $this->check_out_date === null  ){
            return redirect()->back()->withErrors('general_errors', 'Error: Check in date and check out dates must not be null and must be Dates!');

        }
        if($this->currentStep === 2){
//            dd('calculating daysss RETURNED');
        }
        $countries = Country::all();

        return view('livewire.reservation-form-main')->with([
            'reservation_form' => $reservation_form,
            'titles' => titleTranslations::where('locale', app()->getLocale()),
            'calculated_nights' => $calculated_nights,
            'rate_no_vat' => $rate_no_vat,
            'calculated_rates' => $this->rate_without_exlusions,
            'roomImage' => 'images/double_room.jpg',
            'all_countries' => Country::all(),
        ])->layout('layouts.reservation', [
            'reservation_form' => $this->translations
        ]);

    }
}
