<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User_m extends CI_Model {

    function login($username, $password) {
        $this->db->select('username, nama_user, email, password');
        $this->db->from('user_t');
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $this->db->limit(1);

        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    function register() {
        $email = $this->input->post('email');
        $fullname = $this->input->post('nama_user');
        $uname = $this->input->post('username');
        $pass = $this->input->post('password');
        $data = array('username' => $uname, 'nama_user' => $fullname, 'email' => $email, 'password' => $pass);
        $this->db->insert('user_t', $data);
    }

    function update($where, $data, $table) {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

}
