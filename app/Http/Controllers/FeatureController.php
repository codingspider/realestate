<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Feature;
use DB;
use Session;

class FeatureController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Property Features List.
     *
     */
    public function index() {
        $features = Feature::where("is_delete",0)->get();
        return view('backend.feature.home', ['features' => $features, 'title' => "Features"]);
    }

    /**
     * Features Save.
     *
     */
    public function save(Request $request) {
        $id = $request->input("id");
        $data = array(
            "name" => $request->input("name")
        );

        if ($id) {
            \Session::flash('flash_message', 'Updated Successfully');
            Feature::where("id", $id)->update($data);
        } else {
            \Session::flash('flash_message', 'Added Successfully');
            Feature::insert($data);
        }
        return redirect("admin/features");
    }

    /**
     * Delete Feature.
     *
     */
    public function delete(Request $request) {
        $id = $request->input("id");
        Feature::where("id", $id)->update(array("is_delete" =>1));
    }

    /**
     * Get Single Feature by Ajax Call.
     *
     */
    public function get(Request $request) {
        $id = $request->input("id");
        $result = Feature::find($id);
        echo json_encode($result);
    }

}
