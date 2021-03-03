<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Editemailotp extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('ApiModel');
	}

	public function index()
	{
		verifyRequiredParams('','',array('userid','email'));

		$custdata = $this->ApiModel->geteditdatabyid('fl_customer','id',$_POST['userid']);
		
		if(count($custdata)){
			
			if($_POST['email'] != $custdata['email']) { $is_unique_email =  '|is_unique[fl_customer.email]';} else {$is_unique_email =  ''; }

			$this->form_validation->set_rules('email','Email','trim|required|xss_clean|valid_email'.$is_unique_email);

			if($this->form_validation->run() == FALSE){

				$valid = array('status' => "false", "message" => strip_tags(validation_errors()), 'data' => '');
			}else{

				$randomotp = mt_rand(1000,9999);

				$datasave = array( "email"=> $_POST['email'],"email_verify_otp" =>$randomotp,"is_email_verify" =>'no');
				$update = $this->ApiModel->updatedata('fl_customer', 'id', $custdata['id'], $datasave);			
				$valid = array('status' => "true", "message" => 'Successful sent otp. your otp is '.$randomotp, 'data' => '');
			}
		}else{
			$valid = array('status' => "false", "message" => 'Record not found.', 'data' => '');
		}			
		setResponse($valid);
	}
}
