<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mailgateway {

    private $_CI;

    function __construct() {
        $this->_CI = & get_instance();
        $this->_CI->load->model('setting_model');
        $this->_CI->load->model('studentfeemaster_model');
        $this->_CI->load->model('student_model');
        $this->_CI->load->model('teacher_model');
        $this->_CI->load->model('librarian_model');
        //$this->_CI->load->model('accountant_model');
        $this->_CI->load->library('mailer');
        $this->_CI->mailer;
        $this->sch_setting = $this->_CI->setting_model->get();
    }
    
     function sentRegisterMail($id, $send_to) {
        // var_dump($send_to);exit;
        if (!empty($this->_CI->mail_config) && $send_to != "") {
            $subject = "Admission Confirm";
            $msg = $this->getStudentRegistrationContent($id);
            $this->_CI->mailer->send_mail($send_to, $subject, $msg);
        }
    }
    function sendLoginCredential($chk_mail_sms, $sender_details) {
        $msg = $this->getLoginCredentialContent($sender_details['credential_for'], $sender_details);


        $send_to = $sender_details['email'];

        if (!empty($this->_CI->mail_config) && $send_to != "") {
            $subject = "Login Credential";
            $this->_CI->mailer->send_mail($send_to, $subject, $msg);
        }
    }
    
}