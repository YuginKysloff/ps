<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/Admin_model');
        $this->load->library('form_validation');         
		$this->load->helper(array('form', 'url'));    

	}		

//Start users =============================================================================================================
	public function index()
	{
        if($this->session->userdata('admin_status') != 1)
        {
            redirect('/admin', 'refresh');             
        }

        $data['users'] = $this->Admin_model->get_users();
        $this->admin_render('users', 'users', $data);
	}	

//Create user --------------------------------------------------------------------------------------------------------
	public function create_user()
	{
        if($this->session->userdata('admin_status') != 1)
        {
            redirect('/admin', 'refresh');             
        }
        //Правила валидации формы
        $this->form_validation->set_rules('user_name', 'Имя пользователя', 'trim|required|min_length[5]|max_length[20]');
        $this->form_validation->set_rules('user_email', 'Email', 'trim|required|valid_email|is_unique[users.user_email]');
        $this->form_validation->set_rules('user_phone', 'Номер телефона', 'trim|required|min_length[11]|max_length[18]');
        $this->form_validation->set_rules('user_password', 'Пароль', 'trim|required|min_length[8]|max_length[20]|matches[passconf]');
		$this->form_validation->set_rules('passconf', 'Подтверждение пароля', 'trim|required');
		//запуск валидации
        if($this->form_validation->run() != FALSE)
        {
            $this->Admin_model->create_user_handler();
        	redirect('/admin/users', 'refresh');             
        }
        else
        {
            $this->admin_render('users', 'create_user', NULL);
        }
	}

//Edit category --------------------------------------------------------------------------------------------------------
	public function edit_user($user_id = FALSE)
	{
        if($this->session->userdata('admin_status') != 1)
        {
            redirect('/admin', 'refresh');             
        }

        if ($user_id == FALSE)
        {
            redirect('/error', 'redirect'); 
        }  

        //Правила валидации формы
        $this->form_validation->set_rules('user_name', 'Имя пользователя', 'trim|min_length[5]|max_length[20]');
        $this->form_validation->set_rules('user_phone', 'Номер телефона', 'trim|required|min_length[11]|max_length[18]');
        $this->form_validation->set_rules('user_password', 'Пароль', 'trim|min_length[8]|max_length[20]|matches[passconf]');
		$this->form_validation->set_rules('passconf', 'Подтверждение пароля', 'trim');
		//запуск валидации
        if($this->form_validation->run() != FALSE)
        {
            $this->Admin_model->edit_user_handler($user_id);
        	redirect('/admin/users', 'refresh');             
        }
        else
        {
        	$data['user'] = $this->Admin_model->get_users($user_id);
            $this->admin_render('users', 'edit_user', $data);
        }	
	}

//Delete category --------------------------------------------------------------------------------------------------------
    public function delete_user($user_id = FALSE)
    {
        if ($user_id == FALSE)
        {
            redirect('/error', 'redirect'); 
        }  

        $this->Admin_model->del_user($user_id);
        redirect('/admin/users', 'refresh');
    }    
// //End categories =============================================================================================================    
	
}
