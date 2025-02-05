<?php

namespace App\Http\Controllers;

use App\Models\CardWidget;
use App\Models\CardWidgetsContent;
use App\Models\Carousel;
use App\Models\CarouselContent;
use App\Models\CarouselImage;
use App\Models\GreenTax;
use App\Models\Locale;
use App\Models\Page;
use App\Models\PageContent;
use App\Models\PageImage;
use App\Models\PageImageAlt;
use App\Models\roomType;
use App\Models\User;
use App\Models\VAT;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Mockery\Exception;

class BackendController extends Controller
{

    public function __construct(){

    }


    public function index(){

    }

//    public function changePassword(request $request){
//        if(!Auth::check()){
//            return redirect('/');
//        }
//        $rules = [
//          'old_password' => 'required',
//          'new_password' => 'required|confirmed:confirm_password|min:6',
//        ];
//        $user = null;
//        $validatedData = $request->validate($rules);
//        $user = User::find(Auth::user()->id);
//
//        if(!$validatedData){
//            return redirect()->back()->with('error', 'Τα δεδομένα δεν επαληθεύτηκαν!');
//        }
//            try{
////                $user->password = bcrypt($request->new_password);
//                if( bcrypt($validatedData->old_password) == $user->password){
//                    $user->password = bcrypt($request->new_password);
//                }//if
//                return redirect()->back()->with('success', 'Ο κωδικός άλλαξε με επιτυχία!');
//            }catch (\Exception $ex){
//                return redirect()->back()->with('error', $ex);
//            }
//
//
//    }//changePassword
    public function changePassword(Request $request)
    {
        if (!Auth::check()) {
            return redirect('/');
        }

        $rules = [
            'old_password' => 'required',
            'new_password' => 'required|confirmed:confirm_password|min:6',
        ];

        $validatedData = $request->validate($rules);

        $user = User::find(Auth::user()->id);

        if (!$user) {
            return redirect()->back()->with('error', 'User not found.');
        }

        if (!Hash::check($request->old_password, $user->password)) {
            return redirect()->back()->with('error', 'Incorrect old password.');
        }

        try {
            $user->password = Hash::make($request->new_password);
            $user->save();

            return redirect()->back()->with('success', 'Password changed successfully!');
        } catch (\Exception $ex) {
            return redirect()->back()->with('error', 'An error occurred while changing the password.');
        }
    }

    public function loadUserSettings(){
        if(!Auth::check()){
            dd(Auth::check());

        }
        return view('backend.components.userSettings');
    }
    public function updateImageAlts(Request $request)
    {
        foreach ($request->input('alts') as $imageId => $locales) {
            foreach ($locales as $localeId => $altText) {
                PageImageAlt::updateOrCreate(
                    [
                        'image_id' => $imageId,
                        'locale_id' => $localeId
                    ],
                    [
                        'alt' => $altText
                    ]
                );
            }
        }

        return redirect()->back()->with('success', 'Image alts updated successfully!');
    }
    public function editImageAlts($pageId)
    {
        // Get all images for the page
        $pageImages = PageImage::where('id', $pageId)
            ->with('imageAlt') // Load existing alt texts
            ->get();

        // Retrieve all available locales
        $locales = Locale::all(); // Assuming a `Locale` model exists

        // Prepare each image to have an entry for each locale
        foreach ($pageImages as $pageImage) {
            foreach ($locales as $locale) {
                // If the alt for this locale doesn't exist, create a new placeholder
                if (!$pageImage->imageAlt->firstWhere('locale_id', $locale->id)) {
                    $pageImage->imageAlt->push(new PageImageAlt([
                        'image_id' => $pageImage->id,
                        'locale_id' => $locale->id,
                        'alt' => '', // Default empty alt text
                    ]));
                }
            }
        }
//        dd($pageImages, $locales);
        return view('backend.components.edit_image_alts', compact('pageImages', 'locales'));
    }

    public function deleteCarouselImage(Request $request){
        $id = $request->imageId;
        if(CarouselImage::where('id', $id)->delete()) {
            return redirect()->back()->with('success', 'Η εικόνα δραγράφτηκε επιτυχώς!');
        }else{
            return redirect()->back()->with('general_errors','Η εικόνα δεν διαγράφτηκε!');
        }//if

   }//deleteCarouselImage
    public function showTaxes()
    {
        // Fetch all GreenTax records (1-12 months)
        $greenTaxes = GreenTax::orderBy('month', 'asc')->get();

        // Fetch the single VAT record
        $vat = VAT::where('id', '1')->first();
        if(!$vat){
            VAT::create([
                'id' => 1,
                'rate' => 13
            ]);
        }
        $vat = VAT::where('id', '1')->first();

        return view('backend.components.taxes', compact('greenTaxes', 'vat'));
    }

    public function updateTaxes(Request $request)
    {
        // Update GreenTax records
        foreach ($request->green_taxes as $id => $cost) {
            $greenTax = GreenTax::find($id);
            $greenTax->cost = $cost;
            $greenTax->save();
        }

        try{
            VAT::updateOrCreate([
                'id' => 1,
            ],[
                'rate' => $request->vat_value
            ]);
        }catch(Exception $ex){
            return redirect()->back()->with('general_errors', 'Ο Φ.Π.Α. Δεν αποθηκεύτηκε.');
        }
        // Update VAT record
//        $vat = Vat::find($request->vat_id);
//        $vat->value = $request->vat_value;
//        $vat->save();

        return redirect()->back()->with('success', 'Οι αλλαγές αποθηκεύτηκαν επιτυχώς!');
    }


    public function CardWidgetsDashboard()
    {
        $cardWidgets = CardWidget::all();
        $locales = Locale::all();
        return view('backend.pages.card_widget_list')->with([
            'cards' => $cardWidgets,
            'locales' => $locales
        ]);
    }//cardWidgetsdashboard
    public function CardWidgetEdit(Request $request)
    {
        $selectedLocale = $request->locale;
        $rooms = roomType::all();
        $selectedLocale = Locale::where('code', $request->locale)->first();
        $card = CardWidget::where('id', $request->id)->first();
        $cardContent = null;
//        dd($selectedLocale->id);
        if(CardWidgetsContent::where('card_widget_id', $request->id)->where('locale_id', $selectedLocale->id)->first()){
            $cardContent = CardWidgetsContent::where('card_widget_id', $request->id)->where('locale_id', $selectedLocale->id)->first();

        }
//        dd($cardContent);
        $locales = Locale::all();
        return view('backend.pages.card_widget_edit')->with([
            'card' => $card,
            'locales' => $locales,
            'selected_locale' => $selectedLocale,
            'cardContent' => $cardContent,
            'rooms' => $rooms,
            'locale_code' => $selectedLocale->code
        ]);
    }//cardWidgetsdashboard

    public function CardWidgetUpdate(Request $request)
    {
//        dd('asdasdsad');
//        dd($request->all());
     $validated = $request->validate([
            'locale' => 'required',
            'card_id' => 'required',
            'title' => 'nullable',
            'description' => 'nullable',
            'feature_1' =>'nullable',
            'feature_2' =>'nullable',
            'feature_3' =>'nullable',
            'book_now' => 'nullable',
            'view_more' => 'nullable',
            'view_more_link' => 'nullable'

        ]);

        if($validated){
            try{
                CardWidgetsContent::updateOrCreate(
                    ['card_widget_id' => $validated['card_id'],  'locale_id' => Locale::where('code', $validated['locale'])->first()->id],
                    [
                        'title' => $validated['title'],
                        'description' => $validated['description'],
                        'feature_1' => $validated['feature_1'],
                        'feature_2'  => $validated['feature_2'],
                        'feature_3'  => $validated['feature_3'],
                        'book_now' => $validated['book_now'],
                         'view_more'=> $validated['view_more'],
                        'view_more_link' => $validated['view_more_link']
//                        'locale_id' => ,
                    ]
                );
                if(intval($request->order) && intval($request->room_type)){
                CardWidget::where('id', $request->id)->first()->update([
                    'roomType_id' => $request->room_type,
                    'order' => $request->order,
                ]);

                }


            }catch(\Exception $ex){
                return redirect()->back()->with('error', $ex->getMessage());
            }
        }
        return redirect()->back()->with('success', 'Οι αλλαγές αποθηκεύτηκαν επιτυχώς!');
    }//cardWidget
    public function updateCardImage(Request $request){


        if($request->hasFile('image')){
          $validated= $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:8192',
            ]);

            $imgname = time().'.'.$request->image->extension();

            try{
//                dd('hereeee');
                CardWidget::where('id', $request->id)->first()->update([
                    'image_path' => $imgname,
                ]);

                $request->image->move('images/cardImages/', $imgname);

            }catch(\Exception $ex){
                dd($ex->getMessage());
                return redirect()->back()->withErrors( $ex->getMessage());
            }

            return redirect()->back()->with(['success', 'Η εικόνα αποθηκεύτικε επιτυχώς!']);
        }
        return redirect()->back()->with('error', 'Η εικόνα δεν αποθηκεύτηκε!');
    }//updateCardImage
    public function CarouselStore(Request $request){

        $rules = [
            'page_id' => 'required',
            'type' => 'required',
            'is_enabled' => 'nullable',
        ];
        $carousels = Carousel::all();
        if($carousels->where('page_id', $request->page_id)->first()){
            return redirect()->back()->withErrors('general_error', 'Υπάρχει ήδη Carousel για τη σελίδα που επιλέξατε!');
        }
//        dd($request);
        $validated = $request->validate($rules);
//        dd('va');

        if($validated){
            $val = 0;
            $request->is_enabled == 'on' ? $val = 1 : $val = 0;
            try{
                Carousel::create([
                    'page_id' => $request->page_id,
                    'type' => $request->type,
                    'is_enabled' => $val,
                ]);
            }catch(\Exception $ex){
                // EVENTUALLY SAVE TO THE DATABASE!
                dd($ex->getMessage());
                return redirect()->back()->with('error', $ex->getMessage());
            }
        }
//            dd('succ');
        return redirect('/easyupdate/carousels/')->with(['success', 'Το Carousel αποθηκεύτηκε επιτυχώς!']);
    }
    public function CarouselImageUpdateInfo(Request $request){
            $validated = $request->validate([
                'order' => 'required|numeric',
                'is_enabled' => 'nullable'
            ]);
            if($request->hasFile('image')){

                try {
                    // Find the existing image by carousel ID
                    $carouselImage = CarouselImage::where('id', $request->id)->first();

                    if ($request->hasFile('image')) {
                        // Move the new image to the desired directory
                        $newImageName = $request->image->getClientOriginalName();
                        $request->image->move('images/carouselImages/', $newImageName);

                        // Remove the old image file if it exists
                        if ($carouselImage && file_exists(public_path('images/carouselImages/' . $carouselImage->image_path))) {
                            unlink(public_path('images/carouselImages/' . $carouselImage->image_path));
                        }
                    }

                    // Update or Create the carousel image record

                    if ($carouselImage) {

                        // Update the existing record
                        $carouselImage->update([
                            'image_path' => $newImageName ?? $carouselImage->image_path,
                            'is_enabled' => $request->is_enabled,
                            'order' => $request->order,
                        ]);
                        $carouselImage->save();
                    }


                } catch (\Exception $ex) {
                    dd($ex->getMessage());
                    return redirect()->back()->with('error', $ex->getMessage());
                }
            }//if
            $is_enabled = $request->is_enabled == 'on' ? 1 : 0;
//            dd($request);
            if($validated){
                try {
                    CarouselImage::where('id', $request->id)->update([
                        'order' => $request->order,
                        'is_enabled' => $is_enabled,
                    ]);

                    return redirect()->back()->with('success', 'Αποθηκεύτηκε επιτυχώς!');
                }catch(\Exception $ex){
                    dd($ex->getMessage());
                    return redirect()->back()->with('error', 'Αποθηκεύτηκε επιτυχώς!');

                }
            }else{
                return redirect()->back()->with('error', 'Δεν αποθηκεύτικαν οι αλλαγές!');

            }

    }//CarouselImageUpdateInfo
    public function CarouselUpdate(Request $request){


        $rules = [
            'page_id' => 'required',
            'type' => 'required',
            'is_enabled' => 'nullable',
        ];
        $carousels = Carousel::all();
        $validated = $request->validate($rules);
        if($validated){
            try{
                $is_enabled = $request->is_enabled == 'on' ? 1 : 0;
                Carousel::where('page_id', $request->page_id)->update(
                    [
                        'type' => $request->type,
                        'is_enabled' => $is_enabled,
//                        'order' => $request->order,
                    ]
                );
            }catch(\Exception $ex){
                // EVENTUALLY SAVE TO THE DATABASE!
                return redirect()->back()->with('general_error', $ex->getMessage());
            }
        }

        return redirect('/easyupdate/carousels/')->with(['success', 'Το Carousel αποθηκεύτηκε επιτυχώς!']);
    }//
    public function CarouselImageView(Request $request){
        //find carousel
        //find images
        //return them all together

        $carousel = Carousel::where('id', $request->id)->first();
        $carouselImages = CarouselImage::where('carousel_id', $request->id)->get()->sortBy('order');

        return view('backend.components.carousel_images_list')->with(
            [
                'carousel' => $carousel,
                'carouselImages' => $carouselImages
        ]);
    }//CarouselImagesView

    public function CarouselImageStore(Request $request){
        $validated = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp,svg|max:16192',
            'order' => 'required|numeric',
            'is_enabled' => 'nullable',
//            'carousel_id' => 'required',
        ]);
            if($validated){

                try{

                    if($request->hasFile('image')){
                        $is_enabled = $request->is_enabled == 'on' ? 1 : 0;
                        $request->image->move('images/carouselImages/', $request->image->getClientOriginalName());
                      CarouselImage::create([
                            'carousel_id' => $request->id,
                            'image_path' => $request->image->getClientOriginalName(),
                            'is_enabled' => $request->is_enabled,
                            'order' => $request->order,
                        ]);
                    }


                }catch(\Exception $ex){
                    dd($ex->getMessage());
                    return redirect()->back()->with(['error', 'Δεν αποθηκεύτηκε! ' . $ex->getMessage()]);
                }//try catch
            }//if
        $carousel = Carousel::where('id', $request->id)->first();
        $carouselImages = CarouselImage::where('carousel_id', $request->id)->get();
       return redirect()->back()->with(['success', 'Αποθηκεύτηκε με επιτυχία!']);
    }//CarouselImagesStore

    public function CarouselEditForm(Request $request){
        $carousel = Carousel::where('id', $request->id)->with('page')->first();
        $page = Page::where('id', $carousel->page_id)->first();

        return view('backend.components.carousel-edit')->with(['carousel' => $carousel]);
    }
    public function CarouselDelete(Request $request){
        if( auth()->check() ){
            try{
                Carousel::destroy($request->id);
            }catch(\Exception $ex){
                return redirect()->back()->withErrors('general_error', $ex->getMessage());
            }
        }//if
        return redirect()->back()->with(['success', 'Το Carousel διαγράφηκε επιτυχώς!']);
    }//Carousel Delete

    public function loadCreateCIForm(){
        return view('backend.pages.create-carousel-image')->layout('layouts.cms');
    }//loadCreateCIForm
    public function loadUpdateCIForm(){
        return view('backend.pages.update-carousel-image')->layout('layouts.cms');
    }//loadUpdateCIForm
    public function CreateCarouselImage(Request $request)
    {
        $rules = [
            'carousel_id' => 'required',
            'image_path' => 'nullable',
            'existing_image' => 'nullable|string', // Add validation for existing image
        ];

        $validated = $request->validate($rules);

        if ($request->has('existing_image') && !empty($request->existing_image)) {
            // User chose an existing image
            $imagePath = $request->existing_image;  // Use the existing image path
        } else if ($request->hasFile('image')) {
            // User uploaded a new image, so upload it to the server
            $image = $request->file('image');
            $imagePath = $image->store('images/carouselImages/', 'public'); // Store image in public disk
        } else {
            // No image uploaded or selected
            return back()->with('error', 'No image provided');
        }

        // Now proceed with saving the image path to the database or further processing
        // e.g., saving it to a CarouselImage model

        CarouselImage::create([
            'carousel_id' => $request->carousel_id,
            'image_path' => $imagePath,
        ]);

        return back()->with('success', 'Carousel image saved successfully');
    }
    public function UpdateCarouselImage(Request $request){

    }//UpdateCarouselImage

//    public function DeleteCarouselImage(Request $request){
//        if(\auth()->check()){
//            try{
//                CarouselImage::destroy($request->id);
//            }catch(\Exception $ex){
//                return redirect()->back()->withErrors('general_error', $ex->getMessage());
//            }
//        }
//    }//DeleteCarouselImage


    public function loadFeesTaxesForm(){
        $feesTaxes = Fee::where('id', 1)->first();
        $vat = '24';
        return view('feestaxes')->with('feesTaxes',$feesTaxes);
    }

    public function CarouselListLoad(){
        $carousel = Carousel::with('page')->get();

        return view('backend.components.carousel-list')->with(['carousels' => $carousel]);
    }//carouselListLoad

    public function CarouselCreate(Request $request){
        // Get all page IDs that already have a carousel


        // Get all pages that do not have a carousel


        // Return view with filteredPages variable
//        return view('createCarousel', compact('filteredPages'));
        $pages = Page::all();
        $carousel = null;
        $filteredPages = null;
        if(Carousel::all()->count() > 0){
            $carousel = Carousel::all();
        }//if

        if($carousel != null){
            $pagesWithCarousels = Carousel::pluck('page_id')->toArray();
            $filteredPages = Page::whereNotIn('id', $pagesWithCarousels)->get();
        }else{
            $filteredPages = Page::all();
        }//if

        if($request->page_id != null){
            $page = Page::find($request->page_id)->get();
        }else{
            $page = null;
        }//if - else

        return view('backend.components.carousel-create')->with([
//            'page_id' => $page
            'carousel' => $carousel,
            'pages' => $pages,
            'filteredPages' => $filteredPages,
        ]);
    }//CarouselCreate

    public function CarouselEdit(Request $request){
        $carousel_id = $request->carousel_id;
        $carousel = Carousel::find($carousel_id);

        return view('backend.components.carousel-edit')->with('carousel',$carousel);
    }//CarouselEdit

    public function CarouselContentViewGeneral(Request $request){
        $carousel = Carousel::find($request->id);
        $carouselContent = CarouselContent::where('carousel_id',$carousel->id)->get();

        return view('backend.components.carousel-content-create')->with([
            'carousel' => $carousel,
            'carouselContent' => $carouselContent
        ]);
    }

    public function CarouselContentCreate(Request $request){
//        $carouselContent = new CarouselContent();
        $carousel = Carousel::find($request->id);


        return view('backend.components.carousel-content-create')->with([
            'carousel' => $carousel,

        ]);
    }//CarouselCreate

    public function loadPageContentForm(Request $request){
        // load from a url containing %%%/{page_id}/{locale_code}
        $selected_locale = Locale::where('code', 'en');
        $pageContent = new PageContent();
        $page = null;
        $content = null;
        $page_id = $request->page_id;

        $locales = Locale::all();
        if(Locale::where('code',$request->selected_locale)->first()){
            $selected_locale = Locale::where('code',$request->selected_locale)->first();
        }

//        dd(PageContent::where('page_id', '11')->where('locale_id', $selected_locale->id)->first());
        if(PageContent::where('page_id', $request->page_id)->where('locale_id',  $selected_locale->id)->first()){

            $pageContent = PageContent::where('page_id', $request->page_id )->where('locale_id',  $selected_locale->id)->first();
        }
        if(Page::find($page_id)){
            $page = Page::find($page_id);
        }else{

            return redirect()->back()->withErrors('general_errors', 'The requested page does not exist');
        }

//        dd($page, ' req  ', $request->page_id, $pageContent);
        return view('pages-management', compact('page', 'selected_locale', 'pageContent', 'locales','content', 'page_id'));
//        dd($selected_locale, $page, $pageContent);

    }//loadPageContentForm

    public function savePageContent(Request $request)
    {
        $page = Page::find($request->page_id);
        if($page->is_home){
            $request->url = '/'. strtolower($request->selected_locale) . '/';
        }
        $rules = [
            'keywords' => 'nullable',
            'description' => 'nullable',
            'title' => 'nullable',
            'url' => 'nullable',
            'content' => 'nullable',
            'page_id' => 'required',
            'display_name' => 'nullable',
            'custom_css' => 'nullable',
            'custom_js' => 'nullable',
            'custom_head_content' => 'nullable',
            'page_layout_type' => 'required',
        ];
//        dd($request);

        $validated = $request->validate($rules);

        if($validated){
            try{
                $url = str_replace(' ', '-', $request->url);
                $selected_locale = Locale::where('code', $request->selected_locale)->first();

                PageContent::updateOrCreate(['page_id' => $validated['page_id'] ,'locale_id' => $selected_locale->id ],
                    [
                        'custom_css' => $validated['custom_css'],
                        'custom_js' => $validated['custom_js'],
                        'custom_head_content' => $validated['custom_head_content'],
                        'display_name' => $validated['display_name'],
                        'keywords' => $validated['keywords'] ,
                        'description' => $validated['description'] ,
                        'title' => $validated['title'] ,
                        'url' => $url ,
                        'content' => $validated['content'],
                        'custom_head_content' => $validated['custom_head_content'],
                        'custom_css' => $validated['custom_css'],
                        'custom_js' => $validated['custom_js'],

                    ]);
//            dd(Page::where('id', $request->page_id)->update(['page_layout_type' => 3 ]));
               Page::where('id', $request->page_id)->update(['page_layout_type' => $request->page_layout_type ]);

            }catch(\Exception $ex){
                dd($ex->getMessage());
                return redirect()->back()->with('general_errors', $ex->getMessage());
            }
//            dd('success');
            return redirect()->back()->with('success', 'Οι αλλαγές αποθηκεύτηκαν επιτυχώς!');
        }

    }//savePageContent

}
