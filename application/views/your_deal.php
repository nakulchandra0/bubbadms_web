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
							<h3 class="center mb-4">Your Deal</h3>
							<div class="your_deal">
								<table id="your_deal" class="dt_table table table-bordered table-hover dataex-html5-selectors dt-responsive">
									<thead>
										<tr>
											<th>ID</th>
											<!-- <th>VIN</th> -->
											<th>Stock Number</th>
											<th>Buyer Name</th>
											<th>Total Cost</th>
											<th>Trade Allowance</th>
											<th>Status</th>
											<th>Status</th>
											<th>Actions</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$no=1;
										foreach ($deal_data as $value) {
											$status="";
											$statusName="";
											if($value['status'] == 'processing'){
												$status = 'deal_open';
												$statusName="Processing";
											}elseif ($value['status'] == 'pending_print') {
												$status = 'deal_panding';
												$statusName="Pending Print";

											}elseif ($value['status'] == 'deal_not_closed') {
												$status = 'deal_not_closed';
												$statusName="Deal Not Closed";

											}elseif ($value['status'] == 'closed') {
												$status = 'deal_close';
												$statusName="Closed";
											}
											?>
											<tr id="rowdeal<?php echo $value['transact_id'] ?>">
											<td><?php echo $no++; ?></td>
											<!-- <td><?php //echo $value['inv_vin']; ?></td> -->
											<td><?php echo $value['inv_stock']; ?></td>
											<td><?php echo $value['buyers_first_name'].' '.$value['buyers_last_name']; ?></td>
											<td>$<?php echo $value['inv_flrc']; ?></td>
											<td>$<?php echo !empty($value['trade_inv_price']) ? $value['trade_inv_price'] : '0'; ?></td>
											<td><span class="<?php echo $status; ?>"><?php echo $statusName; ?></span></td>
											<td><?php echo $status; ?></td>
											<td nowrap id="<?php echo $value['transact_id'] ?>"></td>
										</tr>
										<?php } ?>
										<!-- <tr>
											<td>1</td>
											<td>ABCD1234</td>
											<td>123456789</td>
											<td>$10000</td>
											<td>$12000</td>
											<td><span class="deal_open">Open</span></td>
											<td nowrap></td>
										</tr>
										<tr>
											<td>2</td>
											<td>ABCD1234</td>
											<td>123456789</td>
											<td>$10000</td>
											<td>$12000</td>
											<td><span class="deal_panding">Print Panding</span></td>
											<td nowrap></td>
										</tr>
										<tr>
											<td>3</td>
											<td>ABCD1234</td>
											<td>123456789</td>
											<td>$10000</td>
											<td>$12000</td>
											<td><span class="deal_close">Close</span></td>
											<td nowrap></td>
										</tr> -->
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</section>

			<div>
				<form id="edit_startdeal_form" action="<?php echo base_url() ?>startdeal" method="post">
	  			<input type="hidden" name="id" id="edit_startdeal_form_id" />
	  		</form>

				<form id="view_startdeal_form" action="<?php echo base_url() ?>startdealview" method="post">
	  			<input type="hidden" name="id" id="view_startdeal_form_id" />
	  		</form>
			</div>

		</div>

	<?php $this->load->view('common/footer');?>

	</body>

	<?php $this->load->view('common/footer-script');?>

</html>
