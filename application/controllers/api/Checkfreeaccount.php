<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkfreeaccount extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('ApiModel');
	}

	public function index()
	{
		verifyRequiredParams('','',array('member_id','plan_id'));

            $userdata = $this->db->get_where('memberlogin_members',array('id' => $_POST['member_id']))->row();
            if($userdata){
                  $package_payment = $this->db->get_where('package_payment',array('member_id'=>$_POST['member_id'],'plan_id'=>$_POST['plan_id']))->result_array();
                  if(!empty($package_payment)){
                        $valid = array('status' => "true", "message" => 'You have already used free package! try another package.', 'data' => '');
                  }else{
                        $valid = array('status' => "false", "message" => 'Congratulation for free account', 'data' => '');
                  }
            }else {
                  $valid = array('status' => "false", "message" => 'User not found', 'data' => '');
            }

		setResponse($valid);
	}

}
