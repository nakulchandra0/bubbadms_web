<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Startdealview extends CI_Controller {



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

        $page_data['page_title']    = 'Start Deal View - Bubba DMS';

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
								if ($page_data['inventory_data'])$page_data['buyers_trans_data']->sale_price = $page_data['inventory_data'][0]['inv_price']; else $page_data['buyers_trans_data']->sale_price = '0';

								if ($page_data['trade_data']) $page_data['buyers_trans_data']->trade_credit = $page_data['trade_data'][0]['trade_inv_price']; else $page_data['buyers_trans_data']->trade_credit = '0';

						}
        }else{
					redirect(base_url().'yourdeal');
        }
		$this->load->view('start_deal_view',$page_data);
	}


}
