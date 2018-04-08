<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$this->form_validation->set_rules('username','Username','trim|required');
		$this->form_validation->set_rules('password','Password','trim|required|callback_cek_database');
		if($this->form_validation->run()==false){
			$this->load->view('login_v');
		} else{
			redirect(base_url('index.php/home'), 'refresh');
		}
	}

	function cek_database($password){
		$username = $this->input->post('username');
		$result = $this->login->login($username,$password);
		if($result){
			$sess_array = array();
			foreach ($result as $row) {
				$sess_array = $arrayName = array('username' => $row->username, 'nama_user' => $row->nama_user, 'email'=>$row->email);
				$this->session->set_userdata('logged_in', $sess_array);
			}
			return true;
		} else{
			$this->form_validation->set_message('cek_database', 'Invalid username or password');
			return false;
		}
	}
}

