<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Module_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    function getPermission() {
        $query = $this->db->where("system", 1)->get("permission_group");
        return $query->result_array();
    }
    Public function changeStatus($data) {
        $this->db->where("id", $data["id"])->update("permission_group", $data);
    }

    
}