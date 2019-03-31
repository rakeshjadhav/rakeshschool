<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Teacher extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('file');
       // $this->lang->load('message', 'english');
        $this->role;
        $this->load->library('auth');
        $this->auth->is_logged_in_teacher();
    }

    function index() {
       
        $data['title'] = 'Add Teacher';
        $teacher_result = $this->teacher_model->get();
        $data['teacherlist'] = $teacher_result;
        $genderList = $this->customlib->getGender();
        $data['genderList'] = $genderList;
        $this->load->view('layout/teacher/header', $data);
        $this->load->view('teacher/teacher/teacherList', $data);
        $this->load->view('layout/teacher/footer', $data);
    }

    function dashboard() {
        $data = array();
        $teacher_id = $this->session->userdata['student']['teacher_id'];
        $teacher_result = $this->teacher_model->get($teacher_id);
        $data['title'] = 'Teacher List';
        $teacher = $this->teacher_model->get($teacher_id);
        $teachersubject = $this->teachersubject_model->getTeacherClassSubjects($teacher_id);
        $data['teacher'] = $teacher;
        $data['teachersubject'] = $teachersubject;
        
        $this->load->view('layout/teacher/header', $data);
        $this->load->view('teacher/dashboard', $data);
        $this->load->view('layout/teacher/footer', $data);
    }
}