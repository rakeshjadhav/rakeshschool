<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mailsms extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->library('smsgateway');
        $this->load->library('mailsmsconf');
        $this->load->model("classteacher_model");
        $this->mailer;
    }

    public function index() {

        
        $data['title'] = 'Add Mailsms';
        $listMessage = $this->messages_model->get();
        $data['listMessage'] = $listMessage;

        $this->load->view('adminlogin/layout/header');
        $this->load->view('adminlogin/mailsms/index', $data);
        $this->load->view('adminlogin/layout/footer');
    }
    
        public function compose() {
        if (!$this->rbac->hasPrivilege('email_sms', 'can_view')) {
            access_denied();
        }
       
        $data['title'] = 'Add Mailsms';
        $class = $this->class_model->get();
        $data['classlist'] = $class;
        $userdata = $this->customlib->getUserData();
        $carray = array();
        //  if(($userdata["role_id"] == 2) && ($userdata["class_teacher"] == "yes")){
        // $data["classlist"] =   $this->customlib->getClassbyteacher($userdata["id"]);


        if (!empty($data["classlist"])) {
            foreach ($data["classlist"] as $ckey => $cvalue) {

                $carray[] = $cvalue["id"];
            }
        }
        // } 
        $data['roles'] = $this->role_model->get();

        $this->load->view('adminlogin/layout/header', $data);
        $this->load->view('adminlogin/mailsms/compose', $data);
        $this->load->view('adminlogin/layout/footer');
    }
    
     public function search() {
        $keyword = $this->input->post('keyword');
        $category = $this->input->post('category');
        $result = array();
        if ($keyword != "" and $category != "") {
            if ($category == "student") {
                $result = $this->student_model->searchNameLike($keyword);
            } elseif ($category == "parent") {

                $result = $this->student_model->searchGuardianNameLike($keyword);
            } elseif ($category == "staff") {
                $result = $this->staff_model->searchNameLike($keyword);
            } else {
                
            }
        }
        echo json_encode($result);
    }
}