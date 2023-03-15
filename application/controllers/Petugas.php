<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Petugas extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		// cek session yang login, jika session status tidak sama dengan session petugas_login,maka halaman akan di alihkan kembali ke halaman login.
		if ($this->session->userdata('status') != "petugas_login") {
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
		$this->load->view('petugas/v_header');
		$this->load->view('petugas/v_sidebar');
		$this->load->view('petugas/v_content', $data);
		$this->load->view('petugas/v_footer');
	}

	function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url() . 'login/?alert=logout');
	}

	function invoice()
	{
		$data['invoice'] = $this->m_invoice->get_inv();
		$data['jenis'] = $this->m_invoice->get_jns();
		$this->load->view('petugas/v_header');
		$this->load->view('petugas/v_sidebar');
		$this->load->view('petugas/v_invoice', $data);
		$this->load->view('petugas/v_footer');
	}

	function invoice_tambah()
	{
		$a = $_POST['id'];
		$data['jns'] = $this->m_invoice->get_jns();
		$data = [
			'kode' => $this->m_invoice->auto_code($a),
			'in' => $this->m_invoice->get_inisial($a)
		];
		$this->load->view('petugas/v_header');
		$this->load->view('petugas/v_sidebar');
		$this->load->view('petugas/v_input', $data);
		$this->load->view('petugas/v_footer');
	}

	function invoice_tambah_aksi()
	{
		$jenis = $this->input->post('jenis');
		$invoice = $this->input->post('invoice');
		$nama = $this->input->post('nama');
		$kode = $this->input->post('kode');
		$keterangan = $this->input->post('keterangan');
		$data = [
			'jenis_invoice' => $jenis,
			'nomor_invoice' => $invoice,
			'kode_invoice' => $kode,
			'nama' => $nama,
			'keterangan' => $keterangan
		];
		$this->m_invoice->insert_data($data, 'invoice');
		$this->session->set_flashdata('flash', 'Membuat Invoice');
		redirect('petugas/invoice');
	}

	function invoice_edit($id)
	{
		$where = array('id' => $id);
		$data['invoice'] = $this->m_invoice->edit_data($where, 'invoice')->result();
		$this->load->view('petugas/v_header');
		$this->load->view('petugas/v_sidebar');
		$this->load->view('petugas/v_invoice_edit', $data);
		$this->load->view('petugas/v_footer');
	}

	function invoice_update()
	{
		$id = $this->input->post('id');
		$jenis = $this->input->post('jenis');
		$invoice = $this->input->post('invoice');
		$nama = $this->input->post('nama');
		$keterangan = $this->input->post('keterangan');
		$data = array(
			'jenis_invoice' => $jenis,
			'nomor_invoice' => $invoice,
			'nama' => $nama,
			'keterangan' => $keterangan
		);
		$where = array(
			'id' => $id
		);
		$this->m_invoice->update_data($where, $data, 'invoice');
		$this->session->set_flashdata('flash', 'Update Invoice');
		redirect('petugas/invoice_list');
	}

	function invoice_hapus($id)
	{
		$where = array('id' => $id);
		$this->m_invoice->delete_data($where, 'invoice');
		$this->session->set_flashdata('flash', 'Dihapus');
		redirect('petugas/invoice_list');
	}

	function invoice_list()
	{
		$data['invoice'] = $this->m_invoice->get_in();
		$this->load->view('petugas/v_header');
		$this->load->view('petugas/v_sidebar');
		$this->load->view('petugas/v_invoice_list', $data);
		$this->load->view('petugas/v_footer');
	}


	public function print()
	{
		$data['invoice'] = $this->m_invoice->get_in();
		$this->load->view('petugas/v_cetak', $data);
	}

	function cetak_invoice($id)
	{
		$where = array('id' => $id);
		$data['invoice'] = $this->m_invoice->edit_data($where, 'invoice')->result();
		$this->load->view('petugas/v_cetak1', $data,);
	}
}
