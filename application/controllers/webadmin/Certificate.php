<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Certificate extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->library('Customlib');
        $this->load->model('certificate_model');
    }

    public function index() {
        if($this->session->userdata('isUserLoggedIn')){
//        if (!$this->rbac->hasPrivilege('student_certificate', 'can_view')) {
//            access_denied();
//        }

        $this->data['certificateList'] = $this->certificate_model->certificateList();
        $this->load->view('adminlogin/layout/header');
        $this->load->view('adminlogin/certificate/createcertificate', $this->data);
        $this->load->view('adminlogin/layout/footer');
        }else{
            $this->session->set_userdata('msg', 'Your Session is destroy. Please login to your account.');
            redirect('site/login');
        }
    }
    
    public function create() {
        if($this->session->userdata('isUserLoggedIn')){

//        if (!$this->rbac->hasPrivilege('student_certificate', 'can_add')) {
//            access_denied();
//        }
       //  var_dump($_POST);exit;
         //echo "hii"; exit();
        $data['title'] = 'Add Certificate';

        if (!empty($_FILES['background_image']['name'])) {
            $config['upload_path'] = 'uploads/certificate/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['file_name'] = $_FILES['background_image']['name'];

            //Load upload library and initialize configuration
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if ($this->upload->do_upload('background_image')) {
                $uploadData = $this->upload->data();
                $picture = $uploadData['file_name'];
            } else {
                $picture = '';
            }
        } else {
            $picture = '';
        }

        $this->form_validation->set_rules('certificate_name', 'Certificate Name', 'trim|required');
        $this->form_validation->set_rules('certificate_text', 'Certificate Text', 'trim|required');
        // $this->form_validation->set_rules('background_image', 'Background Image', 'trim|required|xss_clean');
        if ($this->form_validation->run() == FALSE) {
           
            $this->data['certificateList'] = $this->certificate_model->certificateList();
            $this->load->view('adminlogin/layout/header');
            $this->load->view('adminlogin/certificate/createcertificate', $this->data);
            $this->load->view('adminlogin/layout/footer');
        } else {
            if ($this->input->post('is_active_student_img') == 1) {
                $enableimg = $this->input->post('is_active_student_img');
                $imgHeight = $this->input->post('image_height');
            } else {
                $enableimg = 0;
                $imgHeight = 0;
            }
            //var_dump($_POST);exit;
            $data = array(
                'certificate_name' => $this->input->post('certificate_name'),
                'certificate_text' => $this->input->post('certificate_text'),
                'left_header' => $this->input->post('left_header'),
                'center_header' => $this->input->post('center_header'),
                'right_header' => $this->input->post('right_header'),
                'left_footer' => $this->input->post('left_footer'),
                'right_footer' => $this->input->post('right_footer'),
                'center_footer' => $this->input->post('center_footer'),
                'created_for' => 2,
                'status' => 1,
                'background_image' => $picture,
                'header_height' => $this->input->post('header_height'),
                'content_height' => $this->input->post('content_height'),
                'footer_height' => $this->input->post('footer_height'),
                'content_width' => $this->input->post('content_width'),
                'enable_student_image' => $enableimg,
                'enable_image_height' => $imgHeight,
            );
            //var_dump($data);exit;
            $this->certificate_model->addcertificate($data);
            $this->session->set_flashdata('msg', '<div class="alert alert-success text-left">Certificate added successfully</div>');
            redirect('webadmin/certificate/index');
        }
        }else{
            $this->session->set_userdata('msg', 'Your Session is destroy. Please login to your account.');
            redirect('site/login');
        }
    }
    
    public function view() {
        if($this->session->userdata('isUserLoggedIn')){
        $id = $this->input->post('certificateid');
        $output = '';
        $data = array();

        $data['certificate'] = $this->certificate_model->certifiatebyid($id);
        $preview = $this->load->view('adminlogin/certificate/preview_certificate', $data, true);
        echo $preview;
        }else{
            $this->session->set_userdata('msg', 'Your Session is destroy. Please login to your account.');
            redirect('site/login');
        }
    }
    
     function edit($id) {
if($this->session->userdata('isUserLoggedIn')){
//        if (!$this->rbac->hasPrivilege('student_certificate', 'can_edit')) {
//            access_denied();
//        }
      //  var_dump($_POST);exit;
        $data['title'] = 'Update Certificate';
        $data['id'] = $id;
        $editcertificate = $this->certificate_model->get($id);
        $this->data['editcertificate'] = $editcertificate;
        $this->form_validation->set_rules('certificate_name', 'Certificate Name', 'trim|required');
        $this->form_validation->set_rules('certificate_text', 'Certificate Text', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $this->data['certificateList'] = $this->certificate_model->certificateList();
                       $this->load->view('adminlogin/layout/header');
            $this->load->view('adminlogin/certificate/studentcertificateedit', $this->data);
            $this->load->view('adminlogin/layout/footer');
        } else {

            if ($this->input->post('is_active_student_img') == 1) {
                $enableimg = $this->input->post('is_active_student_img');
                $imgHeight = $this->input->post('image_height');
            } else {
                $enableimg = 0;
                $imgHeight = 0;
            }
            if (!empty($_FILES['background_image']['name'])) {
                //echo "Hi"; exit();
                $config['upload_path'] = 'uploads/certificate/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name'] = $_FILES['background_image']['name'];

                //Load upload library and initialize configuration
                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if ($this->upload->do_upload('background_image')) {
                    $uploadData = $this->upload->data();
                    $picture = $uploadData['file_name'];
                    var_dump($picture);exit;
                    $data = array(
                        'id' => $this->input->post('id'),
                        'certificate_name' => $this->input->post('certificate_name'),
                        'certificate_text' => $this->input->post('certificate_text'),
                        'left_header' => $this->input->post('left_header'),
                        'center_header' => $this->input->post('center_header'),
                        'right_header' => $this->input->post('right_header'),
                        'left_footer' => $this->input->post('left_footer'),
                        'right_footer' => $this->input->post('right_footer'),
                        'center_footer' => $this->input->post('center_footer'),
                        'created_for' => 2,
                        'status' => 1,
                        'background_image' => $picture,
                        'header_height' => $this->input->post('header_height'),
                        'content_height' => $this->input->post('content_height'),
                        'footer_height' => $this->input->post('footer_height'),
                        'content_width' => $this->input->post('content_width'),
                        'enable_student_image' => $enableimg,
                        'enable_image_height' => $imgHeight,
                    );
                } else {
                    $picture = '';
                    $data = array(
                        'id' => $this->input->post('id'),
                        'certificate_name' => $this->input->post('certificate_name'),
                        'certificate_text' => $this->input->post('certificate_text'),
                        'left_header' => $this->input->post('left_header'),
                        'center_header' => $this->input->post('center_header'),
                        'right_header' => $this->input->post('right_header'),
                        'left_footer' => $this->input->post('left_footer'),
                        'right_footer' => $this->input->post('right_footer'),
                        'center_footer' => $this->input->post('center_footer'),
                        'header_height' => $this->input->post('header_height'),
                        'content_height' => $this->input->post('content_height'),
                        'footer_height' => $this->input->post('footer_height'),
                        'content_width' => $this->input->post('content_width'),
                        'enable_student_image' => $enableimg,
                        'enable_image_height' => $imgHeight,
                    );
                }
            } else {
                $data = array(
                    'id' => $this->input->post('id'),
                    'certificate_name' => $this->input->post('certificate_name'),
                    'certificate_text' => $this->input->post('certificate_text'),
                    'left_header' => $this->input->post('left_header'),
                    'center_header' => $this->input->post('center_header'),
                    'right_header' => $this->input->post('right_header'),
                    'left_footer' => $this->input->post('left_footer'),
                    'right_footer' => $this->input->post('right_footer'),
                    'center_footer' => $this->input->post('center_footer'),
                    'header_height' => $this->input->post('header_height'),
                    'content_height' => $this->input->post('content_height'),
                    'footer_height' => $this->input->post('footer_height'),
                    'content_width' => $this->input->post('content_width'),
                    'enable_student_image' => $enableimg,
                    'enable_image_height' => $imgHeight,
                );
            }
            $this->certificate_model->addcertificate($data);
            $this->session->set_flashdata('msg', '<div class="alert alert-success text-left">Certificate updated successfully</div>');
            redirect('webadmin/certificate/edit/' . $this->input->post('id'));
        }
        }else{
            $this->session->set_userdata('msg', 'Your Session is destroy. Please login to your account.');
            redirect('site/login');
        }
    }
}
