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
		<link rel="stylesheet" type="text/css" href="assets/css/datepicker.css">
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
							<h1 class="subheader_title">Test Drive Bubba</h1>
						</div>
					</div>
				</div>
			</section>

			<section>
				<div class="container">
					<div class="row mb-3">
						<div class="col-md-12">
							<h3 class="center">FREE! 30 Day Test Drive</h3>
						</div>
					</div>

					<div class="row mb-4">
						<div class="col-md-8 offset-md-2">
							<h5 class="center">By hitting REGISTER (Above) and accepting a FREE or PAID Account on Bubba, you agree with our Use Policy</h5>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6 offset-md-3">
							<a href="assets/docs/terms_conditions.pdf" class="start_deal_btn no_b_m" target="_blank">Read and/or save the EULA HERE</a>
						</div>
					</div>

				</div>
			</section>

			<section class="box_info_section" style="margin-top:0;">
				<div class="container">
					<div class="row box_info_row">
						<div class="col-md-12">
							<h2><span class="theme_color">30 DAY</span> FREE TRIAL!</h2>
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

		</div>

	<?php $this->load->view('common/footer');?>	

	</body>
	<?php $this->load->view('common/footer-script');?>	

</html>