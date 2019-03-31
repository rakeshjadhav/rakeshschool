<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Book extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('file');
      //  $this->lang->load('message', 'english');
        $this->load->library('auth');
        $this->auth->is_logged_in_user();
    }
    
    public function index() {
    
        $data['title'] = 'Add Book';
        $data['title_list'] = 'Book Details';
        $listbook = $this->book_model->listbook();
        $data['listbook'] = $listbook;
        $this->load->view('layout/student/header');
        $this->load->view('user/book/createbook', $data);
        $this->load->view('layout/student/footer');
    }

   public function issue() {
      
        $data['title'] = 'Add Book';
        $data['title_list'] = 'Book Details';
        $member_type = "student";
        $student_id = $this->customlib->getStudentSessionUserID();

        $checkIsMember = $this->librarymember_model->checkIsMember($member_type, $student_id);

        if (is_array($checkIsMember)) {
            $data['bookList'] = $checkIsMember;
            $data['isCheck'] = "1";
        } else {
            $data['isCheck'] = "0";
        }


        $this->load->view('layout/student/header');
        $this->load->view('user/book/issue', $data);
        $this->load->view('layout/student/footer');
    }
    
}