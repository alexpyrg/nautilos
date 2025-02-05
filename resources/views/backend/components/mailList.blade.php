{{--@extends('layouts.cms')--}}
{{--@section('content')--}}

{{--<div>--}}
{{--    <table style="margin: 0 auto">--}}
{{--        <tr>--}}
{{--            <th>Όνομα </th>--}}
{{--            <th>Περιγραφή </th>--}}
{{--            <th>Ενέργειες </th>--}}
{{--        </tr>--}}
{{--        @foreach($mails as $mail)--}}
{{--            <tr>--}}
{{--                <td>{{ $mail->name }}</td>--}}
{{--                <td>{{ $mail->description }}</td>--}}
{{--                <td><a href="/easyupdate/mails/edit/{{ $mail->id }}/en"> Επεξεργασία </a></td>--}}
{{--            </tr>--}}
{{--        @endforeach--}}
{{--    </table>--}}
{{--</div>--}}
{{--@endsection--}}
@extends('layouts.app')
@section('content')

    <div class="p-8 bg-gray-100 min-h-screen">
        <div class="max-w-5xl mx-auto bg-white p-6 rounded-lg shadow-lg">
            <!-- Table Header -->
            <h2 class="text-2xl font-semibold text-gray-800 mb-6">Λίστα Email Templates</h2>

            <!-- Email Templates Table -->
            <div class="overflow-x-auto">
                <table class="w-full border-collapse border border-gray-300 rounded-lg shadow">
                    <thead>
                    <tr class="bg-gray-200">
                        <th class="px-4 py-2 text-left text-gray-700 font-medium">Όνομα</th>
                        <th class="px-4 py-2 text-left text-gray-700 font-medium">Περιγραφή</th>
                        <th class="px-4 py-2 text-left text-gray-700 font-medium">Ενέργειες</th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-300">
                    @foreach($mails as $mail)
                        <tr class="hover:bg-gray-50">
                            <!-- Name -->
                            <td class="px-4 py-2 text-gray-700">{{ $mail->name }}</td>

                            <!-- Description -->
                            <td class="px-4 py-2 text-gray-700">{{ $mail->description }}</td>

                            <!-- Actions -->
                            <td class="px-4 py-2">
                                <a href="/admin/mails/edit/{{ $mail->id }}/en" class="text-blue-500 hover:underline">
                                    Επεξεργασία
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
