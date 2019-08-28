@extends('frontend.layoutmap')

@section('content')

<?php $setting = get_setting(); ?>


<div class="content_info">
                <div class="container">
                    <!-- filter-horizontal -->                  
                    <div class="filter_horizontal">
                        <div class="container">
                            <div class="row">
                                <form action="{{url('listing')}}">
                                    <div class="col-md-2">
                                        <select name="category">
                                                    <option selected="selected" value="">-- <?php echo trans('frontend.Category'); ?> --</option>
                                                     <option value=""><?php echo trans('frontend.Any'); ?></option>
													 @foreach($categories as $category)
                                                     <option value="{{$category->id}}">{{$category->name}}</option>
													 @endforeach
                                                                      
                                                 </select>
                                    </div>
                                    <div class="col-md-2">                                     
                                                  <select name="min">
                                                        <option value=""><?php echo trans('frontend.PriceFrom'); ?></option>
														<option value="1000">1000</option>
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
                                                  <select name="min">
                                                        <option value=""><?php echo trans('frontend.PriceTo'); ?></option>
														<option value="10000">10000</option>
														<option value="50000">50000</option>
														<option value="100000">100000</option>
														<option value="200000">200000</option>
														<option value="300000">300000</option>
														<option value="400000">400000</option>
														<option value="500000">500000</option>
														<option value="1000000">1000000</option>    
														<option value="1000000">2000000</option>        
                                                  </select>
                                    </div>
                                    
                                    <div class="col-md-2">                                   
                                        <select  name="bed" class="form-control">
													<option value=""><?php echo trans('frontend.Beds'); ?></option>
													<option value="1">1</option>
													<option value="2">2</option>
													<option value="3">3</option>
													<option value="4">4</option>
													<option value="5">5</option>
													<option value="6">6</option>
													<option value="7">7</option>
													<option value="8">8</option>
													<option value="9">9</option>
													<option value="10">10</option>
												</select>
                                    </div>
                                    <div class="col-md-2">
                                        <select  name="bath" class="form-control">
													<option value=""><?php echo trans('frontend.Bath'); ?></option>
													<option value="1">1</option>
													<option value="2">2</option>
													<option value="3">3</option>
													<option value="4">4</option>
													<option value="5">5</option>
													<option value="6">6</option>
													<option value="7">7</option>
													<option value="8">8</option>
													<option value="9">9</option>
													<option value="10">10</option>
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
                  
                    <!-- Content Carousel Properties -->
                    <div class="content-carousel">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- Title-->
                                <div class="titles">
                               
                                    <h1><?php echo trans('frontend.Listing'); ?></h1>
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
                                        <li><strong><i class="fa fa-dollar"></i> Price</strong><span><?php echo $setting->currency; ?>{{number_format($list->price)}} </span></li>
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
                    <!-- End Content Carousel Properties -->

                     <section id="web-application">
                        <h2 class="page-header">Browse by Location</h2>

                        <div class="row fontawesome-icon-list">
						@foreach($all_cities as $city) 
                          <div class="fa-hover col-md-3 col-sm-4"><a href="{{url('listing?keywords=' . $city->city )}}">  {{$city->city}}</a></div>
                         @endforeach
                        
                        </div>

                      </section>
					  

                    
                </div>
                <!-- End Container -->
            </div>
            <!-- End content info-->
			
		
<?php

function clean($string) {
    $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

    return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}
?>

@endsection
