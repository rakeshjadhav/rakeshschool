<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Division_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

     public function get($id = null) {
        $this->db->select()->from('division');
        if ($id != null) {
            $this->db->where('id', $id);
        } else {
            $this->db->order_by('id');
        }
        $query = $this->db->get();
        if ($id != null) {
            return $query->row_array(); // single row
        } else {
            return $query->result_array(); // array of result
        }
    }
    //add division
    public function add($data) {
//           var_dump($data);exit;
        if (isset($data['id'])) {
            $this->db->where('id', $data['id']);
            $this->db->update('division', $data);
        } else {
            $this->db->insert('division', $data);
        }
    }
    
    public function remove($id) {
        $this->db->where('id', $id);
        $this->db->delete('division');
    }
    
     public function getClassBySection($classid) {
        $this->db->select('class_division.id,class_division.division_id,division.division');
        $this->db->from('class_division');
        $this->db->join('division', 'division.id = class_division.division_id');
        $this->db->where('class_division.class_id', $classid);
        $this->db->order_by('class_division.id');
        $query = $this->db->get();
        return $query->result_array();
    }
}