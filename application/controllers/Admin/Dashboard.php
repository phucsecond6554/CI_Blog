<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class Dashboard extends CI_Controller
{
  protected $_data;
  function __construct()
  {
    parent::__construct();
    $this->load->helper('url');
    $this->load->library('session');

    if(empty($this->session->userdata('username')) && $this->session->userdata('username') == ''){
      redirect('Admin/Signin');
    } // Neu chua dang nhap vao he thong chuyen ve trang dang nhap

    $this->_data['subview'] = 'Admin/layout/dashboard';
    $this->_data['title'] = 'Admin Dashboard';
  }

  public function index()
  {
    $this->load->view('Admin/main_layout',$this->_data);
  }
}

 ?>
