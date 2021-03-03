<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Updatemathinfo extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('ApiModel');
	}
	
	public function index()
	{
		verifyRequiredParams('','',array('buyers_id','sale_price','trade_credit','cash_credit','tax','dealer_fee','dmv','total_due','sub_due','sub_due1','sub_due2'));		

                $data['sale_price'] = $_POST['sale_price'];
		        $data['trade_credit'] = $_POST['trade_credit'];
		        $data['cash_credit'] = $_POST['cash_credit'];
		        $data['tax'] 		= $_POST['tax'];
		        $data['dealer_fee'] = $_POST['dealer_fee'];
		        $data['dmv'] 		= $_POST['dmv'];
		        $data['total_due'] 	= $_POST['total_due'];
		        $data['sub_due'] 	= $_POST['sub_due'];
		        $data['sub_due1'] 	= $_POST['sub_due1'];
		        $data['sub_due2'] 	= $_POST['sub_due2'];

		        $this->db->where("buyers_id",$_POST['buyers_id']);
		        $math_data = $this->db->update("buyers",$data);
                  
                if($math_data){
      				$valid = array('status' => "true", "message" => 'Math updated successfully.', 'data' => '');
                }else{
                    $valid = array('status' => "false", "message" => 'Math not updated.', 'data' => '');
                }
					
		setResponse($valid);
	}

}
