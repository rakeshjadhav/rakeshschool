<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Roles extends CI_Controller {

    private $perm_category = array();

    function __construct() {
        parent::__construct();
        $this->load->config('mailsms');
        $this->perm_category = $this->config->item('perm_category');
    }

    function index() {
        if (!$this->rbac->hasPrivilege('superadmin', 'can_view')) {
            access_denied();
        }
//        var_dump($_POST);exit;
        $data['title'] = 'Add Role';
        $this->form_validation->set_rules('name', 'Name', array('required',array('check_exists', array($this->role_model, 'valid_check_exists'))) );
        if ($this->form_validation->run() == FALSE) {
            $listroute = $this->role_model->get();
            $data['listroute'] = $listroute;
           // var_dump( $data['listroute']);exit;
            $this->load->view('adminlogin/layout/header');
            $this->load->view('adminlogin/roles/create', $data);
            $this->load->view('adminlogin/layout/footer');
        } else {
            $data = array(
                'name' => $this->input->post('name')
            );
            $this->role_model->add($data);
            $this->session->set_flashdata('msg', '<div class="alert alert-success text-left">Role added successfully</div>');
            redirect('webadmin/roles');
        }
    }
    
    function permission($id) {
        $data['title'] = 'Add Role';
        
        $data['id'] = $id;
        $role = $this->role_model->get($id);
        $data['role'] = $role;
        
        $role_permission = $this->role_model->find($role['id']);
        $data['role_permission'] = $role_permission;
//        var_dump($data['role_permission']);exit;
        if ($this->input->server('REQUEST_METHOD') == "POST") {

            $per_cat_post = $this->input->post('per_cat');
            $role_id = $this->input->post('role_id');
            $to_be_insert = array();
            $to_be_update = array();
            $to_be_delete = array();
            foreach ($per_cat_post as $per_cat_post_key => $per_cat_post_value) {
                $insert_data = array();
                $ar = array();
                foreach ($this->perm_category as $per_key => $per_value) {
                    $chk_val = $this->input->post($per_value . "-perm_" . $per_cat_post_value);
                    if (isset($chk_val)) {
                        $insert_data[$per_value] = 1;
                    } else {
                        $ar[$per_value] = 0;
                    }
                }

                $prev_id = $this->input->post('roles_permissions_id_' . $per_cat_post_value);
                if ($prev_id != 0) {

                    if (!empty($insert_data)) {
                        $insert_data['id'] = $prev_id;
                        $to_be_update[] = array_merge($ar, $insert_data);
                    } else {
                        $to_be_delete[] = $prev_id;
                    }
                } elseif (!empty($insert_data)) {
                    $insert_data['role_id'] = $role_id;
                    $insert_data['perm_cat_id'] = $per_cat_post_value;
                    $to_be_insert[] = array_merge($ar, $insert_data);
                }
            }
            // echo "<pre/>";
            // // print_r($to_be_insert);
            // // print_r($to_be_update);
            // print_r($to_be_delete);
            // exit();
            $this->role_model->getInsertBatch($role_id, $to_be_insert, $to_be_update, $to_be_delete);
            redirect('webadmin/roles/permission/' . $id);
        }

        $this->load->view('adminlogin/layout/header');
        $this->load->view('adminlogin/roles/allotmodule', $data);
        $this->load->view('adminlogin/layout/footer');
    }
    
    function edit($id) {
       // var_dump($_POST);exit;
        $data['title'] = 'Edit Role';
        $data['id'] = $id;
        $editrole = $this->role_model->get($id);
        $data['editrole'] = $editrole;
        $data['name'] = $editrole["name"];

        $this->form_validation->set_rules('name', 'Name', array('required',array('check_exists', array($this->role_model, 'valid_check_exists'))
                )
        );
        if ($this->form_validation->run() == FALSE) {
            $listroute = $this->role_model->get();
            $data['listroute'] = $listroute;
            $this->load->view('adminlogin/layout//header');
            $this->load->view('adminlogin/roles/edit', $data);
            $this->load->view('adminlogin/layout/footer');
        } else {
           // var_dump($_POST);exit;
            $data = array(
                'id' => $id,
                'name' => $this->input->post('name')
            );
            $this->role_model->add($data);
            $this->session->set_flashdata('msg', '<div class="alert alert-success text-left">Role updated successfully</div>');
            redirect('webadmin/roles/index');
        }
    }
    
     function delete($id) {
        $data['title'] = 'Role Delete';
        $this->role_model->remove($id);
        $this->session->set_flashdata('msg', '<div class="alert alert-success text-left">Role deleted successfully</div>');
        redirect('webadmin/roles/index');
    }

    
}