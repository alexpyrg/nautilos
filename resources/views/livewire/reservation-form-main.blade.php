 <div class="container">

        <div class="steps">
            <div class="step active">
                {{ $reservation_form->step1 }}
            </div>
            <div class="step
         @if($currentStep >= 2)
          {{ 'active' }}
         @endif
         "  >
                {{ $currentStep }}
                {{ $reservation_form->step2 }}
            </div>
            <div class="step @if($currentStep >= 3) active @endif ">
                {{ $reservation_form->step3 }}
            </div>
            <div class="step ">
                {{ $reservation_form->step4 }}
            </div>
            <div class="step ">
                {{ $reservation_form->step5 }}
            </div>
        </div>

        <div class="form-container">

            <div class="general-data @if($currentStep == 3) hide-form-details @endif">
                <img class="room-image" src="{{ asset($roomImage) }}">
                <div class="room-details-info">
                    <span>  {{ $reservation_form->check_in }}</span>
                    <span> {{ $check_in_date }}</span>
                </div>
                <div class="room-details-info">
                    <span> {{ $reservation_form->check_out }}</span>
                    <span>{{ $check_out_date }}</span>
                </div>
                <div class="room-details-info">
                    <span> {{ $reservation_form->nights }}</span>
                    <span>{{ $calculated_nights }}</span>
                </div>
                <div class="room-details-info">
                    <span>   {{ $reservation_form->nr_rooms }}</span>
                    <span> {{ $nr_rooms }}</span>
                </div>
                    <span class="reservation-details separator bg-lightgray">
                       <span>{{$reservation_form->booked_rate}}</span>
                    </span>
                    <span class="reservation-details">
                        <span> {{$reservation_form->room}} ({{ $calculated_nights }} {{ $reservation_form->nights_2 }})</span>
                        <span>  {{ ceil((($calculated_rates / (1 + ($fees[0]['vat'] / 100)) ) / (1 + ($fees[0]['city_tax'] / 100))) *100 )/ 100 }}€</span>
                    </span>
                    <span class="reservation-details">
                        <span> {{ $reservation_form->vat }} ({{ $fees[0]['vat'] }}%)</span>
                        <span>  {{ number_format(doubleval($vat),2) }}€</span>
                    </span>
                    <span class="reservation-details">
                        <span>{{ $reservation_form->city_taxes }} ({{ $fees[0]['city_tax'] }}%)</span>
                        <span>   {{ $city_tax }}€</span>
                    </span>
                    <span class="reservation-details separator bg-lightgray">
                        <span>{{$reservation_form->rate}}</span>
                        <span>{{ $rate_without_exlusions }}€</span>
                    </span>
                    <span class="reservation-details">
                         <span>{{ $reservation_form->prepayment }} ({{ $fees[0]['prepayment'] }}%)</span>
                         <span>{{ number_format($prepayment,2) }}€</span>
                    </span>
                    <div class="reservation-details separator bg-lightgray">
                        <span>{{ $reservation_form->excluded_charges }}</span>
                    </div>
                    <div class="reservation-details">
                        <span>{{$reservation_form->green_tax }}</span>
                        <span>{{ number_format($green_tax,2)}}€</span>
                    </div>
                    <div class="reservation-details bold">
                        <span>{{$reservation_form->final_rate}}</span>
                        <span>{{ number_format($final_rate,2) }}€</span>
                    </div>
            </div>

            <form class="general-form @if($currentStep == 3) step3-gn-f @endif">
                @csrf
{{--                @if ($errors->any())--}}
{{--                    <div class="alert alert-danger">--}}
{{--                        <ul>--}}
{{--                            @foreach ($errors->all() as $error)--}}
{{--                                <li>{{ $error }}</li>--}}
{{--                            @endforeach--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                @endif--}}
               <div class="step1" @if($currentStep === 1) style="display: block;" @else style="display: none;"  @endif >
{{--                <input type="text" disabled id="check_in_date" wire:model.defer="check_in_date">--}}
{{--                <input type="text"  disabled id="check_out_date"  wire:model.defer="check_out_date">--}}
{{--                <input type="text"  disabled id="nr_rooms"  wire:model.defer="nr_rooms" >--}}
{{--                <input type="text"  disabled id="room_type"  wire:model="room_type">--}}
                <h2 class="form-divider">

                    {{ $reservation_form->personal_details }}
                </h2>
                    @error('check_in_date')
                    <span class="error"> {{ $message }} </span>
                    @enderror
                    @error('check_out_date')
                    <span class="error"> {{ $message }} </span>
                    @enderror
                    @error('nr_rooms')
                    <span class="error"> {{ $message }} </span>
                    @enderror
                    @error('room_type')
                    <span class="error"> {{ $message }} </span>
                    @enderror

                <div class="form-group inline">
                    <label for="title"> {{ $reservation_form->personal_title }}  </label>
                    <select wire:model="title" id="title">
                        <option value="0"> Please select... </option>
                        @foreach($titles as $title)
                            <option value="{{ $title->id }}"> {{ $title->name }} </option>
                        @endforeach

                        <option value="{{ '1' }}"> {{ 'Mr.' }} </option>
                        <option value="{{ '2' }}"> {{ 'Mrs.' }} </option>
                    </select>

                </div>
                   @error('title')
                   <span class="error"> {{ $message }} </span>
                   @enderror

                <div class="form-group inline">
                    <label for="name"> {{ $reservation_form->name }}</label>
                    <input type="text"  wire:model="name">
                </div>
                   @error('name')
                   <span class="error"> {{ $message }} </span>
                   @enderror
                <div class="form-group inline">
                    <label for="surname"> {{ $reservation_form->surname }}  </label>
                    <input type="text"  wire:model="surname">

                </div>
                   @error('surname')
                   <span class="error"> {{ $message }} </span>
                   @enderror

                <div class="form-group inline">
                    <label for="email"> {{ $reservation_form->email }}  </label>
                    <input type="text"  wire:model="email">
                </div>
                   @error('email')
                   <span class="error"> {{ $message }} </span>
                   @enderror

                <div class="form-group inline">
                    <label for="email_confirmation"> {{ $reservation_form->email_confirmation }}</label>
                    <input type="text" wire:model="email_confirmation">
                </div>

                   @error('email_confirmation')
                   <span class="error"> {{ $message }} </span>
                   @enderror

                <div class="form-group inline">
                    <label> {{ $reservation_form->telephone }} </label>
                    <input type="text" wire:model="telephone">
                </div>
                   @error('telephone')
                   <span class="error"> {{ $message }} </span>
                   @enderror

                   <h2 class="form-divider">
                    {{ $reservation_form->address_comments }}
                </h2>
                <div class="form-group inline">
                    <label for="city"> {{ $reservation_form->city }}  @error('city')
                        <span class="error"> {{ $message }} </span>
                        @enderror </label>
                    <input type="text" wire:model="city">

                </div>

                <div class="form-group inline">
                    <label for="country"> {{ $reservation_form->country }} </label>
                    <select wire:model="country">
                        @foreach($all_countries as $cnt)
                            <option value="{{ $cnt->id }}"> {{ $cnt->name }} </option>
                        @endforeach
                    </select>
                </div>
                   @error('country')
                   <span class="error"> {{ $message }} </span>
                   @enderror
                <div class="form-group inline">
                    <label for="address"> {{ $reservation_form->address }} </label>
                    <input type="text" wire:model="address">
                </div>
                   @error('address')
                   <span class="error"> {{ $message }} </span>
                   @enderror
               </div>{{-- step 1 end --}}
                <div class="form_data_validation"  @if($currentStep === 2) style="display: block;" @else style="display: none;"  @endif >
                    <div class="form-group fg-conf">
                        <h4> {{ $reservation_form->ensure_correct_message  }} </h4>
                    </div>
                    <div class="form-group fg-conf">
                        <span> {{ $reservation_form->personal_title }} </span>
                        <span> {{ $title }}</span>
                    </div>
                    <div class="form-group fg-conf">
                        <span> {{ $reservation_form->name }} </span>
                        <span> {{ $name }}</span>
                    </div>
                    <div class="form-group fg-conf">
                        <span> {{ $reservation_form->surname }} </span>
                        <span> {{ $surname }}</span>
                    </div>

                    <div class="form-group fg-conf">
                        <span> {{ $reservation_form->email }} </span>
                        <span> {{ $email }}</span>
                    </div>
                    <div class="form-group fg-conf">
                        <span> {{ $reservation_form->telephone }} </span>
                        <span> {{ $telephone }}</span>
                    </div>
                    <div class="form-group fg-conf">
                        <span> {{ $reservation_form->city }} </span>
                        <span> {{ $city }}</span>
                    </div>
                    <div class="form-group fg-conf">
                        <span> {{ $reservation_form->country }} </span>
                        <span> {{ $country }}</span>
                    </div>
                    <div class="form-group fg-conf">
                        <span> {{ $reservation_form->address }} </span>
                        <span> {{ $address }}</span>
                    </div>

                </div>

                <div class="step2"  @if($currentStep === 3) style="display: block; position: relative; width:100%; max-width: 100%!important;" @else style="display: none;"  @endif >
                <pre>
                   <h2> Confirmation policy</h2>
All reservations must be guaranteed with a deposit of 30% of the total booking. This deposit is payable at confirmation of booking. We require prepayment by bank transfer or credit card details in order to guarantee your reservation. If the customer does not provide the credit card details  within the agreed time, (02 hours after the positive availability reply ) the reservation is considered invalid and therefore rooms will be available to rent to other customers. Once the prepayment has been verified, we will send you the final booking confirmation (Voucher) and the receipt of your prepayment attached in (PDF),  to the e-mail address provided to us during the booking process. In order to safeguard and encrypt your credit card information when in transit to us, we use the "Secure Socket Layer (SSL)" technology for our services.
The hotel has the right when receiving a reservation to pre-authorize up to the full reservation amount your credit card 14 days before your arrival.
Non-valid credit cards will result in automatic cancellation of the reservation.

By bank transfer
If you do not wish to confirm your reservation electronically, you can  guarantee your reservation by depositing the 50% from the final amount  in the Hotel's Bank Account by bank transfer. Upon making the booking payment, the client must take on the cost of the transfer, in the case that these were applicable. If the advance prepayment is not paid within the agreed time, (2 working days) the reservation is considered invalid and the rooms will be available to rent. Once made the bank transfer, you will need to send us the payment receipt by e-mail, and when the operation has been validated we will send you the final booking confirmation.

ALPHA BANK
Holder name: Dermitzakis Emmanouel
Branch No.: 662
IBAN : GR6701406620662002330001410
SWIFT / BIC CODE: CRBAGRAA

Privacy Policy
Cretan Villa Hotel respects your privacy and is committed to protecting it. Cretan Villa  does not sell, rent, lease or otherwise disclose any of your information to any third party unless required by law.

Child policies
Children ages 4 and older are allowed.
There is no capacity for cots at this property.

Age restriction
The minimum age for check-in is 18.

Pets
Despite the fact that we like them, for the present time we can not offer them the appropriate accommodation.
Gheck in/out times
Check in time: 15.00 - 20.00.
Check out time: 08.00 - 11.00.
In case of arrival later or earlier than the front desk hrs (8:00 - 20:00 daily), please be so kind to let us know.

Taxes and service charges
13.00 % VAT is included. 0.50 % city tax is included.
Excluded charges: Environment fee: 1.50 €  per night.
A service charge is not applicable.

Cancellation Policy
If cancelled up to 21 days before date of arrival, no fee will be charged and the deposit will be refund back to the customer credit card. If cancelled or modified later, 50 % of total price of the reservation will be charged. In case of no-show, the total price of the reservation will be charged. In case of cancellation during the stay, a 50% compensation of the remaining days originally agreed is due and payable to the hotel by the customer.

Article 8 of the Law 1652/30-10-86 (Govern. Gazette F 167 A') (H.Q.) (GNTO) Greek National Tourism Organization
                </pre>
                    <input type="checkbox" wire:model="accept_tos" id="accept_tos">
                    @error('accept_tos')
                    <span class="error"> {{ $message }} </span>
                    @enderror
                    <label for="accept_tos"> {{ $reservation_form->accept_tos_label }}</label>

                </div>

                    <div class="form-group-block">
                        @if($currentStep > 1)

                            <button wire:click.prevent="previousStep">{{ $reservation_form->previous_step_button }}</button>
                        @endif
                        @if($currentStep < $totalSteps)
                            <button wire:click.prevent="nextStep" > {{ $reservation_form->next_step_button }} </button>
                        @endif

                        @if($currentStep == $totalSteps)
                            <button wire:click.prevent="createBooking" > {{ $reservation_form->make_prebooking_button }} </button>
                        @endif
                    </div>
            </form>

        </div>
    </div>
</body>
<script src="{{ asset('js/searchbox.js') }}"></script>
</html>

