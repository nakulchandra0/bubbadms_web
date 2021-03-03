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
							<h1 class="subheader_title">Dealer Area</h1>
						</div>
					</div>
				</div>
			</section>

			<?php $this->load->view('common/header_nav');?>

			<section class="gray_bg">
				<div class="container">
					<div class="row">
						<div class="col-md-6">
							<div class="box">
								<h3 class="center">Inventory Change</h3>
								<h6 class="center mb-4">Choose Vehicle</h6>
								<div class="form-group">
				     				<select class="form-control form_field" id="select_inventory_invid" required="">
				     					<option value="0">Choose inventory</option>
								     	<?php foreach ($inventory_data as $value) { ?>
								     	<option value="<?php echo $value['inv_id'] ?>"><?php echo $value['inv_stock'].' '.$value['inv_year'].' '.$value['inv_make'].' ('.$value['inv_model'].') VIN '.$value['inv_vin']; ?></option>
								     	<?php } ?>
				     				</select>
				     				<label class="form_label">Select Vehicle</label>
				     			</div>
				     			<div class="form-group">
									<input type="button" class="form_btn" value="Change Inventory" id="edit_inventory_from_dealer">
									<!-- data-toggle="modal" data-target="#edit_inventory_info" -->
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="box">
								<h3 class="center">Trade Change</h3>
								<h6 class="center mb-4">Choose Vehicle</h6>
								<div class="form-group">
				     				<select class="form-control form_field" id="select_trade_invid" required="">
				     					<option value="0">Choose trade</option>
								     	<?php foreach ($trade_data as $value) { ?>
								     		<option value="<?php echo $value['trade_inv_id'] ?>"><?php echo $value['trade_inv_year'].' '.$value['trade_inv_make'].' ('.$value['trade_inv_model'].') VIN '.$value['trade_inv_vin']; ?></option>
								     	<?php } ?>
				     				</select>
				     				<label class="form_label">Select Vehicle</label>
				     			</div>
				     			<div class="form-group">
									<input type="submit" class="form_btn" value="Change Trade" id="edit_trade_from_dealer">
									<!-- data-toggle="modal" data-target="#edit_trade_info" -->
								</div>
							</div>
						</div>
						<div class="col-md-6 offset-md-3">
							<div class="box">
								<h3 class="center">Delete a Vehicle</h3>
								<h6 class="center mb-4">Choose Vehicle</h6>
								<div class="form-group">
				     				<select class="form-control form_field" id="select_vehicle_invid" required="">
				     					<option value="0">Choose vehicle</option>
								     	<?php foreach ($trade_data as $value) { ?>
								     		<option value="<?php echo $value['trade_inv_id'] ?>"><?php echo $value['trade_inv_year'].' '.$value['trade_inv_make'].' ('.$value['trade_inv_model'].') VIN '.$value['trade_inv_vin']; ?></option>
								     	<?php } ?>
				     				</select>
				     				<label class="form_label">Select Vehicle</label>
				     			</div>
				     			<div class="form-group">
									<input type="submit" class="form_btn" value="Delete Vehicle" id="delete_vehicle_from_dealer">
									<!-- remove_trade_vehicle -->
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>

			<div class="modal fade custom_modal" id="edit_inventory_info" tabindex="-1" role="dialog" aria-labelledby="edit_inventory_info" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Edit Inventory Info</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true"><i class="fa fa-times"></i></span>
							</button>
						</div>
						<div class="modal-body">
							<form id="edit_inventory_form">
							<div class="form-group">
			     				<input type="text" name="edit_inventoryinfo_vin" id="edit_inventoryinfo_vin" class="form-control form_field" value="ABCD1234" required="">
			     				<label class="form_label">VIN</label>
			     			</div>
			     			<input type="hidden" name="edit_inventoryinfo_ivn_id" id="edit_inventoryinfo_ivn_id">
			     			<div class="form-group">
			     				<input type="text" name="edit_inventoryinfo_year" id="edit_inventoryinfo_year" class="form-control form_field" value="2009" required="">
			     				<label class="form_label">Year</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="edit_inventoryinfo_make" id="edit_inventoryinfo_make" class="form-control form_field" value="Hyundai" required="">
			     				<label class="form_label">Make</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="edit_inventoryinfo_model" id="edit_inventoryinfo_model" class="form-control form_field" value="I20" required="">
			     				<label class="form_label">Model</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="edit_inventoryinfo_style" id="edit_inventoryinfo_style" class="form-control form_field" value="Sports" required="">
			     				<label class="form_label">Style</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="edit_inventoryinfo_stocknumber" id="edit_inventoryinfo_stocknumber" class="form-control form_field" value="123456789" required="">
			     				<label class="form_label">Stock Number</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="edit_inventoryinfo_color" id="edit_inventoryinfo_color" class="form-control form_field" value="White" required="">
			     				<label class="form_label">Color</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="edit_inventoryinfo_mileage" id="edit_inventoryinfo_mileage" class="form-control form_field" value="15" required="">
			     				<label class="form_label">Mileage</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="edit_inventoryinfo_totalcost" id="edit_inventoryinfo_totalcost" class="form-control form_field" value="10000" required="">
			     				<label class="form_label">Total Cost</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="edit_inventoryinfo_stickerprice" id="edit_inventoryinfo_stickerprice" class="form-control form_field" value="12000" required="">
			     				<label class="form_label">Sticker Price</label>
			     			</div>
			     			<div class="form-group">
								<input type="submit" class="form_btn" value="Edit Vehicle">
								<!-- edit_inventory_vehicle_done -->
							</div>
						</form>
						</div>
					</div>
				</div>
			</div>

			<div class="modal fade custom_modal" id="edit_trade_info" tabindex="-1" role="dialog" aria-labelledby="edit_trade_info" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Edit Trade Info</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true"><i class="fa fa-times"></i></span>
							</button>
						</div>
						<div class="modal-body">
							<form id="edit_trade_form">
							<div class="form-group">
			     				<input type="text" name="edit_tradeinfo_vin" id="edit_tradeinfo_vin" class="form-control form_field" value="ABCD1234" required="">
			     				<label class="form_label">VIN</label>
			     			</div>
			     			<input type="hidden" name="edit_tradeinfo_ivn_id" id="edit_tradeinfo_ivn_id">
			     			<div class="form-group">
			     				<input type="text" name="edit_tradeinfo_year" id="edit_tradeinfo_year" class="form-control form_field" value="2009" required="">
			     				<label class="form_label">Year</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="edit_tradeinfo_make" id="edit_tradeinfo_make" class="form-control form_field" value="Hyundai" required="">
			     				<label class="form_label">Make</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="edit_tradeinfo_model" id="edit_tradeinfo_model" class="form-control form_field" value="I20" required="">
			     				<label class="form_label">Model</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="edit_tradeinfo_style" id="edit_tradeinfo_style" class="form-control form_field" value="Sports" required="">
			     				<label class="form_label">Style</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="edit_tradeinfo_stocknumber" id="edit_tradeinfo_stocknumber" class="form-control form_field" value="123456789" required="">
			     				<label class="form_label">Stock Number</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="edit_tradeinfo_color" id="edit_tradeinfo_color" class="form-control form_field" value="White" required="">
			     				<label class="form_label">Color</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="edit_tradeinfo_mileage" id="edit_tradeinfo_mileage" class="form-control form_field" value="15" required="">
			     				<label class="form_label">Mileage</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="edit_tradeinfo_allowance" id="edit_tradeinfo_allowance" class="form-control form_field" value="2000" required="">
			     				<label class="form_label">Trade Allowance</label>
			     			</div>
			     			<div class="form-group">
								<input type="submit" class="form_btn" value="Edit Vehicle">
								<!-- data-dismiss="modal" class="form_btn edit_trade_vehicle_done" -->
							</div>
						</form>
						</div>
					</div>
				</div>
			</div>

		</div>

	<?php $this->load->view('common/footer');?>	

	</body>
	<?php $this->load->view('common/footer-script');?>	
</html>