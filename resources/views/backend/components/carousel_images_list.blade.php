{{--@extends('layouts.cms')--}}
{{--@section('content')--}}

{{--    <style>--}}
{{--        .alt-button{--}}
{{--            background-color: white;--}}
{{--            transition: .3s;--}}
{{--        }--}}
{{--        .alt-button:hover{--}}
{{--            background-color: #1f1f1f;--}}
{{--            color: white;--}}
{{--        }--}}
{{--        .image-list{--}}
{{--            display: flex;--}}
{{--            flex-direction: row;--}}
{{--            flex-wrap: wrap;--}}
{{--            position: relative;--}}
{{--        border: 2px solid gray;--}}
{{--            justify-content: center;--}}
{{--        }--}}
{{--        .image-list > .image-card{--}}
{{--            max-width: 250px;--}}
{{--            display: inline-block;--}}
{{--            position: relative;--}}
{{--            border: 2px solid #1f1f1f;--}}
{{--            padding: .2rem;--}}
{{--            margin: .8rem;--}}
{{--        }--}}

{{--        .image-list > .image-card > img{--}}
{{--            max-width: 100%;--}}
{{--            width: 250px;--}}
{{--            height: 250px;--}}
{{--            object-fit: contain;--}}
{{--            box-sizing: border-box;--}}
{{--        }--}}
{{--    </style>--}}
{{--<div class="Mega-container">--}}
{{--    <div class="image-list">--}}
{{--        @if($carouselImages)--}}
{{--            @foreach($carouselImages as $ci)--}}

{{--                <div class="image-card">--}}
{{--                    <img src="{{ asset('images/carouselImages/'.$ci->image_path) }}">--}}
{{--                    <a style="color: red;" class="delete-a-button" href="/easyupdate/carousel/images/delete/{{ $ci->id }}"> <span class="material-symbols-outlined">delete</span></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;--}}
{{--                    <a style="color: orange;" class="delete-a-button" href="#" onclick="openEditImageModal({{$ci->id}})" ><span class="material-symbols-outlined">edit--}}
{{--</span></a>&nbsp;&nbsp;&nbsp;&nbsp;--}}
{{--                    <a style="color: green;" class="delete-a-button" href="/easyupdate/carousel/images/{{ $ci->id }}/manage-captions"><span class="material-symbols-outlined">subtitles</span></a>--}}

{{--                </div>--}}
{{--            @endforeach--}}
{{--        @endif--}}
{{--    </div>--}}
{{--    <div class="mbfContainer" style="border-inline: none; border-bottom: none;"  >--}}

{{--        <form runat="server" enctype="multipart/form-data"  action="/easyupdate/carousel/image/store/{{ $carousel->id }}"   style="border-bottom: 2px solid #1f1f1f; border-inline: 2px solid #1f1f1f;" method="post" class="mainBackEndForm">--}}
{{--            @csrf--}}
{{--            <h2 style=""> Εικόνες Carousel | {{ $carousel->page->name }}</h2>--}}
{{--        <div class="input-group-block">--}}
{{--            <label for="image"> Προσθήκη νέας εικόνας</label>--}}
{{--            <br>--}}
{{--            <img src="#" id="image_preview" style="max-width: 350px; max-height:350px;width: auto; object-fit: contain;">--}}
{{--            <input type="file" name="image" id="imgInp" >--}}
{{--            <br>--}}
{{--        </div>--}}
{{--            <div class="input-group-block">--}}
{{--                <label for="is_enabled" style="display: inline-block">Εμφάνιση : </label>--}}
{{--                <input type="checkbox" style="display: inline-block" name="is_enabled" id="is_enabled">--}}
{{--            </div>--}}
{{--            <div class="input-group-block">--}}
{{--                <label for="order">Σειρά εμφάνισης : </label>--}}
{{--                <input type="text" name="order" id="order">--}}
{{--            </div>--}}
{{--            <div class="input-group-block">--}}
{{--            <button type="submit" style="margin:0; right:0; left:0; float:none; position: relative; display: block"> Αποθήκευση </button>--}}
{{--            </div>--}}
{{--        </form>--}}
{{--        <br><br>--}}
{{--    </div>--}}

{{--</div>--}}
{{--    @foreach($carouselImages as $ci)--}}
{{--        <div class="general-modal-overlay" id="image_md_{{$ci->id}}">--}}
{{--            <div class="modal-content">--}}
{{--                <h3 style="padding: 0; margin: 1.1rem; width: 100%; text-align: center; box-sizing: border-box!important;border:1px solid red; max-width: 100%; "> Αλλαγή Πληροφοριών Εικόνας</h3>--}}
{{--                <a class="close-modal-button" onclick="openEditImageModal({{$ci->id}})"> X </a>--}}
{{--                <form method="post" action="/easyupdate/carousel/image/updateinfo/{{ $ci->id }}" enctype="multipart/form-data">--}}
{{--                    @csrf--}}
{{--                    <div class="input-group-block">--}}
{{--                    <label for="order">Σειρά εμφάνισης: </label>--}}
{{--                    <input type="text" name="order" value="{{ $ci->order }}">--}}
{{--                    </div>--}}
{{--                    <div class="input-group-block">--}}
{{--                    <label for="is_enabled" style="display: inline">Εμφάνιση : </label>--}}
{{--                    <input type="checkbox"  name="is_enabled" @if($ci->is_enabled) checked @endif style="display: inline">--}}
{{--                    </div>--}}
{{--                    <button style="margin-inline: 0;margin-block: .5rem; min-width: fit-content;"> Αποθήκευση </button>--}}
{{--                </form>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    @endforeach--}}
{{--    <script>--}}
{{--        function openEditImageModal(id){--}}
{{--            let image = document.getElementById('image_md_' + id);--}}
{{--            image.classList.toggle('shown');--}}
{{--        }--}}
{{--    </script>--}}
{{--    <script>--}}
{{--        imgInp.onchange = evt => {--}}
{{--            const [file] = imgInp.files--}}
{{--            if (file) {--}}
{{--                image_preview.src = URL.createObjectURL(file)--}}
{{--            }--}}
{{--        }--}}
{{--    </script>--}}
{{--@endsection--}}
@extends('layouts.app')
@section('content')

    <div class="p-8 bg-gray-100 min-h-screen">
        <!-- Image List -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @if($carouselImages)
                @foreach($carouselImages as $ci)
                    <div class="border rounded-lg p-4 shadow bg-white relative">
                        <img src="{{ asset('images/carouselImages/' . $ci->image_path) }}" alt="Carousel Image" class="w-full h-64 object-contain rounded-lg">
                        <div class="flex justify-between items-center mt-4">
                            <!-- Delete Button -->
                            <a href="/admin/carousel/images/delete/{{ $ci->id }}" class="text-red-500 hover:underline flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 inline">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                </svg>

                            </a>
                            <!-- Edit Button -->
                            <a href="#" onclick="openEditImageModal({{ $ci->id }})" class="text-orange-500 hover:underline flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 inline">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                                </svg>

                            </a>
                            <!-- Captions Button -->
                            <a href="/admin/carousel/images/{{ $ci->id }}/manage-captions" class="text-green-500 hover:underline flex items-center">

                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 inline">
  <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 0 1 .865-.501 48.172 48.172 0 0 0 3.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
</svg>
                            </a>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>

        <!-- Image Upload Form -->
        <div class="mt-12 bg-white p-6 rounded-lg shadow-lg">
            <h2 class="text-2xl font-semibold text-gray-800 mb-6">Εικόνες Carousel | {{ $carousel->page->name }}</h2>
            <form method="post" enctype="multipart/form-data" action="/admin/carousel/image/store/{{ $carousel->id }}" class="space-y-6">
                @csrf

                <!-- Image Preview -->
                <div>
                    <label for="image" class="block text-gray-700 font-medium mb-2">Προσθήκη νέας εικόνας</label>
                    <img id="image_preview" class="block max-w-sm max-h-64 mx-auto mb-4 object-contain">
                    <input type="file" name="image" id="imgInp" class="w-full px-4 py-2 border rounded-lg focus:ring-blue-500">
                </div>

                <!-- Is Enabled -->
                <div class="flex items-center">
                    <label for="is_enabled" class="text-gray-700 font-medium">Εμφάνιση:</label>
                    <input type="checkbox" name="is_enabled" id="is_enabled" class="ml-3 h-5 w-5 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                </div>

                <!-- Order -->
                <div>
                    <label for="order" class="block text-gray-700 font-medium mb-2">Σειρά εμφάνισης:</label>
                    <input type="text" name="order" id="order" class="w-full px-4 py-2 border rounded-lg focus:ring-blue-500">
                </div>

                <!-- Submit Button -->
                <div class="text-center">
                    <button type="submit" class="px-6 py-2 bg-blue-600 text-white font-medium rounded-lg shadow hover:bg-blue-700 focus:ring focus:ring-blue-500">
                        Αποθήκευση
                    </button>
                </div>
            </form>
        </div>

        <!-- Modals for Editing Image Info -->
        @foreach($carouselImages as $ci)
            <div id="image_md_{{ $ci->id }}" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
                <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-lg">
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">Αλλαγή Πληροφοριών Εικόνας</h3>
                    <button onclick="openEditImageModal({{ $ci->id }})" class="absolute top-2 right-2 text-gray-500 hover:text-gray-800">
                        X
                    </button>
                    <form method="post" action="/admin/carousel/image/updateinfo/{{ $ci->id }}" enctype="multipart/form-data" class="space-y-4" >
                        @csrf
                        <!-- Order -->
                        <div>
                            <label>Αλλαγή εικόνας: </label>
                            <input type="file" name="image">
                        </div>
                        <div>
                            <label for="order_{{ $ci->id }}" class="block text-gray-700 font-medium mb-2">Σειρά εμφάνισης:</label>
                            <input type="text" name="order" id="order_{{ $ci->id }}" value="{{ $ci->order }}" class="w-full px-4 py-2 border rounded-lg focus:ring-blue-500">
                        </div>
                        <!-- Is Enabled -->
                        <div class="flex items-center">
                            <label for="is_enabled_{{ $ci->id }}" class="text-gray-700 font-medium">Εμφάνιση:</label>
                            <input type="checkbox" name="is_enabled" id="is_enabled_{{ $ci->id }}" @if($ci->is_enabled) checked @endif class="ml-3 h-5 w-5 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                        </div>
                        <!-- Submit -->
                        <div class="text-center">
                            <button type="submit" class="px-6 py-2 bg-blue-600 text-white font-medium rounded-lg shadow hover:bg-blue-700 focus:ring focus:ring-blue-500">
                                Αποθήκευση
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        @endforeach
    </div>

    <script>
        function openEditImageModal(id) {
            let modal = document.getElementById('image_md_' + id);
            modal.classList.toggle('hidden');
        }

        const imgInp = document.getElementById('imgInp');
        const imagePreview = document.getElementById('image_preview');
        imgInp.onchange = evt => {
            const [file] = imgInp.files;
            if (file) {
                imagePreview.src = URL.createObjectURL(file);
            }
        };
    </script>
@endsection
