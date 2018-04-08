<?php
    class Transaksi2_m extends CI_Model {
        
        function insert($data, $table) {
            $this->db->insert($table, $data);
        }
        
        function view() {
            return $this->db->get('transaksi2_t');
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
            $query = $this->db->query("SELECT * from transaksi2_t");
            
            if ($query->num_rows() > 0) {
                foreach ($query->result() as $data) {
                    $hasil[] = $data;
                } return $hasil;
            }
        }
        
    }
