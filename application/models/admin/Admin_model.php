<?php
class Admin_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
        $this->load->library('session');      
		$this->load->helper(array('string', 'url'));        
		$this->load->library('image_moo');
        // $this->load->library('form_validation');        
	}

// START COMMON FUNCTIONS ==========================================================================================================
    public function count_all()
    {
        $count_data['slides'] = $this->db->count_all('slides');
        $count_data['calls'] = $this->db->count_all('calls');
        $count_data['users'] = $this->db->count_all('users')-1;
        $count_data['visitors'] = $this->db->count_all('hits');
        $count_data['dogs'] = $this->db->count_all('dogs');
        $count_data['pets'] = $this->db->count_all('pets');
        $count_data['breeds'] = $this->db->count_all('breeds');
        $count_data['services'] = $this->db->count_all('services');
        $count_data['diploms'] = $this->db->count_all('diploms');
        $count_data['team'] = $this->db->count_all('team');
        $count_data['orders'] = $this->db->count_all('orders');
        return $count_data;
    }

    public  function translit($s)
    {
        $s = (string) $s; // преобразуем в строковое значение
        $s = strip_tags($s); // убираем HTML-теги
        $s = str_replace(array("\n", "\r"), " ", $s); // убираем перевод каретки
        $s = preg_replace("/\s+/", ' ', $s); // удаляем повторяющие пробелы
        $s = trim($s); // убираем пробелы в начале и конце строки
        $s = function_exists('mb_strtolower') ? mb_strtolower($s) : strtolower($s); // переводим строку в нижний регистр (иногда надо задать локаль)
        $s = strtr($s, array('а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d','е'=>'e','ё'=>'e','ж'=>'j','з'=>'z','и'=>'i','й'=>'y','к'=>'k','л'=>'l','м'=>'m','н'=>'n','о'=>'o','п'=>'p','р'=>'r','с'=>'s','т'=>'t','у'=>'u','ф'=>'f','х'=>'h','ц'=>'c','ч'=>'ch','ш'=>'sh','щ'=>'shch','ы'=>'y','э'=>'e','ю'=>'yu','я'=>'ya','ъ'=>'','ь'=>''));
        $s = preg_replace("/[^0-9a-z-_ ]/i", "", $s); // очищаем строку от недопустимых символов
        $s = str_replace(" ", "_", $s); // заменяем пробелы знаком минус
        return $s; // возвращаем результат
    }      
// END COMMON FUNCTIONS ===========================================================================================================  

// START Authorisation ============================================================================================================
    public function login_handler()
    {
        $user_email = $this->input->post('user_email');
        $user_password = md5($this->input->post('user_password'));
        // var_dump($user_email, $user_password);die;
        $query = $this->db->query("SELECT * FROM users WHERE user_email = '$user_email' AND user_password = '$user_password' AND user_status = 1")->row_array();
        if($query)
        {
            $this->session->set_userdata('admin_status', 1);
            $this->session->set_userdata('user_name', $query['user_name']);            
            redirect('/admin/statistics', 'refresh');             
        }
        else
        {
            $this->load->view('admin/login_view');          
        }
    }
// END Authorisation ==============================================================================================================

// START ABOUT SECTION ============================================================================================================
    public function get_about()
    {
        $query = $this->db->get('settings')->row_array();
        return $query;
    }

//--------------------------------------------------------------------------------------------------------------------------------
    public function edit_about_handler()
    {
        //готовим данные для записи в базу
        $data['set_company'] = $this->input->post('set_company');
        $data['set_desc'] = $this->input->post('set_desc');
        $data['set_tags'] = $this->input->post('set_tags');
        $data['set_about_title'] = $this->input->post('set_about_title');
        $data['set_about'] = $this->input->post('set_about');
        $data['set_serv_title'] = $this->input->post('set_serv_title');
        $data['set_serv'] = $this->input->post('set_serv');
        $data['set_address'] = $this->input->post('set_address');
        $data['set_phone'] = $this->input->post('set_phone');
        $data['set_email'] = $this->input->post('set_email');
        $data['set_vk'] = $this->input->post('set_vk');
        $data['set_slider_order'] = $this->input->post('set_slider_order');

        //обновление данных в базе
        $this->db->update('settings', $data);

    }
// END ABOUT SECTION =============================================================================================================

// START SLIDES SECTION ==========================================================================================================
    public function get_slides($slide_id = FALSE)
    {
        if ($slide_id === FALSE)
        {
            $query = $this->db->get('slides')->result_array();
            return $query;
        }

        $query = $this->db->where('slide_id', $slide_id)->get('slides')->row_array();
        return $query;
    }

//Create slide --------------------------------------------------------------------------------------------------------------------
    public function create_slide_handler()
    {
        //готовим данные для записи в базу
        $data['slide_name'] = $this->input->post('slide_name');
        $data['slide_desc'] = $this->input->post('slide_desc');
        $data['slide_button_url'] = $this->input->post('slide_button_url');
        $data['slide_mode'] = $this->input->post('slide_mode');
        $data['slide_status'] = $this->input->post('slide_status');

        //подготовка загрузки фото
        $config['upload_path'] = './uploads/slides/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['overwrite'] = FALSE;

        $this->load->library('upload', $config);

        if($this->upload->do_upload('userfile'))
        {
            $image_dir = str_replace('.', '', $config['upload_path']);
            $temp = $this->upload->data();
            $file_name = $temp['file_name'];
            $image_url = $image_dir.$file_name;

            //ресайз фото
            $this->image_moo->load('.'.$image_url)->resize_crop(1440,960)->save('.'.$image_url,TRUE);

            //готовим данные для записи в базу
            $data['slide_url'] = $image_url;
        }

        //обновление данных в базе
        $this->db->insert('slides', $data);

        redirect('/admin/slides', 'refresh');
 }

//Edit slide --------------------------------------------------------------------------------------------------------------------
    public function edit_slide_handler($slide_id)
    {
        //готовим данные для записи в базу
        $data['slide_name'] = $this->input->post('slide_name');
        $data['slide_desc'] = $this->input->post('slide_desc');
        $data['slide_button_url'] = $this->input->post('slide_button_url');
        $data['slide_mode'] = $this->input->post('slide_mode');
        $data['slide_status'] = $this->input->post('slide_status');

        //подготовка загрузки фото
        $config['upload_path'] = './uploads/slides/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['overwrite'] = FALSE;

        $this->load->library('upload', $config);

        if($this->upload->do_upload('userfile'))
        {
            $image_dir = str_replace('.', '', $config['upload_path']);
            $temp = $this->upload->data();
            $file_name = $temp['file_name'];
            $image_url = $image_dir.$file_name;

            //ресайз фото
            $this->image_moo->load('.'.$image_url)->resize_crop(1440,960)->save('.'.$image_url,TRUE);

            //удаляем старые фото
            $old_photo = $this->db->query("SELECT * FROM slides WHERE slide_id = $slide_id")->row_array();
            unlink('.'.$old_photo['slide_url']);

            //готовим данные для записи в базу
            $data['slide_url'] = $image_url;
        }

        //обновление данных в базе
        $this->db->where('slide_id',$slide_id)->update('slides', $data);

        redirect('/admin/slides', 'refresh');
 }

 //Delete slide --------------------------------------------------------------------------------------------------
    public function del_slide($slide_id)
    {
        $query = $this->db->where('slide_id', $slide_id)->get('slides')->row_array();

        unlink('.'.$query['slide_url']);

        $this->db->where('slide_id', $slide_id)->delete('slides');
    }
// END SLIDES SECTION ============================================================================================================

// START DOGS SECTION ========================================================================================================
    public function get_dogs($dog_id = FALSE)
    {
        if ($dog_id === FALSE)
        {
            $query = $this->db->get('dogs')->result_array();
            return $query;
        }

        $query = $this->db->get_where('dogs', array('dog_id' => $dog_id))->row_array();
        return $query;
    }

    //Create dog --------------------------------------------------------------------------------------------------------------------
    public function create_dog_handler()
    {
        //prepare data for put into database
        $data['dog_name'] = $this->input->post('dog_name');
        $data['dog_slug'] = $this->translit($this->input->post('dog_name'));
        $data['dog_gender'] = $this->input->post('dog_gender');
        $data['dog_birthday'] = strtotime($this->input->post('dog_birthday'));
        $data['dog_breed'] = $this->input->post('dog_breed');
        $data['dog_desc'] = $this->input->post('dog_desc');
        $data['dog_genealogy'] = $this->input->post('dog_genealogy');
        $data['dog_status'] = $this->input->post('dog_status');

        //prepare to download photo
        $config['upload_path'] = './uploads/dogs/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['overwrite'] = FALSE;

        $this->load->library('upload', $config);

        if($this->upload->do_upload('userfile'))
        {
            $image_dir = str_replace('.', '', $config['upload_path']);
            $temp = $this->upload->data();
            $file_name = $temp['file_name'];
            $image_url = $image_dir.$file_name;

            //resize photo
            $this->image_moo->load('.'.$image_url)->resize_crop(270,270)->save('.'.$image_url,TRUE);

            //prepare data for inserting into database
            $data['dog_img'] = $image_url;
        }
        //insert data into database
        $this->db->insert('dogs', $data);

        redirect('/admin/dogs', 'refresh');
    }

    //Edit dog --------------------------------------------------------------------------------------------------------------------
    public function edit_dog_handler($dog_id)
    {
        //prepare data for put into database
        $data['dog_name'] = $this->input->post('dog_name');
        $data['dog_slug'] = $this->translit($this->input->post('dog_name'));
        $data['dog_gender'] = $this->input->post('dog_gender');
        $data['dog_birthday'] = strtotime($this->input->post('dog_birthday'));
        $data['dog_breed'] = $this->input->post('dog_breed');
        $data['dog_desc'] = $this->input->post('dog_desc');
        $data['dog_genealogy'] = $this->input->post('dog_genealogy');
        $data['dog_status'] = $this->input->post('dog_status');

        //prepare to download photo
        $config['upload_path'] = './uploads/dogs/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['overwrite'] = FALSE;

        $this->load->library('upload', $config);

        if($this->upload->do_upload('userfile'))
        {
            $image_dir = str_replace('.', '', $config['upload_path']);
            $temp = $this->upload->data();
            $file_name = $temp['file_name'];
            $image_url = $image_dir.$file_name;

            //resize photo
            $this->image_moo->load('.'.$image_url)->resize_crop(270,270)->save('.'.$image_url,TRUE);

            //delete old photo
            $old_photo = $this->db->where('dog_id', $dog_id)->get('dogs')->row_array();
            unlink('.'.$old_photo['dog_img']);

            //prepare data for inserting into database
            $data['dog_img'] = $image_url;
        }
        //update database
        $this->db->where('dog_id',$dog_id)->update('dogs', $data);

        redirect('/admin/dogs', 'refresh');
    }

    //Delete dog --------------------------------------------------------------------------------------------------
    public function del_dog($dog_id)
    {
        $query = $this->db->where('dog_id', $dog_id)->get('dogs')->row_array();
        if($query['dog_img'])
        {
            unlink('.'.$query['dog_img']);
        }

        $this->db->where('dog_id', $dog_id)->delete('dogs');
    }
// END DOGS SECTION =============================================================================================================

// START SERVICES SECTION ========================================================================================================
    public function get_services($serv_id = FALSE)
    {
        if ($serv_id === FALSE)
        {
            $query = $this->db->get('services')->result_array();
            return $query;
        }

        $query = $this->db->get_where('services', array('serv_id' => $serv_id))->row_array();
        return $query;
    }

    //Create service --------------------------------------------------------------------------------------------------------------------
    public function create_service_handler()
    {
        //prepare data for put into database
        $data['serv_name'] = $this->input->post('serv_name');
        $data['serv_slug'] = $this->translit($this->input->post('serv_name'));
        $data['serv_desc'] = $this->input->post('serv_desc');
        $data['serv_price'] = $this->input->post('serv_price');
        $data['serv_status'] = $this->input->post('serv_status');

        //prepare to download photo
        $config['upload_path'] = './uploads/services/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['overwrite'] = FALSE;

        $this->load->library('upload', $config);

        if($this->upload->do_upload('userfile'))
        {
            $image_dir = str_replace('.', '', $config['upload_path']);
            $temp = $this->upload->data();
            $file_name = $temp['file_name'];
            $image_url = $image_dir.$file_name;

            //resize photo
            $this->image_moo->load('.'.$image_url)->resize_crop(570,240)->save('.'.$image_url,TRUE);

            //prepare data for inserting into database
            $data['serv_img'] = $image_url;
        }
        //insert data into database
        $this->db->insert('services', $data);

        redirect('/admin/services', 'refresh');
    }

    //Edit service --------------------------------------------------------------------------------------------------------------------
    public function edit_service_handler($serv_id)
    {
        //prepare data for put into database
        $data['serv_name'] = $this->input->post('serv_name');
        $data['serv_slug'] = $this->translit($this->input->post('serv_name'));
        $data['serv_desc'] = $this->input->post('serv_desc');
        $data['serv_price'] = $this->input->post('serv_price');
        $data['serv_status'] = $this->input->post('serv_status');

        //prepare to download photo
        $config['upload_path'] = './uploads/services/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['overwrite'] = FALSE;

        $this->load->library('upload', $config);

        if($this->upload->do_upload('userfile'))
        {
            $image_dir = str_replace('.', '', $config['upload_path']);
            $temp = $this->upload->data();
            $file_name = $temp['file_name'];
            $image_url = $image_dir.$file_name;

            //resize photo
            $this->image_moo->load('.'.$image_url)->resize_crop(570,240)->save('.'.$image_url,TRUE);

            //delete old photo
            $old_photo = $this->db->where('serv_id', $serv_id)->get('services')->row_array();
            unlink('.'.$old_photo['serv_img']);

            //prepare data for inserting into database
            $data['serv_img'] = $image_url;
        }
        //update database
        $this->db->where('serv_id',$serv_id)->update('services', $data);

        redirect('/admin/services', 'refresh');
    }

    //Delete service --------------------------------------------------------------------------------------------------
    public function del_service($serv_id)
    {
        $query = $this->db->where('serv_id', $serv_id)->get('services')->row_array();
        if($query['serv_img'])
        {
            unlink('.'.$query['serv_img']);
        }

        $this->db->where('serv_id', $serv_id)->delete('services');
    }
// END SERVICES SECTION =============================================================================================================

// START DIPLOMS SECTION ==========================================================================================================
    public function get_diploms($diplom_id = FALSE)
    {
        if ($diplom_id === FALSE)
        {
            $query = $this->db->get('diploms')->result_array();
            return $query;
        }

        $query = $this->db->where('diplom_id', $diplom_id)->get('diploms')->row_array();
        return $query;
    }

//Create diplom --------------------------------------------------------------------------------------------------------------------
    public function create_diplom_handler()
    {
        //готовим данные для записи в базу
        $data['diplom_name'] = $this->input->post('diplom_name');
        $data['diplom_desc'] = $this->input->post('diplom_desc');
        $data['diplom_date'] = $this->input->post('diplom_date');
        $data['diplom_status'] = $this->input->post('diplom_status');

        //подготовка загрузки фото
        $config['upload_path'] = './uploads/reputation/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['overwrite'] = FALSE;

        $this->load->library('upload', $config);

        if($this->upload->do_upload('userfile'))
        {
            $image_dir = str_replace('.', '', $config['upload_path']);
            $temp = $this->upload->data();
            $file_name = $temp['file_name'];
            $image_url = $image_dir.$file_name;

            //ресайз фото
            $this->image_moo->load('.'.$image_url)->resize(160)->save('.'.$image_url,TRUE);

            //готовим данные для записи в базу
            $data['diplom_img'] = $image_url;
        }

        //обновление данных в базе
        $this->db->insert('diploms', $data);

        redirect('/admin/diploms', 'refresh');
    }

//Edit diplom --------------------------------------------------------------------------------------------------------------------
    public function edit_diplom_handler($diplom_id)
    {
        //готовим данные для записи в базу
        $data['diplom_name'] = $this->input->post('diplom_name');
        $data['diplom_desc'] = $this->input->post('diplom_desc');
        $data['diplom_date'] = $this->input->post('diplom_date');
        $data['diplom_status'] = $this->input->post('diplom_status');

        //подготовка загрузки фото
        $config['upload_path'] = './uploads/reputation/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['overwrite'] = FALSE;

        $this->load->library('upload', $config);

        if($this->upload->do_upload('userfile'))
        {
            $image_dir = str_replace('.', '', $config['upload_path']);
            $temp = $this->upload->data();
            $file_name = $temp['file_name'];
            $image_url = $image_dir.$file_name;

            //ресайз фото
            $this->image_moo->load('.'.$image_url)->resize(160)->save('.'.$image_url,TRUE);

            //удаляем старые фото
            $old_photo = $this->db->where('diplom_id', $diplom_id)->get('diploms')->row_array();
            unlink('.'.$old_photo['diplom_img']);

            //готовим данные для записи в базу
            $data['diplom_img'] = $image_url;
        }

        //обновление данных в базе
        $this->db->where('diplom_id',$diplom_id)->update('diploms', $data);

        redirect('/admin/diploms', 'refresh');
    }

    //Delete diplom --------------------------------------------------------------------------------------------------
    public function del_diplom($diplom_id)
    {
        $query = $this->db->where('diplom_id', $diplom_id)->get('diploms')->row_array();

        unlink('.'.$query['diplom_img']);

        $this->db->where('diplom_id', $diplom_id)->delete('diploms');
    }
// END DIPLOMS SECTION ============================================================================================================

// START TEAM SECTION ==========================================================================================================
    public function get_team($team_id = FALSE)
    {
        if ($team_id === FALSE)
        {
            $query = $this->db->get('team')->result_array();
            return $query;
        }

        $query = $this->db->where('team_id', $team_id)->get('team')->row_array();
        return $query;
    }

//Create team --------------------------------------------------------------------------------------------------------------------
    public function create_team_handler()
    {
        //готовим данные для записи в базу
        $data['team_name'] = $this->input->post('team_name');
        $data['team_position'] = $this->input->post('team_position');
        $data['team_desc'] = $this->input->post('team_desc');
        $data['team_status'] = $this->input->post('team_status');

        //подготовка загрузки фото
        $config['upload_path'] = './uploads/team/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['overwrite'] = FALSE;

        $this->load->library('upload', $config);

        if($this->upload->do_upload('userfile'))
        {
            $image_dir = str_replace('.', '', $config['upload_path']);
            $temp = $this->upload->data();
            $file_name = $temp['file_name'];
            $image_url = $image_dir.$file_name;

            //ресайз фото
            $this->image_moo->load('.'.$image_url)->resize(375,375)->save('.'.$image_url,TRUE);

            //готовим данные для записи в базу
            $data['team_img'] = $image_url;
        }

        //обновление данных в базе
        $this->db->insert('team', $data);

        redirect('/admin/team', 'refresh');
    }

//Edit team --------------------------------------------------------------------------------------------------------------------
    public function edit_team_handler($team_id)
    {
        //готовим данные для записи в базу
        $data['team_name'] = $this->input->post('team_name');
        $data['team_position'] = $this->input->post('team_position');
        $data['team_desc'] = $this->input->post('team_desc');
        $data['team_status'] = $this->input->post('team_status');

        //подготовка загрузки фото
        $config['upload_path'] = './uploads/team/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['overwrite'] = FALSE;

        $this->load->library('upload', $config);

        if($this->upload->do_upload('userfile'))
        {
            $image_dir = str_replace('.', '', $config['upload_path']);
            $temp = $this->upload->data();
            $file_name = $temp['file_name'];
            $image_url = $image_dir.$file_name;

            //ресайз фото
            $this->image_moo->load('.'.$image_url)->resize(375,375)->save('.'.$image_url,TRUE);

            //удаляем старые фото
            $old_photo = $this->db->where('team_id', $team_id)->get('team')->row_array();
            unlink('.'.$old_photo['team_img']);

            //готовим данные для записи в базу
            $data['team_img'] = $image_url;
        }

        //обновление данных в базе
        $this->db->where('team_id',$team_id)->update('team', $data);

        redirect('/admin/team', 'refresh');
    }

    //Delete team --------------------------------------------------------------------------------------------------
    public function del_team($team_id)
    {
        $query = $this->db->where('team_id', $team_id)->get('team')->row_array();

        unlink('.'.$query['team_img']);

        $this->db->where('team_id', $team_id)->delete('team');
    }
// END TEAM SECTION ============================================================================================================

// START CALLS SECTION ===========================================================================================================
    public function get_calls($mode, $offset, $limit, $call_id = FALSE, $counter = 0)
    {
        if ($call_id === FALSE AND $counter == 0)
        {
            $offset = (int)$this->uri->segment($offset);
            switch ($mode)
            {
                case 'unfinished':
                    // $query = $this->db->query("SELECT * FROM calls WHERE call_status = 0 LIMIT $offset, $limit ORDER BY call_date desc")->result_array();
                    $query = $this->db->where('call_status',0)->limit($limit, $offset)->order_by('call_date','desc')->get('calls')->result_array();
                    break;
                case 'finished':
                    // $query = $this->db->query("SELECT * FROM calls WHERE call_status = 1 LIMIT $offset, $limit ORDER BY call_date desc")->result_array();
                    $query = $this->db->where('call_status',1)->limit($limit, $offset)->order_by('call_date','desc')->get('calls')->result_array();
                    break;
                case 'expired':
                    $date = time()-86400;
                    // $query = $this->db->query("SELECT * FROM calls WHERE call_date < $time AND call_status = 0 LIMIT $offset, $limit ORDER BY call_date desc")->result_array();
                    $query = $this->db->where('call_status',0)->where('call_date <',$date)->limit($limit, $offset)->order_by('call_date','desc')->get('calls')->result_array();
                    break;
                default:
                    $query = $this->db->limit($limit, $offset)->order_by('call_date','desc')->get('calls')->result_array();
            }//End switch
            return $query;
        }
        elseif($call_id === FALSE AND $counter == 1)
        {
            switch ($mode)
            {
                case 'unfinished':
                    $query = $this->db->where('call_status',0)->count_all_results('calls');
                    break;
                case 'finished':
                    $query = $this->db->where('call_status',1)->count_all_results('calls');
                    break;
                case 'expired':
                    $date = time()-86400;
                    $query = $this->db->where('call_status',0)->where('call_date <',$date)->count_all_results('calls');
                    break;
                default:
                    $query = $this->db->count_all('calls');
            }//End switch
            return $query;
        }
        else
        {
            $query = $this->db->where('call_id', $call_id)->get('calls')->row_array();
            return $query;
        }

    }

    public function edit_call_handler($call_id)
    {
        //готовим данные для записи в базу
        $data['call_notes'] = $this->input->post('call_notes');
        $data['call_status'] = $this->input->post('call_status');

        //обновление данных в базе
        $this->db->where('call_id',$call_id)->update('calls', $data);
    }

 //Delete call --------------------------------------------------------------------------------------------------
    public function del_call($call_id)
    {
        $this->db->where('call_id', $call_id)->delete('calls');
    }
// END CALLS SECTION =============================================================================================================

// START USERS SECTION ===========================================================================================================
    public function get_users($user_id = FALSE)
    {
        if ($user_id === FALSE)
        {
            $query = $this->db->where('user_visibility', 1)->get('users')->result_array();
            return $query;
        }

        $query = $this->db->where('user_id', $user_id)->get('users')->row_array();
        return $query;
    }

//Create user --------------------------------------------------------------------------------------------------------------------
    public function create_user_handler()
    {
        //готовим данные для записи в базу
        $data['user_name'] = $this->input->post('user_name');
        $data['user_email'] = $this->input->post('user_email');
        $data['user_phone'] = $this->input->post('user_phone');
        $data['user_password'] = md5($this->input->post('user_password'));
        $data['user_status'] = $this->input->post('user_status');

        //обновление данных в базе
        $this->db->insert('users', $data);
 }

 //Edit user --------------------------------------------------------------------------------------------------------------------
    public function edit_user_handler($user_id)
    {
        //готовим данные для записи в базу
        $data['user_name'] = $this->input->post('user_name');
        $data['user_phone'] = $this->input->post('user_phone');
        if($this->input->post('user_password'))
        {
            $data['user_password'] = md5($this->input->post('user_password'));
        }
        $data['user_status'] = $this->input->post('user_status');

        //обновление данных в базе
        $this->db->where('user_id',$user_id)->update('users', $data);
 }

  //Delete user --------------------------------------------------------------------------------------------------
    public function del_user($user_id)
    {
        $this->db->where('user_id', $user_id)->delete('users');
    }
// END USERS SECTION =============================================================================================================

// START STATISTICS SECTION ======================================================================================================
    public function get_stat()
    {
        $date = time()-(60*60*24*8);
//        $result['visits'] = $this->db->query("SELECT * FROM stat WHERE stat_date > $date")->result_array();
        $result['visits'] = $this->db->where('stat_date >',$date)->get('stat')->result_array();
//        $result['browsers'] = $this->db->query("SELECT br_name, SUM(br_count), br_color, br_highlight FROM browsers WHERE br_date > $date GROUP BY br_name")->result_array();
        $result['browsers'] = $this->db->select('br_name, br_color, br_highlight')->select_sum('br_count')->where('br_date >',$date)->group_by('br_name')->get('browsers')->result_array();
//        $result['pages'] = $this->db->query("SELECT page_url, SUM(page_count) FROM pages WHERE page_date > $date GROUP BY page_url ORDER BY SUM(page_count) desc")->result_array();
        $result['pages'] = $this->db->select('page_url')->select_sum('page_count')->where('page_date >',$date)->group_by('page_url')->order_by('page_count', 'desc')->get('pages')->result_array();
//        $result['refs'] = $this->db->query("SELECT ref_url, SUM(ref_count) FROM refs WHERE ref_date > $date GROUP BY ref_url ORDER BY SUM(ref_count) desc")->result_array();
        $result['refs'] = $this->db->select('ref_url')->select_sum('ref_count')->where('ref_date >',$date)->group_by('ref_url')->order_by('ref_count', 'desc')->get('refs')->result_array();
        // echo '<pre>';
        // print_r($result['refs']);
        // die;

        return $result;
    }
// END STATISTICS SECTION ========================================================================================================

// START MENU SECTION ========================================================================================================
    public function get_menu($menu_id = FALSE)
    {
        if ($menu_id === FALSE)
        {
            $query = $this->db->get('menu')->result_array();
            return $query;
        }

        $query = $this->db->get_where('menu', array('menu_id' => $menu_id))->row_array();
        return $query;
    }

    //Edit menu --------------------------------------------------------------------------------------------------------------------
    public function edit_menu_handler($menu_id)
    {
        //готовим данные для записи в базу
        $data['menu_name'] = $this->input->post('menu_name');
//        $data['menu_slug'] = $this->translit($this->input->post('menu_name'));
        $data['menu_title'] = $this->input->post('menu_title');
        $data['menu_status'] = $this->input->post('menu_status');

        //обновление данных в базе
        $this->db->where('menu_id',$menu_id)->update('menu', $data);

        redirect('/admin/menu', 'refresh');
    }
// END MENU SECTION ==========================================================================================================

// START BREEDS SECTION ========================================================================================================
    public function get_breeds($breed_id = FALSE)
    {
        if ($breed_id === FALSE)
        {
            $query = $this->db->get('breeds')->result_array();
            return $query;
        }

        $query = $this->db->get_where('breeds', array('breed_id' => $breed_id))->row_array();
        return $query;
    }

//Create breed --------------------------------------------------------------------------------------------------------------------
    public function create_breed_handler()
    {
        //готовим данные для записи в базу
        $data['breed_name'] = $this->input->post('breed_name');
        $data['breed_slug'] = $this->translit($this->input->post('breed_name'));
        $data['breed_status'] = $this->input->post('breed_status');

        //обновление данных в базе
        $this->db->insert('breeds', $data);

        redirect('/admin/breeds', 'refresh');
    }

    //Edit breed --------------------------------------------------------------------------------------------------------------------
    public function edit_breed_handler($breed_id)
    {
        //готовим данные для записи в базу
        $data['breed_name'] = $this->input->post('breed_name');
        $data['breed_slug'] = $this->translit($this->input->post('breed_name'));
        $data['breed_status'] = $this->input->post('breed_status');

        //обновление данных в базе
        $this->db->where('breed_id',$breed_id)->update('breeds', $data);

        redirect('/admin/breeds', 'refresh');
    }

    //Delete breed --------------------------------------------------------------------------------------------------
    public function del_breed($breed_id)
    {
        $this->db->where('breed_id', $breed_id)->delete('breeds');
    }
// END BREEDS SECTION ==========================================================================================================
}