<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Classsdivision_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    public function getByID($id = null) {
        $this->db->select('classes.*')->from('classes');
        if ($id != null) {
            $this->db->where('classes.id', $id);
        } else {
            $this->db->order_by('classes.id', 'DESC');
        }
        $query = $this->db->get();
        if ($id != null) {
            $vehicle_routes = $query->result_array();
          
            $array = array();
            if (!empty($vehicle_routes)) {
                foreach ($vehicle_routes as $vehicle_key => $vehicle_value) {
                    $vec_route = new stdClass();
                    $vec_route->id = $vehicle_value['id'];
                    $vec_route->route_id = $vehicle_value['class'];
                    $vec_route->vehicles = $this->getVechileByRoute($vehicle_value['id']);
                    $array[] = $vec_route;
                }
            }
            return $array;
        }else {
            $vehicle_routes = $query->result_array();
            $array = array();
            if (!empty($vehicle_routes)) {
                foreach ($vehicle_routes as $vehicle_key => $vehicle_value) {
                    $vec_route = new stdClass();
                    $vec_route->id = $vehicle_value['id'];
                    $vec_route->class = $vehicle_value['class'];
                    $vec_route->vehicles = $this->getVechileByRoute($vehicle_value['id']);
                    $array[] = $vec_route;
                }
            }
            return $array;
        }
    }
    
    public function getVechileByRoute($route_id) {
        $this->db->select('class_division.id as class_division_id,class_division.class_id,class_division.division_id,division.*')->from('class_division');
        $this->db->join('division', 'division.id = class_division.division_id');
        $this->db->where('class_division.class_id', $route_id);
        $this->db->order_by('class_division.id', 'asc');
        $query = $this->db->get();
        return $vehicle_routes = $query->result();
    }
      
    //classes add 
    public function add($data,$division) {
        $this->db->trans_begin();
        if (isset($data['id'])) {
            $this->db->where('id', $data['id']);
            $this->db->update('classes', $data);
            $class_id = $data['id'];
        } else {
          $this->db->insert('classes',$data); 
              $class_id= $this->db->insert_id();
        }
        $division_array = array();
        foreach ($division as $vec_key => $vec_value) {
            $vehicle_array = array(
                'class_id' => $class_id,
                'division_id' => $vec_value,
            );
            $division_array[] = $vehicle_array;
        }
        $this->db->insert_batch('class_division', $division_array);
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
        } else {
            $this->db->trans_commit();
        }
    }
    
    //class division edit
       public function update($data) {

        if (isset($data['id'])) {
            $this->db->where('id', $data['id']);
            $this->db->update('classes', $data);
        }
    }
    
    //class edit
    public function remove($class_id, $array) {
        $this->db->where('class_id', $class_id);
        $this->db->where_in('division_id', $array);
        $this->db->delete('class_division');
    }
    
    public function getDetailbyClassSection($class_id, $section_id) {
        $this->db->select('class_division.*,classes.class,division.division')->from('class_division');
        $this->db->where('class_id', $class_id);
        $this->db->where('division_id', $section_id);
        $this->db->join('classes', 'classes.id = class_division.class_id');
        $this->db->where('class_division.class_id', $class_id);
        $this->db->join('division', 'division.id = class_division.division_id');
        $this->db->where('class_division.division_id', $section_id);
        $query = $this->db->get();
//        echo $this->db->last_query();exit;
//        var_dump($query);exit;
        return $query->row_array();
    }
    
}
