{{--<div class="form-container-rr">--}}
{{--    @if (session('success'))--}}
{{--        <div  class="alert alert-success">--}}
{{--            {{ session('success') }}--}}
{{--        </div>--}}
{{--    @endif--}}

{{--    @if (session('error'))--}}
{{--        <div class="alert alert-error">--}}
{{--            {{ session('error') }}--}}
{{--        </div>--}}
{{--    @endif--}}


{{--    <h2> Φόρμα επεξεργασίας τιμών δωματίων </h2>--}}
{{--        --}}{{-- ΒΑΛΕ ΙΝΦΟ ICON GIA NA KSEREI O XRISTIS TI KANEI!@!!!!!! --}}
{{--        <form wire:submit.prevent="save" class="room-rates-form">--}}

{{--            <div class="room-row">--}}
{{--                <h3>{{ 'Δωμάτια / Μήνες' }}</h3>--}}
{{--                <div class="row">--}}
{{--                    @for ($month = 1; $month <= 12; $month++)--}}
{{--                        <div class="mini-col-top">--}}
{{--                            <label >{{ date('M', mktime(0, 0, 0, $month, 1)) }}</label>--}}

{{--                        </div>--}}
{{--                    @endfor--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            @foreach ($rooms as $room)--}}
{{--                <div class="room-row">--}}
{{--                    <h3>{{ $room->name }}</h3>--}}
{{--                    <div class="row">--}}
{{--                        @for ($month = 1; $month <= 12; $month++)--}}
{{--                            <div class="mini-col">--}}
{{--                                <label for="rate_{{ $room->id }}_{{ $month }}"> &nbsp;</label> --}}{{-- {{ date('M', mktime(0, 0, 0, $month, 1)) }} --}}
{{--                                <input type="number" id="rate_{{ $room->id }}_{{ $month }}"--}}
{{--                                       wire:model.defer="monthlyRates.{{ $room->id }}.{{ $month }}">--}}
{{--                            </div>--}}
{{--                        @endfor--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            @endforeach--}}
{{--            <button type="submit" class="update-rates">Αποθήκευση</button>--}}
{{--        </form>--}}





{{--</div>--}}
<div class="p-8 bg-gray-100 min-h-screen max-h-screen">
    <div class="max-w-8xl mx-auto bg-white p-6 rounded-lg shadow-lg">
        <!-- Success and Error Alerts -->
        @if (session('success'))
            <div class="mb-4 px-4 py-2 text-white bg-green-500 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="mb-4 px-4 py-2 text-white bg-red-500 rounded-lg">
                {{ session('error') }}
            </div>
        @endif

        <!-- Form Header -->
        <h2 class="text-2xl font-semibold text-gray-800 mb-6">Φόρμα Επεξεργασίας Τιμών Δωματίων</h2>

        <!-- Table -->
        <form wire:submit.prevent="save">
            <div class="overflow-x-auto">
                <table class="w-full border-collapse border border-gray-300 rounded-lg shadow">
                    <thead>
                    <tr class="bg-gray-200">
                        <th class="px-4 py-2 text-left text-gray-700 font-medium">Δωμάτια / Μήνες</th>
                        @for ($month = 1; $month <= 12; $month++)
                            <th class="px-4 py-2 text-center text-gray-700 font-medium">
                                {{ date('M', mktime(0, 0, 0, $month, 1)) }}
                            </th>
                        @endfor
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-300">
                    @foreach ($rooms as $room)
                        <tr class="hover:bg-gray-50 odd:bg-blueGray-300 odd:hover:bg-blueGray-400">
                            <!-- Room Name -->
                            <td class="px-4 py-2 text-gray-700 font-medium">{{ $room->name }}</td>
                            <!-- Monthly Rates -->
                            @for ($month = 1; $month <= 12; $month++)
                                <td class="px-4 py-2 max-w-20">
                                    <input type="number" id="rate_{{ $room->id }}_{{ $month }}"
                                           wire:model.defer="monthlyRates.{{ $room->id }}.{{ $month }}"
                                           class="w-full min-w-20 px-2 py-1 border rounded-lg text-gray-700 focus:ring-blue-500 focus:border-blue-500 text-center">
                                </td>
                            @endfor
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Submit Button -->
            <div class="text-center mt-6">
                <button type="submit" class="px-6 w-64 py-2 bg-orange-600 text-white font-medium rounded-lg shadow hover:bg-orange-700 focus:ring focus:ring-blue-500">
                    Αποθήκευση
                </button>
            </div>
        </form>
    </div>
</div>
