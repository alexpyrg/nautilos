{{--<form wire:submit.prevent="save" class="back-end-form">--}}
{{--    <h2>Φόρμα επεξεργασίας σελίδας.</h2>--}}

{{--    <p>Εδώ μπορείτε να δημιουργήσετε μια νέα σελίδα που θα προστεθεί αυτόματα στο μενού της ιστοσελίδας σας ενα εσείς το επιλέξετε.</p>--}}
{{--    @php--}}
{{--//    dd($page->slug);--}}
{{--    @endphp--}}

{{--    <div class="input_group block">--}}
{{--        <label for="name">Όνομα Σελίδας: (Αγγλικό) </label>--}}
{{--        @error('name')--}}
{{--        <span class="error"> {{ $message }}</span>--}}
{{--        @enderror--}}
{{--        <input type="text" wire:model="name" name="name">--}}
{{--        {{ $page->name }}--}}
{{--    </div>--}}
{{--    <div class="input_group block">--}}
{{--        <label for="display_name">Όνομα Εμφάνισης Σελίδας: (Αγγλικό) </label>--}}
{{--        @error('display_name')--}}
{{--        <span class="error"> {{ $message }}</span>--}}
{{--        @enderror--}}
{{--        <input type="text" wire:model="display_name" name="name" >--}}
{{--    </div>--}}

{{--    <div class="input_group block">--}}
{{--        <label for="page_file_name"> Όνομα αρχείου: </label>--}}
{{--        @error('page_file_name')--}}
{{--        <span class="error"> {{ $message }} </span>--}}
{{--        @enderror--}}
{{--        <input type="text" disabled name="page_file_name" wire:model="file_name" >--}}
{{--    </div>--}}

{{--    <div class="input_group inline">--}}

{{--        @error('is_published')--}}
{{--        <span class="error">--}}
{{--                {{ $message }}--}}
{{--            </span>--}}
{{--        @enderror--}}
{{--        <input type="checkbox" name="is_published" wire:model="is_published"   @if($page->is_published) checked @endif id="is_published">--}}
{{--        <label for="is_published"> Εμφάνιση: </label>--}}
{{--    </div>--}}


{{--    <div class="input_group inline" >--}}

{{--        @error('is_home')--}}
{{--        <span class="error">--}}
{{--                {{ $message }}--}}
{{--        </span>--}}
{{--        @enderror--}}
{{--        <input type="checkbox" name="is_home" wire:model="is_home" id="is_home" @if($page->is_home) checked @endif>--}}
{{--        <label for="is_home"> Αρχική </label>--}}
{{--    </div>--}}

{{--    <div class="input_group block">--}}
{{--        <input type="submit" value="Αποθήκευση Σελίδας">--}}
{{--    </div>--}}

{{--</form>--}}
<div class="bg-white shadow-lg rounded-lg p-8 max-w-md w-full">
    <h1 class="text-2xl font-semibold text-gray-800 mb-6">Επεξεργασία σελίδας</h1>
    <form class="space-y-4" wire:submit.prevent="save">
        <!-- Is Enabled -->
        <div class="flex items-center">
            <input id="is_enabled" type="checkbox" class="w-5 h-5 text-blue-600 border-gray-300 rounded focus:ring-blue-500" />
            <label for="is_enabled" wire:model="is_published" @if($page->is_published) checked @endif class="ml-3 text-gray-700 font-medium">Εμφάνιση</label>
        </div>

        <!-- File Name -->
        <div>
            <label for="file_name" class="block text-gray-700 font-medium mb-2">Όνομα αρχείου</label>
            <input type="text" id="file_name" name="file_name" wire:model="file_name" class="w-full px-4 py-2 border rounded-lg shadow-sm focus:ring focus:ring-blue-500 focus:border-blue-500" placeholder="Enter file name" />
        </div>

        <!-- Page Name -->
        <div>
            <label for="name" class="block text-gray-700 font-medium mb-2">Όνομα σελίδας</label>
            <input type="text" id="name" name="name" wire:model="name" class="w-full px-4 py-2 border rounded-lg shadow-sm focus:ring focus:ring-blue-500 focus:border-blue-500" placeholder="Enter page name" />
        </div>

        <!-- Is Home -->
        <div class="flex items-center">
            <input id="is_home" type="checkbox" class="w-5 h-5 text-blue-600 border-gray-300 rounded focus:ring-blue-500" />
            <label for="is_home" wire:model="is_home" @if($page->is_home) checked @endif class="ml-3 text-gray-700 font-medium">Αρχική</label>
        </div>

        <!-- Has Reservation Form -->
        <div class="flex items-center">
            <input id="has_reservationForm" type="checkbox" class="w-5 h-5 text-blue-600 border-gray-300 rounded focus:ring-blue-500" />
            <label for="has_reservationForm" wire:model="has_reservationForm" class="ml-3 text-gray-700 font-medium">Εμφάνιση φόρμας κρατήσεων</label>
        </div>


        <!-- Submit Button -->
        <div>
            <button type="submit" class="w-full bg-blue-600 text-white font-medium py-2 rounded-lg shadow hover:bg-blue-700 focus:ring focus:ring-blue-500 focus:ring-opacity-50">Αποθήκευση</button>
        </div>
    </form>
</div>
