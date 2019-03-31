<?php

class Staff_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function get($id = null) {

        $this->db->select('employee.*,roles.name as user_type,roles.id as role_id')->from('employee')->join("staff_roles", "staff_roles.staff_id = employee.id", "left")->join("roles", "staff_roles.role_id = roles.id", "left");
        if ($id != null) {
            $this->db->where('employee.id', $id);
        } else {
            $this->db->where('employee.is_active', 1);
            $this->db->order_by('employee.id');
        }
        $query = $this->db->get();
        //echo $this->db->last_query();exit;
        if ($id != null) {
            return $query->row_array();
        } else {
            return $query->result_array();
        }
    }
    
     public function searchFullText($searchterm, $active) {
        $query = $this->db->query("SELECT `employee`.*, `staff_designation`.`designation` as `designation`, `department`.`department_name` as `department`,`roles`.`name` as user_type  FROM `employee` LEFT JOIN `staff_designation` ON `staff_designation`.`id` = `employee`.`designation` LEFT JOIN `staff_roles` ON `staff_roles`.`staff_id` = `employee`.`id` LEFT JOIN `roles` ON `staff_roles`.`role_id` = `roles`.`id` LEFT JOIN `department` ON `department`.`id` = `employee`.`department` WHERE  `employee`.`is_active` = '$active' and (`employee`.`name` LIKE '%$searchterm%' ESCAPE '!' OR `employee`.`surname` LIKE '%$searchterm%' ESCAPE '!' OR `employee`.`employee_id` LIKE '%$searchterm%' ESCAPE '!' OR `employee`.`local_address` LIKE '%$searchterm%' ESCAPE '!'  OR `employee`.`contact_no` LIKE '%$searchterm%' ESCAPE '!' OR `employee`.`email` LIKE '%$searchterm%' ESCAPE '!')");
        return $query->result_array();
    }
    
    public function getStaffRole($id = null) {

         $userdata = $this->customlib->getUserData();
        if($userdata["role_id"] != 7){
            $this->db->where("id !=", 7);
        }
        $this->db->select('roles.id,roles.name as type')->from('roles');
        if ($id != null) {
            $this->db->where('id', $id);
        } else {
            $this->db->order_by('id');
        }
        $this->db->where("is_active", "yes");
        $query = $this->db->get();
        if ($id != null) {
            return $query->row_array();
        } else {
            return $query->result_array();
        }
    }
    
    public function getEmployee($role, $active = 1) {
        $query = $this->db->select("employee.*,staff_designation.designation,department.department_name as department,roles.name as user_type")
                ->join('staff_designation', "staff_designation.id = employee.designation", "left")
                ->join('staff_roles', "staff_roles.staff_id = employee.id", "left")
                ->join('roles', "roles.id = staff_roles.role_id", "left")
                ->join('department', "department.id = employee.department", "left")
                ->where("employee.is_active", $active)
                ->where("roles.name", $role)
                ->get("employee");
        return $query->result_array();
    }
    
    
    function getEmployeeByRoleID($role, $active = 1) {
        $query = $this->db->select("employee.*,staff_designation.designation,department.department_name as department, roles.id as role_id, roles.name as role")
                ->join('staff_designation', "staff_designation.id = employee.designation", "left")
                ->join('staff_roles', "staff_roles.staff_id = employee.id", "left")
                ->join('roles', "roles.id = staff_roles.role_id", "left")
                ->join('department', "department.id = employee.department", "left")
                ->where("employee.is_active", $active)
                ->where("roles.id", $role)
                ->get("employee");
        return $query->result_array();
    }
    
    public function valid_email_id($str) {
        $email = $this->input->post('email');
        $id = $this->input->post('employee_id');
        $staff_id = $this->input->post('editid');
        if (!isset($id)) {
            $id = 0;
        }
        if (!isset($staff_id)) {
            $staff_id = 0;
        }

        if ($this->check_email_exists($email, $id, $staff_id)) {
            $this->form_validation->set_message('check_exists', 'Email already exists');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    function check_email_exists($email, $id, $staff_id) {

        if ($staff_id != 0) {
            $data = array('id != ' => $staff_id, 'email' => $email);
            $query = $this->db->where($data)->get('staff');
            if ($query->num_rows() > 0) {
                return TRUE;
            } else {
                return FALSE;
            }
        } else {

            $this->db->where('email', $email);
            $query = $this->db->get('staff');
            if ($query->num_rows() > 0) {
                return TRUE;
            } else {
                return FALSE;
            }
        }
    }
    
     public function valid_employee_id($str) {
        $name = $this->input->post('name');
        $id = $this->input->post('employee_id');
        $staff_id = $this->input->post('editid');

        if((!isset($id)))  {
            $id = 0;
        }
        if (!isset($staff_id)) {
            $staff_id = 0;
        }
        if ($this->check_data_exists($name, $id, $staff_id)) {
            $this->form_validation->set_message('username_check', 'Record already exists');
            return FALSE;
           
        } else {
           
            return TRUE;
        }
       
    }
     function check_data_exists($name, $id, $staff_id) {
        if ($staff_id != 0) {
            $data = array('id != ' => $staff_id, 'employee_id' => $id);
            $query = $this->db->where($data)->get('staff');
            if ($query->num_rows() > 0) {
                return TRUE;
            } else {
                return FALSE;
            }
        } else {

            $this->db->where('employee_id', $id);
            $query = $this->db->get('staff');
            if ($query->num_rows() > 0) {
                return TRUE;
            } else {
                return FALSE;
            }
        }
    }
    
    public function getStaffDesignation() {
        $query = $this->db->select('*')->where("is_active", "yes")->get("staff_designation");

        return $query->result_array();
    }

    public function getDepartment() {
        $query = $this->db->select('*')->where("is_active", "yes")->get('department');
        return $query->result_array();
    }
    //pass ency
     function passHashEnc($password) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        return $hashed_password;
    }
    
    public function batchInsert($data, $roles = array(), $leave_array = array()) {

        $this->db->trans_start();
        $this->db->trans_strict(FALSE);

        $this->db->insert('employee', $data);
        $staff_id = $this->db->insert_id();
        $roles['staff_id'] = $staff_id;
        $this->db->insert_batch('staff_roles', array($roles));

        if(!empty($leave_array)){
        foreach ($leave_array as $key => $value) {
            $leave_array[$key]['staff_id'] = $staff_id;
        }

        $this->db->insert_batch('employee_leave_details', $leave_array);
        }
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {

            $this->db->trans_rollback();
            return FALSE;
        } else {

            $this->db->trans_commit();
            return $staff_id;
        }
    }
    public function add($data) {

        if (isset($data['id'])) {
            $this->db->where('id', $data['id']);
            $this->db->update('employee', $data);
        } else {
            $this->db->insert('employee', $data);
            return $this->db->insert_id();
        }
    }
    
    function getProfile($id) {
        $this->db->select('employee.*,staff_designation.designation as designation,staff_roles.role_id, department.department_name as department,roles.name as user_type');
        $this->db->join("staff_designation", "staff_designation.id = employee.designation", "left");
        $this->db->join("department", "department.id = employee.department", "left");
        $this->db->join("staff_roles", "staff_roles.staff_id = employee.id", "left");
        $this->db->join("roles", "staff_roles.role_id = roles.id", "left");
        $this->db->where("employee.id", $id);
        $this->db->from('employee');
        $query = $this->db->get();
        return $query->row_array();
    }
function getStaffbyrole($id) {

        $this->db->select('employee.*,staff_designation.designation as designation,staff_roles.role_id, department.department_name as department,roles.name as user_type');
        $this->db->join("staff_designation", "staff_designation.id = employee.designation", "left");
        $this->db->join("department", "department.id = employee.department", "left");
        $this->db->join("staff_roles", "staff_roles.staff_id = employee.id", "left");
        $this->db->join("roles", "staff_roles.role_id = roles.id", "left");
        $this->db->where("staff_roles.role_id", $id);
        $this->db->where("employee.is_active", "1");
        $this->db->from('employee');
        $query = $this->db->get();

        return $query->result_array();
    }

    public function getLeaveType($id = null) {

        $this->db->select()->from('leave_types');
        if ($id != null) {
            $this->db->where('id', $id);
        } else {
            $this->db->where('is_active', 'yes');
            $this->db->order_by('id');
        }
        $query = $this->db->get();
        if ($id != null) {
            return $query->row_array();
        } else {
            return $query->result_array();
        }
    }

    
    public function getPayroll($id = null) {

        $this->db->select()->from('staff_payroll');
        if ($id != null) {
            $this->db->where('id', $id);
        } else {
            $this->db->order_by('id');
        }
        $query = $this->db->get();
        if ($id != null) {
            return $query->row_array();
        } else {
            return $query->result_array();
        }
    }
    
    public function getLeaveDetails($id) {
        $query = $this->db->select('employee_leave_details.alloted_leave,employee_leave_details.id as altid,leave_types.type,leave_types.id')->join("leave_types", "employee_leave_details.leave_type_id = leave_types.id", "inner")->where("employee_leave_details.staff_id", $id)->get("employee_leave_details");
        return $query->result_array();
    }
    public function update_role($role_data) {
        $this->db->where("staff_id", $role_data["staff_id"])->update("staff_roles", $role_data);
    }
    
    public function add_staff_leave_details($data2) {

        if (isset($data2['id'])) {
            $this->db->where('id', $data2['id']);
            $this->db->update('employee_leave_details', $data2);
        } else {
            $this->db->insert('employee_leave_details', $data2);
            return $this->db->insert_id();
        }
    }
    
    public function getStaffPayroll($id) {

        $this->db->select('*');
        $this->db->from('staff_payslip');
        $this->db->where('staff_id', $id);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function allotedLeaveType($id) {
        $query = $this->db->select('employee_leave_details.*,leave_types.type')->where(array('staff_id' => $id))->join("leave_types", "employee_leave_details.leave_type_id = leave_types.id")->get("employee_leave_details");
        return $query->result_array();
    }

    
    public function getAll($id = null, $is_active = null) {

        $this->db->select("employee.*,staff_designation.designation,department.department_name as department, roles.id as role_id, roles.name as role");
        $this->db->from('employee');
        $this->db->join('staff_designation', "staff_designation.id = employee.designation", "left");
        $this->db->join('staff_roles', "staff_roles.staff_id = employee.id", "left");
        $this->db->join('roles', "roles.id = staff_roles.role_id", "left");
        $this->db->join('department', "department.id = employee.department", "left");




        if ($id != null) {
            $this->db->where('employee.id', $id);
        } else {
            if ($is_active != null) {

                $this->db->where('employee.is_active', $is_active);
            }
            $this->db->order_by('employee.id');
        }
        $query = $this->db->get();
        if ($id != null) {
            return $query->row_array();
        } else {
            return $query->result_array();
        }
    }
    
    //leave details
    function getLeaveRecord($id) {
        $query = $this->db->select('leave_types.type,leave_types.id as lid,employee.name,employee.id as staff_id,employee.surname,roles.name as user_type,employee.employee_id,employee_leave_request.*')
                           ->join("leave_types", "leave_types.id = employee_leave_request.leave_type_id")
                           ->join("employee", "employee.id = employee_leave_request.staff_id")
                             ->join("staff_roles", "employee.id = staff_roles.staff_id")
                              ->join("roles", "staff_roles.role_id = roles.id")
                                 ->where("employee_leave_request.id", $id)->get("employee_leave_request");

        return $query->row();
    }
}