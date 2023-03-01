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

	function login_aksi()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() != false) {
			$where = array(
				'username' => $username,
				'password' => md5($password)
			);
			$cek = $this->m_login->cek_login('admin', $where)->num_rows();
			$data = $this->m_login->cek_login('admin', $where)->row();

			if ($cek > 0) {
				$data_session = array(
					'id' => $data->id,
					'username' => $data->username,
					'status' => 'admin_login'
				);

				$this->session->set_userdata($data_session);

				redirect(base_url() . 'welcome');
			} else {
				redirect(base_url() . 'login?alert=gagal');
			}
		} else {
			$this->load->view('v_login');
		}
	}

	function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}
}
