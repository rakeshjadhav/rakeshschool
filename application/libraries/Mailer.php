<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mailer {

    public $mail_config;
    private $sch_setting;

    public function __construct() {
        $this->CI = & get_instance();
      //  $this->CI->load->model('emailconfig_model');
       // $this->CI->mail_config = $this->CI->emailconfig_model->getActiveEmail();
        $this->CI->load->model('setting_model');
        $this->sch_setting = $this->CI->setting_model->get();
    }

    
}