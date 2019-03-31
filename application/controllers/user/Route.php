<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Route extends CI_Controller {

    function __construct() {
        parent::__construct();
       // $this->lang->load('message', 'english');
        $this->load->library('auth');
        $this->auth->is_logged_in_user();
    }

    public function index() {
       
        $student_id = $this->customlib->getStudentSessionUserID();
        $student = $this->student_model->get($student_id);
        $data['studentList'] = $student;
        $listroute = $this->vehroute_model->listroute();
        $data['listroute'] = $listroute;
        $this->load->view('layout/student/header');
        $this->load->view('user/route/index', $data);
        $this->load->view('layout/student/footer');
    }
    
}