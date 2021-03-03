<?php if ($calltype == 'web') { ?>

<button  id="pdfview">Save OR Open to Print Document</button>

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

 // echo('<pre>');

 // print_r($_POST);



if(isset($_POST['sd_main_bhphcontract_cb'])){

	$this->load->view('docs/BHPHv7');//

}



?>
