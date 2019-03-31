<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Studenttransportfee_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->current_session = $this->setting_model->getCurrentSession();
        $this->current_date = $this->setting_model->getDateYmd();
    }

    public function add($data) {
        if (isset($data['id'])) {
            $this->db->where('id', $data['id']);
            $this->db->update('student_transport_fees', $data);
        } else {
            $this->db->insert('student_transport_fees', $data);
            return $this->db->insert_id();
        }
    }
     public function getTransportFeeByStudent($student_session_id = null) {
        $this->db->select()->from('student_transport_fees');
        $this->db->where('student_session_id', $student_session_id);
        $this->db->order_by('id');
        $query = $this->db->get();
        return $query->result_array();
    }
}