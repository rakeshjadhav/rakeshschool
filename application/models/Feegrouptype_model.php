<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Feegrouptype_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->current_session = $this->setting_model->getCurrentSession();
    }

    public function get($id = null) {
        $this->db->select()->from('fee_groups_feetype');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row();
    }
    public function add($data) {
        if (isset($data['id'])) {
            $this->db->where('id', $data['id']);
            $this->db->update('fee_groups_feetype', $data);
        } else {
            $this->db->insert('fee_groups_feetype', $data);
            return $this->db->insert_id();
        }
    }
    
     public function remove($id) {
        $this->db->select()->from('fee_groups_feetype');
        $this->db->where('id', $id);
        $query = $this->db->get();
        $result = $query->row();
        $fee_session_group_id = $result->fee_session_group_id;
        $this->db->where('fee_session_group_id', $fee_session_group_id);
        $num_rows = $this->db->count_all_results('fee_groups_feetype');
        if ($num_rows == 1) {
            $this->db->where('id', $fee_session_group_id);
            $this->db->delete('fee_session_groups');
        }
        $this->db->where('id', $id);
        $this->db->delete('fee_groups_feetype');
    }
}