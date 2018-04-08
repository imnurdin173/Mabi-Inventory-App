<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];
                        $data['fullname'] = $session_data['nama_user'];
                        $data['email'] = $session_data['email'];
                        $this->load->model('inventory_m');
                        $data['barangbaru'] = $this->inventory_m->view_baru()->result();
			$this->load->view('home', $data);
		} else{
			redirect('login', 'refresh');
		}
	}

}
