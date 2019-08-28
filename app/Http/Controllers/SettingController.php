<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use Session;

class SettingController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Site Settings page.
     *
     */
    public function index() {
        $settings = DB::table("settings")->where("id", 1)->first();
        return view('backend.settings.home', ['setting' => $settings, 'title' => "Settings"]);
    }

    /**
     * Setting save function.
     *
     */
    public function save(Request $request) {
        $data = array(
            "title" => $request->input("title"),
            "address" => $request->input("address"),
            "city" => $request->input("city"),
            "state" => $request->input("state"),
            "zip" => $request->input("zip"),
            "longitude" => $request->input("longitude"),
            "latitude" => $request->input("latitude"),
            "phone_no" => $request->input("phone"),
            "facebook" => $request->input("facebook"),
            "twitter" => $request->input("twitter"),
            "google" => $request->input("google"),
            "linkedin" => $request->input("linkedin"),
            "youtube" => $request->input("youtube"),
            "attempts" => $request->input("attempts"),
            "featured_price" => $request->input("featured_price"),
            "stripe_publish" => $request->input("stripe_publish"),
            "stripe_secret" => $request->input("stripe_secret"),
            "stripe_mode" => $request->input("stripe_mode"),
            "paypal_mode" => $request->input("paypal_mode"),
            "paypal_email" => $request->input("paypal_email"),
            "captcha" => $request->input("captcha"),
            "captcha_public" => $request->input("captcha_public"),
            "captcha_secret" => $request->input("captcha_secret"),
            "registration" => $request->input("registration"),
            "currency" => $request->input("currency"),
            "theme_color" => $request->input("theme_color"),
            "email" => $request->input("email")
        );
		
		
		$destinationPath = "assets/frontend/";
        if ($request->hasFile("logo")) {
            $fileName = rand(11111, 999999); // renameing image
            $request->file("logo")->move($destinationPath, "logo.png");
            $data["logo"] = "logo.png";
        }

        \Session::flash('message', 'Settings Saved Successfully');
        DB::table("settings")->where("id", 1)->update($data);
        return redirect("admin/settings");
    }

}
