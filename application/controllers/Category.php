<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  /**
   *
   */
  class Category extends CI_Controller
  {
    private $_data;

    function __construct()
    {
      parent::__construct();
      $this->load->helper('url');
      $this->load->model('Site/Post_Model');

    }

    public function index(){
      $category = $this->uri->segment(2); // Lay category tu url
      $category = preg_replace('/-/' , ' ', $category); // Bla-bla-bla -> bla bla bla

      $this->_data['title'] = $category;
      $this->_data['category'] = $category;
      $this->_data['subview'] = 'Site/layout/category';

      $this->_data['post'] = $this->Post_Model->get_post_category($category);

      $this->load->view('Site/main_layout', $this->_data);
    }//Index
  }

 ?>
