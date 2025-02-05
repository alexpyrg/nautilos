{{--@extends('layouts.cms')--}}
{{--@section('content')--}}

{{--    <style>--}}
{{--        .alt-button{--}}
{{--            display: block;--}}
{{--            position: relative;--}}
{{--            width: 100%;--}}
{{--            text-align: center;--}}
{{--            text-decoration: none;--}}
{{--            color: #1f1f1f;--}}
{{--            font-size: 17px;--}}
{{--            padding: .3rem;--}}
{{--            background-color: white;--}}
{{--            transition: .3s;--}}
{{--        }--}}
{{--        .alt-button:hover{--}}
{{--            background-color: #1f1f1f;--}}
{{--            color: white;--}}
{{--        }--}}
{{--    </style>--}}

{{--    <div class="mbfContainer" style="border-inline: none; border-bottom: none;"  >--}}

{{--        <form  style="border-bottom: 2px solid #1f1f1f; border-inline: 2px solid #1f1f1f;" method="post" class="mainBackEndForm" action="/easyupdate/carousel/edit/update">--}}
{{--            @csrf--}}
{{--            <h2 style=""> Επεξεργασία Carousel</h2>--}}
{{--        <input type="hidden" name="page_id" value="{{ $carousel->page_id }}">--}}
{{--            <div class="input-group-block" >--}}
{{--                <label> Σελίδα: </label>--}}
{{--                <select class="" name="page_id" style="font-size: 18px;" disabled>--}}
{{--                  <option value="{{ $carousel->page->id }}"> {{ $carousel->page->name }}</option>--}}
{{--                </select>--}}
{{--            </div>--}}
{{--            <div class="input-group-block" >--}}
{{--                <label for="is_enabled" style="display: inline-block;"> Εμφάνιση: </label>--}}
{{--                <input type="checkbox" name="is_enabled" id="is_enabled" @if($carousel->is_enabled) checked @endif style="display: inline-block;">--}}
{{--            </div>--}}
{{--            <div class="input-group-block">--}}
{{--                <label> Τύπος: </label>--}}
{{--                <select name="type" style="font-size: 18px;">--}}
{{--                    <option value="1" @if($carousel->type == 1) selected @endif>Μικρό | 400 pixels</option>--}}
{{--                    <option value="2" @if($carousel->type == 2) selected @endif>Μεγάλο | 600 pixels</option>--}}
{{--                </select>--}}
{{--            </div>--}}
{{--            <div class="input-group-block">--}}
{{--                --}}{{----}}
{{--                 More features soon.--}}
{{--                --}}
{{--            </div>--}}
{{--            <div style="display: flex; position: relative; flex-direction: row; ">--}}
{{--                <button type="submit"  style="position: relative!important; right: unset; margin:0 auto; ">--}}
{{--                    Αποθήκευση--}}
{{--                </button>--}}

{{--            </div>--}}
{{--            <br><br>--}}
{{--        </form>--}}
{{--        <br><br>--}}
{{--        <div style="display: flex; position: relative; flex-direction: row; ">--}}
{{--            <a href="/easyupdate/carousel/images/view/{{ $carousel->id }}" class="alt-button" style=" border:1px solid #1f1f1f; min-width: fit-content; cursor: pointer;">--}}
{{--                Αλλαγή / Προσθήκη φωτογραφιών--}}
{{--            </a>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <script>--}}

{{--    </script>--}}
{{--@endsection--}}
@extends('layouts.app')
@section('content')
    <div class="p-8 bg-gray-100 min-h-screen">
        <div class="max-w-xl mx-auto bg-white p-6 rounded-lg shadow-lg">
            <form method="post" action="/admin/carousel/edit/update" class="space-y-6">
                @csrf
                <h2 class="text-2xl font-semibold text-gray-800 mb-4">Επεξεργασία Carousel</h2>

                <!-- Hidden Page ID -->
                <input type="hidden" name="page_id" value="{{ $carousel->page_id }}">

                <!-- Page Selector -->
                <div>
                    <label for="page_id" class="block text-gray-700 font-medium mb-2">Σελίδα:</label>
                    <select name="page_id" disabled class="w-full px-4 py-2 border rounded-lg bg-gray-100 text-gray-700">
                        <option value="{{ $carousel->page->id }}">{{ $carousel->page->name }}</option>
                    </select>
                </div>

                <!-- Is Enabled -->
                <div class="flex items-center">
                    <label for="is_enabled" class="text-gray-700 font-medium">Εμφάνιση:</label>
                    <input type="checkbox" name="is_enabled" id="is_enabled" @if($carousel->is_enabled) checked @endif class="ml-3 h-5 w-5 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                </div>

                <!-- Type Selector -->
                <div>
                    <label for="type" class="block text-gray-700 font-medium mb-2">Τύπος:</label>
                    <select name="type" class="w-full px-4 py-2 border rounded-lg focus:ring-blue-500 text-gray-700">
                        <option value="1" @if($carousel->type == 1) selected @endif>Μικρό | 400 pixels</option>
                        <option value="2" @if($carousel->type == 2) selected @endif>Μεγάλο | 600 pixels</option>
                    </select>
                </div>

                <!-- Submit Button -->
                <div class="text-center">
                    <button type="submit" class="px-6 py-2 bg-blue-600 text-white font-medium rounded-lg shadow hover:bg-blue-700 focus:ring focus:ring-blue-500">
                        Αποθήκευση
                    </button>
                </div>
            </form>

            <div class="mt-6 text-center">
                <a href="/admin/carousel/images/view/{{ $carousel->id }}" class="block px-6 py-2 text-center bg-gray-600 text-gray-300 border border-gray-300 rounded-lg hover:bg-gray-700 hover:text-white">
                    Αλλαγή / Προσθήκη φωτογραφιών
                </a>
            </div>
        </div>
    </div>
@endsection
