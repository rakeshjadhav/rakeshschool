<?php
/* 
    Author     : Rjwebdev
    developer :Rakesh Ramesh Jadhav
*/
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Module extends CI_Controller {

        function __construct() {
        parent::__construct();
        $this->load->model("module_model");
    }

    function index() {
        if($this->session->userdata('isUserLoggedIn')){
        if (!$this->rbac->hasPrivilege('superadmin', 'can_view')) {
            access_denied();
        }
       
        $permissionlist = $this->module_model->getPermission();
        $data["permissionList"] = $permissionlist;
        
        $this->load->view("adminlogin/layout/header");
        $this->load->view("adminlogin/setting/permission", $data);
        $this->load->view("adminlogin/layout/footer");
        }else{
            $this->session->set_userdata('msg', 'Your Session is destroy. Please login to your account.');
            redirect('site/login');
        }
    }

    public function changeStatus() {
        if($this->session->userdata('isUserLoggedIn')){
        if (!$this->rbac->hasPrivilege('superadmin', 'can_view')) {
            access_denied();
        }
        $id = $this->input->post("id");
        $status = $this->input->post("status");
        if (!empty($id)) {
            $data = array('id' => $id, 'is_active' => $status);
            $result = $this->module_model->changeStatus($data);
            $response = array('status' => 1, 'msg' => 'Status change successfully');
            echo json_encode($response);
        }
        }else{
            $this->session->set_userdata('msg', 'Your Session is destroy. Please login to your account.');
            redirect('site/login');
        }
    }
    

}

?>