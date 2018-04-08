<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Data_inventory extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('inventory_m');
    }

    public function index() {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];
            $data['fullname'] = $session_data['nama_user'];
            $data['data_inv'] = $this->inventory_m->view_input()->result();
            $this->load->view('inventoryData_v', $data);
        } else {
            redirect('login', 'refresh');
        }
    }

    function hapus($idBarang) {
        $where = array('idBarang' => $idBarang);
        $this->inventory_m->remove($where, 'inventory_t');
        redirect('data_inventory', '');
    }

    function edit($idBarang) {

        $where = array('idBarang' => $idBarang);
        $session_data = $this->session->userdata('logged_in');
        $data['username'] = $session_data['username'];
        $data['fullname'] = $session_data['nama_user'];
        $this->load->model('penyedia_m');
        $data['data_penyedia'] = $this->penyedia_m->view()->result();
        $data['data_inv'] = $this->inventory_m->edit($where, 'inventory_t')->result();
        $this->load->view('inventory_edit_v', $data);
        //redirect('penyedia');
    }

}
