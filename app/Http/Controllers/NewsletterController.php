<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
class NewsletterController extends Controller
{
     public function index() {
        $newsletters = DB::table('newsletter')->groupBy("email")->paginate(30);
        return view('backend.newsletters.index', ['newsletters' => $newsletters, 'title' => "Newsletter"]);
     }
}
