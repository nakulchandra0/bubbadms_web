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
							<h1 class="subheader_title">Reports Area</h1>
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
								<a href="javascript:;" data-toggle="modal" data-target="#custom_sales" class="btn btn_redius theme_btn">Custom Sales</a>
							</div>
							<ul class="nav nav-tabs custom_tab" role="tablist">
								<li class="nav-item">
									<a class="nav-link active" data-toggle="tab" href="#sales_tab" role="tab">Sales</a>
								</li>
							</ul>
							<div class="tab-content custom_tabcontent">
								<div class="tab-pane active" id="sales_tab" role="tabpanel">
									<table id="d_sales" class="dt_table table table-bordered table-hover dataex-html5-selectors dt-responsive">
										<thead>
											<tr>
												<th>ID</th>
												<th>Stock Number</th>
												<th>Buyer Name</th>
												<th>Make & Model</th>
												<th>Sale Date</th>
												<th>Sale Price</th>
												<th>Total Cost</th>
												<th>Profit</th>
											</tr>
										</thead>
										<tbody>
											<?php

											$no=1; foreach ($deal_data as $key => $value) { ?>

											<tr>
												<td><?php echo $no++;  ?></td>
												<td><?php echo $value['inv_stock']; ?></td>
												<td><?php echo $value['buyers_first_name']." ".$value['buyers_last_name']; ?></td>
												<td><?php echo $value['inv_make'].' '.$value['inv_model']; ?></td>
												<td><?php echo date('m-d-Y',strtotime($value['sale_date'])); ?></td>
												<td>$<?php echo !empty($value['sale_price']) ? number_format($value['sale_price']) : '0'; ?></td>
												<td>$<?php echo !empty($value['inv_flrc']) ? number_format($value['inv_flrc']) : '0';//trade_credit ?></td>
												<td>$<?php echo number_format($value['sale_price']-$value['inv_flrc']); ?></td>
											</tr>

											<?php } ?>
											
										</tbody>
									</table>
								</div>
							</div>
							
						</div>
					</div>
				</div>
			</section>

			<div class="modal fade custom_modal" id="custom_sales" tabindex="-1" role="dialog" aria-labelledby="custom_sales" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Your Sales Report</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true"><i class="fa fa-times"></i></span>
							</button>
						</div>
						<div class="modal-body">
							<div id="datepicker-container">
								<div class="form-group">
				     				<input type="text" name="sales_report_date_start" id="sales_report_date_start" class="form-control form_field start_date" required="">
				     				<label class="form_label">Choose Start Date</label>
				     			</div>
				     			<div class="form-group">
				     				<input type="text" name="sales_report_date_end" id="sales_report_date_end" class="form-control form_field end_date" required="">
				     				<label class="form_label">Choose End Date</label>
				     			</div>
				     		</div>
			     			<div class="form-group">
								<input type="button" id="sales_report_form" class="form_btn" value="Use These Dates">
							</div>
							<div class="info_table">
								<table class="table table-bordered table-hover">
									<tr>
										<th>Sales Report</th>
										<th id="sales_report_date_range"></th>
									</tr>
									<tr>
										<th>Total Sold</th>
										<th id="sales_report_total_sold">$0.00</th>
									</tr>
									<tr>
										<th>Total Cost</th>
										<th id="sales_report_total_cost">$0.00</th>
									</tr>
									<tr>
										<th>Total Profit</th>
										<th id="sales_report_total_profit">$0.00</th>
									</tr>
									<tr>
										<th>Number Of Cars Sold</th>
										<th id="sales_report_no_car_sold">0</th>
									</tr>
									<tr>
										<th>Average Gross Profit</th>
										<th id="sales_report_gross_profit">$0.00</th>
									</tr>
								</table>
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