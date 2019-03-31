<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Grade_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->current_session = $this->setting_model->getCurrentSession();
    }

    public function get($id = null) {
        $this->db->select()->from('grades');
        if ($id != null) {
            $this->db->where('grades.id', $id);
        } else {
            $this->db->order_by('grades.id');
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
            $this->db->update('grades', $data);
        } else {
            $this->db->insert('grades', $data);
            return $this->db->insert_id();
        }
    }
    public function remove($id) {
        $this->db->where('id', $id);
        $this->db->delete('grades');
    }

   

}