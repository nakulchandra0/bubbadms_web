<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Editinventory extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('ApiModel');
	}

	public function index()
	{
		verifyRequiredParams('','',array('inv_id','vin','stocknumber','year','make','model','style','color','cost','addedcost','stickerprice','totalcost'));	

		$inventorydata = $this->ApiModel->geteditdatabyid('inventory','inv_id',$_POST['inv_id']);
		
		if(count($inventorydata)){
			
			
			// $this->form_validation->set_rules('fname','First name','trim|required|xss_clean');
			// $this->form_validation->set_rules('lname','Last name','trim|required|xss_clean');

			// if($this->form_validation->run() == FALSE){

			// 	$valid = array('status' => "false", "message" => strip_tags(validation_errors()), 'data' => '');
			
			// }else{				

				$data['inv_vin']		= $_POST['vin'];
			    $data['inv_stock']		= $_POST['stocknumber'];
			    $data['inv_year']		= $_POST['year'];
			    $data['inv_make']		= $_POST['make'];
			    $data['inv_model']		= $_POST['model'];
			    $data['inv_style']		= $_POST['style'];
			    $data['inv_color']		= $_POST['color'];
			    $data['inv_mileage']	= $_POST['mileage'];
                $data['inv_exempt']     = $_POST['exempt'];
			    $data['inv_cost']		= $_POST['cost'];
			    $data['inv_addedcost']	= $_POST['addedcost'];
			    $data['inv_price']		= $_POST['stickerprice'];
			    $data['inv_flrc']		= $_POST['totalcost'];	
								
				$update = $this->ApiModel->updatedata('inventory', 'inv_id', $_POST['inv_id'], $data);

				if($update){
					
					$valid = array('status' => "true", "message" => 'Successfully updated inventory.', 'data' => "");

				}else{

					$valid = array('status' => "false", "message" => 'Update Error.', 'data' => '');

				}
			// }
		}else{
			$valid = array('status' => "false", "message" => 'Inventory not found.', 'data' => '');
		}			
		setResponse($valid);
	}
}
