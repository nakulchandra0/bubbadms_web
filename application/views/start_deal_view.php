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

								<div class="step_group" <?php if(!empty($transaction_data)) echo "style='display: block; left: 0%; opacity: 1;'" ?>>
									<h3 class="center no_d_desk">Review</h3>
									<div class="row">
										<div class="col-md-3">
											<div class="box">
												<h4 class="modal-title mb-3">Review Buyer Details</h4>
												<div class="form-group">
								     				<input type="text" name="sd_main_buyers_firstname" id="sd_main_buyers_firstname" class="form-control form_field" value="<?php if(!empty($transaction_data)) echo $transaction_data->buyers_first_name  ?>" readonly>
								     				<label class="viewlabel form_label">First Name</label>
								     			</div>
								     			<div class="form-group">
								     				<input type="text" name="sd_main_buyers_middlename" id="sd_main_buyers_middlename" class="form-control form_field" value="<?php if(!empty($transaction_data)) echo $transaction_data->buyers_mid_name  ?>" readonly>
								     				<label class="viewlabel form_label">Middle Name</label>
								     			</div>
								     			<div class="form-group">
								     				<input type="text" name="sd_main_buyers_lastname" id="sd_main_buyers_lastname" class="form-control form_field" value="<?php if(!empty($transaction_data)) echo $transaction_data->buyers_last_name  ?>" readonly>
								     				<label class="viewlabel form_label">Last Name</label>
								     			</div>
								     			<div class="form-group">
								     				<input type="text" name="sd_main_buyers_address" id="sd_main_buyers_address" class="form-control form_field" value="<?php if(!empty($transaction_data)) echo $transaction_data->buyers_address  ?>" readonly>
								     				<label class="viewlabel form_label">Address</label>
								     			</div>
								     			<div class="form-group">
								     				<input type="text" name="sd_main_buyers_city" id="sd_main_buyers_city" class="form-control form_field" value="<?php if(!empty($transaction_data)) echo $transaction_data->buyers_city  ?>" readonly>
								     				<label class="viewlabel form_label">City</label>
								     			</div>
								     			<div class="form-group">
														<input type="text" class="form-control form_field" value="<?php if(!empty($transaction_data)) echo $transaction_data->buyers_state  ?>" readonly>
								     				<label class="viewlabel form_label">State</label>
								     			</div>
								     			<div class="form-group">
								     				<input type="text" name="sd_main_buyers_zip" id="sd_main_buyers_zip" class="form-control form_field" value="<?php if(!empty($transaction_data)) echo $transaction_data->buyers_zip  ?>" readonly>
								     				<label class="viewlabel form_label">Zip</label>
								     			</div>
								     			<div class="form-group">
								     				<input type="text" name="sd_main_buyers_country" id="sd_main_buyers_country" class="form-control form_field" value="USA" readonly>
								     				<label class="viewlabel form_label">Country</label>
								     			</div>
								     			<div class="form-group">
								     				<input type="email" name="sd_main_buyers_email" id="sd_main_buyers_email" class="form-control form_field" value="<?php if(!empty($transaction_data)) echo $transaction_data->buyers_pri_email  ?>" readonly>
								     				<label class="viewlabel form_label">Email</label>
								     			</div>
								     			<div class="form-group">
								     				<input type="text" name="sd_main_buyers_workphone" id="sd_main_buyers_workphone" class="form-control form_field" value="<?php if(!empty($transaction_data)) echo $transaction_data->buyers_work_phone  ?>" readonly>
								     				<label class="viewlabel form_label">Work Phone</label>
								     			</div>
								     			<div class="form-group">
								     				<input type="text" name="sd_main_buyers_homephone" id="sd_main_buyers_homephone" class="form-control form_field" value="<?php if(!empty($transaction_data)) echo $transaction_data->buyers_home_phone  ?>" readonly>
								     				<label class="viewlabel form_label">Home Phone</label>
								     			</div>
								     			<div class="form-group">
								     				<input type="text" name="sd_main_buyers_mobile" id="sd_main_buyers_mobile" class="form-control form_field" value="<?php if(!empty($transaction_data)) echo $transaction_data->buyers_pri_phone_cell  ?>" readonly>
								     				<label class="viewlabel form_label">Mobile</label>
								     			</div>
								     			<div class="form-group">
								     				<input type="text" name="sd_main_buyers_dlnumber" id="sd_main_buyers_dlnumber" class="form-control form_field" value="<?php if(!empty($transaction_data)) echo $transaction_data->buyers_DL_number  ?>" readonly>
								     				<label class="viewlabel form_label">Drivers License Number</label>
								     			</div>
								     			<div class="form-group">
														<input type="text" class="form-control form_field" value="<?php if(!empty($transaction_data)) echo $transaction_data->buyers_DL_state  ?>" readonly>
								     				<label class="viewlabel form_label">DL State</label>
								     			</div>
								     			<div class="form-group">
								     				<input type="text" name="sd_main_buyers_dlexpire" id="sd_main_buyers_dlexpire" class="form-control form_field" value="<?php if(!empty($transaction_data)) echo $transaction_data->buyers_DL_expire  ?>" readonly>
								     				<label class="viewlabel form_label">DL Expire</label>
								     			</div>
								     			<div class="form-group">
								     				<input type="text" name="sd_main_buyers_dldob" id="sd_main_buyers_dldob" class="form-control form_field" value="<?php if(!empty($transaction_data)) echo $transaction_data->buyers_DL_dob  ?>" readonly>
								     				<label class="viewlabel form_label">DL Date of Birth</label>
								     			</div>
								     			<div class="form-group">
								     				<input type="text" name="sd_main_buyers_temp_tag_number" id="sd_main_buyers_temp_tag_number" class="form-control form_field" value="<?php if(!empty($transaction_data)) echo $transaction_data->buyers_temp_tag_number  ?>" readonly>
								     				<label class="viewlabel form_label">Temp Tag Number</label>
								     			</div>
								     		</div>
										</div>
										<div class="col-md-3" id="sd_main_inventory_box" <?php if(!empty($transaction_data->inv_id)) echo "style='display: block;'"; else echo "style='display: none;'"; ?>>
											<div class="box">
												<h4 class="modal-title mb-3">Review Vehicle Details(Inventory)</h4>
												<div class="form-group">
								     				<input type="text" name="sd_main_inventory_vin" id="sd_main_inventory_vin" class="form-control form_field" value="<?php if(!empty($transaction_data)) echo $transaction_data->inv_vin ?>" readonly>
								     				<label class="viewlabel form_label">VIN</label>
								     			</div>
								     			<div class="form-group">
								     				<input type="text" name="sd_main_inventory_year" id="sd_main_inventory_year" class="form-control form_field" value="<?php if(!empty($transaction_data)) echo $transaction_data->inv_year  ?>" readonly>
								     				<label class="viewlabel form_label">Year</label>
								     			</div>
								     			<div class="form-group">
								     				<input type="text" name="sd_main_inventory_make" id="sd_main_inventory_make" class="form-control form_field" value="<?php if(!empty($transaction_data)) echo $transaction_data->inv_make  ?>" readonly>
								     				<label class="viewlabel form_label">Make</label>
								     			</div>
								     			<div class="form-group">
								     				<input type="text" name="sd_main_inventory_model" id="sd_main_inventory_model" class="form-control form_field" value="<?php if(!empty($transaction_data)) echo $transaction_data->inv_model ?>" readonly>
								     				<label class="viewlabel form_label">Model</label>
								     			</div>
								     			<div class="form-group">
								     				<input type="text" name="sd_main_inventory_style" id="sd_main_inventory_style" class="form-control form_field" value="<?php if(!empty($transaction_data)) echo $transaction_data->inv_style  ?>" readonly>
								     				<label class="viewlabel form_label">Style</label>
								     			</div>
								     			<div class="form-group">
								     				<input type="text" name="sd_main_inventory_stocknumber" id="sd_main_inventory_stocknumber" class="form-control form_field" value="<?php if(!empty($transaction_data)) echo $transaction_data->inv_stock  ?>" readonly>
								     				<label class="viewlabel form_label">Stock Number</label>
								     			</div>
								     			<div class="form-group">
								     				<input type="text" name="sd_main_inventory_color" id="sd_main_inventory_color" class="form-control form_field" value="<?php if(!empty($transaction_data)) echo $transaction_data->inv_color  ?>" readonly>
								     				<label class="viewlabel form_label">Color</label>
								     			</div>
													<div class="form-group">
								     				<input type="text" name="sd_main_inventory_drivetype" id="sd_main_inventory_drivetype" class="form-control form_field" value="<?php if(!empty($transaction_data)) echo $transaction_data->drive_type  ?>" readonly>
								     				<label class="viewlabel form_label">Drive Type</label>
								     			</div>
													<div class="form-group">
								     				<input type="text" name="sd_main_inventory_enginesize" id="sd_main_inventory_enginesize" class="form-control form_field" value="<?php if(!empty($transaction_data)) echo $transaction_data->engine_size  ?>" readonly>
								     				<label class="viewlabel form_label">Engine Size</label>
								     			</div>
								     			<div class="form-group">
								     				<input type="text" name="sd_main_inventory_mileage" id="sd_main_inventory_mileage" class="form-control form_field" value="<?php if(!empty($transaction_data)) echo $transaction_data->inv_mileage  ?>" readonly>
								     				<label class="viewlabel form_label">Mileage</label>
								     			</div>
								     			<div class="form-group">
								     				<label class="checkbox1">Exempt
													  	<input type="checkbox" class="" name="sd_main_inventory_exempt_cb" id="sd_main_inventory_exempt_cb" value="yes" <?php if(!empty($transaction_data)) if($transaction_data->inv_exempt == "yes") echo "checked";  ?> disabled>
													  	<span class="checkmark"></span>
													</label>
								     			</div>
								     			<div class="form-group">
								     				<input type="text" name="sd_main_inventory_cost" id="sd_main_inventory_cost" class="form-control form_field" value="<?php if(!empty($transaction_data)) echo $transaction_data->inv_cost ?>" readonly>
								     				<label class="viewlabel form_label">Cost</label>
								     			</div>
								     			<div class="form-group">
								     				<input type="text" name="sd_main_inventory_addedcost" id="sd_main_inventory_addedcost" class="form-control form_field" value="<?php if(!empty($transaction_data)) echo $transaction_data->inv_addedcost ?>" readonly>
								     				<label class="viewlabel form_label">Added Cost</label>
								     			</div>
								     			<div class="form-group">
								     				<input type="text" name="sd_main_inventory_totalcost" id="sd_main_inventory_totalcost" class="form-control form_field" value="<?php if(!empty($transaction_data)) echo $transaction_data->inv_flrc  ?>" readonly>
								     				<label class="viewlabel form_label">Trade Cost</label>
								     			</div>
								     			<div class="form-group">
								     				<input type="text" name="sd_main_inventory_price" id="sd_main_inventory_price" class="form-control form_field" value="<?php if(!empty($transaction_data)) echo $transaction_data->inv_price  ?>" readonly>
								     				<label class="viewlabel form_label">Price</label>
								     			</div>
											</div>
										</div>
										<div class="col-md-3" id="sd_main_trade_box" <?php if(!empty($transaction_data->trade_inv_id)) echo "style='display: block;'"; else echo "style='display: none;'"; ?>>
											<div class="box">
												<h4 class="modal-title mb-3">Review Vehicle Details(Trade)</h4>
													<div class="form-group">
								     				<input type="text" name="sd_main_trade_vin" id="sd_main_trade_vin" class="form-control form_field" value="<?php if(!empty($transaction_data)) echo $transaction_data->trade_inv_vin ?>" readonly>
								     				<label class="viewlabel form_label">VIN</label>
								     			</div>
								     			<div class="form-group">
								     				<input type="text" name="sd_main_trade_year" id="sd_main_trade_year" class="form-control form_field" value="<?php if(!empty($transaction_data)) echo $transaction_data->trade_inv_year  ?>" readonly>
								     				<label class="viewlabel form_label">Year</label>
								     			</div>
								     			<div class="form-group">
								     				<input type="text" name="sd_main_trade_make" id="sd_main_trade_make" class="form-control form_field" value="<?php if(!empty($transaction_data)) echo $transaction_data->trade_inv_make  ?>" readonly>
								     				<label class="viewlabel form_label">Make</label>
								     			</div>
								     			<div class="form-group">
								     				<input type="text" name="sd_main_trade_model" id="sd_main_trade_model" class="form-control form_field" value="<?php if(!empty($transaction_data)) echo $transaction_data->trade_inv_model ?>" readonly>
								     				<label class="viewlabel form_label">Model</label>
								     			</div>
								     			<div class="form-group">
								     				<input type="text" name="sd_main_trade_style" id="sd_main_trade_style" class="form-control form_field" value="<?php if(!empty($transaction_data)) echo $transaction_data->trade_inv_style  ?>" readonly>
								     				<label class="viewlabel form_label">Style</label>
								     			</div>
								     			<div class="form-group">
								     				<input type="text" name="sd_main_trade_color" id="sd_main_trade_color" class="form-control form_field" value="<?php if(!empty($transaction_data)) echo $transaction_data->trade_inv_color  ?>" readonly>
								     				<label class="viewlabel form_label">Color</label>
								     			</div>
													<div class="form-group">
								     				<input type="text" name="sd_main_trade_drivetype" id="sd_main_trade_drivetype" class="form-control form_field" value="<?php if(!empty($transaction_data)) echo $transaction_data->trade_drive_type  ?>" readonly>
								     				<label class="viewlabel form_label">Drive Type</label>
								     			</div>
													<div class="form-group">
								     				<input type="text" name="sd_main_trade_enginesize" id="sd_main_trade_enginesize" class="form-control form_field" value="<?php if(!empty($transaction_data)) echo $transaction_data->trade_engine_size  ?>" readonly>
								     				<label class="viewlabel form_label">Engine Size</label>
								     			</div>
								     			<div class="form-group">
								     				<input type="text" name="sd_main_trade_mileage" id="sd_main_trade_mileage" class="form-control form_field" value="<?php if(!empty($transaction_data)) echo $transaction_data->trade_inv_mileage  ?>" readonly>
								     				<label class="viewlabel form_label">Mileage</label>
								     			</div>
								     			<div class="form-group">
								     				<label class="checkbox1">Exempt
													  	<input type="checkbox" class="" name="sd_main_trade_exempt_cb" id="sd_main_trade_exempt_cb" value="yes" <?php if(!empty($transaction_data)) if($transaction_data->trade_inv_exempt == "yes") echo "checked";  ?> disabled>
													  	<span class="checkmark"></span>
													</label>
								     			</div>
								     			<div class="form-group">
								     				<input type="text" name="sd_main_trade_allowance" id="sd_main_trade_allowance" class="form-control form_field" value="<?php if(!empty($transaction_data)) echo $transaction_data->trade_inv_price  ?>" readonly>
								     				<label class="viewlabel form_label">Trade Allowance</label>
								     			</div>
											</div>
										</div>
										<div class="col-md-3">
											<div class="box">
												<h4 class="modal-title mb-3">Review The Numbers</h4>
												<div class="form-group">
								     				<input type="text" name="sd_main_calc_saleprice" id="sd_main_calc_saleprice" class="form-control form_field" value="<?php if(!empty($transaction_data)) if($transaction_data->status == "processing") echo $buyers_trans_data->sale_price; else echo $transaction_data->sale_price;  ?>" readonly>
								     				<label class="viewlabel form_label">Sale Price</label>
								     			</div>
								     			<?php

								     			/*<input type="hidden" name="sd_main_calc_total_due" id="sd_main_calc_total_due" value="<?php if(!empty($transaction_data)) echo $transaction_data->total_due  ?>">

								     			<input type="hidden" name="sd_main_calc_tax" id="sd_main_calc_tax" value="<?php if(!empty($transaction_data)) echo $transaction_data->tax  ?>">*/

								     			 ?>

								     			<div class="form-group">
								     				<input type="text" name="sd_main_calc_cashcredit" id="sd_main_calc_cashcredit" class="form-control form_field" value="<?php if(!empty($transaction_data)) if($transaction_data->status == "processing") echo $buyers_trans_data->cash_credit; else echo $transaction_data->cash_credit  ?>" readonly>
								     				<label class="viewlabel form_label">Cash Down</label>
								     			</div>
								     			<div class="form-group">
								     				<input type="text" name="sd_main_calc_tradecredit" id="sd_main_calc_tradecredit" class="form-control form_field" value="<?php if(!empty($transaction_data)) if($transaction_data->status == "processing") echo $buyers_trans_data->trade_credit; else echo $transaction_data->trade_credit  ?>" readonly>
								     				<label class="viewlabel form_label">Trade In Credit</label>
								     			</div>
								     			<!-- <div class="form-group">
								     				<input type="text" name="sd_main_calc_tradebalance" id="sd_main_calc_tradebalance" class="form-control form_field" value="<?php //if(!empty($transaction_data)) echo $transaction_data->trade_balance  ?>" readonly>
								     				<label class="viewlabel form_label">Trade Balance</label>
								     			</div> -->
								     			<div class="form-group">
								     				<input type="text" name="sd_main_calc_servicefee" id="sd_main_calc_servicefee" class="form-control form_field" value="<?php if(!empty($transaction_data)) if($transaction_data->status == "processing") echo $buyers_trans_data->dealer_fee; else echo $transaction_data->dealer_fee  ?>" readonly>
								     				<label class="viewlabel form_label">Service Fee</label>
								     			</div>
								     			<div class="form-group">
								     				<input type="text" name="sd_main_calc_tagregistration" id="sd_main_calc_tagregistration" class="form-control form_field" value="<?php if(!empty($transaction_data)) if($transaction_data->status == "processing") echo $buyers_trans_data->dmv; else echo $transaction_data->dmv  ?>" readonly>
								     				<label class="viewlabel form_label">Tag/Registration</label>
								     			</div>
								     			<div class="form-group">
								     				<input type="text" name="sd_main_calc_tax" id="sd_main_calc_tax" class="form-control form_field" value="<?php if(!empty($transaction_data)) if($transaction_data->status == "processing") echo $buyers_trans_data->tax; else echo $transaction_data->tax  ?>" readonly>
								     				<label class="viewlabel form_label">Total Tax</label>
								     			</div>
								     			<div class="form-group">
								     				<input type="text" name="sd_main_calc_total_due" id="sd_main_calc_total_due" class="form-control form_field" value="<?php if(!empty($transaction_data)) if($transaction_data->status == "processing") echo $buyers_trans_data->total_due; else echo $transaction_data->total_due  ?>" readonly>
								     				<label class="viewlabel form_label">Total Due</label>
								     			</div>
											</div>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</section>

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

</html>
