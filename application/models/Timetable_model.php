<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Timetable_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function get($data) {
        $query = $this->db->get_where('timetables', $data);
        return $query->result_array();
    }
    
    public function add($data) {
        if (($data['id']) != 0) {
            $this->db->where('id', $data['id']);
            $this->db->update('timetables', $data); // update the record
        } else {
            $this->db->insert('timetables', $data); // insert new record
            return $this->db->insert_id();
        }
    }
    
}