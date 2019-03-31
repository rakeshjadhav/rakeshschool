<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Hostelroom_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->current_session = $this->setting_model->getCurrentSession();
    }

    public function get($id = null) {
        $this->db->select()->from('hostel_rooms');
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
    
    public function lists() {
        $this->db->select('hostel_rooms.*,b.hostel_name,c.room_type');
        $this->db->from('hostel_rooms');
        $this->db->join('hostel b', 'b.id=hostel_rooms.hostel_id');
        $this->db->join('room_types c', 'c.id=hostel_rooms.room_type_id');
        $listroomtype = $this->db->get();
        return $listroomtype->result_array();
    }

}