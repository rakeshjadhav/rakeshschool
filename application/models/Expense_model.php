<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Expense_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->current_session = $this->setting_model->getCurrentSession();
    }
    
    public function search($text = null, $start_date = null, $end_date = null) {
        if (!empty($text)) {
            $this->db->select('expenses.id,expenses.date,expenses.name,expenses.amount,expenses.documents,expenses.note,expense_head.exp_category,expenses.exp_head_id')->from('expenses');
            $this->db->join('expense_head', 'expenses.exp_head_id = expense_head.id');

            $this->db->like('expenses.name', $text);
            $query = $this->db->get();
            return $query->result_array();
        } else {
            $this->db->select('expenses.id,expenses.date,expenses.name,expenses.amount,expenses.documents,expenses.note,expense_head.exp_category,expenses.exp_head_id')->from('expenses');
            $this->db->join('expense_head', 'expenses.exp_head_id = expense_head.id');
            $this->db->where('expenses.date >=', $start_date);
            $this->db->where('expenses.date <=', $end_date);
            $query = $this->db->get();
            return $query->result_array();
        }
    }
    
    public function getTotalExpenseBwdate($date_from, $date_to) {
        $query = 'SELECT sum(amount) as `amount` FROM `expenses` where date between ' . $this->db->escape($date_from) . ' and ' . $this->db->escape($date_to);

        $query = $this->db->query($query);
        return $query->row();
    }
}