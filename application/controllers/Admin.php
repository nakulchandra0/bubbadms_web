<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        
        //$this->load->library('facebook');
        if(_is_back_login()){}else{redirect(base_url());}

    }

	public function index()
	{
        //$page_data['page_title']    = 'Inventory Area - Bubba DMS';
        // $member_id = $this->session->userdata('user_id');
        // $page_data['inventory_data'] = $this->db->get_where('inventory',array('member_id' => $member_id))->result_array();
        // $page_data['trade_data'] = $this->db->get_where('trade',array('member_id' => $member_id))->result_array();

        if($this->uri->segment(1) == "admin"){
            if($this->uri->segment(2) == ""){
                $this->session->sess_destroy();
                redirect(base_url());
            }
        }
		if ($this->session->userdata('admin_login') == 'yes') {
            $page_data['page_name'] = "Dealer - Bubba DMS";
            $this->load->view('admin/dealer', $page_data);
        } else {
            $page_data['page_name'] = "Login - Bubba DMS";
            $this->load->view('login',$page_data);
        }

	}

	public function dealer()
	{
		$page_data['page_title']    = 'Dealer - Bubba DMS';
        $page_data['memberdata'] = $this->db->get_where('memberlogin_members',array('usertype !='=>'admin','group_id !='=>'0'))->result_array();
		$this->load->view('admin/dealer',$page_data);
	}

	public function package()
	{
		$page_data['page_title']    = 'Package - Bubba DMS';
        $page_data['packagedata'] = $this->db->get('memberlogin_groups')->result_array();
		$this->load->view('admin/package',$page_data);
	}

	public function viewdealer()
	{
		$page_data['page_title']    = 'View Dealer - Bubba DMS';

		$id = $this->uri->segment(3);
		if(empty($id)) redirect(base_url() . 'admin/dealer');
        $page_data['memberdata'] = $this->db->get_where('memberlogin_members',array('id'=>$id,'usertype !='=>'admin'))->row();
		if(empty($page_data['memberdata'])) redirect(base_url() . 'admin/dealer');
        
        $page_data['states'] = $this->db->get('memberlogin_state')->result_array();
        $page_data['packagedata'] = $this->db->get_where('memberlogin_groups',array('status '=>'T'))->result_array();

		$this->load->view('admin/viewdealer',$page_data);
	}

	function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url() . '', 'refresh');
        // redirect(base_url() . 'home/', 'refresh');
    }

    function getDealerActive(){
    	$id = $this->input->post('id');
    	$data['status'] = "T";
    	$this->db->where('id', $id);
        $this->db->update('memberlogin_members', $data);
    }

    function getDealerDeactive(){
    	$id = $this->input->post('id');
    	$data['status'] = "F";
    	$this->db->where('id', $id);
        $this->db->update('memberlogin_members', $data);
    }

    function addpackage()
    {
    	// echo "<pre>";
    	// print_r($_POST);
    	// die();

    	$data['group_title']      		= $this->input->post('add_package_name');
        $data['subscription_fee']      	= $this->input->post('add_package_price');
        $data['subscription_days']      = $this->input->post('add_package_days');
        $data['subscription_info']      = $this->input->post('add_package_info');
        $data['status']   				= $this->input->post('add_package_status');

        $inserted = $this->db->insert('memberlogin_groups', $data);
        if ($inserted) echo "done";

    }

    function editpackage(){
		// echo "<pre>";
  //   	print_r($_POST);
  //   	die();    	

    	$data['group_title']      		= $this->input->post('edit_package_name');
        $data['subscription_fee']      	= $this->input->post('edit_package_price');
        $data['subscription_days']      = $this->input->post('edit_package_days');
        $data['subscription_info']      = $this->input->post('edit_package_info');
        $data['status']   				= $this->input->post('edit_package_status');

        $this->db->where('id', $this->input->post('edit_package_id'));
        $updated = $this->db->update('memberlogin_groups', $data);
        if ($updated) echo "done";
    }

    function getpackagedataByid()
    {
    	$inventory_data = $this->db->get_where('memberlogin_groups',array('id' => $this->input->post('id')))->result_array();
    	//print_r($inventory_data);
    	//print_r(unserialize($inventory_data[0]['subscription_info']));
    	$data['id']      				= $inventory_data[0]['id'];
    	$data['group_title']      		= $inventory_data[0]['group_title'];
        $data['subscription_fee']      	= $inventory_data[0]['subscription_fee'];
        $data['subscription_days']      = $inventory_data[0]['subscription_days'];
        $data['subscription_info']      = unserialize($inventory_data[0]['subscription_info']);
        $data['status']   				= $inventory_data[0]['status'];



        echo(json_encode($data));
    }

    function getdeletedataByid()
    {
        $this->db->where('id', $this->input->post('id'));
        $this->db->delete('memberlogin_members');
    }

    function editprofileform(){

		$startdate = date_format(date_create_from_format('Y-d-m', $this->input->post('startdate')), 'Y-m-d');
    	$enddate = date_format(date_create_from_format('Y-d-m', $this->input->post('enddate')), 'Y-m-d');

    	$data = array(
    		'first_name' => $this->input->post('firstname'),
    		'last_name' => $this->input->post('lastname'),
    		'email' => $this->input->post('email'),
    		'phone' => $this->input->post('phone'),
    		'company_name' => $this->input->post('company'),
    		'website' => $this->input->post('website'),
    		'address' => $this->input->post('address'),
    		'city' => $this->input->post('city'),
    		'state' => $this->input->post('state'),
    		'zip' => $this->input->post('zip'),
    		'group_id' => $this->input->post('package'),
    		'created' => $startdate.' 00:00:00',
    		'membership_expire' => $enddate.' 23:59:59'
    	); 
    	

        $this->db->where('id', $this->input->post('memberid'));
        $updated = $this->db->update('memberlogin_members', $data);
        if ($updated) echo "done";
    }
 }
