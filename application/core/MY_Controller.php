<?php
class MY_Controller extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Templates_model');
    }

    //main render -------------------------------------------------------------------------------------------------------------------
    public function pages_render($slug, $data)
    {
        //get website settings
        $data['settings'] = $this->Templates_model->get_settings();

        //get main menu
        $data['menu'] = $this->Templates_model->get_menu();

        //get title of page
        foreach($data['menu'] as $item)
        {
            $index = array_search($slug, $item);
            if($index !== false)
            {
                $data['title'] = $item['menu_title'];
                break;
            }
        }

        //take statistics
        $this->Templates_model->do_statistics();

        //render view
        $this->load->view('templates/header_view',$data);
        $this->load->view($slug.'_view');
        $this->load->view('templates/footer_about_view');
    }


    //admin render -------------------------------------------------------------------------------------------------------------------
    public function admin_render($page, $slug, $data)
    {
        $data['user_name'] = $this->session->userdata('user_name');
        $data['count'] = $this->Admin_model->count_all();

        //render view
        $this->load->view('admin/templates/header_view',$data);
        $this->load->view('admin/'.$page.'/'.$slug.'_view');
        $this->load->view('admin/templates/footer_view');
    }

}