<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\PageContent;
use App\Models\PageImage;
use Illuminate\Http\Request;
use PHPUnit\Exception;

class PageImagesController extends Controller
{

    public function deleteImage(Request $request){
        if(!$request->imageId){
            return redirect()->back()->with('general_errors','Η εικόνα δεν βρέθηκε!');
        }//if

        if(PageImage::where('id', $request->imageId)->exists()){
            try{
            PageImage::where('id', $request->imageId)->delete();
            return redirect()->back()->with('success', 'Η εικόνα διαγράφτηκε επιτυχώς!');
            }catch(\Exception $ex){
                return redirect()->back()->with('general_errors','Η εικόνα δεν διαγράφτηκε!');
            }
            }//if


    }
    public function saveImage(Request $request)
    {
//        dd($request->all());
        $validated = null;
        if ($request->hasFile('image')) {
            $validated = $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp,svg|max:8192',
                'alt' => 'nullable',
//                'is_enabled' => 'nullable',
                'page_id' => 'required',
                'order' => 'nullable|integer'
            ]);
        }//if
        if ($validated) {
//            dd($validated);
            try {
                $request->image->move('images/pageImages/', $request->image->getClientOriginalName());
                $image_path = $request->image->getClientOriginalName();

                PageImage::create(['image_path' => $request->image->getClientOriginalName(),
                    'page_id' => $request->page_id,
//                    'is_enabled' => $request->is_enabled,
                    'order' => $request->order,
                    'alt' => $request->alt,
                    ]);
            } catch (Exception $ex) {
                return redirect()->back()->with('general_errors', $ex->getMessage());
            }//catch
            return redirect()->back()->with('success', 'Η εικόνα αποθηκεύτηκε επιτυχώς! [id]');
        }
        return redirect()->back()->with('success', 'Η εικόνα αποθηκεύτηκε επιτυχώς!');
    }

    public function loadImages(Request $request){
        $iPage = null;
        $images = null;
        if($request->page_id == null || $request->page_id == ''){

            return redirect()->back()->with('general_errors', 'Η Σελίδα δεν βρέθηκε!');
        }else{
            $iPage = Page::where('id', $request->page_id)->first();
            $images = PageImage::where('page_id', $request->page_id)->get()->sortBy('order');


        }
//        dd($images);
//        dd(PageImage::all());
        return view('backend.components.pageImageList')->with([
            'page' => $iPage,
            'images' => $images,
        ]);
    }
}
