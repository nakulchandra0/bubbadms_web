<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Geteditdealdata extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('ApiModel');
	}
	
	public function index()
	{
		verifyRequiredParams('','',array('transact_id'));		
          	
		$transaction_data = $this->db->get_where('transactions',array('transact_id' => $_POST['transact_id']))->result_array();
		$buyers_trans_data = $this->db->get_where('buyers',array('buyers_id' => $transaction_data[0]['buyers_id']))->result_array();

		if(empty($buyers_trans_data)){
            $buyers_trans_data = array();
        }
                  
        if($transaction_data){
      		$valid = array('status' => "true", "message" => 'Deal data fetched successfully.', 'data' => array_merge($transaction_data,$buyers_trans_data));
        }else{
            $valid = array('status' => "true", "message" => 'Deal data fetch failed.', 'data' => '');
        }
					
		setResponse($valid);
	}

}