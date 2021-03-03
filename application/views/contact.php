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
							<h1 class="subheader_title">Contact Us</h1>
						</div>
					</div>
				</div>
			</section>

			<section>
				<div class="container">
					<div class="row">
						<div class="col-lg-4">
							<div class="info">
								<div class="address">
									<i class="fa fa-map-marker"></i>
									<h4>Location:</h4>
									<p>5968, Atlanta Hwy, Flowery Branch, GA, 30542</p>
								</div>
								<div class="email">
									<i class="fa fa-envelope"></i>
									<h4>Email:</h4>
									<p>bubba@bubbadms.com</p>
								</div>
								<div class="phone">
									<i class="fa fa-phone"></i>
									<h4>Call:</h4>
									<p>(678)866-0750</p>
								</div>
								<div class="phone">
									<i class="fa fa-phone"></i>
									<h4>Toll Free Number:</h4>
									<p>+1(888)577-9809</p>
								</div>
							</div>
						</div>
						<div class="col-lg-8 mt-5 mt-lg-0">
							<form id="contact_form">
								<div class="form-row">
									<div class="col-md-6 form-group">
										<input type="text" name="contact_name" id="contact_name" class="form-control form_field" required />
										<label class="form_label">Name</label>
									</div>
									<div class="col-md-6 form-group">
										<input type="email" name="contact_email" id="contact_email" class="form-control form_field" required />
										<label class="form_label">Email</label>
									</div>
								</div>
								<div class="form-group">
									<input type="text" name="contact_subject" id="contact_subject" class="form-control form_field" required />
									<label class="form_label">Subject</label>
								</div>
								<div class="form-group">
									<textarea name="contact_msg" id="contact_msg" class="form-control form_field" required /></textarea>
									<label class="form_label">Message</label>
								</div>
								<div class="text-center"><button type="submit" class="form_btn">Send Message</button></div>
							</form>
						</div>
					</div>
				</div>
			</section>

		</div>

	<?php $this->load->view('common/footer');?>	

	</body>
	<?php $this->load->view('common/footer-script');?>
</html>