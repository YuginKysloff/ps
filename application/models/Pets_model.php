<?php
class Pets_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    //count table's rows
    public function count_pets()
    {
        return $query = $this->db->get('pets')->num_rows();
    }

    //main get pets function
    public function get_pets($pet_slug = FALSE, $limit = 10, $offset = 0)
    {
        if($pet_slug === FALSE)
        {
            return $query = $this->db->limit($limit, $offset)->get('pets')->result_array();
        }
        return $query = $this->db->where('pet_slug', $pet_slug)->get('pets')->row_array();
    }

    //get random pets
    public function rand_pets()
    {
        $query = $this->db->get('pets')->result_array();
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