<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Invoice extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_invoice');
		$this->load->helper('form');
		// cek session yang login, jika session status tidak sama dengan session admin_login,maka halaman akan di alihkan kembali ke halaman login.
		if ($this->session->userdata('status') != "admin_login") {
			redirect(base_url() . 'login?alert=belum_login');
		}
	}

	function index()
	{
		if (isset($_GET['tampil'])) {
			$mulai = $this->input->get('tampil');
			$a = $_POST['id'];
			$data = [
				'kode' => $this->m_invoice->auto_code($a),
				'in' => $this->m_invoice->get_inisial($a),
				'tampil' => $mulai
			];
		} else {
			$data['inv'] = $this->m_invoice->get_inv();
		}
		$this->load->view('v_header');
		$this->load->view('v_sidebar');
		$this->load->view('v_invoice', $data);
		$this->load->view('v_footer');
	}
}
