<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buyerarea extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        
        //$this->load->library('facebook');
        if(_is_front_login()){}else{redirect(base_url());}
        if(_is_user_expired()){redirect(base_url().'buypack');}else{}
        

    }

	public function index()
	{
        $page_data['page_title']    = 'Buyer Area - Bubba DMS';
        $member_id = $this->session->userdata('user_id');
        $page_data['buyer_data'] = $this->db->get_where('buyers',array('member_id' => $member_id))->result_array();
		$page_data['states'] = $this->db->get('memberlogin_state')->result_array();

		$page_data['page_type'] = "";
        if(!empty($_GET['type'])){
        	if ($_GET['type'] == "" || $_GET['type'] == "cobuyer" || $_GET['type'] == "insurance" ) {
        	$page_data['page_type'] = $_GET['type']; 
        	}
        }
		$this->load->view('buyer_area',$page_data);
	}

	public function insert_buyer()
	{
		// echo("<pre>");
  // 		print_r($_POST);
  // 		die();
  		// $this->form_validation->set_rules('add_buyer_email', 'Email', 'required|is_unique[buyers.buyers_pri_email]',array('required' => 'You have not provided %s.', 'is_unique' => 'This %s already exists.'));
  		// if ($this->form_validation->run() == FALSE)
    //     {
    //         echo validation_errors();
    //     }
    //     else
    //     {
	  		$member_id = $this->session->userdata('user_id');
	        $data['member_id']				= $member_id;
	        $data['buyers_first_name']		= $this->input->post('add_buyer_firstname');
	        $data['buyers_mid_name']		= $this->input->post('add_buyer_middlename');
	        $data['buyers_last_name']		= $this->input->post('add_buyer_lastname');
	        $data['buyers_pri_email']		= $this->input->post('add_buyer_email');
	        $data['buyers_address']			= $this->input->post('add_buyer_address');
	        $data['buyers_city']			= $this->input->post('add_buyer_city');
	        $data['buyers_county']			= $this->input->post('add_buyer_country');
	        $data['buyers_state']			= $this->input->post('add_buyer_state');
	        $data['buyers_zip']				= $this->input->post('add_buyer_zip');
	        $data['buyers_work_phone']		= $this->input->post('add_buyer_workphone');
	        $data['buyers_home_phone']		= $this->input->post('add_buyer_homephone');
	        $data['buyers_pri_phone_cell']	= $this->input->post('add_buyer_mobile');
	        $data['buyers_DL_number']		= $this->input->post('add_buyer_dlnumber');
	        $data['buyers_DL_state']		= $this->input->post('add_buyer_dlstate');
	        $data['buyers_DL_expire']		= $this->input->post('add_buyer_dlexpire');
	        $data['buyers_DL_dob']			= $this->input->post('add_buyer_dldob');
	        $data['buyers_temp_tag_number']	= $this->input->post('add_buyer_temp_tag_number');
	        $data['active']					= '0';
	        $inserted = $this->db->insert('buyers', $data);

	        if($inserted)
	        	echo "done";
	        else
	        	echo "error";
    	// }

	}

	public function insert_cobuyer()
	{

  		// $this->form_validation->set_rules('add_cobuyer_email', 'Email', 'required|is_unique[buyers.co_buyers_pri_email]',array('required' => 'You have not provided %s.', 'is_unique' => 'This %s already exists.'));
  		// if ($this->form_validation->run() == FALSE)
    //     {
    //         echo validation_errors();
    //     }
    //     else
    //     {
	  		$member_id = $this->session->userdata('user_id');
	        $data['co_buyers_first_name']		= $this->input->post('add_cobuyer_firstname');
	        $data['co_buyers_mid_name']			= $this->input->post('add_cobuyer_middlename');
	        $data['co_buyers_last_name']		= $this->input->post('add_cobuyer_lastname');
	        $data['co_buyers_pri_email']		= $this->input->post('add_cobuyer_email');
	        $data['co_buyers_address']			= $this->input->post('add_cobuyer_address');
	        $data['co_buyers_city']				= $this->input->post('add_cobuyer_city');
	        $data['co_buyers_county']			= $this->input->post('add_cobuyer_country');
	        $data['co_buyers_state']			= $this->input->post('add_cobuyer_state');
	        $data['co_buyers_zip']				= $this->input->post('add_cobuyer_zip');
	        $data['co_buyers_work_phone']		= $this->input->post('add_cobuyer_workphone');
	        $data['co_buyers_home_phone']		= $this->input->post('add_cobuyer_homephone');
	        $data['co_buyers_pri_phone_cell']	= $this->input->post('add_cobuyer_mobile');
	        $data['co_buyers_DL_number']		= $this->input->post('add_cobuyer_dlnumber');
	        $data['co_buyers_DL_state']			= $this->input->post('add_cobuyer_dlstate');
	        $data['co_buyers_DL_expire']		= $this->input->post('add_cobuyer_dlexpire');
	        $data['co_buyers_DL_dob']			= $this->input->post('add_cobuyer_dldob');
	        $this->db->where('buyers_id', $this->input->post('add_cobuyer_select_buyer'));
			$updated = $this->db->update('buyers', $data);

	        if($updated)
	        	echo "done";
	        else
	        	echo "error";
    	// }

	}

	public function insert_cobuyer_from_buyer()
	{

	    $data['co_buyers_first_name']		= $this->input->post('add_cobuyer_buyer_firstname');
	    $data['co_buyers_mid_name']			= $this->input->post('add_cobuyer_buyer_middlename');
	    $data['co_buyers_last_name']		= $this->input->post('add_cobuyer_buyer_lastname');
	    $data['co_buyers_pri_email']		= $this->input->post('add_cobuyer_buyer_email');
	    $data['co_buyers_address']			= $this->input->post('add_cobuyer_buyer_address');
	    $data['co_buyers_city']				= $this->input->post('add_cobuyer_buyer_city');
	    $data['co_buyers_county']			= $this->input->post('add_cobuyer_buyer_country');
	    $data['co_buyers_state']			= $this->input->post('add_cobuyer_buyer_state');
	    $data['co_buyers_zip']				= $this->input->post('add_cobuyer_buyer_zip');
	    $data['co_buyers_work_phone']		= $this->input->post('add_cobuyer_buyer_workphone');
	    $data['co_buyers_home_phone']		= $this->input->post('add_cobuyer_buyer_homephone');
	    $data['co_buyers_pri_phone_cell']	= $this->input->post('add_cobuyer_buyer_mobile');
	    $data['co_buyers_DL_number']		= $this->input->post('add_cobuyer_buyer_dlnumber');
	    $data['co_buyers_DL_state']			= $this->input->post('add_cobuyer_buyer_dlstate');
	    $data['co_buyers_DL_expire']		= $this->input->post('add_cobuyer_buyer_dlexpire');
	    $data['co_buyers_DL_dob']			= $this->input->post('add_cobuyer_buyer_dldob');
	    $this->db->where('buyers_id', $this->input->post('add_cobuyer_buyer_id'));
		$this->db->update('buyers', $data);
		echo "done";
	}

	public function getBuyerDataFromId()
	{
        $buyer_data = $this->db->get_where('buyers',array('buyers_id' => $this->input->post('id')))->result_array();
        echo(json_encode($buyer_data));
		
	}

	public function update_buyer()
	{

  		$data['buyers_first_name']		= $this->input->post('edit_buyer_firstname');
	    $data['buyers_mid_name']		= $this->input->post('edit_buyer_middlename');
	    $data['buyers_last_name']		= $this->input->post('edit_buyer_lastname');
	    $data['buyers_pri_email']		= $this->input->post('edit_buyer_email');
	    $data['buyers_address']			= $this->input->post('edit_buyer_address');
	    $data['buyers_city']			= $this->input->post('edit_buyer_city');
	    $data['buyers_county']			= $this->input->post('edit_buyer_country');
	    $data['buyers_state']			= $this->input->post('edit_buyer_state');
	    $data['buyers_zip']				= $this->input->post('edit_buyer_zip');
	    $data['buyers_work_phone']		= $this->input->post('edit_buyer_workphone');
	    $data['buyers_home_phone']		= $this->input->post('edit_buyer_homephone');
	    $data['buyers_pri_phone_cell']	= $this->input->post('edit_buyer_mobile');
	    $data['buyers_DL_number']		= $this->input->post('edit_buyer_dlnumber');
	    $data['buyers_DL_state']		= $this->input->post('edit_buyer_dlstate');
	    $data['buyers_DL_expire']		= $this->input->post('edit_buyer_dlexpire');
	    $data['buyers_DL_dob']			= $this->input->post('edit_buyer_dldob');
	    $data['buyers_temp_tag_number']	= $this->input->post('edit_buyer_temp_tag_number');

	    $this->db->where('buyers_id', $this->input->post('edit_buyer_buyer_id'));
		$this->db->update('buyers', $data);
		echo "done";
	}

	public function update_cobuyer()
	{

	    $data['co_buyers_first_name']		= $this->input->post('edit_cobuyer_firstname');
	    $data['co_buyers_mid_name']			= $this->input->post('edit_cobuyer_middlename');
	    $data['co_buyers_last_name']		= $this->input->post('edit_cobuyer_lastname');
	    $data['co_buyers_pri_email']		= $this->input->post('edit_cobuyer_email');
	    $data['co_buyers_address']			= $this->input->post('edit_cobuyer_address');
	    $data['co_buyers_city']				= $this->input->post('edit_cobuyer_city');
	    $data['co_buyers_county']			= $this->input->post('edit_cobuyer_country');
	    $data['co_buyers_state']			= $this->input->post('edit_cobuyer_state');
	    $data['co_buyers_zip']				= $this->input->post('edit_cobuyer_zip');
	    $data['co_buyers_work_phone']		= $this->input->post('edit_cobuyer_workphone');
	    $data['co_buyers_home_phone']		= $this->input->post('edit_cobuyer_homephone');
	    $data['co_buyers_pri_phone_cell']	= $this->input->post('edit_cobuyer_mobile');
	    $data['co_buyers_DL_number']		= $this->input->post('edit_cobuyer_dlnumber');
	    $data['co_buyers_DL_state']			= $this->input->post('edit_cobuyer_dlstate');
	    $data['co_buyers_DL_expire']		= $this->input->post('edit_cobuyer_dlexpire');
	    $data['co_buyers_DL_dob']			= $this->input->post('edit_cobuyer_dldob');
	    $this->db->where('buyers_id', $this->input->post('edit_cobuyer_buyer_id'));
		$this->db->update('buyers', $data);
		echo "done";
	}

	public function delete_buyer()
	{
	    $this->db->where('buyers_id', $this->input->post('id'));
    	$this->db->delete('buyers');
    	echo "done";
	}

	public function delete_cobuyer()
	{
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
	    $this->db->where('buyers_id', $this->input->post('id'));
		$this->db->update('buyers', $data);
    	echo "done";
	}

	public function insert_insurance()
	{

  		// $this->form_validation->set_rules('add_buyer_email', 'Email', 'required|is_unique[buyers.buyers_pri_email]',array('required' => 'You have not provided %s.', 'is_unique' => 'This %s already exists.'));
  		// if ($this->form_validation->run() == FALSE)
    //     {
    //         echo validation_errors();
    //     }
    //     else
    //     {
	  		
	        $data['ins_company']		= $this->input->post('add_insurance_companyname');
	        $data['ins_pol_num']		= $this->input->post('add_insurance_policynumber');
	        $data['ins_phone']			= $this->input->post('add_insurance_agentphone');
	        $data['ins_address']		= $this->input->post('add_insurance_address');
	        $data['ins_city']			= $this->input->post('add_insurance_city');
	        $data['ins_state']			= $this->input->post('add_insurance_state');
	        $data['ins_zip']			= $this->input->post('add_insurance_zip');
	        $data['ins_agent']			= $this->input->post('add_insurance_agentname');
	        $this->db->where('buyers_id', $this->input->post('add_insurance_select_buyer'));
			$this->db->update('buyers', $data);
	    	echo "done";
    	// }
	}

	public function update_insurance()
	{
		// echo("<pre>");
		// print_r($_POST);
		// die();

  		// $this->form_validation->set_rules('add_buyer_email', 'Email', 'required|is_unique[buyers.buyers_pri_email]',array('required' => 'You have not provided %s.', 'is_unique' => 'This %s already exists.'));
  		// if ($this->form_validation->run() == FALSE)
    //     {
    //         echo validation_errors();
    //     }
    //     else
    //     {
	  		
	        $data['ins_company']		= $this->input->post('edit_insurance_companyname');
	        $data['ins_pol_num']		= $this->input->post('edit_insurance_policynumber');
	        $data['ins_phone']			= $this->input->post('edit_insurance_agentphone');
	        $data['ins_address']		= $this->input->post('edit_insurance_address');
	        $data['ins_city']			= $this->input->post('edit_insurance_city');
	        $data['ins_state']			= $this->input->post('edit_insurance_state');
	        $data['ins_zip']			= $this->input->post('edit_insurance_zip');
	        $data['ins_agent']			= $this->input->post('edit_insurance_agentname');
	        $this->db->where('buyers_id', $this->input->post('edit_insurance_buyer_id'));
			$this->db->update('buyers', $data);
	    	echo "done";
    	// }
	}

	public function delete_insurance()
	{
		// echo("<pre>");
		// print_r($_POST);
		// die();
	        $data['ins_company']		= "";
	        $data['ins_pol_num']		= "";
	        $data['ins_phone']			= "";
	        $data['ins_address']		= "";
	        $data['ins_city']			= "";
	        $data['ins_state']			= "";
	        $data['ins_zip']			= "";
	        $data['ins_agent']			= "";
	        $this->db->where('buyers_id', $this->input->post('id'));
			$this->db->update('buyers', $data);
	    	echo "done";
    	// }
	}

	public function insert_insurance_from_buyer()
	{
		// echo("<pre>");
		// print_r($_POST);
		// die();
	  		
	        $data['ins_company']		= $this->input->post('add_insurance_buyer_companyname');
	        $data['ins_pol_num']		= $this->input->post('add_insurance_buyer_policynumber');
	        $data['ins_phone']			= $this->input->post('add_insurance_buyer_agentphone');
	        $data['ins_address']		= $this->input->post('add_insurance_buyer_address');
	        $data['ins_city']			= $this->input->post('add_insurance_buyer_city');
	        $data['ins_state']			= $this->input->post('add_insurance_buyer_state');
	        $data['ins_zip']			= $this->input->post('add_insurance_buyer_zip');
	        $data['ins_agent']			= $this->input->post('add_insurance_buyer_agentname');
	        $this->db->where('buyers_id', $this->input->post('add_insurance_buyer_buyer_id'));
			$this->db->update('buyers', $data);
	    	echo "done";
    	// }
	}

}
