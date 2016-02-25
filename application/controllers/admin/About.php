<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/Admin_model');
        $this->load->helper(array('form', 'url'));
	}		

	public function index()
	{
        if($this->session->userdata('admin_status') != 1)
        {
            redirect('/admin', 'refresh');             
        }

        if($this->input->post('submit'))
        {
            $this->Admin_model->edit_about_handler();
        }        

        $data['about'] = $this->Admin_model->get_about();
        $this->admin_render('', 'about', $data);
	}	

}
