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
    public function get_dogs($mode, $dog_slug = FALSE, $limit = 10, $offset = 0)
    {
        if (($dog_slug === FALSE) AND ($mode != 'all')) {
//            return $query = $this->db->limit($limit, $offset)->get('dogs')->result_array();
            $this->db->select('*');
            $this->db->from('dogs');
            $this->db->where('breed_slug', $mode);
            $this->db->join('breeds', 'breeds.breed_id = dogs.dog_breed');
            $this->db->limit($limit, $offset);
            return $query = $this->db->get()->result_array();
        }else{
            $this->db->select('*');
            $this->db->from('dogs');
            $this->db->join('breeds', 'breeds.breed_id = dogs.dog_breed');
            $this->db->limit($limit, $offset);
            return $query = $this->db->get()->result_array();
        }
//        return $query = $this->db->where('dog_slug', $dog_slug)->get('dogs')->row_array();
        $this->db->select('*');
        $this->db->from('dogs');
        $this->db->where('dog_slug', $dog_slug);
        $this->db->join('breeds', 'breeds.breed_id = dogs.dog_breed');
        return $query = $this->db->get()->row_array();
    }

    //get random pets
    public function rand_dogs()
    {
//        $query = $this->db->get('dogs')->result_array();
        $this->db->select('*');
        $this->db->from('dogs');
        $this->db->join('breeds', 'breeds.breed_id = dogs.dog_breed');
        $query = $this->db->get()->result_array();
        $max = count($query);
        $numbers = range(0, $max - 1);
        shuffle($numbers);
        for ($i = 0; $i < $max; $i++) {
            $result[$i] = $query[$numbers[$i]];
        }
        return $result;
    }

    public function get_breeds()
    {
        return $this->db->get('breeds')->result_array();
    }

}