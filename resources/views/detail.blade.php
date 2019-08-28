@extends('frontend.layoutother')

@section('content')
<style type="text/css">
    .section_title{
         background:url("{{ asset('assets/images/background.jpg')}}");
         background-size: cover;       /* For flexibility */
     
         }
  </style>
<?php $setting = get_setting(); ?>
<!-- Section Title -->
            <div class="section_title properties">
                <div class="container">
                    <div class="row"> 
                        <div class="col-md-9">
                            <h1>DETAILS PROPERTY
                                <span><a href="{{url('/')}}"><?php echo trans('frontend.Home'); ?> </a> / {{$property->title}}</span>
                            </h1>
                        </div>     
                    </div>
                </div>            
            </div>
            <!-- End Section Title -->

			

<!-- End content info -->
            <section class="content_info" id="printTable">
                <div class="container">
                    <!-- filter-horizontal -->                  
                    <div class="filter_horizontal" id="hide_area">
                        <div class="container">
                            <div class="row">
                                <form action="{{url('listing')}}" type="get">
                                    <div class="col-md-2">
                                        <select name="category">
                                                    <option value="" selected="selected"><?php echo trans('frontend.Category'); ?></option>
                                                     <option value="" ><?php echo trans('frontend.Any'); ?></option>
													 @foreach($categories as $category)
                                                     <option value="{{$category->id}}">{{$category->name}}</option>
													 @endforeach
                                                                      
                                                 </select>
                                    </div>
                                    <div class="col-md-2">                                   
                                        <select name="min">
                                            <option><?php echo trans('frontend.PriceFrom'); ?></option>                                  
														<option value=""><?php echo trans('frontend.Any'); ?></option>
														<option value="10000">10000</option>
														<option value="50000">50000</option>
														<option value="100000">100000</option>
														<option value="200000">200000</option>
														<option value="300000">300000</option>
														<option value="400000">400000</option>
														<option value="500000">500000</option>    
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <select name="max">
                                           <option value=""><?php echo trans('frontend.PriceTo'); ?></option>
                                           <option value=""><?php echo trans('frontend.Any'); ?></option>
														<option value="10000">10000</option>
														<option value="50000">50000</option>
														<option value="100000">100000</option>
														<option value="200000">200000</option>
														<option value="300000">300000</option>
														<option value="400000">400000</option>
														<option value="500000">500000</option>  
														<option value="500000">1000000</option>  
														<option value="500000">2000000</option>  
                                        </select>
                                    </div>
                                    <div class="col-md-2">                                   
                                                  <select name="bed">
														<option value=""><?php echo trans('frontend.Beds'); ?></option>
														<option value=""><?php echo trans('frontend.Any'); ?></option>
														<?php for($i = 1; $i<= 10 ; $i++) { ?>
														<option <?php if (!empty($forms['bed']) and $forms['bed'] == $i) {echo "selected";}?> value="{{$i}}">{{$i}}</option>
														<?php } ?>
														
                                                  </select>
                                    </div>
                                    <div class="col-md-2">
                                       
                                            <select name="bath">
											 <option value=""><?php echo trans('frontend.Bath'); ?></option>
                                           
                                                        <option value=""><?php echo trans('frontend.Any'); ?></option>
														<?php for($i = 1; $i<= 10; $i++) { ?>
														<option <?php if (!empty($forms['bath']) and $forms['bath'] == $i) {echo "selected";}?> value="{{$i}}">{{$i}}</option>
														<?php } ?>
                                                  </select>
                                       
                                    </div>
                                    <div class="col-md-2">
                                        <input type="submit" class="button" value="<?php echo trans('frontend.Search'); ?>">
                                    </div> 
                                </form>       
                            </div>
                        </div>
                    </div>
                    <!-- End filter-horizontal -->
                    <br>
                    <br>
                    <div class="row padding_top">
                        <div class="col-md-8">
                            <div class="more_slide tooltip_hover">
                                <ul>
                                     <?php /* <li title="Chat Online" data-toggle="tooltip"><i class="fa fa-comment"></i><a href="#">Live chat</a></li>
                                    <li title="Contact Us" data-toggle="tooltip"><i class="fa fa-envelope"></i><a href="#">Contact</a></li>
                                    <li title="favorite propertie" data-toggle="tooltip"><i class="fa fa-star"></i><a href="#">Favorites</a></li>
                                    */?> <li title="Publish info" data-toggle="tooltip"><i class="fa fa-calendar"></i><a href="#">Publish: <?php if(!empty($property->created_at)) { echo time_elapsed_string($property->created_at); } else  { echo "Not Found";  } ?></a></li>
                                </ul>
                            </div>
                            <!-- Slide News-->           
                            <div class="camera_wrap" id="slide_details">
                                <!-- Item Slide -->  
                                <div  data-src="<?php echo url("assets/images/uploads/" . $property->image_name); ?>">
                                    <div class="camera_property fadeFromBottom">
                                        <a href="#"><h4><?php echo $property->title; ?></h4></a>
                                        <h1><span>৳</span> <?php echo $property->price; ?></h1>
										           
                                    </div>
                                </div>
                                <!-- End Item Slide -->  
								@foreach($property_photos as $photo) 
                                <!-- Item Slide -->  
                                <div  data-src="<?php echo url("assets/images/uploads/" . $property->id. "/" . $photo->image_name); ?>">
                                    <div class="camera_property fadeFromBottom">
                                        <a href="#"><h4><?php echo $property->title; ?></h4></a>
                                        <h1><span>৳</span> <?php echo $property->price; ?></h1> 
										
                                    </div>
                                </div>
                                <!-- End Item Slide --> 
								@endforeach
                            </div>
                            <!-- End Slide-->  
                        </div>
                        <div class="col-md-4">
                            <div class="description">
                                
                                <h4><?php echo $property->title; ?></h4>
                                <ul class="info_details">                          
                                    <li><strong>Property For :</strong> <span><button class="btn btn-warning" disabled="disabled"><?php echo $property->type; ?></button></span> </span></li>
                                    <li><strong>Market Value :</strong><span> ৳ <?php echo $property->price; ?> </span></li>
                                    <li><strong>Property Type :</strong><span><?php echo get_catogory($property->category_id); ?></span></li>
                                    <li><strong><?php echo trans('frontend.Location'); ?>:</strong><span><?php echo $property->city; ?></span></li>
                                    <li><strong><?php echo trans('frontend.Area'); ?>:</strong><span><?php echo $property->area; ?> mt2</span></li>
                                    <li><strong><?php echo trans('frontend.Bath'); ?>:</strong><span><?php echo $property->beds; ?></span></li>
                                    <li><strong><?php echo trans('frontend.Beds'); ?>:</strong><span><?php echo $property->bath; ?></span></li>
                                    <li><strong><?php echo trans('frontend.City'); ?>:</strong><span><?php echo $property->city; ?></span></li>
									<li><small><?php echo $property->address; ?></small></li>
                                    
                                </ul>
                            </div>
                        </div> 
                    </div>

                     <!-- Tabs Detail Properties -->
                    <div class="row padding_top">
                        <div class="col-md-12">
                            <!--NAV TABS-->
                            <ul class="tabs"> 
                                <li><a href="#tab1">General Feature</a></li> 
                                <li><a href="#tab3">Description </a></li> 
                                <li><a href="#tab2">Contact Agent</a></li>                                              
                                                                            
                            </ul>                       
                                        
                            <!--CONTAINER TABS-->   
                            <div class="tab_container"> 
                                <!--Tab1 Genral info-->      
                                <div id="tab1" class="tab_content">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h4>General Features</h4>
                                            <div class="row">
											 
											<?php $property_features = explode(",", $property->features); $i=0;
												 foreach ($features as $list) : 
													if($i%4 == 0) { 
												?>
												<div class="col-xs-12 col-sm-4 col-md-4">
                                                    <ul class="general_info">
													<?php } ?>
                                               
															<li><i class="icon-ok"></i>{{$list->name}}</li>
														                  
                                                   <?php if($i%4 == 3) { ?>
												   </ul>
                                                </div>
												   <?php } ?>
													  
												<?php   $i++; endforeach; ?>
												 </ul>
                                                </div>
                                                
                                            </div>
                                        </div>
                                  
                                    </div>    

                                    <!-- Divisor-->
                                    <div class="divisor">
                                        <div class="circle_left"></div>
                                        <div class="circle_right"></div>
                                    </div>
                                    <!-- End Divisor-->

                                    <!-- Map-->      
                                    <div class="row">   
                                      <div class="col-md-12">
                                          <h4><?php echo trans('frontend.Map'); ?></h4>             
                                          <div class="map_area">
                                             <div id="map" style="width: 100%; height: 400px;"></div>
                                          </div>
                                      </div>
                                    </div>
                                    <!--End  Map-->                 
                                </div>
                                <!--End Tab1 Genral info-->      
 <!--Tab2 Contact Agent-->      
 <div id="tab2" class="tab_content">                                                             
    <div class="row">
         <div class="col-md-6">
             <h4>Contact Agent</h4>
             <form id="form" action="#">
                 <div class="row">
                     <div class="col-md-4">
                         <input type="text" placeholder="<?php echo trans('frontend.Name'); ?>" id="name" name="name" required>
                     </div>
                     <div class="col-md-4">
                         <input type="email" placeholder="<?php echo trans('frontend.Email'); ?>" id="email"  name="email" required>
                     </div>
                     
                     <div class="col-md-4">
                         <input type="text" placeholder="<?php echo trans('frontend.Phone'); ?>" id="phone"  name="phone">
                     </div>
                 </div>
                 <textarea placeholder="<?php echo trans('frontend.Message'); ?>" id="message" name="message" required></textarea>
                 <input type="button" id= "SendRequestContact" name="Submit" value="<?php echo trans('frontend.MessageSend'); ?>" class="button">
             </form>  
             <div class="result"></div>
         </div>
         

                <?php
                $contacts = DB::table('properties')->where('id', $property->id)->first();
                $photo = url("assets/images/uploads/" . $property->agent_id . "/profile.jpg");
                if (!@getimagesize($photo)) {
                $photo = url("assets/avatars/profile-pic.jpg");
                }
                ?>

         <div class="col-md-6">                                
              <div class="row item_agent">
                 <div class="col-md-5 image_agent">
                     <img src="<?php echo $photo; ?>" alt="Image">
                 </div>
                 <div class="col-md-6 info_agent">
                     <h5>Name: {{$contacts->person_name}} </h5>
                     <ul>
                     <li><i class="fa fa-envelope"></i>{{ $contacts->person_email}}</li>
                     <li><i class="fa fa-mobile-phone"></i>{{$contacts->person_phone}}</li>
                     <li><i class="fa fa-home"></i>{{$contacts->person_address}}</li>
                     </ul>                                        
                 </div>
              </div>
             
         </div>
    </div>        
 </div>
 <!--End Tab2 Contact Agent-->  
 <!--Tab2 Contact Agent-->      
 <div id="tab3" class="tab_content">                                                             
    <div class="row">
         <div class="col-md-12">
             <h4>Description</h4>
          
                 <div class="row">
          {{$contacts->body}}
                 </div>
         </div>

    </div>        
 </div>
 <!--End Tab2 Contact Agent-->  

                                
                                <!--End Tab3 commnets--> 
                            </div> 
                            <!--END CONTAINER TABS-->
                        </div>
                    </div>
                     <!-- Tabs Detail Properties -->
                     <div class="container">
                            <div class="row">
                                <h1>Admin Reviews </h1>
                                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                                    <div class="offer offer-success">
                                        <div class="shape">
                                            <div class="shape-text">
                                                Verified								
                                            </div>
                                        </div>
                                        <div class="offer-content">
                                            <h3 class="lead">
                                                    <i style="color:#5cb85c" class="fa fa-check" aria-hidden="true"> Vetted</i>
                                           
                                            </h3>						
                                            <p>

                                            </p>
                                        </div>
                                    </div>
                                </div>
                               
                                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                                    <div class="offer offer-success">
                                        <div class="shape">
                                            <div class="shape-text">
                                                Verified								
                                            </div>
                                        </div>
                                        <div class="offer-content">
                                            <h3 class="lead">
                                                    <i style="color:#5cb85c" class="fa fa-check" aria-hidden="true"> Surveyed</i>
                                           
                                            </h3>						
                                            <p>

                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                                    <div class="offer offer-success">
                                        <div class="shape">
                                            <div class="shape-text">
                                                Verified								
                                            </div>
                                        </div>
                                        <div class="offer-content">
                                            <h3 class="lead">
                                                    <i style="color:#5cb85c" class="fa fa-check" aria-hidden="true"> Papers ready</i>
                                           
                                            </h3>						
                                            <p>

                                            </p>
                                        </div>
                                    </div>
                                </div>
                               
                 
           
                      	
                            </div>
                        </div>
                    <!-- Content Carousel Properties -->
                    <div class="content-carousel">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- Title-->
                                <div class="titles">
                                    <h1><?php echo trans('frontend.RelatedProperties'); ?></h1>
                                </div>
                                <!-- End Title-->
                            </div>
                        </div>

                        <!-- Carousel Properties -->
    <div id="properties-carousel" class="properties-carousel">
                            <!-- Item Property-->
							
							 <?php
    if (!empty($property->related)) {
        $property_related = explode(",", $property->related);

        for ($i = 0; $i < count($property_related); $i++) {
            $rel_prop = get_property($property_related[$i]);
			if(!empty($rel_prop)) { 
            ?>
			
	
			
                            <div class="item_property">
                                <div class="head_property">
                                  <a href="<?php echo url("property/" . $rel_prop->id . "/" . clean($rel_prop->title)); ?>">
                                    <div class="title <?php if ($rel_prop->type == "SALE") { ?> sale <?php } else { ?> rent <?php } ?>"></div>
                                    <img src="<?php echo url("/assets/images/uploads/" . $rel_prop->image_name); ?>" alt="Image">
									<h5>{{$rel_prop->title}}</h5>
                                  </a>
                                </div>                        
                                <div class="info_property">                                  
                                    <ul>
                                        <li><strong><?php echo trans('frontend.Place'); ?> </strong><span>{{$rel_prop->city}} , {{$rel_prop->state}}</span></li>
                                        <li><strong><?php echo trans('frontend.Price'); ?></strong><span>৳{{$rel_prop->price}}</span></li>
                                    </ul>                                 
                                </div>
                            </div>
                            <!-- Item Property-->
							
			<?php } } } ?>

                            
                        </div>
                        <!-- End Carousel Properties -->
                    </div>
                    <!-- End Content Carousel Properties -->
                </div>
            </section>
            <!-- End content info-->
			

<script src="http://maps.google.com/maps/api/js?key=AIzaSyBRy4cuNgPMeS5sDUj8rZ8Ql4_BkMMf4TM&language=<?php echo trans('frontend.GoogleMapLanguage'); ?>" 
type="text/javascript"></script>
<script type="text/javascript">
var locations = [
    ['<?php echo $property->title; ?>', <?php echo $property->latitude; ?>, <?php echo $property->longitude; ?>]
];

var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 15,
    center: new google.maps.LatLng(<?php echo $property->latitude; ?>, <?php echo $property->longitude; ?>),
    mapTypeId: google.maps.MapTypeId.ROADMAP
});

var infowindow = new google.maps.InfoWindow();

var marker, i;

for (i = 0; i < locations.length; i++) {
    marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map
    });

    google.maps.event.addListener(marker, 'click', (function (marker, i) {
        return function () {
            infowindow.setContent(locations[i][0]);
            infowindow.open(map, marker);
        }
    })(marker, i));
}
</script>


<script type="text/javascript">

    $("body").on("click", "#SendRequestContact", function () {
		msg = "";
		if($("#name").val() == "") { 
			msg += "Name is Required \n";
		}
		
		if($("#email").val() == "") { 
			msg += "Email is Required \n";
		}
		
		if($("#message").val() == "") { 
			msg += "Message is Required \n";
		}
		
		if(msg) { 
			alert(msg);
			return false;
		}
        var form_data = {
            property_id: <?php echo $property->id; ?>,
            name: $("#name").val(),
            email: $("#email").val(),
            phone: $("#phone").val(),
            message: $("#message").val()
        };
        $.ajax({
            type: 'POST',
			headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '<?php echo url("/send_request"); ?>',
            data: form_data,
            success: function (msg) {
                if (msg != "") {
                    $("#form_close").html("Thank you for Contact With Us. We Will contact back you soon");
                }
            }
        });

    });




</script>


<?php

function clean($string) {
    $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
    return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}
?>

<style>
        .shape{    
	border-style: solid; border-width: 0 70px 40px 0; float:right; height: 0px; width: 0px;
	-ms-transform:rotate(360deg); /* IE 9 */
	-o-transform: rotate(360deg);  /* Opera 10.5 */
	-webkit-transform:rotate(360deg); /* Safari and Chrome */
	transform:rotate(360deg);
}
.offer{
	background:#fff; border:1px solid #ddd; box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2); margin: 15px 0; overflow:hidden;
}
.shape {
	border-color: rgba(255,255,255,0) #d9534f rgba(255,255,255,0) rgba(255,255,255,0);
}
.offer-radius{
	border-radius:7px;
}
.offer-danger {	border-color: #d9534f; }
.offer-danger .shape{
	border-color: transparent #d9534f transparent transparent;
}
.offer-success {	border-color: #5cb85c; }
.offer-success .shape{
	border-color: transparent #5cb85c transparent transparent;
}
.offer-default {	border-color: #999999; }
.offer-default .shape{
	border-color: transparent #999999 transparent transparent;
}
.offer-primary {	border-color: #428bca; }
.offer-primary .shape{
	border-color: transparent #428bca transparent transparent;
}
.offer-info {	border-color: #5bc0de; }
.offer-info .shape{
	border-color: transparent #5bc0de transparent transparent;
}
.offer-warning {	border-color: #f0ad4e; }
.offer-warning .shape{
	border-color: transparent #f0ad4e transparent transparent;
}

.shape-text{
	color:#fff; font-size:12px; font-weight:bold; position:relative; right:-40px; top:2px; white-space: nowrap;
	-ms-transform:rotate(30deg); /* IE 9 */
	-o-transform: rotate(360deg);  /* Opera 10.5 */
	-webkit-transform:rotate(30deg); /* Safari and Chrome */
	transform:rotate(30deg);
}	
.offer-content{
	padding:0 20px 10px;
}
@media (min-width: 487px) {
  .container {
    max-width: 750px;
  }
  .col-sm-6 {
    width: 50%;
  }
}
@media (min-width: 900px) {
  .container {
    max-width: 970px;
  }
  .col-md-4 {
    width: 33.33333333333333%;
  }
}

@media (min-width: 1200px) {
  .container {
    max-width: 1170px;
  }
  .col-lg-3 {
    width: 25%;
  }
  }
}

</style>
@endsection
