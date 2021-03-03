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
							<div class="btn_g">
								<a href="javascript:;" data-toggle="modal" data-target="#add_inventory" class="btn btn_redius theme_btn">Add Inventory</a>
								<a href="javascript:;" data-toggle="modal" data-target="#add_trade" class="btn btn_redius theme_btn">Add Trade In</a>
							</div>
							<ul class="nav nav-tabs custom_tab" role="tablist">
								<li class="nav-item">
									<a class="nav-link <?php if(empty($page_type)) echo 'active' ?>" data-toggle="tab" href="#inventory_tab" role="tab">Inventory</a>
								</li>
								<li class="nav-item">
									<a class="nav-link <?php if($page_type == "trade") echo 'active' ?>" data-toggle="tab" href="#trade_tab" role="tab">Trade In</a>
								</li>
							</ul>
							<div class="tab-content custom_tabcontent">
								<div class="tab-pane <?php if(empty($page_type)) echo 'active' ?>" id="inventory_tab" role="tabpanel">
									<table id="inventory" class="dt_table table table-bordered table-hover dataex-html5-selectors dt-responsive">
										<thead>
											<tr>
												<th>Sr.No</th>
												<th>Stock Number</th>
												<th>Year</th>
												<th>Color</th>
												<th>Make & Model</th>
												<th>Mileage </th>
												<!-- <th>Model</th> -->
												<th>Total Cost</th>
												<th>Vehicle Price</th>
												<th>Edit/Delete/View</th>
											</tr>
										</thead>
										<tbody>

											<?php
												if(count($inventory_data) > 0){
													$no=1;
													foreach ($inventory_data as $value) { ?>
														<tr id="rowinv<?php echo $value['inv_id']; ?>">
															<td><?php echo $no++; ?></td>
															<td><?php echo $value['inv_stock']; ?></td>
															<td><?php echo $value['inv_year']; ?></td>
															<td><?php echo $value['inv_color']; ?></td>
															<td><?php echo $value['inv_make'].' '.$value['inv_model']; ?></td>
															<td><?php echo $value['inv_exempt']=="yes"? "Exempt" : $value['inv_mileage']; ?></td>
															<td><?php echo '$'.$value['inv_flrc']; ?></td>
															<td><?php echo '$'.$value['inv_price']; ?></td>
															<td nowrap id="<?php echo $value['inv_id']; ?>"></td>
														</tr>

											<?php } } ?>

										</tbody>
									</table>
								</div>
								<div class="tab-pane <?php if($page_type == "trade") echo 'active' ?>" id="trade_tab" role="tabpanel">
									<table id="trade" class="dt_table table table-bordered table-hover dataex-html5-selectors dt-responsive">
										<thead>
											<tr>
												<!-- <th>ID</th> -->
												<th>VIN</th>
												<th>Year</th>
												<th>Color</th>
												<th>Make</th>
												<th>Model</th>
												<th>Mileage</th>
												<th>Trade Allowance</th>
												<th>Actions</th>
											</tr>
										</thead>
										<tbody>
											<?php
												if(count($trade_data) > 0){
													$no = 1;
													foreach ($trade_data as $value) { ?>
														<tr id="rowtrade<?php echo $value['trade_inv_id']; ?>">
															<!-- <td><?php //echo $no++; ?></td> -->
															<td><?php echo $value['trade_inv_vin']; ?></td>
															<td><?php echo $value['trade_inv_year']; ?></td>
															<td><?php echo $value['trade_inv_color']; ?></td>
															<td><?php echo $value['trade_inv_make']; ?></td>
															<td><?php echo $value['trade_inv_model']; ?></td>
															<td><?php echo $value['trade_inv_exempt']=="yes"? "Exempt" : $value['trade_inv_mileage']; ?></td>
															<td><?php echo '$'.$value['trade_inv_price']; ?></td>
															<td nowrap id="<?php echo $value['trade_inv_id']; ?>"></td>
														</tr>
											<?php } } ?>

										</tbody>
									</table>
								</div>
							</div>

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
								<input type="submit" class="form_btn btn_check_vin_number" value="Add Vehicle">
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
							<form class="add_inventory_info_form" id="add_inventory_info_form" method="POST">
							<div class="form-group">
			     				<input type="text" name="inventoryinfo_vin" id="inventoryinfo_vin" class="form-control form_field" required="">
			     				<label class="form_label">VIN</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="inventoryinfo_year" id="inventoryinfo_year" class="form-control form_field" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" required="">
			     				<label class="form_label">Year</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="inventoryinfo_make" id="inventoryinfo_make" class="form-control form_field" required="">
			     				<label class="form_label">Make</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="inventoryinfo_model" id="inventoryinfo_model" class="form-control form_field" required="">
			     				<label class="form_label">Model</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="inventoryinfo_style" id="inventoryinfo_style" class="form-control form_field" required="">
			     				<label class="form_label">Style</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="inventoryinfo_stocknumber" id="inventoryinfo_stocknumber" class="form-control form_field" required="">
			     				<label class="form_label">Stock Number</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="inventoryinfo_color" id="inventoryinfo_color" class="form-control form_field" required="">
			     				<label class="form_label">Color</label>
			     			</div>
								<div class="form-group">
			     				<input type="text" name="inventoryinfo_drivetype" id="inventoryinfo_drivetype" class="form-control form_field" required="">
			     				<label class="form_label">Drive Type</label>
			     			</div>
								<div class="form-group">
			     				<input type="text" name="inventoryinfo_enginesize" id="inventoryinfo_enginesize" class="form-control form_field" required="">
			     				<label class="form_label">Engine Size</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="inventoryinfo_mileage" id="inventoryinfo_mileage" class="form-control form_field" required="" onkeyup="return makeExemptRequire(this,'inventoryinfo_exempt_cb')">
			     				<label class="form_label">Mileage</label>
			     			</div>
			     			<div class="form-group">
			     				<label class="checkbox1">Exempt
								  	<input type="checkbox" class="" name="inventoryinfo_exempt_cb" id="inventoryinfo_exempt_cb" onclick="return makeExemptRequire_cb(this,'inventoryinfo_mileage')" value="yes">
								  	<span class="checkmark"></span>
								</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="inventoryinfo_cost" id="inventoryinfo_cost" class="form-control form_field" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,''); additionCost_Addedcost();" required="">
			     				<label class="form_label">Cost</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="inventoryinfo_addedcost" id="inventoryinfo_addedcost" class="form-control form_field" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,''); additionCost_Addedcost();" required="">
			     				<label class="form_label">Added Cost</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="inventoryinfo_totalcost" id="inventoryinfo_totalcost" class="form-control form_field" required="" readonly>
			     				<label class="form_label viewlabel">Total Cost</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="inventoryinfo_stickerprice" id="inventoryinfo_stickerprice" class="form-control form_field" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" required="">
			     				<label class="form_label">Vehicle Price</label>
			     			</div>
			     			<div class="form-group">
			     				<!-- class = "add_inventory_vehicle_done" -->
								<input type="submit" class="form_btn" value="Add Vehicle">
							</div>
						</form>
						</div>
					</div>
				</div>
			</div>

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
								<input type="hidden" name="edit_inventoryinfo_ivn_id" id="edit_inventoryinfo_ivn_id">
			     				<input type="text" name="edit_inventoryinfo_vin" id="edit_inventoryinfo_vin" class="form-control form_field" required="">
			     				<label class="form_label">VIN</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="edit_inventoryinfo_year" id="edit_inventoryinfo_year" class="form-control form_field" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" required="">
			     				<label class="form_label">Year</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="edit_inventoryinfo_make" id="edit_inventoryinfo_make" class="form-control form_field" required="">
			     				<label class="form_label">Make</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="edit_inventoryinfo_model" id="edit_inventoryinfo_model" class="form-control form_field" required="">
			     				<label class="form_label">Model</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="edit_inventoryinfo_style" id="edit_inventoryinfo_style" class="form-control form_field" required="">
			     				<label class="form_label">Style</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="edit_inventoryinfo_stocknumber" id="edit_inventoryinfo_stocknumber" class="form-control form_field" required="">
			     				<label class="form_label">Stock Number</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="edit_inventoryinfo_color" id="edit_inventoryinfo_color" class="form-control form_field" required="">
			     				<label class="form_label">Color</label>
			     			</div>
								<div class="form-group">
			     				<input type="text" name="edit_inventoryinfo_drivetype" id="edit_inventoryinfo_drivetype" class="form-control form_field" required="">
			     				<label class="form_label">Drive Type</label>
			     			</div>
								<div class="form-group">
			     				<input type="text" name="edit_inventoryinfo_enginesize" id="edit_inventoryinfo_enginesize" class="form-control form_field" required="">
			     				<label class="form_label">Engine Size</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="edit_inventoryinfo_mileage" id="edit_inventoryinfo_mileage" class="form-control form_field" required="" onkeyup="return makeExemptRequire(this,'edit_inventoryinfo_exempt_cb')">
			     				<label class="form_label">Mileage</label>
			     			</div>
			     			<div class="form-group">
			     				<label class="checkbox1">Exempt
								  	<input type="checkbox" class="" name="edit_inventoryinfo_exempt_cb" id="edit_inventoryinfo_exempt_cb" onclick="return makeExemptRequire_cb(this,'edit_inventoryinfo_mileage')" value="yes">
								  	<span class="checkmark"></span>
								</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="edit_inventoryinfo_cost" id="edit_inventoryinfo_cost" class="form-control form_field" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,''); edit_additionCost_Addedcost();" required="">
			     				<label class="form_label">Cost</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="edit_inventoryinfo_addedcost" id="edit_inventoryinfo_addedcost" class="form-control form_field" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,''); edit_additionCost_Addedcost();" required="">
			     				<label class="form_label">Added Cost</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="edit_inventoryinfo_totalcost" id="edit_inventoryinfo_totalcost" class="form-control form_field" required="" readonly>
			     				<label class="form_label viewlabel">Total Cost</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="edit_inventoryinfo_stickerprice" id="edit_inventoryinfo_stickerprice" class="form-control form_field" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" required="">
			     				<label class="form_label">Vehicle Price</label>
			     			</div>
			     			<div class="form-group">
			     				<!-- edit_inventory_vehicle_done -->
								<input type="submit" class="form_btn" value="Edit Vehicle">
							</div>
							</form>
						</div>
					</div>
				</div>
			</div>

			<div class="modal fade custom_modal view_model" id="view_inventory_info" tabindex="-1" role="dialog" aria-labelledby="view_inventory_info" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">View Inventory Info</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true"><i class="fa fa-times"></i></span>
							</button>
						</div>
						<div class="modal-body">
							<div class="form-group">
			     				<input type="text" name="view_inventoryinfo_vin" id="view_inventoryinfo_vin" class="form-control form_field" value="VIN" readonly>
			     				<label class="form_label">VIN</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="view_inventoryinfo_year" id="view_inventoryinfo_year" class="form-control form_field" value="Year" readonly>
			     				<label class="form_label">Year</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="view_inventoryinfo_make" id="view_inventoryinfo_make" class="form-control form_field" value="Make" readonly>
			     				<label class="form_label">Make</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="view_inventoryinfo_model" id="view_inventoryinfo_model" class="form-control form_field" value="Model" readonly>
			     				<label class="form_label">Model</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="view_inventoryinfo_style" id="view_inventoryinfo_style" class="form-control form_field" value="Style" readonly>
			     				<label class="form_label">Style</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="view_inventoryinfo_stocknumber" id="view_inventoryinfo_stocknumber" class="form-control form_field" value="Stock Number" readonly>
			     				<label class="form_label">Stock Number</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="view_inventoryinfo_color" id="view_inventoryinfo_color" class="form-control form_field" value="Color" readonly>
			     				<label class="form_label">Color</label>
			     			</div>
								<div class="form-group">
			     				<input type="text" name="view_inventoryinfo_drivetype" id="view_inventoryinfo_drivetype" class="form-control form_field" value="Drive Type" readonly>
			     				<label class="form_label">Drive Type</label>
			     			</div>
								<div class="form-group">
			     				<input type="text" name="view_inventoryinfo_enginesize" id="view_inventoryinfo_enginesize" class="form-control form_field" value="Engine Size" readonly>
			     				<label class="form_label">Engine Size</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="view_inventoryinfo_mileage" id="view_inventoryinfo_mileage" class="form-control form_field" value="Mileage" readonly>
			     				<label class="form_label">Mileage</label>
			     			</div>
			     			<div class="form-group">
			     				<label class="checkbox1">Exempt
								  	<input type="checkbox" class="" name="view_inventoryinfo_exempt_cb" id="view_inventoryinfo_exempt_cb" disabled>
								  	<span class="checkmark"></span>
								</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="view_inventoryinfo_cost" id="view_inventoryinfo_cost" class="form-control form_field" value="Cost" readonly>
			     				<label class="form_label">Cost</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="view_inventoryinfo_addedcost" id="view_inventoryinfo_addedcost" class="form-control form_field" value="Added Cost" readonly>
			     				<label class="form_label">Added Cost</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="view_inventoryinfo_totalcost" id="view_inventoryinfo_totalcost" class="form-control form_field" value="Total Cost" readonly>
			     				<label class="form_label">Total Cost</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="view_inventoryinfo_stickerprice" id="view_inventoryinfo_stickerprice" class="form-control form_field" value="Sticker Price" readonly>
			     				<label class="form_label">Vehicle Price</label>
			     			</div>
			     			<div class="form-group">
								<input type="button" data-dismiss="modal" class="form_btn" value="Close">
							</div>
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
								<input type="submit" class="form_btn btn_check_vin_number_trade" value="Add Vehicle">
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
							<form class="add_trade_info_form" id="add_trade_info_form" method="POST">
							<div class="form-group">
			     				<input type="text" name="tradeinfo_vin" id="tradeinfo_vin" class="form-control form_field" required="">
			     				<label class="form_label">VIN</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="tradeinfo_year" id="tradeinfo_year" class="form-control form_field" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" required="">
			     				<label class="form_label">Year</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="tradeinfo_make" id="tradeinfo_make" class="form-control form_field" required="">
			     				<label class="form_label">Make</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="tradeinfo_model" id="tradeinfo_model" class="form-control form_field" required="">
			     				<label class="form_label">Model</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="tradeinfo_style" id="tradeinfo_style" class="form-control form_field" required="">
			     				<label class="form_label">Style</label>
			     			</div>
			     			<!-- <div class="form-group">
			     				<input type="text" name="tradeinfo_stocknumber" id="tradeinfo_stocknumber" class="form-control form_field" required="">
			     				<label class="form_label">Stock Number</label>
			     			</div> -->
			     			<div class="form-group">
			     				<input type="text" name="tradeinfo_color" id="tradeinfo_color" class="form-control form_field" required="">
			     				<label class="form_label">Color</label>
			     			</div>
								<div class="form-group">
			     				<input type="text" name="tradeinfo_drivetype" id="tradeinfo_drivetype" class="form-control form_field" required="">
			     				<label class="form_label">Drive Type</label>
			     			</div>
								<div class="form-group">
			     				<input type="text" name="tradeinfo_enginesize" id="tradeinfo_enginesize" class="form-control form_field" required="">
			     				<label class="form_label">Engine Size</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="tradeinfo_mileage" id="tradeinfo_mileage" class="form-control form_field" required="" onkeyup="return makeExemptRequire(this,'tradeinfo_exempt_cb')">
			     				<label class="form_label">Mileage</label>
			     			</div>
			     			<div class="form-group">
			     				<label class="checkbox1">Exempt
								  	<input type="checkbox" class="" name="tradeinfo_exempt_cb" id="tradeinfo_exempt_cb" onclick="return makeExemptRequire_cb(this,'tradeinfo_mileage')" value="yes">
								  	<span class="checkmark"></span>
								</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="tradeinfo_allowance" id="tradeinfo_allowance" class="form-control form_field" required="">
			     				<label class="form_label">Trade Allowance</label>
			     			</div>
			     			<div class="form-group">
			     				<!-- class="form_btn add_trade_vehicle_done" -->
								<input type="submit" class="form_btn" value="Add Vehicle">
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
			     				<input type="text" name="edit_tradeinfo_vin" id="edit_tradeinfo_vin" class="form-control form_field" required="">
			     				<label class="form_label">VIN</label>
			     				<input type="hidden" name="edit_tradeinfo_ivn_id" id="edit_tradeinfo_ivn_id">
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="edit_tradeinfo_year" id="edit_tradeinfo_year" class="form-control form_field" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" required="">
			     				<label class="form_label">Year</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="edit_tradeinfo_make" id="edit_tradeinfo_make" class="form-control form_field" required="">
			     				<label class="form_label">Make</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="edit_tradeinfo_model" id="edit_tradeinfo_model" class="form-control form_field" required="">
			     				<label class="form_label">Model</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="edit_tradeinfo_style" id="edit_tradeinfo_style" class="form-control form_field" required="">
			     				<label class="form_label">Style</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="edit_tradeinfo_color" id="edit_tradeinfo_color" class="form-control form_field" required="">
			     				<label class="form_label">Color</label>
			     			</div>
								<div class="form-group">
			     				<input type="text" name="edit_tradeinfo_drivetype" id="edit_tradeinfo_drivetype" class="form-control form_field" required="">
			     				<label class="form_label">Drive Type</label>
			     			</div>
								<div class="form-group">
			     				<input type="text" name="edit_tradeinfo_enginesize" id="edit_tradeinfo_enginesize" class="form-control form_field" required="">
			     				<label class="form_label">Engine Size</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="edit_tradeinfo_mileage" id="edit_tradeinfo_mileage" class="form-control form_field" required="" onkeyup="return makeExemptRequire(this,'edit_tradeinfo_exempt_cb')">
			     				<label class="form_label">Mileage</label>
			     			</div>
			     			<div class="form-group">
			     				<label class="checkbox1">Exempt
								  	<input type="checkbox" class="" name="edit_tradeinfo_exempt_cb" id="edit_tradeinfo_exempt_cb" onclick="return makeExemptRequire_cb(this,'edit_tradeinfo_mileage')" value="yes">
								  	<span class="checkmark"></span>
								</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="edit_tradeinfo_allowance" id="edit_tradeinfo_allowance" class="form-control form_field" required="">
			     				<label class="form_label">Trade Allowance</label>
			     			</div>
			     			<div class="form-group">
			     				<!-- edit_trade_vehicle_done -->
								<input type="submit" class="form_btn" value="Edit Vehicle">
							</div>
							</form>
						</div>
					</div>
				</div>
			</div>

			<div class="modal fade custom_modal view_model" id="view_trade_info" tabindex="-1" role="dialog" aria-labelledby="view_trade_info" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">View Trade Info</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true"><i class="fa fa-times"></i></span>
							</button>
						</div>
						<div class="modal-body">
							<div class="form-group">
			     				<input type="text" name="view_trade_vin" id="view_trade_vin" class="form-control form_field" value="VIN" readonly>
			     				<label class="form_label">VIN</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="view_trade_year" id="view_trade_year" class="form-control form_field" value="Year" readonly>
			     				<label class="form_label">Year</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="view_trade_make" id="view_trade_make" class="form-control form_field" value="Make" readonly>
			     				<label class="form_label">Make</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="view_trade_model" id="view_trade_model" class="form-control form_field" value="Model" readonly>
			     				<label class="form_label">Model</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="view_trade_style" id="view_trade_style" class="form-control form_field" value="Style" readonly>
			     				<label class="form_label">Style</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="view_trade_color" id="view_trade_color" class="form-control form_field" value="Color" readonly>
			     				<label class="form_label">Color</label>
			     			</div>
								<div class="form-group">
			     				<input type="text" name="view_tradeinfo_drivetype" id="view_tradeinfo_drivetype" class="form-control form_field" value="Drive Type" readonly>
			     				<label class="form_label">Drive Type</label>
			     			</div>
								<div class="form-group">
			     				<input type="text" name="view_tradeinfo_enginesize" id="view_tradeinfo_enginesize" class="form-control form_field" value="Engine Size" readonly>
			     				<label class="form_label">Engine Size</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="view_trade_mileage" id="view_trade_mileage" class="form-control form_field" value="Mileage" readonly>
			     				<label class="form_label">Mileage</label>
			     			</div>
			     			<div class="form-group">
			     				<label class="checkbox1">Exempt
								  	<input type="checkbox" class="" name="view_trade_exempt_cb" id="view_trade_exempt_cb" disabled="">
								  	<span class="checkmark"></span>
								</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="view_trade_allowance" id="view_trade_allowance" class="form-control form_field" value="Trade Allowance" readonly>
			     				<label class="form_label">Trade Allowance</label>
			     			</div>
			     			<div class="form-group">
								<input type="button" data-dismiss="modal" class="form_btn" value="Close">
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>

	<?php $this->load->view('common/footer');?>

	</body>

	<?php $this->load->view('common/footer-script');?>

</html>
