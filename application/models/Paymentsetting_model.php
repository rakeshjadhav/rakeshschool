<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Paymentsetting_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }


    public function get() {
        $this->db->select()->from('payment_settings');
        $query = $this->db->get();
        return $query->result();
    }
    
     public function getActiveMethod() {
        $this->db->select()->from('payment_settings');
        $this->db->where('is_active', 'yes');
        $query = $this->db->get();
        return $query->row();
    }
    
    
}