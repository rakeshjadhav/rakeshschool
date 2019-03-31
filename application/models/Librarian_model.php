<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Librarian_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get($id = null) {
        $this->db->select('librarians.*,users.id as `user_tbl_id`,users.username,users.password as `user_tbl_password`,users.is_active as `user_tbl_active`');
        $this->db->from('librarians');
        $this->db->join('users', 'users.user_id = librarians.id', 'left');
        $this->db->where('users.role', 'librarian');
        if ($id != null) {
            $this->db->where('librarians.id', $id);
        } else {
            $this->db->order_by('librarians.id');
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
            $this->db->update('librarians', $data);
        } else {
            $this->db->insert('librarians', $data);
            return $this->db->insert_id();
        }
    }

}