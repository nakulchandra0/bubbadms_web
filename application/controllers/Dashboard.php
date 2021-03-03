<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {



	function __construct()
    {
        parent::__construct();
        
        //$this->load->library('facebook');

        if(_is_front_login()){}else{redirect(base_url());}
        if(_is_user_expired()){redirect(base_url().'buypack');}else{}
        
        
    }

	public function index()
	{
        $page_data['page_title']    = 'Dashboard - Bubba DMS';

		$this->load->view('dashboard',$page_data);
	}
}
