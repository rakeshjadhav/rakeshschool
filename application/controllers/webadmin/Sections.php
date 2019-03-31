<?php
//developer Rakesh Ramesh Jadhav (Php Developer)
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class sections extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('file');
    }

    function index() {
        if($this->session->userdata('isUserLoggedIn')){
        if (!$this->rbac->hasPrivilege('division', 'can_add')) {
            access_denied();
        }
        $data['title'] = 'Division List';
        $division_result = $this->division_model->get();
        $data['division'] = $division_result;
        
        $this->form_validation->set_rules('division', 'Division', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('adminlogin/layout/header',$data);
            $this->load->view('adminlogin/section/sectionList',$data);
            $this->load->view('adminlogin/layout/footer',$data);
        } else {
            $data = array(
                'division' => $this->input->post('division'),
            );
            
            $this->division_model->add($data);
            $this->session->set_flashdata('msg', '<div class="alert alert-success text-left">Section added successfully</div>');
            redirect('webadmin/sections/index');
        }
        }else{
            $this->session->set_userdata('msg', 'Your Session is destroy. Please login to your account.');
            redirect('site/login');
        }
    }
    
//    edit
    function edit($id) {
         if($this->session->userdata('isUserLoggedIn')){
         if (!$this->rbac->hasPrivilege('division', 'can_edit')) {
            access_denied();
        }
        $data['title'] = 'Division List';
        
        $section_result = $this->division_model->get();
        $data['divisionlist'] = $section_result;
        
        $data['title'] = 'Edit Division';
        $data['id'] = $id;
        $division = $this->division_model->get($id);
        $data['division'] = $division;
        
        $this->form_validation->set_rules('division', 'Division', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('adminlogin/layout/header',$data);
            $this->load->view('adminlogin/section/sectionEdit',$data);
            $this->load->view('adminlogin/layout/footer',$data);
        } else {
            $data = array(
                'id' => $id,
                'division' => $this->input->post('division'),
            );
            $this->division_model->add($data);
            $this->session->set_flashdata('msg', '<div class="alert alert-success text-left">Section updated successfully</div>');
            redirect('webadmin/sections/index');
        }
        }else{
            $this->session->set_userdata('msg', 'Your Session is destroy. Please login to your account.');
            redirect('site/login');
        }
    }
    
    function delete($id) {
        if($this->session->userdata('isUserLoggedIn')){
           if (!$this->rbac->hasPrivilege('division', 'can_delete')) {
            access_denied();
        }
            $data['title'] = 'Division List';
            $this->division_model->remove($id);
            redirect('webadmin/sections/index');
        }else{
            $this->session->set_userdata('msg', 'Your Session is destroy. Please login to your account.');
            redirect('site/login');
        }
    }
    
    function getByClass() {
//        var_dump($_POST);exit;
        $class_id = $this->input->get('class_id');
        $data = $this->division_model->getClassBySection($class_id);
        echo json_encode($data);
    }
    
}
