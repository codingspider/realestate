<!-- Header-->
            <header> 
                <!-- Filter Search-->
                <div class="container">
                    <div class="row">
                        <div class="col-md-5">                        
                            <div class="row bg_header">
								<style> 
								.tabs_services label {
									background-color: #fff;
									border-radius: 3px;
									color: #333;
									cursor: pointer;
									display: inline-block;
									float: left;
									margin: 0 15px 0 0;
									padding: 9px 18px;
									text-align: center;
									transition: all 0.2s ease 0s;
								}
								
								.tabs_services input[type="radio"] {
    display: none;
}
.checkboxes input[type="checkbox"]:checked + label::before, .range-slider .ui-widget-header, .tabs_services label.active, .tabs_services label:hover {
    background-color: #737375;
	color:#fff;
}
								</style>
                              

                                <!-- 2-content -->
                                <div id="2-content" class="set2">
                                   <div class="search_box">
                                        <form action="<?php echo url("listing"); ?>" method="get">
                                            <div class="col-md-12">
                                                <label><?php echo trans('frontend.Keywords'); ?>/<?php echo trans('frontend.Zip'); ?></label>
                                                <input type="text" placeholder="<?php echo trans('frontend.Keywords'); ?>" name="keywords" >
                                                <input type="hidden" name="type" value="">
                                            </div>
                                            <div class="col-md-6">
                                                <label><?php echo trans('frontend.Category'); ?></label>
                                                <select name="category">
                                                    <option value="">-- <?php echo trans('frontend.Category'); ?> --</option>
                                                     <option value="" selected="selected"><?php echo trans('frontend.Any'); ?></option>
													 @foreach($categories as $category)
                                                     <option value="{{$category->id}}">{{$category->name}}</option>
													 @endforeach
                                                                      
                                                 </select>
                                            </div>
											
											<div class="col-md-6">
                                                <label><?php echo trans('frontend.Type'); ?></label>
                                                <select name="type">
                                                   <option value=""><?php echo trans('frontend.All'); ?></option>
                                <option value="SALE"><?php echo trans('frontend.Sale'); ?></option>
                                <option value="RENT"><?php echo trans('frontend.Rent'); ?></option>                   
                                                 </select>
                                            </div>
											
                                            <div class="col-md-6">
                                                <label><?php echo trans('frontend.PriceFrom'); ?></label>                                     
                                               <select name="min">   
                                <option value=""><?php echo trans('frontend.Any'); ?></option>
                                <option value="0">0</option>
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
											
											<div class="col-md-6">
                                                <label><?php echo trans('frontend.PriceTo'); ?></label>                                     
                                                <select name="max">                                 
                                                    <option value=""><?php echo trans('frontend.Any'); ?></option>
                                <option value="1000">1000</option>
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
                                            <div class="col-md-6">
                                                <label><?php echo trans('frontend.Beds'); ?></label>
                                                <select  name="bed" class="form-control">
													<option value=""><?php echo trans('frontend.Any'); ?></option>
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
												<div class="col-md-6">
												<label><?php echo trans('frontend.Bath'); ?></label>
												<select  name="bath">
													<option value=""><?php echo trans('frontend.Any'); ?></option>
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
                                            <div>
                                                <input type="submit" class="button" value="<?php echo trans('frontend.Search'); ?>">
                                            </div> 
                                        </form>                               
                                    </div>   
                                </div>
                                <!-- End 1-content -->   
                            </div>       
                        </div>
                    </div>
                </div>  
                <!-- Filter Search-->              
                
                <!-- Slide -->           
                <div class="camera_wrap camera_white_skin" id="slide">
                    <!-- Item Slide -->  
					<?php foreach($sliders as $slider) { $property = get_property($slider->product_id); ?>
                    <div  data-src="{{url('assets/images/slider/' . $slider->image)}}">
                        <div class="camera_caption fadeFromTop">
                             <div class="container"> 
                                <div class="row">
                                    <div class="col-md-7 col-md-offset-5">
                                        <h1 class="animated fadeInRight delay1">{{$slider->title}}
                                            <span class="arrow_title_slide"></span>
                                        </h1>   
                                        <p class="animated fadeInRight delay2">{{ str_limit($property->body, $limit = 60, $end = '...')}}</p> 
                                        <ul class="animated fadeInRight delay3">
                                            <li class="bathrooms"><span>{{$property->bath}}</span></li>
                                            <li class="bedrooms"><span>{{$property->beds}}</span></li>
                                            <li class="price">$<span>{{$property->price}}</span></li>
                                        </ul>
                                        <div class="more animated fadeInRight delay4">
                                            <a target="_blank" href="{{url('property/' . $property->id . '/' . clean($property->title))}}" class="button">More Info</a>
                                        </div>
                                    </div>    
                                </div>                     
                            </div>      
                        </div>
                     </div>
                    <!-- End Item Slide -->  
					<?php } ?>

                </div>  
                <!-- End Slide -->   
            </header>
            <!-- End Header-->
	
