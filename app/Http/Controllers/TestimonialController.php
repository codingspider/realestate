<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
class TestimonialController extends Controller
{
    
    public function __construct() {
        $this->middleware('auth');
    }
	
	public function index() {
        $testimonials = DB::table('testimonials')->get();
        return view('backend.testimonial.index', ['title' => "Testimonials" , 'testimonials' => $testimonials]);
     }
	 
	 public function save(Request $request) { 
		$data = array(
			"client_name" => $request->input("client_name"),
			"message" => $request->input("message")
		);
		
		if($request->input("id")) { 
			DB::table("testimonials")->where("id" , $request->input("id"))->update($data);
		} else { 
			DB::table("testimonials")->insert($data);
		}
		
		
		return redirect("admin/testimonials");
	 }
	 
	 public function get(Request $request) { 
		$id = $request->input("id");
		$proeprty = DB::table("testimonials")->where("id" , $id)->first();
		echo json_encode($proeprty);
	 }
	 
	  public function delete(Request $request) { 
		$id = $request->input("id");
		$testimonial = DB::table("testimonials")->where("id" , $id)->delete();
		echo json_encode($testimonial);
	 }
	 
}
