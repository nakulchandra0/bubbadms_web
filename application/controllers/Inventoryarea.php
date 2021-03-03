<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventoryarea extends CI_Controller {

	function __construct()
    {
        parent::__construct();

        //$this->load->library('facebook');
        if(_is_front_login()){}else{redirect(base_url());}
        if(_is_user_expired()){redirect(base_url().'buypack');}else{}


    }

	public function index()
	{
        $page_data['page_title']    = 'Inventory Area - Bubba DMS';
        $member_id = $this->session->userdata('user_id');
        $page_data['inventory_data'] = $this->db->get_where('inventory',array('member_id' => $member_id,'active'=>0))->result_array();
        $page_data['trade_data'] = $this->db->get_where('trade',array('member_id' => $member_id,'active'=>0))->result_array();
        $page_data['page_type'] = "";
        if(!empty($_GET['type'])){
        	$page_data['page_type'] = $_GET['type'];
        }
		$this->load->view('inventory_area',$page_data);
	}

	public function insert_inventory()
	{
		// echo("<pre>");
  // 		print_r($_POST);
  		// $this->form_validation->set_rules('inventoryinfo_vin', 'VIN', 'required|is_unique[inventory.inv_vin]',array('required' => 'You have not provided %s.', 'is_unique' => 'This %s already exists.'));
  		$is_vin_available = $this->db->get_where('inventory',array('inv_vin' => $_POST['inventoryinfo_vin'], 'active' => 0))->row();
  		if ($is_vin_available)
        {
            echo "This VIN already exists.";
        }
        else
        {
	  		$member_id = $this->session->userdata('user_id');
	        $data['member_id']		= $member_id;
	        $data['inv_vin']		= $this->input->post('inventoryinfo_vin');
	        $data['inv_stock']		= $this->input->post('inventoryinfo_stocknumber');
	        $data['inv_year']		= $this->input->post('inventoryinfo_year');
	        $data['inv_make']		= $this->input->post('inventoryinfo_make');
	        $data['inv_model']		= $this->input->post('inventoryinfo_model');
	        $data['inv_style']		= $this->input->post('inventoryinfo_style');
					$data['inv_color']		= $this->input->post('inventoryinfo_color');
					$data['drive_type']		= $this->input->post('inventoryinfo_drivetype');
	        $data['engine_size']		= $this->input->post('inventoryinfo_enginesize');
	        $data['inv_mileage']	= $this->input->post('inventoryinfo_mileage');
	        $data['inv_exempt']		= !empty($this->input->post('inventoryinfo_exempt_cb')) ? $this->input->post('inventoryinfo_exempt_cb') : 'no';
	        $data['inv_cost']		= $this->input->post('inventoryinfo_cost');
	        $data['inv_addedcost']	= $this->input->post('inventoryinfo_addedcost');
	        $data['inv_price']		= $this->input->post('inventoryinfo_stickerprice');
	        $data['inv_flrc']		= $this->input->post('inventoryinfo_totalcost');
	        $data['active']			= '0';

	        $this->db->insert('inventory', $data);

	        echo "done";
    	}

	}

	public function insert_trade()
	{
		// echo("<pre>");
  		//print_r($_POST);
  		// $this->form_validation->set_rules('inventoryinfo_vin', 'VIN', 'required|is_unique[inventory.inv_vin]',array('required' => 'You have not provided %s.', 'is_unique' => 'This %s already exists.'));
  		// if ($this->form_validation->run() == FALSE)
    //     {
    //         echo validation_errors();
    //     }
    //     else
    //     {
	  		$member_id = $this->session->userdata('user_id');
	        $data['member_id']			= $member_id;
	        $data['trade_inv_vin']		= $this->input->post('tradeinfo_vin');
	        // $data['trade_inv_stock']		= $this->input->post('tradeinfo_stocknumber');
	        $data['trade_inv_year']		= $this->input->post('tradeinfo_year');
	        $data['trade_inv_make']		= $this->input->post('tradeinfo_make');
	        $data['trade_inv_model']	= $this->input->post('tradeinfo_model');
	        $data['trade_inv_style']	= $this->input->post('tradeinfo_style');
	        $data['trade_inv_color']	= $this->input->post('tradeinfo_color');
					$data['trade_drive_type']		= $this->input->post('tradeinfo_drivetype');
					$data['trade_engine_size']	= $this->input->post('tradeinfo_enginesize');
	        $data['trade_inv_mileage']	= $this->input->post('tradeinfo_mileage');
	    		$data['trade_inv_exempt']	= !empty($this->input->post('tradeinfo_exempt_cb')) ? $this->input->post('tradeinfo_exempt_cb') : 'no';
	        $data['trade_inv_price']	= $this->input->post('tradeinfo_allowance');
	        $data['active']				= '0';
	        $inserted = $this->db->insert('trade', $data);

	        if($inserted) echo "done";
    	// }

	}

	public function getInventoryDataFromId()
	{
        $inventory_data = $this->db->get_where('inventory',array('inv_id' => $this->input->post('id')))->result_array();
        echo(json_encode($inventory_data));

	}

	public function getInventoryDataFromVIN()
	{
		// $trade_data = $this->db->get_where('trade',array('trade_inv_vin' => $this->input->post('vin')))->result_array();
		// if(empty($trade_data)){

	        $inventory_data = $this->db->get_where('inventory',array('inv_vin' => $this->input->post('vin')))->result_array();
	        if($inventory_data)
	        	echo(json_encode($inventory_data));
	    	else
	    		echo "notfound";
		// }else{
	 //        echo(json_encode($trade_data));
		// }

	}

	public function getTradeDataFromId()
	{
        $trade_data = $this->db->get_where('trade',array('trade_inv_id' => $this->input->post('id')))->result_array();
        echo(json_encode($trade_data));

	}

	public function addToInventoryFromTrade()
	{
		// echo "<pre>";
		// print_r($trade_data);
		// die();
		$trade_data = $this->db->get_where('trade',array('trade_inv_id' => $this->input->post('id')))->row();

		// $member_id = $this->session->userdata('user_id');
	    $data['member_id']		= $trade_data->member_id;
        $data['inv_vin']		= $trade_data->trade_inv_vin;
	    $data['inv_stock']		= '';
	    $data['inv_year']		= $trade_data->trade_inv_year;
	    $data['inv_make']		= $trade_data->trade_inv_make;
	    $data['inv_model']		= $trade_data->trade_inv_model;
	    $data['inv_style']		= $trade_data->trade_inv_style;
			$data['inv_color']		= $trade_data->trade_inv_color;
			$data['drive_type']		= $trade_data->trade_drive_type;
	    $data['engine_size']		= $trade_data->trade_engine_size;
	    $data['inv_mileage']	= $trade_data->trade_inv_mileage;
	    $data['inv_cost']		= $trade_data->trade_inv_price;
	    $data['inv_addedcost']	= "0";
	    $data['inv_price']		= '';
	    $data['inv_flrc']		= $trade_data->trade_inv_price;
	    $data['active']			= '0';
	    $inserted = $this->db->insert('inventory', $data);

	    if($inserted){
	    	$this->db->where('trade_inv_id', $this->input->post('id'));
			$this->db->delete('trade');
			echo "done";
	    }else{
			echo "failed";
	    }
	}

	public function update_inventory()
	{
  		$data['inv_vin']		= $this->input->post('edit_inventoryinfo_vin');
	    $data['inv_stock']		= $this->input->post('edit_inventoryinfo_stocknumber');
	    $data['inv_year']		= $this->input->post('edit_inventoryinfo_year');
	    $data['inv_make']		= $this->input->post('edit_inventoryinfo_make');
	    $data['inv_model']		= $this->input->post('edit_inventoryinfo_model');
	    $data['inv_style']		= $this->input->post('edit_inventoryinfo_style');
	    $data['inv_color']		= $this->input->post('edit_inventoryinfo_color');
			$data['drive_type']		= $this->input->post('edit_inventoryinfo_drivetype');
			$data['engine_size']		= $this->input->post('edit_inventoryinfo_enginesize');
	    $data['inv_mileage']	= $this->input->post('edit_inventoryinfo_mileage');
	    $data['inv_exempt']		= !empty($this->input->post('edit_inventoryinfo_exempt_cb')) ? $this->input->post('edit_inventoryinfo_exempt_cb') : 'no';
	    $data['inv_cost']		= $this->input->post('edit_inventoryinfo_cost');
	    $data['inv_addedcost']	= $this->input->post('edit_inventoryinfo_addedcost');
	    $data['inv_price']		= $this->input->post('edit_inventoryinfo_stickerprice');
	    $data['inv_flrc']		= $this->input->post('edit_inventoryinfo_totalcost');

	    $this->db->where('inv_id', $this->input->post('edit_inventoryinfo_ivn_id'));
		$this->db->update('inventory', $data);
		echo "done";
	}

	public function update_trade()
	{

  		$data['trade_inv_vin']		= $this->input->post('edit_tradeinfo_vin');
	    $data['trade_inv_year']		= $this->input->post('edit_tradeinfo_year');
	    $data['trade_inv_make']		= $this->input->post('edit_tradeinfo_make');
	    $data['trade_inv_model']	= $this->input->post('edit_tradeinfo_model');
	    $data['trade_inv_style']	= $this->input->post('edit_tradeinfo_style');
	    $data['trade_inv_color']	= $this->input->post('edit_tradeinfo_color');
			$data['trade_drive_type']		= $this->input->post('edit_tradeinfo_drivetype');
			$data['trade_engine_size']	= $this->input->post('edit_tradeinfo_enginesize');
	    $data['trade_inv_mileage']	= $this->input->post('edit_tradeinfo_mileage');
	    $data['trade_inv_exempt']	= !empty($this->input->post('edit_tradeinfo_exempt_cb')) ? $this->input->post('edit_tradeinfo_exempt_cb') : 'no';
	    $data['trade_inv_price']	= $this->input->post('edit_tradeinfo_allowance');

	    $this->db->where('trade_inv_id', $this->input->post('edit_tradeinfo_ivn_id'));
		$this->db->update('trade', $data);
		echo "done";
	}

	public function delete_inventory()
	{
	    $this->db->where('inv_id', $this->input->post('id'));
    	$this->db->delete('inventory');
    	echo "done";
	}

	public function delete_trade()
	{
	    $this->db->where('trade_inv_id', $this->input->post('id'));
    	$this->db->delete('trade');
    	echo "done";
	}
}
