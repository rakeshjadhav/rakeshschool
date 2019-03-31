<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Exam extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        if($this->session->userdata('isUserLoggedIn')){
        if (!$this->rbac->hasPrivilege('exam', 'can_view')) {
            access_denied();
        }
        $data['title'] = 'Add Exam';

        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        if ($this->form_validation->run() == FALSE) {   
        } else {
            $data = array(
                'name' => $this->input->post('name'),
                'note' => $this->input->post('note'),
            );
            $this->exam_model->add($data);
            $this->session->set_flashdata('msg', '<div class="alert alert-success text-left">Exam added successfully</div>');
            redirect('webadmin/exam/index');
        }
        $exam_result = $this->exam_model->get();
        $data['examlist'] = $exam_result;
        
        $this->load->view('adminlogin/layout/header', $data);
        $this->load->view('adminlogin/exam/examList', $data);
        $this->load->view('adminlogin/layout/footer', $data);
        }else{
            $this->session->set_userdata('msg', 'Your Session is destroy. Please login to your account.');
            redirect('site/login');
        }
    }
    
    
    function edit($id) {
         if($this->session->userdata('isUserLoggedIn')){
        if (!$this->rbac->hasPrivilege('exam', 'can_edit')) {
            access_denied();
        }
        $data['title'] = 'Edit Exam';
        $data['id'] = $id;
        $exam = $this->exam_model->get($id);
        $data['exam'] = $exam;
        
        $exam_result = $this->exam_model->get();
        $data['examlist'] = $exam_result;
        
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('adminlogin/layout/header', $data);
            $this->load->view('adminlogin/exam/examEdit', $data);
            $this->load->view('adminlogin/layout/footer', $data);
        } else {
            $data = array(
                'id' => $id,
                'name' => $this->input->post('name'),
                'note' => $this->input->post('note'),
            );
            $this->exam_model->add($data);
            $this->session->set_flashdata('msg', '<div class="alert alert-success text-left">Exam update successfully</div>');
            redirect('webadmin/exam/index');
        }
        }else{
            $this->session->set_userdata('msg', 'Your Session is destroy. Please login to your account.');
            redirect('site/login');
        }
    }
    
    public function examclasses($id) {
        if($this->session->userdata('isUserLoggedIn')){
        if (!$this->rbac->hasPrivilege('exam', 'can_view')) {
            access_denied();
        }
        
        $data['title'] = 'list of  Exam';
        
        $exam = $this->exam_model->get($id);
        $data['exam'] = $exam;
        
        $classsectionList = $this->examschedule_model->getclassandsectionbyexam($id);
        $array = array();
        
        foreach ($classsectionList as $key => $value) {
            $s = array();
            $exam_id = $value['exam_id'];
            $class_id = $value['class_id'];
            $section_id = $value['division'];
            $result_prepare = $this->examresult_model->checkexamresultpreparebyexam($exam_id, $class_id, $section_id);
            $s['exam_id'] = $exam_id;
            $s['class_id'] = $class_id;
            $s['section_id'] = $section_id;
            $s['class'] = $value['class'];
            $s['division'] = $value['division'];
            if ($result_prepare) {
                $s['result_prepare'] = "yes";
            } else {
                $s['result_prepare'] = "no";
            }
            $array[] = $s;
        }
        $data['classsectionList'] = $array;
        $this->load->view('adminlogin/layout/header');
        $this->load->view('adminlogin/exam/examClasses', $data);
        $this->load->view('adminlogin/layout/footer');
        }else{
            $this->session->set_userdata('msg', 'Your Session is destroy. Please login to your account.');
            redirect('site/login');
        }
    }
    
    function delete($id) {
        if (!$this->rbac->hasPrivilege('exam', 'can_delete')) {
            access_denied();
        }
        $data['title'] = 'Exam List';
        $this->exam_model->remove($id);
        redirect('webadmin/exam/index');
    }
    
    public function subjectwisechapter($id=null) {
     if($this->session->userdata('isUserLoggedIn')){
//        if (!$this->rbac->hasPrivilege('exam', 'can_view')) {
//            access_denied();
//        }
          $session = $this->setting_model->getCurrentSession();
//        var_dump($session);exit;
        $data['title'] = 'Exam Chapter';
        $data['subject_id'] = "";
        $data['class_id'] = "";
        $data['division_id'] = "";
        
        $chapter = $this->chapter_model->get();
        $class = $this->class_model->get();
        $data['chapterlist'] = $chapter;
        //var_dump($data['chapterlist']);exit;
        $data['classlist'] = $class;

        $this->form_validation->set_rules('subject_id', 'Subject', 'trim|required');
        $this->form_validation->set_rules('class_id', 'Class', 'trim|required');
        $this->form_validation->set_rules('section_id', 'Division', 'trim|required');
        $this->form_validation->set_rules('chapter_name', 'Chapter', 'trim|required');        
        if ($this->form_validation->run() == FALSE) {
//         var_dump("hi1");exit;
           $this->load->view('adminlogin/layout/header', $data);
           $this->load->view('adminlogin/exam/chapterList', $data);
           $this->load->view('adminlogin/layout/footer', $data);
        } else {

            $subject_id = $this->input->post('subject_id');
            $class_id = $this->input->post('class_id');
            $section_id = $this->input->post('section_id');

                    $data = array(
                        'class_id' => $class_id,
                        'division_id' => $section_id,
                        'subject_id' => $subject_id,
                        'chapter_name' => $this->input->post('chapter_name'),
                        'cdesc' => $this->input->post('desc'),
                        'is_active' => "yes",
                    );
                    //var_dump($data);exit;
                     $this->session->set_flashdata('msg', '<div class="alert alert-success text-left">Chapter Add successfully</div>');
                    $this->chapter_model->add($data);
             
                redirect('webadmin/exam/subjectwisechapter');
        }
        }else{
           $this->session->set_userdata('msg', 'Your current session has expired. Please login again to continue.');
           redirect('site/login');
        }  
    }
    
    function chapteredit($id) {
        if($this->session->userdata('isUserLoggedIn')){
        if (!$this->rbac->hasPrivilege('chapter', 'can_edit')) {
            access_denied();
        }
        $chapter = $this->chapter_model->get();
        $data['chapterlist'] = $chapter;
         
        $class = $this->class_model->get();
        $data['classlist'] = $class;
        
        $data['title'] = 'Edit Chapter';
        $data['id'] = $id;
        $chapterids = $this->chapter_model->get($id);
        $data['chapterwisedata'] = $chapterids;
      //  var_dump($data['chapterwisedata']);exit;
        $this->form_validation->set_rules('subject_id', 'Subject', 'trim|required');
        $this->form_validation->set_rules('class_id', 'Class', 'trim|required');
        $this->form_validation->set_rules('section_id', 'Division', 'trim|required');
        $this->form_validation->set_rules('chapter_name', 'Chapter', 'trim|required');     
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('adminlogin/layout/header', $data);
            $this->load->view('adminlogin/exam/chapterEdit', $data);
            $this->load->view('adminlogin/layout/footer', $data);
        } else {

            $subject_id = $this->input->post('subject_id');
            $class_id = $this->input->post('class_id');
            $section_id = $this->input->post('section_id');

                    $data = array(
                        'id'=>$id,
                        'class_id' => $class_id,
                        'division_id' => $section_id,
                        'subject_id' => $subject_id,
                        'chapter_name' => $this->input->post('chapter_name'),
                        'cdesc' => $this->input->post('desc'),
                        'is_active' => "yes",
                    );
                $this->session->set_flashdata('msg', '<div class="alert alert-success text-left">Chapter Add successfully</div>');
                $this->chapter_model->add($data);
           
            redirect('webadmin/exam/subjectwisechapter');
        }
        }else{
            $this->session->set_userdata('msg', 'Your Session is destroy. Please login to your account.');
            redirect('site/login');
        }
    }
    
}