<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Input_transaksi extends CI_Controller {

    function __construct() {
        parent::__construct();
        
    }

    public function index() {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];
            $data['fullname'] = $session_data['nama_user'];
            $this->load->model('inventory_m');
            $data['data_inv'] = $this->inventory_m->view_input()->result();
            $this->load->model('transaksi_m');
            $data['transaksi'] = $this->transaksi_m->view_input()->result();
            $this->load->view('transaksi_add_v', $data);
        } else {
            redirect('login', 'refresh');
        }
    }

    public function insert() {
        $this->load->model('inventory_m');
        $this->load->model('transaksi_m');
        $datax['data_inv'] = $this->inventory_m->view_input()->result();
        $datax['transaksi'] = $this->transaksi_m->view_input()->result();
        $Barang = $this->input->post('Barang');
        $quantity = $this->input->post('quantity');

        $data = array(
            'idBarang' => $Barang,
            'quantity' => $quantity,
        );

        $this->form_validation->set_rules('Barang', 'Barang', 'trim|required');
        $this->form_validation->set_rules('quantity', 'jumlah', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('transaksi_add_v',$datax);
            $this->session->set_flashdata('msg', 'Masukan data dengan benar');
            //redirect('input_transaksi');
        } else {
            $this->transaksi_m->insert($data, 'transaksi_t');
            $this->session->set_flashdata('msg', 'Data berhasil disimpan');
            redirect('input_transaksi');
        }
    }

}
