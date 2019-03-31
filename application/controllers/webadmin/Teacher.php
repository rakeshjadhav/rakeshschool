<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Teacher extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->helper('file');
        $this->role;
    }
     function index() {
       if($this->session->userdata('isUserLoggedIn')){
        if (!$this->rbac->hasPrivilege('teacher', 'can_view')) {
            access_denied();
        }
        $data['title'] = 'Add Teacher';
        $teacher_result = $this->teacher_model->get();
        $data['teacherlist'] = $teacher_result;
        $genderList = $this->customlib->getGender();
        //var_dump($genderList);exit;
        $data['genderList'] = $genderList;
        $this->load->view('adminlogin/layout/header',$data);
        $this->load->view('adminlogin/teacher/teacherList',$data);
        $this->load->view('adminlogin/layout/footer',$data);
        }else{
           $this->session->set_userdata('msg', 'Your current session has expired. Please login again to continue.');
           redirect('site/login');
        }
    }
    
    
    function create() {
        if($this->session->userdata('isUserLoggedIn')){
        if (!$this->rbac->hasPrivilege('teacher', 'can_add')) {
            access_denied();
        }
        $data['title'] = 'Add teacher';
        $genderList = $this->customlib->getGender();
        $data['genderList'] = $genderList;
        $this->form_validation->set_rules('name', 'Teacher', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('gender', 'Gender', 'trim|required');
        $this->form_validation->set_rules('dob', 'Date of Birth', 'trim|required');
        $this->form_validation->set_rules('phone', 'Phone', 'trim|required');
        $this->form_validation->set_rules('file', 'Image', 'callback_handle_upload');
        
        if ($this->form_validation->run() == FALSE) {
            $teacher_result = $this->teacher_model->get();
            $data['teacherlist'] = $teacher_result;
            $genderList = $this->customlib->getGender();
            $data['genderList'] = $genderList;
            $this->load->view('adminlogin/layout/header',$data);
            $this->load->view('adminlogin/teacher/teacherList',$data);
            $this->load->view('adminlogin/layout/footer',$data);
        } else {
            $data = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password'),
                'sex' => $this->input->post('gender'),
                'dob' => $this->input->post('dob'),
                'address' => $this->input->post('address'),
                'phone' => $this->input->post('phone'),
                'image' => 'uploads/student_images/no_image.png',
            );
            $insert_id = $this->teacher_model->add($data);
            $user_password = $this->role->get_random_password($chars_min = 6, $chars_max = 6, $use_upper_case = false, $include_numbers = true, $include_special_chars = false);
            $data_student_login = array(
                'username' => $this->teacher_login_prefix . $insert_id,
                'password' => $user_password,
                'user_id' => $insert_id,
                'role' => 'teacher'
            );
            $this->user_model->add($data_student_login);
            if(isset($_FILES['file']) && !empty($_FILES['file']['name'])) {
                $fileInfo = pathinfo($_FILES["file"]["name"]);
                $img_name = $insert_id . '.' . $fileInfo['extension'];
                move_uploaded_file($_FILES["file"]["tmp_name"], "./uploads/teacher_images/" . $img_name);
                $data_img = array('id' => $insert_id, 'image' => 'uploads/teacher_images/' . $img_name);
                $this->teacher_model->add($data_img);
            }
            $teacher_login_detail = array('id' => $insert_id, 'credential_for' => 'teacher', 'username' => $this->teacher_login_prefix . $insert_id, 'password' => $user_password, 'contact_no' => $this->input->post('phone'));
//       login dateil
           // $this->mailsmsconf->mailsms('login_credential', $teacher_login_detail);

            $this->session->set_flashdata('msg', '<div class="alert alert-success text-left">Teacher added successfully</div>');
            redirect('webadmin/teacher/index');
        }
        }else{
           $this->session->set_userdata('msg', 'Your current session has expired. Please login again to continue.');
           redirect('site/login');
        }
    }
    
     //imp handle
    function handle_upload() {
        if(isset($_FILES["file"]) && !empty($_FILES['file']['name'])) {
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
            if ($_FILES["file"]["size"] > 10240000) {

                $this->form_validation->set_message('handle_upload', 'File size shoud be less than 100 kB');
                return false;
            }
//            if ($error == '') {
//                return true;
//            }
//        } else {
//            return true;
        }
    }
    
    function view($id) {
        if($this->session->userdata('isUserLoggedIn')){
        if (!$this->rbac->hasPrivilege('teacher', 'can_view')) {
            access_denied();
        }
        $data['title'] = 'Teacher List';
        $teacher = $this->teacher_model->get($id);
//        var_dump($teacher);exit;
        $teachersubject = $this->teachersubject_model->getTeacherClassSubjects($id);
//        var_dump($teachersubject);exit;
        $data['teacher'] = $teacher;
        $data['teachersubject'] = $teachersubject;
        $this->load->view('adminlogin/layout/header',$data);
        $this->load->view('adminlogin/teacher/teacherShow',$data);
        $this->load->view('adminlogin/layout/footer',$data);
        }else{
           $this->session->set_userdata('msg', 'Your current session has expired. Please login again to continue.');
           redirect('site/login');
        }
    }
    
    
      //teacher login details
    
    function getlogindetail() {
        
        $teacher_id = $this->input->post('teacher_id');
        $examSchedule = $this->user_model->getTeacherLoginDetails($teacher_id);
        echo json_encode($examSchedule);
    }
    
    function edit($id) {
        if($this->session->userdata('isUserLoggedIn')){
        if (!$this->rbac->hasPrivilege('teacher', 'can_view')) {
            access_denied();
        }
        $data['title'] = 'Edit Teacher';
        $data['id'] = $id;
        $genderList = $this->customlib->getGender();
//        var_dump($genderLi/st);exit;
        $data['genderList'] = $genderList;
//        var_dump( $data['genderList']);exit;
        $teacher = $this->teacher_model->get($id);
        $data['teacher'] = $teacher;
        $this->form_validation->set_rules('name', 'Teacher', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('gender', 'Gender', 'trim|required');
        $this->form_validation->set_rules('dob', 'Date of Birth', 'trim|required');
        $this->form_validation->set_rules('phone', 'Phone', 'trim|required');
        $this->form_validation->set_rules('file', 'Image', 'callback_handle_upload');
        if ($this->form_validation->run() == FALSE) {
            $teacher_result = $this->teacher_model->get();
            $data['teacherlist'] = $teacher_result;
            $this->load->view('adminlogin/layout/header',$data);
            $this->load->view('adminlogin/teacher/teacherEdit', $data);
            $this->load->view('adminlogin/layout/footer',$data);
        } else {
            $data = array(
                'id' => $id,
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password'),
                'sex' => $this->input->post('gender'),
                'dob' => date('Y-m-d', $this->customlib->datetostrtotime($this->input->post('dob'))),
                'address' => $this->input->post('address'),
                'phone' => $this->input->post('phone')
            );
            $insert_id = $this->teacher_model->add($data);
            if (isset($_FILES["file"]) && !empty($_FILES['file']['name'])) {
                $fileInfo = pathinfo($_FILES["file"]["name"]);
                $img_name = $id . '.' . $fileInfo['extension'];
                move_uploaded_file($_FILES["file"]["tmp_name"], "./uploads/teacher_images/" . $img_name);
                $data_img = array('id' => $id, 'image' => 'uploads/teacher_images/' . $img_name);
                $this->teacher_model->add($data_img);
            }
            $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Teacher updated successfully</div>');
            redirect('webadmin/teacher/index');
        }
        }else{
           $this->session->set_userdata('msg', 'Your current session has expired. Please login again to continue.');
           redirect('site/login');
        }
    }
    
    function delete($id) {
        if($this->session->userdata('isUserLoggedIn')){
        if (!$this->rbac->hasPrivilege('teacher', 'can_view')) {
            access_denied();
        }
        $data['title'] = 'Teacher Delete';
        $this->teacher_model->remove($id);
        redirect('webadmin/teacher/index');
        }else{
           $this->session->set_userdata('msg', 'Your current session has expired. Please login again to continue.');
           redirect('site/login');
        }
    }
    
    
    function assignteacher() {
       // echo"rakesh";exit;
        if($this->session->userdata('isUserLoggedIn')){
        if (!$this->rbac->hasPrivilege('assign_teacher', 'can_view')) {
            access_denied();
        }
//        var_dump($_POST);exit;
        $data['title'] = 'Assign Teacher with Class and Subject wise';
        
       // $teacher = $this->teacher_model->get();
        $teacher = $this->staff_model->getStaffbyrole(2);
        $data['teacherlist'] = $teacher;
       // var_dump($data['teacherlist'] );exit;
        
        $subject = $this->subject_model->get();
        $data['subjectlist'] = $subject;
        
        $class = $this->class_model->get();
        $data['classlist'] = $class;
         $userdata = $this->customlib->getUserData();
         
        $this->load->view('adminlogin/layout/header', $data);
        $this->load->view('adminlogin/teacher/assignTeacher', $data);
        $this->load->view('adminlogin/layout/footer', $data);
        
        if ($this->input->server('REQUEST_METHOD') == "POST") {
            // var_dump($_POST);exit;
            $loop = $this->input->post('i');
            $array = array();
            foreach ($loop as $key => $value) {
                $s = array();
                $s['session_id'] = $this->setting_model->getCurrentSession();
                $class_id = $this->input->post('class_id');
                $section_id = $this->input->post('section_id');
                $dt = $this->classsdivision_model->getDetailbyClassSection($class_id, $section_id);
               
                $s['class_division_id'] = $dt['id'];
                $s['teacher_id'] = $this->input->post('teacher_id_' . $value);
                $s['subject_id'] = $this->input->post('subject_id_' . $value);
                $row_id = $this->input->post('row_id_' . $value);
                if ($row_id == 0) {
                    $insert_id = $this->teachersubject_model->add($s);
                    $array[] = $insert_id;
                } else {
                    $s['id'] = $row_id;
                    $array[] = $row_id;
                    $this->teachersubject_model->add($s);
                }
            }
            $ids = $array;
            $class_division_id = $dt['id'];
            $this->teachersubject_model->deleteBatch($ids, $class_division_id);
            $this->session->set_flashdata('msg', '<div class="alert alert-success">Record updated successfully</div>');
            redirect('webadmin/teacher/assignteacher');  
        }
        }else{
           $this->session->set_userdata('msg', 'Your current session has expired. Please login again to continue.');
           redirect('site/login');
        }
    }
   
//    /    asssign subjetc for teachers
    public function getSubjectTeachers() {
//        var_dump($_POST);exit;
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('class_id', 'Class', 'trim|required');
        $this->form_validation->set_rules('section_id', 'Division', 'trim|required');
        
        if ($this->form_validation->run()) {
            $class_id = $this->input->post('class_id');
            $section_id = $this->input->post('section_id');
//            var_dump($section_id);exit;
            $dt = $this->classsdivision_model->getDetailbyClassSection($class_id, $section_id);
//            var_dump($dt);exit;
            $data = $this->teachersubject_model->getDetailByclassAndSection($dt['id']);
//            var_dump($data);exit;
            echo json_encode(array('st' => 0, 'msg' => $data));
        } else {
            $data = array(
                'class_id' => form_error('class_id'),
                'division_id' => form_error('division_id'),
            );
            echo json_encode(array('st' => 1, 'msg' => $data));
        }
    }
    
    //assign  teacher timetable create
    function getSubjctByClassandSection() {
        $class_id = $this->input->post('class_id');
        $section_id = $this->input->post('section_id');
        $data = $this->teachersubject_model->getSubjectByClsandSection($class_id, $section_id);
        //var_dump($data);exit;
        echo json_encode($data);
    }
    
    function assign_class_teacher() {
        if($this->session->userdata('isUserLoggedIn')){
       // var_dump($_POST);exit;
        $data['title'] = 'Add Class Teacher';
        
        $classlist = $this->class_model->get();
        $data['classlist'] = $classlist;

        $sectionlist = $this->division_model->get();
        $data['sectionlist'] = $sectionlist;
       
        $assignteacherlist = $this->class_model->getClassTeacher();
        $data['assignteacherlist'] = $assignteacherlist;
        foreach ($assignteacherlist as $key => $value) {
//            var_dump($value);exit;
            $class_id = $value["class_id"];
            $division_id = $value["division_id"];
            $tlist[] = $this->classteacher_model->teacherByClassSection($class_id, $division_id);
        }
        if(!empty($tlist)){
        $data["tlist"] = $tlist;
        }
        $teacherlist = $this->staff_model->getStaffbyrole($role = 2);

        $data['teacherlist'] = $teacherlist;
       
        
        
        $this->form_validation->set_rules( 'class', 'Class', array('required',array('class_exists', array($this->class_model, 'class_teacher_exists')))
        );
        $this->form_validation->set_rules('section', 'Section', 'trim|required');
        $this->form_validation->set_rules('teachers[]', 'Teacher', 'trim|required');

        if ($this->form_validation->run() == FALSE) {  
            $this->load->view('adminlogin/layout/header', $data);
            $this->load->view('adminlogin/class/classTeacher', $data);
            $this->load->view('adminlogin/layout/footer', $data);
        } else {
            //var_dump($_POST);exit;
            $class = $this->input->post("class");
            $division = $this->input->post("section");
            $teachers = $this->input->post("teachers");

            $i = 0;
            foreach ($teachers as $key => $value) {
                //var_dump($value);exit;
                $classteacherid = $this->input->post("classteacherid");
//                var_dump($classteacherid);exit;
                if (isset($classteacherid)) {
                    $data = array('id' => $classteacherid[$i],
                                  'class_id' => $class,
                                  'division_id' => $division,
                                   'staff_id' => $teachers[$i],
                             );
                          } else {
                    $data = array('class_id' => $class,
                                 'division_id' => $division,
                                 'staff_id' => $teachers[$i],
                            );
                }
                $i++;
                //var_dump($data);exit;
                $this->classteacher_model->addClassTeacher($data);
            }
            redirect('webadmin/teacher/assign_class_teacher');
            $this->session->set_flashdata('msg', '<div class="alert alert-success">Class teacher add successfully</div>');
        }
        }else{
           $this->session->set_userdata('msg', 'Your current session has expired. Please login again to continue.');
           redirect('site/login');
        }
    }
    
    function classteacheredit($class_id, $division_id) {
//        var_dump($_POST);exit;
         if($this->session->userdata('isUserLoggedIn')){
             
        $result = $this->classteacher_model->teacherByClassSection($class_id, $division_id);
        $data["result"] = $result;

        $classlist = $this->class_model->get();
        $data['classlist'] = $classlist;

        $sectionlist = $this->division_model->get();
        $data['sectionlist'] = $sectionlist;

        $assignteacherlist = $this->class_model->getClassTeacher();
        $data['assignteacherlist'] = $assignteacherlist;
        
        foreach ($assignteacherlist as $key => $value) {
            $classid = $value["class_id"];
            $divisionid = $value["division_id"];

            $tlist[] = $this->classteacher_model->teacherByClassSection($classid, $divisionid);
        }
        $data["tlist"] = $tlist;

        $teacherlist = $this->staff_model->getStaffbyrole($role = 2);
        $data['teacherlist'] = $teacherlist;

        $data['class_id'] = $class_id;
        $data['division_id'] = $division_id;
        //var_dump($data);exit;
        $this->load->view('adminlogin/layout/header', $data);
        $this->load->view('adminlogin/class/classTeacherEdit', $data);
        $this->load->view('adminlogin/layout/footer', $data);
        }else{
//           //  echo"444";exit;
           $this->session->set_userdata('msg', 'Your current session has expired. Please login again to continue.');
           redirect('site/login');
        }
    }
    
    function update_class_teacher() {
        //var_dump($_POST);exit;
         if($this->session->userdata('isUserLoggedIn')){
        
       $classlist = $this->class_model->get();
        $data['classlist'] = $classlist;

        $sectionlist = $this->division_model->get();
        $data['sectionlist'] = $sectionlist;


        $assignteacherlist = $this->class_model->getClassTeacher();
        $data['assignteacherlist'] = $assignteacherlist;

        foreach ($assignteacherlist as $key => $value) {
            $class_id = $value["class_id"];
            $section_id = $value["section_id"];

            $tlist[] = $this->classteacher_model->teacherByClassSection($class_id, $section_id);
        }
        $data["tlist"] = $tlist;

        $teacherlist = $this->staff_model->getStaffbyrole($role = 2);

        $data['teacherlist'] = $teacherlist;  
        $data['title'] = 'Update Class Teacher';
        $this->form_validation->set_rules('teachers[]', 'Teacher', 'trim|required');

        if ($this->form_validation->run() == FALSE) { 
            $this->load->view('layout/header', $data);
            $this->load->view('class/classTeacher', $data);
            $this->load->view('layout/footer', $data);
        } else {
            $division = $this->input->post('section');
            $prev_teacher = $this->input->post('classteacherid');
            $staff_id = $this->input->post('teachers');
            $class_id = $this->input->post('class');
            if (!isset($prev_teacher)) {
                $prev_teacher = array();
            }
            $add_result = array_diff($staff_id, $prev_teacher);
            $delete_result = array_diff($prev_teacher, $staff_id);

            if (!empty($add_result)) {
                $teacher_batch_array = array();
                foreach ($add_result as $teacher_add_key => $teacher_add_value) {

                    $teacher_batch_array[] = $teacher_add_value;
                }

                $insert_array = array();
                foreach ($teacher_batch_array as $vec_key => $vec_value) {

                    $vehicle_array = array(
                        'class_id' => $class_id,
                        'division_id' => $division,
                        'staff_id' => $vec_value,
                    );
                    $this->classteacher_model->addClassTeacher($vehicle_array);
                    $insert_array[] = $vehicle_array;
                }
            }
            if (!empty($delete_result)) {
                $classteacher_delete_array = array();
                foreach ($delete_result as $vec_delete_key => $vec_delete_value) {
                    $classteacher_delete_array[] = $vec_delete_value;
                }
                $this->classteacher_model->delete($class_id, $division, $classteacher_delete_array); 
            }
            redirect('webadmin/teacher/assign_class_teacher');
        }
        
        }else{
//           //  echo"444";exit;
           $this->session->set_userdata('msg', 'Your current session has expired. Please login again to continue.');
           redirect('site/login');
        }
    }
     function classteacherdelete($class_id, $division_id) {
         //var_dump($division_id);exit;
        if ((!empty($class_id)) && (!empty($division_id))) {
            $this->classteacher_model->delete($class_id, $division_id, null);
            redirect("webadmin/teacher/assign_class_teacher");
        }
    }
    
    
    
    
}
