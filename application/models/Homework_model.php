<?php

/**
 * 
 */
class Homework_model extends CI_model {

     public function get($id = null) {
        if (!empty($id)) {
            $query = $this->db->where("id", $id)->get("homework");
            return $query->row_array();
        } else {

            $query = $this->db->select("homework.*,homework_evaluation.date,classes.class,division.division,subjects.name")->join("classes", "classes.id = homework.class_id")->join("division", "division.id = homework.section_id")->join("subjects", "subjects.id = homework.subject_id", "left")->join("homework_evaluation", "homework.id = homework_evaluation.homework_id", "left")->group_by("homework.id")->get("homework");

            return $query->result_array();
        }
    }
    
    
    public function add($data) {

        if (isset($data["id"])) {

            $this->db->where("id", $data["id"])->update("homework", $data);
        } else {

            $this->db->insert("homework", $data);
            return $this->db->insert_id();
        }
    }
public function search_homework($class_id, $section_id, $subject_id) {

        if ((!empty($class_id)) && (!empty($section_id)) && (!empty($subject_id))) {

            $this->db->where(array('homework.class_id' => $class_id, 'homework.section_id' => $section_id, 'homework.subject_id' => $subject_id));
        } else if ((!empty($class_id)) && (empty($section_id)) && (empty($subject_id))) {

            $this->db->where(array('homework.class_id' => $class_id));
        } else if ((!empty($class_id)) && (!empty($section_id)) && (empty($subject_id))) {

            $this->db->where(array('homework.class_id' => $class_id, 'homework.section_id' => $section_id));
        }
        $query = $this->db->select("homework.*,classes.class,division.division,subjects.name")->join("classes", "classes.id = homework.class_id")->join("division", "division.id = homework.section_id")->join("subjects", "subjects.id = homework.subject_id", "left")->get("homework");

        return $query->result_array();
    }
    
    public function getEvaluationReport($id) {

        $query = $this->db->select("homework.*,homework_evaluation.student_id,homework_evaluation.id as evalid,homework_evaluation.date,homework_evaluation.status,classes.class,subjects.name,division.division")->join("classes", "classes.id = homework.class_id")->join("division", "division.id = homework.section_id")->join("subjects", "subjects.id = homework.subject_id")->join("homework_evaluation", "homework.id = homework_evaluation.homework_id")->where("homework.id", $id)->get("homework");
        return $query->result_array();
    }
    
    public function getRecord($id = null) {

        $query = $this->db->select("homework.*,classes.class,division.division,subjects.name")->join("classes", "classes.id = homework.class_id")->join("division", "division.id = homework.section_id")->join("subjects", "subjects.id = homework.subject_id", "left")->where("homework.id", $id)->get("homework");

        return $query->row_array();
    }
    
    public function getStudents($class_id, $section_id) {

        $query = $this->db->select("students.id,students.firstname,students.lastname,students.admission_no")->join("student_session", "students.id = student_session.student_id")->where(array('student_session.class_id' => $class_id, 'student_session.division_id' => $section_id, 'students.is_active' => "yes"))->group_by("student_session.student_id")->get("students");

        return $query->result_array();
    }
    
    public function searchHomeworkEvaluation($class_id, $section_id, $subject_id) {

        if ((!empty($class_id)) && (!empty($section_id)) && (!empty($subject_id))) {

            $this->db->where(array('homework.class_id' => $class_id, 'homework.section_id' => $section_id, 'homework.subject_id' => $subject_id));
        } else if ((!empty($class_id)) && (empty($section_id)) && (empty($subject_id))) {

            $this->db->where(array('homework.class_id' => $class_id));
        } else if ((!empty($class_id)) && (!empty($section_id)) && (empty($subject_id))) {

            $this->db->where(array('homework.class_id' => $class_id, 'homework.section_id' => $section_id));
        }
        $query = $this->db->select("homework.*,classes.class,division.division,subjects.name")->join("classes", "classes.id = homework.class_id")->join("division", "division.id = homework.section_id")->join("subjects", "subjects.id = homework.subject_id", "left")->join("homework_evaluation", "homework.id = homework_evaluation.homework_id")->group_by("homework.id")->get("homework");

        return $query->result_array();
    }
}