<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Changepassword extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('ApiModel');
	}

	public function index()
	{
		verifyRequiredParams('','',array('member_id','newpassword'));

		$memberdata = $this->ApiModel->geteditdatabyid('memberlogin_members','id',$_POST['member_id']);

		if($memberdata){

        	$data['password'] = sha1($_POST['newpassword']);

			$update = $this->ApiModel->updatedata('memberlogin_members', 'id', $_POST['member_id'], $data);

        	if($update){
					
				// $membdata = $this->ApiModel->geteditdatabyid('memberlogin_members','id',$_POST['member_id']);		
				
				$valid = array('status' => "true", "message" => 'Successfully password changed.', 'data' => '');

			}else{

				$valid = array('status' => "false", "message" => 'Password change Error.', 'data' => '');

			}
					
		}else{
			$valid = array('status' => "false", "message" => 'Member not found.', 'data' => '');
		}
					
		setResponse($valid);
	}
}
