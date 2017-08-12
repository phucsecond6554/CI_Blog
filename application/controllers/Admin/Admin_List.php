<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  /**
   *
   */
  class Admin_List extends CI_Controller
  {
    protected $_data;

    function __construct()
    {
      parent::__construct();
      $this->load->library('session');
      $this->load->helper(array('url','date_helper'));
      $this->load->model('Admin/User_Model');

      if(empty($this->session->userdata('username')) && $this->session->userdata('username') == ''){
        redirect('Admin/Signin');
      } // Neu chua dang nhap vao he thong chuyen ve trang dang nhap

      $this->_data['title'] = 'Admin List';
      $this->_data['subview'] = 'Admin/layout/admin-list';
    } // Constructor

    public function index(){
      $this->_data['member'] = $this->User_Model->get_user();
      $this->load->view('Admin/main_layout',$this->_data);
    }
  }

 ?>
