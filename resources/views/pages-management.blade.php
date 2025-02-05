{{--@extends('layouts.cms')--}}
{{--@section('content')--}}
{{--    <style>--}}
{{--        body {font-family: Arial;}--}}

{{--        /* Style the tab */--}}
{{--        .tab {--}}
{{--            overflow: hidden;--}}
{{--            border: 1px solid #ccc;--}}
{{--            background-color: #f1f1f1;--}}
{{--            min-height: 50px;--}}
{{--            max-width: 955px;--}}
{{--            width: 955px;--}}
{{--            margin: 0 auto;--}}
{{--        }--}}

{{--        /* Style the buttons inside the tab */--}}
{{--        .tab button {--}}
{{--            display: inline-block;--}}
{{--            background-color: inherit;--}}
{{--            float: left;--}}
{{--            border: none;--}}
{{--            outline: none;--}}
{{--            cursor: pointer;--}}
{{--            padding: 14px 16px;--}}
{{--            transition: 0.3s;--}}
{{--            font-size: 17px;--}}
{{--            max-width: fit-content;--}}
{{--        }--}}

{{--        /* Change background color of buttons on hover */--}}
{{--        .tab button:hover {--}}
{{--            background-color: #ddd;--}}
{{--        }--}}

{{--        /* Create an active/current tablink class */--}}
{{--        .tab button.active {--}}
{{--            background-color: #ccc;--}}
{{--        }--}}

{{--        /* Style the tab content */--}}
{{--        .tabcontent {--}}
{{--            display: none;--}}
{{--            padding: 6px 12px;--}}
{{--            -webkit-animation: fadeEffect 1s;--}}
{{--            animation: fadeEffect 1s;--}}
{{--        }--}}

{{--        /* Fade in tabs */--}}
{{--        @-webkit-keyframes fadeEffect {--}}
{{--            from {opacity: 0;}--}}
{{--            to {opacity: 1;}--}}
{{--        }--}}

{{--        @keyframes fadeEffect {--}}
{{--            from {opacity: 0;}--}}
{{--            to {opacity: 1;}--}}
{{--        }--}}
{{--        .ck-reset{--}}

{{--        }--}}
{{--        .ck.ck-list{--}}
{{--            max-height: 150px!important;--}}
{{--            overflow: auto!important;--}}
{{--        }--}}
{{--    </style>--}}
{{--    <div class="listedLocales" style="min-width: 800px;  display: block; position: relative; margin: 1rem auto;">--}}
{{--    @foreach($locales as $locale)--}}
{{--        @if($selected_locale->id == $locale->id)--}}
{{--                <a style="padding: .6rem; margin-inline: .4rem; display: inline-block; text-align: center; font-size: 18px;min-width: 60px; background-color: #0e415e; color: white; text-decoration: none" href="/easyupdate/pages/content/{{$page_id}}/{{$locale->code}}" class="locale_button">{{ $locale->code }}</a>--}}
{{--            @else--}}
{{--        <a style="padding: .6rem; margin-inline: .4rem; display: inline-block; text-align: center; font-size: 18px;min-width: 60px; background-color: #1a9aef; color: white; text-decoration: none" href="/easyupdate/pages/content/{{$page_id}}/{{$locale->code}}" class="locale_button">{{ $locale->code }}</a>--}}
{{--            @endif--}}
{{--    @endforeach--}}
{{--    </div>--}}
{{--    <div class="tab" >--}}
{{--        <button class="tablinks" onclick="openCity(event, 'Main')"> Παράμετροι </button>--}}
{{--        <button  class="tablinks" onclick="openCity(event, 'Advanced')"> Για Προχωριμένους</button>--}}
{{--        --}}{{--        <button class="tablinks" onclick="openCity(event, 'Tokyo')">Tokyo</button>--}}
{{--    </div>--}}

{{--    <form method="post" style="max-height: 1000px; display: block;position: relative; margin-top: 2rem; max-width: 700px!important;  width: 700px!important; overflow-x: hidden; box-sizing: border-box;" action="/easyupdate/page/content/save/{{$page->id}}/{{ $selected_locale['code'] }}">--}}
{{--        @csrf--}}
{{--        <div id="Advanced" class="tabcontent">--}}
{{--            <div class="block input_group">--}}
{{--                @error('page_layout_type')--}}
{{--                <span class="error"> {{ $message }} </span>--}}
{{--                @enderror--}}
{{--                <label> Page Layout: {{ $page->page_layout_type }} </label>--}}
{{--                <select name="page_layout_type" style="font-size: 18px; margin-block: .2rem; border: 1px solid gray; border-radius: 0; padding: .4rem;">--}}
{{--                    <option value="1" {{ $page->page_layout_type == '1' ? 'selected' : '' }}>General Layout</option>--}}
{{--                    <option value="2" {{ $page->page_layout_type == '2' ? 'selected' : '' }}>Room Layout</option>--}}
{{--                    <option value="3" {{ $page->page_layout_type == '3' ? 'selected' : '' }}>Gallery Layout</option>--}}
{{--                    <option value="4" {{ $page->page_layout_type == '4' ? 'selected' : '' }}>Contact us</option>--}}
{{--                </select>--}}
{{--            </div>--}}
{{--            <div class="block input_group">--}}
{{--                @error('custom_css')--}}
{{--                <span class="error"> {{ $message }} </span>--}}
{{--                @enderror--}}
{{--                <label for="custom_css">CSS: </label>--}}
{{--                <textarea type="text" placeholder="" style="font-family: Arial;min-height: 60px;resize: both; box-sizing: border-box; width: 800px;" name="custom_css" value="">{{ $pageContent->custom_css }}</textarea>--}}
{{--            </div>--}}

{{--            <div class="block input_group">--}}
{{--                @error('custom_js')--}}
{{--                <span class="error"> {{ $message }} </span>--}}
{{--                @enderror--}}
{{--                <label for="custom_js"> Javascript: </label>--}}
{{--                <textarea type="text" placeholder="" style="font-family: Arial;min-height: 60px; resize: both; box-sizing: border-box;" name="custom_js" value="">--}}
{{--{{ $pageContent->custom_js }}</textarea>--}}
{{--            </div>--}}

{{--            <div class="block input_group">--}}
{{--                @error('custom_head_content')--}}
{{--                <span class="error"> {{ $message }} </span>--}}
{{--                @enderror--}}
{{--                <label for="custom_head_content">Custom Head: </label>--}}
{{--                <textarea type="text" placeholder="" style="font-family: Arial;min-height: 80px; resize: both; box-sizing: border-box;" name="custom_head_content" value="">--}}
{{--{{ $pageContent->custom_head_content }}</textarea>--}}
{{--            </div>--}}
{{--            <button type="submit" style="margin-left:0; margin-top: 1rem; padding: .5rem!important; overflow: hidden; ">Αποθήκευση</button>--}}
{{--        </div>--}}
{{--    <div id="Main" class="tabcontent">--}}
{{--           <h2> Επεξεργασία Σελίδας: {{ $page->name }}</h2>--}}
{{--            @csrf--}}
{{--            <input type="hidden" value="{{ $page->id }}" name="page_id"/>--}}
{{--        <div class="block input_group">--}}
{{--            <label for="display_name"> Όνομα: </label>--}}
{{--            @error('display_name')--}}
{{--            <span class="error"> {{ $message }} </span>--}}
{{--            @enderror--}}
{{--            <input type="text" name="display_name" placeholder="π.χ. Η σελίδα μου" value="{{ $pageContent->display_name }}">--}}
{{--        </div>--}}
{{--            <div class="block input_group">--}}

{{--                <label for="url">URL: </label>--}}
{{--                @error('url')--}}
{{--                <span class="error"> {{ $message }} </span>--}}
{{--                @enderror--}}
{{--                <input @if($page->is_home) type="hidden" @else type="text" @endif  name="url" placeholder="π.χ. my-page-slug" value="@if(!$page->is_home){{ $pageContent->url }}@else 'no-url-its-home-page-67829037583946789023758902346573492374809237523489572893476232' @endif">--}}

{{--            </div>--}}

{{--            <div class="block input_group">--}}
{{--                <label for="title">Τίτλος: </label>--}}
{{--                @error('title')--}}
{{--                <span class="error"> {{ $message }} </span>--}}
{{--                @enderror--}}
{{--                <input type="text" placeholder="π.χ Welcome | Mywebpage.com" name="title" value="{{ $pageContent->title }}">--}}
{{--            </div>--}}

{{--            <div class="block input_group">--}}
{{--                @error('keywords')--}}
{{--                <span class="error"> {{ $message }} </span>--}}
{{--                @enderror--}}
{{--                <label for="keywords">Λέξεις Κλειδιά: </label>--}}
{{--                <input type="text" placeholder="" name="keywords" value="{{ $pageContent->keywords }}">--}}
{{--            </div>--}}

{{--            <div class="block input_group">--}}
{{--                @error('description')--}}
{{--                <span class="error"> {{ $message }} </span>--}}
{{--                @enderror--}}
{{--                <label for="description">Περιγραφή: </label>--}}
{{--                <textarea type="text" placeholder="" style="font-family: Arial;min-height: 60px;" name="description" value="">{{ $pageContent->description }}</textarea>--}}
{{--            </div>--}}

{{--            --}}{{--        <textarea class="editor" id="editor" name="content" wire:model="content" >--}}
{{--            --}}{{--        <div x-data="{content: @entangle('content')}">--}}
{{--            <div class="block input_group">--}}
{{--                @error('content')--}}
{{--                <span class="error"> {{ $message }} </span>--}}
{{--                @enderror--}}
{{--                <label for="content">Περιεχόμενο Σελίδας: </label>--}}
{{--                <textarea name="content" x-model="content" id="editor" style="max-height: 700px; overflow: auto;">--}}
{{--                     {{ $pageContent->content }}--}}
{{--            </textarea>--}}

{{--            </div>--}}




{{--            <button type="submit" style="margin-left:0; margin-top: 1rem; ">Αποθήκευση</button>--}}

{{--    </div>--}}



{{--    </form>--}}


{{--    <script>--}}
{{--        function openCity(evt, cityName) {--}}
{{--            var i, tabcontent, tablinks;--}}
{{--            tabcontent = document.getElementsByClassName("tabcontent");--}}
{{--            for (i = 0; i < tabcontent.length; i++) {--}}
{{--                tabcontent[i].style.display = "none";--}}
{{--            }--}}
{{--            tablinks = document.getElementsByClassName("tablinks");--}}
{{--            for (i = 0; i < tablinks.length; i++) {--}}
{{--                tablinks[i].className = tablinks[i].className.replace(" active", "");--}}
{{--            }--}}
{{--            document.getElementById(cityName).style.display = "block";--}}
{{--            evt.currentTarget.className += " active";--}}
{{--        }--}}
{{--    </script>--}}
{{--    </div>--}}

{{--    @script--}}
{{--    <script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/super-build/ckeditor.js"></script>--}}
{{--    @endscript--}}

{{--    <livewire:page-content-management :id="$page->id" />--}}

{{--@endsection--}}
@extends('layouts.app')
@section('content')
    <div class="p-8 bg-gray-100 min-h-screen">
        <!-- Tabs for Locales -->
        <div class="flex space-x-4 mb-8 justify-center">
            @foreach($locales as $locale)
                @if($selected_locale->id == $locale->id)
                    <a href="/admin/pages/content/{{$page_id}}/{{$locale->code}}"
                       class="px-4 py-2 text-white bg-blue-600 rounded-lg shadow font-medium">
                        {{ $locale->code }}
                    </a>
                @else
                    <a href="/admin/pages/content/{{$page_id}}/{{$locale->code}}"
                       class="px-4 py-2 text-gray-600 bg-blue-200 hover:bg-blue-600 hover:text-white rounded-lg shadow font-medium">
                        {{ $locale->code }}
                    </a>
                @endif
            @endforeach
        </div>

        <!-- Form -->
        <form method="post" action="/admin/page/content/save/{{$page->id}}/{{ $selected_locale['code'] }}" class="max-w-5xl mx-auto bg-white p-6 rounded-lg shadow-lg space-y-6">
            @csrf
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Επεξεργασία Σελίδας: {{ $page->name }}</h2>
            <input type="hidden" value="{{ $page->id }}" name="page_id"/>
            <!-- Main Section -->
            <div class="space-y-4">
                <!-- Display Name -->
                <div>
                    <label for="display_name" class="block text-gray-700 font-medium text-lg">Όνομα:</label>
                    @error('display_name')
                    <span class="text-red-500 text-lg">{{ $message }}</span>
                    @enderror
                    <input type="text" name="display_name" value="{{ $pageContent->display_name }}" placeholder="π.χ. Η σελίδα μου" class="w-full px-4 py-2 border rounded-lg focus:ring-blue-500">
                </div>

                <!-- URL -->
                <div>
                    <label for="url" class="block text-gray-700 font-medium text-lg">URL:</label>
                    @error('url')
                    <span class="text-red-500 text-lg">{{ $message }}</span>
                    @enderror
                    <input @if($page->is_home) type="hidden" @else type="text" @endif name="url" value="@if(!$page->is_home){{ $pageContent->url }}@else 'url-was-not-added-due-to-home' @endif" placeholder="π.χ. my-page-slug" class="w-full px-4 py-2 border rounded-lg focus:ring-blue-500">
                </div>

                <!-- Title -->
                <div>
                    <label for="title" class="block text-gray-700 font-medium text-lg">Τίτλος:</label>
                    @error('title')
                    <span class="text-red-500 text-lg">{{ $message }}</span>
                    @enderror
                    <input type="text" name="title" value="{{ $pageContent->title }}" placeholder="π.χ Welcome | Mywebpage.com" class="w-full px-4 py-2 border rounded-lg focus:ring-blue-500">
                </div>

                <!-- Keywords -->
                <div>
                    <label for="keywords" class="block text-gray-700 font-medium text-lg">Λέξεις Κλειδιά:</label>
                    @error('keywords')
                    <span class="text-red-500 text-lg">{{ $message }}</span>
                    @enderror
                    <input type="text" name="keywords" value="{{ $pageContent->keywords }}" placeholder="Λέξη 1, λέξη 2 κλπ..." class="w-full px-4 py-2 border rounded-lg focus:ring-blue-500">
                </div>

                <!-- Description -->
                <div>
                    <label for="description" class="block text-gray-700 font-medium text-lg">Περιγραφή:</label>
                    @error('description')
                    <span class="text-red-500 text-lg">{{ $message }}</span>
                    @enderror
                    <textarea name="description" placeholder="Μία περίληψη για τη σελίδα.." class="w-full px-4 py-2 border rounded-lg focus:ring-blue-500" rows="4">{{ $pageContent->description }}</textarea>
                </div>

                <!-- Content -->
                <div>
                    <label for="content" class="block text-gray-700 font-medium text-lg">Περιεχόμενο Σελίδας:</label>
                    @error('content')
                    <span class="text-red-500 text-lg">{{ $message }}</span>
                    @enderror
                    <textarea name="content" id="editor" class="w-full px-4 py-2 border rounded-lg focus:ring-blue-500" rows="8">{{ $pageContent->content }}</textarea>

                </div>
            </div>

            <!-- Advanced Section (Accordion) -->
            <div class="border-t border-gray-300 pt-6 text-lg">
                <button type="button" onclick="toggleAccordion()" class="w-full text-left px-4 py-2 bg-indigo-500 hover:bg-indigo-400 font-medium text-gray-300 rounded-lg">
                    Για Προχωριμένους
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 inline float-right">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>

                </button>

                <div id="accordionContent" class="hidden space-y-4 mt-4 text-lg">
                    <!-- Page Layout -->
                    <div>
                        <label class="block text-gray-700 font-medium text-lg">Page Layout:</label>
                        <select name="page_layout_type" class="w-full px-4 py-2 border rounded-lg focus:ring-blue-500">
                            <option value="1" {{ $page->page_layout_type == '1' ? 'selected' : '' }}>General Layout</option>
                            <option value="2" {{ $page->page_layout_type == '2' ? 'selected' : '' }}>Room Layout</option>
                            <option value="3" {{ $page->page_layout_type == '3' ? 'selected' : '' }}>Gallery Layout</option>
                            <option value="4" {{ $page->page_layout_type == '4' ? 'selected' : '' }}>Contact us</option>
                        </select>
                    </div>

                    <!-- CSS -->
                    <div>
                        <label for="custom_css" class="block text-gray-700 font-medium text-lg">CSS:</label>
                        @error('custom_css')
                        <span class="text-red-500 text-lg">{{ $message }}</span>
                        @enderror
                        <textarea name="custom_css" class="w-full px-4 py-2 border rounded-lg focus:ring-blue-500" rows="4">{{ $pageContent->custom_css }}</textarea>
                    </div>

                    <!-- JavaScript -->
                    <div>
                        <label for="custom_js" class="block text-gray-700 font-medium text-lg">Javascript:</label>
                        @error('custom_js')
                        <span class="text-red-500 text-lg">{{ $message }}</span>
                        @enderror
                        <textarea name="custom_js" class="w-full px-4 py-2 border rounded-lg focus:ring-blue-500" rows="4">{{ $pageContent->custom_js }}</textarea>
                    </div>

                    <!-- Custom Head -->
                    <div>
                        <label for="custom_head_content" class="block text-gray-700 font-medium text-lg">Custom Head:</label>
                        @error('custom_head_content')
                        <span class="text-red-500 text-lg">{{ $message }}</span>
                        @enderror
                        <textarea name="custom_head_content" class="w-full px-4 py-2 border rounded-lg focus:ring-blue-500" rows="4">{{ $pageContent->custom_head_content }}</textarea>
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="text-right">
                <button type="submit" class="px-6 py-2 bg-green-600 text-white mt-2 font-medium rounded-lg shadow hover:bg-green-700">Αποθήκευση</button>
            </div>
        </form>
    </div>

    <script>
        function toggleAccordion() {
            const content = document.getElementById('accordionContent');
            content.classList.toggle('hidden');
        }
    </script>
@endsection
