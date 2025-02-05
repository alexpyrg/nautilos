{{-- Livewire component for Step 1 --}}
<div class="container-fluid mainReservationContainer">
    {{-- STEP HEADER --}}
    <div class="row">
        <div class="col-md-12 text-center">
            <h1 class="h1-title">{{ $reservation_form->step1 }}</h1>
        </div>
    </div>

    {{-- STEP CONTENT --}}
    <div class="row">
        <div class="col-md-8 offset-md-2 reservationBox">
            <form wire:submit.prevent="submitStepOne">
                {{-- Personal Details Section --}}
                <div class="resInputCont">
                    <label for="title">{{ $reservation_form->personal_title }}</label>
                    <select id="title" class="resInp" wire:model.defer="title">
                        <option value="" disabled selected>{{ $reservation_form->country_please_choose }}</option>
                        <option value="mr">{{ $reservation_form->mr }}</option>
                        <option value="ms">{{ $reservation_form->ms }}</option>
                    </select>
                    @error('title') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="resInputCont">
                    <label for="name">{{ $reservation_form->name }}</label>
                    <input type="text" id="name" class="resInp" wire:model.defer="name" />
                    @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="resInputCont">
                    <label for="surname">{{ $reservation_form->surname }}</label>
                    <input type="text" id="surname" class="resInp" wire:model.defer="surname" />
                    @error('surname') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                {{-- Contact Details --}}
                <div class="resInputCont">
                    <label for="email">{{ $reservation_form->email }}</label>
                    <input type="email" id="email" class="resInp" wire:model.defer="email" />
                    @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="resInputCont">
                    <label for="telephone">{{ $reservation_form->telephone }}</label>
                    <input type="text" id="telephone" class="resInp" wire:model.defer="telephone" />
                    @error('telephone') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                {{-- Submit Button --}}
                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-orange">{{ $reservation_form->next_step_button }}</button>
                </div>
            </form>
        </div>
    </div>

    {{-- STEP HEADER --}}
    <div class="row">
        <div class="col-12 text-center">
            <h3 class="h3">{{ __('Please complete your booking form online :date', ['date' => now()->format('d/m/Y')]) }}</h3>
            <img src="{{ asset('css/images/icons/blueArrowDown.png') }}" alt="Available Cruises">
        </div>
    </div>

    {{-- Cruise Details Table --}}
    <div class="row">
        <div class="col-12">
            <div class="specs-table bg-white">
                <table width="100%" border="0" cellspacing="0" cellpadding="5" align="center" style="border: solid 1px #D0D0D0; font-weight: bold;">
                    <thead>
                    <tr>
                        <th align="left" class="b-bottom"><strong>{{ __('Desired Cruise') }}</strong></th>
                        <th align="center" class="b-bottom"><strong>{{ __('Passengers<br>12+ years old<br>(60.00 €)') }}</strong></th>
                        <th align="center" class="b-bottom"><strong>{{ __('Passengers<br>2-12 years old<br>(50.00 €)') }}</strong></th>
                        <th align="right" class="b-bottom"><strong>{{ __('Price') }}</strong></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td align="left">{{ $desiredCruise }}</td>
                        <td align="center">{{ $passengersOlder }}</td>
                        <td align="center">{{ $passengersYounger }}</td>
                        <td align="right">{{ number_format($price, 2) }} €</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Contact Details --}}
    <div class="row">
        <div class="col-12 text-center">
            <h3 class="h3">{{ __('Your Contact Details') }}</h3>
            <img src="{{ asset('css/images/icons/blueArrowDown.png') }}" alt="Available Cruises">
        </div>
        <div class="col-12 bg-white" style="border: solid 1px #D0D0D0;">
            <div class="row">
                <div class="col-md-6 textBox">
                    <p><label class="resInpLabel">{{ __('Name:') }}</label> {{ $name }}</p>
                    <p><label class="resInpLabel">{{ __('Surname:') }}</label> {{ $surname }}</p>
                    <p><label class="resInpLabel">{{ __('Telephone / Mobile:') }}</label> {{ $telephone }}</p>
                </div>
                <div class="col-md-6 textBox">
                    <p><label class="resInpLabel">{{ __('Email:') }}</label> {{ $email }}</p>
                    <p><label class="resInpLabel">{{ __('Country:') }}</label> {{ $country }}</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Special Requests Section --}}
    <div class="row text-center">
        <label class="resInpLabel" style="margin-top: 15px;">{{ __('Special Requests') }}</label>
        <div class="bg-white" style="margin: 15px 0; border: solid 1px #D0D0D0;">
            <div class="col-12 textBox text-center">
                {{ $specialRequests }}
            </div>
        </div>
    </div>

    {{-- Reservation Policy --}}
    <div class="col-12 textBox" style="border: solid 1px #D0D0D0; background-color: #ffffff; margin-top: 25px;">
        <h4 class="text-center">{{ __('Reservation | Cancellation Policy') }}</h4>
        {!! $reservationPolicy !!}
    </div>

    {{-- Terms & Conditions --}}
    <div class="row text-center" style="margin-top: 25px;">
        <p style="color: #D01D20;">
            <input type="checkbox" wire:model="acceptTerms"> {{ __('I accept the above terms and conditions') }}
        </p>
        @error('acceptTerms') <span class="text-danger">{{ $message }}</span> @enderror

        {{-- Buttons --}}
        <div class="col-12">
            <button type="button" class="resInp" style="min-width: 235px; background-color: #646464; color: #FFFFFF;" wire:click="changeDetails">{{ __('CHANGE CONTACT DETAILS') }}</button>
            <button type="button" class="resInp inpbg-next" style="min-width: 235px; background-color: #90b327; color: #FFFFFF;" wire:click="submitStepTwo">{{ __('SUBMIT REQUEST') }}</button>
        </div>

        <p><strong>{{ __('Important: Please note that this booking form is not a confirmation of your reservation. Your reservation will only be completed after the Reservations Department of Nautilos Cruises contacts you and confirms the details of your booking.') }}</strong></p>
    </div>

</div>
@push('bottom-scripts')
    <script src="{{ asset('swiper/swiper-bundle.min.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var swiper = new Swiper('.swiper-container', {
                loop: true,
                autoplay: {
                    delay: 5000,
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
            });
        });
    </script>
@endpush
