<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Student_model extends CI_Model {

    public function __construct() {
        parent::__construct();
       $this->current_session = $this->setting_model->getCurrentSession();
        $this->current_date = $this->setting_model->getDateYmd();
    }
    public function get($id = null) {
        $this->db->select('student_session.transport_fees,students.vehroute_id,vehicle_routes.route_id,vehicle_routes.vehicle_id,transport_route.route_title,vehicles.vehicle_no,vehicles.driver_name,vehicles.driver_contact,student_session.id as `student_session_id`,student_session.fees_discount,classes.id AS `class_id`,classes.class,division.id AS `division_id`,division.division,students.id,students.admission_no , students.roll_no,students.admission_date,students.firstname,  students.lastname,students.image,    students.mobileno, students.email ,students.state ,   students.city , students.pincode , students.note, students.religion, students.cast, school_houses.house_name,   students.dob ,students.current_address, students.previous_school,
            students.guardian_is,students.parent_id,
            students.permanent_address,students.category_id,students.adhar_no,students.samagra_id,students.bank_account_no,students.bank_name, students.ifsc_code , students.guardian_name , students.father_pic , students.mother_pic , students.guardian_pic , students.guardian_relation,students.guardian_phone,students.guardian_address,students.is_active ,students.created_at ,students.updated_at,students.father_name,students.father_phone,students.blood_group,students.school_house_id,students.father_occupation,students.mother_name,students.mother_phone,students.mother_occupation,students.guardian_occupation,students.gender,students.guardian_is,students.rte,students.guardian_email')->from('students');
        $this->db->join('student_session', 'student_session.student_id = students.id');
        $this->db->join('classes', 'student_session.class_id = classes.id');
        $this->db->join('division', 'division.id = student_session.division_id');
       // $this->db->join('hostel_rooms', 'hostel_rooms.id = students.hostel_room_id', 'left');
      //  $this->db->join('hostel', 'hostel.id = hostel_rooms.hostel_id', 'left');
       // $this->db->join('room_types', 'room_types.id = hostel_rooms.room_type_id', 'left');
        $this->db->join('vehicle_routes', 'vehicle_routes.id = students.vehroute_id', 'left');
        $this->db->join('transport_route', 'vehicle_routes.route_id = transport_route.id', 'left');
        $this->db->join('vehicles', 'vehicles.id = vehicle_routes.vehicle_id', 'left');
        $this->db->join('school_houses', 'school_houses.id = students.school_house_id', 'left');
        $this->db->where('student_session.session_id', $this->current_session);

        if ($id != null) {
            $this->db->where('students.id', $id);
        } else {
            $this->db->where('students.is_active', 'yes');
            $this->db->order_by('students.id', 'desc');
        }
        $query = $this->db->get();
       // echo $this->db->last_query();exit;
        if ($id != null) {
            return $query->row_array();
        } else {
            return $query->result_array();
        }
    }
    
    
//    public function get($id = null) {
//        $this->db->select('student_session.transport_fees,student_session.vehroute_id,student_session.id as `student_session_id`,student_session.fees_discount,classes.id AS `class_id`,classes.class,division.id AS `division_id`,division.division,students.id,students.admission_no , students.roll_no,students.admission_date,students.firstname,  students.lastname,students.image,    students.mobileno, students.email ,students.state ,   students.city , students.pincode ,     students.religion, students.cast,    students.dob ,students.current_address, students.previous_school,
//            students.guardian_is,
//            students.permanent_address,students.category_id,students.adhar_no,students.samagra_id,students.bank_account_no,students.bank_name, students.ifsc_code , students.guardian_name , students.guardian_relation,students.guardian_phone,students.guardian_address,students.is_active ,students.created_at ,students.updated_at,students.father_name,students.father_phone,students.father_occupation,students.mother_name,students.mother_phone,students.mother_occupation,students.guardian_occupation,students.gender,students.guardian_is,students.rte,students.guardian_email')->from('students');
//        $this->db->join('student_session', 'student_session.student_id = students.id');
//        $this->db->join('classes', 'student_session.class_id = classes.id');
//        $this->db->join('division', 'division.id = student_session.division_id');
//        $this->db->where('student_session.session_id', $this->current_session);
//        if ($id != null) {
//            $this->db->where('students.id', $id);
//        } else {
//            $this->db->order_by('students.id', 'desc');
//        }
//        $query = $this->db->get();
//        if ($id != null) {
//            return $query->row_array();
//        } else {
//            return $query->result_array();
//        }
//    }
    
    //create student
    public function getRecentRecord($id = null) {
        $this->db->select('classes.id AS `class_id`,classes.class,division.id AS `division_id`,division.division,students.id,students.admission_no , students.roll_no,students.admission_date,students.firstname,  students.lastname,students.image,    students.mobileno, students.email ,students.state ,   students.city , students.pincode ,     students.religion,     students.dob ,students.current_address,    students.permanent_address,students.category_id,    students.adhar_no,students.samagra_id,students.bank_account_no,students.bank_name, students.ifsc_code , students.guardian_name , students.guardian_relation,students.guardian_phone,students.guardian_address,students.is_active ,students.created_at ,students.updated_at,students.father_name,students.father_phone,students.father_occupation,students.mother_name,students.mother_phone,students.mother_occupation,students.guardian_occupation,students.gender,students.guardian_is')->from('students');
        $this->db->join('student_session', 'student_session.student_id = students.id');
        $this->db->join('classes', 'student_session.class_id = classes.id');
        $this->db->join('division', 'division.id = student_session.division_id');
        $this->db->where('student_session.session_id', $this->current_session);
        
        if ($id != null) {
            $this->db->where('students.id', $id);
        } else {
            
        }
        $this->db->order_by('students.id', 'desc');
        $this->db->limit(5);
        $query = $this->db->get();
//       echo $this->db->last_query();exit;
        if ($id != null) {
            return $query->row_array();
        } else {
            return $query->result_array();
        }
    }
    //add student
     public function add($data) {

        if (isset($data['id'])) {
            $this->db->where('id', $data['id']);
            $this->db->update('students', $data);
        } else {
            $this->db->insert('students', $data);
            return $this->db->insert_id();
        }
    }
    //add student session 
    public function add_student_session($data) {
        $this->db->where('session_id', $data['session_id']);
        $this->db->where('student_id', $data['student_id']);
        $q = $this->db->get('student_session');
        if ($q->num_rows() > 0) {
            $rec = $q->row_array();
            $this->db->where('id', $rec['id']);
            $this->db->update('student_session', $data);
        } else {
            $this->db->insert('student_session', $data);
            return $this->db->insert_id();
        }
    }
    //add docu
    public function adddoc($data) {
        $this->db->insert('student_doc', $data);
        return $this->db->insert_id();
    }
    
    public function getstudentdoc($id) {
        $this->db->select()->from('student_doc');
        $this->db->where('student_id', $id);
        $query = $this->db->get();
        return $query->result_array();
    }
    //doc delete
      public function doc_delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('student_doc');
    }
    
    //search students
    
    public function searchByClassSection($class_id = null, $division_id = null) {
        $this->db->select('classes.id AS `class_id`,student_session.id as student_session_id,students.id,classes.class,division.id AS `division_id`,division.division,students.id,students.admission_no , students.roll_no,students.admission_date,students.firstname, students.lastname,students.image,students.mobileno, students.email ,students.state , students.city , students.pincode , students.religion, students.dob ,students.current_address,    students.permanent_address,IFNULL(students.category_id, 0) as `category_id`,IFNULL(categories.category, "") as `category`,students.adhar_no,students.samagra_id,students.bank_account_no,students.bank_name, students.ifsc_code , students.guardian_name , students.guardian_relation,students.guardian_phone,students.guardian_address,students.is_active ,students.created_at ,students.updated_at,students.father_name,students.rte,students.gender')->from('students');
        $this->db->join('student_session', 'student_session.student_id = students.id');
        $this->db->join('classes', 'student_session.class_id = classes.id');
        $this->db->join('division', 'division.id = student_session.division_id');
        $this->db->join('categories', 'students.category_id = categories.id', 'left');
        $this->db->where('student_session.session_id', $this->current_session);
        if ($class_id != null) {
            $this->db->where('student_session.class_id', $class_id);
        }
        if ($division_id != null) {
            $this->db->where('student_session.division_id', $division_id);
        }
        $this->db->order_by('students.id');

        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function searchFullText($searchterm) {
        $this->db->select('classes.id AS `class_id`,students.id,classes.class,division.id AS `division`,division.division,students.id,students.admission_no , students.roll_no,students.admission_date,students.firstname,  students.lastname,students.image,    students.mobileno, students.email ,students.state ,   students.city , students.pincode ,     students.religion,     students.dob ,students.current_address,    students.permanent_address,IFNULL(students.category_id, 0) as `category_id`,IFNULL(categories.category, "") as `category`,      students.adhar_no,students.samagra_id,students.bank_account_no,students.bank_name, students.ifsc_code ,students.father_name , students.guardian_name , students.guardian_relation,students.guardian_phone,students.guardian_address,students.is_active ,students.created_at ,students.updated_at,students.gender,students.rte,student_session.session_id')->from('students');
        $this->db->join('student_session', 'student_session.student_id = students.id');
        $this->db->join('classes', 'student_session.class_id = classes.id');
        $this->db->join('division', 'division.id = student_session.division_id');
        $this->db->join('categories', 'students.category_id = categories.id', 'left');
        $this->db->where('student_session.session_id', $this->current_session);
        $this->db->group_start();
        $this->db->like('students.firstname', $searchterm);
        $this->db->or_like('students.lastname', $searchterm);
        $this->db->or_like('students.guardian_name', $searchterm);
        $this->db->or_like('students.adhar_no', $searchterm);
        $this->db->or_like('students.samagra_id', $searchterm);
        $this->db->or_like('students.roll_no', $searchterm);
        $this->db->or_like('students.admission_no', $searchterm);
        $this->db->group_end();
        $this->db->order_by('students.id');
        // $this->db->limit('100');
        $query = $this->db->get();
        return $query->result_array();
    }
    
    
    public function searchLibraryStudent($class_id = null, $division_id = null) {
        $this->db->select('classes.id AS `class_id`,student_session.id as student_session_id,students.id,classes.class,division.id AS `section_id`,
           IFNULL(libarary_members.id,0) as `libarary_member_id`,
           IFNULL(libarary_members.library_card_no,0) as `library_card_no`,division.division,students.id,students.admission_no , students.roll_no,students.admission_date,students.firstname,  students.lastname,students.image,    students.mobileno, students.email ,students.state ,   students.city , students.pincode ,     students.religion,     students.dob ,students.current_address,    students.permanent_address,IFNULL(students.category_id, 0) as `category_id`,IFNULL(categories.category, "") as `category`,students.adhar_no,students.samagra_id,students.bank_account_no,students.bank_name, students.ifsc_code , students.guardian_name , students.guardian_relation,students.guardian_phone,students.guardian_address,students.is_active ,students.created_at ,students.updated_at,students.father_name,students.rte,students.gender')->from('students');
        $this->db->join('student_session', 'student_session.student_id = students.id');
        $this->db->join('classes', 'student_session.class_id = classes.id');
        $this->db->join('division', 'division.id = student_session.division_id');
        $this->db->join('categories', 'students.category_id = categories.id', 'left');
        $this->db->join('libarary_members', 'libarary_members.member_id = students.id and libarary_members.member_type = "student"', 'left');


        $this->db->where('student_session.session_id', $this->current_session);
        if ($class_id != null) {
            $this->db->where('student_session.class_id', $class_id);
        }
        if ($division_id != null) {
            $this->db->where('student_session.division_id', $division_id);
        }
        $this->db->order_by('students.id');

        $query = $this->db->get();
        return $query->result_array();
    }
    //parent login
    public function read_siblings_students($ids_comma) {
        $query = $this->db->query('select * from students WHERE id in (' . $ids_comma . ')');
        return $query->result_array();
    }
    //add fee 
     public function getClassSection($id) {

        $query = $this->db->SELECT("*")->join("division", "class_division.division_id = division.id")->where("class_division.class_id", $id)->get("class_division");
        return $query->result_array();
    }
    
     public function getStudentClassSection($id,$sessionid) {

        $query = $this->db->SELECT("students.firstname,students.id,students.lastname,students.image,student_session.division_id")->join("student_session", "students.id = student_session.student_id")->where("student_session.class_id", $id)->where("student_session.session_id", $sessionid)->where("students.is_active", "yes")->get("students");

           return $query->result_array();
            //SELECT `students`.`firstname`, `students`.`id`, `students`.`lastname`, `students`.`image`, `student_session`.`section_id` FROM `students` JOIN `student_session` ON `students`.`id` = `student_session`.`student_id` WHERE `student_session`.`class_id` = '1' AND `student_session`.`session_id` = '14' AND `students`.`is_active` = 'yes'
    }

    function gethouselist() {
        $query = $this->db->where("is_active", "yes")->get("school_houses");
        return $query->result_array();
    }
    
     public function searchByClassSectionWithSession($class_id = null, $section_id = null, $session_id = null) {
        $this->db->select('classes.id AS `class_id`,student_session.id as student_session_id,students.id,classes.class,division.id AS `division_id`,division.division,students.id,students.admission_no , students.roll_no,students.admission_date,students.firstname,  students.lastname,students.image,    students.mobileno, students.email ,students.state ,   students.city , students.pincode ,     students.religion,     students.dob ,students.current_address,    students.permanent_address,IFNULL(students.category_id, 0) as `category_id`,IFNULL(categories.category, "") as `category`,students.adhar_no,students.samagra_id,students.bank_account_no,students.bank_name, students.ifsc_code , students.guardian_name , students.guardian_relation,students.guardian_phone,students.guardian_address,students.is_active ,students.created_at ,students.updated_at,students.father_name,students.rte,students.gender')->from('students');
        $this->db->join('student_session', 'student_session.student_id = students.id');
        $this->db->join('classes', 'student_session.class_id = classes.id');
        $this->db->join('division', 'division.id = student_session.divisioin_id');
        $this->db->join('categories', 'students.category_id = categories.id', 'left');
        $this->db->where('student_session.session_id', $this->current_session);
        if ($class_id != null) {
            $this->db->where('student_session.class_id', $class_id);
        }
        if ($section_id != null) {
            $this->db->where('student_session.division_id', $section_id);
        }
        $this->db->order_by('students.id');
        $query = $this->db->get();
        return $query->result_array();
    }
    
    
    public function getStudentsByArray($array) {
        $this->db->select('classes.id AS `class_id`,student_session.id as student_session_id,students.id,classes.class,division.id AS `section_id`,division.division,students.id,students.admission_no , students.roll_no,students.admission_date,students.firstname,  students.lastname,students.image,    students.mobileno, students.email ,students.state ,   students.city , students.pincode ,     students.religion,     students.dob ,students.current_address,students.blood_group ,    students.permanent_address,IFNULL(students.category_id, 0) as `category_id`,IFNULL(categories.category, "") as `category`,students.adhar_no,students.samagra_id,students.bank_account_no,students.bank_name, students.ifsc_code , students.guardian_name , students.guardian_relation,students.guardian_phone,students.guardian_address,students.is_active ,students.created_at ,students.mother_name,students.updated_at,students.father_name,students.rte,students.gender,users.id as `user_tbl_id`,users.username,users.password as `user_tbl_password`,users.is_active as `user_tbl_active`')->from('students');
        $this->db->join('student_session', 'student_session.student_id = students.id');
        $this->db->join('classes', 'student_session.class_id = classes.id');
        $this->db->join('division', 'division.id = student_session.division_id');
        $this->db->join('categories', 'students.category_id = categories.id', 'left');
        $this->db->join('users', 'users.user_id = students.id', 'left');
        $this->db->where('student_session.session_id', $this->current_session);
        $this->db->where('users.role', 'student');
        $this->db->where_in('students.id', $array);
        $this->db->order_by('students.id');

        $query = $this->db->get();
        return $query->result();
    }
    
    //all studntds users
    
    public function getStudents() {
        $this->db->select('classes.id AS `class_id`,student_session.id as student_session_id,students.id,classes.class,division.id AS `division_id`,division.division,students.id,students.admission_no , students.roll_no,students.admission_date,students.firstname,  students.lastname,students.image,    students.mobileno, students.email ,students.state ,   students.city , students.pincode ,     students.religion,     students.dob ,students.current_address,    students.permanent_address,IFNULL(students.category_id, 0) as `category_id`,IFNULL(categories.category, "") as `category`,students.adhar_no,students.samagra_id,students.bank_account_no,students.bank_name, students.ifsc_code , students.guardian_name , students.guardian_relation,students.guardian_phone,students.guardian_address,students.is_active ,students.created_at ,students.updated_at,students.father_name,students.rte,students.gender,users.id as `user_tbl_id`,users.username,users.password as `user_tbl_password`,users.is_active as `user_tbl_active`')->from('students');
        $this->db->join('student_session', 'student_session.student_id = students.id');
        $this->db->join('classes', 'student_session.class_id = classes.id');
        $this->db->join('division', 'division.id = student_session.division_id');
        $this->db->join('categories', 'students.category_id = categories.id', 'left');
        $this->db->join('users', 'users.user_id = students.id', 'left');
        $this->db->where('student_session.session_id', $this->current_session);
        $this->db->where('students.is_active', 'yes');
        $this->db->where('users.role', 'student');

        $this->db->order_by('students.id');

        $query = $this->db->get();
        return $query->result_array();
    }
    
    //all parent lsit usres
     public function getParentList() {
        $sql = "SELECT students.*,users.username,users.password,users.role,users.is_active FROM `students` INNER JOIN users on users.id = students.parent_id WHERE parent_id != 0 GROUP BY parent_id";
        $query = $this->db->query($sql);
        $parents = $query->result();
        return $parents;
    }

    
    public function searchByClassSectionCategoryGenderRte($class_id = null, $section_id = null
    , $category = null, $gender = null, $rte = null) {
        $this->db->select('classes.id AS `class_id`,student_session.id as student_session_id,students.id,classes.class,division.id AS `division_id`,division.division,students.id,students.admission_no , students.roll_no,students.admission_date,students.firstname,  students.lastname,students.image,    students.mobileno, students.email ,students.state ,   students.city , students.pincode ,     students.religion,     students.dob ,students.current_address,    students.permanent_address,students.category_id, categories.category,   students.adhar_no,students.samagra_id,students.bank_account_no,students.bank_name, students.ifsc_code , students.guardian_name , students.guardian_relation,students.guardian_phone,students.guardian_address,students.is_active ,students.created_at ,students.updated_at,students.father_name,students.rte,students.gender')->from('students');
        $this->db->join('student_session', 'student_session.student_id = students.id');
        $this->db->join('classes', 'student_session.class_id = classes.id');
        $this->db->join('division', 'division.id = student_session.division_id');
        $this->db->join('categories', 'students.category_id = categories.id');
        $this->db->where('student_session.session_id', $this->current_session);
        $this->db->where('students.is_active', 'yes');
        if ($class_id != null) {
            $this->db->where('student_session.class_id', $class_id);
        }
        if ($section_id != null) {
            $this->db->where('student_session.division_id', $section_id);
        }
        if ($category != null) {
            $this->db->where('students.category_id', $category);
        }
        if ($gender != null) {
            $this->db->where('students.gender', $gender);
        }
        if ($rte != null) {
            $this->db->where('students.rte', $rte);
        }
        $this->db->order_by('students.id');
        $query = $this->db->get();
        return $query->result_array();
    }
    
     function studentGuardianDetails($carray) {
        $userdata = $this->customlib->getUserData();

        $this->db->SELECT("students.admission_no,students.firstname,students.mobileno,students.father_phone,students.mother_phone,students.lastname,students.father_name,students.mother_name,students.guardian_name,students.guardian_relation,students.guardian_phone,students.id,classes.class,division.division");
        $this->db->join("student_session", "student_session.student_id = students.id");
        $this->db->join("classes", "student_session.class_id = classes.id");
        $this->db->join("division", "student_session.division_id = division.id");
        $this->db->where("students.is_active", "yes");
        $this->db->where('student_session.session_id',$this->current_session);
        if (($userdata["role_id"] == 2) && ($userdata["class_teacher"] == "yes")) {

            if (!empty($carray)) {

                $this->db->where_in("student_session.class_id", $carray);
            } else {
                $this->db->where_in("student_session.class_id", "");
            }
        }
        $query = $this->db->get("students");

        return $query->result_array();
    }

    
    function searchGuardianDetails($class_id, $section_id) {

        $this->db->SELECT("students.admission_no,students.firstname,students.lastname,students.mobileno,students.father_phone,students.mother_phone,students.father_name,students.mother_name,students.guardian_name,students.guardian_relation,students.guardian_phone,students.id,classes.class,division.division");
        $this->db->join("student_session", "student_session.student_id = students.id");
        $this->db->join("classes", "student_session.class_id = classes.id");
        $this->db->join("division", "student_session.division_id = division.id");
        $this->db->where("students.is_active", "yes");
        $this->db->where('student_session.session_id',$this->current_session);
        $this->db->where(array('student_session.class_id' => $class_id, 'student_session.division_id' => $section_id,));
        $query = $this->db->get("students");

        return $query->result_array();
    }
    
     public function admissionYear() {

        $query = $this->db->SELECT("distinct(year(admission_date)) as year")->get("students");

        return $query->result_array();
    }

    
    function studentAdmissionDetails($carray = null) {

        $userdata = $this->customlib->getUserData();
        if (($userdata["role_id"] == 2) && ($userdata["class_teacher"] == "yes")) {

            if (!empty($carray)) {

                $this->db->where_in("student_session.class_id", $carray);
            } else {
                $this->db->where_in("student_session.class_id", "");
            }
        }
        $query = $this->db->SELECT("students.firstname,students.lastname,students.is_active, students.mobileno, students.id as sid ,students.admission_no, students.admission_date, students.guardian_name, students.guardian_relation, students.guardian_phone, classes.class, sessions.id, division.division")->join("student_session", "students.id = student_session.student_id")->join("classes", "student_session.class_id = classes.id")->join("division", "student_session.division_id = division.id")->join("sessions", "student_session.session_id = sessions.id")->group_by("students.id")->get("students");
 
        return $query->result_array();
    }
    
    
    function studentSessionDetails($id) {

        $query = $this->db->query("SELECT min(sessions.session) as start , max(sessions.session) as end, min(classes.class) as startclass, max(classes.class) as endclass from sessions join student_session on (sessions.id = student_session.session_id) join classes on (classes.id = student_session.class_id) where student_session.student_id = " . $id);
        return $query->row_array();
    }
    
     public function searchAdmissionDetails($class_id, $year) {

        if (!empty($year)) {

            $data = array('year(admission_date)' => $year);
        } else {
            $data = array('student_session.class_id' => $class_id);
        }


        $query = $this->db->SELECT("students.firstname,students.lastname,students.is_active, students.mobileno, students.id as sid ,students.admission_no, students.admission_date, students.guardian_name, students.guardian_relation, students.guardian_phone, classes.class, sessions.id, division.division")->join("student_session", "students.id = student_session.student_id")->join("classes", "student_session.class_id = classes.id")->join("division", "student_session.division_id = division.id")->join("sessions", "student_session.session_id = sessions.id")->where($data)->group_by("students.id")->get("students");

        return $query->result_array();
    }

function getdisableStudent() {

        $this->db->select('classes.id AS `class_id`,students.id,classes.class,division.id AS `section_id`,division.division,students.id,students.admission_no , students.roll_no,students.admission_date,students.firstname,  students.lastname,students.image,    students.mobileno, students.email ,students.state ,   students.city , students.pincode ,     students.religion,     students.dob ,students.current_address,    students.permanent_address,IFNULL(students.category_id, 0) as `category_id`,IFNULL(categories.category, "") as `category`,      students.adhar_no,students.samagra_id,students.bank_account_no,students.bank_name, students.ifsc_code ,students.father_name , students.guardian_name , students.guardian_relation,students.guardian_phone,students.guardian_address,students.is_active ,students.created_at ,students.updated_at,students.gender,students.rte,student_session.session_id')->from('students');
        $this->db->join('student_session', 'student_session.student_id = students.id');
        $this->db->join('classes', 'student_session.class_id = classes.id');
        $this->db->join('division', 'division.id = student_session.division_id');
        $this->db->join('categories', 'students.category_id = categories.id', 'left');
        $this->db->where('student_session.session_id', $this->current_session);
        $this->db->where('students.is_active', 'no');
        $this->db->order_by('students.id');
        $query = $this->db->get();
        return $query->result_array();
    }

    
    function disablestudentByClassSection($class, $section) {

        $this->db->select('classes.id AS `class_id`,student_session.id as student_session_id,students.id,classes.class,division.id AS `section_id`,division.division,students.id,students.admission_no , students.roll_no,students.admission_date,students.firstname,  students.lastname,students.image,    students.mobileno, students.email ,students.state ,   students.city , students.pincode ,     students.religion,     students.dob ,students.current_address,    students.permanent_address,IFNULL(students.category_id, 0) as `category_id`,IFNULL(categories.category, "") as `category`,students.adhar_no,students.samagra_id,students.bank_account_no,students.bank_name, students.ifsc_code , students.guardian_name , students.guardian_relation,students.guardian_phone,students.guardian_address,students.is_active ,students.created_at ,students.updated_at,students.father_name,students.rte,students.gender')->from('students');
        $this->db->join('student_session', 'student_session.student_id = students.id');
        $this->db->join('classes', 'student_session.class_id = classes.id');
        $this->db->join('division', 'division.id = student_session.division_id');
        $this->db->join('categories', 'students.category_id = categories.id', 'left');
        $this->db->where('student_session.session_id', $this->current_session);
        $this->db->where('students.is_active', "no");
        if ($class != null) {
            $this->db->where('student_session.class_id', $class);
        }
        if ($section != null) {
            $this->db->where('student_session.division_id', $section);
        }
        $this->db->order_by('students.id');

        $query = $this->db->get();
        return $query->result_array();
    }
    
    function disablestudentFullText($searchterm) {
        $userdata = $this->customlib->getUserData();
        $this->db->select('classes.id AS `class_id`,students.id,classes.class,division.id AS `section_id`,division.division,students.id,students.admission_no , students.roll_no,students.admission_date,students.firstname,  students.lastname,students.image,    students.mobileno, students.email ,students.state ,   students.city , students.pincode ,     students.religion,     students.dob ,students.current_address,    students.permanent_address,IFNULL(students.category_id, 0) as `category_id`,IFNULL(categories.category, "") as `category`,      students.adhar_no,students.samagra_id,students.bank_account_no,students.bank_name, students.ifsc_code ,students.father_name , students.guardian_name , students.guardian_relation,students.guardian_phone,students.guardian_address,students.is_active ,students.created_at ,students.updated_at,students.gender,students.rte,student_session.session_id')->from('students');
        $this->db->join('student_session', 'student_session.student_id = students.id');
        $this->db->join('classes', 'student_session.class_id = classes.id');
        $this->db->join('division', 'division.id = student_session.division_id');
        $this->db->join('categories', 'students.category_id = categories.id', 'left');
        $this->db->where('student_session.session_id', $this->current_session);
        $this->db->where('students.is_active', 'no');
        if (($userdata["role_id"] == 2) && ($userdata["class_teacher"] == "yes")) {

            if (!empty($carray)) {

                $this->db->where_in("student_session.class_id", $carray);
            } else {
                $this->db->where_in("student_session.class_id", "");
            }
        } else {
            $this->db->group_start();
            $this->db->like('students.firstname', $searchterm);
            $this->db->or_like('students.lastname', $searchterm);
            $this->db->or_like('students.guardian_name', $searchterm);
            $this->db->or_like('students.adhar_no', $searchterm);
            $this->db->or_like('students.samagra_id', $searchterm);
            $this->db->or_like('students.roll_no', $searchterm);
            $this->db->or_like('students.admission_no', $searchterm);
            $this->db->group_end();
        }
        $this->db->order_by('students.id');
        $query = $this->db->get();
        return $query->result_array();
    }
    
    
    

}