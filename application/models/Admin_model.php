<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->current_session = $this->setting_model->getCurrentSession();
        $this->current_session_name = $this->setting_model->getCurrentSessionName();
        $this->start_month = $this->setting_model->getStartMonth();
    }
//    site/login
public function checkLogin($data) {
        $record = $this->getByEmail($data['username']);
        if ($record) {
             $pass_verify = $this->passHashDyc(($data['password']), $record->password);
            if ($pass_verify) {
                $roles = $this->role_model->getStaffRoles($record->id);
                //var_dump($roles);exit;
                $record->roles = array($roles[0]->name => $roles[0]->role_id);
                return $record;
            }
        }
        return false;
    }
    public function getByEmail($email) {
        $this->db->select('*');
        $this->db->from('employee');
        $this->db->where('email',$email);
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            return FALSE;
        }
    }
    function passHashDyc($password,$encrypt_password) {
        $isPasswordCorrect = password_verify($password, $encrypt_password);
       // var_dump($isPasswordCorrect);exit;
        return $isPasswordCorrect;
    }
//    public function checkLogin($data) {
//        $this->db->select('id, username, password');
//        $this->db->from('admin');
//        $this->db->where('email', $data['username']);
//        $this->db->where('password', MD5($data['password']));
//        $this->db->limit(1);
//        $query = $this->db->get();
//        if ($query->num_rows() == 1) {
//            return $query->result();
//        } else {
//            return false;
//        }
//    }
//    admin login
     public function read_user_information($email) {
        $condition = "email =" . "'" . $email . "'";
        $this->db->select('*');
        $this->db->from('admin');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();
//      echo $this->db->last_query();exit;
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }
    public function getExpensebyDay($date) {
        $sql = 'SELECT SUM(amount) as amount FROM expenses where date=' . $this->db->escape($date);

        $query = $this->db->query($sql);
        return $query->result_array();
    }

}