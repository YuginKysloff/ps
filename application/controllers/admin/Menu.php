<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/Admin_model');
        $this->load->helper(array('form', 'url'));
    }

//Start menu =============================================================================================================
    public function index()
    {
        if($this->session->userdata('admin_status') != 1)
        {
            redirect('/admin', 'refresh');
        }

        $data['menu'] = $this->Admin_model->get_menu();
        $this->admin_render('menu', 'menu', $data);
    }

//Edit category --------------------------------------------------------------------------------------------------------
    public function edit_menu($menu_id = FALSE)
    {
        if($this->session->userdata('admin_status') != 1)
        {
            redirect('/admin', 'refresh');
        }

        if ($menu_id == FALSE)
        {
            redirect('/error', 'redirect');
        }

        if($this->input->post('submit'))
        {
            $this->Admin_model->edit_menu_handler($menu_id);
        }
        else
        {
            $data['menu'] = $this->Admin_model->get_menu($menu_id);
            $this->admin_render('menu', 'edit_menu', $data);
        }
    }

// //End categories =============================================================================================================

}
