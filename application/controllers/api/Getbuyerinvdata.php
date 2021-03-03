<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Getbuyerinvdata extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('ApiModel');
	}
	
	public function index()
	{
		verifyRequiredParams('','',array('buyers_id'));		
		// verifyRequiredParams('','',array('buyers_id','inv_id','trade_inv_id','cal_amount_finance','cal_down_payment','cal_monthly_payment','cal_total_interest','bhph_months','bhph_rate','bhph_tpmts'));		

                $insertBuyer = array(
		            'cal_amount_finance'    => isset($_POST['cal_amount_finance']) ? $_POST['cal_amount_finance'] : '',
		            'cal_down_payment'      => isset($_POST['cal_down_payment']) ? $_POST['cal_down_payment'] : '',
		            'cal_monthly_payment'   => isset($_POST['cal_monthly_payment']) ? str_replace(array('$', ','), "",$_POST['cal_monthly_payment']) : '',
		            'cal_total_interest'    => isset($_POST['cal_total_interest']) ? str_replace(array('$', ','), "",$_POST['cal_total_interest']) : '',
		            'bhph_months'           => isset($_POST['bhph_months']) ? $_POST['bhph_months'] : '',
		            'bhph_rate'             => isset($_POST['bhph_rate']) ? $_POST['bhph_rate'] : '',
		            'bhph_tpmts'            => isset($_POST['bhph_tpmts']) ? str_replace(array('$', ','), "",$_POST['bhph_tpmts']) : ''
		        );
		        $this->db->where('buyers_id', $_POST['buyers_id']);
		        $this->db->update('buyers', $insertBuyer);
		        $buyer_data = $this->db->get_where('buyers',array('buyers_id' => $_POST['buyers_id']))->result_array();
		        $inv_data = array(); 
		        $trade_data = array(); 
		        $data = array();
		        if(!empty($_POST['inv_id']) && !empty($_POST['trade_inv_id'])){
		            // $data['status'] = "both";
		            $data[0] = array('status' => "both");
		            $inv_data = $this->db->get_where('inventory',array('inv_id' => $_POST['inv_id']))->result_array();
		            $trade_data = $this->db->get_where('trade',array('trade_inv_id' => $_POST['trade_inv_id']))->result_array();
		        }else{
		            if(!empty($_POST['inv_id'])){
		                $data[0] = array('status' => "inventory");
		                $inv_data = $this->db->get_where('inventory',array('inv_id' => $_POST['inv_id']))->result_array();
		            }elseif(!empty($_POST['trade_inv_id'])){
		                $data[0] = array('status' => "trade");
		                $trade_data = $this->db->get_where('trade',array('trade_inv_id' => $_POST['trade_inv_id']))->result_array();
		            }else{
		            	$buyer_data = false;
		            }
		        }

		        // if($buyer_data)
		        //     echo(json_encode(array_merge($data,$buyer_data,$inv_data,$trade_data)));
		        // else
		        //     echo "notfound";
                  
                if($buyer_data){
      				$valid = array('status' => "true", "message" => 'Math updated successfully.', 'data' => array_merge($data,$buyer_data,$inv_data,$trade_data));
                }else{
                    $valid = array('status' => "false", "message" => 'Math update failed.', 'data' => '');
                }
					
		setResponse($valid);
	}

}