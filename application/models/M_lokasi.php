<?php
class M_lokasi extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_lokasi() {
        $query = $this->db->get('lokasi');
        return $query->result();
    }

    public function get_lokasi_by_id($id) {
        $this->db->where('id_lokasi', $id);
        $query = $this->db->get('lokasi');
        return $query->row();
    }

}
