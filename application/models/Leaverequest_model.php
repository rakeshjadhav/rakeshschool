<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Leaverequest_model extends CI_model {

    public function __construct() {
        parent::__construct();
        $this->current_session = $this->setting_model->getCurrentSession();
        $this->current_session_name = $this->setting_model->getCurrentSessionName();
        $this->start_month = $this->setting_model->getStartMonth();
    }

public function user_leave_request($id = null) {
      $query = $this->db->select('employee.name,employee.surname,employee.employee_id,employee_leave_request.*,leave_types.type')
              ->join("employee", "employee.id = employee_leave_request.staff_id")
              ->join("leave_types", "leave_types.id = employee_leave_request.leave_type_id")
              ->where("employee.is_active", "1")
              ->where("employee.id", $id)
              ->order_by("employee_leave_request.id", "desc")
              ->get("employee_leave_request");
       return  $query->result_array();
         //echo $this->db->last_query();exit;
    }
    
    public function allotedLeaveType($id) {
        $query = $this->db->select('employee_leave_details.*,leave_types.type,leave_types.id as typeid')->where(array('staff_id' => $id))->join("leave_types", "employee_leave_details.leave_type_id = leave_types.id")->group_by("leave_types.id")->get("employee_leave_details");
        return   $query->result_array();
        // echo $this->db->last_query();exit;
    }
    
    public function countLeavesData($staff_id, $leave_type_id) {
        $query1 = $this->db->select('sum(leave_days) as approve_leave')->where(array('staff_id' => $staff_id, 'status' => 'approve', 'leave_type_id' => $leave_type_id))->get("employee_leave_request");
        return $query1->row_array();
    }
     public function staff_leave_request($id = null) {

        if ($id != null) {
            $this->db->where("employee_leave_request.staff_id", $id);
        }

        $query = $this->db->select('employee.name,employee.surname,employee.employee_id,employee_leave_request.*,leave_types.type')->join("employee", "employee.id = employee_leave_request.staff_id")->join("leave_types", "leave_types.id = employee_leave_request.leave_type_id")->where("employee.is_active", "1")->order_by("employee_leave_request.id", "desc")->get("employee_leave_request");

        return $query->result_array();
    }
    
    function addLeaveRequest($data) {
        if (isset($data['id'])) {
            $this->db->where("id", $data["id"]);
            $this->db->update("employee_leave_request", $data);
        } else {
            $this->db->insert("employee_leave_request", $data);
        }
    }
}