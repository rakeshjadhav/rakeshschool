<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class roomtype_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->current_session = $this->setting_model->getCurrentSession();
    }
    public function get($id = null) {
        $this->db->select();
        $this->db->from('room_types');
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

    
}