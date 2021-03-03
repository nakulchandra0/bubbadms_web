<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Emergencycontact extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('ApiModel');
	}

	public function index()
	{
		verifyRequiredParams('','',array('userid'));		

		$userdata = $this->ApiModel->geteditdatabyid('fl_customer','id',$_POST['userid']);
		if($userdata){
			
			$contact = $this->db->get_where("fl_emergency_contact", array("source_id"=>$_POST['userid'],"type"=>'customer',"is_deleted"=>'no'))->result();
			if(count($contact)){
				
				foreach ($contact as $key => $value) {
										
					$contactdatas[] = array( "id"	=>$value->id,
									"name"			=>$value->name,									
									"phone_number"	=>$value->phone_number,									
									"created"		=>$value->created
								);
				}

				$valid = array('status' => "true", "message" => 'Successful list of emergency contact.', 'data' => $contactdatas);
			}else{
				$valid = array('status' => "false", "message" => 'No any emergency contact.', 'data' => '');
			}			
		}else{
			$valid = array('status' => "false", "message" => 'Invalid User.', 'data' => '');
		}
					
		setResponse($valid);
	}
}
