<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Insertdealsave extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('ApiModel');
	}
	
	public function index()
	{
		verifyRequiredParams('','',array('member_id','buyers_id'));           		

		$data['buyers_id']            = $_POST['buyers_id'];
            $data['inv_id']               = $_POST['inv_id'];
            $data['trade_inv_id']         = $_POST['trade_inv_id'];
            $data['member_id']            = $_POST['member_id'];
            $data['buyers_first_name']      = $_POST['buyers_firstname'];
            $data['buyers_mid_name']        = $_POST['buyers_middlename'];
            $data['buyers_last_name']       = $_POST['buyers_lastname'];
            $data['buyers_pri_email']       = $_POST['buyers_email'];
            $data['buyers_address']         = $_POST['buyers_address'];
            $data['buyers_city']            = $_POST['buyers_city'];
            $data['buyers_state']           = $_POST['buyers_state'];
            $data['buyers_zip']             = $_POST['buyers_zip'];
            $data['buyers_work_phone']      = $_POST['buyers_workphone'];
            $data['buyers_home_phone']      = $_POST['buyers_homephone'];
            $data['buyers_pri_phone_cell']  = $_POST['buyers_mobile'];
            $data['buyers_DL_number']       = $_POST['buyers_dlnumber'];
            $data['buyers_DL_state']        = $_POST['buyers_dlstate'];
            $data['buyers_DL_expire']       = $_POST['buyers_dlexpire'];
            $data['buyers_DL_dob']          = $_POST['buyers_dldob'];
            $data['buyers_temp_tag_number'] = $_POST['buyers_temp_tag_number'];		


            if(empty($_POST['cobuyers_id']) || $_POST['cobuyers_id'] == 0){

            }else{

                $buyer_data = $this->db->get_where('buyers',array('buyers_id' => $_POST['cobuyers_id']))->row();
                $data['co_buyers_first_name']   = $buyer_data->co_buyers_first_name;
                $data['co_buyers_last_name']    = $buyer_data->co_buyers_last_name;
                $data['co_buyers_pri_email']    = $buyer_data->co_buyers_pri_email;
                $data['co_buyers_address']      = $buyer_data->co_buyers_address;
                $data['co_buyers_city']         = $buyer_data->co_buyers_city;
                $data['co_buyers_state']        = $buyer_data->co_buyers_state;
                $data['co_buyers_zip']          = $buyer_data->co_buyers_zip;
                $data['co_buyers_work_phone']   = $buyer_data->co_buyers_work_phone;
                $data['co_buyers_home_phone']   = $buyer_data->co_buyers_home_phone;
                $data['co_buyers_pri_phone_cell'] = $buyer_data->co_buyers_pri_phone_cell;
                $data['co_buyers_DL_number']    = $buyer_data->co_buyers_DL_number;
                $data['co_buyers_DL_state']     = $buyer_data->co_buyers_DL_state;
                $data['co_buyers_DL_expire']    = $buyer_data->co_buyers_DL_expire;
                $data['co_buyers_DL_dob']       = $buyer_data->co_buyers_DL_dob;

            }

            if(empty($_POST['insurance_buyers_id']) || $_POST['insurance_buyers_id'] == 0){

            }else{
                $buyer_data = $this->db->get_where('buyers',array('buyers_id' => $_POST['buyers_id']))->row();

                $data['ins_company']            = $buyer_data->ins_company;
                $data['ins_pol_num']            = $buyer_data->ins_pol_num;
                $data['ins_phone']              = $buyer_data->ins_phone;
                $data['ins_address']            = $buyer_data->ins_address;
                $data['ins_city']               = $buyer_data->ins_city;
                $data['ins_state']              = $buyer_data->ins_state;
                $data['ins_zip']                = $buyer_data->ins_zip;
                $data['ins_agent']              = $buyer_data->ins_agent;
            }
            
            $data['sale_price']             = $_POST['saleprice'];
            $data['trade_credit']           = $_POST['tradecredit'];
            // $data['trade_balance']          = $_POST['tradebalance'];
            $data['cash_credit']            = $_POST['cashcredit'];
            $data['tax']                    = $_POST['tax'];
            $data['dealer_fee']             = $_POST['servicefee'];
            $data['dmv']                    = $_POST['tagregistration'];
            $data['total_due']              = $_POST['total_due'];
            $data['sub_due']                = $_POST['sub_due'];
            $data['sub_due1']               = $_POST['sub_due1'];
            $data['sub_due2']               = $_POST['sub_due2'];

            if(!empty($_POST['inv_id']) && !empty($_POST['trade_inv_id'])){
                
                $data['inv_vin']                = $_POST['inventory_vin'];
                $data['inv_stock']              = $_POST['inventory_stocknumber'];
                $data['inv_year']               = $_POST['inventory_year'];
                $data['inv_make']               = $_POST['inventory_make'];
                $data['inv_model']              = $_POST['inventory_model'];
                $data['inv_style']              = $_POST['inventory_style'];
                $data['inv_color']              = $_POST['inventory_color'];
                $data['inv_mileage']            = $_POST['inventory_mileage'];
                $data['inv_exempt']             = $_POST['inventory_exempt'];
                $data['inv_cost']               = $_POST['inventory_cost'];
                $data['inv_addedcost']          = $_POST['inventory_addedcost'];
                $data['inv_price']              = $_POST['inventory_price'];
                $data['inv_flrc']               = $_POST['inventory_totalcost'];

                $data['trade_inv_vin']          = $_POST['trade_vin'];
                $data['trade_inv_year']         = $_POST['trade_year'];
                $data['trade_inv_make']         = $_POST['trade_make'];
                $data['trade_inv_model']        = $_POST['trade_model'];
                $data['trade_inv_style']        = $_POST['trade_style'];
                $data['trade_inv_color']        = $_POST['trade_color'];
                $data['trade_inv_mileage']      = $_POST['trade_mileage'];
                $data['trade_inv_exempt']       = $_POST['trade_exempt'];
                $data['trade_inv_price']        = $_POST['trade_allowance'];
            
            }else{

                if(!empty($_POST['inv_id'])){

                    $data['inv_vin']                = $_POST['inventory_vin'];
                    $data['inv_stock']              = $_POST['inventory_stocknumber'];
                    $data['inv_year']               = $_POST['inventory_year'];
                    $data['inv_make']               = $_POST['inventory_make'];
                    $data['inv_model']              = $_POST['inventory_model'];
                    $data['inv_style']              = $_POST['inventory_style'];
                    $data['inv_color']              = $_POST['inventory_color'];
                    $data['inv_mileage']            = $_POST['inventory_mileage'];
                    $data['inv_exempt']             = $_POST['inventory_exempt'];
                    $data['inv_cost']               = $_POST['inventory_cost'];
                    $data['inv_addedcost']          = $_POST['inventory_addedcost'];
                    $data['inv_price']              = $_POST['inventory_price'];
                    $data['inv_flrc']               = $_POST['inventory_totalcost'];
                }
                if(!empty($_POST['trade_inv_id'])){

                    $data['trade_inv_vin']          = $_POST['trade_vin'];
                    $data['trade_inv_year']         = $_POST['trade_year'];
                    $data['trade_inv_make']         = $_POST['trade_make'];
                    $data['trade_inv_model']        = $_POST['trade_model'];
                    $data['trade_inv_style']        = $_POST['trade_style'];
                    $data['trade_inv_color']        = $_POST['trade_color'];
                    $data['trade_inv_mileage']      = $_POST['trade_mileage'];
                    $data['trade_inv_exempt']       = $_POST['trade_exempt'];
                    $data['trade_inv_price']        = $_POST['trade_allowance'];

                }
            }

            $data['transact']               = "";
            $data['sale_date']              = date('Y-m-d');
            $data['status']             = "pending_print";
            if(empty($_POST['transact_id'])){
                $this->upadateDealCredit($_POST['member_id']);
                $inserted = $this->db->insert('transactions', $data);
            }
            else{
                $this->db->where('transact_id', $_POST['transact_id']);
                $inserted = $this->db->update('transactions', $data);
            }

            $data1['active']      = '1';
            $this->db->where("buyers_id",$_POST['buyers_id']);
            $this->db->update("buyers",$data1);


            if(!empty($_POST['inv_id'])){
                $data2['active']      = '1';
                $this->db->where("inv_id",$_POST['inv_id']);
                $this->db->update("inventory",$data2);
            }
            
            if(!empty($_POST['trade_inv_id'])){
                $data3['active']      = '1';
                $this->db->where("trade_inv_id",$_POST['trade_inv_id']);
                $this->db->update("trade",$data3);
            }

            $this->db->where("member_id",$_POST['member_id']);
            $this->db->where("buyers_id",$_POST['buyers_id']);
            $this->db->where("inv_id",$_POST['inv_id']);
            $this->db->where("trade_inv_id",$_POST['trade_inv_id']);
            $this->db->where("status",'processing');
            $this->db->delete("transactions");

            if($inserted){
      		$valid = array('status' => "true", "message" => 'Deal saved successfully.', 'data' => '');
            }else{
                  $valid = array('status' => "false", "message" => 'Deal not saved.', 'data' => '');
            }
		
		setResponse($valid);
	}

    //for pay per deal only
    public function upadateDealCredit($member_id)
    {
        $userdata = $this->db->get_where('memberlogin_members',array('id' => $member_id))->row();
        $packagedata = $this->db->get_where('memberlogin_groups',array('id' => $userdata->group_id))->row();
        if(strtolower($packagedata->group_title) == strtolower("Pay Per Deal")){
            if($userdata->deal_credit < 1){
                return true;
            }else{
                $data['deal_credit'] = $userdata->deal_credit - 1;
                $this->db->where('id', $userdata->id);
                $this->db->update('memberlogin_members', $data);
            }
        }else{
            return false;
        }
    }

}
