<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditFormRequest;
use App\Models\CarouselImage;
use App\Models\Locale;
use App\Models\Page;
use App\Models\PageContent;
use App\Models\PageImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class PagesController extends Controller
{


    public function UpdateImage(Request $request){
        $validated = $request->validate([
            'order' => 'required|numeric',
//            'is_enabled' => 'nullable'
        ]);
        $is_enabled = $request->is_enabled == 'on' ? 1 : 0;
//            dd($request);
        if($validated){
            try {
                PageImage::where('id', $request->image_id)->update([
                    'order' => $request->order,
//                    'is_enabled' => $is_enabled,
                ]);
                return redirect()->back()->with('success', 'Αποθηκεύτηκε επιτυχώς!');
            }catch(\Exception $ex){
//                dd($ex->getMessage());
                return redirect()->back()->with('error', 'Η αποθήκευση απέτυχε!');
            }
        }else{
            return redirect()->back()->with('error', 'Δεν αποθηκεύτικαν οι αλλαγές!');
        }

    }//UpdateImage
    public function loadOrCopyJson($page, $locale)
    {
        $locale = strtolower($locale);
        // Paths to the JSON files
        $jsonFile = resource_path("translations/{$page}_{$locale}.json");
        $defaultJsonFile = resource_path("translations/{$page}_en.json");

        // Check if the {page}_{locale}.json file exists
        if (!file_exists($jsonFile)) {
            // If not, check if the default {page}_en.json file exists
            if (file_exists($defaultJsonFile)) {
                // Copy the default {page}_en.json file and rename it to {page}_{locale}.json
                copy($defaultJsonFile, $jsonFile);
                return "File {$page}_{$locale}.json was created from {$page}_en.json.";
            } else {
                return "Default file {$page}_en.json does not exist!";
            }
        }

        // If the file exists, just load it
        $jsonData = json_decode(file_get_contents($jsonFile), true);

        return $jsonData;  // return or process the loaded data
    }


    public function saveHCPages(Request $request){
            $jsonPath = resource_path('translations/'. $request->page_name . '_' . strtolower($request->locale) . '.json');
            if(!file_exists($jsonPath)){
                $this->loadOrCopyJson($request->page_name, strtolower($request->locale));
            }

            // Load the current JSON data
            $jsonData = json_decode(file_get_contents($jsonPath), true);

            // Update the JSON data with the submitted form data
            foreach ($request->except('_token') as $key => $value) {
                if (array_key_exists($key, $jsonData)) {
                    $jsonData[$key] = $value;  // Update the value
                }
            }

            // Save the updated JSON data back to the file
            file_put_contents($jsonPath, json_encode($jsonData, JSON_PRETTY_PRINT));

            return back()->with('success', 'JSON file updated successfully!');

    }//saveHCPages
    public function editHCPages(Request $request)
    {


        $filePath = resource_path("translations/" . $request->page_name . '_'  . strtolower($request->locale) . '.json');
        $eng = resource_path("translations/" . $request->page_name . '_en.json');
        $locale = $request->locale;
        $locales = Locale::all();
        if(!File::exists($filePath)){

            $this->loadOrCopyJson($request->page_name, strtolower($request->locale));
        }

        if (File::exists($filePath)) {
            $jsonContent = File::get($filePath);
            $eng = File::get($eng);
            $eng = json_decode($eng, true);
            $jsonContent = json_decode($jsonContent, true);
//            dd($jsonContent);
            return view('backend.pages.editHCPageTranslations')->with([
                'jsonContent' => $jsonContent,
                'pageName' => $request->page_name,
                'locale' => $locale,
                'locales' => $locales,
                'page_name' => $request->page_name,
                'eng' => $eng
            ]);

        } else {
            return response()->json(['error' => 'File not found'], 404);
        }


    }//editHCPages
    public function loadHCPages(){
        $directory = resource_path('translations');
        $jsonFiles = [];
        $locales = Locale::all();
        $locs = [];
        // Loop through files in the directory
        if (File::isDirectory($directory)) {
            $files = File::allFiles($directory);

            foreach ($files as $file) {
                // Check if file matches the pattern name_en.json
                if (preg_match('/^[a-zA-Z0-9_-]+_en\.json$/', $file->getFilename())) {
                    $filePath = $file->getPathname();
                    $fileName = $file->getFilename();

                    // Read the JSON file
                    $jsonContent = json_decode(File::get($filePath), true);

                    // Check if the "title" field exists
                    $title = isset($jsonContent['title']) ? $jsonContent['title'] : 'No title found';

                    // Add file info to the array
                    $jsonFiles[] = [
                        'file_name' => $fileName,
                        'title' => $title
                    ];
                }
            }

        }
            foreach ($locales as $loc) {
                $locs[] = $loc->code;
            }
//            dd($locs);
//        for($i =0; $i < count($jsonFiles); $i++){
//            for( $j = 0; $j < count($locs)-1; $j++){}
//            if( str_contains($jsonFiles[$i], '_'. strtolower($locs[$j]) .'.json') ){
////                dd( $jsonFiles[$i] );
//            }
//        }
//            for ($i = 0; $i < count($jsonFiles); $i++) {
//                $jsonFiles[$i] = str_replace('_en.json', '', $jsonFiles[$i]);
//            }



//            dd($jsonFiles);
        // Pass the list of files to the view
        return view('backend.pages.ListTranslationsPage', [
            'jsonFiles' => $jsonFiles,
            'locales' => $locales
            ]);
    }

    public function loadEditPage(Request $request){
        $page = Page::find($request->id);
        $homePage = Page::where('is_home', '1')->first();
        $homePageExists = Page::where('is_home', '1')->first();
        if($page->file_name === '' || empty($page->file_name) || $page->file_name === null){
            $page->file_name = str_replace(' ', '_' , $page->name);
        }
        return view('pages-edit-form')->with([
            'id' => $request->id,
            'page'=> $page,
            'pages' => Page::all(),
            'homePageExists' => $homePageExists,
            'homePage' => $homePage,

        ]);
    }
    protected $rules = [
        'name' => 'required',
        '*' => 'nullable',
        'file_name' => 'nullable',
        'is_published' => 'nullable',
        'slug' => 'nullable',
    ];
public function save(Request $req){
//        dd($req);
//        dd($req->validate());
//        if(!$req->validate($this->rules)){
//            return redirect('/easyupdate')->with('error', 'Κάτι πήγε λάθος κατά τη σύγκριση δεδομένων!');
//        }

    $request = $req;
    $toEditForm = Page::find($request->id);
//    $request->file_name = str_replace(' ', '_',$request->name);
    $is_home = 0;
    $is_published = 0;
    if($request->is_published === 'on' || $request->is_published != 0){
        $request->is_published = 1;
    }else{
        $request->is_published  = 0;
    }
    if($request->is_home === 'on'){
        $request->is_home = 1;
    }else{
        $request->is_home = 0;
    }
    if($request->is_hardCoded == true){
        $request->is_hardCoded = 1;
    }else{
        $request->is_hardCoded = 0;
    }
    if($request->has_reservationForm === 'on'){
        $request->has_reservationForm = 1;
    }else{
        $request->has_reservationForm = 0;
    }

//        $toEditForm->slug = str_replace(' ', '-', $request->slug);
        $toEditForm->name = $request->name;
        $toEditForm->is_published = intval($request->is_published);
        $toEditForm->is_home = intval($request->is_home);
        $toEditForm->file_name = '-';
        $toEditForm->is_hardCoded = $request->is_hardCoded;
        $toEditForm->has_reservationForm = $request->has_reservationForm;




//            DB::table('pages')->where('id', $request->id)->udpate([
//                'name' => $request->name,
//                'file_name' => $request->file_name,
//                'slug' => $request->slug,
//                'is_published' => $request->is_published,
//                'is_home' => $request->is_home
//            ]);

            $toEditForm->save();

        return redirect('/easyupdate/pages');
    }



    public function savePageContent(Request $request){
        if($request->validate([
            'locale_id' => 'required',
            'slug' => 'nullable',
            'title' => 'nullable',
            'description' => 'nullable',
            'keywords' => 'nullable',
            'page_content' => 'nullable',
        ])){

            $content = htmlspecialchars($request->page_content);
            $url = str_replace(' ', '-', $request->slug);



//            dd($url);
            $pgc = PageContent::where('url', $request->slug);
//                dd($pgc);
//            if($pgc != null && ( $pgc->locale_id != $request->locale_id || $pgc->page_id != $request->page_id)){
//                return redirect()->back()->with('error', 'Error: Η url που βάλατε χρησημοποιείται ήδη παρακαλώ προσπαθείστε ξανά!');
//            }


            try{
                if(PageContent::updateOrCreate(
                    ['page_id'=> $request->page_id, 'locale_id' => $request->locale_id],
                    [
                        'title' => $request->title,
                        'url' => $url,
                        'keywords' => $request->keywords,
                        'description' => $request->description,
                        'content' => $content,

                    ]
                ));

                return redirect()->back()->with('success', 'Το περιεχόμενο σελίδας αποθηκεύτηκε επιτυχώς!');
            }catch(\Exception $ex){
                dd($ex);
                return redirect()->back()->with('error', 'Error: ' . $ex->getMessage());
            }
        }else{
            return redirect()->back()->with('general_error', 'Παρακαλώ σιγουρευτείτε ότι όλα τα πεδία είναι συμπληρωμένα');
        }
    }//asavePageContent

    public function loadPageContentForm(Request $request){
//    dd(PageContent::where('page_id', $request->id)->get());
        $page = PageContent::where('page_id', $request->id);
        return view('pages-management')->with(
            [
                'content' => 'asd',
                'page' => Page::find($request->id),
                'locales' => Locale::all(),
                'pgcAll' => PageContent::where('page_id', $request->id)->get(),
            ]
        );
    }
}
