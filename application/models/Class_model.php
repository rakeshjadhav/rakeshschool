<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Class_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    //chnage create student wise class
    public function get($id = null, $classteacher = null) {
        $userdata = $this->customlib->getUserData();
       // var_dump($userdata);exit;
        $role_id = $userdata["role_id"];
        $carray = array();
        if (isset($role_id) && ($userdata["role_id"] == 2) && ($userdata["class_teacher"] == "yes")) {
            if ($classteacher == 'yes') {
                $classlist = $this->customlib->getclassteacher($userdata["id"]);
            } else {
                $classlist = $this->customlib->getClassbyteacher($userdata["id"]);
            }
        } else {
            $this->db->select()->from('classes');
            if ($id != null) {
                $this->db->where('id', $id);
            } else {
                $this->db->order_by('id');
            }
            $query = $this->db->get();
            if ($id != null) {
                $classlist = $query->row_array();
            } else {
                $classlist = $query->result_array();
            }
        }

        return $classlist;
    }
    //chek all ready data avilable
    public function class_exists($str) {

        $class = $this->security->xss_clean($str);
        $res = $this->check_data_exists($class);
        if ($res) {
            $pre_class_id = $this->input->post('pre_class_id');
            if (isset($pre_class_id)) {
                if ($res->id == $pre_class_id) {
                    return TRUE;
                }
            }
            $this->form_validation->set_message('class_exists', 'Record already exists');
            return FALSE;
        } else {
            return TRUE;
        }
    }
    
       function check_data_exists($data) {
        $this->db->where('class', $data);
        $query = $this->db->get('classes');
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return FALSE;
        }
    }
    //assign class wise teacher
    public function class_teacher_exists($str){
        
        $class = $this->input->post('class');
        $division = $this->input->post('section');
        $teachers = $this->input->post('teachers');
       // $class = $this->security->xss_clean($str);
        $res = $this->check_classteacher_exists($class,$division,$teachers);
        if ($res) {
            $pre_class_id = $this->input->post('pre_class_id');
            if (isset($pre_class_id)) {
                if ($res->id == $pre_class_id) {
                    return TRUE;
                }
            }
            $this->form_validation->set_message('class_exists', 'Record already exists');
            return FALSE;
        } else {
            return TRUE;
        }

    }
    public function check_classteacher_exists($class,$division,$teacher){
        
        $this->db->where(array('class_id' =>$class ,'division_id' =>$division) );
        $this->db->where_in('staff_id',$teacher);
        $query = $this->db->get('class_teacher');
        if ($query->num_rows() > 0) {
          return $query->row();
        } else {
           return FALSE;
        }  
        exit();
    }
    
    public function getClassTeacher() {
        $query = $this->db->select('employee.*,class_teacher.id as ctid,classes.class,classes.id as class_id,division.id as division_id,division.division')->join("employee", "class_teacher.staff_id = employee.id")->join("classes", "class_teacher.class_id = classes.id")->join("division", "class_teacher.division_id = division.id")->group_by("class_teacher.class_id, class_teacher.division_id")->get("class_teacher");

        return $query->result_array();
    }
    public function remove($id) {
        $this->db->trans_begin();
        $this->db->where('id', $id);
        $this->db->delete('classes'); //class record delete.
        $this->db->where('class_id', $id);
        $this->db->delete('class_division'); //class_sections record delete.

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
        } else {
            $this->db->trans_commit();
        }
        return TRUE;
    }
}