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
		$data['invoice'] = $this->m_invoice->get_inv();
		$data['jenis'] = $this->m_invoice->get_jns();
		$this->load->view('v_header');
		$this->load->view('v_sidebar');
		$this->load->view('v_invoice', $data);
		$this->load->view('v_footer');
	}

	function invoice_tambah()
	{
		$a = $_POST['id'];
		$data['jns'] = $this->m_invoice->get_jns();
		$data = [
			'kode' => $this->m_invoice->auto_code($a),
			'in' => $this->m_invoice->get_inisial($a)
		];
		$this->load->view('v_header');
		$this->load->view('v_sidebar');
		$this->load->view('v_input', $data);
		$this->load->view('v_footer');
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
		redirect('invoice');
	}

	function invoice_hapus($id)
	{
		$where = array('id' => $id);
		$this->m_invoice->delete_data($where, 'invoice');
		redirect('invoice');
	}

	function invoice_list()
	{
		$data['invoice'] = $this->m_invoice->get_in();
		$this->load->view('v_header');
		$this->load->view('v_sidebar');
		$this->load->view('v_invoice_list', $data);
		$this->load->view('v_footer');
	}

	function invoice_jenis()
	{
		$data['jenis'] = $this->m_invoice->get_jns();
		$this->load->view('v_header');
		$this->load->view('v_sidebar');
		$this->load->view('v_invoice_jenis', $data);
		$this->load->view('v_footer');
	}

	function invoice_jenis_hapus($kode_invoice)
	{
		$where = array('kode_invoice' => $kode_invoice);
		$this->m_invoice->delete_data($where, 'jns_invoice');
		redirect('invoice/jenis');
	}

	public function pdf()
	{
		// panggil library yang kita buat sebelumnya yang bernama pdfgenerator
		$this->load->library('pdfgenerator');

		$data['inv'] = $this->m_invoice->get_in();

		// title dari pdf
		// $this->data['title_pdf'] = 'Laporan Invoice BLUD RS Konawe';

		// filename dari pdf ketika didownload
		$file_pdf = 'laporan_invoice';
		// setting paper
		$paper = 'A4';
		//orientasi paper potrait / landscape
		$orientation = "portrait";

		$html = $this->load->view('v_cetak', $data, true);

		// run dompdf
		$this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
	}
}
