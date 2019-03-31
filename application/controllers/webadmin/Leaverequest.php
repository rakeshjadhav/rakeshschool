<?php

/**
 * 
 */
class Leaverequest extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->config->load("payroll");

        $this->load->model("staff_model");
        $this->load->model("leaverequest_model");
        $this->contract_type = $this->config->item('contracttype');
        $this->marital_status = $this->config->item('marital_status');
   //     $this->staff_attendance = $this->config->item('staffattendance');
     //   $this->payroll_status = $this->config->item('payroll_status');
      //  $this->payment_mode = $this->config->item('payment_mode');
        $this->status = $this->config->item('status');
    }
    
    function leaverequest() {
        if (!$this->rbac->hasPrivilege('approve_leave_request', 'can_view')) {
            access_denied();
        }

        
        $leave_request = $this->leaverequest_model->staff_leave_request();

        $data["leave_request"] = $leave_request;

        $LeaveTypes = $this->staff_model->getLeaveType();
        $userdata = $this->customlib->getUserData();

        $data["leavetype"] = $LeaveTypes;
        $staffRole = $this->staff_model->getStaffRole();
        $data["staffrole"] = $staffRole;
        $data["status"] = $this->status;

        $this->load->view("adminlogin/layout/header", $data);
        $this->load->view("adminlogin/staff/staffleaverequest", $data);
        $this->load->view("adminlogin/layout/footer", $data);
    }
    
    function countLeave($id) {
        $lid = $this->input->post("lid");
        $alloted_leavetype = $this->leaverequest_model->allotedLeaveType($id);

        $i = 0;
        $html = "<select value='' name='leave_type' id='leave_type' class='form-control'><option>Select</option>";
        $data = array();
        if (!empty($alloted_leavetype[0]["alloted_leave"])) {
            foreach ($alloted_leavetype as $key => $value) {
                $count_leaves[] = $this->leaverequest_model->countLeavesData($id, $value["leave_type_id"]);
                $data[$i]['type'] = $value["type"];
                $data[$i]['id'] = $value["leave_type_id"];
                $data[$i]['alloted_leave'] = $value["alloted_leave"];
                $data[$i]['approve_leave'] = $count_leaves[$i]['approve_leave'];


                $i++;
            }

            foreach ($data as $dkey => $dvalue) {
                if (!empty($dvalue["alloted_leave"])) {
                    if ($lid == $dvalue["id"]) {
                        $a = "selected";
                    } else {
                        $a = "";
                    }
                    //    $available  = $dvalue["alloted_leave"]-$dvalue["approve_leave"];
                    if ($dvalue["alloted_leave"] == "") {

                        $available = $dvalue["approve_leave"];
                    } else {
                        $available = $dvalue["alloted_leave"] - $dvalue["approve_leave"];
                    }
                    if ($available > 0) {

                        $html .= "<option value=" . $dvalue["id"] . " $a>" . $dvalue["type"] . " (" . $available . ")" . "</option>";
                    }
                }
            }
        }
        $html .= "</select>";
        echo $html;
    }
    
     public function add_staff_leave() {

//         var_dump($_POST);exit;
        $userdata = $this->customlib->getUserData();
        $applied_date = $this->input->post("applieddate");
        $leavetype = $this->input->post("leave_type");

        $reason = $this->input->post("reason");
        $remark = '';
        $status = 'pending';
        $request_id = $this->input->post("leaverequestid");


        $this->form_validation->set_rules('applieddate', 'Applied Date', 'trim|required');
        $this->form_validation->set_rules('leavedates', 'Leave from Date', 'trim|required');
        $this->form_validation->set_rules('leave_type', 'Leave Type', 'trim');

        if ($this->form_validation->run() == FALSE) {
            $msg = array(
                'applieddate' => form_error('applieddate'),
                'leavedates' => form_error('leavedates'),
                'leave_type' => form_error('leave_type'),
            );
           // var_dump($msg);exit;
            $array = array('status' => 'fail', 'error' => $msg, 'message' => '');
        } else {
           // $a = $this->input->post("leavedates");
            //$b = explode('-', trim($a));
           // $b=
            $leavefrom = $this->input->post("leavedates");
            $leaveto = $this->input->post("leavedates1");

            $staff_id = $userdata["id"];
            if (isset($_FILES["userfile"]) && !empty($_FILES['userfile']['name'])) {
                $uploaddir = './uploads/staff_documents/' . $staff_id . '/';
                if (!is_dir($uploaddir) && !mkdir($uploaddir)) {
                    die("Error creating folder $uploaddir");
                }
                $fileInfo = pathinfo($_FILES["userfile"]["name"]);
                $document = basename($_FILES['userfile']['name']);
                $img_name = $uploaddir . basename($_FILES['userfile']['name']);
                move_uploaded_file($_FILES["userfile"]["tmp_name"], $img_name);
            } else {

                $document = $this->input->post("filename");
            }

            $applied_by = $this->customlib->getAdminSessionUserName();
            $leave_days = $this->dateDifference($leavefrom, $leaveto);
            if (!empty($request_id)) {
                $data = array('id' => $request_id,
                    'staff_id' => $staff_id,
                    'date' => $applied_date,
                    'leave_type_id' => $leavetype,
                    'leave_days' => $leave_days,
                    'leave_from' => $leavefrom,
                    'leave_to' => $leaveto, 'employee_remark' => $reason, 'status' => $status, 'admin_remark' => $remark, 'applied_by' => $applied_by, 'document_file' => $document);
               // var_dump($data);exit;
            } else {
                $data = array('staff_id' => $staff_id, 'date' => $applied_date, 'leave_days' => $leave_days, 'leave_type_id' => $leavetype, 'leave_from' => $leavefrom, 'leave_to' => $leaveto, 'employee_remark' => $reason, 'status' => $status, 'admin_remark' => $remark, 'applied_by' => $applied_by, 'document_file' => $document);
            }
           // var_dump($data);exit;
            $this->leaverequest_model->addLeaveRequest($data);
            $array = array('status' => 'success', 'error' => '', 'message' => "Record Saved Successfully");
        }
        echo json_encode($array);
    }
    
    function dateDifference($date_1, $date_2, $differenceFormat = '%a') {
        $datetime1 = date_create($date_1);
        $datetime2 = date_create($date_2);

        $interval = date_diff($datetime1, $datetime2);

        return $interval->format($differenceFormat) + 1;
    }
    
    function leaveRecord() {
// if(!$this->rbac->hasPrivilege('leave_request','can_view')){
//         access_denied();
//         }
        $id = $this->input->post("id");

        $result = $this->staff_model->getLeaveRecord($id);
        $leave_from = $result->leave_from;
        $result->leavefrom = $leave_from;
        $leave_to = $result->leave_to;
        $result->leaveto = $leave_to;
        $result->days = $this->dateDifference($result->leave_from, $result->leave_to);
        echo json_encode($result);
    }
    
    function addLeave() {

// if(!$this->rbac->hasPrivilege('leave_request','can_add')){
//         access_denied();
//         }

        $role = $this->input->post("role");
        $empid = $this->input->post("empname");
        $applied_date = $this->input->post("applieddate");
        $leavetype = $this->input->post("leave_type");

        $reason = $this->input->post("reason");
        $remark = $this->input->post("remark");
        $status = $this->input->post("addstatus");
        $request_id = $this->input->post("leaverequestid");

        $this->form_validation->set_rules('role', 'Role', 'trim|required');
        $this->form_validation->set_rules('empname', 'Name', 'trim|required');
        $this->form_validation->set_rules('applieddate', 'Applied Date', 'trim|required');
        $this->form_validation->set_rules('leavedates', 'Leave from Date', 'trim|required');

        if ($this->form_validation->run() == FALSE) {

            $msg = array(
                'role' => form_error('role'),
                'empname' => form_error('empname'),
                'applieddate' => form_error('applieddate'),
                'leavedates' => form_error('leavedates'),
            );

            $array = array('status' => 'fail', 'error' => $msg, 'message' => '');
        } else {

           // $a = $this->input->post("leavedates");
           // $b = explode('-', trim($a));

            $leavefrom = $this->input->post("leavedates");;
            $leaveto = $this->input->post("leavedates1");;

            $staff_id = $empid;
            if (isset($_FILES["userfile"]) && !empty($_FILES['userfile']['name'])) {
                $uploaddir = './uploads/staff_documents/' . $staff_id . '/';
                if (!is_dir($uploaddir) && !mkdir($uploaddir)) {
                    die("Error creating folder $uploaddir");
                }
                $fileInfo = pathinfo($_FILES["userfile"]["name"]);
                $document = basename($_FILES['userfile']['name']);
                $img_name = $uploaddir . basename($_FILES['userfile']['name']);
                move_uploaded_file($_FILES["userfile"]["tmp_name"], $img_name);
            } else {

                $document = $this->input->post("filename");
            }

            $applied_by = $this->customlib->getAdminSessionUserName();
            $leave_days = $this->dateDifference($leavefrom, $leaveto);
            if (!empty($request_id)) {


                $data = array('id' => $request_id,
                    'staff_id' => $staff_id,
                    'date' => $applied_date,
                    'leave_type_id' => $leavetype,
                    'leave_days' => $leave_days,
                    'leave_from' => $leavefrom,
                    'leave_to' => $leaveto, 
                    'employee_remark' => $reason, 
                    'status' => $status,
                    'admin_remark' => $remark,
                    'applied_by' => $applied_by,
                    'document_file' => $document
                        );
            } else {

                $data = array('staff_id' => $staff_id,
                    'date' => $applied_date,
                    'leave_days' => $leave_days,
                    'leave_type_id' => $leavetype,
                    'leave_from' => $leavefrom,
                    'leave_to' => $leaveto,
                    'employee_remark' => $reason,
                    'status' => $status,
                    'admin_remark' => $remark,
                    'applied_by' => $applied_by,
                    'document_file' => $document
                  );
            }
            $this->leaverequest_model->addLeaveRequest($data);
            $array = array('status' => 'success', 'error' => '', 'message' => "Record Saved Successfully");
        }

        echo json_encode($array);
    }
}