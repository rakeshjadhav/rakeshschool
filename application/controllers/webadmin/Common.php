<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Common extends Public_Controller {

    function __construct() {
        parent::__construct();
    }

    function getSudentSessions() {
        $student_id = $this->customlib->getStudentSessionUserID();
        $session = $this->session_model->getStudentAcademicSession($student_id);
        $data = array();
        $session_array = $this->session->has_userdata('session_array');
        $data['sessionData'] = array('session_id' => 0);
        if ($session_array) {
            $data['sessionData'] = $this->session->userdata('session_array');
        } else {
            $setting = $this->setting_model->get();
            $data['sessionData'] = array('session_id' => $setting[0]['session_id']);
        }
        $data['sessionList'] = $session;
        $this->load->view('adminlogin/partial/_session', $data);
    }
    
    function updateSession() {
        $role = $this->customlib->getUserRole();
        $redirect_url = site_url('site/userlogin');
        if ($role == "teacher") {
            $redirect_url = site_url('teacher/teacher/dashboard');
        } elseif ($role == 'accountant') {
            $redirect_url = site_url('accountant/accountant/dashboard');
        }

        $session = $this->input->post('popup_session');
        $session_array = $this->session->has_userdata('session_array');
        if ($session_array) {
            $this->session->unset_userdata('session_array');
        }
        $session = $this->session_model->get($session);
        $session_array = array('session_id' => $session['id'], 'session' => $session['session']);
        $this->session->set_userdata('session_array', $session_array);
        echo json_encode(array('status' => 1, 'message' => 'Session changed successfully', 'redirect_url' => $redirect_url));
    }
    
    function getAllSession() {
        $session = $this->session_model->getAllSession();
        $data = array();
        $session_array = $this->session->has_userdata('session_array');
        $data['sessionData'] = array('session_id' => 0);
        if ($session_array) {
            $data['sessionData'] = $this->session->userdata('session_array');
        } else {
            $setting = $this->setting_model->get();

            $data['sessionData'] = array('session_id' => $setting[0]['session_id']);
        }
        $data['sessionList'] = $session;
        $this->load->view('partial/_session', $data);
    }

}