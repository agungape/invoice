<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Invoice extends CI_Controller
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
		$this->load->model('m_invoice');
		$kode['fk'] = $this->m_invoice->get_fk();
		$this->load->view('v_header');
		$this->load->view('v_sidebar');
		$this->load->view('v_invoice', $kode);
		$this->load->view('v_footer');
	}

	public function tambah()
	{
		$this->load->helper('form');
		$this->load->model('m_invoice');
		$kode['fk'] = $this->m_invoice->get_fk();
		$this->load->view('v_header');
		$this->load->view('v_sidebar');
		$this->load->view('v_invoice', $kode);
		$this->load->view('v_footer');
	}

	public function form()
	{
		$this->load->helper('form');
		$this->load->model('m_invoice');
		$a = $_POST['id'];
		$data = [
			'kode' => $this->m_invoice->auto_code($a),
			'in' => $this->m_invoice->get_inisial($a)
		];

		$this->load->view('v_header');
		$this->load->view('v_sidebar');
		$this->load->view('v_input', $data);
		$this->load->view('v_footer');
	}

	// function generate()
	// {
	// 	$this->load->database();
	// 	$this->load->model('m_invoice');
	// 	$code['kode'] = $this->m_invoice->auto_code();

	// 	$this->load->view('v_header');
	// 	$this->load->view('v_sidebar');
	// 	$this->load->view('v_invoice', $code);
	// 	$this->load->view('v_footer');
	// }
}
