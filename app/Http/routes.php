<?php


if(version_compare(PHP_VERSION, '7.2.0', '>=')) {
    error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
}


header('Access-Control-Allow-Origin:  *');
header('Access-Control-Allow-Methods:  POST, GET, OPTIONS, PUT, DELETE , ANY');
header('Access-Control-Allow-Headers:  Content-Type, X-Auth-Token, Origin, Authorization , accept');
header('Access-Control-Allow-Credentials: true');

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');
Route::get('/map-home', 'HomeController@map');
Route::get('/all-agent', 'HomeController@agents');
Route::get('/listing', 'HomeController@listing');
Route::get('/list-view', 'HomeController@list_properties');
Route::get('agent/properties/{id}/{name}', 'AgentsController@listing');
Route::get('/maplisting', 'HomeController@mapListing');
Route::get('/property/{id}/{name}', 'HomeController@detail');

Route::post('/send_request', 'HomeController@send_request');

Route::get('/contact-us', 'HomeController@contact');
Route::get('/about-us', 'HomeController@about');
Route::get('/gallery', 'HomeController@gallery');
Route::get('/loan-calculator', 'HomeController@calculator');
Route::get('localization/{locale}', 'LocalizationController@index');

Route::post('registration/process', 'RegistrationController@store');

Route::get('registration/page', 'RegistrationController@create');



/// Social Login 
Route::get('/redirect', 'SocialAuthController@redirect');
Route::get('/callback', 'SocialAuthController@callback');

Route::auth();

Route::group(['middlewareGroups' => 'web'], function () {


		Route::get('/admin', 'DashboardController@index');
      
      
        Route::get('/verify_email', 'AgentsController@verifyEmail');
        Route::get('register/verify/{confirmationCode}', 'AgentsController@confirm');
        Route::post('agents/update_profile', 'AgentsController@updateProfile');
        Route::post('agents/password_reset/', 'AgentsController@passwordReset');
		
        Route::post('/postPayment', 'PropertyController@postPayment');
        Route::get('/listing/featured/{id}', 'PropertyController@featured');

        
        Route::get('/payments', 'PaymentController@index');
        Route::post('/paypalCallback', 'PaymentController@paypalCallback');
		
       
        Route::post('/newsletter_subscription', 'HomeController@newsletter_subscription');
		
		
		///
		
			Route::get('/menus', 'MenuController@index');
		Route::group(['prefix' => 'admin'], function () {
			Route::get('all-newsletter', 'NewsletterController@index');
			 Route::post('/property/fileupload', 'PropertyController@fileUpload');
       
			Route::get('/dashboard', 'DashboardController@index');
			Route::get('/customer-requests', 'DashboardController@customerRequets');
			Route::get('/profile', 'HomeController@profile');
		   

			Route::get('/agents', 'AgentsController@index');
			Route::post('/agents/save', 'AgentsController@save');
			Route::post('/agents/get', 'AgentsController@get');
			Route::post('/agents/delete', 'AgentsController@delete');
			

			Route::get('/properties', 'PropertyController@index');
							
			Route::get('/property/add', 'PropertyController@form');
			Route::get('/listing/delete/{id}', 'PropertyController@delete');
			Route::get('/listing/edit/{id}', 'PropertyController@edit');
			Route::get('/listing/image_delete/{id}', 'PropertyController@imageDelete');
			Route::post('/property/save', 'PropertyController@save');
			Route::post('property/addTofeatured', 'PropertyController@addToFeatured');
			Route::post('property/addToArchive', 'PropertyController@addToArchive');

			Route::get('/settings', 'SettingController@index');
			Route::post('/setting/save', 'SettingController@save');
			
			

			Route::get('/features', 'FeatureController@index');
			Route::post('/feature/save', 'FeatureController@save');
			Route::post('/feature/get', 'FeatureController@get');
			Route::post('/feature/delete', 'FeatureController@delete');

			Route::get('/gallery/upload', 'GalleryController@index');
			Route::post('/gallery/fileupload', 'GalleryController@fileUpload');
			Route::post('/gallery/removefile', 'GalleryController@removefile');
			
			/// Pages Controller 
			
			Route::get('/pages', 'PageController@index');
			Route::post('/pages/save', 'PageController@save');
			Route::get('/pages/add', 'PageController@add');
			Route::get('/pages/delete/{id}', 'PageController@delete');
			Route::get('/pages/edit/{id}', 'PageController@edit');

			/// Categories 

			Route::get('/categories', 'CategoryController@index');
			Route::post('/category/save', 'CategoryController@save');
			Route::post('/category/get', 'CategoryController@get');
			Route::post('/category/delete', 'CategoryController@delete');


			//// Slider 
			Route::get("/sliders" , 'SliderController@index');
			Route::post("slider/save" , 'SliderController@save');
			Route::post("slider/get" , 'SliderController@get');
			Route::post("slider/delete" , 'SliderController@delete');
			
			//// Testimonial 
			Route::get("/testimonials" , 'TestimonialController@index');
			Route::post("testimonial/save" , 'TestimonialController@save');
			Route::post("testimonial/get" , 'TestimonialController@get');
			Route::post("testimonial/delete" , 'TestimonialController@delete');
		
		});
    }
);

Route::group( ['prefix' => 'api/v1'], function () {
        Route::get('properties', 'ApiController@index');    
        Route::get('agents', 'ApiController@agents');    
        Route::get('detail/{id}', 'ApiController@detail');    
   
    });
