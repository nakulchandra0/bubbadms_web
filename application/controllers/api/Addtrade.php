<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Addtrade extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('ApiModel');
	}
	
	public function index()
	{
		verifyRequiredParams('','',array('member_id','vin','year','make','model','style','color','allowance'));		

		$this->form_validation->set_rules('vin', 'VIN', 'required|is_unique[trade.trade_inv_vin]',array('required' => 'You have not provided %s.', 'is_unique' => 'This %s already exists.'));

		if ($this->form_validation->run() == FALSE)
            {
                  $valid = array('status' => "false", "message" => trim(strip_tags(validation_errors())), 'data' => '');

		}else{		

                  $data['member_id']            = $_POST['member_id'];
                  $data['trade_inv_vin']        = $_POST['vin'];
                  $data['trade_inv_year']       = $_POST['year'];
                  $data['trade_inv_make']       = $_POST['make'];
                  $data['trade_inv_model']      = $_POST['model'];
                  $data['trade_inv_style']      = $_POST['style'];
                  $data['trade_inv_color']      = $_POST['color'];
                  $data['trade_inv_mileage']    = $_POST['mileage'];
                  $data['trade_inv_exempt']     = $_POST['exempt'];
                  $data['trade_inv_price']      = $_POST['allowance'];
                  $data['active']               = '0';

                  $trade_data = $this->db->insert('trade', $data);
                  
                  if($trade_data)
                  {

                        $tradedata = $this->db->order_by('trade_inv_id', 'DESC')->get_where("trade", array("member_id"=>$_POST['member_id'],'active'=>0))->result();
                        foreach ($tradedata as $key => $value) {
                                                            
                              $tradedatas[] = array( 
                                                "trade_inv_id"          =>$value->trade_inv_id,
                                                "member_id"             =>$value->member_id,                                                    
                                                "trade_inv_vin"         =>$value->trade_inv_vin,                                                      
                                                "trade_inv_year"        =>$value->trade_inv_year,
                                                "trade_inv_make"        =>$value->trade_inv_make,
                                                "trade_inv_model"       =>$value->trade_inv_model,
                                                "trade_inv_style"       =>$value->trade_inv_style,
                                                "trade_inv_color"       =>$value->trade_inv_color,
                                                "trade_inv_mileage"     =>$value->trade_inv_mileage,
                                                "trade_inv_exempt"      =>$value->trade_inv_exempt,
                                                "trade_inv_price"       =>$value->trade_inv_price,
                                                "active"                =>$value->active
                                          );
                        }
      			$valid = array('status' => "true", "message" => 'Trade added successfully.', 'data' => $tradedatas);
                  }else{
                        $valid = array('status' => "true", "message" => 'Trade not added.', 'data' => '');
                  }
		}
					
		setResponse($valid);
	}

}
