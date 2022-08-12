<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_pascalahir extends CI_Model{
	function home_model() {
        parent::Model();
    }

    function m_pascaLahir_norm($get_norm) {
    	$sql_pasien = 
    	$this->db->query(
    		"SELECT TOP 1 
    			NAMA, 
				TGL_LAHIR,
				KELAMIN,
				ALAMAT
			FROM PASIEN_NO_RM 
			WHERE NORM = '$get_norm'"
		);

    	return $sql_pasien;
    }

    function m_pascaLahir_check_anak_ke($get_norm, $getanakke) {
    	$sql_pasien = 
    	$this->db->query(
    		"SELECT 
    			ID_ANAK_KE,
				NORM_IBU,
				ANAK_KE,
				CREATE_DATE
			FROM SIKABUNGAH_ANAK_KE 
			WHERE NORM_IBU = '$get_norm'
			AND ANAK_KE = '$getanakke'"
		);

    	return $sql_pasien;
    }

    function m_pascaLahir_anak_ke($get_norm) {
    	$sql_anak_ke = 
    	$this->db->query(
    		"SELECT 
    			ID_ANAK_KE,
				NORM_IBU,
				NAMA,
				TGL_LAHIR,
				ANAK_KE,
				CASE
					WHEN JNS_KELAMIN = 'L' THEN 'Laki-Laki'
					WHEN JNS_KELAMIN = 'P' THEN 'Perempuan'
					ELSE 'Kosong'
				END AS JNS_KELAMIN,
				JNS_KELAMIN AS JNS_KELAMIN_LETTER,
				CREATE_DATE
			FROM SIKABUNGAH_ANAK_KE 
			WHERE NORM_IBU = '$get_norm'"
		);

    	return $sql_anak_ke;
    }

    function m_pascaLahir_anak_ke_by_id($get_norm, $getid) {
    	$sql_anak_ke = 
    	$this->db->query(
    		"SELECT 
    			ID_ANAK_KE,
				NORM_IBU,
				NAMA,
				TGL_LAHIR,
				ANAK_KE,
				CASE
					WHEN JNS_KELAMIN = 'L' THEN 'Laki-Laki'
					WHEN JNS_KELAMIN = 'P' THEN 'Perempuan'
					ELSE 'Kosong'
				END AS JNS_KELAMIN,
				CREATE_DATE
			FROM SIKABUNGAH_ANAK_KE 
			WHERE NORM_IBU = '$get_norm'
			AND ID_ANAK_KE = $getid"
		);

    	return $sql_anak_ke;
    }

    function m_pascaLahir_periksa_anak($get_norm, $getid) {
    	$sql_periksa = 
    	$this->db->query(
    		"SELECT 
				SIKABUNGAH_PERIKSA_ANAK.ID_PERIKSA_ANAK,
				SIKABUNGAH_PERIKSA_ANAK.ID_ANAK_KE,
				SIKABUNGAH_PERIKSA_ANAK.NORM_IBU,
				SIKABUNGAH_PERIKSA_ANAK.TGL_PERIKSA,
				SIKABUNGAH_PERIKSA_ANAK.BERAT_BADAN,
				SIKABUNGAH_PERIKSA_ANAK.TINGGI_BADAN,
				SIKABUNGAH_ANAK_KE.NAMA,
				SIKABUNGAH_ANAK_KE.TGL_LAHIR,
				CASE
					WHEN SIKABUNGAH_ANAK_KE.JNS_KELAMIN = 'L' THEN 'Laki-Laki'
					WHEN SIKABUNGAH_ANAK_KE.JNS_KELAMIN = 'P' THEN 'Perempuan'
					ELSE 'Kosong'
				END AS JNS_KELAMIN,
				SIKABUNGAH_ANAK_KE.ANAK_KE
			FROM SIKABUNGAH_PERIKSA_ANAK 
			LEFT JOIN SIKABUNGAH_ANAK_KE ON (SIKABUNGAH_PERIKSA_ANAK.ID_ANAK_KE = SIKABUNGAH_ANAK_KE.ID_ANAK_KE)
			WHERE SIKABUNGAH_PERIKSA_ANAK.NORM_IBU = '$get_norm'
			AND SIKABUNGAH_PERIKSA_ANAK.ID_ANAK_KE = $getid
			-- ORDER BY CONVERT(VARCHAR, SIKABUNGAH_PERIKSA_ANAK.TGL_PERIKSA, 23) DESC"
		);

    	return $sql_periksa;
    }

    function m_add_anak($norm_add_anak, $nama_anak, $tanggal_lahir, $anak_ke, $jekel_anak) {
        $sql = "INSERT INTO SIKABUNGAH_ANAK_KE (NORM_IBU, NAMA, TGL_LAHIR, ANAK_KE, JNS_KELAMIN, CREATE_DATE)
					VALUES ('$norm_add_anak', '$nama_anak', '$tanggal_lahir', '$anak_ke', '$jekel_anak', getdate())";
		
		return $this->db->query($sql);
    }

    function m_periksa_anak($norm_periksa_anak, $id_anak, $tanggal_periksa, $bb_anak, $tb_anak) {
        $sql = "INSERT INTO SIKABUNGAH_PERIKSA_ANAK (NORM_IBU, ID_ANAK_KE, TGL_PERIKSA, BERAT_BADAN, TINGGI_BADAN, CREATE_DATE)
					VALUES ('$norm_periksa_anak', $id_anak, '$tanggal_periksa', $bb_anak, $tb_anak, getdate())";
		
		return $this->db->query($sql);
    }
}