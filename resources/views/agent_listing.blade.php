@extends('frontend.layoutother')

@section('content')
<?php $setting = get_setting(); ?>
 <div class="section_title about">
                <div class="container">
                    <div class="row"> 
                        <div class="col-md-8">
                            <h1>
                                <span> <a href="<?php echo url(""); ?>"><?php echo trans('frontend.Home'); ?></a> / <?php echo trans('frontend.Agents'); ?></span>
                            </h1>
                        </div>     
                    </div>
                </div>            
            </div>

  <!-- End content info -->
            <section class="content_info">
                <div class="container">
                  <!-- Newsletter Box -->                  
                 @include('newslatter')
                  <!-- End Newsletter Box -->

                  <div class="row padding_top">
                      <!-- property List-->
                      <div class="col-md-12 properties_two">
						 <div class="titles">
                                 <h1>{{$agent->name}} - <?php echo trans('frontend.Listing'); ?></h1>
                            </div>
                            
                          <!-- Bar Filter properties-->
                          <div class="bar_properties">
                              <div class="row">
                                  <div class="col-md-8">
                                      <strong>Order By:</strong>
                                      <ul class="tooltip_hover">                            
										  <li>
                                            <a href="?type=All"> All | </a>
                                            <a href="?type=SALE" data-toggle="tooltip" title data-original-title="FOR SALE"> Sale | </a>
                                            <a href="?type=RENT" data-toggle="tooltip" title data-original-title="FOR RENT"> Rent </a>
                                          </li> 
										  
                                          <li>
                                            <a href="#">Price</a>
                                            <a href="?order=priceh" data-toggle="tooltip" title data-original-title="Sort Ascending"> <i class="fa fa-caret-up"> | </i></a>
                                            <a href="?order=pricel" data-toggle="tooltip" title data-original-title="Sort Ascending"> <i class="fa fa-caret-down"></i></a>
                                          </li>  

										  
                                      </ul>
                                  </div>
                                  <div class="col-md-4">
                                      <ul class="text_right tooltip_hover">
                                          <li class="active" data-toggle="tooltip" title data-original-title="Box"><a href="{{url('listing')}}"><i class="fa fa-th-large"></i></a></li>
                                          
                                      </ul>
                                  </div>
                              </div>
                          </div>
                          <!-- End Bar Filter properties-->

                          <!-- Row Propertys-->                   
                          <div class="row">
						  <?php foreach ($properties as $list): $category = get_catogory($list->category_id); ?>
                              <!-- Item Property-->
                              <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                  <div class="item_property">
                                      <div class="head_property">
                                        <a href="<?php echo url("property/" . $list->id . "/" . clean($list->title)); ?>">
                                         <div class="title <?php if ($list->type == "SALE") { ?> sale <?php } else { ?> rent <?php } ?>"></div>
                                          <img src="<?php echo url("/assets/images/uploads/" .  $list->image_name); ?>" alt="Image">
                                          <h5>{{$list->title}}</h5>
                                        </a>
                                      </div>                        
                                      <div class="info_property">                                    
                                          <ul>
											<li><strong><i class="fa fa-map-marker"></i> <?php echo trans('frontend.Place'); ?> </strong><span>{{$list->city}}</span></li>
											<li><strong><i class="fa fa-umbrella"></i> <?php echo trans('frontend.Beds'); ?> </strong> <span><?php echo $list->beds; ?></span></li>
											<li><strong><i class="fa fa-wheelchair"></i> <?php echo trans('frontend.Bath'); ?>  </strong><span><?php echo $list->bath; ?></span></li>
											<li><strong><i class="fa fa-arrows"></i> <?php echo trans('frontend.Area'); ?> </strong><span><?php echo $list->size; ?> ft²</span></li>
										    <li><strong><i class="fa fa-dollar"></i> Price</strong><span><?php echo $setting->currency; ?>{{number_format($list->price)}} </span></li>
											
                                          </ul>                                    
                                      </div>
                                  </div>
                              </div>
                              <!-- Item Property-->
							  <?php endforeach; ?>

                             

                                                
                          </div> 
                          <!-- Row Propertys-->

                          <!-- Pagination -->
                          <ul class="paginations">
                             {!! $properties->render() !!}
                          </ul>
                          <!-- End Pagination -->                
                      </div>                       
                      <!-- End property List-->

                      
                      <!-- End Aside -->
                  </div>
                </div>
            </section>
            <!-- End content info-->
			
			
<?php

function clean($string) {
    $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

    return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}
?>

@endsection
