<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {

	public function index()
	{
		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];
                        $data['fullname'] = $session_data['nama_user'];
                        $data['email'] = $session_data['email'];
			$this->load->view('about', $data);
		} else{
			redirect('login', 'refresh');
		}
	}

}
