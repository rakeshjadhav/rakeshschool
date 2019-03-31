<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Cms_program_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->current_session = $this->setting_model->getCurrentSession();
    }
    
    function getByCategory($category = null, $params = array()) {
        $this->db->select('*');
        $this->db->from('front_cms_programs');
        $this->db->order_by('created_at', 'desc');
        $this->db->where('type', $category);
        if (array_key_exists("start", $params) && array_key_exists("limit", $params)) {
            $this->db->limit($params['limit'], $params['start']);
        } elseif (!array_key_exists("start", $params) && array_key_exists("limit", $params)) {
            $this->db->limit($params['limit']);
        }

        $query = $this->db->get();

        return ($query->num_rows() > 0) ? $query->result_array() : FALSE;
    }
}