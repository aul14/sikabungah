<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Kehamilan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_kehamilan');
        if ($this->session->userdata("SIKABUNGAH_STATUS") != "LOGIN") {

            redirect('login', 'refresh');
        }
    }


    public function index()
    {
        $data = array(
            "login_name" => $this->session->userdata('SIKABUNGAH_NAMA_USER')
        );

        $this->load->view('kehamilan/index', $data);
    }

    public function data_periksa()
    {
        $id_kehamilan_ke = trim($this->input->post('id_kehamilan_ke'));
        $norm = trim($this->input->post('norm'));

        $data_periksa = $this->m_kehamilan->listing_periksa($id_kehamilan_ke, $norm)->result_array();

        echo json_encode([
            'data_periksa' => $data_periksa
        ]);
        die;
    }

    public function search_norm()
    {
        $norm = trim($this->input->post('norm_cari'));

        $data = $this->m_kehamilan->search_norm($norm)->row_array();
        $data_hamil = $this->m_kehamilan->listing($norm)->result_array();

        if (!empty($data)) {
            $result = true;
            $msg = "Data pasien dengan norm <strong>{$norm}</strong> ditemukan!";
        } else {
            $result = false;
            $msg = "Data pasien dengan norm <strong>{$norm}</strong> tidak ditemukan!";
        }

        echo json_encode([
            'result' => $result,
            'tgl_lahir' => date('d-F-Y', strtotime($data['TGL_LAHIR'])),
            'data' => $data,
            'message' => $msg,
            'data_hamil'    => $data_hamil
        ]);
        die;
    }

    public function store_kehamilan()
    {
        $norm = $this->input->post('norm_hamil');
        $nama = $this->input->post('nama_hamil');
        $alamat = $this->input->post('alamat_hamil');
        $tgl_lahir = $this->input->post('tgl_lahir_hamil');
        $kehamilan_ke = $this->input->post('kehamilan_ke');
        $tgl_akhir_mens = $this->input->post('tgl_akhir_mens');

        $query = $this->m_kehamilan->store_hamil($norm, $nama, $alamat, $tgl_lahir, $kehamilan_ke, $tgl_akhir_mens);
        if ($query) {
            $data = true;
            $msg = 'Data kehamilan ke Berhasil disimpan!';
        } else {
            $data = false;
            $msg = 'Data kehamilan ke Gagal disimpan!';
        }

        echo json_encode([
            'data'  => $data,
            'norm'  => $norm,
            'message' => $msg
        ]);
        die;
    }

    public function store_periksa()
    {
        $id_kehamilan_ke = $this->input->post('id_kehamilan_ke');
        $norm_periksa = $this->input->post('norm_periksa');
        $tgl_periksa = date('Y-m-d H:i:s', strtotime($this->input->post('tgl_periksa')));
        $minggu_ke = $this->input->post('minggu_ke');
        $berat_badan = $this->input->post('berat_badan');
        $tinggi_badan = $this->input->post('tinggi_badan');
        $tensi = $this->input->post('tensi');
        $berat_badan_janin = $this->input->post('berat_badan_janin');
        $lingkar_kepala = $this->input->post('lingkar_kepala');
        $lingkar_perut = $this->input->post('lingkar_perut');

        $lingkar_kepala = $lingkar_kepala == '' ? 0 : $lingkar_kepala;
        $lingkar_perut = $lingkar_perut == '' ? 0 : $lingkar_perut;

        $query = $this->m_kehamilan->store_periksa($id_kehamilan_ke, $norm_periksa, $tgl_periksa, $minggu_ke, $berat_badan, $tinggi_badan, $tensi, $berat_badan_janin, $lingkar_kepala, $lingkar_perut);

        if ($query) {
            $data = true;
            $msg = 'Data periksa Berhasil disimpan!';
        } else {
            $data = false;
            $msg = 'Data periksa Gagal disimpan!';
        }

        echo json_encode([
            'data'  => $data,
            'norm'  => $norm_periksa,
            'message' => $msg,
            'id_kehamilan_ke' => $id_kehamilan_ke
        ]);
        die;
    }

    public function update_periksa_anak()
    {
        $id_kehamilan_ke = $this->input->post('id_kehamilan_ke');
        $norm_periksa = $this->input->post('norm_periksa');

        $id_periksa_kehamilan = $this->input->post('id_periksa_kehamilan');
        $tgl_periksa = date('Y-m-d H:i', strtotime($this->input->post('tgl_periksa')));
        $berat_badan_janin = $this->input->post('berat_badan_janin');
        $lingkar_kepala = $this->input->post('lingkar_kepala');
        $lingkar_perut = $this->input->post('lingkar_perut');

        $query = $this->m_kehamilan->update_periksa_anak($id_periksa_kehamilan, $berat_badan_janin, $lingkar_kepala, $lingkar_perut);

        if ($query) {
            $data = true;
            $msg = 'Data periksa kehamilan Berhasil diedit!';
        } else {
            $data = false;
            $msg = 'Data periksa kehamilan Gagal diedit!';
        }

        echo json_encode([
            'data'  => $data,
            'norm'  => $norm_periksa,
            'message' => $msg,
            'id_kehamilan_ke' => $id_kehamilan_ke
        ]);
        die;
    }

    public function update_periksa_ibu()
    {
        $id_kehamilan_ke = $this->input->post('id_kehamilan_ke');
        $norm_periksa = $this->input->post('norm_periksa');

        $id_periksa_kehamilan = $this->input->post('id_periksa_kehamilan');
        $tgl_periksa = date('Y-m-d H:i', strtotime($this->input->post('tgl_periksa')));
        $minggu_ke = $this->input->post('minggu_ke');
        $berat_badan = $this->input->post('berat_badan');
        $tinggi_badan = $this->input->post('tinggi_badan');
        $tensi = $this->input->post('tensi');

        $query = $this->m_kehamilan->update_periksa_ibu($id_periksa_kehamilan, $minggu_ke, $berat_badan, $tinggi_badan, $tensi);

        if ($query) {
            $data = true;
            $msg = 'Data periksa kehamilan Berhasil diedit!';
        } else {
            $data = false;
            $msg = 'Data periksa kehamilan Gagal diedit!';
        }

        echo json_encode([
            'data'  => $data,
            'norm'  => $norm_periksa,
            'message' => $msg,
            'id_kehamilan_ke' => $id_kehamilan_ke
        ]);
        die;
    }

    public function update_lahir()
    {
        $id_kehamilan_ke = trim($this->input->post('edit_id_kehamilan_ke'));
        $norm_edit = trim($this->input->post('norm_edit'));

        $query = $this->m_kehamilan->update_lahir($id_kehamilan_ke);

        if ($query) {
            $data = true;
            $msg = 'Data status kehamilan Berhasil diupdate!';
        } else {
            $data = false;
            $msg = 'Data status kehamilan Gagal diupdate!';
        }
        echo json_encode([
            'data'  => $data,
            'norm'  => $norm_edit,
            'message' => $msg,
            'id_kehamilan_ke' => $id_kehamilan_ke
        ]);
        die;
    }

    public function hapus_periksa()
    {
        $id_periksa_kehamilan = trim($this->input->post('hapus_id'));
        $norm = trim($this->input->post('hapus_norm'));
        $id_kehamilan_ke = trim($this->input->post('id_flexibel'));

        $query = $this->m_kehamilan->hapus_periksa($id_periksa_kehamilan);
        if ($query) {
            $data = true;
            $msg = 'Data periksa kehamilan Berhasil dihapus!';
        } else {
            $data = false;
            $msg = 'Data periksa kehamilan Gagal dihapus!';
        }
        echo json_encode([
            'data'  => $data,
            'message' => $msg,
            'norm'    =>  $norm,
            'id_kehamilan_ke' => $id_kehamilan_ke
        ]);
        die;
    }

    public function detail_periksa_by_id()
    {
        $id_periksa_kehamilan = trim($this->input->post('id_edit_ibu'));
        $query = $this->m_kehamilan->detail_periksa_by_id($id_periksa_kehamilan);
        if ($query) {
            $data = true;
            $result = $query->row_array();
            $msg = 'Data periksa kehamilan Berhasil ditemukan!';
        } else {
            $data = false;
            $result = "";
            $msg = 'Data periksa kehamilan Gagal ditemukan!';
        }
        echo json_encode([
            'data'  => $data,
            'result'    => $result,
            'message' => $msg
        ]);
        die;
    }

    public function cek_tinggi_badan()
    {
        $id = trim($this->input->post('id'));
        $norm = trim($this->input->post('norm'));

        $query = $this->m_kehamilan->data_cek_tinggi_badan($id, $norm);
        if ($query) {
            $data = true;
            $result = $query->row_array();
            $msg = 'Data periksa kehamilan tinggi badan Berhasil ditemukan!';
        } else {
            $data = false;
            $result = "";
            $msg = 'Data periksa kehamilan tinggi badan Gagal ditemukan!';
        }
        echo json_encode([
            'data'  => $data,
            'result'    => $result,
            'message' => $msg
        ]);
        die;
    }
}

/* End of file Kehamilan.php */
