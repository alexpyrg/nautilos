{{--@extends('layouts.cms')--}}
{{--@section('content')--}}
{{--    <div>--}}
{{--        <table>--}}
{{--            <tr>--}}
{{--                <th> Τίτλος </th>--}}
{{--                <th> - </th>--}}
{{--                <th> Ενέργειες </th>--}}
{{--            </tr>--}}
{{--            @foreach($cards as $card)--}}
{{--                <tr>--}}
{{--                    <td> {{ $card->title }} </td>--}}
{{--                    <td> {{ $card->order }} </td>--}}
{{--                    <td> <a href="/easyupdate/cardWidget/edit/{{ $card->id }}/en">Επεξεργασία </a> <a href="#" style="color: #20202f;" onclick="openCardImageModal({{$card->id}})"> <span class="material-symbols-outlined">--}}
{{--photo_library--}}
{{--</span> </a>  </td>--}}
{{--                </tr>--}}
{{--            @endforeach--}}
{{--        </table>--}}


{{--    </div>--}}
{{--    @foreach($cards as $card)--}}
{{--        <div class="general-modal-overlay" id="card_{{$card->id}}">--}}
{{--            <div class="modal-content">--}}
{{--                <a class="close-modal-button" onclick="openCardImageModal({{$card->id}})"> X </a>--}}
{{--                <form runat="server" method="post" action="/easyupdate/cardWidgets/image/{{ $card->id }}" enctype="multipart/form-data">--}}
{{--                    @csrf--}}
{{--                    Υπάρχουσα εικόνα:--}}
{{--                    <img id="image_preview" src="{{ asset('images/cardImages/' . $card->image_path) }}">--}}
{{--                    <img id="image_preview" src="#">--}}
{{--                    <input type="hidden" name="test" value="asd">--}}
{{--                    <input type="file" id="imgInp" name="image" >--}}
{{--                    <button style="margin-inline: 0;margin-block: .5rem; min-width: fit-content;"> Αποθήκευση </button>--}}
{{--                </form>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    @endforeach--}}

{{--    <script>--}}
{{--        imgInp.onchange = evt => {--}}
{{--            const [file] = imgInp.files--}}
{{--            if (file) {--}}
{{--                image_preview.src = URL.createObjectURL(file)--}}

{{--            }--}}
{{--            console.log('test');--}}
{{--        }--}}
{{--    </script>--}}
{{--@endsection--}}

@extends('layouts.app')
@section('content')

    <div class="p-8 bg-gray-100 min-h-screen">
        <div class="max-w-5xl mx-auto bg-white p-6 rounded-lg shadow-lg">
            <!-- Table -->
            <div class="overflow-x-auto">
                <table class="w-full border-collapse border border-gray-300 rounded-lg shadow">
                    <thead>
                    <tr class="bg-gray-200">
                        <th class="px-4 py-2 text-left text-gray-700 font-medium">Τίτλος</th>
                        <th class="px-4 py-2 text-left text-gray-700 font-medium">Σειρά</th>
                        <th class="px-4 py-2 text-left text-gray-700 font-medium">Ενέργειες</th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-300">
                    @foreach($cards as $card)
                        <tr class="hover:bg-gray-50">
                            <!-- Title -->
                            <td class="px-4 py-2 text-gray-700">{{ $card->title }}</td>
                            <!-- Order -->
                            <td class="px-4 py-2 text-gray-700">{{ $card->order }}</td>
                            <!-- Actions -->
                            <td class="px-4 py-2 text-gray-700 flex space-x-4">
                                <!-- Edit -->
                                <a href="/admin/cardWidget/edit/{{ $card->id }}/en" class="text-blue-600 hover:underline">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 inline">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                    </svg>

                                </a>
                                <!-- Open Modal -->
                                <a href="#" onclick="openCardImageModal({{ $card->id }})" class="text-gray-600 hover:text-gray-800">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 inline">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                                    </svg>

                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Modals -->
        @foreach($cards as $card)
            <div id="card_{{ $card->id }}" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
                <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-lg relative">
                    <!-- Close Button -->
                    <button onclick="openCardImageModal({{ $card->id }})" class="absolute top-2 right-2 text-gray-500 hover:text-gray-800">
                        X
                    </button>

                    <!-- Form -->
                    <form runat="server" method="post" action="/admin/cardWidgets/image/{{ $card->id }}" enctype="multipart/form-data" class="space-y-4">
                        @csrf

                        <!-- Existing Image -->
                        <div class="text-gray-700 font-medium">
                            Υπάρχουσα εικόνα:
                        </div>
                        <img id="image_preview_{{ $card->id }}" src="{{ asset('images/cardImages/' . $card->image_path) }}" class="block w-full max-h-64 object-contain rounded-lg shadow">

                        <!-- File Input -->
                        <div>
                            <label for="imgInp_{{ $card->id }}" class="block text-gray-700 font-medium mb-2">Επιλογή νέας εικόνας:</label>
                            <input type="file" id="imgInp_{{ $card->id }}" name="image" class="w-full px-4 py-2 border rounded-lg focus:ring-blue-500">
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
        @endforeach
    </div>

    <script>
        function openCardImageModal(id) {
            const modal = document.getElementById('card_' + id);
            modal.classList.toggle('hidden');
        }

        // Update preview for all image inputs
        document.querySelectorAll('[id^=imgInp_]').forEach(input => {
            input.addEventListener('change', (event) => {
                const id = event.target.id.split('_')[1];
                const file = event.target.files[0];
                if (file) {
                    const preview = document.getElementById('image_preview_' + id);
                    preview.src = URL.createObjectURL(file);
                }
            });
        });
    </script>

@endsection
