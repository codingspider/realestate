@extends('frontend.layoutother')

@section('content')
<?php $setting = get_setting(); ?>
<div class="section_title about">
                <div class="container">
                    <div class="row"> 
                        <div class="col-md-8">
                            <h1><?php echo trans('frontend.Contact'); ?>
                                <span<a href="<?php echo url(""); ?>"><?php echo trans('frontend.Home'); ?></a> / <?php echo trans('frontend.Contact'); ?></span>
                            </h1>
                        </div>     
                    </div>
                </div>            
            </div>
  <section class="content_info">
                <div class="container">
                    <!-- Newsletter Box -->                  
                        @include('newslatter')
                    <!-- End Newsletter Box -->
                    
                    <!-- Contact-->
                    <div class="row padding_top">
					<div class="col-md-8">
        <div id="map" style="width: 100%; height: 300px;"></div>
        <script src="http://maps.google.com/maps/api/js?sensor=false&language=<?php echo trans('frontend.GoogleMapLanguage'); ?>&key=AIzaSyBRy4cuNgPMeS5sDUj8rZ8Ql4_BkMMf4TM" 
        type="text/javascript"></script>

        <script type="text/javascript">
            var locations = [
                ['<?php echo $setting->title; ?>', <?php echo $setting->latitude; ?>, <?php echo $setting->longitude; ?>]
            ];

            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 15,
                center: new google.maps.LatLng(<?php echo $setting->latitude; ?>, <?php echo $setting->longitude; ?>),
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
    </div>
	
                        <div class="col-md-4">
                            <h2><?php echo trans('frontend.Contact'); ?></h2>
                            <form id="form" action="">
                                <input type="text" id="name" placeholder="<?php echo trans('frontend.Name'); ?> *" name="Name" required>
                                <input type="email" id="email" placeholder="<?php echo trans('frontend.Email'); ?> *"  name="Email" required>
                                <input type="number" id="phone" placeholder="<?php echo trans('frontend.Phone'); ?>"  name="Phone" required>
                                <textarea placeholder="<?php echo trans('frontend.Message'); ?> *" id="message" name="message" required></textarea>
                                <input type="button" id="SendRequest" name="Submit" value="Send Message" class="button">
                            </form> 
                            <div id="result"></div> 
                        </div>
                        <div class="col-md-12">
                            <h2>INFO</h2>
                          
                            <!-- Divisor-->
                            <div class="divisor divisor_services margin_top">
                                <div class="circle_left"></div>
                                <div class="circle_right"></div>
                            </div>
                            <!-- End Divisor-->
							
							<?php 
							$photo = url("assets/images/profile/1.jpg");
							if (!@getimagesize($photo)) {
								$photo = url("assets/avatars/profile-pic.jpg");
							}
						?>

                            <div class="row margin_top">
                                <div class="col-sm-6 col-md-4">
                                    <div class="item_agent">
                                        <div class="col-md-4 image_agent">
                                            <img src="{{$photo}}" alt="Image">
                                        </div>
                                        <div class="col-md-8 info_agent">                                
                                            <ul>
                                                <li><i class="icon-envelope"></i><a href="#">{{$setting->email}}</a></li>
                                                <li><i class="icon-phone"></i><a href="#">{{$setting->phone_no}}</a></li>
                                            </ul>                                        
                                        </div>
                                    </div>
                                </div>  
                            </div>
                        </div>
                    </div>
                    <!-- End Contact-->
                </div>
            </section>
            
<script type="text/javascript">

    $("body").on("click", "#SendRequest", function () {

        var form_data = {
            name: $("#name").val(),
            email: $("#email").val(),
            phone: $("#phone").val(),
            message: $("#message").val()
        };
		
		if($("#name").val() == "" || $("#email").val() == "" || $("#message").val() == "") { 
			$("#dmsg").html("Required all fields");
			return false;
		}
	
        $.ajax({
            type: 'POST',
			headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '<?php echo url("/send_request"); ?>',
            data: form_data,
            success: function (msg) {
                if (msg != "") {
                    $("#form_close").html("<?php echo trans('frontend.ContactThankYou'); ?>");
                }
            }
        });

    });
</script>


@endsection
