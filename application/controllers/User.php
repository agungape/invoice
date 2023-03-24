<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		// cek session yang login, jika session status tidak sama dengan session user_login,maka halaman akan di alihkan kembali ke halaman login.
		if ($this->session->userdata('level') != "user") {
			redirect(base_url() . 'login?alert=belum_login');
		}
	}

	function index()
	{
		$data['invoice'] = $this->db->query("SELECT MONTHNAME(created_at) AS bulan, COUNT(*) AS jumlah_invoice FROM invoice GROUP BY MONTH(created_at)")->result_array();
		$data['nilai'] = $this->db->query("SELECT MONTHNAME(created_at) AS bulan, SUM(nilai) AS jumlah_nilai FROM invoice GROUP BY MONTH(created_at)")->result_array();
		$data['jml_nilai'] = $this->db->query("SELECT SUM(nilai) AS jumlah_nilai FROM invoice")->result_array();
		$data['jns_kkt'] = $this->m_invoice->get_invkd('KKT');
		$data['jns_rjl'] = $this->m_invoice->get_invkd('RJL');
		$data['jns_rdl'] = $this->m_invoice->get_invkd('RDL');
		$data['jns_utd'] = $this->m_invoice->get_invkd('UTD');
		$data['jns_lab'] = $this->m_invoice->get_invkd('LAB');
		$data['jns_rin'] = $this->m_invoice->get_invkd('RIN');
		$data['log'] = $this->m_invoice->get_logs();
		$this->load->view('user/v_header');
		$this->load->view('user/v_sidebar');
		$this->load->view('user/v_content', $data);
		$this->load->view('user/v_footer');
	}

	function invoice()
	{
		$data['invoice'] = $this->m_invoice->get_inv();
		$data['jenis'] = $this->m_invoice->get_jns();
		$this->load->view('user/v_header');
		$this->load->view('user/v_sidebar');
		$this->load->view('user/v_invoice', $data);
		$this->load->view('user/v_footer');
	}

	function invoice_tambah()
	{
		$a = $_POST['id'];
		$data = [
			'kode' => $this->m_invoice->auto_code($a),
			'in' => $this->m_invoice->get_inisial($a),
			'pelayanan' => $this->m_invoice->get_data('jns_pelayanan')->result()
		];
		$this->load->view('user/v_header');
		$this->load->view('user/v_sidebar');
		$this->load->view('user/v_input', $data);
		$this->load->view('user/v_footer');
	}

	function invoice_tambah_aksi()
	{
		$kode = $this->input->post('kode');
		$jenis = $this->input->post('jenis');
		$invoice = $this->input->post('invoice');
		$nama = $this->input->post('nama');
		$rm = $this->input->post('rm');
		$tanggal = $this->input->post('tanggal');
		$alamat = $this->input->post('alamat');
		$nilai_awal = $this->input->post('nilai');
		$keterangan = $this->input->post('keterangan');
		$layanan = $this->input->post('layanan');
		$pelayanan = implode('<br>', $layanan);
		$nilai = preg_replace('/[^0-9]/', '', $nilai_awal);
		$data = array(
			'jenis_invoice' => $jenis,
			'nomor_invoice' => $invoice,
			'kode_invoice' => $kode,
			'nama' => $nama,
			'no_rm' => $rm,
			'tgl_lahir' => $tanggal,
			'nilai' => $nilai,
			'alamat' => $alamat,
			'keterangan' => $keterangan,
			'jns_pelayanan' => $pelayanan
		);
		$activity_data = json_encode($data); // mengubah data ke format JSON
		$this->m_invoice->buat_log($this->session->userdata('username'), 'menambahkan', 'invoice', $activity_data); // log aksi "created"
		$this->m_invoice->insert_data($data, 'invoice');

		$this->session->set_flashdata('flash', 'Membuat Invoice');
		redirect('user/invoice');
	}

	function invoice_edit($id)
	{
		$where = array('id' => $id);
		$data['invoice'] = $this->m_invoice->edit_data($where, 'invoice')->result();
		$data['pelayanan'] = $this->m_invoice->get_data('jns_pelayanan')->result();
		$this->load->view('user/v_header');
		$this->load->view('user/v_sidebar');
		$this->load->view('user/v_invoice_edit', $data);
		$this->load->view('user/v_footer');
	}

	function invoice_update()
	{
		$id = $this->input->post('id');
		$kode = $this->input->post('kode');
		$jenis = $this->input->post('jenis');
		$invoice = $this->input->post('invoice');
		$nama = $this->input->post('nama');
		$rm = $this->input->post('rm');
		$tanggal = $this->input->post('tanggal');
		$alamat = $this->input->post('alamat');
		$nilai_awal = $this->input->post('nilai');
		$nilai = preg_replace('/[^0-9]/', '', $nilai_awal);
		$keterangan = $this->input->post('keterangan');
		$layanan = $this->input->post('layanan');
		$pelayanan = implode('<br>', $layanan);
		$data = array(
			'jenis_invoice' => $jenis,
			'nomor_invoice' => $invoice,
			'kode_invoice' => $kode,
			'nama' => $nama,
			'no_rm' => $rm,
			'tgl_lahir' => $tanggal,
			'nilai' => $nilai,
			'alamat' => $alamat,
			'keterangan' => $keterangan,
			'jns_pelayanan' => $pelayanan
		);

		$where = array(
			'id' => $id
		);

		$activity_data = json_encode($data); // mengubah data ke format JSON
		$this->m_invoice->buat_log($this->session->userdata('username'), 'mengubah', 'invoice', $activity_data); // log aksi "created"
		$this->m_invoice->update_data($where, $data, 'invoice');
		$this->session->set_flashdata('flash', 'Update Invoice');
		redirect('user/invoice');
	}

	function invoice_hapus($id)
	{
		$where = array('id' => $id);
		$activity_data = json_encode($data); // mengubah data ke format JSON
		$this->m_invoice->buat_log($this->session->userdata('username'), 'menghapus', 'invoice', $activity_data); // log aksi "created"
		$this->m_invoice->delete_data($where, 'invoice');
		$this->session->set_flashdata('flash', 'Dihapus');
		redirect('user/invoice_list');
	}

	function invoice_list()
	{
		$data['invoice'] = $this->m_invoice->get_in();
		$this->load->view('user/v_header');
		$this->load->view('user/v_sidebar');
		$this->load->view('user/v_invoice_list', $data);
		$this->load->view('user/v_footer');
	}

	function print()
	{
		$data['invoice'] = $this->m_invoice->get_in();
		$this->load->view('user/v_cetak', $data);
	}

	function cetak_invoice($id)
	{
		$where = array('id' => $id);
		$data['invoice'] = $this->m_invoice->edit_data($where, 'invoice')->result();
		$this->load->view('user/v_cetak1', $data,);
	}

	function detail_invoice($id)
	{
		$where = array('id' => $id);
		$data['invoice'] = $this->m_invoice->edit_data($where, 'invoice')->result();
		$this->load->view('user/v_header');
		$this->load->view('user/v_sidebar');
		$this->load->view('user/v_detail', $data,);
		$this->load->view('user/v_footer');
	}
}
