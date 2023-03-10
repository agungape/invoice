<?php

use Dompdf\Helpers;

defined('BASEPATH') or exit('No direct script access allowed');

class Invoice extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url', 'form'));
		$this->load->model('m_invoice');
		$this->load->library('form_validation', 'session');
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
		$this->session->set_flashdata('flash', 'Membuat Invoice');
		redirect('invoice');
	}

	function invoice_edit($id)
	{
		$where = array('id' => $id);
		$data['invoice'] = $this->m_invoice->edit_data($where, 'invoice')->result();
		$this->load->view('v_header');
		$this->load->view('v_sidebar');
		$this->load->view('v_invoice_edit', $data);
		$this->load->view('v_footer');
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
		redirect('invoice/invoice_list');
	}

	function invoice_hapus($id)
	{
		$where = array('id' => $id);
		$this->m_invoice->delete_data($where, 'invoice');
		$this->session->set_flashdata('flash', 'Dihapus');
		redirect('invoice/invoice_list');
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

	function invoice_jenis_tambah()
	{
		$this->load->view('v_header');
		$this->load->view('v_sidebar');
		$this->load->view('v_invoice_jenis_tambah');
		$this->load->view('v_footer');
	}

	function invoice_jenis_tambah_aksi()
	{
		$this->form_validation->set_rules('kode', 'Kode', 'required');
		$this->form_validation->set_rules('jenis', 'Jenis', 'required');
		if ($this->form_validation->run() != false) {
			$kode = $this->input->post('kode');
			$jenis = $this->input->post('jenis');
			$data = [
				'kode_invoice' => $kode,
				'jenis_invoice' => $jenis
			];
			$this->m_invoice->insert_data($data, 'jns_invoice');
			$this->session->set_flashdata('flash', 'Menambahkan Data');
			redirect('invoice/invoice_jenis');
		} else {
			$this->session->set_flashdata('flash', 'Menambahkan Data');
			redirect('invoice/invoice_jenis_tambah');
		}
	}

	function invoice_jenis_hapus($id)
	{
		$id = [
			'kode_invoice' => $id
		];

		$this->m_invoice->delete_data($id, 'jns_invoice');
		$this->session->set_flashdata('flash', 'Dihapus');
		redirect('invoice/invoice_jenis');
	}

	public function pdf()
	{
		// panggil library yang kita buat sebelumnya yang bernama pdfgenerator
		$this->load->library('pdfgenerator');

		$data['inv'] = $this->m_invoice->get_in();

		// title dari pdf
		//	$this->data['title_pdf'] = 'Laporan Invoice BLUD RS Konawe';

		// filename dari pdf ketika didownload
		$file_pdf = 'laporan_invoice';
		// setting paper
		$customPaper = 'A6';
		// $paper->set_paper($customPaper);
		// $paper = 'A4';
		//orientasi paper potrait / landscape
		$orientation = "landscape";

		// if (isset($_POST['id'])) {
		// 	$where = array('id' => $id);
		// 	$data['invoice'] = $this->m_invoice->edit_data($where, 'invoice')->result();
		// 	$html = $this->load->view('v_cetak_one', $data, true);
		// } else {
		// 	$html = $this->load->view('v_cetak', $data, true);
		// }

		$html = $this->load->view('v_cetak', $data, true);
		// run dompdf
		$this->pdfgenerator->generate($html, $file_pdf, $customPaper, $orientation);
	}

	function cetak_invoice($id)
	{
		$this->load->library('pdfgenerator');
		$file_pdf = 'laporan_invoice';
		$customPaper = 'A7';
		$orientation = 'landscape';

		$where = array('id' => $id);
		// mengambil data dari database sesuai id
		$data['invoice'] = $this->m_invoice->edit_data($where, 'invoice')->result();
		$cetak = $this->load->view('v_cetak1', $data, true);
		$this->pdfgenerator->generate($cetak, $file_pdf, $customPaper, $orientation);
	}

	public function chart_data()
	{
		$data = $this->m_invoice->get_in();
		echo json_encode($data);
	}
}
