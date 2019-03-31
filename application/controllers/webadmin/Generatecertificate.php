<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 
 */
class Generatecertificate extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->library('Customlib');
    }

    public function index() {
//        if (!$this->rbac->hasPrivilege('generate_certificate', 'can_view')) {
//            access_denied();
//        }
      
        //$this->data['certificateList'] = $this->Generatecertificate_model->certificateList();
        $certificateList = $this->certificate_model->getstudentcertificate();
        $data['certificateList'] = $certificateList;
        $class = $this->class_model->get();
        $data['classlist'] = $class;
        $this->load->view('adminlogin/layout/header', $data);
        $this->load->view('adminlogin/certificate/generatecertificate', $data);
        $this->load->view('adminlogin/layout/footer', $data);
    }
    
    
     function search() {
       
        //$data['title'] = 'Student Search';
        $class = $this->class_model->get();
        $data['classlist'] = $class;
        $certificateList = $this->certificate_model->getstudentcertificate();
        $data['certificateList'] = $certificateList;
        $button = $this->input->post('search');
        if ($this->input->server('REQUEST_METHOD') == "GET") {
            $this->load->view('adminlogin/layout/header', $data);
            $this->load->view('adminlogin/certificate/generatecertificate', $data);
            $this->load->view('adminlogin/layout/footer', $data);
        } else {
            $class = $this->input->post('class_id');
            $section = $this->input->post('section_id');
            $search = $this->input->post('search');
            $certificate = $this->input->post('certificate_id');
            if (isset($search)) {
                $this->form_validation->set_rules('class_id', 'Class', 'trim|required');
                $this->form_validation->set_rules('certificate_id', 'Certificate', 'trim|required');
                if ($this->form_validation->run() == FALSE) {          
                } else {
                    $data['searchby'] = "filter";
                    $data['class_id'] = $this->input->post('class_id');
                    $data['section_id'] = $this->input->post('section_id');
                    $certificate = $this->input->post('certificate_id');
                    $certificateResult = $this->generatecertificate_model->getcertificatebyid($certificate);
                    $data['certificateResult'] = $certificateResult;
                    $resultlist = $this->student_model->searchByClassSection($class, $section);
                    $data['resultlist'] = $resultlist;
                    $title = $this->classsdivision_model->getDetailbyClassSection($data['class_id'], $data['section_id']);
                    $data['title'] = 'Student Details for ' . $title['class'] . "(" . $title['division'] . ")";
                }
            }
            $this->load->view('adminlogin/layout/header', $data);
            $this->load->view('adminlogin/certificate/generatecertificate', $data);
            $this->load->view('adminlogin/layout/footer', $data);
        }
    }
    
     public function generate($student, $class, $certificate) {
       
        $certificateResult = $this->generatecertificate_model->getcertificatebyid($certificate);
        $data['certificateResult'] = $certificateResult;
        
        $resultlist = $this->student_model->searchByClassStudent($class, $student);
        $data['resultlist'] = $resultlist;
        
        //$this->load->view('layout/header', $data);
        $this->load->view('webadmin/certificate/transfercertificate', $data);
        //$this->load->view('layout/footer', $data);
    }
    
    public function generatemultipledd() {
        //echo "<pre>"; print_r($_POST); echo "</pre>"; exit();
        $studentid = $this->input->post('data');
        $student_array = json_decode($studentid);
        $class = $this->input->post('class_id');
        $results = array();
        foreach ($student_array as $key => $value) {
            $student = $value->student_id;
            $result = $this->student_model->searchByClassStudent($class, $student);
            $results[] = $result;
            $certificate = $this->input->post('certificate_id');
            $certificateResult = $this->generatecertificate_model->getcertificatebyid($certificate);
            $data['certificateResult'] = $certificateResult;
        }
        $data['resultlist'] = $results;
        $this->load->view('admin/certificate/stugeneratecertificate', $data);
        //$this->load->view('print/printFeesByGroupArray', $data);
    }
    
     public function generatemultiple() {

        $studentid = $this->input->post('data');
        $student_array = json_decode($studentid);
        //var_dump($student_array);exit;
        $certificate_id = $this->input->post('certificate_id');
        $class = $this->input->post('class_id');
        $data = array();
        $results = array();
        $std_arr = array();
        $data['sch_setting'] = $this->setting_model->get();
        $data['certificate'] = $this->generatecertificate_model->getcertificatebyid($certificate_id);
        //var_dump($data['certificate']);exit;
        foreach ($student_array as $key => $value) {
            $std_arr[] = $value->student_id;
        }
        $data['students'] = $this->student_model->getStudentsByArray($std_arr);
        $certificates = $this->load->view('adminlogin/certificate/printcertificate', $data, true);
        echo $certificates;
    }
}