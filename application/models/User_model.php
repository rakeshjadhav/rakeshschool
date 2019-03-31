<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    // Customlib
    public function add($data) {
        if (isset($data['id'])) {
            $this->db->where('id', $data['id']);
            $this->db->update('users', $data);
        } else {
            $this->db->insert('users', $data);
            return $this->db->insert_id();
        }
    }
    
    
    public function getTeacherLoginDetails($teacher_id) {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('user_id', $teacher_id);
        $this->db->where('role', 'teacher');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
     //add student 
     public function read_user() {
        $this->db->select('*');
        $this->db->from('users');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    //all user chack login
     public function checkLogin($data) {
        $this->db->select('id, username, password,role,is_active');
        $this->db->from('users');
        $this->db->where('username', $data['username']);
        $this->db->where('password', ($data['password']));
        $this->db->limit(1);
//        echo $this->db->last_query();exit;
        $query = $this->db->get();
        //var_dump($query);exit;
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }
 //all users chack info
    public function read_user_information($username) {
        $this->db->select('users.*,students.firstname,students.lastname,students.guardian_name');
        $this->db->from('users');
        $this->db->join('students', 'students.id = users.user_id');
        $this->db->where('users.user_id', $username);
        $this->db->limit(1);
        $query = $this->db->get();
       // echo $this->db->last_query();exit;
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }
    
    //all teachers info check
    public function read_teacher_information($username) {
        $this->db->select('users.*,teachers.name');
        $this->db->from('users');
        $this->db->join('teachers', 'teachers.id = users.user_id');
        $this->db->where('users.username', $username);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }
    
    // all accountect info check
    public function read_accountant_information($username) {
        $this->db->select('users.*,accountants.name');
        $this->db->from('users');
        $this->db->join('accountants', 'accountants.id = users.user_id');
        $this->db->where('users.username', $username);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }
// all librain info
    
    public function read_librarian_information($username) {
        $this->db->select('users.*,librarians.name');
        $this->db->from('users');
        $this->db->join('librarians', 'librarians.id = users.user_id');
        $this->db->where('users.username', $username);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }
    //libr password chnage
    public function checkOldPass($data) {
        $this->db->where('id', $data['user_id']);
        $this->db->where('password', $data['current_pass']);
        $query = $this->db->get('users');
        if ($query->num_rows() > 0)
            return TRUE;
        else
            return FALSE;
    }
//    save new libr pass/
    public function saveNewPass($data) {
        $this->db->where('id', $data['id']);
        $query = $this->db->update('users', $data);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
    //studdent pass chng

     public function checkOldUsername($data) {
        $this->db->where('id', $data['user_id']);
        $this->db->where('username', $data['username']);
        $query = $this->db->get('users');
        if ($query->num_rows() > 0)
            return TRUE;
        else
            return FALSE;
    }
    
    public function checkUserNameExist($data) {
        $this->db->where('role', $data['role']);
        $this->db->where('username', $data['new_username']);
        $query = $this->db->get('users');
        if ($query->num_rows() > 0)
            return TRUE;
        else
            return FALSE;
    }
    
     public function saveNewUsername($data) {
        $this->db->where('id', $data['id']);
        $query = $this->db->update('users', $data);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
    
    public function checkLoginParent($data) {
        $sql = "SELECT users.*,students.admission_no,students.admission_no ,students.guardian_name, students.roll_no,students.admission_date,students.firstname, students.lastname,students.image,students.father_pic,students.mother_pic,students.guardian_pic,students.guardian_relation, students.mobileno, students.email ,students.state , students.city , students.pincode , students.religion, students.dob ,students.current_address, students.permanent_address FROM `users` INNER JOIN (select * from students) as students on students.parent_id= users.id WHERE `username` = " . $this->db->escape($data['username']) . " AND `password` = " . $this->db->escape($data['password']) . " LIMIT 0,1";
        $query = $this->db->query($sql);
       // echo $this->db->last_query();exit;
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }
    
     public function getUserLoginDetails($student_id) {

        $sql = "SELECT users.* FROM users WHERE user_id =" . $student_id . " and role = 'student'";
        $query = $this->db->query($sql);
        return $query->row_array();
    }
    
     public function getParentLoginDetails($student_id) {
        
        $sql = "SELECT users.* FROM `users` join students on students.parent_id = users.id WHERE students.id = " . $student_id;
        $query = $this->db->query($sql);
        return $query->row_array();
    }
}