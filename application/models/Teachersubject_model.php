<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Teachersubject_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->current_session = $this->setting_model->getCurrentSession();
    }

    function getTeacherClassSubjects($teacher_id) {
        $this->db->select('teacher_subjects.*,subjects.name,classes.class,division.division');
        $this->db->from('teacher_subjects');
        $this->db->join('subjects', 'subjects.id = teacher_subjects.subject_id');
        $this->db->join('class_division', 'class_division.id = teacher_subjects.class_division_id');
        $this->db->join('classes', 'classes.id = class_division.class_id');
        $this->db->join('division', 'division.id = class_division.division_id');
        $this->db->where('teacher_subjects.teacher_id', $teacher_id);
        $this->db->where('teacher_subjects.session_id', $this->current_session);
        $query = $this->db->get();
//        echo $this->db->last_query();exit;
        return $query->result();
    }
    
    public function getDetailByclassAndSection($class_section_id) {
        $this->db->select()->from('teacher_subjects');
        $this->db->where('class_division_id', $class_section_id);
        $this->db->where('teacher_subjects.session_id', $this->current_session);
        $query = $this->db->get();
//        echo $this->db->last_query();exit;
        return $query->result_array();
    }
    
    
     public function add($data) {
         //var_dump($data);exit;
        if (isset($data['id'])) {
            $this->db->where('id', $data['id']);
            $this->db->update('teacher_subjects', $data);
        } else {
            $this->db->insert('teacher_subjects', $data);
            return $this->db->insert_id();
        }
    }
    public function deleteBatch($ids, $class_division_id) {
        $this->db->where('class_division_id', $class_division_id);
        $this->db->where('session_id', $this->current_session);
        $this->db->where_not_in('id', $ids);
        $this->db->delete('teacher_subjects');
    }
    //craete time tabel assign teacher
    public function getSubjectByClsandSection($class_id, $section_id) {
        $sql = "SELECT teacher_subjects.*,employee.name as `teacher_name`, employee.surname, subjects.name,subjects.type,subjects.code FROM `teacher_subjects` INNER JOIN subjects ON teacher_subjects.subject_id = subjects.id INNER JOIN class_division ON teacher_subjects.class_division_id = class_division.id INNER JOIN employee ON employee.id = teacher_subjects.teacher_id  WHERE class_division.class_id =" . $this->db->escape($class_id) . " and class_division.division_id=" . $this->db->escape($section_id) . " and teacher_subjects.session_id=" . $this->db->escape($this->current_session);
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    
    
    public function getDetailbyClsandSection($class_id, $section_id, $exam_id) {
            $query = $this->db->query("SELECT teacher_subjects.*,exam_schedules.date_of_exam,exam_schedules.start_to,exam_schedules.end_from,exam_schedules.room_no,exam_schedules.full_marks,exam_schedules.passing_marks,subjects.name,
            subjects.type FROM `teacher_subjects` LEFT JOIN `exam_schedules` ON exam_schedules.teacher_subject_id=teacher_subjects.id AND exam_schedules.exam_id = " . $this->db->escape($exam_id) . "  INNER JOIN subjects
            ON teacher_subjects.subject_id = subjects.id INNER JOIN class_division
            ON teacher_subjects.class_division_id = class_division.id WHERE class_division.class_id =" . $this->db->escape($class_id) . " and class_division.division_id=" . $this->db->escape($section_id));
        return $query->result_array();
    }
}