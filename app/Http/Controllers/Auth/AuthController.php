<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use App\Services\Registrar;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';
    protected $loginPath = '/login';
    protected $redirectAfterLogout = '/login';
     
    protected $maxLoginAttempts = 5; // Amount of bad attempts user can make
    protected $lockoutTime = 100;
      

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make(
            $data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            ]
        );
    }
    
    

    
    public function login(Request $request)
    {
		$setting = get_setting();
		/*if($setting->captcha == 0) { 
			$captcha = $request->input("g-recaptcha-response");
			 $secret = $setting->captcha_secret;
			//get verify response data
			$verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret="'.$secret.'"&response='.$captcha);
			$responseData = json_decode($verifyResponse);
			if(!$responseData->success){
			 return redirect('/login')->withErrors([
			  'error' => 'Robot verification failed, please try again.',
			 ]);
			} 
		}*/
    

        //print_r($request->all());exit;
        $field = filter_var($request->input('email'), FILTER_VALIDATE_INT) ? 'ID_Number' : 'email';
        $request->merge([$field => $request->input('email')]);

        if (Auth::attempt($request->only($field, 'password'))) {
            
            $user = User::find(Auth::user()->id);
            
            if($user->status == 1) { 
                $this->logout();
            }
            //$user->is_online = 1; 
            //$user->last_login = date("Y-m-d h:i:s"); 
            //$user->save();
            
            /*if(!empty($user->google2fa_secret)) {
             Session::put("2faverify" , false);
             return redirect('/twofactor');
            } 
            Session::put("2faverify" , true);*/
            return redirect('admin/dashboard'); 
            
        }
        
        $throttles = $this->isUsingThrottlesLoginsTrait();

        if ($throttles && $this->hasTooManyLoginAttempts($request)) {
            return $this->sendLockoutResponse($request);
        }
       
	   if($setting->attempts == 0) { 
			if ($throttles) {
				 $this->incrementLoginAttempts($request);
			}
	   }
       
        
        return redirect('/login')->withErrors(
            [
            'error' => 'These credentials do not match our records.',
            ]
        );
    } 
    

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return User
     */
    protected function create(array $data)
    {

		$setting = get_setting();
		if($setting->registration == 1) { 
			return redirect("/");
		}
         return User::create(
            [
            'name' => $data['name'],
            'email' => $data['email'],
            'AccessLevel' => $data['type'],
            'password' => bcrypt($data['password']),
            ]
        );
    }
}
