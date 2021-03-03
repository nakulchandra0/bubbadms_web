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
			<section class="gray_bg login_signup_section">
				<div class="container">
					<div class="col-md-6 offset-md-3">
						<div class="login_signup_tabs">
						  	<ul class="login_signup_tabsnav">
						    	<li <?php if(empty($packagedata)) echo 'class="login_signup_tabactive"' ?>><a href="#login">Login</a></li>
						    	<li <?php if(!empty($packagedata)) echo 'class="login_signup_tabactive"'; else echo 'class=""' ?>><a href="#signup">Signup</a></li>
						  	</ul>
						  	<div class="login_signup_tabsstage">
						    	<div id="login" <?php if(empty($packagedata)) echo 'style="display: block;"'; else echo 'style="display: none;"' ?>>
						     		<form class="login_form" method="POST">
						     			<h3 class="form_title">Login</h3>
						     			<div class="form-group">
						     				<input type="email" name="login_email" id="login_email" class="form-control form_field" autocomplete="off" required>
						     				<label class="form_label viewlabel">Email</label>
						     			</div>
						     			<div class="form-group">
						     				<div class="form_position">
							     				<input type="password" name="login_password" id="login_password" class="form-control form_field" autocomplete="off" required>
						     					<label class="form_label viewlabel">Password</label>
							     				<a href="javascript:;" class="hide-password">Show</a>
							     			</div>
						     			</div>
						     			<div class="form-group">
						     				<span>
												<input type="checkbox" id="remember-me" checked="">
												<label for="remember-me">Remember me</label>
											</span>
											<span class="right">
												<a href="javascript:;" class="forgot_pass">Forgot Password</a>
											</span>
										</div>
						     			<div class="form-group">
						     				<input type="button" name="" value="Sign In" class="form_btn user_login_btn">
						     			</div>
						     		</form>
						     		<form class="forgot_form" id="login_forgot_form" method="POST" style="display: none;">
						     			<h3 class="form_title">Forgot Password</h3>
						     			<p class="form_title">Lost your password? Please enter your email address. You will receive a link to create a new password.</p>
						     			<div class="form-group">
						     				<input type="email" name="login_reset_email" id="login_reset_email" class="form-control form_field" required>
						     				<label class="form_label">Email</label>
						     			</div>
						     			<div class="form-group">
						     				<input type="submit" value="Reset password" class="form_btn">
						     			</div>
						     			<div class="form-group">
						     				<div class="center">
												<a href="javascript:;" class="back_login">Back to Login</a>
											</div>
										</div>
						     		</form>
						    	</div>
						    	<div id="signup" <?php if(!empty($packagedata)) echo 'style="display: block;"'; else echo 'style="display: none;"' ?>>
						      		<form class="signup_form" id="user_signup_form">
						      			<h3 class="form_title">Signup</h3>
						      			<?php if(!empty($packagedata)){ ?>
						      				<h5 class="form_title">You have selected "<?php echo $packagedata->group_title ?>" package</h5>
						      			<?php }?>
										<input type="hidden" name="signup_planid" value="<?php if(!empty($packagedata)) echo $packagedata->id ?>">
						      			<div class="form-group">
						     				<input type="text" name="signup_firstname" id="signup_firstname" class="form-control form_field" required>
						     				<label class="form_label">First name</label>
						     			</div>
						     			<div class="form-group">
						     				<input type="text" name="signup_lastname" id="signup_lastname" class="form-control form_field" required>
						     				<label class="form_label">Last name</label>
						     			</div>
						     			<div class="form-group">
						     				<input type="email" name="signup_email" id="signup_email" class="form-control form_field" autocomplete="off" required>
						     				<label class="form_label">Email</label>
						     			</div>
						     			<div class="form-group">
						     				<div class="form_position">
							     				<input type="password" name="signup_password" id="signup_password" class="form-control form_field" autocomplete="off" required>
						     					<label class="form_label">Password</label>
							     				<a href="javascript:;" class="hide-password">Show</a>
												</div>
												<p>No Requirements</p>
							     		</div>




											<div class="form-group">
						     				<div class="form_position">
							     				<input type="password" name="signup_conpassword" id="signup_conpassword" class="form-control form_field" autocomplete="off" required>
						     					<label class="form_label">Confirm Password</label>
							     				<a href="javascript:;" class="hide-password">Show</a>
							     			</div>
						     			</div>
						     			<div class="form-group">
						     				<input type="tel" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" name="signup_phone" id="signup_phone" class="form-control form_field" required>
						     				<label class="form_label">Phone</label>
						     			</div>
						     			<div class="form-group">
						     				<input type="text" name="signup_website" id="signup_website" class="form-control form_field">
						     				<label class="form_label">Website</label>
						     			</div>
						     			<div class="form-group">
						     				<input type="text" name="signup_address" id="signup_address" class="form-control form_field" required>
						     				<label class="form_label">Address</label>
						     			</div>
						     			<div class="form-group">
						     				<input type="text" name="signup_city" id="signup_city" class="form-control form_field" required>
						     				<label class="form_label">City</label>
						     			</div>
						     			<div class="form-group">
						     				<!-- <input type="text" name="signup_state" id="signup_state" class="form-control form_field" required> -->
						     				<select name="signup_state" id="signup_state" class="form-control form_field" required="">
						     					<?php foreach ($states as $key => $value) { ?>
						     						<option value="<?php echo $value['name'] ?>"><?php echo $value['name'] ?></option>
						     					<?php } ?>
						     				</select>
						     				<label class="form_label">State</label>
						     			</div>
						     			<div class="form-group">
						     				<input type="text" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" name="signup_zipcode" id="signup_zipcode" class="form-control form_field" required>
						     				<label class="form_label">Zip</label>
						     			</div>
						     			<div class="form-group">
						     				<input type="text" name="signup_company" id="signup_company" class="form-control form_field" required>
						     				<label class="form_label">Company name</label>
						     			</div>
						     			<div class="form-group">
						     				<label class="form_label_"><input type="checkbox" name="signup_terms" id="signup_terms" class="form-control form_field" required style="display: inline;vertical-align: middle;">
						     				 I agree to the terms and condition of the </label><a href="https://bubbadms.com/assets/docs/terms_conditions.pdf"> EULA</a>
						     			</div>
						     			<div class="form-group">
						     				<input type="submit" name="user_signup_btn" value="Sign Up" class="form_btn user_signup_btn">
						     			</div>
						     		</form>
						    	</div>
						  	</div>
						</div>
					</div>
				</div>
			</section>
		</div>
		<div>
		<form id="do_signup_form" action="<?php echo base_url() ?>home/payment_finish" method="post">
	  	<input type="hidden" name="signupform_planid" value="<?php if(!empty($packagedata)) echo $packagedata->id ?>">
	  	</form>
		</div>

	<?php $this->load->view('common/footer');?>

	</body>
	<?php $this->load->view('common/footer-script');?>

	<script type="text/javascript">
		$(document).ready(function() {
  setTimeout(function(){
    $('[autocomplete=off]').val('');
  }, 15);
});
	</script>

</html>
