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
		<link rel="stylesheet" type="text/css" href="assets/css/style.css">
		
		<?php $this->load->view('common/seo');?>

	</head>
	<body>

		<!-- Navigation Start -->
		<?php $this->load->view('common/header');?>
		<!-- Navigation End -->

		<div class="content">

			<section class="pricing_section">
				<div class="container">
					<div class="row mb-5">
						<div class="col-md-12">
							<h2 class="center">Choose a Package</h2>
						</div>
					</div>
					<div class="row">
						<?php foreach ($packagedata as $key => $value) { 
							// echo "<pre>";
							// print_r($value);
							// die;
							?>
							
							<div class="col-md-4">
								<form action="<?php echo base_url() ?>home/payment_finish" method="post" enctype="multipart/form-data" id="plan_<?php echo $value['id'] ?>" accept-charset="utf-8">
								<div class="pricing_box">
									<h3 class="pricing_h3"><?php echo $value['group_title'] ?></h3>
									<input type="hidden" name="signupform_planid" value="<?php echo $value['id'] ?>">
									<input type="hidden" name="existing_user" value="true">
									<div class="pricing_box_h">
										<h4 class="pricing_h4"><sup>$</sup><?php echo $value['subscription_fee'] ?></h4>
										<!-- <h6 class="mb-3">Pay As You Go - Monthly Program</h6> -->
										<ul class="pricing_ul no_b_m">
											<?php  //foreach (unserialize($value['subscription_info']) as $value1) { ?>
											<?php  foreach ($value['subscription_info'] as $value1) { ?>
												<li><?php echo $value1; ?></li>
											<?php } ?>
										</ul>
									</div>
									<div class="btn-wrap">
										<a href="#" onclick="$('#plan_<?php echo $value['id'];?>').submit();" class="btn theme_btn btn_redius">Start Now!</a>
									</div>
								</div>
								</form>
							</div>
						
						<?php } ?>	
						
						<!-- <div class="col-md-4">
							<div class="pricing_box">
								<span class="additional">Additional Services</span>
								<h3 class="pricing_h3">SAVE</h3>
								<div class="pricing_box_h">
									<h6 class="mb-3">We have many dealer resources and Services. From Starting a Dealership to Saving You Money!</h6>
									<ul class="pricing_ul no_b_m">
										<li><b>Website $35.00/Month (Start)</b></li>
										<li><b>Website $350.00/Year (Start)</b></li>
										<li>Surety and Title Bonds</li>
										<li>(Over 300 Others!)</li>
										<li>Digital Contracts (BHPH)</li>
										<li>Insurance</li>
										<li>License Pre-License</li>
										<li>Corporate Filing</li>
									</ul>
								</div>
								<div class="btn-wrap">
									<a href="#" class="btn theme_btn btn_redius">Learn More</a>
								</div>
							</div>
						</div> -->
					</div>
				</div>
			</section>
		</div>

	<?php $this->load->view('common/footer');?>	

	</body>
	<?php $this->load->view('common/footer-script');?>	

	<script type="text/javascript">
		$(document).ready(function() {
		<?php if($this->session->flashdata('msg')){ ?>

		   Swal.fire({
		      type: "error",
		      title: 'Cancelled',
		      text: '<?php echo $this->session->flashdata('msg'); ?>'
		    })
		<?php } ?>
		});
	</script>

</html>