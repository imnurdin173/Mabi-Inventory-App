<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Register_c extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('user_m', '', TRUE);
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
    }

    public function index() {
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]', 'callback_username_check');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[10]','required');
        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        if ($this->form_validation->run() == FALSE) {

            $this->load->view('register_v');
        } else {
            $this->user_m->register();
            $this->load->view('register_v');

            $this->session->set_flashdata('msg', 'Successfully recorded');
            redirect('register_c', 'refresh');
        }
    }

    public function username_check($str) {
        if ($str == $uname) {
            $this->form_validation->set_message('username_check', 'Username' . $username . ' ini tidak dapat disimpan, karena sudah ada.');
            return FALSE;
        } else {
            return TRUE;
        }
    }

}
