<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class subject extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('file');
      //  $this->lang->load('message', 'english');
        $this->load->library('auth');
        $this->auth->is_logged_in_user();
    }

    function index() {
    
        $data['title'] = 'Add Subject';
        $stuid = $this->session->userdata('student');
        $stu_record = $this->student_model->getRecentRecord($stuid['student_id']);
        $subject_result = $this->teachersubject_model->getSubjectByClsandSection($stu_record['class_id'], $stu_record['division_id']);

        $data['subjectlist'] = $subject_result;
        $this->load->view('layout/student/header', $data);
        $this->load->view('user/subject/subjectList', $data);
        $this->load->view('layout/student/footer', $data);
    }

   

}

?>