<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Grade extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
         if($this->session->userdata('isUserLoggedIn')){
        if (!$this->rbac->hasPrivilege('marks_grade', 'can_view')) {
            access_denied();
        }
     
        $data['title'] = 'Add Grade';
        $listgrade = $this->grade_model->get();
        $data['listgrade'] = $listgrade;
        $this->load->view('adminlogin/layout/header');
        $this->load->view('adminlogin/grade/creategrade', $data);
        $this->load->view('adminlogin/layout/footer');
        }else{
            $this->session->set_userdata('msg', 'Your Session is destroy. Please login to your account.');
            redirect('site/login');
        }
    }
    
    function create() {
        if($this->session->userdata('isUserLoggedIn')){
        if (!$this->rbac->hasPrivilege('marks_grade', 'can_add')) {
            access_denied();
        }
        $data['title'] = 'Add Arade';
        $this->form_validation->set_rules('name', 'Grade', 'trim|required');
        $this->form_validation->set_rules('mark_from', 'Percentage From', 'trim|required');
        $this->form_validation->set_rules('mark_upto', 'Percentage Upto', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $listgrade = $this->grade_model->get();
            $data['listgrade'] = $listgrade;
            $this->load->view('adminlogin/layout/header');
            $this->load->view('adminlogin/grade/creategrade', $data);
            $this->load->view('adminlogin/layout/footer');
        } else {
            $data = array(
                'name' => $this->input->post('name'),
                'mark_from' => $this->input->post('mark_from'),
                'mark_upto' => $this->input->post('mark_upto'),
                'point' => $this->input->post('point'),
                'description' => $this->input->post('description')
            );
            $this->grade_model->add($data);
            $this->session->set_flashdata('msg', '<div class="alert alert-success text-left">Grade added successfully</div>');
            redirect('webadmin/grade/index');
        }
        }else{
            $this->session->set_userdata('msg', 'Your Session is destroy. Please login to your account.');
            redirect('site/login');
        }
    }

    function edit($id) {
        if($this->session->userdata('isUserLoggedIn')){
        if (!$this->rbac->hasPrivilege('marks_grade', 'can_edit')) {
            access_denied();
        }
        $data['title'] = 'Edit Grade';
        $data['id'] = $id;
        $editgrade = $this->grade_model->get($id);
        $data['editgrade'] = $editgrade;
        $this->form_validation->set_rules('name', 'Grade', 'trim|required');
        $this->form_validation->set_rules('mark_from', 'Percentage from', 'trim|required');
        $this->form_validation->set_rules('mark_upto', 'Percentage upto', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $listgrade = $this->grade_model->get();
            $data['listgrade'] = $listgrade;
            $this->load->view('adminlogin/layout/header');
            $this->load->view('adminlogin/grade/editgrade', $data);
            $this->load->view('adminlogin/layout/footer');
        } else {
            //var_dump($_POST);exit;
            $data = array(
                'id' => $this->input->post('id'),
                'name' => $this->input->post('name'),
                'mark_from' => $this->input->post('mark_from'),
                'mark_upto' => $this->input->post('mark_upto'),
                'point' => $this->input->post('point'),
                'description' => $this->input->post('description')
            );
            $this->grade_model->add($data);
            $this->session->set_flashdata('msg', '<div class="alert alert-success text-left">Grade updated successfully</div>');
            redirect('webadmin/grade/index');
        }
        }else{
            $this->session->set_userdata('msg', 'Your Session is destroy. Please login to your account.');
            redirect('site/login');
        }
    }

    function delete($id) {
        if($this->session->userdata('isUserLoggedIn')){
        if (!$this->rbac->hasPrivilege('marks_grade', 'can_delete')) {
            access_denied();
        }
        $this->grade_model->remove($id);
        redirect('webadmin/grade/index');
        }else{
            $this->session->set_userdata('msg', 'Your Session is destroy. Please login to your account.');
            redirect('site/login');
        }
    }

    
}