<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Diploms extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/Admin_model');
        $this->load->helper(array('form', 'url', 'text'));
	}		

//Start diploms =============================================================================================================
	public function index()
	{
        if($this->session->userdata('admin_status') != 1)
        {
            redirect('/admin', 'refresh');             
        }

        $data['diploms'] = $this->Admin_model->get_diploms();
        $this->admin_render('diploms', 'diploms', $data);
	}	

//Create diplom --------------------------------------------------------------------------------------------------------
	public function create_diplom()
	{
        if($this->session->userdata('admin_status') != 1)
        {
            redirect('/admin', 'refresh');             
        }

        if($this->input->post('submit'))
        {
            $this->Admin_model->create_diplom_handler();
        }
        else
        {
            $this->admin_render('diploms', 'create_diplom', NULL);
        }
	}

//Edit diplom --------------------------------------------------------------------------------------------------------
	public function edit_diplom($diplom_id = FALSE)
	{
        if($this->session->userdata('admin_status') != 1)
        {
            redirect('/admin', 'refresh');             
        }

        if ($diplom_id == FALSE)
        {
            redirect('/error', 'redirect'); 
        }   

        if($this->input->post('submit'))
        {
            $this->Admin_model->edit_diplom_handler($diplom_id);
        }
        else
        {
            $data['diplom'] = $this->Admin_model->get_diploms($diplom_id);
            $this->admin_render('diploms', 'edit_diplom', $data);
        }		
	}

//Delete diplom --------------------------------------------------------------------------------------------------------
    public function delete_diplom($diplom_id = FALSE)
    {
        if ($diplom_id == FALSE)
        {
            redirect('/error', 'redirect'); 
        }  

        $this->Admin_model->del_diplom($diplom_id);
        redirect('/admin/diploms', 'refresh');
    }    
// //End diploms =============================================================================================================
	
}
