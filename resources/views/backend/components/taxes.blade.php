{{--@extends('layouts.cms')--}}
{{--@section('content')--}}
{{--    <div>--}}
{{--        <!-- Form to edit GreenTax and VAT -->--}}
{{--        <form action="{{ route('update.taxes') }}" method="POST">--}}
{{--            @csrf--}}
{{--            <table>--}}
{{--                <tr>--}}
{{--                    <th>Μήνας</th>--}}
{{--                    <th>Κόστος (Green Tax)</th>--}}
{{--                </tr>--}}

{{--                <!-- Loop through each GreenTax record to create editable fields -->--}}
{{--                @foreach($greenTaxes as $greenTax)--}}
{{--                    <tr>--}}
{{--                        <td>{{ $greenTax->month }}</td>--}}
{{--                        <td>--}}
{{--                            <input type="text" name="green_taxes[{{ $greenTax->id }}]" value="{{ number_format($greenTax->cost,2) }}">--}}
{{--                        </td>--}}
{{--                    </tr>--}}
{{--                @endforeach--}}
{{--            </table>--}}

{{--            <!-- VAT Section -->--}}
{{--            <table>--}}
{{--                <tr>--}}
{{--                    <th>Άλλοι φόροι</th>--}}
{{--                    <th>Κόστος</th>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td> Φ.Π.Α. </td>--}}
{{--                    <td>--}}
{{--                        {{ dd($vat) }}--}}
{{--                        <input type="text" name="vat_value" value="{{ $vat->rate ?? 'n/a' }}">--}}
{{--                        <input type="hidden" name="vat_id" value="{{ $vat->id ?? 'n/a'}}">--}}
{{--                    </td>--}}
{{--                </tr>--}}
{{--            </table>--}}

{{--            <!-- Save button -->--}}
{{--            <button type="submit">Save</button>--}}
{{--        </form>--}}
{{--    </div>--}}
{{--@endsection--}}
@extends('layouts.app')
@section('content')

    <div class="p-8 bg-gray-100 min-h-screen">
        <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-lg">
            <!-- Form Header -->
            <h2 class="text-2xl font-semibold text-gray-800 mb-6">Επεξεργασία Φόρων</h2>

            <!-- Form -->
            <form action="{{ route('update.taxes') }}" method="POST" class="space-y-8 text-lg">
                @csrf

                <!-- Green Tax Section -->
                <div>
                    <h3 class="text-lg font-medium text-gray-700 mb-4">Περιβαλλοντικός φόρος (πράσινος) </h3>
                    <div class="overflow-x-auto">
                        <table class="w-full border-collapse border border-gray-300 rounded-lg shadow">
                            <thead>
                            <tr class="bg-blueGray-200">
                                <th class="px-4 py-2 text-left text-gray-700 font-medium">Μήνας</th>
                                <th class="px-4 py-2 text-left text-gray-700 font-medium">Κόστος (Περιβαλλοντικός Φόρος)</th>
                            </tr>
                            </thead>
                            <tbody class="divide-y divide-blueGray-700">
                            @foreach($greenTaxes as $greenTax)
                                <tr class="hover:bg-gray-50 even:bg-blueGray-200">
                                    <td class="px-4 py-2 text-gray-700">{{ $greenTax->month }}</td>
                                    <td class="px-4 py-2">
                                        <input type="text" name="green_taxes[{{ $greenTax->id }}]"
                                               value="{{ number_format($greenTax->cost, 2) }}"
                                               class="w-full px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500">
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- VAT Section -->
                <div>
                    <h3 class="text-lg font-medium text-gray-700 mb-4">Φ.Π.Α. και άλλοι φόροι</h3>
                    <div class="overflow-x-auto">
                        <table class="w-full border-collapse border border-gray-300 rounded-lg shadow">
                            <thead>
                            <tr class="bg-gray-200">
                                <th class="px-4 py-2 text-left text-gray-700 font-medium">Φόρος</th>
                                <th class="px-4 py-2 text-left text-gray-700 font-medium">Κόστος</th>
                            </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-300">
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-2 text-gray-700">Φ.Π.Α.</td>
                                <td class="px-4 py-2">
                                    <input type="text" name="vat_value" value="{{ $vat->rate ?? 'n/a' }}"
                                           class="w-full px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500">
                                    <input type="hidden" name="vat_id" value="{{ $vat->id ?? 'n/a' }}">
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Save Button -->
                <div class="text-center">
                    <button type="submit" class="px-6 py-2 bg-blue-600 text-white w-64 font-medium rounded-lg shadow hover:bg-blue-700 focus:ring focus:ring-blue-500">
                        Αποθήκευση
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection
