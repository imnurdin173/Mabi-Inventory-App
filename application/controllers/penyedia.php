<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Penyedia extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('penyedia_m');
    }

    public function index() {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];
            $data['fullname'] = $session_data['nama_user'];
            $data['data_penyedia'] = $this->penyedia_m->view()->result();
            $this->load->view('penyedia_v', $data);
        } else {
            redirect('login', 'refresh');
        }
    }

    function edit($idPenyedia) {

        $where = array('idPenyedia' => $idPenyedia);
        $session_data = $this->session->userdata('logged_in');
        $data['username'] = $session_data['username'];
        $data['fullname'] = $session_data['nama_user'];
        $data['data_penyedia'] = $this->penyedia_m->edit($where, 'penyedia_t')->result();
        $this->load->view('penyedia_edit_v', $data);
        //redirect('penyedia');
    }

    function hapus($idPenyedia) {
        $where = array('idPenyedia' => $idPenyedia);
        $this->penyedia_m->remove($where, 'penyedia_t');
        redirect('penyedia');
    }

    function insert() {
        $namaPenyedia = $this->input->post('namaPenyedia');
        $np = substr($namaPenyedia,0,4);
        $this->db->select('RIGHT(penyedia_t.idPenyedia,2)as kode',FALSE);
        $this->db->order_by('idPenyedia','DESC');
        $this->db->limit(1);
        $query = $this->db->get('penyedia_t');
        if ($query->num_rows() <> 0 ) {
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            $kode = 1;
        }
        
        $kodemax = str_pad($kode,2,"0",STR_PAD_LEFT);
        $kode_baru = "P".$kodemax.$np;
        
        $data = array(
            'idPenyedia' => $kode_baru,
            'namaPenyedia' => $namaPenyedia,
            'discount' => $this->input->post('discount'),
            'keterangan' => $this->input->post('keterangan')
        );

        $this->form_validation->set_rules('namaPenyedia', 'namaPenyedia', 'trim|required');
        $this->form_validation->set_rules('discount', 'discount', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('penyedia_add_v');
        } else {
            $this->penyedia_m->insert($data, 'penyedia_t');
            $this->session->set_flashdata('msg', 'Data berhasil disimpan');
            redirect('input_penyedia');
        }
    }

}
