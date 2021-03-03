<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Editname extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('ApiModel');
	}

	public function index()
	{
		verifyRequiredParams('','',array('userid','fname','lname'));

		$custdata = $this->ApiModel->geteditdatabyid('fl_customer','id',$_POST['userid']);
		
		if(count($custdata)){
			
			
			$this->form_validation->set_rules('fname','First name','trim|required|xss_clean');
			$this->form_validation->set_rules('lname','Last name','trim|required|xss_clean');
						
			if($this->form_validation->run() == FALSE){

				$valid = array('status' => "false", "message" => strip_tags(validation_errors()), 'data' => '');
			}else{				

				$datasave = array( "name" =>$_POST['fname'].' '.$_POST['lname']);
								
				$update = $this->ApiModel->updatedata('fl_customer', 'id', $custdata['id'], $datasave);

				if($update){
					
					$customerdata = $this->ApiModel->geteditdatabyid('fl_customer','id',$_POST['userid']);		
					
					$thumb = explode('.', $customerdata['profile_image']);
			
					$name = explode(' ', $customerdata['name']);

					if(!empty($customerdata['name'])){$fname = $name[0];$lname = $name[1];}else{$fname = '';$lname = '';}

					$customerdatas = array( "id"	    =>$customerdata['id'],
								"fname"			=>$fname,
								"lname"			=>$lname,
								"email"			=>$customerdata['email'],
								"phone_number"	=>$customerdata['phone_number'],
								"profile_image"			=>(!empty($customerdata['profile_image'])) ? base_url().'uploads/customer_icon/'.$customerdata['profile_image'] :'',
								"profile_image_thumb"	=>(!empty($customerdata['profile_image'])) ? base_url().'uploads/customer_icon/'.$thumb[0].'_thumb.'.$thumb[1] :'',
								"gender"		=>$customerdata['gender'],
								"dob"			=>$customerdata['dob'],
								"active_status"	=>$customerdata['active_status'],
								"phone_verify"	=>$customerdata['is_phone_verify'],
								"email_verify"	=>$customerdata['is_email_verify'],
								"created"		=>$customerdata['created']
							);

					$valid = array('status' => "true", "message" => 'Successfully updated profile.', 'data' => $customerdatas);
				}else{
					$valid = array('status' => "false", "message" => 'Update Error.', 'data' => '');
				}
			}
		}else{
			$valid = array('status' => "false", "message" => 'Record not found.', 'data' => '');
		}			
		setResponse($valid);
	}
}
