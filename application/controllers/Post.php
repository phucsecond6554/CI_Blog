<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  /**
   *
   */
  class Post extends CI_Controller
  {
    private $_data;

    function __construct()
    {
      parent::__construct();
      $this->load->helper('url');
      $this->load->model('Site/Post_Model');
      $this->_data['subview'] = 'Site/layout/post';
    }

    public function index(){
      $url = $this->uri->segment(2);
      $this->_data['detail'] = $this->Post_Model->get_detail($url);
      $this->_data['title'] = $this->_data['detail']->title;

      $this->load->view('Site/main_layout', $this->_data);
    }
  }

 ?>
