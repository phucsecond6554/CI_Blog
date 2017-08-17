<?php
  /**
   *
   */
  class Post_Model extends CI_Model
  {
    private $table_name = 'post';

    function __construct()
    {
      parent::__construct();
      $this->load->database();
    }


    public function get_post_page($page = null, $record = null){
      $this->db->select('id, title, url, posttime, postby, description, demo_img');

      if($page !== null && $record !== null){
        $this->db->limit($record, ($page - 1) * $record);
        $query = $this->db->get($this->table_name);

        return $query->result();
      }else {
        $query = $this->db->get($this->table_name);

        return $query->result();
      }
    } // Function get_post_page lay post theo trang

    public function get_post_category($category, $page = null, $record = null){
      $this->db->select('id, title, url, posttime, postby, description, demo_img');

      $this->db->like('category', $category);

      $query = $this->db->get($this->table_name);

      return $query->result();
    } // Tim kiem theo category

    public function post_search($search_key){
      $this->db->select('id, title, url, posttime, postby, description, demo_img');
      $this->db->like('title', $search_key);
      $query = $this->db->get($this->table_name);

      return $query->result();
    }//post_search

    public function post_search_suggest($search_key){
      $this->db->select('title, url');
      $this->db->like('title', $search_key);
      $query = $this->db->get($this->table_name);

      return $query->result_array();
    }

    public function get_detail($url){
      $this->db->where('url', $url);
      $query = $this->db->get($this->table_name);
      return $query->row();
    } // Lay post
  }

 ?>
