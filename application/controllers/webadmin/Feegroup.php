<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class FeeGroup extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
//        if (!$this->rbac->hasPrivilege('fees_group', 'can_view')) {
//            access_denied();
//        }
        $data['title'] = 'Add FeeGroup';
        $this->form_validation->set_rules('name', 'Name', array('required',array('check_exists', array($this->feegroup_model, 'check_exists'))
                )
        );
        if ($this->form_validation->run() == FALSE) {
            
        } else {
            $data = array(
                'name' => $this->input->post('name'),
                'description' => $this->input->post('description'),
            );
            $this->feegroup_model->add($data);
            $this->session->set_flashdata('msg', '<div class="alert alert-success text-left">Fees Group added successfully</div>');
            redirect('webadmin/feegroup/index');
        }
        $feegroup_result = $this->feegroup_model->get();
        $data['feegroupList'] = $feegroup_result;

        $this->load->view('adminlogin/layout/header', $data);
        $this->load->view('adminlogin/feegroup/feegroupList', $data);
        $this->load->view('adminlogin/layout/footer', $data);
    }
    
    function delete($id) {
//        if (!$this->rbac->hasPrivilege('fees_group', 'can_delete')) {
//            access_denied();
//        }
        $data['title'] = 'Fees Master List';
        $this->feegroup_model->remove($id);
        redirect('webadmin/feegroup/index');
    }
    function edit($id) {
//        if (!$this->rbac->hasPrivilege('fees_group', 'can_edit')) {
//            access_denied();
//        }
        $data['id'] = $id;
        $feegroup = $this->feegroup_model->get($id);
        $data['feegroup'] = $feegroup;
        $feegroup_result = $this->feegroup_model->get();
        $data['feegroupList'] = $feegroup_result;
        $this->form_validation->set_rules('name', 'Name', array( 'required',array('check_exists', array($this->feegroup_model, 'check_exists'))
                ) );

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('adminlogin/layout/header', $data);
            $this->load->view('adminlogin/feegroup/feegroupEdit', $data);
            $this->load->view('adminlogin/layout/footer', $data);
        } else {
            $data = array(
                'id' => $id,
                'name' => $this->input->post('name'),
                'description' => $this->input->post('description'),
            );
            $this->feegroup_model->add($data);
            $this->session->set_flashdata('msg', '<div class="alert alert-success text-left">Fees Group updated successfully</div>');
            redirect('webadmin/feegroup/index');
        }
    }

}