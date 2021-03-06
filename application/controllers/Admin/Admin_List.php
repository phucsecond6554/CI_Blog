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
    } // index

    public function edit(){
      if($this->input->post('edit_submit')){
        $id = (int) $this->input->post('edit_member');

        $this->_data['title'] = 'Edit member';
        $this->_data['subview'] = 'Admin/layout/edit-member';

        $this->_data['detail'] = $this->User_Model->get_user($id);

        $this->load->view('Admin/main_layout',$this->_data);
      }
    }

    public function delete(){

      if($this->input->post('delete_submit')){
        $id = (int) $this->input->post('delete_member'); // Lay id

        if($this->User_Model->delete_user($id)){ // Thuc hien xoa
          $this->session->set_flashdata('mess','Da xoa du lieu thanh cong');
          redirect('Admin/Admin_List');
        }else {
          $this->session->set_flashdata('mess','Xoa du lieu that bai');
          redirect('Admin/Admin_List');
        }
      } // Kiem tra co nhan nut delete hay khong
    } // Delete user
  }

 ?>
