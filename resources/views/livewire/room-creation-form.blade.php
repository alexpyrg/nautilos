{{--<form wire:submit.prevent="save" method="post">--}}
{{--    <h2> Φόρμα δημιουργίας δωματίου.</h2>--}}
{{--    <div class="input_group block">--}}
{{--        <label for="name"> Όνομα (Αγγλικά): </label>--}}
{{--        @error('name')--}}
{{--            <span class="error"> {{ $message }} </span>--}}
{{--        @enderror--}}
{{--        <input type="text" name="name" wire:model="name" placeholder="Όνομα δωματίου">--}}
{{--    </div>--}}
{{--    <div class="input_group block">--}}
{{--        <label for="capacity"> Άτομα: </label>--}}
{{--        @error('occupants')--}}
{{--        <span class="error"> {{ $message }} </span>--}}
{{--        @enderror--}}
{{--        <input type="number" name="occupants" wire:model="max_occupants" placeholder="άτομα..">--}}
{{--    </div>--}}
{{--    <div class="input_group block">--}}
{{--        <label for="number"> Αριθμός δωματίων: </label>--}}
{{--        @error('number')--}}
{{--        <span class="error"> {{ $message }} </span>--}}
{{--        @enderror--}}
{{--        <input type="number" name="number" wire:model="number" placeholder="Πόσα ίδια δωμάτια διαθέτετε στη μονάδα σας;">--}}
{{--    </div>--}}

{{--    <div class="input_group inline">--}}
{{--        <label for="independent"> Αυτόνομο. </label>--}}
{{--        @error('independent')--}}
{{--        <span class="error"> {{ $message }} </span>--}}
{{--        @enderror--}}
{{--        <input type="checkbox" wire:model="independent" name="independent">--}}
{{--    </div>--}}

{{--    <div class="input_group inline">--}}
{{--        <label for="is_available"> Διαθέσιμο. </label>--}}
{{--        @error('is_available')--}}
{{--        <span class="error"> {{ $message }} </span>--}}
{{--        @enderror--}}
{{--        <input type="checkbox" wire:model="is_available" name="is_available">--}}
{{--    </div>--}}


{{--    <div class="input_group inline">--}}
{{--        <button type="submit"> Αποθήκευση </button>--}}
{{--    </div>--}}

{{--    <div class="input_group inline">--}}
{{--        <label for="independent"> Αυτόνομο. </label>--}}
{{--        @error('independent')--}}
{{--        <span class="error"> {{ $message }} </span>--}}
{{--        @enderror--}}
{{--        <input type="" name="independent" placeholder="άτομα..">--}}
{{--    </div>--}}
{{--    --}}{{-- SAMPLE --}}

{{--</form>--}}
<form wire:submit.prevent="save" method="post" class="p-8 bg-gray-100 rounded-lg shadow-lg max-w-3xl mx-auto">
    <h2 class="text-2xl font-semibold text-gray-800 mb-6">Φόρμα Δημιουργίας Δωματίου</h2>

    <!-- Room Name -->
    <div class="mb-4">
        <label for="name" class="block text-gray-700 font-medium mb-2">Όνομα (Αγγλικά):</label>
        <input type="text" name="name" wire:model="name" placeholder="Όνομα δωματίου"
               class="w-full px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500">
        @error('name')
        <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
        @enderror
    </div>

    <!-- Capacity -->
    <div class="mb-4">
        <label for="capacity" class="block text-gray-700 font-medium mb-2">Άτομα:</label>
        <input type="number" name="occupants" wire:model="max_occupants" placeholder="άτομα.."
               class="w-full px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500">
        @error('occupants')
        <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
        @enderror
    </div>

    <!-- Number of Rooms -->
    <div class="mb-4">
        <label for="number" class="block text-gray-700 font-medium mb-2">Αριθμός Δωματίων:</label>
        <input type="number" name="number" wire:model="number" placeholder="Πόσα ίδια δωμάτια διαθέτετε στη μονάδα σας;"
               class="w-full px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500">
        @error('number')
        <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
        @enderror
    </div>

    <!-- Independent Checkbox -->
    <div class="mb-4 flex items-center">
        <input type="checkbox" wire:model="independent" name="independent" id="independent"
               class="h-5 w-5 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
        <label for="independent" class="ml-2 text-gray-700 font-medium">Αυτόνομο</label>
        @error('independent')
        <span class="text-red-500 text-sm ml-4">{{ $message }}</span>
        @enderror
    </div>

    <!-- Is Available Checkbox -->
    <div class="mb-4 flex items-center">
        <input type="checkbox" wire:model="is_available" name="is_available" id="is_available"
               class="h-5 w-5 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
        <label for="is_available" class="ml-2 text-gray-700 font-medium">Διαθέσιμο</label>
        @error('is_available')
        <span class="text-red-500 text-sm ml-4">{{ $message }}</span>
        @enderror
    </div>

    <!-- Submit Button -->
    <div class="text-center">
        <button type="submit"
                class="px-6 py-2 bg-blue-600 text-white font-medium rounded-lg shadow hover:bg-blue-700 focus:ring focus:ring-blue-500">
            Αποθήκευση
        </button>
    </div>
</form>
