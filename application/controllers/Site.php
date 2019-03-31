<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Site extends CI_Controller {

    public function __construct() {
        parent::__construct();
         
         $this->load->library('Auth');
        // $this->load->library('Enc_lib');
         $this->load->helper('file');
        // $this->load->model('Setting_model');
         $this->load->model('Admin_model');
    }
    //site login
    
     function login() {
       $data['title'] = 'Login';
         if ($this->auth->logged_in()) {
            $this->auth->is_logged_in(true);
        }
        
        $data = array();
        $data['title'] = 'Login';
        $school = $this->setting_model->get();
       // $notice_content = $this->config->item('ci_front_notice_content');
//        $notices = $this->cms_program_model->getByCategory($notice_content, array('start' => 0, 'limit' => 5));
//        $data['notice'] = $notices;
        $data['school'] = $school[0];
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
       
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('login');
        } else {
            $data = array(
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password')
            );
         //   var_dump($data);EXIT;
             $setting_result = $this->setting_model->get();
            $result = $this->admin_model->checkLogin($data);
            //var_dump($result);EXIT;
            if ($result == TRUE) {
               // $username = $this->input->post('username');
               // $admin_details = $this->admin_model->read_user_information($username);
               if ($result == true) {
                    $setting_result = $this->setting_model->get();
                $session_data = array(
                    'id' => $result->id,
                    'username' => $result->name,
                    'email' => $result->email,
                    'roles' => $result->roles,
                    'start_month' => $setting_result[0]['start_month'],
                    'school_name' => $setting_result[0]['name'],
                    'sch_name' => $setting_result[0]['name'],
                    'is_rtl' => $setting_result[0]['is_rtl'],
                );
                $this->session->set_userdata('admin', $session_data);
                $role = $this->customlib->getStaffRole();
                $role_name = json_decode($role)->name;
                
                $this->customlib->setUserLog($this->input->post('username'), $role_name);

                if (isset($_SESSION['redirect_to']))
                    redirect($_SESSION['redirect_to']);
                else
               // var_dump($session_data);exit;
                    $_SESSION['isUserLoggedIn'] = TRUE;
                    $this->session->set_userdata('admin', $session_data);
                    $this->customlib->setUserLog($username, 'admin');
                    redirect('webadmin/admin/dashboard');
                }
            } else {
                $data = array(
                    'error_message' => 'Invalid Username or Password ...Plz Login again'
                );
                 $this->load->view('login',$data);
            }
        }
    }
     
    function logout() {
        $admin_session = $this->session->userdata('admin');
        $student_session = $this->session->userdata('student');
        $this->auth->logout();
        if ($admin_session) {
            $data = array(
                    'error_message' => 'Invalid Username or Password ...Plz Login again'
                );
            redirect('site/login',$data);
        } else if ($student_session) {
            redirect('site/userlogin');
        } else {
            redirect('site/userlogin');
        }
    }
    
    //all users login
    
    function userlogin() {
       // var_dump($_POST);exit;
       if ($this->auth->user_logged_in()) {
            $this->auth->user_redirect();
        }
        $data['title'] = 'Login';
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
           // echo "ssss";exit;
            $this->load->view('userlogin', $data);
        } else {
            $data = array(
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password')
            );
          //  var_dump($data);exit;
            $result = $this->user_model->checkLogin($data);
            //var_dump($result);exit;
            if (isset($result)&& !empty($result)) {   //change
                //$user = $result[0];
               // var_dump($result);exit;
                if ($result[0]->is_active == "yes") {
                  //  $username = $this->input->post('username');
                    //var_dump($result[0]->is_active);exit;
                    if ($result[0]->role == "student") {
                        //echo"1";exit;
                        //var_dump($result[0]->id);exit;
                        $result = $this->user_model->read_user_information($result[0]->id);
                        //var_dump($result);exit;
                    }else if ($result[0]->role == "parent") {
                       // var_dump($result[0]->role );exit;
                         $result = $this->user_model->checkLoginParent($data);
                        // var_dump($result);exit;
                        
                    }
                  // var_dump($result);exit;
                    if ($result != false) {
                        $setting_result = $this->setting_model->get();

                        if ($result[0]->role == "student") {
                            $session_data = array(
                                'id' => $result[0]->id,
                                'student_id' => $result[0]->user_id,
                                'role' => $result[0]->role,
                                'username' => $result[0]->firstname . " " . $result[0]->lastname,
                               // 'date_format' => $setting_result[0]['date_format'],
                               // 'currency_symbol' => $setting_result[0]['currency_symbol'],
                                'timezone' => $setting_result[0]['timezone'],
                                'sch_name' => $setting_result[0]['name'],
                                //'language' => array('lang_id' => $setting_result[0]['lang_id'], 'language' => $setting_result[0]['language']),
                                'is_rtl' => $setting_result[0]['is_rtl'],
                               // 'theme' => $setting_result[0]['theme'],
                            );
                           // var_dump($session_data);exit;
                            $this->session->set_userdata('student', $session_data);
                            $this->customlib->setUserLog($result[0]->username, $result[0]->role);
                            redirect('user/user/dashboard');
                             var_dump($session_data);exit;  
                        } else if ($result[0]->role == "parent") {
                            if ($result[0]->guardian_relation == "Father") {
                                $image = $result[0]->father_pic;
                            } else if ($result[0]->guardian_relation == "Mother") {
                                $image = $result[0]->mother_pic;
                            } else if ($result[0]->guardian_relation == "Other") {
                                $image = $result[0]->guardian_pic;
                            }

                            $session_data = array(
                                'id' => $result[0]->id,
                                'student_id' => $result[0]->user_id,
                                'role' => $result[0]->role,
                                'username' => $result[0]->guardian_name,
                               // 'date_format' => $setting_result[0]['date_format'],
                                'timezone' => $setting_result[0]['timezone'],
                                'sch_name' => $setting_result[0]['name'],
                               // 'currency_symbol' => $setting_result[0]['currency_symbol'],
                               // 'language' => array('lang_id' => $setting_result[0]['lang_id'], 'language' => $setting_result[0]['language']),
                                'is_rtl' => $setting_result[0]['is_rtl'],
                                //'theme' => $setting_result[0]['theme'],
                                'image' => $image,
                            );
                            $this->session->set_userdata('student', $session_data);
                            $s = array();
                            $childs_ids = ($result[0]->id);
                            
                            $students_array = $this->student_model->read_siblings_students($childs_ids);
                            foreach ($students_array as $key => $each) {
                                $d = array(
                                    'student_id' => $each['id'],
                                    'name' => $each['firstname'] . " " . $each['lastname']
                                );
                                $s[] = $d;
                            }
                            $this->session->set_userdata('parent_childs', $s);
                            $this->customlib->setUserLog($username, $result[0]->role);
                            redirect('parent/parents/dashboard');
                        }
                    } else {
                        $data = array(
                            'error_message' => 'Account Suspended'
                        );
                        $this->load->view('userlogin', $data);
                    }
                } else {
                    $data = array(
                        'error_message' => 'Your account is disabled please contact to administrator'
                    );
                    $this->load->view('userlogin', $data);
                }
            } else {
                $data = array(
                    'error_message' => 'Invalid Username or Password'
                );
                $this->load->view('userlogin', $data);
            }
        }
    }

    
    
}
        