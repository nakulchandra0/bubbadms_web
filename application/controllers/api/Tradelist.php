<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tradelist extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('ApiModel');
	}

	public function index()
	{
		verifyRequiredParams('','',array('member_id'));

		$memberdata = $this->ApiModel->geteditdatabyid('memberlogin_members','id',$_POST['member_id']);
		if($memberdata){

			$tradedata = $this->db->order_by('trade_inv_id', 'DESC')->get_where("trade", array("member_id"=>$_POST['member_id'],'active'=>0))->result();
			if(count($tradedata)){

				foreach ($tradedata as $key => $value) {

					$contactdatas[] = array(
									"trade_inv_id"			=>$value->trade_inv_id,
									"member_id"				=>$value->member_id,
									"trade_inv_vin"			=>$value->trade_inv_vin,
									"trade_inv_year"		=>$value->trade_inv_year,
									"trade_inv_make"		=>$value->trade_inv_make,
									"trade_inv_model"		=>$value->trade_inv_model,
									"trade_inv_style"		=>$value->trade_inv_style,
									"trade_inv_color"		=>$value->trade_inv_color,
									"trade_inv_mileage"		=>$value->trade_inv_mileage,
									"trade_inv_price"		=>$value->trade_inv_price,
									"trade_bal_owed"		=>$value->trade_bal_owed,
									"trade_owed_to"			=>$value->trade_owed_to,
									"trade_quote_date"		=>$value->trade_quote_date,
									"trade_quote_valid"		=>$value->trade_quote_valid,
									"active"				=>$value->active,
								);
				}

				$valid = array('status' => "true", "message" => 'Successful list of Trade.', 'data' => $contactdatas);
			}else{
				$valid = array('status' => "false", "message" => 'No Trade.', 'data' => '');
			}
		}else{
			$valid = array('status' => "false", "message" => 'Invalid User.', 'data' => '');
		}

		setResponse($valid);
	}
}
