<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Fetchuserdata extends CI_Controller {	

	function __construct()	
	{		
		parent::__construct();		
		$this->load->model('ApiModel');	
	}	

	public function index()	{		

		verifyRequiredParams('','',array('member_id'));

		$userdata = $this->ApiModel->geteditdatabyid('memberlogin_members','id',$_POST['member_id']);

		if($userdata){

			$valid = array('status' => "true", "message" => 'Signin successfully', 'data' => $userdata);

		}else{			

			$valid = array('status' => "false", "message" => 'User not found.', 'data' => '');

		}

		setResponse($valid);
	}
}