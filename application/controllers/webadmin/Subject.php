<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class subject extends CI_Controller {

    function __construct() {
        parent::__construct();
       // $this->load->helper('file');
        //$this->lang->load('message', 'english');
    }

    function index() {
        
        if($this->session->userdata('isUserLoggedIn')){
        if (!$this->rbac->hasPrivilege('subject', 'can_view')) {
            access_denied();
        }
        $data['title'] = 'Add Subject';
        $subject_result = $this->subject_model->get();
        
        $data['subjectlist'] = $subject_result;
        $this->load->view('adminlogin/layout/header', $data);
        $this->load->view('adminlogin/subject/subjectList', $data);
        $this->load->view('adminlogin/layout/footer', $data);
        }else{
            $this->session->set_userdata('msg', 'Your Session is destroy. Please login to your account.');
            redirect('site/login');
        }
}

  function create() {
       
        $data['title'] = 'Add subject';
        
        $subject_result = $this->subject_model->get();
        $data['subjectlist'] = $subject_result;
        
        $this->form_validation->set_rules('name', 'Subject Name', 'trim|required|callback__check_name_exists');
        if ($this->input->post('code')) {
            $this->form_validation->set_rules('code', 'Code', 'trim|required|callback__check_code_exists');
        }
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('layout/header', $data);
            $this->load->view('adminlogin/subject/subjectList', $data);
            $this->load->view('layout/footer', $data);
        } else {
            $data = array(
                'name' => $this->input->post('name'),
                'code' => $this->input->post('code'),
                'type' => $this->input->post('type'),
            );
            $this->subject_model->add($data);
            $this->session->set_flashdata('msg', '<div class="alert alert-success text-left">Subject added successfully</div>');
            redirect('webadmin/subject/index');
        }
    }
    
    function _check_name_exists() {
        $data['name'] = $this->security->xss_clean($this->input->post('name'));
        if ($this->subject_model->check_data_exists($data)) {
            $this->form_validation->set_message('_check_name_exists', 'Name already exists');
            return FALSE;
        } else {
            return TRUE;
        }
    }
    
    function _check_code_exists() {
        $data['code'] = $this->security->xss_clean($this->input->post('code'));
        if ($this->subject_model->check_code_exists($data)) {
            $this->form_validation->set_message('_check_code_exists', 'Code already exists');
            return FALSE;
        } else {
            return TRUE;
        }
    }
    
    
    function edit($id) {
        if($this->session->userdata('isUserLoggedIn')){
        if (!$this->rbac->hasPrivilege('subject', 'can_edit')) {
            access_denied();
        }
        $subject_result = $this->subject_model->get();
        $data['subjectlist'] = $subject_result;
        $data['title'] = 'Edit Subject';
        $data['id'] = $id;
        $subject = $this->subject_model->get($id);
        $data['subject'] = $subject;
        $this->form_validation->set_rules('name', 'Subject', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('adminlogin/layout/header', $data);
            $this->load->view('adminlogin/subject/subjectEdit', $data);
            $this->load->view('adminlogin/layout/footer', $data);
        } else {
            $data = array(
                'id' => $id,
                'name' => $this->input->post('name'),
                'code' => $this->input->post('code'),
                'type' => $this->input->post('type'),
            );
            $this->subject_model->add($data);
            $this->session->set_flashdata('msg', '<div class="alert alert-success text-left">Subject updated successfully</div>');
            redirect('webadmin/subject/index');
        }
        }else{
            $this->session->set_userdata('msg', 'Your Session is destroy. Please login to your account.');
            redirect('site/login');
        }
    }
    
    function delete($id) {
        if($this->session->userdata('isUserLoggedIn')){
        if (!$this->rbac->hasPrivilege('subject', 'can_delete')) {
            access_denied();
        }
        $data['title'] = 'Subject List';
        $this->subject_model->remove($id);
        redirect('webadmin/subject/index');
        }else{
            $this->session->set_userdata('msg', 'Your Session is destroy. Please login to your account.');
            redirect('site/login');
        }
    }

}
