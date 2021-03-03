<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Math extends CI_Controller {



	function __construct()
    {
        parent::__construct();
        
        //$this->load->library('facebook');

        if(_is_front_login()){}else{redirect(base_url());}
        if(_is_user_expired()){redirect(base_url().'buypack');}else{}
        
        
    }

	public function index()
	{
        $page_data['page_title']    = 'Math - Bubba DMS';

        $page_data['memberdata'] = $this->db->get_where('memberlogin_members',array('id' => $this->session->userdata('user_id')))->row();
        $page_data['buyer_data'] = $this->db->get_where('buyers',array('member_id' => $this->session->userdata('user_id')))->result_array();

		$this->load->view('math',$page_data);
	}

    public function mathupdate()
    {
        // echo "<pre>";
        // print_r($_POST);
        // die();

        $buyers_id = $this->input->post('math_buyer_select');
        $data['sale_price'] = $this->input->post('math_saleprice');
        $data['trade_credit'] = $this->input->post('math_tradecredit');
        $data['trade_balance'] = $this->input->post('math_tradebalance');
        $data['cash_credit'] = $this->input->post('math_cashcredit');
        $data['tax'] = $this->input->post('math_taxdue');
        $data['dealer_fee'] = $this->input->post('math_servicefee');
        $data['dmv'] = $this->input->post('math_tagregistration');
        $data['total_due'] = $this->input->post('math_totaldue');
        $data['sub_due'] = $this->input->post('sub_due');
        $data['sub_due1'] = $this->input->post('sub_due1');
        $data['sub_due2'] = $this->input->post('sub_due2');

        $this->db->where("buyers_id",$buyers_id);
        $this->db->update("buyers",$data);
        echo "done";
   
    }
}
