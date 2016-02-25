<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/Admin_model');
        $this->load->library('pagination');
        $this->load->helper(array('form', 'url', 'text'));
    }

//Start orderss =============================================================================================================
    public function index($mode = 'all')
    {
        if ($this->session->userdata('admin_status') != 1) {
            redirect('/admin', 'refresh');
        }

        switch ($mode) {
            case 'unfinished':
                $data['title'] = 'Необработанные заказы';
                break;
            case 'finished':
                $data['title'] = 'Обработанные заказы';
                break;
            case 'expired':
                $data['title'] = 'Просроченные заказы';
                break;
            default:
                $data['title'] = 'Все заказы';
                break;
        }

        $num_rows = $this->Admin_model->get_orders($mode, 0, 0, FALSE, 1);

        //pagination
        $config['base_url'] = '/admin/orders/' . $mode;
        $config['total_rows'] = $num_rows;
        $config['per_page'] = 10;
        $config['uri_segment'] = 4;
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
        $config['cur_tag_open'] = '<li class="active"><span>';
        $config['cur_tag_close'] = '<span class="sr-only">(current)</span></span></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $this->pagination->initialize($config);

        $data['orders'] = $this->Admin_model->get_orders($mode, $config['uri_segment'], $config['per_page'], FALSE, 0);

        $this->admin_render('orders', 'orders', $data);
    }

//Edit order --------------------------------------------------------------------------------------------------------
    public function edit_order($order_id)
    {
        if ($this->session->userdata('admin_status') != 1) {
            redirect('/admin', 'refresh');
        }

        if ($this->input->post('submit')) {
            $this->Admin_model->edit_order_handler($order_id);
            redirect('/admin/orders', 'refresh');
        } else {
            $data['order'] = $this->Admin_model->get_orders('all', 0, 0, $order_id, 0);
            $this->admin_render('orders', 'edit_order', $data);
        }
    }

//Delete order --------------------------------------------------------------------------------------------------------
    public function delete_order($order_id)
    {
        $this->Admin_model->del_order($order_id);
        redirect('/admin/orders', 'refresh');
    }
// //End orders =============================================================================================================

}
