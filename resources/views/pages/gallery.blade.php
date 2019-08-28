@extends('frontend.layoutother')

@section('content')

<link href="<?php echo url("assets/css/multi-select.css"); ?>" type="text/css" rel="stylesheet" />
<link href="<?php echo url("assets/css/jquery.filer.css"); ?>" type="text/css" rel="stylesheet" />
<link href="<?php echo url("assets/css/themes/jquery.filer-dragdropbox-theme.css"); ?>" type="text/css" rel="stylesheet" />
<script src="<?php echo url("assets/js/jquery.filer.min.js"); ?>"></script>

<script src="<?php echo url("assets/js/upload1.js"); ?>"></script>
<script src="<?php echo url("assets/js/jquery.multi-select.js"); ?>"></script>


<div class="breadcrumbs ace-save-state" id="breadcrumbs">
    <ul class="breadcrumb">
        <li>
            <i class="ace-icon fa fa-home home-icon"></i>
            <a href="dashboard">Home</a>
        </li>



        <li class="active"><?php echo $title; ?></li>
    </ul><!-- /.breadcrumb -->


</div>


<div class="page-header">
    <h1><?php echo $title; ?> </h1>
</div>



<div class="panel-body">
    <div class="row">
        <div class="col-lg-12">
            <form role="form" method="POST" action="<?php echo url("admin/property/save"); ?>" enctype="multipart/form-data">

                {!! csrf_field() !!} 
                <div class="col-md-6 col-sm-6">
                    <div class="form-group">
                        <label>Title</label>
                        <input placeholder="Property Title" type="text" required name="title" class="form-control">
                    </div>
                </div>

                <div class="col-md-3 col-sm-3">
                    <div class="form-group">
                        <label>Category</label>
                        <select name="category_id" class="form-control">
                            <option value=""> Select Category</option>
                            <?php foreach ($categories as $list) { ?>
                                <option value="<?php echo $list->id; ?>"> <?php echo $list->name; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="col-md-3 col-sm-3">
                    <div class="form-group">
                        <label>Agent</label>
                        <?php if (Auth::user()->AccessLevel == 0) { ?>
                            <select  name="agent_id" class="form-control">
                                <option value=""> Select Agent</option>
                                <?php foreach ($agents as $list) { ?>
                                    <option value="<?php echo $list->id; ?>"> <?php echo $list->name; ?></option>
                                <?php } ?>
                            </select>
                        <?php } else { ?>
                            <input   type="hidden"  name="agent_id" value="{{$agents->id}}" class="form-control">
                            <input   type="text" disabled value="{{$agents->name}}" name="" class="form-control">
                        <?php } ?>
                    </div>
                </div>



                <div class="col-md-6 col-sm-9">
                    <div class="form-group">
                        <label>Address</label>
                        <input placeholder="Address" id="address" type="text" required name="address" class="form-control">
                    </div>
                </div>

                <div class="col-md-3 col-sm-3">
                    <div class="form-group">
                        <label>City</label>
                        <input placeholder="City" id="city" type="text"  name="city" class="form-control">
                    </div>
                </div>

                <div class="col-md-3 col-sm-3">
                    <div class="form-group">
                        <label>State</label>
                        <input placeholder="State" id="state" type="text"  name="state" class="form-control">
                    </div>
                </div>

                <div class="col-md-3 col-sm-3">
                    <div class="form-group">
                        <label>Zip</label>
                        <input placeholder="Zip"  id="zip" type="text" required name="zip" class="form-control">
                    </div>
                </div>


                <div class="col-md-3 col-sm-3">
                    <div class="form-group">
                        <label>Longitude </label>
                        <input placeholder="Longitude" id="longitude" type="text" required name="longitude" class="form-control">
                    </div>
                </div>

                <div class="col-md-3 col-sm-3">
                    <div class="form-group">
                        <label>Latitude </label>
                        <input placeholder="Latitude" id="latitude" type="text" required name="latitude" class="form-control">
                    </div>
                </div>
                
                <div class="col-md-3 col-sm-3">
                    <div class="form-group">
                        <label>Property Type</label>
                        <select name="type" class="form-control"> 
                            <option value="SALE"> For Sale </option>
                            <option value="RENT"> For Rent </option>
                        </select>
                    </div>
                </div>
                
                <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                        <input id="pac-input" class="controls_map" type="text" placeholder="Search Box">
                        <div id="myMap"></div>
                    </div>
                </div>


                <div class="col-md-3 col-sm-3">
                    <div class="form-group">
                        <label>Price</label>
                        <input type="number" placeholder="175,000" required  name="price" class="form-control">
                    </div>
                </div>

                <div class="col-md-2 col-sm-3">
                    <div class="form-group">
                        <label>Bedrooms</label>
                        <input type="number" placeholder="3"  name="bedrooms" class="form-control">
                    </div>
                </div>

                <div class="col-md-2 col-sm-3">
                    <div class="form-group">
                        <label>Bathrooms</label>
                        <input type="number" placeholder="3"  name="bathrooms" class="form-control">
                    </div>
                </div>

                <div class="col-md-2 col-sm-3">
                    <div class="form-group">
                        <label>Size (sqfoot)</label>
                        <input type="number" placeholder="3"  name="size" class="form-control">
                    </div>
                </div>

                <div class="col-md-3 col-sm-3">
                    <div class="form-group">
                        <label>Build Year</label>
                        <input type="number" placeholder="2005"  name="year" class="form-control">
                    </div>
                </div>


                <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" class="form-control" rows="5"> </textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12"> <h3> Other Features </h3>  </div>
                </div>

                <div class="form-group">
                    <?php foreach ($features as $row) { ?>
                        <div class="col-md-3">
                            <input type="checkbox" value="{{$row->id}}" name="features[]">  {{$row->name}}                       
                        </div>
                    <?php } ?>

                </div>

                <div class="form-group">
                    <div class="col-sm-12"> <h3> Images </h3>  </div>
                </div>

                <div class="col-sm-12">

                    <div class="form-group">
                        <label>Main Image</label>
                        <div class="row">
                            <div class="col-sm-12">
                                <input type="file" name="mainfile" accept=".png, .jpg, .jpeg"  >
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12">

                    <div class="form-group">
                        <label>Additional Supporting Images</label>
                        <div class="row">
                            <div class="col-sm-12">
                                <input type="file" name="file[]" accept=".png, .jpg, .jpeg"  id="filer_input2" multiple="multiple">
                            </div>
                        </div>
                    </div>
                </div>



                <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                        <input type="submit" value="Save" class="btn btn-primary pull-right">
                    </div>
                </div>



            </form>
        </div>

    </div>
    <!-- /.row (nested) -->
</div>
<!-- /.panel-body -->
 @include('backend.layouts.footer')
<style>
    #myMap {
        height: 250px;
        width: 1050px;
    }
</style>
<script src="//maps.googleapis.com/maps/api/js?sensor=false&libraries=places&key=AIzaSyBRy4cuNgPMeS5sDUj8rZ8Ql4_BkMMf4TM"></script>
<?php $setting = get_setting(); ?>
<script type="text/javascript">

$('#pre-selected-options').multiSelect();

var map;
var marker;
var myLatlng = new google.maps.LatLng(<?php echo $setting->latitude; ?>, <?php echo $setting->longitude; ?>);
var geocoder = new google.maps.Geocoder();
var infowindow = new google.maps.InfoWindow();
function initialize() {
    var mapOptions = {
        zoom: 12,
        center: myLatlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };

    map = new google.maps.Map(document.getElementById("myMap"), mapOptions);

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

                marker.setPosition(place.geometry.location);
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


    marker = new google.maps.Marker({
        map: map,
        position: myLatlng,
        draggable: true
    });

    geocoder.geocode({'latLng': myLatlng}, function (results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
            if (results[0]) {
                $('#latitude,#longitude').show();
                
               // $('#zip').val(results[0].address_components[7].long_name);
              
                //$('#city').val(results[0].address_components[3].long_name);
                //$('#state').val(results[0].address_components[5].long_name);
                $('#address').val(results[0].formatted_address);
                $('#latitude').val(marker.getPosition().lat());
                $('#longitude').val(marker.getPosition().lng());
                infowindow.setContent(results[0].formatted_address);
                infowindow.open(map, marker);
            }
        }
    });

    google.maps.event.addListener(marker, 'dragend', function () {

        geocoder.geocode({'latLng': marker.getPosition()}, function (results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                if (results[0]) {
                    console.log(results[0].address_components);
                    //if (results[0].address_components[7].long_name != "") {
                      //  $('#zip').val(results[0].address_components[7].long_name);
                    //}
                    //$('#city').val(results[0].address_components[3].long_name);
                    //$('#state').val(results[0].address_components[5].long_name);
                    $('#address').val(results[0].formatted_address);
                    $('#latitude').val(marker.getPosition().lat());
                    $('#longitude').val(marker.getPosition().lng());
                    infowindow.setContent(results[0].formatted_address);
                    infowindow.open(map, marker);
                }
            }
        });
    });

}
google.maps.event.addDomListener(window, 'load', initialize);

</script>



@endsection
