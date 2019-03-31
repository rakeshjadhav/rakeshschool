<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Timetable extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('file');
    }
    
    function index() {
        if($this->session->userdata('isUserLoggedIn')){
        if (!$this->rbac->hasPrivilege('class_timetable', 'can_view')) {
            access_denied();
        }
        $session = $this->setting_model->getCurrentSession();
        $data['title'] = 'Exam Marks';
        
        $data['exam_id'] = "";
        $data['class_id'] = "";
        $data['division_id'] = "";
        
        $exam = $this->exam_model->get();
        $class = $this->class_model->get();
        $data['examlist'] = $exam;
        $data['classlist'] = $class;
        
        $feecategory = $this->feecategory_model->get();
        $data['feecategorylist'] = $feecategory;
//        var_dump($data);exit;
        $this->form_validation->set_rules('class_id', 'Class', 'trim|required');
        $this->form_validation->set_rules('section_id', 'division', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('adminlogin/layout/header', $data);
            $this->load->view('adminlogin/timetable/timetableList', $data);
            $this->load->view('adminlogin/layout/footer', $data);
        } else {
//            var_dump($_POST);exit;
            $class_id = $this->input->post('class_id');
            $section_id = $this->input->post('section_id');
            
            $data['class_id'] = $class_id;
            $data['section_id'] = $section_id;
            
            $result_subjects = $this->teachersubject_model->getSubjectByClsandSection($class_id, $section_id);
//            var_dump($result_subjects);exit;
            $getDaysnameList = $this->customlib->getDaysname();
            $data['getDaysnameList'] = $getDaysnameList;
            $final_array = array();
            if (!empty($result_subjects)) {
                foreach ($result_subjects as $subject_k => $subject_v) {
                    $result_array = array();
                    foreach ($getDaysnameList as $day_key => $day_value) {
                        $where_array = array(
                            'teacher_subject_id' => $subject_v['id'],
                            'day_name' => $day_value
                        );
                        $result = $this->timetable_model->get($where_array);
                        if (!empty($result)) {
                            $obj = new stdClass();
                            $obj->status = "Yes";
                            $obj->start_time = $result[0]['start_time'];
                            $obj->end_time = $result[0]['end_time'];
                            $obj->room_no = $result[0]['room_no'];
                            $result_array[$day_value] = $obj;
                        } else {
                            $obj = new stdClass();
                            $obj->status = "No";
                            $obj->start_time = "N/A";
                            $obj->end_time = "N/A";
                            $obj->room_no = "N/A";
                            $result_array[$day_value] = $obj;
                        }
                    }
                    $final_array[$subject_v['name']] = $result_array;
                }
            }
            $data['result_array'] = $final_array;
            $this->load->view('adminlogin/layout/header', $data);
            $this->load->view('adminlogin/timetable/timetableList', $data);
            $this->load->view('adminlogin/layout/footer', $data);
        }
        }else{
           $this->session->set_userdata('msg', 'Your current session has expired. Please login again to continue.');
           redirect('site/login');
        }
    }
    
    
     function create() {
         //var_dump($_POST);exit;
         if($this->session->userdata('isUserLoggedIn')){
         if (!$this->rbac->hasPrivilege('class_timetable', 'can_add')) {
            access_denied();
        }
        $session = $this->setting_model->getCurrentSession();
//        var_dump($session);exit;
        $data['title'] = 'Exam Schedule';
        $data['subject_id'] = "";
        $data['class_id'] = "";
        $data['division_id'] = "";
        
        $exam = $this->exam_model->get();
        $class = $this->class_model->get();
        $data['examlist'] = $exam;
        $data['classlist'] = $class;
//         var_dump($class);exit;
        $feecategory = $this->feecategory_model->get();
        $data['feecategorylist'] = $feecategory;
//          var_dump($data['feecategorylist']);exit;
        $this->form_validation->set_rules('subject_id', 'Subject', 'trim|required');
        $this->form_validation->set_rules('class_id', 'Class', 'trim|required');
        $this->form_validation->set_rules('section_id', 'Division', 'trim|required');
                
        if ($this->form_validation->run() == FALSE) {
//             var_dump("hi1");exit;
            $this->load->view('adminlogin/layout/header', $data);
            $this->load->view('adminlogin/timetable/timetableCreate', $data);
           $this->load->view('adminlogin/layout/footer', $data);
        } else {
//             var_dump($class);exit;
            $feecategory_id = $this->input->post('feecategory_id');
            $subject_id = $this->input->post('subject_id');
            $class_id = $this->input->post('class_id');
            $section_id = $this->input->post('section_id');
            $data['subject_id'] = $subject_id;
            $data['class_id'] = $class_id;
            $data['section_id'] = $section_id;
            $getDaysnameList = $this->customlib->getDaysname();
            $data['getDaysnameList'] = $getDaysnameList;
//            var_dump($data['getDaysnameList']);exit;
            $array = array();
            $data['timetableSchedule'] = array();
//            var_dump($data['timetableSchedule']);exit;
            foreach ($getDaysnameList as $key => $value) {
                $where_array = array(
                    'teacher_subject_id' => $subject_id,
                    'day_name' => $value
                );
                $result = $this->timetable_model->get($where_array);
               // var_dump($result);exit;
                if (empty($result)) {
                    $obj = new stdClass();
                    $obj->starting_time = "";
                    $obj->post_id = 0;
                    $obj->ending_time = "";
                    $obj->room_no = "";
                } else {
                    $obj = new stdClass();
                    $obj->starting_time = $result[0]['start_time'];
                    $obj->post_id = $result[0]['id'];
                    $obj->ending_time = $result[0]['end_time'];
                    $obj->room_no = $result[0]['room_no'];
                }
                $array[$value] = $obj;
            }
            $data['timetableSchedule'] = $array;
            if ($this->input->post('save_exam') == "save_exam") {
                $loop = $this->input->post('i');
//                var_dump($loop);exit;
                foreach ($loop as $key => $value) {
                    $data = array(
                        'day_name' => $value,
                        'teacher_subject_id' => $this->input->post('subject_id'),
                        'start_time' => $this->input->post('stime_' . $value),
                        'end_time' => $this->input->post('etime_' . $value),
                        'room_no' => $this->input->post('room_' . $value),
                        'id' => $this->input->post('edit_' . $value),
                    );
//                    var_dump($data);exit;
                    $this->timetable_model->add($data);
                }
                redirect('webadmin/timetable');
            }
            $this->load->view('adminlogin/layout/header', $data);
            $this->load->view('adminlogin/timetable/timetableCreate', $data);
            $this->load->view('adminlogin/layout/footer', $data);
        }
        }else{
           $this->session->set_userdata('msg', 'Your current session has expired. Please login again to continue.');
           redirect('site/login');
        }
    }
    
}