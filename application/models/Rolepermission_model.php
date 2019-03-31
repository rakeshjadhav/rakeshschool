<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Rolepermission_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
     public function getPermissionByRole($role_id) {
        $this->db->select('`roles_permissions`.*, permission_category.id as permission_category_id,permission_category.name as permission_category_name,permission_category.short_code as permission_category_code');
        $this->db->from('roles_permissions');
        
        $this->db->join('permission_category', 'permission_category.id=roles_permissions.perm_cat_id');
        $this->db->where('roles_permissions.role_id', $role_id);
        $query = $this->db->get();
        return $query->result();
    }
}