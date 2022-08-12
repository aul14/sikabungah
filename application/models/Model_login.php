<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_login extends CI_Model{
	function home_model() {
        parent::Model();
    }

    function m_login($username, $password) {
    	$sql_userdata = 
    	$this->db->query(
    		"SELECT TOP 1 
    			USERID,
                USERNAME,
                NAMA_USER,
                PASSWORD
			FROM SIKABUNGAH_USERDATA 
			WHERE USERNAME = '$username' AND PASSWORD = '$password'"
		);

    	return $sql_userdata;
    }
}