<?php

class Inventory_m extends CI_Model {

    function insert($data, $table) {
        $this->db->insert($table, $data);
    }

    function view() {
        return $this->db->get('inventory_t');
    }

    function view_input() {
        $query = "SELECT b.idBarang,b.namaBarang,b.harga,p.idPenyedia, p.namaPenyedia, p.discount
                FROM inventory_t as b,penyedia_t as p
                WHERE b.idPenyedia=p.idPenyedia";
        return $this->db->query($query);
    }

    function view_baru() {
        $query = "SELECT namaBarang, harga,tanggal FROM inventory_t ORDER BY tanggal DESC LIMIT 0,5";
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

}
