<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Feetype extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
//        if (!$this->rbac->hasPrivilege('fees_type', 'can_view')) {
//            access_denied();
//        }

        $data['title'] = 'Add Feetype';
        $this->form_validation->set_rules('code', 'Code', array('required',array('check_exists', array($this->feetype_model, 'check_exists'))) );
        $this->form_validation->set_rules('name', 'Name', 'required');
        if ($this->form_validation->run() == FALSE) {
            
        } else {
            $data = array(
                'type' => $this->input->post('name'),
                'code' => $this->input->post('code'),
                'description' => $this->input->post('description'),
            );
            $this->feetype_model->add($data);
            $this->session->set_flashdata('msg', '<div class="alert alert-success text-left">Fees Type added successfully</div>');
            redirect('webadmin/feetype/index');
        }
        $feegroup_result = $this->feetype_model->get();
        $data['feetypeList'] = $feegroup_result;

        $this->load->view('adminlogin/layout/header', $data);
        $this->load->view('adminlogin/feetype/feetypeList', $data);
        $this->load->view('adminlogin/layout/footer', $data);
    }
    
    function delete($id) {
//        if (!$this->rbac->hasPrivilege('fees_type', 'can_delete')) {
//            access_denied();
//        }
        $data['title'] = 'Fees Master List';
        $this->feetype_model->remove($id);
        $this->session->set_flashdata('msg', '<div class="alert alert-success text-left">Fees Type Deleted successfully</div>');
        redirect('webadmin/feetype/index');
    }
    
    function edit($id) {
//        if (!$this->rbac->hasPrivilege('fees_type', 'can_edit')) {
//            access_denied();
//        }

        $data['id'] = $id;
        $feetype = $this->feetype_model->get($id);
        $data['feetype'] = $feetype;
        
        $feegroup_result = $this->feetype_model->get();
        $data['feetypeList'] = $feegroup_result;
        
        $this->form_validation->set_rules('name', 'Name', array('required',array('check_exists', array($this->feetype_model, 'check_exists'))
                ));
        $this->form_validation->set_rules('name', 'Name', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('adminlogin/layout/header', $data);
            $this->load->view('adminlogin/feetype/feetypeEdit', $data);
            $this->load->view('adminlogin/layout/footer', $data);
        } else {
            $data = array(
                'id' => $id,
                'type' => $this->input->post('name'),
                'code' => $this->input->post('code'),
                'description' => $this->input->post('description'),
            );
            $this->feetype_model->add($data);
            $this->session->set_flashdata('msg', '<div class="alert alert-success text-left">Fees Type updated successfully</div>');
            redirect('webadmin/feetype/index');
        }
    }
    
}