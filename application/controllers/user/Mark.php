<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class mark extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('file');
      //  $this->lang->load('message', 'english');
        $this->load->library('auth');
        $this->auth->is_logged_in_user();
    }
    
    function marklist() {
       
        $student_id = $this->customlib->getStudentSessionUserID();
        $student = $this->student_model->get($student_id);
        $class_id = $student['class_id'];
        $division_id = $student['division_id'];
        $data['title'] = 'Student Details';
        $gradeList = $this->grade_model->get();
        $data['gradeList'] = $gradeList;
        $student_due_fee = $this->studentfee_model->getDueFeeBystudent($student['class_id'], $student['division_id'], $student_id);
        $data['student_due_fee'] = $student_due_fee;
        $transport_fee = $this->studenttransportfee_model->getTransportFeeByStudent($student['student_session_id']);
        $data['transport_fee'] = $transport_fee;
        $examList = $this->examschedule_model->getExamByClassandSection($student['class_id'], $student['division_id']);
        $data['examSchedule'] = array();
        if (!empty($examList)) {
            $new_array = array();
            $data['examSchedule']['status'] = "yes";
            foreach ($examList as $ex_key => $ex_value) {
                $array = array();
                $x = array();
                $exam_id = $ex_value['exam_id'];
                $exam_subjects = $this->examschedule_model->getresultByStudentandExam($exam_id, $student['id']);
                foreach ($exam_subjects as $key => $value) {
                    $exam_array = array();
                    $exam_array['exam_schedule_id'] = $value['exam_schedule_id'];
                    $exam_array['exam_id'] = $value['exam_id'];
                    $exam_array['full_marks'] = $value['full_marks'];
                    $exam_array['passing_marks'] = $value['passing_marks'];
                    $exam_array['exam_name'] = $value['name'];
                    $exam_array['exam_type'] = $value['type'];
                    $exam_array['attendence'] = $value['attendence'];
                    $exam_array['get_marks'] = $value['get_marks'];
                    $x[] = $exam_array;
                }
                $array['exam_name'] = $ex_value['name'];
                $array['exam_result'] = $x;
                $new_array[] = $array;
            }
            $data['examSchedule'] = $new_array;
        }
        $data['student'] = $student;
        $this->load->view('layout/student/header', $data);
        $this->load->view('user/mark/markList', $data);
        $this->load->view('layout/student/footer', $data);
    }
    
}