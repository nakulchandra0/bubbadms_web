<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Editemailverify extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('ApiModel');
	}

	public function index()
	{
		verifyRequiredParams('','',array('userid','email','otp'));

		$is_otp_verify = $this->db->get_where("fl_customer", array("id"=>$_POST['userid'],"email"=>$_POST['email'],"email_verify_otp"=>$_POST['otp']))->result();
		
		if($is_otp_verify){
			
			$datasave = array( "email_verify_otp" =>"","email" =>$_POST['email'],"is_email_verify" =>'yes');
			$update = $this->ApiModel->updatedata('fl_customer', 'id', $is_otp_verify[0]->id, $datasave);			
			
			$customerdata = $this->ApiModel->geteditdatabyid('fl_customer','id',$is_otp_verify[0]->id);

			$thumb = explode('.', $customerdata['profile_image']);
			
			$name = explode(' ', $customerdata['name']);

			if(!empty($customerdata['name'])){$fname = $name[0];$lname = $name[1];}else{$fname = '';$lname = '';}
			
			$customerdatas = array( "id"	    =>$customerdata['id'],
								"fname"			=>$fname,
								"lname"			=>$lname,
								"email"			=>$customerdata['email'],
								"email"			=>$customerdata['email'],
								"profile_image"			=>(!empty($customerdata['profile_image'])) ? base_url().'uploads/customer_icon/'.$customerdata['profile_image'] :'',
								"profile_image_thumb"	=>(!empty($customerdata['profile_image'])) ? base_url().'uploads/customer_icon/'.$thumb[0].'_thumb.'.$thumb[1] :'',
								"gender"		=>$customerdata['gender'],
								"dob"			=>$customerdata['dob'],
								"active_status"	=>$customerdata['active_status'],
								"phone_verify"	=>$customerdata['is_phone_verify'],
								"email_verify"	=>$customerdata['is_email_verify'],
								"created"		=>$customerdata['created']
							);
			$valid = array('status' => "true", "message" => 'Verifyed otp.', 'data' => $customerdatas);

		}else{			

			$valid = array('status' => "false", "message" => 'Invalid otp.', 'data' => '');
		}			
		setResponse($valid);
	}
}
