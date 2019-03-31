<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Department extends CI_Controller {

    function __construct() {

        parent::__construct();

        $this->load->helper('file');
//        $this->config->load("payroll");
        $this->load->model('department_model');
        $this->load->model('staff_model');
    }

    function department() {
         if($this->session->userdata('isUserLoggedIn')){
         if (!$this->rbac->hasPrivilege('designation', 'can_view')) {
            access_denied();
        } 
       $departmenttypeid = $this->input->post("departmenttypeid");
       
       $DepartmentTypes = $this->department_model->getDepartmentType();
        
        $data["departmenttype"] = $DepartmentTypes;
        $this->form_validation->set_rules( 'type', 'Department Name', array('required',array('check_exists', array($this->department_model, 'valid_department'))
                )
        );
        $data["title"] = "Add Department";
        if ($this->form_validation->run()) {

            $type = $this->input->post("type");
            $departmenttypeid = $this->input->post("departmenttypeid");
            $status = $this->input->post("status");
            if (empty($departmenttypeid)) {

                if (!$this->rbac->hasPrivilege('department', 'can_add')) {
                    access_denied();
                }
            } else {
                if (!$this->rbac->hasPrivilege('department', 'can_edit')) {
                    access_denied();
                }
            }
            if (!empty($departmenttypeid)) {
                $data = array('department_name' => $type, 'is_active' => 'yes', 'id' => $departmenttypeid);
            } else {

                $data = array('department_name' => $type, 'is_active' => 'yes');
            }
            $insert_id = $this->department_model->addDepartmentType($data);
            $this->session->set_flashdata('msg', '<div class="alert alert-success">Record added Successfully</div>');
            redirect("webadmin/department/department");
        } else {

            $this->load->view("adminlogin/layout/header");
            $this->load->view("adminlogin/staff/departmentType", $data);
            $this->load->view("adminlogin/layout/footer");
        }
        }else{
            $this->session->set_userdata('msg', 'Your Session is destroy. Please login to your account.');
            redirect('site/login');
        }
    }
       function departmentedit($id) {
            if($this->session->userdata('isUserLoggedIn')){
         if (!$this->rbac->hasPrivilege('designation', 'can_view')) {
            access_denied();
        } 
        $result = $this->department_model->getDepartmentType($id);

        $data["result"] = $result;
        $data["title"] = "Edit Department";
        $departmentTypes = $this->department_model->getDepartmentType();
        $data["departmenttype"] = $departmentTypes;
        $this->load->view("adminlogin/layout/header");
        $this->load->view("adminlogin/staff/departmentType", $data);
        $this->load->view("adminlogin/layout/footer");
        }else{
            $this->session->set_userdata('msg', 'Your Session is destroy. Please login to your account.');
            redirect('site/login');
        }
    }
    function departmentdelete($id) {
         if($this->session->userdata('isUserLoggedIn')){
         if (!$this->rbac->hasPrivilege('designation', 'can_view')) {
            access_denied();
        } 
        $this->department_model->deleteDepartment($id);
        redirect('webadmin/department/department');
        }else{
            $this->session->set_userdata('msg', 'Your Session is destroy. Please login to your account.');
            redirect('site/login');
        }
    }
    
}