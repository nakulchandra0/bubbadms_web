<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Insertdealprocessing extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('ApiModel');
	}
	
	public function index()
	{
		verifyRequiredParams('','',array('member_id','buyers_id'));           		

        $inv_id         = $_POST['inv_id'];
        $trade_inv_id   = $_POST['trade_inv_id'];
        $buyers_id      = $_POST['buyers_id'];

        $data['buyers_id']              = $buyers_id;
        $data['inv_id']                 = $inv_id;
        $data['trade_inv_id']           = $trade_inv_id;
        $data['member_id']              = $_POST['member_id'];

        if (!empty($_POST['inv_id'])) {

            $inventory_data = $this->db->get_where('inventory',array('inv_id' => $_POST['inv_id']))->row();

            $data['inv_vin']                = $inventory_data->inv_vin;
            $data['inv_stock']              = $inventory_data->inv_stock;
            $data['inv_year']               = $inventory_data->inv_year;
            $data['inv_make']               = $inventory_data->inv_make;
            $data['inv_model']              = $inventory_data->inv_model;
            $data['inv_style']              = $inventory_data->inv_style;
            $data['inv_color']              = $inventory_data->inv_color;
            $data['inv_mileage']            = $inventory_data->inv_mileage;
            $data['inv_cost']               = $inventory_data->inv_cost;
            $data['inv_addedcost']          = $inventory_data->inv_addedcost;
            $data['inv_price']              = $inventory_data->inv_price;
            $data['inv_flrc']               = $inventory_data->inv_flrc ;
        }
		$buyer_data = $this->db->get_where('buyers',array('buyers_id' => $buyers_id))->row();
        $data['buyers_first_name']   = $buyer_data->buyers_first_name;
        $data['buyers_mid_name']     = $buyer_data->buyers_mid_name;
        $data['buyers_last_name']    = $buyer_data->buyers_last_name;
        $data['buyers_pri_email']    = $buyer_data->buyers_pri_email;
        $data['buyers_address']      = $buyer_data->buyers_address;
        $data['buyers_city']         = $buyer_data->buyers_city;
        $data['buyers_state']        = $buyer_data->buyers_state;
        $data['buyers_zip']          = $buyer_data->buyers_zip;
        $data['buyers_work_phone']   = $buyer_data->buyers_work_phone;
        $data['buyers_home_phone']   = $buyer_data->buyers_home_phone;
        $data['buyers_pri_phone_cell'] = $buyer_data->buyers_pri_phone_cell;
        $data['buyers_DL_number']    = $buyer_data->buyers_DL_number;
        $data['buyers_DL_state']     = $buyer_data->buyers_DL_state;
        $data['buyers_DL_expire']    = $buyer_data->buyers_DL_expire;
        $data['buyers_DL_dob']       = $buyer_data->buyers_DL_dob;
        $data['buyers_temp_tag_number'] = $buyer_data->buyers_temp_tag_number;

        if (!empty($trade_inv_id)) {
            $trade_data = $this->db->get_where('trade',array('trade_inv_id' => $trade_inv_id))->row();
            $data['trade_inv_price']        = $trade_data->trade_inv_price;
            // if (empty($inv_id)) {

                $data['trade_inv_vin']                = $trade_data->trade_inv_vin;
                $data['trade_inv_year']               = $trade_data->trade_inv_year;
                $data['trade_inv_make']               = $trade_data->trade_inv_make;
                $data['trade_inv_model']              = $trade_data->trade_inv_model;
                $data['trade_inv_style']              = $trade_data->trade_inv_style;
                $data['trade_inv_color']              = $trade_data->trade_inv_color;
                $data['trade_inv_mileage']            = $trade_data->trade_inv_mileage;
                $data['trade_inv_price']              = $trade_data->trade_inv_price;
            // }
        }

        $data['transact']               = "";
        $data['sale_date']              = date('Y-m-d');

        if(empty($_POST['transact_id'])){
            $data['status']             = "processing";
            $inserted = $this->db->insert('transactions', $data);
            $insert_id = $this->db->insert_id();
            $data['transact_id'] = $insert_id;
            // echo json_encode($data);
        }
        else{
            $this->db->where('transact_id', $_POST['transact_id']);
            $inserted = $this->db->update('transactions', $data);
            $data['transact_id'] = $_POST['transact_id'];
            // echo json_encode($data);
        }

        if($inserted){
      		    $valid = array('status' => "true", "message" => 'Deal processing successfully.', 'data' => json_encode($data));
        }else{
                $valid = array('status' => "false", "message" => 'Deal not processing.', 'data' => '');
        }
		
		setResponse($valid);
	}
}