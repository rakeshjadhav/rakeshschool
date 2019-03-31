<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class category extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('file');
        //$this->lang->load('message', 'english');
    }

    function index() {
        
        $data['title'] = 'Category List';
        
        $category_result = $this->category_model->get();
        
        $data['categorylist'] = $category_result;
        $this->load->view('adminlogin/layout/header', $data);
        $this->load->view('adminlogin/category/categoryList', $data);
        $this->load->view('adminlogin/layout/footer', $data);
    }
    
   function create() {
       
        $data['title'] = 'Add Category';
        
        $category_result = $this->category_model->get();
        
        $data['categorylist'] = $category_result;
        
        $this->form_validation->set_rules('category', 'Category', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
           
            $this->load->view('adminlogin/layout/header', $data);
            $this->load->view('adminlogin/category/categoryList', $data);
            $this->load->view('adminlogin/layout/footer', $data);
        } else {
             //var_dump($_POST);exit;
            $data = array(
                'category' => $this->input->post('category'),
            );
            $this->category_model->add($data);
            $this->session->set_flashdata('msg', '<div class="alert alert-success text-left">Category added successfully</div>');
            redirect('webadmin/category/index');
        }
    }
    
    function edit($id) {
        
        $data['title'] = 'Edit Category';
        $category_result = $this->category_model->get();
        
        $data['categorylist'] = $category_result;
        $data['id'] = $id;
        
        $category = $this->category_model->get($id);
        $data['category'] = $category;
        
        $this->form_validation->set_rules('category', 'Category', 'trim|required');
        
        if ($this->form_validation->run() == FALSE) {
            
            $this->load->view('adminlogin/layout/header', $data);
            $this->load->view('adminlogin/category/categoryEdit', $data);
            $this->load->view('adminlogin/layout/footer', $data);
        } else {
            $data = array(
                'id' => $id,
                'category' => $this->input->post('category'),
            );
            $this->category_model->add($data);
            $this->session->set_flashdata('msg', '<div class="alert alert-success text-left">Category updated successfully</div>');
            redirect('webadmin/category/index');
        }
    }
    
      function delete($id) {
          //var_dump($id);exit;
        $data['title'] = 'Category List';
        $this->category_model->remove($id);
        redirect('webadmin/category/index');
    }
 
}