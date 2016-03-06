<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Error extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
//        $this->load->model('Main_model');
    }

//
    public function index()
    {

        echo '404';
//        $this->output->set_status_header('404');
//        //menu
//        $data['menu'] = $this->Main_model->get_menu();
//
//        //sidebar
//        $data['settings'] = $this->Main_model->get_settings();
//
//        //render
//        $this->load->view('errors/html/error_404', $data);
    }





}