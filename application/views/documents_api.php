<?php 
//  echo('<pre>');
//  print_r($_POST);

//  echo $state;
// die();

if($state == "FLORIDA"){

	if(isset($_POST['chooseall'])){

		$this->load->view('docs_api/florida/OFAC');//

		$this->load->view('docs_api/florida/Billofsale');//

		$this->load->view('docs_api/florida/Warranty');//

		$this->load->view('docs_api/florida/Consent');//

		$this->load->view('docs_api/florida/Odometer');//

		$this->load->view('docs_api/florida/Attorney');//

		$this->load->view('docs_api/florida/APC');//

		$this->load->view('docs_api/florida/Scholarship');//

		$this->load->view('docs_api/florida/Pricing');//

		$this->load->view('docs_api/florida/Repossession');//

		$this->load->view('docs_api/florida/BuyersAgreement');//

		$this->load->view('docs_api/florida/ArbitrationAgreement');//

		$this->load->view('docs_api/florida/OdometerDisclosure');//

		$this->load->view('docs_api/florida/BuyersGuide');//

		$this->load->view('docs_api/florida/Facts');//

		$this->load->view('docs_api/florida/InsuranceAffidavit');//

		$this->load->view('docs_api/florida/InsuranceAgreement');//

		$this->load->view('docs_api/florida/InstallmentContract');//

		$this->load->view('docs_api/florida/BuyerOrder');//


	}else{

		if(isset($_POST['sd_main_readyprint_ofac_statement'])){
			$this->load->view('docs_api/florida/OFAC');
		}

		if(isset($_POST['sd_main_readyprint_billofsale'])){
			$this->load->view('docs_api/florida/Billofsale');
		}

		if(isset($_POST['sd_main_readyprint_as_is'])){
			$this->load->view('docs_api/florida/Warranty');
		}

		if(isset($_POST['sd_main_readyprint_customer_consent'])){
			$this->load->view('docs_api/florida/Consent');
		}

		if(isset($_POST['sd_main_readyprint_odometer_statement'])){
			$this->load->view('docs_api/florida/Odometer');
		}

		if(isset($_POST['sd_main_readyprint_power_of_attorney'])){
			$this->load->view('docs_api/florida/Attorney');
		}

		if(isset($_POST['sd_main_readyprint_apc'])){
			$this->load->view('docs_api/florida/APC');
		}

		if(isset($_POST['sd_main_readyprint_hope_scholarship_program'])){
			$this->load->view('docs_api/florida/Scholarship');
		}

		if(isset($_POST['sd_main_readyprint_federal_risk'])){
			$this->load->view('docs_api/florida/Pricing');
		}

		if(isset($_POST['sd_main_readyprint_repossession'])){
			$this->load->view('docs_api/florida/Repossession');
		}

		if(isset($_POST['sd_main_readyprint_buyers_agreement'])){
			$this->load->view('docs_api/florida/BuyersAgreement');
		}

		if(isset($_POST['sd_main_readyprint_arbitration_agreement'])){
			$this->load->view('docs_api/florida/ArbitrationAgreement');
		}

		if(isset($_POST['sd_main_readyprint_sep_odometer_statement'])){
			$this->load->view('docs_api/florida/OdometerDisclosure');
		}

		if(isset($_POST['sd_main_readyprint_buyers_guide'])){
			$this->load->view('docs_api/florida/BuyersGuide');
		}

		if(isset($_POST['sd_main_readyprint_facts'])){
			$this->load->view('docs_api/florida/Facts');
		}

		if(isset($_POST['sd_main_readyprint_insurance_affidavit'])){
			$this->load->view('docs_api/florida/InsuranceAffidavit');
		}

		if(isset($_POST['sd_main_readyprint_insurance_agreement'])){
			$this->load->view('docs_api/florida/InsuranceAgreement');
		}

		if(isset($_POST['sd_main_readyprint_installment_contract'])){
			$this->load->view('docs_api/florida/InstallmentContract');
		}

		if(isset($_POST['sd_main_readyprint_buyers_order'])){
			$this->load->view('docs_api/florida/BuyerOrder');
		}

	}

}else{


	if(isset($_POST['chooseall'])){

		$this->load->view('docs_api/Bbillofsale');//

		$this->load->view('docs_api/Btaxtitle');//

		$this->load->view('docs_api/Bprovideinsurance');//

		$this->load->view('docs_api/Bpowerattorney');//

		$this->load->view('docs_api/Barbitrationagreement');//

		$this->load->view('docs_api/Bodometerdisclosure');//

		$this->load->view('docs_api/Bwarrantydisclaimeragreement');

		$this->load->view('docs_api/BOFAC');//

		$this->load->view('docs_api/BPIS');

		$this->load->view('docs_api/BCertificateExemption');//

		$this->load->view('docs_api/BROR');//

	}else{

		if(isset($_POST['sd_main_readyprint_billofsale'])){
			$this->load->view('docs_api/Bbillofsale');
		}

		if(isset($_POST['sd_main_readyprint_title_application'])){
			$this->load->view('docs_api/Btaxtitle');
		}

		if(isset($_POST['sd_main_readyprint_proof_of_insurance'])){
			$this->load->view('docs_api/Bprovideinsurance');//
		}

		if(isset($_POST['sd_main_readyprint_power_of_attorney'])){
			$this->load->view('docs_api/Bpowerattorney');
		}
		if(isset($_POST['sd_main_readyprint_arbitration_agreement'])){
			$this->load->view('docs_api/Barbitrationagreement');//
		}

		if(isset($_POST['sd_main_readyprint_odometer_statement'])){
			$this->load->view('docs_api/Bodometerdisclosure');
		}

		if(isset($_POST['sd_main_readyprint_as_is'])){
			$this->load->view('docs_api/Bwarrantydisclaimeragreement');
		}

		if(isset($_POST['sd_main_readyprint_ofac_statement'])){
			$this->load->view('docs_api/BOFAC');
		}

		if(isset($_POST['sd_main_readyprint_privacy_information'])){
			$this->load->view('docs_api/BPIS');
		}

		if(isset($_POST['sd_main_readyprint_right_repossession'])){
			$this->load->view('docs_api/BROR');
		}

		if(isset($_POST['sd_main_readyprint_certificate_exemption'])){
			$this->load->view('docs_api/BCertificateExemption');
		}

	}
	$this->load->view('docs_api/Pickupnote');
}

?>
<div id="editor"></div>
<button  id="pdfview">Save OR Open to Print Document</button>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jQuery.print.min.js"></script>


<script type="text/javascript">

	$('#pdfview').click(function () {
		$('#pdfview').hide();
	    $.print(document.documentElement.outerHTML); 
		$('#pdfview').show();

	});

</script>