<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Vehroute_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->current_session = $this->setting_model->getCurrentSession();
    }
    
    public function get($id = null) {
        $this->db->select('vehicle_routes.*,transport_route.route_title,transport_route.fare')->from('vehicle_routes');
        $this->db->join('transport_route', 'transport_route.id = vehicle_routes.route_id');
        $this->db->group_by('vehicle_routes.route_id');
        if ($id != null) {
            $this->db->where('vehicle_routes.id', $id);
        } else {
            $this->db->order_by('vehicle_routes.id', 'DESC');
        }

        $query = $this->db->get();
        if ($id != null) {
            $vehicle_routes = $query->result_array();

            $array = array();
            if (!empty($vehicle_routes)) {
                foreach ($vehicle_routes as $vehicle_key => $vehicle_value) {
                    $vec_route = new stdClass();
                    $vec_route->id = $vehicle_value['id'];
                    $vec_route->route_title = $vehicle_value['route_title'];
                    $vec_route->fare = $vehicle_value['fare'];
                    $vec_route->route_id = $vehicle_value['route_id'];
                    $vec_route->vehicles = $this->getVechileByRoute($vehicle_value['route_id']);
                    $array[] = $vec_route;
                }
            }
            return $array;
        } else {
            $vehicle_routes = $query->result_array();
            $array = array();
            if (!empty($vehicle_routes)) {
                foreach ($vehicle_routes as $vehicle_key => $vehicle_value) {

                    $vec_route = new stdClass();
                    $vec_route->id = $vehicle_value['id'];
                    $vec_route->route_title = $vehicle_value['route_title'];
                    $vec_route->fare = $vehicle_value['fare'];
                    $vec_route->route_id = $vehicle_value['route_id'];
                    $vec_route->vehicles = $this->getVechileByRoute($vehicle_value['route_id']);
                    $array[] = $vec_route;
                }
            }
            return $array;
        }
    }
    
    public function listroute() {

        $listroute = $this->route_model->listroute();
        if (!empty($listroute)) {
            foreach ($listroute as $route_key => $route_value) {
                $vehicles = $this->getVechileByRoute($route_value['id']);
                $listroute[$route_key]['vehicles'] = $vehicles;
            }
        }
        return $listroute;
    }
}
