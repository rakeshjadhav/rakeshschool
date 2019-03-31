<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Teacher_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function get($id = null) {
        $this->db->select()->from('teachers');
        if ($id != null) {
            $this->db->where('id', $id);
        } else {
            $this->db->order_by('id');
        }
        $query = $this->db->get();
        if ($id != null) {
            return $query->row_array();
        } else {
            return $query->result_array();
        }
    }
    
    public function add($data) {
        if (isset($data['id'])) {
            $this->db->where('id', $data['id']);
            $this->db->update('teachers', $data);
        } else {
            $this->db->insert('teachers', $data);
            return $this->db->insert_id();
        }
    }
    
     public function remove($id) {
        $this->db->where('id', $id);
        $this->db->delete('teachers');
    }
    // all lib teachers
       public function getLibraryTeacher() {
        $this->db->select('teachers.*, IFNULL(libarary_members.id,0) as `libarary_member_id`, IFNULL(libarary_members.library_card_no,0) as `library_card_no`')->from('teachers');

        $this->db->join('libarary_members', 'libarary_members.member_id = teachers.id and libarary_members.member_type = "teacher"', 'left');

        $this->db->order_by('teachers.id');

        $query = $this->db->get();
        return $query->result_array();
    }
}
    