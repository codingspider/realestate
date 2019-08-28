<?php $setting = get_setting(); ?>
            <!-- Footer area - footer_medium -->
            <footer class="section_area footer_medium">
                <div class="container">
                    <div class="row">

                       <!-- Contact Footer -->
                       <div class="col-md-4">
                          <h3><?php echo trans('frontend.Contact'); ?></h3>                        
                            <ul class="contact_footer">
                                <li>
                                    <i class="fa fa-envelope"></i><a href="#">{{$setting->phone_no}}</a>
                                </li>
                                <li>
                                    <i class="fa fa-headphones"></i><a href="#">{{$setting->email}}</a>
                                 </li>
                                <li class="location">
                                    <i class="fa fa-home"></i><a href="#"> {{$setting->address}}</a>
                                </li>  
                                <li class="location">
                                    <i class="fa fa-skype"></i><a href="#"> cent040 </a>
                                </li>                                   
                            </ul>               
                        </div>
                        <!-- End Contact Footer -->

                        <!-- Recent Links -->
                        <div class="col-md-4 links">
                            <h3><?php echo trans('frontend.Links'); ?></h3>
                            <ul>
                                <li><a href="{{url('about-us')}}"><?php echo trans('frontend.About'); ?></a></li>
                                <li><a href="{{url('calculator')}}"><?php echo trans('frontend.Calculator'); ?></a></li>
                                <li><a href="{{url('listing')}}"><?php echo trans('frontend.Properties'); ?></a></li>
                                <li><a href="{{url('all-agent')}}"><?php echo trans('frontend.Agents'); ?></a></li>
                            </ul>
                        </div>
                        <!-- End Recent Links -->

                        <!-- Tags 
                        <div class="col-md-3 padding_items">
                            <h3>Tag Cloud</h3>
                            <ul class="tags">
                                <li><a href="#">Blog</a></li>
                                <li><a href="#">Web Desing</a></li>
                                <li><a href="#">News</a></li>
                                <li><a href="#">Internet</a></li>
                                <li><a href="#">Audio</a></li>
                                <li><a href="#">Image</a></li>
                                <li><a href="#">Blog</a></li>
                                <li><a href="#">Web Desing</a></li>
                                <li><a href="#">News</a></li>
                            </ul>
                        </div>
                        End Tags -->

                        <!-- Testimonials -->
                        <div class="col-md-4">
                            <ul class="testimonial-carousel">
                                <!-- Item Testimonial -->
								<?php $testimonials = get_testimonials(); 
									if(!empty($testimonials)) { foreach($testimonials as $test) : 
								?>
                                <li>
                                    <div class="testimonials">
                                        <p><?php echo $test->message; ?></p>
                                        <span class="arrow_testimonials"></span>
                                    </div>        
                                    <h6 class="testimonial_autor"><?php echo $test->client_name; ?></h6> 
                                </li>
                                <!-- Item Testimonial -->

									<?php   endforeach;  } ?>
                                
                            </ul>
                        </div>
                        <!-- End Testimonials -->
                    </div>
                </div>
            </footer>
            <!-- End Footer area - footer_medium -->

            <!-- Footer area - footer_down -->
            <footer class="section_area footer_down">
                <div class="container">
                    <div class="row">
                       <div class="col-md-6">
                            <p><?php echo trans('frontend.Copyright'); ?> &copy; <?php echo date("Y"); ?> - <?php echo $setting->title; ?>. All rights reserved.</p>             
                        </div>
                        <div class="col-md-6">
                            <ul class="social tooltip-demo">
                                <li data-toggle="tooltip" title="Facebook">
                                    <a target="_blank" href="{{$setting->facebook}}"><i class="fa fa-facebook"></i></a>
                                </li>
                                <li data-toggle="tooltip" title="Twitter">
                                    <a target="_blank" href="{{$setting->twitter}}"><i class="fa fa-twitter"></i></a>
                                </li>
                                <li data-toggle="tooltip" title="Google Plus">
                                    <a target="_blank" href="{{$setting->google}}"><i class="fa fa-google-plus"></i></a>
                                </li>
                                <li data-toggle="tooltip" title="Pinterest">
                                    <a  target="_blank" href="{{$setting->youtube}}"><i class="fa fa-youtube"></i></a>
                                </li>
                                <li data-toggle="tooltip" title="Linkedin">
                                    <a target="_blank" href="{{$setting->linkedin}}"><i class="fa fa-linkedin"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- End Footer area- footer_down -->
			
	