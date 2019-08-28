 <header class="search_contact">  
                <!-- Slide -->           
                <div class="map_area">  
					<input id="pac-input" class="controls_map" type="text" placeholder="<?php echo trans('frontend.Search'); ?> <?php echo trans('frontend.Location'); ?>">				
                  <div id="map" style="width: 100%; height: 500px;"></div>
                </div>    
            </header>
            <!-- End Header-->
			
<?php $setting = get_setting(); ?>
<script src="http://maps.google.com/maps/api/js?libraries=places&language=<?php echo trans('frontend.GoogleMapLanguage'); ?>&key=AIzaSyBRy4cuNgPMeS5sDUj8rZ8Ql4_BkMMf4TM" 
type="text/javascript"></script>

<script type="text/javascript">
    var locations = [
<?php foreach ($all_properties as $list): ?>
            ['<?php echo $list->title ?>', <?php echo $list->latitude ?>, <?php echo $list->longitude ?>, '<?php echo url("assets/images/uploads/" . $list->user_id . "/" . $list->image_name); ?>', <?php echo ($list->price/1000); ?>, '<?php echo url("property/" . $list->id . "/" . clean($list->title)); ?>',<?php echo $list->beds; ?>,<?php echo $list->bath; ?>],
<?php endforeach; ?>
        []
    ];

    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 10,
        center: new google.maps.LatLng(<?php echo $setting->latitude; ?>, <?php echo $setting->longitude; ?>),
        mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var input = document.getElementById('pac-input');
    var searchBox = new google.maps.places.SearchBox(input);
    map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
// Bias the SearchBox results towards current map's viewport.
    google.maps.event.addListener(searchBox, 'places_changed', function () {
        searchBox.set('map', null);


        var places = searchBox.getPlaces();

        var bounds = new google.maps.LatLngBounds();
        var i, place;
        for (i = 0; place = places[i]; i++) {
            (function (place) {


                google.maps.event.addListener(marker, 'map_changed', function () {
                    if (!this.getMap()) {
                        this.unbindAll();
                    }
                });
                bounds.extend(place.geometry.location);


            }(place));

        }
        map.fitBounds(bounds);
        searchBox.set('map', map);
        map.setZoom(Math.min(map.getZoom(), 12));

    });


    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    for (i = 0; i < locations.length; i++) {
        marker = new google.maps.Marker({
            position: new google.maps.LatLng(locations[i][1], locations[i][2]),
            icon: '<?php echo url("assets/images/marker.png") ?>',
            map: map
        });

        google.maps.event.addListener(marker, 'click', (function (marker, i) {
            return function () {
                infowindow.setContent('<img  width="70px" class="group list-group-image" src="' + locations[i][3] + '" alt=""><div class="desc-box">' +
                        '<strong ><a href="' + locations[i][5] + '">' + locations[i][0] + '</a></h4>' +
                        '<div class="buttons-wrapper"> <?php echo $setting->currency; ?> ' + locations[i][4]+"K" + ' <small>  </small>' +
                         '</div>' +
						 '<div class="buttons-wrapper"> bd ' + locations[i][6] + ', bt ' + locations[i][7]  +
                         '</div>' 
						 +
                        '<div class="clearfix"></div></div>');
                infowindow.open(map, marker);
            }
        })(marker, i));
    }
</script>
