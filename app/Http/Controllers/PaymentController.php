<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use DB;
class PaymentController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
	
	public function index() {
        if (Auth::user()->AccessLevel == 0) {
			$payments = DB::table("property_payments")->join("properties", "properties.id", '=', "property_payments.property_id")->orderBy("property_payments.id" ,"DESC")->paginate(20);
			return view('backend.payments.home', ['payments' => $payments, "title" => "Featured Property Payments"]);
		}
    }
	
	public function paypalCallback(Request $request) {

        DB::table("property_payments")->insert(array(
            'agent_id' => Auth::user()->id,
            'property_id' => $request->input("custom"),
            'amount' => $request->input("payment_gross") * 100,
            'paypal_trasection_id' => $request->input("payer_email")
        ));

        
		\Session::flash('flash_message', 'Payment Made Successfully and request sent to admin');
         return redirect("properties");
    }
	
}
