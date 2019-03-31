<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Category_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    //create student
    
    public function get($id = null) {
        $this->db->select()->from('categories');
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
            $this->db->update('categories', $data);
        } else {
            $this->db->insert('categories', $data);
            return $this->db->insert_id();
        }
    }
    
     public function remove($id) {
        $this->db->where('id', $id);
        $this->db->delete('categories');
    }
    
}