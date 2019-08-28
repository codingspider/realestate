<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Session;
use Redirect;

class LocalizationController extends Controller {

    /**
     * Change the Language and save it to session.
     *
     */
    public function index($locale) {
        Session::put("locale", $locale);
		return Redirect::back();
        //return redirect("/");
    }

}
