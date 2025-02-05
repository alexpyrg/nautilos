@extends('layouts.app')
@section('content')

    <div class="p-8 bg-gray-100 min-h-screen text-lg">
        <div class="max-w-5xl mx-auto bg-white p-6 rounded-lg shadow-lg">
            <!-- Locale Selector -->
            <div class="flex justify-center mb-6">
                @foreach($locales as $locale)
                    <a href="/admin/mails/edit/{{ $mail->id }}/{{ $locale->code }}"
                       class="px-4 py-2 text-center font-medium rounded-lg shadow mx-2 {{ $selected_locale->id == $locale->id ? 'bg-blue-800 text-white' : 'bg-blue-500 text-white hover:bg-blue-600' }}">
                        {{ $locale->code }}
                    </a>
                @endforeach
            </div>

            <!-- Form -->
            <form method="post" action="/admin/mail/edit/{{ $mail->id }}/{{ $selected_locale['code'] }}">
                @csrf

                <!-- Subject -->
                <div class="mb-6">
                    <label for="mail_subject" class="block text-gray-700 font-medium mb-2">Θέμα:</label>
                    <input type="text" name="subject" value="{{ $mailContent != null ? $mailContent->subject : '' }}"
                           class="w-full px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500">
                    @error('subject')
                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Body -->
                <div class="mb-6">
                    <label for="mail_body" class="block text-gray-700 font-medium mb-2">Περιεχόμενο:</label>
                    <textarea name="body" id="editor" class="w-full h-96 px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500">
                    {!! $mailContent != null ? $mailContent->body : '' !!}
                </textarea>
                    @error('body')
                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="text-center">
                    <button type="submit" class="px-6 py-2 bg-blue-600 text-white font-medium rounded-lg shadow hover:bg-blue-700 focus:ring focus:ring-blue-500">
                        Αποθήκευση
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection
