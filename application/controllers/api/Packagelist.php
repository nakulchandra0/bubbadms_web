<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Packagelist extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('ApiModel');
	}

	public function index()
	{
		verifyRequiredParams('','',array('tokenid'));

		// $packagedata = $this->ApiModel->getall('memberlogin_groups','status','T');

		// if($packagedata){
		// $memberdata = $this->ApiModel->geteditdatabyid('memberlogin_members','id',$_POST['member_id']);

			if($_POST['tokenid'] == "d864990fcc21b190b7e7beb82409471ce5b8a9fe"){

				$packagedata = $this->db->get_where("memberlogin_groups", array("status"=>"T"))->result();
				if(count($packagedata)){

					$contactdatas = array();
					foreach ($packagedata as $key => $value) {

							$subscription_info = unserialize($value->subscription_info);
							$contactdatas[] = array( "id"	=>$value->id,
											"group_title"			=>$value->group_title,
											"subscription_fee"	=>$value->subscription_fee,
											"subscription_days"		=>$value->subscription_days,
											"subscription_info" => $subscription_info
									);

					}

					$valid = array('status' => "true", "message" => 'Successful list of packages.', 'data' => $contactdatas);
				}else{
					$valid = array('status' => "false", "message" => 'No Packages.', 'data' => '');
				}
			}else{
				$valid = array('status' => "false", "message" => 'Auth issue.', 'data' => '');
			}

		// }else{
		// 	$valid = array('status' => "false", "message" => 'Invalid User.', 'data' => '');
		// }

		setResponse($valid);
	}

	public function getpackagedataForUser()
	{
		verifyRequiredParams('','',array('member_id','tokenid'));

		$userdata = $this->db->get_where('memberlogin_members',array('id' => $_POST['member_id']))->row();
    if($userdata){

			if($_POST['tokenid'] == "d864990fcc21b190b7e7beb82409471ce5b8a9fe"){

				$myplandata = $this->db->get_where('memberlogin_groups', array('id' => $userdata->group_id))->row();

				$packagedata = $this->db->get_where("memberlogin_groups", array("status"=>"T"))->result();
				if(count($packagedata)){

					$contactdatas = array();
					foreach ($packagedata as $key => $value) {

						if($userdata->group_id == $value->id) continue;

						if($value->subscription_fee == 0.00 || $value->subscription_fee == 0){

							// $package_payment = $this->db->get_where('package_payment',array('member_id'=>$_POST['member_id'],'plan_id'=>$value->id))->result_array();
							// if(empty($package_payment)){
			        //             $subscription_info = unserialize($value->subscription_info);
							// 	$contactdatas[] = array( "id"	=>$value->id,
							// 				"group_title"			=>$value->group_title,
							// 				"subscription_fee"	=>$value->subscription_fee,
							// 				"subscription_days"		=>$value->subscription_days,
							// 				"subscription_info" => $subscription_info
							// 		);
			        //         }

						}else{

							$subscription_info = unserialize($value->subscription_info);
							$contactdatas[] = array( "id"	=>$value->id,
											"group_title"			=>$value->group_title,
											"subscription_fee"	=>$value->subscription_fee,
											"subscription_days"		=>$value->subscription_days,
											"subscription_info" => $subscription_info
									);
						}
					}

					$valid = array('status' => "true", "message" => 'Successful list of packages.', 'myplantitle' => $myplandata->group_title, 'myplanexpdate' => $userdata->membership_expire, 'data' => $contactdatas);
				}else{
					$valid = array('status' => "false", "message" => 'No Packages.', 'data' => '');
				}
			}else{
				$valid = array('status' => "false", "message" => 'Auth issue.', 'data' => '');
			}

		}else {
            $valid = array('status' => "false", "message" => 'User not found', 'data' => '');
    }

		setResponse($valid);

	}

	public function getpackagedata()
	{
		// verifyRequiredParams('','',array('tokenid', 'planid'));
		verifyRequiredParams('','',array( 'planid'));


		// if($_POST['tokenid'] == "d864990fcc21b190b7e7beb82409471ce5b8a9fe"){

			$packagedata = $this->db->get_where("memberlogin_groups", array("id"=>$_POST['planid']))->row();
			if($packagedata){
				$valid = array('status' => "true", "message" => 'Successful list of packages.', 'data' => $packagedata);
			}else{
				$valid = array('status' => "false", "message" => 'No Packages.', 'data' => '');
			}
		// }else{
		// 	$valid = array('status' => "false", "message" => 'Auth issue.', 'data' => '');
		// }


		setResponse($valid);
	}
}
