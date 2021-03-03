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
		<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

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
						<div class="col-md-12">
							<form id="dealform">

								<ul id="progressbar">
									<?php
									/**<li <?php if(empty($transaction_data)) echo "class='active'" ?>><span>Choose A Vehicle in Inventory</span></li>
									<li><span>Choose A Vehicle in Trade</span></li>
									<li><span>Choose Buyer</span></li>
									<li><span>Choose Co-Buyer</span></li>
									<li><span>Choose Insurance</span></li>
									<li><span>Payment Calculator</span></li>
									<li <?php if(!empty($transaction_data)) echo "class='active'" ?>><span>Review</span></li> **/
									 ?>
								    <li <?php if(empty($transaction_data)) echo "class='active'" ?>><span>Inventory</span></li>
								    <li><span>Trade In</span></li>
								    <li><span>Buyer</span></li>
								    <li><span>Co-Buyer</span></li>
								    <li><span>Insurance</span></li>
								    <li><span>Payment Calculator</span></li>
								    <li <?php if(!empty($transaction_data)) echo "class='active'" ?>><span>Review</span></li>
								</ul>

							 	<div class="step_group" <?php if(!empty($transaction_data)) echo "style='display: none; left: 50%; opacity: 0;'" ?>>
							 		<h3 class="center no_d_desk">Choose A Vehicle in Inventory</h3>
								  	<div class="row row-flex">
								  		<!-- <div class="col-md-6">
								  			<div class="box">
								  				<h3 class="center">Inventory - Stock In</h3>
												<h6 class="center mb-3">Add Vehicle in Inventory</h6>
								     			<div class="form-group">
													<input type="button" data-dismiss="modal" data-toggle="modal" data-target="#add_inventory" class="form_btn" value="Add Vehicle">
												</div>
								  			</div>
								  		</div> -->

								  		<div class="col-md-12">
								  			<div class="box">
								  				<h3 class="center">Carfax</h3>
												<a href="https://www.carfax.com" target="_blank" class="btn form_btn center">Link to Carfax</a>
								  			</div>
								  		</div>
								  		<input type="hidden" name="vishal" id="vishal" value="vishal">

								  		<div class="col-md-12">
										  	<div class="box">
												<h3 class="center">Inventory</h3>
												<h6 class="center mb-4">Choose Vehicle From Your Inventory</h6>
												<div class="form-group">
								     				<select class="form-control form_field select2" required="" name="sd_main_inventory_inv_id" id="sd_main_inventory_inv_id">
								     					<option value="0">Choose Vehicle</option>
								     					<?php foreach ($inventory_data as $value) { ?>
								     						<option value="<?php echo $value['inv_id'] ?>"><?php echo $value['inv_stock'].' '.$value['inv_year'].' '.$value['inv_make'].' ('.$value['inv_model'].') VIN '.$value['inv_vin']; ?></option>
								     					<?php } ?>
								     					<?php //if(!empty($transaction_data)) if($transaction_data->inv_id == $value['inv_id']) echo "selected";
								     					if(!empty($transaction_data)){ ?>
								     						<option value="<?php echo $transaction_data->inv_id ?>" selected><?php echo $transaction_data->inv_stock.' '.$transaction_data->inv_year.' '.$transaction_data->inv_make.' ('.$transaction_data->inv_model.') VIN '.$transaction_data->inv_vin; ?></option>
								     					<?php } ?>

								     					<!-- <option>123456789 2009 Hyundai (Sports) VIN ABCD1234</option> -->
								     				</select>
								     				<label class="form_label">Select Vehicle</label>
								     				<div id="hidden_div_inv_price">
								     				<?php foreach ($inventory_data as $value) { ?>
								     						<input type="hidden" id="hidden_inv_price<?php echo $value['inv_id'] ?>" value="<?php echo $value['inv_price'] ?>">
								     					<?php } ?>
								     				</div>
								     			</div>
								     			<h4 class="center">OR</h4>
								     			<div class="form-group">
													<input type="button" data-dismiss="modal" data-toggle="modal" data-target="#add_inventory" class="form_btn" value="Add Vehicle">
												</div>
											</div>
										</div>
									</div>
							    	<input type="button" name="next" class="next action-button" id="next_inventory" value="Next" />
								</div>

								<div class="step_group">
									<h3 class="center no_d_desk">Choose A Vehicle in Trade</h3>
								  	<div class="row row-flex">
								  		<!-- <div class="col-md-6">
								  			<div class="box">
								  				<h3 class="center">Trade In</h3>
												<h6 class="center mb-3">Add Vehicle in Trade-In</h6>
								     			<div class="form-group">
													<input type="button" data-dismiss="modal" data-toggle="modal" data-target="#add_trade" class="form_btn" value="Add Vehicle">
												</div>
								  			</div>
								  		</div> -->
								  		<div class="col-md-12">
										  	<div class="box">
												<h3 class="center">Trade In</h3>
												<h6 class="center mb-4">Choose Vehicle From Your Trade</h6>
												<div class="form-group">
								     				<select class="form-control form_field select2" name="sd_main_trade_inv_id" id="sd_main_trade_inv_id">
								     					<option value="0">Choose Vehicle for Trade</option>
								     					<?php foreach ($trade_data as $value) { ?>
								     						<option value="<?php echo $value['trade_inv_id'] ?>">
								     							<?php echo $value['trade_inv_year'].' '.$value['trade_inv_make'].' ('.$value['trade_inv_model'].') VIN '.$value['trade_inv_vin']; ?>
								     						</option>
								     					<?php } ?>

								     					<?php //if(!empty($transaction_data)) if($transaction_data->inv_id == $value['inv_id']) echo "selected";
								     					if(!empty($transaction_data)){
								     						if($transaction_data->trade_inv_id != 0){?>
								     						<option value="<?php echo $transaction_data->trade_inv_id ?>" selected>
								     							<?php echo $transaction_data->trade_inv_year.' '.$transaction_data->trade_inv_make.' ('.$transaction_data->trade_inv_model.') VIN '.$transaction_data->trade_inv_vin; ?>
								     						</option>
								     					<?php }} ?>

								     					<!-- <option>123456789 2009 Hyundai (Sports) VIN ABCD1234</option> -->
								     				</select>
								     				<label class="form_label">Select Vehicle</label>
								     				<div id="hidden_div_trade_inv_price">
								     				<?php foreach ($trade_data as $value) { ?>
								     						<input type="hidden" id="hidden_trade_inv_price<?php echo $value['trade_inv_id'] ?>" value="<?php echo $value['trade_inv_price'] ?>">
								     					<?php } ?>
								     				</div>
								     			</div>
								     			<h4 class="center">OR</h4>
								     			<div class="form-group">
													<input type="button" data-dismiss="modal" data-toggle="modal" data-target="#add_trade" class="form_btn" value="Add Vehicle">
												</div>
											</div>
										</div>
									</div>
							    	<input type="button" name="previous" class="previous action-button" value="Previous" />
							    	<input type="button" name="next" class="next action-button" id="next_trade" value="Next" style="display: none"/>
							    	<input type="button" name="next" class="next action-button" id="next_trade_skip" value="Skip" style="display: none"/>
								</div>

								<div class="step_group">
									<h3 class="center no_d_desk">Choose Buyer</h3>
								  	<div class="row row-flex">
								  		<!-- <div class="col-md-6">
								  			<div class="box">
								  				<h3 class="center">Buyer</h3>
												<h6 class="center mb-3">Add new Buyer</h6>
								     			<div class="form-group">
													<input type="button" data-dismiss="modal" data-toggle="modal" data-target="#add_buyer" class="form_btn" value="Add Buyer">
												</div>
								  			</div>
								  		</div> -->
								  		<div class="col-md-12">
										  	<div class="box">
												<h3 class="center">Buyer</h3>
												<h6 class="center mb-4">Choose existing buyer</h6>
												<div class="form-group">
								     				<select class="form-control form_field" required="" name="sd_main_buyers_id" id="sd_main_buyers_id">
								     					<option value="0">Choose buyer</option>
								     					<?php foreach ($buyers_data as $value) { ?>
								     						<option value="<?php echo $value['buyers_id'] ?>">
								     							<?php echo $value['buyers_first_name'].' '.$value['buyers_last_name'] ?>
								     						</option>
								     					<?php } ?>

								     					<?php if(!empty($transaction_data)){ ?>
								     						<option value="<?php echo $transaction_data->buyers_id ?>" selected>
								     							<?php echo $transaction_data->buyers_first_name.' '.$transaction_data->buyers_last_name ?>
								     						</option>
								     					<?php } ?>

								     				</select>
								     				<label class="form_label">Select Buyer</label>
								     			</div>
								     			<h4 class="center">OR</h4>
								     			<div class="form-group">
													<input type="button" data-dismiss="modal" data-toggle="modal" data-target="#add_buyer" class="form_btn" value="Add Buyer">
												</div>
											</div>
										</div>
									</div>
							    	<input type="button" name="previous" class="previous action-button" value="Previous" />
							    	<input type="button" name="next" class="next action-button" id="next_buyers" value="Next" style="<?php if(empty($transaction_data))echo "display: none" ?>"/>
								</div>

								<div class="step_group">
									<h3 class="center no_d_desk">Choose Co-Buyer</h3>
								  	<div class="row row-flex">
								  		<!-- <div class="col-md-6">
								  			<div class="box">
								  				<h3 class="center">Co-Buyer</h3>
												<h6 class="center mb-3">Add new Co-Buyer</h6>
								     			<div class="form-group">
													<input type="button" data-dismiss="modal" data-toggle="modal" data-target="#add_cobuyer" class="form_btn" value="Add Co-Buyer">
												</div>
								  			</div>
								  		</div> -->
								  		<div class="col-md-12">
										  	<div class="box">
												<h3 class="center">Co-Buyer</h3>
												<h6 class="center mb-4">Choose existing co-buyer</h6>
												<div class="form-group">
								     				<select class="form-control form_field" name="sd_main_cobuyers_id" id="sd_main_cobuyers_id">
															<option value="0">Choose Co-buyer</option>
								     					<option value="0">No Co-buyer</option>
								     					<!-- option id="sd_main_option_cobuyer"></option> -->
								     					<?php /*foreach ($buyers_data as $value) {
								     						if(!empty($value['co_buyers_first_name'])){
								     						?>
								     						<option value="<?php echo $value['buyers_id'] ?>"><?php echo $value['co_buyers_first_name'].' '.$value['co_buyers_last_name'] ?></option>
								     					<?php } }*/ ?>
								     					<?php if(!empty($transaction_data)){
																if(!empty($buyers_trans_data)){
																	if(!empty($buyers_trans_data->co_buyers_first_name)){ ?>
																		<option value="<?php echo $transaction_data->buyers_id ?>" selected>
										     							<?php echo $buyers_trans_data->co_buyers_first_name.' '.$buyers_trans_data->co_buyers_last_name ?>
										     						</option>
																<?php	}
																}
															} ?>
								     				</select>
								     				<label class="form_label">Select Co-Buyer</label>
								     			</div>
								     			<h4 class="center">OR</h4>
								     			<div class="form-group">
													<input type="button" data-dismiss="modal" data-toggle="modal" data-target="#add_cobuyer" class="form_btn" value="Add Co-Buyer">
												</div>
											</div>
										</div>
									</div>
							    	<input type="button" name="previous" class="previous action-button" value="Previous" />
							    	<input type="button" name="next" class="next action-button" id="next_cobuyers" value="Next"/>
							    	<input type="button" name="next" class="next action-button" id="next_cobuyers_skip" value="Skip"/>
								</div>

								<div class="step_group">
									<h3 class="center no_d_desk">Choose Insurance</h3>
								  	<div class="row row-flex">
								  		<!-- <div class="col-md-6">
								  			<div class="box">
								  				<h3 class="center">Insurance</h3>
												<h6 class="center mb-3">Add Insurance</h6>
								     			<div class="form-group">
													<input type="button" data-dismiss="modal" data-toggle="modal" data-target="#add_insurance" class="form_btn" value="Add Insurance">
												</div>
								  			</div>
								  		</div> -->
								  		<div class="col-md-12">
										  	<div class="box">
												<h3 class="center">Insurance</h3>
												<h6 class="center mb-4">Choose the Insurance Policy or Add a new one</h6>
												<div class="form-group">
								     				<select class="form-control form_field" name="sd_main_insurance_buyers_id" id="sd_main_insurance_buyers_id">
															<option value="0">Choose Insurance</option>
								     					<option value="0">No Insurance</option>
								     					<!-- <option id="sd_main_option_insurance"></option> -->
								     					<?php /*foreach ($buyers_data as $value) {
								     						if(!empty($value['ins_pol_num'])){
								     						?>
								     						<option value="<?php echo $value['buyers_id'] ?>"><?php echo $value['ins_pol_num']?></option>
								     					<?php } }*/ ?>

															<?php if(!empty($transaction_data)){
																if(!empty($buyers_trans_data)){
																	if(!empty($buyers_trans_data->co_buyers_first_name)){ ?>
																		<option value="<?php echo $transaction_data->buyers_id ?>" selected>
										     							<?php echo $buyers_trans_data->ins_pol_num ?>
										     						</option>
																<?php	}
																}
															} ?>

								     				</select>
								     				<label class="form_label">Select Policy Number</label>
								     			</div>
								     			<h4 class="center">OR</h4>
								     			<div class="form-group">
													<input type="button" data-dismiss="modal" data-toggle="modal" data-target="#add_insurance" class="form_btn" value="Add Insurance">
												</div>
											</div>
										</div>
									</div>
							    	<input type="button" name="previous" class="previous action-button" value="Previous" />
							    	<input type="button" name="next" class="next action-button" id="next_insurance" value="Next"/>
							    	<input type="button" name="next" class="next action-button" id="next_insurance_skip" value="Skip"/>
								</div>

								<div class="step_group">
									<h3 class="center no_d_desk">Payment Calculator</h3>
									<div class="row row-flex">
								  		<div class="col-md-6">
								  			<div class="box">
												<div class="form-group">
													<?php
													/*
								     				<select class="form-control form_field" required="" id="sd_math_buyer_select">
								     					<option value="0">Select Buyer</option>
								     					<?php foreach ($buyers_data as $value) { ?>
								     						<option value="<?php echo $value['buyers_id'] ?>"><?php echo $value['buyers_first_name'].' '.$value['buyers_last_name']; ?></option>
								     					<?php } ?>
								     				</select>*/
													 ?>
													 <input type="text" name="sd_math_buyer_select" id="sd_math_buyer_select" class="form-control form_field" required="" value="<?php if(!empty($transaction_data)) echo $transaction_data->buyers_first_name." ".$transaction_data->buyers_last_name  ?>" readonly>
								     				<label class="form_label viewlabel">Buyer To Select</label>
								     			</div>
								     			<input type="hidden" name="total_due" id="total_due">
								     			<input type="hidden" name="tax" id="tax">
								     			<input type="hidden" name="sub_due" id="sub_due">
								     			<input type="hidden" name="sub_due1" id="sub_due1">
								     			<input type="hidden" name="sub_due2" id="sub_due2">
												<div class="form-group">
								     				<input type="number" name="sd_math_saleprice" id="sd_math_saleprice" class="form-control form_field" onkeyup="return autocalculatersd()" value="<?php if(!empty($transaction_data)) if($transaction_data->status == "processing") echo $buyers_trans_data->sale_price; else echo $transaction_data->sale_price; else echo "0";  ?>">
								     				<label class="form_label">Vehicle Price</label>
								     			</div>
								     			<div class="form-group">
								     				<input type="number" name="sd_math_cashcredit" id="sd_math_cashcredit" class="form-control form_field"
								     				value="<?php if(!empty($transaction_data)) if($transaction_data->status == "processing") echo $buyers_trans_data->cash_credit; else echo $transaction_data->cash_credit; else echo "0";  ?>"
								     				onfocus="this.value = this.value=='0'?'':this.value;" onblur="this.value = this.value==''?'0':this.value;"
								     				onkeyup="return autocalculatersd()">
								     				<label class="form_label">Down Payment</label>
								     			</div>
								     			<div class="form-group">
								     				<input type="number" name="sd_math_tradecredit" id="sd_math_tradecredit" class="form-control form_field"
								     				value="<?php if(!empty($transaction_data)) if($transaction_data->status == "processing") echo $buyers_trans_data->trade_credit; else echo $transaction_data->trade_credit; else echo "0";  ?>"
								     				onfocus="this.value = this.value=='0'?'':this.value;" onblur="this.value = this.value==''?'0':this.value;"
								     				onkeyup="return autocalculatersd()">
								     				<label class="form_label">Trade In Credit</label>
								     			</div>

								     			<!-- <div class="form-group">
								     				<input type="number" name="sd_math_tradebalance" id="sd_math_tradebalance" class="form-control form_field">
								     				<label class="form_label">Trade Balance</label>
								     			</div> -->
								     			<div class="form-group">
								     				<input type="number" name="sd_math_tavtprice" id="sd_math_tavtprice" class="form-control form_field"
								     				value="<?php if(!empty($transaction_data)) if(!empty($buyers_trans_data)) echo $buyers_trans_data->TAVT_price; else echo 0; else echo 0; ?>"
								     				onfocus="this.value = this.value=='0'?'':this.value;" onblur="this.value = this.value==''?'0':this.value;"
								     				onkeyup="return autocalculatersd()">
								     				<label class="form_label">GA TAVT Price</label>
								     			</div>
								     			<div class="form-group">
								     				<input type="text" name="sd_math_taxrate" id="sd_math_taxrate" class="form-control form_field"
								     				value="<?php if(!empty($memberdata->tax)) echo $memberdata->tax; else echo "7"; ?>"
								     				onfocus="this.value = this.value=='0'?'':this.value;" onblur="this.value = this.value==''?'0':this.value;"
								     				onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,''); return autocalculatersd();"
								     				>
								     				<label class="form_label">Tax Rate(ex 7)</label>
								     			</div>
								     			<div class="form-group">
								     				<input type="number" name="sd_math_servicefee" id="sd_math_servicefee" class="form-control form_field"
								     				value="<?php echo empty($memberdata->dealer_fee)?'0':$memberdata->dealer_fee; ?>"
								     				onfocus="this.value = this.value=='0'?'':this.value;" onblur="this.value = this.value==''?'0':this.value;"
								     				onkeyup="return autocalculatersd()"
								     				>
								     				<label class="form_label">Service Fee</label>
								     			</div>
								     			<div class="form-group">
								     				<input type="number" name="sd_math_tagregistration" id="sd_math_tagregistration" class="form-control form_field"
								     				value="<?php echo empty($memberdata->dmv)?'0':$memberdata->dmv; ?>"
								     				onfocus="this.value = this.value=='0'?'':this.value;" onblur="this.value = this.value==''?'0':this.value;"
								     				onkeyup="return autocalculatersd()"
								     				>
								     				<label class="form_label">Tag/Registration</label>
								     			</div>
								     			<div class="form-group">
													<input type="hidden" class="form_btn" id="sd_math_btn_total">
												</div>
								     			<div class="form-group">
								     				<input type="text" name="sd_math_taxdue" id="sd_math_taxdue" class="form-control form_field" onkeypress="return isFloatNumber(this,event)" value="<?php if(!empty($transaction_data)) if($transaction_data->status == "processing") echo $buyers_trans_data->tax; else echo $transaction_data->tax  ?>">
								     				<label class="form_label">Tax Due</label>
								     			</div>
								     			<div class="form-group">
								     				<input type="text" name="sd_math_totaldue" id="sd_math_totaldue" class="form-control form_field" onkeypress="return isFloatNumber(this,event)" value="<?php if(!empty($transaction_data)) if($transaction_data->status == "processing") echo $buyers_trans_data->total_due; else echo $transaction_data->total_due  ?>">
								     				<label class="form_label">Total Due</label>
								     			</div>
								     			<div class="form-group">
													<input type="button" class="form_btn" id="sd_math_update_info" value="Submit">
												</div>
											</div>
										</div>
										<div class="col-md-6">
										  	<div class="box">
										  		<h4 class="center">GA TAVT</h4>
												<a href="https://eservices.drives.ga.gov/_/#message" target="_blank" class="btn form_btn center">Link to GA TAVT Calculator</a>
										  	</div>
										  	<div class="box">

										  		<h4 class="center"><?php echo $memberdata->first_name ?>'s Payment Calculator</h4>
												<p class="center">(For Buyer's Monthly Payment)</p>
												<div class="row" style="text-align: left;">
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
								     				<input type="text" name="sd_calc_saleprice" id="sd_calc_saleprice" class="form-control form_field" onkeypress="return isFloatNumber(this,event)" value="<?php if(!empty($transaction_data)) if($transaction_data->status == "processing") echo $buyers_trans_data->total_due; else echo $transaction_data->total_due  ?>">
								     				<label class="form_label viewlabel">Sale Price</label>
								     			</div>
								     			<div class="form-group">
								     				<input type="text" name="sd_calc_downpayment" id="sd_calc_downpayment" class="form-control form_field" onkeypress="return isFloatNumber(this,event)">
								     				<label class="form_label viewlabel">Additional Down Payment</label>
								     			</div>
								     			<!-- <div class="form-group">
								     				<input type="number" name="sd_calc_tradein_credit" id="sd_calc_tradein_credit" class="form-control form_field">
								     				<label class="form_label">Trade-in Credit</label>
								     			</div> -->
								     			<div class="form-group">
								     				<select class="form-control form_field" name="sd_calc_loan_length_select" id="sd_calc_loan_length_select">
															<?php
																$loan_lenght = 60;
															 if(!empty($transaction_data)) if(!empty($buyers_trans_data)) $loan_lenght = $buyers_trans_data->bhph_months ?>
								     					<option value="12" <?php if($loan_lenght == 12) echo "selected" ?>>12 months</option>
								     					<option value="24" <?php if($loan_lenght == 24) echo "selected" ?>>24 months</option>
								     					<option value="36" <?php if($loan_lenght == 36) echo "selected" ?>>36 months</option>
								     					<option value="48" <?php if($loan_lenght == 48) echo "selected" ?>>48 months</option>
								     					<option value="60" <?php if($loan_lenght == 60) echo "selected" ?>>60 months</option>
								     					<option value="72" <?php if($loan_lenght == 72) echo "selected" ?>>72 months</option>
								     					<option value="84" <?php if($loan_lenght == 84) echo "selected" ?>>84 months</option>
								     				</select>
								     				<label class="form_label">Loan Length</label>
								     			</div>
								     			<div class="form-group">
								     				<input type="text" name="sd_calc_interest_rate" id="sd_calc_interest_rate" class="form-control form_field" onkeypress="return isFloatNumber(this,event)" value="<?php if(!empty($transaction_data)) if(!empty($buyers_trans_data)) echo $buyers_trans_data->bhph_rate ?>">
								     				<label class="form_label">Interest Rate(ex 7)</label>
								     			</div>
								     			<div class="form-group">
													<input type="button" class="form_btn" id="sd_btn_calc_calculate" value="Calculate">
												</div>
								     			<!-- <div class="form-group">
								     				<h5 class="center" id="sd_calc_result_monthly_payment">$0 / month</h5>
								     			</div> -->
								     			<table class="table" style="text-align: left;">
								     				<tr class="calc_result_monthly">
								     					<td><h6 class="calculator_title">Monthly Payment:</h6></td>
								     					<td><h6 class="calculator_data" id="sd_calc_result_monthly_payment">$<?php if(!empty($transaction_data)) if(!empty($buyers_trans_data->cal_monthly_payment)) echo $buyers_trans_data->cal_monthly_payment; else echo '0.00'; else echo '0.00'; ?></h6></td>
								     				</tr>
								     				<tr class="calc_result_biweekly" style="display: none">
								     					<td><h6 class="calculator_title">Bi-Weekly Payment</h6></td>
								     					<td><h6 class="calculator_data" id="sd_calc_result_biweekly_payment">$<?php if(!empty($transaction_data)) if(!empty($buyers_trans_data->cal_biweekly_payment)) echo $buyers_trans_data->cal_biweekly_payment; else echo '0.00'; else echo '0.00'; ?></h6></td>
								     				</tr>
								     				<!-- <tr>
								     					<td><h6 class="calculator_title">Weekly Payment</h6></td>
								     					<td><h6 class="calculator_data" id="sd_calc_result_weekly_payment">$0.00</h6></td>
								     				</tr> -->
								     				<!-- <tr>
								     					<td><h6 class="calculator_title">Monthly payments interest</h6></td>
								     					<td><h6 class="calculator_data" id="sd_calc_result_total_payment">$0.00</h6></td>
								     				</tr>
								     				<tr>
								     					<td><h6 class="calculator_title">Biweekly payments interest</h6></td>
								     					<td><h6 class="calculator_data" id="sd_calc_result_total_interest">$0.00</h6></td>
								     				</tr> -->

								     				<tr class="calc_result_monthly">
								     					<td><h6 class="calculator_title">Monthly payments interest</h6></td>
								     					<td><h6 class="calculator_data" id="sd_calc_result_monthly_interest">$<?php if(!empty($transaction_data)) if(!empty($buyers_trans_data->cal_total_interest)) echo $buyers_trans_data->cal_total_interest; else echo '0.00'; else echo '0.00'; ?></h6></td>
								     				</tr>
								     				<tr class="calc_result_biweekly" style="display: none">
								     					<td><h6 class="calculator_title">Biweekly payments interest</h6></td>
								     					<td><h6 class="calculator_data" id="sd_calc_result_biweekly_interest">$<?php if(!empty($transaction_data)) if(!empty($buyers_trans_data->cal_biweekly_total_interest)) echo $buyers_trans_data->cal_biweekly_total_interest; else echo '0.00'; else echo '0.00'; ?></h6></td>
								     				</tr>
								     				<tr class="calc_result_monthly">
								     					<td><h6 class="calculator_title">Monthly total payment</h6></td>
								     					<td><h6 class="calculator_data" id="sd_calc_result_total_payment">$<?php if(!empty($transaction_data)) if(!empty($buyers_trans_data->bhph_tpmts)) echo $buyers_trans_data->bhph_tpmts; else echo '0.00'; else echo '0.00'; ?></h6></td>
								     				</tr>
								     				<tr class="calc_result_biweekly" style="display: none">
									     				<td><h6 class="calculator_title">Total payment</h6></td>
									     				<td><h6 class="calculator_data" id="sd_calc_result_biweekly_total_payment">$<?php if(!empty($transaction_data)) if(!empty($buyers_trans_data->cal_biweekly_total_payment)) echo $buyers_trans_data->cal_biweekly_total_payment; else echo '0.00'; else echo '0.00'; ?></h6></td>
									     			</tr>
								     			</table>
										  	</div>
										</div>
									</div>
							    	<input type="button" name="previous" class="previous action-button" value="Previous" />
							    	<input type="button" name="next" class="next action-button" id="next_calculator" value="Next" />
								</div>

								<div class="step_group" <?php if(!empty($transaction_data)) echo "style='display: block; left: 0%; opacity: 1;'" ?>>
									<h3 class="center no_d_desk">Review</h3>
									<div class="row">
										<div class="col-md-<?php if(!empty($transaction_data)) if($transaction_data->status == "pending_print") echo "3"; else echo "4"; else echo "3"; ?>">
											<div class="box">
										  		<!-- <h4 class="center">Ready to Print</h4> -->
												<!-- <button type="button" data-dismiss="modal" data-toggle="modal" data-target="#print_deal" class="form_btn">Ready to Print</button> -->
												<button type="button" onclick="openPrintModel('<?php echo $memberdata->state ?>')" class="form_btn">Print All Forms</button>
											</div>
										</div>
										<div class="col-md-<?php if(!empty($transaction_data)) if($transaction_data->status == "pending_print") echo "3"; else echo "4"; else echo "3"; ?>">
											<div class="box">
										  		<!-- <h4 class="center">Contract</h4> -->
												<button type="button" data-dismiss="modal" data-toggle="modal" data-target="#bhph_contract" class="form_btn">Print BHPH Contract</button>
											</div>
										</div>
										<div class="col-md-<?php if(!empty($transaction_data)) if($transaction_data->status == "pending_print") echo "3"; else echo "4"; else echo "3"; ?>">
											<div class="box">
										  		<!-- <h4 class="center">Save</h4> -->
										  		<!-- save_deal -->
												<button type="submit" class="form_btn" id="save_deal_submit">Save</button>
											</div>
										</div>
										<?php if(!empty($transaction_data)) if($transaction_data->status == "pending_print"){ ?>
										<div class="col-md-3">
											<div class="box">
										  		<!-- <h4 class="center">Save</h4> -->
												<button type="button" class="form_btn" id="deal_not_closed_submit">Deal Not Closed</button>
											</div>
										</div>
									<?php } ?>
									</div>
									<div class="row">
										<div class="col-md-3">
											<div class="box">
												<h4 class="modal-title mb-3">Review Buyer Details</h4>
												<div class="form-group">
								     				<input type="text" name="sd_main_buyers_firstname" id="sd_main_buyers_firstname" class="form-control form_field" value="<?php if(!empty($transaction_data)) echo $transaction_data->buyers_first_name  ?>">
								     				<label class="viewlabel form_label">First Name</label>
								     			</div>
								     			<div class="form-group">
								     				<input type="text" name="sd_main_buyers_middlename" id="sd_main_buyers_middlename" class="form-control form_field" value="<?php if(!empty($transaction_data)) echo $transaction_data->buyers_mid_name  ?>">
								     				<label class="viewlabel form_label">Middle Name</label>
								     			</div>
								     			<div class="form-group">
								     				<input type="text" name="sd_main_buyers_lastname" id="sd_main_buyers_lastname" class="form-control form_field" value="<?php if(!empty($transaction_data)) echo $transaction_data->buyers_last_name  ?>">
								     				<label class="viewlabel form_label">Last Name</label>
								     			</div>
								     			<div class="form-group">
								     				<input type="text" name="sd_main_buyers_address" id="sd_main_buyers_address" class="form-control form_field" value="<?php if(!empty($transaction_data)) echo $transaction_data->buyers_address  ?>">
								     				<label class="viewlabel form_label">Address</label>
								     			</div>
								     			<div class="form-group">
								     				<input type="text" name="sd_main_buyers_city" id="sd_main_buyers_city" class="form-control form_field" value="<?php if(!empty($transaction_data)) echo $transaction_data->buyers_city  ?>">
								     				<label class="viewlabel form_label">City</label>
								     			</div>
								     			<div class="form-group">
								     				<!-- <input type="text" name="sd_main_buyers_state" id="sd_main_buyers_state" class="form-control form_field" value="<?php //if(!empty($transaction_data)) echo $transaction_data->buyers_state  ?>"> -->
								     				<select name="sd_main_buyers_state" id="sd_main_buyers_state" class="form-control form_field" value="<?php if(!empty($transaction_data)) echo $transaction_data->buyers_state; ?>" required="">
											     	<?php foreach ($states as $key => $value) { ?>
											     		<option value="<?php echo $value['name'] ?>"><?php echo $value['name'] ?></option>
											     	<?php } ?>
											     	</select>
								     				<label class="viewlabel form_label">State</label>
								     			</div>
								     			<div class="form-group">
								     				<input type="text" name="sd_main_buyers_zip" id="sd_main_buyers_zip" class="form-control form_field" value="<?php if(!empty($transaction_data)) echo $transaction_data->buyers_zip  ?>">
								     				<label class="viewlabel form_label">Zip</label>
								     			</div>
								     			<div class="form-group">
								     				<input type="text" name="sd_main_buyers_country" id="sd_main_buyers_country" class="form-control form_field" value="USA">
								     				<label class="viewlabel form_label">Country</label>
								     			</div>
								     			<div class="form-group">
								     				<input type="email" name="sd_main_buyers_email" id="sd_main_buyers_email" class="form-control form_field" value="<?php if(!empty($transaction_data)) echo $transaction_data->buyers_pri_email  ?>">
								     				<label class="viewlabel form_label">Email</label>
								     			</div>
								     			<div class="form-group">
								     				<input type="text" name="sd_main_buyers_workphone" id="sd_main_buyers_workphone" class="form-control form_field" value="<?php if(!empty($transaction_data)) echo $transaction_data->buyers_work_phone  ?>">
								     				<label class="viewlabel form_label">Work Phone</label>
								     			</div>
								     			<div class="form-group">
								     				<input type="text" name="sd_main_buyers_homephone" id="sd_main_buyers_homephone" class="form-control form_field" value="<?php if(!empty($transaction_data)) echo $transaction_data->buyers_home_phone  ?>">
								     				<label class="viewlabel form_label">Home Phone</label>
								     			</div>
								     			<div class="form-group">
								     				<input type="text" name="sd_main_buyers_mobile" id="sd_main_buyers_mobile" class="form-control form_field" value="<?php if(!empty($transaction_data)) echo $transaction_data->buyers_pri_phone_cell  ?>">
								     				<label class="viewlabel form_label">Mobile</label>
								     			</div>
								     			<div class="form-group">
								     				<input type="text" name="sd_main_buyers_dlnumber" id="sd_main_buyers_dlnumber" class="form-control form_field" value="<?php if(!empty($transaction_data)) echo $transaction_data->buyers_DL_number  ?>">
								     				<label class="viewlabel form_label">Drivers License Number</label>
								     			</div>
								     			<div class="form-group">
								     				<!-- <input type="text" name="sd_main_buyers_dlstate" id="sd_main_buyers_dlstate" class="form-control form_field" value="<?php //if(!empty($transaction_data)) echo $transaction_data->buyers_DL_state  ?>"> -->
								     				<select name="sd_main_buyers_dlstate" id="sd_main_buyers_dlstate" class="form-control form_field" value="<?php if(!empty($transaction_data)) echo $transaction_data->buyers_DL_state  ?>" required="">
											     	<?php foreach ($states as $key => $value) { ?>
											     		<option value="<?php echo $value['name'] ?>"><?php echo $value['name'] ?></option>
											     	<?php } ?>
											     	</select>
								     				<label class="viewlabel form_label">DL State</label>
								     			</div>
								     			<div class="form-group">
								     				<input type="text" name="sd_main_buyers_dlexpire" id="sd_main_buyers_dlexpire" class="form-control form_field" value="<?php if(!empty($transaction_data)) echo $transaction_data->buyers_DL_expire  ?>">
								     				<label class="viewlabel form_label">DL Expire</label>
								     			</div>
								     			<div class="form-group">
								     				<input type="text" name="sd_main_buyers_dldob" id="sd_main_buyers_dldob" class="form-control form_field" value="<?php if(!empty($transaction_data)) echo $transaction_data->buyers_DL_dob  ?>">
								     				<label class="viewlabel form_label">DL Date of Birth</label>
								     			</div>
								     			<div class="form-group">
								     				<input type="text" name="sd_main_buyers_temp_tag_number" id="sd_main_buyers_temp_tag_number" class="form-control form_field" value="<?php if(!empty($transaction_data)) echo $transaction_data->buyers_temp_tag_number  ?>">
								     				<label class="viewlabel form_label">Temp Tag Number</label>
								     			</div>
								     			<div class="form-group">
								     				<!-- update_buyer_done -->
													<input type="button" class="form_btn" id="sd_main_buyers_update_form" value="Update Buyer">
												</div>
								     		</div>
										</div>
										<div class="col-md-3" id="sd_main_inventory_box" <?php if(!empty($transaction_data->inv_id)) echo "style='display: block;'"; else echo "style='display: none;'"; ?>>
											<div class="box">
												<h4 class="modal-title mb-3">Review Vehicle Details(Inventory)</h4>
												<div class="form-group">
								     				<input type="text" name="sd_main_inventory_vin" id="sd_main_inventory_vin" class="form-control form_field" value="<?php if(!empty($transaction_data)) echo $transaction_data->inv_vin ?>">
								     				<label class="viewlabel form_label">VIN</label>
								     			</div>
								     			<div class="form-group">
								     				<input type="text" name="sd_main_inventory_year" id="sd_main_inventory_year" class="form-control form_field" value="<?php if(!empty($transaction_data)) echo $transaction_data->inv_year  ?>">
								     				<label class="viewlabel form_label">Year</label>
								     			</div>
								     			<div class="form-group">
								     				<input type="text" name="sd_main_inventory_make" id="sd_main_inventory_make" class="form-control form_field" value="<?php if(!empty($transaction_data)) echo $transaction_data->inv_make  ?>">
								     				<label class="viewlabel form_label">Make</label>
								     			</div>
								     			<div class="form-group">
								     				<input type="text" name="sd_main_inventory_model" id="sd_main_inventory_model" class="form-control form_field" value="<?php if(!empty($transaction_data)) echo $transaction_data->inv_model ?>">
								     				<label class="viewlabel form_label">Model</label>
								     			</div>
								     			<div class="form-group">
								     				<input type="text" name="sd_main_inventory_style" id="sd_main_inventory_style" class="form-control form_field" value="<?php if(!empty($transaction_data)) echo $transaction_data->inv_style  ?>">
								     				<label class="viewlabel form_label">Style</label>
								     			</div>
								     			<div class="form-group">
								     				<input type="text" name="sd_main_inventory_stocknumber" id="sd_main_inventory_stocknumber" class="form-control form_field" value="<?php if(!empty($transaction_data)) echo $transaction_data->inv_stock  ?>">
								     				<label class="viewlabel form_label">Stock Number</label>
								     			</div>
								     			<div class="form-group">
								     				<input type="text" name="sd_main_inventory_color" id="sd_main_inventory_color" class="form-control form_field" value="<?php if(!empty($transaction_data)) echo $transaction_data->inv_color  ?>">
								     				<label class="viewlabel form_label">Color</label>
								     			</div>
													<div class="form-group">
								     				<input type="text" name="sd_main_inventory_drivetype" id="sd_main_inventory_drivetype" class="form-control form_field" value="<?php if(!empty($transaction_data)) echo $transaction_data->drive_type  ?>">
								     				<label class="viewlabel form_label">Drive Type</label>
								     			</div>
													<div class="form-group">
								     				<input type="text" name="sd_main_inventory_enginesize" id="sd_main_inventory_enginesize" class="form-control form_field" value="<?php if(!empty($transaction_data)) echo $transaction_data->engine_size  ?>">
								     				<label class="viewlabel form_label">Engine Size</label>
								     			</div>
								     			<div class="form-group">
								     				<input type="text" name="sd_main_inventory_mileage" id="sd_main_inventory_mileage" class="form-control form_field" value="<?php if(!empty($transaction_data)) echo $transaction_data->inv_mileage  ?>" onkeyup="return makeExemptRequire(this,'sd_main_inventory_exempt_cb')">
								     				<label class="viewlabel form_label">Mileage</label>
								     			</div>
								     			<div class="form-group">
								     				<label class="checkbox1">Exempt
													  	<input type="checkbox" class="" name="sd_main_inventory_exempt_cb" id="sd_main_inventory_exempt_cb" onclick="return makeExemptRequire_cb(this,'sd_main_inventory_mileage')" value="yes" <?php if(!empty($transaction_data)) if($transaction_data->inv_exempt == "yes") echo "checked";  ?>>
													  	<span class="checkmark"></span>
													</label>
								     			</div>
								     			<div class="form-group">
								     				<input type="text" name="sd_main_inventory_cost" id="sd_main_inventory_cost" class="form-control form_field" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,''); sdmain_additionCost_Addedcost();" value="<?php if(!empty($transaction_data)) echo $transaction_data->inv_cost ?>" required="">
								     				<label class="viewlabel form_label">Cost</label>
								     			</div>
								     			<div class="form-group">
								     				<input type="text" name="sd_main_inventory_addedcost" id="sd_main_inventory_addedcost" class="form-control form_field" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,''); sdmain_additionCost_Addedcost();" value="<?php if(!empty($transaction_data)) echo $transaction_data->inv_addedcost ?>" required="">
								     				<label class="viewlabel form_label">Added Cost</label>
								     			</div>
								     			<div class="form-group">
								     				<input type="text" name="sd_main_inventory_totalcost" id="sd_main_inventory_totalcost" class="form-control form_field" value="<?php if(!empty($transaction_data)) echo $transaction_data->inv_flrc  ?>" readonly>
								     				<label class="viewlabel form_label">Trade Cost</label>
								     			</div>
								     			<div class="form-group">
								     				<input type="text" name="sd_main_inventory_price" id="sd_main_inventory_price" class="form-control form_field" value="<?php if(!empty($transaction_data)) echo $transaction_data->inv_price  ?>">
								     				<label class="viewlabel form_label">Price</label>
								     			</div>
								     			<div class="form-group">
								     				<!-- update_vehicle_done -->
													<input type="button" class="form_btn" id="sd_main_inventory_update_form" value="Update Vehicle">
												</div>
											</div>
										</div>
										<div class="col-md-3" id="sd_main_trade_box" <?php if(!empty($transaction_data->trade_inv_id)) echo "style='display: block;'"; else echo "style='display: none;'"; ?>>
											<div class="box">
												<h4 class="modal-title mb-3">Review Vehicle Details(Trade)</h4>
												<div class="form-group">
								     				<input type="text" name="sd_main_trade_vin" id="sd_main_trade_vin" class="form-control form_field" value="<?php if(!empty($transaction_data)) echo $transaction_data->trade_inv_vin ?>">
								     				<label class="viewlabel form_label">VIN</label>
								     			</div>
								     			<div class="form-group">
								     				<input type="text" name="sd_main_trade_year" id="sd_main_trade_year" class="form-control form_field" value="<?php if(!empty($transaction_data)) echo $transaction_data->trade_inv_year  ?>">
								     				<label class="viewlabel form_label">Year</label>
								     			</div>
								     			<div class="form-group">
								     				<input type="text" name="sd_main_trade_make" id="sd_main_trade_make" class="form-control form_field" value="<?php if(!empty($transaction_data)) echo $transaction_data->trade_inv_make  ?>">
								     				<label class="viewlabel form_label">Make</label>
								     			</div>
								     			<div class="form-group">
								     				<input type="text" name="sd_main_trade_model" id="sd_main_trade_model" class="form-control form_field" value="<?php if(!empty($transaction_data)) echo $transaction_data->trade_inv_model ?>">
								     				<label class="viewlabel form_label">Model</label>
								     			</div>
								     			<div class="form-group">
								     				<input type="text" name="sd_main_trade_style" id="sd_main_trade_style" class="form-control form_field" value="<?php if(!empty($transaction_data)) echo $transaction_data->trade_inv_style  ?>">
								     				<label class="viewlabel form_label">Style</label>
								     			</div>
								     			<div class="form-group">
								     				<input type="text" name="sd_main_trade_color" id="sd_main_trade_color" class="form-control form_field" value="<?php if(!empty($transaction_data)) echo $transaction_data->trade_inv_color  ?>">
								     				<label class="viewlabel form_label">Color</label>
								     			</div>
													<div class="form-group">
								     				<input type="text" name="sd_main_trade_drivetype" id="sd_main_trade_drivetype" class="form-control form_field" value="<?php if(!empty($transaction_data)) echo $transaction_data->trade_drive_type  ?>">
								     				<label class="viewlabel form_label">Drive Type</label>
								     			</div>
													<div class="form-group">
								     				<input type="text" name="sd_main_trade_enginesize" id="sd_main_trade_enginesize" class="form-control form_field" value="<?php if(!empty($transaction_data)) echo $transaction_data->trade_engine_size  ?>">
								     				<label class="viewlabel form_label">Engine Size</label>
								     			</div>
								     			<div class="form-group">
								     				<input type="text" name="sd_main_trade_mileage" id="sd_main_trade_mileage" class="form-control form_field" value="<?php if(!empty($transaction_data)) echo $transaction_data->trade_inv_mileage  ?>" onkeyup="return makeExemptRequire(this,'sd_main_trade_exempt_cb')">
								     				<label class="viewlabel form_label">Mileage</label>
								     			</div>
								     			<div class="form-group">
								     				<label class="checkbox1">Exempt
													  	<input type="checkbox" class="" name="sd_main_trade_exempt_cb" id="sd_main_trade_exempt_cb" onclick="return makeExemptRequire_cb(this,'sd_main_trade_mileage')" value="yes" <?php if(!empty($transaction_data)) if($transaction_data->trade_inv_exempt == "yes") echo "checked";  ?>>
													  	<span class="checkmark"></span>
													</label>
								     			</div>
								     			<div class="form-group">
								     				<input type="text" name="sd_main_trade_allowance" id="sd_main_trade_allowance" class="form-control form_field" value="<?php if(!empty($transaction_data)) echo $transaction_data->trade_inv_price  ?>">
								     				<label class="viewlabel form_label">Trade Allowance</label>
								     			</div>
								     			<div class="form-group">
								     				<!-- update_vehicle_done -->
													<input type="button" class="form_btn" id="sd_main_trade_update_form" value="Update Vehicle">
												</div>
											</div>
										</div>
										<div class="col-md-3">
											<div class="box">
												<h4 class="modal-title mb-3">Review The Numbers</h4>
												<div class="form-group">
								     				<input type="text" name="sd_main_calc_saleprice" id="sd_main_calc_saleprice" class="form-control form_field" value="<?php if(!empty($transaction_data)) if($transaction_data->status == "processing") echo $buyers_trans_data->sale_price; else echo $transaction_data->sale_price;  ?>" required="">
								     				<label class="viewlabel form_label">Sale Price</label>
								     			</div>
								     			<?php

								     			/*<input type="hidden" name="sd_main_calc_total_due" id="sd_main_calc_total_due" value="<?php if(!empty($transaction_data)) echo $transaction_data->total_due  ?>">

								     			<input type="hidden" name="sd_main_calc_tax" id="sd_main_calc_tax" value="<?php if(!empty($transaction_data)) echo $transaction_data->tax  ?>">*/

								     			 ?>

								     			<input type="hidden" name="sd_main_calc_sub_due" id="sd_main_calc_sub_due" value="<?php if(!empty($transaction_data)) if($transaction_data->status == "processing") echo $buyers_trans_data->sub_due; else echo $transaction_data->sub_due  ?>">
								     			<input type="hidden" name="sd_main_calc_sub_due1" id="sd_main_calc_sub_due1" value="<?php if(!empty($transaction_data)) if($transaction_data->status == "processing") echo $buyers_trans_data->sub_due1; else echo $transaction_data->sub_due1  ?>">
								     			<input type="hidden" name="sd_main_calc_sub_due2" id="sd_main_calc_sub_due2" value="<?php if(!empty($transaction_data)) if($transaction_data->status == "processing") echo $buyers_trans_data->sub_due2; else echo $transaction_data->sub_due2  ?>">
								     			<div class="form-group">
								     				<input type="text" name="sd_main_calc_cashcredit" id="sd_main_calc_cashcredit" class="form-control form_field" value="<?php if(!empty($transaction_data)) if($transaction_data->status == "processing") echo $buyers_trans_data->cash_credit; else echo $transaction_data->cash_credit  ?>" required="">
								     				<label class="viewlabel form_label">Cash Down</label>
								     			</div>
								     			<div class="form-group">
								     				<input type="text" name="sd_main_calc_tradecredit" id="sd_main_calc_tradecredit" class="form-control form_field" value="<?php if(!empty($transaction_data)) if($transaction_data->status == "processing") echo $buyers_trans_data->trade_credit; else echo $transaction_data->trade_credit  ?>" required="">
								     				<label class="viewlabel form_label">Trade In Credit</label>
								     			</div>
								     			<!-- <div class="form-group">
								     				<input type="text" name="sd_main_calc_tradebalance" id="sd_main_calc_tradebalance" class="form-control form_field" value="<?php //if(!empty($transaction_data)) echo $transaction_data->trade_balance  ?>" required="">
								     				<label class="viewlabel form_label">Trade Balance</label>
								     			</div> -->
								     			<div class="form-group">
								     				<input type="text" name="sd_main_calc_servicefee" id="sd_main_calc_servicefee" class="form-control form_field" value="<?php if(!empty($transaction_data)) if($transaction_data->status == "processing") echo $buyers_trans_data->dealer_fee; else echo $transaction_data->dealer_fee  ?>" required="">
								     				<label class="viewlabel form_label">Service Fee</label>
								     			</div>
								     			<div class="form-group">
								     				<input type="text" name="sd_main_calc_tagregistration" id="sd_main_calc_tagregistration" class="form-control form_field" value="<?php if(!empty($transaction_data)) if($transaction_data->status == "processing") echo $buyers_trans_data->dmv; else echo $transaction_data->dmv  ?>" required="">
								     				<label class="viewlabel form_label">Tag/Registration</label>
								     			</div>
								     			<div class="form-group">
								     				<input type="text" name="sd_main_calc_tax" id="sd_main_calc_tax" class="form-control form_field" value="<?php if(!empty($transaction_data)) if($transaction_data->status == "processing") echo $buyers_trans_data->tax; else echo $transaction_data->tax  ?>" required="">
								     				<label class="viewlabel form_label">Total Tax</label>
								     			</div>
								     			<div class="form-group">
								     				<input type="text" name="sd_main_calc_total_due" id="sd_main_calc_total_due" class="form-control form_field" value="<?php if(!empty($transaction_data)) if($transaction_data->status == "processing") echo $buyers_trans_data->total_due; else echo $transaction_data->total_due  ?>" required="">
								     				<label class="viewlabel form_label">Total Due</label>
								     			</div>
								     			<div class="form-group">
								     				<!-- tagregistration -->
													<input type="button" class="form_btn" id="sd_main_calc_update_form" value="Change Numbers">
												</div>
											</div>
										</div>
										<input type="hidden" name="sd_main_transact_id" id="sd_main_transact_id" value="<?php if(!empty($transaction_data)) echo $transaction_data->transact_id  ?>">
										<input type="hidden" name="sd_main_transact_status" id="sd_main_transact_status" value="<?php if(!empty($transaction_data)) echo $transaction_data->status  ?>">
									</div>
									<input type="button" name="previous" class="previous action-button" id="previous_review" value="Previous" />
								</div>

							</form>
						</div>
					</div>
				</div>
			</section>

			<div class="modal fade custom_modal" id="add_inventory" tabindex="-1" role="dialog" aria-labelledby="add_inventory" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Add Inventory</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true"><i class="fa fa-times"></i></span>
							</button>
						</div>
						<div class="modal-body">
							<div class="form-group">
			     				<input type="text" name="input_vin_number" id="input_vin_number" class="form-control form_field" required="">
			     				<label class="form_label">Enter VIN Here</label>
			     			</div>
			     			<div class="form-group">
			     				<!-- data-dismiss="modal" data-toggle="modal" data-target="#add_inventory_info" -->
								<input type="submit" class="form_btn btn_check_vin_number_sd" value="Add Vehicle">
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="modal fade custom_modal" id="add_inventory_info" tabindex="-1" role="dialog" aria-labelledby="add_inventory_info" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Add Inventory Info</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true"><i class="fa fa-times"></i></span>
							</button>
						</div>
						<div class="modal-body">
							<form id="add_inventory_sd_form">
							<div class="form-group">
			     				<input type="text" name="sd_inventoryinfo_vin" id="sd_inventoryinfo_vin" class="form-control form_field form_field_inv_form" required="">
			     				<label class="form_label">VIN</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="sd_inventoryinfo_year" id="sd_inventoryinfo_year" class="form-control form_field form_field_inv_form" required="">
			     				<label class="form_label">Year</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="sd_inventoryinfo_make" id="sd_inventoryinfo_make" class="form-control form_field form_field_inv_form" required="">
			     				<label class="form_label">Make</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="sd_inventoryinfo_model" id="sd_inventoryinfo_model" class="form-control form_field form_field_inv_form" required="">
			     				<label class="form_label">Model</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="sd_inventoryinfo_style" id="sd_inventoryinfo_style" class="form-control form_field form_field_inv_form" required="">
			     				<label class="form_label">Style</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="sd_inventoryinfo_stocknumber" id="sd_inventoryinfo_stocknumber" class="form-control form_field form_field_inv_form" required="">
			     				<label class="form_label">Stock Number</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="sd_inventoryinfo_color" id="sd_inventoryinfo_color" class="form-control form_field form_field_inv_form" required="">
			     				<label class="form_label">Color</label>
			     			</div>
								<div class="form-group">
			     				<input type="text" name="sd_inventoryinfo_drivetype" id="sd_inventoryinfo_drivetype" class="form-control form_field form_field_inv_form" required="">
			     				<label class="form_label">Drive Type</label>
			     			</div>
								<div class="form-group">
			     				<input type="text" name="sd_inventoryinfo_enginesize" id="sd_inventoryinfo_enginesize" class="form-control form_field form_field_inv_form" required="">
			     				<label class="form_label">Engine Size</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="sd_inventoryinfo_mileage" id="sd_inventoryinfo_mileage" class="form-control form_field form_field_inv_form" required="" onkeyup="return makeExemptRequire(this,'sd_inventoryinfo_exempt_cb')">
			     				<label class="form_label">Mileage</label>
			     			</div>
			     			<div class="form-group">
			     				<label class="checkbox1">Exempt
								  	<input type="checkbox" class="" name="sd_inventoryinfo_exempt_cb" id="sd_inventoryinfo_exempt_cb" onclick="return makeExemptRequire_cb(this,'sd_inventoryinfo_mileage')" value="yes">
								  	<span class="checkmark"></span>
								</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="sd_inventoryinfo_cost" id="sd_inventoryinfo_cost" class="form-control form_field" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,''); sd_additionCost_Addedcost();" required="">
			     				<label class="form_label">Cost</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="sd_inventoryinfo_addedcost" id="sd_inventoryinfo_addedcost" class="form-control form_field" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,''); sd_additionCost_Addedcost();" required="">
			     				<label class="form_label">Added Cost</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="sd_inventoryinfo_totalcost" id="sd_inventoryinfo_totalcost" class="form-control form_field form_field_inv_form" required="" readonly>
			     				<label class="viewlabel form_label">Total Cost</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="sd_inventoryinfo_stickerprice" id="sd_inventoryinfo_stickerprice" class="form-control form_field form_field_inv_form" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" required="">
			     				<label class="form_label">Vehicle Price</label>
			     			</div>
			     			<div class="form-group">
			     				<!-- data-dismiss="modal" class="form_btn add_inventory_vehicle_done" -->
								<input type="submit" class="form_btn" value="Add Vehicle">
							</div>
							</form>
						</div>
					</div>
				</div>
			</div>

			<div class="modal fade custom_modal" id="add_trade" tabindex="-1" role="dialog" aria-labelledby="add_trade" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Add Trade</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true"><i class="fa fa-times"></i></span>
							</button>
						</div>
						<div class="modal-body">
							<div class="form-group">
			     				<input type="text" name="input_vin_number_trade" id="input_vin_number_trade" class="form-control form_field" required="">
			     				<label class="form_label">Enter VIN Here</label>
			     			</div>
			     			<div class="form-group">
			     				<!-- data-dismiss="modal" data-toggle="modal" data-target="#add_trade_info" -->
								<input type="submit" class="form_btn btn_check_vin_number_trade_sd" value="Add Vehicle">
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="modal fade custom_modal" id="add_trade_info" tabindex="-1" role="dialog" aria-labelledby="add_trade_info" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Add Trade Info</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true"><i class="fa fa-times"></i></span>
							</button>
						</div>
						<div class="modal-body">
							<form id="add_trade_sd_form">
							<div class="form-group">
			     				<input type="text" name="sd_tradeinfo_vin" id="sd_tradeinfo_vin" class="form-control form_field" required>
			     				<label class="form_label">VIN</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="sd_tradeinfo_year" id="sd_tradeinfo_year" class="form-control form_field" required="">
			     				<label class="form_label">Year</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="sd_tradeinfo_make" id="sd_tradeinfo_make" class="form-control form_field" required="">
			     				<label class="form_label">Make</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="sd_tradeinfo_model" id="sd_tradeinfo_model" class="form-control form_field" required="">
			     				<label class="form_label">Model</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="sd_tradeinfo_style" id="sd_tradeinfo_style" class="form-control form_field" required="">
			     				<label class="form_label">Style</label>
			     			</div>
			     			<!-- <div class="form-group">
			     				<input type="text" name="sd_tradeinfo_stocknumber" id="sd_tradeinfo_stocknumber" class="form-control form_field" required="">
			     				<label class="form_label">Stock Number</label>
			     			</div> -->
			     			<div class="form-group">
			     				<input type="text" name="sd_tradeinfo_color" id="sd_tradeinfo_color" class="form-control form_field" required="">
			     				<label class="form_label">Color</label>
			     			</div>
								<div class="form-group">
			     				<input type="text" name="sd_tradeinfo_drivetype" id="sd_tradeinfo_drivetype" class="form-control form_field" required="">
			     				<label class="form_label">Drive Type</label>
			     			</div>
								<div class="form-group">
			     				<input type="text" name="sd_tradeinfo_enginesize" id="sd_tradeinfo_enginesize" class="form-control form_field" required="">
			     				<label class="form_label">Engine Size</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="sd_tradeinfo_mileage" id="sd_tradeinfo_mileage" class="form-control form_field" required="" onkeyup="return makeExemptRequire(this,'sd_tradeinfo_exempt_cb')">
			     				<label class="form_label">Mileage</label>
			     			</div>
			     			<div class="form-group">
			     				<label class="checkbox1">Exempt
								  	<input type="checkbox" class="" name="sd_tradeinfo_exempt_cb" id="sd_tradeinfo_exempt_cb" onclick="return makeExemptRequire_cb(this,'sd_tradeinfo_mileage')" value="yes">
								  	<span class="checkmark"></span>
								</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="sd_tradeinfo_allowance" id="sd_tradeinfo_allowance" class="form-control form_field" required="">
			     				<label class="form_label">Trade Allowance</label>
			     			</div>
			     			<div class="form-group">
			     				<!-- data-dismiss="modal" class="form_btn add_trade_vehicle_done" -->
								<input type="submit" class="form_btn" value="Add Vehicle">
							</div>
							</form>
						</div>
					</div>
				</div>
			</div>

			<div class="modal fade custom_modal" id="add_buyer" tabindex="-1" role="dialog" aria-labelledby="add_buyer" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Add Buyer</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true"><i class="fa fa-times"></i></span>
							</button>
						</div>
						<div class="modal-body">
							<form id="add_buyer_info_form_sd">
							<div class="form-group">
			     				<input type="text" name="sd_add_buyer_firstname" id="sd_add_buyer_firstname" class="form-control form_field add_buyer_info_field" required="">
			     				<label class="form_label">First Name</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="sd_add_buyer_middlename" id="sd_add_buyer_middlename" class="form-control form_field add_buyer_info_field">
			     				<label class="form_label">Middle Name</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="sd_add_buyer_lastname" id="sd_add_buyer_lastname" class="form-control form_field add_buyer_info_field" required="">
			     				<label class="form_label">Last Name</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="sd_add_buyer_address" id="sd_add_buyer_address" class="form-control form_field add_buyer_info_field" required="">
			     				<label class="form_label">Address</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="sd_add_buyer_city" id="sd_add_buyer_city" class="form-control form_field add_buyer_info_field" required="">
			     				<label class="form_label">City</label>
			     			</div>
			     			<div class="form-group">
			     				<!-- <input type="text" name="sd_add_buyer_state" id="sd_add_buyer_state" class="form-control form_field add_buyer_info_field" required=""> -->
			     				<select name="sd_add_buyer_state" id="sd_add_buyer_state" class="form-control form_field add_buyer_info_field" required="">
								<?php foreach ($states as $key => $value) { ?>
									<option value="<?php echo $value['name'] ?>"><?php echo $value['name'] ?></option>
								<?php } ?>
								</select>
			     				<label class="form_label">State</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="sd_add_buyer_zip" id="sd_add_buyer_zip" class="form-control form_field add_buyer_info_field" required="">
			     				<label class="form_label">Zip</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="sd_add_buyer_country" id="sd_add_buyer_country" class="form-control form_field add_buyer_info_field" value="USA" required="">
			     				<label class="form_label">Country</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="email" name="sd_add_buyer_email" id="sd_add_buyer_email" class="form-control form_field add_buyer_info_field" required="">
			     				<label class="form_label">Email</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="sd_add_buyer_workphone" id="sd_add_buyer_workphone" class="form-control form_field add_buyer_info_field">
			     				<label class="form_label">Work Phone</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="sd_add_buyer_homephone" id="sd_add_buyer_homephone" class="form-control form_field add_buyer_info_field">
			     				<label class="form_label">Home Phone</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="sd_add_buyer_mobile" id="sd_add_buyer_mobile" class="form-control form_field add_buyer_info_field">
			     				<label class="form_label">Mobile</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="sd_add_buyer_dlnumber" id="sd_add_buyer_dlnumber" class="form-control form_field add_buyer_info_field" required="">
			     				<label class="form_label">Drivers License Number</label>
			     			</div>
			     			<div class="form-group">
			     				<!-- <input type="text" name="sd_add_buyer_dlstate" id="sd_add_buyer_dlstate" class="form-control form_field add_buyer_info_field" required=""> -->
			     				<select name="sd_add_buyer_dlstate" id="sd_add_buyer_dlstate" class="form-control form_field add_buyer_info_field" required="">
								<?php foreach ($states as $key => $value) { ?>
									<option value="<?php echo $value['name'] ?>"><?php echo $value['name'] ?></option>
								<?php } ?>
								</select>
			     				<label class="form_label">DL State</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="sd_add_buyer_dlexpire" id="sd_add_buyer_dlexpire" class="form-control form_field add_buyer_info_field datepicker" required="">
			     				<label class="form_label">DL Expire</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="sd_add_buyer_dldob" id="sd_add_buyer_dldob" class="form-control form_field add_buyer_info_field datepicker" required="">
			     				<label class="form_label">DL Date of Birth</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="sd_add_buyer_temp_tag_number" id="sd_add_buyer_temp_tag_number" class="form-control form_field add_buyer_info_field">
			     				<label class="form_label">Temp Tag Number</label>
			     			</div>
			     			<div class="form-group">
								<input type="submit" class="form_btn" value="Add Buyer">
							</div>
							</form>
						</div>
					</div>
				</div>
			</div>

			<div class="modal fade custom_modal" id="add_cobuyer" tabindex="-1" role="dialog" aria-labelledby="add_cobuyer" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Add Co-Buyer</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true"><i class="fa fa-times"></i></span>
							</button>
						</div>
						<div class="modal-body">
							<form id="add_cobuyer_info_form_sd">
							<div class="form-group">
			     				<?php /*<select class="form-control form_field" required="" name="sd_add_cobuyer_select_buyer" id="sd_add_cobuyer_select_buyer">
			     					<option value="0">Select Buyer</option>
								    foreach ($buyers_data as $value) {
								     		<option value="<?php echo $value['buyers_id'] ?>"><?php echo $value['buyers_first_name'].' '.$value['buyers_last_name'] ?></option>
								      }
			     				</select>*/?>

									<?php if(!empty($transaction_data)){ ?>
										<input type="text" name="sd_add_cobuyer_buyer" id="sd_add_cobuyer_buyer" class="form-control form_field" value="<?php echo $transaction_data->buyers_first_name.' '.$transaction_data->buyers_last_name ?>" required="" readonly="">
				     				<label class="form_label viewlabel">Add Co-Buyer to</label>
										<input type="hidden" name="sd_add_cobuyer_buyerid" id="sd_add_cobuyer_buyerid" value="<?php echo $transaction_data->buyers_id ?>">

									<?php }else{ ?>
										<input type="text" name="sd_add_cobuyer_buyer" id="sd_add_cobuyer_buyer" class="form-control form_field" required="" readonly="">
				     				<label class="form_label viewlabel">Add Co-Buyer to</label>
										<input type="hidden" name="sd_add_cobuyer_buyerid" id="sd_add_cobuyer_buyerid">
									<?php } ?>

			     			</div>
							<div class="form-group">
			     				<input type="text" name="sd_add_cobuyer_firstname" id="sd_add_cobuyer_firstname" class="form-control form_field add_cobuyer_info_field" required="">
			     				<label class="form_label">Co-Buyer First Name</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="sd_add_cobuyer_middlename" id="sd_add_cobuyer_middlename" class="form-control form_field add_cobuyer_info_field">
			     				<label class="form_label">Co-Buyer Middle Name</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="sd_add_cobuyer_lastname" id="sd_add_cobuyer_lastname" class="form-control form_field add_cobuyer_info_field" required="">
			     				<label class="form_label">Co-Buyer Last Name</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="sd_add_cobuyer_address" id="sd_add_cobuyer_address" class="form-control form_field add_cobuyer_info_field" required="">
			     				<label class="form_label">Co-Buyer Address</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="sd_add_cobuyer_city" id="sd_add_cobuyer_city" class="form-control form_field add_cobuyer_info_field" required="">
			     				<label class="form_label">Co-Buyer City</label>
			     			</div>
			     			<div class="form-group">
			     				<!-- <input type="text" name="sd_add_cobuyer_state" id="sd_add_cobuyer_state" class="form-control form_field add_cobuyer_info_field" required=""> -->
			     				<select name="sd_add_cobuyer_state" id="sd_add_cobuyer_state" class="form-control form_field add_cobuyer_info_field" required="">
								<?php foreach ($states as $key => $value) { ?>
									<option value="<?php echo $value['name'] ?>"><?php echo $value['name'] ?></option>
								<?php } ?>
								</select>
			     				<label class="form_label">Co-Buyer State</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="sd_add_cobuyer_zip" id="sd_add_cobuyer_zip" class="form-control form_field add_cobuyer_info_field" required="">
			     				<label class="form_label">Co-Buyer Zip</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="sd_add_cobuyer_country" id="sd_add_cobuyer_country" class="form-control form_field add_cobuyer_info_field" value="USA" required="">
			     				<label class="form_label">Co-Buyer Country</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="email" name="sd_add_cobuyer_email" id="sd_add_cobuyer_email" class="form-control form_field add_cobuyer_info_field" required="">
			     				<label class="form_label">Co-Buyer Email</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="sd_add_cobuyer_workphone" id="sd_add_cobuyer_workphone" class="form-control form_field add_cobuyer_info_field">
			     				<label class="form_label">Co-Buyer Work Phone</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="sd_add_cobuyer_homephone" id="sd_add_cobuyer_homephone" class="form-control form_field add_cobuyer_info_field">
			     				<label class="form_label">Co-Buyer Home Phone</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="sd_add_cobuyer_mobile" id="sd_add_cobuyer_mobile" class="form-control form_field add_cobuyer_info_field">
			     				<label class="form_label">Co-Buyer Mobile</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="sd_add_cobuyer_dlnumber" id="sd_add_cobuyer_dlnumber" class="form-control form_field add_cobuyer_info_field" required="">
			     				<label class="form_label">Co-Buyer Drivers License Number</label>
			     			</div>
			     			<div class="form-group">
			     				<!-- <input type="text" name="sd_add_cobuyer_dlstate" id="sd_add_cobuyer_dlstate" class="form-control form_field add_cobuyer_info_field" required=""> -->
			     				<select name="sd_add_cobuyer_dlstate" id="sd_add_cobuyer_dlstate" class="form-control form_field add_cobuyer_info_field" required="">
								<?php foreach ($states as $key => $value) { ?>
									<option value="<?php echo $value['name'] ?>"><?php echo $value['name'] ?></option>
								<?php } ?>
								</select>
			     				<label class="form_label">Co-Buyer DL State</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="sd_add_cobuyer_dlexpire" id="sd_add_cobuyer_dlexpire" class="form-control form_field add_cobuyer_info_field datepicker" required="">
			     				<label class="form_label">Co-Buyer DL Expire</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="sd_add_cobuyer_dldob" id="sd_add_cobuyer_dldob" class="form-control form_field add_cobuyer_info_field datepicker" required="">
			     				<label class="form_label">Co-Buyer DL Date of Birth</label>
			     			</div>
			     			<div class="form-group">
			     				<!-- data-dismiss="modal" class="form_btn add_cobuyer_done" -->
								<input type="submit"  class="form_btn" value="Add Co-Buyer">
							</div>
							</form>
						</div>
					</div>
				</div>
			</div>

			<div class="modal fade custom_modal" id="add_insurance" tabindex="-1" role="dialog" aria-labelledby="add_insurance" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Add Insurance</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true"><i class="fa fa-times"></i></span>
							</button>
						</div>
						<div class="modal-body">
							<form id="add_insurance_info_form_sd">
								<div class="form-group">
								<?php /*
			     				<select class="form-control form_field" name="sd_add_insurance_select" id="sd_add_insurance_select" required="">
			     					<option value="0">Select Buyer</option>
								    <?php foreach ($buyers_data as $value) { ?>
								     		<option value="<?php echo $value['buyers_id'] ?>"><?php echo $value['buyers_first_name'].' '.$value['buyers_last_name'] ?></option>
								    <?php } ?>
			     				</select>
			     				 */?>



									<?php if(!empty($transaction_data)){ ?>
										<input type="text" name="sd_add_insurance_buyer" id="sd_add_insurance_buyer" class="form-control form_field" value="<?php echo $transaction_data->buyers_first_name.' '.$transaction_data->buyers_last_name ?>" required="" readonly="">
				     				<label class="form_label viewlabel">Add Insurance to</label>
				     				<input type="hidden" name="sd_add_insurance_buyerid" id="sd_add_insurance_buyerid" value="<?php echo $transaction_data->buyers_id ?>">
									<?php }else{ ?>
										<input type="text" name="sd_add_insurance_buyer" id="sd_add_insurance_buyer" class="form-control form_field" required="" readonly="">
				     				<label class="form_label viewlabel">Add Insurance to</label>
				     				<input type="hidden" name="sd_add_insurance_buyerid" id="sd_add_insurance_buyerid">
									<?php } ?>


			     			</div>
							<div class="form-group">
			     				<input type="text" name="sd_add_insurance_companyname" id="sd_add_insurance_companyname" class="form-control form_field add_insurance_info_field" required="">
			     				<label class="form_label">Insurance Company</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="sd_add_insurance_policynumber" id="sd_add_insurance_policynumber" class="form-control form_field add_insurance_info_field" required="">
			     				<label class="form_label">Policy Number</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="sd_add_insurance_agentname" id="sd_add_insurance_agentname" class="form-control form_field add_insurance_info_field" required="">
			     				<label class="form_label">Agent Name</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="sd_add_insurance_agentphone" id="sd_add_insurance_agentphone" class="form-control form_field add_insurance_info_field" required="">
			     				<label class="form_label">Agent Phone</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="sd_add_insurance_address" id="sd_add_insurance_address" class="form-control form_field add_insurance_info_field" required="">
			     				<label class="form_label">Address</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="sd_add_insurance_city" id="sd_add_insurance_city" class="form-control form_field add_insurance_info_field" required="">
			     				<label class="form_label">City</label>
			     			</div>
			     			<div class="form-group">
			     				<!-- <input type="text" name="sd_add_insurance_state" id="sd_add_insurance_state" class="form-control form_field add_insurance_info_field" required=""> -->
			     				<select name="sd_add_insurance_state" id="sd_add_insurance_state" class="form-control form_field add_insurance_info_field" required="">
								<?php foreach ($states as $key => $value) { ?>
									<option value="<?php echo $value['name'] ?>"><?php echo $value['name'] ?></option>
								<?php } ?>
								</select>
			     				<label class="form_label">State</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="sd_add_insurance_zip" id="sd_add_insurance_zip" class="form-control form_field add_insurance_info_field" required="">
			     				<label class="form_label">Zip</label>
			     			</div>
			     			<div class="form-group">
			     				<!-- data-dismiss="modal" class="form_btn add_insurance_done" -->
								<input type="submit" class="form_btn" value="Add Insurance">
							</div>
							</form>
						</div>
					</div>
				</div>
			</div>

			<div class="modal fade custom_modal" id="print_deal" tabindex="-1" role="dialog" aria-labelledby="print_deal" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Choose The Documents You Want to Print</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true"><i class="fa fa-times"></i></span>
							</button>
						</div>
						<div class="modal-body">
							<form action="<?php echo base_url(); ?>startdeal/documents" method="post" target="_blank" id="sd_main_readyprint_form">
							<div class="form-group">
			     				<input type="text" name="sd_main_readyprint_date" id="sd_main_readyprint_date" class="form-control form_field datepicker" required="">
			     				<label class="form_label">Choose Document(s) Date</label>
			     			</div>
			     			<div class="form-group">
			     				<label class="checkbox1">Choose to Print All
								  	<input type="checkbox" name="chooseall" id="chooseall">
								  	<span class="checkmark"></span>
								</label>
			     			</div>
			     			<div class="form-group">
			     				<label class="checkbox1">Bill Of Sale
								  	<input type="checkbox" class="print_deal_option" name="sd_main_readyprint_billofsale" id="sd_main_readyprint_billofsale">
								  	<span class="checkmark"></span>
								</label>
			     			</div>
			     			<input type="hidden" name="inv_id" id="sd_main_readyprint_inv_id" />
							<input type="hidden" name="trade_inv_id" id="sd_main_readyprint_trade_inv_id" />
							<input type="hidden" name="buyers_id" id="sd_main_readyprint_buyers_id" />
							<input type="hidden" name="transact_id" id="sd_main_readyprint_transact_id" />
			     			<div class="form-group">
			     				<label class="checkbox1">Title Application
								  	<input type="checkbox" class="print_deal_option" name="sd_main_readyprint_title_application" id="sd_main_readyprint_title_application">
								  	<span class="checkmark"></span>
								</label>
			     			</div>
			     			<div class="form-group">
			     				<label class="checkbox1">Odometer Statement
								  	<input type="checkbox" class="print_deal_option" name="sd_main_readyprint_odometer_statement" id="sd_main_readyprint_odometer_statement">
								  	<span class="checkmark"></span>
								</label>
			     			</div>
			     			<div class="form-group">
			     				<label class="checkbox1">As-Is
								  	<input type="checkbox" class="print_deal_option" name="sd_main_readyprint_as_is" id="sd_main_readyprint_as_is">
								  	<span class="checkmark"></span>
								</label>
			     			</div>
			     			<div class="form-group">
			     				<label class="checkbox1">Proof Of Insurance
								  	<input type="checkbox" class="print_deal_option" name="sd_main_readyprint_proof_of_insurance" id="sd_main_readyprint_proof_of_insurance">
								  	<span class="checkmark"></span>
								</label>
			     			</div>
			     			<div class="form-group">
			     				<label class="checkbox1">Power of Attorney
								  	<input type="checkbox" class="print_deal_option" name="sd_main_readyprint_power_of_attorney" id="sd_main_readyprint_power_of_attorney">
								  	<span class="checkmark"></span>
								</label>
			     			</div>
			     			<div class="form-group">
			     				<label class="checkbox1">Arbitration Agreement
								  	<input type="checkbox" class="print_deal_option" name="sd_main_readyprint_arbitration_agreement" id="sd_main_readyprint_arbitration_agreement">
								  	<span class="checkmark"></span>
								</label>
			     			</div>
			     			<div class="form-group">
			     				<label class="checkbox1">Right Of Repossession
								  	<input type="checkbox" class="print_deal_option" name="sd_main_readyprint_right_repossession" id="sd_main_readyprint_right_repossession">
								  	<span class="checkmark"></span>
								</label>
			     			</div>
			     			<div class="form-group">
			     				<label class="checkbox1">OFAC Statement
								  	<input type="checkbox" class="print_deal_option" name="sd_main_readyprint_ofac_statement" id="sd_main_readyprint_ofac_statement">
								  	<span class="checkmark"></span>
								</label>
			     			</div>
			     			<div class="form-group">
			     				<label class="checkbox1">Privacy Information
								  	<input type="checkbox" class="print_deal_option" name="sd_main_readyprint_privacy_information" id="sd_main_readyprint_privacy_information">
								  	<span class="checkmark"></span>
								</label>
			     			</div>
			     			<div class="form-group">
			     				<label class="checkbox1">Certificate Of Exemption
								  	<input type="checkbox" class="print_deal_option" name="sd_main_readyprint_certificate_exemption" id="sd_main_readyprint_certificate_exemption">
								  	<span class="checkmark"></span>
								</label>
			     			</div>
			     			<div class="form-group">
								<input type="button" class="form_btn" id="sd_main_readyprint_btn" value="Print Forms">
							</div>
						</form>
						</div>
					</div>
				</div>
			</div>
			<?php $state = $memberdata->state; ?>
			<div class="modal fade custom_modal" id="print_deal_<?php echo $state ?>" tabindex="-1" role="dialog" aria-labelledby="print_deal_<?php echo $state ?>" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Choose The Documents You Want to Print</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true"><i class="fa fa-times"></i></span>
							</button>
						</div>
						<div class="modal-body">
							<form action="<?php echo base_url(); ?>startdeal/documents" method="post" target="_blank" id="sd_main_readyprint_form<?php echo $state ?>">
							<div class="form-group">
			     				<input type="text" name="sd_main_readyprint_date" id="sd_main_readyprint_date" class="form-control form_field datepicker" required="">
			     				<label class="form_label">Choose Document(s) Date</label>
			     			</div>
			     			<div class="form-group">
			     				<label class="checkbox1">Choose to Print All
								  	<input type="checkbox" name="chooseall" id="chooseall<?php echo $state ?>">
								  	<span class="checkmark"></span>
								</label>
			     			</div>

			     		<input type="hidden" name="inv_id" id="sd_main_readyprint_inv_id<?php echo $state ?>" />
							<input type="hidden" name="trade_inv_id" id="sd_main_readyprint_trade_inv_id<?php echo $state ?>" />
							<input type="hidden" name="buyers_id" id="sd_main_readyprint_buyers_id<?php echo $state ?>" />
							<input type="hidden" name="transact_id" id="sd_main_readyprint_transact_id<?php echo $state ?>" />
							<?php if($state == 'FLORIDA'){ ?>

							<div class="form-group">
			     				<label class="checkbox1">OFAC Statement
								  	<input type="checkbox" class="print_deal_option<?php echo $state ?>" name="sd_main_readyprint_ofac_statement">
								  	<span class="checkmark"></span>
								</label>
			     			</div>

							<div class="form-group">
			     				<label class="checkbox1">Bill Of Sale
								  	<input type="checkbox" class="print_deal_option<?php echo $state ?>" name="sd_main_readyprint_billofsale">
								  	<span class="checkmark"></span>
								</label>
			     			</div>

			     			<div class="form-group">
			     				<label class="checkbox1">As-Is
								  	<input type="checkbox" class="print_deal_option<?php echo $state ?>" name="sd_main_readyprint_as_is">
								  	<span class="checkmark"></span>
								</label>
			     			</div>

							<div class="form-group">
			     				<label class="checkbox1">Customer Consent
								  	<input type="checkbox" class="print_deal_option<?php echo $state ?>" name="sd_main_readyprint_customer_consent">
								  	<span class="checkmark"></span>
								</label>
			     			</div>

			     			<div class="form-group">
			     				<label class="checkbox1">Odometer Disclosure Statement
								  	<input type="checkbox" class="print_deal_option<?php echo $state ?>" name="sd_main_readyprint_odometer_statement">
								  	<span class="checkmark"></span>
								</label>
			     			</div>

			     			<div class="form-group">
			     				<label class="checkbox1">Power of Attorney
								  	<input type="checkbox" class="print_deal_option<?php echo $state ?>" name="sd_main_readyprint_power_of_attorney">
								  	<span class="checkmark"></span>
								</label>
			     			</div>

			     			<div class="form-group">
			     				<label class="checkbox1">Vehicle Air Pollution Control Statement
								  	<input type="checkbox" class="print_deal_option<?php echo $state ?>" name="sd_main_readyprint_apc">
								  	<span class="checkmark"></span>
								</label>
			     			</div>

			     			<div class="form-group">
			     				<label class="checkbox1">Hope Scholarship Program
								  	<input type="checkbox" class="print_deal_option<?php echo $state ?>" name="sd_main_readyprint_hope_scholarship_program">
								  	<span class="checkmark"></span>
								</label>
			     			</div>

			     			<div class="form-group">
			     				<label class="checkbox1">Federal Risk Based Pricing Notice
								  	<input type="checkbox" class="print_deal_option<?php echo $state ?>" name="sd_main_readyprint_federal_risk">
								  	<span class="checkmark"></span>
								</label>
			     			</div>

			     			<div class="form-group">
			     				<label class="checkbox1">Repossession Agreement
								  	<input type="checkbox" class="print_deal_option<?php echo $state ?>" name="sd_main_readyprint_repossession">
								  	<span class="checkmark"></span>
								</label>
			     			</div>

			     			<div class="form-group">
			     				<label class="checkbox1">Buyers Agreement
								  	<input type="checkbox" class="print_deal_option<?php echo $state ?>" name="sd_main_readyprint_buyers_agreement">
								  	<span class="checkmark"></span>
								</label>
			     			</div>

			     			<div class="form-group">
			     				<label class="checkbox1">Arbitration Agreement
								  	<input type="checkbox" class="print_deal_option<?php echo $state ?>" name="sd_main_readyprint_arbitration_agreement">
								  	<span class="checkmark"></span>
								</label>
			     			</div>

			     			<div class="form-group">
			     				<label class="checkbox1">Separate Odometer Disclosure Statement
								  	<input type="checkbox" class="print_deal_option<?php echo $state ?>" name="sd_main_readyprint_sep_odometer_statement">
								  	<span class="checkmark"></span>
								</label>
			     			</div>

			     			<div class="form-group">
			     				<label class="checkbox1">Buyers Guide
								  	<input type="checkbox" class="print_deal_option<?php echo $state ?>" name="sd_main_readyprint_buyers_guide">
								  	<span class="checkmark"></span>
								</label>
			     			</div>
			     			<div class="form-group">
			     				<label class="checkbox1">Facts
								  	<input type="checkbox" class="print_deal_option<?php echo $state ?>" name="sd_main_readyprint_facts">
								  	<span class="checkmark"></span>
								</label>
			     			</div>

			     			<div class="form-group">
			     				<label class="checkbox1">Insurance Affidavit
								  	<input type="checkbox" class="print_deal_option<?php echo $state ?>" name="sd_main_readyprint_insurance_affidavit">
								  	<span class="checkmark"></span>
								</label>
			     			</div>
			     			<div class="form-group">
			     				<label class="checkbox1">Insurance Agreement
								  	<input type="checkbox" class="print_deal_option<?php echo $state ?>" name="sd_main_readyprint_insurance_agreement">
								  	<span class="checkmark"></span>
								</label>
			     			</div>
			     			<div class="form-group">
			     				<label class="checkbox1">Installment Contract and Security Agreement
								  	<input type="checkbox" class="print_deal_option<?php echo $state ?>" name="sd_main_readyprint_installment_contract">
								  	<span class="checkmark"></span>
								</label>
			     			</div>
			     			<div class="form-group">
			     				<label class="checkbox1">Buyer's Order
								  	<input type="checkbox" class="print_deal_option<?php echo $state ?>" name="sd_main_readyprint_buyers_order">
								  	<span class="checkmark"></span>
								</label>
			     			</div>

							<?php }elseif ($state == "TEXAS") { //19?>
								<div class="form-group">
				     			<label class="checkbox1">Application For Title And Registration
										<input type="checkbox" class="print_deal_option<?php echo $state ?>" name="sd_main_readyprint_app_title_registration">
									  <span class="checkmark"></span>
									</label>
				     		</div>

								<div class="form-group">
				     			<label class="checkbox1">Bill Of Sale
									  	<input type="checkbox" class="print_deal_option<?php echo $state ?>" name="sd_main_readyprint_billofsale">
									  	<span class="checkmark"></span>
									</label>
				     		</div>

				     		<div class="form-group">
				     			<label class="checkbox1">Retail Installment Sales Contract
											<input type="checkbox" class="print_deal_option<?php echo $state ?>" name="sd_main_readyprint_installment_contract">
									  	<span class="checkmark"></span>
									</label>
				     		</div>

								<div class="form-group">
									<label class="checkbox1">Power of Attorney
										<input type="checkbox" class="print_deal_option<?php echo $state ?>" name="sd_main_readyprint_power_of_attorney">
										<span class="checkmark"></span>
									</label>
								</div>

								<div class="form-group">
									<label class="checkbox1">Buyers Guide
										<input type="checkbox" class="print_deal_option<?php echo $state ?>" name="sd_main_readyprint_buyers_guide">
										<span class="checkmark"></span>
									</label>
								</div>

									<div class="form-group">
										<label class="checkbox1">Vehicle Purchase Loan Payment Schedule
											<input type="checkbox" class="print_deal_option<?php echo $state ?>" name="sd_main_readyprint_loan_payment_schedule">
											<span class="checkmark"></span>
										</label>
									</div>

									<div class="form-group">
										<label class="checkbox1">Arbitration Agreement
											<input type="checkbox" class="print_deal_option<?php echo $state ?>" name="sd_main_readyprint_arbitration_agreement">
											<span class="checkmark"></span>
										</label>
									</div>

				     			<div class="form-group">
				     				<label class="checkbox1">Credit Reporting Disclosure
									  	<input type="checkbox" class="print_deal_option<?php echo $state ?>" name="sd_main_readyprint_credit_reporting_disclosure">
									  	<span class="checkmark"></span>
									</label>
				     			</div>

									<div class="form-group">
										<label class="checkbox1">Facts
											<input type="checkbox" class="print_deal_option<?php echo $state ?>" name="sd_main_readyprint_facts">
											<span class="checkmark"></span>
										</label>
									</div>

									<div class="form-group">
				     				<label class="checkbox1">Disclosure On Airbags
									  	<input type="checkbox" class="print_deal_option<?php echo $state ?>" name="sd_main_readyprint_airbags">
									  	<span class="checkmark"></span>
									</label>
				     			</div>

									<div class="form-group">
				     				<label class="checkbox1">Release Agreement
									  	<input type="checkbox" class="print_deal_option<?php echo $state ?>" name="sd_main_readyprint_release_agreement">
									  	<span class="checkmark"></span>
										</label>
				     			</div>

									<div class="form-group">
										<label class="checkbox1">Odometer Disclosure Statement
											<input type="checkbox" class="print_deal_option<?php echo $state ?>" name="sd_main_readyprint_odometer_statement">
											<span class="checkmark"></span>
									</label>
									</div>

				     			<div class="form-group">
				     				<label class="checkbox1">Agreement To Provide Insurance
									  	<input type="checkbox" class="print_deal_option<?php echo $state ?>" name="sd_main_readyprint_api">
									  	<span class="checkmark"></span>
									</label>
				     			</div>


				     			<div class="form-group">
				     				<label class="checkbox1">Country Of Title Issurance
									  	<input type="checkbox" class="print_deal_option<?php echo $state ?>" name="sd_main_readyprint_country_title_issurance">
									  	<span class="checkmark"></span>
									</label>
				     			</div>

				     			<div class="form-group">
				     				<label class="checkbox1">Authorization Letter
									  	<input type="checkbox" class="print_deal_option<?php echo $state ?>" name="sd_main_readyprint_authorization_letter">
									  	<span class="checkmark"></span>
									</label>
				     			</div>

				     			<div class="form-group">
				     				<label class="checkbox1">Electronic Payment Authorization
									  	<input type="checkbox" class="print_deal_option<?php echo $state ?>" name="sd_main_readyprint_electronic_payment_authorization">
									  	<span class="checkmark"></span>
									</label>
				     			</div>

				     			<div class="form-group">
				     				<label class="checkbox1">Do Not Sign This Paper Untill Fully Read
									  	<input type="checkbox" class="print_deal_option<?php echo $state ?>" name="sd_main_readyprint_do_not_sign">
									  	<span class="checkmark"></span>
									</label>
				     			</div>

				     			<div class="form-group">
				     				<label class="checkbox1">Receipt For Down Payment
									  	<input type="checkbox" class="print_deal_option<?php echo $state ?>" name="sd_main_readyprint_receipt_downpayment">
									  	<span class="checkmark"></span>
									</label>
				     			</div>
				     			<div class="form-group">
				     				<label class="checkbox1">Buyer Information
									  	<input type="checkbox" class="print_deal_option<?php echo $state ?>" name="sd_main_readyprint_buyer_information">
									  	<span class="checkmark"></span>
									</label>
				     			</div>
							<?php } ?>
			     			<div class="form-group">
								<input type="button" class="form_btn" id="sd_main_readyprint_btn<?php echo $state ?>" value="Print Forms">
							</div>
						</form>
						</div>
					</div>
				</div>
			</div>

			<div class="modal fade custom_modal" id="bhph_contract" tabindex="-1" role="dialog" aria-labelledby="bhph_contract" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<form action="<?php echo base_url(); ?>startdeal/contracts" method="post" target="_blank" id="sd_main_bhphcontract_form">
						<div class="modal-header">
							<h4 class="modal-title">BHPH Contract</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true"><i class="fa fa-times"></i></span>
							</button>
						</div>
						<div class="modal-body">
							<div class="form-group">
			     				<input type="text" name="sd_main_bhphcontract_date" id="sd_main_bhphcontract_date" class="form-control form_field datepicker" required="">
			     				<label class="form_label">Choose Document(s) Date</label>
			     			</div>

			     			<div class="form-group">
			     				<label class="checkbox1">BHPH Contract
								  	<input type="checkbox" id="sd_main_bhphcontract_cb" name="sd_main_bhphcontract_cb">
								  	<span class="checkmark"></span>
								</label>
			     			</div>
			     			<input type="hidden" name="inv_id" id="sd_main_bhphcontract_inv_id" value="<?php if(!empty($transaction_data)) echo $transaction_data->inv_id ?>"/>
							<input type="hidden" name="trade_inv_id" id="sd_main_bhphcontract_trade_inv_id" value="<?php if(!empty($transaction_data)) echo $transaction_data->trade_inv_id ?>"/>
							<input type="hidden" name="buyers_id" id="sd_main_bhphcontract_buyers_id" value="<?php if(!empty($transaction_data)) echo $transaction_data->buyers_id ?>"/>
							<input type="hidden" name="transact_id" id="sd_main_bhphcontract_transact_id" value="<?php if(!empty($transaction_data)) echo $transaction_data->transact_id ?>"/>
			     			<div class="form-group">
			     				<input type="text" name="sd_main_bhphcontract_cash_price" id="sd_main_bhphcontract_cash_price" class="form-control form_field" required="" onkeypress="return isFloatNumber(this,event)" value="<?php if(!empty($transaction_data)) if(!empty($buyers_trans_data)) echo $buyers_trans_data->sale_price ?>">
			     				<label class="form_label">Cash Price</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="sd_main_bhphcontract_dealer_fee" id="sd_main_bhphcontract_dealer_fee" class="form-control form_field" required="" onkeypress="return isFloatNumber(this,event)" value="<?php if(!empty($transaction_data)) if(!empty($buyers_trans_data)) echo $buyers_trans_data->dealer_fee ?>">
			     				<label class="form_label">Dealer Fee</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="sd_main_bhphcontract_taxes" id="sd_main_bhphcontract_taxes" class="form-control form_field" required="" onkeypress="return isFloatNumber(this,event)" value="<?php if(!empty($transaction_data)) if(!empty($buyers_trans_data)) echo $buyers_trans_data->tax ?>">
			     				<label class="form_label">Taxes</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="sd_main_bhphcontract_cashdown" id="sd_main_bhphcontract_cashdown" class="form-control form_field" required="" onkeypress="return isFloatNumber(this,event)" value="<?php if(!empty($transaction_data)) if(!empty($buyers_trans_data)) echo $buyers_trans_data->cash_credit ?>">
			     				<label class="form_label">Cash Down</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="sd_main_bhphcontract_deferred_down" id="sd_main_bhphcontract_deferred_down" class="form-control form_field" required="" onkeypress="return isFloatNumber(this,event)" value="<?php if(!empty($transaction_data)) if(!empty($buyers_trans_data)) echo $buyers_trans_data->cal_down_payment ?>">
			     				<label class="form_label">Deferred Down</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="sd_main_bhphcontract_trade_allowance" id="sd_main_bhphcontract_trade_allowance" class="form-control form_field" required="" onkeypress="return isFloatNumber(this,event)" value="<?php if(!empty($transaction_data)) if(!empty($buyers_trans_data)) echo $buyers_trans_data->trade_credit ?>">
			     				<label class="form_label">Trade Allowance</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="sd_main_bhphcontract_title_fee" id="sd_main_bhphcontract_title_fee" class="form-control form_field" required="" onkeypress="return isFloatNumber(this,event)" value="<?php if(!empty($transaction_data)) if(!empty($buyers_trans_data)) echo $buyers_trans_data->dmv ?>">
			     				<label class="form_label">Title Fee</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="sd_main_bhphcontract_payment_amount" id="sd_main_bhphcontract_payment_amount" class="form-control form_field" required="" onkeypress="return isFloatNumber(this,event)" value="<?php if(!empty($transaction_data)) if(!empty($buyers_trans_data)) echo $buyers_trans_data->cal_monthly_payment ?>">
			     				<label class="form_label">Payment Amount</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="number" name="sd_main_bhphcontract_number_payments" id="sd_main_bhphcontract_number_payments" class="form-control form_field" required="" value="<?php if(!empty($transaction_data)) if(!empty($buyers_trans_data)) echo $buyers_trans_data->bhph_months ?>">
			     				<label class="form_label">Number of Payments</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="sd_main_bhphcontract_interest_rate" id="sd_main_bhphcontract_interest_rate" class="form-control form_field" required="" onkeypress="return isFloatNumber(this,event)" value="<?php if(!empty($transaction_data)) if(!empty($buyers_trans_data)) echo $buyers_trans_data->bhph_rate ?>">
			     				<label class="form_label">Interest Rate (Percentage)</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="sd_main_bhphcontract_total_payments" id="sd_main_bhphcontract_total_payments" class="form-control form_field" required="" onkeypress="return isFloatNumber(this,event)" value="<?php if(!empty($transaction_data)) if(!empty($buyers_trans_data)) echo $buyers_trans_data->bhph_tpmts ?>">
			     				<label class="form_label">Total of Payments</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="sd_main_bhphcontract_finance_charge" id="sd_main_bhphcontract_finance_charge" class="form-control form_field" required="" onkeypress="return isFloatNumber(this,event)" value="<?php if(!empty($transaction_data)) if(!empty($buyers_trans_data)) echo $buyers_trans_data->cal_total_interest ?>">
			     				<label class="form_label">Finance Charge</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="sd_main_bhphcontract_tot_finance_amt" id="sd_main_bhphcontract_tot_finance_amt" class="form-control form_field" required="" onkeypress="return isFloatNumber(this,event)" value="<?php if(!empty($transaction_data)) if(!empty($buyers_trans_data)) echo $buyers_trans_data->cal_amount_finance ?>">
			     				<label class="form_label">Total Finance Amt</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="sd_main_bhphcontract_tot_price_paid" id="sd_main_bhphcontract_tot_price_paid" class="form-control form_field" required="" onkeypress="return isFloatNumber(this,event)" value="<?php if(!empty($transaction_data)) if(!empty($buyers_trans_data)) echo $buyers_trans_data->cash_credit + $buyers_trans_data->bhph_tpmts; ?>">
			     				<label class="form_label">Total Price Paid (Includes Down Pmt)</label>
			     			</div>
			     			<!-- <div class="form-group">
			     				<input type="text" name="sd_main_bhphcontract_payment_schedule" id="sd_main_bhphcontract_payment_schedule" class="form-control form_field daterange" required="" value="<?php //if(!empty($transaction_data)) if(!empty($buyers_trans_data)) if($buyers_trans_data->bhph_pmtdate != ' - ') echo $buyers_trans_data->bhph_pmtdate ?>">
			     				<label class="form_label">Payment Schedule</label>
			     			</div> -->
			     			<div class="form-group">
			     				<input type="text" name="sd_main_bhphcontract_payment_schedule_start" id="sd_main_bhphcontract_payment_schedule_start" class="form-control form_field start_date" required="">
			     				<label class="form_label">Payment due Schedule From</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="sd_main_bhphcontract_payment_schedule_end" id="sd_main_bhphcontract_payment_schedule_end" class="form-control form_field end_date" required="">
			     				<label class="form_label">Payment due Schedule To</label>
			     			</div>
			     			<div class="form-group">
								<input type="button" class="form_btn" id="sd_main_bhphcontract_btn" value="Print Contract">
							</div>
						</div>
					</form>
					</div>
				</div>
			</div>
		</div>
		<script type="text/javascript">var userstate = '<?php echo $memberdata->state; ?>'</script>

		<?php $this->load->view('common/footer');?>

		</body>

		<?php $this->load->view('common/footer-script');?>
		<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
		<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
		<script type="text/javascript">
			$(".select2").select2({});
		</script>

		<script type="text/javascript">
			<?php if(!empty($transaction_data)){  ?>
			$('#next_trade').removeAttr("style");
			$('#next_trade_skip').removeAttr("style");
			<?php } ?>
		</script>
		<style type="text/css">
			span.select2-selection.select2-selection--single {
			    width: -webkit-fill-available;
			    padding: 10px 15px;
			    border-radius: 5px;
			    border: 1px solid #cacaca;
			    height: 45px;
			    min-height: 45px;
			    display: block;
			    font-size: 1rem;
			    font-weight: 400;
			    line-height: 1.5;
			    color: #495057;
			    background-color: #fff;
			    background-clip: padding-box;
			    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
			    text-align: left;
			}

			.select2-container--default .select2-selection--single .select2-selection__arrow {
			    height: 45px;
			}
			span.select2.select2-container.select2-container--default {
			    width: 100% !important;
			}
			span.select2-selection.select2-selection--single:focus {
			    outline: none;
			}
			.select2-container--open .select2-dropdown {
			    left: 0;
			    z-index: 0;
			}
		</style>

<!-- OFAC STATEMENT
BILL OF SALE
AS IS
Customer Consent
ODOMETER DISCLOSURE STATEMENT
Attorney
Vehicle Air Pollution Control Statement
Hope Scholarship Program
Federal Risk Based Pricing Notice
REPOSSESSION AGREEMENT
BUYERS AGREEMENT
Arbitration Agreement
SEPARATE ODOMETER DISCLOSURE STATEMENT
BUYERS GUIDE
FACTS
INSURANCE AFFIDAVIT
INSURANCE AGREEMENT
Installment Contract and Security Agreement
Buyer's Order-->
</html>
