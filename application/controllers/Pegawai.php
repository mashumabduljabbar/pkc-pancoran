<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_pegawai');
        $this->load->model('M_jabatan');
        $this->load->model('M_lokasi');
    }

	public function index()
	{
        $data['pegawai'] = $this->M_pegawai->get_pegawai();
		$this->load->view('v_global_header');
		$this->load->view('v_pegawai', $data);
		$this->load->view('v_global_footer');
	}

    public function tambah()
	{
        $data['jabatan'] = $this->M_jabatan->get_jabatan();
        $data['lokasi'] = $this->M_lokasi->get_lokasi();
		$this->load->view('v_global_header');
		$this->load->view('v_pegawai_tambah', $data);
		$this->load->view('v_global_footer');
	}

    public function ubah($id)
	{
        $data['pegawai'] = $this->M_pegawai->get_pegawai_by_id($id);
        $data['jabatan'] = $this->M_jabatan->get_jabatan();
        $data['jabatan_select'] = $this->M_jabatan->get_jabatan_by_id($data['pegawai']->id_jabatan);
        $data['lokasi'] = $this->M_lokasi->get_lokasi();
        $data['lokasi_select'] = $this->M_lokasi->get_lokasi_by_id($data['pegawai']->id_lokasi_kerja);
		$this->load->view('v_global_header');
		$this->load->view('v_pegawai_ubah', $data);
		$this->load->view('v_global_footer');
	}

    public function hapus($id) {
        $this->M_pegawai->delete_pegawai($id);
        $this->session->set_flashdata('success_message', 'Data pegawai berhasil dihapus.');
        redirect('pegawai');
    }

    public function tambah_aksi() {
        $data = array(
            'nip' => $this->input->post('nip'),
            'nama' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
            'hp' => $this->input->post('hp'),
            'id_jabatan' => $this->input->post('id_jabatan'),
            'id_lokasi_kerja' => $this->input->post('id_lokasi_kerja')
        );
    
        $this->M_pegawai->insert_pegawai($data);

        $this->session->set_flashdata('success_message', 'Data pegawai berhasil disimpan.');
        redirect('pegawai');
    }

    public function ubah_aksi() {
        $id = $this->input->post('id_pegawai');
        $nip = $this->input->post('nip');

        if ($this->M_pegawai->is_nip_exists($id, $nip)) {
            $this->session->set_flashdata('error_message', 'NIP sudah digunakan oleh pegawai lain.');
            redirect('pegawai/ubah/'.$id);
        }

        $data = array(
            'nip' => $this->input->post('nip'),
            'nama' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
            'hp' => $this->input->post('hp'),
            'id_jabatan' => $this->input->post('id_jabatan'),
            'id_lokasi_kerja' => $this->input->post('id_lokasi_kerja')
        );
    
        $this->M_pegawai->update_pegawai($id, $data);
        $this->session->set_flashdata('success_message', 'Data pegawai berhasil diubah.');
        redirect('pegawai');
    }
}
