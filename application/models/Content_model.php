<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Content_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->current_session = $this->setting_model->getCurrentSession();
    }

    public function get($id = null) {
        $this->db->select('contents.*,classes.class')->from('contents');
        $this->db->join('classes', 'contents.class_id = classes.id', 'left outer');
        if ($id != null) {
            $this->db->where('contents.id', $id);
        }
        $this->db->order_by('contents.id', "desc");
        $this->db->limit(10);
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
            $this->db->update('contents', $data);
        } else {
            $this->db->insert('contents', $data);
            return $this->db->insert_id();
        }
    }
    
    //assigments
     public function getListByCategory($category) {
        $this->db->select('contents.*,classes.class')->from('contents');
        $this->db->join('classes', 'contents.class_id = classes.id', 'left outer');
        $this->db->where('contents.type', $category);
        $this->db->order_by('contents.id');
        $query = $this->db->get();
        return $query->result_array();
    }
    //student login content
    public function getListByCategoryforUser($class_id, $category) {
        $query = "SELECT * FROM `contents` WHERE (class_id =$class_id and type='$category') or (is_public='yes' and type='$category')";
        $query = $this->db->query($query);
        return $query->result_array();
    }
}