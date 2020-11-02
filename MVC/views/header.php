<!-- topbar starts -->
	<div class="navbar" style="background:rgb(0,64,128); font-size: 1.2em;">
		<div class="navbar-inner" style="background:rgb(0,64,128); border-radius: 0px;">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="<?php echo base_url();?>"> <img alt="Charisma Logo" src="<?php echo base_url();?>uploads/logo.png" /> </a>
				

				
				<!-- user dropdown starts -->
				<div class="btn-group pull-right " style="background:rgb(0,64,128); font-size: 1.1em;">
					<a class="btn dropdown-toggle btn-success" data-toggle="dropdown" href="#">
						<i class="icon-user"></i>&nbsp;<span class="hidden-phone"><?php echo $this->session->userdata('name');?></span>
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<li>
                        	<a href="<?php echo base_url();?>index.php/<?php echo $this->session->userdata('login_type');?>/change_password">
                            	<i class="icon-pencil icon-darkgray"></i>
                                	Change password</a>
                        </li>
						<li class="divider"></li>
						<li>
                        	<a href="<?php echo base_url();?>index.php/login/logout">
                        		<i class="icon-off icon-darkgray"></i>
                            		Logout</a>
                        </li>
					</ul>
				</div>
				<!-- user dropdown ends -->
				
				<div class="top-nav nav-collapse" style="margin-top:15px; margin-left: 205px;">
                                    <h1 style="font-size: 3.0em; color: whitesmoke; "><?php echo $settings_row['institute_name'];?></h1>
				</div><!--/.nav-collapse -->
			</div>
		</div>
	</div>
	<!-- topbar ends -->