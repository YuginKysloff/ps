<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/Admin_model');
        $this->load->helper(array('form', 'url'));
	}		

//Start categories =============================================================================================================
	public function index()
	{
        if($this->session->userdata('admin_status') != 1)
        {
            redirect('/admin', 'refresh');             
        }

        $data['gallery'] = $this->Admin_model->get_gallery();
        $this->admin_render('gallery', 'gallery', $data);
	}	

//Create category --------------------------------------------------------------------------------------------------------
	public function create_img()
	{
        if($this->session->userdata('admin_status') != 1)
        {
            redirect('/admin', 'refresh');             
        }

        if($this->input->post('submit'))
        {
            $this->Admin_model->create_img_handler();
        }
        else
        {
            $this->admin_render('gallery', 'create_img', NULL);
        }
	}

//Edit auto --------------------------------------------------------------------------------------------------------
	public function edit_img($img_id = FALSE)
	{
        if($this->session->userdata('admin_status') != 1)
        {
            redirect('/admin', 'refresh');             
        }

        if ($img_id == FALSE)
        {
            redirect('/error', 'redirect'); 
        }          

        if($this->input->post('submit'))
        {
            $this->Admin_model->edit_img_handler($img_id);
        }
        else
        {
            $data['img'] = $this->Admin_model->get_gallery($img_id);
            $this->admin_render('gallery', 'edit_img', $data);
        }		
	}

//Delete auto --------------------------------------------------------------------------------------------------------
    public function delete_img($img_id = FALSE)
    {
        if ($img_id == FALSE)
        {
            redirect('/error', 'redirect'); 
        }  

        $this->Admin_model->del_img($img_id);
        redirect('/admin/gallery', 'refresh');
    }    
// //End categories =============================================================================================================    
	
}
