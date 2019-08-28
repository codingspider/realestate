@extends('frontend.layoutother')

@section('content')

<?php $setting = get_setting(); ?>

<!-- Page Heading/Breadcrumbs -->
<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header"><?php echo trans('frontend.Listings'); ?> : {{count($properties)}} <?php echo trans('frontend.Result'); ?></h3>

    </div>
</div>
<!-- /.row -->
<div class="row">

    <div class="col-md-3">
        <form class="form-horizontal" action="{{url('maplisting')}}" method="get">
            <fieldset>

                <!-- Select Basic -->
                <div class="form-group">

                    <div class="col-md-12">
                        <input id="textinput" name="keywords" type="text" value="<?php if (!empty($forms['keywords'])) echo $forms['keywords']; ?>" placeholder=" Address / Keyword / Zip" class="form-control input-md">  
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <select  name="type" class="form-control">
                            <option value=""><?php echo trans('frontend.All'); ?> </option>
                            <option <?php if (!empty($forms['type']) and $forms['type'] == "SALE") {
    echo "selected";
} ?> value="SALE"><?php echo trans('frontend.Sale'); ?></option>
                            <option <?php if (!empty($forms['type']) and $forms['type'] == "RENT") {
    echo "selected";
} ?> value="RENT"><?php echo trans('frontend.Rent'); ?></option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6">
                        <select  name="min" class="form-control">
                            <option value=""><?php echo trans('frontend.PriceFrom'); ?></option>
                            <option <?php if (!empty($forms['min']) and $forms['min'] == "0") {
    echo "selected";
} ?> value="0">0</option>
                            <option <?php if (!empty($forms['min']) and $forms['min'] == "1000") {
    echo "selected";
} ?> value="1000">1000</option>
                            <option <?php if (!empty($forms['min']) and $forms['min'] == "10000") {
    echo "selected";
} ?> value="10000">10000</option>
                            <option <?php if (!empty($forms['min']) and $forms['min'] == "50000") {
    echo "selected";
} ?> value="50000">50000</option>
                            <option <?php if (!empty($forms['min']) and $forms['min'] == "100000") {
    echo "selected";
} ?> value="100000">100000</option>
                            <option <?php if (!empty($forms['min']) and $forms['min'] == "200000") {
    echo "selected";
} ?> value="200000">200000</option>
                            <option <?php if (!empty($forms['min']) and $forms['min'] == "300000") {
    echo "selected";
} ?>value="300000">300000</option>
                            <option <?php if (!empty($forms['min']) and $forms['min'] == "400000") {
    echo "selected";
} ?>value="400000">400000</option>
                            <option <?php if (!empty($forms['min']) and $forms['min'] == "500000") {
    echo "selected";
} ?> value="500000">500000</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <select  name="max" class="form-control">
                            <option value=""><?php echo trans('frontend.PriceTo'); ?></option>
                            <option <?php if (!empty($forms['max']) and $forms['max'] == "1000") {
    echo "selected";
} ?> value="1000">1000</option>
                            <option <?php if (!empty($forms['max']) and $forms['max'] == "10000") {
    echo "selected";
} ?> value="10000">10000</option>
                            <option <?php if (!empty($forms['max']) and $forms['max'] == "50000") {
    echo "selected";
} ?> value="50000">50000</option>
                            <option <?php if (!empty($forms['max']) and $forms['max'] == "100000") {
    echo "selected";
} ?> value="100000">100000</option>
                            <option <?php if (!empty($forms['max']) and $forms['max'] == "200000") {
    echo "selected";
} ?> value="200000">200000</option>
                            <option <?php if (!empty($forms['max']) and $forms['max'] == "300000") {
    echo "selected";
} ?> value="300000">300000</option>
                            <option <?php if (!empty($forms['max']) and $forms['max'] == "400000") {
    echo "selected";
} ?> value="400000">400000</option>
                            <option <?php if (!empty($forms['max']) and $forms['max'] == "500000") {
    echo "selected";
} ?> value="500000">500000</option>
                            <option <?php if (!empty($forms['max']) and $forms['max'] == "1000000") {
    echo "selected";
} ?> value="1000000">1000000</option>
                        </select>
                    </div>

                </div>



                <div class="form-group">
                    <div class="col-md-6">
                        <select  name="bed" class="form-control">
                            <option value=""><?php echo trans('frontend.Beds'); ?></option>
                            <option <?php if (!empty($forms['bed']) and $forms['bed'] == "1") {
    echo "selected";
} ?> value="1">1</option>
                            <option <?php if (!empty($forms['bed']) and $forms['bed'] == "2") {
    echo "selected";
} ?> value="2">2</option>
                            <option <?php if (!empty($forms['bed']) and $forms['bed'] == "3") {
            echo "selected";
        } ?> value="3">3</option>
                            <option <?php if (!empty($forms['bed']) and $forms['bed'] == "4") {
            echo "selected";
        } ?> value="4">4</option>
                            <option <?php if (!empty($forms['bed']) and $forms['bed'] == "5") {
            echo "selected";
        } ?> value="5">5</option>
                            <option <?php if (!empty($forms['bed']) and $forms['bed'] == "6") {
            echo "selected";
        } ?> value="6">6</option>
                            <option <?php if (!empty($forms['bed']) and $forms['bed'] == "7") {
            echo "selected";
        } ?> value="7">7</option>
                            <option <?php if (!empty($forms['bed']) and $forms['bed'] == "8") {
            echo "selected";
        } ?> value="8">8</option>
                            <option <?php if (!empty($forms['bed']) and $forms['bed'] == "9") {
            echo "selected";
        } ?> value="9">9</option>
                            <option <?php if (!empty($forms['bed']) and $forms['bed'] == "10") {
            echo "selected";
        } ?> value="10">10</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <select  name="bath" class="form-control">
                            <option value=""><?php echo trans('frontend.Bath'); ?></option>
                            <option <?php if (!empty($forms['bath']) and $forms['bath'] == "1") {
            echo "selected";
        } ?> value="1">1</option>
                            <option <?php if (!empty($forms['bath']) and $forms['bath'] == "2") {
            echo "selected";
        } ?> value="2">2</option>
                            <option <?php if (!empty($forms['bath']) and $forms['bath'] == "3") {
                echo "selected";
            } ?> value="3">3</option>
                            <option <?php if (!empty($forms['bath']) and $forms['bath'] == "4") {
                echo "selected";
            } ?> value="4">4</option>
                            <option <?php if (!empty($forms['bath']) and $forms['bath'] == "5") {
                echo "selected";
            } ?> value="5">5</option>
                            <option <?php if (!empty($forms['bath']) and $forms['bath'] == "6") {
                echo "selected";
            } ?> value="6">6</option>
                            <option <?php if (!empty($forms['bath']) and $forms['bath'] == "7") {
                echo "selected";
            } ?> value="7">7</option>
                            <option <?php if (!empty($forms['bath']) and $forms['bath'] == "8") {
                echo "selected";
            } ?> value="8">8</option>
                            <option <?php if (!empty($forms['bath']) and $forms['bath'] == "9") {
                echo "selected";
            } ?> value="9">9</option>
                            <option <?php if (!empty($forms['bath']) and $forms['bath'] == "10") {
                echo "selected";
            } ?> value="10">10</option>
                        </select>
                    </div>

                </div>



                <div class="form-group">
                    <div class="col-md-4">
                        <button id="singlebutton" name="singlebutton" class="btn btn-primary"><?php echo trans('frontend.Search'); ?></button>
                    </div>
                </div>

            </fieldset>
        </form>



        <h4> <?php echo trans('frontend.FeaturedAgents'); ?> </h4>
<?php
foreach ($agents as $agent) {
    $photo = url("assets/images/uploads/" . $agent->id . "/profile.jpg");
    if (!@getimagesize($photo)) {
        $photo = url("assets/avatars/profile-pic.jpg");
    }
    ?>
            <div class="agent">
                <div class="agentimage"><img alt="" class="img-responsive" src="{{$photo}}"></div>
                <div class="name"><a href="<?php echo url("agent/properties/" . $agent->id . "/" . clean($agent->name)); ?>"><?php echo $agent->name; ?></a></div>
                <div class="phone"><?php echo $agent->phone; ?></div>
                <div class="mail"><a href="mailto:<?php echo $agent->email; ?>?subject=Estate inquery for"><?php echo $agent->email; ?></a></div>
            </div>

<?php } ?>




    </div>



    <div class="col-md-9">

        <div class="row">
            <div class="col-md-12">
                <input id="pac-input" class="controls_map" type="text" placeholder="Search Box">
                <div id="map" style="width: 100%; height: 350px;"></div>

            </div>
        </div>

        <hr>


        <div class="row">
<?php foreach ($properties as $list): $category = get_catogory($list->category_id); ?>
                <div class="col-md-4">
                    <span class="search-promotion label label-lg label-default mostWanted">{{$category}}</span> 
                    <a href="<?php echo url("property/" . $list->id . "/" . clean($list->title)); ?>">
                        <img alt="" class="img-responsive img-hover" src="<?php echo url("/assets/images/uploads/" . $list->user_id . "/" . $list->image_name); ?>" alt="">
    <?php if ($list->featured == 1) { ?>
                            <div class="featured-tag"><?php echo trans('frontend.Featured'); ?></div>
    <?php } ?>
                    </a>
                </div>
                <div class="col-md-8">

                    <div class="info_property_h">
                        <h4><a href="<?php echo url("property/" . $list->id . "/" . clean($list->title)); ?>"><?php echo $list->title; ?></a><span> <?php if ($list->type == "SALE") { ?> <?php echo trans('frontend.Sale'); ?> <?php } else { ?> <?php echo trans('frontend.Rent'); ?> <?php } ?></span></h4> 
                        <p>{{ str_limit($list->body,200) }}</p>
                    </div>

                    <div class="details_info">
                        <span class="detail_cell first_detail_cell"><i class="fa fa-arrows" ></i> <?php echo $list->size; ?> ft²</span>
                        <span class="detail_cell "> <i class="fa fa-calendar" ></i> <?php echo $list->year; ?></span>
                        <span class="detail_cell "><i class="fa fa-umbrella" ></i> <?php echo $list->beds; ?> <?php echo trans('frontend.Beds'); ?></span>
                        <span class="detail_cell last_detail_cell"><i class="fa fa-wheelchair" ></i> <?php echo $list->bath; ?> <?php echo trans('frontend.Bath'); ?></span>
                    </div>





                </div>
                <div class="clearfix"> </div>
                <hr>
<?php endforeach; ?>
        </div>
        {!! $properties->render() !!}

    </div>


</div>
<?php

function clean($string) {
    $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

    return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}
?>



<hr>








<script src="http://maps.google.com/maps/api/js?sensor=false&libraries=places&key=AIzaSyBRy4cuNgPMeS5sDUj8rZ8Ql4_BkMMf4TM" 
type="text/javascript"></script>

<script type="text/javascript">
var locations = [
<?php foreach ($all_properties as $list): ?>
        ['<?php echo $list->title ?>', <?php echo $list->latitude ?>, <?php echo $list->longitude ?>, '<?php echo url("assets/images/uploads/" . $list->user_id . "/" . $list->image_name); ?>', <?php echo $list->price; ?>, '<?php echo url("property/" . $list->id . "/" . clean($list->title)); ?>'],
<?php endforeach; ?>
    []
];

var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 11,
    center: new google.maps.LatLng(40.72125679715216, -73.79370109543447),
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
            infowindow.setContent('<img width="200px" class="group list-group-image" src="' + locations[i][3] + '" alt=""><div class="desc-box">' +
                    '<h4><a href="' + locations[i][5] + '">' + locations[i][0] + '</a></h4>' +
                    '<div class="buttons-wrapper"><?php echo $setting->currency; ?>' + locations[i][4] + ' <small>  </small>' +
                    '</div>' +
                    '<div class="clearfix"></div></div>');
            infowindow.open(map, marker);
        }
    })(marker, i));
}
</script>

@endsection
