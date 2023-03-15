<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_invoice');

		// cek session yang login, jika session status tidak sama dengan session admin_login,maka halaman akan di alihkan kembali ke halaman login.
		if ($this->session->userdata('status') != "admin_login") {
			redirect(base_url() . 'login?alert=belum_login');
		}
	}

	function index()
	{
		$data['invoice'] = $this->db->query("SELECT MONTHNAME(created_at) AS bulan, COUNT(*) AS jumlah_invoice FROM invoice GROUP BY MONTH(created_at)")->result_array();
		$data['jns_kkt'] = $this->m_invoice->get_invkd('KKT');
		$data['jns_rjl'] = $this->m_invoice->get_invkd('RJL');
		$data['jns_rdl'] = $this->m_invoice->get_invkd('RDL');
		$data['jns_utd'] = $this->m_invoice->get_invkd('UTD');
		$data['jns_lab'] = $this->m_invoice->get_invkd('LAB');
		$this->load->view('v_header');
		$this->load->view('v_sidebar');
		$this->load->view('v_content', $data);
		$this->load->view('v_footer');
	}
}
