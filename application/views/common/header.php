<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $userlogin = $this->session->userdata('user_login');?>

<div class="navigation-wrap start-header start-style" id="header">
			<div class="top_bar">
				<div class="container">
					<div class="row">
						<div class="col-md-10">
							<a href="tel:6788660750" class="top_bar_link"><i class="fa fa-phone"></i>(678)866-0750</a>
							<a href="mailto:bubba@bubbadms.com" class="top_bar_link"><i class="fa fa-envelope-o"></i>bubba@bubbadms.com</a>
						</div>
						<div class="col-md-2">
							<span class="right">
								<ul class="footer_social">
									<li class="footer_social_li">
										<a href="" target="_blank">
											<img src="assets/images/facebook.png" alt="Facebook" class="img-fluid footer_social_img">
										</a>
									</li>
									<!-- <li class="footer_social_li">
										<a href="" target="_blank">
											<img src="assets/images/twitter.png" alt="Twitter" class="img-fluid footer_social_img">
										</a>
									</li> -->
								</ul>
							</span>
						</div>
					</div>
				</div>
			</div>
			<div class="header">
				<div class="container">
					<div class="row">
						<div class="col-12">
							<nav class="navbar navbar-expand-md navbar-light" id="mainNav">
							
								<a class="navbar-brand" href="https://bubbadms.com">
									<img src="assets/images/bubba.png" alt="bubbadms">
								</a>	
								
								<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainnavbar" aria-controls="mainnavbar" aria-expanded="false" aria-label="Toggle navigation">
									<span class="navbar-toggler-icon"></span>
								</button>
								<?php $routename = $this->uri->uri_string(); ?>
								<div class="nav-menu collapse navbar-collapse" id="mainnavbar">
									<ul class="navbar-nav ml-auto py-4 py-md-0">
										<li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4 <?php if(empty($routename))if($this->router->fetch_method() == 'index')echo 'active'; ?>">
											<a class="nav-link" href="<?php echo base_url(); ?>">Home</a>
										</li>
										<li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4 <?php if($routename == 'joinfree')echo 'active'; ?>">
											<a class="nav-link" href="<?php echo base_url(); ?>joinfree">30 Day Risk Free Test Drive</a>
										</li>
										<li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4 <?php if($routename == 'calculator')echo 'active'; ?>">
											<a class="nav-link" href="<?php echo base_url(); ?>calculator">Calculators</a>
										</li>
										<li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4 <?php if($routename == 'contact')echo 'active'; ?>">
											<a class="nav-link" href="<?php echo base_url(); ?>contact">Contact Us</a>
										</li>
										<?php if($userlogin !='yes'){?>
										<li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
											<a class="nav-link btn theme_btn btn_redius" href="<?php echo base_url(); ?>login">Login</a>
										</li>
										<?php }else{ 

											$userdata = $this->db->get_where('memberlogin_members',array('id' => $this->session->userdata('user_id')))->row();
											?>
										
										<li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4 dropdown showborder">
											<a class="nav-link" data-toggle="dropdown" href="javascript:;"><img src="assets/images/apple-touch-icon.png" class="menu_profile_img"> <?php echo $userdata->first_name.' '.$userdata->last_name; ?> <i class="fa fa-angle-down"></i></a>
											<ul class="dropdown-menu">
												<li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
													<a class="nav-link" href="<?php echo base_url(); ?>dashboard">My Account</a>
												</li>
												<li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
													<a class="nav-link" href="<?php echo base_url(); ?>home/logout">Logout</a>
												</li>
											</ul>
										</li>
										
										<?php } ?>
										
										
									</ul>
								</div>
								
							</nav>		
						</div>
					</div>
				</div>
			</div>
		</div>