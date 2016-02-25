<?php

class Blog_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    //count table's rows
    public function count_posts()
    {
        return $query = $this->db->get('blog_posts')->num_rows();
    }

    //get random posts
    public function pop_posts()
    {
        return $query = $this->db->order_by('blog_post_likes', 'desc')->limit(2)->get('blog_posts')->result_array();
    }

    //get blog's categories
    public function get_categories()
    {
        return $query = $this->db->get('blog_cats')->result_array();
    }

    //main get posts function
    public function get_posts($blog_post_slug = FALSE, $limit = 10, $offset = 0)
    {
        if ($blog_post_slug === FALSE) {
            return $query = $this->db->limit($limit, $offset)->get('blog_posts')->result_array();
        }
        return $query = $this->db->where('blog_post_slug', $blog_post_slug)->get('blog_posts')->row_array();
    }
}