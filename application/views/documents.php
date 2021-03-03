<?php if ($calltype == 'web') { ?>

<button  id="pdfview">Click Here to Print Document</button>

<style type="text/css">
/* @media print {
    #pdfview {display: none;}
 } */
 @media print {
		 #pdfview {display: none;}
		 html, body {
			 width: 210mm;
			 height: 297mm;
		 }
 }
 @page {
	 size: A4;
	 /* margin: 0; */
 }
button#pdfview{display:block;background:#3498db;border:none;color:#fff;padding:10px 15px;font-weight:800;font-size:16px;border-radius:5px;width:auto;margin:15px auto;}
</style>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jQuery.print.min.js"></script>
<script type="text/javascript">

	$('#pdfview').click(function () {
		$('#pdfview').hide();
	  $.print(document.documentElement.outerHTML);
		$('#pdfview').show();
	});

</script>

<?php } ?>

<?php
//  echo('<pre>');
//  print_r($_POST);
//  echo $state;
// die();

if($state == "FLORIDA"){

	if(isset($_POST['chooseall'])){

		$this->load->view('docs/florida/OFAC');//

		$this->load->view('docs/florida/Billofsale');//

		$this->load->view('docs/florida/Warranty');//

		$this->load->view('docs/florida/Consent');//

		$this->load->view('docs/florida/Odometer');//

		if(!empty($trade_data->trade_inv_vin) || $trade_data->trade_inv_vin != ""){
			$this->load->view('docs/florida/Odometer_trade');//
		}

		$this->load->view('docs/florida/Attorney');//

		$this->load->view('docs/florida/APC');//

		$this->load->view('docs/florida/Scholarship');//

		$this->load->view('docs/florida/Pricing');//

		$this->load->view('docs/florida/Repossession');//

		$this->load->view('docs/florida/BuyersAgreement');//

		$this->load->view('docs/florida/ArbitrationAgreement');//

		$this->load->view('docs/florida/OdometerDisclosure');//

		$this->load->view('docs/florida/BuyersGuide');//

		$this->load->view('docs/florida/Facts');//

		$this->load->view('docs/florida/InsuranceAffidavit');//

		$this->load->view('docs/florida/InsuranceAgreement');//

		$this->load->view('docs/florida/InstallmentContract');//

		$this->load->view('docs/florida/BuyerOrder');//


	}else{

		if(isset($_POST['sd_main_readyprint_ofac_statement'])){
			$this->load->view('docs/florida/OFAC');
		}

		if(isset($_POST['sd_main_readyprint_billofsale'])){
			$this->load->view('docs/florida/Billofsale');
		}

		if(isset($_POST['sd_main_readyprint_as_is'])){
			$this->load->view('docs/florida/Warranty');
		}

		if(isset($_POST['sd_main_readyprint_customer_consent'])){
			$this->load->view('docs/florida/Consent');
		}

		if(isset($_POST['sd_main_readyprint_odometer_statement'])){
			$this->load->view('docs/florida/Odometer');
			if(!empty($trade_data->trade_inv_vin) || $trade_data->trade_inv_vin != ""){
			$this->load->view('docs/florida/Odometer_trade');//
		}
		}

		if(isset($_POST['sd_main_readyprint_power_of_attorney'])){
			$this->load->view('docs/florida/Attorney');
		}

		if(isset($_POST['sd_main_readyprint_apc'])){
			$this->load->view('docs/florida/APC');
		}

		if(isset($_POST['sd_main_readyprint_hope_scholarship_program'])){
			$this->load->view('docs/florida/Scholarship');
		}

		if(isset($_POST['sd_main_readyprint_federal_risk'])){
			$this->load->view('docs/florida/Pricing');
		}

		if(isset($_POST['sd_main_readyprint_repossession'])){
			$this->load->view('docs/florida/Repossession');
		}

		if(isset($_POST['sd_main_readyprint_buyers_agreement'])){
			$this->load->view('docs/florida/BuyersAgreement');
		}

		if(isset($_POST['sd_main_readyprint_arbitration_agreement'])){
			$this->load->view('docs/florida/ArbitrationAgreement');
		}

		if(isset($_POST['sd_main_readyprint_sep_odometer_statement'])){
			$this->load->view('docs/florida/OdometerDisclosure');
		}

		if(isset($_POST['sd_main_readyprint_buyers_guide'])){
			$this->load->view('docs/florida/BuyersGuide');
		}

		if(isset($_POST['sd_main_readyprint_facts'])){
			$this->load->view('docs/florida/Facts');
		}

		if(isset($_POST['sd_main_readyprint_insurance_affidavit'])){
			$this->load->view('docs/florida/InsuranceAffidavit');
		}

		if(isset($_POST['sd_main_readyprint_insurance_agreement'])){
			$this->load->view('docs/florida/InsuranceAgreement');
		}

		if(isset($_POST['sd_main_readyprint_installment_contract'])){
			$this->load->view('docs/florida/InstallmentContract');
		}

		if(isset($_POST['sd_main_readyprint_buyers_order'])){
			$this->load->view('docs/florida/BuyerOrder');
		}

	}
}elseif($state == "TEXAS"){

  	if(isset($_POST['chooseall'])){

  		$this->load->view('docs/texas/application_for_texas_title_registration');

  		$this->load->view('docs/texas/billofsales');

  		$this->load->view('docs/texas/retail_installments_sales_contract');

  		$this->load->view('docs/texas/power_of_attorney');

  		$this->load->view('docs/texas/buyers_guide');

  		$this->load->view('docs/texas/vehicle_purchase_loan_payment_schedule');

  		$this->load->view('docs/texas/agreement_to_arbitrate');

  		$this->load->view('docs/texas/credit_reporting_disclosure');

  		$this->load->view('docs/texas/facts');

  		$this->load->view('docs/texas/disclosure_on_airbags.php');

  		$this->load->view('docs/texas/release_agreement');

  		$this->load->view('docs/texas/odometer_disclosure_statement');

  		$this->load->view('docs/texas/agreement_to_provide_insurance');

  		$this->load->view('docs/texas/county_of_title_issuance');

  		$this->load->view('docs/texas/authorization_letter');

  		$this->load->view('docs/texas/electronic_payment_authorization');

  		$this->load->view('docs/texas/do_not_sign_this_paper_until_fully_read');

  		$this->load->view('docs/texas/receipt_for_down_payment');

  		$this->load->view('docs/texas/customer_information');


  	}else{

  		if(isset($_POST['sd_main_readyprint_app_title_registration'])){
        $this->load->view('docs/texas/application_for_texas_title_registration');//
  		}
      if(isset($_POST['sd_main_readyprint_billofsale'])){
  		    $this->load->view('docs/texas/billofsales');
      }
      if(isset($_POST['sd_main_readyprint_installment_contract'])){
  		    $this->load->view('docs/texas/retail_installments_sales_contract');//
      }
      if(isset($_POST['sd_main_readyprint_power_of_attorney'])){
  		    $this->load->view('docs/texas/power_of_attorney');//
      }
      if(isset($_POST['sd_main_readyprint_buyers_guide'])){
  		    $this->load->view('docs/texas/buyers_guide');//
      }
      if(isset($_POST['sd_main_readyprint_loan_payment_schedule'])){
  		    $this->load->view('docs/texas/vehicle_purchase_loan_payment_schedule');//
      }
      if(isset($_POST['sd_main_readyprint_arbitration_agreement'])){
  		    $this->load->view('docs/texas/agreement_to_arbitrate');//
      }
      if(isset($_POST['sd_main_readyprint_credit_reporting_disclosure'])){
  		    $this->load->view('docs/texas/credit_reporting_disclosure');//
      }
      if(isset($_POST['sd_main_readyprint_facts'])){
  		    $this->load->view('docs/texas/facts');//
      }
      if(isset($_POST['sd_main_readyprint_airbags'])){
  		    $this->load->view('docs/texas/disclosure_on_airbags.php');//
      }
      if(isset($_POST['sd_main_readyprint_release_agreement'])){
  		    $this->load->view('docs/texas/release_agreement');//
      }
      if(isset($_POST['sd_main_readyprint_odometer_statement'])){
  		    $this->load->view('docs/texas/odometer_disclosure_statement');//
      }
      if(isset($_POST['sd_main_readyprint_api'])){
  		    $this->load->view('docs/texas/agreement_to_provide_insurance');//
      }
      if(isset($_POST['sd_main_readyprint_country_title_issurance'])){
  		    $this->load->view('docs/texas/county_of_title_issuance');//
      }
      if(isset($_POST['sd_main_readyprint_authorization_letter'])){
  		    $this->load->view('docs/texas/authorization_letter');//
      }
      if(isset($_POST['sd_main_readyprint_electronic_payment_authorization'])){
  		    $this->load->view('docs/texas/electronic_payment_authorization');//
      }
      if(isset($_POST['sd_main_readyprint_do_not_sign'])){
  		    $this->load->view('docs/texas/do_not_sign_this_paper_until_fully_read');//
      }
      if(isset($_POST['sd_main_readyprint_receipt_downpayment'])){
  		    $this->load->view('docs/texas/receipt_for_down_payment');//
      }
      if(isset($_POST['sd_main_readyprint_buyer_information'])){
  		    $this->load->view('docs/texas/customer_information');//
      }
  	}

}else{


	if(isset($_POST['chooseall'])){

		$this->load->view('docs/Bbillofsale');//

		$this->load->view('docs/Btaxtitle');//

		$this->load->view('docs/InstallmentContract');//copy of BHPH Contract

		$this->load->view('docs/Bodometerdisclosure');//

		if(!empty($trade_data->trade_inv_vin) || $trade_data->trade_inv_vin != ""){

			$this->load->view('docs/Bodometerdisclosure_trade');//
		}

		$this->load->view('docs/BuyersGuide');//

		$this->load->view('docs/BCertificateExemption');//

		$this->load->view('docs/Bpowerattorney');//

		$this->load->view('docs/BPIS');

		$this->load->view('docs/Bprovideinsurance');//

		$this->load->view('docs/Bwarrantydisclaimeragreement');

		$this->load->view('docs/Barbitrationagreement');//

		$this->load->view('docs/BOFAC');//

		$this->load->view('docs/BROR');//

	}else{

		if(isset($_POST['sd_main_readyprint_billofsale'])){
			$this->load->view('docs/Bbillofsale');
		}

		if(isset($_POST['sd_main_readyprint_title_application'])){
			$this->load->view('docs/Btaxtitle');
		}

		$this->load->view('docs/InstallmentContract');//copy of BHPH Contract

		if(isset($_POST['sd_main_readyprint_odometer_statement'])){
			$this->load->view('docs/Bodometerdisclosure');
			if(!empty($trade_data->trade_inv_vin) || $trade_data->trade_inv_vin != ""){
				$this->load->view('docs/Bodometerdisclosure_trade');
			}
		}

		$this->load->view('docs/BuyersGuide');//


		if(isset($_POST['sd_main_readyprint_certificate_exemption'])){
			$this->load->view('docs/BCertificateExemption');
		}

		if(isset($_POST['sd_main_readyprint_power_of_attorney'])){
			$this->load->view('docs/Bpowerattorney');
		}

		if(isset($_POST['sd_main_readyprint_privacy_information'])){
			$this->load->view('docs/BPIS');
		}

		if(isset($_POST['sd_main_readyprint_proof_of_insurance'])){
			$this->load->view('docs/Bprovideinsurance');//
		}


		if(isset($_POST['sd_main_readyprint_as_is'])){
			$this->load->view('docs/Bwarrantydisclaimeragreement');
		}

		if(isset($_POST['sd_main_readyprint_arbitration_agreement'])){
			$this->load->view('docs/Barbitrationagreement');//
		}

		if(isset($_POST['sd_main_readyprint_ofac_statement'])){
			$this->load->view('docs/BOFAC');
		}

		// if(isset($_POST['sd_main_readyprint_insurance_agreement'])){
		// 	$this->load->view('docs/InstallmentContract');
		// }

		if(isset($_POST['sd_main_readyprint_right_repossession'])){
			$this->load->view('docs/BROR');
		}

	}

	$this->load->view('docs/creditapp');

	$this->load->view('docs/weowe');

	// $this->load->view('docs/Pickupnote');
}

?>
