<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dogs extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/Admin_model');
        $this->load->helper(array('form', 'url'));
    }

//Start pets =============================================================================================================
    public function index()
    {
        if ($this->session->userdata('admin_status') != 1) {
            redirect('/admin', 'refresh');
        }

        $data['dogs'] = $this->Admin_model->get_dogs();
        $this->admin_render('dogs', 'dogs', $data);
    }

//Create pet --------------------------------------------------------------------------------------------------------
    public function create_dog()
    {
        if ($this->session->userdata('admin_status') != 1) {
            redirect('/admin', 'refresh');
        }

        if ($this->input->post('submit')) {
            $this->Admin_model->create_dog_handler();
        } else {
            $data['breeds'] = $this->Admin_model->get_breeds();
            $this->admin_render('dogs', 'create_dog', $data);
        }
    }

//Edit pet --------------------------------------------------------------------------------------------------------
    public function edit_dog($dog_id = FALSE)
    {
        if ($this->session->userdata('admin_status') != 1) {
            redirect('/admin', 'refresh');
        }

        if ($dog_id == FALSE) {
            redirect('/error', 'redirect');
        }

        if ($this->input->post('submit')) {
            $this->Admin_model->edit_dog_handler($dog_id);
        } else {
            $data['breeds'] = $this->Admin_model->get_breeds();
            $data['dog'] = $this->Admin_model->get_dogs($dog_id);
            $this->admin_render('dogs', 'edit_dog', $data);
        }
    }

//Delete pet --------------------------------------------------------------------------------------------------------
    public function delete_dog($dog_id = FALSE)
    {
        if ($dog_id == FALSE) {
            redirect('/error', 'redirect');
        }

        $this->Admin_model->del_dog($dog_id);
        redirect('/admin/dogs', 'refresh');
    }
// //End pets =============================================================================================================
}
