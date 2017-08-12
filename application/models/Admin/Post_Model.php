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

    /*
      * Lay Tong so cac post
    */
    public function totalPost(){
      return $this->db->count_all_results($this->table_name);
    }

    /*
      * Lay cac post record theo trang
    */
    public function getPost($page, $record){
      $this->db->select('id,title,posttime,postby,view_number');
      $this->db->order_by('posttime','desc');
      $this->db->limit($record, ($page - 1) * $record); // Lay du lieu theo trang
      $query = $this->db->get($this->table_name);

      return $query->result();
    }

    /*
      *Insert du lieu
    */
    public function insertPost($postdata){
      return $this->db->insert($this->table_name, $postdata);
    }

    public function deletePost($id){
      return $this->db->delete($this->table_name,array('id'=>$id));
    }
  }

 ?>
