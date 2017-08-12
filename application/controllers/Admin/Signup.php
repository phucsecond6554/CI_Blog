<?php
defined('BASEPATH') OR exit('No direct script access allowed');

  /**
   *
   */
  class Signup extends CI_Controller
  {

    protected $_data;
    function __construct()
    {
      parent::__construct();
      $this->load->helper(array('url','date_helper'));
      $this->load->library(array('form_validation','session'));

      if(empty($this->session->userdata('username')) && $this->session->userdata('username') == ''){
        redirect('Admin/Signin');
      } // Neu chua dang nhap vao he thong chuyen ve trang dang nhap

      $this->load->model('Admin/User_Model');

      $this->_data['subview'] = 'Admin/layout/add-member';
      $this->_data['title'] = 'Admin Post';
    }

    public function index()
    {
      $this->form_validation->set_rules('name','Name','trim|required');
      $this->form_validation->set_rules('username','Username', 'trim|callback_check_username');
      $this->form_validation->set_rules('password','Password','trim|required');
      $this->form_validation->set_rules('passconf','Password Confirmation','trim|required|matches[password]');
      $this->form_validation->set_rules('email','Email','required|valid_email');

      if($this->form_validation->run() == false){
        $this->load->view('Admin/main_layout',$this->_data);
      }else {
        $userdata = array();
        $userdata['realname'] = $this->input->post('name');
        $userdata['username'] = $this->input->post('username');
        $userdata['pass'] = password_hash($this->input->post('password'),PASSWORD_DEFAULT);
        $userdata['gioitinh'] = $this->input->post('gender');

        $day = $this->input->post('b_day');
        $month = $this->input->post('b_month');
        $year = $this->input->post('b_year');

        $userdata['ngaysinh'] = $year.'/'.$month.'/'.$day;
        $userdata['email'] = $this->input->post('email');
        $userdata['ngaydangky'] = get_now();
        $userdata['lancuoidangnhap'] = get_now(); // Ham get_now() trong date_helper

        if($this->User_Model->insert_user($userdata)){
          $this->session->set_userdata('username', $userdata['username']);
          redirect('Admin/Dashboard');
        }else {
          echo "<script>alert('That bai')</script>";
        }
      }
    }

    /*
      * Action Kiem tra username da ton tai chua
    */

    public function check_username(){
      $username = $this->input->post('username');

      if(!$this->User_Model->valid_username($username)){ // Neu da ton tai username
        $this->form_validation->set_message('check_username','Username da ton tai');
        return false;
      }else {
        return true;
      }
    }
  }


 ?>
