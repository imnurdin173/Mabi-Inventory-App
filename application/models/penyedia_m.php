<?php
    class Penyedia_m extends CI_Model {
        
        function insert ($data, $table) {
            $this->db->insert($table, $data);
        }
        
        function view() {
            return $this->db->get('penyedia_t');
        }
        
        function edit ($where, $table) {
            return   $this->db->get_where($table,$where);
        }
        
        function update($where, $data, $table) {
            $this->db->where($where);
            $this->db->update($table, $data);
        }
        
        function remove($where, $table) {
            $this->db->where($where);
            $this->db->delete($table);
        }

        function new_kode () {
            $this->db->select('RIGHT(penyedia_t.idPenyedia,2)as kode',FALSE);
            $this->db->order_by('idPenyedia','DESC');
            $this->db->limit(1);
            
            $query = $this->db->get('penyedia_t');
            if ($query->num_rows()<>0) {
                $data = $query->row();
                $kode = intval($data->kode) + 1;
            } else {
                $kode = 1;
            }
            
            $kodemax = str_pad(kode,2,"0",STR_PAD_LEFT);
            $kodebaru = 'S'.$kodemax;
        
        return kodebaru;
        }
}