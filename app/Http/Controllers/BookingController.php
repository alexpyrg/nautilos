<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Country;
use App\Models\Locale;
use App\Models\PaymentDetails;
use App\Models\roomType;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Yajra\DataTables\Facades\DataTables;

class BookingController extends Controller
{
//    public function loadFees(){
//
//        return
//    }

    public function cancelSuccess(Request $request){
//        $res = null;
        $bid = session('booking_id');
        $booking= Booking::find($bid) ?? null;
        $loc = null;
        if(!empty($booking) ){
        $loc = Locale::where('id', $booking->locale_id)->first();
        }else{
            $loc = app()->getLocale();
        }

        if(File::exists(resource_path('translations/reservation_'. strtolower($loc->code ?? 'en') .'.json'))){
            $res = File::get(resource_path('translations/reservation_'. strtolower($loc->code ?? 'en') .'.json'));
        }else{
            $res = File::get(resource_path('/translations/reservation_en.json'));
        }//if else

        return view('cancelSuccess');
    }//cancelSuccess

    public function downloadPDFVoucher(Request $request){
        $res = null;
        $booking= Booking::find($request->booking_id);
        $loc = Locale::where('id', $booking->locale_id)->first();
        if(File::exists(resource_path('translations/reservation_'. strtolower($loc->code) .'.json'))){
            $res = File::get(resource_path('translations/reservation_'. strtolower($loc->code) .'.json'));
        }else{
            $res = File::get(resource_path('/translations/reservation_en.json'));
        }//if else


        $data = [
            'booking' => $booking,
            'room_type' => roomType::find($booking->room_type_id),
            'res' => $res
        ];
        $pdf = Pdf::loadView('', $data);
        return $pdf->download('invoice.pdf');
    }
    public function printBooking(Request $request){

        $booking = Booking::find($request->booking_id);
        $nights = date_diff(Carbon::createFromFormat('Y-m-d', $booking->check_in_date), Carbon::createFromFormat('Y-m-d', $booking->check_out_date))->days;
//        $total_nights = date_diff()
        $check_in_date = Carbon::createFromFormat('Y-m-d', $booking->check_in_date)->format('d-m-Y');
            $check_out_date = Carbon::createFromFormat('Y-m-d', $booking->check_out_date)->format('d-m-Y');

        return view('printBookingPage')->with([
            'booking' => $booking,
            'country' => Country::where('id',$booking->country)->first(),
            'card' => PaymentDetails::where('booking_id', $booking->id)->first(),
            'room_type' => roomType::find($booking->room_type_id),
            'total_nights' => $nights,
            'check_in_date' => $check_in_date,
            'check_out_date' => $check_out_date,
        ]);
    }//printBooking
    public function loadBooking(Request $request){
        $booking = Booking::find($request->id);
        $booking= 1;
        if($booking === null){
            return redirect()->back()->withErrors('general_errors', 'Requested booking was not found! {{"Booking_not_found_error"}}');
        }

        return view('CMSBookingManagementForm')->with([
            'booking' => $booking,
            'id' => $request->id
        ]);
    }//loadBooking

    public function getAllBookings(Request $request)
    {
        $data = Booking::with('roomType')->get();

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('nights', function ($row) {
                $checkInDate = \Carbon\Carbon::parse($row->check_in_date);
                $checkOutDate = \Carbon\Carbon::parse($row->check_out_date);
                $nights = $checkInDate->diffInDays($checkOutDate);
                return $nights;
            })
            ->addColumn('room_type', function ($row) {
                return $row->roomType ? $row->roomType->name : 'N/A';
            })
            ->addColumn('actions', function ($row) {
                // Exclude actions for export
                return '';
            })
            ->rawColumns(['actions'])
            ->make(true);
    }
    public function loadAllBookings(){
        if(!Auth::check()){
            return redirect('/')->with('error', 'Could not find requested page!');
        }

        $bookings = Booking::orderBy('created_at', 'desc')->get();
//        dd($bookings);
        return view('bookingsDashboard')->with([
           'bookings' => $bookings,
        ]);
    }//end of loadAllBookings

    public function deleteBooking(Request $request){
        if(!Auth::check()){
            return redirect('/')->with('error', 'Could not find requested page!');
        }

        try{
            Booking::where('id', $request->id)->delete();
        }catch(\Exception $ex){
            return redirect()->back()->with('error', 'Δεν έγινε διαγραφή της κράτησης!');
        }

        return redirect()->back()->with('success','Η κράτηση διαγράφτηκε επιτυχώς!');
    }
    public function getBookings(Request $request)
    {
        if ($request->ajax()) {
            $data = Booking::select('*');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('nights', function ($row) {
                    $checkInDate = \Carbon\Carbon::parse($row->check_in_date);
                    $checkOutDate = \Carbon\Carbon::parse($row->check_out_date);
//                    $checkInDate = Carbon::createFromFormat('Y-m-d', $row->check_in_date)->format('d-m-Y');
//                    $checkOutDate = Carbon::createFromFormat('Y-m-d', $row->check_out_date)->format('d-m-Y');
                    $nights = $checkInDate->diffInDays($checkOutDate);
                    return $nights;
                })->editColumn('check_in_date', function ($row) {
                    return Carbon::parse($row->check_in_date)->format('d-m-Y');
                })->editColumn('check_out_date', function ($row) {
                    return Carbon::parse($row->check_out_date)->format('d-m-Y');
                })->editColumn('final_rate', function ($row) {
                    return '€ '. number_format($row->final_rate,2);
                })->editColumn('prepayment', function ($row) {
                    return '€ '. number_format($row->prepayment,2);
                })->editColumn('status', function ($row) {
                    if($row->status == 'pending'){
                        return "<span class='bg-red-500 text-white rounded p-2 w-full block text-center'>Νέα Κράτηση</span>";
                    }else if($row->status == 'prepayment'){
                        return '<span class="bg-orange-500 text-white rounded p-2 w-full block text-center">Εκκρεμεί Πληρωμή</span>';
                    }else if($row->status == 'completed'){
                        return "<span class='bg-green-500 text-white rounded p-2 w-full block text-center'>Ολοκληρώθηκε</span>";
                    }else{
                        return "<span class='bg-red-500 text-white rounded p-2 w-full block text-center'>Ακυρώθηκε</span>";
                    }
                })
                // Get 'room_type' name
                ->addColumn('room_type', function ($row) {
                    return $row->roomType ? $row->roomType->name : 'N/A';
                })
                // Add 'actions' column
                ->addColumn('actions', function ($row) {
                    $viewUrl = route('bookings.show', $row->id);
                    $deleteUrl = route('bookings.destroy', $row->id);

                    $btn = '<a href="'.$viewUrl.'" class="btn btn-info btn-sm">Προβολή</a>';
                    $btn .= '
                        <form action="'.$deleteUrl.'" method="POST" style="display:inline;">
                            '.csrf_field().'
                            '.method_field("DELETE").'
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Are you sure?\')">Διαγραφή</button>
                        </form>';
                    return $btn;
                })
                // Specify columns with raw HTML content
                ->rawColumns(['actions','status'])
                ->make(true);
        }
    }
    public function show($id)
    {
        $booking = Booking::findOrFail($id);
        return view('bookings.show', compact('booking'));
    }

    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();

        return redirect()->route('bookings.index')
            ->with('success', 'Booking deleted successfully.');
    }
    public function resendCardDetails(){
        //RESEND EMAIL HERE WITH FORM LINK TO INPUT THE CARD AGAIN
    }

}


