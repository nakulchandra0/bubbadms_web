<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,700;1,500&display=swap" rel="stylesheet">
		<style type="text/css">
			@media print{.container {width: 1060px !important;}.tnc_p{font-size: 15px !important;line-height: 1.2 !important}}body{font-family: 'Montserrat', sans-serif;;font-size: 16px;line-height: 1.7}.buyersguide_table {width: 1067px;margin: 0 auto;position: relative;}.center{text-align: center;}.title_border{border: 2px solid #000;padding: 10px 20px;display: inline-block;}input.input {border: none;border-bottom: 1px solid #000;padding: 5px;font-size: 15px;}input.input:focus {outline: none;}table {width: 100%;padding: 20px 0;}.w_10 {width: 10%;}.w_20 {width: 20%;}.w_30 {width: 30%;}.w_40 {width: 40%;} .w_50 {width: 50%;} .w_60 {width: 60%;} .w_70{width: 70%;} .w_80{width: 80%;} .w_90{width: 90%}.w_100{width: 100%;}.d_block{display: block;}.p_label {margin-top: 0;}.m_auto{margin: auto;}p {margin-bottom: 0;line-height: 1.5;}.buyersguide_table {border: 1px solid;padding: 0 40px 20px;display: block;}.warranties_check {width: 30px;height: 30px;}.w_5 {width: 5%}.no_p{padding: 0 !important;}label.warranties_label h1 {line-height: 1;margin-bottom: 0;}label.dealerwarranties_label {max-width: 98%;font-weight: 100;}.dealerwarranties_check {vertical-align: top;}.buyersguide_textarea {width: 100%;height: 250px;border: none;resize: none;}.nondealerwarranties_check{vertical-align:top}.nondealerwarranties_label{font-weight:100;max-width:98%}.small_p {line-height: 1.4;font-size: 90%;}.buyersguide_table_4 td{border-top:1px solid}input.input.no_border{border:none}.buyersguide_table_4 td:last-child{border-bottom:1px solid}.buyersguide_table_5 {width: 70%;margin: 0 auto;}
		</style>
	</head>
	<body>
		<table class="buyersguide_table">
			<tr>
				<td class="center">
					<h1><b>BUYERS GUIDE</b></h1>
				</td>
			</tr>
			<tr>
				<td style="margin-top: 10px;display: block;border-top: 1px solid;padding: 0 10px;"><b>IMPORTANT:</b> Spoken promises are difficult to enforce. Ask the dealer to put all promises in writing. Keep this form.</td>
			</tr>
			<tr>
				<td>
					<table class="buyersguide_table_1">
						<tr>
							<td class="20%">
								<input type="text" readonly="" class="input d_block w_100" value="<?php echo $inventory_data->inv_make; ?>">
								<small>VEHICLE MAKE</small>
							</td>
							<td class="20%">
								<input type="text" readonly="" class="input d_block w_100" value="<?php echo $inventory_data->inv_model; ?>">
								<small>MODEL</small>
							</td>
							<td class="20%">
								<input type="text" readonly="" class="input d_block w_100" value="<?php echo $inventory_data->inv_year; ?>">
								<small>YEAR</small>
							</td>
							<td class="40%">
								<input type="text" readonly="" class="input d_block w_100" value="<?php echo $inventory_data->inv_vin; ?>">
								<small>VEHICLE IDENTIFICATION NUMBER (VIN)</small>
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td style="border-bottom: 2px solid;">
					<h4><b>WARRANTIES FOR THIS VEHICLE:</b></h4>
				</td>
			</tr>
			<tr>
				<td>
					<div>
						<input type="checkbox" id="warranties_1" name="warranties" value="warranties" class="warranties_check">
						<label for="warranties_1" class="warranties_label"><h1><b>AS IS - NO DEALER WARRANTY</b></h1></label>
						<p style="margin-left: 30px;">THE DEALER DOES NOT PROVIDE A WARRANTY FOR ANY REPAIRS AFTER SALE.</p>
					</div>
					<div>
						<input type="checkbox" id="warranties_2" name="warranties" value="warranties" class="warranties_check">
						<label for="warranties_2" class="warranties_label"><h1><b>DEALER WARRANTY</b></h1></label>
						<div style="margin-left: 30px;">
							<input type="checkbox" id="dealerwarranties_1" name="dealerwarranties" value="dealerwarranties" class="dealerwarranties_check">
							<label for="dealerwarranties_1" class="dealerwarranties_label">FULL WARRANTY.</label>
						</div>
						<div style="margin-left: 30px;">
							<input type="checkbox" id="dealerwarranties_2" name="dealerwarranties" value="dealerwarranties" class="dealerwarranties_check">
							<label for="dealerwarranties_2" class="dealerwarranties_label">LIMITED WARRANTY. The dealer will pay <input type="text" class="input w_5 no_p" value="0.00"> % of the labor and <input type="text" class="input w_5 no_p" value="0.00"> % of the parts for thecovered systems that fail during the warranty period. Ask the dealer for a copy of the warranty, and for any documents that explain warranty coverage, exclusions, and the dealer's repair obligations. Implied warranties under your state's laws may give you additional rights.</label>
						</div>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<table class="buyersguide_table_2">
						<tr>
							<td width="50%">
								<b>SYSTEMS COVERED:</b>
								<textarea class="buyersguide_textarea"></textarea>
							</td>
							<td width="50%">
								<b>DURATION:</b>
								<textarea class="buyersguide_textarea"></textarea>
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td style="border-bottom: 2px solid;">
					<h4><b>NON-DEALER WARRANTIES FOR THIS VEHICLE:</b></h4>
				</td>
			</tr>
			<tr>
				<td>
					<div>
						<input type="checkbox" id="nondealerwarranties_1" name="nondealerwarranties" value="nondealerwarranties" class="nondealerwarranties_check">
						<label for="nondealerwarranties_1" class="nondealerwarranties_label">MANUFACTURER'S WARRANTY STILL APPLIES. The manufacturer's original warranty has not expired on some components of the vehicle.</label>
					</div>
					<div>
						<input type="checkbox" id="nondealerwarranties_2" name="nondealerwarranties" value="nondealerwarranties" class="nondealerwarranties_check">
						<label for="nondealerwarranties_2" class="nondealerwarranties_label">MANUFACTURER'S USED VEHICLE WARRANTY APPLIES.</label>
					</div>
					<div>
						<input type="checkbox" id="nondealerwarranties_3" name="nondealerwarranties" value="nondealerwarranties" class="nondealerwarranties_check">
						<label for="nondealerwarranties_3" class="nondealerwarranties_label">OTHER USED VEHICLE WARRANTY APPLIES.</label>
					</div>
				</td>
			</tr>
			<tr>
				<td style="border-bottom: 1px solid;"><small>Ask the dealer for a copy of the warranty document and an explanation of warranty coverage, exclusions, and repair obligations.</small></td>
			</tr>
			<tr>
				<td style="border-bottom: 2px solid;">
					<div>
						<input type="checkbox" id="nondealerwarranties_2" name="nondealerwarranties" value="nondealerwarranties" class="nondealerwarranties_check">
						<label for="nondealerwarranties_2" class="nondealerwarranties_label">SERVICE CONTRACT. A service contract on this vehicle is available for an extra charge. Ask for details about coverage, deductible, price, and exclusions. If you buy a service contract within 90 days of your purchase of this vehicle, implied warranties under your state's laws may give you additional rights.</label>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<p style="margin-top: 15px;"><b>ASK THE DEALER IF YOUR MECHANIC CAN INSPECT THE VEHICLE ON OR OFF THE LOT</b></p>
					<p style="margin-top: 15px;"><b>OBTAIN A VEHICLE HISTORY REPORT AND CHECK FOR OPEN SAFETY RECALLS</b>For information on how to obtain a vehicle history report, visit ftc.gov/usedcars. To check for open safety recalls, visit safercar.gov. You will need the vehicle identification number (VIN) shown above to make the best use of the resources on these sites.</p>
					<p style="margin-top: 15px;"><b>SEE OTHER SIDE for important additional information, including a list of major defects that may occur in used motor vehicles</b></p>
					<p style="margin-top: 15px;"><b>Si el concesionario gestiona la venta en español, pídale una copia de la Guía del Comprador en español.</b></p>
				</td>
			</tr>
		</table>
		<div style="page-break-before:always">&nbsp;</div>
		<table class="buyersguide_table">
			<tr>
				<td style="margin-top: 30px;display: block;"><small>Here is a list of some major defects that may occur in used vehicles</small></td>
			</tr>
			<tr>
				<td>
					<table class="buyersguide_table_3">
						<tr>
							<td width="33%" valign="top">
								<p class="small_p"><b>Frame & Body</b></p>
								<p class="small_p" style="margin-left: 10px;">Frame-cracks, corrective welds, or rusted through</p>
								<p class="small_p" style="margin-left: 10px;">Dog tracks-bent or twisted frame</p>
								<p class="small_p"><b>Engine</b></p>
								<p class="small_p" style="margin-left: 10px;">Oil leakage, excluding normal seepage Cracked block or head</p>
								<p class="small_p" style="margin-left: 10px;">Belts missing or inoperable</p>
								<p class="small_p" style="margin-left: 10px;">Knocks or misses related to camshaft</p>
								<p class="small_p" style="margin-left: 10px;">lifters and push rods</p>
								<p class="small_p" style="margin-left: 10px;">Abnormal exhaust discharge</p>
								<p class="small_p"><b>Transmission & Drive Shaft</b></p>
								<p class="small_p" style="margin-left: 10px;">Improper fluid level or leakage, excluding normal seepage</p>
								<p class="small_p" style="margin-left: 10px;">Cracked or damaged case which is visible</p>
								<p class="small_p" style="margin-left: 10px;">Abnormal noise or vibration caused by faulty transmission or drive shaft</p>
								<p class="small_p" style="margin-left: 10px;">Improper shifting or functioning in any gear</p>
								<p class="small_p" style="margin-left: 10px;">Manual clutch slips or chatters</p>
								<p class="small_p"><b>Differential</b></p>
								<p class="small_p" style="margin-left: 10px;">Improper fluid level or leakage, excluding normal seepage</p>
								<p class="small_p" style="margin-left: 10px;">Cracked or damaged housing which is visible</p>
								<p class="small_p" style="margin-left: 10px;">Abnormal noise or vibration caused by faulty differential</p>
							</td>
							<td width="33%" valign="top">
								<p class="small_p"><b>Cooling System</b></p>
								<p class="small_p" style="margin-left: 10px;">Leakage including radiator</p>
								<p class="small_p" style="margin-left: 10px;">Improperly functioning water pump</p>
								<p class="small_p"><b>Electrical System</b></p>
								<p class="small_p" style="margin-left: 10px;">Battery leakage</p>
								<p class="small_p" style="margin-left: 10px;">Improperly functioning alternator, generator, battery, or starter</p>
								<p class="small_p"><b>Fuel System</b></p>
								<p class="small_p" style="margin-left: 10px;">Visible leakage</p>
								<p class="small_p"><b>Inoperable Accessories</b></p>
								<p class="small_p" style="margin-left: 10px;">Gauges or warning devices</p>
								<p class="small_p" style="margin-left: 10px;">Air conditioner</p>
								<p class="small_p" style="margin-left: 10px;">Heater & Defroster</p>
								<p class="small_p"><b>Brake System</b></p>
								<p class="small_p" style="margin-left: 10px;">Failure warning light broken</p>
								<p class="small_p" style="margin-left: 10px;">Pedal not firm under pressure (DOT spec.)</p>
								<p class="small_p" style="margin-left: 10px;">Not enough pedal reserve (DOT spec.)</p>
								<p class="small_p" style="margin-left: 10px;">Does not stop vehicle in straight line (DOT spec.)</p>
								<p class="small_p" style="margin-left: 10px;">Hoses damaged</p>
								<p class="small_p" style="margin-left: 10px;">Drum or rotor too thin (Mfgr. Specs</p>
								<p class="small_p" style="margin-left: 10px;">Lining or pad thickness less than 1/32 inch</p>
								<p class="small_p" style="margin-left: 10px;">Power unit not operating or leakin</p>
								<p class="small_p" style="margin-left: 10px;">Structural or mechanical parts damaged</p>
								<p class="small_p"><b>Air Bags</b></p>
							</td>
							<td width="33%" valign="top">
								<p class="small_p"><b>Steering System</b></p>
								<p class="small_p" style="margin-left: 10px;">Too much free play at steering wheel (DOT specs.)</p>
								<p class="small_p" style="margin-left: 10px;">Free play in linkage more than 1/4 inch</p>
								<p class="small_p" style="margin-left: 10px;">Steering gear binds or jams</p>
								<p class="small_p" style="margin-left: 10px;">Front wheels aligned improperly (DOT specs.)</p>
								<p class="small_p" style="margin-left: 10px;">Power unit belts cracked or slipping</p>
								<p class="small_p" style="margin-left: 10px;">Power unit fluid level improper</p>
								<p class="small_p"><b>Suspension System</b></p>
								<p class="small_p" style="margin-left: 10px;">Ball joint seals damaged</p>
								<p class="small_p" style="margin-left: 10px;">Structural parts bent or damaged</p>
								<p class="small_p" style="margin-left: 10px;">Stabilizer bar disconnected</p>
								<p class="small_p" style="margin-left: 10px;">Spring broken</p>
								<p class="small_p" style="margin-left: 10px;">Shock absorber mounting loose</p>
								<p class="small_p" style="margin-left: 10px;">Rubber bushings damaged or missing</p>
								<p class="small_p" style="margin-left: 10px;">Radius rod damaged or missing</p>
								<p class="small_p" style="margin-left: 10px;">Shock absorber leaking or functioning improperly</p>
								<p class="small_p"><b>Tires</b></p>
								<p class="small_p" style="margin-left: 10px;">Tread depth less than 2/32 inch</p>
								<p class="small_p" style="margin-left: 10px;">Sizes mismatched</p>
								<p class="small_p" style="margin-left: 10px;">Visible damage</p>
								<p class="small_p"><b>Wheels</b></p>
								<p class="small_p" style="margin-left: 10px;">Visible cracks, damage or repairs</p>
								<p class="small_p" style="margin-left: 10px;">Mounting bolts loose or missing</p>
								<p class="small_p"><b>Exhaust System</b></p>
								<p class="small_p" style="margin-left: 10px;">Leakage</p>
								<p class="small_p" style="margin-left: 10px;">Catalytic Converter</p>
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td>
					<table class="buyersguide_table_4">
						<tr>
							<td width="100%" colspan="2">
								<small>DEALER NAME</small>
								<input type="text" readonly="" class="input w_100 no_border" value="<?php echo $memberdata->company_name; ?>">
							</td>
						</tr>
						<tr>
							<td width="100%" colspan="2">
								<small>ADDRESS</small>
								<input type="text" readonly="" class="input w_100 no_border" value="<?php echo $memberdata->address; ?>">
							</td>
						</tr>
						<tr>
							<td width="50%">
								<small>TELEPHONE</small>
								<input type="text" readonly="" class="input w_100 no_border" value="<?php echo $memberdata->phone; ?>">
							</td>
							<td width="50%">
								<small>EMAIL</small>
								<input type="text" readonly="" class="input w_100 no_border" value="<?php echo $memberdata->email; ?>">
							</td>
						</tr>
						<tr>
							<td width="100%" colspan="2">
								<small>FOR COMPLAINTS AFTER SALE, CONTACT:</small>
								<input type="text" readonly="" class="input w_100 no_border">
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr class="center">
				<td>I hereby acknowledge receipt of the Buyers Guide at the closing of this sale.</td>
			</tr>
			<tr>
				<td>
					<table class="buyersguide_table_5">
						<tr>
							<td width="80%">
								<input type="text" readonly="" class="input w_100">
								<small>SIGNATURE</small>
							</td>
							<td width="20%" valign="top">
								<input type="text" readonly="" class="input w_100" value="<?php echo date('Y-m-d',strtotime($date)); ?>">
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td style="border-top: 2px solid;margin: 20px 0;display: block;padding: 10px 0;">
					<b>IMPORTANT:</b> The information on this form is part of any contract to buy this vehicle. Removing this label before consumer purchase (except for purpose of test-driving) violates federal law (16 C.F.R. 455).
				</td>
			</tr>
		</table>
		<div style="page-break-before:always">&nbsp;</div>
	</body>
</html>