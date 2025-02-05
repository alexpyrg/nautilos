{{--@extends('layouts.cms')--}}
{{--@section('content')--}}
{{--    <div class="container">--}}

{{--        <div style="display: flex; flex-direction: row; flex-wrap: wrap;">--}}
{{--            @foreach($images as $img)--}}
{{--                <div>--}}
{{--                    <img data-fancybox="gallery" style="max-width: 200px; height: 150px; object-fit: contain;object-position: center; border:1px solid #1f1f1f; " id="" src="{{ asset('images/pageImages/'. $img->image_path) }}">--}}
{{--                    <span style="width:  100%; display: block; position: relative;">--}}
{{--                        <a href="/admin/pages/images/delete/{{ $img->id }}"><span class="material-symbols-outlined" style="color: red;">delete</span></a>--}}
{{--                        <a href="/page_images/{{ $img->id }}/editAlts"><span class="material-symbols-outlined" style="color: red;">edit_note</span> </a>--}}
{{--                    <a style="color: orange;" class="delete-a-button" href="#" onclick="openEditImageModal({{$img->id}})" ><span class="material-symbols-outlined">edit--}}
{{--</span></a>&nbsp;&nbsp;&nbsp;&nbsp;--}}
{{--                    </span>--}}
{{--                </div>--}}
{{--            @endforeach--}}
{{--        </div>--}}
{{--        <div class="text-center mt-10">--}}
{{--            <h1 class="text-4xl font-bold">Testing Tailwind CSS</h1>--}}
{{--            <p class="mt-4">If you see a blue background and white text, Tailwind CSS is working!</p>--}}
{{--        </div>--}}
{{--        <form method="post" action="/admin/pages/images/upload" enctype="multipart/form-data" style="border:2px solid #1f1f1f; padding:0; min-width: fit-content">--}}
{{--            @csrf--}}
{{--            <h2 style="background-color: #1f1f1f; margin:0; color: white; text-align: center; padding-block: .4rem;"> Ανεβάστε εικόνα </h2>--}}
{{--            <div class="input-group-inline">--}}
{{--                <input type="hidden" name="page_id" value="{{ $page->id }}">--}}
{{--                <input type="file" name="image">--}}
{{--            </div>--}}
{{--            <div class="input-group-block" style="box-sizing: border-box;">--}}
{{--                <label for="is_enabled">  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Alt / Περιγραφή εικόνας        </label>--}}

{{--                <input style="width: 100%; font-size: 18px; box-sizing: border-box;  max-width: 99% ;margin-inline: .2rem;" type="text" name="alt">--}}
{{--            </div>--}}
{{--            <div class="input-group-inline">--}}
{{--                <label for="is_enabled"> Εμφάνιση </label>--}}
{{--                <input type="checkbox" id="is_enabled" name="is_enabled">--}}
{{--            </div>--}}
{{--            <div class="input-group-inline">--}}
{{--                <label for="is_enabled"> Σειρά εμφάνισης </label>--}}
{{--                <input type="text" id="order"  style="font-size: 18px;" name="order">--}}
{{--            </div>--}}
{{--            <div class="input-group-inline">--}}
{{--                <input type="submit" value="Αποθήκευση">--}}
{{--            </div>--}}
{{--        </form>--}}

{{--    </div>--}}
{{--    @foreach($images as $img)--}}
{{--        <div class="general-modal-overlay" id="image_md_{{$img->id}}">--}}
{{--            <div class="modal-content">--}}
{{--                <h3 style="padding: 0; margin: 1.1rem; width: 100%; text-align: center; box-sizing: border-box!important;border:1px solid red; max-width: 100%; "> Αλλαγή Πληροφοριών Εικόνας</h3>--}}
{{--                <a class="close-modal-button" onclick="openEditImageModal({{$img->id}})"> X </a>--}}
{{--                <form method="post" action="/easyupdate/pages/image/updateinfo/{{ $img->id }}" enctype="multipart/form-data">--}}
{{--                    @csrf--}}
{{--                    <div class="input-group-block">--}}
{{--                        <label for="order">Σειρά εμφάνισης: </label>--}}
{{--                        <input type="text" name="order" value="{{ $img->order }}">--}}
{{--                    </div>--}}
{{--                    <div class="input-group-block">--}}
{{--                        <label for="is_enabled" style="display: inline">Εμφάνιση : </label>--}}
{{--                        <input type="checkbox"  name="is_enabled" @if($img->is_enabled) checked @endif style="display: inline">--}}
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
{{-- ITERATION 2 OLD AND LOOKS LIKE SHIT --}}
{{--@extends('layouts.cms')--}}

{{--@section('content')--}}
{{--    <div style="all: unset;" class="container mx-auto px-4">--}}

{{--        <!-- Image Gallery -->--}}
{{--        <div class="flex flex-wrap gap-4">--}}
{{--            @foreach($images as $img)--}}
{{--                <div class="border border-gray-700 p-2">--}}
{{--                    <img data-fancybox="gallery" src="{{ asset('images/pageImages/' . $img->image_path) }}" alt="Image" class="max-w-[200px] h-[150px] object-contain border border-gray-800">--}}
{{--                    <div class="flex justify-between mt-2">--}}
{{--                        <a href="/easyupdate/pages/images/delete/{{ $img->id }}" class="text-red-500">--}}
{{--                            <span class="material-symbols-outlined">delete</span>--}}
{{--                        </a>--}}
{{--                        <a href="/page_images/{{ $img->id }}/editAlts" class="text-orange-500">--}}
{{--                            <span class="material-symbols-outlined">edit_note</span>--}}
{{--                        </a>--}}
{{--                        <a href="#" onclick="openEditImageModal({{ $img->id }})" class="text-yellow-500">--}}
{{--                            <span class="material-symbols-outlined">edit</span>--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            @endforeach--}}
{{--        </div>--}}

{{--        <!-- Upload Form -->--}}
{{--        <form method="post" action="/easyupdate/pages/images/upload" enctype="multipart/form-data" class="border border-gray-700 p-0 mt-6 space-y-4">--}}
{{--            @csrf--}}
{{--            <h2 class="bg-gray-800 text-white text-center p-2 m-0 mt-0">Ανεβάστε εικόνα</h2>--}}
{{--            <input type="hidden" name="page_id" value="{{ $page->id }}">--}}
{{--            <div>--}}
{{--                <input type="file" id="imgInp" name="image" class="w-full">--}}
{{--                <img id="image_preview" src="#" alt="Preview" class="mt-4 hidden w-64 h-64 object-cover rounded-none">--}}
{{--            </div>--}}
{{--            <div>--}}
{{--                <label for="alt" class="block text-lg">Alt / Περιγραφή εικόνας</label>--}}
{{--                <input type="text" name="alt" class="w-full border border-gray-300 p-2">--}}
{{--            </div>--}}
{{--            <div>--}}
{{--                <label for="order" class="block text-lg">Σειρά εμφάνισης</label>--}}
{{--                <input type="text" name="order" class="w-full border border-gray-300 p-2">--}}
{{--            </div>--}}
{{--            <button style="all:unset;" type="submit" class="w-full bg-blue-600 text-white py-2 rounded-md">Αποθήκευση</button>--}}
{{--        </form>--}}

{{--        <!-- Edit Image Modals -->--}}
{{--        @foreach($images as $img)--}}
{{--            <div class="general-modal-overlay fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden" id="image_md_{{ $img->id }}">--}}
{{--                <div class="modal-content bg-white p-6 rounded-lg shadow-lg w-80 relative">--}}
{{--                    <h3 class="text-xl text-center border-b border-red-500 py-2">Αλλαγή Πληροφοριών Εικόνας</h3>--}}
{{--                    <button onclick="openEditImageModal({{ $img->id }})" class="absolute top-2 right-2 text-xl text-gray-500">X</button>--}}
{{--                    <form method="post" action="/easyupdate/pages/image/updateinfo/{{ $img->id }}" enctype="multipart/form-data" class="space-y-4 mt-4">--}}
{{--                        @csrf--}}
{{--                        <div class="input-group-block">--}}
{{--                            <label for="order" class="block text-sm">Σειρά εμφάνισης:</label>--}}
{{--                            <input type="text" name="order" value="{{ $img->order }}" class="w-full border border-gray-300 p-2">--}}
{{--                        </div>--}}
{{--                        <div class="flex items-center space-x-2">--}}
{{--                            <label for="is_enabled" class="text-sm">Εμφάνιση:</label>--}}
{{--                            <input type="checkbox" name="is_enabled" class="form-checkbox" @if($img->is_enabled) checked @endif>--}}
{{--                        </div>--}}

{{--                        <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-md">Αποθήκευση</button>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        @endforeach--}}

{{--    </div>--}}

{{--    <script>--}}
{{--        function openEditImageModal(id) {--}}
{{--            const modal = document.getElementById('image_md_' + id);--}}
{{--            modal.classList.toggle('hidden');--}}
{{--        }--}}

{{--        function previewImage(event) {--}}
{{--            const imagePreview = document.getElementById('image_preview');--}}
{{--            const file = event.target.files[0];--}}
{{--            if (file) {--}}
{{--                imagePreview.src = URL.createObjectURL(file);--}}
{{--                imagePreview.classList.remove('hidden');--}}
{{--            }--}}
{{--        }--}}

{{--        document.getElementById('imgInp').addEventListener('change', previewImage);--}}
{{--    </script>--}}
{{--@endsection--}}
{{-- ITERATION 3 NEW --}}
@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <!-- Image Gallery -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 mt-6">
            @foreach($images as $img)
                <div class="border border-gray-300 p-4 rounded-md shadow-sm bg-white">
                    <img data-fancybox="gallery" src="{{ asset('images/pageImages/' . $img->image_path) }}" alt="Image"
                         class="w-full h-40 object-contain border border-gray-300 rounded-md">
                    <div class="mt-4 space-y-1">
                        <div class="text-sm text-gray-700">Dimensions: {{ $img->dimensions }}</div>
                        <div class="text-sm text-gray-700">Filename: {{ $img->filename }}</div>
                        <div class="text-sm text-gray-700">Location: {{ $img->relative_path }}</div>
                    </div>
                    <div class="flex justify-between mt-2">
                        <a href="/admin/pages/images/delete/{{ $img->id }}" class="text-red-500 hover:underline">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                            </svg>

                        </a>
                        <a href="/page_images/{{ $img->id }}/editAlts" class="text-orange-500 hover:underline">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 0 1 .865-.501 48.172 48.172 0 0 0 3.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
                            </svg>

                        </a>
                        <a href="#" onclick="openEditImageModal({{ $img->id }})" class="text-yellow-500 hover:underline">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                            </svg>

                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Upload Form -->
        <form method="post" action="/admin/pages/images/upload" enctype="multipart/form-data" class="border w-[800px] border-gray-300 p-0 mt-8 rounded-md shadow-sm bg-white">
            @csrf
            <h2 class="text-lg font-semibold text-center bg-gray-800 text-white py-2 rounded-t">Ανεβάστε Εικόνα</h2>
            <input type="hidden" name="page_id" value="{{ $page->id }}">

            <div class="mt-4 mx-4">
                <input type="file" id="imgInp" name="image" class="block w-full text-sm text-gray-500">
                <img id="image_preview" src="#" alt="Preview" class="mt-4 hidden w-64 h-64 object-cover rounded-md border border-gray-300">
            </div>
            <div class="mt-4 mx-4">
                <label for="alt" class="block text-sm font-medium text-gray-700">Alt / Περιγραφή εικόνας</label>
                <input type="text" name="alt" class="w-full border border-gray-300 p-2 rounded-md">
            </div>
            <div class="mt-4 mx-4">
                <label for="order" class="block text-sm font-medium text-gray-700">Σειρά εμφάνισης</label>
                <input type="text" name="order" class="w-full border border-gray-300 p-2 rounded-md">
            </div>
            <button type="submit" class="w-64 bg-blue-600 mb-4 text-white py-2 mt-6 mx-4 rounded-md hover:bg-blue-700">
                Αποθήκευση
            </button>
        </form>

        <!-- Edit Image Modals -->
        @foreach($images as $img)
            <div id="image_md_{{ $img->id }}" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
                <div class="bg-white p-6 rounded-md shadow-lg w-96 relative">
                    <h3 class="text-lg font-medium text-center border-b border-gray-300 pb-2 mb-4">Αλλαγή Πληροφοριών Εικόνας</h3>
                    <button onclick="openEditImageModal({{ $img->id }})" class="absolute top-2 right-2 text-gray-500">
                        X
                    </button>
                    <form method="post" action="/admin/pages/image/updateinfo/{{ $img->id }}" enctype="multipart/form-data" class="space-y-4">
                        @csrf
                        <div>
                            <label for="order" class="block text-sm font-medium text-gray-700">Σειρά εμφάνισης:</label>
                            <input type="text" name="order" value="{{ $img->order }}" class="w-full border border-gray-300 p-2 rounded-md">
                        </div>
                        <div class="flex items-center space-x-2">
                            <input type="checkbox" name="is_enabled" class="form-checkbox h-5 w-5" @if($img->is_enabled) checked @endif>
                            <label for="is_enabled" class="text-sm text-gray-700">Εμφάνιση</label>
                        </div>
                        <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700">
                            Αποθήκευση
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>

    <script>
        function openEditImageModal(id) {
            const modal = document.getElementById('image_md_' + id);
            modal.classList.toggle('hidden');
        }

        function previewImage(event) {
            const imagePreview = document.getElementById('image_preview');
            const file = event.target.files[0];
            if (file) {
                imagePreview.src = URL.createObjectURL(file);
                imagePreview.classList.remove('hidden');
            }
        }

        document.getElementById('imgInp').addEventListener('change', previewImage);
    </script>
@endsection
