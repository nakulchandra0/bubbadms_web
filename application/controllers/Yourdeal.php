<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Yourdeal extends CI_Controller {



	function __construct()
    {
        parent::__construct();

        //$this->load->library('facebook');

        if(_is_front_login()){}else{redirect(base_url());}

        if(_is_user_expired()){redirect(base_url().'buypack');}else{}

    }

	public function index()
	{
        $page_data['page_title']    = 'Your Deal - Bubba DMS';

        $member_id = $this->session->userdata('user_id');
        $this->db->order_by("transact_id", "desc");
        $page_data['deal_data'] = $this->db->get_where('transactions',array('member_id' => $member_id))->result_array();

		$this->load->view('your_deal',$page_data);
	}

    public function delete_deal()
    {
        $this->db->where('transact_id', $this->input->post('id'));
        $this->db->delete('transactions');
        echo "done";
    }

    // public function getTransactionData()
    // {
    //     $transaction_data = $this->db->get_where('transactions',array('transact_id' => $this->input->post('id')))->result_array();
    //     if($transaction_data)
    //         echo(json_encode($transaction_data));
    //     else
    //         echo "notfound";

    // }
    // public function editstartdeal()
    // {
    //    //$page_data['transaction_data'] = $this->db->get_where('transactions',array('transact_id' => $this->input->post('id')))->row();
    //     $page_data['page_title']    = 'Start Deal - Bubba DMS';

    //     $member_id = $this->session->userdata('user_id');
    //     $page_data['inventory_data'] = $this->db->get_where('inventory',array('member_id' => $member_id,'active'=>'0'))->result_array();
    //     $page_data['trade_data'] = $this->db->get_where('trade',array('member_id' => $member_id,'active'=>'0'))->result_array();
    //     $page_data['buyers_data'] = $this->db->get_where('buyers',array('member_id' => $member_id,'active'=>'0'))->result_array();
    //     $page_data['memberdata'] = $this->db->get_where('memberlogin_members',array('id' => $member_id))->row();

    //     $page_data['transaction_data'] = "";
    //     if($this->input->post('id') != null){
    //         $page_data['transaction_data'] = $this->db->get_where('transactions',array('transact_id' => $this->input->post('id')))->row();
    //     }

    //     $this->load->view('start_deal',$page_data);
    // }
}
