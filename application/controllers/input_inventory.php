<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Input_inventory extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('inventory_m');
    }

    public function index() {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];
            $data['fullname'] = $session_data['nama_user'];
            $this->load->model('penyedia_m');
            $data['data_inventaris'] = $this->inventory_m->view()->result();
            $data['data_penyedia'] = $this->penyedia_m->view()->result();
            $data['data_inv'] = $this->inventory_m->view_input()->result();
            $this->load->view('inventory_add_v', $data);
        } else {
            redirect('login', 'refresh');
        }
    }

    function insert() {
        $this->load->model('penyedia_m');
        $datax['data_penyedia'] = $this->penyedia_m->view()->result();
        $datax['data_inv'] = $this->inventory_m->view_input()->result();
        $namaBarang = $this->input->post('namaBarang');
        $idBarang = $this->input->post('idBarang');

        $np = substr($namaBarang, 0, 4);
        $this->db->select('RIGHT(inventory_t.idPenyedia,2)as kode', FALSE);
        $this->db->order_by('idBarang', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('inventory_t');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            $kode = 1;
        }

        $kodemax = str_pad($kode, 2, "0", STR_PAD_LEFT);
        $kode_baru = "B".$kodemax.$np ;
        date_default_timezone_set('Asia/Jakarta');
        $tglinput = date("Y-m-d H:i:s");
        $data = array(
            'idBarang' => $kode_baru,
            'namaBarang' => $namaBarang,
            'idPenyedia' => $this->input->post('penyedia'),
            'harga' => $this->input->post('harga'),
            'tanggal' => $tglinput
                //'discount' => $disc,
        );

        $this->form_validation->set_rules('namaBarang', 'namaBarang', 'trim|required');
        $this->form_validation->set_rules('harga', '', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('inventory_add_v',$datax);
            $this->session->set_flashdata('msg', 'Masukan data dengan benar');
        } else {
            $this->inventory_m->insert($data, 'inventory_t');
            $this->session->set_flashdata('msg', 'Data berhasil disimpan');
            redirect('input_inventory');
        }
    }

}
