<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		// cek session yang login, jika session status tidak sama dengan session admin_login,maka halaman akan di alihkan kembali ke halaman login.
		if ($this->session->userdata('status') != TRUE) {
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
		$this->load->view('admin/v_header');
		$this->load->view('admin/v_sidebar');
		$this->load->view('admin/v_content', $data);
		$this->load->view('admin/v_footer');
	}

	function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url() . 'login/?alert=logout');
	}

	function user()
	{
		// mengambil data dari database
		$data['petugas'] = $this->m_invoice->get_user();
		$this->load->view('admin/v_header');
		$this->load->view('admin/v_sidebar');
		$this->load->view('admin/v_user', $data);
		$this->load->view('admin/v_footer');
	}

	function user_tambah()
	{
		$this->load->view('admin/v_header');
		$this->load->view('admin/v_sidebar');
		$this->load->view('admin/v_user_tambah');
		$this->load->view('admin/v_footer');
	}

	function user_tambah_aksi()
	{
		$nama = $this->input->post('nama');
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$data = array(
			'nama' => $nama,
			'username' => $username,
			'password' => md5($password)
		);

		// insert data ke database
		$this->m_invoice->insert_data($data, 'petugas');

		// mengalihkan halaman ke halaman data petugas
		$this->session->set_flashdata('flash', 'Menambahkan Data');
		redirect(base_url() . 'admin/user');
	}

	function user_edit($id)
	{
		$where = array('id' => $id);
		// mengambil data dari database sesuai id
		$data['user'] = $this->m_invoice->edit_data($where, 'petugas')->result();
		$this->load->view('admin/v_header');
		$this->load->view('admin/v_sidebar');
		$this->load->view('admin/v_user_edit', $data);
		$this->load->view('admin/v_footer');
	}

	function user_update()
	{
		$id = $this->input->post('id');
		$nama = $this->input->post('nama');
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$where = array(
			'id' => $id
		);

		// cek apakah form password di isi atau tidak
		if ($password == "") {
			$data = array(
				'nama' => $nama,
				'username' => $username
			);

			// update data ke database
			$this->m_invoice->update_data($where, $data, 'petugas');
		} else {
			$data = array(
				'nama' => $nama,
				'username' => $username,
				'password' => md5($password)
			);

			// update data ke database
			$this->m_invoice->update_data($where, $data, 'petugas');
		}
		$this->session->set_flashdata('flash', 'Mengupdate Data');

		// mengalihkan halaman ke halaman data petugas
		redirect(base_url() . 'admin/user');
	}


	function user_hapus($id)
	{
		$where = array(
			'id' => $id
		);
		$this->session->set_flashdata('flash', 'dihapus');
		// menghapus data petugas dari database sesuai id
		$this->m_invoice->delete_data($where, 'petugas');

		// mengalihkan halaman ke halaman data petugas
		redirect(base_url() . 'admin/user');
	}

	function invoice()
	{
		$data['invoice'] = $this->m_invoice->get_inv();
		$data['jenis'] = $this->m_invoice->get_jns();
		$this->load->view('admin/v_header');
		$this->load->view('admin/v_sidebar');
		$this->load->view('admin/v_invoice', $data);
		$this->load->view('admin/v_footer');
	}

	function invoice_tambah()
	{
		$a = $_POST['id'];
		$data['jns'] = $this->m_invoice->get_jns();
		$data = [
			'kode' => $this->m_invoice->auto_code($a),
			'in' => $this->m_invoice->get_inisial($a)
		];
		$this->load->view('admin/v_header');
		$this->load->view('admin/v_sidebar');
		$this->load->view('admin/v_input', $data);
		$this->load->view('admin/v_footer');
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
		redirect('admin/invoice');
	}

	function invoice_edit($id)
	{
		$where = array('id' => $id);
		$data['invoice'] = $this->m_invoice->edit_data($where, 'invoice')->result();
		$this->load->view('admin/v_header');
		$this->load->view('admin/v_sidebar');
		$this->load->view('admin/v_invoice_edit', $data);
		$this->load->view('admin/v_footer');
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
		redirect('admin/invoice_list');
	}

	function invoice_hapus($id)
	{
		$where = array('id' => $id);
		$this->m_invoice->delete_data($where, 'invoice');
		$this->session->set_flashdata('flash', 'Dihapus');
		redirect('admin/invoice_list');
	}

	function invoice_list()
	{
		$data['invoice'] = $this->m_invoice->get_in();
		$this->load->view('admin/v_header');
		$this->load->view('admin/v_sidebar');
		$this->load->view('admin/v_invoice_list', $data);
		$this->load->view('admin/v_footer');
	}

	function invoice_jenis()
	{
		$data['jenis'] = $this->m_invoice->get_jns();
		$this->load->view('admin/v_header');
		$this->load->view('admin/v_sidebar');
		$this->load->view('admin/v_invoice_jenis', $data);
		$this->load->view('admin/v_footer');
	}

	function invoice_jenis_tambah()
	{
		$this->load->view('admin/v_header');
		$this->load->view('admin/v_sidebar');
		$this->load->view('admin/v_invoice_jenis_tambah');
		$this->load->view('admin/v_footer');
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
			redirect('admin/invoice_jenis');
		} else {
			$this->session->set_flashdata('flash', 'Menambahkan Data');
			redirect('admin/invoice_jenis_tambah');
		}
	}

	function invoice_jenis_hapus($id)
	{
		$id = [
			'kode_invoice' => $id
		];

		$this->m_invoice->delete_data($id, 'jns_invoice');
		$this->session->set_flashdata('flash', 'Dihapus');
		redirect('admin/invoice_jenis');
	}

	public function print()
	{
		$data['invoice'] = $this->m_invoice->get_in();
		$this->load->view('admin/v_cetak', $data);
	}

	function cetak_invoice($id)
	{
		$where = array('id' => $id);
		$data['invoice'] = $this->m_invoice->edit_data($where, 'invoice')->result();
		$this->load->view('admin/v_cetak1', $data,);
	}
}
