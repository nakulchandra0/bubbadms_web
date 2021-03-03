<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dealer extends CI_Controller {



	function __construct()
    {
        parent::__construct();
        
        //$this->load->library('facebook');

        if(_is_front_login()){}else{redirect(base_url());}
        if(_is_user_expired()){redirect(base_url().'buypack');}else{}
        
    }

	public function index()
	{
        $page_data['page_title']    = 'Dealer - Bubba DMS';

		$this->load->view('dealer',$page_data);
	}

    public function profile()
    {
        $page_data['page_title']    = 'Dealer Profile - Bubba DMS';

        $member_id = $this->session->userdata('user_id');
        $page_data['memberdata'] = $this->db->get_where('memberlogin_members',array('id '=>$member_id))->row();
        $page_data['states'] = $this->db->get('memberlogin_state')->result_array();

        $this->load->view('profile',$page_data);
    }

    public function detail()
    {
        $page_data['page_title']    = 'Dealer Detail - Bubba DMS';
        
        $member_id = $this->session->userdata('user_id');
        $page_data['memberdata'] = $this->db->get_where('memberlogin_members',array('id '=>$member_id))->row();
        
        $this->load->view('detail',$page_data);
    }

    // public function inventory()
    // {
    //     $page_data['page_title']    = 'Dealer Inventory - Bubba DMS';
    //     $member_id = $this->session->userdata('user_id');
    //     $page_data['inventory_data'] = $this->db->get_where('inventory',array('member_id' => $member_id,'active'=>'0'))->result_array();
    //     $page_data['trade_data'] = $this->db->get_where('trade',array('member_id' => $member_id,'active'=>'0'))->result_array();
    //     $this->load->view('inventory',$page_data);
    // }

    public function getupdateprofile()
    {
        // echo "<pre>";
        // print_r($_POST);
        // die;
        $member_id = $this->session->userdata('user_id');

        $data['first_name'] = $this->input->post('edit_profile_firstname');
        $data['last_name'] = $this->input->post('edit_profile_lastname');
        //$data['email'] = $this->input->post('edit_profile_email');
        // if(!empty($this->input->post('edit_profile_password'))){
        //     $data['password'] = sha1($this->input->post('edit_profile_password'));
        // }
        $data['phone'] = $this->input->post('edit_profile_phone');
        $data['website'] = $this->input->post('edit_profile_website');
        $data['address'] = $this->input->post('edit_profile_address');
        $data['city'] = $this->input->post('edit_profile_city');
        $data['state'] = $this->input->post('edit_profile_state');
        $data['zip'] = $this->input->post('edit_profile_zip');
        $data['company_name'] = $this->input->post('edit_profile_companyname');
        $data['modified']        = date('Y-m-d H:i:s');

        $this->db->where('id',$member_id);
        if($this->db->update('memberlogin_members', $data))
            echo "done";
        else
            echo "something wrong!!";

    }
//d540062162ed96df71eadcbec5664c7c20335e0f
    public function getupdatepassword()
    {
        $member_id = $this->session->userdata('user_id');

        $data['password'] = sha1($this->input->post('edit_profile_newpassword'));
        $this->db->where('id',$member_id);
        if($this->db->update('memberlogin_members', $data))
            echo "done";
        else
            echo "something wrong!!";
    }

    public function getupdateperinfo()
    {

        
        $member_id = $this->session->userdata('user_id');

        $data['ebd'] = $this->input->post('business_purposes');
        $data['omp'] = $this->input->post('marketing_purposes');
        $data['jmf'] = $this->input->post('financial');
        $data['aebt'] = $this->input->post('affiliates');
        $data['aebc'] = $this->input->post('affiliates_everyday');
        $data['atm'] = $this->input->post('affiliates_market');
        $data['natm'] = $this->input->post('nonaffiliates');
        $data['share'] = $this->input->post('sharing');
        $data['tax'] = $this->input->post('taxrate');
        $data['dealer_fee'] = $this->input->post('servicefee');
        $data['dmv'] = $this->input->post('tagregistration');
        $data['saletax'] = $this->input->post('saletax');
        $data['twelve_digit_number'] = $this->input->post('twelve_digit_number');
        $data['modified']        = date('Y-m-d H:i:s');

        $this->db->where('id',$member_id);
        if($this->db->update('memberlogin_members', $data))
            echo "done";
        else
            echo "something wrong!!";

    }


}
