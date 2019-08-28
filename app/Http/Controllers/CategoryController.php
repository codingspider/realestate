<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Category;
use DB;
use Session;

class CategoryController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $categories = Category::where("is_delete",0)->get();
        return view('backend.category.home', ['categories' => $categories, 'title' => "Categories"]);
    }

    public function save(Request $request) {
        $id = $request->input("id");
        $data = array(
            "name" => $request->input("name")
        );

        if ($id) {
            \Session::flash('flash_message', 'Updated Successfully');
            Category::where("id", $id)->update($data);
        } else {
            \Session::flash('flash_message', 'Added Successfully');
            Category::insert($data);
        }
        return redirect("admin/categories");
    }

    public function delete(Request $request) {
        $id = $request->input("id");
        Category::where("id", $id)->update(array("is_delete" =>1));
    }

    public function get(Request $request) {
        $id = $request->input("id");
        $result = Category::find($id);
        echo json_encode($result);
    }

}
