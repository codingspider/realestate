<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\User;
use DB;
use Auth;
use Session;

class DashboardController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $total_properties = DB::table("properties")->where("is_delete",0)->count();
        $total_agents = DB::table("users")->count();
        $agents = DB::table("users")->where("is_delete",0)->orderBy('id', 'DESC')->limit(10)->get();
        $total_customer_requets = DB::table("customers_request")->count();
       if (Auth::user()->AccessLevel != 0) {
            $properties = DB::table("properties")->where("is_delete",0)->where("agent_id", Auth::user()->id)->get();
            $property_ids = array();
            foreach ($properties as $pro) {
                $property_ids[] = $pro->id;
            }

            $customer_requets = DB::table("customers_request")->whereIn("property_id", $property_ids)->orderBy('id', 'DESC')->limit(10)->get();
        } else {
            $customer_requets = DB::table("customers_request")->orderBy('id', 'DESC')->limit(10)->get();
        }

        $payments = DB::table("property_payments")->select("amount")->get();
        $data = array(
            "total_properties" => $total_properties,
            "total_agents" => $total_agents,
            "agents" => $agents,
            "payments" => $payments,
            "customer_requets" => $customer_requets,
            "total_customer_requets" => $total_customer_requets
        );
		if (Auth::user()->AccessLevel != 0) {
			return view('backend.dashboard.agent', ['data' => $data, 'title', "Dashboard"]);
		} else { 
			return view('backend.dashboard.home', ['data' => $data, 'title', "Dashboard"]);
		}
    }

    /**
     * Agent and Admin Profile page .
     *
     */
    public function profile() {
        $user = User::find(Auth::user()->id);
        return view('profile', ['user' => $user, 'title', "My Profile"]);
    }

    /**
     * Customers Requests .
     *
     */
    public function customerRequets() {
        if (Auth::user()->AccessLevel != 0) {
            $properties = DB::table("properties")->where("agent_id", Auth::user()->id)->get();
            $property_ids = array();
            foreach ($properties as $pro) {
                $property_ids[] = $pro->id;
            }

            $customer_requets = DB::table("customers_request")->whereIn("property_id", $property_ids)->orderBy('id', 'DESC')->limit(10)->get();
        } else {
            $customer_requets = DB::table("customers_request")->orderBy('id', 'DESC')->limit(10)->get();
        }

        return view('backend.dashboard.customer_requests', ['title' => "Customers Requests", 'customer_requets' => $customer_requets, 'title', "My Profile"]);
    }

}
