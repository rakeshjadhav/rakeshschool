<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class studentfee extends CI_Controller {

    function __construct() {
        parent::__construct();
      //  $this->load->library('smsgateway');
     //   $this->load->library('mailsmsconf');

        $this->load->helper('file');
       // $this->lang->load('message', 'english');
    }

    function index() {
//      if (!$this->rbac->hasPrivilege('collect_fees', 'can_view')) {
//            access_denied();
//        }
        $data['title'] = 'student fees';
        $class = $this->class_model->get();
        $data['classlist'] = $class;
         $this->load->view('adminlogin/layout/header');
        $this->load->view('adminlogin/studentfee/studentfeeSearch', $data);
        $this->load->view('adminlogin/layout/footer');
    }
//    add fee master
    function addfee($id) {
//        if (!$this->rbac->hasPrivilege('collect_fees', 'can_add')) {
//            access_denied();
//        }
        $data['title'] = 'Student Detail';
        $student = $this->student_model->get($id);
        $data['student'] = $student;

        $student_due_fee = $this->studentfeemaster_model->getStudentFees($student['student_session_id']);
        $student_discount_fee = $this->feediscount_model->getStudentFeesDiscount($student['student_session_id']);

        $data['student_discount_fee'] = $student_discount_fee;
        $data['student_due_fee'] = $student_due_fee;
        
        $category = $this->category_model->get();
        $data['categorylist'] = $category;
        
        $class_section = $this->student_model->getClassSection($student["class_id"]);
        $data["class_section"] = $class_section;
       $session = $this->setting_model->getCurrentSession();
        
        $studentlistbysection = $this->student_model->getStudentClassSection($student["class_id"],$session);
        $data["studentlistbysection"] = $studentlistbysection;
//
//        $data['student_discount_fee'] = $student_discount_fee;
//        $data['student_due_fee'] = $student_due_fee;
//        $category = $this->category_model->get();
//        $data['categorylist'] = $category;
        $this->load->view('adminlogin/layout/header',$data);
        $this->load->view('adminlogin/studentfee/studentAddfee', $data);
        $this->load->view('adminlogin/layout/footer',$data);
    }
    
    function addfeegroup() {
      //  echo"gi";exit;
        $this->form_validation->set_rules('fee_session_groups', 'Fee Group', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data = array('fee_session_groups' => form_error('fee_session_groups'),
            );
            $array = array('status' => 'fail', 'error' => $data);
            echo json_encode($array);
        } else {
            $student_session_id = $this->input->post('student_session_id');
            $fee_session_groups = $this->input->post('fee_session_groups');
            $student_sesssion_array = isset($student_session_id) ? $student_session_id : array();
            $student_ids = $this->input->post('student_ids');
            $delete_student = array_diff($student_ids, $student_sesssion_array);

            $preserve_record = array();
            if (!empty($student_sesssion_array)) {
                foreach ($student_sesssion_array as $key => $value) {

                    $insert_array = array(
                        'student_session_id' => $value,
                        'fee_session_group_id' => $fee_session_groups,
                    );
                    $inserted_id = $this->studentfeemaster_model->add($insert_array);

                    $preserve_record[] = $inserted_id;
                }
            }
            if (!empty($delete_student)) {
                $this->studentfeemaster_model->delete($fee_session_groups, $delete_student);
            }

            $array = array('status' => 'success', 'error' => '', 'message' => 'Record Saved Successfully');
            echo json_encode($array);
        }
    }
    //fee search use class and division
    function search() {
//        if (!$this->rbac->hasPrivilege('collect_fees', 'can_view')) {
//            access_denied();
//        }
        $data['title'] = 'Student Search';
        $class = $this->class_model->get();
        $data['classlist'] = $class;
        $button = $this->input->post('search');
        if ($this->input->server('REQUEST_METHOD') == "GET") {
            $this->load->view('adminlogin/layout/header', $data);
            $this->load->view('adminlogin/studentfee/studentfeeSearch', $data);
            $this->load->view('adminlogin/layout/footer', $data);
        } else {
            $class = $this->input->post('class_id');
            $section = $this->input->post('section_id');
            $search = $this->input->post('search');
            $search_text = $this->input->post('search_text');
            if (isset($search)) {
                if ($search == 'search_filter') {
                    $this->form_validation->set_rules('class_id', 'Class', 'trim|required');
                    if ($this->form_validation->run() == FALSE) {
                        
                    } else {
                        $resultlist = $this->student_model->searchByClassSection($class, $section);
                        $data['resultlist'] = $resultlist;
                    }
                } else if ($search == 'search_full') {
                    $resultlist = $this->student_model->searchFullText($search_text);
                    $data['resultlist'] = $resultlist;
                }
                $this->load->view('adminlogin/layout/header', $data);
                $this->load->view('adminlogin/studentfee/studentfeeSearch', $data);
                $this->load->view('adminlogin/layout/footer', $data);
            }
        }
    }
    
     function geBalanceFee() {
        $this->form_validation->set_rules('fee_groups_feetype_id', 'fee_groups_feetype_id', 'required|trim');
        $this->form_validation->set_rules('student_fees_master_id', 'student_fees_master_id', 'required|trim');
        $this->form_validation->set_rules('student_session_id', 'student_session_id', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data = array(
                'fee_groups_feetype_id' => form_error('fee_groups_feetype_id'),
                'student_fees_master_id' => form_error('student_fees_master_id'),
            );
            $array = array('status' => 'fail', 'error' => $data);
            echo json_encode($array);
        } else {
            $data = array();
            $student_session_id = $this->input->post('student_session_id');
            $fee_groups_feetype_id = $this->input->post('fee_groups_feetype_id');
            $student_fees_master_id = $this->input->post('student_fees_master_id');
            $remain_amount = $this->getStuFeetypeBalance($fee_groups_feetype_id, $student_fees_master_id);
            $discount_not_applied = $this->getNotAppliedDiscount($student_session_id);
            $remain_amount = json_decode($remain_amount)->balance;
            $array = array('status' => 'success', 'error' => '', 'balance' => $remain_amount, 'discount_not_applied' => $discount_not_applied);
            echo json_encode($array);
        }
    }
    
    function getStuFeetypeBalance($fee_groups_feetype_id, $student_fees_master_id) {
        $data = array();
        $data['fee_groups_feetype_id'] = $fee_groups_feetype_id;
        $data['student_fees_master_id'] = $student_fees_master_id;

        $result = $this->studentfeemaster_model->studentDeposit($data);
        var_dump($result);exit;
        $amount_balance = 0;
        $amount = 0;
        $amount_fine = 0;
        $amount_discount = 0;
        $due_amt = $result->amount;
        if ($result->is_system) {
            $due_amt = $result->student_fees_master_amount;
        }
        $amount_detail = json_decode($result->amount_detail);

        if (is_object($amount_detail)) {

            foreach ($amount_detail as $amount_detail_key => $amount_detail_value) {
                $amount = $amount + $amount_detail_value->amount;
                $amount_discount = $amount_discount + $amount_detail_value->amount_discount;
                $amount_fine = $amount_fine + $amount_detail_value->amount_fine;
            }
        }

        $amount_balance = $due_amt - ($amount + $amount_discount);
        $array = array('status' => 'success', 'error' => '', 'balance' => $amount_balance);
        return json_encode($array);
    }

    
    function addstudentfee() {

        $this->form_validation->set_rules('student_fees_master_id', 'Fee Master', 'required|trim');
        $this->form_validation->set_rules('fee_groups_feetype_id', 'Student', 'required|trim');
        $this->form_validation->set_rules('amount', 'Amount', 'required|trim|callback_check_deposit');
        $this->form_validation->set_rules('amount_discount', 'Discount', 'required|trim');
        $this->form_validation->set_rules('amount_fine', 'Fine', 'required|trim');
        $this->form_validation->set_rules('payment_mode', 'Payment Mode', 'required|trim');
        if ($this->form_validation->run() == false) {
            $data = array(
                'amount' => form_error('amount'),
                'student_fees_master_id' => form_error('student_fees_master_id'),
                'fee_groups_feetype_id' => form_error('fee_groups_feetype_id'),
                'amount_discount' => form_error('amount_discount'),
                'amount_fine' => form_error('amount_fine'),
                'payment_mode' => form_error('payment_mode'),
            );
            $array = array('status' => 'fail', 'error' => $data);
            echo json_encode($array);
        } else {
            $collected_by = " Collected By: " . $this->customlib->getAdminSessionUserName();
            $student_fees_discount_id = $this->input->post('student_fees_discount_id');
            $json_array = array(
                'amount' => $this->input->post('amount'),
                'date' => date('Y-m-d', $this->customlib->datetostrtotime($this->input->post('date'))),
                'amount_discount' => $this->input->post('amount_discount'),
                'amount_fine' => $this->input->post('amount_fine'),
                'description' => $this->input->post('description') . $collected_by,
                'payment_mode' => $this->input->post('payment_mode')
            );
            $data = array(
                'student_fees_master_id' => $this->input->post('student_fees_master_id'),
                'fee_groups_feetype_id' => $this->input->post('fee_groups_feetype_id'),
                'amount_detail' => $json_array
            );

            $send_to = $this->input->post('guardian_phone');
            $email = $this->input->post('guardian_email');
            $inserted_id = $this->studentfeemaster_model->fee_deposit($data, $send_to, $student_fees_discount_id);

            $sender_details = array('invoice' => $inserted_id, 'contact_no' => $send_to, 'email' => $email);
            $this->mailsmsconf->mailsms('fee_submission', $sender_details);

            $array = array('status' => 'success', 'error' => '');
            echo json_encode($array);
        }
    }
    
    function check_deposit($amount) {
        if ($this->input->post('amount') != "" && $this->input->post('amount_discount') != "") {
            if ($this->input->post('amount') < 0) {
                $this->form_validation->set_message('check_deposit', 'Deposit amount can not be less than zero');
                return FALSE;
            } else {
                $student_fees_master_id = $this->input->post('student_fees_master_id');
                $fee_groups_feetype_id = $this->input->post('fee_groups_feetype_id');
                $deposit_amount = $this->input->post('amount') + $this->input->post('amount_discount');
                $remain_amount = $this->getStuFeetypeBalance($fee_groups_feetype_id, $student_fees_master_id);
                $remain_amount = json_decode($remain_amount)->balance;
                if ($remain_amount < $deposit_amount) {
                    $this->form_validation->set_message('check_deposit', 'Deposit amount can not be grater than remaining');
                    return FALSE;
                } else {
                    return TRUE;
                }
            }
            return TRUE;
        }
        return TRUE;
    }
    
    function printFeesByName() {
        $data = array('payment' => "0");

        $record = $this->input->post('data');
        $invoice_id = $this->input->post('main_invoice');
        $sub_invoice_id = $this->input->post('sub_invoice');
        $student_session_id = $this->input->post('student_session_id');
        $setting_result = $this->setting_model->get();
        $data['settinglist'] = $setting_result;
        $student = $this->studentsession_model->searchStudentsBySession($student_session_id);

        $fee_record = $this->studentfeemaster_model->getFeeByInvoice($invoice_id, $sub_invoice_id);
        $data['student'] = $student;
        $data['sub_invoice_id'] = $sub_invoice_id;
        $data['feeList'] = $fee_record;
        $this->load->view('adminlogin/print/printFeesByName', $data);
    }
    
    function printFeesByGroup() {
        $fee_groups_feetype_id = $this->input->post('fee_groups_feetype_id');
        $fee_master_id = $this->input->post('fee_master_id');
        $fee_session_group_id = $this->input->post('fee_session_group_id');
        $setting_result = $this->setting_model->get();
        $data['settinglist'] = $setting_result;
        $data['feeList'] = $this->studentfeemaster_model->getDueFeeByFeeSessionGroupFeetype($fee_session_group_id, $fee_master_id, $fee_groups_feetype_id);

        $this->load->view('adminlogin/print/printFeesByGroup', $data);
    }
    
    function searchpayment() {
        if (!$this->rbac->hasPrivilege('search_fees_payment', 'can_view')) {
            access_denied();
        }
        
        $data['title'] = 'Edit studentfees';

        $this->form_validation->set_rules('paymentid', 'Payment ID', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            
        } else {
            $paymentid = $this->input->post('paymentid');
            $invoice = explode("/", $paymentid);

            if (array_key_exists(0, $invoice) && array_key_exists(1, $invoice)) {
                $invoice_id = $invoice[0];
                $sub_invoice_id = $invoice[1];
                $feeList = $this->studentfeemaster_model->getFeeByInvoice($invoice_id, $sub_invoice_id);
                $data['feeList'] = $feeList;
                $data['sub_invoice_id'] = $sub_invoice_id;
            } else {
                $data['feeList'] = array();
            }
        }
        $this->load->view('adminlogin/layout/header', $data);
        $this->load->view('adminlogin/studentfee/searchpayment', $data);
        $this->load->view('adminlogin/layout/footer', $data);
    }

    
    function feesearch() {
        if (!$this->rbac->hasPrivilege('search_due_fees', 'can_view')) {
            access_denied();
        }

       
        $data['title'] = 'student fees';
        $class = $this->class_model->get();
        $data['classlist'] = $class;
        $feesessiongroup = $this->feesessiongroup_model->getFeesByGroup();

        $data['feesessiongrouplist'] = $feesessiongroup;
        $this->form_validation->set_rules('feegroup_id', 'Fee Group', 'trim|required');
        $this->form_validation->set_rules('class_id', 'Class', 'trim|required');
        $this->form_validation->set_rules('section_id', 'Section', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('adminlogin/layout/header', $data);
            $this->load->view('adminlogin/studentfee/studentSearchFee', $data);
            $this->load->view('adminlogin/layout/footer', $data);
        } else {
            $data['student_due_fee'] = array();
            $feegroup_id = $this->input->post('feegroup_id');
            $feegroup = explode("-", $feegroup_id);
            $feegroup_id = $feegroup[0];
            $fee_groups_feetype_id = $feegroup[1];
            $class_id = $this->input->post('class_id');
            $section_id = $this->input->post('section_id');
            $student_due_fee = $this->studentfee_model->getDueStudentFees($feegroup_id, $fee_groups_feetype_id, $class_id, $section_id);
            if (!empty($student_due_fee)) {
                foreach ($student_due_fee as $student_due_fee_key => $student_due_fee_value) {
                    $amt_due = $student_due_fee_value['amount'];
                    $student_due_fee[$student_due_fee_key]['amount_discount'] = 0;
                    $student_due_fee[$student_due_fee_key]['amount_fine'] = 0;
                    $a = json_decode($student_due_fee_value['amount_detail']);
                    if (!empty($a)) {
                        $amount = 0;
                        $amount_discount = 0;
                        $amount_fine = 0;

                        foreach ($a as $a_key => $a_value) {
                            $amount = $amount + $a_value->amount;
                            $amount_discount = $amount_discount + $a_value->amount_discount;
                            $amount_fine = $amount_fine + $a_value->amount_fine;
                        }
                        if ($amt_due <= $amount) {
                            unset($student_due_fee[$student_due_fee_key]);
                        } else {

                            $student_due_fee[$student_due_fee_key]['amount_detail'] = $amount;
                            $student_due_fee[$student_due_fee_key]['amount_discount'] = $amount_discount;
                            $student_due_fee[$student_due_fee_key]['amount_fine'] = $amount_fine;
                        }
                    }
                }
            }


            $data['student_due_fee'] = $student_due_fee;
            $this->load->view('adminlogin/layout/header', $data);
            $this->load->view('adminlogin/studentfee/studentSearchFee', $data);
            $this->load->view('adminlogin/layout/footer', $data);
        }
    }
    
    function reportbyname() {
        if (!$this->rbac->hasPrivilege('fees_statement', 'can_view')) {
            access_denied();
        }
       
        $data['title'] = 'student fees';
        $class = $this->class_model->get();
        $data['classlist'] = $class;
        if ($this->input->server('REQUEST_METHOD') == "GET") {
            $this->load->view('adminlogin/layout/header', $data);
            $this->load->view('adminlogin/studentfee/reportByName', $data);
            $this->load->view('adminlogin/layout/footer', $data);
        } else {
            $this->form_validation->set_rules('section_id', 'Section', 'trim|required');
            $this->form_validation->set_rules('class_id', 'Class', 'trim|required');
            $this->form_validation->set_rules('student_id', 'Student', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('adminlogin/layout/header', $data);
                $this->load->view('adminlogin/studentfee/reportByName', $data);
                $this->load->view('adminlogin/layout/footer', $data);
            } else {
                $data['student_due_fee'] = array();
                $class_id = $this->input->post('class_id');
                $section_id = $this->input->post('section_id');
                $student_id = $this->input->post('student_id');
                $student = $this->student_model->get($student_id);
                $data['student'] = $student;
                $student_due_fee = $this->studentfeemaster_model->getStudentFees($student['student_session_id']);
                $student_discount_fee = $this->feediscount_model->getStudentFeesDiscount($student['student_session_id']);
                $data['student_discount_fee'] = $student_discount_fee;
                $data['student_due_fee'] = $student_due_fee;
                $data['class_id'] = $class_id;
                $data['section_id'] = $section_id;
                $data['student_id'] = $student_id;
                $category = $this->category_model->get();
                $data['categorylist'] = $category;
                $this->load->view('adminlogin/layout/header', $data);
                $this->load->view('adminlogin/studentfee/reportByName', $data);
                $this->load->view('adminlogin/layout/footer', $data);
            }
        }
    }

}