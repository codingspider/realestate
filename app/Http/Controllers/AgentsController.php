<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Agent;
use DB;
use Hash;
use App\Property;
use Auth;
use Session;
use Intervention\Image\ImageManagerStatic as Image;

class AgentsController extends Controller {

    public function __construct() {
        $this->middleware('auth', ['except' => ['confirm', 'listing']]);
    }

    /**
     * Agents Listing.
     *
     */
    public function index() {
        $agents = Agent::where("is_delete",0)->paginate(10);
		$title = "Agents";
        return view('backend.agents.home', ['agents' => $agents, 'title' => "Agents"]);
    }

    /**
     * Agents Store.
     *
     */
    public function save(Request $request) {
        $id = $request->input("id");
        $data = array(
            "name" => $request->input("name"),
            "phone" => $request->input("phone"),
            "facebook" => $request->input("facebook"),
            "twitter" => $request->input("twitter"),
            "email" => $request->input("email")
        );
        if ($request->input("password")) {
            $data['password'] = bcrypt($request->input("password"));
        }

        if ($id) {
            \Session::flash('flash_message', 'Updated Successfully');
            Agent::where("id", $id)->update($data);
        } else {
            \Session::flash('flash_message', 'Added Successfully');
            $id = Agent::insertGetId($data);
        }

        if (!empty(Input::file('photo')) and Input::file('photo')->isValid()) {
            $destinationPath = "assets/images/profile";
            Input::file('photo')->move($destinationPath, "$id.jpg");
            $path = public_path("assets/images/profile/$id.jpg");
            Image::make($path)->resize(
                    500, null, function ($constraint) {
                $constraint->aspectRatio();
            }
            )->save($path);
            return 'Upload successfully';
        }

        return redirect("admin/agents");
    }

    /**
     * Agents/User Delete.
     *
     */
    public function delete(Request $request) {
        $id = $request->input("id");
        Agent::where("id", $id)->update(array("is_delete" =>1));
    }
	
	public function listing($agent_id)
    {
		$agent = Agent::find($agent_id);
		if(!$agent) { 
			return view("errors.404");
		}
		
		$query = Property::where("is_delete" , 0)->where('agent_id' , $agent_id);
		
		$order = "new";
        $orderby = "id";
        $ordertype = "desc";
		$type = "";
        if (!empty(Input::get("type"))) {
            $type = Input::get("type");
			if($type != "All") $query->where("type", $type);
        }
		
        if (!empty(Input::get("order"))) {
            $order = Input::get("order");

            if ($order == "priceh") {
                $orderby = "price";
                $ordertype = "desc";
            }
			
			if ($order == "pricel") {
                $orderby = "price";
                $ordertype = "asc";
            }
        }

        $query->orderBy($orderby, $ordertype);
        $properties = $query->paginate(12);
		
		
        return view('agent_listing' , ['agent' => $agent, "order" => $order,'properties' => $properties]);
    }
	

    /**
     * Get Single Agent Ajax Call.
     *
     */
    public function get(Request $request) {
        $id = $request->input("id");
        $agent = Agent::find($id);
        echo json_encode($agent);
    }

    /**
     * Agents Email Verification.
     *
     */
    public function verifyEmail() {
        $user_id = Auth::user()->ID_User;
        $user = User::find(Auth::user()->ID_User);
        $token = str_random(30);
        $user['token'] = $token;
        if (DB::table("user_activations")->where('user_id', $user_id)->first()) {
            DB::table('user_activations')->where('user_id', $user_id)->update(['token' => $user['token']]);
        } else {
            DB::table('user_activations')->insert(['user_id' => $user_id, 'token' => $user['token']]);
        }

        $data_Send = array(
            "token" => $user->token,
            "email" => $user->email
        );


        Mail::send(
                'emails.activation', $data_Send, function ($message) use ($data_Send) {
            $message->from("ismailtest101@gmail.com", 'Psia Email Verfication');
            $message->to($data_Send['email']);
            $message->subject('Site - Activation Code');
        }
        );

        return redirect()->to('/')
                        ->with('success', "We sent activation code. Please check your mail.");
    }

    /**
     * Agents Email Confirmation.
     *
     */
    public function confirm($confirmation_code) {

        if (!$confirmation_code) {
            \Session::flash('flash_message', 'Something Wrong!');
        }

        $code = DB::table("user_activations")->where("token", $confirmation_code)->first();

        if (!$code) {
            return redirect()->to('/')
                            ->with('success', "Something Wrong! We did not find user");
        }
        $user = User::find(Auth::user()->ID_User);
        $user->email_verified = 1;
        $user->save();
        return redirect()->to('/')
                        ->with('success', "You have successfully verified your Email.");
    }

    /**
     * Agents Update Profile.
     *
     */
    public function updateProfile(Request $request) {
        $id = Auth::user()->id;

        $data = array(
            "name" => $request->input("name"),
            "phone" => $request->input("phone"),
            "facebook" => $request->input("facebook"),
            "twitter" => $request->input("twitter"),
            "email" => $request->input("email"),
            "AccessLevel" => $request->input("type")
        );

			if (!file_exists("assets/images/profile")) {
				$oldmask = umask(0);
				mkdir("assets/images/profile", 0777);
				umask($oldmask);
			}
			
        if (!empty(Input::file('photo')) and Input::file('photo')->isValid()) {
			
            $destinationPath = "assets/images/profile/";
            Input::file('photo')->move($destinationPath, "$id.jpg");
            $path = public_path("assets/images/profile/$id.jpg");
            Image::make($path)->resize(
                    150, null, function ($constraint) {
                $constraint->aspectRatio();
            }
            )->save($path);
        }

        Agent::where("id", $id)->update($data);
        \Session::flash('flash_message', 'Profile Update Successfully');
        return redirect('admin/profile');
    }

    /**
     * Agents Password Reset.
     *
     */
    public function passwordReset(Request $request) {
        $user = Agent::find(Auth::user()->id);
        $old_password = $request->Input('old_password');
        $password = $request->Input('password');
        $confirm_password = $request->Input('confirm_password');
        if (Hash::check($old_password, $user->password)) {
            \Session::flash('flash_message', 'Password with confirm password do not match');
            if ($password == $confirm_password) {
                $data = array(
                    "password" => bcrypt($password)
                );
                DB::table("users")->where("id", Auth::user()->id)->update($data);
                \Session::flash('flash_message', 'Password Changed Successfully');
            }
        } else {
            \Session::flash('flash_message', 'Old password is not correct');
        }
        return redirect('admin/profile');
    }

}
