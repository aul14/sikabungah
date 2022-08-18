<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PascaLahir extends CI_Controller {
	public function index() {
		if($this->session->userdata("SIKABUNGAH_STATUS") == "LOGIN") {
			$data = array(
				"login_name" => $this->session->userdata('SIKABUNGAH_NAMA_USER')
			);
			
			$this->load->view('pasca_lahir', $data);
		}
		else {
			redirect(base_url('login'));
		}
	}

	public function search_norm() {
		$getnorm = $this->input->post('norm');

		if ($getnorm != "") {
			$m_query = $this->model_pascalahir->m_pascaLahir_norm($getnorm);
			$patchData 	= $m_query->result_array();
			$countData 	= $m_query->num_rows();

			$nomor = 0;
			if ($countData > 0) {
				foreach ($patchData as $row) {
					$nomor 			= $nomor + 1;
					$nama 			= trim($row['NAMA']);
					$tgl_lahir 		= date( "d F Y", strtotime($row['TGL_LAHIR']));
					$jns_kelamin 	= $row['KELAMIN'];
					$alamat 		= $row['ALAMAT'];
				}

				$m_query_anak = $this->model_pascalahir->m_pascaLahir_anak_ke($getnorm);
				$patchData_anak 	= $m_query_anak->result_array();
				$countData_anak 	= $m_query_anak->num_rows();

				if ($countData_anak > 0) {
					$patchData_anak = $patchData_anak;

					$data_html = "";
					$jekel_anak_let = 0;
					foreach ($patchData_anak as $row_anak) {
						$nomor 			= $nomor + 1;
						$get_id_anak 	= $row_anak['ID_ANAK_KE'];
						$norm_add_anak 	= $row_anak['NORM_IBU'];
						$anak_ke 		= $row_anak['ANAK_KE'];
						$nama_anak 		= ucwords(trim($row_anak['NAMA']));
						$tanggal_lahir 	= date( "d/m/Y", strtotime($row_anak['TGL_LAHIR']));
						$jekel_anak 	= $row_anak['JNS_KELAMIN'];
						$jekel_anak_let	= $row_anak['JNS_KELAMIN_LETTER'];
						$create_date 	= date( "Y-m-d", strtotime($row_anak['CREATE_DATE']))."<br>".date( "H:i:s", strtotime($row_anak['CREATE_DATE']));

						if ($row_anak['JNS_KELAMIN_LETTER'] == 'L') {
							$jekel_anak_let = 1;
						}
						else {
							$jekel_anak_let = 0;
						}

						$data_html = $data_html."
						<tr>
							<td class='table-plus text-center'>".$anak_ke."</td>
							<td>".$nama_anak."</td>
							<td class='text-center'>".$tanggal_lahir."</td>
							<td class='text-center'>".$jekel_anak."</td>
							<td class='text-center small'>".$create_date."</td>
							<td class='text-center'>
								<div class='dropdown'>
									<a class='btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle' href='#' role='button' data-toggle='dropdown'>
										<i class='dw dw-more'></i>
									</a>
									<div class='dropdown-menu dropdown-menu-right dropdown-menu-icon-list'>
										<a class='dropdown-item' href='javascript:void(0)' onclick='set_history(".$anak_ke.")'><i class='icon-copy dw dw-list'></i></i> Histori</a>
										<a class='dropdown-item' href='javascript:void(0)' data-toggle='modal' data-target='#modal_periksa_anak' onclick='set_periksa(".$get_id_anak.", ".$anak_ke.")'><i class='dw dw-edit2'></i> Periksa</a>
										<a class='dropdown-item' href='javascript:void(0)' onclick='set_grafik(".$anak_ke.", ".$jekel_anak_let.")'><i class='icon-copy dw dw-analytics1'></i></i> Grafik</a>
									</div>
								</div>
							</td>
						</tr>
						";
					}
				}
				else {
					$data_html = "";
				}

				$data = array(
					'status' 	=> 1,
					'message' 	=> 'Pencarian NORM berhasil ditemukan.',
					'response' 	=> 
						array(
							'rm' 			=> $getnorm,
							'name' 			=> $nama,
							'tgl_lahir' 	=> $tgl_lahir,
							'jenis_kelamin' => $jns_kelamin,
							'alamat' 		=> $alamat,
							'anak_html' 	=> $data_html
						)
				);
			}
			else {
				$data = array('status' => 0, 'message' => 'Tidak ditemukan pasien atas nomor medical record tersebut.');
			}
		}
		else {
			$data = array('status' => 0, 'message' => 'NORM tidak boleh kosong!');
		}

		echo json_encode($data);
	}

	public function add_anak() {
		$norm_add_anak 	= $this->input->post('norm_add_anak');
		$anak_ke 		= $this->input->post('anak_ke');
		$nama_anak 		= $this->input->post('nama_anak');
		$tanggal_lahir 	= $this->input->post('tanggal_lahir');
		$jekel_anak 	= $this->input->post('jekel_anak');

		if ($norm_add_anak != "") {
			if ($norm_add_anak != "" && $anak_ke != "" && $nama_anak != "" && $tanggal_lahir != ""  && $jekel_anak != "") {
				$m_query_check_anak 	= $this->model_pascalahir->m_pascaLahir_check_anak_ke($norm_add_anak, $anak_ke);
				$patchData_check_anak 	= $m_query_check_anak->result_array();
				$countData_check_anak 	= $m_query_check_anak->num_rows();

				if ($countData_check_anak > 0) {
					$data = array('status' => 0, 'message' => "Anak Ke ".$anak_ke." sudah terdaftar!");
				}
				else {
					$m_query = $this->model_pascalahir->m_add_anak($norm_add_anak, $nama_anak, $tanggal_lahir, $anak_ke, $jekel_anak);

					if ($m_query == NULL) {
						$data = array('status' => 0, 'message' => 'Data anak gagal tersimpan!');
					}
					else {
						$m_query_anak = $this->model_pascalahir->m_pascaLahir_anak_ke($norm_add_anak);
						$patchData_anak 	= $m_query_anak->result_array();
						$countData_anak 	= $m_query_anak->num_rows();

						if ($countData_anak > 0) {
							$patchData_anak = $patchData_anak;

							$data_html = "";
							$jekel_anak_let = 0;
							foreach ($patchData_anak as $row_anak) {
								$nomor 			= $nomor + 1;
								$get_id_anak 	= $row_anak['ID_ANAK_KE'];
								$norm_add_anak 	= $row_anak['NORM_IBU'];
								$anak_ke 		= $row_anak['ANAK_KE'];
								$nama_anak 		= ucwords(trim($row_anak['NAMA']));
								$tanggal_lahir 	= date( "d/m/Y", strtotime($row_anak['TGL_LAHIR']));
								$jekel_anak 	= $row_anak['JNS_KELAMIN'];
								$create_date 	= date( "Y-m-d", strtotime($row_anak['CREATE_DATE']))."<br>".date( "H:i:s", strtotime($row_anak['CREATE_DATE']));

								if ($row_anak['JNS_KELAMIN_LETTER'] == 'L') {
									$jekel_anak_let = 1;
								}
								else {
									$jekel_anak_let = 0;
								}

								$data_html = $data_html."
								<tr>
									<td class='table-plus text-center'>".$anak_ke."</td>
									<td>".$nama_anak."</td>
									<td class='text-center'>".$tanggal_lahir."</td>
									<td class='text-center'>".$jekel_anak."</td>
									<td class='text-center small'>".$create_date."</td>
									<td class='text-center'>
										<div class='dropdown'>
											<a class='btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle' href='#' role='button' data-toggle='dropdown'>
												<i class='dw dw-more'></i>
											</a>
											<div class='dropdown-menu dropdown-menu-right dropdown-menu-icon-list'>
												<a class='dropdown-item' href='javascript:void(0)' onclick='set_history(".$anak_ke.")'><i class='icon-copy dw dw-list'></i></i> Histori</a>
												<a class='dropdown-item' href='javascript:void(0)' data-toggle='modal' data-target='#modal_periksa_anak' onclick='set_periksa(".$get_id_anak.", ".$anak_ke.")'><i class='dw dw-edit2'></i> Periksa</a>
												<a class='dropdown-item' href='javascript:void(0)' onclick='set_grafik(".$anak_ke.", ".$jekel_anak_let.")'><i class='icon-copy dw dw-analytics1'></i></i> Grafik</a>
											</div>
										</div>
									</td>
								</tr>
								";
							}
						}
						else {
							$data_html = "";
						}
						
						$data = array(
							'status' 	=> 1, 
							'message' 	=> 'Data anak berhasil tersimpan! Terimakasih.',
							'anak_html' => $data_html
						);
					}
				}
			}
			else {
				$data = array('status' => 0, 'message' => 'Data formulir anak tidak boleh kosong!');
			}
		}
		else {
			$data = array('status' => 0, 'message' => 'Data NORM tidak ditemukan!');
		}

		echo json_encode($data);
	}

	public function periksa_anak() {
		$norm_periksa_anak 	= $this->input->post('norm_periksa_anak');
		$id_anak 			= $this->input->post('id_anak');
		$tanggal_periksa 	= $this->input->post('tanggal_periksa');
		$bb_anak 			= $this->input->post('bb_anak');
		$tb_anak 			= $this->input->post('tb_anak');

		if ($norm_periksa_anak != "" && $id_anak != "") {
			if ($tanggal_periksa != "" && $bb_anak != "" && $tb_anak != "") {
				$m_query = $this->model_pascalahir->m_periksa_anak($norm_periksa_anak, $id_anak, $tanggal_periksa, $bb_anak, $tb_anak);

				if ($m_query == NULL) {
					$data = array('status' => 0, 'message' => 'Data pemeriksaan gagal tersimpan!');
				}
				else {
					$data = array('status' => 1, 'message' => 'Data pemeriksaan berhasil tersimpan! Terimakasih.');
				}
			}
			else {
				$data = array('status' => 0, 'message' => 'Data formulir pemeriksaan tidak boleh kosong!');
			}
		}
		else {
			$data = array('status' => 0, 'message' => 'Data NORM atau ID anak tidak ditemukan!');
		}

		echo json_encode($data);
	}

	public function history_periksa_anak() {
		$id 	= $this->input->post('id');
		$norm 	= $this->input->post('norm');

		if ($id != "" && $norm != "") {
			$m_query_history = $this->model_pascalahir->m_pascaLahir_periksa_anak($norm, $id);
			$patchData_history 	= $m_query_history->result_array();
			$countData_history 	= $m_query_history->num_rows();

			if ($countData_history > 0) {
				$nomor = 0;
				$data_html = "";
				foreach ($patchData_history as $row_history) {
					$nomor 			= $nomor + 1;
					$get_id_anak 	= $row_history['ID_PERIKSA_ANAK'];
					$norm_ibu 		= $row_history['NORM_IBU'];
					$nama_anak 		= ucwords(trim($row_history['NAMA']));
					$tanggal_lahir 	= date( "d/m/Y", strtotime($row_history['TGL_LAHIR']));
					$jekel_anak 	= $row_history['JNS_KELAMIN'];
					$anak_ke 		= $row_history['ANAK_KE'];
					$tanggal_priksa = date( "Y-m-d", strtotime($row_history['TGL_PERIKSA']));
					$jam_periksa 	= date( "H:i:s", strtotime($row_history['TGL_PERIKSA']));
					$bb_anak 		= $row_history['BERAT_BADAN'];
					$tb_anak 		= $row_history['TINGGI_BADAN'];

					$data_html = $data_html."
					<tr>
						<td class='text-center small'>".$tanggal_priksa."<br>".$jam_periksa."</td>
						<td class='text-center'>".$bb_anak." Kg</td>
						<td class='text-center'>".$tb_anak." Cm</td>
						<td class='text-center'>
							<a href='javascript:void(0)' class='badge badge-info m-0 text-white' style='cursor:pointer' onclick='action_edit_periksa(".$get_id_anak.")'><i class='icon-copy dw dw-edit2'></i></a>
							<a href='javascript:void(0)' class='badge badge-danger m-0 text-white' style='cursor:pointer' onclick='action_del_periksa(".$get_id_anak.")'><i class='icon-copy dw dw-trash1'></i></a>
						</td>
					</tr>
					";
				}
			}
			else {
				$m_query_anak = $this->model_pascalahir->m_pascaLahir_anak_ke_by_id($norm, $id);
				$patchData_anak 	= $m_query_anak->result_array();
				$countData_anak 	= $m_query_anak->num_rows();

				if ($countData_anak > 0) {
					$patchData_anak = $patchData_anak;

					$data_html = "";
					foreach ($patchData_anak as $row_anak) {
						$nomor 			= $nomor + 1;
						$nama_anak 		= ucwords(trim($row_anak['NAMA']));
						$tanggal_lahir 	= date( "d/m/Y", strtotime($row_anak['TGL_LAHIR']));
						$jekel_anak 	= $row_anak['JNS_KELAMIN'];
						$anak_ke 		= $row_anak['ANAK_KE'];
					}
				}

				$data_html = "";
			}
			
			$data = array(
				'status' 		=> 1, 
				'message' 		=> 'found data',
				'name' 			=> $nama_anak,
				'tgl_lahir' 	=> $tanggal_lahir,
				'jenis_kelamin' => $jekel_anak,
				'anak_ke' 		=> $anak_ke,
				'history_html' 	=> $data_html
			);
		}
		else {
			$data = array('status' => 0, 'message' => 'Data NORM atau ID anak tidak ditemukan!');
		}

		echo json_encode($data);
	}

	public function periksa_anak_by_idperiksa() {
		$idperiksa 	= $this->input->post('idperiksa');

		if ($idperiksa != "") {
			$m_query_history = $this->model_pascalahir->m_pascaLahir_periksa_anak_by_idperiksa($idperiksa);
			$patchData_history 	= $m_query_history->result_array();
			$countData_history 	= $m_query_history->num_rows();

			if ($countData_history > 0) {
				$nomor = 0;
				$data_html = "";
				foreach ($patchData_history as $row_history) {
					$nomor 			= $nomor + 1;
					$get_id_anak 	= $row_history['ID_PERIKSA_ANAK'];
					$norm_ibu 		= $row_history['NORM_IBU'];
					$nama_anak 		= ucwords(trim($row_history['NAMA']));
					$tanggal_lahir 	= date( "d/m/Y", strtotime($row_history['TGL_LAHIR']));
					$jekel_anak 	= $row_history['JNS_KELAMIN'];
					$anak_ke 		= $row_history['ANAK_KE'];
					$tanggal_priksa = date( "Y-m-d H:i:s", strtotime($row_history['TGL_PERIKSA']));
					$bb_anak 		= $row_history['BERAT_BADAN'];
					$tb_anak 		= $row_history['TINGGI_BADAN'];
				}

				$data = array(
					'status' 			=> 1, 
					'message' 			=> 'found data',
					'tanggal_priksa' 	=> $tanggal_priksa,
					'bb_anak' 			=> $bb_anak,
					'tb_anak' 			=> $tb_anak
				);
			}
			else {
				$data = array('status' => 0, 'message' => 'Data pemeriksaan tidak ditemukan!');
			}
		}
		else {
			$data = array('status' => 0, 'message' => 'Data NORM atau ID anak tidak ditemukan!');
		}

		echo json_encode($data);
	}

	public function update_periksa() {
		$id_edit_periksa 		= $this->input->post('id_edit_periksa');
		$edit_anakke_periksa 	= $this->input->post('edit_anakke_periksa');
		$tanggal_periksa 		= $this->input->post('edit_tanggal_periksa');
		$bb_anak 				= $this->input->post('edit_bb_anak');
		$tb_anak 				= $this->input->post('edit_tb_anak');

		if ($id_edit_periksa != "" && $edit_anakke_periksa != "") {
			if ($tanggal_periksa != "" && $bb_anak != "" && $tb_anak != "") {
				$m_query = $this->model_pascalahir->m_update_periksa_anak($id_edit_periksa, $bb_anak, $tb_anak);

				if ($m_query == NULL) {
					$data = array('status' => 0, 'message' => 'Data pemeriksaan gagal terupdate!');
				}
				else {
					$data = array(
						'status' => 1, 
						'message' => 'Data pemeriksaan berhasil terupdate! Terimakasih.',
						'anak_ke' => $edit_anakke_periksa
					);
				}
			}
			else {
				$data = array('status' => 0, 'message' => 'Data formulir pemeriksaan tidak boleh kosong!');
			}
		}
		else {
			$data = array('status' => 0, 'message' => 'Data ID Pemeriksaan atau ID anak tidak ditemukan!');
		}

		echo json_encode($data);
	}

	public function delete_periksa() {
		$idperiksa 	= $this->input->post('idperiksa');
		$id_anak 	= $this->input->post('id_anak');

		if ($idperiksa != "") {
			if ($id_anak != "") {
				$m_statDelete 	= $this->model_pascalahir->m_delete_periksa($idperiksa);

				if ($m_statDelete == NULL) {
					$data = array('status' => 0, 'message' => 'Data pemeriksaan gagal terhapus!');
				}
				else {
					$data = array('status' => 1, 'message' => 'Hapus data berhasil!');
				}
			}
			else {
				$data = array('status' => 0, 'message' => 'Data ID Anak tidak ditemukan!');
			}
		}
		else {
			$data = array('status' => 0, 'message' => 'Data ID Pemeriksaan tidak ditemukan!');
		}

		echo json_encode($data);
	}
}
