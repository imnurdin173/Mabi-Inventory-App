<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Insert_inventory extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('inventory_m');
    }

    function index() {
        $idBarang = $this->input->post('idBarang');
        $namaBarang = $this->input->post('namaBarang');
        $harga = $this->input->post('harga');
        $namaPenyedia = $this->option->post();
        
    
        $data = array (
            'idBarang' => $idBarang,
            'namaBarang' => $namaBarang,
            'namaPenyedia' => $namaPenyedia,
            'harga' => $harga,
            'discount' => $disc,
            'keterangan' => $ket
        );
        
        $this->form_validation->set_rules('namaBarang','namaBarang','trim|required');
        $this->form_validation->set_rules('harga','','trim|required');
        if ($this->form_validation->run()== FALSE) {
            $this->load->view('inventory_add_v');
        } else {
            $this->penyedia_m->insert($data, 'inventory_t');
            $this->session->set_flashdata('msg', 'Data berhasil disimpan');
            redirect('input_penyedia');
        }
        
    }

}
