<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/Admin_model');	
	}		

//Login ========================================================================================================================
	public function index()
	{
        if($this->input->post('submit'))
        {
            $this->Admin_model->login_handler();
        }
        else
        {
			$this->load->view('admin/login_view');       	
        }		
	}
//Logout ========================================================================================================================
	public function logout()
	{
		$this->session->set_userdata('admin_status', 0);
        redirect('/admin', 'refresh'); 		
	}
}