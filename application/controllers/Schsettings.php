<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Schsettings extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('upload');
    }

    function index() {
         if($this->session->userdata('isUserLoggedIn')){
        if (!$this->rbac->hasPrivilege('general_setting', 'can_edit')) {
            access_denied();
        }
       
        $data['title'] = 'Setting List';
      
        $setting_result = $this->setting_model->get();
        $data['settinglist'] = $setting_result;
       // var_dump($setting_result);exit;
        $timezoneList = $this->customlib->timezone_list();
        $data['timezoneList'] = $timezoneList;
        
        $session_result = $this->session_model->get();
        $data['sessionlist'] = $session_result;
        
        $month_list = $this->customlib->getMonthList();
        $data['monthList'] = $month_list;

        $this->load->view('adminlogin/layout/header',$data);
        $this->load->view('adminlogin/setting/settingList', $data);
        $this->load->view('adminlogin/layout/footer',$data);
        }else{
            $this->session->set_userdata('msg', 'Your Session is destroy. Please login to your account.');
            redirect('site/login');
        }
    }
    
    public function ajaxedit() {
       //var_dump($_POST);exit;
        if($this->session->userdata('isUserLoggedIn')){
        if (!$this->rbac->hasPrivilege('general_setting', 'can_edit')) {
            access_denied();
        }
        $this->form_validation->set_rules('sch_session_id', 'Session', 'trim|required');
        $this->form_validation->set_rules('sch_name', 'School Name', 'trim|required');
        $this->form_validation->set_rules('sch_phone', 'Phone', 'trim|required');
        $this->form_validation->set_rules('sch_start_month', 'Start Month', 'trim|required');
        $this->form_validation->set_rules('sch_address', 'Address', 'trim|required');
        $this->form_validation->set_rules('sch_email', 'Email', 'trim|required');
        $this->form_validation->set_rules('sch_is_rtl', 'RTL', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data = array(
                'sch_session_id' => form_error('sch_session_id'),
                'sch_name' => form_error('sch_name'),
                'sch_phone' => form_error('sch_phone'),
                'sch_start_month' => form_error('sch_start_month'),
                'sch_address' => form_error('sch_address'),
                'sch_email' => form_error('sch_email'),
                'sch_is_rtl' => form_error('sch_is_rtl'),
            );
            $array = array('status' => 'fail', 'error' => $data);
            echo json_encode($array);
        } else {
            //var_dump($_POST);exit;
            $data = array(
                'id' => $this->input->post('sch_id'),
                'session_id' => $this->input->post('sch_session_id'),
                'name' => $this->input->post('sch_name'),
                'phone' => $this->input->post('sch_phone'),
                'dise_code' => $this->input->post('sch_dise_code'),
                'start_month' => $this->input->post('sch_start_month'),
                'address' => $this->input->post('sch_address'),
                'email' => $this->input->post('sch_email'),
                'is_rtl' => $this->input->post('sch_is_rtl'),
                'class_teacher' => $this->input->post('class_teacher'),
            );
            //var_dump($data);exit;
            $this->setting_model->add($data);
 
            $this->session->userdata['admin']['is_rtl'] = $this->input->post('sch_is_rtl');
            $this->session->set_flashdata('msg', '<div class="alert alert-success text-left">Record Saved Successfully</div>');
            redirect('schsettings');
        } 
        }else{
            $this->session->set_userdata('msg', 'Your Session is destroy. Please login to your account.');
            redirect('site/login');
        }
    }
    
}