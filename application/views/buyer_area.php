<!DOCTYPE html>
<html lang="en">

	<head>
	  	<meta charset="utf-8">
	  	<meta content="width=device-width, initial-scale=1.0" name="viewport">

	  	<title><?php echo $page_title ?></title>
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
								<a href="javascript:;" data-toggle="modal" data-target="#add_buyer" class="btn btn_redius theme_btn">Add Buyer</a>
								<a href="javascript:;" data-toggle="modal" data-target="#add_cobuyer" class="btn btn_redius theme_btn">Add Co-Buyer</a>
								<a href="javascript:;" data-toggle="modal" data-target="#add_insurance" class="btn btn_redius theme_btn">Add Insurance</a>
							</div>
							<ul class="nav nav-tabs custom_tab" role="tablist">
								<li class="nav-item">
									<a class="nav-link <?php if(empty($page_type)) echo 'active' ?>" data-toggle="tab" href="#buyer_tab" role="tab">Buyer</a>
								</li>
								<li class="nav-item">
									<a class="nav-link <?php if($page_type == "cobuyer") echo 'active' ?>" data-toggle="tab" href="#cobuyer_tab" role="tab">Co-Buyer</a>
								</li>
								<li class="nav-item">
									<a class="nav-link <?php if($page_type == "insurance") echo 'active' ?>" data-toggle="tab" href="#insurance_tab" role="tab">Insurance</a>
								</li>
							</ul>
							<div class="tab-content custom_tabcontent">
								<div class="tab-pane <?php if(empty($page_type)) echo 'active' ?>" id="buyer_tab" role="tabpanel">
									<table id="buyer_table" class="dt_table table table-bordered table-hover dataex-html5-selectors">
										<thead>
											<tr>
												<th>ID</th>
												<th>Buyer</th>
												<!-- <th>Address/City/State/Zip</th> -->
												<th>Email</th>
												<th>Phone</th>
												<th>DL No.</th>
												<th>Actions</th>
											</tr>
										</thead>
										<tbody>
											<?php $no = 1; foreach ($buyer_data as $value) { ?>
												<tr id="rowbuyer<?php echo $value['buyers_id'] ?>">
													<td><?php echo $no++; ?></td>
													<td><?php echo $value['buyers_first_name'].' '.$value['buyers_last_name']; ?></td>
													<!-- <td><?php //echo $value['buyers_address'].'<br>'.$value['buyers_city'].'<br>'.$value['buyers_state'].'<br>'.$value['buyers_county'].' '.$value['buyers_zip']; ?></td> -->
													<td><?php echo $value['buyers_pri_email'];?></td>
													<td>
														<?php if(!empty($value['buyers_pri_phone_cell'])){ ?>

														<p class="no_b_m">Mobile No.: <?php echo $value['buyers_pri_phone_cell'];?></p>
														<?php }else{ if(!empty($value['buyers_work_phone'])){ ?>

														<p>Work No.: <?php echo $value['buyers_work_phone'];?></p>
														<?php }else{ if(!empty($value['buyers_home_phone'])){ ?>

														<p>Home No.: <?php echo $value['buyers_home_phone'];?></p>
														<?php } } } ?>
													</td>
													<td><?php echo $value['buyers_DL_number'];?></td>
													<td nowrap id="<?php echo $value['buyers_id'] ?>"></td>
												</tr>
											<?php } ?>
										</tbody>
									</table>
								</div>
								<div class="tab-pane <?php if($page_type == "cobuyer") echo 'active' ?>" id="cobuyer_tab" role="tabpanel">
									<table id="cobuyer_table" class="dt_table table table-bordered table-hover dataex-html5-selectors">
										<thead>
											<tr>
												<th>ID</th>
												<th>Buyer</th>
												<th>Co-Buyer</th>
												<!-- <th>Address/City/State/Zip</th> -->
												<th>Email</th>
												<th>Phone</th>
												<th>DL No.</th>
												<th>Actions</th>
											</tr>
										</thead>
										<tbody>
											<?php $no = 1; foreach ($buyer_data as $value) {
												if(!empty($value['co_buyers_first_name'])){?>
												<tr id="rowcobuyer<?php echo $value['buyers_id'] ?>">
													<td><?php echo $no++; ?></td>
													<td><?php echo $value['buyers_first_name'].' '.$value['buyers_last_name']; ?></td>
													<td><?php echo $value['co_buyers_first_name'].' '.$value['co_buyers_last_name']; ?></td>
													<!-- <td><?php //echo $value['co_buyers_address'].'<br>'.$value['co_buyers_city'].'<br>'.$value['co_buyers_state'].'<br>'.$value['co_buyers_county'].' '.$value['co_buyers_zip']; ?></td> -->
													<td><?php echo $value['co_buyers_pri_email'];?></td>
													<td>
														<?php if(!empty($value['co_buyers_pri_phone_cell'])){ ?>

														<p class="no_b_m">Mobile No.: <?php echo $value['co_buyers_pri_phone_cell'];?></p>
														<?php }else{ if(!empty($value['co_buyers_work_phone'])){ ?>

														<p>Work No.: <?php echo $value['co_buyers_work_phone'];?></p>
														<?php }else{ if(!empty($value['co_buyers_home_phone'])){ ?>

														<p>Home No.: <?php echo $value['co_buyers_home_phone'];?></p>
														<?php } } } ?>

													</td>
													<td><?php echo $value['co_buyers_DL_number'];?></td>
													<td nowrap id="<?php echo $value['buyers_id'] ?>"></td>
												</tr>
											<?php } } ?>
											<!-- <tr>
												<td>1</td>
												<td>Love Chauhan</td>
												<td>Jigar Amin</td>
												<td>46, Angle Arcade, Opp Kalupur Co-Operative Bank, Sola Rd, Ahmedabad, Gujarat 380061</td>
												<td>love@gmail.com</td>
												<td>
													<p>Work No.: 1234567890</p>
													<p>Home No.: 1234567890</p>
													<p class="no_b_m">Mobile No.: 1234567890</p>
												</td>
												<td>1234567890</td>
												<td nowrap></td>
											</tr> -->
										</tbody>
									</table>
								</div>
								<div class="tab-pane <?php if($page_type == "insurance") echo 'active' ?>" id="insurance_tab" role="tabpanel">
									<table id="insurance_table" class="dt_table table table-bordered table-hover dataex-html5-selectors">
										<thead>
											<tr>
												<th>ID</th>
												<th>Buyer</th>
												<th>Insurance Company</th>
												<th>Policy Number</th>
												<th>Agent Name</th>
												<th>Agent Phone</th>
												<!-- <th>Address/City/State/Zip</th> -->
												<th>Actions</th>
											</tr>
										</thead>
										<tbody>
											<?php $no = 1; foreach ($buyer_data as $value) {
												if(!empty($value['ins_company'])){?>
												<tr id="rowins<?php echo $value['buyers_id'] ?>">
													<td><?php echo $no++; ?></td>
													<td><?php echo $value['buyers_first_name'].' '.$value['buyers_last_name']; ?></td>
													<td><?php echo $value['ins_company']; ?></td>
													<td><?php echo $value['ins_pol_num']; ?></td>
													<td><?php echo $value['ins_agent']; ?></td>
													<td><?php echo $value['ins_phone']; ?></td>
													<!-- <td><?php //echo $value['ins_address'].'<br>'.$value['ins_city'].'<br>'.$value['ins_state'].'<br>'.$value['ins_zip']; ?></td> -->
													<td nowrap id="<?php echo $value['buyers_id'] ?>"></td>
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
							<form id="add_buyer_info_form">
							<div class="form-group">
			     				<input type="text" name="add_buyer_firstname" id="add_buyer_firstname" class="form-control form_field" required="">
			     				<label class="form_label">First Name</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="add_buyer_middlename" id="add_buyer_middlename" class="form-control form_field">
			     				<label class="form_label">Middle Name</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="add_buyer_lastname" id="add_buyer_lastname" class="form-control form_field" required="">
			     				<label class="form_label">Last Name</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="add_buyer_address" id="add_buyer_address" class="form-control form_field" required="">
			     				<label class="form_label">Address</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="add_buyer_city" id="add_buyer_city" class="form-control form_field" required="">
			     				<label class="form_label">City</label>
			     			</div>

			     			<div class="form-group">
			     				<!-- <input type="text" name="add_buyer_state" id="add_buyer_state" class="form-control form_field" required=""> -->
			     				<select name="add_buyer_state" id="add_buyer_state" class="form-control form_field" required="">
						     	<?php foreach ($states as $key => $value) { ?>
						     		<option value="<?php echo $value['name'] ?>"><?php echo $value['name'] ?></option>
						     	<?php } ?>
						     	</select>
			     				<label class="form_label">State</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="add_buyer_zip" id="add_buyer_zip" class="form-control form_field" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" required="">
			     				<label class="form_label">Zip</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="add_buyer_country" id="add_buyer_country" class="form-control form_field" value="USA" required="">
			     				<label class="form_label">Country</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="email" name="add_buyer_email" id="add_buyer_email" class="form-control form_field" required="">
			     				<label class="form_label">Email</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="add_buyer_workphone" id="add_buyer_workphone" class="form-control form_field">
			     				<label class="form_label">Work Phone</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="add_buyer_homephone" id="add_buyer_homephone" class="form-control form_field">
			     				<label class="form_label">Home Phone</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="add_buyer_mobile" id="add_buyer_mobile" class="form-control form_field">
			     				<label class="form_label">Mobile</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="add_buyer_dlnumber" id="add_buyer_dlnumber" class="form-control form_field" required="">
			     				<label class="form_label">Drivers License Number</label>
			     			</div>
			     			<div class="form-group">
			     				<!-- <input type="text" name="add_buyer_dlstate" id="add_buyer_dlstate" class="form-control form_field" required=""> -->
			     				<select name="add_buyer_dlstate" id="add_buyer_dlstate" class="form-control form_field" required="">
						     	<?php foreach ($states as $key => $value) { ?>
						     		<option value="<?php echo $value['name'] ?>"><?php echo $value['name'] ?></option>
						     	<?php } ?>
						     	</select>
			     				<label class="form_label">DL State</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="add_buyer_dlexpire" id="add_buyer_dlexpire" class="form-control form_field datepicker" required="">
			     				<label class="form_label">DL Expire</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="add_buyer_dldob" id="add_buyer_dldob" class="form-control form_field datepicker" required="">
			     				<label class="form_label">DL Date of Birth</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="add_buyer_temp_tag_number" id="add_buyer_temp_tag_number" class="form-control form_field">
			     				<label class="form_label">Temp Tag Number</label>
			     			</div>
			     			<div class="form-group">
			     				<!-- data-dismiss="modal" class="form_btn add_buyer_done" -->
								<input type="submit" class="form_btn" value="Add Buyer">
							</div>
							</form>
						</div>
					</div>
				</div>
			</div>

			<div class="modal fade custom_modal" id="edit_buyer" tabindex="-1" role="dialog" aria-labelledby="edit_buyer" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Edit Buyer</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true"><i class="fa fa-times"></i></span>
							</button>
						</div>
						<div class="modal-body">
							<form id="edit_buyer_info_form">
							<div class="form-group">
			     				<input type="text" name="edit_buyer_firstname" id="edit_buyer_firstname" class="form-control form_field" required="">
			     				<label class="form_label">First Name</label>
			     				<input type="hidden" name="edit_buyer_buyer_id" id="edit_buyer_buyer_id">
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="edit_buyer_middlename" id="edit_buyer_middlename" class="form-control form_field" required="">
			     				<label class="form_label">Middle Name</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="edit_buyer_lastname" id="edit_buyer_lastname" class="form-control form_field" required="">
			     				<label class="form_label">Last Name</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="edit_buyer_address" id="edit_buyer_address" class="form-control form_field" required="">
			     				<label class="form_label">Address</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="edit_buyer_city" id="edit_buyer_city" class="form-control form_field" required="">
			     				<label class="form_label">City</label>
			     			</div>

			     			<div class="form-group">
			     				<!-- <input type="text" name="edit_buyer_state" id="edit_buyer_state" class="form-control form_field" required=""> -->
			     				<select name="edit_buyer_state" id="edit_buyer_state" class="form-control form_field" required="">
						     	<?php foreach ($states as $key => $value) { ?>
						     		<option value="<?php echo $value['name'] ?>"><?php echo $value['name'] ?></option>
						     	<?php } ?>
						     	</select>
			     				<label class="form_label">State</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="edit_buyer_zip" id="edit_buyer_zip" class="form-control form_field" required="">
			     				<label class="form_label">Zip</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="edit_buyer_country" id="edit_buyer_country" class="form-control form_field" value="USA" required="">
			     				<label class="form_label">Country</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="email" name="edit_buyer_email" id="edit_buyer_email" class="form-control form_field" required="">
			     				<label class="form_label">Email</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="edit_buyer_workphone" id="edit_buyer_workphone" class="form-control form_field">
			     				<label class="form_label">Work Phone</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="edit_buyer_homephone" id="edit_buyer_homephone" class="form-control form_field">
			     				<label class="form_label">Home Phone</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="edit_buyer_mobile" id="edit_buyer_mobile" class="form-control form_field">
			     				<label class="form_label">Mobile</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="edit_buyer_dlnumber" id="edit_buyer_dlnumber" class="form-control form_field" required="">
			     				<label class="form_label">Drivers License Number</label>
			     			</div>
			     			<div class="form-group">
			     				<!-- <input type="text" name="edit_buyer_dlstate" id="edit_buyer_dlstate" class="form-control form_field" required=""> -->
			     				<select name="edit_buyer_dlstate" id="edit_buyer_dlstate" class="form-control form_field" required="">
						     	<?php foreach ($states as $key => $value) { ?>
						     		<option value="<?php echo $value['name'] ?>"><?php echo $value['name'] ?></option>
						     	<?php } ?>
						     	</select>
			     				<label class="form_label">DL State</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="edit_buyer_dlexpire" id="edit_buyer_dlexpire" class="form-control form_field datepicker" required="">
			     				<label class="form_label">DL Expire</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="edit_buyer_dldob" id="edit_buyer_dldob" class="form-control form_field datepicker" required="">
			     				<label class="form_label">DL Date of Birth</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="edit_buyer_temp_tag_number" id="edit_buyer_temp_tag_number" class="form-control form_field datepicker">
			     				<label class="form_label">Temp Tag Number</label>
			     			</div>
			     			<div class="form-group">
			     				<!-- data-dismiss="modal" class="form_btn edit_buyer_done" -->
								<input type="submit" class="form_btn" value="Edit Buyer">
							</div>
							</form>
						</div>
					</div>
				</div>
			</div>

			<div class="modal fade custom_modal view_model" id="view_buyer" tabindex="-1" role="dialog" aria-labelledby="view_buyer" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered  modal-xl" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">View Buyer</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true"><i class="fa fa-times"></i></span>
							</button>
						</div>
						<div class="modal-body">
							<div class="row">
								<div class="col-md-4">
									<h4 class="modal-title">View Buyer Info</h4>
									<div class="form-group">
					     				<input type="text" name="view_buyer_firstname" id="view_buyer_firstname" class="form-control form_field" value="First Name" readonly>
					     				<label class="form_label">First Name</label>
					     			</div>
					     			<div class="form-group">
					     				<input type="text" name="view_buyer_middlename" id="view_buyer_middlename" class="form-control form_field" value="Middle Name" readonly>
					     				<label class="form_label">Middle Name</label>
					     			</div>
					     			<div class="form-group">
					     				<input type="text" name="view_buyer_lastname" id="view_buyer_lastname" class="form-control form_field" value="Last Name" readonly>
					     				<label class="form_label">Last Name</label>
					     			</div>
					     			<div class="form-group">
					     				<input type="text" name="view_buyer_address" id="view_buyer_address" class="form-control form_field" value="Address" readonly>
					     				<label class="form_label">Address</label>
					     			</div>
					     			<div class="form-group">
					     				<input type="text" name="view_buyer_city" id="view_buyer_city" class="form-control form_field" value="City" readonly>
					     				<label class="form_label">City</label>
					     			</div>
					     			<div class="form-group">
					     				<input type="text" name="view_buyer_country" id="view_buyer_country" class="form-control form_field" value="County" readonly>
					     				<label class="form_label">Country</label>
					     			</div>
					     			<div class="form-group">
					     				<input type="text" name="view_buyer_state" id="view_buyer_state" class="form-control form_field" value="State" readonly>
					     				<label class="form_label">State</label>
					     			</div>
					     			<div class="form-group">
					     				<input type="text" name="view_buyer_zip" id="view_buyer_zip" class="form-control form_field" value="Zip" readonly>
					     				<label class="form_label">Zip</label>
					     			</div>
					     			<div class="form-group">
					     				<input type="email" name="view_buyer_email" id="view_buyer_email" class="form-control form_field" value="Email" readonly>
					     				<label class="form_label">Email</label>
					     			</div>
					     			<div class="form-group">
					     				<input type="text" name="view_buyer_workphone" id="view_buyer_workphone" class="form-control form_field" value="Work Phone" readonly>
					     				<label class="form_label">Work Phone</label>
					     			</div>
					     			<div class="form-group">
					     				<input type="text" name="view_buyer_homephone" id="view_buyer_homephone" class="form-control form_field" value="Home Phone" readonly>
					     				<label class="form_label">Home Phone</label>
					     			</div>
					     			<div class="form-group">
					     				<input type="text" name="view_buyer_mobile" id="view_buyer_mobile" class="form-control form_field" value="Mobile" readonly>
					     				<label class="form_label">Mobile</label>
					     			</div>
					     			<div class="form-group">
					     				<input type="text" name="view_buyer_dlnumber" id="view_buyer_dlnumber" class="form-control form_field" value="Drivers License Number" readonly>
					     				<label class="form_label">Drivers License Number</label>
					     			</div>
					     			<div class="form-group">
					     				<input type="text" name="view_buyer_dlstate" id="view_buyer_dlstate" class="form-control form_field" value="DL State" readonly>
					     				<label class="form_label">DL State</label>
					     			</div>
					     			<div class="form-group">
					     				<input type="text" name="view_buyer_dlexpire" id="view_buyer_dlexpire" class="form-control form_field" value="DL Expire" readonly>
					     				<label class="form_label">DL Expire</label>
					     			</div>
					     			<div class="form-group">
					     				<input type="text" name="view_buyer_dldob" id="view_buyer_dldob" class="form-control form_field" value="DL Date of Birth" readonly>
					     				<label class="form_label">DL Date of Birth</label>
					     			</div>
					     			<div class="form-group">
					     				<input type="text" name="view_buyer_temp_tag_number" id="view_buyer_temp_tag_number" class="form-control form_field" value="Temp Tag Number" readonly>
					     				<label class="form_label">Temp Tag Number</label>
					     			</div>
								</div>
								<div class="col-md-4">
									<h4 class="modal-title">View Co-Buyer Info</h4>
									<div class="form-group">
					     				<input type="text" name="view_cobuyer_firstname" id="view_cobuyer_firstname" class="form-control form_field" value="Co-Buyer First Name" readonly>
					     				<label class="form_label">Co-Buyer First Name</label>
					     			</div>
					     			<div class="form-group">
					     				<input type="text" name="view_cobuyer_middlename" id="view_cobuyer_middlename" class="form-control form_field" value="Co-Buyer Middle Name" readonly>
					     				<label class="form_label">Co-Buyer Middle Name</label>
					     			</div>
					     			<div class="form-group">
					     				<input type="text" name="view_cobuyer_lastname" id="view_cobuyer_lastname" class="form-control form_field" value="Co-Buyer Last Name" readonly>
					     				<label class="form_label">Co-Buyer Last Name</label>
					     			</div>
					     			<div class="form-group">
					     				<input type="text" name="view_cobuyer_address" id="view_cobuyer_address" class="form-control form_field" value="Co-Buyer Address" readonly>
					     				<label class="form_label">Co-Buyer Address</label>
					     			</div>
					     			<div class="form-group">
					     				<input type="text" name="view_cobuyer_city" id="view_cobuyer_city" class="form-control form_field" value="Co-Buyer City" readonly>
					     				<label class="form_label">Co-Buyer City</label>
					     			</div>
					     			<div class="form-group">
					     				<input type="text" name="view_cobuyer_country" id="view_cobuyer_country" class="form-control form_field" value="Co-Buyer County" readonly>
					     				<label class="form_label">Co-Buyer Country</label>
					     			</div>
					     			<div class="form-group">
					     				<input type="text" name="view_cobuyer_state" id="view_cobuyer_state" class="form-control form_field" value="Co-Buyer State" readonly>
					     				<label class="form_label">Co-Buyer State</label>
					     			</div>
					     			<div class="form-group">
					     				<input type="text" name="view_cobuyer_zip" id="view_cobuyer_zip" class="form-control form_field" value="Co-Buyer Zip" readonly>
					     				<label class="form_label">Co-Buyer Zip</label>
					     			</div>
					     			<div class="form-group">
					     				<input type="email" name="view_cobuyer_email" id="view_cobuyer_email" class="form-control form_field" value="Co-Buyer Email" readonly>
					     				<label class="form_label">Co-Buyer Email</label>
					     			</div>
					     			<div class="form-group">
					     				<input type="text" name="view_cobuyer_workphone" id="view_cobuyer_workphone" class="form-control form_field" value="Co-Buyer Work Phone" readonly>
					     				<label class="form_label">Co-Buyer Work Phone</label>
					     			</div>
					     			<div class="form-group">
					     				<input type="text" name="view_cobuyer_homephone" id="view_cobuyer_homephone" class="form-control form_field" value="Co-Buyer Home Phone" readonly>
					     				<label class="form_label">Co-Buyer Home Phone</label>
					     			</div>
					     			<div class="form-group">
					     				<input type="text" name="view_cobuyer_mobile" id="view_cobuyer_mobile" class="form-control form_field" value="Co-Buyer Mobile" readonly>
					     				<label class="form_label">Co-Buyer Mobile</label>
					     			</div>
					     			<div class="form-group">
					     				<input type="text" name="view_cobuyer_dlnumber" id="view_cobuyer_dlnumber" class="form-control form_field" value="Co-Buyer Drivers License Number" readonly>
					     				<label class="form_label">Co-Buyer Drivers License Number</label>
					     			</div>
					     			<div class="form-group">
					     				<input type="text" name="view_cobuyer_dlstate" id="view_cobuyer_dlstate" class="form-control form_field" value="Co-Buyer DL State" readonly>
					     				<label class="form_label">Co-Buyer DL State</label>
					     			</div>
					     			<div class="form-group">
					     				<input type="text" name="view_cobuyer_dlexpire" id="view_cobuyer_dlexpire" class="form-control form_field" value="Co-Buyer DL Expire" readonly>
					     				<label class="form_label">Co-Buyer DL Expire</label>
					     			</div>
					     			<div class="form-group">
					     				<input type="text" name="view_cobuyer_dldob" id="view_cobuyer_dldob" class="form-control form_field" value="Co-Buyer DL Date of Birth" readonly>
					     				<label class="form_label">Co-Buyer DL Date of Birth</label>
					     			</div>
								</div>
								<div class="col-md-4">
									<h4 class="modal-title">View Insurance Info</h4>
									<div class="form-group">
					     				<input type="text" name="view_insurance_company" id="view_insurance_company" class="form-control form_field" value="Insurance Company" readonly>
					     				<label class="form_label">Insurance Company</label>
					     			</div>
					     			<div class="form-group">
					     				<input type="text" name="view_insurance_policynumber" id="view_insurance_policynumber" class="form-control form_field" value="Policy Number" readonly>
					     				<label class="form_label">Policy Number</label>
					     			</div>
					     			<div class="form-group">
					     				<input type="text" name="view_insurance_agentname" id="view_insurance_agentname" class="form-control form_field" value="Agent Name" readonly>
					     				<label class="form_label">Agent Name</label>
					     			</div>
					     			<div class="form-group">
					     				<input type="text" name="view_insurance_agentphone" id="view_insurance_agentphone" class="form-control form_field" value="Agent Phone" readonly>
					     				<label class="form_label">Agent Phone</label>
					     			</div>
					     			<div class="form-group">
					     				<input type="text" name="view_insurance_address" id="view_insurance_address" class="form-control form_field" value="Address" readonly>
					     				<label class="form_label">Address</label>
					     			</div>
					     			<div class="form-group">
					     				<input type="text" name="view_insurance_city" id="view_insurance_city" class="form-control form_field" value="City" readonly>
					     				<label class="form_label">City</label>
					     			</div>
					     			<div class="form-group">
					     				<input type="text" name="view_insurance_state" id="view_insurance_state" class="form-control form_field" value="State" readonly>
					     				<label class="form_label">State</label>
					     			</div>
					     			<div class="form-group">
					     				<input type="text" name="view_insurance_zip" id="view_insurance_zip" class="form-control form_field" value="Zip" readonly>
					     				<label class="form_label">Zip</label>
					     			</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<input type="button" data-dismiss="modal" class="form_btn" value="Close">
									</div>
								</div>
							</div>
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
							<form id="add_cobuyer_info_form">
							<div class="form-group">
			     				<select class="form-control form_field" name="add_cobuyer_select_buyer" id="add_cobuyer_select_buyer" required="">
			     					<option value="0">Select Buyer</option>
			     					<?php foreach ($buyer_data as $value) { ?>
			     						<option value="<?php echo $value['buyers_id'] ?>"><?php echo $value['buyers_first_name'].' '.$value['buyers_last_name']; ?></option>
			     					<?php } ?>
			     				</select>
			     				<label class="form_label">Add Co-Buyer to</label>
			     			</div>
							<div class="form-group">
			     				<input type="text" name="add_cobuyer_firstname" id="add_cobuyer_firstname" class="form-control form_field" required="">
			     				<label class="form_label">Co-Buyer First Name</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="add_cobuyer_middlename" id="add_cobuyer_middlename" class="form-control form_field">
			     				<label class="form_label">Co-Buyer Middle Name</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="add_cobuyer_lastname" id="add_cobuyer_lastname" class="form-control form_field" required="">
			     				<label class="form_label">Co-Buyer Last Name</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="add_cobuyer_address" id="add_cobuyer_address" class="form-control form_field" required="">
			     				<label class="form_label">Co-Buyer Address</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="add_cobuyer_city" id="add_cobuyer_city" class="form-control form_field" required="">
			     				<label class="form_label">Co-Buyer City</label>
			     			</div>

			     			<div class="form-group">
			     				<!-- <input type="text" name="add_cobuyer_state" id="add_cobuyer_state" class="form-control form_field" required=""> -->
			     				<select name="add_cobuyer_state" id="add_cobuyer_state" class="form-control form_field" required="">
						     	<?php foreach ($states as $key => $value) { ?>
						     		<option value="<?php echo $value['name'] ?>"><?php echo $value['name'] ?></option>
						     	<?php } ?>
						     	</select>
			     				<label class="form_label">Co-Buyer State</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="add_cobuyer_zip" id="add_cobuyer_zip" class="form-control form_field" required="">
			     				<label class="form_label">Co-Buyer Zip</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="add_cobuyer_country" id="add_cobuyer_country" class="form-control form_field" value="USA" required="">
			     				<label class="form_label">Co-Buyer Country</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="email" name="add_cobuyer_email" id="add_cobuyer_email" class="form-control form_field" required="">
			     				<label class="form_label">Co-Buyer Email</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="add_cobuyer_workphone" id="add_cobuyer_workphone" class="form-control form_field">
			     				<label class="form_label">Co-Buyer Work Phone</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="add_cobuyer_homephone" id="add_cobuyer_homephone" class="form-control form_field">
			     				<label class="form_label">Co-Buyer Home Phone</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="add_cobuyer_mobile" id="add_cobuyer_mobile" class="form-control form_field">
			     				<label class="form_label">Co-Buyer Mobile</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="add_cobuyer_dlnumber" id="add_cobuyer_dlnumber" class="form-control form_field" required="">
			     				<label class="form_label">Co-Buyer Drivers License Number</label>
			     			</div>
			     			<div class="form-group">
			     				<!-- <input type="text" name="add_cobuyer_dlstate" id="add_cobuyer_dlstate" class="form-control form_field" required=""> -->
			     				<select name="add_cobuyer_dlstate" id="add_cobuyer_dlstate" class="form-control form_field" required="">
						     	<?php foreach ($states as $key => $value) { ?>
						     		<option value="<?php echo $value['name'] ?>"><?php echo $value['name'] ?></option>
						     	<?php } ?>
						     	</select>
			     				<label class="form_label">Co-Buyer DL State</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="add_cobuyer_dlexpire" id="add_cobuyer_dlexpire" class="form-control form_field datepicker" required="">
			     				<label class="form_label">Co-Buyer DL Expire</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="add_cobuyer_dldob" id="add_cobuyer_dldob" class="form-control form_field datepicker" required="">
			     				<label class="form_label">Co-Buyer DL Date of Birth</label>
			     			</div>
			     			<div class="form-group">
			     				<!-- data-dismiss="modal" class="form_btn add_cobuyer_done" -->
								<input type="submit" class="form_btn" value="Add Co-Buyer">
							</div>
							</form>
						</div>
					</div>
				</div>
			</div>

			<div class="modal fade custom_modal" id="edit_cobuyer" tabindex="-1" role="dialog" aria-labelledby="edit_cobuyer" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Edit Co-Buyer</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true"><i class="fa fa-times"></i></span>
							</button>
						</div>
						<div class="modal-body">
							<form id="edit_cobuyer_info_form">
							<div class="form-group">
								<?php  /*
			     				<select class="form-control form_field" name="edit_cobuyer_select_buyer" id="edit_cobuyer_select_buyer" required="" disabled="">
			     					<option value="0">Select Buyer</option>
			     					<?php foreach ($buyer_data as $value) { ?>
			     						<option value="<?php echo $value['buyers_id'] ?>"><?php echo $value['buyers_first_name'].' '.$value['buyers_last_name']; ?></option>
			     					<?php } ?>
			     				</select>
			     				*/?>
			     				<input type="text" name="edit_cobuyer_buyername" id="edit_cobuyer_buyername" class="form-control form_field" value="Co-Buyer First Name" disabled="">
			     				<label class="viewlabel form_label">Buyer</label>
			     			</div>
			     			<input type="hidden" name="edit_cobuyer_buyer_id" id="edit_cobuyer_buyer_id">

							<div class="form-group">
			     				<input type="text" name="edit_cobuyer_firstname" id="edit_cobuyer_firstname" class="form-control form_field" required="">
			     				<label class="form_label">Co-Buyer First Name</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="edit_cobuyer_middlename" id="edit_cobuyer_middlename" class="form-control form_field" required="">
			     				<label class="form_label">Co-Buyer Middle Name</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="edit_cobuyer_lastname" id="edit_cobuyer_lastname" class="form-control form_field" required="">
			     				<label class="form_label">Co-Buyer Last Name</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="edit_cobuyer_address" id="edit_cobuyer_address" class="form-control form_field" required="">
			     				<label class="form_label">Co-Buyer Address</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="edit_cobuyer_city" id="edit_cobuyer_city" class="form-control form_field" required="">
			     				<label class="form_label">Co-Buyer City</label>
			     			</div>
			     			<div class="form-group">
			     				<!-- <input type="text" name="edit_cobuyer_state" id="edit_cobuyer_state" class="form-control form_field" required=""> -->
			     				<select name="edit_cobuyer_state" id="edit_cobuyer_state" class="form-control form_field" required="">
						     	<?php foreach ($states as $key => $value) { ?>
						     		<option value="<?php echo $value['name'] ?>"><?php echo $value['name'] ?></option>
						     	<?php } ?>
						     	</select>
			     				<label class="form_label">Co-Buyer State</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="edit_cobuyer_zip" id="edit_cobuyer_zip" class="form-control form_field" required="">
			     				<label class="form_label">Co-Buyer Zip</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="edit_cobuyer_country" id="edit_cobuyer_country" class="form-control form_field" required="">
			     				<label class="form_label">Co-Buyer Country</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="email" name="edit_cobuyer_email" id="edit_cobuyer_email" class="form-control form_field" required="">
			     				<label class="form_label">Co-Buyer Email</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="edit_cobuyer_workphone" id="edit_cobuyer_workphone" class="form-control form_field">
			     				<label class="form_label">Co-Buyer Work Phone</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="edit_cobuyer_homephone" id="edit_cobuyer_homephone" class="form-control form_field">
			     				<label class="form_label">Co-Buyer Home Phone</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="edit_cobuyer_mobile" id="edit_cobuyer_mobile" class="form-control form_field">
			     				<label class="form_label">Co-Buyer Mobile</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="edit_cobuyer_dlnumber" id="edit_cobuyer_dlnumber" class="form-control form_field" required="">
			     				<label class="form_label">Co-Buyer Drivers License Number</label>
			     			</div>
			     			<div class="form-group">
			     				<!-- <input type="text" name="edit_cobuyer_dlstate" id="edit_cobuyer_dlstate" class="form-control form_field" required=""> -->
			     				<select name="edit_cobuyer_dlstate" id="edit_cobuyer_dlstate" class="form-control form_field" required="">
						     	<?php foreach ($states as $key => $value) { ?>
						     		<option value="<?php echo $value['name'] ?>"><?php echo $value['name'] ?></option>
						     	<?php } ?>
						     	</select>
			     				<label class="form_label">Co-Buyer DL State</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="edit_cobuyer_dlexpire" id="edit_cobuyer_dlexpire" class="form-control form_field datepicker" required="">
			     				<label class="form_label">Co-Buyer DL Expire</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="edit_cobuyer_dldob" id="edit_cobuyer_dldob" class="form-control form_field datepicker" required="">
			     				<label class="form_label">Co-Buyer DL Date of Birth</label>
			     			</div>
			     			<div class="form-group">
								<input type="submit" class="form_btn" value="Edit Co-Buyer">
							</div>
							</form>
						</div>
					</div>
				</div>
			</div>

			<div class="modal fade custom_modal view_model" id="view_cobuyer" tabindex="-1" role="dialog" aria-labelledby="view_cobuyer" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">View Co-Buyer Info</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true"><i class="fa fa-times"></i></span>
							</button>
						</div>
						<div class="modal-body">
							<div class="form-group">
			     				<!-- <select class="form-control form_field" disabled="">
			     					<option>Select Buyer</option>
			     					<option selected="">Love</option>
			     				</select> -->
			     				<input type="text" name="view_cobuyer2_buyername" id="view_cobuyer2_buyername" class="form-control form_field" readonly>
			     				<label class="form_label">Buyer</label>
			     			</div>
							<div class="form-group">
			     				<input type="text" name="view_cobuyer2_firstname" id="view_cobuyer2_firstname" class="form-control form_field" value="Co-Buyer First Name" readonly>
			     				<label class="form_label">Co-Buyer First Name</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="view_cobuyer2_middlename" id="view_cobuyer2_middlename" class="form-control form_field" value="Co-Buyer Middle Name" readonly>
			     				<label class="form_label">Co-Buyer Middle Name</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="view_cobuyer2_lastname" id="view_cobuyer2_lastname" class="form-control form_field" value="Co-Buyer Last Name" readonly>
			     				<label class="form_label">Co-Buyer Last Name</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="view_cobuyer2_address" id="view_cobuyer2_address" class="form-control form_field" value="Co-Buyer Address" readonly>
			     				<label class="form_label">Co-Buyer Address</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="view_cobuyer2_city" id="view_cobuyer2_city" class="form-control form_field" value="Co-Buyer City" readonly>
			     				<label class="form_label">Co-Buyer City</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="view_cobuyer2_country" id="view_cobuyer2_country" class="form-control form_field" value="Co-Buyer County" readonly>
			     				<label class="form_label">Co-Buyer Country</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="view_cobuyer2_state" id="view_cobuyer2_state" class="form-control form_field" value="Co-Buyer State" readonly>
			     				<label class="form_label">Co-Buyer State</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="view_cobuyer2_zip" id="view_cobuyer2_zip" class="form-control form_field" value="Co-Buyer Zip" readonly>
			     				<label class="form_label">Co-Buyer Zip</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="email" name="view_cobuyer2_email" id="view_cobuyer2_email" class="form-control form_field" value="Co-Buyer Email" readonly>
			     				<label class="form_label">Co-Buyer Email</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="view_cobuyer2_workphone" id="view_cobuyer2_workphone" class="form-control form_field" value="Co-Buyer Work Phone" readonly>
			     				<label class="form_label">Co-Buyer Work Phone</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="view_cobuyer2_homephone" id="view_cobuyer2_homephone" class="form-control form_field" value="Co-Buyer Home Phone" readonly>
			     				<label class="form_label">Co-Buyer Home Phone</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="view_cobuyer2_mobile" id="view_cobuyer2_mobile" class="form-control form_field" value="Co-Buyer Mobile" readonly>
			     				<label class="form_label">Co-Buyer Mobile</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="view_cobuyer2_dlnumber" id="view_cobuyer2_dlnumber" class="form-control form_field" value="Co-Buyer Drivers License Number" readonly>
			     				<label class="form_label">Co-Buyer Drivers License Number</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="view_cobuyer2_dlstate" id="view_cobuyer2_dlstate" class="form-control form_field" value="Co-Buyer DL State" readonly>
			     				<label class="form_label">Co-Buyer DL State</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="view_cobuyer2_dlexpire" id="view_cobuyer2_dlexpire" class="form-control form_field" value="Co-Buyer DL Expire" readonly>
			     				<label class="form_label">Co-Buyer DL Expire</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="view_cobuyer2_dldob" id="view_cobuyer2_dldob" class="form-control form_field" value="Co-Buyer DL Date of Birth" readonly>
			     				<label class="form_label">Co-Buyer DL Date of Birth</label>
			     			</div>
			     			<div class="form-group">
								<input type="button" data-dismiss="modal" class="form_btn" value="Close">
							</div>
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
							<form id="insurance_info_form">
							<div class="form-group">
			     				<select class="form-control form_field" name="add_insurance_select_buyer" id="add_insurance_select_buyer" required="">
			     					<option value="0">Select Buyer</option>
			     					<?php foreach ($buyer_data as $value) { ?>
			     						<option value="<?php echo $value['buyers_id'] ?>"><?php echo $value['buyers_first_name'].' '.$value['buyers_last_name']; ?></option>
			     					<?php } ?>
			     				</select>
			     				<label class="form_label">Buyer To Select</label>
			     			</div>
							<div class="form-group">
			     				<input type="text" name="add_insurance_companyname" id="add_insurance_companyname" class="form-control form_field" required="">
			     				<label class="form_label">Insurance Company</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="add_insurance_policynumber" id="add_insurance_policynumber" class="form-control form_field" required="">
			     				<label class="form_label">Policy Number</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="add_insurance_agentname" id="add_insurance_agentname" class="form-control form_field" required="">
			     				<label class="form_label">Agent Name</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="add_insurance_agentphone" id="add_insurance_agentphone" class="form-control form_field" required="">
			     				<label class="form_label">Agent Phone</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="add_insurance_address" id="add_insurance_address" class="form-control form_field" required="">
			     				<label class="form_label">Address</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="add_insurance_city" id="add_insurance_city" class="form-control form_field" required="">
			     				<label class="form_label">City</label>
			     			</div>
			     			<div class="form-group">
			     				<!-- <input type="text" name="add_insurance_state" id="add_insurance_state" class="form-control form_field" required=""> -->
			     				<select name="add_insurance_state" id="add_insurance_state" class="form-control form_field" required="">
						     	<?php foreach ($states as $key => $value) { ?>
						     		<option value="<?php echo $value['name'] ?>"><?php echo $value['name'] ?></option>
						     	<?php } ?>
						     	</select>
			     				<label class="form_label">State</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="add_insurance_zip" id="add_insurance_zip" class="form-control form_field" required="">
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

			<div class="modal fade custom_modal" id="edit_insurance" tabindex="-1" role="dialog" aria-labelledby="edit_insurance" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Edit Insurance</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true"><i class="fa fa-times"></i></span>
							</button>
						</div>
						<div class="modal-body">
							<form id="edit_insurance_info_form">
							<div class="form-group">
			     				<input type="text" name="edit_insurance_buyername" id="edit_insurance_buyername" class="form-control form_field" value="Co-Buyer First Name" disabled="">
			     				<label class="viewlabel form_label">Buyer</label>
			     				<input type="hidden" name="edit_insurance_buyer_id" id="edit_insurance_buyer_id">
			     			</div>
							<div class="form-group">
			     				<input type="text" name="edit_insurance_companyname" id="edit_insurance_companyname" class="form-control form_field" required="">
			     				<label class="form_label">Insurance Company</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="edit_insurance_policynumber" id="edit_insurance_policynumber" class="form-control form_field" required="">
			     				<label class="form_label">Policy Number</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="edit_insurance_agentname" id="edit_insurance_agentname" class="form-control form_field" required="">
			     				<label class="form_label">Agent Name</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="edit_insurance_agentphone" id="edit_insurance_agentphone" class="form-control form_field" required="">
			     				<label class="form_label">Agent Phone</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="edit_insurance_address" id="edit_insurance_address" class="form-control form_field" required="">
			     				<label class="form_label">Address</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="edit_insurance_city" id="edit_insurance_city" class="form-control form_field" required="">
			     				<label class="form_label">City</label>
			     			</div>
			     			<div class="form-group">
			     				<!-- <input type="text" name="edit_insurance_state" id="edit_insurance_state" class="form-control form_field" required=""> -->
			     				<select name="edit_insurance_state" id="edit_insurance_state" class="form-control form_field" required="">
						     	<?php foreach ($states as $key => $value) { ?>
						     		<option value="<?php echo $value['name'] ?>"><?php echo $value['name'] ?></option>
						     	<?php } ?>
						     	</select>
			     				<label class="form_label">State</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="edit_insurance_zip" id="edit_insurance_zip" class="form-control form_field" required="">
			     				<label class="form_label">Zip</label>
			     			</div>
			     			<div class="form-group">
			     				<!-- ata-dismiss="modal" class="form_btn edit_insurance_done" -->
								<input type="submit" class="form_btn" value="Edit Insurance">
							</div>
							</form>
						</div>
					</div>
				</div>
			</div>

			<div class="modal fade custom_modal view_model" id="view_insurance" tabindex="-1" role="dialog" aria-labelledby="view_insurance" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">View Insurance</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true"><i class="fa fa-times"></i></span>
							</button>
						</div>
						<div class="modal-body">
							<div class="form-group">
			     				<input type="text" name="view_insurance_info_buyername" id="view_insurance_info_buyername" class="form-control form_field" value="Insurance Buyer" readonly>
			     				<label class="form_label">Buyer To Update</label>
			     			</div>
							<div class="form-group">
			     				<input type="text" name="view_insurance_info_company" id="view_insurance_info_company" class="form-control form_field" value="Insurance Company" readonly>
			     				<label class="form_label">Insurance Company</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="view_insurance_info_policynumber" id="view_insurance_info_policynumber" class="form-control form_field" value="Policy Number" readonly>
			     				<label class="form_label">Policy Number</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="view_insurance_info_agentname" id="view_insurance_info_agentname" class="form-control form_field" value="Agent Name" readonly>
			     				<label class="form_label">Agent Name</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="view_insurance_info_agentphone" id="view_insurance_info_agentphone" class="form-control form_field" value="Agent Phone" readonly>
			     				<label class="form_label">Agent Phone</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="view_insurance_info_address" id="view_insurance_info_address" class="form-control form_field" value="Address" readonly>
			     				<label class="form_label">Address</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="view_insurance_info_city" id="view_insurance_info_city" class="form-control form_field" value="City" readonly>
			     				<label class="form_label">City</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="view_insurance_info_state" id="view_insurance_info_state" class="form-control form_field" value="State" readonly>
			     				<label class="form_label">State</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="view_insurance_info_zip" id="view_insurance_info_zip" class="form-control form_field" value="Zip" readonly>
			     				<label class="form_label">Zip</label>
			     			</div>
			     			<div class="form-group">
								<input type="button" data-dismiss="modal" class="form_btn" value="Close">
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="modal fade custom_modal" id="add_cobuyer_buyer" tabindex="-1" role="dialog" aria-labelledby="add_cobuyer_buyer" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Add Co-Buyer</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true"><i class="fa fa-times"></i></span>
							</button>
						</div>
						<div class="modal-body">
							<form id="add_cobuyer_buyer_form">
							<div class="form-group">
			     				<input type="text" name="add_cobuyer_buyer_buyername" id="add_cobuyer_buyer_buyername" class="form-control form_field" required="" readonly="">
			     				<label class="viewlabel form_label">Add Co-Buyer to</label>
			     				<input type="hidden" name="add_cobuyer_buyer_id" id="add_cobuyer_buyer_id">
			     			</div>
							<div class="form-group">
			     				<input type="text" name="add_cobuyer_buyer_firstname" id="add_cobuyer_buyer_firstname" class="form-control form_field" required="">
			     				<label class="form_label">Co-Buyer First Name</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="add_cobuyer_buyer_middlename" id="add_cobuyer_buyer_middlename" class="form-control form_field">
			     				<label class="form_label">Co-Buyer Middle Name</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="add_cobuyer_buyer_lastname" id="add_cobuyer_buyer_lastname" class="form-control form_field" required="">
			     				<label class="form_label">Co-Buyer Last Name</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="add_cobuyer_buyer_address" id="add_cobuyer_buyer_address" class="form-control form_field" required="">
			     				<label class="form_label">Co-Buyer Address</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="add_cobuyer_buyer_city" id="add_cobuyer_buyer_city" class="form-control form_field" required="">
			     				<label class="form_label">Co-Buyer City</label>
			     			</div>

			     			<div class="form-group">
			     				<!-- <input type="text" name="add_cobuyer_buyer_state" id="add_cobuyer_buyer_state" class="form-control form_field" required=""> -->
			     				<select name="add_cobuyer_buyer_state" id="add_cobuyer_buyer_state" class="form-control form_field" required="">
						     	<?php foreach ($states as $key => $value) { ?>
						     		<option value="<?php echo $value['name'] ?>"><?php echo $value['name'] ?></option>
						     	<?php } ?>
						     	</select>
			     				<label class="form_label">Co-Buyer State</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="add_cobuyer_buyer_zip" id="add_cobuyer_buyer_zip" class="form-control form_field" required="">
			     				<label class="form_label">Co-Buyer Zip</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="add_cobuyer_buyer_country" id="add_cobuyer_buyer_country" class="form-control form_field" value="USA" required>
			     				<label class="form_label">Co-Buyer Country</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="email" name="add_cobuyer_buyer_email" id="add_cobuyer_buyer_email" class="form-control form_field" required="">
			     				<label class="form_label">Co-Buyer Email</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="add_cobuyer_buyer_workphone" id="add_cobuyer_buyer_workphone" class="form-control form_field">
			     				<label class="form_label">Co-Buyer Work Phone</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="add_cobuyer_buyer_homephone" id="add_cobuyer_buyer_homephone" class="form-control form_field">
			     				<label class="form_label">Co-Buyer Home Phone</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="add_cobuyer_buyer_mobile" id="add_cobuyer_buyer_mobile" class="form-control form_field">
			     				<label class="form_label">Co-Buyer Mobile</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="add_cobuyer_buyer_dlnumber" id="add_cobuyer_buyer_dlnumber" class="form-control form_field" required="">
			     				<label class="form_label">Co-Buyer Drivers License Number</label>
			     			</div>
			     			<div class="form-group">
			     				<!-- <input type="text" name="add_cobuyer_buyer_dlstate" id="add_cobuyer_buyer_dlstate" class="form-control form_field" required=""> -->
			     				<select name="add_cobuyer_buyer_dlstate" id="add_cobuyer_buyer_dlstate" class="form-control form_field" required="">
						     	<?php foreach ($states as $key => $value) { ?>
						     		<option value="<?php echo $value['name'] ?>"><?php echo $value['name'] ?></option>
						     	<?php } ?>
						     	</select>
			     				<label class="form_label">Co-Buyer DL State</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="add_cobuyer_buyer_dlexpire" id="add_cobuyer_buyer_dlexpire" class="form-control form_field datepicker" required="">
			     				<label class="form_label">Co-Buyer DL Expire</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="add_cobuyer_buyer_dldob" id="add_cobuyer_buyer_dldob" class="form-control form_field datepicker" required="">
			     				<label class="form_label">Co-Buyer DL Date of Birth</label>
			     			</div>
			     			<div class="form-group">
								<input type="submit" class="form_btn" value="Add Co-Buyer">
							</div>
							</form>
						</div>
					</div>
				</div>
			</div>

			<div class="modal fade custom_modal" id="add_insurance_buyer" tabindex="-1" role="dialog" aria-labelledby="add_insurance_buyer" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Add Insurance</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true"><i class="fa fa-times"></i></span>
							</button>
						</div>
						<div class="modal-body">
							<form id="add_insurance_info_buyer_form">
							<div class="form-group">
								<?php /*
			     				<select class="form-control form_field" name="add_insurance_buyer_select_buyer" id="add_insurance_buyer_select_buyer" required="">
			     					<option value="0">Select Buyer</option>
			     					<?php foreach ($buyer_data as $value) { ?>
			     						<option value="<?php echo $value['buyers_id'] ?>"><?php echo $value['buyers_first_name'].' '.$value['buyers_last_name']; ?></option>
			     					<?php } ?>
			     				</select>
			     				*/ ?>
			     				<input type="text" name="add_insurance_buyer_buyername" id="add_insurance_buyer_buyername" class="form-control form_field" required="" readonly="">
			     				<label class="form_label viewlabel">Buyer To Select</label>
			     				<input type="hidden" name="add_insurance_buyer_buyer_id" id="add_insurance_buyer_buyer_id">
			     			</div>
							<div class="form-group">
			     				<input type="text" name="add_insurance_buyer_companyname" id="add_insurance_buyer_companyname" class="form-control form_field" required="">
			     				<label class="form_label">Insurance Company</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="add_insurance_buyer_policynumber" id="add_insurance_buyer_policynumber" class="form-control form_field" required="">
			     				<label class="form_label">Policy Number</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="add_insurance_buyer_agentname" id="add_insurance_buyer_agentname" class="form-control form_field" required="">
			     				<label class="form_label">Agent Name</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="add_insurance_buyer_agentphone" id="add_insurance_buyer_agentphone" class="form-control form_field" required="">
			     				<label class="form_label">Agent Phone</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="add_insurance_buyer_address" id="add_insurance_buyer_address" class="form-control form_field" required="">
			     				<label class="form_label">Address</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="add_insurance_buyer_city" id="add_insurance_buyer_city" class="form-control form_field" required="">
			     				<label class="form_label">City</label>
			     			</div>
			     			<div class="form-group">
			     				<!-- <input type="text" name="add_insurance_buyer_state" id="add_insurance_buyer_state" class="form-control form_field" required=""> -->
			     				<select name="add_insurance_buyer_state" id="add_insurance_buyer_state" class="form-control form_field" required="">
						     	<?php foreach ($states as $key => $value) { ?>
						     		<option value="<?php echo $value['name'] ?>"><?php echo $value['name'] ?></option>
						     	<?php } ?>
						     	</select>
			     				<label class="form_label">State</label>
			     			</div>
			     			<div class="form-group">
			     				<input type="text" name="add_insurance_buyer_zip" id="add_insurance_buyer_zip" class="form-control form_field" required="">
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

		</div>

	<?php $this->load->view('common/footer');?>

	</body>

	<?php $this->load->view('common/footer-script');?>

</html>
