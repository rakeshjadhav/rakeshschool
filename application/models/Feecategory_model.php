<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class FeeCategory_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }


    public function get($id = null, $order = "desc") {
        $this->db->select()->from('feecategory');
        if ($id != null) {
            $this->db->where('id', $id);
        } else {

            $this->db->order_by('id ' . $order);
        }
        $query = $this->db->get();
        if ($id != null) {
            return $query->row_array();
        } else {
            return $query->result_array();
        }
    }

    
}