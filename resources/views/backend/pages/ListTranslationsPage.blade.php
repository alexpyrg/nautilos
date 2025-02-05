{{--@extends('layouts.cms')--}}
{{--@section('content')--}}

{{--    <div>--}}


{{--        <table style="margin: 0 auto">--}}
{{--            <tr>--}}
{{--            <th> Όνομα </th>--}}
{{--            <th> Τίτλος </th>--}}

{{--            <th> @foreach($locales as $loc)--}}
{{--                     {{ $loc->code }}--}}
{{--            @endforeach </th>--}}
{{--            <th> Ενέργειες </th>--}}
{{--            </tr>--}}
{{--            @foreach( $jsonFiles as $jsf)--}}
{{--                <tr>--}}
{{--                    <td> {{ $jsf['file_name'] }} </td>--}}
{{--                    <td> {{ $jsf['title'] }} </td>--}}
{{--                    <td> ------------------</td>--}}
{{--                    <td> <a class="button" href="/easyupdate/hcpages/edit/{{ $jsf['file_name'] }}"> Επεξεργασία </a> </td>--}}
{{--                </tr>--}}
{{--            @endforeach--}}
{{--        </table>--}}
{{--    </div>--}}

{{--@endsection--}}
@extends('layouts.app')
@section('content')

    <div class="p-8 bg-gray-100 min-h-screen">
        <div class="max-w-5xl mx-auto bg-white p-6 rounded-lg shadow-lg">
            <h1 class="text-2xl font-semibold text-gray-800 mb-6 text-center">JSON Files Management</h1>

            <table class="w-full table-auto border-collapse border border-gray-300 rounded-lg shadow">
                <thead>
                <tr class="bg-gray-200">
                    <th class="px-4 py-2 text-left text-gray-700 font-medium">Όνομα</th>
                    <th class="px-4 py-2 text-left text-gray-700 font-medium">Τίτλος</th>
                    <th class="px-4 py-2 text-left text-gray-700 font-medium">
                        @foreach($locales as $loc)
                            {{ $loc->code }}
                        @endforeach
                    </th>
                    <th class="px-4 py-2 text-left text-gray-700 font-medium">Ενέργειες</th>
                </tr>
                </thead>
                <tbody class="divide-y divide-gray-300">
                @foreach($jsonFiles as $jsf)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2 text-gray-700">{{ $jsf['file_name'] }}</td>
                        <td class="px-4 py-2 text-gray-700">{{ $jsf['title'] }}</td>
                        <td class="px-4 py-2 text-gray-700">------------------</td>
                        <td class="px-4 py-2">
                            <a href="/admin/hcpages/edit/{{ $jsf['file_name'] }}"
                               class="px-4 py-2 bg-blue-600 text-white font-medium rounded-lg shadow hover:bg-blue-700 focus:ring focus:ring-blue-500">
                                Επεξεργασία
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
