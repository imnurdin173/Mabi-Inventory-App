<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('user_m','',TRUE);
    }
	public function index()
	{
		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];
                        $data['fullname'] = $session_data['nama_user'];
			$this->load->view('setting_v', $data);
		} else{
			redirect('login');
		}
	}
        
        function update() {
            $pass = $this->input->post('password');
            $data = array ('password'=>$pass);             
            $where = array('username'=> $this->session->userdata('username'));
            $this->user_m->update($where, $data, 'user_t');
            redirect('setting');
            
        }
}