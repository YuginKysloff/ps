<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pets extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
//        $this->load->model('Pages_model');
        $this->load->model('Pets_model');
        $this->load->library('pagination');
        $this->load->helper('url');
    }

    public function index()
    {
        if($this->input->post('submit'))
        {
            $this->load->library('form_validation');
            $this->load->library('email');
            $this->Templates_model->call_handler();
        }

        //Pagination config
        $config['base_url'] = '/pets/';
        $config['total_rows'] = $this->Pets_model->count_pets();
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
        $data['pets'] = $this->Pets_model->get_pets(false, $config['per_page'], (int)$this->uri->segment($config['uri_segment']));

        $this->pages_render('pets',$data);
    }

    public function single($slug)
    {
        if($this->input->post('submit'))
        {
            $this->load->library('form_validation');
            $this->load->library('email');
            $this->Templates_model->call_handler();
        }

        //get pet's information
        $data['pet'] = $this->Pets_model->get_pets($slug);
        //check if choosed pet exist
        if (empty($data['pet']))
        {
            redirect('/error', 'redirect');
        }
        //set page title
        $data['title'] = $data['pet']['pet_name'];
        //get random pets set
        $data['pets'] = $this->Pets_model->rand_pets();
        //del record of choosed pet from random pets set
        foreach($data['pets'] as $key=>$item)
        {
            if($item['pet_id'] == $data['pet']['pet_id'])
            {
                unset($data['pets'][$key]);
                break;
            }
        }

        $this->pages_render('pet',$data);
    }



    public function cart()
    {
        if($this->input->post('submit'))
        {
            $this->load->library('form_validation');
            $this->load->library('email');
            $this->Templates_model->call_handler();
        }

        //set page title
        $data['title'] = 'Ваша корзина';
        $data['basket'] = $this->Templates_model->get_basket();

        $this->pages_render('cart',$data);
    }



    public function add_to_basket($pet_id, $pet_slug)
    {
        $this->Templates_model->add2basket($pet_id);
        $this->session->set_flashdata('msg', 'Товар добавлен в корзину.');
        redirect('/pets/'.$pet_slug, 'refresh');
    }



    public function delete_from_basket($pet_id)
    {
        if (!$pet_id)
        {
            redirect('/error', 'redirect');
        }

        $this->Templates_model->del_pet($pet_id);
        redirect('/pets/cart', 'refresh');
    }
}