<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  /**
   *
   */
  class Search extends CI_Controller
  {
    private $_data;

    function __construct()
    {
      parent::__construct();
      $this->load->helper('url');
      $this->load->model('Site/Post_Model');

      $this->_data['title'] = 'Tim kiem';
      $this->_data['subview'] = 'Site/layout/search';
    }

    public function index(){
      $search_key = $this->input->get('search-key'); // Lay noi dung tim kiem
      $this->_data['post'] = $this->Post_Model->post_search($search_key);

      $search_key = $this->security->xss_clean($search_key);

      $this->_data['search_key'] = $search_key;

      $this->load->view('Site/main_layout', $this->_data);
    }// Index

    public function search_suggest(){
      $search_key = $this->input->get('search_key'); // Lay noi dung tim kiem
      $this->_data['post'] = $this->Post_Model->post_search_suggest($search_key);

      //echo '<pre>';
      //print_r($this->_data['post']);

      echo json_encode($this->_data['post']);
    }
  }

 ?>
