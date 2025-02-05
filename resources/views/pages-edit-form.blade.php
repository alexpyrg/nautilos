{{--@extends('layouts.cms')--}}
{{--@section('content')--}}
{{--    <form class="back-end-form" action="/easyupdate/pages/edit/{{ $page->id }}/save" method="POST">--}}
{{--        @csrf--}}
{{--        <h2>Φόρμα επεξεργασίας σελίδας.</h2>--}}
{{--        <p style="margin:0;"> > {{ $page->name }}</p>--}}
{{--        <p>Εδώ μπορείτε να δημιουργήσετε μια νέα σελίδα που θα προστεθεί αυτόματα στο μενού της ιστοσελίδας σας ενα εσείς το επιλέξετε.</p>--}}
{{--        @php--}}
{{--            //    dd($page->slug);--}}
{{--        @endphp--}}
{{--        {{ dd($page->is_hardCoded) }}--}}
{{--    <input type="hidden" name="is_hardCoded" value="{{ $page->is_hardCoded }}">--}}

{{--        <div class="input_group block">--}}
{{--            <label for="name">Όνομα Σελίδας: (Αγγλικό) </label>--}}
{{--            @error('name')--}}
{{--            <span class="error"> {{ $message }}</span>--}}
{{--            @enderror--}}
{{--            <input type="text" wire:model="name" name="name"  value="{{ $page->name }}" >--}}
{{--            {{ $page->name }}--}}
{{--        </div>--}}
{{--        <div class="input_group block">--}}
{{--            <label for="display_name">Όνομα Εμφάνισης Σελίδας: (Αγγλικό) </label>--}}
{{--            @error('display_name')--}}
{{--            <span class="error"> {{ $message }}</span>--}}
{{--            @enderror--}}
{{--            <input type="text" wire:model="display_name"  value="{{ $page->display_name }}" name="display_name" >--}}
{{--        </div>--}}

{{--        <div class="input_group block">--}}
{{--            <label for="file_name"> Όνομα αρχείου: </label>--}}
{{--            @error('file_name')--}}
{{--            <span class="error"> {{ $message }} </span>--}}
{{--            @enderror--}}
{{--            <input type="text" readonly name="file_name"  value="{{ $page->file_name }}" wire:model="file_name" >--}}
{{--        </div>--}}

{{--        <div class="input_group inline">--}}

{{--            @error('is_published')--}}
{{--            <span class="error">--}}
{{--                {{ $message }}--}}
{{--            </span>--}}
{{--            @enderror--}}
{{--            <input type="checkbox" name="is_published" wire:model="is_published"   @if($page->is_published) checked @endif id="is_published">--}}
{{--            <label for="is_published"> Εμφάνιση: </label>--}}
{{--        </div>--}}
{{--        <div class="input_group inline" >--}}

{{--            @error('has_reservationForm')--}}
{{--            <span class="error">--}}
{{--                {{ $message }}--}}
{{--            </span>--}}
{{--            @enderror--}}

{{--            <input type="checkbox" name="has_reservationForm" wire:model.live="has_reservationForm" @if($page->has_reservationForm) checked @endif  id="has_reservationForm" />--}}
{{--            <label for="has_reservationForm"> Προβολή Φόρμας Κρατήσεων </label>--}}
{{--        </div>--}}

{{--        <div class="input_group inline" >--}}

{{--            @error('is_home')--}}
{{--            <span class="error">--}}
{{--                {{ $message }}--}}
{{--            </span>--}}
{{--            @enderror--}}
{{--            <input type="checkbox" name="is_home" wire:model="is_home" id="is_home" @if($homePageExists && $page->id != $homePage->id) disabled @endif  @if($page->is_home) checked @endif>--}}
{{--            <label for="is_home"--}}
{{--            > Αρχική </label>--}}
{{--        </div>--}}

{{--        <div class="input_group inline" >--}}

{{--            @error('is_subpage')--}}
{{--            <span class="error">--}}
{{--                {{ $message }}--}}
{{--            </span>--}}
{{--            @enderror--}}

{{--            <input type="checkbox" name="is_subpage" wire:model.live="is_subpage" id="is_subpage" @if($page->is_subpage) checked @endif />--}}
{{--            <label for="is_subpage"> Είναι Υποσελίδα </label>--}}
{{--        </div>--}}

{{--        <div class="input_group block">--}}
{{--            <label for="parentPage">Επιλέξτε σελίδα:</label>--}}

{{--            <select style="padding: .3rem; border:1px solid #1f1f1f; font-size: 17px;" name="parent_page" id="parent_page" @if($page->is_subpage === null || $page->is_subpage === false || $page->is_subpage === 0 || $page->is_subpage === '') disabled @endif  wire:model="parent_page">--}}
{{--                <option value="0">Επιλέξτε...</option>--}}
{{--                @foreach($pages as $p)--}}
{{--                    @if(!$p->is_subpage)--}}
{{--                        <option value="{{ $p->id }}" @if($page->parent_page == $p->id) selected @endif> {{ $p->name }} </option>--}}
{{--                    @endif--}}
{{--                @endforeach--}}
{{--            </select>--}}
{{--        </div>--}}
{{--        <div class="input_group block">--}}
{{--            <label for="slug"> URL: </label>--}}
{{--            @error('')--}}
{{--            <span class="error"> {{ $message }} </span>--}}
{{--            @enderror--}}
{{--            <input type="text" name="slug" wire:model.live="slug" value="{{ $page->slug }}"  placeholder="/home-page-test">--}}
{{--        </div>--}}

{{--        <div class="input_group block">--}}
{{--            <input type="submit" value="Αποθήκευση Σελίδας">--}}
{{--        </div>--}}


{{--    </form>--}}
{{--@endsection--}}
{{--    <livewire:page-edit-form :id="$id"/>--}}
@extends('layouts.app')
@section('content')
    <div class="p-8 bg-gray-100 min-h-screen">
        <form class="max-w-3xl mx-auto bg-white p-6 rounded-lg shadow-lg" action="/admin/pages/edit/{{ $page->id }}/save" method="POST">
            @csrf
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Φόρμα Επεξεργασίας Σελίδας</h2>
            <p class="text-gray-600"> > {{ $page->name }}</p>
            <p class="text-sm text-gray-500 mb-6">
                Εδώ μπορείτε να δημιουργήσετε μια νέα σελίδα που θα προστεθεί αυτόματα στο μενού της ιστοσελίδας σας εάν το επιλέξετε.
            </p>

            <input type="hidden" name="is_hardCoded" value="{{ $page->is_hardCoded }}">

            <!-- Page Name -->
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-medium mb-2">Όνομα Σελίδας: (Αγγλικό)</label>
                @error('name')
                <span class="text-red-500 text-sm"> {{ $message }}</span>
                @enderror
                <input type="text" wire:model="name" name="name" value="{{ $page->name }}" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-500 focus:outline-none" />
            </div>

            <!-- Is Published -->
            <div class="flex items-center mb-4">
                @error('is_published')
                <span class="text-red-500 text-sm mr-2">{{ $message }}</span>
                @enderror
                <input type="checkbox" name="is_published" wire:model="is_published" @if($page->is_published) checked @endif id="is_published" class="h-5 w-5 text-blue-600 border-gray-300 rounded focus:ring-blue-500" />
                <label for="is_published" class="ml-3 text-gray-700">Εμφάνιση</label>
            </div>

            <!-- Reservation Form -->
            <div class="flex items-center mb-4">
                @error('has_reservationForm')
                <span class="text-red-500 text-sm mr-2">{{ $message }}</span>
                @enderror
                <input type="checkbox" name="has_reservationForm" wire:model.live="has_reservationForm" @if($page->has_reservationForm) checked @endif id="has_reservationForm" class="h-5 w-5 text-blue-600 border-gray-300 rounded focus:ring-blue-500" />
                <label for="has_reservationForm" class="ml-3 text-gray-700">Προβολή Φόρμας Κρατήσεων</label>
            </div>

            <!-- Is Home -->
            <div class="flex items-center mb-4">
                @error('is_home')
                <span class="text-red-500 text-sm mr-2">{{ $message }}</span>
                @enderror
                <input type="checkbox" name="is_home" wire:model="is_home" id="is_home" @if($homePageExists && $page->id != $homePage->id) disabled @endif @if($page->is_home) checked @endif class="h-5 w-5 text-blue-600 border-gray-300 rounded focus:ring-blue-500" />
                <label for="is_home" class="ml-3 text-gray-700">Αρχική</label>
            </div>

            <!-- Is Subpage -->
            <div class="flex items-center mb-4">
                @error('is_subpage')
                <span class="text-red-500 text-sm mr-2">{{ $message }}</span>
                @enderror
                <input type="checkbox" name="is_subpage" wire:model.live="is_subpage" id="is_subpage" @if($page->is_subpage) checked @endif class="h-5 w-5 text-blue-600 border-gray-300 rounded focus:ring-blue-500" />
                <label for="is_subpage" class="ml-3 text-gray-700">Είναι Υποσελίδα</label>
            </div>

            <!-- Parent Page -->
            <div class="mb-4">
                <label for="parentPage" class="block text-gray-700 font-medium mb-2">Επιλέξτε σελίδα:</label>
                <select name="parent_page" id="parent_page" @if(!$page->is_subpage) disabled @endif wire:model="parent_page" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-500 focus:outline-none">
                    <option value="0">Επιλέξτε...</option>
                    @foreach($pages as $p)
                        @if(!$p->is_subpage)
                            <option value="{{ $p->id }}" @if($page->parent_page == $p->id) selected @endif> {{ $p->name }} </option>
                        @endif
                    @endforeach
                </select>
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit" class="w-full bg-blue-600 text-white font-medium py-2 rounded-lg shadow hover:bg-blue-700 focus:ring focus:ring-blue-500 focus:ring-opacity-50">Αποθήκευση Σελίδας</button>
            </div>
        </form>
    </div>
@endsection
