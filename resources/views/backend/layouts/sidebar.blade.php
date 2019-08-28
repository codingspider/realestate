<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search">
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
                <!-- /input-group -->
            </li>
            <li class="active">
                <a href="<?php echo url("admin/dashboard"); ?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li>

            <?php if (Auth::user()->AccessLevel == 0) { ?>
				
				<li>
                    <a href="<?php echo url("admin/agents"); ?>"><i class="fa fa-user fa-fw"></i> Agents & Users </a>
                </li>

                <li>
                    <a href="<?php echo url("admin/features"); ?>"><i class="fa fa-list fa-fw"></i> Features</a>
                </li>

                <li>
                    <a href="<?php echo url("admin/categories"); ?>"><i class="fa fa-th-list fa-fw"></i> Categories</a>
                </li>

			<li>
                <a href="<?php echo url("admin/all-newsletter"); ?>"><i class="fa fa-newspaper-o fa-fw"></i> Newsletters </a>
            </li>
			
			<li>
                <a href="<?php echo url("admin/sliders"); ?>"><i class="fa fa-sliders fa-fw"></i> Sliders </a>
            </li>
			
			<li>
                <a href="<?php echo url("admin/testimonials"); ?>"><i class="fa fa-comments fa-fw"></i> Testimonials </a>
            </li>

               
            <?php } ?>
			
			<li>
                     <a href="#"><i class="fa fa-list fa-fw"></i> Properties <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo url("admin/properties"); ?>"><i class="fa fa-list fa-fw"></i> Properties</a>
                                </li>
								
								<li>
                                    <a  href="<?php echo url("admin/property/add"); ?>"><i class="fa fa-plus fa-fw"></i> Add Property</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

           

           
            <?php if (Auth::user()->AccessLevel == 0) { ?>
			<li>
                <a href="<?php echo url("/payments"); ?>"><i class="fa fa-dollar fa-fw"></i> Payments </a>
            </li>
                <li>
                    <a href="<?php echo url("admin/settings"); ?>"><i class="fa fa-gear fa-fw"></i> Settings </a>
                </li>

				
				
				<li>
                     <a href="#"><i class="fa fa-file-text-o fa-fw"></i> Pages <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo url("admin/pages"); ?>"><i class="fa fa-list fa-fw"></i> About Us</a>
                                </li>
								
								<li>
									<a href="<?php echo url("admin/gallery/upload"); ?>"><i class="fa fa-image fa-fw"></i> Gallery </a>
								</li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

            <?php } ?>
            <li>
                <a href="<?php echo url("admin/customer-requests"); ?>"><i class="fa fa-user fa-fw"></i> Inquiries </a>
            </li>
			 <li>
                <a href="<?php echo url("admin/profile"); ?>"><i class="fa fa-user fa-fw"></i> My Profile </a>
            </li>
			
			
            <li><a href="<?php echo url("logout"); ?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>

        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->
