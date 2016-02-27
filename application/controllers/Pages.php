<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pages_model');
        $this->load->helper('text');
    }

    public function index($slug = 'home')
    {
        if (!file_exists('application/views/'.$slug.'_view.php'))
        {
            redirect('/error', 'redirect');
        }

        if($this->input->post('submit'))
        {
            $this->load->library('form_validation');
            $this->load->helper('url');
            $this->load->library('email');
            $this->Templates_model->call_handler();
        }


        $data['slides'] = $this->Pages_model->get_slides();
        $data['diploms'] = $this->Pages_model->get_diploms();
        $data['team'] = $this->Pages_model->get_team();
        $data['dogs'] = $this->Pages_model->rand_dogs();
        $data['services'] = $this->Pages_model->get_services();

        $this->pages_render($slug,$data);
    }

}