<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
class SliderController extends Controller
{
	
    public function __construct() {
        $this->middleware('auth');
    }
	
    public function index() {
        $sliders = DB::table('slider')->get();
		$properties = DB::table('properties')->get();
        return view('backend.slider.index', ['properties' => $properties , 'title' => "Sliders" , 'sliders' => $sliders]);
     }
	 
	 public function save(Request $request) { 
		$data = array(
			"title" => $request->input("title"),
			"product_id" => $request->input("product_id")
		);
		
		$destinationPath = "assets/images/slider/";
        if ($request->hasFile("file")) {
            $fileName = rand(11111, 999999); // renameing image
            $request->file("file")->move($destinationPath, "$fileName.jpg");
            $data["image"] = "$fileName.jpg";
       
        }
		if($request->input("id")) { 
			DB::table("slider")->where("id" , $request->input("id"))->update($data);
		} else { 
			DB::table("slider")->insert($data);
		}
		return redirect("admin/sliders");
	 }
	 
	 public function get(Request $request) { 
		$id = $request->input("id");
		$proeprty = DB::table("slider")->where("id" , $id)->first();
		echo json_encode($proeprty);
	 }
	 
	  public function delete(Request $request) { 
		$id = $request->input("id");
		$property = DB::table("slider")->where("id" , $id)->delete();
		echo json_encode($property);
	 }
}
