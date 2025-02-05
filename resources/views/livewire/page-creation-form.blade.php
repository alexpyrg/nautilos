
<form class="p-8 bg-white rounded-lg shadow-lg max-w-3xl mx-auto">
    <h2 class="text-2xl font-semibold text-gray-800 mb-6">Φόρμα Δημιουργίας Νέας Σελίδας</h2>
    <p class="text-gray-600 mb-6">Εδώ μπορείτε να δημιουργήσετε μια νέα σελίδα που θα προστεθεί αυτόματα στο μενού της ιστοσελίδας σας, εάν το επιλέξετε.</p>

    <!-- Page Name -->
    <div class="mb-4">
        <label for="name" class="block text-gray-700 font-medium mb-2">Όνομα Σελίδας: (Αγγλικό)</label>
        <input type="text" wire:model="name" name="name"
               class="w-full px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500">
        @error('name')
        <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
        @enderror
    </div>

    <!-- Is Published -->
    <div class="flex items-center mb-4">
        <input type="checkbox" name="is_published" wire:model="is_published" id="is_published"
               class="h-5 w-5 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
        <label for="is_published" class="ml-2 text-gray-700 font-medium">Εμφάνιση</label>
        @error('is_published')
        <span class="text-red-500 text-sm ml-4">{{ $message }}</span>
        @enderror
    </div>

    <!-- Is Home -->
    <div class="flex items-center mb-4">
        <input type="checkbox" name="is_home" wire:model="is_home"
               @foreach($pages as $p) @if($p->is_home) disabled @endif @endforeach
               id="is_home" class="h-5 w-5 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
        <label for="is_home" class="ml-2 text-gray-700 font-medium">Αρχική</label>
        @error('is_home')
        <span class="text-red-500 text-sm ml-4">{{ $message }}</span>
        @enderror
    </div>

    <!-- Has Reservation Form -->
    <div class="flex items-center mb-4">
        <input type="checkbox" name="has_reservationForm" wire:model.live="has_reservationForm" id="has_reservationForm"
               class="h-5 w-5 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
        <label for="has_reservationForm" class="ml-2 text-gray-700 font-medium">Προβολή Φόρμας Κρατήσεων</label>
        @error('has_reservationForm')
        <span class="text-red-500 text-sm ml-4">{{ $message }}</span>
        @enderror
    </div>

    <!-- Is Subpage -->
    <div class="flex items-center mb-4">
        <input type="checkbox" name="is_subpage" wire:model.live="is_subpage" id="is_subpage"
               class="h-5 w-5 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
        <label for="is_subpage" class="ml-2 text-gray-700 font-medium">Είναι Υποσελίδα</label>
        @error('is_subpage')
        <span class="text-red-500 text-sm ml-4">{{ $message }}</span>
        @enderror
    </div>

    <!-- Parent Page -->
    <div class="mb-4">
        <label for="parentPage" class="block text-gray-700 font-medium mb-2">Επιλέξτε Σελίδα:</label>
        <select name="parent_page" id="parent_page" wire:model="parent_page"
                class="w-full px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500"
                @if($this->is_subpage === null || $this->is_subpage === false || $this->is_subpage === 0 || $this->is_subpage === '') disabled @endif>
            <option value="0">Επιλέξτε...</option>
            @foreach($pages as $page)
                @if(!$page->is_subpage)
                    <option value="{{ $page->id }}">{{ $page->name }}</option>
                @endif
            @endforeach
        </select>
    </div>

    <!-- Save Button -->
    <div class="text-center">
        <button type="submit" wire:click.prevent='save'
                class="px-6 py-2 bg-blue-600 text-white font-medium rounded-lg shadow hover:bg-blue-700 focus:ring focus:ring-blue-500">
            Αποθήκευση Σελίδας
        </button>
    </div>
</form>
