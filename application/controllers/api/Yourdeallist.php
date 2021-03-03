<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Yourdeallist extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('ApiModel');
	}

	public function index()
	{
		verifyRequiredParams('','',array('member_id'));		

		// $packagedata = $this->ApiModel->getall('memberlogin_groups','status','T');

		// if($packagedata){
		$memberdata = $this->ApiModel->geteditdatabyid('memberlogin_members','id',$_POST['member_id']);
		if($memberdata){
			
			// $dealdata = $this->db->get_where("transactions", array("member_id"=>$_POST['member_id']))->result();
			$this->db->select('transact_id,buyers_first_name,buyers_mid_name,buyers_last_name,inv_stock,status,inv_flrc,trade_inv_price'); 
		    $this->db->from('transactions');   
		    $this->db->where('member_id', $_POST['member_id']);
		    $this->db->order_by('transact_id','DESC');
		    $dealdata =  $this->db->get()->result();

			if(count($dealdata)){
				$valid = array('status' => "true", "message" => 'Successful list of deals.', 'data' => $dealdata);
			}else{
				$valid = array('status' => "false", "message" => 'No saved deals.', 'data' => '');
			}	
		}else{
			$valid = array('status' => "false", "message" => 'Member not found.', 'data' => '');
		}		
		// }else{
		// 	$valid = array('status' => "false", "message" => 'Invalid User.', 'data' => '');
		// }
					
		setResponse($valid);
	}
}
