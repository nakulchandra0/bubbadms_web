<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Getcustomreport extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('ApiModel');
	}
	
	public function index()
	{
		verifyRequiredParams('','',array('member_id', 'startdate', 'enddate'));		
          	
		// $transaction_data = $this->db->get_where('transactions',array('transact_id' => $_POST['transact_id']))->result_array();
		// $buyers_trans_data = $this->db->get_where('buyers',array('buyers_id' => $transaction_data[0]['buyers_id']))->result_array();

		// if(empty($buyers_trans_data)){
  //           $buyers_trans_data = array();
  //       }

		$SQL = "SELECT * FROM transactions where member_id = ".$_POST['member_id']." and sale_date between '".date('Y-m-d',strtotime($_POST['startdate']))."' and '".date('Y-m-d',strtotime($_POST['enddate']))."' and status = 'closed' ";
        //echo $SQL;
        
        $query = $this->db->query($SQL);
        $deal_data = $query->result(); 

        // echo json_encode($data);
                  
        if($deal_data){

        	$purchaseTotal = 0;
	        $sellingTotal = 0;
	        for ($i=0; $i < count($deal_data) ; $i++) { 
	            // $purchaseTotal += $deal_data[$i]->trade_credit;
	            $purchaseTotal += $deal_data[$i]->inv_flrc;
	            $sellingTotal += $deal_data[$i]->sale_price;
	        }


	        $data['total_sold'] = "$".number_format($sellingTotal);
	        $data['total_cost'] = "$".number_format($purchaseTotal);
	        $data['total_profit'] = "$".number_format($sellingTotal-$purchaseTotal);
	        $data['no_car_sold'] = count($deal_data);
	        if(count($deal_data) != 0)
	        $data['gross_profit'] = "$".number_format(round(($sellingTotal-$purchaseTotal)/count($deal_data),2));
	        else
	        $data['gross_profit'] = "$0";

      		$valid = array('status' => "true", "message" => 'Report are ready.', 'data' => $data);
        }else{
            $valid = array('status' => "false", "message" => 'No report found.', 'data' => '');
        }
					
		setResponse($valid);
	}

}