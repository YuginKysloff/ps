<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Team extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/Admin_model');
        $this->load->helper(array('form', 'url', 'text'));
	}		

//Start team =============================================================================================================
	public function index()
	{
        if($this->session->userdata('admin_status') != 1)
        {
            redirect('/admin', 'refresh');             
        }

        $data['team'] = $this->Admin_model->get_team();
        $this->admin_render('team', 'team', $data);
	}	

//Create team --------------------------------------------------------------------------------------------------------
	public function create_team()
	{
        if($this->session->userdata('admin_status') != 1)
        {
            redirect('/admin', 'refresh');             
        }

        if($this->input->post('submit'))
        {
            $this->Admin_model->create_team_handler();
        }
        else
        {
            $this->admin_render('team', 'create_team', NULL);
        }
	}

//Edit team --------------------------------------------------------------------------------------------------------
	public function edit_team($team_id = FALSE)
	{
        if($this->session->userdata('admin_status') != 1)
        {
            redirect('/admin', 'refresh');             
        }

        if ($team_id == FALSE)
        {
            redirect('/error', 'redirect'); 
        }   

        if($this->input->post('submit'))
        {
            $this->Admin_model->edit_team_handler($team_id);
        }
        else
        {
            $data['team'] = $this->Admin_model->get_team($team_id);
            $this->admin_render('team', 'edit_team', $data);
        }		
	}

//Delete team --------------------------------------------------------------------------------------------------------
    public function delete_team($team_id = FALSE)
    {
        if ($team_id == FALSE)
        {
            redirect('/error', 'redirect'); 
        }  

        $this->Admin_model->del_team($team_id);
        redirect('/admin/team', 'refresh');
    }    
// //End team =============================================================================================================
	
}
