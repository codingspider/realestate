<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use DB;
use Auth;
use File;
use Session;
use App\Property;
use App\Feature;
use App\Category;
use App\Agent;
use Intervention\Image\ImageManagerStatic as Image;

class PropertyController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Property Lisitng on admin.
     *
     */
    public function index() {
        if (Auth::user()->AccessLevel !=0) {
            $properties = Property::where('agent_id', Auth::user()->id)->paginate(25);
        } else {
            $properties = Property::paginate(25);
        }

        return view('backend.property.home', ['properties' => $properties, "title" => "Properties"]);
    }

    /**
     * Property Add Form.
     *
     */
    public function form() {
		 $properties = Property::where("is_delete",0)->get();

        $categories = Category::where("is_delete",0)->get();
        $features = Feature::where("is_delete",0)->get();
        if (Auth::user()->AccessLevel !=0) {
            $agents = Agent::find(Auth::user()->id);
        } else {
            $agents = Agent::where("is_delete",0)->get();
        }

        return view('backend.property.form', ['properties' => $properties, 'agents' => $agents, 'categories' => $categories, 'features' => $features, "title" => "Property Form"]);
    }

    /**
     * Property Edit.
     *
     */
    public function edit($id) {
        $property = Property::find($id);
		
		if(!$property) { 
			return redirect("errors.pagenotfound");
		}
		if($property->agent_id != Auth::user()->id and Auth::user()->AccessLevel != 0) { 
			return redirect("properties");
		}
		Session::put("edit_property" , $property->user_id);
        $properties = Property::where("is_delete",0)->get();
        $categories = Category::where("is_delete",0)->get();
        $features = Feature::where("is_delete",0)->get();
        if (Auth::user()->AccessLevel !=0) {
            $agents = Agent::find(Auth::user()->id);
        } else {
            $agents = Agent::where("is_delete",0)->get();
        }

        $property_images = DB::table("supporting_images")->where("property_id", $id)->get();

        return view('backend.property.edit', ['properties' => $properties, 'property_images' => $property_images, 'property' => $property, 'agents' => $agents, 'categories' => $categories, 'features' => $features, "title" => "Property Form"]);
    }

    /**
     * Property Store.
     *
     */
    public function save(Request $request) {
        $id = $request->input("id");
        $data = array(
            "title" => $request->input("title"),
            "category_id" => $request->input("category_id"),
            "agent_id" => $request->input("agent_id"),
            "type" => $request->input("type"),
            "address" => $request->input("address"),
            "city" => $request->input("city"),
            "state" => $request->input("state"),
            "zip" => $request->input("zip"),
            "longitude" => $request->input("longitude"),
            "latitude" => $request->input("latitude"),
            "price" => $request->input("price"),
            "beds" => $request->input("bedrooms"),
            "bath" => $request->input("bathrooms"),
            "year" => $request->input("year"),
            "size" => $request->input("size"),
            "body" => $request->input("description")
        );

        if (!empty($request->input("features"))) {
            $data["features"] = implode(",", $request->input("features"));
        }

        if (!empty($request->input("related"))) {
            $data["related"] = implode(",", $request->input("related"));
        }
			$user_id = Auth::user()->id;
			if (!file_exists("assets/images/uploads")) {
				$oldmask = umask(0);
				mkdir("assets/images/uploads", 0777);
				umask($oldmask);
			}
			$destinationPath = "assets/images/uploads/";
        if ($request->hasFile("mainfile")) {
            $fileName = rand(11111, 999999) . $user_id; // renameing image
            $request->file("mainfile")->move($destinationPath, "$fileName.jpg");
            $data["image_name"] = "$fileName.jpg";
            $path = public_path("assets/images/uploads/$fileName.jpg");
            Image::make($path)->resize(
                    500, null, function ($constraint) {
                $constraint->aspectRatio();
            }
            )->save($path);
        }
		
        if ($id) {
			$data['updated_at'] = date("Y-m-d h:i:s");
            Property::where("id", $id)->update($data);
            $g_id = "uu".$user_id;
            $data1 = array(
                "property_id" => $id,
                "g_id" => 0
            );
			$uploads_dir = "assets/images/uploads/$id";
			if(!file_exists($uploads_dir)) { 
				$old = umask(0);
				mkdir("assets/images/uploads/$id", 0777);
				umask($old);
			}
	
            DB::table("supporting_images")->where("g_id", $g_id)->update($data1);
			foreach(glob("assets/images/uploads/$g_id/*.*") as $file) {
				 $file_to_go = str_replace("$g_id/","$id/",$file);
					copy($file, $file_to_go);
			}
			
			\Session::flash('flash_message', 'Updated Successfully');
        } else {
			$data['created_at'] = date("Y-m-d h:i:s");
            $insert_id = Property::insertGetId($data);
            $g_id = "uu".$user_id;
            $data1 = array(
                "property_id" => $insert_id,
                "g_id" => 0
            );
            DB::table("supporting_images")->where("g_id", $g_id)->update($data1);
			rename("assets/images/uploads/$g_id", "assets/images/uploads/$insert_id");
            \Session::flash('flash_message', 'Added Successfully');
        }
        return back();
    }

    /**
     * Property Delete.
     *
     */
    public function delete($id) {
        if (Auth::user()->AccessLevel !=0) {
			$result = Property::where("id" , $id)->where("agent_id" , Auth::user()->id)->first();
			if($result) { 
				Property::where("id", $id)->delete();
			}
        } else {
            Property::where("id", $id)->delete();
        }
		\Session::flash('flash_message', 'Deleted Successfully');
      return back();
    }

    /**
     * Property File Upload by ajax.
     *
     */
    public function fileUpload() {
		$id = "uu" . Auth::user()->id;
		if (!file_exists("assets/images/uploads/$id")) {
			$oldmask = umask(0);
			mkdir("assets/images/uploads/$id", 0777);
			umask($oldmask);
		}
        $files = Input::file('file');
        if ($files[0]->isValid()) {
            $destinationPath = "assets/images/uploads/$id/";
            $fileName = rand(11111, 99999) . "_" . $id;
            $files[0]->move($destinationPath, "$fileName.jpeg");
            $path = public_path("assets/images/uploads/$id/$fileName.jpeg");
            Image::make($path)->resize(
                    500, null, function ($constraint) {
                $constraint->aspectRatio();
            }
            )->save($path);
           
            $g_id = $id;
               
            $data = array(
                "property_id" => "",
                "image_name" => "$fileName.jpeg",
                "g_id" => $g_id
            );
            DB::table("supporting_images")->insert($data);
            return 'Upload successfully';
        }
    }

    /**
     * Property Image Delete.
     *
     */
    function imageDelete($id) {
        $image = DB::table("supporting_images")->where('id', $id)->first();

        //unlink("assets/images/uploads/" . $property->user_id . "/" . $image->image_name);
        DB::table("supporting_images")->where('id', $id)->delete();
        return redirect("admin/listing/edit/" . $image->property_id);
    }

    /**
     * Property Add to Featured by Ajax Call.
     *
     */
    public function addToFeatured(Request $request) {
        $id = $request->input("property_id");
        $property = Property::find($id);
        if ($property->featured == 1) {
            $value = 0;
        }

        if ($property->featured == 0) {
            $value = 1;
        }
        Property::where("id", $id)->update(array('featured' => $value));
    }

    /**
     * Property Add to Archive  by Ajax Call.
     *
     */
    public function addToArchive(Request $request) {
        $id = $request->input("property_id");
        $property = Property::find($id);
        if ($property->is_delete == 1) {
            $value = 0;
        }

        if ($property->is_delete == 0) {
            $value = 1;
        }
        Property::where("id", $id)->update(array('is_delete' => $value));
    }
	
	public function featured($id) {
		 $property = Property::find($id);
		 return view('backend.property.featured' , ['property' => $property]);
	}
	
	public function postPayment(Request $request) { 
		// Checking is product valid
		$setting = get_setting();
        $product = $request->input('product');
        $amount = $setting->featured_price * 100;
        $token = $request->input('stripeToken');
        $property_title = $request->input('property_title');
        $property_id = $request->input('property_id');
        $email = Auth::user()->email;
        $name = Auth::user()->name;
        \Stripe\Stripe::setApiKey($setting->stripe_secret);
        // If the email doesn't exist in the database create new customer and user record
          try {
                $customer = \Stripe\Customer::create([
                'source' => $token,
                'email' => $email,
                'metadata' => [
                    "Name" =>  $name
                ]
                ]);
            } catch (\Stripe\Error\Card $e) {
				\Session::flash('flash_message', 'Something Wrong with payment');
                return redirect("properties");
            }
            $customerID = $customer->id;
            
        // Charging the Customer with the selected amount
        try {
            $charge = \Stripe\Charge::create([
                'amount' => $amount,
                'currency' => 'usd',
                'customer' => $customerID,
                'metadata' => [
                    'property' => $property_title
                ]
                ]);
        } catch (\Stripe\Error\Card $e) {
            \Session::flash('flash_message', 'Something Wrong with payment');
                return redirect("properties");
        }
		DB::table("property_payments")->insert(array(
            'agent_id' => Auth::user()->id,
            'property_id' => $property_id,
            'amount' => $amount,
            'stripe_transaction_id' => $charge->id,
        ));

        
		\Session::flash('flash_message', 'Payment Made Successfully and request sent to admin');
                return redirect("admin/properties");
	}

}
