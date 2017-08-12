<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  /**
   *
   */
  class Allpost extends CI_Controller
  {
    protected $_data;

    function __construct()
    {
      parent::__construct();

      $this->load->helper('url');
      $this->load->library(array('session','pagination'));
      $this->load->model('Admin/Post_Model');

      if(empty($this->session->userdata('username')) && $this->session->userdata('username') == ''){
        redirect('Admin/Signin');
      } // Neu chua dang nhap vao he thong chuyen ve trang dang nhap

      $this->_data['title'] = 'All post';
      $this->_data['subview'] = 'Admin/layout/allpost';
    }

    function index(){
      $this->_data['post'] = $this->Post_Model->getPost(1, 10);

      $pagination = array(); // Bien config cho pagination
      $pagination['base_url'] = base_url('Admin/Allpost/page');
      $pagination['total_rows'] = $this->Post_Model->totalPost();
      $pagination['per_page'] = 10;
      $pagination['use_page_numbers'] = TRUE;

      $this->pagination->initialize($pagination);

      $this->_data['pagination'] = $this->pagination->create_links();

      $this->load->view('Admin/main_layout', $this->_data);
    }

    function page(){
      $current = $this->uri->segment(4);
      $totalpage = ceil($this->Post_Model->totalPost() / 10);

      if($current < 1){
        $current = 1;
      }else if($current > $totalpage){
        $current = $totalpage;
      }

      $this->_data['post'] = $this->Post_Model->getPost($current, 10);

      $pagination = array(); // Bien config cho pagination
      $pagination['base_url'] = base_url('Admin/Allpost/page');
      $pagination['total_rows'] = $this->Post_Model->totalPost();
      $pagination['per_page'] = 10;
      $pagination['use_page_numbers'] = TRUE;
      $pagination['uri_segment'] = 4;

      $this->pagination->initialize($pagination);

      $this->_data['pagination'] = $this->pagination->create_links();

      $this->load->view('Admin/main_layout', $this->_data);
    }
  }

 ?>
