<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Student extends CI_Controller {

    function __construct() {
        parent::__construct();
        //$this->load->library('smsgateway');
        //$this->load->library('mailsmsconf');
       $this->load->helper('file');
       // $this->lang->load('message', 'english');
        $this->role;
    }
    
    function index() {
        $data['title'] = 'Student List';
        $student_result = $this->student_model->get();
        $data['studentlist'] = $student_result;
        $this->load->view('layout/teacher/header', $data);
        $this->load->view('teacher/student/studentList', $data);
        $this->load->view('layout/teacher/footer', $data);
    }
    
     function search() {
        
        $data['title'] = 'Student Search';
        
        $class = $this->class_model->get();
        $data['classlist'] = $class;
        
        $button = $this->input->post('search');
        if ($this->input->server('REQUEST_METHOD') == "GET") {
            $this->load->view('adminlogin/layout/header', $data);
            $this->load->view('adminlogin/student/studentSearch', $data);
            $this->load->view('adminlogin/layout/footer', $data);
        } else {
           // var_dump($_POST);exit;
            $class = $this->input->post('class_id');
            $division = $this->input->post('section_id');
            $search = $this->input->post('search');
            $search_text = $this->input->post('search_text');
            
            if (isset($search)) {
                if ($search == 'search_filter') {
                    $this->form_validation->set_rules('class_id', 'Class', 'trim|required');
                    if ($this->form_validation->run() == FALSE) {
                        
                    } else {
                        $data['searchby'] = "filter";
                        $data['class_id'] = $this->input->post('class_id');
                        $data['division_id'] = $this->input->post('section_id');
                    
                        $data['search_text'] = $this->input->post('search_text');
                        
                        $resultlist = $this->student_model->searchByClassSection($class, $division);
                        
                        $data['resultlist'] = $resultlist;
                        $title=$this->classsdivision_model->getDetailbyClassSection($data['class_id'], $data['division_id']);
                        
                        $data['title'] = 'Student Details for '.$title['class']."(".$title['division'].")";
                    }
                } else if ($search == 'search_full') {
                    $data['searchby'] = "text";
                   
                    $data['search_text'] = trim($this->input->post('search_text'));
                    $resultlist = $this->student_model->searchFullText($search_text);
                    $data['resultlist'] = $resultlist;
                    $data['title'] = 'Search Details: '.$data['search_text'];
                }
            }
            $this->load->view('adminlogin/layout/header', $data);
            $this->load->view('adminlogin/student/studentSearch', $data);
            $this->load->view('adminlogin/layout/footer', $data);
        }
    }
    
}