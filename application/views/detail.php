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
					<?php  
					/*<div class="row">
						<div class="col-md-12">
							<h3 class="center">Sharing Personal Information</h3>
						</div>
					</div>*/
					?>
					<div class="row">
						<div class="col-md-8 offset-md-2">
							<form class="profile_form" id="edit_dealer_perinfo_form">
								<div class="form-group">
									<div class="col-md-12">
										<h4 class="center">How will you use your customers' personal information?</h4>
									</div>
								</div>
								<div class="form-group">
				     				<label class="label_1">For our everyday business purposes</label>
				     				<div class="radio">
									    <input id="business_purposes_yes" name="business_purposes" type="radio" value="yes" <?php if($memberdata->ebd == "yes") echo "checked"; ?>>
									    <label for="business_purposes_yes" class="radio-label">Yes</label>
									</div>
									<div class="radio">
									    <input id="business_purposes_no" name="business_purposes" type="radio" value="no" <?php if($memberdata->ebd == "no") echo "checked"; ?>>
									    <label for="business_purposes_no" class="radio-label">No</label>
									</div>
				     			</div>
				     			<div class="form-group">
				     				<label class="label_1">For our marketing purposes</label>
				     				<div class="radio">
									    <input id="marketing_purposes_yes" name="marketing_purposes" type="radio" value="yes" <?php if($memberdata->omp == "yes") echo "checked"; ?>>
									    <label for="marketing_purposes_yes" class="radio-label">Yes</label>
									</div>
									<div class="radio">
									    <input id="marketing_purposes_no" name="marketing_purposes" type="radio" value="no" <?php if($memberdata->omp == "no") echo "checked"; ?>>
									    <label for="marketing_purposes_no" class="radio-label">No</label>
									</div>
				     			</div>
				     			<div class="form-group">
				     				<label class="label_1">For joint marketing with other financial companies</label>
				     				<div class="radio">
									    <input id="financial_yes" name="financial" type="radio" value="yes" <?php if($memberdata->jmf == "yes") echo "checked"; ?>>
									    <label for="financial_yes" class="radio-label">Yes</label>
									</div>
									<div class="radio">
									    <input id="financial_no" name="financial" type="radio" value="no" <?php if($memberdata->jmf == "no") echo "checked"; ?>>
									    <label for="financial_no" class="radio-label">No</label>
									</div>
				     			</div>
				     			<div class="form-group">
				     				<label class="label_1">For our affiliates' everyday business purposes<br>(information about your transactions and experiences)</label>
				     				<div class="radio">
									    <input id="affiliates_yes" name="affiliates" type="radio" value="yes" <?php if($memberdata->aebt == "yes") echo "checked"; ?>>
									    <label for="affiliates_yes" class="radio-label">Yes</label>
									</div>
									<div class="radio">
									    <input id="affiliates_no" name="affiliates" type="radio" value="no" <?php if($memberdata->aebt == "no") echo "checked"; ?>>
									    <label for="affiliates_no" class="radio-label">No</label>
									</div>
				     			</div>
				     			<div class="form-group">
				     				<label class="label_1">For our affiliates' everyday business purposes<br>(information about your creditworthiness)</label>
				     				<div class="radio">
									    <input id="affiliates_everyday_yes" name="affiliates_everyday" type="radio" value="yes" <?php if($memberdata->aebc == "yes") echo "checked"; ?>>
									    <label for="affiliates_everyday_yes" class="radio-label">Yes</label>
									</div>
									<div class="radio">
									    <input id="affiliates_everyday_no" name="affiliates_everyday" type="radio" value="no" <?php if($memberdata->aebc == "no") echo "checked"; ?>>
									    <label for="affiliates_everyday_no" class="radio-label">No</label>
									</div>
				     			</div>
				     			<div class="form-group">
				     				<label class="label_1">For our affiliates to market to you</label>
				     				<div class="radio">
									    <input id="affiliates_market_yes" name="affiliates_market" type="radio" value="yes" <?php if($memberdata->atm == "yes") echo "checked"; ?>>
									    <label for="affiliates_market_yes" class="radio-label">Yes</label>
									</div>
									<div class="radio">
									    <input id="affiliates_market_no" name="affiliates_market" type="radio" value="no" <?php if($memberdata->atm == "no") echo "checked"; ?>>
									    <label for="affiliates_market_no" class="radio-label">No</label>
									</div>
				     			</div>
				     			<div class="form-group">
				     				<label class="label_1">For nonaffiliates to market to you</label>
				     				<div class="radio">
									    <input id="nonaffiliates_yes" name="nonaffiliates" type="radio" value="yes" <?php if($memberdata->natm == "yes") echo "checked"; ?>>
									    <label for="nonaffiliates_yes" class="radio-label">Yes</label>
									</div>
									<div class="radio">
									    <input id="nonaffiliates_no" name="nonaffiliates" type="radio" value="no" <?php if($memberdata->natm == "no") echo "checked"; ?>>
									    <label for="nonaffiliates_no" class="radio-label">No</label>
									</div>
				     			</div>
				     			<div class="form-group">
				     				<label class="label_1">Can Sharing Be Limited?</label>
				     				<div class="radio">
									    <input id="sharing_yes" name="sharing" type="radio" value="yes" <?php if($memberdata->share == "yes") echo "checked"; ?>>
									    <label for="sharing_yes" class="radio-label">Yes</label>
									</div>
									<div class="radio">
									    <input id="sharing_no" name="sharing" type="radio" value="no" <?php if($memberdata->share == "no") echo "checked"; ?>> 
									    <label for="sharing_no" class="radio-label">No</label>
									</div>
				     			</div>
								<div class="form-group">
				     				<input type="text" name="taxrate" id="taxrate" class="form-control form_field" 
				     				onfocus="this.value = this.value=='0'?'':this.value;"
				     				onblur="this.value = this.value==''?'0':this.value;"
				     				onkeypress="return isFloatNumber(this,event)"
				     				value="<?php if(!empty($memberdata->tax)) echo $memberdata->tax; else echo "7"; ?>">
				     				<label class="form_label">Tax Rate(ex 0.07)</label>
					     		</div>
					     		<div class="form-group">
					     			<input type="text" name="servicefee" id="servicefee" class="form-control form_field" 
					     			onfocus="this.value = this.value=='0'?'':this.value;"
				     				onblur="this.value = this.value==''?'0':this.value;"
				     				onkeypress="return isFloatNumber(this,event)"
				     				value="<?php echo $memberdata->dealer_fee; ?>">
					     			<label class="form_label">Service Fee</label>
					     		</div>
					     		<div class="form-group">
					     			<input type="text" name="tagregistration" id="tagregistration" class="form-control form_field" 
					     			onfocus="this.value = this.value=='0'?'':this.value;"
				     				onblur="this.value = this.value==''?'0':this.value;"
				     				onkeypress="return isFloatNumber(this,event)"
				     				value="<?php echo $memberdata->dmv; ?>">
					     			<label class="form_label">Tag/Registration</label>
					     		</div>
					     		<div class="form-group">
					     			<input type="text" name="saletax" id="saletax" class="form-control form_field" 
					     			onfocus="this.value = this.value=='0'?'':this.value;"
				     				onblur="this.value = this.value==''?'0':this.value;"
				     				onkeypress="return isFloatNumber(this,event)"
				     				value="<?php echo $memberdata->saletax; ?>">
					     			<label class="form_label">Sales Tax #</label>
					     		</div>
					     		<div class="form-group">
					     			<input type="text" name="twelve_digit_number" id="twelve_digit_number" class="form-control form_field" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'');" value="<?php echo $memberdata->twelve_digit_number; ?>" maxlength="12"  >
					     			<?php // pattern="[A-Za-z0-9]{12}" title="Special character not allowed and must of 12-Digit" style="text-transform: uppercase;"?>
					     			<label class="form_label">12-Digit Dealer Number</label>
					     		</div>
				     			<div class="form-group">
									<input type="submit" class="form_btn" value="Update Profile">
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