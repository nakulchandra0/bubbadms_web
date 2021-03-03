<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Startdeal extends CI_Controller {



	function __construct()
    {
        parent::__construct();

        //$this->load->library('facebook');

        if(_is_front_login()){}else{redirect(base_url());}
        if(_is_user_expired()){redirect(base_url().'buypack');}else{}
        // if(_is_user_expired_ppd()){redirect(base_url().'buypack');}else{}
    }

	public function index()
	{
        // echo "<h1>Work under process</h1>";
        // $startdate = date('Y-m-d H:i:s',strtotime(date('Y').'-'.date('m').'-01 00:00:00'));
        // $enddate = date('Y-m-d H:i:s',strtotime(date('Y').'-'.date('m').'-'.date('t').' 23:59:59'));

        // $page_data['memberdata'] = $this->db->get_where('memberlogin_members',array('id' => $this->session->userdata('user_id')))->row();

        // $payments = $this->db->get_where('package_payment',array(
        //     'member_id' => $page_data['memberdata']->id,
        //     'plan_id'=>$page_data['memberdata']->group_id,
        //     'payment_date >='=>$startdate,
        //     'payment_date <='=>$enddate,
        // ))->result_array();

        // echo count($payments);
        // die();

        $page_data['page_title']    = 'Start Deal - Bubba DMS';

        $member_id = $this->session->userdata('user_id');
        $page_data['inventory_data'] = $this->db->get_where('inventory',array('member_id' => $member_id,'active'=>'0'))->result_array();
        $page_data['trade_data'] = $this->db->get_where('trade',array('member_id' => $member_id,'active'=>'0'))->result_array();
        $page_data['buyers_data'] = $this->db->get_where('buyers',array('member_id' => $member_id,'active'=>'0'))->result_array();
        $page_data['memberdata'] = $this->db->get_where('memberlogin_members',array('id' => $this->session->userdata('user_id')))->row();
        $page_data['states'] = $this->db->get('memberlogin_state')->result_array();

        $page_data['transaction_data'] = "";
        if($this->input->post('id') != null){
            $page_data['transaction_data'] = $this->db->get_where('transactions',array('transact_id' => $this->input->post('id')))->row();
            $page_data['buyers_trans_data'] = $this->db->get_where('buyers',array('buyers_id' => $page_data['transaction_data']->buyers_id))->row();
            if(empty($page_data['buyers_trans_data'])){
                $page_data['buyers_trans_data'] = "";
            }

						if($page_data['transaction_data']->status == "processing"){
								if ($page_data['inventory_data']){
									if($page_data['inventory_data'][0]['inv_price'])
									$page_data['buyers_trans_data']->sale_price = $page_data['inventory_data'][0]['inv_price'];
								}else $page_data['buyers_trans_data']->sale_price = '0';

								if ($page_data['trade_data']){
									if($page_data['trade_data'][0]['trade_inv_price'])
									$page_data['buyers_trans_data']->trade_credit = $page_data['trade_data'][0]['trade_inv_price'];
								}else $page_data['buyers_trans_data']->trade_credit = '0';

						}
        }else{
            if(_is_user_expired_ppd()){redirect(base_url().'buypack');}else{}
        }
		$this->load->view('start_deal',$page_data);
	}

    public function insert_inventory()
    {
        // echo("<pre>");
        // print_r($_POST);
        // die();


        // $this->form_validation->set_rules('sd_inventoryinfo_vin', 'VIN', 'required|is_unique[inventory.inv_vin]',array('required' => 'You have not provided %s.', 'is_unique' => 'This %s already exists.'));
        $is_vin_available = $this->db->get_where('inventory',array('inv_vin' => $_POST['sd_inventoryinfo_vin'], 'active' => 0))->row();

        if ($is_vin_available)
        {
            $error['request_status'] = 'error';
            $error['msg'] = "This VIN already exists.";

            echo json_encode($error);
        }
        else
        {
            $member_id = $this->session->userdata('user_id');
            $data['member_id']      = $member_id;
            $data['inv_vin']        = $this->input->post('sd_inventoryinfo_vin');
            $data['inv_stock']      = $this->input->post('sd_inventoryinfo_stocknumber');
            $data['inv_year']       = $this->input->post('sd_inventoryinfo_year');
            $data['inv_make']       = $this->input->post('sd_inventoryinfo_make');
            $data['inv_model']      = $this->input->post('sd_inventoryinfo_model');
            $data['inv_style']      = $this->input->post('sd_inventoryinfo_style');
						$data['inv_color']      = $this->input->post('sd_inventoryinfo_color');
						$data['drive_type']      = $this->input->post('sd_inventoryinfo_drivetype');
            $data['engine_size']      = $this->input->post('sd_inventoryinfo_enginesize');
            $data['inv_mileage']    = $this->input->post('sd_inventoryinfo_mileage');
            $data['inv_exempt']     = !empty($this->input->post('sd_inventoryinfo_exempt_cb')) ? $this->input->post('sd_inventoryinfo_exempt_cb') : 'no';
            $data['inv_cost']       = $this->input->post('sd_inventoryinfo_cost');
            $data['inv_addedcost']  = $this->input->post('sd_inventoryinfo_addedcost');
            $data['inv_price']      = $this->input->post('sd_inventoryinfo_stickerprice');
            $data['inv_flrc']       = $this->input->post('sd_inventoryinfo_totalcost');
            $data['active']         = '0';
            $this->db->insert('inventory', $data);
            $insert_id = $this->db->insert_id();

            //if($inserted) {
                $data['request_status'] = 'done';
                $data['inv_id'] = $insert_id;
                echo json_encode($data);
            //}

        }

    }

    public function insert_trade()
    {
        // echo("<pre>");
        // print_r($_POST);
        // die();

            $member_id = $this->session->userdata('user_id');
            $data['member_id']      = $member_id;
            $data['trade_inv_vin']      = $this->input->post('sd_tradeinfo_vin');
            // $data['trade_inv_stock']     = $this->input->post('tradeinfo_stocknumber');
            $data['trade_inv_year']     = $this->input->post('sd_tradeinfo_year');
            $data['trade_inv_make']     = $this->input->post('sd_tradeinfo_make');
            $data['trade_inv_model']    = $this->input->post('sd_tradeinfo_model');
            $data['trade_inv_style']    = $this->input->post('sd_tradeinfo_style');
            $data['trade_inv_color']    = $this->input->post('sd_tradeinfo_color');
						$data['trade_drive_type']   = $this->input->post('sd_tradeinfo_drivetype');
            $data['trade_engine_size']  = $this->input->post('sd_tradeinfo_enginesize');
            $data['trade_inv_mileage']  = $this->input->post('sd_tradeinfo_mileage');
            $data['trade_inv_exempt']   = !empty($this->input->post('sd_tradeinfo_exempt_cb')) ? $this->input->post('sd_tradeinfo_exempt_cb') : 'no';
            $data['trade_inv_price']    = $this->input->post('sd_tradeinfo_allowance');
            $data['active']         = '0';
            // $inserted = $this->db->insert('trade', $data);

            $this->db->insert('trade', $data);
            $insert_id = $this->db->insert_id();

            $data['request_status'] = 'done';
            $data['trade_inv_id'] = $insert_id;
            echo json_encode($data);

    }

    public function insert_buyer()
    {
        // echo("<pre>");
        //print_r($_POST);
        // $this->form_validation->set_rules('sd_add_buyer_email', 'Email', 'required|is_unique[buyers.buyers_pri_email]',array('required' => 'You have not provided %s.', 'is_unique' => 'This %s already exists.'));
        // if ($this->form_validation->run() == FALSE)
        // {
        //     $error['request_status'] = 'error';
        //     $error['msg'] = validation_errors();

        //     echo json_encode($error);
        // }
        // else
        // {
            $member_id = $this->session->userdata('user_id');
            $data['member_id']              = $member_id;
            $data['buyers_first_name']      = $this->input->post('sd_add_buyer_firstname');
            $data['buyers_mid_name']        = $this->input->post('sd_add_buyer_middlename');
            $data['buyers_last_name']       = $this->input->post('sd_add_buyer_lastname');
            $data['buyers_pri_email']       = $this->input->post('sd_add_buyer_email');
            $data['buyers_address']         = $this->input->post('sd_add_buyer_address');
            $data['buyers_city']            = $this->input->post('sd_add_buyer_city');
            $data['buyers_county']          = $this->input->post('sd_add_buyer_country');
            $data['buyers_state']           = $this->input->post('sd_add_buyer_state');
            $data['buyers_zip']             = $this->input->post('sd_add_buyer_zip');
            $data['buyers_work_phone']      = $this->input->post('sd_add_buyer_workphone');
            $data['buyers_home_phone']      = $this->input->post('sd_add_buyer_homephone');
            $data['buyers_pri_phone_cell']  = $this->input->post('sd_add_buyer_mobile');
            $data['buyers_DL_number']       = $this->input->post('sd_add_buyer_dlnumber');
            $data['buyers_DL_state']        = $this->input->post('sd_add_buyer_dlstate');
            $data['buyers_DL_expire']       = $this->input->post('sd_add_buyer_dlexpire');
            $data['buyers_DL_dob']          = $this->input->post('sd_add_buyer_dldob');
            $data['buyers_temp_tag_number'] = $this->input->post('sd_add_buyer_temp_tag_number');
            $data['active']                 = '0';

            $this->db->insert('buyers', $data);
            $insert_id = $this->db->insert_id();

            $data['request_status'] = 'done';
            $data['buyers_id'] = $insert_id;
            echo json_encode($data);

        // }

    }

    public function insert_cobuyer()
    {

        // $this->form_validation->set_rules('sd_add_cobuyer_address', 'Email', 'required|is_unique[buyers.co_buyers_pri_email]',array('required' => 'You have not provided %s.', 'is_unique' => 'This %s already exists.'));
        // if ($this->form_validation->run() == FALSE)
        // {
        //     echo validation_errors();
        // }
        // else
        // {
            $member_id = $this->session->userdata('user_id');
            $data['co_buyers_first_name']       = $this->input->post('sd_add_cobuyer_firstname');
            $data['co_buyers_mid_name']         = $this->input->post('sd_add_cobuyer_middlename');
            $data['co_buyers_last_name']        = $this->input->post('sd_add_cobuyer_lastname');
            $data['co_buyers_pri_email']        = $this->input->post('sd_add_cobuyer_email');
            $data['co_buyers_address']          = $this->input->post('sd_add_cobuyer_address');
            $data['co_buyers_city']             = $this->input->post('sd_add_cobuyer_city');
            $data['co_buyers_county']           = $this->input->post('sd_add_cobuyer_country');
            $data['co_buyers_state']            = $this->input->post('sd_add_cobuyer_state');
            $data['co_buyers_zip']              = $this->input->post('sd_add_cobuyer_zip');
            $data['co_buyers_work_phone']       = $this->input->post('sd_add_cobuyer_workphone');
            $data['co_buyers_home_phone']       = $this->input->post('sd_add_cobuyer_homephone');
            $data['co_buyers_pri_phone_cell']   = $this->input->post('sd_add_cobuyer_mobile');
            $data['co_buyers_DL_number']        = $this->input->post('sd_add_cobuyer_dlnumber');
            $data['co_buyers_DL_state']         = $this->input->post('sd_add_cobuyer_dlstate');
            $data['co_buyers_DL_expire']        = $this->input->post('sd_add_cobuyer_dlexpire');
            $data['co_buyers_DL_dob']           = $this->input->post('sd_add_cobuyer_dldob');
            $this->db->where('buyers_id', $this->input->post('sd_add_cobuyer_buyerid'));
            $this->db->update('buyers', $data);

            $data['request_status'] = 'done';
            $data['buyers_id'] = $this->input->post('sd_add_cobuyer_buyerid');
            echo json_encode($data);
        // }

    }

    public function insert_insurance()
    {

            $data['ins_company']        = $this->input->post('sd_add_insurance_companyname');
            $data['ins_pol_num']        = $this->input->post('sd_add_insurance_policynumber');
            $data['ins_phone']          = $this->input->post('sd_add_insurance_agentphone');
            $data['ins_address']        = $this->input->post('sd_add_insurance_address');
            $data['ins_city']           = $this->input->post('sd_add_insurance_city');
            $data['ins_state']          = $this->input->post('sd_add_insurance_state');
            $data['ins_zip']            = $this->input->post('sd_add_insurance_zip');
            $data['ins_agent']          = $this->input->post('sd_add_insurance_agentname');
            $this->db->where('buyers_id', $this->input->post('sd_add_insurance_buyerid'));
            $this->db->update('buyers', $data);

            $data['request_status'] = 'done';
            $data['buyers_id'] = $this->input->post('sd_add_insurance_buyerid');
            echo json_encode($data);

    }

    public function getCobuyerData()
    {
        $cobuyer_data = $this->db->get_where('buyers',array('buyers_id' => $this->input->post('id')))->result_array();
        if($cobuyer_data)
            echo(json_encode($cobuyer_data));
        else
            echo "notfound";

    }

    public function getBuyerInvData()
    {
        //echo "<pre>";
        //print_r($_POST);
        // echo str_replace("$", "",$_POST['cal_total_interest']);
        //die();

				$buyer_data = $this->db->get_where('buyers',array('buyers_id' => $this->input->post('buyers_id')))->result_array();
				if($buyer_data){

					if($buyer_data[0]['sale_price'] == "" && $buyer_data[0]['trade_credit'] == ""){
						echo "mathupdate";
					}else {
		        $insertBuyer = array(
		            'cal_amount_finance'    => $_POST['cal_amount_finance'],
		            'cal_down_payment'      => $_POST['cal_down_payment'],
		            'cal_monthly_payment'   => str_replace(array('$',','), "",$_POST['cal_monthly_payment']),
		            'cal_total_interest'    => str_replace(array('$',','), "",$_POST['cal_total_interest']),
		            'bhph_months'           => $_POST['bhph_months'],
		            'bhph_rate'             => $_POST['bhph_rate'],
								'bhph_tpmts'            => str_replace(array('$',','), "",$_POST['bhph_tpmts']),
								'cal_biweekly_payment'         => str_replace(array('$',','), "",$_POST['cal_biweekly_payment']),
								'cal_biweekly_total_interest'  => str_replace(array('$',','), "",$_POST['cal_biweekly_total_interest']),
		            'cal_biweekly_total_payment'   => str_replace(array('$',','), "",$_POST['cal_biweekly_total_payment'])
		        );
		        $this->db->where('buyers_id', $this->input->post('buyers_id'));
		        $this->db->update('buyers', $insertBuyer);
		        $inv_data = array();
		        $trade_data = array();
		        $data = array();
		        if(!empty($this->input->post('inv_id')) && !empty($this->input->post('trade_inv_id'))){
		            // $data['status'] = "both";
		            $data[0] = array('status' => "both");
		            $inv_data = $this->db->get_where('inventory',array('inv_id' => $this->input->post('inv_id')))->result_array();
		            $trade_data = $this->db->get_where('trade',array('trade_inv_id' => $this->input->post('trade_inv_id')))->result_array();
		        }else{
		            if(!empty($this->input->post('inv_id'))){
		                $data[0] = array('status' => "inventory");
		                $inv_data = $this->db->get_where('inventory',array('inv_id' => $this->input->post('inv_id')))->result_array();
		            }else{
		                $data[0] = array('status' => "trade");
		                $trade_data = $this->db->get_where('trade',array('trade_inv_id' => $this->input->post('trade_inv_id')))->result_array();
		            }
		        }

						echo(json_encode(array_merge($data,$buyer_data,$inv_data,$trade_data)));
					}

				}else{
					echo "notfound";
				}

    }

    public function mathupdate()
    {
        // echo "<pre>";
        // print_r($_POST);
        // die();

        $buyers_id = $this->input->post('id');
        $data['sale_price'] = $this->input->post('sd_math_saleprice');
        $data['trade_credit'] = $this->input->post('sd_math_tradecredit');
        // $data['trade_balance'] = $this->input->post('sd_math_tradebalance');
				$data['cash_credit'] = $this->input->post('sd_math_cashcredit');
        $data['TAVT_price'] = $this->input->post('sd_math_tavtprice');
        $data['tax'] = $this->input->post('sd_math_taxdue');
        $data['dealer_fee'] = $this->input->post('sd_math_servicefee');
        $data['dmv'] = $this->input->post('sd_math_tagregistration');
        $data['total_due'] = $this->input->post('sd_math_totaldue');
        $data['sub_due'] = $this->input->post('sub_due');
        $data['sub_due1'] = $this->input->post('sub_due1');
        $data['sub_due2'] = $this->input->post('sub_due2');

        $this->db->where("buyers_id",$buyers_id);
        $this->db->update("buyers",$data);
        echo "done";

    }

    public function update_buyer()
    {
        // echo("<pre>");
        // print_r($_POST);

            //$member_id = $this->session->userdata('user_id');
            //$data['member_id']              = $member_id;
            $data['buyers_first_name']      = $this->input->post('sd_main_buyers_firstname');
            $data['buyers_mid_name']        = $this->input->post('sd_main_buyers_middlename');
            $data['buyers_last_name']       = $this->input->post('sd_main_buyers_lastname');
            $data['buyers_pri_email']       = $this->input->post('sd_main_buyers_email');
            $data['buyers_address']         = $this->input->post('sd_main_buyers_address');
            $data['buyers_city']            = $this->input->post('sd_main_buyers_city');
            $data['buyers_county']          = $this->input->post('sd_main_buyers_country');
            $data['buyers_state']           = $this->input->post('sd_main_buyers_state');
            $data['buyers_zip']             = $this->input->post('sd_main_buyers_zip');
            $data['buyers_work_phone']      = $this->input->post('sd_main_buyers_workphone');
            $data['buyers_home_phone']      = $this->input->post('sd_main_buyers_homephone');
            $data['buyers_pri_phone_cell']  = $this->input->post('sd_main_buyers_mobile');
            $data['buyers_DL_number']       = $this->input->post('sd_main_buyers_dlnumber');
            $data['buyers_DL_state']        = $this->input->post('sd_main_buyers_dlstate');
            $data['buyers_DL_expire']       = $this->input->post('sd_main_buyers_dlexpire');
            $data['buyers_DL_dob']          = $this->input->post('sd_main_buyers_dldob');
            $data['buyers_temp_tag_number'] = $this->input->post('sd_main_buyers_temp_tag_number');
            $this->db->where("buyers_id",$this->input->post('id'));
            $this->db->update("buyers",$data);

            echo "done";

    }

    public function update_inventory()
    {
        // echo("<pre>");
        // print_r($_POST);
        // die();

            // $data['inv_vin']        = $this->input->post('sd_main_inventory_vin');
            // $data['inv_stock']      = $this->input->post('sd_main_inventory_stocknumber');
            // $data['inv_year']       = $this->input->post('sd_main_inventory_year');
            // $data['inv_make']       = $this->input->post('sd_main_inventory_make');
            // $data['inv_model']      = $this->input->post('sd_main_inventory_model');
            // $data['inv_style']      = $this->input->post('sd_main_inventory_style');
            // $data['inv_color']      = $this->input->post('sd_main_inventory_color');
            // $data['inv_mileage']    = $this->input->post('sd_main_inventory_mileage');
            // $data['inv_price']      = $this->input->post('sd_main_inventory_price');
            // $data['inv_flrc']       = $this->input->post('sd_main_inventory_totalcost');


                $data['inv_vin']        = $this->input->post('sd_main_inventory_vin');
                $data['inv_stock']      = $this->input->post('sd_main_inventory_stocknumber');
                $data['inv_year']       = $this->input->post('sd_main_inventory_year');
                $data['inv_make']       = $this->input->post('sd_main_inventory_make');
                $data['inv_model']      = $this->input->post('sd_main_inventory_model');
                $data['inv_style']      = $this->input->post('sd_main_inventory_style');
								$data['inv_color']      = $this->input->post('sd_main_inventory_color');
								$data['drive_type']     = $this->input->post('sd_main_inventory_drivetype');
                $data['engine_size']    = $this->input->post('sd_main_inventory_enginesize');
                $data['inv_mileage']    = $this->input->post('sd_main_inventory_mileage');
                $data['inv_exempt']     = $this->input->post('sd_main_inventory_exempt_cb');
                $data['inv_cost']       = $this->input->post('sd_main_inventory_cost');
                $data['inv_addedcost']  = $this->input->post('sd_main_inventory_addedcost');
                $data['inv_price']      = $this->input->post('sd_main_inventory_price');
                $data['inv_flrc']       = $this->input->post('sd_main_inventory_totalcost');
                $this->db->where("inv_id",$this->input->post('inv_id'));
                $this->db->update("inventory",$data);
                echo "done";



    }

    public function update_trade()
    {
        echo("<pre>");
        print_r($_POST);
        die();
        $data['trade_inv_vin']        = $this->input->post('sd_main_trade_vin');
        $data['trade_inv_year']       = $this->input->post('sd_main_trade_year');
        $data['trade_inv_make']       = $this->input->post('sd_main_trade_make');
        $data['trade_inv_model']      = $this->input->post('sd_main_trade_model');
        $data['trade_inv_style']      = $this->input->post('sd_main_trade_style');
				$data['trade_inv_color']      = $this->input->post('sd_main_trade_color');
				$data['trade_drive_type']     = $this->input->post('sd_main_trade_drivetype');
        $data['trade_engine_size']    = $this->input->post('sd_main_trade_enginesize');
        $data['trade_inv_mileage']    = $this->input->post('sd_main_trade_mileage');
        $data['trade_inv_exempt']     = $this->input->post('sd_main_trade_exempt_cb');
        $data['trade_inv_price']      = $this->input->post('sd_main_trade_price');

        $this->db->where("trade_inv_id",$this->input->post('trade_inv_id'));
        $this->db->update("trade",$data);
         echo "done";
    }

    //deal save
    public function insert_deal()
    {

        // echo("<pre>");
        // print_r($_POST);
        // die();

            $member_id = $this->session->userdata('user_id');
            $data['buyers_id']      = $this->input->post('sd_main_buyers_id');
            $data['inv_id']         = $this->input->post('sd_main_inventory_inv_id');
            $data['trade_inv_id']   = $this->input->post('sd_main_trade_inv_id');
            $data['member_id']      = $member_id;
            $data['buyers_first_name']      = $this->input->post('sd_main_buyers_firstname');
            $data['buyers_mid_name']       = $this->input->post('sd_main_buyers_middlename');
            $data['buyers_last_name']       = $this->input->post('sd_main_buyers_lastname');
            $data['buyers_pri_email']       = $this->input->post('sd_main_buyers_email');
            $data['buyers_address']         = $this->input->post('sd_main_buyers_address');
            $data['buyers_city']            = $this->input->post('sd_main_buyers_city');
            $data['buyers_state']           = $this->input->post('sd_main_buyers_state');
            $data['buyers_zip']             = $this->input->post('sd_main_buyers_zip');
            $data['buyers_work_phone']      = $this->input->post('sd_main_buyers_workphone');
            $data['buyers_home_phone']      = $this->input->post('sd_main_buyers_homephone');
            $data['buyers_pri_phone_cell']  = $this->input->post('sd_main_buyers_mobile');
            $data['buyers_DL_number']       = $this->input->post('sd_main_buyers_dlnumber');
            $data['buyers_DL_state']        = $this->input->post('sd_main_buyers_dlstate');
            $data['buyers_DL_expire']       = $this->input->post('sd_main_buyers_dlexpire');
            $data['buyers_DL_dob']          = $this->input->post('sd_main_buyers_dldob');
            $data['buyers_temp_tag_number'] = $this->input->post('sd_main_buyers_temp_tag_number');

            if(empty($this->input->post('sd_main_cobuyers_id')) || $this->input->post('sd_main_cobuyers_id') == 0){
								$data['co_buyers_first_name']   = '';
								$data['co_buyers_last_name']    = '';
								$data['co_buyers_pri_email']    = '';
								$data['co_buyers_address']      = '';
								$data['co_buyers_city']         = '';
								$data['co_buyers_state']        = '';
								$data['co_buyers_zip']          = '';
								$data['co_buyers_work_phone']   = '';
								$data['co_buyers_home_phone']   = '';
								$data['co_buyers_pri_phone_cell'] = '';
								$data['co_buyers_DL_number']    = '';
								$data['co_buyers_DL_state']     = '';
								$data['co_buyers_DL_expire']    = '';
								$data['co_buyers_DL_dob']       = '';
            }else{

                $buyer_data = $this->db->get_where('buyers',array('buyers_id' => $this->input->post('sd_main_cobuyers_id')))->row();
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

            if(empty($this->input->post('sd_main_insurance_buyers_id')) || $this->input->post('sd_main_insurance_buyers_id') == 0){
								$data['ins_company']            = '';
								$data['ins_pol_num']            = '';
								$data['ins_phone']              = '';
								$data['ins_address']            = '';
								$data['ins_city']               = '';
								$data['ins_state']              = '';
								$data['ins_zip']                = '';
								$data['ins_agent']              = '';
            }else{
                $buyer_data = $this->db->get_where('buyers',array('buyers_id' => $this->input->post('sd_main_buyers_id')))->row();

                $data['ins_company']            = $buyer_data->ins_company;
                $data['ins_pol_num']            = $buyer_data->ins_pol_num;
                $data['ins_phone']              = $buyer_data->ins_phone;
                $data['ins_address']            = $buyer_data->ins_address;
                $data['ins_city']               = $buyer_data->ins_city;
                $data['ins_state']              = $buyer_data->ins_state;
                $data['ins_zip']                = $buyer_data->ins_zip;
                $data['ins_agent']              = $buyer_data->ins_agent;
            }

            $data['sale_price']             = $this->input->post('sd_main_calc_saleprice');
            $data['trade_credit']           = $this->input->post('sd_main_calc_tradecredit');
            // $data['trade_balance']          = $this->input->post('sd_main_calc_tradebalance');
            $data['cash_credit']            = $this->input->post('sd_main_calc_cashcredit');
            $data['tax']                    = $this->input->post('sd_main_calc_tax');
            $data['dealer_fee']             = $this->input->post('sd_main_calc_servicefee');
            $data['dmv']                    = $this->input->post('sd_main_calc_tagregistration');
            $data['total_due']              = $this->input->post('sd_main_calc_total_due');
            $data['sub_due']                = $this->input->post('sd_main_calc_sub_due');
            $data['sub_due1']               = $this->input->post('sd_main_calc_sub_due1');
            $data['sub_due2']               = $this->input->post('sd_main_calc_sub_due2');

            if(!empty($this->input->post('sd_main_inventory_inv_id')) && !empty($this->input->post('sd_main_trade_inv_id'))){

                $data['inv_vin']                = $this->input->post('sd_main_inventory_vin');
                $data['inv_stock']              = $this->input->post('sd_main_inventory_stocknumber');
                $data['inv_year']               = $this->input->post('sd_main_inventory_year');
                $data['inv_make']               = $this->input->post('sd_main_inventory_make');
                $data['inv_model']              = $this->input->post('sd_main_inventory_model');
                $data['inv_style']              = $this->input->post('sd_main_inventory_style');
								$data['inv_color']              = $this->input->post('sd_main_inventory_color');
								$data['drive_type']             = $this->input->post('sd_main_inventory_drivetype');
                $data['engine_size']            = $this->input->post('sd_main_inventory_enginesize');
                $data['inv_mileage']            = $this->input->post('sd_main_inventory_mileage');
                $data['inv_exempt']             = $this->input->post('sd_main_inventory_exempt_cb') ? $this->input->post('sd_main_inventory_exempt_cb') : 'no';
                $data['inv_cost']               = $this->input->post('sd_main_inventory_cost');
                $data['inv_addedcost']          = $this->input->post('sd_main_inventory_addedcost');
                $data['inv_price']              = $this->input->post('sd_main_inventory_price');
                $data['inv_flrc']               = $this->input->post('sd_main_inventory_totalcost');

                $data['trade_inv_vin']          = $this->input->post('sd_main_trade_vin');
                $data['trade_inv_year']         = $this->input->post('sd_main_trade_year');
                $data['trade_inv_make']         = $this->input->post('sd_main_trade_make');
                $data['trade_inv_model']        = $this->input->post('sd_main_trade_model');
                $data['trade_inv_style']        = $this->input->post('sd_main_trade_style');
								$data['trade_inv_color']        = $this->input->post('sd_main_trade_color');
								$data['trade_drive_type']       = $this->input->post('sd_main_trade_drivetype');
                $data['trade_engine_size']      = $this->input->post('sd_main_trade_enginesize');
                $data['trade_inv_mileage']      = $this->input->post('sd_main_trade_mileage');
                $data['trade_inv_exempt']       = $this->input->post('sd_main_trade_exempt_cb') ? $this->input->post('sd_main_trade_exempt_cb') : 'no';
                $data['trade_inv_price']        = $this->input->post('sd_main_trade_allowance');

            }else{

                if(!empty($this->input->post('sd_main_inventory_inv_id'))){

                    $data['inv_vin']                = $this->input->post('sd_main_inventory_vin');
                    $data['inv_stock']              = $this->input->post('sd_main_inventory_stocknumber');
                    $data['inv_year']               = $this->input->post('sd_main_inventory_year');
                    $data['inv_make']               = $this->input->post('sd_main_inventory_make');
                    $data['inv_model']              = $this->input->post('sd_main_inventory_model');
                    $data['inv_style']              = $this->input->post('sd_main_inventory_style');
                    $data['inv_color']              = $this->input->post('sd_main_inventory_color');
										$data['drive_type']             = $this->input->post('sd_main_inventory_drivetype');
		                $data['engine_size']            = $this->input->post('sd_main_inventory_enginesize');
                    $data['inv_mileage']            = $this->input->post('sd_main_inventory_mileage');
                    $data['inv_exempt']             = $this->input->post('sd_main_inventory_exempt_cb') ? $this->input->post('sd_main_inventory_exempt_cb') : 'no';
                    $data['inv_cost']               = $this->input->post('sd_main_inventory_cost');
                    $data['inv_addedcost']          = $this->input->post('sd_main_inventory_addedcost');
                    $data['inv_price']              = $this->input->post('sd_main_inventory_price');
                    $data['inv_flrc']               = $this->input->post('sd_main_inventory_totalcost');
                }
                if(!empty($this->input->post('sd_main_trade_inv_id'))){

                    $data['trade_inv_vin']          = $this->input->post('sd_main_trade_vin');
                    $data['trade_inv_year']         = $this->input->post('sd_main_trade_year');
                    $data['trade_inv_make']         = $this->input->post('sd_main_trade_make');
                    $data['trade_inv_model']        = $this->input->post('sd_main_trade_model');
                    $data['trade_inv_style']        = $this->input->post('sd_main_trade_style');
                    $data['trade_inv_color']        = $this->input->post('sd_main_trade_color');
										$data['trade_drive_type']       = $this->input->post('sd_main_trade_drivetype');
		                $data['trade_engine_size']      = $this->input->post('sd_main_trade_enginesize');
                    $data['trade_inv_mileage']      = $this->input->post('sd_main_trade_mileage');
                    $data['trade_inv_exempt']       = $this->input->post('sd_main_trade_exempt_cb') ? $this->input->post('sd_main_trade_exempt_cb') : 'no';
                    $data['trade_inv_price']        = $this->input->post('sd_main_trade_allowance');

                // $trade_data = $this->db->get_where('trade',array('trade_inv_id' => $this->input->post('sd_main_trade_inv_id')))->row();
                // $data['trade_inv_price']        = $trade_data->trade_inv_price;

                // $trade_data = $this->db->get_where('trade',array('trade_inv_id' => $this->input->post('sd_main_trade_inv_id')))->row();
                // $data['trade_inv_price']        = $trade_data->trade_inv_price;

                }
            }

            $data['transact']               = "";
            $data['sale_date']              = date('Y-m-d');
            $data['status']             = "pending_print";
            // if(empty($this->input->post('sd_main_transact_id'))){
            if($this->input->post('sd_main_transact_status') == "processing" || $this->input->post('sd_main_transact_status') == "pending_print"){
                $this->upadateDealCredit();
                $inserted = $this->db->insert('transactions', $data);
            }
            else{
                $this->db->where('transact_id', $this->input->post('sd_main_transact_id'));
                $inserted = $this->db->update('transactions', $data);
            }

            $data1['active']      = '1';
            $this->db->where("buyers_id",$this->input->post('sd_main_buyers_id'));
            $this->db->update("buyers",$data1);

            // $data2['active']      = '1';
            // $this->db->where("inv_id",$this->input->post('sd_main_inventory_inv_id'));
            // $this->db->update("inventory",$data2);

            // $data3['active']      = '1';
            // $this->db->where("trade_inv_id",$this->input->post('sd_main_trade_inv_id'));
            // $this->db->update("trade",$data3);

            if(!empty($this->input->post('sd_main_inventory_inv_id'))){
                $data2['active']      = '1';
                $this->db->where("inv_id",$this->input->post('sd_main_inventory_inv_id'));
                $this->db->update("inventory",$data2);
            }

            if(!empty($this->input->post('sd_main_trade_inv_id'))){
                $data3['active']      = '1';
                $this->db->where("trade_inv_id",$this->input->post('sd_main_trade_inv_id'));
                $this->db->update("trade",$data3);
            }

            $this->db->where("member_id",$member_id);
            $this->db->where("buyers_id",$this->input->post('sd_main_buyers_id'));
            $this->db->where("inv_id",$this->input->post('sd_main_inventory_inv_id'));
            $this->db->where("trade_inv_id",$this->input->post('sd_main_trade_inv_id'));
            $this->db->where("status",'processing');
            $this->db->delete("transactions");


            if($inserted) echo "done";


    }

		//deal close
    public function insert_deal_print()
    {


        // echo("<pre>");
        // print_r($_POST);
        // die();

            $member_id = $this->session->userdata('user_id');
            $data['buyers_id']      = $this->input->post('sd_main_buyers_id');
            $data['inv_id']         = $this->input->post('sd_main_inventory_inv_id');
            $data['trade_inv_id']   = $this->input->post('sd_main_trade_inv_id');
            $data['member_id']      = $member_id;
            $data['buyers_first_name']      = $this->input->post('sd_main_buyers_firstname');
            $data['buyers_mid_name']       = $this->input->post('sd_main_buyers_middlename');
            $data['buyers_last_name']       = $this->input->post('sd_main_buyers_lastname');
            $data['buyers_pri_email']       = $this->input->post('sd_main_buyers_email');
            $data['buyers_address']         = $this->input->post('sd_main_buyers_address');
            $data['buyers_city']            = $this->input->post('sd_main_buyers_city');
            $data['buyers_state']           = $this->input->post('sd_main_buyers_state');
            $data['buyers_zip']             = $this->input->post('sd_main_buyers_zip');
            $data['buyers_work_phone']      = $this->input->post('sd_main_buyers_workphone');
            $data['buyers_home_phone']      = $this->input->post('sd_main_buyers_homephone');
            $data['buyers_pri_phone_cell']  = $this->input->post('sd_main_buyers_mobile');
            $data['buyers_DL_number']       = $this->input->post('sd_main_buyers_dlnumber');
            $data['buyers_DL_state']        = $this->input->post('sd_main_buyers_dlstate');
            $data['buyers_DL_expire']       = $this->input->post('sd_main_buyers_dlexpire');
            $data['buyers_DL_dob']          = $this->input->post('sd_main_buyers_dldob');
            $data['buyers_temp_tag_number'] = $this->input->post('sd_main_buyers_temp_tag_number');

            if(empty($this->input->post('sd_main_cobuyers_id')) || $this->input->post('sd_main_cobuyers_id') == 0){

							$data['co_buyers_first_name']   = '';
							$data['co_buyers_last_name']    = '';
							$data['co_buyers_pri_email']    = '';
							$data['co_buyers_address']      = '';
							$data['co_buyers_city']         = '';
							$data['co_buyers_state']        = '';
							$data['co_buyers_zip']          = '';
							$data['co_buyers_work_phone']   = '';
							$data['co_buyers_home_phone']   = '';
							$data['co_buyers_pri_phone_cell'] = '';
							$data['co_buyers_DL_number']    = '';
							$data['co_buyers_DL_state']     = '';
							$data['co_buyers_DL_expire']    = '';
							$data['co_buyers_DL_dob']       = '';
            }else{

                $buyer_data = $this->db->get_where('buyers',array('buyers_id' => $this->input->post('sd_main_cobuyers_id')))->row();
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

            if(empty($this->input->post('sd_main_insurance_buyers_id')) || $this->input->post('sd_main_insurance_buyers_id') == 0){
								$data['ins_company']            = '';
								$data['ins_pol_num']            = '';
								$data['ins_phone']              = '';
								$data['ins_address']            = '';
								$data['ins_city']               = '';
								$data['ins_state']              = '';
								$data['ins_zip']                = '';
								$data['ins_agent']              = '';
            }else{
                $buyer_data = $this->db->get_where('buyers',array('buyers_id' => $this->input->post('sd_main_buyers_id')))->row();

                $data['ins_company']            = $buyer_data->ins_company;
                $data['ins_pol_num']            = $buyer_data->ins_pol_num;
                $data['ins_phone']              = $buyer_data->ins_phone;
                $data['ins_address']            = $buyer_data->ins_address;
                $data['ins_city']               = $buyer_data->ins_city;
                $data['ins_state']              = $buyer_data->ins_state;
                $data['ins_zip']                = $buyer_data->ins_zip;
                $data['ins_agent']              = $buyer_data->ins_agent;
            }

            $data['sale_price']             = $this->input->post('sd_main_calc_saleprice');
            $data['trade_credit']           = $this->input->post('sd_main_calc_tradecredit');
            // $data['trade_balance']          = $this->input->post('sd_main_calc_tradebalance');
            $data['cash_credit']            = $this->input->post('sd_main_calc_cashcredit');
            $data['tax']                    = $this->input->post('sd_main_calc_tax');
            $data['dealer_fee']             = $this->input->post('sd_main_calc_servicefee');
            $data['dmv']                    = $this->input->post('sd_main_calc_tagregistration');
            $data['total_due']              = $this->input->post('sd_main_calc_total_due');
            $data['sub_due']                = $this->input->post('sd_main_calc_sub_due');
            $data['sub_due1']               = $this->input->post('sd_main_calc_sub_due1');
            $data['sub_due2']               = $this->input->post('sd_main_calc_sub_due2');

            if(!empty($this->input->post('sd_main_inventory_inv_id')) && !empty($this->input->post('sd_main_trade_inv_id'))){
                $data['inv_vin']                = $this->input->post('sd_main_inventory_vin');
                $data['inv_stock']              = $this->input->post('sd_main_inventory_stocknumber');
                $data['inv_year']               = $this->input->post('sd_main_inventory_year');
                $data['inv_make']               = $this->input->post('sd_main_inventory_make');
                $data['inv_model']              = $this->input->post('sd_main_inventory_model');
                $data['inv_style']              = $this->input->post('sd_main_inventory_style');
                $data['inv_color']              = $this->input->post('sd_main_inventory_color');
								$data['drive_type']       			= $this->input->post('sd_main_inventory_drivetype');
                $data['engine_size']      			= $this->input->post('sd_main_inventory_enginesize');
                $data['inv_mileage']            = $this->input->post('sd_main_inventory_mileage');
                $data['inv_exempt']             = $this->input->post('sd_main_inventory_exempt_cb') ? $this->input->post('sd_main_inventory_exempt_cb') : 'no';
                $data['inv_cost']               = $this->input->post('sd_main_inventory_cost');
                $data['inv_addedcost']          = $this->input->post('sd_main_inventory_addedcost');
                $data['inv_price']              = $this->input->post('sd_main_inventory_price');
                $data['inv_flrc']               = $this->input->post('sd_main_inventory_totalcost');

                $data['trade_inv_vin']          = $this->input->post('sd_main_trade_vin');
                $data['trade_inv_year']         = $this->input->post('sd_main_trade_year');
                $data['trade_inv_make']         = $this->input->post('sd_main_trade_make');
                $data['trade_inv_model']        = $this->input->post('sd_main_trade_model');
                $data['trade_inv_style']        = $this->input->post('sd_main_trade_style');
                $data['trade_inv_color']        = $this->input->post('sd_main_trade_color');
								$data['trade_drive_type']       = $this->input->post('sd_main_trade_drivetype');
                $data['trade_engine_size']      = $this->input->post('sd_main_trade_enginesize');
                $data['trade_inv_mileage']      = $this->input->post('sd_main_trade_mileage');
                $data['trade_inv_exempt']       = $this->input->post('sd_main_trade_exempt_cb') ? $this->input->post('sd_main_trade_exempt_cb') : 'no';
                $data['trade_inv_price']        = $this->input->post('sd_main_trade_allowance');
            }else{
                if(!empty($this->input->post('sd_main_inventory_inv_id'))){

                    $data['inv_vin']                = $this->input->post('sd_main_inventory_vin');
                    $data['inv_stock']              = $this->input->post('sd_main_inventory_stocknumber');
                    $data['inv_year']               = $this->input->post('sd_main_inventory_year');
                    $data['inv_make']               = $this->input->post('sd_main_inventory_make');
                    $data['inv_model']              = $this->input->post('sd_main_inventory_model');
                    $data['inv_style']              = $this->input->post('sd_main_inventory_style');
                    $data['inv_color']              = $this->input->post('sd_main_inventory_color');
										$data['drive_type']       			= $this->input->post('sd_main_inventory_drivetype');
		                $data['engine_size']      			= $this->input->post('sd_main_inventory_enginesize');
                    $data['inv_mileage']            = $this->input->post('sd_main_inventory_mileage');
                    $data['inv_exempt']             = $this->input->post('sd_main_inventory_exempt_cb') ? $this->input->post('sd_main_inventory_exempt_cb') : 'no';
                    $data['inv_cost']               = $this->input->post('sd_main_inventory_cost');
                    $data['inv_addedcost']          = $this->input->post('sd_main_inventory_addedcost');
                    $data['inv_price']              = $this->input->post('sd_main_inventory_price');
                    $data['inv_flrc']               = $this->input->post('sd_main_inventory_totalcost');
                }
                if(!empty($this->input->post('sd_main_trade_inv_id'))){

                    $data['trade_inv_vin']          = $this->input->post('sd_main_trade_vin');
                    $data['trade_inv_year']         = $this->input->post('sd_main_trade_year');
                    $data['trade_inv_make']         = $this->input->post('sd_main_trade_make');
                    $data['trade_inv_model']        = $this->input->post('sd_main_trade_model');
                    $data['trade_inv_style']        = $this->input->post('sd_main_trade_style');
                    $data['trade_inv_color']        = $this->input->post('sd_main_trade_color');
										$data['trade_drive_type']       = $this->input->post('sd_main_trade_drivetype');
		                $data['trade_engine_size']      = $this->input->post('sd_main_trade_enginesize');
                    $data['trade_inv_mileage']      = $this->input->post('sd_main_trade_mileage');
                    $data['trade_inv_exempt']       = $this->input->post('sd_main_trade_exempt_cb') ? $this->input->post('sd_main_trade_exempt_cb') : 'no';
                    $data['trade_inv_price']        = $this->input->post('sd_main_trade_allowance');
                }
            }

            $data['transact']               = "";
            $data['sale_date']              = date('Y-m-d');
            $data['status']                 = "closed";

            // if(!empty($this->input->post('sd_main_trade_inv_id'))){
            //     $trade_data = $this->db->get_where('trade',array('trade_inv_id' => $this->input->post('sd_main_trade_inv_id')))->row();
            //     $data['trade_inv_price']        = $trade_data->trade_inv_price;
            // }
            if(empty($this->input->post('sd_main_calc_saleprice'))){
                $dataTrans['msg'] = "complete payment calculator section first to proceed further";
                $dataTrans['request_status'] = 'error';
                echo json_encode($dataTrans);
            }else{

                // if(empty($this->input->post('sd_main_transact_id'))){
                if($this->input->post('sd_main_transact_status') == "processing" || $this->input->post('sd_main_transact_status') == "pending_print"){

                	$this->upadateDealCredit();

                    if(!empty($this->input->post('sd_main_trade_inv_id'))){

                        $trade_data = $this->db->get_where('trade',array('trade_inv_id' => $this->input->post('sd_main_trade_inv_id')))->row();

                        $member_id = $this->session->userdata('user_id');
                        $dataInv['member_id']      = $member_id;
                        $dataInv['inv_vin']        = $trade_data->trade_inv_vin;
                        $dataInv['inv_stock']      = "0";
                        $dataInv['inv_year']       = $trade_data->trade_inv_year;
                        $dataInv['inv_make']       = $trade_data->trade_inv_make;
                        $dataInv['inv_model']      = $trade_data->trade_inv_model;
                        $dataInv['inv_style']      = $trade_data->trade_inv_style;
												$dataInv['inv_color']      = $trade_data->trade_inv_color;
												$dataInv['drive_type']     = $trade_data->trade_drive_type;
                        $dataInv['engine_size']    = $trade_data->trade_engine_size;
                        $dataInv['inv_mileage']    = $trade_data->trade_inv_mileage;
                        $dataInv['inv_exempt']     = $trade_data->trade_inv_exempt;
                        $dataInv['inv_cost']       = $trade_data->trade_inv_price;
                        $dataInv['inv_addedcost']  = "0";
                        $dataInv['inv_price']      = $trade_data->trade_inv_price;
                        $dataInv['inv_flrc']       = $trade_data->trade_inv_price;
                        $dataInv['active']         = '0';
                        $this->db->insert('inventory', $dataInv);

                        $this->db->where("inv_vin",$trade_data->trade_inv_vin);
                        $this->db->update("inventory",$dataInv);

                        $data3['active']      = '1';
                        $this->db->where("trade_inv_id",$this->input->post('sd_main_trade_inv_id'));
                        $this->db->update("trade",$data3);
                    }

                    $inserted = $this->db->insert('transactions', $data);
                    $dataTrans['transact_id'] = $this->db->insert_id();
                    $dataTrans['request_status'] = 'done';

                }else{
                    $this->db->where('transact_id', $this->input->post('sd_main_transact_id'));
                    $inserted = $this->db->update('transactions', $data);
                    $dataTrans['transact_id'] = $this->input->post('sd_main_transact_id');
                    $dataTrans['request_status'] = 'done';
                }



            $data1['active']      = '1';
            $this->db->where("buyers_id",$this->input->post('sd_main_buyers_id'));
            $this->db->update("buyers",$data1);

            if(!empty($this->input->post('sd_main_inventory_inv_id'))){
                $data2['active']      = '1';
                $this->db->where("inv_id",$this->input->post('sd_main_inventory_inv_id'));
                $this->db->update("inventory",$data2);
            }


            $this->db->where("member_id",$member_id);
            $this->db->where("buyers_id",$this->input->post('sd_main_buyers_id'));
            $this->db->where("inv_id",$this->input->post('sd_main_inventory_inv_id'));
            $this->db->where("trade_inv_id",$this->input->post('sd_main_trade_inv_id'));
						$this->db->where("status",'processing');
            $this->db->or_where("status",'pending_print');
            $this->db->delete("transactions");

            if($inserted) echo json_encode($dataTrans);

        }


    }

    public function insertProcessingDeal()
    {
        $inv_id         = $this->input->post('inv_id');
        $trade_inv_id   = $this->input->post('trade_inv_id');
        $buyers_id      = $this->input->post('buyers_id');

        $member_id = $this->session->userdata('user_id');
        $data['buyers_id']              = $buyers_id;
        $data['inv_id']                 = $inv_id;
        $data['trade_inv_id']           = $trade_inv_id;
        $data['member_id']              = $member_id;

        if (!empty($inv_id)) {

            $inventory_data = $this->db->get_where('inventory',array('inv_id' => $inv_id))->row();

            $data['inv_vin']                = $inventory_data->inv_vin;
            $data['inv_stock']              = $inventory_data->inv_stock;
            $data['inv_year']               = $inventory_data->inv_year;
            $data['inv_make']               = $inventory_data->inv_make;
            $data['inv_model']              = $inventory_data->inv_model;
            $data['inv_style']              = $inventory_data->inv_style;
						$data['inv_color']              = $inventory_data->inv_color;
						$data['drive_type']             = $inventory_data->drive_type;
            $data['engine_size']            = $inventory_data->engine_size;
            $data['inv_mileage']            = $inventory_data->inv_mileage;
            $data['inv_exempt']             = $inventory_data->inv_exempt;
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
						$data['trade_drive_type']             = $trade_data->trade_drive_type;
            $data['trade_engine_size']            = $trade_data->trade_engine_size;
            $data['trade_inv_mileage']            = $trade_data->trade_inv_mileage;
            $data['trade_inv_exempt']             = $trade_data->trade_inv_exempt;
            $data['trade_inv_price']              = $trade_data->trade_inv_price;
            // }
        }

        $data['transact']               = "";
        $data['sale_date']              = date('Y-m-d');


        if(empty($this->input->post('sd_main_transact_id'))){
            $data['status']                 = "processing";
            $this->db->insert('transactions', $data);
            $insert_id = $this->db->insert_id();
            $data['transact_id'] = $insert_id;
            echo json_encode($data);
        }
        else{
            $this->db->where('transact_id', $this->input->post('sd_main_transact_id'));
            $this->db->update('transactions', $data);
            $data['transact_id'] = $this->input->post('sd_main_transact_id');
            $data['status']                 = "";
            echo json_encode($data);
        }

        // $data1['active']      = '1';
        // $this->db->where("buyers_id",$this->input->post('sd_main_buyers_id'));
        // $this->db->update("buyers",$data1);

        // $data2['active']      = '1';
        // $this->db->where("inv_id",$this->input->post('sd_main_inventory_inv_id'));
        // $this->db->update("inventory",$data2);

        // $data3['active']      = '1';
        // $this->db->where("trade_inv_id",$this->input->post('sd_main_trade_inv_id'));
        // $this->db->update("trade",$data3);

    }

		public function deal_not_closed()
		{
			// echo("<pre>");
			// print_r($_POST);
			// die();

			if(empty($this->input->post('sd_main_transact_id'))){
					$data['request_status'] = "notfound";
					$data['msg'] = 'Oops! Something went wrong. Please reload this page.';
					echo json_encode($data);
			}
			else{

					$transactions_data = $this->db->get_where('transactions',array('transact_id' => $this->input->post('sd_main_transact_id')))->row();


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

					$this->db->where("transact_id",$this->input->post('sd_main_transact_id'));
					$this->db->update("transactions",array('status' => 'deal_not_closed'));


					$this->db->where("transact_id",$this->input->post('sd_main_transact_id'));
					$this->db->where("status",'processing');
					$this->db->or_where("status",'pending_print');
					$this->db->delete("transactions");

					$data['request_status']      = "done";
					$data['msg']                 = "Deal removed from saved deal list.";
					echo json_encode($data);
			}
		}

		public function documents()
    {
        // echo "<pre>";
        // print_r($_POST);
        // die();

        if(empty($_POST)) redirect(base_url().'yourdeal');

        $page_data['page_title']    = 'Documents - Bubba DMS';


        $inv_id         = $this->input->post('inv_id');
        $trade_inv_id   = $this->input->post('trade_inv_id');
        $buyers_id      = $this->input->post('buyers_id');
        $transact_id    = $this->input->post('transact_id');

        if($inv_id != '0'){
            $page_data['inventory_data'] = $this->db->get_where('inventory',array('inv_id' => $inv_id))->row();//row2
            $page_data['inventory_data']->inv_mileage = $page_data['inventory_data']->inv_exempt == "yes" ? "Exempt" : $page_data['inventory_data']->inv_mileage;
        }else{
            $page_data['inventory_data'] = $this->db->get_where('transactions',array('transact_id' => $transact_id))->row();//row2
            $page_data['inventory_data']->inv_mileage = $page_data['inventory_data']->inv_exempt == "yes" ? "Exempt" : $page_data['inventory_data']->inv_mileage;
        }


        if($trade_inv_id != '0'){
            $page_data['trade_data'] = $this->db->get_where('trade',array('trade_inv_id' => $trade_inv_id))->row();//row4
            $page_data['trade_data']->trade_inv_mileage = $page_data['trade_data']->trade_inv_exempt == "yes" ? "Exempt" : $page_data['trade_data']->trade_inv_mileage;
        }else{
            $page_data['trade_data'] = $this->db->get_where('transactions',array('transact_id' => $transact_id))->row();//row4
            $page_data['trade_data']->trade_inv_mileage = $page_data['trade_data']->trade_inv_exempt == "yes" ? "Exempt" : $page_data['trade_data']->trade_inv_mileage;
        }

        $page_data['buyers_data'] = $this->db->get_where('buyers',array('buyers_id' => $buyers_id))->row();//row
        $page_data['memberdata'] = $this->db->get_where('memberlogin_members',array('id' => $this->session->userdata('user_id')))->row();//row3

        $page_data['state']    = $page_data['memberdata']->state;

        $page_data['transact_data'] = $this->db->get_where('transactions',array('transact_id' => $transact_id))->row();//row2
        if(!empty($page_data['transact_data']->inv_vin)){
            $page_data['transact_data']->inv_mileage = $page_data['transact_data']->inv_exempt == "yes" ? "Exempt" : $page_data['transact_data']->inv_mileage;
        }
        if(!empty($page_data['transact_data']->trade_inv_vin)){
            $page_data['transact_data']->trade_inv_mileage = $page_data['transact_data']->trade_inv_exempt == "yes" ? "Exempt" : $page_data['transact_data']->trade_inv_mileage;
        }

				if(empty($page_data['transact_data']->co_buyers_first_name)){
						$page_data['buyers_data']->co_buyers_first_name = '';
						$page_data['buyers_data']->co_buyers_last_name = '';
						$page_data['buyers_data']->co_buyers_pri_email = '';
						$page_data['buyers_data']->co_buyers_address = '';
						$page_data['buyers_data']->co_buyers_city = '';
						$page_data['buyers_data']->co_buyers_state = '';
						$page_data['buyers_data']->co_buyers_zip = '';
						$page_data['buyers_data']->co_buyers_work_phone = '';
						$page_data['buyers_data']->co_buyers_home_phone = '';
						$page_data['buyers_data']->co_buyers_pri_phone_cell = '';
						$page_data['buyers_data']->co_buyers_DL_number = '';
						$page_data['buyers_data']->co_buyers_DL_state = '';
						$page_data['buyers_data']->co_buyers_DL_expire = '';
						$page_data['buyers_data']->co_buyers_DL_dob = '';
				}

				if(empty($page_data['transact_data']->ins_company)){
						$page_data['buyers_data']->ins_company = '';
						$page_data['buyers_data']->ins_pol_num = '';
						$page_data['buyers_data']->ins_phone = '';
						$page_data['buyers_data']->ins_address = '';
						$page_data['buyers_data']->ins_city = '';
						$page_data['buyers_data']->ins_state = '';
						$page_data['buyers_data']->ins_zip = '';
						$page_data['buyers_data']->ins_agent = '';
				}
        // echo "<pre>";
        // print_r($page_data['transact_data']);
        // die();

        $sale_price = empty($page_data['buyers_data']->sale_price) ? "0":$page_data['buyers_data']->sale_price;
        $dealer_fee = empty($page_data['buyers_data']->dealer_fee) ? "0":$page_data['buyers_data']->dealer_fee;
        $tax = empty($page_data['buyers_data']->tax) ? "0":$page_data['buyers_data']->tax;
        $page_data['d'] = ($sale_price + $dealer_fee + $tax);

        $phoneNumber ="";
        if(!empty($page_data['buyers_data']->buyers_home_phone))
        $phoneNumber = $page_data['buyers_data']->buyers_home_phone;
        elseif (!empty($page_data['buyers_data']->buyers_work_phone))
        $phoneNumber = $page_data['buyers_data']->buyers_work_phone;
        else
        $phoneNumber = $page_data['buyers_data']->buyers_pri_phone_cell;

        $co_phoneNumber ="";
        if(!empty($page_data['buyers_data']->co_buyers_home_phone))
        $co_phoneNumber = $page_data['buyers_data']->co_buyers_home_phone;
        elseif (!empty($page_data['buyers_data']->co_buyers_work_phone))
        $co_phoneNumber = $page_data['buyers_data']->co_buyers_work_phone;
        else
        $co_phoneNumber = $page_data['buyers_data']->co_buyers_pri_phone_cell;

        // echo date('Y-m-d\TH:i:s', strtotime($page_data['transact_data']->sale_date)).'.00Z';
        // echo $page_data['transact_data']->sale_date;
        $data = array(
            "dealerNumber" => $this->session->userdata('user_id'),
            "dealNumber" => $transact_id,
            "vendorId"=> "f0da3a86-2714-47a7-85f4-17d2b059d2b5",
            "deal" => array (
                "dealDate" => date('Y-m-d\TH:i:s', strtotime($page_data['transact_data']->sale_date)).'.00Z',
                "dealNumber" => $transact_id,
                "dealType" => "Cash",
                "insurancePolicyNumber" => $page_data['buyers_data']->ins_pol_num
            ),
            "buyer" => array (
                "dmsCustomerNumber" => "",
                "customerType" => "B",
                "companyName" => $page_data['memberdata']->company_name,
                "firstName" => $page_data['buyers_data']->buyers_first_name,
                "middleName" => $page_data['buyers_data']->buyers_mid_name,
                "lastName" => $page_data['buyers_data']->buyers_last_name,
                "nameSuffix" => "",
                "residentialStreetAddress" => $page_data['buyers_data']->buyers_address,
                "residentialStreetAddress2" => "",
                "residentialCity" => $page_data['buyers_data']->buyers_city,
                "residentialState" => $page_data['buyers_data']->buyers_state,
                "residentialZipCode" => $page_data['buyers_data']->buyers_zip,
                "residentialZipPlus4" => "",
                "mailingStreetAddress" => "",
                "mailingStreetAddress2" => "",
                "mailingCity" => "",
                "mailingState" => "",
                "mailingZipCode" => "",
                "mailingZipPlus4" => "",
                "phoneNumber" => $phoneNumber,
                "phoneNumberExt" => "",
                "emailAddress" => $page_data['buyers_data']->buyers_pri_email,
                "gender" => "",
                "birthDate" => date('Y-m-d\TH:i:s', strtotime($page_data['buyers_data']->buyers_DL_dob)).'.00Z',
                "driverLicenseNumber" => $page_data['buyers_data']->buyers_DL_number,
                "feid" => "",
                "feidSuffix" => ""
            ),
            "cobuyer" => array (
                "dmsCustomerNumber" => "",
                "customerType" => "B",
                "companyName" => $page_data['memberdata']->company_name,
                "firstName" => $page_data['buyers_data']->co_buyers_first_name,
                "middleName" => $page_data['buyers_data']->co_buyers_mid_name,
                "lastName" => $page_data['buyers_data']->co_buyers_last_name,
                "nameSuffix" => "",
                "residentialStreetAddress" => $page_data['buyers_data']->co_buyers_address,
                "residentialStreetAddress2" => "",
                "residentialCity" => $page_data['buyers_data']->co_buyers_city,
                "residentialState" => $page_data['buyers_data']->co_buyers_state,
                "residentialZipCode" => $page_data['buyers_data']->co_buyers_zip,
                "residentialZipPlus4" => "",
                "mailingStreetAddress" => "",
                "mailingStreetAddress2" => "",
                "mailingCity" => "",
                "mailingState" => "",
                "mailingZipCode" => "",
                "mailingZipPlus4" => "",
                "phoneNumber" => $co_phoneNumber,
                "phoneNumberExt" => "",
                "emailAddress" => $page_data['buyers_data']->co_buyers_pri_email,
                "gender" => "",
                "birthDate" => date('Y-m-d\TH:i:s', strtotime($page_data['buyers_data']->co_buyers_DL_dob)).'.00Z',
                "driverLicenseNumber" => $page_data['buyers_data']->co_buyers_DL_number,
                "feid" => "",
                "feidSuffix" => ""
            ),
            "lessor" => array (
                "lessorName" => "",
                "streetAddress" => "",
                "streetAddress2" => "",
                "city" => "",
                "state" => "",
                "zipCode" => "",
                "zipPlus4" => "",
                "feid" => "",
                "feidSuffix" => ""
            ),
            "lienholders" => array (),
            "saleVehicle" => array (
                "stockNumber" => $page_data['transact_data']->inv_stock,
                "newOrUsed" => null,
                "netWeight" => null,
                "listPrice" => null,
                "retailPrice" => null,
                "salePrice" => (float)$page_data['transact_data']->sale_price,
                "rebate" => null,
                "acquisitionFee" => (float)$page_data['transact_data']->dealer_fee,
                "downPayment" => (float)$page_data['transact_data']->cash_credit,
                "amountFinanced" => (float)$page_data['transact_data']->total_due,
                "baseLeasePayment" => null,
                "securityDeposit" => null,
                "totalOfPayments" => (float)$page_data['buyers_data']->bhph_months,
                "yearMake" => (float)$page_data['transact_data']->inv_year,
                "odometerMileage" => (float)$page_data['transact_data']->inv_mileage,
                "vehicleIdentificationNumber" => $page_data['transact_data']->inv_vin,
                "makeTypeCode" => $page_data['transact_data']->inv_make,
                "bodyTypeCode" => $page_data['transact_data']->inv_style,
                "fuelTypeCode" => null,
                "grossVehicleWeight" => null,
                "modelName" => $page_data['transact_data']->inv_model,
                "majorColorCode" => $page_data['transact_data']->inv_color,
                "minorColorCode" => null,
                "payoffAmount" => null,
                "bankName" => null,
                "tradeAllowance" => (float)$page_data['transact_data']->trade_credit,
                "taxes" => array (
                    "additionalProp1" => (float)$page_data['transact_data']->tax,
                    "additionalProp2" => null,
                    "additionalProp3" => null
                )
            ),
            "tradeVehicles" => $page_data['transact_data']->trade_inv_vin ? array (
                "stockNumber" => null,
                "newOrUsed" => null,
                "netWeight" => null,
                "listPrice" => null,
                "retailPrice" => null,
                "salePrice" => (float)$page_data['transact_data']->sale_price,
                "rebate" => null,
                "acquisitionFee" => (float)$page_data['transact_data']->dealer_fee,
                "downPayment" => (float)$page_data['transact_data']->cash_credit,
                "amountFinanced" => (float)$page_data['transact_data']->total_due,
                "baseLeasePayment" => null,
                "securityDeposit" => null,
                "totalOfPayments" => (float)$page_data['buyers_data']->bhph_months,
                "yearMake" => (float)$page_data['transact_data']->trade_inv_year,
                "odometerMileage" => (float)$page_data['transact_data']->trade_inv_mileage,
                "vehicleIdentificationNumber" => $page_data['transact_data']->trade_inv_vin,
                "makeTypeCode" => $page_data['transact_data']->trade_inv_make,
                "bodyTypeCode" => $page_data['transact_data']->trade_inv_style,
                "fuelTypeCode" => null,
                "grossVehicleWeight" => null,
                "modelName" => $page_data['transact_data']->trade_inv_model,
                "majorColorCode" => $page_data['transact_data']->trade_inv_color,
                "minorColorCode" => null,
                "payoffAmount" => null,
                "bankName" => null,
                "tradeAllowance" => (float)$page_data['transact_data']->trade_credit,
                "taxes" => array (
                    "additionalProp1" => (float)$page_data['transact_data']->tax,
                    "additionalProp2" => null,
                    "additionalProp3" => null
                )
            ) : array ()
        );

        $postdata = json_encode($data);

        // if($_SERVER['REMOTE_ADDR'] == '108.62.49.149'){
            // echo "<pre>";
            // print_r($postdata);


            $ch = curl_init('https://dmsvendorapi.services.qa.dlrdmv.com/api/Dms/StoreDeal');
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($ch, CURLOPT_HTTPHEADER,
                array(
                    'Content-Type: application/json',
                    'Authorization: Basic ZTkzOTM3MzYtYzNhNy00M2QyLWI3YjQtZWQzYjQ0NGE3N2UyOmM4MWViZjhjLTExNGYtNGNkOC1iYTg0LTM2MDg3NjJkYTAwNg=='
                )
            );
            $result = curl_exec($ch);
            curl_close($ch);
            // print_r ($result);
            // die();
        // }

            // 20200924144922
            // https://bubbadms.com/startdeal/documents

            // {
            //   "status": true,
            //   "results": {

            //   },
            //   "messages": null
            // }


        $page_data['date'] = $this->input->post('sd_main_readyprint_date');
        $page_data['calltype'] = 'web';
        $this->load->view('documents',$page_data);
    }

    public function contracts()
    {
        // echo "<pre>";
        // print_r($_POST);
        // die();
        $page_data['page_title']    = 'Contracts - Bubba DMS';

        $inv_id         = $this->input->post('inv_id');
        $trade_inv_id   = $this->input->post('trade_inv_id');
        $buyers_id      = $this->input->post('buyers_id');
        $transact_id    = $this->input->post('transact_id');



        //trade_inv_id='$trade', bhph_rate='$bhrate', bhph_tpmts='$bhpmts', bhph_months='$bhmo', bhph_pmtdate='$bhdate'
        $data['trade_inv_id'] = $trade_inv_id;
        $data['inv_id'] = $inv_id;
        $data['sale_date'] = $this->input->post('sd_main_bhphcontract_date');
        $data['bhph_rate'] = $this->input->post('sd_main_bhphcontract_interest_rate');
        $data['bhph_tpmts'] = $this->input->post('sd_main_bhphcontract_total_payments');
        $data['bhph_months'] = $this->input->post('sd_main_bhphcontract_number_payments');
				// $data['bhph_pmtdate'] = $this->input->post('sd_main_bhphcontract_payment_schedule');
        $data['bhph_pmtdate'] = $this->input->post('sd_main_bhphcontract_payment_schedule_start').' - '.$this->input->post('sd_main_bhphcontract_payment_schedule_end');
        $this->db->where('buyers_id', $buyers_id);
        $this->db->update('buyers', $data);

				if($inv_id != '0'){
            $page_data['inventory_data'] = $this->db->get_where('inventory',array('inv_id' => $inv_id))->row();//row2
            $page_data['inventory_data']->inv_mileage = $page_data['inventory_data']->inv_exempt == "yes" ? "Exempt" : $page_data['inventory_data']->inv_mileage;

        }else{
            $page_data['inventory_data'] = $this->db->get_where('transactions',array('transact_id' => $transact_id))->row();//row2
            $page_data['inventory_data']->inv_mileage = $page_data['inventory_data']->inv_exempt == "yes" ? "Exempt" : $page_data['inventory_data']->inv_mileage;

        }
        if($trade_inv_id != '0'){
            $page_data['trade_data'] = $this->db->get_where('trade',array('trade_inv_id' => $trade_inv_id))->row();//row4
            $page_data['trade_data']->trade_inv_mileage = $page_data['trade_data']->trade_inv_exempt == "yes" ? "Exempt" : $page_data['trade_data']->trade_inv_mileage;
        }else{
            $page_data['trade_data'] = $this->db->get_where('transactions',array('transact_id' => $transact_id))->row();//row4
            $page_data['trade_data']->trade_inv_mileage = $page_data['trade_data']->trade_inv_exempt == "yes" ? "Exempt" : $page_data['trade_data']->trade_inv_mileage;
        }
        $page_data['buyers_data'] = $this->db->get_where('buyers',array('buyers_id' => $buyers_id))->row();//row
        $page_data['memberdata'] = $this->db->get_where('memberlogin_members',array('id' => $this->session->userdata('user_id')))->row();//row3

        $page_data['date'] = $this->input->post('sd_main_bhphcontract_date');

        $page_data['bhpmts'] = empty($_POST["sd_main_bhphcontract_total_payments"]) ? "0":$_POST["sd_main_bhphcontract_total_payments"];
        //$bhmo = $_POST["bhph_months"];
        //$bhdate = $_POST["bhph_pmtdate"];
        $page_data['bhpmt'] = empty($_POST["sd_main_bhphcontract_payment_amount"]) ? "0":$_POST["sd_main_bhphcontract_payment_amount"];
        //$bhtfee = $_POST["bhph_tfee"];
        $page_data['bhttppd'] = empty($_POST["sd_main_bhphcontract_tot_price_paid"]) ? "0":$_POST["sd_main_bhphcontract_tot_price_paid"];
        $page_data['bhtfin'] = empty($_POST["sd_main_bhphcontract_tot_finance_amt"]) ? "0":$_POST["sd_main_bhphcontract_tot_finance_amt"];
        $page_data['bhtch'] = empty($_POST["sd_main_bhphcontract_finance_charge"]) ? "0":$_POST["sd_main_bhphcontract_finance_charge"];
        $sale_price = empty($page_data['buyers_data']->sale_price) ? "0":$page_data['buyers_data']->sale_price;
        $dealer_fee = empty($page_data['buyers_data']->dealer_fee) ? "0":$page_data['buyers_data']->dealer_fee;
        $tax = empty($page_data['buyers_data']->tax) ? "0":$page_data['buyers_data']->tax;
        $page_data['d'] = ($sale_price + $dealer_fee + $tax);

        $page_data['calltype'] = 'web';

        $this->load->view('contracts',$page_data);
    }

    //for pay per deal only
    public function upadateDealCredit()
    {
        $userdata = $this->db->get_where('memberlogin_members',array('id' => $this->session->userdata('user_id')))->row();
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
