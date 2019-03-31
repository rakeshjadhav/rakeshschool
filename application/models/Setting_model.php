<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Setting_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
   
    
    public function get($id = null) {

        $this->db->select('sch_settings.id,sch_settings.lang_id,sch_settings.is_rtl,sch_settings.timezone,
          sch_settings.name,sch_settings.email,sch_settings.phone,languages.language,sch_settings.class_teacher,
          sch_settings.address,sch_settings.dise_code,sch_settings.date_format,sch_settings.currency,sch_settings.currency_symbol,sch_settings.start_month,sch_settings.session_id,sch_settings.image,sch_settings.theme,sessions.session'
        );
        $this->db->from('sch_settings');
        $this->db->join('sessions', 'sessions.id = sch_settings.session_id');
        $this->db->join('languages','languages.id = sch_settings.lang_id');
        if ($id != null) {
            $this->db->where('sch_settings.id', $id);
        } else {
            $this->db->order_by('sch_settings.id');
        }
        $query = $this->db->get();
//      echo $this->db->last_query();exit;
         if ($id != null) {
            return $query->row_array();
        } else {
              $session_array = $this->session->has_userdata('session_array');
              $result = $query->result_array();
            //var_dump($result);exit;
            
            $result[0]['current_session']=array(
               'session_id'=>$result[0]['session_id'],
                'session'=>$result[0]['session']
            );
            
//            var_dump($result[0]['session']);exit;
        if ($session_array) {
            $session_array = $this->session->userdata('session_array');
            $result[0]['session_id'] = $session_array['session_id'];
            $result[0]['session'] = $session_array['session'];
        } 
            return $result;
            //return $query->result_array();
        }
    }
    
     public function getCurrentSession() {
        $session_result = $this->get();
//        var_dump($session_result);exit;
        return $session_result[0]['session_id'];
    }
    public function getCurrentSessionName() {
        $session_result = $this->get();

        return $session_result[0]['session'];
    }
     public function getStartMonth() {
        $session_result = $this->get();
        return $session_result[0]['start_month'];
    }
     public function getDateYmd() {
        return date('Y-m-d');
    }
    public function getCurrentSchoolName() {
        $session_result = $this->get();
        return $session_result[0]['name'];
    }
    public function getCurrentSessiondata() {
        $session_result = $this->get();
        return $session_result[0];
    }

    public function getSetting() {

        $this->db->select('sch_settings.id,sch_settings.lang_id,sch_settings.is_rtl,sch_settings.class_teacher,sch_settings.timezone,
          sch_settings.name,sch_settings.email,sch_settings.phone,languages.language,
          sch_settings.address,sch_settings.dise_code,sch_settings.date_format,sch_settings.currency,sch_settings.currency_symbol,sch_settings.start_month,sch_settings.session_id,sch_settings.image,sch_settings.theme,sessions.session'
        );
        $this->db->from('sch_settings');
        $this->db->join('sessions', 'sessions.id = sch_settings.session_id');
        $this->db->join('languages', 'languages.id = sch_settings.lang_id');

        $this->db->order_by('sch_settings.id');

        $query = $this->db->get();

        return $query->row();
    }
       
    public function add($data) {
        if (isset($data['id'])) {
            $this->db->where('id', $data['id']);
            $this->db->update('sch_settings', $data);
        } else {
            $this->db->insert('sch_settings', $data);
            return $this->db->insert_id();
        }
    }
    
    public function add_cronsecretkey($data, $id) {
        $this->db->where("id", $id)->update("sch_settings", $data);
    }
}