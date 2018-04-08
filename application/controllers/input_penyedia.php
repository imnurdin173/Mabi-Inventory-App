<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Input_penyedia extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('penyedia_m');
    }

    public function index() {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];
            $data['fullname'] = $session_data['nama_user'];
            // kode utk buat id otomatis, trus tambahin value="<?php $kodeID; php>" di form VIEW nya
            $data['data_penyedia'] = $this->penyedia_m->view()->result();
            //error cuy
            //$a['kodeID'] = $this->penyedia_m->new_kode();
            
            $this->load->view('penyedia_add_v', $data);
        } else {
            redirect('login', 'refresh');
        }
    }

}
