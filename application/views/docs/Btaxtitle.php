<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,700;1,500&display=swap" rel="stylesheet">
		<style type="text/css">
			.btaxtitle_table {width: 1067px;margin: 0 auto;position: relative;}.btaxtitle_table .center{text-align: center;}.title_border{border: 2px solid #000;padding: 10px 20px;display: inline-block;}.btaxtitle_table input.input {border: none;border-bottom: 1px solid #000;padding: 1px 5px;}input.input:focus {outline: none;}.btaxtitle_table .w_5{width: 5%}.btaxtitle_table .w_10 {width: 10%;}.btaxtitle_table .w_20 {width: 20%;}.btaxtitle_table .w_30 {width: 30%;}.btaxtitle_table .w_40 {width: 40%;} .btaxtitle_table .w_50 {width: 50%;} .btaxtitle_table .w_55{width: 55%} .btaxtitle_table .w_60 {width: 60%;} .btaxtitle_table .w_70{width: 70%;} .btaxtitle_table .w_80{width: 80%;} .btaxtitle_table .w_90{width: 90%}.btaxtitle_table .w_94{width: 94%}.btaxtitle_table .w_89{width: 89%}.btaxtitle_table .w_100{width: 100%;}.d_block{display: block;}.p_label {margin-top: 0;}p {margin-bottom: 0;line-height: 1.5;}.m_auto{margin: auto;}.btaxtitle_title_table,.btaxtitle_title_table td{border: 1px solid #000;}.f_right{float: right;}.btaxtitle_table_2,.btaxtitle_table_2 input{font-size: small;}.btaxtitle_table_2{border: 1px solid #000;}.btaxtitle_table_2 td{padding: 0 5px} .btaxtitle_table_2 tr:first-child td{padding-top: 5px !important;}.btaxtitle_table_2 tr:last-child td {padding-bottom: 5px !important;}.btaxtitle_table_3 tr:first-child td{padding-top: 0 !important;}.btaxtitle_table_3 tr:last-child td {padding-bottom: 0 !important;}table.btaxtitle_table_4,table.btaxtitle_table_4 td {font-size: small;border: none;}table.btaxtitle_table_4 table td {padding: 0 5px !important;}table.btaxtitle_table_4 {border: 1px solid;}.btaxtitle_table .w_5.center {padding: 0;} .border_input {border: 1px solid}
		</style>
	</head>
	<body>
		<table class="btaxtitle_table">
			<tr>
				<td>
					<table class="btaxtitle_table_1">
						<tr>
							<td width="15%" valign="bottom">
								<img src="https://bubbadms.com/assets/images/dor.png" style="width: 100px;">
							</td>
							<td width="70%" valign="bottom">
								<h3 class="center"><b>Georgia Department of Revenue - Motor Vehicle Division<br>Form MV-1 Motor Vehicle Title Application</b></h3>
								<p class="center">For instructions on how to complete this form see page 2.</p>
							</td>
							<td width="15%" valign="bottom">
								<small><b>MV-1 (Revised 6-2020)</b></small>
								<img src="https://bubbadms.com/assets/images/mvoneqrcode.png" style="width: 100px;float: right;">
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td>
					<table class="btaxtitle_title_table">
						<tr>
							<td width="5%" style="background: #797878;color: #fff;padding-left: 5px;margin-top: 10px;" class="center">A</td>
							<td width="95%" style="background: #797878;color: #fff;padding-left: 5px;margin-top: 10px;">VEHICLE INFORMATION</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td>
					<table class="btaxtitle_table_2">
						<tr>
							<td width="40%">Vehicle ID (VIN): <input type="text" class="input w_60 f_right" value="<?php echo $inventory_data->inv_vin; ?>"></td>
							<td width="40%">Current Title #: <input type="text" class="input w_70 f_right"></td>
							<td width="20%">Year: <input type="text" class="input w_60 f_right" value="<?php echo $inventory_data->inv_year; ?>"> </td>
						</tr>
						<tr>
							<td width="40%">Make: <input type="text" class="input w_60 f_right" value="<?php echo $inventory_data->inv_make; ?>"></td>
							<td width="40%">Current Title's State of Issue: <input type="text" class="input w_55 f_right"></td>
							<td width="20%">Color: <input type="text" class="input w_60 f_right" value="<?php echo $inventory_data->inv_color; ?>"></td>
						</tr>
						<tr>
							<td width="40%">Model: <input type="text" class="input w_60 f_right" value="<?php echo $inventory_data->inv_model; ?>"></td>
							<td width="40%">GA County of Residence: <input type="text" class="input w_60 f_right" value="<?php //echo $buyers_data->buyers_county; ?>"></td>
							<td width="20%">Cylinders: <input type="text" class="input w_60 f_right"></td>
						</tr>
						<tr>
							<td width="40%">Body Style: <input type="text" class="input w_60 f_right" value="<?php echo $inventory_data->inv_style; ?>"></td>
							<td width="40%">District #: <input type="text" class="input w_80 f_right"></td>
							<td width="20%">Fuel Type: <input type="text" class="input w_60 f_right"></td>
						</tr>
						<tr>
							<td colspan="3">
								Odometer Exceptions: <input type="checkbox"> EXEMPT <input type="checkbox"> Exceeds Mechanical Limits of Odometer <input type="checkbox"> Not the Actual Mileage, Warning Odometer Discrepancy 
							</td>
						</tr>
						<tr>
							<td width="40%">Odometer Reading: <input type="text" class="input w_60 f_right" value="<?php echo $inventory_data->inv_mileage; ?>"></td>
							<td width="40%">Date Purchased: <input type="text" class="input w_70 f_right" value="<?php echo $date; ?>"></td>
							<td width="20%"></td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td>
					<table class="btaxtitle_table_2">
						<tr>
							<td colspan="3">
								<h5 class="center"><b>COMPLETE FOR ALL COMMERCIAL VEHICLES</b></h5>
							</td>
						</tr>
						<tr>
							<td width="42%">Gross Vehicle Weight & Load: <input type="text" class="input w_50 f_right"></td>
							<td width="35%">Straight Truck? <input type="checkbox"> Yes <input type="checkbox"> No</td>
							<td width="23%">Used for Hire? <input type="checkbox"> Yes <input type="checkbox"> No</td>
						</tr>
						<tr>
							<td width="42%">Type of Trailer Pulled? <input type="text" class="input w_60 f_right"></td>
							<td width="35%">Product Hauled? <input type="text" class="input w_60 f_right"></td>
							<td width="23%">Is this a Farm Vehicle? <input type="checkbox"> Yes <input type="checkbox"> No</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td>
					<table class="btaxtitle_title_table">
						<tr>
							<td width="5%" style="background: #797878;color: #fff;padding-left: 5px;margin-top: 10px;" class="center">B</td>
							<td width="95%" style="background: #797878;color: #fff;padding-left: 5px;margin-top: 10px;">OWNER INFORMATION</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td>
					<table class="btaxtitle_table_2">
						<tr>
							<td>
								<p>Number of Owners: <input type="text" class="input w_30"> Leased Vehicle: <input type="checkbox"> No <input type="checkbox"> Yes  <i>(If yes, complete Section D)</i></p>
								<p>If purchased from an out-of-state business, did you pick up the vehicle out of state? <input type="checkbox"> Yes <input type="checkbox"> No</p>
								<p style="padding-left: 15px;">*Owner's signature below warrants: I do solemnly swear or affirm under criminal penalty of a felony for fraudulent use of a false or fictitious name or address or for making a material false statement punishable by fine up to $5,000 or by imprisonment of up to five years, or both that the statements contained herein are true and accurate.</p>
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td>
					<table class="btaxtitle_table_2">
						<tr>
							<td><p><b>OWNER # 1</b></p></td>
						</tr>
						<tr>
							<td>
								<table class="btaxtitle_table_3">
									<tr>
										<td width="60%">Full Legal Name: <input type="text" class="input w_80 f_right" value="<?php echo $buyers_data->buyers_first_name; ?> <?php echo $buyers_data->buyers_mid_name; ?> <?php echo $buyers_data->buyers_last_name; ?>"></td>
										<td width="30%">Driver's License #: <input type="text" class="input w_60 f_right" value="<?php echo $buyers_data->buyers_DL_number; ?>"></td>
										<td width="10%">State: <input type="text" class="input w_60 f_right" value="<?php echo $buyers_data->buyers_DL_state; ?>"></td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td>
								<table class="btaxtitle_table_3">
									<tr>
										<td width="30%">Date of Birth: <input type="text" class="input w_60 f_right" value="<?php echo $buyers_data->buyers_DL_dob; ?>"></td>
										<td width="50%">E-mail Address: <input type="text" class="input w_80 f_right" value="<?php echo $buyers_data->buyers_pri_email; ?>"></td>
										<td width="20%">Phone #: <input type="text" class="input w_60 f_right" value="<?php echo empty($buyers_data->buyers_work_phone)? empty($buyers_data->buyers_pri_phone_cell)? $buyers_data->buyers_home_phone : $buyers_data->buyers_pri_phone_cell : $buyers_data->buyers_work_phone; ?>"></td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td>
								<table class="btaxtitle_table_3">
									<tr>
										<td width="60%">Business Name: <input type="text" class="input w_80 f_right"></td>
										<td width="40%">Name of Agent: <input type="text" class="input w_70 f_right" value="<?php echo $buyers_data->ins_agent; ?>"></td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td>
								<table class="btaxtitle_table_3">
									<tr>
										<td width="100%">Address: <input type="text" class="input w_94 f_right" value="<?php echo $buyers_data->buyers_address; ?> <?php echo $buyers_data->buyers_city; ?> <?php echo $buyers_data->buyers_state; ?> <?php echo $buyers_data->buyers_zip; ?>"></td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td>
								<table class="btaxtitle_table_3">
									<tr>
										<td width="100%">Mailing Address: <input type="text" class="input w_89 f_right" value="<?php echo $buyers_data->buyers_first_name; ?> <?php echo $buyers_data->buyers_mid_name; ?> <?php echo $buyers_data->buyers_last_name; ?> <?php echo $buyers_data->buyers_address; ?> <?php echo $buyers_data->buyers_city; ?> <?php echo $buyers_data->buyers_state; ?> <?php echo $buyers_data->buyers_zip; ?>"></td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td>
								<table class="btaxtitle_table_3">
									<tr>
										<td width="85%">*Signature of Owner 1 or Business Agent: <input type="text" class="input w_70 f_right"></td>
										<td width="15%">Date: <input type="text" class="input w_70 f_right" value="<?php echo $date; ?>"></td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td>
					<table class="btaxtitle_table_2">
						<tr>
							<td><p><b>OWNER # 2</b></p></td>
						</tr>
						<tr>
							<td>
								<table class="btaxtitle_table_3">
									<tr>
										<td width="60%">Full Legal Name: <input type="text" class="input w_80 f_right" value="<?php echo $buyers_data->co_buyers_first_name; ?> <?php echo $buyers_data->co_buyers_mid_name; ?> <?php echo $buyers_data->co_buyers_last_name; ?>"></td>
										<td width="30%">Driver's License #: <input type="text" class="input w_60 f_right" value="<?php echo $buyers_data->co_buyers_DL_number; ?>"></td>
										<td width="10%">State: <input type="text" class="input w_60 f_right" value="<?php echo $buyers_data->co_buyers_DL_state; ?>"></td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td>
								<table class="btaxtitle_table_3">
									<tr>
										<td width="30%">Date of Birth: <input type="text" class="input w_60 f_right" value="<?php echo $buyers_data->co_buyers_DL_dob; ?>"></td>
										<td width="50%">E-mail Address: <input type="text" class="input w_80 f_right" value="<?php echo $buyers_data->co_buyers_pri_email; ?>"></td>
										<td width="20%">Phone #: <input type="text" class="input w_60 f_right" value="<?php echo empty($buyers_data->co_buyers_work_phone)? empty($buyers_data->co_buyers_pri_phone_cell)? $buyers_data->co_buyers_home_phone : $buyers_data->co_buyers_pri_phone_cell : $buyers_data->co_buyers_work_phone; ?>"></td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td>
								<table class="btaxtitle_table_3">
									<tr>
										<td width="60%">Business Name: <input type="text" class="input w_80 f_right"></td>
										<td width="40%">Name of Agent: <input type="text" class="input w_70 f_right" value="<?php echo $buyers_data->ins_agent; ?>"></td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td>
								<table class="btaxtitle_table_3">
									<tr>
										<td width="100%">Address: <input type="text" class="input w_94 f_right" value="<?php echo $buyers_data->co_buyers_address; ?> <?php echo $buyers_data->co_buyers_city; ?> <?php echo $buyers_data->co_buyers_state; ?> <?php echo $buyers_data->co_buyers_zip; ?>"></td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td>
								<table class="btaxtitle_table_3">
									<tr>
										<td width="100%">Mailing Address: <input type="text" class="input w_89 f_right" value="<?php echo $buyers_data->co_buyers_first_name; ?> <?php echo $buyers_data->co_buyers_mid_name; ?> <?php echo $buyers_data->co_buyers_last_name; ?> <?php echo $buyers_data->co_buyers_address; ?> <?php echo $buyers_data->co_buyers_city; ?> <?php echo $buyers_data->co_buyers_state; ?> <?php echo $buyers_data->co_buyers_zip; ?>"></td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td>
								<table class="btaxtitle_table_3">
									<tr>
										<td width="85%">*Signature of Owner 1 or Business Agent: <input type="text" class="input w_70 f_right"></td>
										<td width="15%">Date: <input type="text" class="input w_70 f_right" value="<?php echo $date; ?>"></td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td>
					<table>
						<tr>
							<td width="50%" valign="top">
								<table class="btaxtitle_title_table">
									<tr>
										<td width="10%" style="background: #797878;color: #fff;padding-left: 5px;margin-top: 10px;" class="center">C</td>
										<td width="90%" style="background: #797878;color: #fff;padding-left: 5px;margin-top: 10px;">SELLER INFORMATION</td>
									</tr>
								</table>
							</td>
							<td width="50%" valign="top">
								<table class="btaxtitle_title_table">
									<tr>
										<td width="10%" style="background: #797878;color: #fff;padding-left: 5px;margin-top: 10px;" class="center">D</td>
										<td width="90%" style="background: #797878;color: #fff;padding-left: 5px;margin-top: 10px;">LESSEE INFORMATION</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
					<table class="btaxtitle_table_4">
						<tr>
							<td width="50%" valign="top" style="border: 1px solid;padding: 5px 0;">
								<table>
									<tr>
										<td colspan="2">GA Dealer's/Bank's 12-Digit Customer ID # (If applicable):</td>
									</tr>
									<tr>
										<td colspan="2">
											<?php 
												$twelve_digit_number = array();
												if(!empty($memberdata->twelve_digit_number)){
													$twelve_digit_number = str_split($memberdata->twelve_digit_number);
													for ($i=0; $i < 11; $i++) { 

														if(count($twelve_digit_number) > $i){ ?>
															
															<input type="text" class="w_5 center border_input" maxlength="1" value="<?php echo $twelve_digit_number[$i]; ?>">

													<?php }else{ ?>
															<input type="text" class="w_5 center border_input" maxlength="1">
													<?php }
												 	}
												}else{
													for ($i=0; $i < 11; $i++) { ?>
														<input type="text" class="w_5 center border_input" maxlength="1">
												<?php } 
												}
											?>
										</td>
									</tr>
									<tr>
										<td colspan="2">Seller's GA Sales Tax #: </td>
									</tr>
									<tr>
										<td colspan="2">
											<?php 
												$saletax = array();
												// $twelvedigitno = $memberdata->twelve_digit_number;
												if(!empty($memberdata->saletax)){
													$saletax = str_split($memberdata->saletax);
													for ($i=0; $i < 8; $i++) { 

														if(count($saletax) > $i){ ?>
															
															<input type="text" class="w_5 center border_input" maxlength="1" value="<?php echo $saletax[$i]; ?>">

													<?php }else{ ?>
															<input type="text" class="w_5 center border_input" maxlength="1">
													<?php }
												 	}
												}else{
													for ($i=0; $i < 8; $i++) { ?>
														<input type="text" class="w_5 center border_input" maxlength="1">
												<?php } 
												}
											?>
										</td>
									</tr>
									<tr>
										<td colspan="2">Full Legal Name or Business Name and Address: </td>
									</tr>
									<tr>
										<td colspan="2">
											<input type="text" class="w_100 input d_block" value='<?php echo $memberdata->company_name; ?>'>
											<input type="text" class="w_100 input d_block" value='<?php echo $memberdata->address; ?>'>
											<input type="text" class="w_100 input d_block" value='<?php echo $memberdata->city; ?> <?php echo $memberdata->state; ?> <?php echo $memberdata->zip; ?>'>
										</td>
									</tr>
									<tr>
										<td colspan="2">If Georgia Seller, County Name: <input type="text" class="input w_60 f_right"></td>
									</tr>
									<tr>
										<td colspan="2">Directly Financed Dealer Sale: <input type="checkbox"> Yes <input type="checkbox"> No </td>
									</tr>
								</table>
							</td>
							<td width="50%" valign="top" style="border: 1px solid;padding: 5px 0;">
								<table>
									<tr>
										<td colspan="2">Driver's License # (If individual): <input type="text" class="input w_60 f_right"></td>
									</tr>
									<tr>
										<td colspan="2">Lessee's Full Legal Name & Address or Business Lessee's Full Name & Address: </td>
									</tr>
									<tr>
										<td colspan="2">
											<input type="text" class="w_100 input d_block">
											<input type="text" class="w_100 input d_block">
											<input type="text" class="w_100 input d_block">
										</td>
									</tr>
									<tr>
										<td colspan="2">Lessee's GA County Name: <input type="text" class="input w_60 f_right"></td>
									</tr>
									<tr>
										<td colspan="2">Lessee's Phone Number: <input type="text" class="input w_60 f_right"></td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td>
					<table class="btaxtitle_title_table">
						<tr>
							<td width="5%" style="background: #797878;color: #fff;padding-left: 5px;margin-top: 10px;" class="center">E</td>
							<td width="95%" style="background: #797878;color: #fff;padding-left: 5px;margin-top: 10px;">SECURITY INTEREST OR LIENHOLDER INFORMATION - Attach any information on additional lienholders. </td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td>
					<table class="btaxtitle_table_2">
						<tr>
							<td width="50%">
								12-Digit ELT ID #: 
								<input type="text" class="w_5 center border_input">
								<input type="text" class="w_5 center border_input">
								<input type="text" class="w_5 center border_input">
								<input type="text" class="w_5 center border_input">
								<input type="text" class="w_5 center border_input">
								<input type="text" class="w_5 center border_input">
								<input type="text" class="w_5 center border_input">
								<input type="text" class="w_5 center border_input">
								<input type="text" class="w_5 center border_input">
								<input type="text" class="w_5 center border_input">
								<input type="text" class="w_5 center border_input">
							</td>
							<td>
								Name: <input type="text" class="input w_90 f_right" value='<?php //echo $memberdata->company_name; ?>'>
							</td>
						</tr>
						<tr>
							<td colspan="2">Address: <input type="text" class="input w_94 f_right" value="<?php //echo $memberdata->address; ?> <?php //echo $memberdata->city; ?> <?php //echo $memberdata->state; ?> <?php //echo $memberdata->zip; ?>"></td>
						</tr>
						<tr>
							<td width="50%">
								12-Digit ELT ID #: 
								<input type="text" class="w_5 center border_input">
								<input type="text" class="w_5 center border_input">
								<input type="text" class="w_5 center border_input">
								<input type="text" class="w_5 center border_input">
								<input type="text" class="w_5 center border_input">
								<input type="text" class="w_5 center border_input">
								<input type="text" class="w_5 center border_input">
								<input type="text" class="w_5 center border_input">
								<input type="text" class="w_5 center border_input">
								<input type="text" class="w_5 center border_input">
								<input type="text" class="w_5 center border_input">
							</td>
							<td>
								Name: <input type="text" class="input w_90 f_right">
							</td>
						</tr>
						<tr>
							<td colspan="2">Address: <input type="text" class="input w_94 f_right"></td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td>
					<table class="btaxtitle_title_table">
						<tr>
							<td width="5%" style="background: #797878;color: #fff;padding-left: 5px;margin-top: 10px;" class="center">F</td>
							<td width="95%" style="background: #797878;color: #fff;padding-left: 5px;margin-top: 10px;">ATTORNEY-IN-FACT INFORMATION - Attach original Power of Attorney if title is to be mailed to attorney-in-fact.</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td>
					<table class="btaxtitle_table_2">
						<tr>
							<td colspan="2">Name: <input type="text" class="input w_94 f_right"></td>
						</tr>
						<tr>
							<td colspan="2">Mailing Address: <input type="text" class="input w_89 f_right"></td>
						</tr>
						<tr>
							<td width="50%">Phone Number: <input type="text" class="input w_80 f_right"></td>
							<td width="50%">E-mail Address: <input type="text" class="input w_80 f_right"></td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
		<div style='page-break-before:always'>&nbsp;</div>
	</body>
</html>