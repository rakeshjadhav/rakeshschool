<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Hostel_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->current_session = $this->setting_model->getCurrentSession();
    }

    /**
     * This funtion takes id as a parameter and will fetch the record.
     * If id is not provided, then it will fetch all the records form the table.
     * @param int $id
     * @return mixed
     */
    public function get($id = null) {
        $this->db->select()->from('hostel');
        if ($id != null) {
            $this->db->where('hostel.id', $id);
        } else {
            $this->db->order_by('hostel.id');
        }
        $query = $this->db->get();
        if ($id != null) {
            return $query->row_array();
        } else {
            return $query->result_array();
        }
    }

    public function listhostel() {
        $this->db->select()->from('hostel');
        $listhostel = $this->db->get();
        return $listhostel->result_array();
    }
    
}