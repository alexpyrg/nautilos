@extends('layouts.app')
@section('content')

<div class="bg-white pb-8 rounded-lg rounded shadow-lg w-full mx-auto h-auto max-w-full min-w-0">
    <h1 class="text-2xl p-6 rounded-t-lg text-white font-bold bg-gray-800">Bookings</h1>
<div class="overflow-x-auto p-4">

    <table class="w-full overflow-x-auto border-collapse border border-gray-300" id="btb">
        <thead>
        <tr>
            <th class="p-3 border border-gray-400 bg-gray-300" >Α/Α</th>
            <th class="p-3 border border-gray-400 bg-gray-300">Αριθμός Κράτησης</th>
            <th class="p-3 border border-gray-400 bg-gray-300">Όνομα</th>
            <th class="p-3 border border-gray-400 bg-gray-300">Επώνυμο</th>
            <th class="p-3 border border-gray-400 bg-gray-300">Τύπος Δωμ.</th>
{{--            <th>E-mail</th>--}}
            <th class="p-3 border border-gray-400 bg-gray-300">Νύχτες</th>
            <th class="p-3 border border-gray-400 bg-gray-300">Check-in</th>
            <th class="p-3 border border-gray-400 bg-gray-300">Ώρα άφιξης</th>
            <th class="p-3 border border-gray-400 bg-gray-300">Check-out</th>
            <th class="p-3 border border-gray-400 bg-gray-300">Κόστος</th>
            <th class="p-3 border border-gray-400 bg-gray-300">Προκ.</th>
            <th class="p-3 border border-gray-400 bg-gray-300">Κατάσταση</th>
            <th class="p-3 border border-gray-400 bg-gray-300">Επιλογές</th>
            <!-- Add other columns as needed -->
        </tr>
        </thead>
    </table>
    <script>
        $(function() {
            $('#btb').DataTable({
                paging: true,
                searching: true,
                ordering: true,
                processing: true,
                pageLength: 25,
                order: [[0, 'desc']],
                // lengthChange: false,
                lengthMenu: [10, 25, 50, 75, 100],
                layout: {
                    topEnd: {
                        search: {
                            menu: [5, 10, 15, 20]
                        }
                    }
                },
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'csv',
                        text: 'Εξαγωγή σε CSV',
                        title: 'Booking_List',
                        // exportOptions: {
                        //     columns: ':visible:not(:last-child)' // Exclude the last Actions column
                        // }
                    },
                    {
                        extend: 'excel',
                        text: 'Εξαγωγή σε Excel',
                        title: 'Booking_List',
                        exportOptions: {
                            columns: ':visible:not(:last-child)'
                        }
                    },
                    {
                        extend: 'pdf',
                        text: 'Εξαγωγή σε PDF',
                        title: 'Booking List',
                        exportOptions: {
                            columns: ':visible:not(:last-child)'
                        }
                    },
                    {
                        extend: 'print',
                        text: 'Εκτύπωση Πίνακα',
                        exportOptions: {
                            columns: ':visible:not(:last-child)'
                        }
                    },
                ],

                ajax: '{{ route('bookings.getBookings') }}',
                columns: [
                    { data: 'number', name: 'number' },
                    { data: 'id', name: 'id' },
                    { data: 'name', name: 'name' },
                    { data: 'surname', name: 'surname' },
                    { data: 'room_type', name: 'room_type' },
                    // { data: 'email', name: 'email' },
                    { data: 'nights', name: 'nights' },
                    { data: 'check_in_date', name: 'check_in_date' },
                    { data: 'estimated_arrival_time', name: 'estimated_arrival_time' },
                    { data: 'check_out_date', name: 'check_out_date' },
                    { data: 'final_rate', name: 'final_rate' },
                    { data: 'prepayment', name: 'prepayment' },
                    { data: 'status', name: 'status' },
                    { data: 'actions', name: 'actions' },
                ],
                columnDefs: [
                    { orderable: false, targets: [11] } // Disable sorting on the Actions column
                ],
                language: {

                    copy: 'Copy',
                    csv: 'Export CSV',
                    excel: 'Export Excel',
                    pdf: 'Export PDF',
                    print: 'Print',
                    search: 'ευρετήριο'
                }
            });
        });
    </script>

</div>

@endsection
