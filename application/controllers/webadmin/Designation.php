<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Designation extends CI_Controller {

    function __construct() {

        parent::__construct();

        $this->load->helper('file');
      /*$this->config->load("payroll");*/
        $this->load->model('designation_model');
        $this->load->model('staff_model');
    }
    
    function designation() {
        //var_dump($_POST);exit;
        if($this->session->userdata('isUserLoggedIn')){
         if (!$this->rbac->hasPrivilege('designation', 'can_view')) {
            access_denied();
        }   
        $designation = $this->designation_model->get();
        $data["title"] = "Add Designation";
        $data["designation"] = $designation;
       // var_dump($data);exit;
        $this->form_validation->set_rules('type', 'Designation Name', array('required',array('check_exists', array($this->designation_model, 'valid_designation')))
        );
        if ($this->form_validation->run()) {

            $type = $this->input->post("type");
            $designationid = $this->input->post("designationid");
            $status = $this->input->post("status");
            //var_dump($status);exit;
            if (empty($designationid)) {
                if (!$this->rbac->hasPrivilege('designation', 'can_add')) {
                    access_denied();
                }
            } else {

                if (!$this->rbac->hasPrivilege('designation', 'can_edit')) {
                    access_denied();
                }
            }

            if (!empty($designationid)) {
                $data = array('designation' => $type, 'is_active' => 'yes', 'id' => $designationid);
            } else {

                $data = array('designation' => $type, 'is_active' => 'yes');
            }
            $insert_id = $this->designation_model->addDesignation($data);
            $this->session->set_flashdata('msg', '<div class="alert alert-success">Record added Successfully</div>');
            redirect("webadmin/designation/designation");
        } else {

            $this->load->view("adminlogin/layout/header");
            $this->load->view("adminlogin/staff/designation", $data);
            $this->load->view("adminlogin/layout/footer");
        }
        }else{
            $this->session->set_userdata('msg', 'Your Session is destroy. Please login to your account.');
            redirect('site/login');
        }
    }
    
    public function designationedit($id) {
        if($this->session->userdata('isUserLoggedIn')){
        $result = $this->designation_model->get($id);
        $data["title"] = "Edit Designation";
        $data["result"] = $result;

        $designation = $this->designation_model->get();
        $data["designation"] = $designation;
        $this->load->view("adminlogin/layout/header");
        $this->load->view("adminlogin/staff/designation", $data);
        $this->load->view("adminlogin/layout/footer");
        }else{
            $this->session->set_userdata('msg', 'Your Session is destroy. Please login to your account.');
            redirect('site/login');
        }
        
    }
    
    function designationdelete($id) {
         if($this->session->userdata('isUserLoggedIn')){
        $this->designation_model->deleteDesignation($id);
        redirect('webadmin/designation/designation');
        }else{
            $this->session->set_userdata('msg', 'Your Session is destroy. Please login to your account.');
            redirect('site/login');
        }
    }
    
    
}
