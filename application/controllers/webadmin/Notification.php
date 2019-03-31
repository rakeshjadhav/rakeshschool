<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Notification extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        if (!$this->rbac->hasPrivilege('notice_board', 'can_view')) {
            access_denied();
        }
        $data['title'] = 'Notifications';
        $notifications = $this->notification_model->get();
       // var_dump($notifications);exit;
        $user_role = json_decode($this->customlib->getStaffRole());     

        //$data['notificationlist'] = $notifications;

        $userdata = $this->customlib->getUserData();
        $role_id = $userdata["role_id"];
        $user_id = $userdata["id"];
        $data["user_id"] = $user_id ;
     
        if (!empty($notifications)) {
            foreach ($notifications as $key => $value) {
               // var_dump($value);exit;
              $created_by_name = $this->notification_model->getcreatedByName($value["created_id"]);  
             // var_dump($created_by_name);exit;
               $roles = $created_by_name["name"];
             //  var_dump($roles);exit;
                $arr = explode(",", $roles);
                if($user_role->name == "Super Admin"){
                    $rname = $this->notification_model->getRole($arr);
                    $data['notificationlist'][$key] = $notifications[$key];
                    $data['notificationlist'][$key]["role_name"] = $rname;
                }
                elseif ((in_array($role_id, $arr)) || ($value["created_id"] == $user_id)) {
                    //  echo "yes";
                    $rname = $this->notification_model->getRole($arr);

                    $data['notificationlist'][$key] = $notifications[$key];
                    $data['notificationlist'][$key]["role_name"] = $rname;
                   
                }
                 $data['notificationlist'][$key]["createdby_name"] = $created_by_name["name"]." ".$created_by_name["surname"];
            }
        }
        
        $this->load->view('adminlogin/layout/header', $data);
        $this->load->view('adminlogin/notification/notificationList', $data);
        $this->load->view('adminlogin/layout/footer', $data);
    }
    
    
    function add() {
        if (!$this->rbac->hasPrivilege('notice_board', 'can_add')) {
            access_denied();
        }

        $data['title'] = 'Add Notification';
        $data['roles'] = $this->role_model->get();

        $this->form_validation->set_rules('title', 'Title', 'trim|required');
        $this->form_validation->set_rules('message', 'Message', 'trim|required');
        $this->form_validation->set_rules('date', 'Notice Date', 'trim|required');
        $this->form_validation->set_rules('publish_date', 'Publish Date', 'trim|required');
        $this->form_validation->set_rules('visible[]', 'Message To', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            
        } else {

            $userdata = $this->customlib->getUserData();
            $student = "No";
            $staff = "No";
            $parent = "No";
            $staff_roles = array();
            $visible = $this->input->post('visible');
            foreach ($visible as $key => $value) {

                if ($value == "student") {
                    $student = "Yes";
                } else if ($value == "parent") {
                    $parent = "Yes";
                } else if (is_numeric($value)) {

                    $staff_roles[] = array('role_id' => $value, 'send_notification_id' => '');
                    $staff = "Yes";
                }
            }

            $data = array(
                'message' => $this->input->post('message'),
                'title' => $this->input->post('title'),
                'date' => $this->input->post('date'),
                'created_by' =>$userdata["user_type"],
                'created_id' => $this->customlib->getStaffID(),
                'visible_student' => $student,
                'visible_staff' => $staff,
                'visible_parent' => $parent,
                'publish_date' => $this->input->post('publish_date'),
            );


            $this->notification_model->insertBatch($data, $staff_roles);
            $this->session->set_flashdata('msg', '<div class="alert alert-success">Notification added successfully!</div>');
            redirect('webadmin/notification/index');
        }
        $exam_result = $this->exam_model->get();
        $data['examlist'] = $exam_result;
        $this->load->view('adminlogin/layout/header', $data);
        $this->load->view('adminlogin/notification/notificationAdd', $data);
        $this->load->view('adminlogin/layout/footer', $data);
    }
    
    
    function edit($id) {
        
         $userdata = $this->customlib->getUserData();

        $user_id = $userdata["id"];
     
        $usernotification=$this->notification_model->get($id);
        

        if ((!$this->rbac->hasPrivilege('notice_board', 'can_edit'))) {
         if($usernotification['created_id'] != $user_id){

            access_denied();
      
        }
        }
        $data['id'] = $id;
        $notification = $this->notification_model->get($id);
        $data['notification'] = $notification;
       // var_dump($data['notification']);exit;
        $data['roles'] = $this->role_model->get();
        $data['title'] = 'Edit Notification';
        $data['title_list'] = 'Notification List';
        $this->form_validation->set_rules('title', 'Title', 'trim|required');
        $this->form_validation->set_rules('message', 'Message', 'trim|required');
        $this->form_validation->set_rules('date', 'Notice Date', 'trim|required');
        $this->form_validation->set_rules('publish_date', 'Publish Date', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            
        } else {

              $userdata = $this->customlib->getUserData();
            $student = "No";
            $staff = "No";
            $parent = "No";
            $prev_roles = $this->input->post('prev_roles');
            $visible = $this->input->post('visible');
            $staff_roles = array();
            $inst_staff = array();
            foreach ($visible as $key => $value) {

                if ($value == "student") {
                    $student = "Yes";
                } else if ($value == "parent") {
                    $parent = "Yes";
                } else if (is_numeric($value)) {
                    $inst_staff[] = $value;
                    $staff_roles[] = array('role_id' => $value, 'send_notification_id' => '');
                    $staff = "Yes";
                }
            }

            $to_be_del = array_diff($prev_roles, $inst_staff);
            $to_be_insert = array_diff($inst_staff, $prev_roles);
            $insert = array();
            if (!empty($to_be_insert)) {

                foreach ($to_be_insert as $to_insert_key => $to_insert_value) {
                    $insert[] = array('role_id' => $to_insert_value, 'send_notification_id' => '');
                }
            }


            $data = array(
                'id' => $id,
                'message' => $this->input->post('message'),
                'title' => $this->input->post('title'),
                'date' => $this->input->post('date'),
                 'created_by' =>$userdata["user_type"],
                'created_id' => $this->customlib->getStaffID(),
                'visible_student' => $student,
                'visible_staff' => $staff,
                'visible_parent' => $parent,
                'publish_date' => $this->input->post('publish_date'),
            );
            $this->notification_model->insertBatch($data, $insert, $to_be_del);
            $this->session->set_flashdata('msg', '<div class="alert alert-success">Notification added successfully!</div>');
            redirect('webadmin/notification/index');
        }
        $exam_result = $this->exam_model->get();
        $data['examlist'] = $exam_result;
        $this->load->view('adminlogin/layout/header', $data);
        $this->load->view('adminlogin/notification/notificationEdit', $data);
        $this->load->view('adminlogin/layout/footer', $data);
    }
    
     function delete($id) {
       $userdata = $this->customlib->getUserData();

        $user_id = $userdata["id"];
     
        $usernotification=$this->notification_model->get($id);
        

        if ((!$this->rbac->hasPrivilege('notice_board', 'can_edit'))) {
         if($usernotification['created_id'] != $user_id){

            access_denied();
      
        }
        }
        $this->notification_model->remove($id);
        redirect('webadmin/notification');
    }

}