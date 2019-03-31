<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Customlib {

    var $CI;

    function __construct() {
        $this->CI = & get_instance();
        $this->CI->load->library('session');
        $this->CI->load->library('user_agent');
      // $this->CI->load->model('Notification_model', '', TRUE);
     //  $this->CI->load->model('Setting_model', '', TRUE);
       $this->CI->load->model('notificationsetting_model');
    }
    
    //auth
    function getTimeZone() {
        $admin = $this->CI->session->userdata('admin');
        if ($admin) {
           // return $admin['timezone'];
            return $admin;
        } else if ($this->CI->session->userdata('student')) {
            $student = $this->CI->session->userdata('student');
            return $student['timezone'];
        }
    }
    
    // login page view
     function getCSRF() {
        $csrf_input = "<input type='hidden' ";
//        var_dump($csrf_input);exit;
        $csrf_input .= "name='" . $this->CI->security->get_csrf_token_name() . "'";  
        $csrf_input .= " value='" . $this->CI->security->get_csrf_hash() . "'/>";
// var_dump($csrf_input);exit;
        return $csrf_input;
    }
    //admin login
    public function setUserLog($username, $role) {
        if ($this->CI->agent->is_browser()) {
            $agent = $this->CI->agent->browser() . ' ' . $this->CI->agent->version();
        } elseif ($this->CI->agent->is_robot()) {
            $agent = $this->CI->agent->robot();
        } elseif ($this->CI->agent->is_mobile()) {
            $agent = $this->CI->agent->mobile();
        } else {
            $agent = 'Unidentified User Agent';
        }
//
        $data = array(
            'user' => $username,
            'role' => $role,
            'ipaddress' => $this->CI->input->ip_address(),
            'user_agent' => $agent . ", " . $this->CI->agent->platform(),
        );
        $this->CI->userlog_model->add($data);
    }
    //layout adminlogin header
    function getAppName() {
        $admin = $this->CI->session->userdata('admin');
        if ($admin) {
            return $admin['sch_name'];
        } else if ($this->CI->session->userdata('student')) {
            $student = $this->CI->session->userdata('student');
            return $student['sch_name'];
        }
    }
    // layout header 
    function getRTL() {
        $rtl = "";
        $admin = $this->CI->session->userdata('admin');
        if ($admin) {
            if ($admin['is_rtl'] == "disabled") {
                $rtl = "";
            } else {
                $rtl = "dir='rtl' lang='ar'";
            }
        } else if ($this->CI->session->userdata('student')) {
            $student = $this->CI->session->userdata('student');

            if ($student['is_rtl'] == "disabled") {
                $rtl = "";
            } else {
                $rtl = "dir='rtl' lang='ar'";
            }
        }
        return $rtl;
    }
    
    // layout  header 
    function getAdminSessionUserName() {
        $student_session = $this->CI->session->userdata('admin');
        $username = $student_session['username'];

        return $username;
    }
    
     //teacher index
    function getGender() {
        $gender = array();
        $gender['Male'] = $this->CI->lang->line('male');
        $gender['Female'] = $this->CI->lang->line('female');
        return $gender;
    }
    
    //create teacher
    function datetostrtotime($date) {
        //var_dump($date);exit;
        $format = $this->getSchoolDateFormat();
        //var_dump($format);exit;
        if ($format == 'd-m-Y')
            list($day, $month, $year) = explode('-', $date);
        if ($format == 'd/m/Y')
            list($day, $month, $year) = explode('/', $date);
        if ($format == 'd-M-Y')
            list($day, $month, $year) = explode('-', $date);
        if ($format == 'd.m.Y')
            list($day, $month, $year) = explode('.', $date);
        if ($format == 'm-d-Y')
            list($month, $day, $year) = explode('-', $date);
        if ($format == 'm/d/Y')
            list($month, $day, $year) = explode('/', $date);
        if ($format == 'm.d.Y')
            list($month, $day, $year) = explode('.', $date);
        $date = $year . "-" . $month . "-" . $day;
        return strtotime($date);
    }
    //    teacher
    function getSchoolDateFormat() {
        $admin = $this->CI->session->userdata('admin');
        if ($admin) {
            return $admin;
        } else if ($this->CI->session->userdata('student')) {
            $student = $this->CI->session->userdata('student');
            return $student;
        }
    }
    //teacher list
     function dateyyyymmddTodateformat($date) {
        $format = $this->getSchoolDateFormat();
        if ($format == 'd-m-Y')
            list($month, $day, $year) = explode('-', $date);
        if ($format == 'd/m/Y')
            list($month, $day, $year) = explode('-', $date);
        if ($format == 'd-M-Y')
            list($month, $day, $year) = explode('-', $date);
        if ($format == 'd.m.Y')
            list($month, $day, $year) = explode('-', $date);
        if ($format == 'm-d-Y')
            list($month, $day, $year) = explode('-', $date);
        if ($format == 'm/d/Y')
            list($month, $day, $year) = explode('-', $date);
        if ($format == 'm.d.Y')
            list($month, $day, $year) = explode('-', $date);
        $date = $year . "-" . $day . "-" . $month;
        return strtotime($date);
    }
  //create timetable  
    function getDaysname() {
        $status = array();
        $status['Monday'] = 'Monday';
        $status['Tuesday'] = 'Tuesday';
        $status['Wednesday'] = 'Wednesday';
        $status['Thursday'] = 'Thursday';
        $status['Friday'] = 'Friday';
        $status['Saturday'] = 'Saturday';
        $status['Sunday'] = 'Sunday';
        return $status;
    }
    
    // class edit
    function getSchoolCurrencyFormat() {
        $admin = $this->CI->session->userdata('admin');
        if ($admin) {
            return $admin;
        } else if ($this->CI->session->userdata('student')) {
            $student = $this->CI->session->userdata('student');
            return $student;
        }
    }
    
    // study content
    function getcontenttype() {
        $status = array();
        $status['Assignments'] = 'Assignments';
        $status['Study_material'] = 'Study Material';
        $status['Syllabus'] = 'Syllabus';
        $status['Other_download'] = 'Other Download';
        return $status;
    }
    
    //libr logi dasgboard
    function getStudentSessionUserName() {
        $student_session = $this->CI->session->all_userdata();
        $session_Array = $this->CI->session->userdata('student');
        $studentUsername = $session_Array['username'];
        return $studentUsername;
    }
    
    //student login
    function getStudentSessionUserID() {
        $student_session = $this->CI->session->all_userdata();
        $session_Array = $this->CI->session->userdata('student');
        $studentID = $session_Array['student_id'];
        return $studentID;
    }
    

function getLoggedInUserData() {
        $admin = $this->CI->session->userdata('admin');
        if ($admin) {
            return $admin;
        } else if ($this->CI->session->userdata('student')) {
            $student = $this->CI->session->userdata('student');
            return $student;
        }
    }
    
    
    function getParentunreadNotification() {
        $teacher_id = $this->CI->customlib->getParentSessionUserID();
        $notifications = $this->CI->notification_model->countUnreadNotificationParent($teacher_id);
        if ($notifications > 0) {
            return $notifications;
        } else {
            return FALSE;
        }
    }
    
    function getParentSessionUserID() {
        $student_session = $this->CI->session->all_userdata();
        $session_Array = $this->CI->session->userdata('student');
        $Parentid = $session_Array['student_id'];
        return $Parentid;
    }

//    parnet view student fee
    function checkPaypalDisplay() {
        $payment_setting = $this->CI->paymentsetting_model->get();
        return $payment_setting;
    }
    
//    list hostel type
    function getHostaltype() {
        $status = array();
        $status['Girls'] = 'Girls';
        $status['Boys'] = 'Boys';
        $status['Combine'] = 'Combine';
        return $status;
    }
//login
    function getStaffRole() {
        $admin = $this->CI->session->userdata('admin');
        $roles = $admin['roles'];
        if ($admin) {
            $role_key = key($roles);
            return json_encode(array('id' => $roles[$role_key], 'name' => $role_key));
        }
    }
    //rts yes or no
    function getRteStatus() {
        $status = array();
        $status['Yes'] = 'yes';
        $status['No'] ='no';
        return $status;
    }
    function getUserData() {
        $result = $this->getLoggedInUserData();
//        var_dump($result);exit;
        $id = $result["id"];
        //var_dump($id);exit;
        $data = $this->CI->staff_model->get($id);
        //var_dump($data);exit;
        $setting_result = $this->CI->setting_model->get();
//        var_dump($setting_result);exit;
       if (!empty($setting_result)) {
            $data["class_teacher"] = $setting_result[0]["class_teacher"];
			//var_dump($data["class_teacher"]);
        } else {
            $data["class_teacher"] = "yes";
			//var_dump($data["class_teacher"]);exit;
        }
        return $data;
    }
    
    //create setting
    function timezone_list() {
        static $timezones = null;

        if ($timezones === null) {
            $timezones = [];
            $offsets = [];
            $now = new DateTime('now', new DateTimeZone('UTC'));

            foreach (DateTimeZone::listIdentifiers() as $timezone) {

                $now->setTimezone(new DateTimeZone($timezone));
                $offsets[] = $offset = $now->getOffset();
                $timezones[$timezone] = '(' . $this->format_GMT_offset($offset) . ') ' . $this->format_timezone_name($timezone);
            }

            array_multisort($offsets, $timezones);
        }
        return $timezones;
    }
    
    function format_GMT_offset($offset) {
        $hours = intval($offset / 3600);
        $minutes = abs(intval($offset % 3600 / 60));
        return 'GMT' . ($offset ? sprintf('%+03d:%02d', $hours, $minutes) : '');
    }
    
    public function format_timezone_name($name) {
        $name = str_replace('/', ', ', $name);
        $name = str_replace('_', ' ', $name);
        $name = str_replace('St ', 'St. ', $name);
        return $name;
    }
    
    function getMonthList() {
        $months = array(1 => 'January', 2 => 'February', 3 => 'March', 4 => 'April', 5 => 'May', 6 => 'June', 7 => 'July', 8 => 'August', 9 => 'September', 10 => 'October', 11 => 'November', 12 => 'Decmber');
        return $months;
    }
    //notification mail and sms 
    
    function sendMailSMS($find) {
        $notifications = $this->CI->notificationsetting_model->get();
        //var_dump($notifications);exit;
        if (!empty($notifications)) {
            foreach ($notifications as $note_key => $note_value) {
                //var_dump($note_value);exit;
                if ($note_value->type == $find) {
                    return array('mail' => $note_value->is_mail, 'sms' => $note_value->is_sms);
                }
            }
        }
        return false;
    }
 function getMonthDropdown() {
        $array = array();
        for ($m = 1; $m <= 12; $m++) {
            $month = date('F', mktime(0, 0, 0, $m, 1, date('Y')));
            $array[$month] = $month;
        }
        return $array;
    }
    public function getclassteacher($id) {
        $getUserassignclass = $this->CI->classteacher_model->getclassbyuser($id);
        $classteacherlist = $getUserassignclass;
        return $classteacherlist;
    }
    
    function getClassbyteacher($id) {

        $getUserassignclass = $this->CI->classteacher_model->getclassbyuser($id);
        $classteacherlist = $getUserassignclass;
        $class = array();
        foreach ($classteacherlist as $key => $value) {
            $class[] = $value["id"];
        }

        if (!empty($class)) {

            $getSubjectassignclass = $this->CI->classteacher_model->classbysubjectteacher($id, $class);
            $subjectteacherlist = $getSubjectassignclass;

            $classlist = array_merge($classteacherlist, $subjectteacherlist);

            $i = 0;
            foreach ($classlist as $key => $value) {

                $data[$i]["id"] = $value["id"];
                $data[$i]["class"] = $value["class"];


                $i++;
            }
        } else {
            $getSubjectassignclass = $this->CI->classteacher_model->getsubjectbyteacher($id);



            $data = $getSubjectassignclass;
        }

        return $data;
    }

function getStaffID() { // users table id of users
        $session_Array = $this->CI->session->userdata('admin');
        $staff_id = $session_Array['id'];
        return $staff_id;
    }

}