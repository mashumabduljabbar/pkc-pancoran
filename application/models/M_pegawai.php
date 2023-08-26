<?php
class M_pegawai extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_pegawai() {
        $this->db->select('pegawai.*, jabatan.nama_jabatan AS nama_jabatan, lokasi.nama_lokasi AS nama_lokasi');
        $this->db->from('pegawai');
        $this->db->join('jabatan', 'pegawai.id_jabatan = jabatan.id_jabatan', 'left');
        $this->db->join('lokasi', 'pegawai.id_lokasi_kerja = lokasi.id_lokasi', 'left');
    
        $query = $this->db->get();
        return $query->result();
    }

    public function get_pegawai_by_id($id) {
        $this->db->where('id_pegawai', $id);
        $query = $this->db->get('pegawai');
        return $query->row();
    }
    
    public function update_pegawai($id, $data) {
        $this->db->where('id_pegawai', $id);
        $this->db->update('pegawai', $data);
    }

    public function insert_pegawai($data) {
        $this->db->insert('pegawai', $data);
    }

    public function delete_pegawai($id) {
        $this->db->where('id_pegawai', $id);
        $this->db->delete('pegawai');
    }

    public function is_nip_exists($id, $nip) {
        $this->db->where('id_pegawai !=', $id);
        $this->db->where('nip', $nip);
        $query = $this->db->get('pegawai');
        return $query->num_rows() > 0;
    }

}
