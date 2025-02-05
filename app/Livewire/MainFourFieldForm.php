<?php

namespace App\Livewire;

use App\Models\Locale;
use App\Models\Page;
use App\Models\PageContent;
use App\Models\RoomTranslations;
use App\Models\roomType;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;
use Livewire\Attributes\Validate;
use Livewire\Component;

class MainFourFieldForm extends Component
{
    // Form properties
    #[Validate('required')]
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
        // Validate form inputs
        dd($this->validate());

        // Save data to session
        session()->put('reservationData', [
            'trip_date' => $this->trip_date,
            'trip_type' => $this->trip_type,
            'locale' => app()->getLocale(),
        ]);

        // Redirect to Step 1
        return redirect()->route('reservation.new', ['#your_booking_details']);
    }
}
