<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Users extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model("classteacher_model");
    }

    function index() {
        //  if(!$this->rbac->hasPrivilege('student_attendance','can_view')){
        // access_denied();
        // }
       
        $studentList = $this->student_model->getStudents();
        $staffList = $this->staff_model->getAll();
         $parentList = $this->parent_model->getParentList();

        $data['studentList'] = $studentList;
        $data['parentList'] = $parentList;
        $data['staffList'] = $staffList;
         //var_dump( $data['parentList']);exit;

        $this->load->view('adminlogin/layout/header', $data);
        $this->load->view('adminlogin/users/userList', $data);
        $this->load->view('adminlogin/layout/footer', $data);
    }
    
    function admissionreport() {
        if (!$this->rbac->hasPrivilege('student_history', 'can_view')) {
            access_denied();
        }
        $data['title'] = 'Admission Report';
        $class = $this->class_model->get();
        $data['classlist'] = $class;
        $userdata = $this->customlib->getUserData();
        $carray = array();
        //   if(($userdata["role_id"] == 2) && ($userdata["class_teacher"] == "yes")){
        // $data["classlist"] =   $this->customlib->getClassbyteacher($userdata["id"]);
        if (!empty($data["classlist"])) {
            foreach ($data["classlist"] as $ckey => $cvalue) {

                $carray[] = $cvalue["id"];
            }
        }

        //  }

        $class_id = $this->input->post("class_id");
        $year = $this->input->post("year");

        $admission_year = $this->student_model->admissionYear();

        $data["admission_year"] = $admission_year;
        if ((empty($class_id)) && (empty($year))) {

            $this->form_validation->set_rules('class_id', 'Class', 'trim|required|xss_clean');

            if ($this->form_validation->run() == FALSE) {

                $resultlist = $this->student_model->studentAdmissionDetails($carray);
                $data["resultlist"] = $resultlist;
            }
        } else {


            $resultlist = $this->student_model->searchAdmissionDetails($class_id, $year);
            $data["resultlist"] = $resultlist;
        }
        if (!empty($resultlist)) {
            foreach ($resultlist as $key => $value) {

                $id = $value["sid"];
                $sessionlist[] = $this->student_model->studentSessionDetails($id);
            }
            $data["sessionlist"] = $sessionlist;
        }
        $this->load->view("adminlogin/layout/header", $data);
        $this->load->view("adminlogin/users/admissionReport", $data);
        $this->load->view("adminlogin/layout/footer", $data);
    }

    
    function logindetailreport() {
        if (!$this->rbac->hasPrivilege('student_login_credential', 'can_view')) {
            access_denied();
        }
        $class = $this->class_model->get();
        $data['classlist'] = $class;

        $studentdata = $this->student_model->get();
        if (isset($_POST["search"])) {

            $class_id = $this->input->post("class_id");
            $section_id = $this->input->post("section_id");

            $studentdata = $this->student_model->searchByClassSection($class_id, $section_id);
        }

        foreach ($studentdata as $key => $value) {
            $resultlist = $this->user_model->getUserLoginDetails($value["id"]);
            $parentlist = $this->user_model->getParentLoginDetails($value["id"]);
            if ($resultlist["role"] == "student") {
                $studentdata[$key]["student_username"] = $resultlist["username"];
                $studentdata[$key]["student_password"] = $resultlist["password"];
                $studentdata[$key]["parent_username"] = $parentlist["username"];
                $studentdata[$key]["parent_password"] = $parentlist["password"];
            }
        }


        $data["resultlist"] = $studentdata;

        $this->load->view("adminlogin/layout/header");
        $this->load->view("adminlogin/users/logindetailreport", $data);
        $this->load->view("adminlogin/layout/footer");
    }
    
}