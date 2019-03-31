<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Hostel extends CI_Controller {

    function __construct() {
        parent::__construct();
       // $this->lang->load('message', 'english');
        $this->load->library('Customlib');
        $this->load->library('auth');
        $this->auth->is_logged_in_parent();
    }

    public function index() {
        
        $listhostel = $this->hostel_model->listhostel();
        $data['listhostel'] = $listhostel;
        $ght = $this->customlib->getHostaltype();
        $data['ght'] = $ght;
        $this->load->view('layout/parent/header');
        $this->load->view('parent/hostel/createhostel', $data);
        $this->load->view('layout/student/footer');
    }
    
}