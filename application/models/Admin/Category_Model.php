<?php
/**
 *
 */
class Category_Model extends CI_Model
{
  private $table_name = 'category';

  function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

  function get_category(){
    $query = $this->db->get($this->table_name);
    return $query->result();
  }
}


 ?>
