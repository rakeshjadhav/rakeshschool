<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Attendence extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('file');
      //  $this->lang->load('message', 'english');
        $this->load->library('auth');
        $this->auth->is_logged_in_user();
    }

    public function index() {
        
        $data['title'] = 'Attendence List';
        $result = array();
        $data['resultList'] = $result;
        $this->load->view('layout/student/header');
        $this->load->view('user/attendence/attendenceIndex', $data);
        $this->load->view('layout/student/footer');
    }
    
    public function getAttendence() {
        //var_dump($_GET);exit;
        $year = date('Y');
        $month = date('m');
        //echo $year;echo $month;exit;
        $student_id = $this->customlib->getStudentSessionUserID();
        $student = $this->student_model->get($student_id);
        $student_session_id = $student['student_session_id'];
        $result = array();
        
        $new_date = "01-" . $month . "-" . $year;
       // var_dump($new_date);exit;
        $totalDays = cal_days_in_month(CAL_GREGORIAN, $month, $year);
      //  var_dump($totalDays);exit;
        $first_day_this_month = date('01-m-Y');
        $fst_day_str = strtotime(date($new_date));
        $array = array();
        for ($day = 2; $day <= $totalDays; $day++) {
            $fst_day_str = ($fst_day_str + 86400);
            $date = date('Y-m-d', $fst_day_str);
            //var_dump($date);exit;
            $student_attendence = $this->attendencetype_model->getStudentAttendence($date, $student_session_id);
            //var_dump($student_attendence);exit;
            if (!empty($student_attendence)) {
                $s = array();
                $s['date'] = $date;
                $s['badge'] = false;
                $s['footer'] = "Extra information";
                $type = $student_attendence->type;
                $s['title'] = $type;
                if ($type == 'Present') {
                    $s['classname'] = "grade-4";
                } else if ($type == 'Absent') {
                    $s['classname'] = "grade-1";
                } else if ($type == 'Late') {
                    $s['classname'] = "grade-3";
                } else if ($type == 'Late with excuse') {
                    $s['classname'] = "grade-2";
                } else if ($type == 'Holiday') {
                    $s['classname'] = "grade-5";
                }
                $array[] = $s;
            }
        }
        if (!empty($array)) {
            echo json_encode($array);
        } else {
            echo false;
        }
    }
    
}
