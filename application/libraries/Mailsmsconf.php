<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mailsmsconf {

    public function __construct() {
        $this->CI = & get_instance();
        $this->CI->config->load("mailsms");
      //  $this->CI->load->library('smsgateway');
        $this->CI->load->library('mailgateway');
       // $this->CI->load->model('examresult_model');
       // $this->CI->load->model('student_model');
        $this->config_mailsms = $this->CI->config->item('mailsms');
    }

    public function mailsms($send_for, $sender_details, $date = NULL, $exam_schedule_array = NULL) {
       // $send_for = $this->config_mailsms[$send_for];
      //  var_dump($send_for);exit;
         $mail = new PHPMailer();  
             $mail->IsSMTP();  
             $mail->SMTPDebug = 2;// Sets up a SMTP connection  
             $mail->SMTPAuth = true;         // Connection with the SMTP does require authorization    
             $mail->SMTPSecure = "ssl";      // Connect using a TLS connection  
             $mail->Host = "smtp.googlemail.com";  //Gmail SMTP server address
             $mail->Port = 465;  //Gmail SMTP port
             $mail->Encoding = '7bit';
             // Authentication  
             $mail->Username   = "rakeshjadhav933@gmail.com"; // Your full Gmail address
             $mail->Password   = "rjwebdev@123";
          //  echo"heee"; var_dump($mail);exit;
             
              $contact_name=$_POST["contact_name"];
              $contact_email=$_POST["contact_email"];
              $contact_msg=$_POST["contact_msg"];
              
        $message="Dear Sir<br>
	         Come Enquiry of Product<br>
            	 Name :$contact_name<br>
                 Email Id :$contact_email<br>  	
	         Enquiry Details : $contact_msg<br>";

             
              $mail->SetFrom($contact_email, $contact_email);
              $mail->AddReplyTo($contact_emaile_email, $contact_email);
               $mail->AddCC($contact_email);
              $mail->Subject = "Contact Us Enquiry Form";      // Subject (which isn't required)  
              $mail->MsgHTML($message);
              
             $mail->AddAddress("rakeshjadhav933@gmail.com", "Rakesh Jadhav"); // Where to send it - Recipient
              $result = $mail->Send();		// Send!  
	      $message = $result ? 'Successfully Sent!' : 'Sending Failed!';      
	       unset($mail);
    }
}