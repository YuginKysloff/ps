<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dogs extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
//        $this->load->model('Pages_model');
        $this->load->model('Dogs_model');
        $this->load->library('pagination');
        $this->load->helper('url');
    }

    public function index()
    {
        if ($this->input->post('submit')) {
            $this->load->library('form_validation');
            $this->load->library('email');
            $this->Templates_model->call_handler();
        }

        //Pagination config
        $config['base_url'] = '/dogs/';
        $config['total_rows'] = $this->Dogs_model->count_dogs();
        $config['per_page'] = 10;
        $config['uri_segment'] = 2;
        $config['num_links'] = 2;

        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';

        $config['first_link'] = 'Первая';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = 'Последняя';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';

        $config['next_link'] = '&gt;';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = '&lt;';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="active"><a>';
        $config['cur_tag_close'] = '</a></li>';

        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);
        //get pets from db
        $data['dogs'] = $this->Dogs_model->get_dogs(false, $config['per_page'],
            (int)$this->uri->segment($config['uri_segment']));

        $this->pages_render('dogs', $data);
    }

    public function single($slug)
    {
        if ($this->input->post('submit')) {
            $this->load->library('form_validation');
            $this->load->library('email');
            $this->Templates_model->call_handler();
        }

        //get pet's information
        $data['dog'] = $this->Dogs_model->get_dogs($slug);
        //check if choosed pet exist
        if (empty($data['dog'])) {
            redirect('/error', 'redirect');
        }
        //set page title
        $data['title'] = $data['dog']['dog_name'];
        //get random pets set
        $data['dogs'] = $this->Dogs_model->rand_dogs();
        //del record of choosed pet from random pets set
        foreach ($data['dogs'] as $key => $item) {
            if ($item['dog_id'] == $data['dog']['dog_id']) {
                unset($data['dogs'][$key]);
                break;
            }
        }

        $this->pages_render('dog', $data);
    }
}