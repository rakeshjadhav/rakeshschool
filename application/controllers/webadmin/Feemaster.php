<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class feemaster extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('file');
       // $this->lang->load('message', 'english');
    }
    // show timetable list
    function getByFeecategory() {
        $feecategory_id = $this->input->get('feecategory_id');
        $data = $this->feetype_model->getTypeByFeecategory($feecategory_id);
        echo json_encode($data);
    }
    function index() {
         if(!$this->rbac->hasPrivilege('fees_master','can_add')){
                access_denied();
                }

        $data['title'] = 'Feemaster List';
        $feegroup = $this->feegroup_model->get();
        $data['feegroupList'] = $feegroup;
        
        $feetype = $this->feetype_model->get();
        $data['feetypeList'] = $feetype;

        $feegroup_result = $this->feesessiongroup_model->getFeesByGroup();
        $data['feemasterList'] = $feegroup_result;

        $this->form_validation->set_rules('feetype_id', 'FeeType', 'required');
        $this->form_validation->set_rules('amount', 'Amount', 'required');

        $this->form_validation->set_rules( 'fee_groups_id', 'FeeGroup', array( 'required',array('check_exists', array($this->feesessiongroup_model, 'valid_check_exists'))
                ) );

        if ($this->form_validation->run() == FALSE) {
             $this->load->view('adminlogin/layout/header', $data);
             $this->load->view('adminlogin/feemaster/feemasterList', $data);
             $this->load->view('adminlogin/layout/footer', $data);
        } else {
            $insert_array = array(
                'fee_groups_id' => $this->input->post('fee_groups_id'),
                'feetype_id' => $this->input->post('feetype_id'),
                'amount' => $this->input->post('amount'),
                'due_date' => $this->input->post('due_date'),
                'session_id' => $this->setting_model->getCurrentSession()
            );
           // var_dump($insert_array);exit;
            $feegroup_result = $this->feesessiongroup_model->add($insert_array);
            $this->session->set_flashdata('msg', '<div class="alert alert-success text-left">Fees Master added successfully</div>');
            redirect('webadmin/feemaster/index');
        }
    }
    
    
    function edit($id) {
//        if (!$this->rbac->hasPrivilege('fees_master', 'can_edit')) {
//            access_denied();
//        }
        $data['id'] = $id;
        $feegroup_type = $this->feegrouptype_model->get($id);
        $data['feegroup_type'] = $feegroup_type;

        $feegroup = $this->feegroup_model->get();
        $data['feegroupList'] = $feegroup;
        
        $feetype = $this->feetype_model->get();
        $data['feetypeList'] = $feetype;
        $feegroup_result = $this->feesessiongroup_model->getFeesByGroup();
        $data['feemasterList'] = $feegroup_result;


        $this->form_validation->set_rules('feetype_id', 'FeeType', 'required');
        $this->form_validation->set_rules('amount', 'Amount', 'required');
        $this->form_validation->set_rules('fee_groups_id', 'FeeGroup', array( 'required',array('check_exists', array($this->feesessiongroup_model, 'valid_check_exists'))
                ));

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('adminlogin/layout/header', $data);
            $this->load->view('adminlogin/feemaster/feemasterEdit', $data);
            $this->load->view('adminlogin/layout/footer', $data);
        } else {
            $insert_array = array(
                'id' => $this->input->post('id'),
                'feetype_id' => $this->input->post('feetype_id'),
                'due_date' => $this->input->post('due_date'),
                'amount' => $this->input->post('amount')
            );
            $feegroup_result = $this->feegrouptype_model->add($insert_array);

            $this->session->set_flashdata('msg', '<div class="alert alert-success text-left">Fees Master updated successfully</div>');
            redirect('webadmin/feemaster/index');
        }
    }
    
    function delete($id) {
//        if (!$this->rbac->hasPrivilege('fees_master', 'can_delete')) {
//            access_denied();
//        }
        $data['title'] = 'Fees Master List';
        $this->feegrouptype_model->remove($id);
        redirect('webadmin/feemaster/index');
    }
    
     function assign($id) {
//        if (!$this->rbac->hasPrivilege('fees_group_assign', 'can_view')) {
//            access_denied();
//        }
        $data['id'] = $id;
        $data['title'] = 'student fees';
        $class = $this->class_model->get();
        $data['classlist'] = $class;
        $feegroup_result = $this->feesessiongroup_model->getFeesByGroup($id);
        $data['feegroupList'] = $feegroup_result;


        $genderList = $this->customlib->getGender();
        $data['genderList'] = $genderList;
        
        $RTEstatusList = $this->customlib->getRteStatus();
        $data['RTEstatusList'] = $RTEstatusList;

        $category = $this->category_model->get();
        $data['categorylist'] = $category;


        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            //var_dump($_POST);exit;
            $data['category_id'] = $this->input->post('category_id');
            $data['gender'] = $this->input->post('gender');
            $data['rte_status'] = $this->input->post('rte');
            $data['class_id'] = $this->input->post('class_id');
            $data['division_id'] = $this->input->post('section_id');

            $resultlist = $this->studentfeemaster_model->searchAssignFeeByClassSection($data['class_id'], $data['division_id'], $id, $data['category_id'], $data['gender'], $data['rte_status']);
            $data['resultlist'] = $resultlist;
            //var_dump($data['resultlist']);exit;
        }

        $this->load->view('adminlogin/layout/header', $data);
        $this->load->view('adminlogin/feemaster/assign', $data);
        $this->load->view('adminlogin/layout/footer', $data);
    }

}