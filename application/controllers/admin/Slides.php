<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slides extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/Admin_model');
        $this->load->helper(array('form', 'url'));
	}		

//Start slides =============================================================================================================
	public function index()
	{
        if($this->session->userdata('admin_status') != 1)
        {
            redirect('/admin', 'refresh');             
        }

        $data['slides'] = $this->Admin_model->get_slides();
        $this->admin_render('slides', 'slides', $data);
	}	

//Create slide --------------------------------------------------------------------------------------------------------
	public function create_slide()
	{
        if($this->session->userdata('admin_status') != 1)
        {
            redirect('/admin', 'refresh');             
        }

        if($this->input->post('submit'))
        {
            $this->Admin_model->create_slide_handler();
        }
        else
        {
            $data['menu'] = $this->Templates_model->get_menu();
            $this->admin_render('slides', 'create_slide', $data);
        }
	}

//Edit slide --------------------------------------------------------------------------------------------------------
	public function edit_slide($slide_id = FALSE)
	{
        if($this->session->userdata('admin_status') != 1)
        {
            redirect('/admin', 'refresh');             
        }

        if ($slide_id == FALSE)
        {
            redirect('/error', 'redirect'); 
        }           

        if($this->input->post('submit'))
        {
            $this->Admin_model->edit_slide_handler($slide_id);
        }
        else
        {
            $data['menu'] = $this->Templates_model->get_menu();
            $data['slide'] = $this->Admin_model->get_slides($slide_id);
            $this->admin_render('slides', 'edit_slide', $data);
        }		
	}

//Delete slide --------------------------------------------------------------------------------------------------------
    public function delete_slide($slide_id = FALSE)
    {
        if ($slide_id == FALSE)
        {
            redirect('/error', 'redirect'); 
        } 

        $this->Admin_model->del_slide($slide_id);
        redirect('/admin/slides', 'refresh');
    }    

// //End slides =============================================================================================================    
	
}
