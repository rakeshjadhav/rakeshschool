<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class classes extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('file');
    }
    function index() {
        if($this->session->userdata('isUserLoggedIn')){
        if (!$this->rbac->hasPrivilege('classes', 'can_view')) {
            access_denied();
        }
        $data['title'] = 'Add Class';
         
        $division_result = $this->division_model->get();
         $data['divisionlist'] = $division_result;
         
         $vehroute_result = $this->classsdivision_model->getByID();
         $data['vehroutelist'] = $vehroute_result;
         
        $this->form_validation->set_rules('class', 'Class', array('required',array('class_exists', array($this->class_model, 'class_exists')) )
        );
        $this->form_validation->set_rules('division[]', 'Division', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('adminlogin/layout/header',$data);
            $this->load->view('adminlogin/class/classList',$data);
            $this->load->view('adminlogin/layout/footer',$data);
        } else {
           // var_dump($_POST);exit;
            $class = $this->input->post('class');
            $class_array = array(
                'class' => $this->input->post('class')
            );
//            var_dump($class_array);exit;
            $division = $this->input->post('division');
            $this->classsdivision_model->add($class_array, $division);
            $this->session->set_flashdata('msg', '<div class="alert alert-success text-left">Class added successfully</div>');
            redirect('webadmin/classes');
        }  
        }else{
            $this->session->set_userdata('msg', 'Your Session is destroy. Please login to your account.');
            redirect('site/login');
        }
       
    }
    //edit class id wise
     function edit($id) {
          if($this->session->userdata('isUserLoggedIn')){
        // var_dump($id);exit;
        if (!$this->rbac->hasPrivilege('classes', 'can_edit')) {
            access_denied();
        }
        $data['title'] = 'Edit Class';
        $data['id'] = $id;
        $vehroute = $this->classsdivision_model->getByID($id);
        $data['vehroute'] = $vehroute;
        //var_dump($data);exit;
        $this->form_validation->set_rules('class', 'Class', array('required',array('class_exists', array($this->class_model, 'class_exists')))
        );
        $this->form_validation->set_rules('division[]', 'Division', 'trim|required');

        if ($this->form_validation->run() == FALSE) {

            $vehicle_result = $this->division_model->get();
            $data['vehiclelist'] = $vehicle_result;
//             var_dump($data['vehiclelist']);exit;  
            $routeList = $this->route_model->get();
            $data['routelist'] = $routeList;
//              var_dump($data['routelist']);exit;
            $vehroute_result = $this->classsdivision_model->getByID();
//             var_dump( $vehroute_result);exit;
            $data['vehroutelist'] = $vehroute_result;
            $this->load->view('adminlogin/layout/header',$data);
            $this->load->view('adminlogin/class/classEdit',$data);
            $this->load->view('adminlogin/layout/footer',$data);
        } else {
//             echo "h2";exit;
//            var_dump($_POST);exit;
            $sections = $this->input->post('division');
            //var_dump($sections);exit;
            $prev_sections = $this->input->post('prev_sections');
            $route_id = $this->input->post('route_id');
            $class_id = $this->input->post('pre_class_id');
            if (!isset($prev_sections)) {
                $prev_sections = array();
            }
            $add_result = array_diff($sections, $prev_sections);
            $delete_result = array_diff($prev_sections, $sections);

            if (!empty($add_result)) {
                $vehicle_batch_array = array();
                $class_array = array(
                    'id' => $class_id,
                    'class' => $this->input->post('class')
                );
                foreach ($add_result as $vec_add_key => $vec_add_value) {

                    $vehicle_batch_array[] = $vec_add_value;
                }
                $this->classsdivision_model->add($class_array, $vehicle_batch_array);
            } else {
                $class_array = array(
                    'id' => $class_id,
                    'class' => $this->input->post('class')
                );
                $this->classsdivision_model->update($class_array);
            }

            if (!empty($delete_result)) {
                $classsection_delete_array = array();
                foreach ($delete_result as $vec_delete_key => $vec_delete_value) {

                    $classsection_delete_array[] = $vec_delete_value;
                }
                $this->classsdivision_model->remove($class_id, $classsection_delete_array);
            }

            $this->session->set_flashdata('msg', '<div class="alert alert-success text-left">Class updated successfully</div>');
            redirect('webadmin/classes/index');
        }
        }else{
            $this->session->set_userdata('msg', 'Your Session is destroy. Please login to your account.');
            redirect('site/login');
       }
    }
    
     function delete($id) {
        if($this->session->userdata('isUserLoggedIn')){
        if (!$this->rbac->hasPrivilege('classes', 'can_delete')) {
            access_denied();
        }
        $data['title'] = 'Delete Class';
        $this->class_model->remove($id);
        $this->session->set_flashdata('msg', '<div class="alert alert-success text-left">Class Delete successfully</div>');
        redirect('webadmin/classes/index');
        }else{
            $this->session->set_userdata('msg', 'Your Session is destroy. Please login to your account.');
            redirect('site/login');
       }
    }
    
    
    
}