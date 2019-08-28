<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use Response;
use App\property;
use App\Agent;
use Validator;

class ApiController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $properties = property::where("is_delete" , 0)->orderBy("id", "DESC")->get();
        if ($properties) {
            return Response::json(
                            array(
                        'status' => true,
                        'data' => $properties
                            ), 200
            );
        } else {
            return Response::json(
                            array(
                        'error' => [
                            'message' => "Something wrong with your Information"
                        ]
                            ), 404
            );
        }
    }

    public function featured() {
        $properties = property::where("featured", 1)->orderBy("id", "DESC")->get();
        if ($property) {
            return Response::json(
                            array(
                        'status' => true,
                        'data' => $properties
                            ), 200
            );
        } else {
            return Response::json(
                            array(
                        'error' => [
                            'message' => "Something wrong with your Information"
                        ]
                            ), 404
            );
        }
    }

    public function detail($id) {
        $property = property::where("id", $id)->first();
		$property->agent = Agent::select("name","phone","email")->where("id" , $property->agent_id)->first();
        if ($property) {
            return Response::json(
                            array(
                        'status' => true,
                        'data' => $property
                            ), 200
            );
        } else {
            return Response::json(
                            array(
                        'error' => [
                            'message' => "Something wrong with your Information"
                        ]
                            ), 404
            );
        }
    }

    public function agents() {
        $agents = Agent::get();
        if ($agents) {
            return Response::json(
                            array(
                        'status' => true,
                        'data' => $agents
                            ), 200
            );
        } else {
            return Response::json(
                            array(
                        'error' => [
                            'message' => "Something wrong with your Information"
                        ]
                            ), 404
            );
        }
    }

}
