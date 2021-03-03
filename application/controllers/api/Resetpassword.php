<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Resetpassword extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('ApiModel');
	}

	public function index()
	{
		verifyRequiredParams('','',array('email'));		

		if (!$this->valid_email($_POST['email'])) {
			$valid = array('status' => "false", "message" => 'Email format is invalid!', 'data' => '');
		}else{
			$memberdata = $this->ApiModel->geteditdatabyid('memberlogin_members','email',$_POST['email']);
			if(count($memberdata) > 0){

				$this->db->where('member_id', $memberdata['id']);
                $this->db->where('status', 'pending');
                $this->db->delete('reset_password');

                $data['member_id'] = $memberdata['id'];
                $data['tokenid'] = md5(date('Y-m-d H:i:s').$memberdata['id']);
                $data['is_open'] = 'yes';
                $data['status'] = 'pending';
                $data['created'] =  date('Y-m-d H:i:s');
                $this->db->insert('reset_password', $data);
                //$reset_password_id = $this->db->insert_id();
                //$reset_password_data = $this->db->get_where('reset_password',array('reset_password_id' => $reset_password_id))->row();

                $url = base_url().'resetpassword?tokenid='.$data['tokenid'];
                $from = $this->db->get_where('general_settings', array('type' => 'system_email'))->row()->value;
                $from_name = $this->db->get_where('general_settings', array('type' => 'system_name'))->row()->value;
                $subject = "Reset Your Password";
                $template = $this->crud_model->reset_password_email_templare($memberdata['first_name'].' '.$memberdata['last_name'],$url);
                $this->crud_model->do_email($from, $from_name, $_POST['email'], $subject, $template);

				$valid = array('status' => "true", "message" => 'Forget password link sent on email successfully.', 'data' => '');
				// $this->db->where('member_id', $memberdata->id);
    //             $this->db->where('status', 'pending');
    //             $this->db->delete('reset_password');

				// $payment_method = $this->db->get_where("fl_payment_method", array("is_deleted"=>'no',"active_status"=>'yes'))->result();
				// if(count($payment_method)){
					
				// 	foreach ($payment_method as $key => $value) {
						
				// 		//$thumb = explode('.', $value->payment_image);	

				// 		$servicedatas[] = array( "id"			=>$value->id,
				// 						"payment_name"			=>$value->payment_name,
				// 						"payment_image"			=>(!empty($value->payment_image)) ? base_url().'uploads/payment_icon/'.$value->payment_image :'',
				// 						//"payment_image_thumb"	=>(!empty($value->payment_image)) ? base_url().'uploads/payment_icon/'.$thumb[0].'_thumb.'.$thumb[1] :'',
				// 						//"created"				=>$value->created
				// 					);
				// 	}

				// 	$valid = array('status' => "true", "message" => 'Successful list of Payment Method.', 'data' => $servicedatas);
				// }else{
				// 	$valid = array('status' => "false", "message" => 'No any Payment Method.', 'data' => '');
				// }			
			}else{
				$valid = array('status' => "false", "message" => 'Member not fount!', 'data' => '');
			}
		}
					
		setResponse($valid);
	}

	function valid_email($email) 
    {
        if(is_array($email) || is_numeric($email) || is_bool($email) || is_float($email) || is_file($email) || is_dir($email) || is_int($email))
            return false;
        else
        {
            $email=trim(strtolower($email));
            if(filter_var($email, FILTER_VALIDATE_EMAIL)!==false) return $email;
            else
            {
                $pattern = '/^(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){255,})(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){65,}@)(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22))(?:\\.(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-+[a-z0-9]+)*\\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-+[a-z0-9]+)*)|(?:\\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\\]))$/iD';
                return (preg_match($pattern, $email) === 1) ? $email : false;
            }
        }
    }
}
