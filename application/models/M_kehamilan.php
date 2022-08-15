<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_kehamilan extends CI_Model
{
    public function search_norm($norm)
    {
        $query = "SELECT * FROM PASIEN_NO_RM WHERE NORM = '{$norm}' AND KELAMIN = '0'";

        return $this->db->query($query);
    }

    public function listing($norm)
    {
        $query = "SELECT *, CONVERT(char(30), TGL_AKHIR_MENS, 121) TGL_AKHIR_MENS_NEW FROM SIKABUNGAH_KEHAMILAN_KE WHERE NORM = '{$norm}'";
        return $this->db->query($query);
    }

    public function listing_periksa($id_kehamilan_ke, $norm)
    {
        $sql = "SELECT 
                    a.ID_PERIKSA_KEHAMILAN,
                    a.ID_KEHAMILAN_KE,
                    a.NORM,
                    CONVERT(CHAR( 20 ), a.TGL_PERIKSA, 103) AS TGL_PERIKSA,
                    a.MINGGU_KE,
                    a.BERAT_BADAN,
                    a.TINGGI_BADAN,
                    a.TENSI,
                    a.BERAT_BADAN_JANIN,
                    a.LINGKAR_KEPALA,
                    a.LINGKAR_PERUT,
                    a.CREATE_DATE,
                    b.NAMA, 
                    b.ALAMAT, 
                    b.KEHAMILAN_KE,
                    b.STATUS,
                    b.TGL_LAHIR 
                FROM SIKABUNGAH_PERIKSA_KEHAMILAN a
                LEFT JOIN SIKABUNGAH_KEHAMILAN_KE b ON b.ID_KEHAMILAN_KE = a.ID_KEHAMILAN_KE
                WHERE a.ID_KEHAMILAN_KE = $id_kehamilan_ke
                AND a.NORM = '$norm'";
        return $this->db->query($sql);
    }

    public function store_hamil($norm, $nama, $alamat, $tgl_lahir, $kehamilan_ke, $tgl_akhir_mens)
    {
        $sql = "INSERT INTO SIKABUNGAH_KEHAMILAN_KE (NORM, NAMA, ALAMAT, TGL_LAHIR, KEHAMILAN_KE, TGL_AKHIR_MENS, STATUS, CREATE_DATE)
									  VALUES ('$norm', '$nama', '$alamat', '$tgl_lahir', $kehamilan_ke, '$tgl_akhir_mens', '0', getdate())";

        return $this->db->query($sql);
    }

    public function store_periksa($id_kehamilan_ke, $norm, $tgl_periksa, $minggu_ke, $berat_badan, $tinggi_badan, $tensi, $berat_badan_janin, $lingkar_kepala, $lingkar_perut)
    {
        $tgl_periksa = date('Y-m-d');
        $sql = "INSERT INTO SIKABUNGAH_PERIKSA_KEHAMILAN (ID_KEHAMILAN_KE, NORM, TGL_PERIKSA, MINGGU_KE, BERAT_BADAN, TINGGI_BADAN, TENSI, BERAT_BADAN_JANIN, LINGKAR_KEPALA, LINGKAR_PERUT, CREATE_DATE)
        VALUES ($id_kehamilan_ke, '$norm', '$tgl_periksa', '$minggu_ke', $berat_badan, $tinggi_badan, '$tensi', $berat_badan_janin, $lingkar_kepala, $lingkar_perut, getdate())";

        return $this->db->query($sql);
    }

    public function update_lahir($id_kehamilan_ke)
    {
        $sql = "UPDATE SIKABUNGAH_KEHAMILAN_KE SET STATUS = '1' WHERE ID_KEHAMILAN_KE = $id_kehamilan_ke";
        return $this->db->query($sql);
    }

    public function hapus_periksa($id_periksa_kehamilan)
    {
        $sql = "DELETE FROM SIKABUNGAH_PERIKSA_KEHAMILAN WHERE ID_PERIKSA_KEHAMILAN = {$id_periksa_kehamilan}";
        return $this->db->query($sql);
    }

    public function detail_periksa_by_id($id_periksa_kehamilan)
    {
        $sql = "SELECT * FROM SIKABUNGAH_PERIKSA_KEHAMILAN WHERE ID_PERIKSA_KEHAMILAN = {$id_periksa_kehamilan}";
        return $this->db->query($sql);
    }

    public function update_periksa_anak($id_periksa_kehamilan, $tgl_periksa, $berat_badan_janin, $lingkar_kepala, $lingkar_perut)
    {
        $sql = "UPDATE SIKABUNGAH_PERIKSA_KEHAMILAN
                    SET TGL_PERIKSA = '$tgl_periksa',
                    BERAT_BADAN_JANIN = $berat_badan_janin,
                    LINGKAR_KEPALA = $lingkar_kepala,
                    LINGKAR_PERUT = $lingkar_perut
                    WHERE ID_PERIKSA_KEHAMILAN = $id_periksa_kehamilan";
        // var_dump($sql);
        // die;
        return $this->db->query($sql);
    }

    public function update_periksa_ibu($id_periksa_kehamilan, $tgl_periksa, $minggu_ke, $berat_badan, $tinggi_badan, $tensi)
    {
        $sql = "UPDATE SIKABUNGAH_PERIKSA_KEHAMILAN
                    SET TGL_PERIKSA = '$tgl_periksa',
                        MINGGU_KE = '$minggu_ke',
                        BERAT_BADAN = $berat_badan,
                        TINGGI_BADAN = $tinggi_badan,
                        TENSI = '$tensi'
                    WHERE ID_PERIKSA_KEHAMILAN = $id_periksa_kehamilan";
        // var_dump($sql);
        // die;
        return $this->db->query($sql);
    }
}

/* End of file M_kehamilan.php */
