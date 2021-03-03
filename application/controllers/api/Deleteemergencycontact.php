<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Deleteemergencycontact extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('ApiModel');
	}

	public function index()
	{
		verifyRequiredParams('','',array('userid','contactid'));		

		$userdata = $this->ApiModel->geteditdatabyid('fl_emergency_contact','id',$_POST['contactid']);
		//print_r($userdata['source_id']);die;
		if($userdata){

			$this->form_validation->set_rules('userid','Userid','trim|required|xss_clean');
			$this->form_validation->set_rules('contactid','Contactid','trim|required|xss_clean');
						
			if($this->form_validation->run() == FALSE){
				$valid = array('status' => "false", "message" => strip_tags(validation_errors()), 'data' => '');
			}else{

				if($userdata['source_id'] != $_POST['userid']){
					$valid = array('status' => "false", "message" => 'Not authorized.', 'data' => '');
					setResponse($valid);
				}

				$datasave = array( "is_deleted"	=>'yes');
				$customer = $this->ApiModel->updatedata('fl_emergency_contact', 'id', $_POST['contactid'], $datasave);

				if($customer){
					$valid = array('status' => "true", "message" => 'Successfully deleted emergency contact.', 'data' => '');
				}else{
					$valid = array('status' => "false", "message" => 'Error.', 'data' => '');
				}
			}		
		}else{
			$valid = array('status' => "false", "message" => 'Invalid contact.', 'data' => '');
		}		
		setResponse($valid);
	}
}
