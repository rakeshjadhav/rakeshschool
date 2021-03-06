<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {


	public function dashboard(){	
//            $this->session->unset_userdata('isUserLoggedIn');
//            $this->session->sess_destroy();

            
            if($this->session->userdata('isUserLoggedIn')){
                            
            
            $role = $this->customlib->getStaffRole();
            $role_id = json_decode($role)->id;
           $staffid = $this->customlib->getStaffID();
           $notifications = $this->notification_model->getUnreadStaffNotification($staffid, $role_id);
            $data['notifications'] = $notifications;
//            var_dump($data['notifications']);exit;
            $input = $this->setting_model->getCurrentSessionName();
            list($a, $b) = explode('-', $input);
            $Current_year=$a;
            if(strlen($b) == 2){
            $Next_year=substr($a,0,2).$b;
            }else{
            $Next_year=$b;
            }
            
        $current_date = date('Y-m-d');
        $data['title'] = 'Dashboard';
        $Current_start_date = date('01');
        $Current_date = date('d');
        $Current_month = date('m');
        $month_collection = 0;
        $month_expense = 0;
        $total_students = 0;
        $total_teachers = 0;
        $ar = $this->startmonthandend();
        $year_str_month = $Current_year . '-' . $ar[0] . '-01';
        $year_end_month = $Next_year . '-' . $ar[1] . '-01';
        $getDepositeAmount = $this->studentfeemaster_model->getDepositAmountBetweenDate($year_str_month, $year_end_month);
        
        //======================Current Month Collection ==============================
        $first_day_this_month = date('Y-m-01');

        $month_collection = $this->whatever($getDepositeAmount, $first_day_this_month, $current_date);
        $expense = $this->expense_model->getTotalExpenseBwdate($first_day_this_month, $current_date);
        if (!empty($expense))
            $month_expense = $month_expense + $expense->amount;

        $data['month_collection'] = $month_collection;
        $data['month_expense'] = $month_expense;

        $tot_students = $this->studentsession_model->getTotalStudentBySession();
        if (!empty($tot_students))
            $total_students = $tot_students->total_student;
        $data['total_students'] = $total_students;

//        $tot_teacher = $this->teacher_model->getTotalteacher();
//        if (!empty($tot_teacher))
//            $total_teachers = $tot_teacher->total_teacher;
//        $data['total_teachers'] = $total_teachers;
        
        $tot_roles = $this->role_model->get();
        foreach ($tot_roles as $key => $value) {
            if ($value["id"] != 1) {
                $count_roles[$value["name"]] = $this->role_model->count_roles($value["id"]);
            }
        }
        $data["roles"] = $count_roles;

        //======================== get collection by month ==========================
        $start_month = strtotime($year_str_month);
        $start = strtotime($year_str_month);
        $end = strtotime($year_end_month);
        $coll_month = array();
        $s = array();
        $total_month = array();
        while ($start_month <= $end) {
            $total_month[] = date('M', $start_month);
            $month_start = date('Y-m-d', $start_month);
            $month_end = date("Y-m-t", $start_month);
            $return = $this->whatever($getDepositeAmount, $month_start, $month_end);
            if ($return) {
                $s[] = $return;
            } else {
                $s[] = "0.00";
            }

            $start_month = strtotime("+1 month", $start_month);
        }
        //======================== getexpense by month ==============================
        $ex = array();
        $start_session_month = strtotime($year_str_month);
        while ($start_session_month <= $end) {


            $month_start = date('Y-m-d', $start_session_month);
            $month_end = date("Y-m-t", $start_session_month);

            $expense_monthly = $this->expense_model->getTotalExpenseBwdate($month_start, $month_end);

            if (!empty($expense_monthly)) {
                $amt = 0;
                $ex[] = $amt + $expense_monthly->amount;
            }

            $start_session_month = strtotime("+1 month", $start_session_month);
        }

        $data['yearly_collection'] = $s;
        $data['yearly_expense'] = $ex;
        $data['total_month'] = $total_month;
        //======================= current month collection /expense ===================
        // hardcoded '01' for first day
        $startdate = date('m/01/Y');
        $enddate = date('m/t/Y');
        $start = strtotime($startdate);
        $end = strtotime($enddate);
        $currentdate = $start;
        $month_days = array();
        $days_collection = array();
        while ($currentdate <= $end) {
            $cur_date = date('Y-m-d', $currentdate);
            $month_days[] = date('d', $currentdate);
            $coll_amt = $this->whatever($getDepositeAmount, $cur_date, $cur_date);
            $days_collection[] = $coll_amt;
            $currentdate = strtotime('+1 day', $currentdate);
        }
        $data['current_month_days'] = $month_days;
        $data['days_collection'] = $days_collection;
        //======================= current month /expense ==============================
        // hardcoded '01' for first day
        $startdate = date('m/01/Y');
        $enddate = date('m/t/Y');
        $start = strtotime($startdate);
        $end = strtotime($enddate);
        $currentdate = $start;
        $days_expense = array();
        while ($currentdate <= $end) {
            $cur_date = date('Y-m-d', $currentdate);
            $month_days[] = date('d', $currentdate);
            $currentdate = strtotime('+1 day', $currentdate);
            $ct = $this->getExpensebyday($cur_date);
            $days_expense[] = $ct;
        }

        $data['days_expense'] = $days_expense;
        $student_fee_history = $this->studentfee_model->getTodayStudentFees();
        $data['student_fee_history'] = $student_fee_history;

        $event_colors = array("#03a9f4", "#c53da9", "#757575", "#8e24aa", "#d81b60", "#7cb342", "#fb8c00", "#fb3b3b");
        $data["event_colors"] = $event_colors;
        $userdata = $this->customlib->getUserData();
        $data["role"] = $userdata["user_type"];
        
            $this->load->view('adminlogin/layout/header',$data);
            $this->load->view('adminlogin/dashboard',$data);
            $this->load->view('adminlogin/layout/footer',$data);
            
            }else{
               // $this->session->set_userdata('success_msg', 'Your Logout was successfully. Please login to your account.');
          $this->session->set_userdata('msg', 'Your current session has expired. Please login again to continue.');
           redirect('site/login');
        }
	}
        
        function startmonthandend() {
        $startmonth = $this->setting_model->getStartMonth();
        if ($startmonth == 1) {
            $endmonth = 12;
        } else {
            $endmonth = $startmonth - 1;
        }
        return array($startmonth, $endmonth);
    }
    
    function whatever($feecollection_array, $start_month_date, $end_month_date) {
        $return_amount = 0;
        $st_date = strtotime($start_month_date);
        $ed_date = strtotime($end_month_date);
        if (!empty($feecollection_array)) {
            while ($st_date <= $ed_date) {
                $date = date('Y-m-d', $st_date);
                foreach ($feecollection_array as $key => $value) {

                    if ($value['date'] == $date) {


                        $return_amount = $return_amount + $value['amount'] + $value['amount_fine'];
                    }
                }
                $st_date = $st_date + 86400;
            }
        } else {
            
        }

        return $return_amount;
    }
    //chnage sesstion all project
    function getSession() {
//        if (!$this->rbac->hasPrivilege('quick_session_change', 'can_view')) {
//            access_denied();
//        }
        $session = $this->session_model->getAllSession();
        $data = array();
        $session_array = $this->session->has_userdata('session_array');
        $data['sessionData'] = array('session_id' => 0);
        if ($session_array) {
            $data['sessionData'] = $this->session->userdata('session_array');
        } else {
            $setting = $this->setting_model->get();

            $data['sessionData'] = array('session_id' => $setting[0]['session_id']);
        }
        $data['sessionList'] = $session;
        //var_dump(  $data['sessionList']);exit;
        $this->load->view('adminlogin/partial/_session', $data);
    }
    
    function updateSession() {
        $session = $this->input->post('popup_session');
        $session_array = $this->session->has_userdata('session_array');
        if ($session_array) {
            $this->session->unset_userdata('session_array');
        }
        $session = $this->session_model->get($session);
        $session_array = array('session_id' => $session['id'], 'session' => $session['session']);
        $this->session->set_userdata('session_array', $session_array);

        echo json_encode(array('status' => 1, 'message' => 'Session changed successfully'));
    }

    
    //backups
    function backup() {
        if (!$this->rbac->hasPrivilege('backup', 'can_view')) {
            access_denied();
        }
        
        $data['title'] = 'Backup History';
        if ($this->input->server('REQUEST_METHOD') == "POST") {
            if ($this->input->post('backup') == "upload") {
                $this->form_validation->set_rules('file', 'Image', 'callback_handle_upload');
                if ($this->form_validation->run() == FALSE) {
                    
                } else {
                    if (isset($_FILES["file"]) && !empty($_FILES['file']['name'])) {
                        $fileInfo = pathinfo($_FILES["file"]["name"]);
                        $file_name = "db-" . date("Y-m-d_H-i-s") . ".sql";
                        move_uploaded_file($_FILES["file"]["tmp_name"], "./backup/temp_uploaded/" . $file_name);
                        $folder_name = 'temp_uploaded';
                        $path = './backup/';
                        $file_restore = $this->load->file($path . $folder_name . '/' . $file_name, true);
                        $file_array = explode(';', $file_restore);
                        foreach ($file_array as $query) {
                            $trimQuery1 = trim($query);
                            if (!empty($trimQuery1)) {
                                $this->db->query("SET FOREIGN_KEY_CHECKS = 0");
                                $this->db->query($query);
                                $this->db->query("SET FOREIGN_KEY_CHECKS = 1");
                            }
                        }
                        $this->session->set_flashdata('msg', '<div class="alert alert-success text-left">Backup restored successfully!</div>');
                        redirect('webadmin/admin/backup');
                    }
                }
            }
            if ($this->input->post('backup') == "backup") {
                $this->session->set_flashdata('msg', '<div class="alert alert-success text-left">Backup created successfully!</div>');
                $this->load->helper('download');
                $this->load->dbutil();
                $filename = "db-" . date("Y-m-d_H-i-s") . ".sql";
                $prefs = array(
                    'ignore' => array(),
                    'format' => 'txt',
                    'filename' => 'mybackup.sql',
                    'add_drop' => TRUE,
                    'add_insert' => TRUE,
                    'newline' => "\n"
                );
                $backup = $this->dbutil->backup($prefs);
                $this->load->helper('file');
                write_file('./backup/database_backup/' . $filename, $backup);
                redirect('webadmin/admin/backup');
                force_download($filename, $backup);
                $this->session->set_flashdata('feedback', 'Success message for client to see');
                redirect('webadmin/admin/backup');
            } else if ($this->input->post('backup') == "restore") {
                $folder_name = 'database_backup';
                $file_name = $this->input->post('filename');
                $path = './backup/';
                $filePath = $path . $folder_name . '/' . $file_name;
                $file_restore = $this->load->file($path . $folder_name . '/' . $file_name, true);
                $db = (array) get_instance()->db;
                $conn = mysqli_connect('localhost', $db['username'], $db['password'], $db['database']);

                $sql = '';
                $error = '';

                if (file_exists($filePath)) {
                    $lines = file($filePath);

                    foreach ($lines as $line) {

                        // Ignoring comments from the SQL script
                        if (substr($line, 0, 2) == '--' || $line == '') {
                            continue;
                        }

                        $sql .= $line;

                        if (substr(trim($line), - 1, 1) == ';') {
                            $result = mysqli_query($conn, $sql);
                            if (!$result) {
                                $error .= mysqli_error($conn) . "\n";
                            }
                            $sql = '';
                        }
                    } // end foreach
                    // if ($error) {
                    //    $msg=$error;
                    // } else {
                    $msg = "Backup restored successfully!";

                    // }
                } // end if file exists
                $this->session->set_flashdata('msg', '<div class="alert alert-success text-left">' . $msg . '</div>');
                redirect('webadmin/admin/backup');
            }
        }
        $dir = "./backup/database_backup/";
        $result = array();
        $cdir = scandir($dir);
        foreach ($cdir as $key => $value) {
            if (!in_array($value, array(".", ".."))) {
                if (is_dir($dir . DIRECTORY_SEPARATOR . $value)) {
                    $result[$value] = dirToArray($dir . DIRECTORY_SEPARATOR . $value);
                } else {
                    $result[] = $value;
                }
            }
        }
        $data['dbfileList'] = $result;
        $setting_result = $this->setting_model->get();
        $data['settinglist'] = $setting_result;
        $this->load->view('adminlogin/layout/header', $data);
        $this->load->view('adminlogin/backup', $data);
        $this->load->view('adminlogin/layout/footer', $data);
    }

    
        function handle_upload() {
        if (isset($_FILES["file"]) && !empty($_FILES['file']['name'])) {
            $allowedExts = array('sql');
            $temp = explode(".", $_FILES["file"]["name"]);
            $extension = end($temp);
            if ($_FILES["file"]["error"] > 0) {
                $error .= "Error opening the file<br />";
            }
            if ($_FILES["file"]["type"] != 'application/octet-stream') {

                $this->form_validation->set_message('handle_upload', 'File type not allowed');
                return false;
            }
            if (!in_array($extension, $allowedExts)) {

                $this->form_validation->set_message('handle_upload', 'Extension not allowed');
                return false;
            }
            if ($_FILES["file"]["size"] > 10240000) {

                $this->form_validation->set_message('handle_upload', 'File size shoud be less than 100 kB');
                return false;
            }
            return true;
        } else {
            $this->form_validation->set_message('handle_upload', 'File field is required');
            return false;
        }
    }
    public function downloadbackup($file) {
        $this->load->helper('download');
        $filepath = "./backup/database_backup/" . $file;
        $data = file_get_contents($filepath);
        $name = $file;
        force_download($name, $data);
    }

    function addCronsecretkey($id) {

        $key = $this->generate_key(25);
        $data = array('cron_secret_key' => $key);
        $this->setting_model->add_cronsecretkey($data, $id);

    }
    function generate_key($length = 12) {

        $str = "";
        $characters = array_merge(range('A', 'Z'), range('a', 'z'), range('0', '9'));
        $max = count($characters) - 1;
        for ($i = 0; $i < $length; $i++) {
            $rand = mt_rand(0, $max);
            $str .= $characters[$rand];
        }
        return $str;
    }
 function getExpensebyday($date) {
        $result = $this->admin_model->getExpensebyDay($date);
        if ($result[0]['amount'] == "") {
            $return = 0;
        } else {
            $return = $result[0]['amount'];
        }
        return $return;
    }
}
