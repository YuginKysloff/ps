<?php

class Dogs_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    //count table's rows
    public function count_dogs()
    {
        return $query = $this->db->get('dogs')->num_rows();
    }

    //main get pets function
    public function get_dogs($dog_slug = FALSE, $limit = 10, $offset = 0)
    {
        if ($dog_slug === FALSE) {
            return $query = $this->db->limit($limit, $offset)->get('dogs')->result_array();
        }
        return $query = $this->db->where('dog_slug', $dog_slug)->get('dogs')->row_array();
    }

    //get random pets
    public function rand_dogs()
    {
        $query = $this->db->get('dogs')->result_array();
        $max = count($query);
        $numbers = range(0, $max - 1);
        shuffle($numbers);
        for ($i = 0; $i < $max; $i++) {
            $result[$i] = $query[$numbers[$i]];
        }
        return $result;
    }

}