<?php $setting = get_setting(); ?>

<!-- Info Head -->
            <section class="info_head">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <ul>  
                                <li><i class="fa fa-headphones"></i><a href="#">{{$setting->phone_no}}</a></li>
                                <li><i class="fa fa-comment"></i><a href="#">{{$setting->email}}</a></li>


                      
                            </ul> 
                        </div>
                    </div>
                </div>                         
            </section>
            <!-- Info Head -->

            <!-- Nav-->
            <nav>
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 logo">
                            <a href="<?php echo url("/"); ?>"><img src="{{url('assets/frontend/logo.png')}}" alt="Image" class="logo_img"></a>
                        </div>
                        <!-- Menu-->
                        <ul id="menu" class="col-md-9 sf-menu">
                            
                            <li><a href="<?php echo url("/"); ?>"><?php echo trans('frontend.Home'); ?></a></li>
							
					<li>
						<a href="<?php echo url("/about-us"); ?>"><?php echo trans('frontend.About'); ?></a>
					</li>
					<li>
                    <a href="<?php echo url("/admin/property/add"); ?>">Post An Ad</a>
					</li>
					<li>
                    <a href="<?php echo url("/loan-calculator"); ?>"><?php echo trans('frontend.Calculator'); ?></a>
					</li>
	

                <li>
                    <a href="<?php echo url("/all-agent"); ?>"><?php echo trans('frontend.Agents'); ?></a>
                </li>
                <li>
                    <a href="<?php echo url("/contact-us"); ?>"><?php echo trans('frontend.Contact'); ?></a>
                </li>
				
                             
                            
                        </ul>
                        <!-- End Menu-->
                    </div>
                </div>
            </nav>
   