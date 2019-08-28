@extends('frontend.layoutother')

@section('content')

<?php $setting = get_setting(); ?>




 <div class="section_title features">
                    
            </div>
            <!-- End Section Title -->

            <!-- End content info -->
            <section class="content_info">
                <div class="container">
                  <!-- Newsletter Box -->                  
                
                  <!-- End Newsletter Box -->

                  <div class="row padding_top">
                      <!-- property List-->
                      <div class="col-md-9 properties_two">

                          <!-- Bar Filter properties-->
                          <div class="bar_properties">
                              <div class="row">
                                  <div class="col-md-8">
                                      <strong><?php echo trans('frontend.OrderBy'); ?>:</strong>
                                      <ul class="tooltip_hover">                            
										  <li>
                                            <a href="?type=All"> <?php echo trans('frontend.All'); ?> | </a>
                                            <a href="?type=SALE" data-toggle="tooltip" title data-original-title="<?php echo trans('frontend.ForSale'); ?>"> <?php echo trans('frontend.Sale'); ?> | </a>
                                            <a href="?type=RENT" data-toggle="tooltip" title data-original-title="<?php echo trans('frontend.ForRent'); ?>"> <?php echo trans('frontend.Rent'); ?> </a>
                                          </li> 
										  
                                          <li>
                                            <a href="#"><?php echo trans('frontend.Price'); ?></a>
                                            <a href="?order=priceh" data-toggle="tooltip" title data-original-title="Sort Ascending"> <i class="fa fa-caret-up"> | </i></a>
                                            <a href="?order=pricel" data-toggle="tooltip" title data-original-title="Sort Ascending"> <i class="fa fa-caret-down"></i></a>
                                          </li>  

										  
                                      </ul>
                                  </div>
                                  <div class="col-md-4">
                                      <ul class="text_right tooltip_hover">
                                          <li class="active" data-toggle="tooltip" title data-original-title="Box"><a href="{{url('listing')}}"><i class="fa fa-th-large"></i></a></li>
                                          <li data-toggle="tooltip" title data-original-title="List"><a href="{{url('list-view')}}"><i class="fa fa-list"></i></a></li> 
                                      </ul>
                                  </div>
                              </div>
                          </div>
                          <!-- End Bar Filter properties-->

                          <!-- Row Propertys-->                   
                          <div class="row">
						  <?php foreach ($properties as $list): $category = get_catogory($list->category_id); ?>
                              <!-- Item Property-->
                              <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
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
										    <li><strong><i class="fa fa-dollar"></i> <?php echo trans('frontend.Price'); ?></strong><span><?php echo $setting->currency; ?>{{number_format($list->price)}} </span></li>
											
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

                      <!-- Aside -->
                      <div class="col-md-3">                    
                          <!-- Search Advance -->
                          <aside>                                                 
                              <div class="search_advance">
                                  
                                  
                                  <div class="clearfix"></div>
                                  <div class="switcher-panel"></div> 

            
                                  <div id="3-content" class="switcher-content set2 show">
                                     <div class="search_box">
                                          <form action="{{url('listing')}}">
                                              <div>
                                                  <label><?php echo trans('frontend.Keywords'); ?></label>
                                                  <input type="text" name="keyword" >
                                              </div>
                                              <div>
                                                  <label><?php echo trans('frontend.Category'); ?></label>
                                                   <select name="category">
                                                    <option selected="selected" value="">-- <?php echo trans('frontend.Category'); ?> --</option>
                                                     <option value=""><?php echo trans('frontend.Any'); ?></option>
													 @foreach($categories as $category)
                                                     <option value="{{$category->id}}">{{$category->name}}</option>
													 @endforeach
                                                                      
                                                 </select>
                                              </div>
                                              <div>
                                                  <label><?php echo trans('frontend.PriceFrom'); ?></label>                                     
                                                  <select name="min">
                                                        <option value=""><?php echo trans('frontend.Any'); ?></option>
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
											  
											  <div>
                                                  <label><?php echo trans('frontend.PriceTo'); ?></label>                                     
                                                  <select name="max">
                                                        <option value=""><?php echo trans('frontend.Any'); ?></option>
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
											  
                                              <div>
                                                  <label><?php echo trans('frontend.Beds'); ?></label>
                                                  <select name="bed">
														<option value=""><?php echo trans('frontend.Any'); ?></option>
														<?php for($i = 1; $i<= 10 ; $i++) { ?>
														<option <?php if (!empty($forms['bed']) and $forms['bed'] == $i) {echo "selected";}?> value="{{$i}}">{{$i}}</option>
														<?php } ?>
														
                                                  </select>
                                              </div>
											  
											  <div>
                                                  <label><?php echo trans('frontend.Bath'); ?></label>
                                                  <select name="bath">
                                                        <option value=""><?php echo trans('frontend.Any'); ?></option>
														<?php for($i = 1; $i<= 10; $i++) { ?>
														<option <?php if (!empty($forms['bath']) and $forms['bath'] == $i) {echo "selected";}?> value="{{$i}}">{{$i}}</option>
														<?php } ?>
                                                  </select>
                                              </div>
                                              <div>
                                                  <input type="submit" class="button" value="<?php echo trans('frontend.Search'); ?>">
                                              </div> 
                                          </form>                               
                                      </div>   
                                  </div>
                                  <!-- End 3-content -->
                              </div>  
                          </aside>
                          <!-- End Search Advance -->
                          
                        
                      </div>
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
