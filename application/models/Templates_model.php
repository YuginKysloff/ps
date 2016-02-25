<?php
class Templates_model extends CI_Model {

    public static $basket = array();
    public static $count = 0;

    public function __construct()
    {
        $this->load->database();
    }

    //for header and footer ============================================================================================
    // get setting of website ------------------------------------------------------------------------------------------
    public function get_settings()
    {
        return $query = $this->db->get('settings')->row_array();
    }

    // get main menu ---------------------------------------------------------------------------------------------------
    public function get_menu($slug = FALSE)
    {
        if($slug === FALSE)
        {
            return $query = $this->db->where('menu_status',1)->get('menu')->result_array();
        }

        return $query = $this->db->where('menu_slug',$slug)->get('menu')->row_array();
    }

    //harvest statistics -----------------------------------------------------------------------------------------------
    public function do_statistics()
    {
        // IP
        empty($_SERVER['REMOTE_ADDR'])?$ip = "Не определен":$ip = $_SERVER['REMOTE_ADDR'];
        // Host
        $host = gethostbyaddr($ip);
        if(!$host) $host = "Не определен";
        // Page
        empty($_SERVER['REQUEST_URI'])?$url = "Не определен":$url = $_SERVER['REQUEST_URI'];
        // Refferer
        empty($_SERVER['HTTP_REFERER'])?$referer = "No Referer":$referer = urlencode($_SERVER['HTTP_REFERER']);
        // User agent
        empty($_SERVER['HTTP_USER_AGENT'])?$agent = "Не определен":$agent = $_SERVER['HTTP_USER_AGENT'];
        // time of visit
        $date = time();


        $this->db->query("INSERT INTO hits (`hit_date`, `hit_ip`, `hit_host`, `hit_url`, `hit_ref`, `hit_user_agent`)
                        VALUES ('$date', '$ip', '$host', '$url', '$referer', '$agent')");
    }


//    Basket section start ------------------------------------------------------------------------------

    public function basket_init()
    {
        if(!isset($_COOKIE['psb']))
        {
            $basket = array('orderid' => uniqid());
            $this->save_basket($basket);
            $this->session->set_userdata('basket', $basket);
            $this->session->set_userdata('count', 0);
//            print_r($this->session->all_userdata());
        }
        else
        {
            $basket = unserialize(base64_decode($_COOKIE['psb']));
            $count = count($basket)-1;
            $this->session->set_userdata('basket', $basket);
            $this->session->set_userdata('count', $count);
//            print_r($this->session->all_userdata());
        }
    }

    public function get_basket()
    {
        $basket = $this->session->userdata('basket');
        $basket = array_keys($basket);
        $basket_id = array_shift($basket);
        $query = $this->db->where_in('pet_id',$basket)->get('pets')->result_array();
        return $query;
    }

    public function save_basket($basket)
    {
        $bask = base64_encode(serialize($basket));
        setcookie('psb', $bask, 0X7FFFFFFF,'/');
    }

    public function add2basket($pet_id)
    {
        $basket = $this->session->userdata('basket');
        $basket[$pet_id] = 1;
        $this->save_basket($basket);
        $this->session->set_userdata('basket', $basket);

    }

    public function del_pet($pet_id)
    {
        $basket = $this->session->userdata('basket');
        unset($basket[$pet_id]);
        $this->save_basket($basket);
        $this->session->set_userdata('basket', $basket);
    }
//    Basket section end ---------------------------------------------------------------------------------


    // for body ========================================================================================================
    //get slides for main slider ---------------------------------------------------------------------------------------
    public function get_slides()
    {
        return $query = $this->db->where('slide_status',1)->get('slides')->result_array();
    }

    //get slides for reputation slider ---------------------------------------------------------------------------------------
    public function get_diploms()
    {
        return $query = $this->db->where('diplom_status',1)->get('diploms')->result_array();
    }

    public function get_pets($pet_id = FALSE, $limit = 10, $offset = 0)
    {
        if($pet_id === FALSE)
        {
            return $query = $this->db->limit($limit, $offset)->get('pets')->result_array();
        }
        return $query = $this->db->where('pet_id', $pet_id)->get('pets')->row_array();
    }

    //Calls section start ------------------------------------------------------------------------------
    public function call_handler()
    {
        $this->set_message();
//         redirect('/about', 'refresh');
//
        $data['settings'] = $this->get_settings();

        $subject = 'Сообщение с сайта '.$data['settings']['set_company'];
        $message = $this->input->post('call_message');
        $user = $this->input->post('call_name');
        $phone = $this->input->post('call_tel');
        $date = date('H:i d-m-Y',$this->input->post('call_date'));

        $body = "Дата: ".$date.".\n"."Пользователь ".$user.".\n"."Телефон: ".$phone.".\n"."Оставил сообщение: ".$message;

        if($result = $this->email
            ->from('petshop@gmail.com')
//             ->reply_to('yumash@ukr.net')    // Optional, an account where a human being reads.
            ->to($data['settings']['set_email'])
            ->subject($subject)
            ->message($body)
            ->send())
        {
            $this->session->set_flashdata('message', 'Ваше письмо отправлено!');
            redirect($_SERVER['PHP_SELF'], 'refresh');
        }
        else {
            $this->session->set_flashdata('message', 'Ваше письмо НЕ отправлено!');
            redirect($_SERVER['PHP_SELF'], 'refresh');
        }
    }

    public function set_message()
    {
        $data = array
        (
            'call_date' => (int)$this->input->post('call_date'),
            'call_name' => $this->input->post('call_name'),
            'call_tel' => $this->input->post('call_tel'),
            'call_message' => $this->input->post('call_message'),
            'call_status' => 0
        );
        return $this->db->insert('calls', $data);
    }
//Calls section end --------------------------------------------------------------------------------
}