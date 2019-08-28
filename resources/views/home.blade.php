@extends('frontend.app')

@section('content')

<?php $setting = get_setting(); ?>
   <!-- Content Carousel Properties -->
                    <div class="content-carousel">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- Divisor-->
                                <div class="divisor">
                                    <div class="circle_left"></div>
                                    <div class="circle_right"></div>
                                </div>
                                <!-- End Divisor-->

                                <!-- Title-->
                                <div class="titles">
                                    <h1><?php echo trans('frontend.FeaturedProperties'); ?></h1>
                                </div>
                                <!-- End Title-->
                            </div>
                        </div>

                        <!-- Carousel Properties -->
                        <div id="properties-carousel" class="properties-carousel">
						 <?php foreach ($properties as $list): $category = get_catogory($list->category_id); ?>
                            <!-- Item Property-->
                            <div class="item_property">
							    <div class="head_property">
                                  <a href="<?php echo url("property/" . $list->id . "/" . clean($list->title)); ?>">
                                    <div class="title <?php if ($list->type == "SALE") { ?> sale <?php } else { ?> rent <?php } ?>"></div>
                                    <img src="<?php echo url("/assets/images/uploads/" . $list->user_id . "/" . $list->image_name); ?>" alt="Image">
									
                                    <h5 style="color:#fff">{{$list->title}}</h5>
                                  </a>
                                </div>                        
                                <div class="info_property">                                  
                                    <ul>
                                        <li><strong><i class="fa fa-map-marker"></i> <?php echo trans('frontend.Place'); ?> </strong><span>{{$list->city}}</span></li>
                                        <li><strong><i class="fa fa-dollar"></i> <?php echo trans('frontend.Price'); ?></strong><span>৳ {{number_format($list->price)}} </span></li>
										<li><strong><i class="fa fa-umbrella"></i> <?php echo trans('frontend.Beds'); ?> </strong> <span><?php echo $list->beds; ?></span></li>
										<li><strong><i class="fa fa-wheelchair"></i> <?php echo trans('frontend.Bath'); ?>  </strong><span><?php echo $list->bath; ?></span></li>
										<li><strong><i class="fa fa-arrows"></i> <?php echo trans('frontend.Area'); ?> </strong><span><?php echo $list->size; ?> ft²</span></li>
										
                                    </ul>                                 
                                </div>
                            </div>
                            <!-- Item Property-->
							<?php endforeach; ?>
                        </div>
                        <!-- End Carousel Properties -->
                    </div>
                    
					 <section id="web-application">
                        <h2 class="page-header">Browse by Location</h2>

                        <div class="row fontawesome-icon-list">
						@foreach($all_cities as $city) 
                          <div class="fa-hover col-md-3 col-sm-4 btn-success"><a href="{{url('listing?keywords=' . $city->city )}}">  {{$city->city}}</a></div>
                         @endforeach
                        
                        </div>

                      </section>
					  
					  
					  
					  
					  
				<?php

function clean($string) {
    $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

    return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}
?>	




<!-- Page Heading/Breadcrumbs -->
<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header"> <?php echo trans('frontend.Realesates'); ?> : <button class="btn btn-info" disabled="disabled">{{count($properties)}}</button></h3>

    </div>
</div>


<div class="row">

    <div class="col-md-9">
        <div class="row list-group">
            <?php foreach ($properties as $list): $category = get_catogory($list->category_id); ?>
                <div class="item  col-xs-12 col-lg-4 ">
                    <span class="search-promotion label label-lg label-default mostWanted btn-success">{{$category}}</span> 
                    <div class="thumbnail">
                        <img class="group list-group-image" src="<?php echo url("/assets/images/uploads/" . $list->user_id . "/" . $list->image_name); ?>" alt="" />
                        <?php if ($list->featured == 1) { ?>
                            <div class="featured-tag"><?php echo trans('frontend.Featured'); ?></div>
                        <?php } ?>
                        <div class="caption">


                            <div class="desc-box">
                                <h4 class="head_title"><a href="<?php echo url("property/" . $list->id . "/" . clean($list->title)); ?>"><?php echo $list->title; ?></a></h4>
                                <h4> 
                                    ৳ {{number_format($list->price)}} <small> <?php if ($list->type == "SALE") { ?> <?php echo trans('frontend.Sale'); ?>  <?php } else {
                                        ?> <?php echo trans('frontend.Rent'); ?> <?php }
                                    ?> </small> </h4>
                        


                                <div class="clearfix">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        {!! $properties->render() !!}
    </div>

    <div class="col-md-3">



        <h4> <?php echo trans('frontend.FeaturedProperties'); ?> </h4>
<?php foreach ($featured_properties as $list) { ?>
            <div class="agent">
                <div class="agentimage"><img class="img-responsive" src="<?php echo url("/assets/images/uploads/" . $list->user_id . "/" . $list->image_name); ?>" alt="{{$list->title}}"></div>
                <div class="name"><a href="<?php echo url("property/" . $list->id . "/" . clean($list->title)); ?>">{{$list->title}}</a></div>
                <div class="phone">
                        ৳ {{number_format($list->price)}} </div>

            </div>
<?php } ?>




    </div>
</div>

<hr>


@endsection
