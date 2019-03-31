<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Member extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('file');
        //$this->lang->load('message', 'english');
    }

    public function index() {
        
        $data['title'] = 'Member';
        $data['title_list'] = 'Members';
        $memberList = $this->librarymember_model->get();
        $data['memberList'] = $memberList;
        $this->load->view('adminlogin/layout/header');
        $this->load->view('adminlogin/librarian/index', $data);
        $this->load->view('adminlogin/layout/footer');
    }
    
    function teacher() {
        
        $data['title'] = 'Add Teacher';
        
        $teacher_result = $this->teacher_model->getLibraryTeacher();
        $data['teacherlist'] = $teacher_result;
        $genderList = $this->customlib->getGender();
        $data['genderList'] = $genderList;
        $this->load->view('adminlogin/layout/header', $data);
        $this->load->view('adminlogin/member/teacher', $data);
        $this->load->view('adminlogin/layout/footer', $data);
    }
    
    function addteacher() {
        if ($this->input->post('library_card_no') != "") {

            $this->form_validation->set_rules('library_card_no', 'library Card No', 'required|trim|callback_check_cardno_exists');
            if ($this->form_validation->run() == false) {
                $data = array(
                    'library_card_no' => form_error('library_card_no'),
                );
                $array = array('status' => 'fail', 'error' => $data);
                echo json_encode($array);
            } else {
                $library_card_no = $this->input->post('library_card_no');
                $student = $this->input->post('member_id');
                $data = array(
                    'member_type' => 'teacher',
                    'member_id' => $student,
                    'library_card_no' => $library_card_no
                );

                $inserted_id = $this->librarymanagement_model->add($data);
                $array = array('status' => 'success', 'error' => '', 'message' => 'Member added successfully', 'inserted_id' => $inserted_id, 'library_card_no' => $library_card_no);
                echo json_encode($array);
            }
        } else {
            $library_card_no = $this->input->post('library_card_no');
            $student = $this->input->post('member_id');
            $data = array(
                'member_type' => 'teacher',
                'member_id' => $student,
                'library_card_no' => $library_card_no
            );

            $inserted_id = $this->librarymanagement_model->add($data);
            $array = array('status' => 'success', 'error' => '', 'message' => 'Member added successfully', 'inserted_id' => $inserted_id, 'library_card_no' => $library_card_no);
            echo json_encode($array);
        }
    }
    
    function check_cardno_exists() {
        $data['library_card_no'] = $this->security->xss_clean($this->input->post('library_card_no'));

        if ($this->librarymanagement_model->check_data_exists($data)) {
            $this->form_validation->set_message('check_cardno_exists', 'Card no already exists');
            return FALSE;
        } else {
            return TRUE;
        }
    }
    
     function student() {
      
        $data['title'] = 'Student Search';
        $class = $this->class_model->get();
        $data['classlist'] = $class;
        $button = $this->input->post('search');
        if ($this->input->server('REQUEST_METHOD') == "GET") {
            $this->load->view('adminlogin/layout/header', $data);
            $this->load->view('adminlogin/member/studentSearch', $data);
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
                        $data['searchby'] = "filter";
                        $data['class_id'] = $this->input->post('class_id');
                        $data['section_id'] = $this->input->post('section_id');
                        $data['search_text'] = $this->input->post('search_text');
                        $resultlist = $this->student_model->searchLibraryStudent($class, $section);
                        $data['resultlist'] = $resultlist;
                    }
                } else if ($search == 'search_full') {
                    $data['searchby'] = "text";
                    $data['class_id'] = $this->input->post('class_id');
                    $data['section_id'] = $this->input->post('section_id');
                    $data['search_text'] = trim($this->input->post('search_text'));
                    $resultlist = $this->student_model->searchFullText($search_text);
                    $data['resultlist'] = $resultlist;
                }
            }
            $this->load->view('adminlogin/layout/header', $data);
            $this->load->view('adminlogin/member/studentSearch', $data);
            $this->load->view('adminlogin/layout/footer', $data);
        }
    }
    //issue book return
     public function issue($id) {

        $data['title'] = 'Member';
        $data['title_list'] = 'Members';
        
        $memberList = $this->librarymember_model->getByMemberID($id);
        $data['memberList'] = $memberList;
        $issued_books = $this->bookissue_model->getMemberBooks($id);
        $data['issued_books'] = $issued_books;
        $bookList = $this->book_model->get();
        $data['bookList'] = $bookList;
        $this->form_validation->set_rules('book_id', 'Book', 'trim|required');
        $this->form_validation->set_rules('return_date', 'Return Date', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            
        } else {
            $member_id = $this->input->post('member_id');
            $data = array(
                'book_id' => $this->input->post('book_id'),
                'return_date' => $this->input->post('return_date'),
                'issue_date' => date('Y-m-d'),
                'member_id' => $this->input->post('member_id'),
            );
            $this->bookissue_model->add($data);
            $this->session->set_flashdata('msg', '<div class="alert alert-success text-left">Book issued successfully.</div>');
            redirect('webadmin/member/issue/' . $member_id);
        }

        $this->load->view('adminlogin/layout/header');
        $this->load->view('adminlogin/librarian/issue', $data);
        $this->load->view('adminlogin/layout/footer');
    }
    
    public function bookreturn(){
//        var_dump($_POST);exit;
        $this->form_validation->set_rules('id', 'ID', 'required|trim');
        $this->form_validation->set_rules('member_id', 'Member ID', 'required|trim');
        $this->form_validation->set_rules('date', 'date', 'required|trim');
        if ($this->form_validation->run() == false) {
            $data = array(
                'id'        => form_error('id'),
               'member_id' => form_error('member_id'),
               'date'      => form_error('date'),
            );
            $array = array('status' => 'fail', 'error' => $data);
            echo json_encode($array);
        } else {
           //var_dump($_POST);exit;
            $id = $this->input->post('id');
            $member_id  = $this->input->post('member_id');
            $date = $this->input->post('date');
            $reurn='1';
            $data= array(
                'id'          => $id,
                'return_date' => $date,
                'is_returned' => $reurn,
            );
           // var_dump($data);exit;
            $this->bookissue_model->update($data);
       
            $array = array('status' => 'success', 'error' => '', 'message' => 'Record updated successfully');
            echo json_encode($array);
             $this->session->set_flashdata('msg', '<div class="alert alert-success text-left">Book return successfully.</div>');
            redirect('webadmin/member/issue/' . $member_id);
        }
    }
    
}