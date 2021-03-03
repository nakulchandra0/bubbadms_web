<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends CI_Controller {



	function __construct()
    {
        parent::__construct();
        
        //$this->load->library('facebook');

        if(_is_front_login()){}else{redirect(base_url());}
        if(_is_user_expired()){redirect(base_url().'buypack');}else{}
        
        
    }

	public function index()
	{
        $page_data['page_title']    = 'Reports - Bubba DMS';

        $member_id = $this->session->userdata('user_id');

        // $page_data['inventory_data'] = $this->db->get_where('inventory',array('member_id' => $member_id,'active'=>'0'))->result_array();//row2
        // $page_data['deal_data'] = $this->db->get_where('transactions',array('member_id' => $member_id,'status'=>'closed'))->result_array();

        $this->db->select('*'); 
        $this->db->from('transactions');   
        $this->db->where('member_id', $member_id);
        $this->db->where('status', 'closed');
        $this->db->order_by('transact_id','DESC');
        $page_data['deal_data'] = $this->db->get()->result_array();

        // echo "<pre>";
        //  print_r($page_data['deal_data']);
        //  die();
		$this->load->view('reports',$page_data);
	}

    public function getcustomreport()
    {
         // echo "<pre>";
         // print_r($_POST);
        //$startdate = str_replace('/', '-', $this->input->post('sales_report_date_start'));
        $member_id = $this->session->userdata('user_id');
        $startdate = $this->input->post('sales_report_date_start');
        $enddate = $this->input->post('sales_report_date_end');
        
        // $page_data['deal_data'] = $this->db->get_where('transactions',array('member_id' => $member_id,'status'=>'closed'))->result_array();
        // $this->db->where('sale_date >=', date('Y-m-d',strtotime($startdate)));
        // $this->db->where('sale_date <=', date('Y-m-d',strtotime($enddate)));
        // $this->db->where('status', 'closed');
        // $data['deal_data'] = $this->db->get('transactions')->result_array();

        $SQL = "SELECT * FROM transactions where member_id = ".$member_id." and sale_date between '".date('Y-m-d',strtotime($startdate))."' and '".date('Y-m-d',strtotime($enddate))."' and status = 'closed' ";
        //echo $SQL;
        
        $query = $this->db->query($SQL);
        $deal_data = $query->result(); 
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

        $data['request_status'] = 'done';
        echo json_encode($data);

    }
}
