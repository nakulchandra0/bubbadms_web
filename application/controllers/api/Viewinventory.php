<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Viewinventory extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('ApiModel');
	}

	public function index()
	{
		verifyRequiredParams('','',array('inv_id'));		

		$inventorydata = $this->ApiModel->geteditdatabyid('inventory','inv_id',$_POST['inv_id']);
		if($inventorydata){
			$valid = array('status' => "true", "message" => 'Successfully found Inventory.', 'data' => $inventorydata);
			/*$inventorydata = $this->db->get_where("inventory", array("member_id"=>$_POST['member_id'],'active'=>0))->result();
			if(count($inventorydata)){
				
				foreach ($inventorydata as $key => $value) {
										
					$contactdatas[] = array( 
									"inv_id"		=>$value->inv_id,
									"member_id"		=>$value->member_id,									
									"inv_vin"		=>$value->inv_vin,									
									"inv_stock"		=>$value->inv_stock,
									"inv_year"		=>$value->inv_year,
									"inv_make"		=>$value->inv_make,
									"inv_model"		=>$value->inv_model,
									"inv_style"		=>$value->inv_style,
									"inv_color"		=>$value->inv_color,
									"inv_mileage"	=>$value->inv_mileage,
									"inv_cost"		=>$value->inv_cost,
									"inv_addedcost"	=>$value->inv_addedcost,
									"inv_price"		=>$value->inv_price,
									"inv_flrc"		=>$value->inv_flrc,
									"active"		=>$value->active,
								);
				}

				$valid = array('status' => "true", "message" => 'Successful list of Inventory.', 'data' => $contactdatas);
			}else{
				$valid = array('status' => "false", "message" => 'No any Inventory.', 'data' => '');
			}*/			
		}else{
			$valid = array('status' => "false", "message" => 'Inventory not found.', 'data' => '');
		}
					
		setResponse($valid);
	}
}
