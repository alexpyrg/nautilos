<?php

namespace App\Livewire;

use Carbon\Carbon;
use Livewire\Attributes\Validate;
use Livewire\Component;

class MainFourFieldForm extends Component
{
    // Form properties with attribute-based validation (if using Livewire v3)
    #[Validate('required|date_format:d-m-Y|after_or_equal:today')]
    public $trip_date;

    #[Validate('required|not_in:0')]
    public $trip_type;

    // Available trip types (e.g., from database or static list)
    public array $trip_types = [
        1 => 'Classic Cruise',
        2 => 'Private Cruise',
        3 => 'Semi-Private Cruise',
    ];

    /**
     * Render the component view.
     */
    public function render()
    {
        return view('livewire.main-four-field-form')->with([
            'trip_types' => $this->trip_types,
        ]);
    }

    /**
     * Handle form submission and validation.
     */
    public function next_step()
    {
        // First, validate the form inputs. The date_format rule ensures
        // the incoming trip_date is in 'd-m-Y' format.
        $validatedData = $this->validate();

        // Now convert the trip_date string into a Carbon instance.
        // You might also choose to keep it as a string if your reservation form expects that.
        $validatedData['trip_date'] = Carbon::createFromFormat('d-m-Y', $validatedData['trip_date']);

        // Save data to session.
        session()->put('reservationData', [
            'trip_date' => $validatedData['trip_date']->format('Y-m-d'), // or keep as needed
            'trip_type' => $validatedData['trip_type'],
            'locale'    => app()->getLocale(),
        ]);

        // Redirect to the reservation form. (Using a session to transfer data here is acceptable.)
        return redirect()->route('reservation.new', ['#your_booking_details']);
    }
}
