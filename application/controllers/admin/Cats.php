<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cats extends MY_Controller {

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

        $data['cats'] = $this->Admin_model->get_cats();
        $this->admin_render('cats', 'cats', $data);
	}	

//Create category --------------------------------------------------------------------------------------------------------
	public function create_cat()
	{
        if($this->session->userdata('admin_status') != 1)
        {
            redirect('/admin', 'refresh');             
        }

        if($this->input->post('submit'))
        {
            $this->Admin_model->create_cat_handler();
        }
        else
        {
            $this->admin_render('cats', 'create_cat', NULL);
        }
	}

//Edit category --------------------------------------------------------------------------------------------------------
	public function edit_cat($blog_cat_id = FALSE)
	{
        if($this->session->userdata('admin_status') != 1)
        {
            redirect('/admin', 'refresh');             
        }

        if ($blog_cat_id == FALSE)
        {
            redirect('/error', 'redirect'); 
        }   

        if($this->input->post('submit'))
        {
            $this->Admin_model->edit_cat_handler($blog_cat_id);
        }
        else
        {
            $data['cat'] = $this->Admin_model->get_cats($blog_cat_id);
            $this->admin_render('cats', 'edit_cat', $data);
        }		
	}

//Delete category --------------------------------------------------------------------------------------------------------
    public function delete_cat($blog_cat_id = FALSE)
    {
        if ($blog_cat_id == FALSE)
        {
            redirect('/error', 'redirect'); 
        }  

        $this->Admin_model->del_cat($blog_cat_id);
        redirect('/admin/cats', 'refresh');
    }    
// //End categories =============================================================================================================    
	
}
