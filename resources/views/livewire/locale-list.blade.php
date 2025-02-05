{{--<div>--}}
{{--    <table class="dashboard_table">--}}
{{--        <tr>--}}
{{--            --}}{{--            <th> </th>--}}
{{--            <th> Όνομα Γλώσσας </th>--}}
{{--            <th> Κωδικός Γλώσσας </th>--}}

{{--        </tr>--}}
{{--            @foreach($locales as $locale)--}}
{{--                <tr>--}}
{{--                    <td> {{$locale->name}} </td>--}}
{{--                    <td> {{$locale->code}} </td>--}}
{{--                </tr>--}}
{{--            @endforeach--}}
{{--    </table>--}}
{{--    <div class="pages-actions-div">--}}
{{--             <button wire:click.prevent="createLocale">--}}
{{--            Δημιουργία Γλώσσας--}}
{{--        </button>--}}

{{--    </div>--}}
{{--</div>--}}
<div class="p-8 bg-gray-100 min-h-screen">
    <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-lg">
        <!-- Table Header -->
        <h2 class="text-2xl font-semibold text-gray-800 mb-6">Διαχείριση Γλωσσών</h2>

        <!-- Language Table -->
        <div class="overflow-x-auto">
            <table class="w-full border-collapse border border-gray-300 rounded-lg shadow">
                <thead>
                <tr class="bg-gray-200">
                    <th class="px-4 py-2 text-left text-gray-700 font-medium">Όνομα Γλώσσας</th>
                    <th class="px-4 py-2 text-left text-gray-700 font-medium">Κωδικός Γλώσσας</th>
                </tr>
                </thead>
                <tbody class="divide-y divide-gray-300">
                @foreach($locales as $locale)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2 text-gray-700">{{ $locale->name }}</td>
                        <td class="px-4 py-2 text-gray-700">{{ $locale->code }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <!-- Actions -->
        <div class="mt-6 text-center">
            <button wire:click.prevent="createLocale"
                    class="px-6 py-2 bg-blue-600 text-white font-medium rounded-lg shadow hover:bg-blue-700 focus:ring focus:ring-blue-500">
                Δημιουργία Γλώσσας
            </button>
        </div>
    </div>
</div>
