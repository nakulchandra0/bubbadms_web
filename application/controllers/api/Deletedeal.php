<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Deletedeal extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('ApiModel');
	}

	public function index()
	{
		verifyRequiredParams('','',array('member_id','transact_id'));		

		$memberdata = $this->ApiModel->geteditdatabyid('memberlogin_members','id',$_POST['member_id']);
		if($memberdata){
			$tradedata = $this->ApiModel->geteditdatabyid('transactions','transact_id',$_POST['transact_id']);
			if($tradedata){
				
				$this->db->where('transact_id', $_POST['transact_id']);
	    		$this->db->delete('transactions');
				$valid = array('status' => "true", "message" => 'Deal successfully deleted.', 'data' => '');
						
			}else{
				$valid = array('status' => "false", "message" => 'deal not found.', 'data' => '');
			}	
		}else{
			$valid = array('status' => "false", "message" => 'Member not found.', 'data' => '');
		}		
		setResponse($valid);
	}
}
