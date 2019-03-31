<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class ExamSchedule extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model("classteacher_model");
    }

    function index() {
        if (!$this->rbac->hasPrivilege('exam_schedule', 'can_view')) {
            access_denied();
        }
        
        $data['title'] = 'Exam Schedule';
        $class = $this->class_model->get();
        $data['classlist'] = $class;
        $userdata = $this->customlib->getUserData();

        $feecategory = $this->feecategory_model->get();
        $data['feecategorylist'] = $feecategory;
        
        $this->form_validation->set_rules('class_id', 'Class', 'trim|required');
        $this->form_validation->set_rules('section_id', 'Section', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('adminlogin/layout/header', $data);
            $this->load->view('adminlogin/exam_schedule/examList', $data);
            $this->load->view('adminlogin/layout/footer', $data);
        } else {
            $data['student_due_fee'] = array();
            $data['class_id'] = $this->input->post('class_id');
            $data['section_id'] = $this->input->post('section_id');
            $examSchedule = $this->examschedule_model->getExamByClassandSection($data['class_id'], $data['section_id']);
            $data['examSchedule'] = $examSchedule;
            $this->load->view('adminlogin/layout/header', $data);
            $this->load->view('adminlogin/exam_schedule/examList', $data);
            $this->load->view('adminlogin/layout/footer', $data);
        }
    }
    
    function create() {
//        if (!$this->rbac->hasPrivilege('exam_schedule', 'can_add')) {
//            access_denied();
//        }
      //  var_dump($_POST);exit;
        $session = $this->setting_model->getCurrentSession();
        $data['title'] = 'Exam Schedule';
        $data['exam_id'] = "";
        $data['class_id'] = "";
        $data['section_id'] = "";
        $exam = $this->exam_model->get();
        $class = $this->class_model->get('', $classteacher = 'yes');
        $data['examlist'] = $exam;
        $data['classlist'] = $class;
        $userdata = $this->customlib->getUserData();
      
        $feecategory = $this->feecategory_model->get();
        $data['feecategorylist'] = $feecategory;
        $this->form_validation->set_rules('exam_id', 'Exam', 'trim|required');
        $this->form_validation->set_rules('class_id', 'Class', 'trim|required');
        $this->form_validation->set_rules('section_id', 'Section', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('adminlogin/layout/header', $data);
            $this->load->view('adminlogin/exam_schedule/examCreate', $data);
            $this->load->view('adminlogin/layout/footer', $data);
        } else {
            $feecategory_id = $this->input->post('feecategory_id');
            $exam_id = $this->input->post('exam_id');
            $class_id = $this->input->post('class_id');
            $section_id = $this->input->post('section_id');
            $data['exam_id'] = $exam_id;
            $data['class_id'] = $class_id;
            $data['section_id'] = $section_id;
            $examSchedule = $this->teachersubject_model->getDetailbyClsandSection($class_id, $section_id, $exam_id);
            $data['examSchedule'] = $examSchedule;
          //  var_dump($data['examSchedule']);exit;
            if ($this->input->post('save_exam') == "save_exam") {
                $i = $this->input->post('i');
                foreach ($i as $key => $value) {
                    $data = array(
                        'session_id' => $session,
                        'teacher_subject_id' => $value,
                        'exam_id' => $this->input->post('exam_id'),
                        'date_of_exam' => $this->input->post('date_' . $value),
                        'start_to' => $this->input->post('stime_' . $value),
                        'end_from' => $this->input->post('etime_' . $value),
                        'room_no' => $this->input->post('room_' . $value),
                        'full_marks' => $this->input->post('fmark_' . $value),
                        'passing_marks' => $this->input->post('pmarks_' . $value)
                    );
                  //  var_dump($data);exit;

                    $this->exam_model->add_exam_schedule($data);
                }
                redirect('webadmin/examschedule');
            }
            $this->load->view('adminlogin/layout/header', $data);
            $this->load->view('adminlogin/exam_schedule/examCreate', $data);
            $this->load->view('adminlogin/layout/footer', $data);
        }
    }
    function getexamscheduledetail() {
        $exam_id = $this->input->post('exam_id');
        $section_id = $this->input->post('section_id');
        $class_id = $this->input->post('class_id');
        $examSchedule = $this->examschedule_model->getDetailbyClsandSection($class_id, $section_id, $exam_id);
        echo json_encode($examSchedule);
    }
    
}