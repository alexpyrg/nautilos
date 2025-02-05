{{--@extends('layouts.cms')--}}
{{--@section('content')--}}
{{--<div>--}}
{{--    <table>--}}
{{--        <tr>--}}
{{--            <th> Σελίδα </th>--}}
{{--            <th> Ενεργό </th>--}}
{{--            <th> Αριθμός Εικόνων</th>--}}
{{--            <th> Ενέργειες</th>--}}
{{--        </tr>--}}
{{--    @foreach($carousels as $carousel)--}}
{{--        <tr>--}}
{{--            <td> {{ $carousel->page->name }} </td>--}}
{{--            <td> {{ $carousel->is_enabled }} </td>--}}
{{--            <td>--}}
{{--                    N--}}
{{--            </td>--}}
{{--            <td>--}}
{{--                <a href="/admin/carousel/view/{{ $carousel->id }}"> <span style="color: orange;" class="material-symbols-outlined">edit</span></a>--}}
{{--                <a href="/admin/carousel/delete/{{ $carousel->id }}"> <span style="color: red;" class="material-symbols-outlined">delete</span></a>--}}
{{--            </td>--}}
{{--        </tr>--}}
{{--    @endforeach--}}
{{--    </table>--}}

{{--</div>--}}
{{--@endsection--}}
@extends('layouts.app')
@section('content')
    <div class="p-8 bg-gray-100 min-h-screen">
        <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-lg">
            <h1 class="text-2xl font-semibold text-gray-800 mb-6">Διαχείριση Carousels</h1>
            <table class="w-full border-collapse border border-gray-300 rounded-lg">
                <thead>
                <tr class="bg-gray-200">
                    <th class="px-4 py-2 text-left text-gray-700 font-medium">Σελίδα</th>
                    <th class="px-4 py-2 text-left text-gray-700 font-medium">Ενεργό</th>
                    <th class="px-4 py-2 text-left text-gray-700 font-medium">Αριθμός Εικόνων</th>
                    <th class="px-4 py-2 text-left text-gray-700 font-medium">Ενέργειες</th>
                </tr>
                </thead>
                <tbody class="divide-y divide-gray-300">
                @foreach($carousels as $carousel)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2 text-gray-700">{{ $carousel->page->name }}</td>
                        <td class="px-4 py-2 text-gray-700">{{ $carousel->is_enabled }}</td>
                        <td class="px-4 py-2 text-gray-700">N</td>
                        <td class="px-4 py-2 text-gray-700 space-x-2">
                            <a href="/admin/carousel/view/{{ $carousel->id }}" class="text-orange-500 hover:underline">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 inline">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                                </svg>

                            </a>
                            <a href="/admin/carousel/delete/{{ $carousel->id }}" class="text-red-500 hover:underline">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 inline">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                </svg>

                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
