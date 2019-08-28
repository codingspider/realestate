<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class RokonPropertyController extends Controller
{
     public function fileUpload() {
     	
		$id = "uu" . Auth::user()->id;
		if (!file_exists("assets/images/uploads/$id")) {
			$oldmask = umask(0);
			mkdir("assets/images/uploads/$id", 0777);
			umask($oldmask);
		}
        $files = Input::file('file');
        if ($files[0]->isValid()) {
            $destinationPath = "assets/images/uploads/$id/";
            $fileName = rand(11111, 99999) . "_" . $id;
            $files[0]->move($destinationPath, "$fileName.jpeg");
            $path = public_path("assets/images/uploads/$id/$fileName.jpeg");
            Image::make($path)->resize(
                    500, null, function ($constraint) {
                $constraint->aspectRatio();
            }
            )->save($path);
           
            $g_id = $id;
               
            $data = array(
                "property_id" => "",
                "image_name" => "$fileName.jpeg",
                "g_id" => $g_id
            );
            DB::table("supporting_images")->insert($data);
            return 'Upload successfully';
        }
    }
}
