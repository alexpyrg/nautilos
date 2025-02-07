<div class="reservation-form-container">
    @if($currentStep === 1)
        <form wire:submit.prevent="nextStep" method="post" style="margin-top: 2rem;">
            {{-- STEP 1: Editable Form --}}
            <h1 class="form_title_1">
                {{ $reservation_form->line_1 ?? 'Please complete your booking form online' }}<br>
                {{ $reservation_form->line_2 ?? 'Cruise Day' }} {{ $trip_date ?? 'N/A' }}
            </h1>
            @if ($errors->any())
                @if ($errors->any())
                    <script>
                        window.onload = function() {
                            let errorMessages = {!! json_encode($errors->all()) !!};
                            alert(errorMessages.join("\n"));
                        };
                    </script>
                @endif
                <h1> {{ dd($errors->all()) }} </h1>
            @endif

            <table class="main-info-select">
                <tbody>
                <tr>
                    <td>{{ $reservation_form->selected_cruise ?? 'Selected Cruise' }}</td>
                    <td>
                        {{ $reservation_form->passengers_adults ?? 'Passengers 12+ years old' }}
                        {{ $price_loaded_adults ?? 'N/A' }}
                    </td>
                    <td>
                        {{ $reservation_form->passengers_children ?? 'Passengers 2-12 years old' }}
                        {{ $price_loaded_children ?? 'N/A' }}
                    </td>
                    <td>{{ $reservation_form->price ?? 'Price' }}</td>
                </tr>
                <tr>
                    <td>{{ $selectedTripTranslation  ?? 'Cruise Translation NOT FOUND' }}</td>
                    <td>
                        <select wire:model="adults">
                            @for ($i = 1; $i <= 17; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </td>
                    <td>
                        <select wire:model="children">
                            @for ($i = 0; $i <= 17; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </td>
                    <td>{{ $calculated_price ?? 'Price not found!' }}</td>
                </tr>
                </tbody>
            </table>

            <h1 style="text-align: center">
                {{ $reservation_form->your_contact_details ?? 'Your contact details' }}
            </h1>
            <div class="flex-container">
                <div class="flex-sub">
                    <div class="input-group">
                        <label for="name">{{ $reservation_form->name ?? 'Name:' }}</label>
                        <input wire:model="name" type="text" id="name">
                    </div>
                    <div class="input-group">
                        <label for="surname">{{ $reservation_form->surname ?? 'Surname:' }}</label>
                        <input wire:model="surname" type="text" id="surname">
                    </div>
                    <div class="input-group">
                        <label for="telephone">{{ $reservation_form->mobile ?? 'Telephone/Mobile:' }}</label>
                        <input wire:model="telephone" type="text" id="telephone">
                    </div>
                </div>
                <div class="flex-sub">
                    <div class="input-group">
                        <label for="email">{{ $reservation_form->email ?? 'Email:' }}</label>
                        <input wire:model="email" type="text" id="email">
                    </div>
                    <div class="input-group">
                        <label for="email_confirmation">{{ $reservation_form->cofirm_email ?? 'Confirm Email:' }}</label>
                        <input wire:model="email_confirmation" type="text" id="email_confirmation">
                    </div>
                    <div class="input-group">
                        <label for="country">{{ $reservation_form->country ?? 'Country:' }}</label>
                        <input wire:model="country" type="text" id="country">
                    </div>
                </div>
            </div>
            {{-- STEP 1 Buttons --}}
            <div class="buttons-wrapper">
                <!-- You may hide the back button on step 1 if not needed -->
                <button class="green-button" type="submit">{{ $reservation_form->continue ?? 'Continue' }}</button>
            </div>
            <p style="font-size: 18px; margin: 1rem auto; text-align: center;">
                {{ $reservation_form->last_paragraph ?? 'N/A' }}
            </p>
        </form>
    @elseif($currentStep === 2)
        <form wire:submit.prevent="nextStep" method="post" style="margin-top: 2rem;">
            {{-- STEP 2: Read-Only Summary + Policy --}}
            <h2>Please review your details</h2>
            <div class="summary">
                <p><strong>Name:</strong> {{ $name }}</p>
                <p><strong>Surname:</strong> {{ $surname }}</p>
                <p><strong>Email:</strong> {{ $email }}</p>
                <p><strong>Telephone:</strong> {{ $telephone }}</p>
                <p><strong>Trip Date:</strong> {{ $trip_date }}</p>
                <p><strong>Trip Type:</strong> {{ optional($trip_types->find($trip_type))->name ?? 'N/A' }}</p>
                <p><strong>Adults:</strong> {{ $adults }}</p>
                <p><strong>Children:</strong> {{ $children }}</p>
                <p><strong>Total Price:</strong> {{ $total_price }}</p>
                <!-- Include any additional fields as needed -->
            </div>

            <div class="policy-section">
                <h3>Policy</h3>
                <div>{!! $policyContent !!}</div>
            </div>

            {{-- STEP 2 Buttons --}}
            <div class="buttons-wrapper">
                <button class="gray-button" type="button" wire:click="previousStep">
                    {{ $reservation_form->back_button ?? 'Back' }}
                </button>
                <button class="green-button" type="submit">
                    Submit Request
                </button>
            </div>
        </form>
    @endif
</div>

<!-- Include any required scripts -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        flatpickr("#trip_date", {
            dateFormat: "d-m-Y",
            minDate: "today",
            allowInput: true
        });
    });
</script>
