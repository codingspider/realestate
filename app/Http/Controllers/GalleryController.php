<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use Intervention\Image\ImageManagerStatic as Image;
class GalleryController extends Controller
{
	 public function __construct() {
        $this->middleware('auth');
     }
	 
	  public function index() {
		$dirname_thumb = "assets/gallery/thumbnails/";
        $images_thumb = glob($dirname_thumb . "*.jpg");
		$all_images = array();
		foreach($images_thumb as $key) { 
			$all_images[] = $key;
		}
		
        return view('backend.gallery.index' , ['images' => $all_images,"title" => "Gallery"]);
      }
	
      public function fileUpload() {
        $files = Input::file('file');
        if ($files[0]->isValid()) {
            $destinationPath = "assets/gallery/";
            $destinationThumb = "assets/gallery/thumbnails/";
			
		
			$fileName = $files[0]->getClientOriginalExtension();
			//$files[0]->move($destinationPath, "$fileName.jpg");
			// upload new image
			Image::make($files[0]->getRealPath())
			// original
			->save($destinationPath.$fileName)
			// thumbnail
			->resize('100', '100')
			->save($destinationThumb.$fileName)
			->destroy();

			
            /*$fileName = rand(11111, 999999);
            $files[0]->move($destinationPath, "$fileName.jpg");
            $path = public_path("assets/gallery/$fileName.jpg");
            Image::make($path)->resize(
                    500, null, function ($constraint) {
                $constraint->aspectRatio();
            }
            )->save($path);*/
            return 'Upload successfully'; 
        }
    }
	
	public function removefile(Request $request) { 
		  $filename = $request->input('file');
		  $path = public_path("assets/gallery/$filename");
		  $path_thumb = public_path("assets/gallery/thumbnails/$filename");
		  if (file_exists($path_thumb)) {
			unlink($path_thumb);
			unlink($path);
			echo 'File '.$filename.' has been deleted';
		  } else {
			echo 'Could not delete '.$filename.', file does not exist';
		  }
	}
	
	
}
