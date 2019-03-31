<?php 
/* 
    Author     : Rjwebdev
    developer :Rakesh Ramesh Jadhav
*/
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sessions extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
         if($this->session->userdata('isUserLoggedIn')){
        if (!$this->rbac->hasPrivilege('session_setting', 'can_view')) {
            access_denied();
        }
        
        $data['title'] = 'Session List';
        $session_result = $this->session_model->getAllSession();
        $data['sessionlist'] = $session_result;
        $this->load->view('adminlogin/layout/header', $data);
        $this->load->view('adminlogin/session/sessionList', $data);
        $this->load->view('adminlogin/layout/footer', $data);
        }else{
            $this->session->set_userdata('msg', 'Your Session is destroy. Please login to your account.');
            redirect('site/login');
        }
    }

    
    function delete($id) {
         if($this->session->userdata('isUserLoggedIn')){
        if (!$this->rbac->hasPrivilege('session_setting', 'can_delete')) {
            access_denied();
        }
        $this->session->set_flashdata('list_msg', '<div class="alert alert-success text-left">Session deleted successfully</div>');
        $this->session_model->remove($id);
        redirect('webadmin/sessions/index');
        }else{
            $this->session->set_userdata('msg', 'Your Session is destroy. Please login to your account.');
            redirect('site/login');
        }
    }

    function create() {
         if($this->session->userdata('isUserLoggedIn')){
        if (!$this->rbac->hasPrivilege('session_setting', 'can_add')) {
            access_denied();
        }
        $session_result = $this->session_model->getAllSession();
        $data['sessionlist'] = $session_result;
        $data['title'] = 'Add Session';
        $this->form_validation->set_rules('session', 'Session', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('adminlogin/layout/header', $data);
            $this->load->view('adminlogin/session/sessionList', $data);
            $this->load->view('adminlogin/layout/footer', $data);
        } else {
            $data = array(
                'session' => $this->input->post('session'),
            );
            $this->session_model->add($data);
            $this->session->set_flashdata('msg', '<div class="alert alert-success text-left">Session added successfully</div>');
            redirect('webadmin/sessions/index');
        }
        }else{
            $this->session->set_userdata('msg', 'Your Session is destroy. Please login to your account.');
            redirect('site/login');
        }
    }

    function edit($id) {
         if($this->session->userdata('isUserLoggedIn')){
        if (!$this->rbac->hasPrivilege('session_setting', 'can_edit')) {
            access_denied();
        }
        $session_result = $this->session_model->getAllSession();
        $data['sessionlist'] = $session_result;
        $data['title'] = 'Edit Session';
        $data['id'] = $id;
        $session = $this->session_model->get($id);
        $data['session'] = $session;
        $this->form_validation->set_rules('session', 'Session', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('adminlogin/layout/header', $data);
            $this->load->view('adminlogin/session/sessionEdit', $data);
            $this->load->view('adminlogin/layout/footer', $data);
        } else {
            $data = array(
                'id' => $id,
                'session' => $this->input->post('session'),
            );
            $this->session_model->add($data);
            $this->session->set_flashdata('msg', '<div class="alert alert-success text-left">Session updated successfully</div>');
            redirect('webadmin/sessions/index');
        }
        }else{
            $this->session->set_userdata('msg', 'Your Session is destroy. Please login to your account.');
            redirect('site/login');
        }
    }

}

?>