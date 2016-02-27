<?php
class Pages_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    //get slides for main slider ---------------------------------------------------------------------------------------
    public function get_slides()
    {
        $order = $this->db->select('set_slider_order')->get('settings')->row_array();
        if($order['set_slider_order'])
            return $query = $this->db->where('slide_status',1)->order_by('slide_id', 'asc')->get('slides')->result_array();
        else
            return $query = $this->db->where('slide_status',1)->order_by('slide_id', 'desc')->get('slides')->result_array();
    }

    //get slides for reputation slider ---------------------------------------------------------------------------------------
    public function get_diploms()
    {
        return $query = $this->db->where('diplom_status',1)->get('diploms')->result_array();
    }

    //get team information for about page ---------------------------------------------------------------------------------------
    public function get_team()
    {
        return $query = $this->db->where('team_status',1)->get('team')->result_array();
    }

    //get services for main page ---------------------------------------------------------------------------------------
    public function get_services()
    {
        return $query = $this->db->where('serv_status',1)->get('services')->result_array();
    }

    //get random dogs
    public function rand_dogs()
    {
        $query = $this->db->get('dogs')->result_array();
        $max = count($query);
        $numbers = range(0, $max-1);
        shuffle($numbers);
        for ($i=0; $i < $max; $i++)
        {
            $result[$i] = $query[$numbers[$i]];
        }
        return $result;
    }

}