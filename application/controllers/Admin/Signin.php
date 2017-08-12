<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class Signin extends CI_Controller
{
  protected $_data;
  function __construct()
  {
    parent::__construct();
    $this->load->helper(array('url','date_helper')); // Date helper xu li ve ngay thang
    $this->load->library(array('form_validation', 'session'));
    $this->load->model('Admin/User_Model');
  }

  public function index()
  {
    $this->form_validation->set_rules('username','Username','trim|required');
    $this->form_validation->set_rules('password','Password','trim|required');
    $this->form_validation->set_rules('signin', '', 'callback_check_login');

    if($this->form_validation->run() == false)
    {
      $this->load->view('Admin/signin');
    }else {
      $this->session->set_userdata('username', $this->input->post('username'));
      $signin_time = get_now(); // Ham get_now() trong date_helper
      $this->User_Model->update_login_time($this->input->post('username'), $signin_time);
      redirect('Admin/Dashboard');
    }
  }

  public function check_login()
  {
    $username = $this->input->post('username');
    $password = $this->input->post('password');

    if(!$this->User_Model->check_login($username, $password)){
      $this->form_validation->set_message('check_login','Username hoac mat khau khong chinh xac');
      return false;
    }else {
      return true;
    }
  }

  public function sign_out(){
    $this->session->unset_userdata('username');
    redirect('Admin/Signin');
  }
}

 ?>
