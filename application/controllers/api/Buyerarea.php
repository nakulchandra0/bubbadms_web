<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buyerarea extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('ApiModel');
	}

	public function buyerList()
	{
		verifyRequiredParams('','',array('member_id'));

		$memberdata = $this->ApiModel->geteditdatabyid('memberlogin_members','id',$_POST['member_id']);
		if($memberdata){

			$buyerdata = $this->db->order_by('buyers_id', 'DESC')->get_where("buyers", array("member_id"=>$_POST['member_id']))->result();
			if(count($buyerdata)){
				$valid = array('status' => "true", "message" => 'Successful list of Buyers.', 'data' => $buyerdata);
			}else{
				$valid = array('status' => "false", "message" => 'No Buyers.', 'data' => '');
			}
		}else{
			$valid = array('status' => "false", "message" => 'Invalid User.', 'data' => '');
		}

		setResponse($valid);
	}

	public function addBuyer()
	{
		verifyRequiredParams('','',array('member_id','buyer_firstname','buyer_middlename','buyer_lastname','buyer_email','buyer_address','buyer_city','buyer_country','buyer_state','buyer_zip','buyer_dlnumber','buyer_dlstate','buyer_dlexpire','buyer_dldob'));

		// $this->form_validation->set_rules('buyer_email', 'Email', 'required|is_unique[buyers.buyers_pri_email]',array('required' => 'You have not provided %s.', 'is_unique' => 'This %s already exists.'));

		// if ($this->form_validation->run() == FALSE)
  //       {
  //           $valid = array('status' => "false", "message" => validation_errors(), 'data' => '');

		// }else{

            $data['member_id']      		= $_POST['member_id'];
            $data['buyers_first_name']		= $_POST['buyer_firstname'];
	        $data['buyers_mid_name']		= $_POST['buyer_middlename'];
	        $data['buyers_last_name']		= $_POST['buyer_lastname'];
	        $data['buyers_pri_email']		= $_POST['buyer_email'];
	        $data['buyers_address']			= $_POST['buyer_address'];
	        $data['buyers_city']			= $_POST['buyer_city'];
	        $data['buyers_county']			= $_POST['buyer_country'];
	        $data['buyers_state']			= $_POST['buyer_state'];
	        $data['buyers_zip']				= $_POST['buyer_zip'];
	        $data['buyers_work_phone']		= $_POST['buyer_workphone'];
	        $data['buyers_home_phone']		= $_POST['buyer_homephone'];
	        $data['buyers_pri_phone_cell']	= $_POST['buyer_mobile'];
	        $data['buyers_DL_number']		= $_POST['buyer_dlnumber'];
	        $data['buyers_DL_state']		= $_POST['buyer_dlstate'];
	        $data['buyers_DL_expire']		= $_POST['buyer_dlexpire'];
	        $data['buyers_DL_dob']			= $_POST['buyer_dldob'];
	        $data['buyers_temp_tag_number']	= $_POST['buyer_temp_tag_number'];
	        $data['active']					= '0';

            $buyersdata = $this->db->insert('buyers', $data);

            if($buyersdata)
            {
            	$buyerdata = $this->db->order_by('buyers_id', 'DESC')->get_where("buyers", array("member_id"=>$_POST['member_id'],'active'=>0))->result();
                // foreach ($buyerdata as $key => $value) {

                //     $buyersdatas[] = array(
                //                     "buyers_id"				=>$value->buyers_id,
                //                     "buyers_first_name" 	=>$value->buyers_first_name,
                //                     "buyers_mid_name"       =>$value->buyers_mid_name,
                //                     "buyers_last_name"      =>$value->buyers_last_name
                //                 );
                // }
				$valid = array('status' => "true", "message" => 'Buyer added successfully.', 'data' => $buyerdata);
            }else{
				$valid = array('status' => "false", "message" => 'Buyer not added.', 'data' => '');
            }
		// }

		setResponse($valid);
	}

	public function editBuyer()
	{

		//print_r($_POST);
		verifyRequiredParams('','',array('buyers_id','buyer_firstname','buyer_middlename','buyer_lastname','buyer_email','buyer_address','buyer_city','buyer_country','buyer_state','buyer_zip','buyer_dlnumber','buyer_dlstate','buyer_dlexpire','buyer_dldob'));

		$buyersdata = $this->ApiModel->geteditdatabyid('buyers','buyers_id',$_POST['buyers_id']);

		if(count($buyersdata)){

            $data['buyers_first_name']		= $_POST['buyer_firstname'];
	        $data['buyers_mid_name']		= $_POST['buyer_middlename'];
	        $data['buyers_last_name']		= $_POST['buyer_lastname'];
	        $data['buyers_pri_email']		= $_POST['buyer_email'];
	        $data['buyers_address']			= $_POST['buyer_address'];
	        $data['buyers_city']			= $_POST['buyer_city'];
	        $data['buyers_county']			= $_POST['buyer_country'];
	        $data['buyers_state']			= $_POST['buyer_state'];
	        $data['buyers_zip']				= $_POST['buyer_zip'];
	        $data['buyers_work_phone']		= $_POST['buyer_workphone'];
	        $data['buyers_home_phone']		= $_POST['buyer_homephone'];
	        $data['buyers_pri_phone_cell']	= $_POST['buyer_mobile'];
	        $data['buyers_DL_number']		= $_POST['buyer_dlnumber'];
	        $data['buyers_DL_state']		= $_POST['buyer_dlstate'];
	        $data['buyers_DL_expire']		= $_POST['buyer_dlexpire'];
	        $data['buyers_DL_dob']			= $_POST['buyer_dldob'];
	        $data['buyers_temp_tag_number']	= $_POST['buyer_temp_tag_number'];
	        $data['active']					= '0';

            $update = $this->ApiModel->updatedata('buyers', 'buyers_id', $_POST['buyers_id'], $data);

            if($update)
            {
				$valid = array('status' => "true", "message" => 'Buyer updated successfully.', 'data' => '');
            }else{
				$valid = array('status' => "false", "message" => 'Buyer not updated.', 'data' => '');
            }

		}else{
			$valid = array('status' => "false", "message" => 'Buyer not found.', 'data' => '');
		}
		setResponse($valid);
	}

	public function deleteBuyer()
	{
		verifyRequiredParams('','',array('buyers_id'));

		$buyersdata = $this->ApiModel->geteditdatabyid('buyers','buyers_id',$_POST['buyers_id']);

		if($buyersdata){

			$this->db->where('buyers_id', $_POST['buyers_id']);
    		$this->db->delete('buyers');

			$valid = array('status' => "true", "message" => 'Successfully deleted buyers.', 'data' => '');

		}else{
			$valid = array('status' => "false", "message" => 'Buyer not found.', 'data' => '');
		}

		setResponse($valid);
	}

	public function viewBuyer()
	{
		verifyRequiredParams('','',array('buyers_id'));

		$buyerdata = $this->ApiModel->geteditdatabyid('buyers','buyers_id',$_POST['buyers_id']);
		if($buyerdata){
			$valid = array('status' => "true", "message" => 'Successfully get Buyers.', 'data' => $buyerdata);
		}else{
			$valid = array('status' => "false", "message" => 'No Buyers.', 'data' => '');
		}

		setResponse($valid);
	}

	public function addCobuyer()
	{
		verifyRequiredParams('','',array('member_id','buyers_id','cobuyer_firstname','cobuyer_middlename','cobuyer_lastname','cobuyer_email','cobuyer_address','cobuyer_city','cobuyer_country','cobuyer_state','cobuyer_zip','cobuyer_dlnumber','cobuyer_dlstate','cobuyer_dlexpire','cobuyer_dldob'));

		// $this->form_validation->set_rules('cobuyer_email', 'Email', 'required|is_unique[buyers.buyers_pri_email]',array('required' => 'You have not provided %s.', 'is_unique' => 'This %s already exists.'));

		// if ($this->form_validation->run() == FALSE)
  //       {
  //           $valid = array('status' => "false", "message" => validation_errors(), 'data' => '');

		// }else{

            $data['co_buyers_first_name']		= $_POST['cobuyer_firstname'];
	        $data['co_buyers_mid_name']			= $_POST['cobuyer_middlename'];
	        $data['co_buyers_last_name']		= $_POST['cobuyer_lastname'];
	        $data['co_buyers_pri_email']		= $_POST['cobuyer_email'];
	        $data['co_buyers_address']			= $_POST['cobuyer_address'];
	        $data['co_buyers_city']				= $_POST['cobuyer_city'];
	        $data['co_buyers_county']			= $_POST['cobuyer_country'];
	        $data['co_buyers_state']			= $_POST['cobuyer_state'];
	        $data['co_buyers_zip']				= $_POST['cobuyer_zip'];
	        $data['co_buyers_work_phone']		= $_POST['cobuyer_workphone'];
	        $data['co_buyers_home_phone']		= $_POST['cobuyer_homephone'];
	        $data['co_buyers_pri_phone_cell']	= $_POST['cobuyer_mobile'];
	        $data['co_buyers_DL_number']		= $_POST['cobuyer_dlnumber'];
	        $data['co_buyers_DL_state']			= $_POST['cobuyer_dlstate'];
	        $data['co_buyers_DL_expire']		= $_POST['cobuyer_dlexpire'];
	        $data['co_buyers_DL_dob']			= $_POST['cobuyer_dldob'];
	        $data['active']						= '0';

            $update = $this->ApiModel->updatedata('buyers', 'buyers_id', $_POST['buyers_id'], $data);

            if($update)
            {
            	$buyerdata = $this->db->order_by('buyers_id', 'DESC')->get_where("buyers", array("member_id"=>$_POST['member_id'],'active'=>0))->result();

				$valid = array('status' => "true", "message" => 'Co-Buyer added successfully.', 'data' => $buyerdata);
            }else{
				$valid = array('status' => "false", "message" => 'Co-Buyer not added.', 'data' => '');
            }
		// }

		setResponse($valid);
	}

	public function editCobuyer()
	{

		verifyRequiredParams('','',array('buyers_id','cobuyer_firstname','cobuyer_middlename','cobuyer_lastname','cobuyer_email','cobuyer_address','cobuyer_city','cobuyer_country','cobuyer_state','cobuyer_zip','cobuyer_dlnumber','cobuyer_dlstate','cobuyer_dlexpire','cobuyer_dldob'));

		$buyersdata = $this->ApiModel->geteditdatabyid('buyers','buyers_id',$_POST['buyers_id']);

		if(count($buyersdata)){

            $data['co_buyers_first_name']		= $_POST['cobuyer_firstname'];
	        $data['co_buyers_mid_name']			= $_POST['cobuyer_middlename'];
	        $data['co_buyers_last_name']		= $_POST['cobuyer_lastname'];
	        $data['co_buyers_pri_email']		= $_POST['cobuyer_email'];
	        $data['co_buyers_address']			= $_POST['cobuyer_address'];
	        $data['co_buyers_city']				= $_POST['cobuyer_city'];
	        $data['co_buyers_county']			= $_POST['cobuyer_country'];
	        $data['co_buyers_state']			= $_POST['cobuyer_state'];
	        $data['co_buyers_zip']				= $_POST['cobuyer_zip'];
	        $data['co_buyers_work_phone']		= $_POST['cobuyer_workphone'];
	        $data['co_buyers_home_phone']		= $_POST['cobuyer_homephone'];
	        $data['co_buyers_pri_phone_cell']	= $_POST['cobuyer_mobile'];
	        $data['co_buyers_DL_number']		= $_POST['cobuyer_dlnumber'];
	        $data['co_buyers_DL_state']			= $_POST['cobuyer_dlstate'];
	        $data['co_buyers_DL_expire']		= $_POST['cobuyer_dlexpire'];
	        $data['co_buyers_DL_dob']			= $_POST['cobuyer_dldob'];
	        $data['active']						= '0';

            $update = $this->ApiModel->updatedata('buyers', 'buyers_id', $_POST['buyers_id'], $data);

            if($buyersdata)
            {
				$valid = array('status' => "true", "message" => 'CoBuyer updated successfully.', 'data' => '');
            }else{
				$valid = array('status' => "false", "message" => 'CoBuyer not updated.', 'data' => '');
            }

		}else{
			$valid = array('status' => "false", "message" => 'CoBuyer not found.', 'data' => '');
		}
		setResponse($valid);
	}

	public function deleteCobuyer()
	{
		verifyRequiredParams('','',array('buyers_id'));

		$buyersdata = $this->ApiModel->geteditdatabyid('buyers','buyers_id',$_POST['buyers_id']);

		if($buyersdata){

			$data['co_buyers_first_name']		= "";
		    $data['co_buyers_mid_name']			= "";
		    $data['co_buyers_last_name']		= "";
		    $data['co_buyers_pri_email']		= "";
		    $data['co_buyers_address']			= "";
		    $data['co_buyers_city']				= "";
		    $data['co_buyers_county']			= "";
		    $data['co_buyers_state']			= "";
		    $data['co_buyers_zip']				= "";
		    $data['co_buyers_work_phone']		= "";
		    $data['co_buyers_home_phone']		= "";
		    $data['co_buyers_pri_phone_cell']	= "";
		    $data['co_buyers_DL_number']		= "";
		    $data['co_buyers_DL_state']			= "";
		    $data['co_buyers_DL_expire']		= "";
		    $data['co_buyers_DL_dob']			= "";

			$update = $this->ApiModel->updatedata('buyers', 'buyers_id', $_POST['buyers_id'], $data);

			$valid = array('status' => "true", "message" => 'Successfully deleted cobuyers.', 'data' => '');

		}else{
			$valid = array('status' => "false", "message" => 'Buyer not found.', 'data' => '');
		}

		setResponse($valid);
	}

	public function addInsurance()
	{
		verifyRequiredParams('','',array('member_id','buyers_id','insurance_companyname','insurance_policynumber','insurance_agentphone','insurance_address','insurance_city','insurance_state','insurance_zip','insurance_agentname'));

            $data['ins_company']		= $_POST['insurance_companyname'];
	        $data['ins_pol_num']		= $_POST['insurance_policynumber'];
	        $data['ins_phone']			= $_POST['insurance_agentphone'];
	        $data['ins_address']		= $_POST['insurance_address'];
	        $data['ins_city']			= $_POST['insurance_city'];
	        $data['ins_state']			= $_POST['insurance_state'];
	        $data['ins_zip']			= $_POST['insurance_zip'];
	        $data['ins_agent']			= $_POST['insurance_agentname'];

            $update = $this->ApiModel->updatedata('buyers', 'buyers_id', $_POST['buyers_id'], $data);

            if($update)
            {
            	$buyerdata = $this->db->order_by('buyers_id', 'DESC')->get_where("buyers", array("member_id"=>$_POST['member_id'],'active'=>0))->result();

				$valid = array('status' => "true", "message" => 'Insurance added successfully.', 'data' => $buyerdata);
            }else{
				$valid = array('status' => "false", "message" => 'Insurance not added.', 'data' => '');
            }

		setResponse($valid);
	}

	public function editInsurance()
	{

		verifyRequiredParams('','',array('buyers_id','insurance_companyname','insurance_policynumber','insurance_agentphone','insurance_address','insurance_city','insurance_state','insurance_zip','insurance_agentname'));

            $data['ins_company']		= $_POST['insurance_companyname'];
	        $data['ins_pol_num']		= $_POST['insurance_policynumber'];
	        $data['ins_phone']			= $_POST['insurance_agentphone'];
	        $data['ins_address']		= $_POST['insurance_address'];
	        $data['ins_city']			= $_POST['insurance_city'];
	        $data['ins_state']			= $_POST['insurance_state'];
	        $data['ins_zip']			= $_POST['insurance_zip'];
	        $data['ins_agent']			= $_POST['insurance_agentname'];

            $update = $this->ApiModel->updatedata('buyers', 'buyers_id', $_POST['buyers_id'], $data);

            if($update)
            {
				$valid = array('status' => "true", "message" => 'Insurance updated successfully.', 'data' => '');
            }else{
				$valid = array('status' => "false", "message" => 'Insurance not updated.', 'data' => '');
            }

		setResponse($valid);
	}

	public function deleteInsurance()
	{
		verifyRequiredParams('','',array('buyers_id'));

		$buyersdata = $this->ApiModel->geteditdatabyid('buyers','buyers_id',$_POST['buyers_id']);

		if($buyersdata){

			$data['ins_company']		= "";
	        $data['ins_pol_num']		= "";
	        $data['ins_phone']			= "";
	        $data['ins_address']		= "";
	        $data['ins_city']			= "";
	        $data['ins_state']			= "";
	        $data['ins_zip']			= "";
	        $data['ins_agent']			= "";

			$update = $this->ApiModel->updatedata('buyers', 'buyers_id', $_POST['buyers_id'], $data);

			$valid = array('status' => "true", "message" => 'Successfully deleted Insurance.', 'data' => '');

		}else{
			$valid = array('status' => "false", "message" => 'Buyer not found.', 'data' => '');
		}

		setResponse($valid);
	}

}
