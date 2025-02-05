{{--@extends('layouts.cms')--}}
{{--@section('content')--}}
{{--    <div>--}}
{{--        <div style="display: flex; position: relative; width: 50%; overflow: auto; height: fit-content; flex-direction: row; box-sizing: border-box">--}}
{{--            --}}{{----}}{{--            <a class="button" href="/easyupdate/hcpages/edit/{{ $jsf['file_name'] }}"> Επεξεργασία </a>--}}
{{--            @foreach($locales as $loc)--}}
{{--                <a class="button" href="/easyupdate/hcpages/edit/{{ $page_name }}_{{ $loc->code }}.json"> Επεξεργασία </a>--}}
{{--            @endforeach--}}
{{--        </div>--}}
{{--        <div class="listedLocales" style="min-width: 300px; width: fit-content;  display: block; position: relative; margin: 1rem auto;">--}}
{{--            @foreach($locales as $loc)--}}
{{--                @if(strtolower($locale) == strtolower($loc->code))--}}
{{--                    <a style="padding: .6rem; margin-inline: .4rem; display: inline-block; text-align: center; font-size: 18px;min-width: 60px; background-color: #0e415e!important;  color: white; text-decoration: none" href="/easyupdate/hcpages/edit/{{ $page_name }}_{{ strtolower($loc->code) }}.json" class="locale_button">{{ $loc->code }}</a>--}}
{{--                @else--}}
{{--                    <a style="padding: .6rem; margin-inline: .4rem; display: inline-block; text-align: center; font-size: 18px;min-width: 60px; background-color: #1a9aef; color: white; text-decoration: none" href="/easyupdate/hcpages/edit/{{ $page_name }}_{{ strtolower($loc->code) }}.json" class="locale_button">{{ $loc->code }}</a>--}}
{{--                @endif--}}
{{--            @endforeach--}}
{{--        </div>--}}
{{--        <form  id="translationsForm" method="POST" action="{{ url('/easyupdate/save-translations/' . $pageName . '_' . $locale . '.json') }}" style="width: fit-content; padding: 0rem; display: block; position: relative; padding-bottom: 1rem;  border: 3px solid #3b3b3b;">--}}
{{--            <h2 style="background-color: #3b3b3b; text-align: center; color: white; padding-block: .8rem; box-sizing: border-box; margin-top: 0;">--}}
{{--                Επεξεργασία αρχείου : {{ $pageName }} </h2>--}}
{{--            @csrf--}}
{{--            <div id="formFields" style="display: flex; position: relative; flex-direction: column; justify-content: space-between; box-sizing: border-box;">--}}
{{--                @foreach($jsonContent as $key => $value)--}}
{{--                    <div style=" max-width: 480px; display: flex; position: relative; margin-inline: .5rem; box-sizing: border-box; flex-direction: row; justify-content: space-between; " class="input-group-inline">--}}
{{--                        <label style="font-size: 18px;" for=" {{ $key }}"> {{ ucfirst($key) }}: </label>--}}
{{--                        <input style="font-size: 18px;" type="text" id="{{ $key }}" name="{{ $key }}" value="{{ $value }}">--}}
{{--                    </div>--}}
{{--                @endforeach--}}

{{--            </div>--}}
{{--            <div class="input-group-inline">--}}

{{--            <button type="submit" style="display: block; position: relative;">Αποθήκευση αλλαγών</button>--}}
{{--            </div>--}}
{{--        </form>--}}

{{--    </div>--}}
{{--@endsection--}}
@extends('layouts.app')
@section('content')

    <div class="p-8 bg-gray-100 min-h-screen">
        <!-- Language Tabs -->
        <div class="flex space-x-4 justify-center mb-8">
            @foreach($locales as $loc)
                <a href="/admin/hcpages/edit/{{ $page_name }}_{{ strtolower($loc->code) }}.json"
                   class="px-4 py-2 text-center text-white font-medium rounded-lg shadow
                      {{ strtolower($locale) == strtolower($loc->code) ? 'bg-blue-600' : 'bg-blue-400 hover:bg-blue-500' }}">
                    {{ $loc->code }}
                </a>
            @endforeach
        </div>

        <!-- Form -->
        <div class="max-w-3xl mx-auto bg-white p-0 rounded-lg shadow-lg">
            <h2 class="text-xl font-semibold text-center text-white bg-gray-800 py-3 rounded-t-lg">
                Επεξεργασία αρχείου: {{ $pageName }}
            </h2>

            <form id="translationsForm" method="POST" action="{{ url('/admin/save-translations/' . $pageName . '_' . $locale . '.json') }}" class="space-y-4 px-2">
                @csrf

                <!-- Form Fields -->
                <div class="space-y-4">
                    @foreach($jsonContent as $key => $value)
                        <div class="flex items-center justify-between space-x-4">
                            <label for="{{ $key }}" class="text-gray-700 font-medium w-1/3 text-right">{{ $eng[$key] ?? ucfirst($key) }}</label>
{{--                            <input type="text" id="{{ $key }}" name="{{ $key }}" value="{{ $value }}"--}}
{{--                                   class="w-2/3 px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500 text-gray-700">--}}
                            <span> : </span>
                            <textarea  type="text" id="{{ $key }}" name="{{ $key }}" class="w-2/3 px-4 py-2 h-full overflow-auto border rounded-lg focus:ring-blue-500 focus:border-blue-500 text-gray-700">{{ $value }}</textarea>
                        </div>
                    @endforeach
                </div>

                <!-- Submit Button -->
                <div class="text-center">
                    <button type="submit" class="px-6 py-2 bg-blue-600 text-white font-medium rounded-lg shadow hover:bg-blue-700 focus:ring focus:ring-blue-500">
                        Αποθήκευση αλλαγών
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection
