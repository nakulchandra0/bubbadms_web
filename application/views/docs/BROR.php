<!DOCTYPE html>
<html>
<head>
	<title></title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <style type="text/css">
        @media only screen and (min-width: 1900px){.input_35{height: 39px}}@media print{.container {width: 1060px !important;}.tnc_p{font-size: 15px !important;line-height: 1.2 !important}}body{font-family: 'Lato', sans-serif;font-size: 16px;line-height: 1.4}.container{width: 75%}.title{text-align: center;padding: 10px 0}.title_1{font-size: 13px;float: left}.title_2{font-size: 30px;font-weight: 900}input{border-top: 0;border-right: 0;border-left: 0;border-bottom: 1px solid}.main_tb{margin-top: 5px}.sub_tb_1{border-top: 2px solid;border-right: 2px solid}.sub_tb_2{border-top: 2px solid;border-left: 2px solid}.info_tb_1{border-top: 2px solid;padding-top: 1px;padding-right: 1px;padding-bottom: 1px}.info_tb_2{border-top: 2px solid;padding-top: 1px;padding-left: 1px;padding-bottom: 1px}.sub_tb_1 td{padding-right: 5px}.sub_tb_2 td{padding-left: 5px}.input_1{width: 93%}.input_2{width: 91%}.input_3{width: 38%}.input_4{width: 10%}.input_5{width: 10%}.input_6{width: 21%}.input_9{width: 37%}.input_10{width: 87%}.input_11{width: 85%}.input_12{width: 74%}.input_13{width: 83%}.input_14{width: 91%}.input_15{width: 81%}.input_16{width: 83%}.input_17{width: 75%}.input_18{width: 71%}.input_19{width: 77%}.input_20{width: 81%}.td_bg{background-color: #000 !important;text-align: center;font-size: 20px;color: #fff !important}.v_info input{width: 100%;text-align: center}.v_info{text-align: center}.v_info_1{width: 5%}.v_info_2{width: 10%}.v_info_3{width: 15%}.v_info_4{width: 8%}.v_info_5{width: 4%}.v_info_6{width: 17%}.v_info_7{width: 3%}.dec_tb_1{font-size: 15px}.dec_tb_1 td{padding:0 10px}.dec_tb_1 tr{border: 1px solid}.dec_tb_1 input{border: 0}.input_21{width: 81%}.input_22{width: 79%}.input_23{width: 74%}.input_24{width: 69%}.input_25{width: 59%}.input_26{width: 75%}.input_27{width: 86%}.input_28{width: 32%}.input_29{width: 43%}.input_30{width: 68%}.input_31{width: 87%}.input_32{width: 81%}.input_33{width: 64%}.input_34{width: 67%}.input_35{width: 100%;height: 34px}.td_sub td{padding: 0}.td_sub tr{border: 0}.td_sub_ce{text-align: center}.td_sub_bo_l{border-left: 1px solid}.total .td_1{padding: 0 10px}.total .td_2{padding: 0 0px 0 2px}.total .td_2 input{ text-align: right }.total{border: 1px solid #000;font-size: 15px}.total td{border: 1px solid #000}.total input{border-left: 1px solid;border-bottom: 0;width: 100%}.st{padding-left: 7%}.no_b input{border-left: 0;border-bottom: 1px solid;height: 13px;width: 45%}.bg_{background-color: #000 !important;width: 100%}.small_t{font-size: 14px}.td_1 textarea{width: 100%;border: none}.total .input_36{width: 64%;border-left: 0}.total .input_37{width: 87%;border-left: 0}.total .input_38{width: 81%;border-left: 0}.total .input_39{width: 42%;border-left: 0}.total .input_40{width: 32%;border-left: 0}.text_bo{font-size: 16px;text-align: justify}.sign_td{padding-right: 5px}.sign_td1{padding-left: 5px}.input_41{width: 76%}.input_42{width: 74%}.input_43{width: 69%}.input_44{width: 71%}.input_45{width: 56%}.tnc{font-size: 20px;text-decoration: underline;font-weight: 900;text-align: center;padding: 20px 0;margin-top: 30px}.tnc_p{text-align: justify}.input_46{width: 30%}.sign_1 input{width: 93%;text-align: center}.sign_1_tr{font-size: 12px}.sign_1_1{width: 30px}.sign_1_2{width: 22%}.sign_2_tr{font-size: 9px;text-align: center}.hr1{margin-top: 20px;margin-bottom: 0;border: 0;border-top: 1px solid #000;width: 78%;float: right}.hr2{margin-top: 20px;margin-bottom: 0;border: 0;border-top: 1px solid #000;width: 71%;float: right}.hr3{margin-top: 20px;margin-bottom: 0;border: 0;border-top: 1px solid #000;width: 73%;float: right}@media print { .faq .space_1,#pdfview { display: none !important; } }.font_big_p {font-size: 20px;margin-bottom: 10px;font-weight: 100;}
    </style>
</head>
<body>

	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<h1 class="text-center"><b><u>RIGHT OF REPOSSESSION </u></b></h1>
				<h3 class="text-center"> <?php echo $memberdata->company_name;?><br>
                						 <?php echo $memberdata->address;?><br>
                                         <?php echo $memberdata->city; ?>, <?php echo $memberdata->state; ?> <?php echo $memberdata->zip; ?>
				</h3>
			</div>
			<div class="col-md-12 space">&nbsp;</div>
				<div class="col-md-12">
					<table class="top_info" width="100%">
					<tr>
						<td class="info_1"><b>Year:  <input id="[ID2]"  type="text" value=" <?php echo $inventory_data->inv_year; ?>" name="[NAME2]" class="fid00" autocomplete="no" min="[MIN2]" max="[MAX2]"  size="[SIZE2]"> </b></td>
						<td class="info_2"><b> Make:  <input id="[ID3]"  type="text" value=" <?php echo $inventory_data->inv_make; ?>" name="[NAME3]" class="fid00" autocomplete="no" min="[MIN3]" max="[MAX3]"  size="[SIZE3]"></b></td>
						<td class="info_3"><b> Model:  <input id="[ID4]"  type="text" value=" <?php echo $inventory_data->inv_model; ?>" name="[NAME4]" class="fid00" autocomplete="no" min="[MIN4]" max="[MAX4]"  size="[SIZE4]"></b></td>
						<td class="info_4"><b> VIN:  <input id="[ID5]"  type="text" value=" <?php echo $inventory_data->inv_vin; ?>" name="[NAME5]" class="fid00" autocomplete="no" min="[MIN5]" max="[MAX5]"  size="[SIZE5]"> </b></td>
					</tr>
				</table>
					<!--<table>
					<tr>
						<td class="info_table_td"><b>Year:</b> 2008 </td>
						<td class="info_table_td"><b> Make: </b> LEXUS </td>
						<td class="info_table_td"><b> Model: </b> ES</td>
						<td class="info_table_td"><b> VIN: </b> JTHBJ46G482200427</td>
					</tr>
				</table>-->
				<br
				<div class="main">
				<p class="font_big_p">
					I agree that in the event that I fail to make any payment, then you are authorized by me and have the right to take the vehicle back from me, without the necessity of court order or any judicial process. I further agree that if it becomes necessary for you to take the vehicle back, you are permitted to do so at any time of the day or night and may enter and remove the vehicle from my property or any other property where I may leave the vehicle, provided there is no breach of the peace.
				</p>

				<p class="font_big_p">
					 I also give you permission to use any reasonable means to open or gain entry into the vehicle without causing any undue damage in the process of taking it back.
				</p>

				<p class="font_big_p">
					I understand that should it become necessary for you to take back the vehicle and I redeem same by making full payment to you, this payment will include any of your costs for taking back the vehicle.
				</p>

				<p class="font_big_p">
					I agree that I will not keep any personal property of any great value in the vehicle during the term of this contract, but in the event I do, I assume any and all responsibility for any personal property left in the vehicle by me or by other persons, should that property be lost or missing for any reason from the vehicle after it has been taken back by you and stored in a reasonably safe place.
				</p>

				<p class="font_big_p">
					I agree that you are not required to give me notice before you take back the vehicle, and that my failure to make any payment on time according to my contract, will be my notice that you have the right to take back the vehicle.
				</p>

				<p class="font_big_p">
					I understand that I have the right to have this agreement examined by my attorney if I desire, before I sign it.
				</p>

				<p class="col-md-12 text-center">
					Given under our/my hand and seal on <input id="[ID7]" type="text" value="" name="[NAME7]" class="fid00 input_7" autocomplete="no" min="[MIN7]" max="[MAX7]"  size="[SIZE7]">
				</p>
				<br><br><br>
				</div>
				</div>
					<div class="row">
						<div class="col-md-12">
							<table class="sign_tb" width="100%">
								<tr>
									<td class="sign_tb_1"><input id="[ID6]"  type="text"  name="[NAME6]" class="fid00 last_in" autocomplete="no" min="[MIN6]" max="[MAX6]"  size="[SIZE6]"><br> <?php echo $memberdata->company_name;?></td>
									<td class="sign_tb_2"><input id="[ID7]"  type="text" name="[NAME7]" class="fid00 last_in" autocomplete="no" min="[MIN7]" max="[MAX7]"  size="[SIZE7]"><br> <?php echo $buyers_data->buyers_first_name; ?> <?php echo $buyers_data->buyers_last_name; ?></td>
								</tr>
							</table>
						</div>
						<!--<div class="col-md-6">
							<p><input id="[ID5]"  type="text" placeholder="[PH5]" name="[NAME5]" class="fid00 last_in" autocomplete="no" value="[GEORGIA AUTOGROUP, LLC.]" min="[MIN5]" max="[MAX5]"  size="[SIZE5]">GEORGIA AUTOGROUP, LLC.  </p>
						</div>

						<div class="col-md-6">
							<p><input id="[ID6]"  type="text" placeholder="[PH6]" name="[NAME6]" class="fid00 last_in" autocomplete="no" value="[RIN S]" min="[MIN6]" max="[MAX6]"  size="[SIZE6]"> RIN S  </p>
						</div>
						<div class="col-md-offset-6 col-md-6">
							<input class="last_in" type="text" name="2">
					</div>-->




		</div>
	</div>
<div style="page-break-before:always">&nbsp;</div>
</body>
</html>
