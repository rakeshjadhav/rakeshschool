<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Route_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->current_session = $this->setting_model->getCurrentSession();
    }
    
    
      public function get($id = null) {
        $this->db->select()->from('transport_route');
        if ($id != null) {
            $this->db->where('transport_route.id', $id);
        } else {
            $this->db->order_by('transport_route.id');
        }
        $query = $this->db->get();
        if ($id != null) {
            return $query->row_array();
        } else {
            return $query->result_array();
        }
    }
    
     
    public function listroute() {
        $this->db->select()->from('transport_route');
        $listtransport = $this->db->get();
        return $listtransport->result_array();
    }
    
}