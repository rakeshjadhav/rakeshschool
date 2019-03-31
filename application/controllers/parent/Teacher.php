<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Teacher extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('file');
      //  $this->lang->load('message', 'english');
        $this->load->library('auth');
        $this->auth->is_logged_in_parent();
    }

    function index() {
       
        $data['title'] = 'Add Teacher';
        $teacher_result = $this->teacher_model->get();
        $data['teacherlist'] = $teacher_result;
        $genderList = $this->customlib->getGender();
        $data['genderList'] = $genderList;
        $this->load->view('layout/parent/header', $data);
        $this->load->view('parent/teacher/teacherList', $data);
        $this->load->view('layout/parent/footer', $data);
    }
    
}