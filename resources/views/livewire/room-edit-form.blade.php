{{--<div class="mbfContainer">--}}
{{--<form wire:submit.prevent="save" method="post" class="mainBackEndForm">--}}
{{--    @csrf--}}
{{--    @if (session('success'))--}}
{{--        <div class="alert alert-success">--}}
{{--            {{ session('success') }}--}}
{{--        </div>--}}
{{--    @endif--}}

{{--    @if (session('error'))--}}
{{--        <div class="alert alert-error">--}}
{{--            {{ session('error') }}--}}
{{--        </div>--}}
{{--    @endif--}}
{{--    <h2> Φόρμα επεξεργασίας δωματίου <br><span style="font-size: 18px">Επιλεγμένο Δωμάτιο: {{ $room->name }}</span></h2>--}}
{{--    <div class="input-group-block">--}}
{{--        <label for="name"> Όνομα (Αγγλικά): </label>--}}
{{--        @error('name')--}}
{{--        <span class="error"> {{ $message }} </span>--}}
{{--        @enderror--}}
{{--        <input type="text" name="name" wire:model="name" style="width: 100%; box-sizing: border-box;" placeholder="Όνομα δωματίου">--}}
{{--    </div>--}}
{{--    <div class="input-group-block">--}}
{{--        <label for="max_occupants"> Άτομα: </label>--}}
{{--        @error("max_occupants")--}}
{{--        <span class="error"> {{ $message }} </span>--}}
{{--        @enderror--}}
{{--        <input type="number" name="max_occupants" style="width: 100%; box-sizing: border-box" wire:model="max_occupants" placeholder="άτομα..">--}}
{{--    </div>--}}
{{--    <div class="input-group-block">--}}
{{--        <label for="number"> Αριθμός δωματίων: </label>--}}
{{--        @error("number")--}}
{{--        <span class="error"> {{ $message }} </span>--}}
{{--        @enderror--}}
{{--        <input type="number" name="number" wire:model="number" style="width: 100%; box-sizing: border-box" placeholder="Πόσα ίδια δωμάτια διαθέτετε στη μονάδα σας;">--}}
{{--    </div>--}}

{{--    <div class="input-group-block">--}}
{{--        <label for="independent" style="display: inline-block"> Αυτόνομο : </label>--}}
{{--        @error('independent')--}}
{{--        <span class="error" > {{ $message }} </span>--}}
{{--        @enderror--}}
{{--        &nbsp;--}}
{{--        <input type="checkbox" id="independent" style="display: inline-block" wire:model="independent"  name="independent">--}}
{{--    </div>--}}

{{--    <div class="input-group-block">--}}
{{--        <label for="is_available" style="display: inline-block"> Διαθέσιμο :</label>--}}
{{--        @error('independent')--}}
{{--        <span class="error"> {{ $message }}</span>--}}
{{--        @enderror--}}
{{--        &nbsp;--}}
{{--        <input type="checkbox" id="is_available" style="display: inline-block" wire:model="is_available" name="is_available" >--}}
{{--    </div>--}}


{{--    <div class="input-group-block">--}}
{{--        <button type="submit" style="margin-inline: .4rem; margin-block : .4rem; position: relative; display: block"> Αποθήκευση </button>--}}
{{--    </div>--}}

{{--    --}}{{--    <div class="input_group inline">--}}
{{--    --}}{{--        <label for="independent"> Αυτόνομο. </label>--}}
{{--    --}}{{--        @error('independent')--}}
{{--    --}}{{--        <span class="error"> {{ $message }} </span>--}}
{{--    --}}{{--        @enderror--}}
{{--    --}}{{--        <input type="" name="independent" placeholder="άτομα..">--}}
{{--    --}}{{--    </div>--}}
{{--    --}}{{-- SAMPLE --}}

{{--</form>--}}

{{--</div>--}}
    <form wire:submit.prevent="save" method="post" class="space-y-6 bg-white p-6 max-w-fit m-auto rounded-md shadow-sm">
        @csrf
        <!-- Success/Failure Messages -->
        @if (session('success'))
            <div class="p-4 bg-green-100 text-green-700 rounded-md">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="p-4 bg-red-100 text-red-700 rounded-md">
                {{ session('error') }}
            </div>
        @endif

        <!-- Header -->
        <h2 class="text-2xl font-semibold text-gray-800">Φόρμα Επεξεργασίας Δωματίου</h2>
        <p class="text-gray-600 text-sm">Επιλεγμένο Δωμάτιο: <span class="font-medium text-gray-800">{{ $room->name }}</span></p>

        <!-- Room Name -->
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Όνομα (Αγγλικά):</label>
            <input type="text" name="name" wire:model="name" placeholder="Όνομα δωματίου"
                   class="w-full px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500">
            @error('name')
            <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
            @enderror
        </div>

        <!-- Max Occupants -->
        <div>
            <label for="max_occupants" class="block text-sm font-medium text-gray-700 mb-1">Άτομα:</label>
            <input type="number" name="max_occupants" wire:model="max_occupants" placeholder="άτομα.."
                   class="w-full px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500">
            @error('max_occupants')
            <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
            @enderror
        </div>

        <!-- Number of Rooms -->
        <div>
            <label for="number" class="block text-sm font-medium text-gray-700 mb-1">Αριθμός Δωματίων:</label>
            <input type="number" name="number" wire:model="number" placeholder="Πόσα ίδια δωμάτια διαθέτετε στη μονάδα σας;"
                   class="w-full px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500">
            @error('number')
            <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
            @enderror
        </div>

        <!-- Independent Checkbox -->
        <div class="flex items-center">
            <input type="checkbox" id="independent" name="independent" wire:model="independent"
                   class="h-5 w-5 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
            <label for="independent" class="ml-2 text-gray-700 font-medium">Αυτόνομο</label>
            @error('independent')
            <span class="text-red-500 text-sm ml-4">{{ $message }}</span>
            @enderror
        </div>

        <!-- Is Available Checkbox -->
        <div class="flex items-center">
            <input type="checkbox" id="is_available" name="is_available" wire:model="is_available"
                   class="h-5 w-5 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
            <label for="is_available" class="ml-2 text-gray-700 font-medium">Διαθέσιμο</label>
            @error('is_available')
            <span class="text-red-500 text-sm ml-4">{{ $message }}</span>
            @enderror
        </div>

        <!-- Submit Button -->
        <div>
            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-md shadow hover:bg-blue-700 focus:ring focus:ring-blue-500">
                Αποθήκευση
            </button>
        </div>
    </form>
