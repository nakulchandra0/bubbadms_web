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
						<h1 class="subheader_title">Calculator</h1>
					</div>
				</div>
			</div>
		</section>

		<section>
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h3 class="center">The Numbers For Bobby Whiten With TDS inc</h3>
					</div>
				</div>

				<div class="row">
					<div class="col-md-6">
						<form class="profile_form">
							<div class="form-group">
								<input type="number" name="math_saleprice" id="math_saleprice" class="form-control form_field" required="" onkeyup="return autocalculater()">
								<label class="form_label">Vehicle Price</label>
							</div>
							<div class="form-group">
								<input type="number" name="math_cashcredit" id="math_cashcredit" class="form-control form_field" value="0" required="" onfocus="this.value = this.value=='0'?'':this.value;" onblur="this.value = this.value==''?'0':this.value;" onkeyup="return autocalculater()">
								<label class="form_label">Down Payment</label>
							</div>
							<div class="form-group">
								<input type="number" name="math_tradecredit" id="math_tradecredit" class="form-control form_field" value="0" required="" onfocus="this.value = this.value=='0'?'':this.value;" onblur="this.value = this.value==''?'0':this.value;" onkeyup="return autocalculater()">
								<label class="form_label">Trade In Credit</label>
							</div>

				     			<!-- <div class="form-group">
				     				<input type="number" name="math_tradebalance" id="math_tradebalance" class="form-control form_field" required="">
				     				<label class="form_label">Trade Balance</label>
				     			</div> -->
				     			<div class="form-group">
				     				<input type="number" name="math_tavtprice" id="math_tavtprice" class="form-control form_field" value="0" required="" onfocus="this.value = this.value=='0'?'':this.value;" onblur="this.value = this.value==''?'0':this.value;" onkeyup="return autocalculater()">
				     				<label class="form_label">GA TAVT Price</label>
				     			</div>
				     			<div class="form-group">
				     				<input type="text" name="math_taxrate" id="math_taxrate" class="form-control form_field" value="7" required="" onfocus="this.value = this.value=='0'?'':this.value;" onblur="this.value = this.value==''?'0':this.value;" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,''); return autocalculater()">
				     				<label class="form_label">Tax Rate(ex 7)</label>
				     			</div>
				     			<div class="form-group">
				     				<input type="number" name="math_servicefee" id="math_servicefee" class="form-control form_field" value="0" required="" onfocus="this.value = this.value=='0'?'':this.value;" onblur="this.value = this.value==''?'0':this.value;" onkeyup="return autocalculater()">
				     				<label class="form_label">Service Fee</label>
				     			</div>
				     			<div class="form-group">
				     				<input type="number" name="math_tagregistration" id="math_tagregistration" class="form-control form_field" value="0" onfocus="this.value = this.value=='0'?'':this.value;" onblur="this.value = this.value==''?'0':this.value;" required="" onkeyup="return autocalculater()">
				     				<label class="form_label">Tag/Registration</label>
				     			</div>
				     			<div class="form-group">
				     				<input type="hidden" class="form_btn" id="math_btn_total" value="Total">
				     			</div>
				     			<div class="form-group">
				     				<input type="text" name="math_taxdue" id="math_taxdue" class="form-control form_field" onkeypress="return isFloatNumber(this,event)" required="">
				     				<label class="form_label">Tax Due</label>
				     			</div>
				     			<div class="form-group">
				     				<input type="text" name="math_totaldue" id="math_totaldue" class="form-control form_field" onkeypress="return isFloatNumber(this,event)" required="">
				     				<label class="form_label">Total Due</label>
				     			</div>
				     		</form>
				     	</div>
				     	<div class="col-md-6">
				     		<div class="profile_form">
				     			<h4 class="center">GA TAVT</h4>
				     			<a href="https://eservices.drives.ga.gov/_/#message" target="_blank" class="btn form_btn center">Link to GA TAVT Calculator</a>
				     		</div>
				     		<form class="profile_form" id="payment_calc_form">
				     			<h4 class="center">Bubba's Payment Calculator</h4>
				     			<p class="center">(For Buyer's Monthly Payment)</p>
				     			<div class="row">
				     				<div class="col-md-6">
				     					<div class="form-group">
						     				<label class="checkbox1">Monthly
											  	<input type="checkbox" class="chb" value="monthly" checked="">
											  	<span class="checkmark"></span>
											</label>
						     			</div>
				     				</div>
				     				<div class="col-md-6">
				     					<div class="form-group">
						     				<label class="checkbox1">Bi-weekly
											  	<input type="checkbox" class="chb" value="biweekly">
											  	<span class="checkmark"></span>
											</label>
						     			</div>
				     				</div>
				     			</div>
				     			<div class="form-group">
				     				<input type="text" name="calc_ammount_finance" id="calc_ammount_finance" class="form-control form_field" onkeypress="return isFloatNumber(this,event)" required="">
				     				<label class="form_label">Amount to Finance</label>
				     			</div>
				     			<div class="form-group">
				     				<input type="text" name="calc_downpayment" id="calc_downpayment" class="form-control form_field" onkeypress="return isFloatNumber(this,event)">
				     				<label class="form_label viewlabel">Additional Down Payment</label>
				     			</div>
				     			<!-- <div class="form-group">
				     				<input type="number" name="calc_tradein_credit" id="calc_tradein_credit" class="form-control form_field">
				     				<label class="form_label">Trade-in Credit</label>
				     			</div> -->
				     			<div class="form-group">
				     				<select class="form-control form_field" name="calc_loan_length_select" id="calc_loan_length_select" required="">
				     					<option value="12">12 months</option> 
				     					<option value="24">24 months</option> 
				     					<option value="36">36 months</option> 
				     					<option value="48">48 months</option> 
				     					<option value="60" selected="selected">60 months</option> 
				     					<option value="72">72 months</option> 
				     					<option value="84">84 months</option>
				     				</select>
				     				<label class="form_label">Loan Length</label>
				     			</div>
				     			<div class="form-group">
				     				<input type="text" name="calc_interest_rate" id="calc_interest_rate" class="form-control form_field" onkeypress="return isFloatNumber(this,event)" required="">
				     				<label class="form_label">Interest Rate(ex 7)</label>
				     			</div>
				     			<div class="form-group">
				     				<input type="submit" class="form_btn" value="Calculate">
				     			</div>
				     			<table class="table">

				     				<!-- Monthly Payment -->
				     				<tr class="calc_result_monthly">
				     					<td><h6 class="calculator_title">Payment</h6></td>
				     					<td><h6 class="calculator_data" id="calc_result_monthly_payment">$0.00</h6></td>
				     				</tr>
				     				<!-- Bi-Weekly Payment -->
				     				<tr class="calc_result_biweekly" style="display: none">
				     					<td><h6 class="calculator_title">Payment</h6></td>
				     					<td><h6 class="calculator_data" id="calc_result_biweekly_payment">$0.00</h6></td>
				     				</tr>
				     				<!-- <tr>
				     					<td><h6 class="calculator_title">Weekly Payment</h6></td>
				     					<td><h6 class="calculator_data" id="calc_result_weekly_payment">$0.00</h6></td>
				     				</tr> -->
				     				<!-- 
				     				total payment
				     				total interest 
				     			-->
				     			<!-- Monthly payments interest -->
				     			<tr class="calc_result_monthly">
				     				<td><h6 class="calculator_title">Payments interest</h6></td>
				     				<td><h6 class="calculator_data" id="calc_result_monthly_interest">$0.00</h6></td>
				     			</tr>
				     			<!-- Biweekly payments interest -->
				     			<tr class="calc_result_biweekly" style="display: none">
				     				<td><h6 class="calculator_title">Payments interest</h6></td>
				     				<td><h6 class="calculator_data" id="calc_result_biweekly_interest">$0.00</h6></td>
				     			</tr>
				     			<!-- Monthly total payment -->
				     			<tr class="calc_result_monthly">
				     				<td><h6 class="calculator_title">Total payment</h6></td>
				     				<td><h6 class="calculator_data" id="calc_result_total_payment">$0.00</h6></td>
				     			</tr>
				     			<!-- Biweekly total payment -->
				     			<tr class="calc_result_biweekly" style="display: none">
				     				<td><h6 class="calculator_title">Total payment</h6></td>
				     				<td><h6 class="calculator_data" id="calc_result_biweekly_total_payment">$0.00</h6></td>
				     			</tr>
				     		</table>
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