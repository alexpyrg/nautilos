<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\MailingController;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', [ClientController::class, 'loadHomePage']);

Route::get('/admin/pages', function (){
    return view('pages-dashboard');
})->middleware('auth');

Route::get('/admin/pages/create', function (){
    return view('page-creation-form');
})->middleware('auth')->name('create.page');

Route::get('/admin/pages/view/{id}', function (){
    return view('pages-management');
})->middleware('auth');

Route::get('/admin/pages/non-interactable/edit/{id}', function (){});
Route::get('/admin/taxes', [\App\Http\Controllers\BackendController::class, 'showTaxes'])->middleware('auth');
Route::post('/admin/taxes', [\App\Http\Controllers\BackendController::class, 'updateTaxes'])->name('update.taxes')->middleware('auth');

Route::get('/admin/pages/images/{page_id}', [\App\Http\Controllers\PageImagesController::class, 'loadImages']);
Route::post('/admin/pages/images/upload', [\App\Http\Controllers\PageImagesController::class, 'saveImage']);
//Carousel content start
Route::get('/admin/carousels', [\App\Http\Controllers\BackendController::class, 'CarouselListLoad'])->middleware('auth');
Route::Post('/admin/carousel/save', [\App\Http\Controllers\BackendController::class, 'CarouselStore'])->middleware('auth');
Route::get('/admin/carousel/create/{page_id}', [\App\Http\Controllers\BackendController::class, 'CarouselCreate'])->middleware('auth');
Route::get('/admin/carousel/view/{id}', [\App\Http\Controllers\BackendController::class, 'CarouselEditForm'])->middleware('auth');
Route::get('/admin/carousel/create/', [\App\Http\Controllers\BackendController::class, 'CarouselCreate'])->middleware('auth');
Route::post('/admin/carousel/store/', [\App\Http\Controllers\BackendController::class, 'CarouselStore'])->middleware('auth');
Route::post('/admin/carousel/edit/update', [\App\Http\Controllers\BackendController::class, 'CarouselUpdate'])->middleware('auth');
Route::get('/admin/carousel/edit/{id}', [\App\Http\Controllers\BackendController::class, 'CarouselEdit'])->middleware('auth');
Route::post('/admin/carousel/image/store/{id}', [\App\Http\Controllers\BackendController::class, 'CarouselImageStore'])->middleware('auth');
Route::post('/admin/carousel/image/updateinfo/{id}', [\App\Http\Controllers\BackendController::class, 'CarouselImageUpdateInfo'])->middleware('auth');
Route::get('/admin/carousel/images/{imageId}/manage-captions', [\App\Http\Controllers\CarouselImageCaptionsController::class, 'createOrEdit'])->name('carousel.images.manage-captions')->middleware('auth');
Route::post('/admin/carousel/images/{imageId}/manage-captions', [\App\Http\Controllers\CarouselImageCaptionsController::class, 'storeOrUpdate'])->name('carousel.images.store-or-update-caption')->middleware('auth');
Route::get('/admin/carousel/images/{imageId}', [\App\Http\Controllers\CarouselImageCaptionsController::class, 'show'])->name('carousel.images.show')->middleware('auth');
Route::get('/admin/carousel/images/delete/{imageId}', [\App\Http\Controllers\BackendController::class, 'deleteCarouselImage'])->name('carousel.images.delete')->middleware('auth');
Route::get('/admin/pages/images/delete/{imageId}', [\App\Http\Controllers\PageImagesController::class, 'deleteImage'])->name('carousel.images.delete-image')->middleware('auth');
Route::get('page_images/{pageId}/editAlts', [\App\Http\Controllers\BackendController::class, 'editImageAlts'])->middleware('auth');
Route::post('page_images/updateAlts', [\App\Http\Controllers\BackendController::class, 'updateImageAlts'])->name('page_images.updateAlts')->middleware('auth');

Route::get('/admin/carousel/images/view/{id}', [\App\Http\Controllers\BackendController::class, 'CarouselImageView'])->middleware('auth');

Route::get('/admin/cardWidgets', [\App\Http\Controllers\BackendController::class, 'CardWidgetsDashboard'])->middleware('auth');

Route::get('/admin/cardWidget/edit/{id}/{locale}', [\App\Http\Controllers\BackendController::class, 'CardWidgetEdit'])->middleware('auth');
Route::post('/admin/cardWidget/edit/{id}/{locale}', [\App\Http\Controllers\BackendController::class, 'CardWidgetUpdate'])->middleware('auth');
Route::post('/admin/cardWidgets/image/{id}', [\App\Http\Controllers\BackendController::class, 'updateCardImage'])->middleware('auth');

Route::post('/admin/carousel/content/delete/{id}', [\App\Http\Controllers\BackendController::class, 'CarouselContentDelete'])->middleware('auth'); //delete carousel content image
Route::post('/admin/carousel/delete/{id}', [\App\Http\Controllers\BackendController::class, 'CarouselDelete'])->middleware('auth');
//carousel content end


Route::get('/admin/pages/edit/{id}', [\App\Http\Controllers\PagesController::class, 'loadEditPage'])->middleware('auth');
Route::post('/admin/pages/edit/{id}/save',[\App\Http\Controllers\PagesController::class, 'save'])->middleware('auth');

Route::get('/admin/hcpages', [\App\Http\Controllers\PagesController::class, 'loadHCPages'])->middleware('auth');

Route::get('/admin/mails', [\App\Http\Controllers\MailingController::class, 'loadMail'])->middleware('auth');
Route::get('/admin/mails/edit/{id}/{locale}', [\App\Http\Controllers\MailingController::class, 'loadEditMail'])->middleware('auth');
Route::post('/admin/mail/edit/{id}/{locale}', [\App\Http\Controllers\MailingController::class, 'saveMail'])->middleware('auth');


Route::get('/admin/pages/content/{page_id}/{selected_locale}',  [\App\Http\Controllers\BackendController::class, 'loadPageContentForm'])->middleware('auth');
Route::post('/admin/pages/content/edit/save', [\App\Http\Controllers\PagesController::class,'savePageContent'])->middleware('auth');
Route::post('/admin/page/content/save/{page_id}/{selected_locale}', [\App\Http\Controllers\BackendController::class, 'savePageContent'] )->middleware('auth');
Route::get('/admin/pages/locales/create', function (){
    return view('localeCreationForm');
})->middleware('auth');

//Route::get('/pa')
Route::get('admin/hcpages/edit/{page_name}_{locale}.json', [\App\Http\Controllers\PagesController::class, 'editHCPages'])->middleware('auth');
Route::post('admin/save-translations/{page_name}_{locale}.json', [\App\Http\Controllers\PagesController::class, 'saveHCPages'])->middleware('auth');
Route::get('/admin/pages/edit/seo/{id}', function (){
    return view('pages-seo-management');
})->middleware('auth');

Route::get('/admin/pages/edit/content/{id}', [\App\Http\Controllers\PagesController::class,'loadPageContentForm'])->middleware('auth');
Route::get('/sitemap.xml', function (){
    return response(file_get_contents(public_path('sitemap.xml')), 200, [
        'Content-Type' => 'application/xml'
    ]);
});
Route::get('/admin/pages/sitemap', function (){
    return view('sitemap');
})->middleware('auth');

Route::get('/admin/', function (){
    return view('home-dashboard');
})->middleware('auth')->name('dashboard.load');

//Route::get('/flexibuild/pages/edit/localization/{locale}', function (){
//    return view('locales'); //CHANGE TO LOCALES ?DONE
//})->middleware('auth');

Route::get('/admin/mailing/template', function (){
    return view('mailing-template-editor');
})->middleware('auth');

Route::get('/admin/mailing/template/{id}', function (){
    return view('mailing-template-editor');
})->middleware('auth');

//DEBUG-ROUTE
//Route::get('/reservation/new', \App\Livewire\ReservationFormNew::class)->name('reservation.new');
Route::get('/reservation', \App\Livewire\TripReservationForm::class )->name('reservation.new');
Route::get('/admin/clear-and-recache', function(){
    $clearcache = \Illuminate\Support\Facades\Artisan::call('cache:clear');
    echo("Cache cleared<br>");
    $clearview = \Illuminate\Support\Facades\Artisan::call('view:clear');
    echo("View Cleared <br> ");

    $clearconfig = \Illuminate\Support\Facades\Artisan::call('config:cache');
    echo("Config cleared!");
    $optimize = \Illuminate\Support\Facades\Artisan::call('optimize');
    echo('Optimized routes!');
//    $cleardebugbar = Artisan::call('debugbar::clear');
//    echo "Debug Bar cleared <br>";

    return redirect()->back()->with('success', 'Cleared cache, config, views and optimized routes!');
})->middleware('auth');
Route::get('/admin/hotel/rooms', function (){
    return view('RoomsDashboard');
})->middleware('auth');

Route::get('/test/route/remove/later',function(){
    return view('NewPageContentManagement');
});

Route::post('/admin/pages/image/updateinfo/{image_id}', [\App\Http\Controllers\PagesController::class, 'updateImage'])->middleware('auth');
//Booking management links
Route::post('/authenticate-booking/', [ClientController::class, 'fetchPaymentDetails']);
Route::get('/booking/pre-payment/{token}', [ClientController::class, 'loadPaymentForm']);
Route::post('/prepayment-details/submit', [ClientController::class,'savePrepaymentDetails']);
Route::get('/booking/prepayment-details-form', [ClientController::class, 'loadPrepaymentDetailsForm']); //pre
Route::get('/booking/auth-check',  [ClientController::class, 'fetchPaymentDetails']);

Route::get('/admin/rooms/translations', [ClientController::class, 'loadRoomTranslationsList'])->middleware('auth');
Route::get('/admin/rooms/translate/{id}', [ClientController::class, 'loadRoomTranslationsEdit'])->name('rooms.translations.get')->middleware('auth');
Route::post('/admin/rooms/translate/{id}', [ClientController::class, 'storeRoomTranslations'])->name('rooms.translations.store')->middleware('auth');

Route::get('/admin/hotel/room/delete/{id}', [\App\Http\Controllers\RoomsRates::class, 'deleteRoom'])->middleware('auth');
Route::get('/admin/hotel/room/new', function(){
    return view('RoomCreationForm');
})->middleware('auth');
Route::get('/easyupdate/bookings', [\App\Http\Controllers\BookingController::class, 'loadAllBookings'])->name('bookings.index')->middleware('auth');
//Route::get('/easyupdate/business-info', function(){
Route::get('/admin/bookings', [\App\Http\Controllers\BookingController::class, 'loadAllBookings'])->middleware('auth');
Route::get('/admin/business-info', function(){
    return view('businessInfo');
})->middleware('auth');
Route::get('/admin/hotel/room/{id}', function(Request $request){
    return view('RoomEditForm')->with([
        'id'=> $request->id,
    ]);

})->middleware('auth');

Route::get('/admin/locales', function (){
    return view('LocaleListView');
})->middleware('auth');

Route::get('/admin/images', [\App\Http\Controllers\ImageSearchAndDisplayController::class, 'loadImagesView'])->middleware('auth');
Route::get('/admin/image/delete/{relativePath?}/{filename}', [\App\Http\Controllers\ImageSearchAndDisplayController::class, 'deleteImage'])
    ->middleware('auth')->name('delete-image');

Route::get('/admin/image/delete/{filename}', [\App\Http\Controllers\ImageSearchAndDisplayController::class, 'deleteImage'])
    ->middleware('auth');
Route::get('/booking-prepayment-sent', function(Request $request){

    $booking = session('booking');
    $loc = \App\Models\Locale::where('id', $booking->locale_id)->first();
        \Illuminate\Support\Facades\App::setLocale(strtolower($loc->code));
        $res = null;
        if(\Illuminate\Support\Facades\File::exists(resource_path('translations/reservation_'. strtolower($loc->code) .'.json')))
        {
            $res = \Illuminate\Support\Facades\File::get(resource_path('translations/reservation_'. strtolower($loc->code) . '.json'));
        }else{
            $res = File::get(resource_path('translations/reservation_en.json'));
        }
            $res = json_decode($res,true);


        if(!$booking){
           return redirect('/');
        }

    return view('paymets_details_received')->with([
        'booking' => $booking,
        'res' => $res,
    ]);

});

//Admin - Seasons Managements

Route::get('/admin/seasons', [\App\Http\Controllers\SeasonsController::class, 'Index'])->middleware('auth')->name('seasons.index');
Route::post('/admin/seasons', [\App\Http\Controllers\SeasonsController::class, 'store'])->middleware('auth')->name('seasons.store');

//Admin - Trips
Route::get('/admin/trip-prices/create', [\App\Http\Controllers\TripPriceController::class, 'create'])->middleware('auth')->name('trip-prices.create');
Route::resource('trip-prices', TripPriceController::class);
// Store a new trip price
Route::post('/admin/trip-prices', [\App\Http\Controllers\TripPriceController::class, 'store'])->middleware('auth')->name('trip-prices.store');

// Display all trip prices
Route::get('/admin/trip-prices', [\App\Http\Controllers\TripPriceController::class, 'index'])->middleware('auth')->name('trip-prices.index');

Route::prefix('admin')->group(function () {
    Route::resource('trips', \App\Http\Controllers\TripTypeController::class)->except('show');
    Route::post('/trips', [\App\Http\Controllers\TripTypeController::class, 'store'])->name('admin.trips.store');
    Route::get('/trips/create', [\App\Http\Controllers\TripTypeController::class, 'create'])->name('admin.trips.create');
    Route::get('/trips/edit/{id}', [\App\Http\Controllers\TripTypeController::class, 'edit']);
    Route::get('/trips/destroy', [\App\Http\Controllers\TripTypeController::class, 'destroy'])->name('admin.trips.destroy');
    Route::put('/trips/update/{id}', [\App\Http\Controllers\TripTypeController::class, 'update'])->name('admin.trips.update');

    Route::resource('albums', \App\Http\Controllers\AlbumController::class);
    Route::resource('photos', \App\Http\Controllers\PhotoController::class);

})->middleware('auth');



Route::get('/admin/fees-taxes',[\App\Http\Controllers\BackendController::class, 'loadFeesTaxesForm'])->middleware('auth');
Route::get('/admin/sitemap/generate', [\App\Http\Controllers\SitemapController::class, 'generate'])->middleware('auth');
Route::post('/admin/editor/upload/', [\App\Http\Controllers\CKEditorController::class, 'upload'])->middleware('auth')->name('ckeditor.upload');
//REMOVE AUTH MIDDLEWARE IF CKEDITOR STOPS UPLOADING IMAGES


//Route::get('/home', [ClientController::class,'loadHomePage']);
Route::get('/admin/user-settings', [\App\Http\Controllers\BackendController::class, 'loadUserSettings'])->middleware('auth');
Route::post('/admin/settings/change-password', [\App\Http\Controllers\BackendController::class, 'changePassword'])->middleware('auth');
Route::get('/admin/booking/{id}', [\App\Http\Controllers\BookingController::class, 'loadBooking'])->middleware('auth')->name('bookings.show');
Route::get('/admin/bookings/getAllBookings', [\App\Http\Controllers\BookingController::class, 'getAllBookings'])->name('bookings.getAllBookings')->middleware('auth');
Route::get('/admin/logout', [AuthController::class ,'logout'])->name('logout');
//log user out
Route::get('/admin/hotel/rates', [\App\Http\Controllers\RoomsRates::class, 'loadRoomsRatesForm'])->middleware('auth');
Route::get('/admin/booking/print/{booking_id}', [\App\Http\Controllers\BookingController::class, 'printBooking'])->middleware('auth');
Route::get('/admin/authenticate', function (){
    return view('cms-login');
})->name('login');
Route::post('/admin/authenticate', [\App\Http\Controllers\AuthController::class,'authenticate']);
Route::post('/reservation/create-form', function (Request $request){
    $validated = $request->validate([
        'check_in_date' => 'required',
        'check_out_date' => 'required',
        'room_type' => 'required',
        'nr_rooms' => 'required',
        'loc' => 'nullable'
    ]);
    if($validated){
        session()->put('reservationData', [
            'check_in_date' => $request->check_in_date,
            'check_out_date' => $request->check_out_date,
            'nr_rooms' => $request->nr_rooms,
            'room_type' => $request->room_type,
            'locale' => $request->loc ?? 'en',
        ]);
        return redirect()->route('reservation.new');
    }else{
        dd('error');
        return redirect()->back()->with('general_errors', 'Could not validate form!');
    }
});

Route::get('/send-test-email', [ClientController::class, 'sendTestEmail']);
//Route::get('test/single-room', [ClientController::class,'loadSingleRoom']);
//Route::get('/en/crete-akrolithos-apartments', [ClientController::class,'loadApartment']);
//Route::get('/en/ierapetra-town-crete-holidays-guide', \App\Livewire\IerapetraPage::class);
//Route::get('/en/double-room-accommodation-greece-crete-lassithi-ierapetra-hotels', [ClientController::class,'loadRoomPage']);
//Route::get('/en/triple-room-accommodation-greece-crete-lassithi-ierapetra-hotels', [ClientController::class,'loadTripleRoom']);
//Route::get('/en/contact-us', \App\Livewire\ContactUsForm::class);

//
//Route::get('/en/ierapetra-map-directions-to-cretan-villa', [ClientController::class,'loadIerapetraMapDirections']);
//Route::get('/en/crete-map-directions-to-cretan-villa', [ClientController::class,'loadMapDirections']);
//Route::get('/en/taxi-transfer-from-heraklion-to-ierapetra', [ClientController::class,'loadTaxiTransfer']);
//Route::get('/test/hiking', [ClientController::class,'loadHikingSoutheastCrete']);
//Route::Get('/en/cycling-southeast-crete', [ClientController::class,'loadCyclingSoutheastCrete']);
//
//Route::get('/test/places-to-see', [ClientController::class, 'loadPlacesToSee']);
//Route::get('/test/things-to-do', [ClientController::class, 'loadThingsToDo']);
//Route::get('/test/beaches', [ClientController::class, 'loadBeaches']);
//Route::get('/test/chrisi', [ClientController::class, 'loadChrissi']);
//Route::get('/test/rates', [ClientController::class,'loadRates']);
//Route::get('/en/best-price-guarantee', [ClientController::class,'loadBestPriceGuarantee']);
//Route::get('')
//Route::get('/check-reservation', function(){
//    return view('check-reservation');
//});
Route::get('/{locale}/modify-cancel-reservation/booking/cancel', [\App\Http\Controllers\ClientController::class, 'cancelBooking']);
Route::post('/{locale}/modify-cancel-reservation/booking/cancel', [\App\Http\Controllers\ClientController::class, 'cancelBooking']);
Route::get('/booking/cancelled/success', [\App\Http\Controllers\BookingController::class, 'cancelSuccess']);
Route::get('/{locale}/modify-cancel-reservation', [ClientController::class, 'loadModifyCancelReservationAuth']);
Route::get('/{locale}/modify-cancel-reservation/submit', function (Request $request){
//    dd($request);
//    dd($request);
    $message = null;

    if(session('message'))
    {
        return redirect('/' . $request->locale . '/modify-cancel-reservation/')->with('message', session('message'));
    }
    return redirect('/' . $request->locale . '/modify-cancel-reservation/');
});
Route::post('/{locale}/modify-cancel-reservation/submit', [ClientController::class, 'checkModifyCancelSubmit']);
Route::get('/{locale}/booking/cancel/{booking_id}', [ClientController::class, 'cancelBooking']);
Route::get('/{locale}/check-reservation', [ClientController::class, 'checkReservation']);
Route::post('/{locale}/check-reservation', [ClientController::class, 'checkReservationAuthenticated']);
Route::get('/{locale}/cancellation-policy', [ClientController::class, 'cancellationPolicy']);
//REMOVE IN PRODUCTION
//Route::get('/email-view-template-do-not-cache', function(){
////    dd(\App\Models\Booking::where('status', 'pending')->first());
//    return view('mail.BookingAccepted')->with([
//        'title' => 'Mr.',
//        'booking' => \App\Models\Booking::where('status', 'pending')->first(),
//        'check_in_date' => '22/07/2024',
//        'check_out_date' => '23/07/2024',
//        'environment_fee' => '0.50',
//        'prepayment' => '17.50',
//        'booking_link' => 'https://cretan-villa-ierapetra.com/test-link',
//        'booking_accept_date' => '21/07/2024',
//        'price' => '58'
//    ]);
//});
//Route::get('/email-view-template-do-not-cache-2', function(){
////    dd(\App\Models\Booking::where('status', 'pending')->first());
//    $ccp = \App\Models\Booking::where('status', 'pending')->first();
//    return view('mail.NewBookingMail')->with([
//        'title' => 'Mr.',
//        'booking' => $ccp,
//        'nights' => date_diff( \Carbon\Carbon::createFromFormat('Y-m-d',$ccp->check_in_date),\Carbon\Carbon::createFromFormat('Y-m-d', $ccp->check_out_date))->format('%a'),
//    ]);
//});

//Route::get('/show-voucher', function(){
//    $booking = Booking::where('status', 'pending')->first();
//    $room_type = \App\Models\roomType::find($booking->room_type_id);
//    $check_in_date = \Carbon\Carbon::createFromFormat('Y-m-d',$booking->check_in_date);
//    $check_out_date = \Carbon\Carbon::createFromFormat('Y-m-d',$booking->check_out_date);
//    $reservation_date = \Nette\Utils\DateTime::createFromFormat('Y-m-d H:i:s', $booking->reservation_date)->format('d-m-Y');
//
//    return view('pdf.Voucher')->with([
//        'booking' => $booking,
//        'receipt_number' => 'RN-9023482310948',
//        'title' => 'test',
//        'room_type' => $room_type->name,
//        'totalGovTax' => intval(date_diff($check_in_date, $check_out_date)->days) * 1.5,
//        'check_in_date' => $check_in_date->format('d-m-Y'),
//        'check_out_date' => $check_out_date->format('d-m-Y'),
//        'reservation_date' => $reservation_date,
//    ]);
//});

Route::get('/ierapetra-map.pdf', [ClientController::class, 'IerapetraMap']);

Route::get('/test/cars', function (){
    return view('layouts.new_view');
})->middleware('auth');
Route::get('bookings/getBookings', [\App\Http\Controllers\BookingController::class, 'getBookings'])->middleware('auth')->name('bookings.getBookings');
//Route::get('bookings/{booking}', [\App\Http\Controllers\BookingController::class, 'show'])->name('bookings.show');
Route::delete('bookings/{booking}', [\App\Http\Controllers\BookingController::class, 'destroy'])->middleware('auth')->name('bookings.destroy');

Route::get('/{locale_id}/', [\App\Http\Controllers\ClientController::class, 'locateAndLoadHomePage']);
Route::get('/{locale}/{slug}', [\App\Http\Controllers\ClientController::class, 'locateAndLoadPage']);

