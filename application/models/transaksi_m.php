<?php

class Transaksi_m extends CI_Model {

    function insert($data, $table) {
        $this->db->insert($table, $data);
    }

    function view() {
        return $this->db->get('transaksi_t');
    }

    function view_input() {
        $query = "SELECT b.idBarang,b.namaBarang,b.harga,p.idPenyedia, p.namaPenyedia, p.discount, t.quantity
                FROM inventory_t as b,penyedia_t as p, transaksi_t as t
                WHERE (t.idBarang=b.idBarang) AND (b.idPenyedia=p.idPenyedia)";
        return $this->db->query($query);
    }

    function edit($where, $table) {
        return $this->db->get_where($table, $where);
    }

    function update($where, $data, $table) {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    function remove($where, $table) {
        $this->db->where($where);
        $this->db->delete($table);
    }

    function truncate_tabel($table) {
        $this->db->empty_table($table);
    }

    function export() {
        $query = $this->db->query("SELECT b.idBarang,b.namaBarang,b.harga,p.idPenyedia, p.namaPenyedia, p.discount, t.quantity FROM inventory_t as b,penyedia_t as p, transaksi_t as t WHERE (t.idBarang=b.idBarang) AND (b.idPenyedia=p.idPenyedia)");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $data) {
                $hasil[] = $data;
            } return $hasil;
        }
    }

}
