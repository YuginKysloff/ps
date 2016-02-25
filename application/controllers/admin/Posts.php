<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posts extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/Admin_model');
        $this->load->helper(array('form', 'url'));
	}		

//Start posts =============================================================================================================
	public function index()
	{
        if($this->session->userdata('admin_status') != 1)
        {
            redirect('/admin', 'refresh');             
        }

        $data['posts'] = $this->Admin_model->get_posts();
        $this->admin_render('posts', 'posts', $data);
	}	

//Create post --------------------------------------------------------------------------------------------------------
	public function create_post()
	{
        if($this->session->userdata('admin_status') != 1)
        {
            redirect('/admin', 'refresh');             
        }

        if($this->input->post('submit'))
        {
            $this->Admin_model->create_post_handler();
        }
        else
        {
            $data['cats'] = $this->Admin_model->get_cats();
            $this->admin_render('posts', 'create_post', $data);
        }
	}

//Edit post --------------------------------------------------------------------------------------------------------
	public function edit_post($blog_post_id = FALSE)
	{
        if($this->session->userdata('admin_status') != 1)
        {
            redirect('/admin', 'refresh');             
        }

        if ($blog_post_id == FALSE)
        {
            redirect('/error', 'redirect'); 
        }   

        if($this->input->post('submit'))
        {
            $this->Admin_model->edit_post_handler($blog_post_id);
        }
        else
        {
            $data['cats'] = $this->Admin_model->get_cats();
            $data['post'] = $this->Admin_model->get_posts($blog_post_id);
            $this->admin_render('posts', 'edit_post', $data);
        }		
	}

//Delete post --------------------------------------------------------------------------------------------------------
    public function delete_post($blog_post_id = FALSE)
    {
        if ($blog_post_id == FALSE)
        {
            redirect('/error', 'redirect'); 
        }  

        $this->Admin_model->del_post($blog_post_id);
        redirect('/admin/posts', 'refresh');
    }    
// //End posts =============================================================================================================
	
}
