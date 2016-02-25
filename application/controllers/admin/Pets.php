<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pets extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/Admin_model');
        $this->load->helper(array('form', 'url'));
	}		

//Start pets =============================================================================================================
	public function index()
	{
        if($this->session->userdata('admin_status') != 1)
        {
            redirect('/admin', 'refresh');             
        }

        $data['pets'] = $this->Admin_model->get_pets();
        $this->admin_render('pets', 'pets', $data);
	}	

//Create pet --------------------------------------------------------------------------------------------------------
	public function create_pet()
	{
        if($this->session->userdata('admin_status') != 1)
        {
            redirect('/admin', 'refresh');             
        }

        if($this->input->post('submit'))
        {
            $this->Admin_model->create_pet_handler();
        }
        else
        {
            $this->admin_render('pets', 'create_pet', NULL);
        }
	}

//Edit pet --------------------------------------------------------------------------------------------------------
	public function edit_pet($pet_id = FALSE)
	{
        if($this->session->userdata('admin_status') != 1)
        {
            redirect('/admin', 'refresh');             
        }

        if ($pet_id == FALSE)
        {
            redirect('/error', 'redirect'); 
        }   

        if($this->input->post('submit'))
        {
            $this->Admin_model->edit_pet_handler($pet_id);
        }
        else
        {
            $data['pet'] = $this->Admin_model->get_pets($pet_id);
            $this->admin_render('pets', 'edit_pet', $data);
        }		
	}

//Delete pet --------------------------------------------------------------------------------------------------------
    public function delete_pet($pet_id = FALSE)
    {
        if ($pet_id == FALSE)
        {
            redirect('/error', 'redirect'); 
        }  

        $this->Admin_model->del_pet($pet_id);
        redirect('/admin/pets', 'refresh');
    }    
// //End pets =============================================================================================================
	
}
