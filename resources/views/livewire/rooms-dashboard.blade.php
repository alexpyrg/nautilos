{{--<div>--}}

{{--    <div>--}}
{{--        <table class="dashboard_table">--}}
{{--            <tr>--}}
{{--                --}}{{--            <th> </th>--}}
{{--                <th> Όνομα Δωματίου </th>--}}
{{--                <th> Εμφάνιση </th>--}}
{{--                <th> Άτομα </th>--}}
{{--                <th> Αρ. Δωματίων </th>--}}
{{--                <th> Ενέργειες </th>--}}
{{--            </tr>--}}
{{--            @if($rooms !== null )--}}
{{--                @foreach($rooms as $room)--}}

{{--                    <tr>--}}
{{--                        <td class="name">--}}
{{--                            <span class="material-symbols-outlined">bed</span>--}}
{{--                            {{$room->name}} </td>--}}
{{--                        <td> {{$room->is_available}}</td>--}}
{{--                        <td> {{$room->max_occupants}} </td>--}}
{{--                        <td>--}}
{{--                            {{$room->number}}--}}
{{--                        </td>--}}
{{--                        <td>--}}
{{--                            <a href="/easyupdate/hotel/room/{{$room->id}}">ΕΠΕΞ.<span class="material-symbols-outlined">edit</span></a>--}}
{{--                            @if(Auth()->user()->type !== "beginner") <a href="/easyupdate/hotel/room/options/{{$room->id}}"> <span class="material-symbols-outlined">settings</span> </a> @endif--}}
{{--                            <a href="/easyupdate/rooms/translate/{{$room->id}}"> <span class="material-symbols-outlined">edit_note</span></a>--}}
{{--                            <a href="/easyupdate/hotel/room/delete/{{$room->id}}"> <span class="material-symbols-outlined">delete</span></a> --}}{{-- SE PAEI SE SELIDA POY KANEIS CONFIRM TO DELETE KAI STELNETAI APO EKEI TO DELETE REQUEST OXI APO EDW --}}

{{--                        </td>--}}
{{--                    </tr>--}}
{{--                @endforeach--}}
{{--            @endif--}}

{{--        </table>--}}

{{--        <div class="pages-actions-div">--}}
{{--            <button wire:click.prevent="createRoom">--}}
{{--                Δημιουργία Δωματίου--}}
{{--            </button>--}}

{{--            <button name="--------">--}}
{{--                ------}}
{{--            </button>--}}

{{--        </div>--}}

{{--        <script>--}}

{{--        </script>--}}
{{--    </div>--}}

{{--</div>--}}
<div class="p-8 bg-gray-100 min-h-screen">
    <div class="max-w-5xl mx-auto bg-white p-6 rounded-lg shadow-lg">
        <!-- Table Header -->
        <h2 class="text-2xl font-semibold text-gray-800 mb-6">Λίστα Δωματίων</h2>

        <!-- Rooms Table -->
        <div class="overflow-x-auto">
            <table class="w-full border-collapse border border-gray-300 rounded-lg shadow">
                <thead>
                <tr class="bg-gray-200">
                    <th class="px-4 py-2 text-left text-gray-700 font-medium">Όνομα Δωματίου</th>
                    <th class="px-4 py-2 text-left text-gray-700 font-medium">Εμφάνιση</th>
                    <th class="px-4 py-2 text-left text-gray-700 font-medium">Άτομα</th>
                    <th class="px-4 py-2 text-left text-gray-700 font-medium">Αρ. Δωματίων</th>
                    <th class="px-4 py-2 text-left text-gray-700 font-medium">Ενέργειες</th>
                </tr>
                </thead>
                <tbody class="divide-y divide-gray-300">
                @if($rooms !== null)
                    @foreach($rooms as $room)
                        <tr class="hover:bg-gray-50">
                            <!-- Room Name -->
                            <td class="px-4 py-2 text-gray-700 flex items-center space-x-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 inline">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                                </svg>

                                <span>{{ $room->name }}</span>
                            </td>

                            <!-- Availability -->
                            <td class="px-4 py-2 text-gray-700 text-center">{!!  $room->is_available == 1 ? '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-green-500">
  <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
</svg>
' : '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-red-500 ">
  <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
</svg>
' !!}</td>

                            <!-- Max Occupants -->
                            <td class="px-4 py-2 text-gray-700">{{ $room->max_occupants }}</td>

                            <!-- Number of Rooms -->
                            <td class="px-4 py-2 text-gray-700">{{ $room->number }}</td>

                            <!-- Actions -->
                            <td class="px-4 py-2 flex items-center space-x-2 text-gray-700">
                                <a href="/admin/hotel/room/{{ $room->id }}" class="text-blue-500 hover:underline">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 inline">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                    </svg>

                                </a>
                                @if(Auth()->user()->type !== "beginner")
                                    <a href="/admin/hotel/room/options/{{ $room->id }}" class="text-gray-500 hover:text-gray-800">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-8 inline">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.343 3.94c.09-.542.56-.94 1.11-.94h1.093c.55 0 1.02.398 1.11.94l.149.894c.07.424.384.764.78.93.398.164.855.142 1.205-.108l.737-.527a1.125 1.125 0 0 1 1.45.12l.773.774c.39.389.44 1.002.12 1.45l-.527.737c-.25.35-.272.806-.107 1.204.165.397.505.71.93.78l.893.15c.543.09.94.559.94 1.109v1.094c0 .55-.397 1.02-.94 1.11l-.894.149c-.424.07-.764.383-.929.78-.165.398-.143.854.107 1.204l.527.738c.32.447.269 1.06-.12 1.45l-.774.773a1.125 1.125 0 0 1-1.449.12l-.738-.527c-.35-.25-.806-.272-1.203-.107-.398.165-.71.505-.781.929l-.149.894c-.09.542-.56.94-1.11.94h-1.094c-.55 0-1.019-.398-1.11-.94l-.148-.894c-.071-.424-.384-.764-.781-.93-.398-.164-.854-.142-1.204.108l-.738.527c-.447.32-1.06.269-1.45-.12l-.773-.774a1.125 1.125 0 0 1-.12-1.45l.527-.737c.25-.35.272-.806.108-1.204-.165-.397-.506-.71-.93-.78l-.894-.15c-.542-.09-.94-.56-.94-1.109v-1.094c0-.55.398-1.02.94-1.11l.894-.149c.424-.07.765-.383.93-.78.165-.398.143-.854-.108-1.204l-.526-.738a1.125 1.125 0 0 1 .12-1.45l.773-.773a1.125 1.125 0 0 1 1.45-.12l.737.527c.35.25.807.272 1.204.107.397-.165.71-.505.78-.929l.15-.894Z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                        </svg>

                                    </a>
                                @endif
                                <a href="/admin/rooms/translate/{{ $room->id }}" class="text-green-500 hover:underline">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 inline mx-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 0 1 .865-.501 48.172 48.172 0 0 0 3.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
                                    </svg>

                                </a>
                                <a href="/admin/hotel/room/delete/{{ $room->id }}" class="text-red-500 hover:underline">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 inline">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                    </svg>

                                </a>
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>

        <!-- Actions -->
        <div class="mt-6 flex space-x-4 justify-center">
            <button wire:click.prevent="createRoom"
                    class="px-6 py-2 bg-blue-600 text-white font-medium rounded-lg shadow hover:bg-blue-700 focus:ring focus:ring-blue-500">
                Δημιουργία Δωματίου
            </button>
            <button class="px-6 py-2 bg-gray-300 text-gray-700 font-medium rounded-lg shadow hover:bg-gray-400 focus:ring focus:ring-gray-300">
                ----
            </button>
        </div>
    </div>
</div>

