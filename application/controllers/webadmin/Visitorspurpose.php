<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Visitorspurpose extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        //  $this->load->library('customlib');
        $this->load->model("visitors_purpose_model");
        // $this->load->model("Complaint_model");
    }

    function index() {
        if (!$this->rbac->hasPrivilege('setup_font_office', 'can_view')) {
            access_denied();
        }
        $this->form_validation->set_rules('visitors_purpose', 'Visitors Purpose', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['visitors_purpose_list'] = $this->visitors_purpose_model->visitors_purpose_list();
            // print_r($data);
            $this->load->view('adminlogin/layout/header');
            $this->load->view('adminlogin/frontoffice/visitorspurposeview', $data);
            $this->load->view('adminlogin/layout/footer');
        } else {
            // print_r($_POST);
            $visitors_purpose = array(
                'visitors_purpose' => $this->input->post('visitors_purpose'),
                'description' => $this->input->post('description')
            );
            $this->visitors_purpose_model->add($visitors_purpose);
            $this->session->set_flashdata('msg', '<div class="alert alert-success"> Visitors Purpose added successfully</div>');
            redirect('webadmin/visitorspurpose');
        }
    }

    function edit($visitors_purpose_id) {
        if (!$this->rbac->hasPrivilege('setup_font_office', 'can_edit')) {
            access_denied();
        }
        $this->form_validation->set_rules('visitors_purpose', 'Visitors Purpose', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['visitors_purpose_list'] = $this->visitors_purpose_model->visitors_purpose_list();
            $data['visitors_purpose_data'] = $this->visitors_purpose_model->visitors_purpose_list($visitors_purpose_id);
            $this->load->view('adminlogin/layout/header');
            $this->load->view('adminlogin/frontoffice/visitorspurposeeditview', $data);
            $this->load->view('adminlogin/layout/footer');
        } else {
            // print_r($_POST);
            $visitors_purpose = array(
                'visitors_purpose' => $this->input->post('visitors_purpose'),
                'description' => $this->input->post('description')
            );
            $this->visitors_purpose_model->update($visitors_purpose_id, $visitors_purpose);
            $this->session->set_flashdata('msg', '<div class="alert alert-success"> Visitors Purpose updated successfully</div>');
            redirect('webadmin/visitorspurpose');
        }
    }

    function delete($id) {
        if (!$this->rbac->hasPrivilege('setup_font_office', 'can_delete')) {
            access_denied();
        }
        $this->visitors_purpose_model->delete($id);
        $this->session->set_flashdata('msg', '<div class="alert alert-success"> Visitors Purpose deleted successfully</div>');
        redirect('webadmin/visitorspurpose');
    }

}
