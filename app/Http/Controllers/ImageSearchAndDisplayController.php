<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
class ImageSearchAndDisplayController extends Controller
{
    private static $basePath = 'images';
    public static function getImagesRecursively($relativePath = '')
    {
        $images = [];
//        $fullPath = public_path(self::$basePath . '/' . $relativePath);
        $fullPath = public_path('images');
//        dd( public_path('images'));

        $files = File::allFiles($fullPath);

        foreach ($files as $file) {
            if ($file->isDir()) {
                $images = array_merge($images, self::getImagesRecursively(self::$basePath, $relativePath . '/' . $file->getRelativePathname()));
            } else {
                $imageExtensions = ['jpg', 'jpeg', 'png', 'avif'];
                if (in_array(strtolower($file->getExtension()), $imageExtensions)) {
                    list($width, $height) = getimagesize($file->getRealPath());
                    $images[] = [
                        'base_path' => self::$basePath,
                        'relative_path' => $relativePath . '/' . $file->getRelativePathName(),
                        'filename' => $file->getFilename(),
                        'extension' => $file->getExtension(),
                        'dimensions' => $width . 'x' . $height,
                        'size' => ($file->getSize()),
                        'delete_url' => url('/easyupdate/image/delete/' . ($file->getRelativePath() ? $file->getRelativePath() . '/' : '') . rawurlencode($file->getFilename())),
                    ];
                }
            }
        }

        return $images;
    }//getImagesRecursively!

    public function deleteImage(Request $request, $relativePath = null, $filename = null) // Make $relativePath optional
    {
        $fullPath = '';
        if($relativePath && $filename!=null && $filename !='' ) {
            $fullPath = public_path( '/images/'.$relativePath . '/' . $filename);
        }
        elseif ($relativePath) {
            $fullPath = public_path( '/images/'.$relativePath );
        } else {
            $fullPath = public_path('/images/'.$filename);
        }
//            dd($filename . ' rel ' . $relativePath);
        // ... the rest of the method remains the same
        if (File::exists($fullPath)) {
            File::delete($fullPath);
            return redirect()->back()->with('success', 'Image deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'Image not found.' . $fullPath);
        }
    }

    public function loadImagesView(){

        return view('ImageSearchAndDisplay')->with([
           'images' => self::getImagesRecursively(),
        ]);
    }
}
