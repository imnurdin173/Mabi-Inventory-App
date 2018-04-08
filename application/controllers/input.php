<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Input extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('inventory_m');
    }
	public function index()
	{
		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			//$data['username'] = $session_data['username'];
                        $data['fullname'] = $session_data['nama_user'];
                        $data['pil'] = $this->inventory_m->view_input();
                        $this->load->view('inputTransaksi_v', $data);
		} else{
			redirect('login', 'refresh');
		}
	}
                
        public function option () {
            $this->load->library('form_validation');
            $namaB = $this->input->post('namaBarang');
            
        }
        
        function validate($namaB) {
            if($namaB == "none") {
                $this->form_validation->set_message('validate', 'Please select your option');
                
                return false;
            } else {
                return true;
                
            }
        }
       
}