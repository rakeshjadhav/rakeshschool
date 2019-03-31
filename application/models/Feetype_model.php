<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Feetype_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get($id = null) {
        $this->db->select()->from('feetype');
        $this->db->where('is_system', 0);
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
// fee type exitingf
    public function check_exists($str) {
        $name = $this->security->xss_clean($str);
        $id = $this->input->post('id');
        if (!isset($id)) {
            $id = 0;
        }

        if ($this->check_data_exists($name, $id)) {
            $this->form_validation->set_message('check_exists', 'Record already exists');
            return FALSE;
        } else {
            return TRUE;
        }
    }
     function check_data_exists($name, $id) {
        $this->db->where('type', $name);
        $this->db->where('id !=', $id);

        $query = $this->db->get('feetype');
        if ($query->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
     public function add($data) {
        if (isset($data['id'])) {
            $this->db->where('id', $data['id']);
            $this->db->update('feetype', $data);
        } else {
            $this->db->insert('feetype', $data);
            return $this->db->insert_id();
        }
    }
     public function remove($id) {
        $this->db->where('id', $id);
        $this->db->where('is_system', 0);
        $this->db->delete('feetype');
    }
    
}