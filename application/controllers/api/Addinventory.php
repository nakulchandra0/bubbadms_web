<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Addinventory extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('ApiModel');
	}
	
	public function index()
	{
		verifyRequiredParams('','',array('member_id','vin','stocknumber','year','make','model','style','color','cost','addedcost','stickerprice','totalcost'));		


            // $this->form_validation->set_rules('vin', 'VIN', 'required|is_unique[inventory.inv_vin]',array('required' => 'You have not provided %s.', 'is_unique' => 'This %s already exists.'));

            $is_vin_available = $this->db->get_where('inventory',array('inv_vin' => $_POST['vin'], 'active' => 0))->row();


		if ($is_vin_available)
            {
                  // $valid = array('status' => "false", "message" => trim(strip_tags(validation_errors())), 'data' => '');
                  $valid = array('status' => "false", "message" => 'This VIN already exists.', 'data' => '');

		}else{		

                  $data['member_id']      = $_POST['member_id'];
                  $data['inv_vin']        = $_POST['vin'];
                  $data['inv_stock']      = $_POST['stocknumber'];
                  $data['inv_year']       = $_POST['year'];
                  $data['inv_make']       = $_POST['make'];
                  $data['inv_model']      = $_POST['model'];
                  $data['inv_style']      = $_POST['style'];
                  $data['inv_color']      = $_POST['color'];
                  $data['inv_mileage']    = $_POST['mileage'];
                  $data['inv_exempt']     = $_POST['exempt'];
                  $data['inv_cost']       = $_POST['cost'];
                  $data['inv_addedcost']  = $_POST['addedcost'];
                  $data['inv_price']      = $_POST['stickerprice'];
                  $data['inv_flrc']       = $_POST['totalcost'];
                  $data['active']         = '0';

                  $inventory_data = $this->db->insert('inventory', $data);
                  
                  if($inventory_data)
                  {
                        $inventorydata = $this->db->order_by('inv_id', 'DESC')->get_where("inventory", array("member_id"=>$_POST['member_id'],'active'=>0))->result();
                        foreach ($inventorydata as $key => $value) {
                                                            
                              $inventorydatas[] = array( 
                                                "inv_id"          =>$value->inv_id,
                                                "member_id"       =>$value->member_id,                                                    
                                                "inv_vin"         =>$value->inv_vin,                                                      
                                                "inv_stock"       =>$value->inv_stock,
                                                "inv_year"        =>$value->inv_year,
                                                "inv_make"        =>$value->inv_make,
                                                "inv_model"       =>$value->inv_model,
                                                "inv_style"       =>$value->inv_style,
                                                "inv_color"       =>$value->inv_color,
                                                "inv_mileage"     =>$value->inv_mileage,
                                                "inv_exempt"      =>$value->inv_exempt,
                                                "inv_cost"        =>$value->inv_cost,
                                                "inv_addedcost"   =>$value->inv_addedcost,
                                                "inv_price"       =>$value->inv_price,
                                                "inv_flrc"        =>$value->inv_flrc,
                                                "active"          =>$value->active
                                          );
                        }
      			$valid = array('status' => "true", "message" => 'Inventory added successfully.', 'data' => $inventorydatas);
                  }else{
                        $valid = array('status' => "false", "message" => 'Inventory not added.', 'data' => '');
                  }
		}
					
		setResponse($valid);
	}
}