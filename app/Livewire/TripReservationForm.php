<?php

namespace App\Livewire;

use App\Models\Booking;
use App\Models\Country;
use App\Models\TripType;
use App\Models\Page; // assume you have a Page model for policies or similar
use Carbon\Carbon;
use Livewire\Component;

class TripReservationForm extends Component
{
    // Reservation details

    public $trip_date;
    public $trip_type;
    public $adults = 0;
    public $children = 0;
    public $total_price = 0;
    public $name;
    public $surname;
    public $telephone;
    public $email;
    public $email_confirmation;
    public $country;
    public $special_request;
    public $tripTypeTranslations;
    public $accept_tos;

    // Additional data for select options
    public $trip_types;
    public $countries;

    // NEW: To handle multi‑step form navigation
    public $currentStep = 1;

    // NEW: To hold the dynamically loaded page content (e.g. a policy)
    public $policyContent;

    protected $rules = [
        'trip_date' => 'required|date|after_or_equal:today',
        'trip_type' => 'required',
        'adults' => 'required|integer|min:1',
        'children' => 'nullable|integer|min:0',
        'name' => 'required|string|min:1',
        'surname' => 'required|string|min:1',
        'telephone' => 'required|min:7|max:15',
        'email' => 'required|email|same:email_confirmation',
        'country' => 'required|string|min:2',
        'special_request' => 'nullable',
        'accept_tos' => 'accepted',
    ];

    public function mount()
    {
        $this->trip_date = session('reservationData.trip_date');
        $this->trip_type = TripType::where('id', session('reservationData.trip_type'))->first();
        $this->trip_types = TripType::all();
        $this->countries = Country::all();
    }

    public function updated()
    {
        $this->calculatePrice();
    }

    public function calculatePrice()
    {
        $trip = $this->trip_type;
        if ($trip) {
            if ($trip->one_price > 0) {
                $this->total_price = $trip->one_price;
            } else {
                $this->total_price = ($this->adults * $trip->price_adult) + ($this->children * $trip->price_child);
            }
        }
    }

    /**
     * Move to the next step.
     * In step 1, perform validation and load the dynamic policy content.
     * In step 2, submit the reservation.
     */
    public function nextStep()
    {
        if ($this->currentStep === 1) {
            $this->validate();
            // For example, load the policy from a Page record.
            // You might store the policy page id in a config value or property.
            $this->currentStep = 2;
        }elseif ($this->currentStep === 2){


                $this->validate();
                // For example, load the policy from a Page record.
                // You might store the policy page id in a config value or property.
                $policyPageId = 1; // adjust this id as needed
                $policyPage = Page::find($policyPageId);
                $this->policyContent = $policyPage ? $policyPage->content : 'Policy content not available.';
                $this->currentStep = 2;

        } elseif ($this->currentStep === 3) {
            // Final submission step
            $this->submit();
        }
    }

    public function previousStep()
    {
        if ($this->currentStep > 1) {
            $this->currentStep--;
        }
    }

    public function submit()
    {
        // Final validation before submission (if needed)
        $this->validate();

        Booking::create([
            'trip_date' => Carbon::createFromFormat('d-m-Y', $this->trip_date)->format('Y-m-d'),
            'trip_type' => $this->trip_type,
            'name' => $this->name,
            'surname' => $this->surname,
            'email' => $this->email,
            'telephone' => $this->telephone,
            'adults' => $this->adults,
            'children' => $this->children,
            'total_price' => $this->total_price,
            'country' => $this->country,
            'special_request' => $this->special_request,
            'status' => 'pending',
        ]);

        session()->flash('message', 'Your trip reservation has been successfully submitted!');
        return redirect()->route('thank-you');
    }

    public function render()
    {
        return view('livewire.trip-reservation-form')
            ->layout('layouts.TripReservationFormLayout');
    }
}
