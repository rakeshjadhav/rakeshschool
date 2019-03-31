<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Userlog_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    //Customlib lib
      public function add($data) {
        if (isset($data['id'])) {
            $this->db->where('id', $data['id']);
            $this->db->update('userlog', $data);
        } else {
            $this->db->insert('userlog', $data);
        }
    }
}