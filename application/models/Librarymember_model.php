<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Librarymember_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
public function get() {
        $query = "SELECT libarary_members.id as `lib_member_id`,libarary_members.library_card_no,libarary_members.member_type,students.admission_no,students.firstname,students.lastname,students.guardian_phone,null as `teacher_name`,null as `teacher_email`,null as `teacher_sex`,null as `teacher_phone` FROM `libarary_members` INNER JOIN students on libarary_members.member_id= students.id WHERE libarary_members.member_type='student' UNION SELECT libarary_members.id as `lib_member_id`,libarary_members.library_card_no,libarary_members.member_type,null,null,null,null,teachers.name,teachers.email,teachers.sex,teachers.phone FROM `libarary_members` INNER JOIN teachers on libarary_members.member_id= teachers.id WHERE libarary_members.member_type='teacher'";
        $query = $this->db->query($query);
        return $query->result_array();
    }
    
    function getTeacherData($id) {
        $this->db->select('libarary_members.id as `lib_member_id`,libarary_members.library_card_no,libarary_members.member_type,teachers.*');
        $this->db->from('libarary_members');
        $this->db->join('teachers', 'libarary_members.member_id = teachers.id');
        $this->db->where('libarary_members.id', $id);

        $query = $this->db->get();
        $result = $query->row();
        return $result;
    }

    function getStudentData($id) {
        $this->db->select('libarary_members.id as `lib_member_id`,libarary_members.library_card_no,libarary_members.member_type,students.*');
        $this->db->from('libarary_members');
        $this->db->join('students', 'libarary_members.member_id = students.id');
        $this->db->where('libarary_members.id', $id);
        $query = $this->db->get();
        $result = $query->row();
        return $result;
    }
    
    
     public function checkIsMember($member_type, $id) {
        $this->db->select()->from('libarary_members');

        $this->db->where('libarary_members.member_id', $id);
        $this->db->where('libarary_members.member_type', $member_type);

        $query = $this->db->get();

        $result = $query->num_rows();
        if ($result > 0) {
            $row = $query->row();
            $book_lists = $this->bookissue_model->book_issuedByMemberID($row->id);
            return $book_lists;
        } else {
            return false;
        }
    }

    public function getByMemberID($id = null) {
        $this->db->select()->from('libarary_members');
        if ($id != null) {
            $this->db->where('libarary_members.id', $id);
        }
        $query = $this->db->get();
        if ($id != null) {
            $result = $query->row();
            if ($result->member_type == "student") {
                $return = $this->getStudentData($result->id);
            } else {
                $return = $this->getTeacherData($result->id);
            }
            return $return;
        }
    }
    
}