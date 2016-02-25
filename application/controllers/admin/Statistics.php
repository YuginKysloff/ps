<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Statistics extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/Admin_model');
        $this->load->helper(array('url', 'text'));
	}		

//Start categories =============================================================================================================
	public function index()
	{
        if($this->session->userdata('admin_status') != 1)
        {
            redirect('/admin', 'refresh');             
        }

        $data['stat'] = $this->Admin_model->get_stat();
        $this->admin_render('', 'statistics', $data);
	}	 
	
}
