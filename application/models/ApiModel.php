<?php

class ApiModel extends CI_Model {
	

	function insertdata($table_name, $data){
		$this->db->insert($table_name, $data);
		return true;
	}

	function geteditdatabyid($table_name, $where, $id){
		$this->db->where($where, $id);
		$query = $this->db->get($table_name);
		return $query->row_array();
	}

	
	function validate_users($email, $password,$db_name) {
		
		$this->db->select('*');
		//$this->db->where("(email = '$user_name' OR u_email = '$user_name')"); 
		$this->db->where('email', $email);
		$this->db->where('password', $password);
		$query = $this->db->get($db_name);
		return $query->result();
	}

	function checksociallogin($auth_provider, $auth_key,$db_name) {
		
		$this->db->select('*');
		$this->db->where('auth_provider', $auth_provider);
		$this->db->where('auth_key', $auth_key);
		$query = $this->db->get($db_name);
		return $query->result();
	}

	function updatedata($table_name, $where, $id, $data){
		$this->db->where($where, $id);
		$this->db->update($table_name, $data);
		return true;
	}

	function getall($table_name, $where, $id){
		$this->db->where($where, $id);
		$query = $this->db->get($table_name);
		return $query->result();
	}

	function checkotp($code,$email){
		$this->db->where('code',$code);
		$this->db->where('email',$email);
		$query = $this->db->get("dsf_forgot_password_otp");
		return $query->result();
	}

	function deletedata($table_name, $where, $id){
		$this->db->where($where, $id);
		$this->db->delete($table_name);
		return true;
	}


	function getallevent() 
    {
    	/*$this->db->select('dsf_events.id,dsf_events.organizer_id,dsf_events.shop_id,dsf_events.reef_id,dsf_events.category_id,dsf_events.start_date_time,dsf_events.end_date_time,dsf_events.name,dsf_events.description,dsf_events.price,dsf_events.meeting_location,dsf_events.cover_image,dsf_events.status,dsf_reef.id as rreef_id,dsf_reef.name as reef_name,dsf_reef.description as reef_description,dsf_reef.difficulty,dsf_reef.depth,dsf_reef.relief,dsf_reef.tone,dsf_reef.address,dsf_reef.geolocation_lat,dsf_reef.geolocation_long,dsf_shop.phone_number');

		$this->db->from('dsf_events');
		$this->db->join('dsf_reef', 'dsf_events.reef_id = dsf_reef.id', 'left');
		$this->db->join('dsf_shop', 'dsf_events.shop_id = dsf_shop.id', 'left');
		$this->db->order_by('dsf_events.id', 'DESC');
		$this->db->where('dsf_events.status', 'Approve');
		$this->db->where('start_date_time >=', date('Y-m-d h:i'));*/

		$this->db->where('status', 'Approve');
		$this->db->where('start_date_time >=', date('Y-m-d h:i'));

		$query = $this->db->get('dsf_events');
		return $data=$query->result();
    }
	
}
?>