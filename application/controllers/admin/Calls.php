<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calls extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/Admin_model');
        $this->load->library('pagination');
        $this->load->helper(array('form', 'url', 'text'));
	}		

//Start categories =============================================================================================================
	public function index($mode = 'all')
	{
        if($this->session->userdata('admin_status') != 1)
        {
            redirect('/admin', 'refresh');             
        }

        switch ($mode) {
            case 'unfinished':
                $data['title'] = 'Необработанные звонки';
                break;
            case 'finished':
                $data['title'] = 'Обработанные звонки';
                break;        
            case 'expired':
                $data['title'] = 'Просроченные звонки';
                break;                    
            default:
                $data['title'] = 'Все звонки';
                break;
        }

        $num_rows = $this->Admin_model->get_calls($mode,0,0,FALSE,1);

        //pagination
        $config['base_url'] = '/admin/calls/'.$mode;
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

        $data['calls'] = $this->Admin_model->get_calls($mode, $config['uri_segment'], $config['per_page'], FALSE, 0);

        $this->admin_render('calls', 'calls', $data);
	}	

//Edit call --------------------------------------------------------------------------------------------------------
	public function edit_call($call_id)
	{
        if($this->session->userdata('admin_status') != 1)
        {
            redirect('/admin', 'refresh');             
        }

        if($this->input->post('submit'))
        {
            $this->Admin_model->edit_call_handler($call_id);
            redirect('/admin/calls', 'refresh');               
        }
        else
        {
            $data['call'] = $this->Admin_model->get_calls('all',0,0,$call_id,0);
            $this->admin_render('calls', 'edit_call', $data);
        }		
	}

//Delete call --------------------------------------------------------------------------------------------------------
    public function delete_call($call_id)
    {
        $this->Admin_model->del_call($call_id);
        redirect('/admin/calls', 'refresh');
    }    
// //End categories =============================================================================================================    
	
}
