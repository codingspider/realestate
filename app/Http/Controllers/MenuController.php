<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class MenuController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
		if (Auth::user()->AccessLevel !=0) {
				return redirect("dashboard");
		}
    }
	
	 public function index() {
            $menus = Page::get();
			return view('backend.menu.home', ["menus" => $menus , "title" => "Pages"]);
	 }
}
