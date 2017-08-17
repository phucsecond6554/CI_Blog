<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  /**
   *
   */
  class Home extends CI_Controller
  {
    private $_data;

    function __construct()
    {
      parent::__construct();
      $this->load->library('pagination');
      $this->load->helper('url');
      $this->load->model('Site/Post_Model');

      $this->_data['title'] = 'Trang chu';
      $this->_data['subview'] = 'Site/layout/home';
    }

    public function index(){
      $this->_data['post'] = $this->Post_Model->get_post_page();
      $this->load->view('Site/main_layout', $this->_data);
    }
  }


 ?>
