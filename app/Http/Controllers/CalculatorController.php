<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class CalculatorController extends Controller
{
	public function __construct() {
        $this->middleware('auth');
    }
	
    /**
     * Show the Loan Calculator Page.
     *
     */
    public function calculator() {
        return view('pages.calculator');
    }
}
