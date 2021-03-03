<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setdealnotclosed extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('ApiModel');
	}

	public function index()
	{
		verifyRequiredParams('','',array('transact_id','member_id'));

		$memberdata = $this->ApiModel->geteditdatabyid('memberlogin_members','id',$_POST['member_id']);
		if($memberdata){

			$transactions_data = $this->db->get_where('transactions',array('transact_id' => $_POST['transact_id']))->row();

			if(empty($transactions_data->buyers_id) || $transactions_data->buyers_id == 0){}else{
				$this->db->where("buyers_id",$transactions_data->buyers_id);
				$this->db->update("buyers",array('active' => '0'));
			}

			if(empty($transactions_data->inv_id) || $transactions_data->inv_id == 0){}else{
				$this->db->where("inv_id",$transactions_data->inv_id);
				$this->db->update("inventory",array('active' => '0'));
			}

			if(empty($transactions_data->trade_inv_id) || $transactions_data->trade_inv_id == 0){}else{
				$this->db->where("trade_inv_id",$transactions_data->trade_inv_id);
				$this->db->delete("trade");
			}

			$this->db->where("transact_id",$_POST['transact_id']);
			$this->db->update("transactions",array('status' => 'deal_not_closed'));

			$this->db->where("transact_id",$_POST['transact_id']);
			$this->db->where("status",'processing');
			$this->db->or_where("status",'pending_print');
			$this->db->delete("transactions");

	    $valid = array('status' => "true", "message" => 'Deal saved successfully.', 'data' => '');

		}else{
			$valid = array('status' => "false", "message" => 'Member not found.', 'data' => '');
		}
		setResponse($valid);
	}
}
