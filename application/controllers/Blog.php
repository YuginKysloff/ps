<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
//        $this->load->model('Pages_model');
        $this->load->model('Blog_model');
        $this->load->library('pagination');
        $this->load->helper('text');
    }

    public function index()
    {
        if($this->input->post('submit'))
        {
            $this->load->library('form_validation');
            $this->load->helper('url');
            $this->load->library('email');
            $this->Templates_model->call_handler();
        }

        //Pagination config
        $config['base_url'] = '/blog/';
        $config['total_rows'] = $this->Blog_model->count_posts();
        $config['per_page'] = 3;
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
        //get posts from db
        $data['posts'] = $this->Blog_model->get_posts(false, $config['per_page'], (int)$this->uri->segment($config['uri_segment']));
        //get content for sidebar
        $data['pop_posts'] = $this->Blog_model->pop_posts();
        $data['categories'] = $this->Blog_model->get_categories();

        $this->pages_render('blog',$data);
    }

    public function single($slug)
    {
        if($this->input->post('submit'))
        {
            $this->load->library('form_validation');
            $this->load->helper('url');
            $this->load->library('email');
            $this->Templates_model->call_handler();
        }

        //get post's information
        $data['post'] = $this->Blog_model->get_posts($slug);
        //check if choosed post exist
        if (empty($data['post']))
        {
            redirect('/error', 'redirect');
        }
        //set page title
        $data['title'] = $data['post']['blog_post_title'];
        //get content for sidebar
        $data['pop_posts'] = $this->Blog_model->pop_posts();
        $data['categories'] = $this->Blog_model->get_categories();

        $this->pages_render('post',$data);
    }
}