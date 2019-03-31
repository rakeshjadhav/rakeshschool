<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Chapter_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

   
    public function get($id = null) {
         $this->db->select('chapter.*,classes.class,division.division,subjects.name as subjectname');
        $this->db->from('chapter');
        $this->db->join('classes ', 'classes.id = chapter.class_id','left');
         $this->db->join('subjects', 'subjects.id = chapter.subject_id','left');
        $this->db->join('division', 'division.id = chapter.division_id','left');
        if ($id != null) {
            $this->db->where('chapter.id', $id);
        } else {
          //  $this->db->where('chapter.is_active', 'yes');
            $this->db->order_by('chapter.id', 'desc');
        }
        $query = $this->db->get();
       // echo $this->db->last_query();exit;
        if ($id != null) {
            return $query->row_array();
        } else {
            return $query->result_array();
        }
    }
   public function add($data) {
        if (isset($data['id'])) {
            $this->db->where('id', $data['id']);
            $this->db->update('chapter', $data);
        } else {
            $this->db->insert('chapter', $data);
            return $this->db->insert_id();
        }
    } 
    
}