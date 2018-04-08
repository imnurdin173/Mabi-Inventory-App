<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Insert_transaksi extends CI_Controller {

	 function __construct()
	 {
	   parent::__construct();
		 $this->load->model('transaksi2_m');
                 $this->load->model('inventory_m');
	 }
	public function index()
	{
		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];
                        $data['fullname'] = $session_data['nama_user'];
                        $data['data_inv'] = $this->inventory_m->view_input();
			$this->load->view('transaksi_add_v', $data);
		} else{
			redirect('login', 'refresh');
		}
	}
        
        
	function insert(){
			$idBarang =  $this->input->post('idBarang');
			$quantity = $this->input->post('quantity');
			$harga_total = $quantity * $harga;

			$data = array(
					'idBarang'=> $idBarang,
					'quantity' => $quantity,
					'harga_total' => $harga_total
			);

                        $this->form_validation->set_rules('namaBarang','namaBarang','trim|required');
                        $this->form_validation->set_rules('quantity','jumlah','trim|required');
                        if($this->form_validation->run()==FALSE) {

                            $this->load->view('transaksi_add_v');
                        } else {
                            $this->transaksi2_m->insert($data, 'transaksi2_t');
                            $this->session->set_flashdata('msg', 'Successfully recorded, lets take a look at data table page');
                            redirect('input_transaksi');

                        }
                                                
	}
}
