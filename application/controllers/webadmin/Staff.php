<?php

class Staff extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->config->load("payroll");
        //$this->load->library('Enc_lib');
        $this->load->library('email');
        $this->load->model("staff_model");
        //  $this->load->model("timeline_model");
       //$this->load->model("leaverequest_model");
      //$this->contract_type = $this->config->item('contracttype');
      $this->marital_status = $this->config->item('marital_status');
     //$this->staff_attendance = $this->config->item('staffattendance');
       // $this->payroll_status = $this->config->item('payroll_status');
      //  $this->payment_mode = $this->config->item('payment_mode');
        $this->status = $this->config->item('status');
    }
    
    function index() {
          if($this->session->userdata('isUserLoggedIn')){
//        if (!$this->rbac->hasPrivilege('staff', 'can_view')) {
//            access_denied();
//        }
        $data['title'] = 'Staff Search';

        $search = $this->input->post("search");
      //  var_dump($search);exit;
        $resultlist = $this->staff_model->searchFullText("", 1);
        $data['resultlist'] = $resultlist;
        $staffRole = $this->staff_model->getStaffRole();
        $data["role"] = $staffRole;
        $data["role_id"] = "";

        $search_text = $this->input->post('search_text');
        if (isset($search)) {
            if ($search == 'search_filter') {
                $this->form_validation->set_rules('role', 'Role', 'trim|required');
                if ($this->form_validation->run() == FALSE) {

                    $data["resultlist"] = array();
                } else {
                    $data['searchby'] = "filter";
                    $role = $this->input->post('role');
                    $data['employee_id'] = $this->input->post('empid');
                    $data["role_id"] = $role;
                    $data['search_text'] = $this->input->post('search_text');
                    $resultlist = $this->staff_model->getEmployee($role, 1);
                    $data['resultlist'] = $resultlist;
                }
            } else if ($search == 'search_full') {
                $data['searchby'] = "text";
                $data['search_text'] = trim($this->input->post('search_text'));
                $resultlist = $this->staff_model->searchFullText($search_text, 1);
                $data['resultlist'] = $resultlist;
                $data['title'] = 'Search Details: ' . $data['search_text'];
            }
        }
        $this->load->view('adminlogin/layout/header');
        $this->load->view('adminlogin/staff/staffsearch', $data);
        $this->load->view('adminlogin/layout/footer');
        }else{
            $this->session->set_userdata('msg', 'Your Session is destroy. Please login to your account.');
            redirect('slogin/login');
        }
    }
    
    function create() {
        //var_dump($_POST);exit;
        if($this->session->userdata('isUserLoggedIn')){
            
        $data['title'] = 'Add Staff';
        $roles = $this->role_model->get();
        $data["roles"] = $roles;
        
        $genderList = $this->customlib->getGender();
        $data['genderList'] = $genderList;
        
//        $payscaleList = $this->staff_model->getPayroll();
//        $data["payscaleList"] = $payscaleList;
          
       $leavetypeList = $this->staff_model->getLeaveType();
       $data["leavetypeList"] = $leavetypeList;
        
      
        $designation = $this->staff_model->getStaffDesignation();
        $data["designation"] = $designation;
        
        $department = $this->staff_model->getDepartment();
        $data["department"] = $department;
        
        $marital_status = $this->marital_status;
        $data["marital_status"] = $marital_status;

       // $data["contract_type"] = $this->contract_type;
        
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('role', 'Role', 'trim|required');
        $this->form_validation->set_rules('gender', 'Gender', 'trim|required');
        $this->form_validation->set_rules('dob', 'Date of Birth', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|xss_clean', array(
          'valid_email' => 'Invalid Email',
        ));
        $this->form_validation->set_rules('email', 'Email', array('required', 'valid_email',array('check_exists', array($this->staff_model, 'valid_email_id')))
        );
             // $this->form_validation->set_rules('employee_id', 'Staff Id', 'callback_username_check');
 
        if ($this->form_validation->run() == FALSE) {

            $this->load->view('adminlogin/layout/header', $data);
            $this->load->view('adminlogin/staff/staffcreate', $data);
            $this->load->view('adminlogin/layout/footer', $data);
        } else {
           // var_dump($_POST);exit;
            $employee_id = $this->input->post("employee_id");
             $role = $this->input->post("role");
            $department = $this->input->post("department");
            $designation = $this->input->post("designation");
            $name = $this->input->post("name");
            $father_name = $this->input->post("father_name");
            $surname = $this->input->post("surname");
            $mother_name = $this->input->post("mother_name");
              $email = $this->input->post("email");
            $gender = $this->input->post("gender");
             $dob = $this->input->post("dob");
             $date_of_joining = $this->input->post("date_of_joining");
              $contact_no = $this->input->post("contactno");
            $emergency_no = $this->input->post("emergency_no");
            $marital_status = $this->input->post("marital_status");
            $address = $this->input->post("address");
            $permanent_address = $this->input->post("permanent_address");
            $qualification = $this->input->post("qualification");
            $work_exp = $this->input->post("work_exp");
              $note = $this->input->post("note");
               $account_title = $this->input->post("account_title");
            $bank_account_no = $this->input->post("bank_account_no");
            $bank_name = $this->input->post("bank_name");
            $ifsc_code = $this->input->post("ifsc_code");
            $bank_branch = $this->input->post("bank_branch_name");
          
             //$date_of_leaving = $this->input->post("date_of_leaving");
            $basic_salary = $this->input->post('basic_salary');
          //  $contract_type = $this->input->post("contract_type");
            $shift = $this->input->post("shift");
            $location = $this->input->post("location");
           // $leave = $this->input->post("leave");
          //  $facebook = $this->input->post("facebook");
          //  $twitter = $this->input->post("twitter");
          //  $linkedin = $this->input->post("linkedin");
          //  $instagram = $this->input->post("instagram");
            $epf_no = $this->input->post("epf_no");
            

            $password = $this->role->get_random_password($chars_min = 6, $chars_max = 6, $use_upper_case = false, $include_numbers = true, $include_special_chars = false);
           // var_dump($password);exit;
            $data_insert = array(
                'password' => $this->staff_model->passHashEnc($password),
                'employee_id' => $employee_id,
                'department' => $department,
                'designation' => $designation,
                'qualification' => $qualification,
                'work_exp' => $work_exp,
                'name' => $name,
                'contact_no' => $contact_no,
                'emergency_contact_no' => $emergency_no,
                'email' => $email,
                'dob' => $dob,
                'marital_status' => $marital_status,
                'date_of_leaving' => '',
                'local_address' => $address,
                'permanent_address' => $permanent_address,
                'note' => $note,
                'surname' => $surname,
                'mother_name' => $mother_name,
                'father_name' => $father_name,
                'gender' => $gender,
                'account_title' => $account_title,
                'bank_account_no' => $bank_account_no,
                'bank_name' => $bank_name,
                'ifsc_code' => $ifsc_code,
                'bank_branch' => $bank_branch,
                'payscale' => '',
                'basic_salary' => $basic_salary,
                'epf_no' => $epf_no,
               // 'contract_type' => $contract_type,
                'shift' => $shift,
                'location' => $location,
               // 'facebook' => $facebook,
               // 'twitter' => $twitter,
               // 'linkedin' => $linkedin,
              //  'instagram' => $instagram,
                'is_active' => 1
            );
            //var_dump($data_insert);exit;
            if($date_of_joining != ""){
            $data_insert['date_of_joining'] = $date_of_joining;
            }

            $leave_type = $this->input->post('leave_type');
            $leave_array = array();
            if(!empty($leave_array)){
            foreach ($leave_type as $leave_key => $leave_value) {
                $leave_array[] = array(
                    'staff_id' => 0,
                    'leave_type_id' => $leave_value,
                    'alloted_leave' => $this->input->post('alloted_leave_' . $leave_value)
                );
            }
            }
            $role_array = array('role_id' => $this->input->post('role'), 'staff_id' => 0);
            //var_dump($role_array);exit;
            $insert_id = $this->staff_model->batchInsert($data_insert, $role_array,$leave_array);
            $staff_id = $insert_id;

            if (isset($_FILES["file"]) && !empty($_FILES['file']['name'])) {
                $fileInfo = pathinfo($_FILES["file"]["name"]);
                //var_dump($fileInfo);exit;
                $img_name = $insert_id . '.' . $fileInfo['extension'];
                move_uploaded_file($_FILES["file"]["tmp_name"], "./uploads/staff_images/" . $img_name);
                $data_img = array('id' => $staff_id, 'image' => 'uploads/staff_images/' .$img_name);
                //var_dump($data_img);exit;
                $this->staff_model->add($data_img);
            }

            if (isset($_FILES["first_doc"]) && !empty($_FILES['first_doc']['name'])) {
                $uploaddir = './uploads/staff_documents/' . $staff_id . '/';
                if (!is_dir($uploaddir) && !mkdir($uploaddir)) {
                    die("Error creating folder $uploaddir");
                }
                $fileInfo = pathinfo($_FILES["first_doc"]["name"]);
                //var_dump($fileInfo);exit;
                $first_title = 'resume';
                $filename = "resume" . $staff_id . '.' . $fileInfo['extension'];
                $img_name = $uploaddir . $filename;
                $resume = 'uploads/staff_images/' .$filename ;
              //  var_dump($resume);exit;
                move_uploaded_file($_FILES["first_doc"]["tmp_name"], $img_name);
            } else {

                $resume = "";
            }

            if (isset($_FILES["second_doc"]) && !empty($_FILES['second_doc']['name'])) {
                $uploaddir = './uploads/staff_documents/' . $insert_id . '/';
                if (!is_dir($uploaddir) && !mkdir($uploaddir)) {
                    die("Error creating folder $uploaddir");
                }
                $fileInfo = pathinfo($_FILES["second_doc"]["name"]);
                $first_title = 'joining_letter';
                $filename = "joining_letter" . $staff_id . '.' . $fileInfo['extension'];
                $img_name = $uploaddir . $filename;
                $joining_letter = 'uploads/staff_images/' .$filename ;
                move_uploaded_file($_FILES["second_doc"]["tmp_name"], $img_name);
            } else {

                $joining_letter = "";
            }

            if (isset($_FILES["third_doc"]) && !empty($_FILES['third_doc']['name'])) {
                $uploaddir = './uploads/staff_documents/' . $insert_id . '/';
                if (!is_dir($uploaddir) && !mkdir($uploaddir)) {
                    die("Error creating folder $uploaddir");
                }
                $fileInfo = pathinfo($_FILES["third_doc"]["name"]);
                $first_title = 'resignation_letter';
                $filename = "resignation_letter" . $staff_id . '.' . $fileInfo['extension'];
                $img_name = $uploaddir . $filename;
                $resignation_letter = 'uploads/staff_images/' .$filename ;
                move_uploaded_file($_FILES["third_doc"]["tmp_name"], $img_name);
            } else {

                $resignation_letter = "";
            }
            if (isset($_FILES["fourth_doc"]) && !empty($_FILES['fourth_doc']['name'])) {
                $uploaddir = './uploads/staff_documents/' . $insert_id . '/';
                if (!is_dir($uploaddir) && !mkdir($uploaddir)) {
                    die("Error creating folder $uploaddir");
                }
                $fileInfo = pathinfo($_FILES["fourth_doc"]["name"]);
                $fourth_title = 'uploads/staff_images/' .'Other Doucment';
                $fourth_doc = "otherdocument" . $staff_id . '.' . $fileInfo['extension'];
                $img_name = $uploaddir . $fourth_doc;
                move_uploaded_file($_FILES["fourth_doc"]["tmp_name"], $img_name);
            } else {
                $fourth_title = "";
                $fourth_doc = "";
            }


            $data_doc = array('id' => $staff_id, 'resume' => $resume, 'joining_letter' => $joining_letter, 'resignation_letter' => $resignation_letter, 'other_document_name' => $fourth_title, 'other_document_file' => $fourth_doc);
            //var_dump($data_doc);exit;
            $this->staff_model->add($data_doc);
            if ($staff_id) {

                $teacher_login_detail = array('id' => $staff_id, 'credential_for' => 'staff', 'username' => $email, 'password' => $password, 'contact_no' => $contact_no, 'email' => $email);
                 
              // $this12= $this->mailsmsconf->mailsms('login_credential', $teacher_login_detail);
              // var_dump($this12);exit;
            }

            $this->session->set_flashdata('msg', '<div class="alert alert-success">Staff Added Successfully</div>');

            redirect('webadmin/staff');
        }
         }else{
            $this->session->set_userdata('msg', 'Your Session is destroy. Please login to your account.');
            redirect('slogin/login');
        }
        
    }
    public function username_check($str){
        if(empty($str)){
        $this->form_validation->set_message('username_check', 'Staff ID field is required');
        return false;
        }else{
          $result = $this->staff_model->valid_employee_id($str);
          if($result == false){            
            return false;
          }
            return true ;
        }
    }
    
    function profile($id) {
//        if (!$this->rbac->hasPrivilege('staff', 'can_view')) {
//            access_denied();
//        }

       // $this->load->model("staffattendancemodel");
        $this->load->model("setting_model");
        $data["id"] = $id;
        $data['title'] = 'Staff Details';
        $staff_info = $this->staff_model->getProfile($id);
       // var_dump($staff_info);exit;
        $userdata = $this->customlib->getUserData();
        $userid = $userdata['id'];
        $timeline_status = '';
        if ($userid == $id) {
            $timeline_status = 'yes';
        }
       // $timeline_list = $this->timeline_model->getStaffTimeline($id, $timeline_status);
       // $data["timeline_list"] = $timeline_list;
        $staff_payroll = $this->staff_model->getStaffPayroll($id);
        $staff_leaves = $this->leaverequest_model->staff_leave_request($id);
        $alloted_leavetype = $this->staff_model->allotedLeaveType($id);
        $this->load->model("payroll_model");
        $salary = $this->payroll_model->getSalaryDetails($id);
       // $attendencetypes = $this->staffattendancemodel->getStaffAttendanceType();
       // $data['attendencetypeslist'] = $attendencetypes;
        $i = 0;
        $leaveDetail = array();
        foreach ($alloted_leavetype as $key => $value) {
            $count_leaves[] = $this->leaverequest_model->countLeavesData($id, $value["leave_type_id"]);
            $leaveDetail[$i]['type'] = $value["type"];
            $leaveDetail[$i]['alloted_leave'] = $value["alloted_leave"];
            $leaveDetail[$i]['approve_leave'] = $count_leaves[$i]['approve_leave'];
            $i++;
        }
        $data["leavedetails"] = $leaveDetail;
        $data["staff_leaves"] = $staff_leaves;
        $data['staff_doc_id'] = $id;
        $data['staff'] = $staff_info;
        $data['staff_payroll'] = $staff_payroll;
        $data['salary'] = $salary;

        $monthlist = $this->customlib->getMonthDropdown();
        $data["monthlist"] = $monthlist;
        
        $startMonth = $this->setting_model->getStartMonth();
        
       // $data['yearlist'] = $this->staffattendancemodel->attendanceYearCount();
        
        $session_current = $this->setting_model->getCurrentSessionName();
        
        $startMonth = $this->setting_model->getStartMonth();
        
        $centenary = substr($session_current, 0, 2); //2017-18 to 2017
        $year_first_substring = substr($session_current, 2, 2); //2017-18 to 2017
        $year_second_substring = substr($session_current, 5, 2); //2017-18 to 18
        $month_number = date("m", strtotime($startMonth));

        // if ($month_number >= $startMonth && $month_number <= 12) {
        //     $year = $centenary . $year_first_substring;
        // } else {
        //     $year = $centenary . $year_second_substring;
        // }
//            $year = date("Y");
//
//        $j = 0;
//        for ($n = 1; $n <= 31; $n++) {
//
//            $att_date = sprintf("%02d", $n);
//
//            $attendence_array[] = $att_date;
//
//            foreach ($monthlist as $key => $value) {
//
//                $datemonth = date("m", strtotime($value));
//                $att_dates = $year . "-" . $datemonth . "-" . sprintf("%02d", $n);
//                $date_array[] = $att_dates;
//                $res[$att_dates] = $this->staffattendancemodel->searchStaffattendance($id, $att_dates);
//            }
//
//            $j++;
//        }

        $session = $this->setting_model->getCurrentSessionName();

        $session_start = explode("-", $session);
        $start_year = $session_start[0];

        $date = $start_year . "-" . $startMonth;
        $newdate = date("Y-m-d", strtotime($date . "+1 month"));

      //  $countAttendance = $this->countAttendance($start_year, $startMonth, $id);
       // $data["countAttendance"] = $countAttendance;

        //$data["resultlist"] = $res;
      //  $data["attendence_array"] = $attendence_array;
      //  $data["date_array"] = $date_array;
      //  $data["payroll_status"] = $this->payroll_status;
       // $data["payment_mode"] = $this->payment_mode;
       // $data["contract_type"] = $this->contract_type;
       // $data["status"] = $this->status;
        $roles = $this->role_model->get();
        $data["roles"] = $roles;

        $stafflist = $this->staff_model->get();
        $data['stafflist'] = $stafflist;

        $this->load->view('adminlogin/layout/header', $data);
        $this->load->view('adminlogin/staff/staffprofile', $data);
        $this->load->view('adminlogin/layout/footer', $data);
    }
    
    
    public function leaverequest() {
//        if (!$this->rbac->hasPrivilege('apply_leave', 'can_view')) {
//            access_denied();
//        }
        
         $userdata = $this->customlib->getUserData();
         $data["staff_id"] = $userdata["id"];
        // var_dump( $data["staff_id"]);exit;
        $leave_request = $this->leaverequest_model->user_leave_request($userdata["id"]);
        $data["leave_request"] = $leave_request;
       // var_dump($data["leave_request"]);exit;
        $data["staff_id"] = $userdata["id"];
        
        $LeaveTypes = $this->leaverequest_model->allotedLeaveType($userdata["id"]);
        $data["leavetype"] = $LeaveTypes;
       // var_dump($data["leavetype"]);exit;
        $staffRole = $this->staff_model->getStaffRole();
        $data["staffrole"] = $staffRole;
        $data["status"] = $this->status;

        $this->load->view("adminlogin/layout/header", $data);
        $this->load->view("adminlogin/staff/leaverequest", $data);
        $this->load->view("adminlogin/layout/footer", $data);
    }
    
    function edit($id) {
//        if (!$this->rbac->hasPrivilege('staff', 'can_edit')) {
//            access_denied();
//        }
          $a = 0 ;
          $sessionData = $this->session->userdata('admin');
          $userdata = $this->customlib->getUserData();
            
        $data['id'] = $id;
        $genderList = $this->customlib->getGender();
        $data['genderList'] = $genderList;
        
       
        
        $leavetypeList = $this->staff_model->getLeaveType();
        $data["leavetypeList"] = $leavetypeList;
        
        $payscaleList = $this->staff_model->getPayroll();
        $data["payscaleList"] = $payscaleList;
        
        $staffRole = $this->staff_model->getStaffRole();
        $data["getStaffRole"] = $staffRole;
        
        $designation = $this->staff_model->getStaffDesignation();
        $data["designation"] = $designation;
        
        $department = $this->staff_model->getDepartment();
        $data["department"] = $department;
        
        $marital_status = $this->marital_status;
        $data["marital_status"] = $marital_status;
        
        $staff = $this->staff_model->get($id);
        $data['staff'] = $staff;
        
      //  $data["contract_type"] = $this->contract_type;

             if($staff["role_id"] == 7){
                $a = 0;
                if($userdata["email"] == $staff["email"]){
                    $a = 1;    
                }
            }else{
                $a = 1 ;
            }

            if($a != 1){
                access_denied();

            }
        $staffLeaveDetails = $this->staff_model->getLeaveDetails($id);
        $data['staffLeaveDetails'] = $staffLeaveDetails;


        $resume = $this->input->post("resume");
        $joining_letter = $this->input->post("joining_letter");
        $resignation_letter = $this->input->post("resignation_letter");
        $other_document_name = $this->input->post("other_document_name");
        $other_document_file = $this->input->post("other_document_file");

        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('role', 'Role', 'trim|required');
        $this->form_validation->set_rules('gender', 'Gender', 'trim|required');
        $this->form_validation->set_rules('dob', 'Date of Birth', 'trim|required');
        //$this->form_validation->set_rules(
        //      'employee_id', 'Employee Id', array('required',
        //array('check_exists', array($this->staff_model, 'valid_employee_id'))
        //      )
        //);
        $this->form_validation->set_rules('employee_id', 'Staff Id', 'callback_username_check');
        $this->form_validation->set_rules('email', 'Email', array('required', 'valid_email',array('check_exists', array($this->staff_model, 'valid_email_id')))
        );
        if ($this->form_validation->run() == FALSE) {

            $this->load->view('adminlogin/layout/header', $data);
            $this->load->view('adminlogin/staff/staffedit', $data);
            $this->load->view('adminlogin/layout/footer', $data);
        } else {
           // var_dump($_POST);exit;
            $employee_id = $this->input->post("employee_id");
            $department = $this->input->post("department");
            $designation = $this->input->post("designation");
            $role = $this->input->post("role");
            $name = $this->input->post("name");
            $gender = $this->input->post("gender");
            $marital_status = $this->input->post("marital_status");
            $dob = $this->input->post("dob");
            $contact_no = $this->input->post("contactno");
            $emergency_no = $this->input->post("emergency_no");
            $email = $this->input->post("email");
            $date_of_joining = $this->input->post("date_of_joining");
//            $date_of_leaving = $this->input->post("date_of_leaving");
          
            $address = $this->input->post("address");
            $qualification = $this->input->post("qualification");
            $work_exp = $this->input->post("work_exp");

            $basic_salary = $this->input->post('basic_salary');
            $account_title = $this->input->post("account_title");
            $bank_account_no = $this->input->post("bank_account_no");
            $bank_name = $this->input->post("bank_name");
            $ifsc_code = $this->input->post("ifsc_code");
            $bank_branch = $this->input->post("bank_branch");
//            $contract_type = $this->input->post("contract_type");
            $shift = $this->input->post("shift");
            $location = $this->input->post("location");
//            $leave = $this->input->post("leave");
//            $facebook = $this->input->post("facebook");
//            $twitter = $this->input->post("twitter");
//            $linkedin = $this->input->post("linkedin");
//            $instagram = $this->input->post("instagram");
            $permanent_address = $this->input->post("permanent_address");
            $father_name = $this->input->post("father_name");
            $surname = $this->input->post("surname");
            $mother_name = $this->input->post("mother_name");
            $note = $this->input->post("note");
            $epf_no = $this->input->post("epf_no");


            $data1 = array('id' => $id,
                'employee_id' => $employee_id,
                'department' => $department,
                'designation' => $designation,
                'qualification' => $qualification,
                'work_exp' => $work_exp,
                'name' => $name,
                'contact_no' => $contact_no,
                'emergency_contact_no' => $emergency_no,
                'email' => $email,
                'dob' => $dob,
                'marital_status' => $marital_status,
          
           
                'local_address' => $address,
                'permanent_address' => $permanent_address,
                'note' => $note,
                'surname' => $surname,
                'mother_name' => $mother_name,
                'father_name' => $father_name,
                'gender' => $gender,
                'account_title' => $account_title,
                'bank_account_no' => $bank_account_no,
                'bank_name' => $bank_name,
                'ifsc_code' => $ifsc_code,
                'bank_branch' => $bank_branch,
                'payscale' => '',
                'basic_salary' => $basic_salary,
                'epf_no' => $epf_no,
              //  'contract_type' => $contract_type,
                'shift' => $shift,
                'location' => $location,
                
            );
          //  var_dump($data1);exit;
              if($date_of_joining != ""){
            $data1['date_of_joining'] = $date_of_joining;
            }else{
            $data1['date_of_joining'] = "";
            }

//             if($date_of_leaving != ""){
//            $data1['date_of_leaving'] = $date_of_leaving;
//            }else{
//               $data1['date_of_leaving'] = "";
//            }
            
            $insert_id = $this->staff_model->add($data1);

            $role_id = $this->input->post("role");

            $role_data = array('staff_id' => $id, 'role_id' => $role_id);

            $this->staff_model->update_role($role_data);

            $leave_type = $this->input->post("leave_type_id");

            $alloted_leave = $this->input->post("alloted_leave");
            $altid = $this->input->post("altid");
            if (!empty($leave_type)) {
                $i = 0;
              //  var_dump($leave_type);exit;
                foreach ($leave_type as $key => $value) {

                    if (!empty($altid[$i])) {

                        $data2 = array('staff_id' => $id,
                            'leave_type_id' => $leave_type[$i],
                            'id' => $altid[$i],
                            'alloted_leave' => $alloted_leave[$i],
                        );
                    } else {

                        $data2 = array('staff_id' => $id,
                            'leave_type_id' => $leave_type[$i],
                            'alloted_leave' => $alloted_leave[$i],
                        );
                    }

                    $this->staff_model->add_staff_leave_details($data2);
                    $i++;
                }
            }

            if (isset($_FILES["file"]) && !empty($_FILES['file']['name'])) {
                $fileInfo = pathinfo($_FILES["file"]["name"]);
                $img_name = $id . '.' . $fileInfo['extension'];
                move_uploaded_file($_FILES["file"]["tmp_name"], "./uploads/staff_images/" . $img_name);
                $data_img = array('id' => $id, 'image' => $img_name);
                $this->staff_model->add($data_img);
            }


            if (isset($_FILES["first_doc"]) && !empty($_FILES['first_doc']['name'])) {
                $uploaddir = './uploads/staff_documents/' . $id . '/';
                if (!is_dir($uploaddir) && !mkdir($uploaddir)) {
                    die("Error creating folder $uploaddir");
                }
                $fileInfo = pathinfo($_FILES["first_doc"]["name"]);
                $first_title = 'resume';
                $resume_doc = "resume" . $id . '.' . $fileInfo['extension'];
                $img_name = $uploaddir . $resume_doc;
                move_uploaded_file($_FILES["first_doc"]["tmp_name"], $img_name);
            } else {

                $resume_doc = $resume;
            }

            if (isset($_FILES["second_doc"]) && !empty($_FILES['second_doc']['name'])) {
                $uploaddir = './uploads/staff_documents/' . $id . '/';
                if (!is_dir($uploaddir) && !mkdir($uploaddir)) {
                    die("Error creating folder $uploaddir");
                }
                $fileInfo = pathinfo($_FILES["second_doc"]["name"]);
                $first_title = 'joining_letter';
                $joining_letter_doc = "joining_letter" . $id . '.' . $fileInfo['extension'];
                $img_name = $uploaddir . $joining_letter_doc;
                move_uploaded_file($_FILES["second_doc"]["tmp_name"], $img_name);
            } else {

                $joining_letter_doc = $joining_letter;
            }

            if (isset($_FILES["third_doc"]) && !empty($_FILES['third_doc']['name'])) {
                $uploaddir = './uploads/staff_documents/' . $id . '/';
                if (!is_dir($uploaddir) && !mkdir($uploaddir)) {
                    die("Error creating folder $uploaddir");
                }
                $fileInfo = pathinfo($_FILES["third_doc"]["name"]);
                $first_title = 'resignation_letter';
                $resignation_letter_doc = "resignation_letter" . $id . '.' . $fileInfo['extension'];
                $img_name = $uploaddir . $resignation_letter_doc;
                move_uploaded_file($_FILES["third_doc"]["tmp_name"], $img_name);
            } else {

                $resignation_letter_doc = $resignation_letter;
            }
            if (isset($_FILES["fourth_doc"]) && !empty($_FILES['fourth_doc']['name'])) {
                $uploaddir = './uploads/staff_documents/' . $id . '/';
                if (!is_dir($uploaddir) && !mkdir($uploaddir)) {
                    die("Error creating folder $uploaddir");
                }
                $fileInfo = pathinfo($_FILES["fourth_doc"]["name"]);
                $fourth_title = 'Other Doucment';
                $fourth_doc = "otherdocument" . $id . '.' . $fileInfo['extension'];
                $img_name = $uploaddir . $fourth_doc;
                move_uploaded_file($_FILES["fourth_doc"]["tmp_name"], $img_name);
            } else {
                $fourth_title = 'Other Document';
                $fourth_doc = $other_document_file;
            }

            $data_doc = array('id' => $id, 'resume' => $resume_doc, 'joining_letter' => $joining_letter_doc, 'resignation_letter' => $resignation_letter_doc, 'other_document_name' => $fourth_title, 'other_document_file' => $fourth_doc);

            $this->staff_model->add($data_doc);
            $this->session->set_flashdata('msg', '<div class="alert alert-success">Record Updated Successfully</div>');
            redirect('webadmin/staff/edit/' . $id);
        }
    }
    //leave request 
    function getEmployeeByRole() {

        $role = $this->input->post("role");
        $data = $this->staff_model->getEmployee($role);
        //var_dump($data);exit;
        echo json_encode($data);
    }

}