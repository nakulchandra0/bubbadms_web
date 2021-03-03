<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,700;1,500&display=swap" rel="stylesheet">
		<style type="text/css">
			.we_owe_table {width: 100%;margin: 0 auto;position: relative;}.center{text-align: center;}.title_border{border: 2px solid #000;padding: 10px 20px;display: inline-block;}.we_owe_table input.input {border: none;border-bottom: 1px solid #000;padding: 1px 5px;}input.input:focus {outline: none;}.we_owe_title_table .w_5{width: 5%}.we_owe_title_table .w_10 {width: 10%;}.we_owe_title_table .w_20 {width: 20%;}.we_owe_title_table .w_30 {width: 30%;}.we_owe_title_table .w_40 {width: 40%;} .we_owe_title_table .w_50 {width: 50%;} .we_owe_title_table .w_55{width: 55%} .we_owe_title_table .w_60 {width: 60%;} .we_owe_title_table .w_70{width: 70%;} .we_owe_title_table .w_80{width: 80%;} .we_owe_title_table .w_90{width: 90%}.we_owe_title_table .w_94{width: 94%}.we_owe_title_table .w_89{width: 89%}.we_owe_title_table .w_100{width: 100%;}.d_block{display: block;}.p_label {margin-top: 0;}p {margin-bottom: 0;line-height: 1.5;}.m_auto{margin: auto;}.we_owe_title_table,.we_owe_title_table td{border: 1px solid #000;}.f_right{float: right;}textarea.textarea {width: 100%;height: 150px;resize: none;border: none;}.no_b{border: none;}.border{border: 1px solid #000;}table.we_owe_table_2 td {border: 1px solid;padding: 5px;}table.we_owe_table_2 {margin-top: 20px;}
		</style>
	</head>
	<body>
		<table class="we_owe_table">
			<tr>
				<td>
					<table class="we_owe_table_1">
						<tr>
							<td width="50%">
								<textarea class="textarea"></textarea>
							</td>
							<td width="50%">
								<h1 class="f_right"><b>WE OWE</b></h1>
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td>
					<table class="we_owe_table_1">
						<tr>
							<td width="50%">
								<p><b>Buyer</b></p>
							</td>
							<td width="50%">
								<p><b>Co-Buyer</b></p>
							</td>
						</tr>
						<tr>
							<td width="50%" class="border" style="padding: 0 10px;">
								<small>NAME</small>
								<input type="text" class="d_block w_100 no_b" value="<?php echo $buyers_data->buyers_first_name; ?> <?php echo $buyers_data->buyers_mid_name; ?> <?php echo $buyers_data->buyers_last_name; ?>">
							</td>
							<td width="50%" class="border" style="padding: 0 10px;">
								<small>NAME</small>
								<input type="text" class="d_block w_100 no_b" value="<?php echo $buyers_data->co_buyers_first_name; ?> <?php echo $buyers_data->co_buyers_mid_name; ?> <?php echo $buyers_data->co_buyers_last_name; ?>">
							</td>
						</tr>
						<tr>
							<td width="50%" class="border" style="padding: 0 10px;">
								<small>STREET</small>
								<input type="text" class="d_block w_100 no_b" value='<?php echo $buyers_data->buyers_address; ?>'>
							</td>
							<td width="50%" class="border" style="padding: 0 10px;">
								<small>STREET</small>
								<input type="text" class="d_block w_100 no_b" value='<?php echo $buyers_data->co_buyers_address; ?>'>
							</td>
						</tr>
						<tr>
							<td width="50%" class="border" style="padding: 0 10px;">
								<small>CITY, STATE, ZIP</small>
								<input type="text" class="d_block w_100 no_b" value="<?php echo $buyers_data->buyers_city; ?> <?php echo $buyers_data->buyers_state; ?> <?php echo $buyers_data->buyers_zip; ?>">
							</td>
							<td width="50%" class="border" style="padding: 0 10px;">
								<small>CITY, STATE, ZIP</small>
								<input type="text" class="d_block w_100 no_b" value="<?php echo $buyers_data->co_buyers_city; ?> <?php echo $buyers_data->co_buyers_state; ?> <?php echo $buyers_data->co_buyers_zip; ?>">
							</td>
						</tr>

					</table>
				</td>
			</tr>
			<tr>
				<td>
					<table class="we_owe_table_1" style="margin-top: 20px;">
						<tr>
							<td>
								<p><b>Vehical</b></p>
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td>
					<table class="we_owe_table_1">
						<tr>
							<td width="20%" class="border" style="padding: 0 10px;">
								<small>STOCK #</small>
								<input type="text" class="d_block w_100 no_b" value="<?php echo $inventory_data->inv_stock; ?>">
							</td>
							<td width="20%" class="border" style="padding: 0 10px;">
								<small>YEAR</small>
								<input type="text" class="d_block w_100 no_b" value="<?php echo $inventory_data->inv_year; ?>">
							</td>
							<td width="30%" class="border" style="padding: 0 10px;">
								<small>MAKE</small>
								<input type="text" class="d_block w_100 no_b" value="<?php echo $inventory_data->inv_make; ?>">
							</td>
							<td width="30%" class="border" style="padding: 0 10px;">
								<small>MODEL</small>
								<input type="text" class="d_block w_100 no_b" value="<?php echo $inventory_data->inv_model; ?>">
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td>
					<table class="we_owe_table_1">
						<tr>
							<td width="40%" class="border" style="padding: 0 10px;">
								<small>VEHICLE IDENTIFICATION NUMBER</small>
								<input type="text" class="d_block w_100 no_b" value="<?php echo $inventory_data->inv_vin; ?>">
							</td>
							<td width="20%" class="border" style="padding: 0 10px;">
								<small>MILEAGE</small>
								<input type="text" class="d_block w_100 no_b" value="<?php echo $inventory_data->inv_mileage; ?>">
							</td>
							<td width="20%" class="border" style="padding: 0 10px;">
								<small>SALESPERSON</small>
								<input type="text" class="d_block w_100 no_b">
							</td>
							<td width="20%" class="border" style="padding: 0 10px;">
								<small>DATE OF DELIVERY</small>
								<input type="text" class="d_block w_100 no_b" value="<?php echo $date; ?>">
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td>
					<table class="we_owe_table_2">
						<tr>
							<td width="10%" class="center">QTY</td>
							<td width="40%" class="center">ITEM</td>
							<td width="25%" class="center">PART</td>
							<td width="25%" class="center">LABOR</td>
						</tr>
						<tr>
							<td width="10%"><input type="text" class="d_block w_100 no_b"></td>
							<td width="40%"><input type="text" class="d_block w_100 no_b"></td>
							<td width="25%"><input type="text" class="d_block w_100 no_b"></td>
							<td width="25%"><input type="text" class="d_block w_100 no_b"></td>
						</tr>
						<tr>
							<td width="10%"><input type="text" class="d_block w_100 no_b"></td>
							<td width="40%"><input type="text" class="d_block w_100 no_b"></td>
							<td width="25%"><input type="text" class="d_block w_100 no_b"></td>
							<td width="25%"><input type="text" class="d_block w_100 no_b"></td>
						</tr>
						<tr>
							<td width="10%"><input type="text" class="d_block w_100 no_b"></td>
							<td width="40%"><input type="text" class="d_block w_100 no_b"></td>
							<td width="25%"><input type="text" class="d_block w_100 no_b"></td>
							<td width="25%"><input type="text" class="d_block w_100 no_b"></td>
						</tr>
						<tr>
							<td width="10%"><input type="text" class="d_block w_100 no_b"></td>
							<td width="40%"><input type="text" class="d_block w_100 no_b"></td>
							<td width="25%"><input type="text" class="d_block w_100 no_b"></td>
							<td width="25%"><input type="text" class="d_block w_100 no_b"></td>
						</tr>
						<tr>
							<td width="10%"><input type="text" class="d_block w_100 no_b"></td>
							<td width="40%"><input type="text" class="d_block w_100 no_b"></td>
							<td width="25%"><input type="text" class="d_block w_100 no_b"></td>
							<td width="25%"><input type="text" class="d_block w_100 no_b"></td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td>
					<table class="we_owe_table_3" style="margin-top: 30px;">
						<tr>
							<td width="45%">
								<p style="text-align: justify;">
									<small>I hereby accept this <b>WE OWE</b> with the understanding that it is valid for only <b>THIRTY (30) DAYS</b> from the date the We Owe is signed by the authorized dealership representative, and that I must make an <b>ADVANCE APPOINTMENT WITH THE SERVICE DEPARTMENT</b> before the above work can be performed.<br><br><b>(FOR APPOINTMENT, CALL SERVICE DEPARTMENT)</b></small>
								</p>
							</td>
							<td width="10%"></td>
							<td width="45%">
								<table class="we_owe_table_3">
									<tr>
										<td width="75%">
											<input type="text" class="input d_block w_100">
											<small>Buyer</small>
										</td>
										<td width="75%">
											<input type="text" class="input d_block w_100" value="<?php echo $date; ?>">
											<small>Date</small>
										</td>
									</tr>
									<tr>
										<td width="75%">
											<input type="text" class="input d_block w_100">
											<small>Co-Buyer</small>
										</td>
										<td width="75%">
											<input type="text" class="input d_block w_100" value="<?php echo $date; ?>">
											<small>Date</small>
										</td>
									</tr>
									<tr>
										<td width="75%">
											<input type="text" class="input d_block w_100">
											<small>Authorized Dealership Representative</small>
										</td>
										<td width="75%">
											<input type="text" class="input d_block w_100" value="<?php echo $date; ?>">
											<small>Date</small>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
	</body>
</html>