<!DOCTYPE html>
<html lang="en">

	<head>
	  	<meta charset="utf-8">
	  	<meta content="width=device-width, initial-scale=1.0" name="viewport">

	  	<title><?php echo $page_title; ?></title>
	  	<meta content="" name="descriptison">
	  	<meta content="" name="keywords">

	  	<!-- Favicons -->
	  	<link href="assets/images/favicon.png" rel="icon">
	  	<link href="assets/images/apple-touch-icon.png" rel="apple-touch-icon">

	  	<!-- Google Fonts -->
	  	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&family=Poppins:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
	  	<script src="https://use.fontawesome.com/d344ee9f73.js"></script>

	  	<!-- CSS Files -->
		<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="assets/css/style.css">

		<?php $this->load->view('common/seo');?>

	</head>
	<body>

		<!-- Navigation Start -->
		<?php $this->load->view('common/header');?>
		<!-- Navigation End -->

		<div class="content">

			<section class="top_section">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="top_section_text">
								<img src="assets/images/bubba.png" alt="bubbadms" class="top_logo">
								<h1 class="top_section_h5">Dealer Friendly Software</h1>
							</div>
						</div>
					</div>
				</div>
			</section>

			<section class="box_info_section">
				<div class="container">
					<div class="row box_info_row">
						<div class="col-md-12">
							<h2>FREE <span class="theme_color">30 DAY</span> TEST DRIVE!</h2>
							<h5 class="no_b_m">TRY OUR DEALER MANAGEMENT SOFTWARE FREE FOR 30 DAYS.</h5>
							<div class="box_info_btns mt-3">
								<form action="<?php echo base_url() ?>login" method="post" enctype="multipart/form-data" id="plan_free" accept-charset="utf-8">
									<input type="hidden" name="planid" value="1">
								</form>
								<a href="#" onclick="$('#plan_free').submit();" class="btn theme_btn btn_redius"><i class="fa fa-sign-in"></i>&nbsp;&nbsp;Sign Up!</a>
								<a href="#" class="btn theme_btn btn_redius"><i class="fa fa-play"></i>&nbsp;&nbsp;Demo Video!</a>
							</div>
						</div>
					</div>
				</div>
			</section>

			<br>
			<br>

			<section class="gray_bg cta_section">
				<div class="container">
					<div class="row">
						<div class="col-md-9">
							<h3>RUNS ON ANY WEB BROWSING DEVICE!</h3>
							<p class="no_b_m">Runs on an web browsing device, Manage your lot from anywhere in the world. Even if your WIFI is out, <b>sell the car on your phone or tablet!</b> Business never stops so why should you?</p>
						</div>
						<div class="col-md-3 d-flex">
							<div class="my-auto w_100">
								<h5 class="center no_b_m">
									<a href="tel:6788660750" class="btn theme_btn btn_redius"><i class="fa fa-phone"></i>&nbsp;&nbsp;(678)866-0750</a>
								</h5>
							</div>
						</div>
					</div>
				</div>
			</section>

			<section class="info_section">
				<div class="container">
					<div class="row">
						<div class="col-md-4">
							<div class="info_box">
								<div class="info_img_div">
									<img src="assets/images/what_icon.png" class="img-fluid info_img">
								</div>
								<h5 class="info_title">What Bubba Does</h5>
								<ul class="info_ul no_b_m">
									<li class="info_li">Save And Print</li>
									<li class="info_li">Full State Documents</li>
									<li class="info_li">Inventory Management</li>
									<li class="info_li">Customer Management</li>
									<li class="info_li">Print Reports</li>
									<li class="info_li">Prints on YOUR Printer</li>
									<li class="info_li">And did we say SIMPLE to use?</li>
								</ul>
							</div>
						</div>
						<div class="col-md-4">
							<div class="info_box">
								<div class="info_img_div">
									<img src="assets/images/software_icon.png" class="img-fluid info_img">
								</div>
								<h5 class="info_title">Modern Software</h5>
								<ul class="info_ul no_b_m">
									<li class="info_li">Works on any device</li>
									<li class="info_li">Easy to use</li>
									<li class="info_li">Dealers and Brokers</li>
								    <li class="info_li">Access Anywhere</li>
									<li class="info_li">Call or Sign Up TODAY!</li>
								</ul>
							</div>
						</div>
						<div class="col-md-4">
							<div class="info_box">
								<div class="info_img_div">
									<img src="assets/images/services_icon.png" class="img-fluid info_img">
								</div>
								<h5 class="info_title">Thoroughbred Dealer Services</h5>
								<ul class="info_ul no_b_m">
									<li class="info_li">Dealer Insurance</li>
									<li class="info_li">Dealer Bonds</li>
									<li class="info_li">Corporate and License Filing</li>
								    <li class="info_li">Complete Dealer Solutions</li>
									<li class="info_li">We got you covered!</li>
									<li class="info_li">We LOVE Our Customers!</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</section>

			<section class="gray_bg step_section">
				<div class="container">
					<div class="row">
						<div class="col-md-6 d-flex flex-column align-items-stretch justify-content-center">
							<img src="assets/images/bubbadms.png" class="img-fluid">
						</div>
						<div class="col-md-6 d-flex flex-column align-items-stretch justify-content-center">
							<div class="step_div">
								<div class="row">
									<div class="col-md-4 d-flex flex-column align-items-stretch justify-content-center">
										<div class="step_img_div">
											<img src="assets/images/login_icon.png" class="img-fluid step_img">
											<span class="step_number">1</span>
										</div>
									</div>
									<div class="col-md-8 d-flex flex-column align-items-stretch justify-content-center">
										<h5 class="step_title">Create an Account</h5>
										<div class="step_desc">Unlimited Log ins.</div>
									</div>
								</div>
							</div>
							<div class="step_div">
								<div class="row">
									<div class="col-md-4 d-flex flex-column align-items-stretch justify-content-center">
										<div class="step_img_div">
											<img src="assets/images/addinfo_icon.png" class="img-fluid step_img">
											<span class="step_number">2</span>
										</div>
									</div>
									<div class="col-md-8 d-flex flex-column align-items-stretch justify-content-center">
										<h5 class="step_title">Add Inventory and Buyer Info</h5>
										<div class="step_desc">Simple web forms to add a car with vin decoder, add a buyer (co buyer) and insurance (if you want).</div>
									</div>
								</div>
							</div>
							<div class="step_div">
								<div class="row">
									<div class="col-md-4 d-flex flex-column align-items-stretch justify-content-center">
										<div class="step_img_div">
											<img src="assets/images/print_icon.png" class="img-fluid step_img">
											<span class="step_number">3</span>
										</div>
									</div>
									<div class="col-md-8 d-flex flex-column align-items-stretch justify-content-center">
										<h5 class="step_title">Save as a PDF</h5>
										<div class="step_desc">You choose the vehicle, buyer, and forms you want. Our software creates the forms and you can save as a PDF!</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>				
			</section>

			<section class="pricing_section">
				<div class="container">
					<div class="row mb-5">
						<div class="col-md-12">
							<h2 class="section_title">OUR PRICES</h2>
						</div>
					</div>
					<div class="row">
						<?php foreach ($packagedata as $key => $value) { ?>
							
							<div class="col-md-4">
								<form action="<?php echo base_url() ?>login" method="post" enctype="multipart/form-data" id="plan_<?php echo $value['id'] ?>" accept-charset="utf-8">
								<div class="pricing_box">
									<h3 class="pricing_h3"><?php echo $value['group_title'] ?></h3>
									<input type="hidden" name="planid" value="<?php echo $value['id'] ?>">
									<div class="pricing_box_h">
										<h4 class="pricing_h4"><sup>$</sup><?php echo $value['subscription_fee'] ?><span></h4>
										<!-- <h6 class="mb-3">Pay As You Go - Monthly Program</h6> -->
										<ul class="pricing_ul no_b_m">
											<?php  foreach (unserialize($value['subscription_info']) as $value1) { ?>
												<li><?php echo $value1; ?></li>
											<?php } ?>
										</ul>
									</div>
									<div class="btn-wrap">
										<a href="#" onclick="$('#plan_<?php echo $value['id'];?>').submit();" class="btn theme_btn btn_redius">Start Now!</a>
									</div>
								</div>
								</form>
							</div>
						
						<?php } ?>						
						<!-- <div class="col-md-4">
							<div class="pricing_box">
								<span class="additional">Additional Services</span>
								<h3 class="pricing_h3">SAVE</h3>
								<div class="pricing_box_h">
									<h6 class="mb-3">We have many dealer resources and Services. From Starting a Dealership to Saving You Money!</h6>
									<ul class="pricing_ul no_b_m">
										<li><b>Website $35.00/Month (Start)</b></li>
										<li><b>Website $350.00/Year (Start)</b></li>
										<li>Surety and Title Bonds</li>
										<li>(Over 300 Others!)</li>
										<li>Digital Contracts (BHPH)</li>
										<li>Insurance</li>
										<li>License Pre-License</li>
										<li>Corporate Filing</li>
									</ul>
								</div>
								<div class="btn-wrap">
									<a href="#" class="btn theme_btn btn_redius">Learn More</a>
								</div>
							</div>
						</div> -->
					</div>
				</div>
			</section>

			<section class="gray_bg cta_section">
				<div class="container">
					<div class="row">
						<div class="col-md-9">
							<h3>RUNS ON ANY WEB BROWSING DEVICE!</h3>
							<p class="no_b_m">Runs on an web browsing device, Manage your lot from anywhere in the world. Even if your WIFI is out, sell the car on your phone or tablet! Business never stops so why should you?</p>
						</div>
						<div class="col-md-3 d-flex">
							<div class="my-auto w_100">
								<h5 class="center no_b_m">
									<a href="tel:6788660750" class="btn theme_btn btn_redius"><i class="fa fa-phone"></i>&nbsp;&nbsp;(678)866-0750</a>
								</h5>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>

	<?php $this->load->view('common/footer');?>	

	</body>
	<?php $this->load->view('common/footer-script');?>		

</html>