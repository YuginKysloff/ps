<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Services extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/Admin_model');
        $this->load->helper(array('form', 'url', 'text'));
	}		

//Start services =============================================================================================================
	public function index()
	{
        if($this->session->userdata('admin_status') != 1)
        {
            redirect('/admin', 'refresh');             
        }

        $data['services'] = $this->Admin_model->get_services();
        $this->admin_render('services', 'services', $data);
	}	

//Create service --------------------------------------------------------------------------------------------------------
	public function create_service()
	{
        if($this->session->userdata('admin_status') != 1)
        {
            redirect('/admin', 'refresh');             
        }

        if($this->input->post('submit'))
        {
            $this->Admin_model->create_service_handler();
        }
        else
        {
            $this->admin_render('services', 'create_service', NULL);
        }
	}

//Edit service --------------------------------------------------------------------------------------------------------
	public function edit_service($serv_id = FALSE)
	{
        if($this->session->userdata('admin_status') != 1)
        {
            redirect('/admin', 'refresh');             
        }

        if ($serv_id == FALSE)
        {
            redirect('/error', 'redirect'); 
        }   

        if($this->input->post('submit'))
        {
            $this->Admin_model->edit_service_handler($serv_id);
        }
        else
        {
            $data['serv'] = $this->Admin_model->get_services($serv_id);
            $this->admin_render('services', 'edit_service', $data);
        }		
	}

//Delete service --------------------------------------------------------------------------------------------------------
    public function delete_service($serv_id = FALSE)
    {
        if ($serv_id == FALSE)
        {
            redirect('/error', 'redirect'); 
        }  

        $this->Admin_model->del_service($serv_id);
        redirect('/admin/services', 'refresh');
    }    
// //End pets =============================================================================================================
	
}
