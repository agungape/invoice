<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	function __construct()
	{
		parent::__construct();

		// cek session yang login, jika session status tidak sama dengan session admin_login,maka halaman akan di alihkan kembali ke halaman login.
		if ($this->session->userdata('status') != "admin_login") {
			redirect(base_url() . 'login?alert=belum_login');
		}
	}

	function index()
	{
		$this->load->view('v_header');
		$this->load->view('v_sidebar');
		$this->load->view('v_content');
		$this->load->view('v_footer');
	}
}
