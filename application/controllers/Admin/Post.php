<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class Post extends CI_Controller
{
  protected $_data;
  function __construct()
  {
    parent::__construct();
    $this->load->helper(array('url', 'vietnamese_helper','date_helper'));
    //vietnamese_helper dung de chuyen chu viet co dau thanh khong dau

    $this->load->library(array('session','form_validation'));

    if(empty($this->session->userdata('username')) && $this->session->userdata('username') == ''){
      redirect('Admin/Signin');
    } // Neu chua dang nhap vao he thong chuyen ve trang dang nhap

    //Load model de insert Post
    $this->load->model('Admin/Post_Model');
  }

  public function index()
  {
    //Thong tin ve website de truyen vao main_layout
    $this->_data['subview'] = 'Admin/layout/post';
    $this->_data['username'] = 'Admin';
    $this->_data['title'] = 'Admin Post';

    //Lay danh sach Category
    $this->load->model('Admin/Category_Model');
    $this->_data['category'] = $this->Category_Model->get_category();

    $this->load->view('Admin/main_layout',$this->_data);
  }

  public function add_post(){

    //Set rules cho form_validation
    $this->form_validation->set_rules('title','Title','required|trim');
    $this->form_validation->set_rules('description', 'Description','required|trim');
    $this->form_validation->set_rules('demoimage','Demo Image','required');
    $this->form_validation->set_rules('post-content','post-content','required');

    if($this->form_validation->run() == false){ // Neu du lieu nhap vao khong hop le
      $this->load->view('Admin/main_layout',$this->_data);
    }else { // Hop le
      $postdata = array(); // Du lieu de insert
      $postdata['title'] = $this->input->post('title');
      $postdata['url'] = url_title(lang_change($postdata['title']), '-', true);
      $postdata['category'] = $this->input->post('category');
      $postdata['posttime'] = get_now(); // get_now trong date_helper
      $postdata['postby'] = $this->session->userdata('username');
      $postdata['description'] = $this->input->post('description');
      $postdata['demo_img'] = $this->input->post('demoimage');
      $postdata['content'] = $this->input->post('post-content');

      if($this->Post_Model->insertPost($postdata)){ // Insert Du lieu thanh cong
        $this->session->set_flashdata('mess','Them Post thanh cong');
        redirect('Admin/Allpost');
      }else { // Insert that bai
        $this->session->set_flashdata('mess','Them Post thanh cong');
        $this->load->view('Admin/main_layout',$this->_data);
      }
    }
  } //End Action Add post

  /*
    * Delete mot post
  */

  public function deletePost(){
    if($this->input->post('delete_submit')){ // Neu admin co nhan nut delete
      $id = (int) $this->input->post('delete_post'); // Lay id cua post -- Ep kieu de dam bao data la so

      if($this->Post_Model->deletePost($id)){ // Neu xoa du lieu thanh cong
        $this->session->set_flashdata('mess','Xoa du lieu thanh cong');
        redirect('Admin/Allpost');
      }else {
        $this->session->set_flashdata('mess','Khong the xoa du lieu');
        redirect('Admin/Allpost');
      }
    }
  } // End action delete post
}

 ?>
