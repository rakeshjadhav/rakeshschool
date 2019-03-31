<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class librarian extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('file');
       // $this->lang->load('message', 'english');
        $this->role;
        $this->load->library('auth');
        $this->auth->is_logged_in_librarian();
    }

    function dashboard() {
        $this->session->set_userdata('top_menu', 'dashboard');

        $data = array();
        $librarian_id = $this->session->userdata['student']['librarian_id'];
        $data['title'] = 'librarian';
        
        $librarian = $this->librarian_model->get($librarian_id);
        $data['librarian'] = $librarian;
//        var_dump($data);exit;
        $this->load->view('layout/librarian/header');
      $this->load->view('librarian/dashboard', $data);
       $this->load->view('layout/librarian/footer');
    }
    
    //libra chnagr pass
     function changepass() {
        $data['title'] = 'Change Password';
        $this->form_validation->set_rules('current_pass', 'Current password', 'trim|required');
        $this->form_validation->set_rules('new_pass', 'New password', 'trim|required|matches[confirm_pass]');
        $this->form_validation->set_rules('confirm_pass', 'Confirm password', 'trim|required');
        
        if ($this->form_validation->run() == FALSE) {
            $sessionData = $this->session->userdata('loggedIn');
            $this->data['id'] = $sessionData['id'];
            $this->data['username'] = $sessionData['username'];
            $this->load->view('layout/librarian/header', $data);
            $this->load->view('librarian/change_password', $data);
            $this->load->view('layout/librarian/footer', $data);
        } else {
            //var_dump($_POST);exit;
            $sessionData = $this->session->userdata('student');
            $data_array = array(
                'current_pass' => ($this->input->post('current_pass')),
                'new_pass' => ($this->input->post('new_pass')),
                'user_id' => $sessionData['id'],
                'user_name' => $sessionData['username']
            );
//            var_dump($data_array);exit;
            $newdata = array(
                'id' => $sessionData['id'],
                'password' => $this->input->post('new_pass')
            );
           // var_dump($newdata);exit;
            $query1 = $this->user_model->checkOldPass($data_array);
//            var_dump($query1);exit;
            if ($query1) {
//                echo"eee0";exit;
                $query2 = $this->user_model->saveNewPass($newdata);
                if ($query2) {

                    $this->session->set_flashdata('msg', 'Password changed successfully');
                    $this->load->view('layout/librarian/header', $data);
                    $this->load->view('librarian/change_password', $data);
                    $this->load->view('layout/librarian/footer', $data);
                }
            } else {
// echo"eee1";exit;
                $this->session->set_flashdata('msg', 'Invalid current password');
                $this->load->view('layout/librarian/header', $data);
                $this->load->view('librarian/change_password', $data);
                $this->load->view('layout/librarian/footer', $data);
            }
        }
    }
    
}