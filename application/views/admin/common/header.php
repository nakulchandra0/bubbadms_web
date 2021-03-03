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
							<a href="mailto:sales@bubbabilling.com" class="top_bar_link"><i class="fa fa-envelope-o"></i>sales@bubbabilling.com</a>
						</div>
						<div class="col-md-2">
							<span class="right">
								<ul class="footer_social">
									<li class="footer_social_li">
										<a href="" target="_blank">
											<img src="assets/images/facebook.png" alt="Facebook" class="img-fluid footer_social_img">
										</a>
									</li>
									<li class="footer_social_li">
										<a href="" target="_blank">
											<img src="assets/images/twitter.png" alt="Twitter" class="img-fluid footer_social_img">
										</a>
									</li>
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
							
								<a class="navbar-brand" href="#">
									<img src="assets/images/flashpik.png" alt="FlashPik">
								</a>	
								
								<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainnavbar" aria-controls="mainnavbar" aria-expanded="false" aria-label="Toggle navigation">
									<span class="navbar-toggler-icon"></span>
								</button>
								
								<div class="nav-menu collapse navbar-collapse" id="mainnavbar">
									<ul class="navbar-nav ml-auto py-4 py-md-0">
										<li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4 active">
											<a class="nav-link" href="index.html">Home</a>
										</li>
										<li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
											<a class="nav-link" href="joinfree.html">30 Day Risk Free Test Drive</a>
										</li>
										<li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
											<a class="nav-link" href="calculator.html">Calculators</a>
										</li>
										<li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
											<a class="nav-link" href="contact.html">Contact Us</a>
										</li>
										<?php if($userlogin !='yes'){?>
										<li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
											<a class="nav-link btn theme_btn btn_redius" href="<?php echo base_url(); ?>login">Login</a>
										</li>
										<?php }else{ 

											$userdata = $this->db->get_where('memberlogin_members',array('id' => $this->session->userdata('user_id')))->row();
											?>
										
										<li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4 dropdown showborder">
											<a class="nav-link" data-toggle="dropdown" href="javascript:;"><img src="assets/images/love.png" class="menu_profile_img"> <?php echo $userdata->first_name.' '.$userdata->last_name; ?> <i class="fa fa-angle-down"></i></a>
											<ul class="dropdown-menu">
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