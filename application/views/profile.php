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
							<h1 class="subheader_title">Dealer Settings</h1>
						</div>
					</div>
				</div>
			</section>

			<?php $this->load->view('common/header_nav');?>

			<section class="gray_bg">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<h3 class="center">Dealer Profile</h3>
						</div>
					</div>
					<div class="row">
						<div class="col-md-8 offset-md-2">
							<form class="profile_form" id="edit_dealer_profile_form">
								<div class="form-group">
				     				<input type="text" name="edit_profile_firstname" id="edit_profile_firstname" class="form-control form_field" value="<?php echo $memberdata->first_name ?>" required="">
				     				<label class="form_label">First name</label>
				     			</div>
				     			<div class="form-group">
				     				<input type="text" name="edit_profile_lastname" id="edit_profile_lastname" class="form-control form_field" value="<?php echo $memberdata->last_name ?>" required="">
				     				<label class="form_label">Last name</label>
				     			</div>
				     			<div class="form-group">
				     				<input type="email" name="edit_profile_email" id="edit_profile_email" class="form-control form_field" value="<?php echo $memberdata->email ?>" required="" readonly>
				     				<label class="form_label viewlabel">Email</label>
				     			</div>
				     			<!-- <div class="form-group">
				     				<input type="text" name="edit_profile_password" id="edit_profile_password" class="form-control form_field">
				     				<a href="javascript:;" class="hide-password">Show</a>
				     				<label class="form_label">Password</label>
				     			</div> -->
				     			<div class="form-group">
				     				<input type="text" name="edit_profile_phone" id="edit_profile_phone" class="form-control form_field" value="<?php echo $memberdata->phone ?>" required="">
				     				<label class="form_label">Phone</label>
				     			</div>
				     			<div class="form-group">
				     				<input type="text" name="edit_profile_website" id="edit_profile_website" class="form-control form_field" value="<?php echo $memberdata->website ?>">
				     				<label class="form_label">Website</label>
				     			</div>
				     			<div class="form-group">
				     				<input type="text" name="edit_profile_address" id="edit_profile_address" class="form-control form_field" value="<?php echo $memberdata->address ?>" required="">
				     				<label class="form_label">Address</label>
				     			</div>
				     			<div class="form-group">
				     				<input type="text" name="edit_profile_city" id="edit_profile_city" class="form-control form_field" value="<?php echo $memberdata->city ?>" required="">
				     				<label class="form_label">City</label>
				     			</div>
				     			<div class="form-group">
				     				<!-- <input type="text" name="edit_profile_state" id="edit_profile_state" class="form-control form_field" value="<?php //echo $memberdata->state ?>" required=""> -->
				     				<select name="edit_profile_state" id="edit_profile_state" class="form-control form_field" required="">
									<?php foreach ($states as $key => $value) { ?>
											<option value="<?php echo $value['name'] ?>" <?php if($memberdata->state == $value['name']) echo "selected" ?>><?php echo $value['name'] ?></option>
									<?php } ?>
									</select>
				     				<label class="form_label">State</label>
				     			</div>
				     			<div class="form-group">
				     				<input type="text" name="edit_profile_zip" id="edit_profile_zip" class="form-control form_field" value="<?php echo $memberdata->zip ?>" required="">
				     				<label class="form_label">Zip</label>
				     			</div>
				     			<div class="form-group">
				     				<input type="text" name="edit_profile_companyname" id="edit_profile_companyname" class="form-control form_field" value="<?php echo $memberdata->company_name ?>" required="">
				     				<label class="form_label">Company name</label>
				     			</div>
				     			<div class="form-group">
									<input type="submit" class="form_btn" value="Save">
								</div>
								<!-- profile_update -->
							</form>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<br>
							<br>
							<h4 class="center">Change Password</h4>
						</div>
					</div>
					<div class="row">
						<div class="col-md-8 offset-md-2">
							<form class="profile_form" id="edit_dealer_password_form">
								
				     			<div class="form-group">
				     				<input type="password" name="edit_profile_newpassword" id="edit_profile_newpassword" class="form-control form_field form_field_pass" required="">
				     				<a href="javascript:;" class="hide-password">Show</a>
				     				<label class="form_label">New Password</label>
				     			</div>

				     			<div class="form-group">
				     				<input type="password" name="edit_profile_conpassword" id="edit_profile_conpassword" class="form-control form_field form_field_pass" required="">
				     				<a href="javascript:;" class="hide-password">Show</a>
				     				<label class="form_label">Confirm Password</label>
				     			</div>
				     			
				     			<div class="form-group">
									<input type="submit" class="form_btn" value="Save">
								</div>
								
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