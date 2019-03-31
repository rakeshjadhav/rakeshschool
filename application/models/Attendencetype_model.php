<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Attendencetype_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    public function get($id = null) {
        $this->db->select()->from('attendence_type');
        if ($id != null) {
            $this->db->where('id', $id);
        } else {
            $this->db->where('is_active', 'yes');
            $this->db->order_by('id');
        }
        $query = $this->db->get();
        if ($id != null) {
            return $query->row_array();
        } else {
            return $query->result_array();
        }
    }
    
    public function getStudentAttendence($date, $student_session_id) {
        $sql = "SELECT attendence_type.type FROM `student_attendences`
INNER JOIN attendence_type ON attendence_type.id=student_attendences.attendence_type_id where  student_attendences.`student_session_id`=" . $this->db->escape($student_session_id) . " and student_attendences.date=" . $this->db->escape($date);
        $query = $this->db->query($sql);
        return  $query->row();
        // echo $this->db->last_query();exit;
    }
}