<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Route extends CI_Controller {

    function __construct() {
        parent::__construct();
       // $this->lang->load('message', 'english');
        $this->load->library('auth');
        $this->auth->is_logged_in_parent();
    }

    public function index() {
        $data = array();
        
        $listroute = $this->vehroute_model->listroute();
        $data['listroute'] = $listroute;

        $child = $this->session->userdata('parent_childs');
        $student_array = array();
        foreach ($child as $key => $value) {

            $student = $this->student_model->get($value['student_id']);
            $student_array[] = $student;
        }

        $data['childs'] = $student_array;
        $this->load->view('layout/parent/header');
        $this->load->view('parent/route/index', $data);
        $this->load->view('layout/student/footer');
    }
    
    public function getbusdetail() {
        $vehrouteid = $this->input->post('vehrouteid');
        $result = $this->vehroute_model->getVechileDetailByVecRouteID($vehrouteid);
        echo json_encode($result);
    }
    
}