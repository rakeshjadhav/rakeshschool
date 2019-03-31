<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Student extends CI_Controller {

    function __construct() {
        parent::__construct();
        //$this->load->library('smsgateway');
//        $this->load->library('mailsmsconf');
       $this->load->helper('file');
       // $this->lang->load('message', 'english');
        $this->blood_group = $this->config->item('bloodgroup');
        $this->role;
    }
    
    function index() {
        if($this->session->userdata('isUserLoggedIn')){
        $data['title'] = 'Student List';
        $student_result = $this->student_model->get();
        $data['studentlist'] = $student_result;
        $this->load->view('adminlogin/layout/header', $data);
        $this->load->view('adminlogin/student/studentList', $data);
        $this->load->view('adminlogin/layout/footer', $data);
        }else{
            $this->session->set_userdata('msg', 'Your Session is destroy. Please login to your account.');
            redirect('site/login');
        }
    }
    
    
    function create() {
         if($this->session->userdata('isUserLoggedIn')){
        if (!$this->rbac->hasPrivilege('student', 'can_add')) {
            access_denied();
        }
        $data['title'] = 'Add Student';
        $data['title_list'] = 'Recently Added Student';
        
        $genderList = $this->customlib->getGender();
        $data['genderList'] = $genderList;

        $session = $this->setting_model->getCurrentSession();

        $student_result = $this->student_model->getRecentRecord();
        $data['studentlist'] = $student_result;

        $class = $this->class_model->get('', $classteacher = 'yes');
        $data['classlist'] = $class;
       
       // var_dump($data['classlist'] );exit;
        $category = $this->category_model->get();
        $data['categorylist'] = $category;
        //new
        $houses = $this->student_model->gethouselist();
        $data['houses'] = $houses;
         
        $data["bloodgroup"] = $this->blood_group;
        //$hostelList = $this->hostel_model->get();
       // $data['hostelList'] = $hostelList;
        
        $vehroute_result = $this->vehroute_model->get();
        $data['vehroutelist'] = $vehroute_result;
        
        $this->form_validation->set_rules('firstname', 'First Name', 'trim|required');
        $this->form_validation->set_rules('lastname', 'Last Name', 'trim|required');
        $this->form_validation->set_rules('gender', 'Gender', 'trim|required');
        $this->form_validation->set_rules('dob', 'Date of Birth', 'trim|required');
        $this->form_validation->set_rules('class_id', 'Class', 'trim|required');
        $this->form_validation->set_rules('section_id', 'Division', 'trim|required');
        $this->form_validation->set_rules('rte', 'RTE', 'trim|required');
        $this->form_validation->set_rules('guardian_name', 'Guardian Name', 'trim|required');

        $this->form_validation->set_rules('guardian_phone', 'Guardian Phone', 'trim|required');
        $this->form_validation->set_rules('admission_no', 'Admission No', 'trim|required|is_unique[students.admission_no]');
        $this->form_validation->set_rules('file', 'Image', 'callback_handle_upload');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('adminlogin/layout/header', $data);
            $this->load->view('adminlogin/student/studentCreate', $data);
            $this->load->view('adminlogin/layout/footer', $data);
        } else {
          //var_dump($_POST);exit;
            $class_id = $this->input->post('class_id');
            $section_id = $this->input->post('section_id');
//            var_dump($division_id);exit;
            $fees_discount = $this->input->post('fees_discount');
            $vehroute_id = $this->input->post('vehroute_id');
            if (empty($vehroute_id)) {
                $vehroute_id = 0;
            }
            $data = array(
                'admission_no' => $this->input->post('admission_no'),
                'roll_no' => $this->input->post('roll_no'),
                'admission_date' => $this->input->post('admission_date'),
                'firstname' => $this->input->post('firstname'),
                'lastname' => $this->input->post('lastname'),
                'mobileno' => $this->input->post('mobileno'),
                'rte' => $this->input->post('rte'),
                'email' => $this->input->post('email'),
                'state' => $this->input->post('state'),
                'city' => $this->input->post('city'),
                'guardian_is' => $this->input->post('guardian_is'),
                'pincode' => $this->input->post('pincode'),
                'religion' => $this->input->post('religion'),
                'cast' => $this->input->post('cast'),
                'previous_school' => $this->input->post('previous_school'),
                'dob' => $this->input->post('dob'),
                'current_address' => $this->input->post('current_address'),
                'permanent_address' => $this->input->post('permanent_address'),
                'image' => 'uploads/student_images/no_image.png',
                'category_id' => $this->input->post('category_id'),
                'adhar_no' => $this->input->post('adhar_no'),
                'samagra_id' => $this->input->post('samagra_id'),
                'bank_account_no' => $this->input->post('bank_account_no'),
                'bank_name' => $this->input->post('bank_name'),
                'ifsc_code' => $this->input->post('ifsc_code'),
                'father_name' => $this->input->post('father_name'),
                'father_phone' => $this->input->post('father_phone'),
                'father_occupation' => $this->input->post('father_occupation'),
                'mother_name' => $this->input->post('mother_name'),
                'mother_phone' => $this->input->post('mother_phone'),
                'mother_occupation' => $this->input->post('mother_occupation'),
                'guardian_occupation' => $this->input->post('guardian_occupation'),
                'guardian_email' => $this->input->post('guardian_email'),
                'gender' => $this->input->post('gender'),
                'guardian_name' => $this->input->post('guardian_name'),
                'guardian_relation' => $this->input->post('guardian_relation'),
                'guardian_phone' => $this->input->post('guardian_phone'),
                'guardian_address' => $this->input->post('guardian_address'),
                'vehroute_id' => $vehroute_id,
               // 'school_house_id' => $this->input->post('house'),
                'blood_group' => $this->input->post('blood_group'),
               // 'height' => $this->input->post('height'),
              //  'weight' => $this->input->post('weight'),
              //  'note' => $this->input->post('note'),
                'is_active' => 'yes',
               // 'measurement_date' => $this->input->post('measure_date'),
            );
            //var_dump($data);exit;
            $insert_id = $this->student_model->add($data);
            $data_new = array(
                'student_id' => $insert_id,
                'class_id' => $class_id,
                'division_id' => $section_id,
                'session_id' => $session,
                'vehroute_id' => $vehroute_id,
                'fees_discount' => $fees_discount
            );
           //var_dump($data_new);exit;
            $this->student_model->add_student_session($data_new);
           
            $user_password = $this->role->get_random_password($chars_min = 6, $chars_max = 6, $use_upper_case = false, $include_numbers = true, $include_special_chars = false);
           
            $sibling_id = $this->input->post('sibling_id');
           // var_dump($sibling_id);exit;
            $data_student_login = array(
                'username' => $this->student_login_prefix . $insert_id,
                'password' => $user_password,
                'user_id' => $insert_id,
                'role' => 'student'
            );
           //var_dump($data_student_login);exit;
           $this->user_model->add($data_student_login);
           //var_dump($sibling_id);exit;
           if ($sibling_id > 0) {  
              // echo "1";exit;
               $student_sibling = $this->student_model->get($sibling_id);
               //var_dump($student_sibling);exit;
                $update_student = array(
                    'id' => $insert_id,
                    'parent_id' => $student_sibling['parent_id'],
                );
                $student_sibling = $this->student_model->add($update_student);
                
                } else {
                   // echo "2";exit;
                    $parent_password = $this->role->get_random_password($chars_min = 6, $chars_max = 6, $use_upper_case = false, $include_numbers = true, $include_special_chars = false);
                    //var_dump($parent_password);exit;
                    $temp = $insert_id;
                    $data_parent_login = array(
                        'username' => $this->parent_login_prefix . $insert_id,
                        'password' => $parent_password,
                        'user_id' => 0,
                        'role' => 'parent',
                        'childs' => $temp
                    );
                   // var_dump($data_parent_login);exit;
                    $ins_id = $this->user_model->add($data_parent_login);
                    $update_student = array(
                    'id' => $insert_id,
                    'parent_id' => $ins_id
                );
                $this->student_model->add($update_student);
                }
          //  }
           // echo "3";exit;
            if (isset($_FILES["file"]) && !empty($_FILES['file']['name'])) {
                $fileInfo = pathinfo($_FILES["file"]["name"]);
                $img_name = $insert_id . '.' . $fileInfo['extension'];
                move_uploaded_file($_FILES["file"]["tmp_name"], "./uploads/student_images/" . $img_name);
                $data_img = array('id' => $insert_id, 'image' => 'uploads/student_images/' . $img_name);
                $this->student_model->add($data_img);
            }
            //gardin pics
            if (isset($_FILES["father_pic"]) && !empty($_FILES['father_pic']['name'])) {
                $fileInfo = pathinfo($_FILES["father_pic"]["name"]);
                $img_name = $insert_id . "father" . '.' . $fileInfo['extension'];
                move_uploaded_file($_FILES["father_pic"]["tmp_name"], "./uploads/student_images/" . $img_name);
                $data_img = array('id' => $insert_id, 'father_pic' => 'uploads/student_images/' . $img_name);
                $this->student_model->add($data_img);
            }
            if (isset($_FILES["mother_pic"]) && !empty($_FILES['mother_pic']['name'])) {
                $fileInfo = pathinfo($_FILES["mother_pic"]["name"]);
                $img_name = $insert_id . "mother" . '.' . $fileInfo['extension'];
                move_uploaded_file($_FILES["mother_pic"]["tmp_name"], "./uploads/student_images/" . $img_name);
                $data_img = array('id' => $insert_id, 'mother_pic' => 'uploads/student_images/' . $img_name);
                $this->student_model->add($data_img);
            }

            if (isset($_FILES["guardian_pic"]) && !empty($_FILES['guardian_pic']['name'])) {
                $fileInfo = pathinfo($_FILES["guardian_pic"]["name"]);
                $img_name = $insert_id . "guardian" . '.' . $fileInfo['extension'];
                move_uploaded_file($_FILES["guardian_pic"]["tmp_name"], "./uploads/student_images/" . $img_name);
                $data_img = array('id' => $insert_id, 'guardian_pic' => 'uploads/student_images/' . $img_name);
                $this->student_model->add($data_img);
            }

            
            if (isset($_FILES["first_doc"]) && !empty($_FILES['first_doc']['name'])) {
                $uploaddir = './uploads/student_documents/' . $insert_id . '/';
                if (!is_dir($uploaddir) && !mkdir($uploaddir)) {
                    die("Error creating folder $uploaddir");
                }
                $fileInfo = pathinfo($_FILES["first_doc"]["name"]);
                $first_title = $this->input->post('first_title');
                $file_name = $_FILES['first_doc']['name'];
                $exp = explode(' ', $file_name);
                $imp = implode('_',$exp);
                $img_name = $uploaddir .$imp;
                move_uploaded_file($_FILES["first_doc"]["tmp_name"], $img_name);
                $data_img = array('student_id' => $insert_id, 'title' => $first_title, 'doc' =>$imp);
                $this->student_model->adddoc($data_img);
            }
            
            if (isset($_FILES["second_doc"]) && !empty($_FILES['second_doc']['name'])) {
                $uploaddir = './uploads/student_documents/' . $insert_id . '/';
                if (!is_dir($uploaddir) && !mkdir($uploaddir)) {
                    die("Error creating folder $uploaddir");
                }
                $fileInfo = pathinfo($_FILES["second_doc"]["name"]);
                $second_title = $this->input->post('second_title');
                $file_name = $_FILES['second_doc']['name'];
                $exp = explode(' ', $file_name);
                $imp = implode('_',$exp);
                $img_name = $uploaddir .$imp;
                move_uploaded_file($_FILES["second_doc"]["tmp_name"], $img_name);
                $data_img = array('student_id' => $insert_id, 'title' => $second_title, 'doc' =>$imp);
                $this->student_model->adddoc($data_img);
            }
            
            if (isset($_FILES["third_doc"]) && !empty($_FILES['third_doc']['name'])) {
                $uploaddir = './uploads/student_documents/' . $insert_id . '/';
                if (!is_dir($uploaddir) && !mkdir($uploaddir)) {
                    die("Error creating folder $uploaddir");
                }
                $fileInfo = pathinfo($_FILES["third_doc"]["name"]);
                $third_title = $this->input->post('second_title');
                $file_name = $_FILES['third_doc']['name'];
                $exp = explode(' ', $file_name);
                 $imp = implode('_',$exp);
                $img_name = $uploaddir .$imp;
                move_uploaded_file($_FILES["third_doc"]["tmp_name"], $img_name);
                $data_img = array('student_id' => $insert_id, 'title' => $third_title, 'doc' =>$imp);
                $this->student_model->adddoc($data_img);
            }
            
            if (isset($_FILES["fourth_doc"]) && !empty($_FILES['fourth_doc']['name'])) {
                $uploaddir = './uploads/student_documents/' . $insert_id . '/';
                if (!is_dir($uploaddir) && !mkdir($uploaddir)) {
                    die("Error creating folder $uploaddir");
                }
                $fileInfo = pathinfo($_FILES["fourth_doc"]["name"]);
                $fourth_title = $this->input->post('fourth_title');
                $file_name = $_FILES['fourth_doc']['name'];
                $exp = explode(' ', $file_name);
                $imp = implode('_',$exp);
                $img_name = $uploaddir .$imp;
                move_uploaded_file($_FILES["fourth_doc"]["tmp_name"], $img_name);
                $data_img = array('student_id' => $insert_id, 'title' => $fourth_title, 'doc' =>$imp);
                $this->student_model->adddoc($data_img);
            }
            
            if (isset($_FILES["fifth_doc"]) && !empty($_FILES['fifth_doc']['name'])) {
                $uploaddir = './uploads/student_documents/' . $insert_id . '/';
                if (!is_dir($uploaddir) && !mkdir($uploaddir)) {
                    die("Error creating folder $uploaddir");
                }
                $fileInfo = pathinfo($_FILES["fifth_doc"]["name"]);
                $fifth_title = $this->input->post('fifth_title');
                $file_name = $_FILES['fifth_doc']['name'];
                 $exp = explode(' ', $file_name);
                $imp = implode('_',$exp);
                $img_name = $uploaddir .$imp;
                move_uploaded_file($_FILES["fifth_doc"]["tmp_name"], $img_name);
                $data_img = array('student_id' => $insert_id, 'title' => $fifth_title, 'doc' =>$imp);
                $this->student_model->adddoc($data_img);
            }


          //  $sender_details = array('student_id' => $insert_id, 'contact_no' => $this->input->post('guardian_phone'), 'email' => $this->input->post('guardian_email'));
            //email confi
           // $this->mailsmsconf->mailsms('student_admission', $sender_details);

            //email confi
           // $student_login_detail = array('id' => $insert_id, 'credential_for' => 'student', 'username' => $this->student_login_prefix . $insert_id, 'password' => $user_password, 'contact_no' => $this->input->post('mobileno'), 'email' => $this->input->post('email'));

            //$parent_login_detail = array('id' => $insert_id, 'credential_for' => 'parent', 'username' => $this->parent_login_prefix . $insert_id, 'password' => $parent_password, 'contact_no' => $this->input->post('guardian_phone'), 'email' => $this->input->post('guardian_email'));

            //$this->mailsmsconf->mailsms('login_credential', $student_login_detail);
           // $this->mailsmsconf->mailsms('login_credential', $parent_login_detail);
if ($sibling_id > 0) {
} else {
              //  $parent_login_detail = array('id' => $insert_id, 'credential_for' => 'parent', 'username' => $this->parent_login_prefix . $insert_id, 'password' => $parent_password, 'contact_no' => $this->input->post('guardian_phone'), 'email' => $this->input->post('guardian_email'));
              //  $this->mailsmsconf->mailsms('login_credential', $parent_login_detail);
            }
//}
            $this->session->set_flashdata('msg', '<div class="alert alert-success">Student added Successfully</div>');
            redirect('webadmin/student/create');
        }
        }else{
            $this->session->set_userdata('msg', 'Your Session is destroy. Please login to your account.');
            redirect('site/login');
        }
        
        
    }
    
    function handle_upload() {
        if (isset($_FILES["file"]) && !empty($_FILES['file']['name'])) {
            $allowedExts = array('jpg', 'jpeg', 'png');
            $temp = explode(".", $_FILES["file"]["name"]);
            $extension = end($temp);
            if ($_FILES["file"]["error"] > 0) {
                $error .= "Error opening the file<br />";
            }
            if ($_FILES["file"]["type"] != 'image/gif' &&
                    $_FILES["file"]["type"] != 'image/jpeg' &&
                    $_FILES["file"]["type"] != 'image/png') {
                $this->form_validation->set_message('handle_upload', 'File type not allowed');
                return false;
            }
            if (!in_array($extension, $allowedExts)) {
                $this->form_validation->set_message('handle_upload', 'Extension not allowed');
                return false;
            }
            if ($_FILES["file"]["size"] > 102400) {
                $this->form_validation->set_message('handle_upload', 'File size shoud be less than 100 kB');
                return false;
            }
            return true;
        } else {
            return true;
        }
    }
    
     function view($id) {
         if($this->session->userdata('isUserLoggedIn')){
        $data['title'] = 'Student Details';
        
        $student = $this->student_model->get($id);
       $gradeList = $this->grade_model->get();
        
        $student_session_id = $student['student_session_id'];
        $student_due_fee = $this->studentfeemaster_model->getStudentFees($student_session_id);
        $student_discount_fee = $this->feediscount_model->getStudentFeesDiscount($student_session_id);
       $data['student_discount_fee'] = $student_discount_fee;
        $data['student_due_fee'] = $student_due_fee;

        $examList = $this->examschedule_model->getExamByClassandSection($student['class_id'], $student['division_id']);

        $data['examSchedule'] = array();
        if (!empty($examList)) {
            $new_array = array();
            foreach ($examList as $ex_key => $ex_value) {
                $array = array();
                $x = array();
                $exam_id = $ex_value['exam_id'];
                $student['id'];
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
        $student_doc = $this->student_model->getstudentdoc($id);
        $data['student_doc'] = $student_doc;
        $data['student_doc_id'] = $id;
        $category_list = $this->category_model->get();
        $data['category_list'] = $category_list;
        $data['gradeList'] = $gradeList;
        $data['student'] = $student;
        $this->load->view('adminlogin/layout/header', $data);
        $this->load->view('adminlogin/student/studentShow', $data);
        $this->load->view('adminlogin/layout/footer', $data);
        }else{
            $this->session->set_userdata('msg', 'Your Session is destroy. Please login to your account.');
            redirect('site/login');
        }
    }
    
      function getlogindetail() {
        $student_id = $this->input->post('student_id');
        $examSchedule = $this->user_model->getLoginDetails($student_id);
        echo json_encode($examSchedule);
    }
    //student show //documents 
     public function download($student_id, $doc) {
//         var_dump($student_id);exit;
          if($this->session->userdata('isUserLoggedIn')){
        $this->load->helper('download');
        $filepath = "./uploads/student_documents/$student_id/".$doc;
//        var_dump($filepath);exit;
        $data = file_get_contents($filepath);
        $name = $doc;
        force_download($name, $data);
        }else{
            $this->session->set_userdata('msg', 'Your Session is destroy. Please login to your account.');
            redirect('site/login');
        }
    }
    
    
    //cerate new doc in show student view
    function create_doc() {
        //var_dump($_POST);exit;
         if($this->session->userdata('isUserLoggedIn')){
        $student_id = $this->input->post('student_id');
        
        if (isset($_FILES["first_doc"]) && !empty($_FILES['first_doc']['name'])) {
            $uploaddir = './uploads/student_documents/' . $student_id . '/';
            if (!is_dir($uploaddir) && !mkdir($uploaddir)) {
                die("Error creating folder $uploaddir");
            }
            $fileInfo = pathinfo($_FILES["first_doc"]["name"]);
            $first_title = $this->input->post('first_title');
            $img_name = $uploaddir . basename($_FILES['first_doc']['name']);
            move_uploaded_file($_FILES["first_doc"]["tmp_name"], $img_name);
            $data_img = array('student_id' => $student_id, 'title' => $first_title, 'doc' => basename($_FILES['first_doc']['name']));
            $this->student_model->adddoc($data_img);
        }
        redirect('webadmin/student/view/' . $student_id);
        }else{
            $this->session->set_userdata('msg', 'Your Session is destroy. Please login to your account.');
            redirect('site/login');
        }
    }
    //delete studnt view delete documents
     function doc_delete($id, $student_id) {
        $this->student_model->doc_delete($id);
        $this->session->set_flashdata('msg', '<i class="fa fa-check-square-o" aria-hidden="true"></i> Document Deleted Successfully');
        redirect('webadmin/student/view/' . $student_id);
    }
    
    //import csv file
    
    function import() {
         if($this->session->userdata('isUserLoggedIn')){
        $data['title'] = 'Import Student';
        $data['title_list'] = 'Recently Added Student';
        
        $session = $this->setting_model->getCurrentSession();
        
        $class = $this->class_model->get();
        $data['classlist'] = $class;
        $category = $this->category_model->get();
        $data['categorylist'] = $category;
        
        $this->form_validation->set_rules('class_id', 'Class', 'trim|required');
        $this->form_validation->set_rules('section_id', 'Section', 'trim|required');
        $this->form_validation->set_rules('file', 'Image', 'callback_handle_csv_upload');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('adminlogin/layout/header', $data);
            $this->load->view('adminlogin/student/import', $data);
            $this->load->view('adminlogin/layout/footer', $data);
        } else {
//            var_dump($_POST);exit;
            $class_id = $this->input->post('class_id');
            $section_id = $this->input->post('section_id');
            
            $session = $this->setting_model->getCurrentSession();
            
            if (isset($_FILES["file"]) && !empty($_FILES['file']['name'])) {
              //  echo"hooo";exit;
                $file = $_FILES['file']['tmp_name'];
//                var_dump($file);exit;
                $this->load->library('CSVReader');
                $result = $this->csvreader->parse_file($file);
//                var_dump($result);exit;
                for ($i = 1; $i <= count($result); $i++) {
                    $insert_id = $this->student_model->add($result[$i]);
                    $data_new = array(
                        'student_id' => $insert_id,
                        'class_id' => $class_id,
                        'division_id' => $section_id,
                        'session_id' => $session
                    );
//                    var_dump($data_new);exit;
                    $this->student_model->add_student_session($data_new);
                    $user_password = $this->role->get_random_password($chars_min = 6, $chars_max = 6, $use_upper_case = false, $include_numbers = true, $include_special_chars = false);
                    $sibling_id = $this->input->post('sibling_id');
                    $data_student_login = array(
                        'username' => $this->student_login_prefix . $insert_id,
                        'password' => $user_password,
                        'user_id' => $insert_id,
                        'role' => 'student'
                    );
                    $this->user_model->add($data_student_login);
                    $parent_password = $this->role->get_random_password($chars_min = 6, $chars_max = 6, $use_upper_case = false, $include_numbers = true, $include_special_chars = false);
                    $temp = $insert_id;
                    $data_parent_login = array(
                        'username' => $this->parent_login_prefix . $insert_id,
                        'password' => $parent_password,
                        'user_id' => $insert_id,
                        'role' => 'parent',
                        'childs' => $temp
                    );
                    $ins_id = $this->user_model->add($data_parent_login);
                }
                $data['csvData'] = $result;
            }
            $this->session->set_flashdata('msg', '<div student="alert alert-success text-center">Students imported successfully</div>');
            redirect('webadmin/student/search');
        }
        }else{
            $this->session->set_userdata('msg', 'Your Session is destroy. Please login to your account.');
            redirect('site/login');
        }
    }
    
    //handel csv file 
    
    function handle_csv_upload() {
        $error = "";
        if (isset($_FILES["file"]) && !empty($_FILES['file']['name'])) {
            $allowedExts = array('csv');
            $mimes = array('text/csv',
                'text/plain',
                'application/csv',
                'text/comma-separated-values',
                'application/excel',
                'application/vnd.ms-excel',
                'application/vnd.msexcel',
                'text/anytext',
                'application/octet-stream',
                'application/txt');
            $temp = explode(".", $_FILES["file"]["name"]);
            $extension = end($temp);
            if ($_FILES["file"]["error"] > 0) {
                $error .= "Error opening the file<br />";
            }
            if (!in_array($_FILES['file']['type'], $mimes)) {
                $error .= "Error opening the file<br />";
                $this->form_validation->set_message('handle_csv_upload', 'File type not allowed');
                return false;
            }
            if (!in_array($extension, $allowedExts)) {
                $error .= "Error opening the file<br />";
                $this->form_validation->set_message('handle_csv_upload', 'Extension not allowed');
                return false;
            }
            if ($error == "") {
                return true;
            }
        } else {
            $this->form_validation->set_message('handle_csv_upload', 'Please Select file');
            return false;
        }
    }
    
    function search() {
         if($this->session->userdata('isUserLoggedIn')){
        $data['title'] = 'Student Search';
        
        $class = $this->class_model->get();
        $data['classlist'] = $class;
        
        $button = $this->input->post('search');
        if ($this->input->server('REQUEST_METHOD') == "GET") {
            $this->load->view('adminlogin/layout/header', $data);
            $this->load->view('adminlogin/student/studentSearch', $data);
            $this->load->view('adminlogin/layout/footer', $data);
        } else {
           // var_dump($_POST);exit;
            $class = $this->input->post('class_id');
            $division = $this->input->post('section_id');
            $search = $this->input->post('search');
            $search_text = $this->input->post('search_text');
            
            if (isset($search)) {
                if ($search == 'search_filter') {
                    $this->form_validation->set_rules('class_id', 'Class', 'trim|required');
                    if ($this->form_validation->run() == FALSE) {
                        
                    } else {
                        $data['searchby'] = "filter";
                        $data['class_id'] = $this->input->post('class_id');
                        $data['division_id'] = $this->input->post('section_id');
                    
                        $data['search_text'] = $this->input->post('search_text');
                        
                        $resultlist = $this->student_model->searchByClassSection($class, $division);
                        
                        $data['resultlist'] = $resultlist;
                        $title=$this->classsdivision_model->getDetailbyClassSection($data['class_id'], $data['division_id']);
                        
                        $data['title'] = 'Student Details for '.$title['class']."(".$title['division'].")";
                    }
                } else if ($search == 'search_full') {
                    $data['searchby'] = "text";
                   
                    $data['search_text'] = trim($this->input->post('search_text'));
                    $resultlist = $this->student_model->searchFullText($search_text);
                    $data['resultlist'] = $resultlist;
                    $data['title'] = 'Search Details: '.$data['search_text'];
                }
            }
            $this->load->view('adminlogin/layout/header', $data);
            $this->load->view('adminlogin/student/studentSearch', $data);
            $this->load->view('adminlogin/layout/footer', $data);
            
        }
        }else{
            $this->session->set_userdata('msg', 'Your Session is destroy. Please login to your account.');
            redirect('site/login');
        }
    }
    
    function edit($id) {
         if($this->session->userdata('isUserLoggedIn')){
        $data['title'] = 'Edit Student';
        $data['id'] = $id;
        
        $student = $this->student_model->get($id);
        $genderList = $this->customlib->getGender();
        $data['student'] = $student;
        $data['genderList'] = $genderList;
        
        $session = $this->setting_model->getCurrentSession();
        
        $vehroute_result = $this->vehroute_model->get();
        $data['vehroutelist'] = $vehroute_result;
        
        $class = $this->class_model->get();
        $data['classlist'] = $class;
        
        $category = $this->category_model->get();
        $data['categorylist'] = $category;
        
        $this->form_validation->set_rules('firstname', 'First Name', 'trim|required');
        $this->form_validation->set_rules('lastname', 'Last Name', 'trim|required');
        $this->form_validation->set_rules('dob', 'Date of Birth', 'trim|required');
        $this->form_validation->set_rules('class_id', 'Class', 'trim|required');
        $this->form_validation->set_rules('section_id', 'Section', 'trim|required');
        $this->form_validation->set_rules('gender', 'Gender', 'trim|required');
        $this->form_validation->set_rules('guardian_name', 'Guardian Name', 'trim|required');
        $this->form_validation->set_rules('rte', 'RTE', 'trim|required');

        $this->form_validation->set_rules('guardian_phone', 'Guardian Phone', 'trim|required');
        $this->form_validation->set_rules('file', 'Image', 'callback_handle_upload');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('adminlogin/layout/header', $data);
            $this->load->view('adminlogin/student/studentEdit', $data);
            $this->load->view('adminlogin/layout/footer', $data);
        } else {
//            var_dump($_POST);exit;
            $class_id = $this->input->post('class_id');
            $section_id = $this->input->post('section_id');

            $fees_discount = $this->input->post('fees_discount');
            $vehroute_id = $this->input->post('vehroute_id');
            $data = array(
                'id' => $id,
                'admission_no' => $this->input->post('admission_no'),
                'roll_no' => $this->input->post('roll_no'),
                'admission_date' => $this->input->post('admission_date'),
                'firstname' => $this->input->post('firstname'),
                'lastname' => $this->input->post('lastname'),
                'rte' => $this->input->post('rte'),
                'mobileno' => $this->input->post('mobileno'),
                'email' => $this->input->post('email'),
                'state' => $this->input->post('state'),
                'city' => $this->input->post('city'),
                'previous_school' => $this->input->post('previous_school'),
                'guardian_is' => $this->input->post('guardian_is'),
                'pincode' => $this->input->post('pincode'),
                'religion' => $this->input->post('religion'),
                'dob' => $this->input->post('dob'),
                'current_address' => $this->input->post('current_address'),
                'permanent_address' => $this->input->post('permanent_address'),
                'category_id' => $this->input->post('category_id'),
                'adhar_no' => $this->input->post('adhar_no'),
                'samagra_id' => $this->input->post('samagra_id'),
                'bank_account_no' => $this->input->post('bank_account_no'),
                'bank_name' => $this->input->post('bank_name'),
                'ifsc_code' => $this->input->post('ifsc_code'),
                'cast' => $this->input->post('cast'),
                'father_name' => $this->input->post('father_name'),
                'father_phone' => $this->input->post('father_phone'),
                'father_occupation' => $this->input->post('father_occupation'),
                'mother_name' => $this->input->post('mother_name'),
                'mother_phone' => $this->input->post('mother_phone'),
                'mother_occupation' => $this->input->post('mother_occupation'),
                'guardian_occupation' => $this->input->post('guardian_occupation'),
                'guardian_email' => $this->input->post('guardian_email'),
                'gender' => $this->input->post('gender'),
                'guardian_name' => $this->input->post('guardian_name'),
                'guardian_relation' => $this->input->post('guardian_relation'),
                'guardian_phone' => $this->input->post('guardian_phone'),
                'guardian_address' => $this->input->post('guardian_address'),
            );
            
            $this->student_model->add($data);
            $data_new = array(
                'student_id' => $id,
                'class_id' => $class_id,
                'division_id' => $section_id,
                'session_id' => $session,
                'vehroute_id' => $vehroute_id,
                'fees_discount' => $fees_discount
            );
            $insert_id = $this->student_model->add_student_session($data_new);
           
            
            if (isset($_FILES["file"]) && !empty($_FILES['file']['name'])) {
                $fileInfo = pathinfo($_FILES["file"]["name"]);
                $img_name = $id . '.' . $fileInfo['extension'];
                move_uploaded_file($_FILES["file"]["tmp_name"], "./uploads/student_images/" . $img_name);
                $data_img = array('id' => $id, 'image' => 'uploads/student_images/' . $img_name);
                $this->student_model->add($data_img);
            }
            $this->session->set_flashdata('msg', '<div student="alert alert-success text-left">Student Record Updated successfully</div>');
            redirect('webadmin/student/search');
        }
        }else{
            $this->session->set_userdata('msg', 'Your Session is destroy. Please login to your account.');
            redirect('site/login');
        }
    }
    
     function getStudentRecordByID() {
         if($this->session->userdata('isUserLoggedIn')){
         $student_id = $this->input->get('student_id');
        $resultlist = $this->student_model->get($student_id);
        echo json_encode($resultlist);
        }else{
            $this->session->set_userdata('msg', 'Your Session is destroy. Please login to your account.');
            redirect('site/login');
        }
    }

     function getByClassAndSection() {
        $class = $this->input->get('class_id');
        $section = $this->input->get('section_id');
        $resultlist = $this->student_model->searchByClassSection($class, $section);
        echo json_encode($resultlist);
    }
    
    function studentreport() {
        if (!$this->rbac->hasPrivilege('student_report', 'can_view')) {
            access_denied();
        }

        $data['title'] = 'student Report';
        $genderList = $this->customlib->getGender();
        $data['genderList'] = $genderList;
        $RTEstatusList = $this->customlib->getRteStatus();
        $data['RTEstatusList'] = $RTEstatusList;
        $class = $this->class_model->get();
        $data['classlist'] = $class;

        $userdata = $this->customlib->getUserData();
        $carray = array();      
        if (!empty($data["classlist"])) {
            foreach ($data["classlist"] as $ckey => $cvalue) {

                $carray[] = $cvalue["id"];
            }
        }
        
        $category = $this->category_model->get();
        $data['categorylist'] = $category;
        if ($this->input->server('REQUEST_METHOD') == "GET") {
            $this->load->view('adminlogin/layout/header', $data);
            $this->load->view('adminlogin/student/studentReport', $data);
            $this->load->view('adminlogin/layout/footer', $data);
        } else {
            $this->form_validation->set_rules('class_id', 'Class', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
               $this->load->view('adminlogin/layout/header', $data);
            $this->load->view('adminlogin/student/studentReport', $data);
            $this->load->view('adminlogin/layout/footer', $data);
            } else {
                $class = $this->input->post('class_id');
                $section = $this->input->post('section_id');
                $category_id = $this->input->post('category_id');
                $gender = $this->input->post('gender');
                $rte = $this->input->post('rte');
                $search = $this->input->post('search');
                if (isset($search)) {
                    if ($search == 'search_filter') {
                        $resultlist = $this->student_model->searchByClassSectionCategoryGenderRte($class, $section, $category_id, $gender, $rte);
                        $data['resultlist'] = $resultlist;
                    }
                    $data['class_id'] = $class;
                    $data['section_id'] = $section;
                    $data['category_id'] = $category_id;
                    $data['gender'] = $gender;
                    $data['rte_status'] = $rte;
            $this->load->view('adminlogin/layout/header', $data);
            $this->load->view('adminlogin/student/studentReport', $data);
            $this->load->view('adminlogin/layout/footer', $data);
                }
            }
        }
    }
    
    function guardianreport() {
        if (!$this->rbac->hasPrivilege('guardian_report', 'can_view')) {
            access_denied();
        }

     
        $data['title'] = 'Student Guardian Report';
        $class = $this->class_model->get();
        $data['classlist'] = $class;
        $userdata = $this->customlib->getUserData();
        $carray = array();

        if (!empty($data["classlist"])) {
            foreach ($data["classlist"] as $ckey => $cvalue) {

                $carray[] = $cvalue["id"];
            }
        }
        
        $class_id = $this->input->post("class_id");
        $section_id = $this->input->post("section_id");

        $this->form_validation->set_rules('class_id', 'Class', 'trim|required');
        $this->form_validation->set_rules('section_id', 'Section', 'trim|required');

        if ($this->form_validation->run() == FALSE) {

            $resultlist = $this->student_model->studentGuardianDetails($carray);
            $data["resultlist"] = $resultlist;
        } else {


            $resultlist = $this->student_model->searchGuardianDetails($class_id, $section_id);
            $data["resultlist"] = $resultlist;
        }

        $this->load->view("adminlogin/layout/header", $data);
        $this->load->view("adminlogin/student/guardianReport", $data);
        $this->load->view("adminlogin/layout/footer", $data);
    }
    
    public function disablestudentslist() {
   
        $class = $this->class_model->get();
        $data['classlist'] = $class;
        $result = $this->student_model->getdisableStudent();
        $data["resultlist"] = $result;

        $userdata = $this->customlib->getUserData();
        $carray = array();

        if (!empty($data["classlist"])) {
            foreach ($data["classlist"] as $ckey => $cvalue) {

                $carray[] = $cvalue["id"];
            }
        }

        $button = $this->input->post('search');
        if ($this->input->server('REQUEST_METHOD') == "GET") {
 
        } else {
            $class = $this->input->post('class_id');
            $section = $this->input->post('section_id');
            $search = $this->input->post('search');
            $search_text = $this->input->post('search_text');
            if (isset($search)) {
                if ($search == 'search_filter') {
                    $this->form_validation->set_rules('class_id', 'Class', 'trim|required');
                    if ($this->form_validation->run() == FALSE) {
                        
                    } else {
                        $data['searchby'] = "filter";
                        $data['class_id'] = $this->input->post('class_id');
                        $data['section_id'] = $this->input->post('section_id');

                        $data['search_text'] = $this->input->post('search_text');
                        $resultlist = $this->student_model->disablestudentByClassSection($class, $section);
                        $data['resultlist'] = $resultlist;
                        $title = $this->classsdivision_model->getDetailbyClassSection($data['class_id'], $data['section_id']);
                        $data['title'] = 'Student Details for ' . $title['class'] . "(" . $title['division'] . ")";
                    }
                } else if ($search == 'search_full') {
                    $data['searchby'] = "text";

                    $data['search_text'] = trim($this->input->post('search_text'));
                    $resultlist = $this->student_model->disablestudentFullText($search_text);
                    $data['resultlist'] = $resultlist;
                    $data['title'] = 'Search Details: ' . $data['search_text'];
                }
            }
        }

        $this->load->view("adminlogin/layout/header", $data);
        $this->load->view("adminlogin/student/disablestudents", $data);
        $this->load->view("adminlogin/layout/footer", $data); 
    }
   
//     function getByClassAndSection() {
//        $class = $this->input->get('class_id');
//        $section = $this->input->get('section_id');
//        $resultlist = $this->student_model->searchByClassSection($class, $section);
//        echo json_encode($resultlist);
//    }
}