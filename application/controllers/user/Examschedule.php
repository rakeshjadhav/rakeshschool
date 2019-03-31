<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class examSchedule extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('file');
      //  $this->lang->load('message', 'english');
        $this->load->library('auth');
        $this->auth->is_logged_in_user();
    }

    function index() {
        
        $data['title'] = 'Exam Schedule';
       // $class = $this->class_model->get();
       // $data['classlist'] = $class;
        
        $feecategory = $this->feecategory_model->get();
        $data['feecategorylist'] = $feecategory;
        
        $this->form_validation->set_rules('class_id', 'Class', 'trim|required');
        $this->form_validation->set_rules('division_id', 'Division', 'trim|required');
        $data['student_due_fee'] = array();
        
        $stuid = $this->session->userdata('student');
        $stu_record = $this->student_model->getRecentRecord($stuid['student_id']);
        $data['class_id'] = $stu_record['class_id'];
        $data['division_id'] = $stu_record['division_id'];
        $examSchedule = $this->examschedule_model->getExamByClassandSection($data['class_id'], $data['division_id']);
        $data['examSchedule'] = $examSchedule;
        $this->load->view('layout/student/header', $data);
        $this->load->view('user/exam_schedule/examList', $data);
        $this->load->view('layout/student/footer', $data);
    }
}