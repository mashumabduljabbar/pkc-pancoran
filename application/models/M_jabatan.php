<?php
class M_jabatan extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_jabatan() {
        $query = $this->db->get('jabatan');
        return $query->result();
    }

    public function get_jabatan_by_id($id) {
        $this->db->where('id_jabatan', $id);
        $query = $this->db->get('jabatan');
        return $query->row();
    }

}
