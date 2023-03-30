<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_login');
	}

	public function index()
	{
		$this->load->view('v_login');
	}

	// function login_aksi()
	// {
	// 	$username = $this->input->post('username');
	// 	$password = $this->input->post('password');
	// 	$sebagai = $this->input->post('sebagai');

	// 	$this->form_validation->set_rules('username', 'Username', 'required');
	// 	$this->form_validation->set_rules('password', 'Password', 'required');

	// 	if ($this->form_validation->run() != false) {
	// 		$where = array(
	// 			'username' => $username,
	// 			'password' => md5($password)
	// 		);

	// 		if ($sebagai == "admin") {
	// 			$cek = $this->m_invoice->cek_login('admin', $where)->num_rows();
	// 			$data = $this->m_invoice->cek_login('admin', $where)->row();

	// 			if ($cek > 0) {
	// 				$data_session = array(
	// 					'id' => $data->id,
	// 					'username' => $data->username,
	// 					'status' => 'admin_login'
	// 				);

	// 				$this->session->set_userdata($data_session);

	// 				redirect(base_url() . 'admin');
	// 			} else {
	// 				redirect(base_url() . 'login?alert=gagal');
	// 			}
	// 		} else if ($sebagai == "user") {
	// 			$cek = $this->m_invoice->cek_login('petugas', $where)->num_rows();
	// 			$data = $this->m_invoice->cek_login('petugas', $where)->row();

	// 			if ($cek > 0) {
	// 				$data_session = array(
	// 					'id' => $data->id,
	// 					'nama' => $data->nama,
	// 					'username' => $data->username,
	// 					'status' => 'user_login'
	// 				);

	// 				$this->session->set_userdata($data_session);

	// 				redirect(base_url() . 'user');
	// 			} else {
	// 				redirect(base_url() . 'login?alert=gagal');
	// 			}
	// 		}
	// 	} else {
	// 		$this->load->view('v_login');
	// 	}
	// }

	function proses_login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$cekuser = $this->m_login->cekuser($username);
		if ($cekuser) {

			$ceklogin = $this->m_login->ceklogin($username, $password);
			if ($ceklogin) {
				foreach ($ceklogin as $row)

					if ($row->status == "aktif") {
						$this->session->set_userdata('username', $row->username);
						$this->session->set_userdata('no_user', $row->no_user);
						$this->session->set_userdata('nama', $row->nama);
						$this->session->set_userdata('level', $row->level);

						if ($this->session->userdata('level') == "admin") {
							redirect(base_url() . 'admin');
						} elseif ($this->session->userdata('level') == "user") {
							redirect(base_url() . 'user');
						} else {
							redirect(base_url() . 'login?alert=level');
						}
					} else {
						redirect(base_url() . 'login?alert=status');
					}
			} else {
				redirect(base_url() . 'login?alert=password');
			}
		} else {
			redirect(base_url() . 'login?alert=username');
		}
	}

	function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url() . 'login/?alert=logout');
	}
}
