{{--<div class="reservation_admin">--}}
{{--    <div class="modal-bg" id="mfparent">--}}
{{--        <div class="modal-container-form" >--}}
{{--            <div class="modal-form-elems">--}}
{{--                <h3>PDF Voucher Properties</h3>--}}
{{--                <button onclick="hideModalForm()" id="hideFormButton" class="" style="line-height: 0;padding:0;padding-top:.3rem;"><i class="material-symbols-outlined" style="line-height: 0; padding:0; margin: 0;">close</i></button>--}}
{{--            </div>--}}
{{--            <form class="modal-form">--}}
{{--                <div class="input-group-inline">--}}
{{--                    <span>Guest Name</span> : <input wire:model="guest_name_mf" id="guest_name">--}}
{{--                </div>--}}
{{--                <div class="input-group-inline">--}}
{{--                    <span>Arrival Date</span> : <input wire:model="arrival_date_mf" id="arr_date">--}}
{{--                </div>--}}
{{--                <div class="input-group-inline">--}}
{{--                    <span>Departure Date</span> : <input wire:model="departure_date_mf" id="dep_date">--}}
{{--                </div>--}}
{{--                <div class="input-group-inline">--}}
{{--                    <span>No of Guests</span> : <input wire:model="no_of_guests_mf" id="nofguests">--}}
{{--                </div>--}}
{{--                <div class="input-group-inline">--}}
{{--                    <span>No of Rooms</span> : <input wire:model="nr_rooms_mf" id="nofrooms">--}}
{{--                </div>--}}
{{--                <div class="input-group-inline">--}}
{{--                    <span>Room Type</span> : <input wire:model="room_type_mf" id="room_tp">--}}
{{--                </div>--}}
{{--                <div class="input-group-inline">--}}
{{--                    <span>Total Cost</span> : <input wire:model="total_cost_mf" id="total_cost">--}}
{{--                </div>--}}
{{--                <div class="input-group-inline">--}}
{{--                    <span>Payment in Advance</span> : <input wire:model="payment_in_advance_mf" id="payment_in_advance">--}}
{{--                </div>--}}
{{--                <div class="input-group-inline">--}}
{{--                    <span>Reservation Number</span> : <input wire:model="reservation_number_mf" id="reservation_number">--}}
{{--                </div>--}}
{{--                <div class="input-group-inline">--}}
{{--                    <span>Receipt Number</span> : <input wire:model="hotel_receipt_number_mf" id="hotel_receipt">--}}
{{--                </div>--}}
{{--                <div class="input-group-inline">--}}
{{--                    <span>Booking Date</span> : <input wire:model="booking_date_mf" id="booking_date">--}}
{{--                </div>--}}
{{--                <div class="input-group-inline">--}}
{{--                    <span>Check-in Time</span> : <input wire:model="check_in_time_mf" id="check_in_time">--}}
{{--                </div>--}}
{{--                <div class="input-group-inline">--}}
{{--                    <span>Check-out Time</span> : <input wire:model="check_out_time_mf" id="guest_name">--}}
{{--                </div>--}}

{{--                <div class="button-group inline" style="display: flex; flex-direction: row; overflow: hidden; justify-content: right; padding-block: .7rem;">--}}
{{--                    <button style="margin-inline: .2rem; color:white; background-color: #545454;" onclick="hideModalForm()" wire:click.prevent="" name="hideModal" class="hideFormButton">Κλείσιμο</button>--}}
{{--                    <button style="margin-inline: .2rem; color:white; background-color: #545454;" wire:click.prevent="createVoucher" name="hideModal" class="hideFormButton">Download PDF</button>--}}
{{--                </div>--}}
{{--            </form>--}}
{{--        </div>--}}
{{--    </div> --}}{{-- MODAL END --}}
{{--            <div class="title"><h3> Κράτηση: {{ $booking->id }} </h3></div>--}}

{{--            <div class="main_info">--}}

{{--                <disv class="box">--}}
{{--                    <div class="info_group" >--}}
{{--                        <span class="label"> Τύπος Δωματίου: </span>--}}
{{--                        <span class="info"> {{ $room_type }}</span>--}}
{{--                    </div>--}}
{{--                    <div class="info_group" >--}}
{{--                        <span class="label"> Αρ. Δωματίων: </span>--}}
{{--                        <span class="info"> {{ $booking->nr_rooms }} </span>--}}
{{--                    </div>--}}
{{--                    <div class="info_group" >--}}
{{--                        <span class="label"> Ενήλικες: </span>--}}
{{--                        <span class="info"> {{ $booking->adults }} </span>--}}
{{--                    </div>--}}
{{--                    <div class="info_group" >--}}
{{--                        <span class="label"> Παιδιά: </span>--}}
{{--                        <span class="info"> {{ $booking->children }} </span>--}}
{{--                    </div>--}}
{{--                    <div class="info_group" >--}}
{{--                        <span class="label"> Πρώτη διανυκτέρευση: </span>--}}
{{--                        <span class="info"> {{ \Carbon\Carbon::createFromFormat('Y-m-d',$booking->check_in_date)->format('d-m-Y') }} </span>--}}
{{--                    </div>--}}
{{--                    <div class="info_group" >--}}
{{--                        <span class="label"> Τελευταία διανυκτέρευση: </span>--}}
{{--                        <span class="info"> {{ \Carbon\Carbon::createFromFormat('Y-m-d',$last_night)->format('d-m-Y') }} </span>--}}
{{--                    </div>--}}
{{--                    <div class="info_group" >--}}
{{--                        <span class="label"> Check Out: </span>--}}
{{--                        <span class="info"> {{ \Carbon\Carbon::createFromFormat('Y-m-d',$booking->check_out_date)->format('d-m-Y') }} </span>--}}
{{--                    </div>--}}
{{--                    <div class="info_group" >--}}
{{--                        <span class="label"> Συνολικές Διανυκτερεύσεις:  </span>--}}
{{--                        <span class="info"> {{ $total_nights }} </span>--}}
{{--                    </div>--}}
{{--                    <div class="info_group" >--}}
{{--                        <span class="label"> Ώρα Άφηξης:  </span>--}}
{{--                        <span class="info"> {{ $booking->estimated_arrival_time }} </span>--}}
{{--                    </div>--}}
{{--                </disv>--}}

{{--                <div class="box">--}}
{{--                    <div class="info_group">--}}
{{--                        <span class="label"> Ονοματεπώνυμο Πελάτη:  </span>--}}
{{--                        <span class="info"> {{$booking->name}} {{ $booking->surname }} </span>--}}
{{--                    </div>--}}
{{--                    <div class="info_group" >--}}
{{--                        <span class="label"> Τηλέφωνο: </span>--}}
{{--                        <span class="info"> {{ $country->phone_prefix ?? 'n/a' }} {{ $booking->telephone }}  </span>--}}
{{--                    </div>--}}
{{--                    <div class="info_group" >--}}
{{--                        <span class="label"> Χώρα:  </span>--}}
{{--                        <span class="info"> {{  $country->name ?? 'n/a' }} </span>--}}
{{--                    </div>--}}
{{--                    <div class="info_group" >--}}
{{--                        <span class="label"> Email: </span>--}}
{{--                        <span class="info"> {{  $booking->email }} </span>--}}
{{--                    </div>--}}

{{--                    <div class="info_group" >--}}
{{--                        <span class="label"> Απεσταλμένα Email: </span>--}}
{{--                        <span class="info"> {{ '-' }}</span>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--            </div>--}}
{{--            <div class="general_booking_separator"> <h3> Σχόλια Πελάτη </h3></div>--}}
{{--            <div class="standalone_section client-comments">--}}
{{--                <p>{{  $booking->special_request }}</p>--}}
{{--            </div>--}}
{{--            <div class="general_booking_separator"> <h3> Πληροφορίες Πληρωμής - Προπληρωμής </h3></div>--}}
{{--            <div class="standalone_section">--}}
{{--                <div class="info_group">--}}
{{--                    <span class="label"> Συνολικό ποσό: </span>--}}
{{--                    <span class="info"> {{    number_format($booking->final_rate,2) }}€ </span>--}}
{{--                </div>--}}
{{--                <div class="info_group">--}}
{{--                    <span class="label"> Προκαταβολή(30%): </span>--}}
{{--                    <span class="info"> {{  number_format($booking->prepayment,2) }}€ </span>--}}
{{--                </div>--}}
{{--                <div class="info_group">--}}
{{--                    <span class="label"> Τρόπος πληρωμής: </span>--}}
{{--                    <span class="info"> {{ $booking->payment_method }}--}}
{{--<div x-data="{ showPasswordPrompt: false, password: '' }">--}}
{{--                        <table class="card-details">--}}
{{--                            @if($card != null)--}}
{{--                                <tr>--}}
{{--                                <td>Αριθμός Κάρτας:</td> <td>{{ $card->card_number }}</td>--}}
{{--                                </tr>--}}
{{--                                <tr>--}}
{{--                                <td> Όνομα κατόχου:</td><td>  {{ $card->card_holder_name }}</td>--}}
{{--                                </tr>--}}
{{--                                <tr>--}}
{{--                                <td>Ημ. Λήξης:</td> <td>{{ $card->card_exp_month }} / {{ $card->card_exp_year }}</td>--}}
{{--                                </tr>--}}
{{--                                <tr>--}}
{{--                                <td>CVV:</td><td> {{ $card->card_cvv }}</td>--}}
{{--                                </tr>--}}
{{--                                @endif--}}
{{--                        </table>--}}
{{--                        @if($has_payment_details)--}}
{{--                            <form class="inline-form-1">--}}
{{--                            <button wire:click.prevent="showCardDetails" class="show-payment-details">--}}
{{--                                Προβολή Κάρτας--}}
{{--                            </button>--}}
{{--                                <input type="password" name="password" wire:model="password">--}}
{{--                            </form>--}}
{{--                        @endif--}}

{{--    <button wire:click="triggerPasswordPrompt">Protected Action</button>--}}


{{--</div>--}}

{{--                    </span>--}}
{{--                </div>--}}
{{--                <div class="info_group">--}}
{{--                    <span class="label"> Κωδικός κράτησης: </span>--}}
{{--                    <span class="info"> {{  $booking->id }} </span>--}}
{{--                </div>--}}
{{--                <div class="info_group">--}}
{{--                    <span class="label"> ------- </span>--}}
{{--                    <span class="info"> </span>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--    <div class="general_booking_separator"> <h3> Διαχείριση Κράτησης </h3></div>  Sigrisi kratisewn apo booking edwwwww --}}

{{--    <div class="standalone_section">--}}
{{--        <div class="info_group">--}}
{{--            <button @if($booking->status !== "pending") class="green" @else class="red" @endif @if($booking->status === "pending") wire:click.prevent="acceptCurrentBooking"--}}
{{--                {!! ' disabled="true" ' !!}--}}
{{--                @endif--}}

{{--            > Αποδοχή Κράτησης </button>--}}

{{--            <button class="dark-red" wire:click.prevent="cancelCurrentBooking"> Ακύρωση Κράτησης </button>--}}


{{--                {{ dd($booking->status) }}--}}
{{--            <a href="/easyupdate/booking/print/{{ $booking->id }}" target="_blank"><button class="" href="/easyupdate/booking/print/{{ $booking->id }}"> Εκτύπωση Κράτησης </button></a>--}}
{{--            <button class="" onclick="hideModalForm()"> PDF Voucher </button>--}}
{{--        </div>--}}
{{--        <div class="info_group">--}}
{{--            <form wire:submit.prevent="sendEmail" class="sendMailForm">--}}
{{--                <label> Αποστολή Email για αποδοχή κράτησης: </label>--}}
{{--                <input type="email" wire:model="selected_email" placeholder="Εισάγετε το E-mail του πελάτη!">--}}
{{--                <button type="submit"> Αποστολή! </button>--}}

{{--                <h4 class="fw-500"> Τελευταία αποστολή: {{ $booking->last_sent_email }} </h4>--}}
{{--            </form>--}}
{{--        </div>--}}
{{--    </div>--}}


{{--<script>--}}
{{--    function hideModalForm(){--}}
{{--        let mf = document.getElementById('mfparent');--}}
{{--        mf.classList.toggle('shown');--}}
{{--    }--}}
{{--</script>--}}

{{--</div>--}}

    <div class="p-6 w-full h-screen">
        <div class="bg-gray-800 text-white p-4 rounded-lg shadow-lg w-full flex justify-between items-center mb-6">
            <h1 class="text-xl font-bold">Κράτηση: <span class="text-green-400">{{ $booking->id }}</span></h1>
            <div class=" text-white px-4 py-2 rounded shadow @if($booking->status=='prepayment') bg-orange-500 @elseif($booking->status=='pending') bg-red-400 @elseif($booking->status=='completed') bg-green-500 @else bg-yellow-500 @endif">
                @if($booking->status=='prepayment') Εκκρεμεί Πληρωμή @elseif($booking->status=='pending') Νέα Κράτηση @elseif($booking->status=='completed') Ολοκληρωμένη @else Ακυρωμένη @endif</div>
        </div>

        <!-- Booking Information -->
        <div class="bg-white p-6 rounded-lg shadow-lg mb-6">
            <h2 class="text-lg font-bold text-gray-800 mb-4">Πληροφορίες</h2>
            <div class="grid grid-cols-2 gap-4">
                <div class="text-gray-700 border-b border-gray-400"><div class="w-56 inline-block  "><strong>Τύπος δωματίου: </strong></div> <span class="inline-block ">{{ $room_type }}</span></div>
                <div class="text-gray-700 border-b border-gray-400 "><div class="w-56 inline-block"><strong>Ονοματεπώνυμο Πελάτη:</strong> </div> {{$booking->name}} {{ $booking->surname }}</div>
                <div class="text-gray-700 border-b border-gray-400"><div class="w-56 inline-block"><strong>Αρ. Δωματίων:</strong></div> <span class="w-1/2"> {{ $booking->nr_rooms }}</span></div>
                <div class="text-gray-700 border-b border-gray-400"><div class="w-56 inline-block"><strong>Τηλέφωνο:</strong> </div> {{ $country->phone_prefix ?? 'n/a' }} {{ $booking->telephone }}</div>
                <div class="text-gray-700 border-b border-gray-400"> <div class="w-56 inline-block"><strong>Ενήλικες:</strong></div> {{ $adults ?? 'N/A' }}</div>
                <div class="text-gray-700 border-b border-gray-400"><div class="w-56 inline-block"><strong>Χώρα:</strong> </div> {{  $country->name ?? 'n/a' }}</div>
                <div class="text-gray-700 border-b border-gray-400"><div class="w-56 inline-block"><strong>Παιδιά:</strong></div> {{ $kids ?? 'N/A' }}</div>
                <div class="text-gray-700 border-b border-gray-400"><div class="w-56 inline-block"><strong>Email:</strong> </div> <a class="text-blue-500 hover:text-blue-700 transition ease-in" href="mailto:{{ $booking->email }}"> {{ $booking->email }} </a>  </div>
                <div class="text-gray-700 border-b border-gray-400"><div class="w-56 inline-block"><strong>Πρώτη διανυκτέρευση:</strong> </div> {{ \Carbon\Carbon::createFromFormat('Y-m-d',$booking->check_in_date)->format('d-m-Y') }}</div>
                <div class="text-gray-700 border-b border-gray-400"><div class="w-56 inline-block"><strong>Απεσταλμένα Email:</strong></div> - </div>
                <div class="text-gray-700 border-b border-gray-400"><div class="w-56 inline-block"><strong>Τελευταία διανυκτέρευση:</strong> </div> {{ \Carbon\Carbon::createFromFormat('Y-m-d',$last_night)->format('d-m-Y') }}</div>
                <div class="text-gray-700"><div class="w-56 inline-block"> &nbsp;</div></div>
                <div class="text-gray-700 border-b border-gray-400"><div class="w-56 inline-block"><strong>Check-out: </strong></div> {{ \Carbon\Carbon::createFromFormat('Y-m-d',$booking->check_out_date)->format('d-m-Y') }} </div>
                    <div class="text-gray-700"><div class="w-56 inline-block"> &nbsp;</div></div>
                <div class="text-gray-700 border-b border-gray-400"><div class="w-56 inline-block"><strong>Συνολικές διανυκτερεύσεις:</strong> </div> {{ $total_nights  ?? 'N/A'}}</div>
                        <div class="text-gray-700"><div class="w-56 inline-block"> &nbsp;</div></div>
                <div class="text-gray-700 border-b border-gray-400"><div class="w-56 inline-block"><strong>Ώρα Άφιξης</strong> </div> {{ $booking->estimated_arrival_time ?? 'N/A'}}</div>




{{--                <div class="text-gray-700"><strong>Total Cost:</strong> $200</div>--}}
            </div>
        </div>

        <!-- Comments Section -->
        <div class="bg-white p-6 rounded-lg shadow-lg mb-6">
            <h2 class="text-lg font-bold text-gray-800 mb-4">Σχόλια πελάτη</h2>
            <textarea readonly class="w-full p-4 border rounded-lg bg-gray-100 text-gray-700">{{  $booking->special_request }}</textarea>
        </div>
        <!-- Payment details -->
        <div class="bg-white p-6 rounded-lg shadow-lg mt-6 mb-6">
            <h3 class="text-lg font-bold text-gray-800 mb-4">Πληροφορίες Πληρωμής - Προπληρωμής</h3>

            <!-- Payment Info Section -->
            <div class="grid grid-cols-2 gap-4 mb-4">
                <div>
                    <span class="font-semibold text-gray-700">Συνολικό ποσό:</span>
                    <span class="text-gray-800">{{ number_format($booking->final_rate, 2) }}€</span>
                </div>
                <div>
                    <span class="font-semibold text-gray-700">Προκαταβολή (30%):</span>
                    <span class="text-gray-800">{{ number_format($booking->prepayment, 2) }}€</span>
                </div>
                <div>
                    <span class="font-semibold text-gray-700">Τρόπος πληρωμής:</span>
                    <span class="text-gray-800">{{ $booking->payment_method }}</span>
                </div>
                <div>
                    <span class="font-semibold text-gray-700">Κωδικός κράτησης:</span>
                    <span class="text-gray-800">{{ $booking->id }}</span>
                </div>
            </div>

            <!-- Card Details Section -->
            @if($has_payment_details == true)
{{--                <button--}}
{{--                    @click="showPasswordPrompt = !showPasswordPrompt"--}}
{{--                    class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg transition duration-300">--}}
{{--                    Προβολή Κάρτας--}}
{{--                </button>--}}
            <form x-data="{ showPasswordPrompt: false, password: '', showCard: false }">

                @endif
                <!-- Password Prompt -->
                <form x-show="showPasswordPrompt" class="mt-4 p-4 bg-gray-100 rounded-lg shadow-inner">
                    <label for="password" class="block text-gray-700 font-semibold mb-2">Κωδικός επαλήθευσης:</label>
                    <input
                        type="password"

                        wire:model="password"
                        id="password"
                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        placeholder="Enter your password">
                    <button
                        wire:click.prevent="showCardDetails()"
                        class="mt-2 bg-green-700 hover:bg-green-800 text-white px-4 py-2 rounded-lg transition duration-300">
                        Υποβολή
                    </button>

                </form>

                <!-- Card Details -->

                <div x-show="showCard" class="mt-6">
                    <table class="w-full border border-gray-300">
                        @if($card != null)
                        <thead class="bg-gray-200">
                        <tr>
                            <th class="p-3 text-left border border-gray-300">Πεδίο</th>
                            <th class="p-3 text-left border border-gray-300">Πληροφορία</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="p-3 border border-gray-300">Αριθμός Κάρτας:</td>
                            <td class="p-3 border border-gray-300">{{ $card->card_number }}</td>
                        </tr>
                        <tr>
                            <td class="p-3 border border-gray-300">Όνομα Κατόχου:</td>
                            <td class="p-3 border border-gray-300">{{ $card->card_holder_name }}</td>
                        </tr>
                        <tr>
                            <td class="p-3 border border-gray-300">Ημ. Λήξης:</td>
                            <td class="p-3 border border-gray-300">{{ $card->card_exp_month }} / {{ $card->card_exp_year }}</td>
                        </tr>
                        <tr>
                            <td class="p-3 border border-gray-300">CVV:</td>
                            <td class="p-3 border border-gray-300">{{ $card->card_cvv }}</td>
                        </tr>
                        </tbody>
                        @endif
                    </table>
                    @if($card != null)

                        <button class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition duration-300 mt-4"  {{ $card->card_cvv != null ?'readonly': '' }} wire:click.prevent="deleteCVV" >Delete CVV</button>
                        <button class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition duration-300 mt-4" {{ $card->card_exp_month != null ? 'readonly' : ''}} wire:click.prevent="deleteExpDate">Delete Exp. Date</button>
                    @endif
                </div>



        </div>

        <!-- Actions Section -->
        <div class="bg-white p-6 rounded-lg shadow-lg mb-6">
            <h2 class="text-lg font-bold text-gray-800 mb-4">Διαχείριση κράτησης</h2>
            <div class="flex space-x-4">
                <button class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition duration-300" @if($booking->status != 'pending') disabled @endif wire:click.prevent="acceptCurrentBooking" >Accept Booking</button>
                <button class="bg-red-700 text-white px-4 py-2 rounded-lg hover:bg-red-800 transition duration-300"  wire:click.prevent="cancelCurrentBooking">Cancel Booking</button>
                <a class="bg-gray-400 text-white px-4 py-2 rounded-lg hover:bg-gray-500 transition duration-300 cursor-pointer" href="/admin/booking/print/{{ $booking->id }}" target="_blank">Print Booking</a>
                <button class="bg-gray-700 text-white px-4 py-2 rounded-lg hover:bg-gray-800 transition duration-300" onclick="openPdfModal()">Download PDF</button>
            </div>
        </div>

        <!-- Email Section -->
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h2 class="text-lg font-bold text-gray-800 mb-4">Send Email</h2>
            <form wire:submit.prevent="sendEmail" class="flex items-center space-x-4 mb-4">
                <input type="email" wire:model="selected_email" placeholder="π.χ johndoe@example.com" wire:model="selected_email" class="flex-1 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none">
                <select class="px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none" readonly>
                    <option value="">Select Email Template</option>
                    <option value="confirmation">Booking Confirmation</option>
                    <option value="cancellation">Booking Cancellation</option>
                    <option value="reminder">Booking Reminder</option>
                </select>
                <button class="bg-indigo-500 text-white px-4 py-2 rounded-lg hover:bg-indigo-600 transition duration-300">Send Email</button>
            </form>
            <p class="block bg-gray-300 w-fit rounded p-3">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 inline">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 3.75H6.912a2.25 2.25 0 0 0-2.15 1.588L2.35 13.177a2.25 2.25 0 0 0-.1.661V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18v-4.162c0-.224-.034-.447-.1-.661L19.24 5.338a2.25 2.25 0 0 0-2.15-1.588H15M2.25 13.5h3.86a2.25 2.25 0 0 1 2.012 1.244l.256.512a2.25 2.25 0 0 0 2.013 1.244h3.218a2.25 2.25 0 0 0 2.013-1.244l.256-.512a2.25 2.25 0 0 1 2.013-1.244h3.859M12 3v8.25m0 0-3-3m3 3 3-3" />
                </svg>

                Τελευταία αποστολή: {{ $booking->last_sent_email ?? 'Δεν έχει γίνει' }}
            </p>
        </div>

        <div id="pdf-modal" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center hidden">
            <div class="bg-white pb-6 rounded-lg shadow-lg w-full max-w-2xl">
                <div class="bg-gray-800 text-white p-4 rounded-t-lg flex justify-between items-center">
                    <h2 class="text-lg font-bold">Download PDF</h2>
                    <button class="text-white text-xl hover:text-gray-400 transition duration-300" onclick="closePdfModal()">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-gray-200">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                        </svg>

                    </button>
                </div>
                <form class="pt-6 px-5">
                    <div class="space-y-4">
                        <!-- Input Groups -->
                        <div class="flex items-center space-x-4">
                            <label for="guest-name" class="w-1/2 text-gray-700 font-semibold">Guest Name</label>
                            <input type="text" id="guest-name" wire:model="guest_name_mf" class="w-1/2 px-4 py-2 border rounded-lg"  value="John Doe">
                        </div>
                        <div class="flex items-center space-x-4">
                            <label for="arrival-date" class="w-1/2 text-gray-700 font-semibold">Arrival Date</label>
                            <input type="text" id="arrival-date" wire:model="arrival_date_mf" class="w-1/2 px-4 py-2 border rounded-lg" value="2024-11-20">
                        </div>
                        <div class="flex items-center space-x-4">
                            <label for="departure-date" class="w-1/2 text-gray-700 font-semibold">Departure Date</label>
                            <input type="text" id="departure-date" wire:model="departure_date_mf" class="w-1/2 px-4 py-2 border rounded-lg"  value="2024-11-23">
                        </div>
                        <div class="flex items-center space-x-4">
                            <label for="num-guests" class="w-1/2 text-gray-700 font-semibold">Number of Guests</label>
                            <input type="text" id="num-guests" wire:model="no_of_guests_mf" class="w-1/2 px-4 py-2 border rounded-lg" value="2">
                        </div>
                        <div class="flex items-center space-x-4">
                            <label for="num-rooms" class="w-1/2 text-gray-700 font-semibold">Number of Rooms</label>
                            <input type="text" id="num-rooms" wire:model="nr_rooms_mf" class="w-1/2 px-4 py-2 border rounded-lg"  value="1">
                        </div>
                        <div class="flex items-center space-x-4">
                            <label for="room-type" class="w-1/2 text-gray-700 font-semibold">Room Type</label>
                            <input type="text" id="room-type" wire:model="room_type_mf" class="w-1/2 px-4 py-2 border rounded-lg"  value="Deluxe">
                        </div>
                        <div class="flex items-center space-x-4">
                            <label for="total-cost" class="w-1/2 text-gray-700 font-semibold">Total Cost</label>
                            <input type="text" id="total-cost" wire:model="total_cost_mf" class="w-1/2 px-4 py-2 border rounded-lg"  value="$200">
                        </div>
                        <div class="flex items-center space-x-4">
                            <label for="payment-advance" class="w-1/2 text-gray-700 font-semibold">Payment in Advance</label>
                            <input type="text" id="payment-advance" wire:model="payment_in_advance_mf" class="w-1/2 px-4 py-2 border rounded-lg" value="$50">
                        </div>
                        <div class="flex items-center space-x-4">
                            <label for="reservation-number" class="w-1/2 text-gray-700 font-semibold">Reservation Number</label>
                            <input type="text" id="reservation-number" wire:model="reservation_number_mf" class="w-1/2 px-4 py-2 border rounded-lg"  value="#12345ABC">
                        </div>
                        <div class="flex items-center space-x-4">
                            <label for="receipt-number" class="w-1/2 text-gray-700 font-semibold">Receipt Number</label>
                            <input type="text" id="receipt-number" wire:model="hotel_receipt_number_mf" class="w-1/2 px-4 py-2 border rounded-lg" value="#98765XYZ">
                        </div>
                        <div class="flex items-center space-x-4">
                            <label for="booking-date" class="w-1/2 text-gray-700 font-semibold">Booking Date</label>
                            <input type="text" id="booking-date" wire:model="booking_date_mf" class="w-1/2 px-4 py-2 border rounded-lg" value="2024-11-15">
                        </div>
                        <div class="flex items-center space-x-4">
                            <label for="checkin-time" class="w-1/2 text-gray-700 font-semibold">Check-In Time</label>
                            <input type="text" id="checkin-time" wire:model="check_in_time_mf" class="w-1/2 px-4 py-2 border rounded-lg" value="10:00 AM">
                        </div>
                        <div class="flex items-center space-x-4">
                            <label for="checkout-time" class="w-1/2 text-gray-700 font-semibold">Check-Out Time</label>
                            <input type="text" id="checkout-time" wire:model="check_out_time_mf" class="w-1/2 px-4 py-2 border rounded-lg" value="12:00 PM">
                        </div>
                    </div>
                    <!-- Modal Buttons -->
                    <div class="flex justify-end mt-6 space-x-4">
                        <button type="button" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition duration-300" onclick="closePdfModal()">Cancel</button>
                        <button type="submit" class="bg-gray-700 text-white px-4 py-2 rounded-lg hover:bg-gray-800 transition duration-300" wire:click.prevent="createVoucher" >Download PDF</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
