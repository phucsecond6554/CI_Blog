<?php

  /**
   *
   */
  class User_Model extends CI_Model
  {
    private $table_name = 'admin';

    function __construct()
    {
      parent::__construct();
      $this->load->database();
    }

    /*
      * Lay thong tin user admin
    */

    public function get_user($id = null){
      $this->db->select('id,realname,username,gioitinh,ngaysinh,email,ngaydangky,lancuoidangnhap');

      if($id !== null){
        $this->db->where('id', $id);
        $query = $this->db->get($this->table_name);
        return $query->row();
      }else {
        $query = $this->db->get($this->table_name);
        return $query->result();
      }
      return null;
    }

    /*
      * Kiem tra username da ton tai chua
    */
    public function valid_username($username){
      $this->db->select('id');
      $this->db->where('username' ,$username);
      $this->db->from($this->table_name);

      return $this->db->count_all_results() == 0;
    }

    /*
      * Them mot admin user moi
    */
    public function insert_user($userdata){
      return $this->db->insert($this->table_name, $userdata);
    }

    /*
      * Delete user
    */
    public function delete_user($id){
      return $this->db->delete($this->table_name, array('id'=>$id));
    }

    public function update_user($id, $data){
      $this->db->where('id', $id);
      return $this->db->update($this->table_name, $data);
    }

    /*
      * Ham nay kiem tra username va password co trung khop khong
    */

    public function check_login($username, $password){
      $this->db->select('username,pass');
      $this->db->where('username' , $username);
      //$this->db->from($this->table_name);

      if($this->db->count_all_results($this->table_name, false) == 1){
        $query = $this->db->get();
        $data = $query->row();

        return password_verify($password, $data->pass);
      }else {
        return false;
      }
    } // Function check_login

    /*
      * Function nay dung de update lai thoi gian dang nhap cuoi cung
    */
    public function update_login_time($username,$time){
      $this->db->where('username', $username);
      return $this->db->update($this->table_name, array('lancuoidangnhap'=>$time));
    }
  }

 ?>
