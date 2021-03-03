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
		<link rel="stylesheet" type="text/css" href="assets/css/datatables.min.css">
		<link rel="stylesheet" type="text/css" href="assets/css/responsive.bootstrap4.min.css">

    	<link rel="stylesheet" type="text/css" href="assets/css/sweetalert2.min.css">
		<link rel="stylesheet" type="text/css" href="">
		<link rel="stylesheet" type="text/css" href="assets/css/style.css">

		<?php $this->load->view('common/seo');?>
		
	</head>
	<body>

		<!-- Navigation Start -->
		<?php $this->load->view('common/header');?>
		<!-- Navigation End -->

		<div class="content">

			<section class="subheader">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<h1 class="subheader_title">Inventory Area</h1>
						</div>
					</div>
				</div>
			</section>

		<?php $this->load->view('common/header_nav');?>
			
			<section class="gray_bg">
				<div class="container">
					<div class="row">
						<div class="col-md-4 offset-md-4">
							<a href="<?php echo base_url(); ?>startdeal" class="start_deal_btn">Start Deal</a>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<div class="member_area_box">
								<img src="assets/images/inventory.jpg" class="img-fluid member_area_box_img">
								<div class="member_area_box_info">
									<h3>Inventory</h3>
									<a class="btn theme_btn btn_redius" href="<?php echo base_url(); ?>inventoryarea">Enter Inventory Here</a>
								</div>
							</div>
						</div>

						<div class="col-md-3">
							<div class="member_area_box">
								<img src="assets/images/buyer.jpg" class="img-fluid member_area_box_img">
								<div class="member_area_box_info">
									<h3>Buyer</h3>
									<a class="btn theme_btn btn_redius" href="<?php echo base_url(); ?>buyerarea">Enter Buyer Here</a>
								</div>
							</div>
						</div>

						<div class="col-md-3">
							<div class="member_area_box">
								<img src="assets/images/math.jpg" class="img-fluid member_area_box_img">
								<div class="member_area_box_info">
									<h3>Calculator</h3>
									<a class="btn theme_btn btn_redius" href="<?php echo base_url(); ?>math">Calculate Your Sale</a>
								</div>
							</div>
						</div>

						<div class="col-md-3">
							<div class="member_area_box">
								<img src="assets/images/deal.jpg" class="img-fluid member_area_box_img">
								<div class="member_area_box_info">
									<h3>Your Deal(s)</h3>
									<a class="btn theme_btn btn_redius" href="<?php echo base_url(); ?>yourdeal">Your Deal(s) Here</a>
								</div>
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