<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Hostelroom extends CI_Controller {

    function __construct() {
        parent::__construct();
       // $this->lang->load('message', 'english');
        $this->load->library('Customlib');
        $this->load->library('auth');
        $this->auth->is_logged_in_user();
    }

    public function index() {
        $roomtypelist = $this->roomtype_model->get();
        $data['roomtypelist'] = $roomtypelist;
        $hostellist = $this->hostel_model->get();
        $data['hostellist'] = $hostellist;
        
        $hostelroomlist = $this->hostelroom_model->lists();
        $data['hostelroomlist'] = $hostelroomlist;
        $this->load->view('layout/student/header');
        $this->load->view('user/hostelroom/create', $data);
        $this->load->view('layout/student/footer');
    }
}