<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Librarymanagement_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get($id = null) {
        $this->db->select()->from('libarary_members');
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
            $this->db->update('libarary_members', $data);
        } else {
            $this->db->insert('libarary_members', $data);
            $insert_id = $this->db->insert_id();

            return $insert_id;
        }
    }

}