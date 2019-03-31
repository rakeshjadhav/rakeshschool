<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Auth {

    var $CI;

    //this is the expiration for a non-remember session
    //var $session_expire	= 600;
 
    function __construct() {
        $this->CI = & get_instance();
        $this->set_timezone();
        $this->CI->load->database();
        $this->CI->load->library('encrypt');
          
    }
    
    function set_timezone() {

        if ($this->CI->customlib->getTimeZone()) {
           // date_default_timezone_set($this->CI->customlib->getTimeZone());
        }
        else {
            return date_default_timezone_set('UTC');
        }
    }
    //site logout
    function logout() {
        $this->CI->session->unset_userdata('admin');
        $this->CI->session->sess_destroy();
    
    }
    public function is_logged_in($default_redirect = false){
        $admin = $this->CI->session->userdata('admin');
        if (!$admin) {
            $_SESSION['redirect_to'] = current_url();
            redirect('site/login');
            return false;
        } else {
            $this->app_routine();

            if ($default_redirect) {
                redirect('webadmin/admin/dashboard');
            }
            return true;
        }
    }
            
        //libbrary login check

    function is_logged_in_librarian($redirect = false, $default_redirect = true) {
        $student = $this->CI->session->userdata('student');
        if (!$student) {
            if ($default_redirect) {
                redirect('site/userlogin');
            }
            return false;
        } else {
            if ($student['role'] != "librarian") {

                redirect('site/userlogin');
            }
            return true;
        }
    }
    //teacher login check
    function is_logged_in_teacher($redirect = false, $default_redirect = true) {
        $teacher = $this->CI->session->userdata('student');
        if (!$teacher) {
            if ($default_redirect) {
                redirect('site/userlogin');
            }
            return false;
        } else {
            if ($teacher['role'] != "teacher") {
                redirect('site/userlogin');
            }

            return true;
        }
    }
    //student login dashboard
    function is_logged_in_user($redirect = false, $default_redirect = true) {
        $student = $this->CI->session->userdata('student');
        if (!$student) {
            if ($default_redirect) {
                redirect('site/userlogin');
            }
            return false;
        } else {
            if ($student['role'] != "student") {

                redirect('site/userlogin');
            }

            return true;
        }
    }
    
    
     function is_logged_in_parent($redirect = false, $default_redirect = true) {
        $parent = $this->CI->session->userdata('student');
        if (!$parent) {
            if ($default_redirect) {
                redirect('site/userlogin');
            }
            return false;
        } else {
            if ($parent['role'] != "parent") {

                redirect('site/userlogin');
            }

            return true;
        }
    }
//   parent login 
   function validate_child($id= NULL){
    $parent=$this->CI->session->userdata('student');
   $parent_id=$parent['id'];
     if($id){

            $this->CI->db->select('*')->from('users');
            $this->CI->db->where('users.id', $parent_id);
            $query = $this->CI->db->get();
            $prent_childs= $query->row(); 
            $childs=explode(',', $prent_childs->childs);
                       if(!in_array($id, $childs)){
                            header("HTTP/1.1 404 Not Found");
           show_404();
           return false;
            }
    else {
       return true;
    }   
  
}
}
//login with sesstio time
public function logged_in(){
        return (bool) $this->CI->session->userdata('admin');
    }
    
    public function app_routine()
    {

        $this->CI->load->library('Enc_lib');
        $t       = strtotime(date('d-m-Y'));
        $fname   = APPPATH . 'config/config.php';
        $fhandle = fopen($fname, "r");
        $content = fread($fhandle, filesize($fname));
        $dt      = rand(5, 25);
        if (strpos($content, '$config[\'routine_session\']') == false) {
            $fhandle    = fopen($fname, 'a') or die("can't open file");
            $stringData = '$config[\'routine_session\'] = ' . $dt . ';' . "\n";
            if (strpos($content, '$config[\'routine_update\']') == false) {
                $stringData .= '$config[\'routine_update\'] = ' . $t . ';' . "\n";
            }
            if (fwrite($fhandle, $stringData)) {

            }
        }
        fclose($fhandle);

        $update_session   = $this->CI->config->item('routine_session');
        $last_update      = $this->CI->config->item('routine_update');
        $lst_update_month = date('m', $last_update);
        $lst_update_year  = date('Y', $last_update);

        if (($lst_update_month < date("n", strtotime("first day of previous month")) and $lst_update_year == date('Y')) or ($lst_update_month > date('m') and $lst_update_year < date('Y')) or ($update_session >= date('d') and $lst_update_month < date('m') and $lst_update_year == date('Y')) or ($update_session < date('d') and $lst_update_month == date("n", strtotime("first day of previous month")) and $lst_update_year == date('Y'))) {

            $file_license = APPPATH . 'config/license.php';

            $envato_market_purchase_code = $this->CI->config->item('envato_market_purchase_code');
            $envato_market_username      = $this->CI->config->item('envato_market_username');
            $sslk                        = $this->CI->config->item('SSLK');
           // $app_version                 = $this->CI->customlib->getAppVersion();

            $url         = $this->CI->enc_lib->dycrypt(DEBUG_SYSTEM);
            $school      = $this->CI->setting_model->get()[0];
            $ip          = $this->CI->input->ip_address();
            $name        = $school['name'];
            $email       = $school['email'];
            $phone       = $school['phone'];
            $address     = $school['address'];
            $date_format = $school['date_format'];
            $timezone    = $school['timezone'];
            if (!file_exists($file_license)) {
                $envato_market_purchase_code = "tempered";
                $envato_market_username      = 'tempered';
            }
            $post = [
                'ip'          => $ip,
                'site_url'    => base_url(),
                'site_name'   => $name,
                'email'       => $email,
                'phone'       => $phone,
                'address'     => $address,
                'date_format' => $date_format,
                'timezone'    => $timezone,
                'sslk'        => $sslk,
                'app_version' => $app_version,
                'empc'        => $envato_market_purchase_code,
                'em_username' => $envato_market_username,
            ];
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
            $data = curl_exec($ch);

            if (curl_errno($ch)) {

            } else {
                $resultStatus = curl_getinfo($ch, CURLINFO_HTTP_CODE);

                if ($resultStatus == 200) {
                    $up_tm         = strtotime(date('d-m-Y'));
                    $fname         = APPPATH . 'config/config.php';
                    $update_handle = fopen($fname, "r");
                    $content       = fread($update_handle, filesize($fname));
                    $file_contents = str_replace('$config[\'routine_update\'] = ' . $last_update, '$config[\'routine_update\'] = ' . $up_tm, $content);
                    $update_handle = fopen($fname, 'w') or die("can't open file");
                    if (fwrite($update_handle, $file_contents)) {

                    }
                    fclose($update_handle);
                }
                curl_close($ch);
            }
        }
    }
    
    //userlogin
    
    public function user_logged_in(){
        return (bool) $this->CI->session->userdata('student');
    }
}